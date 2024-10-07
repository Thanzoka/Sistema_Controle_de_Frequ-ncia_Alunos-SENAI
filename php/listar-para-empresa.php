<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Arquivos</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="shortcut icon" type="imagex/png" href="..//imagens/sdvsdv.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>

<body>
<?php require "menu-empresa.php" ?>
    <h1 style="text-align: center;margin: 50px 0; color: #fff; font-size: 35px">Listagem De Arquivos</h1>
    <section style="margin: 50px 0;">
        <div>
            <table class="table table-striped">
                <thead>
                  <tr>
                  <th style="color: #fff" scope="col">ID_ARQUIVO</th>
                    <th style="color: #fff" scope="col">DATA/HORA</th>
                    <th style="color: #fff" scope="col">ARQUIVO</th>
                    <th style="color: #fff" scope="col" colspan="3" style="text-align: jcenter;">DOWNLOAD</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        require_once "conexao.php";                      
                        @$id_empresa = $_COOKIE['id_empresa'];
                        if(isset($id_empresa)){
                            $sql_query = "SELECT * FROM controle_faltas WHERE id_empresa = '$id_empresa'";
                        } else {
                            $sql_query = "SELECT * FROM controle_faltas";
                        }
                        if ($result = $conn -> query($sql_query)) {
                            while ($row = $result -> fetch_assoc()) { 
                                $id_arquivo = $row['id_arquivo'];
                                $data = $row['data'];
                                $targetFile = $row['arquivo']; 
                    ?>
                    
                    <tr>
                        <td style="color: #fff"><?php echo $id_arquivo; ?></td>
                        <td style="color: #fff"><?php echo $data; ?></td>
                        <td colspan="2" style="color: #fff"><?php echo basename($targetFile); ?></td>
                        <td><button class="baixar"><a style="text-decoration: none" href="<?php echo $targetFile; ?>" download>Download</a></button></td>
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