<?php 
	include "conect.php";
	session_start();
	
	$id_receita = $_GET['id'];
	$id_user = $_SESSION['id'];

	$verificacao = mysql_query("select * from user_receitas where id_receita = '$id_receita'")or die(mysql_error());

	if(!mysql_num_rows($verificacao)){
		mysql_query("insert into user_receitas values ('','$id_user','$id_receita')")or die(mysql_error());
	}
?>