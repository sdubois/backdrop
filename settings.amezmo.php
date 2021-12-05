<?php
/**
 * @file
 * Amezmo specific settings
 */
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

  // Config directories
  $config_directories['active'] = $_ENV['STORAGE_DIRECTORY'] . '/config/active';
  $config_directories['staging'] = $_ENV['STORAGE_DIRECTORY'] . 'config/staging';


  // Configure private and temporary file paths.
  $settings['file_private_path'] = $_ENV['STORAGE_DIRECTORY'] . '/private';

  $settings['file_chmod_directory'] = 2775;
  $settings['file_chmod_file'] = 0664;

  // Set the project-specific entropy value, used for generating one-time keys and such.
  $settings['hash_salt'] = $_ENV['APP_KEY'];


  $config['system.core']['file_temporary_path'] = '/tmp';

}
