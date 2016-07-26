<center><h3> Todos os Usuarios </h3></center>

<?php
$relacionamentos = new relacionamentos();
if ($todososusuarios == null) { 
	echo "</br> </br> <center> <h4>Sistema não possui mais usuários cadastrados. </h4> </center>";
} else {
	foreach($todososusuarios as $todososusuariosselecionados): 
		$verificarStatusRelacionamento = $relacionamentos->verificarStatusRelacionamento($todososusuariosselecionados['usuarios_id']);
	?>
	<div class="meusamigosview">
		<table border="0" width="100%">
			<tr >
				<td width="64" rowspan="2"><img class="imagensfeed" src="/assets/images/usuarios/<?php echo $todososusuariosselecionados['usuarios_imagem']; ?>" border="0" width="60" /></td>
				<td><?php echo $todososusuariosselecionados['usuarios_nomecompleto']; 
					$model = new model();		
					$dataNascimentoFormatada = $model->mask($todososusuariosselecionados['usuarios_datanascimento'], "##/##/####");
					echo " (".$model->calcularIdade($dataNascimentoFormatada)." anos)";
					?>	</td>
					<td width="70" align="right">
						<?php
						if (isset($verificarStatusRelacionamento['relacionamentos_situacao']) && ($verificarStatusRelacionamento['relacionamentos_situacao'] == 0)) {
							if ($verificarStatusRelacionamento['relacionamentos_idadicionado'] == $_SESSION['idusuario']) {
								?> <a href="meusamigos/aprovarAmizade/<?php echo $verificarStatusRelacionamento['relacionamentos_id']; ?>"> <span class='glyphicon glyphicon-ok' aria-hidden='true'> </span>  </a> <?php
							} else {
								echo "<span class='glyphicon glyphicon-time' aria-hidden='true'> </span>";
							}
						} else if (isset($verificarStatusRelacionamento['relacionamentos_situacao']) && ($verificarStatusRelacionamento['relacionamentos_situacao'] == 1)) {
							?> 	<a href="meusamigos/desfazerAmizade/<?php echo $todososusuariosselecionados['usuarios_id']; ?>"> <span class="glyphicon glyphicon-remove" aria-hidden="true">  </a> <?php
						} else {
							?> <a href="meusamigos/adicionarAmigos/<?php echo $todososusuariosselecionados['usuarios_id']; ?>"> <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> </a><?php
						}
						?>
					</td>
				</tr>
				<tr>
					<td><?php echo $todososusuariosselecionados['usuarios_descricao']; ?>	</td>
					<td width="70" align="right"> <?php echo $dataNascimentoFormatada; ?> </td>
				</tr>
			</table>
		</div>
	<?php endforeach;
} 
?>