<?php

    include 'banco.php';

    $id = $_GET['id'];

    $tarefa = buscaTarefa($conn, $id);

    gravarTarefa($conn, $tarefa);

    header('Location: tarefas.php?#table');
    die();
