<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/CSS.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>

    <header>
        <?php 
            // Usar require_once es ideal para componentes críticos como el menú.
            require_once('menu.php'); 
        ?>
    </header>

    <?php 
        // Puedes usar include, pero require_once es más seguro
        require_once('I-modal_I.php');
        require_once('D-modal_I.php'); 
    ?>


    <script src="js/info.js"></script>
    <script src="js/option.js"></script>

</body>

</html>