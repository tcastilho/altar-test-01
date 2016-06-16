<?php
/*
  Plugin Name: Sistema de Estoque
  Plugin URI: http://www.thiagocastilho.com.br
  Description: Plugin para manejar as tabelas de Clientes e Produtos
  Author: Thiago Castilho
  Version: 1.0
  Author URI: http://www.thiagocastilho.com.br
*/

function estoque_create_menu() {
	add_menu_page('Estoque', 'Estoque', 'manage_options', 'estoque_pedidos_list', 'estoque_pedidos_list');
	
	add_submenu_page('estoque_pedidos_list', 'Produtos', 'Produtos', 'manage_options', 'estoque_produtos_list', 'estoque_produtos_list');
	
	add_submenu_page('estoque_produtos_list', 'Adicionar Produto', 'Adicionar Produto', 'manage_options', 'estoque_produtos_create', 'estoque_produtos_create');
	
	add_submenu_page(null, 'Atualizar Produto', 'Atualizar Produto', 'manage_options', 'estoque_produtos_update', 'estoque_produtos_update'); 
	
	add_submenu_page('estoque_pedidos_list', 'Clientes', 'Clientes', 'manage_options', 'estoque_clientes_list', 'estoque_clientes_list'); 
	
	add_submenu_page('estoque_clientes_list', 'Adicionar Produto', 'Adicionar Produto', 'manage_options', 'estoque_clientes_create', 'estoque_clientes_create'); 
	
	add_submenu_page(null, 'Atualizar Cliente', 'Atualizar Cliente', 'manage_options', 'estoque_clientes_update', 'estoque_clientes_update'); 
}
add_action('admin_menu','estoque_create_menu');

define('ROOTDIR', plugin_dir_path(__FILE__));

require_once(ROOTDIR . 'produtos-list.php');
require_once(ROOTDIR . 'produtos-create.php');
require_once(ROOTDIR . 'produtos-update.php');
require_once(ROOTDIR . 'clientes-list.php');
require_once(ROOTDIR . 'clientes-create.php');
require_once(ROOTDIR . 'clientes-update.php');
require_once(ROOTDIR . 'pedidos-list.php');
