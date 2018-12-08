<?php 
// Inicia sessões, para assim poder destruí-las 
session_start(); 
session_destroy(); 
 
setcookie("logado");
setcookie("usuario");   

header("Location: login.php"); 
