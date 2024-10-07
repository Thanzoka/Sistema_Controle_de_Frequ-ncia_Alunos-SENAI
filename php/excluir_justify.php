<?php
    require_once "conexao.php";

    $id_justificativa = $_GET["id_justificativa"];

    $query = "DELETE FROM justificativa WHERE id_justificativa = '$id_justificativa'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Justificativa Excluída com Sucesso!');history.back();</script>";
        header("refresh:1;");
    } else {
        echo "<script>alert('Erro ao Excluir Justificativa!');history.back();</script>"; 
        header("refresh:1");
    }
?>
