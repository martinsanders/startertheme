<?php

namespace Heibel\Installer\Core;

class InstallerResources extends Installer
{
    protected $configFile = '090-resources.config.php';

    protected function install()
    {
        if (isset($this->config['resources'])) {
            foreach ((array) $this->config['resources'] as $key => $resource) {
                $object = $this->modx->getObject('modResource', ['pagetitle' => $key]);
                if (!$object) {
                    $object = $this->modx->newObject('modResource');
                    $object->set('pagetitle', $key);

                    $this->log('Creating resource: ' . $key);
                } else {
                    if (isset($resource['exclude_from_update']) && $resource['exclude_from_update']) {
                        continue;
                    }

                    $this->log('Updating resource: ' . $key);
                    if (isset($resource['exclude_fields_from_update']) &&
                        is_array($resource['exclude_fields_from_update'])
                    ) {
                        foreach ((array) $resource['exclude_fields_from_update'] as $field) {
                            unset($resource[$field]);
                        }
                    }
                }
                unset($resource['exclude_fields_from_update'], $resource['exclude_from_update']);

                if (!isset($resource['alias']) && empty($object->get('alias'))) {
                    echo $object->set('alias', $key);
                }

                if (!isset($resource['uri']) && empty($object->get('uri'))) {
                    $object->set('uri', $object->getAliasPath($object->get('alias')));
                }

                if (isset($resource['parent']) && !is_numeric($resource['parent'])) {
                    $parent = $this->modx->getObject('modResource', ['pagetitle' => $resource['parent']]);
                    if ($parent) {
                        $object->set('parent', $parent->get('id'));
                    }
                    unset($resource['parent']);
                }

                if (isset($resource['template']) && !is_numeric($resource['template'])) {
                    $template = $this->modx->getObject('modTemplate', ['templatename' => $resource['template']]);
                    if ($template) {
                        $object->set('template', $template->get('id'));
                    }
                    unset($resource['template']);
                }

                $object->fromArray($this->parse($resource));
                $object->save();
            }
        }
    }
}
