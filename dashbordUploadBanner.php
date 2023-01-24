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

<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="../index.php">
            <img src="admin/images/icon/logoDigitalia.png" alt="Digitalia"/>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list ">

                <li>
                    <a href="admin/index.php">CONTROLER</a>
                </li>
                <li>
                    <a href="pedidos.php">PEDIDOS</a>
                </li>
                <li class="active">
                    <a href="dashbordUploadBanner.php">BANNER</a>
                </li>
            </ul>


    </div>
</aside>
<div class="page-container">

    <form action="uploadBanner.php" method="post" enctype="multipart/form-data">
        <table class="table table-strip">
            <thead>
            <tr>
                <th>Arquivo Atual</th>

                <th>Arquivo a Atualizar</th>
            </tr>
            </thead>
            <tbody>
            <tr>

                <td><img src="img/slide-1.jpg" width="100"></td>
                <td><input type="file" name="imagem1"></td>

            </tr>
            <tr>

                <td><img src="img/slide-2.jpg" width="100"></td>
                <td><input type="file" name="imagem2"></td>

            </tr>
            <tr>

                <td><img src="img/slide-3.jpg" width="100"></td>
                <td><input type="file" name="imagem3"></td>

            </tr>
            </tbody>
        </table>
        <input type="submit" value="Guardar" class="btn btn-primary">

    </form>
</div>
</body>