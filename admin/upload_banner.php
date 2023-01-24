<?php
echo "<h1> DADOS RECEBIDOS </h1>";
if (isset($_POST['opcao'])) {
    $opcoes = $_POST['opcao'];
    $n = 1;
    foreach ($opcoes as $opcao) {
        $origem = $opcao;
        echo "<br> origem '.$origem.'";
        $destino = '../img/slide-'.$n.'.jpg';

        if (copy($origem, $destino)) {
//            echo 'Imagem copiada com sucesso!';
        } else {
            echo 'Erro ao copiar imagem!';
        }
        $n++;
    }
}


?>