<?php
function estoque_clientes_update() {
	
	global $wpdb;

	$id = $_GET["id"];
	$nome=$_POST["nome"];
	$email=$_POST["email"];
	$telefone=$_POST["telefone"];

	if(isset($_POST['update'])) {
		$wpdb->update('wp_cliente',
			array( 'id' => $id ),
			array( 'nome' => $nome, 'telefone' => $telefone, 'email' => $email ),
			array( '%s' ),
			array( '%s', '%s', '%s' )
		);	
	}

	else if(isset($_POST['delete'])) {
		$wpdb->query( $wpdb->prepare("DELETE FROM wp_cliente WHERE id = %s",$id ));
	}

	else {
		$clients = $wpdb->get_results($wpdb->prepare("SELECT id,nome, telefone, email from wp_cliente where id=%s",$id ));
		foreach ($clients as $client ){
			$nome 		= $client->nome;
			$telefone 	= $client->telefone;
			$email 		= $client->email;
		}
	}
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/thiago-pluginstyle-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>Clientes</h2>

<?php if($_POST['delete']) { ?>

<div id="message" class="updated notice is-dismissible">
	<p>1 cliente movido para a Lixeira. <a href="<?php echo admin_url('admin.php?page=estoque_clientes_list')?>">Voltar para listagem de Clientes </a></p>
</div>

<?php } else if($_POST['update']) { ?>

<div id="message" class="updated notice is-dismissible">
	<p>1 cliente Atualizado. <a href="<?php echo admin_url('admin.php?page=estoque_clientes_list')?>">Voltar para listagem de Clientes </a></p>
</div>

<?php } else { ?>

<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
	<table class='wp-list-table widefat fixed'>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Telefone</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><input type="text" name="nome" value="<?php echo $nome;?>"/></td>
				<td><input type="text" name="telefone" value="<?php echo $telefone;?>"/></td>
				<td><input type="text" name="email" value="<?php echo $email;?>"/></td>
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
