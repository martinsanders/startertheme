<?php

namespace Heibel\Installer\Core;

class InstallerPackages extends Installer
{
    protected $configFile = '001-packages.config.php';

    protected function install()
    {
        $this->installProviders();
        $this->installPackages();
    }

    protected function installProviders()
    {
        if (isset($this->config['providers'])) {
            foreach ((array) $this->config['providers'] as $key => $data) {
                $object = $this->modx->getObject('transport.modTransportProvider', ['name' => $key]);
                if (!$object) {
                    $object = $this->modx->newObject('transport.modTransportProvider');
                    $object->set('name', $key);

                    $this->log('Creating package provider: ' . $key);
                } else {
                    $this->log('Updating package provider: ' . $key);
                }

                $object->fromArray($data);
                $object->save();
            }
        }
    }

    protected function installPackages()
    {
        if (isset($this->config['packages'])) {
            foreach ((array) $this->config['packages'] as $key => $data) {
                $installed = $this->modx->getIterator('transport.modTransportPackage', ['package_name' => $key]);
                foreach ($installed as $package) {
                    if ($package->compareVersion($data['version'], '<=')) {
                        if (!$package->installed) {
                            $package->install();
                        }
                        continue(2);
                    }
                }

                if ($this->installPackage($key, $data)) {
                    $this->log('Installed package: ' . $key);
                } else {
                    $this->log('Failed to install package: ' . $key, 'ERROR');
                }
            }
        }
    }

    protected function installPackage($packageName, array $data = [])
    {
        $provider = null;
        if (!empty($data['service_url'])) {
            $provider = $this->modx->getObject('transport.modTransportProvider', [
                'service_url:LIKE' => '%' . $data['service_url'] . '%',
            ]);
        }

        if (!$provider) {
            $provider = $this->modx->getObject('transport.modTransportProvider', 1);
        }

        $version = $this->modx->getVersionData();
        $response = $provider->request('package', 'GET', [
            'supports' => $version['code_name'] . '-' . $version['full_version'],
            'query' => $packageName,
        ]);

        if (!empty($response)) {
            $foundPackages = simplexml_load_string($response->response);
            foreach ($foundPackages as $foundPackage) {
                if (preg_match('#^' . $packageName . '\b#i', $foundPackage->name)) {
                    if ($package = $provider->transfer((string) $foundPackage->signature, null, ['location' => (string) $foundPackage->location])) {
                        return $package->install();
                    }

                    break;
                }
            }
        } else {
            return false;
        }

        return true;
    }
}
