<!DOCTYPE html>
<html>
<head>
	<title>CodeRockr - A Rede Social</title>
	<link rel="stylesheet" href="/assets/css/login.css" />
	<link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

</head>
<body>
	<div class="paginainicial">
		<center> <h4> Olá! Bem Vindo a CodeRockr Rede Social, aqui você pode interagir com seus amigos e se relacionar com eles através de uma linha do tempo. </h4> </center>
	</br>

	<div class="logo"> 
		<center> <img src="/assets/images/logo.png" class="imagelogo" /> </center>
	</div>
	<div><?php 
		if (isset($_SESSION["userinvalido"])) {
			echo "<center><b><span style='color:red'>".$_SESSION["userinvalido"]."</span> </b></center>"; 
		} 
		?> </div>
		<div class="formulario">
			<center><h1> Bem Vindo! </h1></center>
		</br>
		<form name="login" action="/login" method="post" >
			E-mail: <input type="text" name="email">
		</br> </br>
		Senha: <input type="password" name="senha">
	</br> </br>
	<input type="submit" name="enviar" value="Entrar" class="btn btn-primary"> 
	
	<a href="/registrarse"><input type="button" value="Registrar-se" class="btn btn-success"> </a>
</form>	
</div>
</div>
</body>
</html>