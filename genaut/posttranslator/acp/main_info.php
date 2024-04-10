<?php
/**
 *
 * Post Translator. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2024, Juan R, https://juanjavierrg.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace genaut\posttranslator\acp;

/**
 * Post Translator ACP module info.
 */
class main_info
{
	public function module()
	{
		return [
			'filename'	=> '\genaut\posttranslator\acp\main_module',
			'title'		=> 'ACP_POSTTRANSLATOR_TITLE',
			'modes'		=> [
				'settings'	=> [
					'title'	=> 'ACP_POSTTRANSLATOR',
					'auth'	=> 'ext_genaut/posttranslator && acl_a_board',
					'cat'	=> ['ACP_POSTTRANSLATOR_TITLE'],
				],
			],
		];
	}
}
