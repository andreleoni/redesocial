<center> <h3> Alterar minha senha </h3> </center>
</br>
<form name="login" action="/alterarsenha/alterarSenha" method="post" >
	<center><table>
		<tr>
			<td><b>Digite sua senha:</b></td>
			<td><input type="password" name="senhaOriginal"></td>
		</tr>
		<tr>
			<td height="50px"><b>Repita sua senha:</b></td>
			<td><input type="password" name="senhaConfirmacao"></td>
		</tr>
	</table>
	
</br> 
<input type="submit" name="enviar" value="Alterar Sinha Senha" class="btn btn-success"> 
<a href="/meuperfil"> <input type="button" value="Voltar" class="btn btn-danger" /> </a>
<input type="hidden" name="registrarse" />
</center>
</form>