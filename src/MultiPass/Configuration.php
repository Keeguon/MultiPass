<?php

namespace MultiPass;

class Configuration
{
  private static $instance = null;

  private $config     = array();
  private $strategies = array();

  private function __construct() {}

  public static function getInstance()
  {
    if (!isset(self::$instance)) {
      self::$instance = new static;
    }

    return self::$instance;
  }

  public function registerConfig($config, $opts)
  {
    $this->config[$provider] = $opts;
  }

  public function registerConfigs($configs = array())
  {
    foreach ($configs as $provider => $opts) {
      $this->registerProvider($provider, $opts);
    }
  }

  public function register()
  {
    foreach ($config as $provider => $opts) {
      $strategy = "\MultiPass\Strategies\\$provider";
      $strategies[$provider] = new $strategy($opts);
    }
  }

  public function getStrategy($provider)
  {
    return $strategies[$provider];
  }
}
