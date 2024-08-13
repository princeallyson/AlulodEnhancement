var disable_all_click_event = function () {
	document.addEventListener("click", handler, true);

	function handler(e) {
		e.stopPropagation();
		e.preventDefault();
		return false;
	}
}

var progress_wait = function () {
	PNotify.removeAll();

	new PNotify({
        text: "Please wait",
        addclass: 'stack-top-left bg-primary border-primary text-white',
        type: 'info',
        icon: 'icon-spinner4 spinner',
        hide: false,
        buttons: {
            closer: false,
            sticker: false
        },
        opacity: .9,
        width: "170px"
    });
}

var base_url = function ($uri='') {
	return $('meta[name="site_url"]').attr('content') + $uri;
}

$.fn.msgbox2 = function ($params={}) {
	$(this).each(function () {
		var el = $(this);

		el.on('click', function (e)
		{
			e.preventDefault();
			var el = $(this);

			if ($params.b4_swal) {
				if (!$params.b4_swal()) {
					return;
				}
			}

			if (typeof swal == 'undefined') {
				console.warn('Warning - sweet_alert.min.js is not loaded.');
				return;
			}

			var swalInit = swal.mixin({
				buttonsStyling: false,
				customClass: {
					confirmButton: 'btn btn-primary',
					cancelButton: 'btn btn-light',
					denyButton: 'btn btn-light',
					input: 'form-control'
				}
			});

			swalInit.fire({
				title: $params.title || el.attr('swal-title') || 'Are you sure?',
				html: $params.text || el.attr('swal-text') || "You won't be able to revert this!",
				icon: $params.icon || el.attr('swal-icon') || 'warning',
				showCancelButton: true,
				confirmButtonText: $params.positive_text || el.attr('swal-positive-text') || 'Yes',
				cancelButtonText: $params.negative_text || 'Cancel!',
				buttonsStyling: false,
				customClass: {
					confirmButton: 'btn btn-success',
					cancelButton: 'btn btn-danger'
				}
			})
			.then(function($result) 
			{
				if (!$result.value) { return; }
				if ($params.on_confirm) $params.on_confirm(el, $params);
			});
		});
	});
};

$.fn.formSubmit = function ($params={}) 
{
	// console.log($(this));

	$(this).each(function () 
	{
		var el = $(this);
		
		var form = $params.form || $(el.attr('target')) || el.closest('form');

		if (!form.length) 
		{
			console.warn(el.attr('target'));
			console.warn('Form not found.');
			return;
		}

		if (form.attr('id') && ['form-entry'].includes(form.attr('id'))) 
		{
			// console.log('formSubmit: ' + (Math.random() + 1).toString(36).substring(7));
			// console.log(form.attr('id'));

			form.ajax_form_submit();
		}

		var opt = 
		{
			b4_swal: function () 
			{
				if (!form.length) 
				{ 
					console.warn('Form not found.'); return false; 
				}
				if (!form[0].reportValidity()) 
				{
					return false;
				}
				return true;
			},
			on_confirm: function () 
			{
				if (el.attr('target') != '#form-entry') 
				{
					form.closest('.card').find('button').attr('disabled', true);
					//progress_wait();
				}

				if (el.hasAttr('data-loading'))
				{
					waitingDialog.show('Please wait...');
				}
				
				if ($params.b4_submit) 
				{
					$params.b4_submit();
				}

				form.submit();
			}
		};

		el.msgbox2(opt);
	});
}

$.fn.initBsDatePicker = function (params) {
	var options = {
		format: 'M. dd, yyyy',
		autoclose: true,
		todayHighlight: true,
		todayBtn: true,
		clearBtn: true
	};

	$.extend(options, params);

	$(this).each(function () {
		$(this).datepicker(options);
	});
}

