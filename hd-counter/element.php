<?php

namespace YOOtheme;

return [

	'transforms' => [

		'render' => function ($node) {

			/**
			 * @var Metadata $metadata
			 */
			$metadata = app(Metadata::class);

			$metadata->set('style:builder-hd-counter', ['href' => Path::get('./css/hd-counter.css')]);
			$metadata->set('script:builder-hd-counter', ['src' => Path::get('./js/hd-counter.js'), 'defer' => true]);

		},

	],

	'updates' => [

        '2.0.9' => function ($node) {

            if (!isset($node->props['separator_locale'])) {
                $node->props['separator_locale'] = "";
            }

        }

	],

];
