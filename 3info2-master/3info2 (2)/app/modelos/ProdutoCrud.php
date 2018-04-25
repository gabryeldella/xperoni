<?php


require_once "Conexao.php";
require_once "Produto.php";

class ProdutoCrud
{

    private $conexao;
    private $produto;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function salvar(Produto $produto)
    {
        $sql = "INSERT INTO produto (nome_produto, descricao_produto, preco_produto, id_categoria, foto_produto) VALUES ('$produto->nome', '$produto->descricao', $produto->preco, '$produto->id_categoria','$produto->foto')";

        $this->conexao->exec($sql);
    }

    public function getProduto(int $id)
    {
        $consulta = $this->conexao->query("SELECT * FROM produto WHERE id_produto = $id");
        $produto = $consulta->fetch(PDO::FETCH_ASSOC);

        return new Produto($produto['nome_produto'], $produto['preco_produto'], $produto['id_categoria'], $produto['id_produto'], $produto['foto_produto']);

    }

    public function getProdutos()
    {
        $consulta = $this->conexao->query("SELECT * FROM produto");
        $arrayProdutos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $listaProdutos = [];
        foreach ($arrayProdutos as $produto) {

            $listaProdutos [] = new Produto($produto['nome_produto'], $produto['preco_produto'], $produto['id_categoria'], $produto['id_produto'], $produto['foto_produto']);
        }

        return $listaProdutos;
    }

    public function excluirProduto(int $id)
    {

        //DELETE FROM table_name WHERE condition;
        $this->conexao->query("DELETE FROM produto WHERE id_produto = $id_produto");
    }

    public function editar(Produto $produto){

        $this->conexao->exec("UPDATE produto SET nome ='$produto->nome', preco = $produto->preco, categoria = '$produto->categoria', foto_produto= '$produto->foto' WHERE id_produto = $produto->id ");
    }


}

