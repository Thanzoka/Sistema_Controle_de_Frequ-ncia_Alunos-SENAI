<?php
if(isset($_COOKIE["id_empresa"])) {
  $id_empresa = $_COOKIE["id_empresa"];

  $connect = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connect,"banco_controle");
  $query = mysqli_query($connect, "SELECT nome_empresa FROM cadastro_e WHERE id_empresa = '$id_empresa'");
  $dados_empresa = mysqli_fetch_assoc($query);
  $nome_empresa = $dados_empresa['nome_empresa'];
} else {
  header("Location: log-empresa.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu da Empresa</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" type="imagex/png" href="..//imagens/sdvsdv.png">
</head>
<body>
  <div class="cabecalho">
    <div class="img-cab">
      <img src="../imagens/senai_logo.png" alt="logo">
    </div>
      
    <div class="titulo">
      <h1 style="font-size: 2.5rem"><strong>Controle de Frequência - Alunos</strong></h1>
    </div>
  </div> 
  <br> 
  <center><h1 style="color:#fff; font-size: 30px"><strong>Bem-vindo à sua área da empresa, <?php echo $nome_empresa; ?>!</h1></strong></center>

  <center>
  <ul>
    <button class="botao_listar"><a style="text-decoration: none; color: #004C9B" href="../php/listar-para-empresa.php" class="listar">Listar Arquivos</a></button>
    <button class="botao_sair"><a style="text-decoration: none; color: #004C9B" href="../html/index.html" class="logaut">Logout</a></button>
  </ul>
  </center>

    
</body>
</html>
