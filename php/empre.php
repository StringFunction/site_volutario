<?php



if (isset($_POST['nome']) && !empty($_POST['nome'])  ) {
    $nome = $_POST['nome'];
    $email = md5($_POST['email']);
   

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
    echo "erro generico : ".$e->getMessage();

}
$buscar = $pdo->query("SELECT * FROM empresa WHERE cnpj =  '$nome'");


if ($buscar->rowCount() > 0) {
    echo "<script> alert('cadastro  ja realizado');
        window.location.href = '../pag/empre.html';
     
    
    
    </script>";

    # code...
} else{

$RES = $pdo->prepare("INSERT INTO empresa (cnpj, senha) VALUES(:N, :T)");
$RES->bindValue(":N","$nome");
$RES->bindValue(":T","$email");

$RES->execute();
echo "<script> alert('cadastro realizado')
window.location.href = '../pag/empre.html';

</script>

";

}
}
