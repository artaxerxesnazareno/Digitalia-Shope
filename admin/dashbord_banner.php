<!doctype html>
<?php

include_once('../app/cnx.php');

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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

    <title>Digitalia - Upload Banner</title>
</head>
<body>
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
            <img src="images/icon/logoDigitalia.png" alt="Digitalia"/>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list ">

                <li >
                    <a href="admin/index.php">CONTROLER</a>
                </li>
                <li >
                    <a href="pedidos.php">PEDIDOS</a>
                </li>
                <li class="active">
                    <a href="dashbord_banner.php">BANNERS</a>
                </li>
            </ul>


    </div>
</aside>
<!-- END MENU SIDEBAR-->

<div class="page-container">
<?php
// Botão de upload
if (isset($_FILES['fileToUpload'])) {
    $image = $_FILES['fileToUpload'];
    $image_name = $image['name'];
    $image_tmp = $image['tmp_name'];
    $image_size = $image['size'];
    $image_error = $image['error'];

    // Verifica se o arquivo é uma imagem
    $image_ext = explode('.', $image_name);
    $image_ext = strtolower(end($image_ext));
    $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
    if (!in_array($image_ext, $allowed_ext)) {
        echo "<script>alert('Extensão não permitida, por favor escolha um arquivo JPEG, PNG, JPG, GIF');</script>";
        exit();
    }

    // Verifica se o arquivo possui erros
    if ($image_error === 0) {


        // Verifica se o arquivo é muito grande
        if ($image_size <= 10485760) {
            // Move o arquivo para o diretório de upload
            $image_name_new = uniqid('banner', true) . 'Digitalia.' . $image_ext;
            $image_destination = 'uploadsBanner/' . $image_name_new;
            move_uploaded_file($image_tmp, $image_destination);

            if (mysqli_query($cnx, " insert into `banners` (`banner`) values ('$image_destination')")) {
                echo "<script>alert('Arquivo enviado com sucesso');</script>";


            } else {
//                echo "<script>alert('Erro:' . $sql . "<br>" . mysqli_error($cnx)');</script>";
                echo "Erro: " . $sql . "<br>" . mysqli_error($cnx);
            }
        } else {
            echo "<script>alert('Tamanho do arquivo deve ser menor que 10 MB');</script>";
            exit();
        }
    } else {

        echo "<script>alert('Ocorreu um erro ao enviar o arquivo');</script>";
        exit();
    }
}
?>
<h3>Fazer upload de imagem para para Banner</h3>

<form action="dashbord_banner.php" method="post" enctype="multipart/form-data">
    Selecionar imagem:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit" class="btn btn-outline-info">
</form>

<hr>



<?php
// 5. Lista de imagens enviadas
$images = mysqli_query($cnx, "SELECT *FROM banners"); // function to retrieve uploaded images from the database
echo '<h3>Lista de imagens enviadas</h3>';
?>
<form action="upload_banner.php" method="post" name="checkbox">
    <h4>Selecione até 3 imagens:</h4>
    <?php
    foreach ($images as $image) {
        echo '<table  class="table table-bordered">';
        echo '<tr>';
        echo '<td classe="col-md-6">';
        echo '<div>
        <input type="checkbox" name="opcao[]" value="' . $image['banner'] . '">
        <img src="' . $image['banner'] . '" width="450" height="200">
        </div>';
        echo '</td>';

        echo '<td class="text-center">';
       echo' <button type = "button" class="btn btn-danger" ><i class="fas fa-trash-alt" > </i ><a href="dashbord_banner.php?id='. $image['id'] .'" class="text-white"> Deletar</a> </button >';
        echo '</td>';


        echo '</tr>';

        echo '</table>';

    }
    ?>

    <div>
        <input type="submit" value="Enviar"  class="btn btn-primary">
    </div>


</form>

<?php
if (isset($_GET['id'])) {
// Prepara a query
    $sql = "DELETE FROM banners WHERE id = ?";

    $stmt = mysqli_prepare($cnx, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $_GET['id']);
// Executa a query
    mysqli_stmt_execute($stmt);
    // Redireciona para a página inicial
//    header('Location: /Digitalia/admin/dashbord_banner.php');
    echo "<script>alert('Banner DELETADO');</script>";
}
?>
<script>
    let checkboxes = document.querySelectorAll('input[type="checkbox"]');
    let checkedCount = 0;
    for (let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener('change', function () {
            if (this.checked) {
                checkedCount++;
                if (checkedCount > 3) {
                    alert('Você só pode selecionar 3 imagens!');
                    this.checked = false;
                    checkedCount--;
                }
            } else {
                checkedCount--;
            }
        });
    }
</script>
</body>
</html>



