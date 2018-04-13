<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 08/03/18
 * Time: 16:41
 */

require_once '../model/CategoriaCrud.php';
require_once "../model/Categoria.php";

    $crud = new CategoriaCrud();

    if (isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = 'index';
    }

    switch ($action){
        case 'index':
            $categorias = $crud->getCategorias();
            include '../views/templates/cabecalho.php';
            include '../views/categorias/index.php';
            include '../views/templates/rodape.php';
            break;

        case 'show';
            $categoria = $crud->getCategoria($_GET['id']);
            include '../views/templates/cabecalho.php';
            include '../views/categorias/show.php';
            include '../views/templates/rodape.php';
    }