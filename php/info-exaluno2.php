<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Informações</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="shortcut icon" type="imagex/png" href="..//imagens/sdvsdv.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>
<body>
<?php require "solicitacoes-menu.php" ?>
    <h1 style="text-align: center;margin: 50px 0; color: #fff; font-size: 35px">Informações EX-Aluno</h1>
    <section style="margin: 50px 0;">
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="color: #fff" scope="col">CEP</th>
                        <th style="color: #fff" scope="col">ENDEREÇO</th>
                        <th style="color: #fff" scope="col">CIDADE</th>
                        <th style="color: #fff" scope="col">ESTADO</th>
                        <th style="color: #fff" scope="col">OBSERVAÇÃO</th>
                        <th style="color: #fff" scope="col">INÍCIO</th>
                    </tr>
                </thead>
                    <tbody>

                        <?php 
                            require_once "conexao.php";                      
                            @$id_exaluno = $_GET['id_exaluno'];
                            if(isset($id_exaluno)){
                                $sql_query = "SELECT * FROM solicita_ex WHERE id_exaluno = '$id_exaluno'";
                             } else {
                                 $sql_query = "SELECT * FROM solicita_ex";
                            }
                            if ($result = $conn -> query($sql_query)) {
                                while ($row = $result -> fetch_assoc()) { 
                                    $cep = $row['cep'];
                                    $endereco = $row['endereco'];
                                    $cidade = $row['cidade'];
                                    $estado = $row['estado'];
                                    $obs = $row['obs'];
                        ?>

                                <tr>
                                    <td style="color: #fff"><?php echo $cep; ?></td>
                                    <td style="color: #fff"><?php echo $endereco; ?></td>
                                    <td style="color: #fff"><?php echo $cidade; ?></td>
                                    <td style="color: #fff"><?php echo $estado; ?></td>
                                    <td style="color: #fff"><?php echo $obs; ?></td>
                                    <td><button class="botao_info"><a style="text-decoration: none" href="solicitacoes-ex-enviadas.php"><strong>⮜</strong></a></button></td>
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