<?php require('head.php');
$id = mysql_real_escape_string($_REQUEST['exerc']);
$X = new Exercicio($user, $id);
?>
<h2>Exerc&iacute;cios de leitura e manipula&ccedil;&atilde;o de dados</h2>
<h3><?php echo $X->nome(); ?></h3>
<?php 
echo $user->loginForm();
echo $X->html();
?>

<form name="notaR" action="#" method="post">
<input type="hidden" name="exerc" value="<?php echo $X->getId(); ?>">
<input type="text" name="texto" size=130 value="<?php if (isset($_POST['texto'])) echo $_POST['texto']; ?>">
<!--/textarea-->
<!--textarea rows=8 cols=70 name="texto"-->
<!--?php if (isset($_POST['texto'])) echo $_POST['texto']; ?-->
<!--/textarea-->
<button type="submit" value="Submit">OK</button>
</form>

<div id="corretoR" >
<?php 
if (isset($_POST['texto'])) {

$user =$user->getLogin();
$exerc=$_POST['exerc'];
$texto=$_POST['texto'];
$texto = str_replace('\n', '', $texto);

require_once 'config.php';
require_once 'Rserve.php';

   $r = new Rserve_Connection(RSERVE_HOST);
   $x = $r->evalString('source("/var/www/rserve/corretor.R");');
   $x = $r->evalString('notaR("'.$user.'", '.$exerc.', "'.$texto.'")');   
   echo $x;
}
else 
{ echo "<p>Insira sua resposta no campo acima e aperte OK</p>";
}
?>
</div>
<a href="index.php">In&iacute;cio</a>

</div>
</body>
</html>
