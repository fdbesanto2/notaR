<?php require("head.php"); ?>
<br>&nbsp;
<p>Exerc&iacute;cios cadastrados:
<table><th><td>Nota</td><td>Prazo</td></th>
<?php
$res = mysql_query("SELECT id_exercicio FROM exercicio ORDER BY 1 ASC");
while ($exerc = mysql_fetch_array($res)) {
		$X = new Exercicio($user, $exerc[0]);
		echo "<tr><td>";
		if ($user->admin()) echo "<a href='cadastra.php?exerc=".$X->getID()."'><img src='pen.png'></a>";
		echo "<a href='exercicio.php?exerc=".$X->getID()."'>".
				$X->nome()."</a></td><td>".$X->nota()."</td><td>".
				$X->prazo()."</td></tr>";
}
?>
</table>
</p>
<?php if ($user->admin()) echo "<p><a href=\"cadastra.php\">Cadastrar novo exerc&iacute;cio</a></p>"; ?>
</div>
</body>
</html>
