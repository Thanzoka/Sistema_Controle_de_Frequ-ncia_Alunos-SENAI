<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitação Ex-Aluno</title>
    <link rel="stylesheet" href="../css/estilo.css"> 
    <link rel="shortcut icon" type="imagex/png" href="..//imagens/sdvsdv.png">

    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            color: #004C9B;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            color: #004C9B;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('formulario');

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                var formData = new FormData(form);

                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../php/solicitar_ex.php', true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        alert('Solicitação enviada com sucesso!');
                        form.reset(); // Limpa os campos do formulário
                    } else {
                        alert('Erro ao enviar solicitação.');
                    }
                };
                xhr.send(formData);
            });
        });
    </script>

    <script>
        function buscarCep() {
            var cep = document.getElementById('cep').value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'https://viacep.com.br/ws/' + cep + '/json/');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var endereco = JSON.parse(xhr.responseText);
                    if (endereco.erro) {
                         alert('CEP não encontrado');
                    } else {
                        document.getElementById('endereco').value = endereco.logradouro;
                        document.getElementById('cidade').value = endereco.localidade;
                        document.getElementById('estado').value = endereco.uf;
                    }
                } else {
                     alert('Erro ao buscar CEP');
                }
            };
            xhr.send();
        }
    </script>
</head>
<body>
    <div class="cabecalho">
        <div class="img-cab">
            <img src="../imagens/senai_logo.png" alt="logo">
        </div>
    
        <div class="titulo">
            <h1 style="margin-top:17px">Solicitação de emissão de documentos escolares</h1>
        </div>
    </div> 

    <div class="container">
        <h1>Dados</h1>
        <form id="formulario" method="POST" enctype="multipart/form-data">

            <label for="nome_ex_aluno">Nome:</label>
            <input type="text" id="nome_ex_aluno" name="nome_ex_aluno" placeholder="Digite seu nome completo" required>
        
            <label for="data">Data de nascimento:</label>
            <input type="date" id="data" name="data" required>
                    
            <br><br>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" maxlength="11" placeholder="Digite seu CPF sem pontuação" required>

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" maxlength="14" placeholder="Digite seu telefone ex.:(xx)xxxxx-xxxx" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
        
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" maxlength="9" onblur="buscarCep()" placeholder="Digite o CEP ex.:(xxxxxxxx)" required>
        
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" placeholder="Ex.: Rua, Número, Complemento (se houver) - Bairro" required>
        
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade">
        
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado">

            <h3>Anexe aqui documento de identificação oficial  (Frente e Verso)</h3><br>
            <strong>Frente</strong> <br><input type="file" name="solicita_exaluno_frente" required><br>
            <strong>Verso</strong> <br><input type="file" name="solicita_exaluno_verso" required><br><br>

            <label for="curso_realizou">Qual curso realizou?</label>
            <input type="text" id="curso_realizou" name="curso_realizou" placeholder="Digite o qual curso" required>

            <label for="data_aprox">Data aproximada de realização do curso:</label>
            <input type="date" id="data_aprox" name="data_aprox" required>
            <br><br>
            <h3>Qual documento deseja solicitar?</h3>
            <br>
            <div class="reto">
                <input type="checkbox" id="2a_via_cert" name="documentos[]" value="2ª via de Certificado - R$ 25,00">
                <label for="2a_via_cert">2ª via de Certificado - R$ 25,00</label><br>

                <input type="checkbox" id="2a_via_dip" name="documentos[]" value="2ª via de Diploma - R$ 35,00">
                <label for="2a_via_dip">2ª via de Diploma - R$ 35,00</label><br>

                <input type="checkbox" id="2a_via_dip_sup" name="documentos[]" value="2ª via de Diploma Curso Superior - R$ 120,00">
                <label for="2a_via_dip_sup">2ª via de Diploma Curso Superior - R$ 120,00</label><br>

                <input type="checkbox" id="2a_hist_escolar" name="documentos[]" value="2ª via Historico Escolar - R$ 20,00">
                <label for="2a_hist_escolar">2ª via Historico Escolar - R$ 20,00</label><br>

                <input type="checkbox" id="decl_conclusao" name="documentos[]" value="Declaração de Conclusão - R$ 15,00">
                <label for="decl_conclusao">Declaração de Conclusão - R$ 15,00</label><br>

                <input type="checkbox" id="decl_aposent" name="documentos[]" value="Declaração para Fins de Aposentadoria - R$ 20,00">
                <label for="decl_aposent">Declaração para Fins de Aposentadoria - R$ 20,00</label><br>

                <input type="checkbox" id="ementa" name="documentos[]" value="Ementa Escolar - R$ 20,00 por disciplina, limitado a R$ 100,00">
                <label for="ementa">Ementa Escolar - R$ 20,00 por disciplina, limitado a R$ 100,00</label><br>

                <input type="checkbox" id="hist_parcial" name="documentos[]" value="Histórico Parcial - R$ 15,00">
                <label for="hist_parcial">Histórico Parcial - R$ 15,00</label><br>
            </div> 

            <h3>Como deseja receber o boleto para pagamento?</h3>
            <br>
            <div class="reto">
            <input type="checkbox" id="whatsApp" name="rec[]" value="WhatsApp">
            <label for="whatsApp">WhatsApp</label><br>

            <input type="checkbox" id="email" name="rec[]" value="E-mail">
            <label for="email">E-mail</label><br>

            <input type="checkbox" id="ret_pres" name="rec[]" value="Retirar presencialmente">
            <label for="ret_pres">Retirar presencialmente</label><br>
            </div>

            <div>
                <label for="obs"><h4>Observação, se houver:</h4></label>
                <textarea style="color:#004C9B;" name="obs" id="obs" cols="85" rows="5" placeholder="Sua Resposta"></textarea>
            </div>

                <button type="submit" class="cadastro2">Enviar</button><br>
                <a style="color:#004C9B" href="../html/index.html">Sair</a>
        </form>
    </div>
</body>
</html>