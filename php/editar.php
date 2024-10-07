<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Informações da Empresa</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" type="imagex/png" href="..//imagens/sdvsdv.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>
<body>
<div class="cabecalho">
        <div class="img-cab">
            <img src="../imagens/senai_logo.png" alt="logo">
        </div>
    
        <div class="titulo">
            <h1>Secretaria Senai - Editar Empresa</h1>
        </div>
</div> 
<?php 
                require_once "conexao.php";
                @$sql_query = "SELECT * FROM cadastro_e WHERE id_empresa = ".$_GET["id_empresa"];
                if ($result = $conn ->query($sql_query)) {
                    while ($row = $result -> fetch_assoc()) { 
                        $id_empresa = $row['id_empresa'];
                        $nome_empresa = $row['nome_empresa'];
                        $cnpj = $row['cnpj'];
                        $telefone = $row['telefone'];
                        $email_empresa = $row['email_empresa'];
            ?>
            <div id="container">
                <div class="quadrado2">
                <center>
                <h1>Editar Informações</h1>
                    <form method="POST" action="atualizar.php">
                        <input type="hidden" value="<?php echo $id_empresa; ?>" name="id_empresa" id="id_empresa" required>
                        
                        <div class="input-box">
                            <label>Nome Empresa</label>
                            <input type="text" value="<?php echo $nome_empresa; ?>" name="nome_empresa" id="nome_empresa" required>
                        </div>

                        <div class="input-box">
                            <label>CNPJ</label>
                            <input type="text" value="<?php echo $cnpj; ?>" name="cnpj" id="cnpj" required>
                        </div>

                        <div class="input-box">
                            <label>E-mail</label>
                            <input type="tel" value="<?php echo $telefone; ?>" name="telefone" id="telefone" required>
                        </div>

                        <div class="input-box">
                            <label>Telefone</label>
                            <input type="text" value="<?php echo $email_empresa; ?>" name="email_empresa" id="email_empresa" required>
                        </div>

                        <br>
                        <button type="submit" class="botao_editar2">Editar</button>

                    </form>
                </center>   
                </div> 
            </div>                
                <?php 
                    }
                }
                $conn->close();
                ?>
            </div>
</body>
</html>