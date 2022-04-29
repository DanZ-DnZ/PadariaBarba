<?php

class Padaria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("ProdutoModel");
        $this->load->model("TipoProdutoModel");
    }

    public function index()
    {
        $this->load->model("produtomodel");

        $produtos = $this->produtomodel->selecionarTodos();
        $tabela = "";
        $slide = "";
        $col1 ="";
        $col2 ="";
        $i = 0;
        foreach ($produtos as $item) {
            $tabela .= "
                    <tr>
                        <td>" . $item->produto . "</td>
                        <td>" . ($item->perecivel == 1 ? "Sim" : "Não") . "</td>
                        <td>" . $item->valor . "</td>
                        <td>" . $item->tipo_produto . "</td>
                        <td>
                            <img src= '" . $item->imagem . "' style = 'width:100px' />
                        </td>
                    </tr>
                ";
            $slide .= "<div class='swiper-slide'>
            <a href='single-post.html' class='img-bg d-flex align-items-end' style='background-image: url('". $item->imagem ."');'>
              <div class='img-bg-inner'>
                <h2>" . $item->produto . "</h2>
                <p>Preço: " . $item->valor . "R$</p>
              </div>
            </a>
          </div>";
            if($i <= (sizeof($produtos)/2)){
                $col1 .= "<div class='post-entry-1'>
                <a href='single-post.html'><img src='". $item->imagem ."' alt='' class='img-fluid'></a>
                <h2><a href='single-post.html'>" . $item->produto . "</a></h2>
                <h2><a href='single-post.html'>R$" . $item->valor . "</a></h2>
              </div>";
            } else {
                $col2 .= "<div class='post-entry-1'>
                <a href='single-post.html'><img src='". $item->imagem ."' alt='' class='img-fluid'></a>
                <h2><a href='single-post.html'>" . $item->produto . "</a></h2>
                <h2><a href='single-post.html'>R$" . $item->valor . "</a></h2>
              </div>";
            }
            $i++;
        }
        
        $variavel = array(
            "lista_produtos" => $produtos,
            "tabela" => $tabela,
            "slide" => $slide,
            "col1" => $col1,
            "col2" => $col2,
            "titulo" => "Você está em Padaria Barba",
            "sucesso" => "Produto add com sucesso",
            "erro" => "ashduashu"
        );

        $this->template->load("templates/index", "produto/index", $variavel);
    }
}