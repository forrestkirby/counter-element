<?php

use YOOtheme\Util\Arr;

return [

	'transforms' => [

		'render' => function ($node, array $params) use ($file) {

			/**
			 * @var $app
			 * @var $theme
			 * @var $builder
			 */
			extract($params);

			$app['styles']->add('builder-hd-counter', "{$file['dirname']}/css/hd-counter.css", [], ['defer' => true]);
			$app['scripts']->add('builder-hd-counter', "{$file['dirname']}/js/hd-counter.js", [], ['defer' => true]);

		},

	],

	'updates' => [

		//

	],

];
