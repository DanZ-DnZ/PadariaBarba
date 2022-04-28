<?php

class LoginModel extends CI_Model
{

    public function registrar($data)
    {
        try {

            if ($this->validaEmail($data["email"])) {
                $this->db->insert('usuario', $data);
                return true;
            } else
                return false;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function validaEmail($email)
    {
        $sql = "SELECT count(1) as total FROM usuario WHERE email = '" . $email . "'";
        $retorno = $this->db->query($sql)->result();
        if ($retorno[0]->total == 0)
            return true;
        return false;
    }

    public function validaLogin($email, $senha)
    {
        $sql = "SELECT COUNT(1) as total FROM usuario WHERE email = '" . $email . "' AND senha = '" . $senha . "'";

        $retorno = $this->db->query($sql)->result();
        if ($retorno[0]->total == 0)
            return false;
        return true;
    }
}
