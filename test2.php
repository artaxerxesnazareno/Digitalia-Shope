<form action="test2.php" method="post">
    <input type="checkbox" name="opcao[]" value="opcao1"> Opção 1<br>
    <input type="checkbox" name="opcao[]" value="opcao2"> Opção 2<br>
    <input type="checkbox" name="opcao[]" value="opcao3"> Opção 3<br>
    <input type="checkbox" name="opcao[]" value="opcao4"> Opção 4<br>
    <input type="submit" value="Enviar">
</form>

<?php
if(isset($_POST['opcao'])){
    $opcoes = $_POST['opcao'];
    foreach($opcoes as $opcao){
        echo $opcao . "<br>";
    }
}
?>