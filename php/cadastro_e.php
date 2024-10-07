<?php

$nome_empresa = $_POST["nome_empresa"];
$cnpj = $_POST["cnpj"];
$telefone = $_POST["telefone"];
$email_empresa = $_POST["email_empresa"];
$senha = $_POST["senha"];
$cep = $_POST["cep"];
$endereco = $_POST["endereco"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];

$connect = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connect,"banco_controle");


$query_select = "SELECT cnpj FROM cadastro_e WHERE cnpj = '$cnpj'";
$select = mysqli_query($connect,$query_select);
$array = mysqli_fetch_array($select);
@$logarray = $array["cnpj"];

if($cnpj == "" || $cnpj == null){
  echo "<script>alert('O campo CNPJ deve ser preenchido!');history.back();</script>";
} else {

  if($logarray == $cnpj){
    echo "<script>alert('Este CNPJ já existe!');history.back();</script>";
    die();
  } 
    $query = "INSERT INTO cadastro_e (id_empresa, nome_empresa, cnpj, telefone, email_empresa, senha, cep, endereco, cidade, estado) VALUES ('$id_empresa', '$nome_empresa', '$cnpj', '$telefone', '$email_empresa', '$senha', '$cep', '$endereco', '$cidade', '$estado')";
    $insert = mysqli_query($connect,$query);

    if($insert){
      echo "<script>alert('Empresa cadastrada com sucesso!');history.back();</script>";
      header("refresh:1");
    } else {
      echo "<script>alert('Não foi possível cadastrar a empresa');history.back();</script>";
      header("refresh:1");
    }
  }

?>
