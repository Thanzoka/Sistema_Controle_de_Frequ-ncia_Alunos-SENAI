<?php
$usuario = $_POST["usuario"];
$entrar = $_POST["entrar"];
$password = $_POST["password"];
$connect = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connect,"banco_controle");

$verifica = mysqli_query($connect, "SELECT * FROM cadastro_u WHERE usuario = '$usuario' AND password = '$password'");
if ($usuario == "" || $password == ""){
  echo "<script>alert('Todos os campos devem ser preenchidos!');history.back();</script>";

}elseif (mysqli_num_rows($verifica)<=0){
  echo "<script>alert('Usuário ou senha incorretos!');history.back();</script>";

}else{
  setcookie("usuario",$usuario);
  header("Location:menu.php");
}
?>