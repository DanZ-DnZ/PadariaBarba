<?php
    class ProdutoModel extends CI_Model{
        
        public function selecionarTodos(){
            $retorno = $this->db->query("SELECT p.*, t.nome AS tipo_produto FROM produto AS p INNER JOIN tipo_produto AS t ON p.tipo_produto = t.id");
            return $retorno->result();
        }

        public function selecionarWhere ( $clausua ){
        }

        public function inserir ( $data ){
            $this->db->insert("produto", $data);
        }

        public function excluir($id) {
            $this->db->query("DELETE FROM produto WHERE id = " .$id);
            return true;
        }

        public function salvaralteracao ( $data, $id ){
            $this->db->update("produto",$data, "id = ". $id);
            return true;
        }

        public function buscarId ( $id ){
            $retorno = $this->db->query("SELECT * FROM produto WHERE id = " . $id);
            return $retorno->result();
        }
    }
?>