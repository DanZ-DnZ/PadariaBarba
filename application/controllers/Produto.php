<?php

class Produto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("ProdutoModel");
        $this->load->model("TipoProdutoModel");
        if (!isset($_SESSION["tesi2022"])) {
            echo "você precisa estar logado";
            header("location: http://127.0.0.1:8080/login/");
        }
    }

    public function index()
    {
        $this->load->model("produtomodel");

        $produtos = $this->produtomodel->selecionarTodos();
        $tabela = "";
        foreach ($produtos as $item) {
            $tabela .= "
                    <tr>";
            if (isset($_SESSION["tesi2022"])) {
                $tabela .= "
                <td style='cursor: pointer'>
                    <a href='/produto/alterar?codigo=" . $item->id . "'>
                    ✏️
                    </a>
                    <a href='/produto/excluir?codigo=" . $item->id . "'>
                    ❌
                    </a>
                </td>";
            }
            $tabela .= "
                        <td>" . $item->produto . "</td>
                        <td>" . ($item->perecivel == 1 ? "Sim" : "Não") . "</td>
                        <td>" . $item->valor . "</td>
                        <td>" . $item->tipo_produto . "</td>
                        <td>
                            <img src= '" . $item->imagem . "' style = 'width:100px' />
                        </td>
                    </tr>
                ";
        }
        $variavel = array(
            "lista_produtos" => $produtos,
            "tabela" => $tabela,
            "titulo" => "Você está em Padaria Barba",
            "sucesso" => "Produto add com sucesso",
            "erro" => "ashduashu"
        );

        $this->template->load("templates/adminTemp", "produto/index", $variavel);
    }

    public function novo()
    {
        $produto = $_POST["produto"];
        $perecivel = $_POST['perecivel'];
        $valor = $_POST['valor'];
        $tipo = $_POST['tipo_produto'];
        $imagem = $_POST['imagem'];

        $data = array(
            "produto" => $produto,
            "perecivel" => $perecivel,
            "valor" => $valor,
            "tipo_produto" => $tipo,
            "imagem" => $imagem
        );
        $this->ProdutoModel->inserir($data);
        header('location: /produto');
    }

    public function formNovo()
    {
        echo ("cheguei");
        $option = $this->montaComboTipos(0);
        $data = array(
            "opcoes" => $option
        );
        $this->template->load("templates/adminTemp", "produto/formNovo", $data);
    }

    private function montaComboTipos($idTipoProduto)
    {
        $produtos = $this->TipoProdutoModel->selecionarTodos();
        $option = "";
        foreach ($produtos as $linhas) {
            $selecionado = "";
            if ($idTipoProduto == $linhas->id) {
                $selecionado = "selected";
            }
            $option .= "<option value ='" . $linhas->id . "'
            " . $selecionado . "
            >"
                . $linhas->nome . " </option>";
        }

        return $option;
    }

    public function excluir()
    {

        $id = $_GET["codigo"];

        $retorno = $this->ProdutoModel->excluir($id);

        if ($retorno) {
            header('location: /produto');
        } else {
            echo "houve erro na alteração";
        }
    }

    public function salvaralteracao()
    {
        $id = $_POST["id"];
        $produto = $_POST["produto"];
        $perecivel = $_POST['perecivel'];
        $valor = $_POST['valor'];
        $tipo = $_POST['tipo_produto'];
        $imagem = $_POST['imagem'];

        $data = array(
            "produto" => $produto,
            "perecivel" => $perecivel,
            "valor" => $valor,
            "tipo_produto" => $tipo,
            "imagem" => $imagem
        );

        $retorno = $this->ProdutoModel->salvaralteracao($data, $id);

        if ($retorno) {
            header('location: /produto');
        } else {
            echo "houve erro na alteração";
        }
    }

    public function alterar()
    {

        $id = $_GET["codigo"];

        $retorno = $this->ProdutoModel->buscarid($id);

        $data = array(
            "produto" => $retorno[0],
            "titulo" => "Alteração de veículos",
            "opcoes" => $this->montaComboTipos($retorno[0]->tipo_produto)
        );

        $this->template->load("templates/adminTemp", "produto/formAlterar", $data);
    }
}
