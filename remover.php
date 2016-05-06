<?php

    include 'banco.php';

    $id = $_GET['id'];

    deletarTarefa($conn, $id);

    header ("Location: tarefas.php?#table");
    die();
