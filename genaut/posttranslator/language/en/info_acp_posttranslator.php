<?php
/**
 *
 * Post Translator. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2024, Juan R, https://juanjavierrg.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, [
	'ACP_POSTTRANSLATOR_TITLE'			=> 'Post Translator Module',
	'ACP_POSTTRANSLATOR'				=> 'Post Translator Settings',
	'ACP_POSTTRANSLATOR_API_KEY'		=> 'Api Key From <strong>Lecto Ai</strong>. <a href=\"https://dashboard.lecto.ai/docs\">Get ApiKey Here</a> ',
	'LOG_ACP_POSTTRANSLATOR_SETTINGS'	=> '<strong>Post Translator settings updated</strong>',
]);
