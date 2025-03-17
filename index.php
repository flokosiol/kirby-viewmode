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
	'fieldMethods' => [
		'viewMode' => function ($field, $viewMode = '') {
			$html = '';
			if (!empty($viewMode) && $field->isNotEmpty()) {
				return snippet('viewmode/fields/' . $viewMode, ['field' => $field], true);
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
