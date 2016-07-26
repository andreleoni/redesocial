<!DOCTYPE html>
<html>
<head>
	<title>CodeRockr - A Rede Social</title>
	<link rel="stylesheet" href="/assets/css/login.css" />
	<link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

</head>
<body>
	<div class="paginainicial">
		<div class="logo"> 
			<center> <img src="/assets/images/logo.png" class="imagelogo" /> </center>
		</div>
		<?php
		if (isset($_SESSION["statusNovoRegistro"])) {
			echo "<center><b><span style='color:red'>".$_SESSION["statusNovoRegistro"]."</span> </b></center>"; 
		}
		?> 
		<div class="formulario">
			<center><h2> Registrar-se </h2></center>
		</br>
		<form name="login" action="/registrarse" method="post" >
			<center><table>
				<tr>
					<td><b>Nome Completo:</b></td>
					<td> <input type="text" name="nomecompleto"></td>
				</tr>
				<tr> <td><p></p></td><td></td></tr>
				<tr>
					<td><b> E-mail: </b></td>
					<td> <input type="text" name="email"> </td>
				</tr>
				<tr> <td><p></p></td><td></td></tr>
				<tr>
					<td><b>Nascimento:</b></td>
					<td>
						<b>Dia: <input type="text" name="dia" size="3" maxlength="2" value=""> 
							Mês: <input type="text" name="mes" size="3" maxlength="2" value=""> 
							Ano: <input type="text" name="ano" size="5" maxlength="4" value=""></b>
						</td>
					</tr>
					<tr> <td><p></p></td><td></td></tr>
					<tr>
						<td><b>Senha: </b></td>
						<td><input type="password" name="senha"></td>
					</tr>
				</table>
			</center>
		</br>
		<input type="submit" name="enviar" value="Registrarse" class="btn btn-success"> 
		<a href="/"> <input type="button" value="Voltar" class="btn btn-danger" /> </a>
		<input type="hidden" name="registrarse" />
	</form>
</div>
</div>

</body>
</html>