<?php

class TipoProduto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("TipoProdutoModel");
        $this->load->model("ProdutoModel");

        if (!isset($_SESSION["tesi2022"])) {
            echo "você precisa estar logado";
            header("location: http://127.0.0.1/codeigniter/index.php/login/");
        }
    }
    public function index()
    {
        

        $tipoProduto = $this->TipoProdutoModel->selecionarTodos();
        $tabela = "";
        foreach ($tipoProduto as $item) {
            $tabela .= "
                    <tr>";
            if (isset($_SESSION["tesi2022"])) {
                $tabela .= "
                <td style='cursor: pointer'>
                    <a href='/codeigniter/index.php/tipoproduto/alterar?codigo=" . $item->id . "'>
                    ✏️
                    </a>
                    <a href='/codeigniter/index.php/tipoproduto/excluir?codigo=" . $item->id . "'>
                    ❌
                    </a>
                </td>";
            }
            $tabela .= "
                    
                        <td>" . $item->id . "</td>
                        <td>" . $item->nome . "</td>
                    </tr>
                ";
        }
        $variavel = array(
            "tipo_produto" => $tipoProduto,
            "tabela" => $tabela
        );

        $this->template->load("templates/adminTemp", "tipoproduto/index", $variavel);
    }

    public function novo()
    {
        $nome = $_POST['nome'];
        $achouProduto = $this->TipoProdutoModel->buscarTipo($nome);
        if (sizeof($achouProduto) > 0){
            echo "<script>alert('Tipo ja existe')</script>";
            $this->template->load("templates/adminTemp", "tipoproduto/formNovo");
            return;
        }
        
        $data = array(
            "nome" => $nome
        );
        $retorno = $this->TipoProdutoModel->inserir($data);
        if ($retorno) {
            echo "<script>alert('Cadastrado')</script>";
            header('location: /codeigniter/index.php/tipoproduto');
        } else {
            echo "<script>alert('houve erro na alteração')</script>";
            $this->template->load("templates/adminTemp", "tipoproduto/formNovo");
        }
    }

    public function alterar()
    {

        $id = $_GET["codigo"];

        $retorno = $this->TipoProdutoModel->buscarid($id);

        $data = array(
            "tipoProduto" => $retorno[0],
            "titulo" => "Alteração de tipos"
        );

        $this->template->load("templates/adminTemp", "tipoproduto/formAlterar", $data);
    }

    public function salvaralteracao()
    {
        $id = $_POST["id"];
        $nome = $_POST['nome'];
        $achouProduto = $this->TipoProdutoModel->buscarTipo($nome);
        $retorno = $this->TipoProdutoModel->buscarid($id);

        $data = array(
            "tipoProduto" => $retorno[0],
            "titulo" => "Alteração de tipos"
        );
        if (sizeof($achouProduto) > 0){
            echo "<script>alert('Tipo já Existe')</script>";
            $this->template->load("templates/adminTemp", "tipoproduto/formAlterar", $data);
            return;
        }

        $data = array(
            "nome" => $nome
        );

        $retorno = $this->TipoProdutoModel->salvaralteracao($data, $id);

        if ($retorno) {
            header('location: /codeigniter/index.php/tipoproduto');
        } else {
            echo "houve erro na alteração";
        }
    }

    public function formNovo()
    {
        
        $this->template->load("templates/adminTemp", "tipoproduto/formNovo");
    }


    public function excluir()
    {

        $id = $_GET["codigo"];

        $retorno = $this->TipoProdutoModel->excluir($id);

        if ($retorno) {
            header('location: /codeigniter/index.php/tipoproduto');
        } else {
            echo "houve erro na alteração";
        }
    }
}
