<div class="btn-group m-b-1">
    <a href="deletarConcluidas.php" class="btn btn-danger">Deletar concluidas</a>
</div>

<table class="table">
    <legend>Tarefas</legend>
    <thead>
        <td>
            Tarefa
        </td>
        <td>
            Descrição
        </td>
        <td>
            Prazo
        </td>
        <td>
            Prioridade
        </td>
        <td>
            Concluida
        </td>
        <td>
            Opções
        </td>
    </thead>
    <tbody id="table">
        <?php foreach ($listaTarefas as $tarefa) :?>
            <tr id="t-row<?php echo $tarefa['id'] ?>">
               <td>
                   <a href="tarefa.php?id=<?php echo $tarefa['id'] ?>"><?php echo $tarefa['nome'] ?></a>
               </td>
               <td>
                   <?php echo $tarefa['desc'] ?>
               </td>
               <td>
                   <?php echo traduzirDataParaFormulario($tarefa['prazo']) ?>
               </td>
               <td>
                   <?php echo traduzirPrioridade($tarefa['priori']) ?>
               </td>
               <td>
                   <?php echo traduzirConcluida($tarefa['concluida']); ?>
               </td>
               <td>
                   <a href="editar.php?id=<?php echo $tarefa['id']?>"><span class="glyphicon glyphicon-search"></span></a>

                   <a href="remover.php?id=<?php echo $tarefa['id'] ?>"><span class="glyphicon glyphicon-remove text-danger"></span></a>

                   <a href="duplicar.php?id=<?php echo $tarefa['id'] ?>"><span class="glyphicon glyphicon-duplicate text-success"></span></a>
               </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
