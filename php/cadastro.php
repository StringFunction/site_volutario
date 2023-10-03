<?php
Class Cadastro{
  private $pdo;
  public function __construct($dbname, $host, $user, $senha){
  try {
    $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
  } catch (PDOException $th) {
    echo "ERRO COM DB".$th->getMessage();
    //throw $th;
  }
  catch(Exception $th){
    echo "deu erro em alguma coisa:".$th->getMessage();
  }
  }

  public function buscarDados(){
 
    if(isset($_GET['buscar'])){
    $pesquisa = $_GET['buscar'];
    $res = array();
    $cmd = $this->pdo->query("SELECT * FROM voluntario  where assunto like '$pesquisa%' order by id");
    $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
    print_r($res);
    echo 'ok';
    return $res;
    } else{
    $res = array();
    $cmd = $this->pdo->query("SELECT * FROM voluntario  ORDER BY id");
    $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $res;
    }
    

  }
 
}




?>