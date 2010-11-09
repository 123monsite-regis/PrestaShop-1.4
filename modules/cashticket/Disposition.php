<?php

class Disposition
{
	const TABLE_NAME = 'disposition';
	
	public static function create($id_cart, $mtid, $amount, $currency)
	{
		return Db::getInstance()->Execute(
		'INSERT INTO `'._DB_PREFIX_.self::TABLE_NAME.'` (`id_cart`, `mtid`, `amount`, `currency`)
		 VALUES ('.intval($id_cart).',\''.pSQL($mtid).'\','.floatval($amount).',\''.pSQL($currency).'\')');
	}
	
	public static function delete($id)
	{
		return Db::getInstance()->Execute('DELETE FROM `'._DB_PREFIX_.self::TABLE_NAME.'` WHERE `id_disposition` = '.intval($id));
	}
	
	public static function deleteByCartId($id_cart)
	{
		return Db::getInstance()->Execute('DELETE FROM `'._DB_PREFIX_.self::TABLE_NAME.'` WHERE `id_cart` = '.intval($id_cart));
	}
	
	public static function getByCartId($id_cart)
	{
		return Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.self::TABLE_NAME.'` WHERE `id_cart` = '.intval($id_cart));
	}
	
	public static function createTable()
	{
		return Db::getInstance()->Execute(
		'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.self::TABLE_NAME.'` (
		  `id_disposition` int(11) NOT NULL AUTO_INCREMENT,
		  `id_cart` int(11) NOT NULL,
		  `mtid` varchar(20) NOT NULL,
		  `amount` float NOT NULL,
		  `currency` varchar(3) NOT NULL,
		  PRIMARY KEY (`id_disposition`),
		  UNIQUE KEY `id_cart` (`id_cart`)
		)  ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8');
	}
	
	public static function dropTable()
	{
		return Db::getInstance()->Execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.self::TABLE_NAME.'`');
	}
	
	public static function updateAmount($id_disposition, $amount)
	{
		return Db::getInstance()->Execute(
		'UPDATE `'._DB_PREFIX_.self::TABLE_NAME.'` SET `amount` = `amount` - '.floatval($amount).' WHERE `id_disposition` = '.intval($id_disposition));
	}
	 

}

?>
