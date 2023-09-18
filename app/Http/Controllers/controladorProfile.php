<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Models\User;
use App\Models\User_Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class controladorProfile extends Controller
{

    /* Direciona para a página de Perfil
    com os dados do que está logado */
    public function index()
    {
        $dados = Auth::User();
        if (Auth::User()->tipo == 2) {
            $servicosPrestados = User_Servico::where('user_id', '=', Auth::User()->id)->get();
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
        $dados = Auth::User();
        $dadosErro = Auth::User();
        if (isset($dados)) {
            $path = $request->file('fotoPerfil')->store('imagens', 'public');
            $dados->name = ucfirst($request->input('name'));
            $dados->apelido = ucfirst($request->input('apelido'));
            $dados->email = $request->input('email');
            $dados->telefone = $request->input('phone');
            $dados->tipo = $dados->tipo;
            $dados->avaliacao = $dados->avaliacao;
            $dados->password = $dados->password;
            $dados->fotoPerfil = $path;
            $dados->save();
            return redirect('/perfil')->with('success', 'Seu perfil foi atualizado com sucesso!');
        } else {
            return redirect('/perfil')->with('danger', 'Não deu para editar seu perfil!!');
        }
    }

    // Permite alterar a senha (além do método de "esqueci a senha" padrão)
    // O usuário terá que informar sua senha atual para mudá-la
    /* Método para alterar a senha (além do método próprio do Laravel)
    O usuário deve informar sua senha atual para poder mudá-la*/
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

    /* Método que permite mostrar a avaliação dos usuários
    Depende do tipo de usuário logado (cliente ou prestador de serviço) */
    public function avaliacao()
    {
        $dados = User::select('id', 'name', 'apelido', 'avaliacao')->from('users')->where('tipo', '=', 2)->get();
        foreach ($dados as $item) {
            if ($item->avaliacao < 5) {
                $item->resto = 5 - $item->avaliacao;
            }
        }
        return view('sistema.avaliacao.avaliacaoCliente', compact('dados'));
    }

    public function editAv(string $id)
    {
        $dados = User::finf($id);
        if (isset($dados)) {
            return view('sistema.avaliacao.avaliarPrestador', compact('dados'));
        } else {
            return redirect('/dashboard/avaliacao')->with('danger', 'Não será possível avaliar Prestador!');
        }
    }

    public function updateAv(Request $request, $id)
    {
        $dados = User::find($id);
        $NovaAv = $request->input('avaliacao');
        $total = $dados->avaliacao + $novaAv;
        $Media = intdiv($total, 2);
        if (isset($dados)) {
            $dados->name = $dados->name;
            $dados->apelido = $dados->apelido;
            $dados->email = $dados->email;
            $dados->telefone = $dados->telefone;
            $dados->tipo = $dados->tipo;
            $dados->avaliacao = $Media;
            $dados->password = $dados->password;
            $dados->fotoPerfil = $dados->fotoPerfil;
            $dados->save();
            return redirect('/dashboard/avaliacao')->with('success', 'Avaliação registrada com sucesso!');
        } else {
            return redirect('/dashboard/avaliacao')->with('danger', 'Não foi possível gravar sua avaliação!');
        }
    }

}
