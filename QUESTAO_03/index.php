<?php
  session_start();
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if ($_POST['nome'] && $_POST['email'] && $_POST['telefone'] && $_POST['mensagem']) {
      $_SESSION['success_message'] = 'Formulário enviado com sucesso!';
      header("Location: {$_SERVER['PHP_SELF']}");
      exit();
    } else {
      $_SESSION['error_message'] = 'Ocorreu um erro ao processar o formulário. Por favor, tente novamente.';
      header("Location: {$_SERVER['PHP_SELF']}");
      exit();
    }
  }

  if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
  }
  
  if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
  }
?>
 
<html>
<head>
<meta charset="UTF-8" />
<title>Questão 3</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
 
<?php if (isset($success_message)): ?>
    <div class="success-message"><?php echo $success_message; ?></div>
<?php endif; ?>

<?php if (isset($error_message)): ?>
    <div class="error-message"><?php echo $error_message; ?></div>
<?php endif; ?>

<div class="cabecalho">
<a href="">
<img src="img/logo-construsite-new.png" />
</a>
</div>
<div class="central">
  <div class="formulario">
    <p class="destaque-texto">Nome: </p>
    <p class="texto">Danilo Antunes</p>
  </div>
  <div class="formulario2">
   <p class="destaque-texto">Mensagem</p>
    <form method="post" action="vendor/enviar.php">
    <div class="input-group">
        
        <input type="text" id="nome" name="nome" placeholder="Nome*">
      </div>
      <div class="input-group">
        
        <input type="text" id="telefone" name="telefone" placeholder="Telefone*">
      </div>
      <div class="input-group">
       
        <input type="email" id="email" name="email" placeholder="Email*">
      </div>
      <div class="input-group">
        
        <input type="text" id="mensagem" name="mensagem" placeholder="Mensagem*">
      </div>
      <input type="submit" value="Enviar Mensagem" class="btn" id="btn">
    </form> 
  </div>
</div>
<hr>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="validate.js"></script>
</body>
</html>
