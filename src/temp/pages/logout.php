<?php 
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
session_unset(); // Limpe todas as variáveis de sessão
session_destroy(); // Destrua a sessão
header("Location: index.html"); // Redirecione para a página de login
exit();
?>
