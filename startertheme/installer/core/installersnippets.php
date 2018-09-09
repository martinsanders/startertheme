<?php

namespace Heibel\Installer\Core;

class InstallerSnippets extends Installer
{
    protected $configFile = '060-snippets.config.php';

    protected function install()
    {
        if (isset($this->config['snippets'])) {
            foreach ((array) $this->config['snippets'] as $key => $snippet) {
                $object = $this->modx->getObject('modSnippet', ['name' => $key]);

                if (!$object) {
                    $object = $this->modx->newObject('modSnippet');
                    $object->set('name', $key);

                    $this->log('Creating snippet: ' . $key);
                } else {
                    if (isset($snippet['exclude_from_update']) && $snippet['exclude_from_update']) {
                        continue;
                    }

                    $this->log('Updating snippet: ' . $key);
                    if (isset($snippet['exclude_fields_from_update']) &&
                        is_array($snippet['exclude_fields_from_update'])
                    ) {
                        foreach ((array) $snippet['exclude_fields_from_update'] as $field) {
                            unset($snippet[$field]);
                        }
                    }
                }
                unset($snippet['exclude_fields_from_update'], $snippet['exclude_from_update']);

                if (isset($snippet['source'])) {
                    $mediaSource = $this->modx->getObject('modMediaSource', ['name' => $snippet['source']]);
                    unset($snippet['source']);

                    if ($mediaSource) {
                        $snippet['source'] = $mediaSource->get('id');
                    }
                }

                if (isset($snippet['category'])) {
                    $category = $this->modx->getObject('modCategory', ['category' => $snippet['category']]);
                    unset($snippet['category']);

                    if ($category) {
                        $snippet['category'] = $category->get('id');
                    }
                }

                $object->fromArray($this->parse($snippet));
                $object->save();
            }
        }
    }
}
