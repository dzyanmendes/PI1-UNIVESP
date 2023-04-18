<?php

namespace App\Controllers;

class Visitantes extends BaseController
{
    //private $model;

    public function __construct()
    {
        //$model = new \App\Models\VisitantesModel();
    }


    public function index($indice=NULL,$funcao=NULL)
    {
        //echo 'Você está em Controller -> Visitantes -> Index';
        $data['titulo'] = 'Visitantes - index';
        $data=[];
        $data['selecionado']=NULL;
        $method=$this->request->getMethod();
        if ($method!='get'){
            //dd($method);
        }

        $model = new \App\Models\VisitantesModel();
        //$localidadeModel = new \App\Models\LocalidadesModel();
        //$enfermidadesModel = new \App\Models\EnfermidadesModel();
        //$data['localidades'] = $localidadeModel->listarLocalidades();
        //$data['enfermidades'] = $enfermidadesModel->listarEnfermidades();

        if ($method=='get'){
            if ($indice!=NULL){
                if ($funcao=='delete'){
                    $model->excluir($indice);
                } else {
                    $data['selecionado']=$model->listarPorCodigoObject($indice);
                }
                
                //dd($data['selected']);
            }
        }

        if ($method=='post'){
            //dd($this->request);
            $codigo=$this->request->getVar('codigo');
            //$localidade_codigo=$this->request->getVar('localidade_codigo');
            //$enfermidade_codigo=$this->request->getVar('enfermidade_codigo');
            //$dataOcorrencia=$this->request->getVar('dataOcorrencia');
            //$sexo=$this->request->getVar('sexo');
            //$ano_nasc=$this->request->getVar('ano_nasc');
            //$observacao=$this->request->getVar('observacao');

            $codigo                         = $this->request->getVar('codigo');
            $cpf                            = $this->request->getVar('cpf');
            $nascimento                     = $this->request->getVar('nascimento');
            $nome                           = $this->request->getVar('nome');
            $telefone                       = $this->request->getVar('telefone');
            $observacao                     = $this->request->getVar('observacao');
            $data_entrada                   = $this->request->getVar('data_entrada');
            $acampamento                    = $this->request->getVar('acampamento');
            $placa                          = $this->request->getVar('placa');
            $contato_emergencia_nome        = $this->request->getVar('contato_emergencia_nome');
            $contato_emergencia_telefone    = $this->request->getVar('contato_emergencia_telefone');
            
            //dd($descricao);
            if ($codigo==0) {
                $model->inserir(
                            [
                                "cpf" => $cpf,
                                "nascimento" => $nascimento,
                                "nome" =>  $nome,
                                "telefone" => $telefone,
                                "observacao" => $observacao,
                                "data_entrada" => $data_entrada,
                                "acampamento" => $acampamento,
                                "placa" => $placa,
                                "contato_emergencia_nome" => $contato_emergencia_nome,
                                "contato_emergencia_telefone" => $contato_emergencia_telefone
                            ]
                        );
            } else {
                $model->update(
                            [
                                "codigo" => $codigo,
                                "cpf" => $cpf,
                                "nascimento" => $nascimento,
                                "nome" =>  $nome,
                                "telefone" => $telefone,
                                "observacao" => $observacao,
                                "data_entrada" => $data_entrada,
                                "acampamento" => $acampamento,
                                "placa" => $placa,
                                "contato_emergencia_nome" => $contato_emergencia_nome,
                                "contato_emergencia_telefone" => $contato_emergencia_telefone
                            ]
                        );
            }
        }

        $data['result'] = $model->listarVisitantes();

        echo view('layout/header', $data);
        echo view('layout/Visitantes',$data);
        echo view('layout/footer');
    }

    public function incluir()
    {
        //echo 'Você está em Controller -> Visitantes -> incluir';
        $data['titulo'] = 'Visitantes - incluir';
        echo view('layout/header', $data);

        //$model = new \App\Models\VisitantesModel();
        // $data['result'] = $model->incluirVisitante();            
        $data['titulo_interno'] = 'Inclusão de Visitantes';
        echo view('Visitantes/Visitantes_incluir', $data);
        //echo 'Você está em Controller -> Visitantes -> incluir';
        echo view('layout/footer');
    }

    public function alterar($Visitante)
    {
        //echo 'Você está em Controller -> Visitantes -> alterar';
        $data['titulo'] = 'Visitantes - alterar';
        $data['titulo_interno'] =  'Alteração de cadatro do Visitante';
        echo view('layout/header', $data);

        $model = new \App\Models\VisitantesModel();
        $data['result'] = $model->update($Visitante);
        //dd($data);
        echo view('Visitantes/Visitantes_alterar', $data);

        echo view('layout/footer');
    }

    public function saida($codigo)
    {

        $model = new \App\Models\VisitantesModel();
        $data['result'] = $model->saida($codigo);

        $data['selecionado']=NULL;
        $data['result'] = $model->listarVisitantes();
        echo view('layout/header', $data);
        echo view('layout/Visitantes',$data);
        echo view('layout/footer');

    }

    public function salvar()
    {
        //echo 'Você está em Controller -> Visitantes -> alterar';
        $data['titulo'] = 'Visitantes - alterar';
        echo view('layout/header', $data);
        $model = new \App\Models\VisitantesModel();
        $data = $this->request->getPost();
        unset($data['submit']);
        //dd($data);
        if ($model->inserir($data)) {
            return view('messages', [
                'message' => 'Visitante cadastrado com sucesso!'
            ]);
        } else {
            echo 'Ocorreu um erro';
        }

        //$data['result'] = $model->alterarVisitante($Visitante);            


        echo view('layout/footer');
    }

    public function salvar_update($codigo)
    {
        //echo 'Você está em Controller -> Visitantes -> alterar';
        $data['titulo'] = 'Visitantes - alterar';
        echo view('layout/header', $data);

        $model = new \App\Models\VisitantesModel();
        $data = $this->request->getPost();
        unset($data['submit']);
        //dd($data);
        if ($model->update($data)) {
            return view('messages', [
                'message' => 'Visitante cadastrado com sucesso!'
            ]);
        } else {
            echo 'Ocorreu um erro';
        }
        echo view('layout/footer');
    }

    public function excluir($Visitante)
    {
        //echo 'Você está em Controller -> Visitantes -> excluir';

        $data['titulo'] = 'Visitantes - excluir';
        echo view('layout/header', $data);


        $model = new \App\Models\VisitantesModel();
        //if ($model->excluirVisitante($Visitante)) {
        if ($model->excluir($Visitante)) {
            echo view('messages', [
                'message' => 'Usuário excluído com sucesso'
            ]);
        } else {
            echo 'Erro';
        }

        $data['titulo_interno'] = 'Visitantes - excluir';
        //echo view('nome_da_view',$data);
        echo view('Visitantes/Visitantes_listartodos', [
            'result' => $model->listarVisitantes(),
            'titulo_interno' => 'Listagem de todos os Visitantes'
        ]);
        echo view('layout/footer');
    }

    public function getCepbyAPI($cep)
    {
        $client = \Config\Services::curlRequest();

        $requestGET = $client->request('GET', 'viacep.com.br/ws/' . $cep . '/json/');

        $dados = json_decode($requestGET->getBody());

        return $dados;
        //dd($dados->cep);
    }
}
