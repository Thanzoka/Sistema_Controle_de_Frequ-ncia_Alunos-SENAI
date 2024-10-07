<?php
    require_once "conexao.php";

    $id_empresa = $_GET["id_empresa"];

    $query = "DELETE FROM cadastro_e WHERE id_empresa = '$id_empresa'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Empresa Excluída com Sucesso!');history.back();</script>";
        header("refresh:1;");
    } else {
        echo "<script>alert('Erro ao Excluir Empresa!');history.back();</script>"; 
        header("refresh:1");
    }
?>