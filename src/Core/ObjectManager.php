<?php
namespace MVC\Core;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class ObjectManager
{
	private static $dbParams;
	private static $config;
	private static $instance;

	public static function getInstance() {
		static::$dbParams = array(
			'driver'   => 'pdo_mysql',
			'user'     => 'root',
			'password' => '',
			'host'     => 'localhost',
			'dbname'   => 'aht_mvc',
		);

		static::$config = Setup::createAnnotationMetadataConfiguration(array(BASEPATH . "src/Models"), true);

		if (static::$instance == null) {
			static::$instance = EntityManager::create(static::$dbParams, static::$config);
		}

		return static::$instance;
	}
}
