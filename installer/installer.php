<?php
/**
 * Configuration.
 */
ini_set('display_errors', 1);
ini_set('error_reporting', -1);
set_time_limit(0);

if (!function_exists('dirname_levels')) {
    function dirname_levels($path, $levels = 1) 
    {
        if (PHP_MAJOR_VERSION < 7) {
            for ($i = 1; $i <= $levels; $i++) {
                $path = dirname($path);
            }
        } else {
            $path = dirname($path, $levels);
        }

        return $path;
    }
}

for ($i = 1; $i <= 4; $i++) {
    if (file_exists(dirname_levels(__DIR__, $i) . '/config.core.php')) {
        define('MODX_CONFIG_FILE', dirname_levels(__DIR__, $i) . '/config.core.php');
        break;
    }
}

if (!defined('MODX_CONFIG_FILE')) {
    echo 'MODX config is not found.';
    exit;
}

/**
 * Include dependencies.
 */
$files = glob(__DIR__ . '/core/*.php');
foreach ($files as $file) {
    require_once $file;
}

/**
 * Load MODX.
 */
require_once MODX_CONFIG_FILE;
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize();
$modx->getService('error', 'error.modError', '', '');

/**
 * Theme configuration.
 */
$relativePath = str_replace(MODX_BASE_PATH, '', dirname(__DIR__)) . '/';
/* Fix for MODX Cloud. */
if (strpos($_SERVER['HOME'], 'paas') !== false) {
    $relativePath = str_replace('/www/', '', $relativePath);
}

define('THEME_NAME', 'startertheme');
define('CONFIGURATION_DIR', dirname(__DIR__) . '/configuration/');
define('RELATIVE_PATH', $relativePath);
define('ADVANCED_INSTALLER', true);

/**
 * Run installers.
 */
if (ADVANCED_INSTALLER) {
    $configs = glob(CONFIGURATION_DIR . '*.config.php');
    foreach ($configs as $config) {
        $basename = basename($config);
        $installer = preg_replace('/\d/', '', str_replace(['-', '.config.php'], '', $basename));
        $class = '\Heibel\Installer\Core\Installer' . ucfirst($installer);
        new $class($modx, $basename);
    }
} else {
    new \Heibel\Installer\Core\InstallerPackages($modx);
    new \Heibel\Installer\Core\InstallerSettings($modx);
    new \Heibel\Installer\Core\InstallerCore($modx);
    new \Heibel\Installer\Core\InstallerAdditional($modx);
    new \Heibel\Installer\Core\InstallerTemplates($modx);
    new \Heibel\Installer\Core\InstallerChunks($modx);
    new \Heibel\Installer\Core\InstallerSnippets($modx);
    new \Heibel\Installer\Core\InstallerPlugins($modx);
    new \Heibel\Installer\Core\InstallerTemplateVariables($modx);
    new \Heibel\Installer\Core\InstallerResources($modx);
    new \Heibel\Installer\Core\InstallerTemplateVariablesValues($modx);
    new \Heibel\Installer\Core\InstallerAutomate($modx);
    new \Heibel\Installer\Core\InstallerUsers($modx);
}
