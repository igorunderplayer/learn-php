<?php
  $hostname = '127.0.0.1';
  $username = 'root';
  $password = null;
  $database = 'learning_db';
  $port = null;

  $conn = new mysqli($hostname, $username, $password, $database, $port);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  };

?>