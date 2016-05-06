<?php

    include 'banco.php';

    deletarConcluidas($conn);

    header('Location: tarefas.php?#table');
