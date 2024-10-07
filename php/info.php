<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Informações da Empresa</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="shortcut icon" type="imagex/png" href="..//imagens/sdvsdv.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>
<body>
<?php require "menu.php" ?>
    <h1 style="text-align: center;margin: 50px 0; color: #fff; font-size: 35px">Informações Complementares da Empresa</h1>
    <section style="margin: 50px 0;">
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="color: #fff" scope="col">CEP</th>
                        <th style="color: #fff" scope="col">ENDEREÇO</th>
                        <th style="color: #fff" scope="col">CIDADE</th>
                        <th style="color: #fff" scope="col">ESTADO</th>
                        <th style="color: #fff" scope="col">VOLTAR</th>
                    </tr>
                </thead>
                    <tbody>

                        <?php 
                            require_once "conexao.php";                      
                            @$id_empresa = $_GET['id_empresa'];
                            if(isset($id_empresa)){
                                $sql_query = "SELECT * FROM cadastro_e WHERE id_empresa = '$id_empresa'";
                             } else {
                                 $sql_query = "SELECT * FROM cadastro_e";
                            }
                            if ($result = $conn -> query($sql_query)) {
                                while ($row = $result -> fetch_assoc()) { 
                                    $cep = $row['cep'];
                                    $endereco = $row['endereco'];
                                    $cidade = $row['cidade']; 
                                    $estado = $row['estado'];
                        ?>

                                <tr>
                                    <td style="color: #fff"><?php echo $cep; ?></td>
                                    <td style="color: #fff"><?php echo $endereco; ?></td>
                                    <td style="color: #fff"><?php echo $cidade; ?></td>
                                    <td style="color: #fff"><?php echo $estado; ?></td>
                                    <td><button class="botao_info"><a style="text-decoration: none" href="listar-empresas.php"><strong>🡄</strong></a></button></td>
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