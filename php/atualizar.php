<?php
    require_once "conexao.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_empresa = $_POST["id_empresa"];
        $nome_empresa = $_POST["nome_empresa"];
        $cnpj = $_POST["cnpj"];
        $telefone = $_POST["telefone"];
        $email_empresa = $_POST["email_empresa"];
        
        if($nome_empresa != "" && $cnpj != "" && $telefone != "" && $email_empresa != "" ){
        $sql = "UPDATE cadastro_e SET nome_empresa = '$nome_empresa', cnpj = '$cnpj', telefone = '$telefone', email_empresa = '$email_empresa' WHERE id_empresa = '$id_empresa'";
        echo "$id_empresa";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Cadastro editado com sucesso!');</script>";  
            header("refresh:0;url=menu.php");
        } else {
            echo "Erro ao editar cadastro: " . $conn->error;
        }
     } else {
        echo "<script>alert('Todos os campos devem ser preenchidos!');</script>";  
        header("refresh:0;url=menu.php");
        }
        }
    $conn->close();
?>