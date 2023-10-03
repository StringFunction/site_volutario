<?php
session_start();
if (!isset($_SESSION['cnpj'])) {
    header("Location: ../pag/login.html?erro=true");
    exit();
    # code..
}
require_once '../php/cadastro.php';

$p = new Cadastro("projeto","localhost","root","cl#cio182");

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>voluntario a Disposição</h1>
<table border="1" width="100%"> 
    <tr>
        <td>id</td>
        <td>nome</td>
        <td>email</td>
        <td>profissão</td>
    </tr>
    <?php
    $dados = $p->buscarDados();
   if(count($dados) > 0){
       for ($i=0; $i < count($dados); $i++) { 
       echo  "<tr>";
           foreach ($dados[$i] as $k => $v) {
               echo "<td>".$v."</td>";
              
           }
           # code...
           echo "</tr>";
       }
   }
   
?>
</table>
<form action="" method="get">
    <label for="">Profissonal</label>
   <input type="text" name="buscar">

    </select>
    <input type="submit" value="Buscar">

  
</form>
    
</body>
</html>