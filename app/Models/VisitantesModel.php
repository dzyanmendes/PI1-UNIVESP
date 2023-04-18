<?php

namespace App\Models;

use CodeIgniter\Model;

class VisitantesModel {

    protected $DBGroup = 'default';
    protected $table = 'visitantes';
    protected $primarKey = 'codigo';
    protected $autoincrement = true;
    protected $insertID = 0;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $protectFields=true;
    protected $allowedFields=[
                                'codigo',
                                'cpf',
                                'nascimento',
                                'nome',
                                'telefone',
                                'observacao',
                                'data_entrada',
                                'data_saida',
                                'acampamento',
                                'contato_emergencia_nome',
                                'contato_emergencia_telefone'
    ];

    // Dates
    protected $useTimeStamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deletec_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = false;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function testeBd() {
        $db = \Config\Database::connect();
        //$sql = file_get_contents(__DIR__ . '\SQL\Visitantes_testar.sql');
        $sql='select * from visitantes';
        $query = $db->query($sql);
        $resultado = $query->getResultArray();
        return $resultado;
    }

    public function listarVisitantes() {
        $db = \Config\Database::connect();
        //$sql = file_get_contents(__DIR__ . '\SQL\Visitantes_listar_todos.sql');
        $sql='select visitantes.*
                from visitantes
                order by visitantes.codigo desc
            ';
        $query = $db->query($sql);
        $resultado = $query->getResult();
        return $resultado;
    }

    public function listarPorCodigoObject($codigo) {
        $db = \Config\Database::connect();
        //$sql = file_get_contents(__DIR__ . '\SQL\Visitantes_listar_especifico.sql');
        $sql='select * from visitantes where codigo='.$codigo;
        $query = $db->query($sql);
        $resultado = $query->getResult();
        return $resultado;
    }

    public function listarPorCodigoArray($codigo) {
        $db = \Config\Database::connect();
        //$sql = file_get_contents(__DIR__ . '\SQL\Visitantes_alterar.sql');
        $sql='select * from visitantes where codigo='.$codigo;
        $query = $db->query($sql);
        $resultado = $query->getResult();
        return $resultado;
    }    

    public function excluir($codigo) {
        $db = \Config\Database::connect();
        //$sql = file_get_contents(__DIR__ . '\SQL\Visitantes_excluir.sql');
        $table=$db->table($this->table);
        $table->where('codigo',$codigo);
        if($table->delete()){
            return true;
        }
        return false;
    }    

    public function inserir($dados) {
        $db = \Config\Database::connect();
        //$sql = file_get_contents(__DIR__ . '\SQL\Visitantes_excluir.sql');
        
        if($db->table($this->table)->insert($dados)){
            return true;
        }
        return false;
    }    

    public function update($dados) {
        $db = \Config\Database::connect();
        //$sql = file_get_contents(__DIR__ . '\SQL\Visitantes_excluir.sql');
        
        $table=$db->table($this->table);
        $table->where('codigo',$dados['codigo']);
        if($table->update($dados)){
            return true;
        }
        return false;
    }    

    public function saida($codigo) {
        $db = \Config\Database::connect();
        //$sql = file_get_contents(__DIR__ . '\SQL\Visitantes_excluir.sql');
        
        $sql='update visitantes set data_saida=now() where codigo='.$codigo;
        $query = $db->query($sql);

        return true;
    }    
}