<?php require("head.php"); ?>
<?php
if ($user->admin()) {
	echo "<div float='right' style='border: 2px dashed #fcc>";
	echo "Administrar:<br><ul><li><a href='turmas.php'>Turmas</a></li>";
	echo "<li><a href='alunos.php'>Alunos<</a>/li><li><a href='prazos.php'>Prazos</a></li></ul></div>";
}
?>
<br>&nbsp;
<p>Exerc&iacute;cios cadastrados:
<?php
echo "<table><tr>";
if ($user->admin()) echo "<td></td>";
echo "<td>Nome</td><td>Nota</td><td>Prazo</td></th>";
$res = mysql_query("SELECT id_exercicio FROM exercicio ORDER BY 1 ASC");
while ($exerc = mysql_fetch_array($res)) {
		$X = new Exercicio($user, $exerc[0]);
		echo "<tr><td>";
		if ($user->admin()) echo "<a href='cadastra.php?exerc=".$X->getID()."'><img src='pen.png'></a></td><td>";
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