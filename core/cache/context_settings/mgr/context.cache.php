<?php  return array (
  'config' => 
  array (
    'allow_tags_in_post' => '1',
    'modRequest.class' => 'modManagerRequest',
  ),
  'webLinkMap' => 
  array (
  ),
  'eventMap' => 
  array (
    'OnBeforeDocFormSave' => 
    array (
      15 => '15',
    ),
    'OnChunkFormPrerender' => 
    array (
      1 => '1',
      9 => '9',
    ),
    'OnChunkFormSave' => 
    array (
      9 => '9',
    ),
    'OnDocFormPrerender' => 
    array (
      9 => '9',
      1 => '1',
      6 => '6',
      15 => '15',
    ),
    'OnDocFormRender' => 
    array (
      2 => '2',
      13 => '13',
    ),
    'OnDocFormSave' => 
    array (
      9 => '9',
      13 => '13',
      14 => '14',
      15 => '15',
    ),
    'OnDocPublished' => 
    array (
      14 => '14',
    ),
    'OnDocUnPublished' => 
    array (
      14 => '14',
    ),
    'OnEmptyTrash' => 
    array (
      15 => '15',
    ),
    'OnFileCreateFormPrerender' => 
    array (
      1 => '1',
    ),
    'OnFileEditFormPrerender' => 
    array (
      1 => '1',
    ),
    'OnFileManagerDirCreate' => 
    array (
      4 => '4',
    ),
    'OnFileManagerDirRename' => 
    array (
      4 => '4',
    ),
    'OnFileManagerUpload' => 
    array (
      4 => '4',
      8 => '8',
    ),
    'OnHandleRequest' => 
    array (
      17 => '17',
    ),
    'OnLoadWebDocument' => 
    array (
      13 => '13',
      15 => '15',
    ),
    'OnManagerPageBeforeRender' => 
    array (
      1 => '1',
      5 => '5',
      2 => '2',
      15 => '15',
    ),
    'OnMODXInit' => 
    array (
      11 => '11',
      3 => '3',
      13 => '13',
    ),
    'OnPageNotFound' => 
    array (
      15 => '15',
    ),
    'OnPluginFormPrerender' => 
    array (
      1 => '1',
    ),
    'OnResourceBeforeSort' => 
    array (
      15 => '15',
    ),
    'OnResourceDelete' => 
    array (
      14 => '14',
    ),
    'OnResourceDuplicate' => 
    array (
      15 => '15',
      13 => '13',
      14 => '14',
    ),
    'OnResourceUndelete' => 
    array (
      14 => '14',
    ),
    'OnRichTextBrowserInit' => 
    array (
      16 => '16',
    ),
    'OnRichTextEditorInit' => 
    array (
      16 => '16',
    ),
    'OnRichTextEditorRegister' => 
    array (
      16 => '16',
      1 => '1',
    ),
    'OnSiteRefresh' => 
    array (
      10 => '10',
      12 => '12',
      11 => '11',
    ),
    'OnSnipFormPrerender' => 
    array (
      9 => '9',
      1 => '1',
    ),
    'OnTempFormPrerender' => 
    array (
      1 => '1',
      9 => '9',
    ),
    'OnTempFormSave' => 
    array (
      9 => '9',
    ),
    'OnTVInputPropertiesList' => 
    array (
      2 => '2',
      6 => '6',
    ),
    'OnTVInputRenderList' => 
    array (
      2 => '2',
      6 => '6',
    ),
    'OnWebPagePrerender' => 
    array (
      11 => '11',
    ),
  ),
  'pluginCache' => 
  array (
    1 => 
    array (
      'id' => '1',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'Ace',
      'description' => 'Ace code editor plugin for MODx Revolution',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '/**
 * Ace Source Editor Plugin
 *
 * Events: OnManagerPageBeforeRender, OnRichTextEditorRegister, OnSnipFormPrerender,
 * OnTempFormPrerender, OnChunkFormPrerender, OnPluginFormPrerender,
 * OnFileCreateFormPrerender, OnFileEditFormPrerender, OnDocFormPrerender
 *
 * @author Danil Kostin <danya.postfactum(at)gmail.com>
 *
 * @package ace
 *
 * @var array $scriptProperties
 * @var Ace $ace
 */
if ($modx->event->name == \'OnRichTextEditorRegister\') {
    $modx->event->output(\'Ace\');
    return;
}

if ($modx->getOption(\'which_element_editor\', null, \'Ace\') !== \'Ace\') {
    return;
}

$ace = $modx->getService(\'ace\', \'Ace\', $modx->getOption(\'ace.core_path\', null, $modx->getOption(\'core_path\').\'components/ace/\').\'model/ace/\');
$ace->initialize();

$extensionMap = array(
    \'tpl\'   => \'text/x-smarty\',
    \'htm\'   => \'text/html\',
    \'html\'  => \'text/html\',
    \'css\'   => \'text/css\',
    \'scss\'  => \'text/x-scss\',
    \'less\'  => \'text/x-less\',
    \'svg\'   => \'image/svg+xml\',
    \'xml\'   => \'application/xml\',
    \'xsl\'   => \'application/xml\',
    \'js\'    => \'application/javascript\',
    \'json\'  => \'application/json\',
    \'php\'   => \'application/x-php\',
    \'sql\'   => \'text/x-sql\',
    \'md\'    => \'text/x-markdown\',
    \'txt\'   => \'text/plain\',
    \'twig\'  => \'text/x-twig\'
);

// Defines wether we should highlight modx tags
$modxTags = false;
switch ($modx->event->name) {
    case \'OnSnipFormPrerender\':
        $field = \'modx-snippet-snippet\';
        $mimeType = \'application/x-php\';
        break;
    case \'OnTempFormPrerender\':
        $field = \'modx-template-content\';
        $modxTags = true;

        switch (true) {
            case $modx->getOption(\'twiggy_class\'):
                $mimeType = \'text/x-twig\';
                break;
            case $modx->getOption(\'pdotools_fenom_parser\'):
                $mimeType = \'text/x-smarty\';
                break;
            default:
                $mimeType = \'text/html\';
                break;
        }

        break;
    case \'OnChunkFormPrerender\':
        $field = \'modx-chunk-snippet\';
        if ($modx->controller->chunk && $modx->controller->chunk->isStatic()) {
            $extension = pathinfo($modx->controller->chunk->getSourceFile(), PATHINFO_EXTENSION);
            $mimeType = isset($extensionMap[$extension]) ? $extensionMap[$extension] : \'text/plain\';
        } else {
            $mimeType = \'text/html\';
        }
        $modxTags = true;

        switch (true) {
            case $modx->getOption(\'twiggy_class\'):
                $mimeType = \'text/x-twig\';
                break;
            case $modx->getOption(\'pdotools_fenom_default\'):
                $mimeType = \'text/x-smarty\';
                break;
            default:
                $mimeType = \'text/html\';
                break;
        }

        break;
    case \'OnPluginFormPrerender\':
        $field = \'modx-plugin-plugincode\';
        $mimeType = \'application/x-php\';
        break;
    case \'OnFileCreateFormPrerender\':
        $field = \'modx-file-content\';
        $mimeType = \'text/plain\';
        break;
    case \'OnFileEditFormPrerender\':
        $field = \'modx-file-content\';
        $extension = pathinfo($scriptProperties[\'file\'], PATHINFO_EXTENSION);
        $mimeType = isset($extensionMap[$extension])
            ? $extensionMap[$extension]
            : \'text/plain\';
        $modxTags = $extension == \'tpl\';
        break;
    case \'OnDocFormPrerender\':
        if (!$modx->controller->resourceArray) {
            return;
        }
        $field = \'ta\';
        $mimeType = $modx->getObject(\'modContentType\', $modx->controller->resourceArray[\'content_type\'])->get(\'mime_type\');

        switch (true) {
            case $mimeType == \'text/html\' && $modx->getOption(\'twiggy_class\'):
                $mimeType = \'text/x-twig\';
                break;
            case $mimeType == \'text/html\' && $modx->getOption(\'pdotools_fenom_parser\'):
                $mimeType = \'text/x-smarty\';
                break;
        }

        if ($modx->getOption(\'use_editor\')){
            $richText = $modx->controller->resourceArray[\'richtext\'];
            $classKey = $modx->controller->resourceArray[\'class_key\'];
            if ($richText || in_array($classKey, array(\'modStaticResource\',\'modSymLink\',\'modWebLink\',\'modXMLRPCResource\'))) {
                $field = false;
            }
        }
        $modxTags = true;
        break;
    default:
        return;
}

$modxTags = (int) $modxTags;
$script = \'\';
if ($field) {
    $script .= "MODx.ux.Ace.replaceComponent(\'$field\', \'$mimeType\', $modxTags);";
}

if ($modx->event->name == \'OnDocFormPrerender\' && !$modx->getOption(\'use_editor\')) {
    $script .= "MODx.ux.Ace.replaceTextAreas(Ext.query(\'.modx-richtext\'));";
}

if ($script) {
    $modx->controller->addHtml(\'<script>Ext.onReady(function() {\' . $script . \'});</script>\');
}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => 'ace/elements/plugins/ace.plugin.php',
    ),
    2 => 
    array (
      'id' => '2',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'CallToActionTV',
      'description' => '',
      'editor_type' => '0',
      'category' => '1',
      'cache_type' => '0',
      'plugincode' => '/**
 * CallToActionTV.
 *
 * @package calltoactiontv
 * @subpackage plugin
 *
 * @event OnManagerPageBeforeRender
 * @event OnTVInputRenderList
 * @event OnTVInputPropertiesList
 * @event OnDocFormRender
 *
 * @var modX $modx
 */

$corePath = $modx->getOption(
    \'calltoactiontv.core_path\',
    null,
    $modx->getOption(\'core_path\') . \'components/calltoactiontv/\'
);
$callToActionTV = $modx->getService(\'calltoactiontv\', \'CallToActionTV\', $corePath . \'model/calltoactiontv/\');

switch ($modx->event->name) {
    case \'OnManagerPageBeforeRender\':
        $modx->controller->addLexiconTopic(\'calltoactiontv:default\');
        $callToActionTV->includeAssets();

        break;
    case \'OnTVInputRenderList\':
        $modx->event->output($corePath . \'elements/tv/input/\');

        break;
    case \'OnTVInputPropertiesList\':
        $modx->event->output($corePath . \'elements/tv/input/options/\');

        break;
    case \'OnDocFormRender\':
        $callToActionTV->includeAssets();

        break;
}',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    3 => 
    array (
      'id' => '3',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'ClientConfig',
      'description' => 'Sets system settings from the Client Config CMP.',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '/**
 * ClientConfig
 *
 * Copyright 2011-2014 by Mark Hamstra <hello@markhamstra.com>
 *
 * ClientConfig is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * ClientConfig is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * ClientConfig; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package clientconfig
 *
 * @var modX $modx
 * @var int $id
 * @var string $mode
 * @var modResource $resource
 * @var modTemplate $template
 * @var modTemplateVar $tv
 * @var modChunk $chunk
 * @var modSnippet $snippet
 * @var modPlugin $plugin
*/

$eventName = $modx->event->name;

switch($eventName) {
    case \'OnMODXInit\':
        /* Grab the class */
        $path = $modx->getOption(\'clientconfig.core_path\', null, $modx->getOption(\'core_path\') . \'components/clientconfig/\');
        $path .= \'model/clientconfig/\';
        $clientConfig = $modx->getService(\'clientconfig\',\'ClientConfig\', $path);

        /* If we got the class (gotta be careful of failed migrations), grab settings and go! */
        if ($clientConfig instanceof ClientConfig) {
            $contextKey = $modx->context instanceof modContext ? $modx->context->get(\'key\') : \'web\';
            $settings = $clientConfig->getSettings($contextKey);

            /* Make settings available as [[++tags]] */
            $modx->setPlaceholders($settings, \'+\');

            /* Make settings available for $modx->getOption() */
            foreach ($settings as $key => $value) {
                $modx->setOption($key, $value);
            }
        }
        break;
}

return;',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    4 => 
    array (
      'id' => '4',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'FileSluggy',
      'description' => 'FileSluggy plugin for MODx Revolution',
      'editor_type' => '0',
      'category' => '3',
      'cache_type' => '0',
      'plugincode' => '/**
 * FileSluggy by Sterc
 * Sanitizes a filename on upload to be a nice and more clean filename, so it will work better with phpthumbof, pthumb and overall cleaner filenames and directories.
 * Copyright 2015 by Sterc
 * FileSluggy is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * FileSluggy is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * formAlicious; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @author Sterc <modx@sterc.nl>
 * @credits:
 *      - Based on the code of the sanitizefilename plugin of Benjamin Vauchel https://github.com/benjamin-vauchel/SanitizeFilename
 *      - The Slug() phunction of AlixAxel https://github.com/alixaxel/phunction/blob/master/phunction/Text.php
 * @version Version 1.3
 * @package filesluggy
 */

$FileSluggy = $modx->getService(
    \'filesluggy\',
    \'FileSluggy\',
    $modx->getOption(
        \'filesluggy.core_path\',
        null,
        $modx->getOption(\'core_path\') . \'components/filesluggy/\'
    )
    .\'model/filesluggy/\',
    $scriptProperties
);
if (!($FileSluggy instanceof FileSluggy)) {
    return;
}
switch ($modx->event->name) {
    case \'OnFileManagerDirCreate\':
    case \'OnFileManagerDirRename\':
        if ($FileSluggy->santizeAllowThisMediaSource($source->get(\'id\'))) {
            if ($modx->getOption(\'filesluggy.sanitizeDir\')) {
                $basePath = $source->getBasePath();
                $dirName  = basename($directory);
                $newDirName  = $FileSluggy->sanitizeName($dirName, true);
                $FileSluggy->renameContainer($source, str_replace(realpath($basePath), \'\', $directory), $newDirName);
                /* Invoke custom system event \'FileSluggyOnUpdateDirname\' */
                $modx->invokeEvent(\'FileSluggyOnUpdateDirname\', array(
                    \'oldName\' => $dirName,
                    \'newName\' => $newDirName
                ));
            }
        }
        break;
    case \'OnFileManagerUpload\':
        $url = parse_url($_SERVER[\'HTTP_REFERER\']);
        $query = $url[\'query\'];
        foreach ($files as $file) {
            if ($FileSluggy->santizeAllowThisMediaSource($source->get(\'id\'))) {
                if (!$source->hasErrors()) {
                    if ($file[\'error\'] == 0) {
                        $basePath = $source->getBasePath();
                        $oldPath  = $directory . $file[\'name\'];
                        if ($FileSluggy->allowType($file[\'name\'])) {
                            $newFileName = $FileSluggy->sanitizeName($file[\'name\']);
                            if ($FileSluggy->checkFileNameChanged()) {
                                $newFileName = $FileSluggy->checkFileExists($basePath . $directory . $newFileName);
                                if ($source->renameObject($oldPath, $newFileName)) {
                                    $modx->invokeEvent(\'FileSluggyOnUpdateFilename\', array(
                                        \'oldName\' => $file[\'name\'],
                                        \'newName\' => $newFileName
                                    ));
                                    return;
                                } else {
                                    return;
                                }
                            } else {
                                return;
                            }
                        } else {
                            return;
                        }
                    } else {
                        return;
                    }
                } else {
                    $modx->log(
                        modX::LOG_LEVEL_ERROR,
                        \'[FileSluggy] There was an error during the upload process...\'
                    );
                }
                return;
            }
            return;
        }
        break;
}',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    5 => 
    array (
      'id' => '5',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'FormIt',
      'description' => '',
      'editor_type' => '0',
      'category' => '4',
      'cache_type' => '0',
      'plugincode' => '/**
 * FormIt
 *
 * Copyright 2009-2017 by Sterc <modx@sterc.nl>
 *
 * FormIt is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * FormIt is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * FormIt; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package formit
 */
/**
 * FormIt plugin
 *
 * @package formit
 */

$formit = $modx->getService(
    \'formit\',
    \'FormIt\',
    $modx->getOption(\'formit.core_path\', null, $modx->getOption(\'core_path\').\'components/formit/\') .\'model/formit/\',
    array()
);

if (!($formit instanceof FormIt)) {
    return;
}

switch ($modx->event->name) {
    case \'OnManagerPageBeforeRender\':
        // If migration status is false, show migrate alert message bar in manager
        if (method_exists(\'FormIt\',\'encryptionMigrationStatus\')) {
            if (!$formit->encryptionMigrationStatus()) {
                $modx->lexicon->load(\'formit:mgr\');
                $properties = array(\'message\' => $modx->lexicon(\'formit.migrate_alert\'));
                $chunk = $formit->_getTplChunk(\'migrate/alert\');
                if ($chunk) {
                    $modx->regClientStartupHTMLBlock($chunk->process($properties));
                    $modx->regClientCSS($formit->config[\'cssUrl\'] . \'migrate.css\');
                }
            }
        }
}',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    6 => 
    array (
      'id' => '6',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'MIGX',
      'description' => '',
      'editor_type' => '0',
      'category' => '5',
      'cache_type' => '0',
      'plugincode' => '$corePath = $modx->getOption(\'migx.core_path\',null,$modx->getOption(\'core_path\').\'components/migx/\');
$assetsUrl = $modx->getOption(\'migx.assets_url\', null, $modx->getOption(\'assets_url\') . \'components/migx/\');
switch ($modx->event->name) {
    case \'OnTVInputRenderList\':
        $modx->event->output($corePath.\'elements/tv/input/\');
        break;
    case \'OnTVInputPropertiesList\':
        $modx->event->output($corePath.\'elements/tv/inputoptions/\');
        break;

        case \'OnDocFormPrerender\':
        $modx->controller->addCss($assetsUrl.\'css/mgr.css\');
        break; 
 
    /*          
    case \'OnTVOutputRenderList\':
        $modx->event->output($corePath.\'elements/tv/output/\');
        break;
    case \'OnTVOutputRenderPropertiesList\':
        $modx->event->output($corePath.\'elements/tv/properties/\');
        break;
    
    case \'OnDocFormPrerender\':
        $assetsUrl = $modx->getOption(\'colorpicker.assets_url\',null,$modx->getOption(\'assets_url\').\'components/colorpicker/\'); 
        $modx->regClientStartupHTMLBlock(\'<script type="text/javascript">
        Ext.onReady(function() {
            
        });
        </script>\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorPicker.js\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorMenu.js\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorPickerField.js\');		
        $modx->regClientCSS($assetsUrl.\'resources/css/colorpicker.css\');
        break;
     */
}
return;',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    8 => 
    array (
      'id' => '8',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'migxResizeOnUpload',
      'description' => '',
      'editor_type' => '0',
      'category' => '5',
      'cache_type' => '0',
      'plugincode' => '/**
 * migxResizeOnUpload Plugin
 *
 * Events: OnFileManagerUpload
 * Author: Bruno Perner <b.perner@gmx.de>
 * Modified to read multiple configs from mediasource-property
 * 
 * First Author: Vasiliy Naumkin <bezumkin@yandex.ru>
 * Required: PhpThumbOf snippet for resizing images
 * 
 * Example: mediasource - property \'resizeConfig\':
 * [{"alias":"origin","w":"500","h":"500","far":1},{"alias":"thumb","w":"150","h":"150","far":1}]
 */

if ($modx->event->name != \'OnFileManagerUpload\') {
    return;
}


$file = $modx->event->params[\'files\'][\'file\'];
$directory = $modx->event->params[\'directory\'];

if ($file[\'error\'] != 0) {
    return;
}

$name = $file[\'name\'];
//$extensions = explode(\',\', $modx->getOption(\'upload_images\'));

$source = $modx->event->params[\'source\'];

if ($source instanceof modMediaSource) {
    //$dirTree = $modx->getOption(\'dirtree\', $_REQUEST, \'\');
    //$modx->setPlaceholder(\'docid\', $resource_id);
    $source->initialize();
    $basePath = str_replace(\'/./\', \'/\', $source->getBasePath());
    //$cachepath = $cachepath . $dirTree;
    $baseUrl = $modx->getOption(\'site_url\') . $source->getBaseUrl();
    //$baseUrl = $baseUrl . $dirTree;
    $sourceProperties = $source->getPropertyList();

    //echo \'<pre>\' . print_r($sourceProperties, 1) . \'</pre>\';
    //$allowedExtensions = $modx->getOption(\'allowedFileTypes\', $sourceProperties, \'\');
    //$allowedExtensions = empty($allowedExtensions) ? \'jpg,jpeg,png,gif\' : $allowedExtensions;
    //$maxFilesizeMb = $modx->getOption(\'maxFilesizeMb\', $sourceProperties, \'8\');
    //$maxFiles = $modx->getOption(\'maxFiles\', $sourceProperties, \'0\');
    //$thumbX = $modx->getOption(\'thumbX\', $sourceProperties, \'100\');
    //$thumbY = $modx->getOption(\'thumbY\', $sourceProperties, \'100\');
    $resizeConfigs = $modx->getOption(\'resizeConfigs\', $sourceProperties, \'\');
    $resizeConfigs = $modx->fromJson($resizeConfigs);
    $thumbscontainer = $modx->getOption(\'thumbscontainer\', $sourceProperties, \'thumbs/\');
    $imageExtensions = $modx->getOption(\'imageExtensions\', $sourceProperties, \'jpg,jpeg,png,gif,JPG\');
    $imageExtensions = explode(\',\', $imageExtensions);
    //$uniqueFilenames = $modx->getOption(\'uniqueFilenames\', $sourceProperties, false);
    //$onImageUpload = $modx->getOption(\'onImageUpload\', $sourceProperties, \'\');
    //$onImageRemove = $modx->getOption(\'onImageRemove\', $sourceProperties, \'\');
    $cleanalias = $modx->getOption(\'cleanFilename\', $sourceProperties, false);

}

if (is_array($resizeConfigs) && count($resizeConfigs) > 0) {
    foreach ($resizeConfigs as $rc) {
        if (isset($rc[\'alias\'])) {
            $filePath = $basePath . $directory;
            $filePath = str_replace(\'//\',\'/\',$filePath);
            if ($rc[\'alias\'] == \'origin\') {
                $thumbPath = $filePath;
            } else {
                $thumbPath = $filePath . $rc[\'alias\'] . \'/\';
                $permissions = octdec(\'0\' . (int)($modx->getOption(\'new_folder_permissions\', null, \'755\', true)));
                if (!@mkdir($thumbPath, $permissions, true)) {
                    $modx->log(MODX_LOG_LEVEL_ERROR, sprintf(\'[migxResourceMediaPath]: could not create directory %s).\', $thumbPath));
                } else {
                    chmod($thumbPath, $permissions);
                }

            }


            $filename = $filePath . $name;
            $thumbname = $thumbPath . $name;
            $ext = substr(strrchr($name, \'.\'), 1);
            if (in_array($ext, $imageExtensions)) {
                $sizes = getimagesize($filename);
                echo $sizes[0]; 
                //$format = substr($sizes[\'mime\'], 6);
                if ($sizes[0] > $rc[\'w\'] || $sizes[1] > $rc[\'h\']) {
                    if ($sizes[0] < $rc[\'w\']) {
                        $rc[\'w\'] = $sizes[0];
                    }
                    if ($sizes[1] < $rc[\'h\']) {
                        $rc[\'h\'] = $sizes[1];
                    }
                    $type = $sizes[0] > $sizes[1] ? \'landscape\' : \'portrait\';
                    if (isset($rc[\'far\']) && $rc[\'far\'] == \'1\' && isset($rc[\'w\']) && isset($rc[\'h\'])) {
                        if ($type = \'landscape\') {
                            unset($rc[\'h\']);
                        }else {
                            unset($rc[\'w\']);
                        }
                    }

                    $options = \'\';
                    foreach ($rc as $k => $v) {
                        if ($k != \'alias\') {
                            $options .= \'&\' . $k . \'=\' . $v;
                        }
                    }
                    $resized = $modx->runSnippet(\'phpthumbof\', array(\'input\' => $filePath . $name, \'options\' => $options));
                    rename(MODX_BASE_PATH . substr($resized, 1), $thumbname);
                }
            }


        }
    }
}',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    9 => 
    array (
      'id' => '9',
      'source' => '1',
      'property_preprocess' => '0',
      'name' => 'modDevTools',
      'description' => '',
      'editor_type' => '0',
      'category' => '6',
      'cache_type' => '0',
      'plugincode' => '/**
 * modDevTools
 *
 * Copyright 2014 by Vitaly Kireev <kireevvit@gmail.com>
 *
 * @package moddevtools
 *
 * @var modX $modx
 * @var int $id
 * @var string $mode
 */

/**
 * @var modx $modx
 */
$path = $modx->getOption(\'moddevtools_core_path\',null,$modx->getOption(\'core_path\').\'components/moddevtools/\').\'model/moddevtools/\';
/**
 * @var modDevTools $devTools
 */
$devTools = $modx->getService(\'devTools\',\'modDevTools\',$path, array(\'debug\' => false));
$eventName = $modx->event->name;

switch($eventName) {
    case \'OnDocFormSave\':
        $devTools->debug(\'Start OnDocFormSave\');
        $devTools->parseContent($resource);
        break;
    case \'OnTempFormSave\':
        $devTools->debug(\'Start OnTempFormSave\');
        $devTools->parseContent($template);
        break;
    case \'OnTVFormSave\':

        break;
    case \'OnChunkFormSave\':
        $devTools->debug(\'Start OnChunkFormSave\');
        $devTools->parseContent($chunk);
        break;
    case \'OnSnipFormSave\':

        break;
    /* Add tabs */
    case \'OnDocFormPrerender\':
        if ($modx->event->name == \'OnDocFormPrerender\') {
            $devTools->getBreadCrumbs($scriptProperties);
            return;
        }
        break;

    case \'OnTempFormPrerender\':
        if ($mode == modSystemEvent::MODE_UPD) {
            $result = $devTools->outputTab(\'Template\');
        }
        break;

    case \'OnTVFormPrerender\':
        break;


    case \'OnChunkFormPrerender\':
        if ($mode == modSystemEvent::MODE_UPD) {
            $result = $devTools->outputTab(\'Chunk\');
        }
        break;

    case \'OnSnipFormPrerender\':
        if ($mode == modSystemEvent::MODE_UPD) {
            $result = $devTools->outputTab(\'Snippet\');
        }
        break;


}

if (isset($result) && $result === true)
    return;
elseif (isset($result)) {
    $modx->log(modX::LOG_LEVEL_ERROR,\'[modDevTools] An error occured. Event: \'.$eventName.\' - Error: \'.($result === false) ? \'undefined error\' : $result);
    return;
}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => 'core/components/moddevtools/elements/plugins/plugin.moddevtools.php',
    ),
    10 => 
    array (
      'id' => '10',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'modxMinifyCacheClear',
      'description' => '',
      'editor_type' => '0',
      'category' => '7',
      'cache_type' => '0',
      'plugincode' => 'switch ($modx->event->name) {

	case \'OnSiteRefresh\':
		$modxminify = $modx->getService(\'modxminify\',\'modxMinify\',$modx->getOption(\'modxminify.core_path\',null,$modx->getOption(\'core_path\').\'components/modxminify/\').\'model/modxminify/\',$scriptProperties);
		if (!($modxminify instanceof modxMinify)) return \'\';
		$modxminify->emptyMinifyCacheAll();
		break;

}',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    11 => 
    array (
      'id' => '11',
      'source' => '1',
      'property_preprocess' => '0',
      'name' => 'pdoTools',
      'description' => '',
      'editor_type' => '0',
      'category' => '8',
      'cache_type' => '0',
      'plugincode' => '/** @var modX $modx */
switch ($modx->event->name) {

    case \'OnMODXInit\':
        $fqn = $modx->getOption(\'pdoTools.class\', null, \'pdotools.pdotools\', true);
        $path = $modx->getOption(\'pdotools_class_path\', null, MODX_CORE_PATH . \'components/pdotools/model/\', true);
        $modx->loadClass($fqn, $path, false, true);

        $fqn = $modx->getOption(\'pdoFetch.class\', null, \'pdotools.pdofetch\', true);
        $path = $modx->getOption(\'pdofetch_class_path\', null, MODX_CORE_PATH . \'components/pdotools/model/\', true);
        $modx->loadClass($fqn, $path, false, true);
        break;

    case \'OnSiteRefresh\':
        /** @var pdoTools $pdoTools */
        if ($pdoTools = $modx->getService(\'pdoTools\')) {
            if ($pdoTools->clearFileCache()) {
                $modx->log(modX::LOG_LEVEL_INFO, $modx->lexicon(\'refresh_default\') . \': pdoTools\');
            }
        }
        break;

    case \'OnWebPagePrerender\':
        $parser = $modx->getParser();
        if ($parser instanceof pdoParser) {
            foreach ($parser->pdoTools->ignores as $key => $val) {
                $modx->resource->_output = str_replace($key, $val, $modx->resource->_output);
            }
        }
        break;
}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => 'core/components/pdotools/elements/plugins/plugin.pdotools.php',
    ),
    12 => 
    array (
      'id' => '12',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'phpThumbOfCacheManager',
      'description' => 'Handles cache cleaning when clearing the Site Cache.',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '/**
 * phpThumbOf
 *
 * Copyright 2009-2012 by Shaun McCormick <shaun@modx.com>
 *
 * phpThumbOf is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * phpThumbOf is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * phpThumbOf; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package phpthumbof
 */
/**
 * Handles cache management for phpthumbof filter
 *
 * @var \\modX $modx
 * @var array $scriptProperties
 *
 * @package phpthumbof
 */
if (empty($results)) $results = array();

switch ($modx->event->name) {
    case \'OnSiteRefresh\':
        if (!$modx->loadClass(\'modPhpThumb\',$modx->getOption(\'core_path\').\'model/phpthumb/\',true,true)) {
            $modx->log(modX::LOG_LEVEL_ERROR,\'[phpThumbOf] Could not load modPhpThumb class in plugin.\');
            return;
        }
        $assetsPath = $modx->getOption(\'phpthumbof.assets_path\',$scriptProperties,$modx->getOption(\'assets_path\').\'components/phpthumbof/\');
        $phpThumb = new modPhpThumb($modx);
        $cacheDir = $assetsPath.\'cache/\';

        /* clear local cache */
        if (!empty($cacheDir)) {
            /** @var DirectoryIterator $file */
            foreach (new DirectoryIterator($cacheDir) as $file) {
                if (!$file->isFile()) continue;
                @unlink($file->getPathname());
            }
        }

        /* if using amazon s3, clear our cache there */
        $useS3 = $modx->getOption(\'phpthumbof.use_s3\',$scriptProperties,false);
        if ($useS3) {
            $modelPath = $modx->getOption(\'phpthumbof.core_path\',null,$modx->getOption(\'core_path\').\'components/phpthumbof/\').\'model/\';
            /** @var modAws $modaws */
            $modaws = $modx->getService(\'modaws\',\'modAws\',$modelPath.\'aws/\',$scriptProperties);
            $s3path = $modx->getOption(\'phpthumbof.s3_path\',null,\'phpthumbof/\');
            
            $list = $modaws->getObjectList($s3path);
            if (!empty($list) && is_array($list)) {
                foreach ($list as $obj) {
                    if (empty($obj->Key)) continue;

                    $results[] = $modaws->deleteObject($obj->Key);
                }
            }
        }

        break;
}
return;',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    13 => 
    array (
      'id' => '13',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'seoPro',
      'description' => 'SEO optimizing plugin for MODx Revolution.',
      'editor_type' => '0',
      'category' => '10',
      'cache_type' => '0',
      'plugincode' => '/**
 * The base seoPro snippet.
 *
 * @package seopro
 */
$seoPro = $modx->getService(\'seopro\', \'seoPro\', $modx->getOption(\'seopro.core_path\', null, $modx->getOption(\'core_path\') . \'components/seopro/\') . \'model/seopro/\', $scriptProperties);
if (!($seoPro instanceof seoPro)) {
    return \'\';
}

$disabledTemplates = explode(\',\', $modx->getOption(\'seopro.disabledtemplates\', null, \'0\'));

switch ($modx->event->name) {
    case \'OnMODXInit\':
        $version = $modx->getVersionData();
        $version = (int)($version[\'version\'] . $version[\'major_version\']);
        if ($version < 27) {
            $modx->loadClass(\'modResource\');
            $modx->map[\'modResource\'][\'fieldMeta\'][\'description\'] = array(
                \'dbtype\' => \'text\',
                \'phptype\' => \'string\',
                \'index\' => \'fulltext\',
                \'indexgrp\' => \'content_ft_idx\',
            );
        }
        break;

    case \'OnDocFormRender\':
        $template = (string)$resource->get(\'template\');
        $override = false;
        if (isset($_REQUEST[\'template\'])) {
            $template = (string)$_REQUEST[\'template\'];
            $override = true;
        }
        if (($override && $template === \'0\') || (!empty($template) && in_array($template, $disabledTemplates))) {
            break;
        }
        
        $currClassKey = $resource->get(\'class_key\');
        $strFields = $modx->getOption(\'seopro.fields\', null, \'pagetitle:70,longtitle:70,description:320,alias:2023,menutitle:2023\');
        $arrFields = array();
        if (is_array(explode(\',\', $strFields))) {
            foreach (explode(\',\', $strFields) as $field) {
                list($fieldName, $fieldCount) = explode(\':\', $field);
                $arrFields[$fieldName] = $fieldCount;
            }
        } else {
            return \'\';
        }

        $keywords = \'\';
        $modx->controller->addLexiconTopic(\'seopro:default\');
        $ctxKey = !empty($resource) ? $resource->get(\'context_key\') : $modx->getOption(\'default_context\');
        $ctx = $modx->getContext($ctxKey);
        if ($ctx) {
            $url = $ctx->getOption(\'site_url\', \'\', $modx->getOption(\'site_url\'));
        } else {
            $url = $modx->getOption(\'site_url\');
        }
        if ($mode == \'upd\') {
            if ($ctx) {
                if ($resource->get(\'id\') != $ctx->getOption(\'site_start\', \'\', $modx->getOption(\'site_start\'))) {
                    $url .= $resource->get(\'uri\');
                }
            } else {
                $url = $modx->makeUrl($resource->get(\'id\'), \'\', \'\', \'full\');
            }
            $url = str_replace(
                $resource->get(\'alias\'),
                \'<span id=\\"seopro-replace-alias\\">\' . $resource->get(\'alias\') . \'</span>\',
                $url
            );
            $seoKeywords = $modx->getObject(\'seoKeywords\', array(\'resource\' => $resource->get(\'id\')));
            if ($seoKeywords) {
                $keywords = $seoKeywords->get(\'keywords\');
            }
        }

        if ($_REQUEST[\'id\'] == $modx->getOption(\'site_start\')) {
            unset($arrFields[\'alias\']);
            unset($arrFields[\'menutitle\']);
        }


        $config = $seoPro->config;
        unset($config[\'resource\']);
        $modx->regClientStartupHTMLBlock(\'<script type="text/javascript">
        Ext.onReady(function() {
            seoPro.config = \' . $modx->toJSON($config) . \';
            seoPro.config.record = "\' . $keywords . \'";
            seoPro.config.values = {};
            seoPro.config.fields = "\' . implode(",", array_keys($arrFields)) . \'";
            seoPro.config.chars = \' . $modx->toJSON($arrFields) . \'
            seoPro.config.url = "\' . $url . \'";
        });</script>\');

        /* include CSS and JS*/
        $version = $modx->getVersionData();
        if($version[\'version\'] == 2 && $version[\'major_version\'] == 2){
            $modx->regClientCSS($seoPro->config[\'assetsUrl\'] . \'css/mgr.css\');
        }else{
            $modx->regClientCSS($seoPro->config[\'assetsUrl\'] . \'css/mgr23.css\');
        }
        $modx->regClientStartupScript($seoPro->config[\'assetsUrl\'] . \'js/mgr/seopro.js??v=\' . $modx->getOption(\'seopro.version\', null, \'v1.0.0\'));
        $modx->regClientStartupScript($seoPro->config[\'assetsUrl\'] . \'js/mgr/resource.js?v=\' . $modx->getOption(\'seopro.version\', null, \'v1.0.0\'));

        break;

    case \'OnDocFormSave\':
        $template = (string)$resource->get(\'template\');
        $override = false;
        if (isset($_REQUEST[\'template\'])) {
            $template = (string)$_REQUEST[\'template\'];
            $override = true;
        }
        if (($override && $template === \'0\') || (!empty($template) && in_array($template, $disabledTemplates))) {
            break;
        }
        $seoKeywords = $modx->getObject(\'seoKeywords\', array(\'resource\' => $resource->get(\'id\')));
        if (!$seoKeywords && isset($resource)) {
            $seoKeywords = $modx->newObject(\'seoKeywords\', array(\'resource\' => $resource->get(\'id\')));
        }
        if($seoKeywords){
            if (isset($_POST[\'keywords\'])){
                $seoKeywords->set(\'keywords\', trim($_POST[\'keywords\'], \',\'));
            } else {
                $seoKeywords->set(\'keywords\', \'\');
            }
            $seoKeywords->save();
        }
        break;

    case \'onResourceDuplicate\':
        $template = (string)$resource->get(\'template\');
        $override = false;
        if (isset($_REQUEST[\'template\'])) {
            $template = (string)$_REQUEST[\'template\'];
            $override = true;
        }
        if (($override && $template === \'0\') || (!empty($template) && in_array($template, $disabledTemplates))) {
            break;
        }

        $seoKeywords = $modx->getObject(\'seoKeywords\', array(\'resource\' => $resource->get(\'id\')));
        if (!$seoKeywords) {
            $seoKeywords = $modx->newObject(\'seoKeywords\', array(\'resource\' => $resource->get(\'id\')));
        }
        $newSeoKeywords = $modx->newObject(\'seoKeywords\');
        $newSeoKeywords->fromArray($seoKeywords->toArray());
        $newSeoKeywords->set(\'resource\', $newResource->get(\'id\'));
        $newSeoKeywords->save();
        break;

    case \'OnLoadWebDocument\':
        if ($modx->context->get(\'key\') == "mgr") {
            break;
        }
        $template = ($modx->resource->get(\'template\')) ? (string)$modx->resource->get(\'template\') : \'\';
        if (in_array($template, $disabledTemplates)) {
            break;
        }
        $seoKeywords = $modx->getObject(\'seoKeywords\', array(\'resource\' => $modx->resource->get(\'id\')));
        if ($seoKeywords) {
            $keyWords = $seoKeywords->get(\'keywords\');
            $modx->setPlaceholder(\'seoPro.keywords\', $keyWords);
        }
        // Render the meta title, based on system settings
        $titleFormat = $modx->getOption(\'seopro.title_format\');
        if (empty($titleFormat)) {
            $siteDelimiter = $modx->getOption(\'seopro.delimiter\', null, \'/\');
            $siteUseSitename = (boolean)$modx->getOption(\'seopro.usesitename\', null, true);
            $siteID = $modx->resource->get(\'id\');
            $siteName = $modx->getOption(\'site_name\');
            $longtitle = $modx->resource->get(\'longtitle\');
            $pagetitle = $modx->resource->get(\'pagetitle\');
            $seoProTitle = array();
            if ($siteID == $modx->getOption(\'site_start\')) {
                $seoProTitle[\'pagetitle\'] = !empty($longtitle) ? $longtitle : $siteName;
            } else {
                $seoProTitle[\'pagetitle\'] = !empty($longtitle) ? $longtitle : $pagetitle;
                if ($siteUseSitename) {
                    $seoProTitle[\'delimiter\'] = $siteDelimiter;
                    $seoProTitle[\'sitename\'] = $siteName;
                }
            }
            $title = implode(\' \', $seoProTitle);
        } else {
            $title = $modx->getOption(\'seopro.title_format\');
        }
        $modx->setPlaceholder(\'seoPro.title\', $title);
        break;
}',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    14 => 
    array (
      'id' => '14',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'SimpleSearchIndexer',
      'description' => 'Automatically indexes Resources into Solr.',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '/**
 * SimpleSearch
 *
 * Copyright 2010-11 by Shaun McCormick <shaun+sisea@modx.com>
 *
 * This file is part of SimpleSearch, a simple search component for MODx
 * Revolution. It is loosely based off of AjaxSearch for MODx Evolution by
 * coroico/kylej, minus the ajax.
 *
 * SimpleSearch is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * SimpleSearch is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * SimpleSearch; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package simplesearch
 */
/**
 * Plugin to index Resources whenever they are changed, published, unpublished,
 * deleted, or undeleted.
 *
 * @var modX $modx
 * @var SimpleSearch $search
 *
 * @package simplesearch
 */

require_once $modx->getOption(\'sisea.core_path\',null,$modx->getOption(\'core_path\').\'components/simplesearch/\').\'model/simplesearch/simplesearch.class.php\';
$search = new SimpleSearch($modx,$scriptProperties);

$search->loadDriver($scriptProperties);
if (!$search->driver || (!($search->driver instanceof SimpleSearchDriverSolr) && !($search->driver instanceof SimpleSearchDriverElastic))) return;

/**
 * helper method for missing params in events
 * @param modX $modx
 * @param array $children
 * @param int $parent
 * @return boolean
 */
if (!function_exists(\'SimpleSearchGetChildren\')) {
    function SimpleSearchGetChildren(&$modx,&$children,$parent) {
        $success = false;
        $kids = $modx->getCollection(\'modResource\',array(
            \'parent\' => $parent,
        ));
        if (!empty($kids)) {
            /** @var modResource $kid */
            foreach ($kids as $kid) {
                $children[] = $kid->toArray();
                SimpleSearchGetChildren($modx,$children,$kid->get(\'id\'));
            }
        }
        return $success;
    }
}

$action = \'index\';
$resourcesToIndex = array();
switch ($modx->event->name) {
    case \'OnDocFormSave\':
        $action = \'index\';
        $resourceArray = $scriptProperties[\'resource\']->toArray();

        if ($resourceArray[\'published\'] == 1 && $resourceArray[\'deleted\'] == 0) {
            $action = \'index\';
            foreach ($_POST as $k => $v) {
                if (substr($k,0,2) == \'tv\') {
                    $id = str_replace(\'tv\',\'\',$k);
                    /** @var modTemplateVar $tv */
                    $tv = $modx->getObject(\'modTemplateVar\',$id);
                    if ($tv) {
                        $resourceArray[$tv->get(\'name\')] = $tv->renderOutput($resource->get(\'id\'));
                        $modx->log(modX::LOG_LEVEL_DEBUG,\'Indexing \'.$tv->get(\'name\').\': \'.$resourceArray[$tv->get(\'name\')]);
                    }
                    unset($resourceArray[$k]);
                }
            }
        } else {
            $action = \'removeIndex\';
        }

        unset($resourceArray[\'ta\'],$resourceArray[\'action\'],$resourceArray[\'tiny_toggle\'],$resourceArray[\'HTTP_MODAUTH\'],$resourceArray[\'modx-ab-stay\'],$resourceArray[\'resource_groups\']);
        $resourcesToIndex[] = $resourceArray;
        break;
    case \'OnDocPublished\':
        $action = \'index\';
        $resourceArray = $scriptProperties[\'resource\']->toArray();
        unset($resourceArray[\'ta\'],$resourceArray[\'action\'],$resourceArray[\'tiny_toggle\'],$resourceArray[\'HTTP_MODAUTH\'],$resourceArray[\'modx-ab-stay\'],$resourceArray[\'resource_groups\']);
        $resourcesToIndex[] = $resourceArray;
        break;
    case \'OnDocUnpublished\':
    case \'OnDocUnPublished\':
        $action = \'removeIndex\';
        $resourceArray = $scriptProperties[\'resource\']->toArray();
        unset($resourceArray[\'ta\'],$resourceArray[\'action\'],$resourceArray[\'tiny_toggle\'],$resourceArray[\'HTTP_MODAUTH\'],$resourceArray[\'modx-ab-stay\'],$resourceArray[\'resource_groups\']);
        $resourcesToIndex[] = $resourceArray;
        break;
    case \'OnResourceDuplicate\':
        $action = \'index\';
        /** @var modResource $newResource */
        $resourcesToIndex[] = $newResource->toArray();
        $children = array();
        SimpleSearchGetChildren($modx,$children,$newResource->get(\'id\'));
        foreach ($children as $child) {
            $resourcesToIndex[] = $child;
        }
        break;
    case \'OnResourceDelete\':
        $action = \'removeIndex\';
        $resourcesToIndex[] = $resource->toArray();
        $children = array();
        SimpleSearchGetChildren($modx,$children,$resource->get(\'id\'));
        foreach ($children as $child) {
            $resourcesToIndex[] = $child;
        }
        break;
    case \'OnResourceUndelete\':
        $action = \'index\';
        $resourcesToIndex[] = $resource->toArray();
        $children = array();
        SimpleSearchGetChildren($modx,$children,$resource->get(\'id\'));
        foreach ($children as $child) {
            $resourcesToIndex[] = $child;
        }
        break;
}

foreach ($resourcesToIndex as $resourceArray) {
    if (!empty($resourceArray[\'id\'])) {
        if ($action == \'index\') {
            $search->driver->index($resourceArray);
        } else if ($action == \'removeIndex\') {
            $search->driver->removeIndex($resourceArray[\'id\']);
        }
    }
}
return;',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    15 => 
    array (
      'id' => '15',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'StercSEO',
      'description' => 'Plugin to render SEO Tab and save all the data.',
      'editor_type' => '0',
      'category' => '12',
      'cache_type' => '0',
      'plugincode' => '/**
 * SEO Tab
 *
 * Copyright 2013 by Sterc internet & marketing <modx@sterc.nl>
 *
 * This file is part of SEO Tab.
 *
 * SEO Tab is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * SEO Tab is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * SEO Tab; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package stercseo
 */
/**
 * SEO Tab Plugin
 *
 *
 * Events:
 * OnDocFormPrerender,OnDocFormSave,OnHandleRequest,OnPageNotFound, OnResourceDuplicate, OnEmptyThrash, OnResourceBeforeSort
 *
 * @author Sterc internet & marketing <modx@sterc.nl>
 *
 * @package stercseo
 *
 */
$stercseo = $modx->getService(\'stercseo\', \'StercSEO\', $modx->getOption(\'stercseo.core_path\', null, $modx->getOption(\'core_path\').\'components/stercseo/\').\'model/stercseo/\', array());

if (!($stercseo instanceof StercSEO)) {
    return;
}

switch ($modx->event->name) {
    case \'OnDocFormPrerender\':
        if (!$stercseo->checkUserAccess()) {
            return;
        }

        $resource =& $modx->event->params[\'resource\'];
        if ($resource) {
            //First check if SEO Tab is allowed in this context
            if (!$stercseo->isAllowed($resource->get(\'context_key\'))) {
                return;
            }
            $properties = $resource->getProperties(\'stercseo\');
            $properties[\'searchable\'] = $resource->get(\'searchable\');
            $urls = $modx->getCollection(\'seoUrl\', array(\'resource\' => $resource->get(\'id\')));
        }

        if (empty($properties)) {
            $properties = array(
                \'index\' => $modx->getOption(\'stercseo.index\', null, \'1\'),
                \'follow\' => $modx->getOption(\'stercseo.follow\', null, \'1\'),
                \'sitemap\' => $modx->getOption(\'stercseo.sitemap\', null, \'1\'),
                \'priority\' => $modx->getOption(\'stercseo.priority\', null, \'0.5\'),
                \'changefreq\' => $modx->getOption(\'stercseo.changefreq\', null, \'weekly\'),
                \'searchable\' => $modx->getOption(\'search_default\', null, \'1\')
            );
        }
        $properties[\'urls\'] = \'\';
        // Fetch urls from seoUrl collection
        if ($urls && is_object($urls)) {
            foreach ($urls as $url) {
                $properties[\'urls\'][][\'url\'] = urldecode($url->get(\'url\'));
            }
        }

        $modx->regClientStartupHTMLBlock(\'<script type="text/javascript">
        Ext.onReady(function() {
            StercSEO.config = \'.$modx->toJSON($stercseo->config).\';
            StercSEO.config.connector_url = "\'.$stercseo->config[\'connectorUrl\'].\'";
            StercSEO.record = \'.$modx->toJSON($properties).\';
        });
        </script>\');
        $version = $modx->getVersionData();

        /* include CSS and JS*/
        if ($version[\'version\'] == 2 && $version[\'major_version\'] == 2) {
            $modx->regClientCSS($stercseo->config[\'cssUrl\'].\'stercseo.css\');
        }
        $modx->regClientStartupScript($stercseo->config[\'jsUrl\'].\'mgr/stercseo.js\');
        $modx->regClientStartupScript($stercseo->config[\'jsUrl\'].\'mgr/sections/resource.js\');
        $modx->regClientStartupScript($stercseo->config[\'jsUrl\'].\'mgr/widgets/resource.grid.js\');
        $modx->regClientStartupScript($stercseo->config[\'jsUrl\'].\'mgr/widgets/resource.vtabs.js\');

        //add lexicon
        $modx->controller->addLexiconTopic(\'stercseo:default\');

        break;

    case \'OnBeforeDocFormSave\':
        $oldResource = ($mode == \'upd\') ? $modx->getObject(\'modResource\', $resource->get(\'id\')) : $resource;
        if (!$stercseo->isAllowed($oldResource->get(\'context_key\'))) {
            return;
        }
        $properties = $oldResource->getProperties(\'stercseo\');

        if (isset($_POST[\'urls\'])) {
            $urls = $modx->fromJSON($_POST[\'urls\']);
            foreach ($urls as $url) {
                $check = $modx->getObject(\'seoUrl\', array( \'url\' => urlencode($url[\'url\']), \'resource\' => $oldResource->get(\'id\'), \'context_key\' => $oldResource->get(\'context_key\')));
                if (!$check) {
                    $redirect = $modx->newObject(\'seoUrl\');
                    $data = array(
                        \'url\' => urlencode($url[\'url\']),
                        \'resource\' => $oldResource->get(\'id\'),
                        \'context_key\' => $oldResource->get(\'context_key\'),
                    );
                    $redirect->fromArray($data);
                    $redirect->save();
                }
            }
        }

        if ($mode == \'upd\') {
            $newProperties = array(
                \'index\' => (isset($_POST[\'index\']) ? $_POST[\'index\'] : $properties[\'index\']),
                \'follow\' => (isset($_POST[\'follow\']) ? $_POST[\'follow\'] : $properties[\'follow\']),
                \'sitemap\' => (isset($_POST[\'sitemap\']) ? $_POST[\'sitemap\'] : $properties[\'sitemap\']),
                \'priority\' => (isset($_POST[\'priority\']) ? $_POST[\'priority\'] : $properties[\'priority\']),
                \'changefreq\' => (isset($_POST[\'changefreq\']) ? $_POST[\'changefreq\'] : $properties[\'changefreq\'])
            );
        } else {
            $newProperties = array(
                \'index\' => (isset($_POST[\'index\']) ? $_POST[\'index\'] : $modx->getOption(\'stercseo.index\', null, \'1\')),
                \'follow\' => (isset($_POST[\'follow\']) ? $_POST[\'follow\'] : $modx->getOption(\'stercseo.follow\', null, \'1\')),
                \'sitemap\' => (isset($_POST[\'sitemap\']) ? $_POST[\'sitemap\'] : $modx->getOption(\'stercseo.sitemap\', null, \'1\')),
                \'priority\' => (isset($_POST[\'priority\']) ? $_POST[\'priority\'] : $modx->getOption(\'stercseo.priority\', null, \'0.5\')),
                \'changefreq\' => (isset($_POST[\'changefreq\']) ? $_POST[\'changefreq\'] : $modx->getOption(\'stercseo.changefreq\', null, \'weekly\'))
            );
        }

        // If uri is changed or alias (with freeze uri off) has changed, add a new redirect
        if ((
                $oldResource->get(\'uri\') != $resource->get(\'uri\') ||
                (
                    $oldResource->get(\'uri_override\') == 0
                    && $oldResource->get(\'alias\') != $resource->get(\'alias\')
                )
            )
            && $oldResource->get(\'uri\') != \'\'
        ) {
            $site_url = $modx->getOption(\'site_url\');
            $ctx = $modx->getContext($resource->get(\'context_key\'));
            if ($ctx->getOption(\'site_url\')) {
                $site_url = $ctx->getOption(\'site_url\');
            }
            $url = urlencode($site_url.$oldResource->get(\'uri\'));
            if (!$modx->getCount(\'seoUrl\', array(\'url\' => $url))) {
                $data = array(
                    \'url\' => $url,
                    \'resource\' => $resource->get(\'id\'),
                    \'context_key\' => $resource->get(\'context_key\'),
                );
                $redirect = $modx->newObject(\'seoUrl\');
                $redirect->fromArray($data);
                $redirect->save();
            }

            // Recursive set all children resources as redirects
            if ($modx->getOption(\'use_alias_path\')) {
                $resourceOldBasePath = $oldResource->getAliasPath($oldResource->get(\'alias\'), $oldResource->toArray() + array(\'isfolder\' => 1));
                $resourceNewBasePath = $resource->getAliasPath($resource->get(\'alias\'), $resource->toArray() + array(\'isfolder\' => 1));
                $childResources = $modx->getIterator(\'modResource\', array(
                    \'uri:LIKE\' => $resourceOldBasePath . \'%\',
                    \'uri_override\' => \'0\',
                    \'published\' => \'1\',
                    \'deleted\' => \'0\',
                    \'context_key\' => $resource->get(\'context_key\')
                ));
                foreach ($childResources as $childResource) {
                    $url = urlencode($site_url.$childResource->get(\'uri\'));
                    if (!$modx->getCount(\'seoUrl\', array(\'url\' => $url))) {
                        $data = array(
                            \'url\' => $url,
                            \'resource\' => $childResource->get(\'id\'),
                            \'context_key\' => $resource->get(\'context_key\'),
                        );
                        $redirect = $modx->newObject(\'seoUrl\');
                        $redirect->fromArray($data);
                        $redirect->save();
                    }
                }
            }
        }
        $resource->setProperties($newProperties, \'stercseo\');
        break;

    case \'OnDocFormSave\':
        if (!$stercseo->isAllowed($resource->context_key)) {
            return;
        }

        $url       = urlencode($modx->makeUrl($resource->id, $resource->context_key, \'\', \'full\'));
        $urlExists = $modx->getObject(\'seoUrl\', array(
            \'url\'         => $url,
            \'context_key\' => $resource->context_key
        ));

        if ($urlExists) {
            $modx->removeObject(\'seoUrl\', array(
                \'url\'         => $url,
                \'context_key\' => $resource->context_key
            ));
        }
        break;

    case \'OnLoadWebDocument\':
        if ($modx->resource) {
            if (!$stercseo->isAllowed($modx->resource->get(\'context_key\'))) {
                return;
            }
            $properties = $modx->resource->getProperties(\'stercseo\');
            if (empty($properties)) {
                // Properties not available
                // This means an this resource has nog SEO Tab properties, which means it is a pre-SEO Tab resource
                // Fallback to system defaults
                $properties = array(
                    \'index\' => $modx->getOption(\'stercseo.index\', null, 1),
                    \'follow\' => $modx->getOption(\'stercseo.follow\', null, 1)
                );
            }
            $metaContent = array(
                (int)$properties[\'index\'] ? \'index\' : \'noindex\',
                (int)$properties[\'follow\'] ? \'follow\' : \'nofollow\'
            );

            $modx->setPlaceholder(\'seoTab.robotsTag\', implode(\',\', $metaContent));
        }
        break;

    case \'OnPageNotFound\':
        $options      = array();
        $url          = ($_SERVER[\'HTTPS\'] ? \'https\' : \'http\').\'://\'.$_SERVER[\'HTTP_HOST\'].$_SERVER[\'REQUEST_URI\'];
        $convertedUrl = urlencode($url);

        $w = array(
            \'url\' => $convertedUrl
        );

        if ($modx->getOption(\'stercseo.context-aware-alias\', null, \'0\')) {
            $w[\'context_key\'] = $modx->context->key;
        }

        $alreadyExists = $modx->getObject(\'seoUrl\', $w);

        if (isset($alreadyExists) && ($modx->context->key !== $alreadyExists->get(\'context_key\'))) {
            $q = $modx->newQuery(\'modContextSetting\');
            $q->where(array(
                \'context_key\' => $alreadyExists->get(\'context_key\'),
                \'key\'         => \'site_url\'
            ));
            $q->prepare();

            $siteUrl = $modx->getObject(\'modContextSetting\', $q);
            if ($siteUrl) {
                $options[\'site_url\'] = $siteUrl->get(\'value\');
            }
        }

        if ($alreadyExists) {
            $url = $modx->makeUrl($alreadyExists->get(\'resource\'), $alreadyExists->get(\'context_key\'), \'\', \'full\', $options);

            $modx->sendRedirect($url, 0, \'REDIRECT_HEADER\', \'HTTP/1.1 301 Moved Permanently\');
        }
        break;

    case \'OnResourceBeforeSort\':
        list($sourceCtx, $resource) = explode(\'_\', $modx->getOption(\'source\', $_POST));
        list($targetCtx, $target) = explode(\'_\', $modx->getOption(\'target\', $_POST));
        switch ($modx->getOption(\'point\', $_POST)) {
            case \'above\':
            case \'below\':
                $tmpRes = $modx->getObject(\'modResource\', $target);
                if ($tmpRes) {
                    $target = $tmpRes->get(\'parent\');
                    unset($tmpRes);
                }
                break;
        }
        $oldResource = $modx->getObject(\'modResource\', $resource);
        $resource = $modx->getObject(\'modResource\', $resource);
        if ($oldResource && $resource) {
            $resource->set(\'parent\', $target);
            $resource->set(\'uri\', \'\');
            $uriChanged = false;
            if ($oldResource->get(\'uri\') != $resource->get(\'uri\') && $oldResource->get(\'uri\') != \'\') {
                $uriChanged = true;
            }

            if ($oldResource->get(\'alias\') != $resource->get(\'alias\') && $oldResource->get(\'alias\') != \'\') {
                $newProperties[\'urls\'][] = array(\'url\' => $oldResource->get(\'uri\'));
                $uriChanged              = true;
            }

            // Recursive set redirects for drag/dropped resource, and its children (where uri_override is not set)
            if ($uriChanged && $modx->getOption(\'use_alias_path\')) {
                $oldResource->set(\'isfolder\', true);
                $resourceOldBasePath = $oldResource->getAliasPath(
                    $oldResource->get(\'alias\'),
                    $oldResource->toArray()
                );
                $resourceNewBasePath = $resource->getAliasPath(
                    $resource->get(\'alias\'),
                    $resource->toArray() + array(\'isfolder\' => 1)
                );
                $cond = $modx->newQuery(\'modResource\');
                $cond->where(array(
                    array(
                        \'uri:LIKE\' => $resourceOldBasePath . \'%\',
                        \'OR:id:=\' => $oldResource->id
                    ),
                    \'uri_override\' => \'0\',
                    \'published\' => \'1\',
                    \'deleted\' => \'0\',
                    \'context_key\' => $resource->get(\'context_key\')
                ));

                $ctx = $modx->getContext($resource->get(\'context_key\'));
                $site_url = $ctx->getOption(\'site_url\', \'\', $modx->getOption(\'site_url\'));

                $childResources = $modx->getIterator(\'modResource\', $cond);
                foreach ($childResources as $childResource) {
                    $url = urlencode($site_url . $childResource->get(\'uri\'));
                    if (!$modx->getCount(\'seoUrl\', array(\'url\' => $url))) {
                        $data = array(
                            \'url\' => $url,
                            \'resource\' => $childResource->get(\'id\'),
                            \'context_key\' => $targetCtx
                        );
                        $redirect = $modx->newObject(\'seoUrl\');
                        $redirect->fromArray($data);
                        $redirect->save();
                    }
                }
            } // endif $uriChanged
        } // endif $oldResource && $resource
        break;

    case \'OnResourceDuplicate\':
        if (!$stercseo->isAllowed($newResource->get(\'context_key\'))) {
            return;
        }
        $props = $newResource->getProperties(\'stercseo\');
        $newResource->setProperties($props, \'stercseo\');
        $newResource->save();
        break;

    case \'OnManagerPageBeforeRender\':
        if (!$stercseo->checkUserAccess()) {
            return;
        }
        // If migration status is false, show migrate alert message bar in manager
        if (!$stercseo->redirectMigrationStatus()) {
            $modx->regClientStartupHTMLBlock($stercseo->getChunk(\'migrate/alert\', array(\'message\' => $modx->lexicon(\'stercseo.migrate_alert\'))));
            $modx->regClientCSS($stercseo->config[\'cssUrl\'].\'migrate.css\');
        }
        break;

    case \'OnEmptyTrash\':
        if (count($ids) > 0) {
            foreach ($ids as $id) {
                $modx->removeCollection(\'seoUrl\', array(
                    \'resource\' => $id
                ));
            }
        }
}
return;',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    16 => 
    array (
      'id' => '16',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'TinyMCERTE',
      'description' => '',
      'editor_type' => '0',
      'category' => '13',
      'cache_type' => '0',
      'plugincode' => '/**
 * TinyMCE Rich Tech Editor
 *
 */
$corePath = $modx->getOption(\'tinymcerte.core_path\', null, $modx->getOption(\'core_path\', null, MODX_CORE_PATH) . \'components/tinymcerte/\');
/** @var TinyMCERTE $tinymcerte */
$tinymcerte = $modx->getService(
    \'tinymcerte\',
    \'TinyMCERTE\',
    $corePath . \'model/tinymcerte/\',
    array(
        \'core_path\' => $corePath
    )
);

$className = \'TinyMCERTE\' . $modx->event->name;
$modx->loadClass(\'TinyMCERTEPlugin\', $tinymcerte->getOption(\'modelPath\') . \'tinymcerte/events/\', true, true);
$modx->loadClass($className, $tinymcerte->getOption(\'modelPath\') . \'tinymcerte/events/\', true, true);
if (class_exists($className)) {
    /** @var TinyMCERTEPlugin $handler */
    $handler = new $className($modx, $scriptProperties);
    $handler->run();
}
return;',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    17 => 
    array (
      'id' => '17',
      'source' => '2',
      'property_preprocess' => '0',
      'name' => 'ChildTemplate',
      'description' => '',
      'editor_type' => '0',
      'category' => '16',
      'cache_type' => '0',
      'plugincode' => 'if (isset($_GET[\'a\']) && $_GET[\'a\'] === \'resource/create\') {
    $parentId = isset($_REQUEST[\'parent\']) ? (int) $_REQUEST[\'parent\'] : 0;

    if ($parent = $modx->getObject(\'modResource\', $parentId)) {
        $template = $parent->get(\'template\');

        if (($parentTemplate = $modx->getObject(\'modTemplate\', $template)) &&
            ($properties = $parentTemplate->getProperties()) &&
            isset($properties[\'childTemplate\']) &&
            is_numeric($properties[\'childTemplate\'])
        ) {
            $_GET[\'template\'] = $properties[\'childTemplate\'];
        }
    }
}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '1',
      'static_file' => 'elements/plugins/childtemplate.plugin.php',
    ),
  ),
  'policies' => 
  array (
    'modAccessContext' => 
    array (
      'mgr' => 
      array (
        0 => 
        array (
          'principal' => 1,
          'authority' => 0,
          'policy' => 
          array (
            'about' => true,
            'access_permissions' => true,
            'actions' => true,
            'change_password' => true,
            'change_profile' => true,
            'charsets' => true,
            'class_map' => true,
            'components' => true,
            'content_types' => true,
            'countries' => true,
            'create' => true,
            'credits' => true,
            'customize_forms' => true,
            'dashboards' => true,
            'database' => true,
            'database_truncate' => true,
            'delete_category' => true,
            'delete_chunk' => true,
            'delete_context' => true,
            'delete_document' => true,
            'delete_eventlog' => true,
            'delete_plugin' => true,
            'delete_propertyset' => true,
            'delete_role' => true,
            'delete_snippet' => true,
            'delete_template' => true,
            'delete_tv' => true,
            'delete_user' => true,
            'directory_chmod' => true,
            'directory_create' => true,
            'directory_list' => true,
            'directory_remove' => true,
            'directory_update' => true,
            'edit_category' => true,
            'edit_chunk' => true,
            'edit_context' => true,
            'edit_document' => true,
            'edit_locked' => true,
            'edit_plugin' => true,
            'edit_propertyset' => true,
            'edit_role' => true,
            'edit_snippet' => true,
            'edit_template' => true,
            'edit_tv' => true,
            'edit_user' => true,
            'element_tree' => true,
            'empty_cache' => true,
            'error_log_erase' => true,
            'error_log_view' => true,
            'events' => true,
            'export_static' => true,
            'file_create' => true,
            'file_list' => true,
            'file_manager' => true,
            'file_remove' => true,
            'file_tree' => true,
            'file_update' => true,
            'file_upload' => true,
            'file_unpack' => true,
            'file_view' => true,
            'flush_sessions' => true,
            'frames' => true,
            'help' => true,
            'home' => true,
            'import_static' => true,
            'languages' => true,
            'lexicons' => true,
            'list' => true,
            'load' => true,
            'logout' => true,
            'logs' => true,
            'menus' => true,
            'menu_reports' => true,
            'menu_security' => true,
            'menu_site' => true,
            'menu_support' => true,
            'menu_system' => true,
            'menu_tools' => true,
            'menu_user' => true,
            'messages' => true,
            'namespaces' => true,
            'new_category' => true,
            'new_chunk' => true,
            'new_context' => true,
            'new_document' => true,
            'new_document_in_root' => true,
            'new_plugin' => true,
            'new_propertyset' => true,
            'new_role' => true,
            'new_snippet' => true,
            'new_static_resource' => true,
            'new_symlink' => true,
            'new_template' => true,
            'new_tv' => true,
            'new_user' => true,
            'new_weblink' => true,
            'packages' => true,
            'policy_delete' => true,
            'policy_edit' => true,
            'policy_new' => true,
            'policy_save' => true,
            'policy_template_delete' => true,
            'policy_template_edit' => true,
            'policy_template_new' => true,
            'policy_template_save' => true,
            'policy_template_view' => true,
            'policy_view' => true,
            'property_sets' => true,
            'providers' => true,
            'publish_document' => true,
            'purge_deleted' => true,
            'remove' => true,
            'remove_locks' => true,
            'resource_duplicate' => true,
            'resourcegroup_delete' => true,
            'resourcegroup_edit' => true,
            'resourcegroup_new' => true,
            'resourcegroup_resource_edit' => true,
            'resourcegroup_resource_list' => true,
            'resourcegroup_save' => true,
            'resourcegroup_view' => true,
            'resource_quick_create' => true,
            'resource_quick_update' => true,
            'resource_tree' => true,
            'save' => true,
            'save_category' => true,
            'save_chunk' => true,
            'save_context' => true,
            'save_document' => true,
            'save_plugin' => true,
            'save_propertyset' => true,
            'save_role' => true,
            'save_snippet' => true,
            'save_template' => true,
            'save_tv' => true,
            'save_user' => true,
            'search' => true,
            'settings' => true,
            'sources' => true,
            'source_delete' => true,
            'source_edit' => true,
            'source_save' => true,
            'source_view' => true,
            'steal_locks' => true,
            'tree_show_element_ids' => true,
            'tree_show_resource_ids' => true,
            'undelete_document' => true,
            'unlock_element_properties' => true,
            'unpublish_document' => true,
            'usergroup_delete' => true,
            'usergroup_edit' => true,
            'usergroup_new' => true,
            'usergroup_save' => true,
            'usergroup_user_edit' => true,
            'usergroup_user_list' => true,
            'usergroup_view' => true,
            'view' => true,
            'view_category' => true,
            'view_chunk' => true,
            'view_context' => true,
            'view_document' => true,
            'view_element' => true,
            'view_eventlog' => true,
            'view_offline' => true,
            'view_plugin' => true,
            'view_propertyset' => true,
            'view_role' => true,
            'view_snippet' => true,
            'view_sysinfo' => true,
            'view_template' => true,
            'view_tv' => true,
            'view_unpublished' => true,
            'view_user' => true,
            'workspaces' => true,
          ),
        ),
      ),
    ),
  ),
);