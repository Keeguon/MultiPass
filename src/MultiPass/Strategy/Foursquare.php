<?php

namespace MultiPass\Strategy;

class Foursquare extends \MultiPass\Strategy\OAuth2
{
  public
      $name = 'Foursquare'
  ;

  public function __construct($client_id, $client_secret, $opts)
  {
    // Default options
    $this->options = array_replace_recursive(array(
        'client_options'       => array(
            'site'          => 'https://foursquare.com'
          , 'token_url'     => '/oauth2/access_token'
          , 'authorize_url' => '/oauth2/authenticate'
        )
      , 'token_params'         => array(
            'parse' => 'json'
        )
      , 'access_token_options' => array()
      , 'authorize_options'    => array()
    ), $opts);

    parent::__construct($client_id, $client_secret, $this->options);
  }

  public function info($raw_info = null)
  {
    $raw_info = $raw_info ?: $this->raw_info();

    return array(
        'first_name' => $raw_info['firstName']
      , 'last_name'  => $raw_info['lastName']
      , 'image'      => $raw_info['picture']
    );
  }


  protected function raw_info()
  {
    $response       = $this->token->get($this->client->site.'/v2/users/self', array('parse' => 'json'));
    $parsedResponse = $response->parse();
    return $parsedResponse['response']['user'];
  }
}
