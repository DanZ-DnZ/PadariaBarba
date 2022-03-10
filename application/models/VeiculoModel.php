<?php
    class VeiculoModel extends CI_Model{
        
        public function selecionarTodos(){
            $retorno = $this->db->query("SELECT * FROM veiculo");
            return $retorno->result();
        }

        public function selecionarWhere ( $clausua ){
            //select * from veiculo where modelo LIKE '$clausula'
        }

        public function inserir ( $data ){
            $this->db->insert("veiculo", $data);
        }
    }
?>