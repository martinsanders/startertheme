<?php

namespace Heibel\Installer\Core;

class InstallerCore extends Installer
{
    protected $configFile = '020-core.config.php';

    protected function install()
    {
        $this->installMediaSources();
        $this->installCategories();
        $this->installContentTypes();
        $this->installContexts();
        $this->installMenus();
        $this->installNamespaces();
        $this->installClientConfig();
        $this->installMIGX();
        $this->installPropertySets();
        $this->installACL();
        $this->installFC();
    }

    protected function installMediaSources()
    {
        if (isset($this->config['media_sources'])) {
            foreach ((array) $this->config['media_sources'] as $key => $source) {
                $object = $this->modx->getObject('modMediaSource', ['name' => $key]);
                if (!$object) {
                    $object = $this->modx->newObject('modMediaSource');
                    $object->set('name', $key);

                    if (!is_dir(MODX_BASE_PATH . $source['properties']['basePath']['value'])) {
                        mkdir(MODX_BASE_PATH . $source['properties']['basePath']['value']);
                    }

                    $this->log('Creating media source: ' . $key);
                } else {
                    if (isset($source['exclude_from_update']) && $source['exclude_from_update']) {
                        continue;
                    }

                    $this->log('Updating media source: ' . $key);
                    if (isset($source['exclude_fields_from_update']) &&
                        is_array($source['exclude_fields_from_update'])
                    ) {
                        foreach ((array) $source['exclude_fields_from_update'] as $field) {
                            unset($source[$field]);
                        }
                    }
                }
                unset($source['exclude_fields_from_update'], $source['exclude_from_update']);

                $object->fromArray($this->parse($source));
                $object->save();

                if (isset($source['default'])) {
                    $setting = $this->modx->getObject('modSystemSetting', 'default_media_source');
                    if ($setting) {
                        $setting->set('value', $object->get('id'));
                        $setting->save();
                        $this->log('Update default media source.');
                    }
                }
            }
        }
    }

    protected function installCategories()
    {
        if (isset($this->config['categories'])) {
            foreach ((array) $this->config['categories'] as $key => $category) {
                $object = $this->modx->getObject('modCategory', ['category' => $key]);
                if (!$object) {
                    $object = $this->modx->newObject('modCategory');
                    $object->set('category', $key);

                    $this->log('Creating category: ' . $key);
                } else {
                    if (isset($category['exclude_from_update']) && $category['exclude_from_update']) {
                        continue;
                    }

                    $this->log('Updating category: ' . $key);
                    if (isset($category['exclude_fields_from_update']) &&
                        is_array($category['exclude_fields_from_update'])
                    ) {
                        foreach ((array) $category['exclude_fields_from_update'] as $field) {
                            unset($category[$field]);
                        }
                    }
                }
                unset($category['exclude_fields_from_update'], $category['exclude_from_update']);

                if (isset($category['parent'])) {
                    $parent = $this->modx->getObject('modCategory', ['category' => $category['parent']]);
                    if ($parent) {
                        $object->set('parent', $parent->get('id'));
                    }
                    unset($category['parent']);
                }

                $object->fromArray($this->parse($category));
                $object->save();
            }
        }
    }

    protected function installContentTypes()
    {
        if (isset($this->config['content_types'])) {
            foreach ((array) $this->config['content_types'] as $key => $type) {
                $object = $this->modx->getObject('modContentType', ['name' => $key]);

                if (!$object) {
                    $object = $this->modx->newObject('modContentType');
                    $object->set('name', $key);

                    $this->log('Creating content type: ' . $key);
                } else {
                    if (isset($type['exclude_from_update']) && $type['exclude_from_update']) {
                        continue;
                    }

                    $this->log('Updating content type: ' . $key);
                    if (isset($type['exclude_fields_from_update']) &&
                        is_array($type['exclude_fields_from_update'])
                    ) {
                        foreach ((array) $type['exclude_fields_from_update'] as $field) {
                            unset($type[$field]);
                        }
                    }
                }
                unset($type['exclude_fields_from_update'], $type['exclude_from_update']);

                $object->fromArray($this->parse($type));
                $object->save();
            }
        }
    }

    protected function installContexts()
    {
        if (isset($this->config['contexts'])) {
            foreach ((array) $this->config['contexts'] as $key => $context) {
                $object = $this->modx->getObject('modContext', $key);
                if (!$object) {
                    $object = $this->modx->newObject('modContext');
                    $object->set('key', $key);

                    $this->log('Creating context: ' . $key);
                } else {
                    if (isset($context['exclude_from_update']) && $context['exclude_from_update']) {
                        continue;
                    }

                    $this->log('Updating context: ' . $key);
                    if (isset($context['exclude_fields_from_update']) &&
                        is_array($context['exclude_fields_from_update'])
                    ) {
                        foreach ((array) $context['exclude_fields_from_update'] as $field) {
                            unset($context[$field]);
                        }
                    }
                }
                unset($context['exclude_fields_from_update'], $context['exclude_from_update']);

                $object->fromArray($this->parse($context));
                $object->save();
            }
        }
    }

