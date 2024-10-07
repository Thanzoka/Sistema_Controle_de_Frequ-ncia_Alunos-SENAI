<?php

$name = $_POST["name"];
$usuario = $_POST["usuario"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$password = $_POST["password"];

$connect = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connect,"banco_controle");

$query_select = "SELECT * FROM cadastro_u WHERE usuario = '$usuario' OR cpf = '$cpf' OR email = '$email'";
$select = mysqli_query($connect,$query_select);

// Verifica se algum registro já existe com o mesmo usuário, cpf ou email
if(mysqli_num_rows($select) > 0) {
    echo "<script>alert('Usuário, CPF ou email já existem!');history.back();</script>";
} else {
    // Insere os dados no banco de dados
    $query = "INSERT INTO cadastro_u (name, usuario, cpf, email, password) VALUES ('$name', '$usuario', '$cpf', '$email', '$password')";
    $insert = mysqli_query($connect,$query);

    if($insert){
        echo "<script>alert('Usuário cadastrado com sucesso!');history.back();</script>";
    } else {
        echo "<script>alert('Não foi possível cadastrar usuário');history.back();</script>";
    }
}

?>
