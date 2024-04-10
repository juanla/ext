<?php
/**
 *
 * Post Translator. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2024, Juan R, https://juanjavierrg.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace genaut\posttranslator\controller;

/**
 * Post Translator controller.
 */
class translator_controller
{
	/* @var \phpbb\config\config */
    protected $config;

    /* @var \phpbb\controller\helper */
    protected $helper;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\request\request */
	protected $request;
	/**
     * Constructor
     *
     * @param \phpbb\config\config      	$config
     * @param \phpbb\controller\helper      $helper
     * @param \phpbb\template\template      $template
     * @param \phpbb\request\request      $request
     */
    public function __construct(\phpbb\config\config $config,  \phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\request\request $request)
    {
        $this->config   	= $config;
        $this->helper   	= $helper;
		$this->template   	= $template;
		$this->request   	= $request;
    }

	
	/**
	 * Make the translation.
	 *
	 * @return void
	 */
	public function translate()
	{
		//echo "text". $this->request->variable('text', 0);
		//echo "lang_target".$this->request->variable('lang_target', 0);

		//print_r($_POST);
		$text = $this->request->variable('text', '', true);
		$lang_target = $this->request->variable('lang_target', '', true);

		$apiKey = $this->config['genaut_posttranslator_apikey'];
		$translation_response = $text;

		if(empty($apiKey)){
			$translation_response = 'Cant\'t translate (Not ApiKey configured). Original text:' . $text;
		} else if(empty($text) || empty($lang_target)){
			$translation_response = 'Cant\'t translate (Not received info). Original text:' . $text;
		} else {

			sleep(1);
			$translation_response = "Test";
/*
			$url = "https://api.lecto.ai/v1/translate/text";
			$curl = curl_init($url);
			
			// Datos a enviar en la solicitud
			$data = [
				"texts" => [ $text ],
				"to" => [ $lang_target ]
			];

			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
			//Only Development mode
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_HTTPHEADER, [
				"X-API-Key: $apiKey",
				'Content-Type: application/json',
				'Accept: application/json'
			]);
			
			//$this->template->assign_vars($template_data);
			$response = curl_exec($curl);

			// Verificar si ocurrió algún error durante la solicitud
			$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			if ($httpCode == 200) {
				// Convertir la respuesta JSON a un objeto PHP
				$responseObj = json_decode($response);
				$translation_response = $responseObj->translations[0]->translated[0];
			} else {
				$translation_response = "Error: Request failed with status $httpCode".curl_error($curl);
			}

			// Cerrar la sesión cURL
			curl_close($curl);*/
		}

		$this->template->assign_var('TRANSLATION_RESPONSE', $translation_response);

        return $this->helper->render('translation_response.html', $translation_response);
		
	}

}
