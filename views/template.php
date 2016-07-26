<html>
<head>
	<title>Bem-Vindo CodeRockr - A Rede Social</title>
	<link rel="stylesheet" href="/assets/css/template.css" />
	<link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<div class="layout">
	<nav class="navbar navbar-default">
		<div class="container-fluid">

			<div class="navbar-header">
				<img src="/assets/images/logo.png" border="0" height="50" />
			</div>

			<form class="navbar-form navbar-left" role="search" method="post" action="/todososusuarios">
				<div class="form-group">
					<input type="text" class="form-control" name="usuarioPesquisado" placeholder="Pesquisar Usuarios">
				</div>
				<button type="submit" class="btn btn-default">Pesquisar</button>
			</form>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="/feednoticias">Feed de Noticias</a></li>
				<li><a href="/meusamigos">Meus Amigos</a></li>
				<li><a href="http://en.coderockr.com/">CodeRockr</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Meu Perfil <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/meuperfil">Meu Perfil</a></li>
						<li><a href="/sair">Sair</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<div class="informacoespessoais_esquerdo">
		<img class="imagemperfil" src="/assets/images/usuarios/<?php echo $dadosUsuarioLogado['usuarios_imagem']; ?>" border="0" width="100%" />
		<h3> <?php echo $dadosUsuarioLogado['usuarios_nomecompleto']; ?></h3>
		<h4> <?php $model = new model();
			$dataNascimentoFormatada = $model->mask($dadosUsuarioLogado['usuarios_datanascimento'], "##/##/####");
			echo $model->calcularIdade($dataNascimentoFormatada)." anos"; ?> </h4>
			<h4> <?php 	echo $dataNascimentoFormatada; 	?> </h4>
			<h4> <?php 	echo $dadosUsuarioLogado['usuarios_descricao']; ?> </h4>
		</div>
		<div class="containerprincipal_centro">
			
			<?php $this->loadViewInTemplate($viewName, $viewData); ?>

		</div>
		<div class="amigos_direito">
			
			<h4>Meus amigos</h4>
			<?php 
			$relacionamentosTemplate = new relacionamentos();
			$relacionamentosMeusAmigos = $relacionamentosTemplate->listarTresAmigosParaPaginaInicial();
			if (isset($relacionamentosMeusAmigos)) {
				foreach($relacionamentosMeusAmigos as $meusAmigosTemplate): ?>
					<div class="todososamigostemplate">
						<table border="0" align="center" width="100%">
							<p size="10">
								<tr rowspan="2">
									<td width="40" height="30"><img src="/assets/images/usuarios/<?php echo $meusAmigosTemplate['usuarios_imagem']; ?>" border="0" width="30" /> </td>
									<td><?php echo $meusAmigosTemplate['usuarios_nomecompleto'];?> </td>
								</tr>
							</p>
						</table> </br>
					</div>
				<?php endforeach;
			} else {
				echo "Você não tem amigos ativos.";
			}
			?>
			
		</br>

		<?php 
		$relacionamentosTemplate = new relacionamentos();
		$listarTodosOsUsuarios = $relacionamentosTemplate->listarPessoasNoTemplate();
		$usuarioLogado = $_SESSION['idusuario'];
		if (!empty($listarTodosOsUsuarios)) {
			echo "<h4> Adicionar mais amigos </h4>";
			foreach($listarTodosOsUsuarios as $listarUsuariosNoTemplate): 
				$verificarStatusRelacionamentoTemplate = $relacionamentosTemplate->verificarStatusRelacionamento($listarUsuariosNoTemplate['usuarios_id']);
			?>
			<div class="todososusuariostemplate">
				<table border="0" align="center" width="100%">
					<p size="10">
						<tr rowspan="2">
							<td width="40"><img src="/assets/images/usuarios/<?php echo $listarUsuariosNoTemplate['usuarios_imagem']; ?>" border="0" width="30" /> </td>
							<td><?php echo $listarUsuariosNoTemplate['usuarios_nomecompleto'];?> </td>
						</tr>
						<tr>
							<td> </td>
							<td align="right"> 
								<?php
								if (isset($verificarStatusRelacionamentoTemplate['relacionamentos_situacao']) && ($verificarStatusRelacionamentoTemplate['relacionamentos_situacao'] == 0)) {
									if ($verificarStatusRelacionamentoTemplate['relacionamentos_idadicionado'] == $usuarioLogado) {
										?> <a href="meusamigos/aprovarAmizade/<?php echo $verificarStatusRelacionamentoTemplate['relacionamentos_id']; ?>"> <span class='glyphicon glyphicon-ok' aria-hidden='true'> </span>  </a> <?php
									} else {
										echo "<span class='glyphicon glyphicon-time' aria-hidden='true'> </span>";
									}
								} else if (isset($verificarStatusRelacionamentoTemplate['relacionamentos_situacao']) && ($verificarStatusRelacionamentoTemplate['relacionamentos_situacao'] == 1)) {
									?> <a href="meusamigos/desfazerAmizade/<?php echo $listarUsuariosNoTemplate['usuarios_id']; ?>"> <span class="glyphicon glyphicon-remove" aria-hidden="true"> </span> </a><?php
								} else {
									?> <a href="meusamigos/adicionarAmigos/<?php echo $listarUsuariosNoTemplate['usuarios_id']; ?>"> <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> </a> <?
								}
								?> 
							</td>
						</p>
					</table>
				</div>
			<?php endforeach; 
		}
		?>
	</div>
</div>	

<div class="rodape">
	<h5> Desenvolvido por André Luiz Leoni </h5>
</div>
</body>
</html>