<?php

class Cliente extends CI_Controller {
    
    public function index(){
        echo "Voce esta na area de clientes";
    }

    public function novo() {
        $this->load->view("cliente_index.php");
    }
}
?>