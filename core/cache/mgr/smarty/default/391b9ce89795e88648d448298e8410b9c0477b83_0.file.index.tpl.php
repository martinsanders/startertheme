<?php
/* Smarty version 3.1.31, created on 2018-09-02 09:36:53
  from "/Applications/MAMP/htdocs/startertheme/core/components/modxminify/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b8ba1250e5b82_25459882',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '391b9ce89795e88648d448298e8410b9c0477b83' => 
    array (
      0 => '/Applications/MAMP/htdocs/startertheme/core/components/modxminify/templates/index.tpl',
      1 => 1535821793,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b8ba1250e5b82_25459882 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="modxminify-container">
	<h2><?php echo $_smarty_tpl->tpl_vars['_lang']->value['modxminify'];?>
</h2>
	<div class="modxminify-content">
		<p><?php echo $_smarty_tpl->tpl_vars['_lang']->value['modxminify.menu.modxminify_desc'];?>
</p>
		<div class="buttons">
			<button data-add-group><?php echo $_smarty_tpl->tpl_vars['_lang']->value['modxminify.global.add'];?>
 <?php echo $_smarty_tpl->tpl_vars['_lang']->value['modxminify.group'];?>
</button>
			<button data-add-file><?php echo $_smarty_tpl->tpl_vars['_lang']->value['modxminify.global.add'];?>
 <?php echo $_smarty_tpl->tpl_vars['_lang']->value['modxminify.file'];?>
</button>
		</div>
		<div class="groups-files"></div>
	</div>

	<div id="modxminify-modal" class="modal">
		<div class="modal-content">
			<i class="icon icon-times close" aria-hidden="true"></i>
			<p></p>
		</div>
	</div>
</div><?php }
}
