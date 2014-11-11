<?php

return [
	'connections' => [
		'mysql' => [
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => getenv('DB_NAME'),
			'username'  => getenv('DB_USERNAME'),
			'password'  => getenv('DB_PASSWORD'),
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		],
	],
];
