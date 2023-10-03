<?php



if (isset($_POST['nome']) && !empty($_POST['nome'])  ) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];

$host = "localhost";
$usuario = "root";
$senha  = "cl#cio182";
$dbname = "teste"; 
try {
    #$pdo = new PDO("mysql:$dbname;$host","$usuario","$senha");
    $pdo = new PDO("mysql:dbname=projeto;host=localhost","root","cl#cio182");

    
} catch(PDOException $e){
    echo "erro no bd".$e->getMessage();
} catch (Exception $e){
    echo "erro generico : ".$e->getMessage();;

}
$buscar = $pdo->query("SELECT * FROM voluntario WHERE nome =  '$nome'");


if ($buscar->rowCount() > 0) {
    echo "<script> alert('cadastro  ja realizado')</script>";
    echo header ("Location: ../pag/volu.html");
    # code...
} else{

$RES = $pdo->prepare("INSERT INTO voluntario (nome, email, assunto) VALUES(:N, :T, :c)");
$RES->bindValue(":N","$nome");
$RES->bindValue(":T","$email");
$RES->bindValue(":c","$assunto");
$RES->execute();
echo "<script> alert('cadastro realizado')
window.location.href = '../pag/volu.html';

</script>

";

}
}






?>