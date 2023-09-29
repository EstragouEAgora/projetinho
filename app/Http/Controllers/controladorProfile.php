<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_Servico;
use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
//Illuminate\Database\Eloquent\Collection::avg();

class controladorProfile extends Controller
{

    /* Direciona para a página de Perfil
    com os dados do que está logado */
    public function index()
    {
        $dados = Auth::User();
        if (Auth::User()->tipo == 2) {
            $servicosPrestados = User_Servico::where('user_id', '=', Auth::User()->id)->get();
            try {
                $a = $servicosPrestados[0];
                
                $servicos = Servico::where('id','!=');
            } catch (Exception $th) {
                //throw $th;
            }
            $servicos = Servico::all();
            return view('auth.profile', compact('dados', 'servicosPrestados', 'servicos'));
        } else {
            return view('auth.profile', compact('dados'));
        }

    }

    /* Atualiza os dados do usuário com base nas alterações do formulário
    E redireciona para a mesma página, porém com os dados atualizados */
    public function update(Request $request, string $id)
    {
        $dados = User::find($id);
        $conexao = new User_Servico();
        if (isset($dados)) {
            if (null !== $request->file('fotoPerfil')) {
                $path = $request->file('fotoPerfil')->store('imagens','public');
            }
            if (null !== $request->input('servicos')) {
                $conexao->user_id = Auth::User()->id;
                $conexao->servico_id = $request->input('servicos');
                $conexao->save();
            }
            $dados->name = ucfirst($request->input('name'));
            $dados->apelido = ucfirst($request->input('apelido'));
            $dados->email = $request->input('email');
            $dados->telefone = $request->input('telefone');
            $dados->tipo = $dados->tipo;
            $dados->avaliacao = $dados->avaliacao;
            $dados->password = $dados->password;
            if (isset($path)) {
                $dados->fotoPerfil = $path;
            } else {
                $dados->fotoPerfil = $dados->fotoPerfil;
            }
            $dados->save();
            return redirect('/dashboard/perfil')->with('success', 'Seu perfil foi atualizado com sucesso!');
        } else {
            return redirect('/dashboard/perfil')->with('danger', 'Não deu para editar seu perfil!!');
        }
    }

    // Permite alterar a senha (além do método de "esqueci a senha" padrão)
    // O usuário terá que informar sua senha atual para mudá-la
    /* Método para alterar a senha (além do método próprio do Laravel)
    O usuário deve informar sua senha atual para poder mudá-la
    public function mudarSenha(Request $request)
    {
        $senhaAtual = $request->input('senhaAtual');
        $senhaBD = Auth::User()->password;
        if (isset($senhaBD) && isset($senhaAtual)) {
            $senhaAtual = Hash::$senhaAtual;
            if ($senhaAtual === $senhaBD) {
                $novaSenha1 = $request->input('novaSenha');
                $novaSenha2 = $request->input('confirmacaoSenha');
                if (isset($novaSenha1) && isset($novaSenha2)) {
                    if ($novaSenha1 === $novaSenha2) {
                        $hashNovaSenha = Hash::$novaSenha1;
                        if ($hashNovaSenha !== $senhaBD) {
                            $dados = Auth::User();
                            $dados->password = $hashNovaSenha;
                            $dados->save();
                            return redirect()->with('success', 'Sua senha foi alterada com sucesso!');
                        } else {
                            return redirect()->with('danger', 'Sua nova senha não pode ser igual à antiga!!!');
                        }
                    } else {
                        return redirect()->with('danger', 'As senhas não coincidem!');
                    }
                } else {
                    return redirect()->with('danger', 'Verfique se todos os campos foram preenchidos!');
                }
            } else {
                return redirect()->with('danger', 'A senha atual não coincide!');
            }
        } else {
            return redirect()->with('danger', 'Verfique se todos os campos foram preenchidos!');
        }
    }
    */

    /* Método que permite mostrar a avaliação dos usuários
    Depende do tipo de usuário logado (cliente ou prestador de serviço) */
    public function avaliacao()
    {
        $dados = User::select('id', 'name', 'apelido', 'avaliacao','fotoPerfil')->from('users')->where('tipo', '=', 2)->get();
        foreach ($dados as $item) {
            if ($item->avaliacao < 5) {
                $item->resto = 5 - $item->avaliacao;
            }
        }
        return view('sistema.avaliacao.avaliacaoCliente', compact('dados'));
    }

    public function editAv(string $id, $pedido_id)
    {
        $dados = User::find($id);
        $dados->pedido = $pedido_id;
        if (isset($dados)) {
            return view('sistema.avaliacao.avaliarPrestador', compact('dados'));
        } else {
            return redirect('/home')->with('danger', 'Não será possível avaliar Prestador!');
        }
    }

    public function updateAv(Request $request, $id, $pedido_id)
    {
        $dados = User::find($id);
        $novaAv = $request->input('avaliacao');
        $total = $dados->avaliacao + $novaAv;
        $media = intdiv($total, 2);
        if (isset($dados)) {
            $dados->name = $dados->name;
            $dados->apelido = $dados->apelido;
            $dados->email = $dados->email;
            $dados->telefone = $dados->telefone;
            $dados->tipo = $dados->tipo;
            $dados->avaliacao = $media;
            $dados->password = $dados->password;
            $dados->fotoPerfil = $dados->fotoPerfil;
            $dados->save();
            $user_id = $id;
            return redirect('/pedidos/aceitar/$user_id/$pedido_id')->with('success', 'Avaliação registrada com sucesso!');
        } else {
            return redirect('/dashboard/avaliacao')->with('danger', 'Não foi possível gravar sua avaliação!');
        }
    }

}
