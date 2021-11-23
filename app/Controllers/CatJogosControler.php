<?php 
namespace App\Controllers;

use App\Models\CatJogoModel;
use CodeIgniter\HTTP\Request;

class CatJogosControler extends BaseController
{
    public function index()
    {
      echo view('header');
      echo view('cadCatJogos');
      echo view('footer');
    }

    public function InserirCatJogos()
    {
        $request = service('request');

        if ($request->getMethod()=== 'post') {
            $CatJogoModelo= new \App\Models\CatJogoModel();

            $CatJogoModelo->set('nomeCatjogo',$request->getPost('nomeCatjogo'));

            if ($CatJogoModelo->insert()) {
                $data['msg']=$data['msg'] = 'Informações cadastradas com sucesso';
            } else {

                $data['msg'] = 'Falha ao cadastrar as Informações';
            }
            
        }

        echo view('header');

        echo view('cadCatJogos');

        echo view('footer');
    }
}
?>