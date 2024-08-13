{extends 'templates/default/form/entry/entry.tpl'}

{$id 						= $prev_data.id|default:false}

{$ctrl_route				= $ctrl_route|default:''|route_by_url}

{$form_entry_route 			= $ctrl_route|concat:('.update'|iif:$id:'.store')|iif:$ctrl_route}}
{$form_entry_action 		= $form_entry_route|route}
{$can_entry					= $form_entry_route|is_user_route}

{$form_delete_route 		= $ctrl_route|concat:'.delete'}
{$form_delete_action 		= $form_delete_route|route}
{$can_delete				= $form_delete_route|is_user_route}

{$can_activate 				= 'activate-news'|is_user_permission}

{$card_title 				= ('Update'|iif:$can_entry:'View')|iif:$id:'New'|concat:' news'}

{$button_text 				= 'Update'|iif:$id:'Save'}
{$button_swal_positive_text = 'swal-positive-text="Yes, '|concat:('update'|iif:$id:'save')|concat:' it!"'}
{$button_swal_title 		= 'swal-title="Update news?"'|iif:$id}
{$button_swal_text 			= ''|iif:$id:'swal-text="Save news?"'}

{$delete_button_swal_title 	= 'swal-title="Delete news?"'}

{$form_entry_attr			= {attr list=[enctype => "multipart/form-data"]}}

{block name='form_fields'}
<div class="form-group">
	<label>Title <span class="required">*</span></label>
	<input class="form-control" type="text" {'name="title" required'|iif:$can_entry:'readonly'} placeholder="Title" value="{$prev_data.title|default:''}">
</div>

<div class="form-group">
	<label>Short Text <span class="required">*</span></label>
	<textarea class="form-control" {'name="short_text" required'|iif:$can_entry:'readonly'} placeholder="Short Text" rows=5 cols=5>{$prev_data.short_text|default:''|nltobr}</textarea>
</div>

<div class="form-group">
	<label for="content">Content <span class="required">*</span></label>
	<textarea id="content-ckeditor" class="form-control" {'id="content" name="content" required'|iif:$can_entry:'readonly'} placeholder="Content" rows=5 cols=5>{$prev_data.content|default:''}</textarea>
</div>

{if $can_entry}
<div class="form-group">
	<label for="image">Banner <span class="required">*</span></label>
	<input class="file-input" type="file" name="image" id="image" data-show-upload="false" initial-preview="{$prev_data.image|default:''}" data-fouc accept=".jpg,.png">
</div>
{/if}

{$smarty.capture.form_activate_item}
{/block}

{assign var='__assets' value=['ckeditor', 'fileinput', 'ajax_form_submit']}

{block name='custom_styles'}
<style>
	.kv-file-remove, .file-drag-handle.drag-handle-init { display: none; }	
</style>

{/block}

{block name='custom_scripts'}
<script>
	$(() => {
		$('.form-submit').formSubmit({
			b4_submit: function () {
				$('#content-ckeditor').val(CKEDITOR.instances['content-ckeditor'].getData());
			}
		});

		$('[name="image"]').initBsFileInput();

		CKEDITOR.replace('content-ckeditor', {
            height: 400
        });
	});
</script>
{/block}