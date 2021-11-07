<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;

class FuncionarioControler extends BaseController
{
   public function index()
   {
      echo view('header');
      echo view('cadFuncionario');
      echo view('footer');
   }

   public function InserirFuncionario()
   {
      //mensagem ficar em branco
      $data['msg'] = '';

      //Recebendo informações
      $request = service('request');

      //service metodo POST e GET do Codeinater
      if ($request->getMethod() === 'post') {

         //instância a tabela
         $FuncionarioModelo = new \App\Models\FuncionarioModel();

         //Configurando campos,para pegar os campos que vão vir da View
         $FuncionarioModelo->set('codusu_FK', $request->getPost('CodUsu'));
         $FuncionarioModelo->set('nomeFun', $request->getPost('nomefun'));
         $FuncionarioModelo->set('foneFun', $request->getPost('foneFun'));

         //inserindo no BD
         if ($FuncionarioModelo->insert()) {
            //Exebindo mensagem
            $data['msg'] = 'Suas informações foram cadastradas com Sucesso';
         } else {
            $data['msg'] = 'Suas informações não foram cadastradas com Sucesso';
         }
      }
   }

   public function listaCodFuncionario()
   {
      //Vendo o conteudo pelo metodo POST ou GET
      $request = service('request');
      $data['usuario'] = '';

      //Verificando se existe no BD
      if ($request->getPost('CodUsu')) {

         //pegando o usuario do BD
         $codusuario = $request->getPost('CodUsu');
         $UsuarioModel = new \App\Models\UsuarioModel();
         $registros = $UsuarioModel->find($codusuario);
         $data['usuario'] = $registros;
      }

      //Verficando se os campos existe para cadastrar no BD de Fun 
      if ($request->getPost('nomefun') && $request->getPost('foneFun')) {
         $this->InserirFuncionario();
      }

      echo view('header');
      echo view('cadFuncionario', $data);
      echo view('footer');
   }

   public function buscaPrincipalFuncionarioCod()
   {
      $request = service('request');
      $codFuncionario = $request->getPost('codFun');
      $FuncionarioModel = new \App\Models\FuncionarioModel();
      $registros = $FuncionarioModel->find($codFuncionario);


      //Verificando se existe o name para deletar
      if ($request->getPost('CodFunDeletar')) {
         $this->FuncionarioExcluir($request->getPost('CodFunDeletar'));
         //Atualiza a pagina
         return redirect()->to(base_url('Home'));
      }

      //Verificando se existe o name para Alterar
      if ($request->getPost('codFunAlterar')) {
         return $this->funcionarioAlterar();
      }

      $data['funcionario'] = $registros;

      echo view('header');
      echo view('buscaCodFun', $data);
      echo view('footer');
   }



   public function funcionarioAlterar()
   {
      //Vendo o conteudo pelo metodo POST ou GET
      $request = service('request');
      $codFuncionarioAlterar = $request->getPost('codFunAlterar');
      $nomeFun = $request->getPost('nomeFun');
      $foneFun = $request->getPost('foneFun');

      $FuncioanarioModel = new \App\Models\FuncionarioModel();
      $registros = $FuncioanarioModel->find($codFuncionarioAlterar);

      //Verificando se existe o name para deletar
      if ($request->getPost('nomeFun') && $request->getPost('foneFun')) {
         $registros->nomeFun = $nomeFun;
         $registros->foneFun = $foneFun;
         $FuncioanarioModel->update($codFuncionarioAlterar, $registros);
         return redirect()->to(base_url('Home'));
      }

      $data['funcionario'] = $registros;

   }


   public function FuncionarioExcluir($CodFunDeletar)
   {
      //Verificando se o código é nulo
      if (is_null($CodFunDeletar)) {
         //Redirecione para o formulario/pagina
         return redirect()->to(base_url('Usuarios/Todosusuario'));
      }

      //Ligando o BD
      $FuncionariooModel = new \App\Models\FuncionarioModel();

      //Deletando o codigo
      if ($FuncionariooModel->delete($CodFunDeletar)) {
         //return redirect()->to(base_url('UsuarioControler/todosUsuarios'));
      } else {
         //return redirect()->to(base_url('UsuarioControler/todosUsuarios'));
      }
   }
}
