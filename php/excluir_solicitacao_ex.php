<?php
    require_once "conexao.php";

    $id_exaluno = $_GET["id_exaluno"];

    $query = "DELETE FROM solicita_ex WHERE id_exaluno = '$id_exaluno'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Solicitação Excluída com Sucesso!');history.back();</script>";
        header("refresh:1;");
    } else {
        echo "<script>alert('Erro ao Excluir Solicitação!');history.back();</script>"; 
        header("refresh:1");
    }
?>
