<?php

namespace App\Http\Controllers;

use App\Models\Candidatos;
use App\Models\Pedido;
use App\Models\Servico;
use App\Models\User;
use App\Models\User_Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class controladorPedido extends Controller
{
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
        $dados = new Pedido();
        $dados->user_id = Auth::User()->id;
        $idSer = session('idSer');
        $dados->servico_id = $idSer;
        $dados->descricaoPedido = $request->input('descricaoPedido');
        $valor = str_replace(',', '.', preg_replace('/[^0-9,]/', '', $request->input('valorPedido')));
        $valor = (double) $valor;
        $dados->valorPedido = $valor;
        $dados->save();
        return redirect('/home')->with('success', 'Seu pedido foi cadastrado com sucesso!');
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
        if (Auth::User()->tipo == '1') {
            $pedidos = Pedido::where('user_id', Auth::User()->id)->with('servico')->get();
            return view('sistema.pedido.listaPedidosCliente', compact('pedidos'));
        } elseif (Auth::User()->tipo == '2') {
            $servicos = User_Servico::where('user_id', Auth::User()->id)->get();
            return view('sistema.pedido.listaPedidosPres', compact('servicos'));
        }
    }

    /* Envia para uma página de edição do pedido */
    public function edit(string $id)
    {
        $pedido = Pedido::find($id);
        if (isset($pedido)) {
            return view('', compact('pedido'));
        }
        return redirect('sistema.pedido.listaPedidosCliente')->with('danger', 'Erro ao redirecionar à página de edição!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pedido = Pedido::find($id);
        if (isset($pedido)) {
            $pedido->descricaoPedido = $request->input('descricaoPedido');
            $pedido->valorPedido = $request->input('valorPedido');
            $data->save();
        } else {
            return redirect('sistema.pedido.listaPedidosCliente')->with('danger', 'Erro ao editar seu pedido');
        }
        return redirect('sistema.pedido.listaPedidosCliente')->with('success', 'Pedido editado com sucesso');
    }

    /* Envia email para os Prestadores de Serviço */
    public function enviarEmail(Request $request, string $id)
    {
        /*$pedidos = Pedido::find($id);
        $servico = $pedidos->servico_id;
        $users = User_Servico::where('servico_id', $servico)->get();
        if (isset($users)) {
            $mail->isSMTP();  //Define o uso de SMTP no envio
            $mail->SMTPAuth = true; //Habilita a autenticação SMTP
            $mail->Username= 'projetoestragoueagora@gmail.com';
            $mail->Password   = 'TCC_2023';
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
                $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
                $mail->Subject = 'Novo Pedido para Você!';
                $mail->Body    = 'Olá, {{$apelido}}, você tem um novo pedido do serviço de {{$item->servico->nomeServico}}
                                    Entre agora no nosso site! Não perca essa oportunidade!';
                $mail->AltBody = 'Olá! Você tem um novo pedido no Estragou e agora!';
                // Enviar
                $mail->send();
            }
            return redirect('/home')->with('success', 'Seu pedido foi cadastrado com sucesso!');
        } else {
            return redirect('/home')->with('danger', 'Não foi possível cadastrar seu pedido!');
        }
        */
    }


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
