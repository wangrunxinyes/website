<?php

// uncomment the following to define a path alias

// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable

// CWebApplication properties can be configured here.

return array(

	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',

	'name' => 'WRX',

	// preloading 'log' component

	'preload' => array('log'),

	// autoloading model and component classes

	'import' => array(

		'application.models.*',

		'application.helper.*',

		'application.functions.*',

		'application.components.*',

		'application.unit.*',

	),

	'defaultController' => 'site',

	// application components

	'components' => array(

		'user' => array(

			// enable cookie-based authentication

			'allowAutoLogin' => true,

			'class' => 'WebUser',

		),

		'data' => array(
			'class' => 'application.models.DataHelper',
		),

		'assets' => array(
			'class' => 'application.helper.register_script_helper',
		),

		'oauth' => array(
			'class' => 'application.models.Oauth',
		),

		'visitor' => array(
			'class' => 'application.helper.visitor_helper',
		),

		// 'db'=>array(

		// 	'connectionString' => 'sqlite:protected/data/blog.db',

		// 	'tablePrefix' => 'tbl_',

		// ),

		// uncomment the following to use a MySQL database

		'db' => array(

			'connectionString' => 'mysql:host=localhost;dbname=wangrunxin',

			'emulatePrepare' => true,

			'username' => 'wangrunxin',

			'password' => 'wrx52691000',

			'charset' => 'utf8',

			'tablePrefix' => 'tbl_',

		),

		'errorHandler' => array(

			// use 'site/error' action to display errors

			'errorAction' => 'site/error',

		),

		'urlManager' => array(

			'urlFormat' => 'path',

			'showScriptName' => false, //去除index.php

			'rules' => array(

				'pattern1' => 'route1',

				'pattern2' => 'route2',

				'pattern3' => 'route3',

				'post/<id:\d+>/<title:.*?>' => 'post/view',

				'posts/<tag:.*?>' => 'post/index',

				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',

			),

		),

		'log' => array(

			'class' => 'CLogRouter',

			'routes' => array(

				array(

					'class' => 'CFileLogRoute',

					'levels' => 'error, warning',

				),

				// uncomment the following to show log messages on web pages

				/*

			array(

			'class'=>'CWebLogRoute',

			),

			 */

			),

		),

	),

	// application-level parameters that can be accessed

	// using Yii::app()->params['paramName']

	'params' => require (dirname(__FILE__) . '/params.php'),

);