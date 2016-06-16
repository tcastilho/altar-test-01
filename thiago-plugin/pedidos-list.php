<?php
function estoque_pedidos_list() {
?>
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/thiago-plugin/style-admin.css" rel="stylesheet" />
	<div class="wrap">
	<h2>Pedidos</h2>

	<?php
	global $wpdb;
	$requests = $wpdb->get_results("SELECT wp_pedido.*, wp_cliente.nome AS client, wp_produto.nome AS product, wp_produto.preco FROM wp_pedido, wp_cliente, wp_produto WHERE id_produto = wp_produto.id AND id_cliente = wp_cliente.id");
	echo "<table class='wp-list-table widefat fixed striped posts'>";
	echo "<thead><tr><th>Cliente</th><th>Produto</th><th>Preço</th></tr></thead>";
	echo "<tbody>";
	foreach ($requests as $request ){
		echo "<tr>";
		echo "<td>$request->client</td>";
		echo "<td>$request->product</td>";	
		echo "<td>$request->preco</td>";	
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
?>
	</div>
<?php
}
