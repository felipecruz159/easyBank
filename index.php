<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="easyBank">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link href="http://fonts.cdnfonts.com/css/aachen" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="image/logo-minimized.png">
    <!-- <link rel="icon" type="image/x-icon" href="imagens/favicon.ico"> -->

    <title>easyBank</title>
</head>

<body>

    <?php
    require "vendor/autoload.php";
    use \App\Entity\Conta;

    $contas = Conta::getContas();
    $page = @$_GET["page"];
    $dir = "page/";

    if ($page != "") {
        if (file_exists($dir . $page . ".php")) {
            if ($page != "cadastrar" && $page != "contas" && $page != "editar" && $page != "excluir" && $page != "sacar" && $page != "depositar") {
                include_once $dir."includes/header.php";
                include_once $dir.$page . ".php";
                include_once $dir."includes/footer.php";
            }
            else{
                include_once $dir."includes/header.php";
                include_once $dir.$page . ".php";
            }
        } else {
            include_once $dir."404.php";
        }
    } else {
        include_once $dir."includes/header.php";
        include_once $dir."home.php";
        include_once $dir."includes/footer.php";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="../js/custom.js"></script>

</body>

</html>