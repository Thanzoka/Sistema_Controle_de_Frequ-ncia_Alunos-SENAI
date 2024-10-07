<?php
require_once "conexao.php";

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["arquivo"])) {
    $targetDir = "empresas";

    $id_empresa = $_POST["id_empresa"];

    $stmt = $conn->prepare("SELECT * FROM cadastro_e WHERE id_empresa = ?");
    $stmt->bind_param("i", $id_empresa);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $dir_name = $targetDir . "/" . $id_empresa . "/";
        if (!is_dir($dir_name)) {
            mkdir($dir_name, 0777, true);
        }

    $id_empresa = $_POST["id_empresa"];
    $fileName = basename($_FILES["arquivo"]["name"]);
    $targetFile = $dir_name . $fileName;
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $timestamp = time(); // Obtém o timestamp atual
    $fileName = $timestamp . '_' . $fileName;
    $targetFile = $dir_name . $fileName;

    if (file_exists($targetFile)) {
        $mensagem = "Desculpe, o arquivo já existe.";
        $uploadOk = 0;
    }

    if ($_FILES["arquivo"]["size"] > 10737418240) {
        $mensagem = "Desculpe, o arquivo é muito grande.";
        $uploadOk = 0;
    }

    if (!in_array($fileType, array("jpg", "jpeg", "png", "gif", "pdf", "txt", "mp3", "mp4", "avi", "php", "html"))) {
        $mensagem = "Desculpe, apenas arquivos JPG, JPEG, PNG, GIF, PDF, TXT, MP4, MP3, AVI, PDF/A, PHP e HTML são permitidos.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        $mensagem = "Desculpe, seu arquivo não pôde ser enviado.";
    } else {
        if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $targetFile)) {
            $sql = "INSERT INTO controle_faltas (id_empresa, arquivo, data) VALUES ('$id_empresa', '$targetFile', NOW())";
            if ($conn->query($sql) === TRUE) {
                $mensagem = "O arquivo ". htmlspecialchars(basename($_FILES["arquivo"]["name"])). " foi enviado com sucesso."; 
            } else {
                $mensagem = "Erro: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $mensagem = "Desculpe, houve um erro ao enviar seu arquivo.";
        }
    }

    } else {
        $mensagem = "ID da empresa inválido. Por favor, insira um ID de empresa válido.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Arquivos</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <style>
        a {
            font-size: 15px;
        }
    </style>
</head>
<body>

<div class="cabecalho">
<div class="img-cab">
        <img src="../imagens/senai_logo.png" alt="logo">
    </div>
    <div class="titulo">
        <h1>Sistema de Controle de Frequência</h1>
    </div>
</div>

<div id="container">
    <div class="quadrado">
        <h2>Envio de Arquivo</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <label for="id_empresa">ID da Empresa:</label>
            <input class="text-input-id" width="15px" type="text" id="id_empresa" name="id_empresa" placeholder="ID" required><br>
            Selecione um arquivo: <input type="file" name="arquivo"><br>
            <div class="mensagem"><?php echo $mensagem; ?></div>
            <input class="enviar_arquivos" type="submit" value="Enviar Arquivo"><br>
            <a style="color:#004C9B" href="../php/menu.php">Voltar para o Menu</a>
        </form>
    </div>
</div>

</body>
</html>
