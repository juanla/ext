<?php
/**
 *
 * Post Translator. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2024, Juan R, https://juanjavierrg.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace genaut\posttranslator\migrations;

class install_acp_module extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['genaut_posttranslator_enable']);
	}

	public static function depends_on()
	{
		return ['\phpbb\db\migration\data\v320\v320'];
	}

	public function update_data()
	{
		return [
			['config.add', ['genaut_posttranslator_enable', 0]],

			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_POSTTRANSLATOR_TITLE'
			]],
			['module.add', [
				'acp',
				'ACP_POSTTRANSLATOR_TITLE',
				[
					'module_basename'	=> '\genaut\posttranslator\acp\main_module',
					'modes'				=> ['settings'],
				],
			]],
		];
	}
}
