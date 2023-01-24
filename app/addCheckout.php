<?php
 include_once('cnx.php');
 include_once('gravar_verificacao.php');
  if(!isset($_POST)){
     header("Location: ../admin/login.php"); exit;
 }

class AddCliente{

    private string $Pnome;
    private string $Unome ;  
    private string $pais  ;   
    private string $Nempresa; 
    private string $endereco ;
    private string $cidade   ;
    private string $condado  ;
    private string $cep      ;
    private string $email    ;
    private string $telefone ;
    private string $cmd ;


    public function cliente(string $Pnome1, string $Unome1, string $pais1, string $Nempresa1, string $endereco1,
    string $cidade1, string $condado1, string $cep1, string $email1, string $telefone1){

        $conect = new conexao;
        $cnx = $conect->cnxb();

        $this->Pnome    = $Pnome1;
        $this->Unome    = $Unome1;
        $this->pais     = $pais1;
        $this->Nempresa = $Nempresa1;
        $this->endereco = $endereco1;
        $this->cidade   = $cidade1;
        $this->condado  = $condado1;
        $this->cep      = $cep1;
        $this->email    = $email1;
        $this->telefone = $telefone1;

        $this->cmd = "insert into cliente values(2,'$this->Pnome', '$this->Unome','$this->pais','$this->Nempresa',
                '$this->endereco', '$this->cidade', '$this->condado', '$this->cep', '$this->email', '$this->telefone')";

            mysqli_query($cnx,$this->cmd) or die(mysqli_error());
            header('Location: ../index.php');
      
       
    }
}
$cliente = new AddCliente;
$cliente->cliente($_POST['pnome'], $_POST['unome'],$_POST['pais'],$_POST['nempresa'],$_POST['endereco'],
                    $_POST['cidade'],$_POST['condado'], $_POST['cep'], $_POST['email'], $_POST['telefone']);


?>