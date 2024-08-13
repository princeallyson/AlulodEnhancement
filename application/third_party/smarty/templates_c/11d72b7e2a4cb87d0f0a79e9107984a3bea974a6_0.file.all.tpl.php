<?php
/* Smarty version 3.1.39, created on 2023-05-31 17:15:33
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/apps/admin/reports_h/all.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_64771035efe9f5_16652350',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11d72b7e2a4cb87d0f0a79e9107984a3bea974a6' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/apps/admin/reports_h/all.tpl',
      1 => 1685524532,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64771035efe9f5_16652350 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route_by_url.php','function'=>'smarty_modifier_route_by_url',),1=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.concat.php','function'=>'smarty_modifier_concat',),2=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route.php','function'=>'smarty_modifier_route',),3=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.is_user_route.php','function'=>'smarty_modifier_is_user_route',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php $_smarty_tpl->_assignInScope('ctrl_route', smarty_modifier_route_by_url((($tmp = @$_smarty_tpl->tpl_vars['ctrl_route']->value)===null||$tmp==='' ? '' : $tmp)));
$_smarty_tpl->_assignInScope('new_item_route', smarty_modifier_concat($_smarty_tpl->tpl_vars['ctrl_route']->value,'.new'));
$_smarty_tpl->_assignInScope('new_item_action', smarty_modifier_route($_smarty_tpl->tpl_vars['new_item_route']->value));
$_smarty_tpl->_assignInScope('can_add', smarty_modifier_is_user_route($_smarty_tpl->tpl_vars['new_item_route']->value));
$_smarty_tpl->_assignInScope('card_title', 'Reports');
$_smarty_tpl->_assignInScope('button_add_text', 'Add Report');
$_smarty_tpl->_assignInScope('dt_save_state', 'true');?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_27854762164771035ef96e2_20969023', 'content_bottom');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_93876777664771035efc071_60276577', 'scripts');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_86964728864771035efd003_76880442', 'custom_scripts_bottom');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/table/table.tpl');
}
/* {block 'content_bottom'} */
class Block_27854762164771035ef96e2_20969023 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content_bottom' => 
  array (
    0 => 'Block_27854762164771035ef96e2_20969023',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route.php','function'=>'smarty_modifier_route',),1=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/function.csrf.php','function'=>'smarty_function_csrf',),));
?>

<div id="modal-upload" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Upload CSV File</h5>
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
			</div>

			<div class="modal-body">
				<form action="<?php echo smarty_modifier_route('admin--reports.upload');?>
" method="post" enctype="multipart/form-data">
					<?php echo smarty_function_csrf(array(),$_smarty_tpl);?>

					<input type="hidden" name="id">
					<input class="file-input" type="file" name="file_dp" data-fouc accept=".csv">
				</form>
			</div>
		</div>
	</div>
</div>
<?php
}
}
/* {/block 'content_bottom'} */
/* {block 'scripts'} */
class Block_93876777664771035efc071_60276577 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'scripts' => 
  array (
    0 => 'Block_93876777664771035efc071_60276577',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'base_url' ][ 0 ], array( 'public/js/plugins/uploaders/fileinput/fileinput.min.js' ));?>
"><?php echo '</script'; ?>
> 
<?php
}
}
/* {/block 'scripts'} */
/* {block 'custom_scripts_bottom'} */
class Block_86964728864771035efd003_76880442 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts_bottom' => 
  array (
    0 => 'Block_86964728864771035efd003_76880442',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 type="text/javascript">
	
	var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
	'  <div class="modal-content">\n' +
	'    <div class="modal-header align-items-center">\n' +
	'      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
	'      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
	'    </div>\n' +
	'    <div class="modal-body">\n' +
	'      <div class="floating-buttons btn-group"></div>\n' +
	'      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
	'    </div>\n' +
	'  </div>\n' +
	'</div>\n';

	var previewZoomButtonClasses = {
		toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
		fullscreen: 'btn btn-light btn-icon btn-sm',
		borderless: 'btn btn-light btn-icon btn-sm',
		close: 'btn btn-light btn-icon btn-sm'
	};

	var previewZoomButtonIcons = {
		prev: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-right32"></i>' : '<i class="icon-arrow-left32"></i>',
		next: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-left32"></i>' : '<i class="icon-arrow-right32"></i>',
		toggleheader: '<i class="icon-menu-open"></i>',
		fullscreen: '<i class="icon-screen-full"></i>',
		borderless: '<i class="icon-alignment-unalign"></i>',
		close: '<i class="icon-cross2 font-size-base"></i>'
	};

	var fileActionSettings = {
		zoomClass: '',
		zoomIcon: '<i class="icon-zoomin3"></i>',
		dragClass: 'p-2',
		dragIcon: '<i class="icon-three-bars"></i>',
		removeClass: '',
		removeErrorClass: 'text-danger',
		removeIcon: '<i class="icon-bin"></i>',
		indicatorNew: '<i class="icon-file-plus text-success"></i>',
		indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
		indicatorError: '<i class="icon-cross2 text-danger"></i>',
		indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
	};
	

	$(() => 
	{
		$('.file-input').fileinput({
			browseLabel: 'Browse',
			browseIcon: '<i class="icon-file-plus mr-2"></i>',
			uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
			removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
			layoutTemplates: {
				icon: '<i class="icon-file-check"></i>',
				modal: modalTemplate
			},
			initialCaption: "No file selected",
			previewZoomButtonClasses: previewZoomButtonClasses,
			previewZoomButtonIcons: previewZoomButtonIcons,
			fileActionSettings: fileActionSettings
		});

		$(document).on('click', '.btn-upload', function ()
		{
			var _this = $(this);
			$('#modal-upload .modal-body form input[name="id"]').val(_this.attr('data-id'));
			$('#modal-upload').modal('show');
		});
	});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'custom_scripts_bottom'} */
}
