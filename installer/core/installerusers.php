<?php

namespace Heibel\Installer\Core;

class InstallerUsers extends Installer
{
    protected $configFile = '130-users.config.php';

    protected function install()
    {
        if (isset($this->config['users']) && is_array($this->config['users'])) {
            foreach ((array) $this->config['users'] as $key => $user) {
                $object = $this->modx->getObject('modUser', ['username' => $key]);
                if (!$object) {
                    $output = $this->modx->runProcessor('security/user/create', $this->parse($user));
                    $this->log('Create user: ' . $key);
                    $this->log($output->response['message']);
                } else {
                    $this->modx->runProcessor(
                        'security/user/update',
                        array_merge($this->parse($user), ['id' => $object->get('id')])
                    );
                    $this->log('Update user: ' . $key);
                }
            }
        }

        if (isset($this->config['groups']) && is_array($this->config['groups'])) {
            foreach ((array) $this->config['groups'] as $key => $group) {
                $object = $this->modx->getObject('modUserGroup', ['name' => $key]);
                if (!$object) {
                    $output = $this->modx->runProcessor('security/group/create', $this->parse($group));
                    $this->log('Create group: ' . $key);
                } else {
                    $this->modx->runProcessor(
                        'security/group/update',
                        array_merge($this->parse($group), ['id' => $object->get('id')])
                    );
                    $this->log('Update group: ' . $key);
                }
            }
        }
    }
}
