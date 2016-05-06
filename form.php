<form class="" action="" method="POST">
    <fieldset>
        <legend><?php echo $titulo; ?></legend>
        <input type="number" name="id" hidden="true" value="<?php echo $tarefa['id']; ?>">
        <div class="row">
            <div class="form-group col-sm-4 <?php echo (isset($erros['nome'])) ? 'has-error' : ''; ?>">
                <label for="nome" class="control-label">Nome da tarefa</label>
                <input type="text" name="nome" value="<?php echo $tarefa['nome'] ?>" id="nome" autofocus="true" class="form-control">
            </div>
            <div class="form-group col-sm-4 <?php echo (isset($erros['prazo'])) ? 'has-error' : ''?>">
                <label for="" class="control-label">Prazo (Opicional)</label>
                <input type="text" name="prazo" id="prazo" value="<?php echo traduzirDataParaFormulario($tarefa['prazo']) ?>" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="">Descrição (Opicional)</label>
            <textarea name="desc" rows="8" cols="40" class="form-control"><?php echo $tarefa['desc']; ?></textarea>
        </div>

        <fieldset>
            <legend>Prioridade</legend>
            <div class="form-group">
                <label for="">Baixa</label>
                <input type="radio" name="prioridade" value="1" <?php echo ($tarefa['priori'] == 1) ? 'checked' : "" ?>>
                <label for="">Média</label>
                <input type="radio" name="prioridade" value="2" <?php echo ($tarefa['priori'] == 2) ? "checked" : "" ?>>
                <label for="">Alta</label>
                <input type="radio" name="prioridade" value="3" <?php echo ($tarefa['priori'] == 3) ? "checked" : ""; ?>>
            </div>
        </fieldset>

        <div class="form-group">
            <label for="">Tarefa Concluida</label>
            <input type="checkbox" name="concluida" value="1" <?php echo ($tarefa['concluida'] == 1) ? "checked" : ""; ?>>
        </div>

        <div class="btn-group m-b-1">
            <input type="submit" name="" value="Enviar" class="btn btn-primary">
            <?php if($editar): ?>
                <a href="tarefas.php" class="btn btn-danger">Cancelar</a>
            <?php endif ?>
        </div>
    </fieldset>
</form>
