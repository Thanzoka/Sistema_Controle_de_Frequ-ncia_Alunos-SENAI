<?php
$cnpj = $_POST["cnpj"];
$entrar = $_POST["entrar"];
$senha = $_POST["senha"];
$connect = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connect,"banco_controle");

$verifica = mysqli_query($connect, "SELECT * FROM cadastro_e WHERE cnpj = '$cnpj' AND senha = '$senha'");
if ($cnpj == "" || $senha == ""){
  echo "<script>alert('Todos os campos devem ser preenchidos!');history.back();</script>";
}elseif (mysqli_num_rows($verifica)<=0){
  echo "<script>alert('CNPJ ou senha incorretos!');history.back();</script>";

}else{
  setcookie("id_empresa",mysqli_fetch_row($verifica)[0]);
  header("Location:menu-empresa.php");
}
?>