<center><h3> Amigos </h3></center>

<?php
$relacionamentos = new relacionamentos();
if ($meusamigos == null) {
	echo "</br> </br> <center> <h4> Você não tem amigos adicionados. Para procurar novos amigos <a href='/todososusuarios'> clique aqui. </a></h4> </center>";
} else {

	foreach($meusamigos as $meusamigosview): 
		$verificarStatusRelacionamento = $relacionamentos->verificarStatusRelacionamento($meusamigosview['usuarios_id']);
	$usuarioLogado = $_SESSION['idusuario'];
	?>
	<div class="meusamigosview">
		<table border="0" width="100%">
			<tr >
				<td width="64" rowspan="2"><img class="imagensfeed" src="/assets/images/usuarios/<?php echo $meusamigosview['usuarios_imagem']; ?>" border="0" width="60" /></td>
				<td><?php echo $meusamigosview['usuarios_nomecompleto']; 
					$model = new model();		
					$dataNascimentoFormatada = $model->mask($meusamigosview['usuarios_datanascimento'], "##/##/####");
					echo " (".$model->calcularIdade($dataNascimentoFormatada)." anos)";
					?>	</td>
					<td width="70" align="right">
						<?php
						if (isset($verificarStatusRelacionamento['relacionamentos_situacao']) && ($verificarStatusRelacionamento['relacionamentos_situacao']== 0)) {
							if ($verificarStatusRelacionamento['relacionamentos_idadicionado'] == $usuarioLogado) {
								?> <a href="meusamigos/aprovarAmizade/<?php echo $verificarStatusRelacionamento['relacionamentos_id']; ?>"> <span class='glyphicon glyphicon-ok' aria-hidden='true'> </span>  </a> <?php
							} else {
								echo "<span class='glyphicon glyphicon-time' aria-hidden='true'> </span>";
							}
						} else if (isset($verificarStatusRelacionamento['relacionamentos_situacao']) && ($verificarStatusRelacionamento['relacionamentos_situacao']== 1)) {
							?> 	<a href="meusamigos/desfazerAmizade/<?php echo $meusamigosview['usuarios_id']; ?>"> <span class="glyphicon glyphicon-remove" aria-hidden="true"> </span> </a> <?php
						}
						?>
					</td>
				</tr>
				<tr>
					<td><?php echo $meusamigosview['usuarios_descricao']; ?>	</td>
					<td width="70" align="right"> <?php echo $dataNascimentoFormatada; ?> </td>
				</tr>
			</table>
		</div>
	<?php endforeach;  
} 
?>