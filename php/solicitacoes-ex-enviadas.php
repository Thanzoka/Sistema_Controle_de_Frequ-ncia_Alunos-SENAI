<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Solicitações Enviados</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="shortcut icon" type="imagex/png" href="..//imagens/sdvsdv.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>
<body>
<?php require "solicitacoes-menu.php" ?>
        <h1 style="text-align: center;margin: 50px 0; color: #fff; font-family: Noto-Sans;">Solicitações Ex-Alunos</h1>
        <section style="margin: 50px 0;">
        <div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="color: #fff" scope="col">ID_EXALUNO</th>
                    <th style="color: #fff" scope="col">NOME</th>
                    <th style="color: #fff"  scope="col">CURSO REALIZADO</th>
                    <th style="color: #fff"  scope="col">DATA APROX. REALIZAÇÃO DO CURSO</th>
                    <th style="color: #fff"  scope="col">DOC. SOLICITADO</th>
                    <th style="color: #fff"  scope="col" colspan="3" style="text-align: jcenter;">AÇÕES</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        require_once "conexao.php";
                        $sql_query = "SELECT * FROM solicita_ex";
                        if ($result = $conn -> query($sql_query)) {
                            while ($row = $result -> fetch_assoc()) { 
                                $id_exaluno = $row['id_exaluno'];
                                $nome_ex_aluno = $row['nome_ex_aluno'];
                                $curso_realizou = $row['curso_realizou'];
                                $data_aprox = $row['data_aprox'];
                                $documentos = $row['documentos'];                                
                    ?>
                    
                    <tr>
                        <td style="color: #fff"><?php echo $id_exaluno ; ?></td>
                        <td style="color: #fff"><?php echo $nome_ex_aluno; ?></td>
                        <td style="color: #fff"><?php echo $curso_realizou; ?></td>
                        <td style="color: #fff"><?php echo $data_aprox ; ?></td>
                        <td style="color: #fff"><?php echo $documentos ; ?></td>
                        <td><button class="botao_info"><a style="text-decoration: none" href="info-exaluno.php?id_exaluno=<?php echo $id_exaluno; ?>"><strong>➤</strong></a></button></td>
                        <td><button class="botao_excluir"><a style="text-decoration: none"  href="../php/excluir_solicitacao_ex.php?id_exaluno=<?php echo $id_exaluno; ?>" onclick="return confirm('Tem certeza que deseja deletar esta solicitação?')">Excluir</a></td></button>
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