    protected function installMenus()
    {
        if (isset($this->config['menus'])) {
            foreach ((array) $this->config['menus'] as $key => $menu) {
                $object = $this->modx->getObject('modMenu', ['text' => $key]);

                if (!$object) {
                    $object = $this->modx->newObject('modMenu');
                    $object->set('text', $key);

                    $this->log('Creating menu: ' . $key);
                } else {
                    if (isset($menu['exclude_from_update']) && $menu['exclude_from_update']) {
                        continue;
                    }

                    $this->log('Updating menu: ' . $key);
                    if (isset($menu['exclude_fields_from_update']) &&
                        is_array($menu['exclude_fields_from_update'])
                    ) {
                        foreach ((array) $menu['exclude_fields_from_update'] as $field) {
                            unset($menu[$field]);
                        }
                    }
                }
                unset($menu['exclude_fields_from_update'], $menu['exclude_from_update']);

                $object->fromArray($this->parse($menu));
                $object->save();
            }
        }
    }

    protected function installClientConfig()
    {
        $this->modx->getService('clientconfig');
        if (isset($this->config['client_config'])) {
            foreach ((array) $this->config['client_config'] as $key => $group) {
                $object = $this->modx->getObject('cgGroup', ['label' => $key]);
                if (!$object) {
                    $object = $this->modx->newObject('cgGroup');
                    $object->set('label', $key);

                    $this->log('Creating client config group: ' . $key);
                } else {
                    if (isset($group['exclude_from_update']) && $group['exclude_from_update']) {
                        continue;
                    }

                    $this->log('Updating client config group: ' . $key);
                    if (isset($group['exclude_fields_from_update']) &&
                        is_array($group['exclude_fields_from_update'])
                    ) {
                        foreach ((array) $group['exclude_fields_from_update'] as $field) {
                            unset($group[$field]);
                        }
                    }
                }
                unset($group['exclude_fields_from_update'], $group['exclude_from_update']);

                $object->fromArray($this->parse($group));
                $object->save();

                if (isset($group['fields'])) {
                    foreach ((array) $group['fields'] as $fieldKey => $field) {
                        $settingObject = $this->modx->getObject('cgSetting', [
                            'key' => $fieldKey,
                            'group' => $object->get('id')
                        ]);
                        if (!$settingObject) {
                            $settingObject = $this->modx->newObject('cgSetting');
                            $settingObject->set('key', $fieldKey);
                            $settingObject->set('group', $object->get('id'));

                            $this->log('Creating client config setting: ' . $fieldKey);
                        } else {
                            if (isset($field['exclude_from_update']) && $field['exclude_from_update']) {
                                continue;
                            }

                            $this->log('Updating client config setting: ' . $fieldKey);
                            if (isset($field['exclude_fields_from_update']) &&
                                is_array($field['exclude_fields_from_update'])
                            ) {
                                foreach ((array) $field['exclude_fields_from_update'] as $excludeField) {
                                    unset($field[$excludeField]);
                                }
                            }
                        }
                        unset($field['exclude_fields_from_update'], $field['exclude_from_update']);

                        $settingObject->fromArray($this->parse($field));
                        $settingObject->save();
                    }
                }
            }
        }
    }

    protected function installMIGX()
    {
        $this->modx->getService(
            'migx',
            'Migx',
            $this->modx->getOption(
                'migx.core_path',
                null,
                $this->modx->getOption('core_path') . 'components/migx/'
            ) . 'model/migx/',
            []
        );

        if (isset($this->config['migx'])) {
            foreach ((array) $this->config['migx'] as $key => $migx) {
                if (file_exists(CONFIGURATION_DIR . $migx)) {
                    $object = $this->modx->getObject('migxConfig', ['name' => $key]);
                    if (!$object) {
                        $object = $this->modx->newObject('migxConfig');
                        $object->set('name', $key);

                        $this->log('Creating MIGX config: ' . $key);
                    } else {
                        $this->log('Updating MIGX config: ' . $key);
                    }

                    $json = file_get_contents(CONFIGURATION_DIR . $migx);
                    $object->fromArray($this->modx->migx->importconfig($this->modx->fromJson($json)));
                    $object->save();
                }
            }
        }
    }
    
    protected function installNamespaces()
    {
        if (isset($this->config['namespaces'])) {
            foreach ((array) $this->config['namespaces'] as $key => $namespace) {
                $object = $this->modx->getObject('modNamespace', ['name' => $key]);
                if (!$object) {
                    $object = $this->modx->newObject('modNamespace');
                    $object->set('name', $key);

                    $this->log('Creating namespace: ' . $key);
                } else {
                    if (isset($namespace['exclude_from_update']) && $namespace['exclude_from_update']) {
                        continue;
                    }

                    $this->log('Updating namespace: ' . $key);
                    if (isset($namespace['exclude_fields_from_update']) &&
                        is_array($namespace['exclude_fields_from_update'])
                    ) {
                        foreach ((array) $namespace['exclude_fields_from_update'] as $field) {
                            unset($namespace[$field]);
                        }
                    }
                }
                unset($namespace['exclude_fields_from_update'], $namespace['exclude_from_update']);

                $object->fromArray($this->parse($namespace));
                $object->save();
            }
        }
    }

