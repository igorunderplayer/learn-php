<?php
  session_start();
  include 'db.php';

  $nome = $_POST['fnome'] ?? null;
  $email = $_POST['femail'] ?? null;
  $idade = $_POST['fidade'] ?? null;

  $msg = '';

  if (isset($nome, $email, $idade)) {
    $insertQuery = $conn->prepare("INSERT INTO `usuarios` (nome, email, idade) VALUES (?, ?, ?)");
    $insertQuery->bind_param('ssi', $nome, $email, $idade);
    try {
      $insertQuery->execute();
        $msg = 'New record created successfully';
  
        $_SESSION['nome'] = $nome;
      } catch(Exception $e) {
        $msg = 'Unable to create record';
      }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina em php</title>
</head>
<body>
  <?php
    echo '<span>' . $msg . '</span>'
  ?>
  <h1>Olá!!</h1>

  <?php
    echo 'Olá ' . $_SESSION['nome'] 
  ?>

  <form action="index.php" method="post">
    <label for="inputName">Seu nome:</label>
    <input type="text" name="fnome" id="inputName">

    <label for="inputEmail">Seu e-mail:</label>
    <input type="email" name="femail" id="inputEmail">

    <label for="inputIdade">Sua idade:</label>
    <input type="number" name="fidade" id="inputIdade">

    <input type="submit">
  </form>
</body>
</html>

