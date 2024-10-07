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
<?php require "menu.php" ?>
    <h1 style="text-align: center;margin: 50px 0; color: #fff; font-size: 35px">Informações Complementares Justificativa</h1>
    <section style="margin: 50px 0;">
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="color: #fff" scope="col">CPF</th>
                        <th style="color: #fff" scope="col">MODALIDADE</th>
                        <th style="color: #fff" scope="col">OBSERVAÇÃO</th>
                        <th style="color: #fff" scope="col">VOLTAR</th>
                    </tr>
                </thead>
                    <tbody>

                        <?php 
                            require_once "conexao.php";                      
                            @$id_justificativa = $_GET['id_justificativa'];
                            if(isset($id_justificativa)){
                                $sql_query = "SELECT * FROM justificativa WHERE id_justificativa = '$id_justificativa'";
                             } else {
                                 $sql_query = "SELECT * FROM justificativa";
                            }
                            if ($result = $conn -> query($sql_query)) {
                                while ($row = $result -> fetch_assoc()) { 
                                    $cpf = $row['cpf'];
                                    $modalidade = $row['modalidade'];
                                    $obs = $row['obs'];
                        ?>

                                <tr>
                                    <td style="color: #fff"><?php echo $cpf; ?></td>
                                    <td style="color: #fff"><?php echo $modalidade; ?></td>
                                    <td style="color: #fff"><?php echo $obs; ?></td>
                                    <td><button class="botao_info"><a style="text-decoration: none" href="justificativas-enviadas.php"><strong>🡄</strong></a></button></td>
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