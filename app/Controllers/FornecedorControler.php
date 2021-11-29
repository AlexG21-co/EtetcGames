<?php

namespace App\Controllers;
//Meu nome é Alex
use App\Models\FornecedoModel;
use CodeIgniter\HTTP\Request;


class FornecedorControler extends BaseController
{
    public function index()
    {
        //Alex
        echo view('header');
        echo view('cadFornecedor');
        echo view('footer');
    }

    public function inserirFornecedor()

    {

        // $data['msg'] = '';

        $request = service('request');

        if ($request->getMethod() === 'post') {

            $FornecedorModelo = new \App\Models\FornecedoModel();

            $FornecedorModelo->set('nomeForn', $request->getPost('nomeForn'));

            $FornecedorModelo->set('emailForn', $request->getPost('emailForn'));

            $FornecedorModelo->set('foneForn', $request->getPost('foneForn'));

            if ($FornecedorModelo->insert()) {

                $data['msg'] = 'Informações cadastradas com sucesso';
            } else {

                $data['msg'] = 'Falha ao cadastrar as Informações';
            }
        }

        echo view('header');

        echo view('cadFornecedor' /*data*/);

        echo view('footer');
    }

    public function todosFornecedores()
    {
        //ligando BD para mostrar na tabela
        $FornecedoModelo = new \App\Models\FornecedoModel();

        //Pegando tudo que tem na tabela de fornecedor para mostrar
        $registros = $FornecedoModelo->find();

        //Colocar fornecedor dentro de uma array para exibir
        $data['fornecedores'] = $registros;

        //Pegar as informações para alterar ou deletar
        $request = service('request');

        //Pegando o que foi escolhido no campo codForn no formulario para deletar
        $codFornecedor = $request->getPost('codForn');

        //Pegando o que foi escolhido no campo codFonrAlt no formulario para alterar
        $codFornecedorAlterar = $request->getPost('codFornAlterar');

        //Verificando se existe algo no Name para deletar
        if ($codFornecedor) {
            $this->deletarForncedor($codFornecedor);
            return redirect()->to(base_url('FornecedorControler/todosFornecedores/'));
        }

        //Verificando se existe algo no Name para Alterar
        if ($codFornecedorAlterar) {
            return $this->alterarFornecedor();
        }

        echo view('header');
        echo view('listaFornecedor', $data);
        echo view('footer');
    }

    public function deletarForncedor($codFornecedor=null)
    {
        //Se o código for nulo então redirecione para a pagina
        if(is_null($codFornecedor))
        {
            //redirecionando para a pagina
            return redirect()->to(base_url('FornecedorControler/todosFornecedores'));
        }

        $FornecedoModelo = new \App\Models\FornecedoModel();

        //Deletando o codigo
        if($FornecedoModelo->delete($codFornecedor))
        {
            //return redirect()->to(base_url('FornecedorControler/todosFornecedores'));
        }
        else
        {
            //return redirect()->to(base_url('FornecedorControler/todosFornecedores'));
        }

    }

    public function alterarFornecedor()
    {
        $request= service('request');
        $codFornecedorAlterar=$request->getPost('codFornAlterar');
        $emailForn=$request->getPost('emailForn');
        $nomeForn=$request->getPost('nomeForn');
        $foneForn=$request->getPost('foneForn');


        $FornecedorModelo= new \App\Models\FornecedoModel();

        $registros = $FornecedorModelo->find($codFornecedorAlterar);

        $data['fornecedores']=$registros;

        if($nomeForn OR $emailForn OR $foneForn)
        {
            $registros->nomeForn=$nomeForn;
            $registros->emailForn=$emailForn;
            $registros->foneForn=$foneForn;

            $FornecedorModelo->update($codFornecedorAlterar, $registros);

            return redirect()->to(base_url('FornecedorControler/todosFornecedores/'));
        }
        

        echo view('header');
        echo view('alterarFormFornecedo',$data);
        echo view('footer');
    }

    public function listaCodForn()
    {
        //Recebendo informação
        $request=service('request');

        //Recebendo o código digitado
        $codFornecedor=$request->getPost('codForn');

        //ligando o BD
        $FornecedorModelo = new \App\Models\FornecedoModel();

        //Pegando todos os dados no BD do código digitado 
        $registros = $FornecedorModelo->find($codFornecedor);

        //salvando informações do fornecedor que foram pegas no BD em uma array
        $data['fornecedor']=$registros;

        $codFornAlterar=$request->getPost('codFornAlterar');
        $codFornDel=$request->getPost('codFornDel');

        if($codFornDel)
        {
            $this->deletarFornCod($codFornDel);

            return redirect()->to(base_url('FornecedorControler/listaCodForn'));
        }
        if($codFornAlterar)
        {
            return $this->alterarFornCod();
        }

        echo view('header');
        echo view('listaCodForn',$data);
        echo view('footer');
    }

    public function deletarFornCod($codFornDel=null)
    {
        if(is_null($codFornDel))
        {
            return redirect()->to(base_url('FornecedorControler/listaCodForn'));
        }

        $FornecedoModelo = new \App\Models\FornecedoModel();

        if($FornecedoModelo->delete($codFornDel))
        {
            return redirect()->to(base_url('FornecedorControler/listaCodForn'));
        }
        else
        {
            return redirect()->to(base_url('FornecedorControler/listaCodForn'));
        }

    }

    public function alterarFornCod()
    {
        $request= service('request');
        $codFornAlterar= $request->getPost('codFornAlterar');
        $nomeForn=$request->getPost('nomeForn');
        $emailForn=$request->getPost('emailForn');
        $foneForn=$request->getPost('foneForn');

        $FornecedorModelo = new \App\Models\FornecedoModel();

        $registros = $FornecedorModelo->find($codFornAlterar);

        if($nomeForn OR $emailForn OR $foneForn)
        {
            $registros->emailForn=$emailForn;
            $registros->nomeForn=$nomeForn;
            $registros->foneForn=$foneForn;

            $FornecedorModelo->update($codFornAlterar, $registros);

            return redirect()->to(base_url('FornecedorControler/listaCodForn'));
        }

        $data['fornecedores'] = $registros;

        echo view('header');
        echo view('alterarFormFornecedo',$data);
        echo view('footer');
    }
    
    
}
