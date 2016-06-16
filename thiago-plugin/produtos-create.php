<?php
function estoque_produtos_create() {

	$id = $_POST["id"];
	$nome = $_POST["nome"];
	$descricao = $_POST["descricao"];
	$preco = $_POST["preco"];

	if(isset($_POST['insert'])) {
		global $wpdb;
		$wpdb->insert('wp_produto',
			array('id' => $id,'nome' => $nome, 'descricao' => $descricao, 'preco' => $preco),
			array('%s','%s', '%s', '%s')
		);
		$message .= 'Produto inserido <a href="' . admin_url('admin.php?page=estoque_produtos_list') . '">Voltar para listagem de Produtos</a>';
	}
?>
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/thiago-plugin/style-admin.css" rel="stylesheet" />
	<div class="wrap">
		<h2>Adicionar Produto</h2>
		<?php if (isset($message)): ?><div class="updated"><p><?php echo $message;?></p></div><?php endif;?>
		<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
			<table class='wp-list-table widefat fixed'>
				<thead>
					<tr>
						<th>Nome</th>
						<th>Descrição</th>
						<th>Preço</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="text" name="nome" value="<?php echo $nome;?>"/></td>
						<td><input type="text" name="descricao" value="<?php echo $descricao;?>"/></td>
						<td><input type="text" name="preco" value="<?php echo $preco;?>"/></td>
					</tr>
				</tbody>
			</table>
			<input type='submit' name="insert" value='Save' class='button'>
		</form>
	</div>
<?php
}
