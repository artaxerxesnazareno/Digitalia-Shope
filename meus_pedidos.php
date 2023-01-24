<!DOCTYPE html>
<?php

include_once('app/gravar_verificacao.php');
include_once('app/carrinho.php');
include_once('app/selectProdutos.php');
include_once('cnx.php');
include_once('gravar_verificacao.php');
include_once('app/gravar_verificacao.php');
include_once('app/selectProdutos.php');
include_once('app/carrinho.php');
if (!isset($_SESSION['UsuarioID'])) header('Location: index.php');

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digitalia</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <li><a href="#"><i class=" user"></i> My Account</a></li>
                        <li><a href="#"><i class=" heart"></i> Wishlist</a></li>
                        <li><a href="cart.php"><i class=" user"></i> My Cart</a></li>
                        <li><a href="checkout.php"><i class=" user"></i> Checkout</a></li>
                        <?php
                        if(!isset($_SESSION['UsuarioID'])){
                            echo "<li><a href='admin/login.php'><i class=' user'></i> Login</a></li>";
                        }else{
                            echo "<li><a href='app/sair.php'><i class=' user'></i> Logout</a></li>";
                        }

                        if($_SESSION['UsuarioPermissao'] == "admin"){
                            echo "<li><a href='admin/index.php'><i class=' user'></i> DashBoard</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key"><?php if(isset($_SESSION)){ echo"$Semail";} ?> </span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="index.php"><span>Digitalia</span></a></h1>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="cart.php">Cart - <span class="cart-amunt"><?php
                            foreach($_SESSION['carrinho'] as $id => $qtd){

                                $resultado4=mysqli_query($cnx,"select *from produtos where id = $id") or die (mysqli_error());
//                                    $resultado4=mysqli_query($cnx,"select *from produtos where id = $id") or die (mysqli_error());
                                $data = mysqli_fetch_assoc($resultado4);
                                $final += $data['precoUnitario']*$qtd;
                                $conta=$conta + 1;
                            }
                            echo number_format($final,2,',','.');  ?> kz</span> <i class=" shopping-cart"></i> <span class="product-count"><?php echo $conta ?></span></a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li ><a href="shop.php">Loja</a></li>
                    <li><a href="shop_favoritos.php">Produtos Favoritos</a></li>
                    <li><a href="single-product.php">Produto unico</a></li>
                    <li><a href="cart.php">Carrinho</a></li>
                    <li><a href="checkout.php">Checkout</a></li>
                    <li class="active"><a href="meus_pedidos.php">Meus Pedidos</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Meus Pedidos</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<table class="table table-striped">
    <thead class="thead-dark">
    <tr>

        <th></th>
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
        $resultado4 = mysqli_query($cnx, "SELECT pedido.*, usuarios.nome AS nome_usuarios,produtos.imagem, 
produtos.precoUnitario,produtos.nome AS nome_produtos FROM pedido
INNER JOIN usuarios
ON pedido.idusuarios = usuarios.id INNER 
JOIN produtos
ON pedido.idprodutos= produtos.id where usuarios.id =  $Sid ") or die (mysqli_error());


        // Verificar se a consulta retornou algum resultado
        if (mysqli_num_rows($resultado4) > 0) {
            // Percorrer cada linha do resultado
            while ($data = mysqli_fetch_assoc($resultado4)) {
                // Processar os dados da linha aqui
                // Por exemplo, imprimir os valores das colunas

                $total = number_format($data['precoUnitario'] * $data['qtd'], 2, ',', '.');





                echo "<td><img src='upload_img/".$data['imagem'].".png' width='80'  </td>
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
                        echo '<button disabled name="botao" class="btn btn-primary">';
                        $estado++;
                        echo 'Em Espera ';
                    } else if ($estado == 2) {
                        echo '<button disabled name="botao" class="btn btn-warning">';
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
                echo "</tr>";

            }
        } else {
            echo "Nenhum resultado encontrado";
        }

        // Fechar a conexão
        mysqli_close($cnx);
        ?>





    <!-- Latest jQuery form server -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="js/main.js"></script>
</body>
</html>
