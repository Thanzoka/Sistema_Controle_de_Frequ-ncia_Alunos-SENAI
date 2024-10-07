<?php
require_once "conexao.php";

$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_FILES["solicita_exaluno_frente"]) && isset($_FILES["solicita_exaluno_verso"])) {

        $arquivo_frente = $_FILES["solicita_exaluno_frente"];
        $arquivo_verso = $_FILES["solicita_exaluno_verso"];
        
        if ($arquivo_frente["error"] == UPLOAD_ERR_OK && $arquivo_verso["error"] == UPLOAD_ERR_OK) {

            $nome_ex_aluno = $_POST["nome_ex_aluno"];
            $data = $_POST["data"];
            $cpf = $_POST["cpf"];
            $telefone = $_POST["telefone"];
            $email = $_POST["email"];
            $cep = $_POST["cep"];
            $endereco = $_POST["endereco"];
            $cidade = $_POST["cidade"];
            $estado = $_POST["estado"];
            $curso_realizou = $_POST["curso_realizou"];
            $data_aprox = $_POST["data_aprox"];
            $documentos = isset($_POST["documentos"]) ? implode(", ", $_POST["documentos"]) : "";
            $rec = isset($_POST["rec"]) ? implode(", ", $_POST["rec"]) : "";
            $obs = isset($_POST["obs"]) ? $_POST["obs"] : "";

            $diretorio_aluno = "solicita_exaluno/$nome_ex_aluno";
            if (!is_dir($diretorio_aluno)) {
                mkdir($diretorio_aluno, 0777, true);
            }

            $caminho_arquivo_frente = $diretorio_aluno . '/' . $arquivo_frente["name"];
            $caminho_arquivo_verso = $diretorio_aluno . '/' . $arquivo_verso["name"];

            if (move_uploaded_file($arquivo_frente["tmp_name"], $caminho_arquivo_frente) && move_uploaded_file($arquivo_verso["tmp_name"], $caminho_arquivo_verso)) {
                
                $sql = "INSERT INTO solicita_ex (nome_ex_aluno, data, cpf, telefone, email, cep, endereco, cidade, estado, arquivo_frente, arquivo_verso, curso_realizou, data_aprox, documentos, rec, obs) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("ssssssssssssssss", $nome_ex_aluno, $data, $cpf, $telefone, $email, $cep, $endereco, $cidade, $estado, $caminho_arquivo_frente, $caminho_arquivo_verso, $curso_realizou, $data_aprox, $documentos, $rec, $obs);
                    
                    if ($stmt->execute()) {
                        $mensagem = "Solicitação enviada com sucesso!";
                    } else {
                        $mensagem = "Erro ao inserir dados no banco de dados: " . $stmt->error;
                    }
                } else {
                    $mensagem = "Erro ao preparar a declaração SQL: " . $conn->error;
                }
            } else {
                $mensagem = "Erro ao mover o(s) arquivo(s) para o diretório.";
            }
        } else {
            $mensagem = "Erro no upload do(s) arquivo(s).";
        }
    } else {
        $mensagem = "Por favor, selecione ambos os arquivos (frente e verso).";
    }
}

$conn->close();
?>
