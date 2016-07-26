<div class="escrevernovamensagem">

	<form name="feednoticiasnovas" action="/feednoticias/postar" method="post">
		<h3>Digite abaixo a sua mensagem pessoal: </h3>
		<h5><textarea name="texto" rows="4" cols="60"></textarea></h5>
		<input type="submit" name="Postar" value="Postar" class="btn btn-success">
	</form>

</div>

<dir class="visualizarmensagensdeamigos">
	<h3> Feed de Notícias </h3>
	<?php
	$usuarioModel = new usuario();
	$model = new model();

	foreach($feednoticias as $feed): 
		$donoDoPost = $usuarioModel->selecionarDonoDoPost($feed['posts_id_usuario']);
	?>
	<div class="feed">
		<table border="0" align="center" width="100%">
			<tr >
				<td rowspan="3" width="120"><img class="imagensfeed" src="/assets/images/usuarios/<?php echo $donoDoPost['usuarios_imagem']; ?>" border="" width="100" />  </td>
				<td width="100%" height="20"><b><?php echo $donoDoPost['usuarios_nomecompleto']; ?></b></td>
				<td width="100" align="right"><b>
					<?php 
					$horadePostagemFormatada = $model->mask($feed["posts_hora"], "##:##");
					$datadePostagemFormatada = $model->mask($feed["posts_datacriacao"], "##/##/####");
					echo $horadePostagemFormatada."</br>".$datadePostagemFormatada; 
					?> </b>
				</td>
			</tr>
			<tr>
				<td colspan="2"><?php echo $feed['posts_texto']; ?> </td>
			</tr>
			<tr>
				<td align="right" colspan="2" height="20"> 
					<?php
					$idUsuarioLogado = $_SESSION['idusuario'];
					$idUsuariodoPost = $donoDoPost['usuarios_id'];
					if ($idUsuariodoPost != $idUsuarioLogado) {
						//Futuramente criar o botao e tabela "CURTIR"
					} else {
						echo "<a href='/feednoticias/excluirPost/".$feed['posts_id']."'> <span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> </a>";
					}
					?>
				</td>
			</tr>
		</table>
	</div>
<?php endforeach; ?>
</dir>