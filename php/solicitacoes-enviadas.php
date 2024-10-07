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
        <h1 style="text-align: center;margin: 50px 0; color: #fff; font-family: Noto-Sans;">Solicitações</h1>
        <section style="margin: 50px 0;">
        <div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="color: #fff" scope="col">ID_SOLICITAÇÃO</th>
                    <th style="color: #fff" scope="col">ALUNO</th>
                    <th style="color: #fff"  scope="col">MODALIDADE</th>
                    <th style="color: #fff"  scope="col">CURSO MATRICULADO</th>
                    <th style="color: #fff"  scope="col">DOCUMENTOS SELECIONADOS</th>
                    <th style="color: #fff"  scope="col">BOLETO</th>
                    <th style="color: #fff"  scope="col" colspan="3" style="text-align: jcenter;">AÇÕES</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        require_once "conexao.php";
                        $sql_query = "SELECT * FROM solicitacao";
                        if ($result = $conn -> query($sql_query)) {
                            while ($row = $result -> fetch_assoc()) { 
                                $id_solicitacao = $row['id_solicitacao'];
                                $nome = $row['nome'];
                                $modalidade = $row['modalidade'];
                                $curso_m = $row['curso_m'];
                                $documentos = $row['documentos'];
                                $rec = $row['rec'];
                    ?>
                    
                    <tr>
                        <td style="color: #fff"><?php echo $id_solicitacao ; ?></td>
                        <td style="color: #fff"><?php echo $nome; ?></td>
                        <td style="color: #fff"><?php echo $modalidade; ?></td>
                        <td style="color: #fff"><?php echo $curso_m; ?></td>
                        <td style="color: #fff"><?php echo $documentos; ?></td>
                        <td style="color: #fff"><?php echo $rec; ?></td>
                        <td><button class="botao_excluir"><a style="text-decoration: none"  href="../php/excluir_solicitacao.php?id_solicitacao=<?php echo $id_solicitacao; ?>" onclick="return confirm('Tem certeza que deseja deletar esta justificativa?')">Excluir</a></td></button>
                        <td><button class="botao_info"><a style="text-decoration: none" href="info-alunos.php?nome=<?php echo $nome; ?>"><strong>ⓘ</strong></a></button></td>
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