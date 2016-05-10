<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="with=device-width, initial-scale=1">
        <title>Gerenciador de tarefas</title>

        <link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">

            <h1>Gerenciador de tarefas</h1>

            <?php if(isset($pagina['body'])) :?>
                <?php require "{$pagina['body']}.php" ?>

            <?php else : ?>
                <?php if($temErro) :?>
                    <?php foreach ($erros as $erro ) :?>
                        <div class="alert alert-danger">
                            <p>
                                <?php echo $erro; ?>
                            </p>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>

                <?php include 'form.php'; ?>
                <?php if(!$editar) : ?>
                    <?php include 'tabela.php'; ?>
                <?php endif; ?>
            <?php endif ?>
        </div>

        <script src="js/jquery.min.js" charset="utf-8"></script>
        <script src="js/bootstrap.min.js" charset="utf-8"></script>
        <script src="js/jquery.mask.min.js" charset="utf-8"></script>
        <script src="js/masks.js" charset="utf-8"></script>
    </body>
</html>
