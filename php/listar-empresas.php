<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Listar</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="shortcut icon" type="imagex/png" href="..//imagens/sdvsdv.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>
<body>
<?php require "menu.php" ?>
        <h1 style="text-align: center;margin: 50px 0; color: #fff; font-family: Noto-Sans;">Listagem De Empresas</h1>
        <section style="margin: 50px 0;">
        <div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="color: #fff" scope="col">ID_EMPRESA</th>
                    <th style="color: #fff" scope="col">NOME DA EMPRESA</th>
                    <th style="color: #fff" scope="col">CNPJ</th>
                    <th style="color: #fff" scope="col">E-MAIL</th>
                    <th style="color: #fff" scope="col">TELEFONE</th>
                    <th style="color: #fff" scope="col" colspan="4" style="text-align: jcenter;">AÇÕES</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        require_once "conexao.php";
                        $sql_query = "SELECT * FROM cadastro_e";
                        if ($result = $conn -> query($sql_query)) {
                            while ($row = $result -> fetch_assoc()) { 
                                $id_empresa = $row['id_empresa'];
                                $nome_empresa = $row['nome_empresa'];
                                $cnpj = $row['cnpj'];
                                $email_empresa = $row['email_empresa'];
                                $telefone = $row['telefone'];
                    ?>
                    
                    <tr>
                        <td style="color: #fff"><?php echo $id_empresa; ?></td>
                        <td style="color: #fff"><?php echo $nome_empresa; ?></td>
                        <td style="color: #fff"><?php echo $cnpj; ?></td>
                        <td style="color: #fff"><?php echo $email_empresa; ?></td>
                        <td style="color: #fff"><?php echo $telefone; ?></td>
                        <td><button class="botao_enviar "><a style="text-decoration: none"  href="../php/upload.php?nome_empresa=<?php echo $nome_empresa; ?>">Enviar Arquivo</a></button></td>
                        <td><button class="botao_editar"><a style="text-decoration: none" href="editar.php?id_empresa=<?php echo $id_empresa; ?>">Editar Cadastro</a></button></td>
                        <td><button class="botao_excluir"><a style="text-decoration: none"  href="../php/excluir.php?id_empresa=<?php echo $id_empresa; ?>" onclick="return confirm('Tem certeza que deseja deletar esta empresa?')">Excluir Cadastro</a></td></button>
                        <td><button class="botao_info"><a style="text-decoration: none" href="info.php?id_empresa=<?php echo $id_empresa; ?>"><strong>ⓘ</strong></a></button></td>
                    </tr>

                    <?php
                            } 
                        }
                    $conn->close(); 
                    ?>
                </tbody>
              </table>
        </div>
    </section>  
</body>
</html> 