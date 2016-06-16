<?php
function estoque_clientes_list() {
?>
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/thiago-plugin/style-admin.css" rel="stylesheet" />
	<div class="wrap">
	<h2>Clientes
		<a href="<?php echo admin_url('admin.php?page=estoque_clientes_create'); ?>" class="page-title-action">Adicionar Novo</a>
	</h2>
	<?php

	global $wpdb;

	$clients = $wpdb->get_results("SELECT id, nome, email, telefone from wp_cliente");
	echo "<table class='wp-list-table widefat fixed striped posts'>";
	echo "<thead><tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>&nbsp;</th></tr></thead>";
	echo "<tbody>";
	foreach ($clients as $client ){
		echo "<tr>";
		echo "<td>$client->id</td>";
		echo "<td>$client->nome</td>";
		echo "<td>$client->email</td>";
		echo "<td>$client->telefone</td>";
		echo "<td><a href='".admin_url('admin.php?page=estoque_clientes_update&id='.$client->id)."'>Atualizar</a></td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
?>
	</div>
<?php
}
