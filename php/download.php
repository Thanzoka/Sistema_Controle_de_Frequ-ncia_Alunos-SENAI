<?php
require_once "conexao.php";

function fazerDownload($caminho) {
    if (file_exists($caminho)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($caminho) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($caminho));
        readfile($caminho);
        exit;
    } else {
        echo "<script>alert('Arquivo não encontrado.');</script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    
    $sql = "SELECT arquivo FROM controle_faltas WHERE id_arquivo = $id_arquivo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $arquivo = $row["arquivo"];
        
        fazerDownload($arquivo);
    } else {
        echo "<script>alert('Registro não encontrado.);</script>";
    }
}
?>