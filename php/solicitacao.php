<?php

require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["modalidade"])) {
        $modalidade = $_POST["modalidade"];
        $sql = "INSERT INTO solicitacao (modalidade) VALUES ('$modalidade')";
    } 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["curso_m"])) {
        $curso_m = $_POST["curso_m"];
        $sql = "INSERT INTO solicitacao (curso_m) VALUES ('$curso_m')";
    } 
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secretaria - Solicitação</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" type="imagex/png" href="..//imagens/sdvsdv.png">
</head>
<body>
    <div class="cabecalho">
        <div class="img-cab">
            <img src="../imagens/senai_logo.png" alt="logo">
        </div>
        <div class="titulo">
            <h1 style="font-family: Noto-Sans;">Solicitação de emissão de documentos escolares</h1>
        </div>
    </div>
    <div id="container">
        <div class="quadrado">
            <br>
            <form id="modalidade" action="processar.php" method="post">
                <label for="nome"><h3>Nome:</h3></label>
                <input id="nome" style="color: #004C9B; border: 2px solid #004C9B; border-radius: 5px; font-family: Noto-Sans; font-size: 20px; text-align: center; width: 300px" type="text" name="nome" placeholder="Digite seu nome completo" required>
                <br><br>
                <h3>Qual modalidade está matriculado?</h3>
                <select name="modalidade" id="modalidade" required="required">
                    <option value="">Selecione uma opção</option>
                    <option value="aprendizagem">Aprendizagem Industrial</option>
                    <option value="habilitacao">Habilitação Técnica(Cursos Técnicos)</option>
                    <option value="iniciacao">Iniciação Profissional</option>
                    <option value="qualificacao">Qualificação Profissional</option>
                </select>
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
                <h3>Documentos a serem solicitados:</h3>
                <br>
                <div class="alinhar">
                    <input type="checkbox" id="hist_parcial" name="documentos[]" value="Histórico Parcial - R$ 15,00">
                    <label for="hist_parcial">Histórico Parcial - R$ 15,00</label><br>

                    <input type="checkbox" id="decl_transferencia" name="documentos[]" value="Declaração de Transferência - R$ 15,00">
                    <label for="decl_transferencia">Declaração de Transferência - R$ 15,00</label><br>

                    <input type="checkbox" id="carta_estagio" name="documentos[]" value="Carta de apresentação para estágio optativo - Gratuito">
                    <label for="carta_estagio">Carta de apresentação para estágio optativo - Gratuito</label><br>

                    <input type="checkbox" id="ementa_escolar" name="documentos[]" value="Ementa Escolar - R$ 20,00 por disciplina com teto máximo de R$ 100,00">
                    <label for="ementa_escolar">Ementa Escolar - R$ 20,00 por disciplina com teto máximo de R$ 100,00</label><br>

                    <input type="checkbox" id="decl_matricula" name="documentos[]" value="Declaração de matrícula - Gratuito">
                    <label for="decl_matricula">Declaração de matrícula - Gratuito</label><br>

                    <input type="checkbox" id="2a_via_carteirinha" name="documentos[]" value="2ª via de carteirinha estudantil - R$ 10,00">
                    <label for="2a_via_carteirinha">2ª via de carteirinha estudantil - R$ 10,00</label><br>

                    <input type="checkbox" id="recuperacao" name="documentos[]" value="Recuperação - R$ 10,00">
                    <label for="recuperacao">Recuperação - R$ 10,00</label><br><br>
                </div>

                <h3>Como deseja receber o boleto para pagamento?</h3>
                <br>
                <div class="alinhar">
                    <input type="checkbox" id="whatsApp" name="rec[]" value="WhatsApp">
                    <label for="whatsApp">WhatsApp</label><br>

                    <input type="checkbox" id="email" name="rec[]" value="E-mail">
                    <label for="email">E-mail</label><br>

                    <input type="checkbox" id="ret_pres" name="rec[]" value="Retirar presencialmente">
                    <label for="ret_pres">Retirar presencialmente</label><br>
                </div>
                <br>

                <button class="bot_solicitar" type="submit">Solicitar Documentos</button>
                <br>  
                <a style="color:#004C9B; font-size:17px;" href="../php/menu-aluno.php">Voltar para página inicial</a>       
            </form>              
        </div>
    </div>

</body>
</html>

</body>
</html>
