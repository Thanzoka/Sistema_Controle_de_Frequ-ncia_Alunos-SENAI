<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Arquivos Enviados</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="shortcut icon" type="imagex/png" href="..//imagens/sdvsdv.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>
<body>
<?php require "menu.php" ?>
        <h1 style="text-align: center;margin: 50px 0; color: #fff; font-family: Noto-Sans;">Arquivos Enviados</h1>
        <section style="margin: 50px 0;">
        <div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="color: #fff" scope="col">ID_ARQUIVO</th>
                    <th style="color: #fff" scope="col">ID_EMPRESA</th>
                    <th style="color: #fff"  scope="col">ARQUIVO</th>
                    <th style="color: #fff"  scope="col">DATA</th>
                    <th style="color: #fff"  scope="col" colspan="3" style="text-align: jcenter;">AÇÕES</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        require_once "conexao.php";
                        $sql_query = "SELECT * FROM controle_faltas";
                        if ($result = $conn -> query($sql_query)) {
                            while ($row = $result -> fetch_assoc()) { 
                                $id_arquivo = $row['id_arquivo'];
                                $id_empresa = $row['id_empresa'];
                                $targetFile = $row['arquivo'];
                                $data = $row['data'];
                    ?>
                    
                    <tr>
                        <td style="color: #fff"><?php echo $id_arquivo; ?></td>
                        <td style="color: #fff"><?php echo $id_empresa; ?></td>
                        <td style="color: #fff"><?php echo basename($targetFile); ?></td>
                        <td style="color: #fff"><?php echo $data; ?></td>
                        <td><button class="botao_excluir"><a style="text-decoration: none"  href="../php/excluir-arquivo.php?id_arquivo=<?php echo $id_arquivo; ?>" onclick="return confirm('Tem certeza que deseja deletar este arquivo?')">Excluir Arquivo</a></td></button>
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