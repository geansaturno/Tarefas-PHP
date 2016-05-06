<?php

$dbServer = "localhost";
$dbUser = "st";
$dbSenha = "";
$dbBanco = "st";

$conn = mysqli_connect($dbServer, $dbUser, $dbSenha, $dbBanco);

if(mysqli_connect_errno($conn)){
    echo "Não foi possível conectar";

    die();
}

function buscaTarefas($conn){
    $sql = "SELECT * FROM tartarefas";

    $resultados = mysqli_query($conn, $sql);

    $tarefas = array();

    while ($row = mysqli_fetch_assoc($resultados)) {
        $tarefas[] = tarefaFactory($row);
    }

    return $tarefas;
}

function buscaTarefa($conn, $id){
    $sqlBuscaTarefa = "select * from tartarefas where id = {$id}";

    $resultados = mysqli_query($conn, $sqlBuscaTarefa);

    return tarefaFactory(mysqli_fetch_assoc($resultados));
}

function gravarTarefa($conn, $tarefa){
    console_log($tarefa);
    $sql = "
        INSERT INTO tartarefas
        (c_tarnome, c_tardesc, i_tarpriori, b_tardone)
        VALUES
        (
            '{$tarefa['nome']}',
            '{$tarefa['desc']}',
            '{$tarefa['priori']}',
            '{$tarefa['concluida']}'
        )
    ";

    console_log($sql);

    if(!mysqli_query($conn, $sql)){
        die(mysqli_error($conn));
    }

    if(isset($tarefa['prazo']) && strlen($tarefa['prazo']) > 0){
        $tarefa['id'] = mysqli_insert_id($conn);

        $sql = "UPDATE tartarefas SET
            d_tarprazo = '{$tarefa['prazo']}'
            WHERE i_tarid = {$tarefa['id']}
        ";

        if (!mysqli_query($conn, $sql)){
            echo $sql;
            die(mysqli_error($conn));
        }
    }
}

function alterarTarefa($conn, $tarefa){

    $sqlAlterar = "
        update tartarefas
        set
            c_tarnome = '{$tarefa['nome']}',
            c_tardesc = '{$tarefa['desc']}',
            d_tarprazo = '{$tarefa['prazo']}',
            i_tarpriori = {$tarefa['priori']},
            b_tardone = {$tarefa['concluida']}
        where id = {$tarefa['id']}
            ";
    if (!mysqli_query($conn, $sqlAlterar)){
        die(mysqli_error($conn));
    }
}

function deletarTarefa($conn, $id){
    $sqlDeletar = "delete from tartarefas where id = {$id}";

    if(!mysqli_query($conn, $sqlDeletar)){
        die(mysqli_error($conn));
    }
}

function buscarUltimaTarefa($conn){
    $sqlBusca = "select * from tartarefa order by id limit 1";

    $resultado = mysqli_query($conn, $sqlBusca);

    $tarefa = tarefaFactory(mysqli_fetch_assoc($resultado));

    return $tarefa;
}

function deletarConcluidas($conn){

    $sqlDeletar = "delete from tartarefas where b_tardone = 1";

    if(!mysqli_query($conn, $sqlDeletar)){
        die(mysqli_error($conn));
    }
}

function tarefaFactory($row){

    $tarefa['id'] = $row['i_tarid'];
    $tarefa['nome'] = $row["c_tarnome"];
    $tarefa['desc'] = $row['c_tardesc'];
    $tarefa['prazo'] = $row['d_tarprazo'];
    $tarefa['priori'] = $row['i_tarpriori'];
    $tarefa['concluida'] = $row['b_tardone'];

    return $tarefa;
}
