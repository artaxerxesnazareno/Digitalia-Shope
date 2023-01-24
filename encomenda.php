<?php
include_once('cnx.php');
include_once('gravar_verificacao.php');
include_once('app/gravar_verificacao.php');
include_once('app/selectProdutos.php');
include_once('app/carrinho.php');
if (!isset($_SESSION['UsuarioID'])) header('Location: index.php');


$pnome = $_POST['pnome'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$telefone = $_POST['telefone'];



//header("Location: index.php");

if (count($_SESSION['carrinho']) == 0) {
    echo "<tr><th scope='row'>Nenhum produto selecionado</th>";
} else {

    foreach ($_SESSION['carrinho'] as $id => $qtd) {

        $resultado = mysqli_query($cnx, "select *from produtos where id = $id") or die (mysqli_error());
        $data = mysqli_fetch_assoc($resultado);
        $produto = $data['id'];
        $preco = number_format($data['precoUnitario'], 2, ',', '.');
        $total = number_format($data['precoUnitario'] * $qtd, 2, ',', '.');
        $total_final += $data['precoUnitario'] * $qtd;
        $final = $total_final;



// Crie a consulta INSERT
        if ($data['qtd'] >= $qtd) {

            $sql1 = "insert into `pedido` (`cidade`, `endereco`,  `idprodutos`, `idusuarios`,  `qtd`, `telefone`) 
values ('$cidade', '$endereco',   $produto, $Sid,  $qtd, '$telefone')";

$q =$data['qtd'] - $qtd;
            $sql2 = "UPDATE `produtos` SET qtd =".$q." where id=".$data['id']."";
            if (mysqli_query($cnx, $sql2)) {
                // Se a consulta for bem-sucedida, redirecione para a homepage

            } else {
                echo "Erro: " . $sql2 . "<br>" . mysqli_error($cnx);
            }
            if ($q == 0){
                $sql2 = "UPDATE `produtos` SET estado = 'esgotado' where id=".$data['id']."";
//               $sql2 = "UPDATE `produtos` SET qtd =0 where id=".$data['id']."";
                if (mysqli_query($cnx, $sql2)) {
                    // Se a consulta for bem-sucedida, redirecione para a homepage

                } else {
                    echo "Erro: " . $sql2 . "<br>" . mysqli_error($cnx);
                }
            }
        }else{
            echo "Quatidade indispoivel | so temos ".$data['qtd']."";
        }


        if (mysqli_query($cnx, $sql1)) {
            // Se a consulta for bem-sucedida, redirecione para a homepage
            header("Location: index.php");
        } else {
            echo "Erro: " . $sql1 . "<br>" . mysqli_error($cnx);
        }
    }
}

$_SESSION['carrinho']=null;
// Feche a conexão com o banco de dados
mysqli_close($cnx);