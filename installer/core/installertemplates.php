<?php

namespace Heibel\Installer\Core;

class InstallerTemplates extends Installer
{
    protected $configFile = '040-templates.config.php';

    protected function install()
    {
        if (isset($this->config['templates'])) {
            foreach ((array) $this->config['templates'] as $key => $template) {
                $object = $this->modx->getObject('modTemplate', ['templatename' => $key]);

                if (!$object && $key === '01 - Homepage') {
                    $object = $this->modx->getObject('modTemplate', ['templatename' => 'BaseTemplate']);
                    
                    if ($object) {
                        $object->set('templatename', $key);
                    }
                }

                if (!$object) {
                    $object = $this->modx->newObject('modTemplate');
                    $object->set('templatename', $key);

                    $this->log('Creating template: ' . $key);
                } else {
                    if (isset($template['exclude_from_update']) && $template['exclude_from_update']) {
                        continue;
                    }

                    $this->log('Updating template: ' . $key);
                    if (isset($template['exclude_fields_from_update']) &&
                        is_array($template['exclude_fields_from_update'])
                    ) {
                        foreach ((array) $template['exclude_fields_from_update'] as $field) {
                            unset($template[$field]);
                        }
                    }
                }
                unset($template['exclude_fields_from_update'], $template['exclude_from_update']);

                if (isset($template['source'])) {
                    $mediaSource = $this->modx->getObject('modMediaSource', ['name' => $template['source']]);
                    unset($template['source']);

                    if ($mediaSource) {
                        $template['source'] = $mediaSource->get('id');
                    }
                }

                if (isset($template['category'])) {
                    $category = $this->modx->getObject('modCategory', ['category' => $template['category']]);
                    unset($template['category']);

                    if ($category) {
                        $template['category'] = $category->get('id');
                    }
                }

                $object->fromArray($this->parse($template));
                $object->save();

                if (isset($template['default'])) {
                    $setting = $this->modx->getObject('modSystemSetting', 'default_template');
                    if ($setting) {
                        $setting->set('value', $object->get('id'));
                        $setting->save();
                        $this->log('Update default template.');
                    }
                }
            }
        }
    }
}
