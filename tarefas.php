<?php
    session_start();

    include 'banco.php';
    include 'utils.php';

    $editar = false;
    $titulo = "Nova tarefa";
    $temErro = false;
    $erros = array();

    if(havePosts()){

        $tarefa = array();

        if(isset($_POST['nome']) && strlen($_POST['nome']) > 0){
            $tarefa['nome'] = $_POST['nome'];

        } else{
            $temErro = true;
            $erros['nome'] = "A tarefa deve conter um nome";
        }

        if(isset($_POST['desc'])){
            $tarefa['desc'] = $_POST['desc'];
        }

        if(isset($_POST['prazo']) && strlen($_POST['prazo']) > 0){
            if(validarData($_POST['prazo'])){
                $tarefa['prazo'] = traduzirDataParaBanco($_POST['prazo']);
            } else {
                $temErro = true;
                $erros['prazo'] = "{$_POST['prazo']} Não é uma data válida. Prazo inválido. Ex: dd/mm/aaaa";
            }
        } else{
            $tarefa['prazo'] = null;
        }

        if(isset($_POST['prioridade'])){
            $tarefa['priori'] = $_POST['prioridade'];
        }

        if(isset($_POST['concluida'])){
            $tarefa['concluida'] = 1;
        }

        $post = $_POST;

        if(!isset($post['desc'])){
            $tarefa['desc'] = '';
        }

        if(!isset($post['concluida'])){
            $tarefa['concluida'] = 0;
        }

        console_log($tarefa);

        if(!$temErro){

            gravarTarefa($conn, $tarefa);

            $_REQUEST['menssagem'] = "{$tarefa['nome']} salva com sucesso";

            header('Location: tarefas.php?');
            die();
        }
    }

    $tarefa = array(
        'id' => 0,
        'nome' => (isset($_POST['nome'])) ? $_POST['nome'] : '',
        'desc' => (isset($_POST['desc'])) ? $_POST['desc'] : '',
        'prazo' => (isset($_POST['prazo'])) ? traduzirDataParaBanco($_POST['prazo']) : '',
        'priori' => (isset($_POST['prioridade'])) ? $_POST['prioridade'] : 2,
        'concluida' => (isset($_POST['concluida'])) ? $_POST['concluida'] : 0
    );

    $listaTarefas = buscaTarefas($conn);

    include "template.php";
