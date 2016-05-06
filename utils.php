<?php

function tarefaBind($temErro, $erros){

    $tarefa = array();

    if(isset($_POST['nome']) && strlen($_POST['nome']) > 0){
        $tarefa['nome'] = $_POST['nome'];

    } else{
        $temErro = true;
        $erros['nome'] = "A tarefa deve conter um nome";
    }

    if(isset($_POST['desc'])){
        $tarefa['desc'] = $_POST['desc'];
    } else{
        $tarefa['desc'] = '';
    }

    if(isset($_POST['prazo'])){
        $tarefa['prazo'] = traduzirDataParaBanco($_POST['prazo']);
    } else{
        $tarefa['prazo'] = '';
    }

    if(isset($_POST['prioridade'])){
        $tarefa['priori'] = $_POST['prioridade'];
    } else{
        $tarefa['priori'] = '';
    }

    if(isset($_POST['concluida'])){
        $tarefa['concluido'] = 1;
    } else{
        $tarefa['concluido'] = 0;
    }

    return $tarefa;
}

function traduzirPrioridade($codigo){
    $prioridade = '';

    switch($codigo){
        case 0:
            $prioridade = "Indefinida";
            break;

        case 1:
            $prioridade = "Baixa";
            break;

        case 2:
            $prioridade = "Média";
            break;

        case 3:
            $prioridade = "Alta";
            break;
    }

    return $prioridade;
}

function traduzirDataParaBanco($data){

    if($data == ''){
        return '';
    }

    $dados = explode('/', $data);

    if(count($dados) < 3){
        return "";
    }

    $dataMysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

    return $dataMysql;
}

function traduzirDataParaFormulario($data){

    if(strlen($data) < 0){
        return '';
    }

    if($data == '' or $data == '0000-00-00'){
        return '';
    }

    $dados = explode("-", $data);

    $dataFormulario = "{$dados[2]}/{$dados[1]}/{$dados[0]}";

    return $dataFormulario;
}

function traduzirConcluida($data){
    if($data == 1){
        return "Sim";
    }

    return "Não";
}

function havePosts(){
    if(count($_POST) > 0){
        return true;
    }

    return false;
}

function validarData($dados){
    $pattern = "/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/";

    return preg_match($pattern, $dados);
}

function console_log($data){
    echo "<script>";
    echo "console.log(" . json_encode($data) . ")";
    echo "</script>";
}
