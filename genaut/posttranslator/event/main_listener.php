<?php
/**
 *
 * Post Translator. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2024, Juan R, https://juanjavierrg.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 *
 */

namespace genaut\posttranslator\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class main_listener implements EventSubscriberInterface
{
	public static function getSubscribedEvents()
	{
		return [
			'core.common'		=> 'common_setup',
			'core.user_setup'	=> 'load_language_on_setup',
		];
	}
	
	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\config\config */
	protected $config;
	
	/**
	 * Constructor
	* @param \phpbb\template\template $template Template object
	* @param \phpbb\config\config     $config   Config object
	*/
	public function __construct(\phpbb\template\template $template, \phpbb\config\config $config)
	{
		$this->template = $template;
		$this->config = $config;
	}

	/**
	 * Load language files
	 *
	 * @param \phpbb\event\data $event
	 */
	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = [
			'ext_name' => 'genaut/posttranslator',
			'lang_set' => 'common',
		];
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function common_setup($event)
	{
		$this->template->assign_vars(array(
			'GENAUT_PT_ENABLE'		=> (bool) $this->config['genaut_posttranslator_enable'],
		));
	}

}
