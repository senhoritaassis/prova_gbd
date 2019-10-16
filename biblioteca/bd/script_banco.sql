
CREATE DATABASE prova_gbd;
USE prova_gbd;

DROP TABLE IF EXISTS `Cliente`;
CREATE TABLE `Cliente` (
  `idCliente` int(10) NOT NULL AUTO_INCREMENT,
  `rg` int(10) NOT NULL,
  `nome` varchar(60) NOT NULL,
  PRIMARY KEY (`idCliente`)
);

DROP TABLE IF EXISTS `itemVenda`;

CREATE TABLE `itemVenda` (
  `codvenda` int(10) unsigned NOT NULL,
  `codProduto` int(10) unsigned NOT NULL,
  `quantidade` int(10) unsigned NOT NULL,
  PRIMARY KEY (`codvenda`,`codProduto`),
  KEY `codProduto` (`codProduto`),
  FOREIGN KEY (`codvenda`) REFERENCES `venda` (`codvenda`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`codProduto`) REFERENCES `produto` (`codProduto`) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `codProduto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  `quantidade` int(10) unsigned NOT NULL,
  PRIMARY KEY (`codProduto`)
);

DROP TABLE IF EXISTS `venda`;
CREATE TABLE `venda` (
  `codvenda` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(10) NOT NULL,
  `dataVenda` date NOT NULL,
  PRIMARY KEY (`codvenda`),
  KEY `fk_venda_Cliente1_idx` (`idCliente`),
  CONSTRAINT `fk_venda_Cliente1` FOREIGN KEY (`idCliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

-- PROCEDURES CLIENTE --

-- Cadastrar cliente --
DELIMITER $$
    CREATE PROCEDURE sp_cadastrarCliente (IN rg INT (10) , nome VARCHAR (60) )
	BEGIN
            if (rg != 0 ) AND (nome != '') then
		INSERT INTO  cliente
                VALUES (rg, nome);
            else
		SELECT  "Preencha todos os campos pedidos"  AS Msg;
            end if;
	END $$
DELIMITER;

-- Listar cliente por id--

DELIMITER $$
    CREATE PROCEDURE sp_listarClientePorId (IN idCliente INT (10) )
        BEGIN
            SELECT * FROM cliente where idCliente = idCliente;
        END $$
DELIMITER ;

-- Listar cliente --
DELIMITER $$
    CREATE PROCEDURE sp_listarCliente ()
        BEGIN
            SELECT * FROM cliente;
        END $$
DELIMITER ;

-- Deletar cliente --
DELIMITER $$
    CREATE PROCEDURE sp_deletarCliente (IN idCliente INT (10))
        BEGIN 
            DELETE FROM cliente WHERE idCliente = idCliente;
        END $$
DELIMITER ;

-- Editar cliente --
DELIMITER $$
    CREATE PROCEDURE sp_editarCliente (IN idCliente INT (10), rg INT (10), nome VARCHAR (60))
        BEGIN
            UPDATE cliente SET rg = rg, nome = nome WHERE idCliente = idCliente;
        END $$
DELIMITER ;

-- autualizar cliente -- 
CREATE PROCEDURE sp_editarcliente(IN id INT(10), rg INT(10), nome VARCHAR(60))
BEGIN
	UPDATE cliente SET rg=rg, nome=nome WHERE idCliente=id;
END $$

DELIMITER ;

-- PROCEDURES PRODUTO --

-- Cadastrar produto --
DELIMITER $$
    CREATE PROCEDURE sp_cadastrarProduto (IN codProduto INT (10), descricao VARCHAR(45), quantidade INT(10)  )
	BEGIN
            if (codProduto != 0 ) AND (descricao != '') AND (quantidade != 0) then
		INSERT INTO  cliente
                VALUES (codProduto, descricao, quantidade);
            else
		SELECT  "Preencha todos os campos pedidos"  AS Msg;
            end if;
	END $$
DELIMITER;

-- Listar produto por código --
DELIMITER $$
    CREATE PROCEDURE sp_listarProdutoporCod (IN codProduto INT (10))
        BEGIN
            SELECT * FROM produto where codProduto = codProduto;
        END $$
DELIMITER ;

-- Listar produtos --
DELIMITER $$
    CREATE PROCEDURE sp_listarProduto ()
        BEGIN
            SELECT * FROM produto;
        END $$
DELIMITER ;

-- Deletar produto --
DELIMITER $$
    CREATE PROCEDURE sp_deletarProduto (IN codProduto INT (10))
        BEGIN 
            DELETE FROM produto WHERE codProduto = codProduto;
        END $$
DELIMITER ;

-- Editar produto --
DELIMITER $$
    CREATE PROCEDURE sp_editarProduto (IN codProduto INT (10), descricao VARCHAR(45), quantidade INT(10))
        BEGIN
            UPDATE produto SET descricao = descricao, quantidade = quantidade WHERE codProduto = codProduto;
        END $$
DELIMITER ;