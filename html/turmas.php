<?php require('head.php');
if (! $USER->admin()) {
	echo "Acesso negado";
	exit;
}
?>
<h2>Administra&ccedil;&atilde;o de turmas</h2>
<?php
if (isset($_REQUEST['delete'])) {
		$turma = new Turma($_REQUEST['delete']);
		if ($turma->remove())
			echo "<p>Turma removida</p>";
		else 
			echo "<p>Erro ao remover turma! Verifique se a turma tem 0 alunos</p>";
}
if(isset($_REQUEST['submit'])) {
		$turma = new Turma();
		if ($turma->create($_REQUEST['nome'])) 
			echo "<p>Turma criada</p>"; 
		else 
			echo "<p>Erro ao criar turma!</p>";
}
?>
<p>Turmas cadastradas:</p>
<table><tr><th colspan=2>Nome</th><th>Alunos</th></tr>
<?php
foreach (ListTurmas() as $turma) {
	echo "<tr><td><a href='?delete=".$turma->getId()."'><img src='img/x.png'></a></td><td>".$turma->getNome()."</td><td>".$turma->getAlunos()."</td></tr>";
}
?>
</table>

<form name="cadastro" action="#" method="post">
<p>Criar nova turma: <input type="text" name="nome" style="width: 300px;">
<br><button type="submit" name="submit" value="submit">ok</button>
</p>
</form>

</div>
</body>
</html>
