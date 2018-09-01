<?php

namespace Heibel\Installer\Core;

class InstallerChunks extends Installer
{
    protected $configFile = '050-chunks.config.php';

    protected function install()
    {
        if (isset($this->config['chunks'])) {
            foreach ((array) $this->config['chunks'] as $key => $chunk) {
                $object = $this->modx->getObject('modChunk', ['name' => $key]);

                if (!$object) {
                    $object = $this->modx->newObject('modChunk');
                    $object->set('name', $key);

                    $this->log('Creating chunk: ' . $key);
                } else {
                    if (isset($chunk['exclude_from_update']) && $chunk['exclude_from_update']) {
                        continue;
                    }

                    $this->log('Updating chunk: ' . $key);
                    if (isset($chunk['exclude_fields_from_update']) &&
                        is_array($chunk['exclude_fields_from_update'])
                    ) {
                        foreach ((array) $chunk['exclude_fields_from_update'] as $field) {
                            unset($chunk[$field]);
                        }
                    }
                }
                unset($chunk['exclude_fields_from_update'], $chunk['exclude_from_update']);

                if (isset($chunk['source'])) {
                    $mediaSource = $this->modx->getObject('modMediaSource', ['name' => $chunk['source']]);
                    unset($chunk['source']);

                    if ($mediaSource) {
                        $chunk['source'] = $mediaSource->get('id');
                    }
                }

                if (isset($chunk['category'])) {
                    $category = $this->modx->getObject('modCategory', ['category' => $chunk['category']]);
                    unset($chunk['category']);

                    if ($category) {
                        $chunk['category'] = $category->get('id');
                    }
                }

                $object->fromArray($this->parse($chunk));
                $object->save();
            }
        }
    }
}
