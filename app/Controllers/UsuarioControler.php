<?php

//Area de trablho
namespace App\Controllers;

use CodeIgniter\HTTP\Request;

class UsuarioControler extends BaseController
{

   //Criando uma função que chama as telas para aparecerem
   public function index()
   {
      echo view('header');
      echo view('cadUsuario');
      echo view('footer');
   }

   //Inserir ususario
   public function inserirUsuario()
   {

      //mensagem ficar em branco
      $data['msg'] = '';

      //Recebendo informações
      $request = service('request');
      
      //service metodo POST e GET do Codeinater
      if ($request->getMethod() === 'post') {

         //instância a tabela
         $UsuarioModelo = new \App\Models\UsuarioModel();

         /*Senha criptografada */
         //Quantos pulos eu quero no 'cost'
         $opcao = ['cost' => 8];
         $senhaCrip = password_hash($request->getPost('senhausu'), PASSWORD_BCRYPT, $opcao);

         //Configurando campos,para pegar os campos
         $UsuarioModelo->set('emailUsu', $request->getPost('emailusu'));
         $UsuarioModelo->set('SenhaUsu', $senhaCrip);

         //inserindo no BD
         if ($UsuarioModelo->insert()) {
            //Exebindo mensagem
            $data['msg'] = 'Suas informações foram cadastradas com Sucesso';
         } else {
            $data['msg'] = 'Suas informações não foram cadastradas com Sucesso';
         }
      }

      //Se deu certo mostre isso
      echo view('header');
      echo view('cadUsuario', $data);
      echo view('footer');
   }


   //Pesquisar usuario
   public function todosUsuarios()
   {
      /*BD ligamento*/
      $UsuarioModel = new \App\Models\UsuarioModel();

      //-> para Objetos
      //find pega tudo que tá natabelas
      $registros = $UsuarioModel->find();

      //Colocar usuarios dentro de uma array
      $data['usuarios'] = $registros;

      //Pegar pelo POST ou GET
      $request = service('request');

      //Pegando o codigo do ususario do formulario para deletar
      $codusuario = $request->getPost('codUsu');

      //Pegando o codigo do ususario do formulario para Alterar
      $codUsuAlterar = $request->getPost('codUsuAlterar');

      //Verificando se existe o name para deletar
      if ($codusuario) {
         $this->deletarUsuario($codusuario);
         //Atualiza a pagina
         return redirect()->to(base_url('UsuarioControler/todosUsuarios'));
      }

      //Verificando se existe o name para Alterar
      if ($codUsuAlterar) {
         return $this->alterarUsuario();
      }

      echo view('header');
      echo view('listaUsuario', $data);
      echo view('footer');
   }


   // pesquisa por código
   public function listaCodUsuario()
   {
      //Vendo o conteudo pelo metodo POST ou GET
      $request = service('request');
      $codusuario = $request->getPost('codUsu');
      $UsuarioModel = new \App\Models\UsuarioModel();
      $registros = $UsuarioModel->find($codusuario);

      $data['usuario'] = $registros;
      $codUsuAlterar = $request->getPost('codUsuAlterar');
      $codUsuDel = $request->getPost('codUsuDel');

      //Verificando se existe o name para deletar
      if ($codUsuDel) {
         $this->deletarUsuarioCod($codUsuDel);
         //Atualiza a pagina
         return redirect()->to(base_url('UsuarioControler/listaCodUsuario/'));
      }

      //Verificando se existe o name para Alterar
      if ($codUsuAlterar) {
         return $this->alterarUsuarioCod();
      }


      echo view('header');
      echo view('listaCodUsu', $data);
      echo view('footer');
   }


   //alterar usuario
   public function alterarUsuario()
   {
      // Recebendo o email e codigo
      $request = service('request');
      $codUsuAlterar = $request->getPost('codUsuAlterar');
      $emailUsu = $request->getPost('emailUsu');


      //Ligando o BD
      $UsuarioModel = new \App\Models\UsuarioModel();

      //Encontrando tudos os dados no BD
      $registros = $UsuarioModel->find($codUsuAlterar);


      //Verificando se existe os dados para alterar
      if ($request->getPost('emailUsu')) {
         $registros->emailUsu = $emailUsu;

         //Alterando dados no BD
         $UsuarioModel->update($codUsuAlterar, $registros);

         return redirect()->to(base_url('UsuarioControler/todosUsuarios/'));
      }

      //Colocando dados para exibir
      $data['usuario'] = $registros;

      echo view('header');
      echo view('alterarFormUsuario', $data);
      echo view('footer');
   }


   //Alterar as informações
   public function alterarUsuarioCod()
   {
      $request = service('request');
      $codUsuAlterar = $request->getPost('codUsuAlterar');
      $emailUsu = $request->getPost('emailUsu');

      //Ligando o BD
      $UsuarioModel = new \App\Models\UsuarioModel();

      //Encontrando tudos os dados no BD
      $registros = $UsuarioModel->find($codUsuAlterar);


      //Verificando se existe os dados para alterar
      if ($request->getPost('emailUsu')) {
         $registros->emailUsu = $emailUsu;

         //Alterando dados no BD
         $UsuarioModel->update($codUsuAlterar, $registros);

         return redirect()->to(base_url('UsuarioControler/listaCodUsuario/'));
         
      }

      //Colocando dados para exibir
      $data['usuario'] = $registros;

      echo view('header');
      echo view('alterarFormUsuario', $data);
      echo view('footer');
   }

   //deleta usuario
   public function deletarUsuario($codusuario = null)
   {
      //Verificando se o código é nulo
      if (is_null($codusuario)) {
         //Redirecione para o formulario/pagina
         return redirect()->to(base_url('UsuarioControler/todosUsuarios'));
      }

      //Ligando o BD
      $UsuarioModel = new \App\Models\UsuarioModel();

      //Deletando o codigo
      if ($UsuarioModel->delete($codusuario)) {

         //Redireciona para o formulario/pagina
         return redirect()->to(base_url('UsuarioControler/todosUsuarios'));
      } else {
         return redirect()->to(base_url('UsuarioControler/todosUsuarios'));
      }
   }

   public function deletarUsuarioCod($codusuario = null)
   {
      if (is_null($codusuario)) {
         //Redirecione para o formulario/pagina
         return redirect()->to(base_url('UsuarioControler/listaCodUsuario'));
      }

      //Ligando o BD
      $UsuarioModel = new \App\Models\UsuarioModel();

      //Deletando o codigo
      if ($UsuarioModel->delete($codusuario)) {

         //Redireciona para o formulario/pagina
         return redirect()->to(base_url('UsuarioControler/listaCodUsuario'));
      } else {
         return redirect()->to(base_url('UsuarioControler/listaCodUsuario'));
      }
   }
}
