<?php

namespace Heibel\Installer\Core;

class InstallerTemplateVariables extends Installer
{
    protected $configFile = '080-templatevariables.config.php';

    protected function install()
    {
        if (isset($this->config['template_variables'])) {
            foreach ((array) $this->config['template_variables'] as $key => $templateVariable) {
                $object = $this->modx->getObject('modTemplateVar', ['name' => $key]);

                if (!$object) {
                    $object = $this->modx->newObject('modTemplateVar');
                    $object->set('name', $key);

                    $this->log('Creating template variable: ' . $key);
                } else {
                    if (isset($templateVariable['exclude_from_update']) && $templateVariable['exclude_from_update']) {
                        continue;
                    }

                    $this->log('Updating template variable: ' . $key);
                    if (isset($templateVariable['exclude_fields_from_update']) &&
                        is_array($templateVariable['exclude_fields_from_update'])
                    ) {
                        foreach ((array) $templateVariable['exclude_fields_from_update'] as $field) {
                            unset($templateVariable[$field]);
                        }
                    }
                }
                unset($templateVariable['exclude_fields_from_update'], $templateVariable['exclude_from_update']);

                if (isset($templateVariable['category'])) {
                    $category = $this->modx->getObject('modCategory', ['category' => $templateVariable['category']]);
                    unset($templateVariable['category']);

                    if ($category) {
                        $templateVariable['category'] = $category->get('id');
                    }
                }

                $object->fromArray($templateVariable);
                $object->save();

                if (isset($templateVariable['templates'])) {
                    foreach ((array) $templateVariable['templates'] as $templateName => $template) {
                        if (!is_array($template)) {
                            $templateName = $template;
                        }
                        $templateObject = $this->modx->getObject('modTemplate', ['templatename' => $templateName]);
                        if ($templateObject) {
                            $connectionObject = $this->modx->getObject('modTemplateVarTemplate', [
                                'tmplvarid' => $object->get('id'),
                                'templateid' => $templateObject->get('id')
                            ]);

                            if (!$connectionObject) {
                                $connectionObject = $this->modx->newObject('modTemplateVarTemplate');
                                $connectionObject->set('tmplvarid', $object->get('id'));
                                $connectionObject->set('templateid', $templateObject->get('id'));
                            }

                            if (is_array($template)) {
                                $connectionObject->fromArray($template);
                            }
                            $connectionObject->save();
                        }
                    }
                }

                if (isset($templateVariable['media_sources'])) {
                    foreach ((array) $templateVariable['media_sources'] as $context => $mediaSource) {
                        if (is_string($context) && is_string($mediaSource)) {
                            $sourceValues = $this->parse([
                                'object' => $object->get('id'),
                                'object_class' => 'modTemplateVar',
                                'source' => $mediaSource,
                                'context_key' => $context,
                            ]);
                        } else {
                            continue;
                        }

                        $sourceObject = $this->modx->getObject('sources.modMediaSourceElement', $sourceValues);
                        if (!$sourceObject) {
                            $sourceObject = $this->modx->newObject('sources.modMediaSourceElement');
                            $sourceObject->fromArray($sourceValues, '', true, true);
                            $sourceObject->save();
                        }
                    }
                }
            }
        }
    }
}
