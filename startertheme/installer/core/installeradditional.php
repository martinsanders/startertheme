<?php

namespace Heibel\Installer\Core;

class InstallerAdditional extends Installer
{
    protected $configFile = '030-additional.config.php';

    protected function install()
    {
        if (isset($this->config['additional'])) {
            foreach ((array)$this->config['additional'] as $service => $serviceData) {
                $this->modx->getService(
                    $service,
                    $serviceData['class'],
                    $this->modx->getOption(
                        $service . '.core_path',
                        null,
                        $this->modx->getOption('core_path') . 'components/' . $service . '/'
                    ) . 'model/' . $service . '/'
                );

                if (is_array($serviceData['classes'])) {
                    foreach ($serviceData['classes'] as $class) {
                        if ($class['records'] && is_array($class['records']) &&
                            isset($class['class_key'], $class['name_field'])) {
                            foreach ($class['records'] as $key => $data) {
                                $object = $this->modx->getObject($class['class_key'], [$class['name_field'] => $key]);

                                if (!$object) {
                                    $object = $this->modx->newObject($class['class_key']);
                                    if (!$object) {
                                        $this->log('Cannot find object' . $class['class_key'], 'ERROR');
                                        continue;
                                    }

                                    $object->set($class['name_field'], $key);

                                    $this->log('Creating ' . $class['class_key'] . ': ' . $key);
                                } else {
                                    if (isset($data['exclude_from_update']) && $data['exclude_from_update']) {
                                        continue;
                                    }

                                    $this->log('Updating ' . $class['class_key'] . ': ' . $key);
                                    if (isset($data['exclude_fields_from_update']) &&
                                        is_array($data['exclude_fields_from_update'])
                                    ) {
                                        foreach ((array) $data['exclude_fields_from_update'] as $field) {
                                            unset($data[$field]);
                                        }
                                    }
                                }
                                unset($data['exclude_fields_from_update'], $data['exclude_from_update']);

                                $object->fromArray($this->parse($data));
                                $object->save();
                            }
                        }
                    }
                }
            }
        }
    }
}
