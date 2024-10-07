<?php

$nome = $_POST["nome"];
$numero_matricula = $_POST["numero_matricula"];
$cpf = $_POST["cpf"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$password = $_POST["password"];

$connect = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connect,"banco_controle");


$query_select = "SELECT numero_matricula FROM cadastro_a WHERE numero_matricula = '$numero_matricula'";
$select = mysqli_query($connect,$query_select);
$array = mysqli_fetch_array($select);
@$logarray = $array["numero_matricula"];

if($numero_matricula == "" || $numero_matricula == null){
  echo "<script>alert('O campo Matrícula deve ser preenchido!');history.back();</script>";
} else {

  if($logarray == $numero_matricula){
    echo "<script>alert('Esta matrícula já existe!');history.back();</script>";
    die();
  } 
    $query = "INSERT INTO cadastro_a (id_aluno, nome, numero_matricula, cpf, telefone, email, password) VALUES ('$id_aluno', '$nome', '$numero_matricula', '$cpf', '$telefone', '$email', '$password')";
    $insert = mysqli_query($connect,$query);

    if($insert){
      echo "<script>alert('Aluno(a) cadastrado(a) com sucesso!');history.back();</script>";
      header("refresh:1");
    } else {
      echo "<script>alert('Não foi possível cadastrar a aluno(a)');history.back();</script>";
      header("refresh:1");
    }
  }

?>
