<?php
session_start();
if (isset($_POST['cn']) && empty($_POST['cn']) == false  ) {
    $cn = $_POST['cn'];
    $email = md5($_POST['senha']);
   
  
    
$host = "localhost";
$usuario = "root";
$senha  = "cl#cio182";
$dbname = "projeto"; 
try {
    #$pdo = new PDO("mysql:$dbname;$host","$usuario","$senha");
    $pdo = new PDO("mysql:dbname=projeto;host=localhost","root","cl#cio182");

    
} catch(PDOException $e){
    echo "erro no bd".$e->getMessage();
} catch (Exception $e){
    echo "erro generico : ".$e->getMessage();;

}
//$buscar = $pdo->query("SELECT * FROM empresa WHERE cnpj =  '$cn'");
$busca = $pdo->query("SELECT * FROM empresa WHERE cnpj =  '$cn' and senha = '$email'");

    if ($busca->rowCount() > 0) {
        $dado = $busca->fetch();
        $_SESSION['cnpj'] = $dado['cnpj'];
        header ("Location: ../pag/usuario.php");
        echo "ok";
        # code...
    } else {
        echo "<script> alert('Senha errada')
window.location.href = '../pag/login.html'</script>";
        
    }
    # code...
}

