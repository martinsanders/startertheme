<?php
if (isset($_GET['a']) && $_GET['a'] === 'resource/create') {
    $parentId = isset($_REQUEST['parent']) ? (int) $_REQUEST['parent'] : 0;

    if ($parent = $modx->getObject('modResource', $parentId)) {
        $template = $parent->get('template');

        if (($parentTemplate = $modx->getObject('modTemplate', $template)) &&
            ($properties = $parentTemplate->getProperties()) &&
            isset($properties['childTemplate']) &&
            is_numeric($properties['childTemplate'])
        ) {
            $_GET['template'] = $properties['childTemplate'];
        }
    }
}