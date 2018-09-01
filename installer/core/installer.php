<?php

namespace Heibel\Installer\Core;

class Installer
{
    protected $modx;

    protected $config = [];
    protected $configFile = '';

    public function __construct(\modX $modx, $configFile = null)
    {
        $this->modx =& $modx;
        $this->modx->cacheManager->refresh();

        if ($configFile) {
            $this->configFile = $configFile;
        }

        $this->log('Installing config: ' . $this->configFile);
        if ($this->loadConfig()) {
            $this->install();
        }
        $this->log('Finished config: ' . $this->configFile);
    }

    protected function loadConfig()
    {
        if (empty($this->configFile)) {
            return false;
        }

        if (file_exists(CONFIGURATION_DIR . $this->configFile)) {
            $this->config = require CONFIGURATION_DIR . $this->configFile;
        }

        $themeConfigFile = MODX_BASE_PATH . '/theme-configuration/' . $this->configFile;
        if (file_exists($themeConfigFile)) {
            if (empty($this->config)) {
                $this->config = require $themeConfigFile;
            } else {
                $merge = require $themeConfigFile;

                if (is_array($merge)) {
                    $this->config = array_merge($this->config, $merge);
                }
            }
        }

        return true;
    }

    protected function install()
    {
        return true;
    }

    protected function log($message = '', $status = 'INFO')
    {
        echo date('d-m-Y H:i:s') . ' [' . $status . '] ' . $message . "\r\n";
    }

    protected function parse(array $array = [])
    {
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                if (is_array($value)) {
                    $this->parse($value);
                } elseif (is_string($value)) {
                    if (strpos($value, '@SELECT') === 0) {
                        $sql = str_replace(['@', '{PREFIX}'], ['', $this->modx->getOption('table_prefix')], $value);
                        $result = $this->modx->query($sql);
                        if (!is_object($result)) {
                            $this->log('Query failed: ' . $sql, 'ERROR');
                            $array[$key] = '';
                        } else {
                            $row = $result->fetch(\PDO::FETCH_ASSOC);
                            if (isset($row['value'])) {
                                $array[$key] = $row['value'];
                            } else {
                                $array[$key] = '';
                            }
                        }
                    }
                }
            }
        }

        return $array;
    }
}
