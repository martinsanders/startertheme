<?php

namespace Heibel\Installer\Core;

class InstallerPlugins extends Installer
{
    protected $configFile = '070-plugins.config.php';

    protected function install()
    {
        if (isset($this->config['plugins'])) {
            foreach ((array) $this->config['plugins'] as $key => $plugin) {
                $object = $this->modx->getObject('modPlugin', ['name' => $key]);

                if (!$object) {
                    $object = $this->modx->newObject('modPlugin');
                    $object->set('name', $key);

                    $this->log('Creating plugin: ' . $key);
                } else {
                    if (isset($plugin['exclude_from_update']) && $plugin['exclude_from_update']) {
                        continue;
                    }

                    $this->log('Updating plugin: ' . $key);
                    if (isset($plugin['exclude_fields_from_update']) &&
                        is_array($plugin['exclude_fields_from_update'])
                    ) {
                        foreach ((array) $plugin['exclude_fields_from_update'] as $field) {
                            unset($plugin[$field]);
                        }
                    }
                }
                unset($plugin['exclude_fields_from_update'], $plugin['exclude_from_update']);

                if (isset($plugin['source'])) {
                    $mediaSource = $this->modx->getObject('modMediaSource', ['name' => $plugin['source']]);
                    unset($plugin['source']);

                    if ($mediaSource) {
                        $plugin['source'] = $mediaSource->get('id');
                    }
                }

                if (isset($plugin['category'])) {
                    $category = $this->modx->getObject('modCategory', ['category' => $plugin['category']]);
                    unset($plugin['category']);

                    if ($category) {
                        $plugin['category'] = $category->get('id');
                    }
                }

                $object->fromArray($this->parse($plugin));
                $object->save();

                if (isset($plugin['events'])) {
                    foreach ((array) $plugin['events'] as $eventName => $event) {
                        $eventObject = $this->modx->getObject('modPluginEvent', [
                            'pluginid' => $object->get('id'),
                            'event' => $eventName
                        ]);

                        if (!$eventObject) {
                            $eventObject = $this->modx->newObject('modPluginEvent');
                            $eventObject->set('pluginid', $object->get('id'));
                            $eventObject->set('event', $eventName);
                        }

                        $eventObject->fromArray($this->parse($event));
                        $eventObject->save();
                    }
                }
            }
        }
    }
}
