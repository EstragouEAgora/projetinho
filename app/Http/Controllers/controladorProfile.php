<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_Servico;
use App\Models\Servico;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class controladorProfile extends Controller
{

    /* Direciona para a página de Perfil
        com os dados do que está logado */
    public function index()
    {
        $dados = Auth::User();
        if (Auth::User()->tipo == 2){
            $user_servico = User_Servico::where('user_id', '=',  Auth::User()->id);
            $servicosCadastrados = array();
            foreach ($user_servico as $item) {
                $servico = Servico::find($item->servico_id);
                $item->nomeServico = $servico->nomeServico;
                $servicosCadastrados = $item->servico_id;
            }
            $servicos = Servico::all();
            return view('auth.profile', compact('dados','user_servico','servicos', 'servicosCadastrados'));
        } else {
            $dados = Auth::User();
            return view('auth.profile', compact('dados'));
        }
        
    }

    /* Atualiza os dados do usuário com base nas alterações do formulário
        E redireciona para a mesma página, porém com os dados atualizados */
    public function update(Request $request, string $id)
    {
        $dados = Auth::User();
        $dadosErro = Auth::User();
        if(isset($dados)){
            $path = $request -> file('fotoPerfil')->store('imagens', 'public');
            $dados->name = ucfirst($request->input('name'));
            $dados->apelido =ucfirst($request->input('apelido'));
            $dados->email = $request->input('email');
            $dados->telefone = $request->input('phone');
            $dados->tipo = $dados->tipo;
            $dados->avaliacao = $dados->avaliacao;
            $dados->password = $dados->password;
            $dados->fotoPerfil = $path;
            $dados->save();
            return redirect('/perfil')->with('success', 'Seu perfil foi atualizado com sucesso!');
        } else {
            return redirect('/perfil')-> with('danger', 'Não deu para editar seu perfil!!');
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
        if(isset($senhaBD) && isset($senhaAtual)){
            $senhaAtual = Hash::$senhaAtual;
            if($senhaAtual === $senhaBD){
                $novaSenha1 = $request->input('novaSenha');
                $novaSenha2 = $request->input('confirmacaoSenha');
                if(isset($novaSenha1) && isset($novaSenha2)){
                    if($novaSenha1 === $novaSenha2){
                        $hashNovaSenha = Hash::$novaSenha1;
                        if ($hashNovaSenha !== $senhaBD){
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
                return redirect() -> with('danger', 'A senha atual não coincide!');
            }
        } else {
            return redirect()->with('danger', 'Verfique se todos os campos foram preenchidos!');
        }
    }

    /* Método que permite mostrar a avaliação dos usuários
        Depende do tipo de usuário logado (cliente ou prestador de serviço) */    
    public function avaliacao()
    {
        $dados = User::select('id', 'name', 'apelido','avaliacao')->from('users')->where('tipo', '=', 2)->get();
        foreach ($dados as $item) {
            if ($item->avaliacao < 5){
                $item->resto = 5 - $item->avaliacao;
            }
        }
        return view('sistema.avaliacao.avaliacaoCliente', compact('dados'));
    }

}
