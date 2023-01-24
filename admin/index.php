<!DOCTYPE html>

<?php
include_once('../app/gravar_verificacao.php');
include_once('../app/admin_verifica.php');
include_once('../app/selectProdutos.php');
include_once('../app/carrinho.php');


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
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
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
        <!--   <nav class="navbar-mobile">
               <div class="container-fluid">
                   <ul class="navbar-mobile__list list-unstyled">
                       <li class="has-sub">
                           <a class="js-arrow" href="#">
                               <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                           <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                               <li>
                                   <a href="index.php">Dashboard 1</a>
                               </li>
                               <li>
                                   <a href="index2.php">Dashboard 2</a>
                               </li>
                               <li>
                                   <a href="index3.php">Dashboard 3</a>
                               </li>
                               <li>
                                   <a href="index4.php">Dashboard 4</a>
                               </li>
                           </ul>
                       </li>
                       <li>
                           <a href="chart.php">
                               <i class="fas fa-chart-bar"></i>Gráficos</a>
                       </li>
                       <li>
                           <a href="table.php">
                               <i class="fas fa-table"></i>Tabelas</a>
                       </li>
                       <li>
                           <a href="form.php">
                               <i class="far fa-check-square"></i>Formulários</a>
                       </li>
                       <li>
                           <a href="calendar.php">
                               <i class="fas fa-calendar-alt"></i>Calendario</a>
                       </li>
                       <li>
                           <a href="map.php">
                               <i class="fas fa-map-marker-alt"></i>Mapas</a>
                       </li>
                       <li class="has-sub">
                           <a class="js-arrow" href="#">
                               <i class="fas fa-copy"></i>Paginas</a>
                           <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                               <li>
                                   <a href="login.php">Login</a>
                               </li>
                               <li>
                                   <a href="register.php">Registar</a>
                               </li>
                               <li>
                                   <a href="forget-pass.php">Password Esquecida</a>
                               </li>
                           </ul>
                       </li>
                       <li class="has-sub">
                           <a class="js-arrow" href="#">
                               <i class="fas fa-desktop"></i>UI Elementos</a>
                           <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                               <li>
                                   <a href="button.php">Button</a>
                               </li>
                               <li>
                                   <a href="badge.php">Badges</a>
                               </li>
                               <li>
                                   <a href="tab.php">Tabs</a>
                               </li>
                               <li>
                                   <a href="card.php">Cards</a>
                               </li>
                               <li>
                                   <a href="alert.php">Alertas</a>
                               </li>
                               <li>
                                   <a href="progress-bar.php">Progress Bars</a>
                               </li>
                               <li>
                                   <a href="modal.php">Modals</a>
                               </li>
                               <li>
                                   <a href="switch.php">Switchs</a>
                               </li>
                               <li>
                                   <a href="grid.php">Grids</a>
                               </li>
                               <li>
                                   <a href="fontawesome.php">Fontawesome Icon</a>
                               </li>
                               <li>
                                   <a href="typo.php">Typography</a>
                               </li>
                           </ul>
                       </li>
                   </ul>
               </div>
           </nav>-->
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="../index.php">
                <img src="images/icon/logoDigitalia.png" alt="Digitalia"/>
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list  ">

                            <li class="active">
                                <a href="index.php">CONTROLER</a>
                            </li>

                            <li>
                                <a href="../pedidos.php">PEDIDOS</a>
                            </li>
                    <li class="active">
                        <a href="../dashbordUploadBanner.php">BANNER</a>
                    </li>
                        </ul>

                    <!--
                    <li>
                        <a href="chart.php">
                            <i class="fas fa-chart-bar"></i>Charts</a>
                    </li>
                    <li>
                        <a href="table.php">
                            <i class="fas fa-table"></i>Tables</a>
                    </li>
                    <li>
                        <a href="form.php">
                            <i class="far fa-check-square"></i>Forms</a>
                    </li>
                    <li>
                        <a href="calendar.php">
                            <i class="fas fa-calendar-alt"></i>Calendar</a>
                    </li>
                    <li>
                        <a href="map.php">
                            <i class="fas fa-map-marker-alt"></i>Maps</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>Pages</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="login.php">Login</a>
                            </li>
                            <li>
                                <a href="register.php">Register</a>
                            </li>
                            <li>
                                <a href="forget-pass.php">Forget Password</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-desktop"></i>UI Elements</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="button.php">Button</a>
                            </li>
                            <li>
                                <a href="badge.php">Badges</a>
                            </li>
                            <li>
                                <a href="tab.php">Tabs</a>
                            </li>
                            <li>
                                <a href="card.php">Cards</a>
                            </li>
                            <li>
                                <a href="alert.php">Alerts</a>
                            </li>
                            <li>
                                <a href="progress-bar.php">Progress Bars</a>
                            </li>
                            <li>
                                <a href="modal.php">Modals</a>
                            </li>
                            <li>
                                <a href="switch.php">Switchs</a>
                            </li>
                            <li>
                                <a href="grid.php">Grids</a>
                            </li>
                            <li>
                                <a href="fontawesome.php">Fontawesome Icon</a>
                            </li>
                            <li>
                                <a href="typo.php">Typography</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>-->
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->

        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->

        <?php
        $resultado4 = mysqli_query($cnx, "SELECT pedido.*,
produtos.precoUnitario,produtos.nome AS nome_produtos FROM pedido
INNER
JOIN produtos
ON pedido.idprodutos= produtos.id WHERE pedido.vendido=1; ") or die (mysqli_error());


        if (mysqli_num_rows($resultado4) > 0) {
            // Percorrer cada linha do resultado
            while ($data = mysqli_fetch_assoc($resultado4)) {
                // Processar os dados da linha aqui
                // Por exemplo, imprimir os valores das colunas

                $total = number_format($data['precoUnitario'] * $data['qtd'], 2, ',', '.');
                $total_final += $data['precoUnitario'] * $data['qtd'];
                $total_vendido += $data['qtd'];
                $final = $total_final;

            }
        }



        ?>

        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                    <div class="row m-t-25">
                        <div class="col-sm-6 col-lg-4">
                            <div class="overview-item overview-item--c1">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="zmdi zmdi-account-o"></i>
                                        </div>
                                        <div class="text">
                                            <?php
                                            $resultado_usuarios = mysqli_query($cnx, "SELECT * FROM usuarios ") or die (mysqli_error());
                                            $numero_usuarios = mysqli_num_rows($resultado_usuarios);
                                            echo "<h2>$numero_usuarios</h2>";
                                            ?>

                                            <span>USUARIOS</span>
                                        </div>
                                    </div>
                                    <div class="overview-chart">
                                        <canvas id="widgetChart1"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="overview-item overview-item--c2">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="zmdi zmdi-shopping-cart"></i>
                                        </div>
                                        <div class="text">
                                            <?php echo"<h2>$total_vendido</h2>";
                                            ?>
                                            <span>items solid</span>
                                        </div>
                                    </div>
                                    <div class="overview-chart">
                                        <canvas id="widgetChart2"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  <div class="col-sm-6 col-lg-3">
                              <div class="overview-item overview-item--c3">
                                  <div class="overview__inner">
                                      <div class="overview-box clearfix">
                                          <div class="icon">
                                              <i class="zmdi zmdi-calendar-note"></i>
                                          </div>
                                          <div class="text">
                                              <h2>1,086</h2>
                                              <span>this week</span>
                                          </div>
                                      </div>
                                      <div class="overview-chart">
                                          <canvas id="widgetChart3"></canvas>
                                      </div>
                                  </div>
                              </div>
                          </div>-->


                        <div class="col-sm-6 col-lg-4">
                            <div class="overview-item overview-item--c4">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="zmdi zmdi-money"></i>
                                        </div>
                                        <div class="text">
                                            <?php echo "<h2>  kz " .number_format($final, '2', ',', '.')." </h2>";
                                            ?>
                                            <span>total vendido</span>
                                        </div>
                                    </div>
                                    <div class="overview-chart">
                                        <canvas id="widgetChart4"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- END MAIN CONTENT-->
                    <!-- END PAGE CONTAINER-->

                    <!-- DATA TABLE-->
                    <section class="p-t-10">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="title-5 m-b-35">Dados da Tabela</h3>
                                    <div class="table-data__tool">
                                        <div class="table-data__tool-left">
                                            <div class="rs-select2--light rs-select2--md">
                                                <center>
                                                    <form class="form-header" action="?" method="POST">
                                                        <div class="footer-newsletter">

                                                            <div class="newsletter-form">
                                                                <input class="au-input au-input--xl" type="text"
                                                                       name="search"
                                                                       placeholder="Search for datas &amp; reports..."/>
                                                            </div>

                                                        </div>
                                                        <input style="margin-left:5px;" type="submit"
                                                               class="au-btn au-btn-icon au-btn--green au-btn--small"
                                                               value="Procurar">
                                                    </form>
                                                </center>
                                                <div class="dropDownSelect2"></div>
                                            </div>

                                        </div>
                                        <div class="table-data__tool-right">

                                            <a href="add_produtos.php">
                                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                    <i class="zmdi zmdi-plus"></i>add item
                                                </button>
                                            </a>

                                            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                                <select class="js-select2" name="type">
                                                    <option selected="selected">Export</option>
                                                    <option value="">Option 1</option>
                                                    <option value="">Option 2</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <table class="table">
                                            <thead class="thead-dark">
                                            <tr>

                                                <th>Id</th>
                                                <th>Produto</th>
                                                <th>Qtd</th>

                                                <th>Data</th>
                                                <th>Categoria</th>
                                                <th>Estado</th>
                                                <th>Preço</th>
                                                <th>Total</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="tr-shadow" scope="row">
                                                <?php
                                                if (mysqli_num_rows($resultado) > 0) {
                                                    while ($data = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {


                                                        if ($data['qtd'] <= 5 && $data['qtd'] > 0) {
                                                            echo "  <td style='background-color: #fa9da2;'>" . $data['idp'] . "</td>";
                                                        } else if ($data['qtd'] >= 10) {
                                                            echo "  <td style='background-color: #9dfaa3;'>" . $data['idp'] . "</td>";
                                                        } else {
                                                            echo "  <td style='background-color: #eafa9d;'>" . $data['idp'] . "</td>";
                                                        }

                                                        echo "
                                         
                                            <td>" . $data['nome'] . "</td>
                                            <td>
                                                <span class='block-email'>" . $data['qtd'] . "</span>
                                            </td>
                                           
                                            <td>" . $data['data'] . "</td>
                                            <td>" . $data['categoria'] . "</td>
                                            <td>
                                                <span class='status--process'>" . $data['estado'] . "</span>
                                            </td>
                                            <td>" . number_format($data['precoUnitario'], 2, ',', '.') . "kz</td>
                                            <td>" . number_format($data['total'], 2, ',', '.') . "kz</td>
                                            <td>
                                                <div class='table-data-feature'>
                                                   <a href='up_produtos.php?id=" . $data['idp'] . "&info=up'>
                                                    <button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>
                                                        <i class='zmdi zmdi-edit'></i>
                                                    </button>
                                                    </a>
                                                    
                                                    <a href='dell_produtos.php'>
                                                    <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
                                                        <i class='zmdi zmdi-delete'></i>
                                                    </button></a>

                                                    <a href='view_produtos.php'>
                                                    <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
                                                        <i class='zmdi zmdi-eye'></i>
                                                    </button>
                                                    </a>
                                                    
                                                </div>
                                            </td>
                                        </tr>";
                                                    }
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- END DATA TABLE-->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Digitalia - ecomerce</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Jquery JS-->
            <script src="vendor/jquery-3.2.1.min.js"></script>
            <!-- Bootstrap JS-->
            <script src="vendor/bootstrap-4.1/popper.min.js"></script>
            <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
            <!-- Vendor JS       -->
            <script src="vendor/slick/slick.min.js">
            </script>
            <script src="vendor/wow/wow.min.js"></script>
            <script src="vendor/animsition/animsition.min.js"></script>
            <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
            </script>
            <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
            <script src="vendor/counter-up/jquery.counterup.min.js">
            </script>
            <script src="vendor/circle-progress/circle-progress.min.js"></script>
            <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
            <script src="vendor/chartjs/Chart.bundle.min.js"></script>
            <script src="vendor/select2/select2.min.js">
            </script>

            <!-- Main JS-->
            <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
