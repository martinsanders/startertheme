<?php
/* Smarty version 3.1.31, created on 2018-09-03 22:37:54
  from "/Applications/MAMP/htdocs/startertheme/core/components/calltoactiontv/elements/tv/input/tpl/calltoactiontv.options.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b8da9b216b7e5_57179540',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '314a7bac4820320e27f145018223759acfc87aac' => 
    array (
      0 => '/Applications/MAMP/htdocs/startertheme/core/components/calltoactiontv/elements/tv/input/tpl/calltoactiontv.options.tpl',
      1 => 1535821755,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b8da9b216b7e5_57179540 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="tv-input-properties-form<?php echo $_smarty_tpl->tpl_vars['tv']->value;?>
"></div>

<?php echo '<script'; ?>
 type="text/javascript">
    // <![CDATA[
    var params = {
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['params']->value, 'v', false, 'k', 'p', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_p']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_p']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_p']->value['iteration'] == $_smarty_tpl->tpl_vars['__smarty_foreach_p']->value['total'];
?>
        '<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
': '<?php echo strtr($_smarty_tpl->tpl_vars['v']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
'<?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_p']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_p']->value['last'] : null)) {?>, <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    };

    var oc = {
        'change': {
            fn: function () {
                Ext.getCmp('modx-panel-tv').markDirty();
            }, scope: this
        },
        'beforerender': {
            fn: function () {
                if (Ext.getCmp('modx-tv-elements').getValue() === '') {
                    // Set the default value.
                    Ext.getCmp('modx-tv-elements').setValue('@SELECT CONCAT(`pagetitle`, \' (\', `id`, \')\') AS `name`,`id` FROM `[[+PREFIX]]site_content` WHERE `published` = 1 AND `deleted` = 0 AND `context_key` = \'[[+context_key]]\'');
                }
            }, scope: this
        }
    };

    MODx.load({
        xtype: 'panel',
        layout: 'form',
        autoHeight: true,
        cls: 'form-with-labels',
        border: false,
        labelAlign: 'top',
        items: [{
            xtype: 'textfield',
            fieldLabel: _('calltoactiontv.inopt_types'),
            description: MODx.expandHelp ? '' : _('calltoactiontv.inopt_types_desc'),
            name: 'inopt_types',
            id: 'inopt_types<?php echo $_smarty_tpl->tpl_vars['tv']->value;?>
',
            value: params['types'] || 'resource||external||tel||mailto',
            allowBlank: false,
            anchor: '100%',
            listeners: oc
        }, {
            xtype: MODx.expandHelp ? 'label' : 'hidden',
            forId: 'inopt_types<?php echo $_smarty_tpl->tpl_vars['tv']->value;?>
',
            html: _('calltoactiontv.inopt_types_desc'),
            cls: 'desc-under'
        }, {
            xtype: 'textfield',
            fieldLabel: _('calltoactiontv.inopt_styles'),
            description: MODx.expandHelp ? '' : _('calltoactiontv.inopt_styles_desc'),
            name: 'inopt_styles',
            id: 'inopt_styles<?php echo $_smarty_tpl->tpl_vars['tv']->value;?>
',
            value: params['styles'] || '',
            anchor: '100%',
            listeners: oc
        }, {
            xtype: MODx.expandHelp ? 'label' : 'hidden',
            forId: 'inopt_styles<?php echo $_smarty_tpl->tpl_vars['tv']->value;?>
',
            html: _('calltoactiontv.inopt_styles_desc'),
            cls: 'desc-under'
        }],
        renderTo: 'tv-input-properties-form<?php echo $_smarty_tpl->tpl_vars['tv']->value;?>
'
    });
    // ]]>
<?php echo '</script'; ?>
>

<?php }
}
