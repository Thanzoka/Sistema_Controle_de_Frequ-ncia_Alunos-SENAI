<?php
require_once "conexao.php";

$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_FILES["arquivo_justificativa"])) {
        $arquivo = $_FILES["arquivo_justificativa"];
        
        if ($arquivo["error"] == UPLOAD_ERR_OK) {
            $nome_aluno = $_POST["nome"];
            
            $diretorio_aluno = "arquivos_justificativa/$nome_aluno";
            if (!is_dir($diretorio_aluno)) {
                mkdir($diretorio_aluno, 0777, true);
            }
            $caminho_arquivo = $diretorio_aluno . '/' . $arquivo["name"];
            if (move_uploaded_file($arquivo["tmp_name"], $caminho_arquivo)) {
                $mensagem = "Arquivo enviado com sucesso!";
    
                $modalidade = $_POST["modalidade"];
                $curso_m = $_POST["curso_m"];
                $cpf = $_POST["cpf"];
                $contratante = $_POST["contratante"];
                $doc = implode(", ", $_POST["doc"]); 
                $obs = $_POST["obs"];
                
                $sql = "INSERT INTO justificativa (nome, modalidade, cpf, curso_m, contratante, doc, arquivo, obs, data) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";
                
                $stmt = $conn->prepare($sql);
                if ($stmt) {

                    $stmt->bind_param("ssssssss", $nome_aluno, $modalidade, $cpf, $curso_m, $contratante, $doc, $caminho_arquivo, $obs);
                    
                    if ($stmt->execute()) {
                            echo "<script>alert('Justificativa enviada com sucesso!');history.back();</script>";
                            header("refresh:1");

                    } else {
                        $mensagem .= " Erro ao inserir dados no banco de dados: " . $conn->error;
                    }
                } else {
                    $mensagem .= " Erro ao preparar a declaração SQL: " . $conn->error;
                }
            } else {
                $mensagem = "Erro ao mover o arquivo para o diretório.";
            }
        } else {
            $mensagem = "Erro no upload do arquivo.";
        }
    }
}

$conn->close();
?>