    protected function installPropertySets()
    {
        if (isset($this->config['property_sets'])) {
            foreach ((array) $this->config['property_sets'] as $key => $property) {
                $object = $this->modx->getObject('modPropertySet', ['name' => $key]);
                if (!$object) {
                    $object = $this->modx->newObject('modPropertySet');
                    $object->set('name', $key);

                    $this->log('Creating property set: ' . $key);
                } else {
                    if (isset($property['exclude_from_update']) && $property['exclude_from_update']) {
                        continue;
                    }

                    $this->log('Updating property set: ' . $key);
                    if (isset($property['exclude_fields_from_update']) &&
                        is_array($property['exclude_fields_from_update'])
                    ) {
                        foreach ((array) $property['exclude_fields_from_update'] as $field) {
                            unset($property[$field]);
                        }
                    }
                }
                unset($property['exclude_fields_from_update'], $property['exclude_from_update']);

                if (isset($property['category'])) {
                    $category = $this->modx->getObject('modCategory', ['category' => $property['category']]);
                    unset($property['category']);

                    if ($category) {
                        $property['category'] = $category->get('id');
                    }
                }

                $object->fromArray($this->parse($property));
                $object->save();

                if (isset($property['elements'])) {
                    foreach ((array) $property['elements'] as $element) {
                        $element['property_set'] = $object->get('id');
                        $element = $this->parse($element);

                        $elementObject = $this->modx->getObject('modElementPropertySet', $element);
                        if (!$elementObject) {
                            $elementObject = $this->modx->newObject('modElementPropertySet');
                            $elementObject->fromArray($element, '', true, true);
                            $elementObject->save();
                        }
                    }
                }
            }
        }
    }

    protected function installACL()
    {
        if (isset($this->config['access_policies']) && is_array($this->config['access_policies'])) {
            foreach ((array) $this->config['access_policies'] as $name => $file) {
                $policy = $this->modx->getObject('modAccessPolicy', ['name' => $name]);
                if (!$policy) {
                    $this->modx->runProcessor('security/access/policy/import', [
                        'file' => $file,
                    ]);
                    $this->log('Install ACL: ' . $name);
                }
            }
        }
    }

    protected function installFC()
    {
        if (isset($this->config['manager_customization'])) {
            foreach ((array) $this->config['manager_customization'] as $profile) {
                if (!isset($profile['name'])) {
                    continue;
                }
                $object = $this->modx->getObject('modFormCustomizationProfile', ['name' => $profile['name']]);

                if (!$object) {
                    $object = $this->modx->newObject('modFormCustomizationProfile');
                    $object->set('name', $profile['name']);

                    $this->log('Creating FC profile: ' . $profile['name']);
                } else {
                    if (isset($profile['exclude_from_update']) && $profile['exclude_from_update']) {
                        continue;
                    }

                    $this->log('Updating FC profile: ' . $profile['name']);
                    if (isset($profile['exclude_fields_from_update']) &&
                        is_array($profile['exclude_fields_from_update'])
                    ) {
                        foreach ((array) $profile['exclude_fields_from_update'] as $field) {
                            unset($profile[$field]);
                        }
                    }
                }
                unset($profile['exclude_fields_from_update'], $profile['exclude_from_update']);

                $object->fromArray($this->parse($profile));
                $object->save();

                if (isset($profile['files']) && is_array($profile['files'])) {
                    foreach ((array) $profile['files'] as $name => $file) {
                        $set = $this->modx->getObject('modFormCustomizationSet',
                            ['action' => $name, 'profile' => $object->get('id')]
                        );
                        if (!$set) {
                            $this->modx->runProcessor('security/forms/set/import', [
                                'file' => $file,
                                'profile' => $object->get('id'),
                            ]);
                        }
                    }
                }

                if (isset($profile['usergroups']) && is_array($profile['usergroups'])) {
                    foreach ((array) $profile['usergroups'] as $group) {
                        if (!is_numeric($group)) {
                            $group = $this->parse([$group]);
                            if (isset($group[0])) {
                                $group = $group[0];
                            } else {
                                continue;
                            }
                        }
                        $connectionObject = $this->modx->getObject('modFormCustomizationProfileUserGroup', [
                            'profile' => $object->get('id'),
                            'usergroup' => $group
                        ]);

                        if (!$connectionObject) {
                            $connectionObject = $this->modx->newObject('modFormCustomizationProfileUserGroup');
                            $connectionObject->set('profile', $object->get('id'));
                            $connectionObject->set('usergroup', $group);
                            $connectionObject->save();
                        }
                    }
                }
            }
        }
    }
}
