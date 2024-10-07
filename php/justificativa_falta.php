<?php
require_once "conexao.php";

$mensagem = '';
$uploadOk = 1;

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
            move_uploaded_file($arquivo["tmp_name"], $caminho_arquivo);
            
            $mensagem = "Arquivo enviado com sucesso!";
        } else {
            $mensagem = "Erro no upload do arquivo.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secretaria Senai - Justificativa</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" type="imagex/png" href="..//imagens/sdvsdv.png">
</head>
<body>
    <div class="cabecalho">
        <div class="img-cab">
            <img src="../imagens/senai_logo.png" alt="logo">
        </div>
        <div class="titulo">
            <h1 style="font-family: Noto-Sans;">Justificativa de Faltas</h1>
        </div>
    </div>
    <div id="container">
        <div class="quadrado">
            <br>
            
            <form id="modalidade" action="processar_faltas.php" method="post" enctype="multipart/form-data">

                <div class="texto">
                    Conforme Manual do Aluno, é direito do aluno valer-se de justificativas de falta, desde que o documento seja apresentado no prazo-limite de até (05) cinco dias consecutivos, contados a partir da 1ª data da falta. <br><br>

                    <strong>Caso necessário, será solicitado a apresentação do documento original para fins de autenticação. 
                    <br>**O aluno deverá também, enviar uma cópia para empresa, no caso de ser contratado.**</strong> <br>

                    <br><strong>ATENÇÃO:</strong>   É de suma importância que as informações estejam corretas e a digitalização legível, caso contrário, o aluno irá arcar com os prejuízos advindos de informações erradas.
                    <br><br> 
                    <hr noshade=”noshade” width="660px" size="7px" color="#004C9B"/>
                </div>
                <br>
                <label for="nome"><h3>Nome:</h3></label>
                <input id="nome" style="color: #004C9B; border: 2px solid #004C9B; border-radius: 5px; font-family: Noto-Sans; font-size: 17px; text-align: center; width: 300px" type="text" name="nome" placeholder="Digite seu nome completo" required>
                <br><br>
                <h3>Qual modalidade está matriculado?</h3>
                <select name="modalidade" id="modalidade" required="required">
                    <option value="">Selecione uma opção</option>
                    <option value="aperfeicoamento">Aperfeiçoamento Proficional</option>
                    <option value="aprendizagem">Aprendizagem Industrial</option>
                    <option value="habilitacao">Habilitação Técnica(Cursos Técnicos)</option>
                    <option value="iniciacao">Iniciação Profissional</option>
                    <option value="qualificacao">Qualificação Profissional</option>
                </select>
                <br>
                <br>
                <label for="cpf"><h3>CPF:</h3></label>
                <input id="cpf" style="color: #004C9B; border: 2px solid #004C9B; border-radius: 5px; font-family: Noto-Sans; font-size: 17px; text-align: center; width: 300px" type="number" name="cpf" maxlength="11" placeholder="Digite seu CPF sem pontuação" required>
                <br><br>
                <h3>Qual curso está matriculado?</h3>
                <select name="curso_m" id="curso_m" required="required">
                    <option value="">Selecione uma opção</option>
                    <option value="administração">Administração</option>
                    <option value="almoxarif">Almoxarif</option>
                    <option value="Automação Industrial">Automação Industrial</option>
                    <option value="auxiliar industrial">Auxiliar de Logística</option>
                    <option value="Assistente Administrativo">Assistente Administrativo</option>
                    <option value="Assistente de Logística">Assistente de Logística</option>
                    <option value="Confecção do Vestuário">Confecção do Vestuário</option>
                    <option value="Confeiteiro Assistente">Confeiteiro Assistente</option>
                    <option value="Costura Criativa">Costura Criativa</option>
                    <option value="Desenvolvimento de Sistemas">Desenvolvimento de Sistemas</option>
                    <option value="eletrotécnica ">Eletrotécnica </option>
                    <option value="Eletricista de Manutenção Eletroeletrônica">Eletricista de Manutenção Eletroeletrônica</option>
                    <option value="Eletricista Industrial">Eletricista Industrial</option>
                    <option value="Eletroeletrônica">Eletroeletrônica</option>
                    <option value="eletronica">Eletrônica</option>
                    <option value="Ferramenteiro de Injeção Termoplástico">Ferramenteiro de Injeção Termoplástico</option>
                    <option value="Gestão Industrial">Gestão Industrial</option>
                    <option value="Impressão Offset">Impressão Offset</option>
                    <option value="Instalação e Reparação de Redes de Computadores">Instalação e Reparação de Redes de Computadores</option>
                    <option value="logistica">Logística</option>
                    <option value="Manutenção Mecânica de Máquinas Industriais">Manutenção Mecânica de Máquinas Industriais</option>
                    <option value="Mecânica Industrial">Mecânica Industrial</option>
                    <option value="mecatronica">Mecatrônica</option>
                    <option value="Modelagem do Vestuário">Modelagem do Vestuário</option>
                    <option value="Noções Básicas de Panificação">Noções Básicas de Panificação</option>
                    <option value="Operador de Computador">Operador de Computador</option>
                    <option value="Operador de Máquinas e Ferramentas Convencionais">Operador de Máquinas e Ferramentas Convencionais</option>
                    <option value="Operador de Processos Industriais - Becton Dickinson">Operador de Processos Industriais - Becton Dickinson</option>
                    <option value="Operação e Manutenção de Equipamentos de Via Permanente - MRS Logística">Operação e Manutenção de Equipamentos de Via Permanente - MRS Logística</option>
                    <option value="Panificação">Panificação  </option>
                    <option value="Processos Administrativos">Processos Administrativos</option>
                    <option value="Segurança do Trabalho">Segurança do Trabalho</option>
                    <option value="vestuario">Vestuário</option>
                </select> 
                <br><br>
                <h3>Sua justificativa refere-se a:</h3>
                <br>
                <div class="alinhar">
                    <input type="checkbox" id="entrada_atraso" name="doc[]" value="Entrada em atraso">
                    <label for="entrada_atraso">Entrada em atraso</label><br>

                    <input type="checkbox" id="saida_antecipada" name="doc[]" value="Saída antecipada">
                    <label for="saida_antecipada">Saída antecipada</label><br>

                    <input type="checkbox" id="um_mais_faltas" name="doc[]" value="1 dia ou mais de falta">
                    <label for="um_mais_faltas">1 dia ou mais de falta</label><br>

                </div>
                <br>
                <hr noshade=”noshade” width="677px" size="7px" color="#004C9B"/><br>
                <div class="texto">
                    <label for="contratante">Empresa contratante, <strong>se houver</strong>. <br>
                     Este campo refere-se apenas para alunos que são contratados como jovem aprendiz por intermédio do SENAI, ou seja, alunos matriculados em cursos de Aprendizagem Industrial.</label><br>
                </div>
                <br>
                <input id="contratante" style="color: #004C9B; border: 2px solid #004C9B; border-radius: 5px; font-family: Noto-Sans; font-size: 17px; text-align: center; width: 500px" type="text" name="contratante" placeholder="Digite o nome da empresa">
                <br><br><hr noshade=”noshade” width="677px" size="7px" color="#004C9B"/>     
                <br>
                <h4>Anexe aqui a justificativa</h4>
                <input type="file" name="arquivo_justificativa" required><br>
                <div class="mensagem"><?php echo $mensagem; ?></div>
                <br>
                <hr noshade=”noshade” width="677px" size="7px" color="#004C9B"/><br>
                <div>
                    <label for="obs"><h4>Observação:</h4></label>
                    <textarea style="color:#004C9B;" name="obs" id="obs" cols="85" rows="5" placeholder="Sua Resposta"></textarea>
                </div>
                <br>
                <button class="bot_solicitar" type="submit">Enviar</button>
                <br>  
                <a style="color:#004C9B; font-size:17px;" href="../php/menu-aluno.php">Voltar para página inicial</a>
            </form>                    
        </div>
    </div>

</body>
</html>
