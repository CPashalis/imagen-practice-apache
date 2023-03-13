<?php
namespace AIOSEO\Plugin\Pro\Ai;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to handle AI via OpenAI.
 *
 * @since 4.3.2
 */
class Ai {
	/**
	 * The temperature parameter controls randomness in Boltzmann distributions.
	 * The higher the temperature, the more random the completions.
	 *
	 * @since 4.3.2
	 *
	 * @var float
	 */
	private $temperature = 0.8;

	/**
	 * The AI model to use.
	 * @see https://platform.openai.com/docs/models/gpt-3 for a list of models.
	 *
	 * @since 4.3.2
	 *
	 * @var string
	 */
	private $model = 'text-davinci-003';

	/**
	 * The base URL for the API.
	 *
	 * @since 4.3.2
	 *
	 * @var string
	 */
	private $baseUrl = 'https://api.openai.com/v1/';

	/**
	 * Sends a query to the AI.
	 *
	 * @since 4.3.2
	 *
	 * @param  string               $prompt     The prompt to send to the AI.
	 * @param  int                  $maxTokens  The maximum number of tokens to return.
	 * @param  int                  $maxResults The maximum number of suggestions to return.
	 * @return array|bool|\WP_Error             The suggestions or false if no API key is set or a WP_Error object if the request failed
	 */
	public function sendQuery( $prompt, $maxTokens = 64, $maxResults = 5 ) {
		$apiKey = aioseo()->options->advanced->openAiKey;
		if ( ! $apiKey ) {
			return false;
		}

		$args = [
			'timeout'   => 120,
			'headers'   => [
				'Authorization' => 'Bearer ' . $apiKey,
				'Content-Type'  => 'application/json'
			],
			'body'      => wp_json_encode( [
				'prompt'      => $prompt,
				'max_tokens'  => $maxTokens,
				'temperature' => $this->temperature,
				'model'       => $this->model,
				'stop'        => null,
				'n'           => $maxResults
			] ),
			'sslverify' => false
		];

		$response = aioseo()->helpers->wpRemotePost( $this->getUrl() . 'completions', $args );

		$response = wp_remote_retrieve_body( $response );
		$data     = json_decode( $response );
		if ( isset( $data->error ) ) {
			return new \WP_Error(
				$data->error->type,
				$data->error->message
			);
		}

		$suggestions = [];
		foreach ( $data->choices as $choice ) {
			$suggestion = $choice->text;
			$suggestion = stripslashes_deep( wp_filter_nohtml_kses( wp_strip_all_tags( $suggestion ) ) );
			$suggestion = preg_replace( '/\v+/', '', $suggestion );

			// Trim quotes from beginning/end and redundant whitespace.
			$suggestion = preg_replace( '/^["\']/', '', $suggestion );
			$suggestion = preg_replace( '/["\']$/', '', $suggestion );
			$suggestion = trim( normalize_whitespace( $suggestion ) );

			$suggestions[] = $suggestion;
		}

		return [
			'suggestions' => $suggestions,
			'usage'       => $data->usage->total_tokens
		];
	}

	/**
	 * Returns the API url.
	 *
	 * @since 4.3.2
	 *
	 * @return string The API url.
	 */
	public function getUrl() {
		if ( defined( 'AIOSEO_AI_URL' ) ) {
			return AIOSEO_AI_URL;
		}

		return $this->baseUrl;
	}
}