--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `wp_produto`;
CREATE TABLE IF NOT EXISTS `wp_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8 NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8 NOT NULL,
  `preco` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produto`
--

INSERT INTO `wp_produto` (`nome`, `descricao`, `preco`) VALUES
('Notebook', 'Macbook Pro', '7899,99'),
('Smartphone', 'iPhone', '2499,99'),
('Tablet', 'iPad', '1499,99');

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `wp_cliente`;
CREATE TABLE IF NOT EXISTS `wp_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `telefone` varchar(15) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

INSERT INTO `wp_cliente` (`nome`, `email`, `telefone`) VALUES
('Thiago', 'thiago@test.com', '(11) 94321-1234'),
('Thiago Sampaio', 'thiago@sampaio.com', '(11) 95432-2345'),
('Thiago Castilho', 'thiago@castilho.com', '(11) 96543-3456');

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `wp_pedido`;
CREATE TABLE IF NOT EXISTS `wp_pedido` (
  `id_produto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedido`
--

INSERT INTO `wp_pedido` (`id_produto`, `id_cliente`) VALUES
(1, 1),
(1, 3),
(2, 2),
(2, 3),
(3, 1),
(3, 2);