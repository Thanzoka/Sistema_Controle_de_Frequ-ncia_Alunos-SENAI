<?php
    require_once "conexao.php";

    $id_arquivo = $_GET["id_arquivo"];

    $query = "DELETE FROM controle_faltas WHERE id_arquivo = '$id_arquivo'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Arquivo Excluído com Sucesso!');history.back();</script>";
        header("refresh:1;");
    } else {
        echo "<script>alert('Erro ao Excluir Arquivo!');history.back();</script>"; 
        header("refresh:1");
    }
?>
