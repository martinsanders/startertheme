<?php  return array (
  5 => 
  array (
    'basePath' => 'uploads/',
    'basePathRelative' => true,
    'baseUrl' => 'uploads/',
    'baseUrlRelative' => true,
    'allowedFileTypes' => '',
    'imageExtensions' => 'jpg,jpeg,png,gif,svg',
    'thumbnailType' => 'png',
    'thumbnailQuality' => 90,
    'skipFiles' => '.svn,.git,_notes,nbproject,.idea,.DS_Store',
    'id' => NULL,
    'name' => 'Uploads',
    'description' => NULL,
    'class_key' => 'modFileMediaSource',
    'properties' => 
    array (
      'basePath' => 
      array (
        'name' => 'basePath',
        'desc' => 'prop_file.basePath_desc',
        'type' => 'textfield',
        'options' => 
        array (
        ),
        'value' => 'uploads/',
        'lexicon' => 'core:source',
      ),
      'baseUrl' => 
      array (
        'name' => 'baseUrl',
        'desc' => 'prop_file.baseUrl_desc',
        'type' => 'textfield',
        'options' => 
        array (
        ),
        'value' => 'uploads/',
        'lexicon' => 'core:source',
      ),
    ),
    'is_stream' => true,
    'source' => 3,
    'object_class' => 'modTemplateVar',
    'object' => 5,
    'context_key' => 'web',
    'source_class_key' => 'sources.modFileMediaSource',
  ),
);