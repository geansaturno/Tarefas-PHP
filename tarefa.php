<?php

    include 'utils.php';
    include 'banco.php';

    $erros = array();
    $editar = true;
    $temErro = false;

    if(havePosts()){

    }

    $id = $_GET['id'];

    $tarefa = buscaTarefa($conn, $id);

    $page['body'] = 'tarefa-body';

    include 'template.php';
