<?php
function estoque_clientes_create() {

	$id = $_POST["id"];
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$telefone = $_POST["telefone"];

	if(isset($_POST['insert'])) {
		global $wpdb;
		$wpdb->insert('wp_cliente',
			array('id' => $id,'nome' => $nome, 'email' => $email, 'telefone' => $telefone),
			array('%s','%s', '%s', '%s')
		);
		$message .= 'Cliente inserido <a href="' . admin_url('admin.php?page=estoque_clientes_list') . '">Voltar para listagem de Clientes</a>';
	}
?>
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/thiago-plugin/style-admin.css" rel="stylesheet" />
	<div class="wrap">
		<h2>Adicionar Cliente</h2>
		<?php if (isset($message)): ?><div id="message" class="updated notice is-dismissible"><p><?php echo $message;?></p></div><?php endif;?>
		<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
			<table class='wp-list-table widefat fixed'>
				<thead>
					<tr>
						<th>Nome</th>
						<th>Email</th>
						<th>Telefone</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="text" name="nome" value="<?php echo $nome;?>"/></td>
						<td><input type="text" name="email" value="<?php echo $email;?>"/></td>
						<td><input type="text" name="telefone" value="<?php echo $telefone;?>"/></td>
					</tr>
				</tbody>
			</table>
			<input type='submit' name="insert" value='Save' class='button'>
		</form>
	</div>
<?php
}
