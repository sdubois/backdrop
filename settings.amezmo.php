<?php
/**
 * @file
 * Amezmo specific settings
 *
 * @see .amezmo/after-pull for how symlinks to these locations are created.
 */

/**
 * Database configuration.
 * - Adds Amezmo instance-specific database configuration options.
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

  /**
   * Site configuration files location.
   * - By default config lives in the Amezmo persistant file storage location.
   */
  $config_directories['active'] = $_ENV['STORAGE_DIRECTORY'] . '/config/active';
  $config_directories['staging'] = $_ENV['STORAGE_DIRECTORY'] . '/config/staging';

  /**
   * Trusted host configuration (optional but highly recommended).
   * - Adds Amezmo instance-specific domains. @todo
   *
   * For example, this will allow the site to only run from www.example.com:
   * @code
   * $settings['trusted_host_patterns'] = array(
   *   '^www\.example\.com$',
   * );
   * @endcode
   */

  /**
   * Salt for one-time login links and cancel links, form tokens, etc.
   */
  $settings['hash_salt'] = $_ENV['APP_KEY'];

  /**
   * Configuration overrides.
   */

  // Temporary file path.
  $config['system.core']['file_temporary_path'] = '/tmp';
  // Private file path.
  $config['system.core']['file_private_path'] = $_ENV['STORAGE_DIRECTORY'] . '/private';
  // Public file path
  // Note, this only works because of the symlink created in .amezmo/after.pull
  $config['system.core']['file_public_path'] = '/files';

  // Set permissions on files. Defaiult value is 0775.
  $config['system.core']['file_chmod_file'] = 0664;
  // Set permissions on directories. Defaiult value is 0775.
  $config['system.core']['file_chmod_directory'] = 2775;

}
