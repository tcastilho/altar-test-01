<?php
function estoque_produtos_update() {
	
	global $wpdb;

	$id = $_GET["id"];
	$nome=$_POST["nome"];
	$preco=$_POST["preco"];
	$descricao=$_POST["descricao"];
	
	if(isset($_POST['update'])) {
		$wpdb->update('wp_produto',
			array( 'id' => $id ),
			array( 'nome' => $nome, 'descricao' => $descricao, 'preco' => $preco ),
			array( '%s' ),
			array( '%s', '%s', '%s' )
		);	
	}

	else if(isset($_POST['delete'])) {
		$wpdb->query( $wpdb->prepare("DELETE FROM wp_produto WHERE id = %s",$id ));
	}

	else {
		$products = $wpdb->get_results($wpdb->prepare("SELECT id,nome, descricao, preco from wp_produto where id=%s",$id ));
		foreach ($products as $product ){
			$nome		= $product->nome;
			$descricao	= $product->descricao;
			$preco		= $product->preco;
		}
	}
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/thiago-plugin/style-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>Produtos</h2>

<?php if($_POST['delete']) { ?>

<div id="message" class="updated notice is-dismissible">
	<p>1 produto movido para a Lixeira. <a href="<?php echo admin_url('admin.php?page=estoque_produtos_list')?>">Voltar para listagem de Produtos </a></p>
</div>

<?php } else if($_POST['update']) { ?>

<div id="message" class="updated notice is-dismissible">
	<p>1 produto Atualizado. <a href="<?php echo admin_url('admin.php?page=estoque_produtos_list')?>">Voltar para listagem de Produtos </a></p>
</div>

<?php } else { ?>

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
	<input type="submit" name="update" value="Save" class="button">&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" name="delete" value="Delete" class="button">
</form>

<?php }?>

</div>
<?php
}
