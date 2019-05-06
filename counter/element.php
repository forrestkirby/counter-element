<?php

use YOOtheme\Util\Arr;

return [

	'transforms' => [

		'render' => function ($node, array $params) use ($config) {

			/**
			 * @var $app
			 * @var $theme
			 * @var $builder
			 */
			extract($params);

			$app['styles']->add('builder-counter', $config->get('url:./css/counter.css'), [], ['defer' => true]);
			$app['scripts']->add('builder-counter', $config->get('url:./js/counter.js'), [], ['defer' => true]);

		},

	],

	'updates' => [

		//

	],

];
