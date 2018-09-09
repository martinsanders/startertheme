<?php

namespace Heibel\Installer\Core;

class InstallerTemplateVariablesValues extends Installer
{
    protected $configFile = '100-templatevariablesvalues.config.php';

    protected function install()
    {
        if (isset($this->config['template_variables_values'])) {
            foreach ((array) $this->config['template_variables_values'] as $pagetitle => $values) {
                $resourceObject = $this->modx->getObject('modResource', ['pagetitle' => $pagetitle]);

                if (is_array($values) && $resourceObject) {
                    foreach ((array) $values as $key => $value) {
                        $templateVar = $this->modx->getObject('modTemplateVar', ['name' => $key]);

                        if ($templateVar) {
                            $connectionObject = $this->modx->getObject('modTemplateVarResource', [
                                'tmplvarid' => $templateVar->get('id'),
                                'contentid' => $resourceObject->get('id')
                            ]);

                            if (!$connectionObject) {
                                $connectionObject = $this->modx->newObject('modTemplateVarResource');
                                $connectionObject->set('tmplvarid', $templateVar->get('id'));
                                $connectionObject->set('contentid', $resourceObject->get('id'));

                                $this->log('Creating template variable value: ' . $key . ' for ' . $pagetitle);
                            } else {
                                if (isset($value['exclude_from_update']) && $value['exclude_from_update']) {
                                    continue;
                                }

                                $this->log('Updating template variable value: ' . $key . ' for ' . $pagetitle);
                            }
                            unset($value['exclude_from_update']);

                            $data = [];
                            if (is_string($value)) {
                                $data = [
                                    'value' => $value
                                ];
                            } elseif (isset($value['value']) && is_string($value['value'])) {
                                $data = [
                                    'value' => $value['value']
                                ];
                            } elseif (is_array($value)) {
                                $data = [
                                    'value' => $this->modx->toJSON($value)
                                ];
                            }

                            $connectionObject->fromArray($this->parse($data));
                            $connectionObject->save();
                        }
                    }
                }
            }
        }
    }
}
