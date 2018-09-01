<?php

namespace Heibel\Installer\Core;

class InstallerAutomate extends Installer
{
    protected $configFile = '110-automate.config.php';

    protected function install()
    {
        if (isset($this->config['commands'])) {
            foreach ((array)$this->config['commands'] as $command) {
                $this->log('Running command: ' . $command);
                system($command);
            }
        }
    }
}
