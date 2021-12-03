<?php

if (isset($_ENV['APP_HOSTNAME'])) {
  $databases['default']['default'] = [
    'database' => $_ENV['DB_DATABASE'],
    'driver' => 'mysql',
    'host' =>  $_ENV['DB_HOST'],
    'password' => $_ENV['DB_PASSWORD'],
    'port' => $_ENV['DB_PORT'],
    'prefix' => '',
    'username' => $_ENV['DB_USER']
  ];

  // Config 
  $config_directories['active'] = BACKDROP_ROOT . '/webroot/storage/config/active';
  $config_directories['staging'] = BACKDROP_ROOT . '/webroot/storage/config/staging';


  // Configure private and temporary file paths.
  $settings['file_private_path'] = $_ENV['STORAGE_DIRECTORY'] . '/private';

  // // Configure the default PhpStorage and Twig template cache directories.
  // $settings['php_storage']['default']['directory'] = $settings['file_private_path'];
  // $settings['php_storage']['twig']['directory'] = $settings['file_private_path'];

  $settings['file_chmod_directory'] = 2775;
  $settings['file_chmod_file'] = 0664;

  // // Set the project-specific entropy value, used for generating one-time
  // // keys and such.
  // // TODO: FIND A WAY TO REPLACE THIS WITH APP_KEY
  $drupal_hash_salt  = $_ENV['APP_KEY'];


  $conf['file_temporary_path'] = '/tmp';

}
