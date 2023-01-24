<!DOCTYPE html>
<?php

include_once('cnx.php');
include_once('gravar_verificacao.php');
include_once('app/gravar_verificacao.php');
include_once('app/selectProdutos.php');
include_once('app/carrinho.php');
if (!isset($_SESSION['UsuarioID'])) header('Location: index.php');
?>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>pedidos</title>

    <!-- Fontfaces CSS-->
    <link href="admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="admin/vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="admin/css/theme.css" rel="stylesheet" media="all">

</head>
<body>
<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="index.php">
                        <img src="images/icon/digitalia.png" alt="digitalia"/>
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>

    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="../index.php">
                <img src="admin/images/icon/logoDigitalia.png" alt="Digitalia"/>
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list ">

                    <li >
                        <a href="admin/index.php">CONTROLER</a>
                    </li>
                    <li class="active">
                        <a href="pedidos.php">PEDIDOS</a>
                    </li>
                    <li >
                        <a href="dashbordUploadBanner.php">BANNER</a>
                    </li>
                </ul>


        </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->

<div class="page-container">
    <table class="table">
        <thead class="thead-dark">
        <tr>

            <th>Id</th>
            <th>cliente</th>
            <th>Produto</th>

            <th>cidade</th>
            <th>endereco</th>
            <th>Quantidade</th>
            <th>preco</th>
            <th>Estado</th>


        </tr>
        </thead>
        <tbody>
        <tr class="tr-shadow" scope="row">
            <?php
$resultado4 = mysqli_query($cnx, "SELECT pedido.*, usuarios.nome AS nome_usuarios, 
produtos.precoUnitario,produtos.nome AS nome_produtos FROM pedido
INNER JOIN usuarios
ON pedido.idusuarios = usuarios.id INNER 
JOIN produtos
ON pedido.idprodutos= produtos.id; ") or die (mysqli_error());

//$produto = $data['id'];
//echo "produto ".$data['id']."";

// Verificar se a consulta retornou algum resultado
if (mysqli_num_rows($resultado4) > 0) {
    // Percorrer cada linha do resultado
    while ($data = mysqli_fetch_assoc($resultado4)) {
        // Processar os dados da linha aqui
        // Por exemplo, imprimir os valores das colunas

        $total = number_format($data['precoUnitario'] * $data['qtd'], 2, ',', '.');





        echo "<td>".$data['id']."</td>
              <td>".$data['nome_usuarios']."</td>
              <td>".$data['nome_produtos']."</td>
              <td>".$data['cidade']."</td>
              <td>".$data['endereco']."</td>
              <td>".$data['qtd']."</td>
              <td>".$total."</td>";
        echo "<td>";
        if (isset($_POST[$data['id']])) {
            $estado = (int)$_POST[$data['id']];
        } else {
            $estado = 1;
        }
        if ($estado == 3 or $data['vendido']) {
            // se o estado for 4, desabilita o botão
            echo '<button disabled class="btn btn-success">Entregue</button>';

            // Crie a consulta INSERT
            $sql = "UPDATE`pedido` SET vendido =1 where id=".$data['id']."";
            mysqli_query($cnx, $sql);
        } else {
            // se o estado não for 4, exibe o botão e armazena o estado atual no formulário
            echo '<form method="post">';
            if ($estado == 1) {
                echo '<button name="botao" class="btn btn-primary">';
                $estado++;
                echo 'Enviar ';
            } else if ($estado == 2) {
                echo '<button name="botao" class="btn btn-warning">';
                $estado++;
                echo 'Enviando';
            } else if ($estado == 3) {
                $estado++;
                echo 'Entregue';
            }
            echo '</button>';
            echo '<input type="hidden" name="'.$data['id'].'" value="' . $estado . '">';
            echo '</form>';
        }
        echo "</td>";

echo "</tr>";

    }
} else {
    echo "Nenhum resultado encontrado";
}

// Fechar a conexão
mysqli_close($cnx);
?>


</body>
</html>