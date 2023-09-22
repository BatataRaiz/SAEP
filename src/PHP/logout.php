<?php 
session_start(); // Inicie a sessão, se ainda não estiver iniciada
session_unset(); // Limpe todas as variáveis de sessão
session_destroy(); // Destrua a sessão
header("Location: index.php"); // Redirecione para a página de login
exit();
?>