$.fn.initBsFileInput = function ($params={}) {
	$(this).each(function () {
		var el = $(this);

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

		var initial_preview = el.attr('initial-preview') ? el.attr('initial-preview').split(',') : []; //console.log(initial_preview);

		el.fileinput({
			browseLabel: 'Browse',
			browseIcon: '<i class="icon-file-plus mr-2"></i>',
			uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
			removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
			layoutTemplates: {
				icon: '<i class="icon-file-check"></i>',
				modal: modalTemplate
			},
			initialPreview: initial_preview,
			initialPreviewAsData: initial_preview.length ? true : false,
			initialPreviewFileType: el.attr('initial-preview-filetype') || 'image',
			initialCaption: "No file selected",
			previewZoomButtonClasses: previewZoomButtonClasses,
			previewZoomButtonIcons: previewZoomButtonIcons,
			fileActionSettings: fileActionSettings,
			allowedFileTypes: el.attr('file-types') ? el.attr('file-types').split(',') : ['image'],
			allowedFileExtensions: el.attr('file-extensions') ? el.attr('file-extensions').split(',') : ['jpg', 'png'],
			initialPreviewConfig: $params.initialPreviewConfig || []
		});
	});
}

$.fn.initDataTable = function ($params={}) {
	$(this).each(function () {
		var options = {
			data: $params.data || [],
			columns: $params.columns || [],
			createdRow: function( row, data, dataIndex ) {
				if (data.id) {
					$(row).find('td:eq(0)').parent().attr('data-id', data.id);	
				}
			},
			columnDefs: $params.columnDefs,
			stateSave: $params.stateSave || false,
			order: [],
			lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"autoWidth": false
		};

		if ($params.extend || true) {
			$.extend( options, {
				autoWidth: false,
				dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
				language: {
					search: '<span>Filter:</span> _INPUT_',
					searchPlaceholder: 'Type to filter...',
					lengthMenu: '<span>Show:</span> _MENU_',
					paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
				}
			});		
		}

		$.extend( $.fn.dataTableExt.oStdClasses, {
            sLengthSelect: "custom-select"
        });

		$(this).DataTable(options);
	});
}

$(document).on('click', '[data-redirect]', function ($e) 
{
	$e.preventDefault(); 
	
	if ($(this).attr('data-redirect')) 
	{ 
		if ($(this).attr('data-redirect-target') == '_blank')
		{
			window.open($(this).attr('data-redirect'), '_blank');			
		}
		else
		{
			waitingDialog.show('Please wait...');

			window.location = $(this).attr('data-redirect'); 
		}
	}
});

var _state = sessionStorage.getItem("sd-state");
if (_state == null)
	_state = 1;

if (_state == 1)
	$('.app-sidebar').removeClass('sidebar-collapsed');
else
	$('.app-sidebar').addClass('sidebar-collapsed');

$(document).on('click', '.sidebar-main-toggle', function () {
	sessionStorage.setItem("sd-state", !$('.app-sidebar').hasClass('sidebar-collapsed') | 0);
});

// $('form').on('keyup', ':input', function($e) {
// 	if ($e.keyCode == '13')
// 		$(this).closest('form').find('button.save-item').click();
// });

function formSubmit($reference) { $($reference).submit(); }

function clickButton($reference) { $($reference).click(); }

function bsTabName(selector) {
    var form = selector.closest('form');

    if (form.find('input[name="bs_tab_name"]').length == 0) {
        form.prepend('<input type="hidden" name="bs_tab_name">');
    }
    
    form.find('input[name="bs_tab_name"]').val(selector.attr('href')||'');
}

$(() =>{ $(document).on('select2:open', () => { setTimeout(() => { $('input.select2-search__field')[0].focus(); }, 300); }); });

$(() => {
    $(document).on('click', 'a[data-loading]', function ($e)
    {
        var a = $(this);

        if (a.attr('href') && a.attr('href') != '#')
        {
            $e.preventDefault();

            //progress_wait();
            waitingDialog.show('Please wait...');

            window.location = a.attr('href');    
        }
    });
});

$.fn.initGlightBox = function($selector)
{
	const lightbox = GLightbox({
		selector: $selector,
		loop: true,
		svg: {
			next: document.dir == "rtl" ? '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" xml:space="preserve"><g><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"/></g></svg>' : '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" xml:space="preserve"> <g><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"/></g></svg>',
			prev: document.dir == "rtl" ? '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" xml:space="preserve"><g><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"/></g></svg>' : '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" xml:space="preserve"><g><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"/></g></svg>'
		}
	});
}