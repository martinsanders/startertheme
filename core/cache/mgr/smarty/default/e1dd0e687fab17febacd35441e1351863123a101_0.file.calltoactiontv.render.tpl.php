<?php
/* Smarty version 3.1.31, created on 2018-09-03 22:36:57
  from "/Applications/MAMP/htdocs/startertheme/core/components/calltoactiontv/elements/tv/input/tpl/calltoactiontv.render.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b8da979e38246_13815492',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1dd0e687fab17febacd35441e1351863123a101' => 
    array (
      0 => '/Applications/MAMP/htdocs/startertheme/core/components/calltoactiontv/elements/tv/input/tpl/calltoactiontv.render.tpl',
      1 => 1535821755,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b8da979e38246_13815492 (Smarty_Internal_Template $_smarty_tpl) {
?>
<input id="tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
" type="hidden" class="textfield" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tv']->value->value, ENT_QUOTES, 'UTF-8', true);?>
" name="tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
">
<div id="modx-calltoactiontv-tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
"></div>

<?php echo '<script'; ?>
 type="text/javascript">
    // <![CDATA[
    Ext.onReady(function () {
        MODx.load({
            xtype: 'calltoactiontv-combo-calltoactiontv',
            tvId: '<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
',
            type: '<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
',
            typeOptions: <?php echo $_smarty_tpl->tpl_vars['typeOptions']->value;?>
,
            style: '<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
',
            styleOptions: <?php echo $_smarty_tpl->tpl_vars['styleOptions']->value;?>
,
            text: '<?php echo $_smarty_tpl->tpl_vars['text']->value;?>
',
            value: '<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
',
            resource: '<?php echo $_smarty_tpl->tpl_vars['resource']->value;?>
',
            resourceOptions: <?php echo $_smarty_tpl->tpl_vars['resourceOptions']->value;?>
,
            renderTo: 'modx-calltoactiontv-tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
'
        });
    });
    // ]]>
<?php echo '</script'; ?>
><?php }
}
