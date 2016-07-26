<center> <h3> Meu Perfil </h3> </center>
</br>
<div class="meuperfil">
	<?php
	if (isset($_SESSION["statusAlterarRegistro"])) {
		echo "<center><b><span style='color:red'>".$_SESSION["statusAlterarRegistro"]."</span> </b></center>"; 
		unset($_SESSION["statusAlterarRegistro"]);
	}
	?>
	<table border="0" width="100%">
		<tr>
			<td rowspan="4" width="200"> <img class="imagemperfil" src="/assets/images/usuarios/<?php echo $meuperfil['usuarios_imagem']; ?>" border="0" width="180" /> </td>
			<td> <b>Nome Completo:</b>  <?php echo $meuperfil['usuarios_nomecompleto']; ?></td>
		</tr>
		<tr>
			<td width="200"> <b>Data de Nascimento: </b> 
				<?php $model = new model();
				$dataNascimentoFormatada = $model->mask($meuperfil['usuarios_datanascimento'], "##/##/####"); 
				echo $dataNascimentoFormatada; 	?> 
			</td>
		</tr>
		<tr>
			<td width="200"> <b> Email: </b> <?php echo $meuperfil['usuarios_email']; ?>   </td>
		</tr>
		<tr>
			<td width="200"> <b> Descrição: </b> <?php echo $meuperfil['usuarios_descricao']; ?>  </td>
		</tr>
		<tr>
			<td align="center" colspan="2">
			</br>
			<a href="/atualizarinformacoes">
				<input type="button" value="Atualizar Informações" class="btn btn-success">
			</a>
			<a href="/alterarsenha">
				<input type="button" value="Alterar uma Senha" class="btn btn-primary">
			</a>
			<a href="/excluirminhaconta">
				<input type="button" value="Excluir Minha Conta" class="btn btn-danger">
			</a>
		</td>
	</tr>
</table>
</div>