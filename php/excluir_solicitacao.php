<?php
    require_once "conexao.php";

    $id_solicitacao = $_GET["id_solicitacao"];

    $query = "DELETE FROM solicitacao WHERE id_solicitacao = '$id_solicitacao'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Solicitação Excluída com Sucesso!');history.back();</script>";
        header("refresh:1;");
    } else {
        echo "<script>alert('Erro ao Excluir Solicitação!');history.back();</script>"; 
        header("refresh:1");
    }
?>
