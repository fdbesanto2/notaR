<?php
require_once("config.php");
require_once("class/aluno.php");
require_once("class/nota.php");
require_once("class/user.php");
require_once("class/turma.php");
require_once("class/exercicio.php");
require_once("class/proibido.php");
require_once("class/teste.php");
?>
<!DOCTYPE html>
<html>
		<head>
				<link rel="stylesheet" type="text/css" href="style.css" />
				<script language="javascript" src="java.js"></script>
				<meta charset="iso-8859-1" />
				<meta name="description" content="Um sistema para notas automatizadas em cursos que utilizam a linguagem R" />
				<title>notaR</title>
		</head>
<body onload="defch()">
	<div id="Top">
		<div style="float:left">
			<h1><a href="index.php">notaR</a></h1>
			<p>Um sistema para notas automatizadas em cursos que 
			utilizam a linguagem R</p>
		</div>
		<div style="float:right">
			<br>&nbsp;
			<?php echo $USER->loginForm(); ?>
		</div>
<div style=" width: 100%; height: 1px; clear:both"></div>
	</div>
	<div id="MainDiv">
<?php
if(isset($loginerror))  echo $loginerror; 
?>
