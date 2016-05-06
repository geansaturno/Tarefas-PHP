<?php

    include 'utils.php';
    include 'banco.php';

    $editar = true;
    $titulo = "Alterar tarefa";
    $temErro = false;
    $erros = array();

    $tarefa = array();

    $post = $_POST;

    if(havePosts()){

        if(isset($post['nome']) && strlen($post['nome']) > 0){
            $tarefa['nome'] = $post['nome'];
        } else {
            $temErro = true;
            $erros['nome'] = "A tarefa deve ter um nome";
        }

        if(isset($post['desc'])){
            $tarefa['desc'] = $post['desc'];
        }

        if(isset($post['prazo']) && strlen($post['prazo'] > 0)){
            if(validarData($post['prazo'])){
                $tarefa['prazo'] = traduzirDataParaBanco($post['prazo']);
            } else {
                $temErro = true;
                $erros['prazo'] = "{$post['prazo']} não é uma data valida. Ex: dd/mm/aaaa";
            }
        }

        if(isset($post['prioridade'])) {
            $tarefa['priori'] = $post['prioridade'];
        }

        if(isset($post['concluida'])){
            $tarefa['concluido'] = $post['concluida'];
        } else{
            $tarefa['concluido'] = 0;
        }

        $tarefa['id'] = $_POST['id'];

        if(!$temErro){
            alterarTarefa($conn, $tarefa);

            $args = "?#t-row{$tarefa['id']}";

            header('Location: tarefas.php' . $args);
            die();
        }
    }

    $id = $_GET['id'];

    $tarefa = buscaTarefa($conn, $id);

    $tarefa['nome'] = (isset($post['nome'])) ? $post['nome'] : $tarefa['nome'];
    $tarefa['desc'] = (isset($post['desc'])) ? $post['desc'] : $tarefa['desc'];
    $tarefa['prazo'] = (isset($post['prazo'])) ? traduzirDataParaBanco($post['prazo']) : $tarefa['prazo'];
    $tarefa['priori'] = (isset($post['prioridade'])) ? $post['prioridade'] : $tarefa['priori'];
    $tarefa['concluido'] = (isset($post['concluida'])) ? $post['concluida'] : $tarefa['concluido'];

    include 'template.php';
