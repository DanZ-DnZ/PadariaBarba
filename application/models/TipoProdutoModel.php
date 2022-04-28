<?php
    class TipoProdutoModel extends CI_Model{
        
        public function selecionarTodos(){
            $retorno = $this->db->query("SELECT * FROM tipo_produto");
            return $retorno->result();
        }

        public function selecionarWhere ( $clausua ){
        }

        public function inserir ( $data ){
            $this->db->insert("tipo_produto", $data);
            return true;
        }

        public function buscarTipo ( $tipoProduto ){
            $retorno = $this->db->query("SELECT * FROM tipo_produto WHERE nome LIKE '%" . $tipoProduto . "%'");
            return $retorno->result();
        }

        public function excluir($id) {
            $this->db->query("DELETE FROM tipo_produto WHERE id = " .$id);
            return true;
        }

        public function salvaralteracao ( $data, $id ){
            $this->db->update("tipo_produto",$data, "id = ". $id);
            return true;
        }

        public function buscarId ( $id ){
            $retorno = $this->db->query("SELECT * FROM tipo_produto WHERE id = " . $id);
            return $retorno->result();
        }
    }
    
?>