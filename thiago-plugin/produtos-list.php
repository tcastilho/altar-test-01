<?php
function estoque_produtos_list() {
?>
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/thiago-plugin/style-admin.css" rel="stylesheet" />
	<div class="wrap">
	<h2>Produtos
		<a href="<?php echo admin_url('admin.php?page=estoque_produtos_create'); ?>" class="page-title-action">Adicionar Novo</a>
	</h2>
	<?php

	global $wpdb;

	$produtos = $wpdb->get_results("SELECT id, nome, descricao, preco from wp_produto");
	echo "<table class='wp-list-table widefat fixed striped posts'>";
	echo "<thead><tr><th>ID</th><th>Nome</th><th>Descrição</th><th>Preço</th><th>&nbsp;</th></tr></thead>";
	echo "<tbody>";
	foreach ($produtos as $produto ){
		echo "<tr>";
		echo "<td>$produto->id</td>";
		echo "<td>$produto->nome</td>";
		echo "<td>$produto->descricao</td>";
		echo "<td>$produto->preco</td>";
		echo "<td><a href='".admin_url('admin.php?page=estoque_produtos_update&id='.$produto->id)."'>Atualizar</a></td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
?>
	</div>
<?php
}
