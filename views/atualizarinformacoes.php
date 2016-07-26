<center><h2> Atualizar Informações </h2></center>
</br>
<?php
if (isset($_SESSION["statusAlterarRegistro"])) {
	echo "<center><b><span style='color:red'>".$_SESSION["statusAlterarRegistro"]."</span> </b></center>"; 
}
?>
<form name="login" action="/atualizarinformacoes/atualizarInformacoes" enctype="multipart/form-data" method="post" >
	<center><table>
		<tr>
			<td><b>Nome Completo:</b></td>
			<td> <input size="30	" type="text" name="nomecompleto" value="<?php echo $atualizarinformacoes['usuarios_nomecompleto']; ?>"></td>
		</tr>
		<tr> <td><p></p></td><td></td></tr>
		<tr>
			<td><b> E-mail: </b></td>
			<td> <input readonly="readonly" type="text" size="30" name="email" value="<?php echo $atualizarinformacoes['usuarios_email']; ?>"> </td>
		</tr>
		<tr> <td><p></p></td><td></td></tr>
		<tr>
			<td><b>Nascimento:</b></td>
			<td>
				<?php
				$model = new model();
				$datas = $model->mask($atualizarinformacoes['usuarios_datanascimento'],"##/##/####");
				$datas = explode('/', $datas);
				?>

				<b>Dia: <input type="text" name="dia" size="3" maxlength="2" value="<?php echo $datas[0]; ?>"> 
					Mês: <input type="text" name="mes" size="3" maxlength="2" value="<?php echo $datas[1]; ?>"> 
					Ano: <input type="text" name="ano" size="5" maxlength="4" value="<?php echo $datas[2]; ?>"></b>
				</td>
			</tr>
			<tr> <td><p></p></td><td></td></tr>
			<tr>
				<td><b>Descrição: </b></td>
				<td><textarea name="descricao" rows="4" cols="30"><?php echo $atualizarinformacoes['usuarios_descricao']; ?></textarea></td>
			</tr>
			<tr> <td><p></p></td><td></td></tr>
			<tr>
				<td><b>Alterar Foto de Perfil: </b></td>
				<td> <input name="fotoperfil" type="file" /> </td>
			</tr>

		</table>
	</center>
</br>
<center> <input type="submit" name="enviar" value="Atualizar Informaçoes" class="btn btn-success"> 
	<a href="/meuperfil"> <input type="button" value="Voltar" class="btn btn-danger" /> </a>
</center>
</form>
