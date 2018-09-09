<?php

namespace Heibel\Installer\Core;

class InstallerSettings extends Installer
{
    protected $configFile = '010-settings.config.php';

    protected function install()
    {
        if (isset($this->config['system_settings'])) {
            foreach ((array)$this->config['system_settings'] as $key => $setting) {
                $object = $this->modx->getObject('modSystemSetting', $key);
                if (!$object) {
                    $object = $this->modx->newObject('modSystemSetting');
                    $object->set('key', $key);

                    $this->log('Creating system setting: ' . $key);
                } else {
                    if (isset($setting['exclude_from_update']) && $setting['exclude_from_update']) {
                        continue;
                    }

                    $this->log('Updating system setting: ' . $key);
                    if (isset($setting['exclude_fields_from_update']) &&
                        is_array($setting['exclude_fields_from_update'])
                    ) {
                        foreach ((array) $setting['exclude_fields_from_update'] as $field) {
                            unset($setting[$field]);
                        }
                    }
                }
                unset($setting['exclude_fields_from_update'], $setting['exclude_from_update']);

                $object->fromArray($this->parse($setting));
                $object->save();
            }
        }

        if (isset($this->config['context_settings'])) {
            foreach ((array)$this->config['context_settings'] as $contextKey => $contextSettings) {
                foreach ((array)$contextSettings as $key => $setting) {
                    $object = $this->modx->getObject(
                        'modContextSetting',
                        [
                            'key' => $key, 'context_key' => $contextKey,
                        ]
                    );

                    if (!$object) {
                        $object = $this->modx->newObject('modContextSetting');
                        $object->set('key', $key);
                        $object->set('context_key', $contextKey);

                        $this->log('Creating context setting: ' . $key);
                    } else {
                        if (isset($contextSettings['exclude_from_update']) && $contextSettings['exclude_from_update']) {
                            continue;
                        }

                        $this->log('Updating context setting: ' . $key);
                        if (isset($contextSettings['exclude_fields_from_update']) &&
                            is_array($contextSettings['exclude_fields_from_update'])
                        ) {
                            foreach ((array) $contextSettings['exclude_fields_from_update'] as $field) {
                                unset($contextSettings[$field]);
                            }
                        }
                    }
                    unset($contextSettings['exclude_fields_from_update'], $contextSettings['exclude_from_update']);

                    $object->fromArray($this->parse($setting));
                    $object->save();
                }
            }
        }

        if (isset($this->config['user_group_settings'])) {
            foreach ((array)$this->config['user_group_settings'] as $group => $groupSettings) {
                foreach ((array)$groupSettings as $key => $setting) {
                    $object = $this->modx->getObject(
                        'modUserGroupSetting',
                        [
                            'key' => $key,
                            'group' => $group,
                        ]
                    );

                    if (!$object) {
                        $object = $this->modx->newObject('modUserGroupSetting');
                        $object->set('key', $key);
                        $object->set('group', $group);

                        $this->log('Creating usergroup setting: ' . $key);
                    } else {
                        if (isset($groupSettings['exclude_from_update']) && $groupSettings['exclude_from_update']) {
                            continue;
                        }

                        $this->log('Updating usergroup setting: ' . $key);
                        if (isset($groupSettings['exclude_fields_from_update']) &&
                            is_array($groupSettings['exclude_fields_from_update'])
                        ) {
                            foreach ((array) $groupSettings['exclude_fields_from_update'] as $field) {
                                unset($groupSettings[$field]);
                            }
                        }
                    }
                    unset($groupSettings['exclude_fields_from_update'], $groupSettings['exclude_from_update']);

                    $object->fromArray($this->parse($setting));
                    $object->save();
                }
            }
        }
    }
}
