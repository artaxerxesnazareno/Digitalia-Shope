<?php

if (isset($_FILES['imagem1']) || isset($_FILES['imagem2']) || isset($_FILES['imagem3'])) {
    $nome_imagem1 = $_FILES['imagem1']['name'];
    $nome_imagem2 = $_FILES['imagem2']['name'];
    $nome_imagem3 = $_FILES['imagem3']['name'];
    $caminho_imagem1 = "img/" . "slide-1.jpg";
    $caminho_imagem2 = "img/" . "slide-2.jpg";
    $caminho_imagem3 = "img/" . "slide-3.jpg";
    move_uploaded_file($_FILES['imagem1']['tmp_name'], $caminho_imagem1);
    move_uploaded_file($_FILES['imagem2']['tmp_name'], $caminho_imagem2);
    move_uploaded_file($_FILES['imagem3']['tmp_name'], $caminho_imagem3);
    header('Location: dashbordUploadBanner.php');}
?>