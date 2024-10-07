<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "banco_controle";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
    }

    if (isset($_POST["documentos"]) && is_array($_POST["documentos"])) {
        $documentos = implode(", ", $_POST["documentos"]);
    } else {
        $documentos = "";
    }

    $modalidade = $_POST["modalidade"];
    $curso_m = $_POST["curso_m"];
    $nome = $_POST["nome"];
    $rec = isset($_POST["rec"]) ? implode(", ", $_POST["rec"]) : "";

    $sql = "INSERT INTO solicitacao (nome, modalidade, curso_m, documentos, rec) VALUES ('$nome', '$modalidade', '$curso_m', '$documentos', '$rec')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Solicitação enviada com sucesso!!');history.back();</script>";
        header("refresh:1");
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }

    $conn->close();
}
?>