<?php

use YOOtheme\Util\Arr;

return [

	'transforms' => [

		'render' => function ($node, array $params) {

			/**
			 * @var $app
			 * @var $theme
			 * @var $builder
			 */
			extract($params);
			$app['styles']->add( 'builder-hd-counter', __DIR__.'/css/counter.css', [], ['defer' => true] );
			$app['scripts']->add( 'builder-hd-counter', __DIR__.'/app/counter.js', [], ['defer' => true] );
			
		},

	],

	'updates' => [

		//

	],

];
