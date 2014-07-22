<?php namespace Brightpearl;

use GuzzleHttp\Command\Guzzle\Description as GuzzleDescription;

class Description extends GuzzleDescription
{

	/**
     * Change the baseUrl at command if necessary,
     * example different regional subdomains used 
     * with multiple client requests.
     *
     * @param  string  $url
     * @return void
     */
	public function setBaseUrl($url)
	{
		$this->baseUrl = $url;
	}
}
