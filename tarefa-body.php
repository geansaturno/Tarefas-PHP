
<div class="container">

    <legend>Detalhes de <?php echo $tarefa['nome'] ?></legend>

    <?php if(isset($tarefa['prazo']) && strlen($tarefa['prazo'])) :?>
        <div class="panel panel-info">
            <div class="panel-heading">Prazo</div>
            <div class="panel-body">
                <?php echo traduzirDataParaFormulario($tarefa['prazo'])?>
            </div>
        </div>
    <?php endif ?>

    <?php if(isset($tarefa['desc']) && strlen($tarefa['desc'])) : ?>
        <div class="panel panel-info">
            <div class="panel-heading">Descrição</div>
            <div class="panel-body">
                <?php echo $tarefa['desc']?>
            </div>
        </div>
    <?php endif ?>

    <?php if(isset($tarefa['priori'])) :?>
        <div class="panel panel-info">
            <div class="panel-heading">Prioridade</div>
            <div class="panel-body">
                <?php echo traduzirPrioridade($tarefa['priori'])?>
            </div>
        </div>
    <?php endif ?>

    <?php if(isset($tarefa['concluida'])) :?>
        <div class="panel panel-info">
            <div class="panel-heading">Concluída</div>
            <div class="panel-body">
                <?php echo traduzirConcluida($tarefa['concluida'])?>
            </div>
        </div>
    <?php endif ?>

    <div class="panel panel-primary">
        <div class="panel-heading">Anexos</div>
        <div class="panel-body">
            <table class="table">

            </table>
            <form class="" action="tarefa.php<?php echo $tarefa['id'] ?>" method="post"     enctype="multipart/form-data">

                <input type="number" name="id" value="<?php echo $tarefa['id'] ?>" class="sr-only">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="file" name="anexo" value="" class="">
                    </div>
                    <span>ASASA</span>
                </div>
                <input type="submit" name="name" value="Enviar" class="btn btn-pr">

            </form>
        </div>
    </div>

</div>

<div class="">
    <a href="tarefas.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Voltar para tarefas</a>
</div>
