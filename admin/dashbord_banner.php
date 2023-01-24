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
    <title>Digitalia - Upload Banner</title>
</head>
<body>
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
        echo 'Extensão não permitida, por favor escolha um arquivo JPEG, PNG, JPG, GIF';
        exit();
    }

    // Verifica se o arquivo possui erros
    if ($image_error === 0) {


        // Verifica se o arquivo é muito grande
        if ($image_size <= 10485760) {
            // Move o arquivo para o diretório de upload
            $image_name_new = uniqid('banner', true) . 'Digitalia.' . $image_ext;
            $image_destination = 'uploadsBanner/' . $image_name_new ;
            move_uploaded_file($image_tmp, $image_destination);

            if (mysqli_query($cnx, " insert into `banners` (`banner`) values ('$image_destination')")) {
                echo "Arquivo enviado com sucesso.";


            } else {
                echo "deu errado";
                echo "Erro: " . $sql . "<br>" . mysqli_error($cnx);
            }
        } else {
            echo 'Tamanho do arquivo deve ser menor que 10 MB';
            exit();
        }
    }
    else {
        echo 'Ocorreu um erro ao enviar o arquivo.';
        exit();
    }
}else{
    echo 'Nenhum Upload';
}
?>
<h2>Fazer upload de imagem para para Banner</h2>

<form action="dashbord_banner.php" method="post" enctype="multipart/form-data">
    Selecionar imagem:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<hr>


<h2>Imagens Enviadas</h2>
<?php
// 5. Lista de imagens enviadas
$images = mysqli_query($cnx,   "SELECT *FROM banners") ; // function to retrieve uploaded images from the database
echo '<h2>Lista de imagens enviadas</h2>';
?>
<form action="upload_banner.php" method="post" name="checkbox">
    <h4>Selecione até 3 imagens:</h4>
    <?php
    foreach ($images as $image) {
        echo '<div>
        <input type="checkbox" name="opcao[]" value="' . $image['banner'] . '">
        <img src="'. $image['banner'] .'" width="450" height="200">
        </div>';
    }
    ?>

    <div>
        <input type="submit" value="Enviar">
    </div>


</form>
<script>
    let checkboxes = document.querySelectorAll('input[type="checkbox"]');
    let checkedCount = 0;
    for (let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener('change', function() {
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



