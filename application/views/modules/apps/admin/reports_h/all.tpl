{extends 'templates/default/table/table.tpl'}

{$ctrl_route = $ctrl_route|default:''|route_by_url}
{$new_item_route = $ctrl_route|concat:'.new'}
{$new_item_action = $new_item_route|route}
{$can_add = $new_item_route|is_user_route}
{$card_title = 'Reports'}
{$button_add_text = 'Add Report'}
{$dt_save_state = 'true'}

{block name='content_bottom'}
<div id="modal-upload" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Upload CSV File</h5>
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
			</div>

			<div class="modal-body">
				<form action="{'admin--reports.upload'|route}" method="post" enctype="multipart/form-data">
					{csrf}
					<input type="hidden" name="id">
					<input class="file-input" type="file" name="file_dp" data-fouc accept=".csv">
				</form>
			</div>
		</div>
	</div>
</div>
{/block}

{block name='scripts'}
<script src="{'public/js/plugins/uploaders/fileinput/fileinput.min.js'|base_url}"></script> 
{/block}

{block name='custom_scripts_bottom'}
<script type="text/javascript">
	{literal}
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
	{/literal}

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
</script>
{/block}