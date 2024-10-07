<?php
$numero_matricula = $_POST["numero_matricula"];
$entrar = $_POST["entrar"];
$password = $_POST["password"];
$connect = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connect,"banco_controle");

$verifica = mysqli_query($connect, "SELECT * FROM cadastro_a WHERE numero_matricula = '$numero_matricula' AND password = '$password'");
if ($numero_matricula == "" || $password == ""){
  echo "<script>alert('Todos os campos devem ser preenchidos!');history.back();</script>";

}elseif (mysqli_num_rows($verifica)<=0){
  echo "<script>alert('Usuário ou senha incorretos!');history.back();</script>";

}else{
  setcookie("numero_matricula",$numero_matricula);
  header("Location:menu-aluno.php");
}
?>