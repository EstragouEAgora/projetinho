<?php

namespace App\Http\Controllers;

use App\Models\Candidatos;
use App\Models\Pedido;
use App\Models\Servico;
use App\Models\User;
use App\Models\User_Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class controladorPedido extends Controller
{
    /* Contém as regras de validação */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'descricaoPedido' => ['required', 'string', 'min:7'],
        ]);
    }

    /* Envia para a página de cadastro de pedido
    Junto com o dado do "servico_id" */
    public function create($servico_id)
    {
        $dados = Servico::find($servico_id);
        session(['idSer' => $servico_id]);
        if (isset($dados)) {
            return view('sistema.pedido.pedido', compact('dados'));
        } else {
            return redirect('sistema.dashboard.dashboardClient')->with('danger', 'Erro ao redirecionar a página!');
        }
    }

    /* Cadastra o novo pedido e retorna com uma mensagem para o usuário
    informando o status da operação  */
    public function store(Request $request)
    {
        $idSer = session('idSer');
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect("/pedidos/$idSer")
                ->withErrors($validator)
                ->withInput();
        }
        $dados = new Pedido();
        $dados->user_id = Auth::User()->id;
        $dados->servico_id = $idSer;
        $dados->descricaoPedido = $request->input('descricaoPedido');
        if (null !== $request->file('arquivo')) {
            $path = $request->file('arquivo')->store('imagens', 'public');
            $dados->fotoPedido = $path;
        } else {
            $dados->fotoPedido = '';
        }
        if (null !== $request->input('valorPedido')) {
            $valor = str_replace(',', '.', preg_replace('/[^0-9,]/', '', $request->input('valorPedido')));
            $valor = (double) $valor;
            $dados->valorPedido = $valor;
        } else {
            $dados->valorPedido = 0.0;
        }
        $dados->status = 0;
        $dados->save();
        return redirect("/pedidos/enviar/mail/$dados->id");
        //return redirect('/dashboard/pedidos')->with('success', 'Seu pedido foi cadastrado com sucesso!');
    }

    public function aceitar(Request $request, $user_id, $pedido_id)
    {
        $candidato = Candidatos::where('pedido_id', '=', $pedido_id)
            ->where('user_id', '=', $user_id)
            ->join('users', 'candidatos.user_id', '=', 'users.id')->get();
        return view('sistema.pedido.candidatoAceito', compact('candidato'));
    }

    public function apagarCandidatos(Request $request, $user_id, $pedido_id)
    {
        $candidato = User::find($user_id);
        $dados = Candidatos::where('pedido_id', '=', $pedido_id)
            ->where('user_id', '=', $user_id)->first();
        $dados->status = 1;
        $dados->save();
        $outrosDados = Candidatos::where('pedido_id', '=', $pedido_id)
            ->where('user_id', '!=', $user_id)->delete();
        return redirect('/dashboard/candidatos/$pedido_id')->with('success', 'Prestador aceito com sucesso!');
    }

    /* A depender do tipo de usuário:
    1 - Cliente
    2 - Prestador de serviço
    Será enviado um conjunto de dados com as informações dos pedidos:
    1 - Que o usuário fez
    2 - Que o usuário recebeu

     */
    public function listaPedidos()
    {
        $pedidos = Pedido::where('user_id', Auth::User()->id)->with('servico')->get();
        return view('sistema.pedido.listaPedidosCliente', compact('pedidos'));
    }

    /* Envia para uma página de edição do pedido */
    public function edit(string $id)
    {
        $dados = Pedido::find($id);
        if (isset($dados)) {
            return view('sistema.pedido.editarPedido', compact('dados'));
        }
        return redirect('sistema.pedido.listaPedidosCliente')->with('danger', 'Erro ao redirecionar à página de edição!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect("/pedidos/editar/$id")
                ->withErrors($validator)
                ->withInput();
        }
        $pedido = Pedido::find($id);
        if (isset($pedido)) {
            $pedido->descricaoPedido = $request->input('descricaoPedido');
            if (null !== $request->file('arquivo')) {
                $path = $request->file('arquivo')->store('imagens', 'public');
                $dados->fotoServico = $path;
            } else {
                $pedido->fotoPedido = $pedido->fotoPedido;
            }
            if (null !== $request->input('valorPedido')) {
                $valor = str_replace(',', '.', preg_replace('/[^0-9,]/', '', $request->input('valorPedido')));
                $valor = (double) $valor;
                $pedido->valorPedido = $valor;
            } else {
                $pedido->valorPedido = 0.0;
            }
            $pedido->status = 0;
            $pedido->save();
        } else {
            return redirect('/dashboard/pedidos')->with('danger', 'Erro ao editar seu pedido');
        }
        return redirect('/dashboard/pedidos')->with('success', 'Pedido editado com sucesso');
    }

    /* Envia email para os Prestadores de Serviço */
    public function enviarEmail(Request $request, string $id)
    {
        $mail = new PHPMailer(true);
        $pedidos = Pedido::find($id);
        $servico = $pedidos->servico_id;
        $users = User_Servico::where('servico_id', $servico)->get();
        if ($users->isNotEmpty()) {
            $mail->isSMTP(); //Define o uso de SMTP no envio
            $mail->SMTPAuth = true; //Habilita a autenticação SMTP
            $mail->Username = 'projetoestragoueagora@gmail.com';
            $mail->Password = 'TCC_2023';
            // Criptografia do envio SSL também é aceito
            $mail->SMTPSecure = 'tls';
            // Informações específicadas pelo Google
            $mail->Host = 'smtp.email.com';
            $mail->Port = 587;
            // Define o remetente
            $mail->setFrom('projetoestragoueagora@gmail.com', ' Estragou, e agora?');
            foreach ($users as $item) {
                $email = $item->user->email;
                $apelido = $item->user->apelido;
                $mail->addAddress($email, $apelido); // Define o destinatário
                // Conteúdo da mensagem
                $mail->isHTML(true); // Seta o formato do e-mail para aceitar conteúdo HTML
                $mail->Subject = 'Novo Pedido para Você!';
                $mail->Body = $mail->Body = 'Olá, ' . $apelido . ', você tem um novo pedido do serviço de ' . $item->servico->nomeServico . '. Entre agora no nosso site! Não perca essa oportunidade!';
                $mail->AltBody = 'Olá! Você tem um novo pedido no Estragou e agora!';
                // Enviar
                $mail->send();
            }
            return redirect('/dashboard/pedidos')->with('success', 'Seu pedido foi cadastrado com sucesso!');
        } else {
            return redirect('/dashboard/pedidos')->with('danger', 'Não foi possível cadastrar seu pedido!');
        }
    }

    /* Apagar o pedido */
    public function destroy(string $id)
    {
        $dados = Pedido::find($id);
        $candidatos = Candidato::where('pedido_id', $id);
        if (isset($dados) && isset($candidatos)) {
            $candidatos->delete();
            $dados->delete();
        } else {
            return redirect('sistema.pedido.listaPedidosCliente')->with('danger', 'Erro ao deletar seu pedido!');
        }
        return redirect('sistema.pedido.listaPedidosCliente')->with('success', 'Pedido deletado com sucesso!');
    }
}
