<?php

Kirby::plugin('flokosiol/viewmode', [
	'pageMethods' => [
		'viewMode' => function ($viewMode = '') {
			$html = '';
			if (!empty($viewMode)) {
				try {
					$html = $this->render([], $viewMode);
				} finally {
					return $html;
				}
			}
			return $html;
		},
	],
	'routes' => function ($kirby) {
		return [
			[
				'pattern' => $kirby->option('flokosiol.viewmode.blockedRoutes', []),
				'action' => function () {
					return false;
				}
			],
		];
	},
]);
