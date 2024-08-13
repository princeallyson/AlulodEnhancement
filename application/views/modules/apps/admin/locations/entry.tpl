{extends 'templates/default/form/entry/entry.tpl'}

{$id 						= $prev_data.id|default:false}

{$ctrl_route				= $ctrl_route|default:''|route_by_url}

{$form_entry_route 			= $ctrl_route|concat:('.update'|iif:$id:'.store')|iif:$ctrl_route}}
{$form_entry_action 		= $form_entry_route|route}
{$can_entry					= $form_entry_route|is_user_route}

{$form_delete_route 		= $ctrl_route|concat:'.delete'}
{$form_delete_action 		= $form_delete_route|route}
{$can_delete				= $form_delete_route|is_user_route}

{$can_activate 				= 'activate-location'|is_user_permission}

{$card_title 				= ('Update'|iif:$can_entry:'View')|iif:$id:'New'|concat:' Location'}

{$button_text 				= 'Update'|iif:$id:'Save'}
{$button_swal_positive_text = 'swal-positive-text="Yes, '|concat:('update'|iif:$id:'save')|concat:' it!"'}
{$button_swal_title 		= 'swal-title="Update Location?"'|iif:$id}
{$button_swal_text 			= ''|iif:$id:'swal-text="Save Location?"'}

{$delete_button_swal_title 	= 'swal-title="Delete Location?"'}

{block name='form_fields'}
{form_select enabled=true field='purok' options=$puroks|default:[] value=$prev_data.purok|default:false}

{form_input enabled=true field='location|Name of Location' value=$prev_data.location|default:''}

{form_select enabled=true field='location_category_id|Category' options=$location_categories|default:[] value=$prev_data.location_category_id|default:false}

{form_textarea enabled=true field='description' value=$prev_data.description|default:'' required=false}

{* <input type="hidden" name="road" value="{$prev_data.road|default:''|htmlentities}"> *}

<input type="hidden" name="latitude" value="{$prev_data.latitude|default:''}">

<input type="hidden" name="longitude" value="{$prev_data.longitude|default:''}">

{$smarty.capture.form_activate_item}
{/block}

{block name='after_form_fields'}
<div class="row">
	<div class="col">
		<div class="card vh-100">
			<div id="map">
			</div>
		</div>
	</div>
</div>
{/block}

{assign var='__assets' value=['ajax_form_submit', 'select2']}

{block name='custom_styles'}
<style>
	#map {
		width: 100%;
		height: 100%;
	}
	.marker-position {
		top: 0;
		left: -20px;
		position: absolute;
		font-weight: bold;
	}
</style>
{/block}

{block name='custom_scripts'}
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZjAIGvHA8JLWYY8_-3ZmaUZT3Ke3eHzk&libraries=geometry"></script>
<script src="https://cdn.jsdelivr.net/npm/js-base64@2.5.2/base64.min.js"></script>
<script>
	let map;
	let marker;
	let polygon;

	var map_data = {
		"Alulod": {
			"center": { "lat": 14.206158, "lng": 120.8911881 },
			"bounds": [
				{ "lat": 14.1882122, "lng": 120.8756088 },
				{ "lat": 14.2213699, "lng": 120.9012292 }
			],
			"polygon": [
				{ "lat": 14.1993208, "lng": 120.8859836 },
				{ "lat": 14.1989048, "lng": 120.8892451 },
				{ "lat": 14.1953268, "lng": 120.8902751 },
				{ "lat": 14.1924144, "lng": 120.8930646 },
				{ "lat": 14.1902925, "lng": 120.8941589 },
				{ "lat": 14.1907086, "lng": 120.8998881 },
				{ "lat": 14.201505, "lng": 120.8990084 },
				{ "lat": 14.2188947, "lng": 120.896648 },
				{ "lat": 14.2198723, "lng": 120.8931075 },
				{ "lat": 14.2179379, "lng": 120.8872281 },
				{ "lat": 14.2156915, "lng": 120.8783661 },
				{ "lat": 14.206331, "lng": 120.8833443 }
			]
		},
		"Purok 1": {
			"center": { "lat": 14.2038338, "lng": 120.89589 },
			"bounds": [
				{ "lat": 14.189605, "lng": 120.8852041 },
		 		{ "lat": 14.2185609, "lng": 120.9030998 }
			],
			"polygon": [
				{ "lat": 14.2136234, "lng": 120.8945543 },
				{ "lat": 14.2090056, "lng": 120.8947045 },
				{ "lat": 14.2073831, "lng": 120.8949834 },
				{ "lat": 14.2050949, "lng": 120.894962 },
				{ "lat": 14.2048245, "lng": 120.893696 },
				{ "lat": 14.2003937, "lng": 120.8920813 },
				{ "lat": 14.2003053, "lng": 120.8908743 },
				{ "lat": 14.2002065, "lng": 120.8901769 },
				{ "lat": 14.1965453, "lng": 120.89059 },
				{ "lat": 14.1974554, "lng": 120.89486 },
				{ "lat": 14.1961084, "lng": 120.8951497 },
				{ "lat": 14.1934353, "lng": 120.8954662 },
				{ "lat": 14.1941998, "lng": 120.900659 },
				{ "lat": 14.201855, "lng": 120.8986741 },
				{ "lat": 14.2138574, "lng": 120.8971077 }
			]
		},
		"Purok 2": {
			"center": { "lat": 14.2010864, "lng": 120.8890371 },
			"bounds": [
				{ "lat": 14.1981013, "lng": 120.8849172 },
				{ "lat": 14.2033538, "lng": 120.893747 }
			],
			"polygon": [
				{ "lat": 14.2003661, "lng": 120.8920706 },
				{ "lat": 14.2024775, "lng": 120.8931328 },
				{ "lat": 14.2025867, "lng": 120.8913411 },
				{ "lat": 14.2016922, "lng": 120.8856709 },
				{ "lat": 14.199534, "lng": 120.886261 },
				{ "lat": 14.1990764, "lng": 120.8871622 },
				{ "lat": 14.1987696, "lng": 120.8890934 },
				{ "lat": 14.2001581, "lng": 120.8896996 }
			]
		},
		"Purok 3": {
			"center": { "lat": 14.2048449, "lng": 120.8898888 },
			"bounds": [
				{ "lat": 14.2004141, "lng": 120.884621 },
				{ "lat": 14.2078091, "lng": 120.8955322 }
			],
			"polygon": [
				{ "lat": 14.2063359, "lng": 120.8897452 },
				{ "lat": 14.2061985, "lng": 120.8892868 },
				{ "lat": 14.2062089, "lng": 120.8879994 },
				{ "lat": 14.2061361, "lng": 120.8870391 },
				{ "lat": 14.2062817, "lng": 120.885977 },
				{ "lat": 14.2060789, "lng": 120.8855317 },
				{ "lat": 14.2030834, "lng": 120.8856873 },
				{ "lat": 14.2014453, "lng": 120.8858858 },
				{ "lat": 14.2023814, "lng": 120.8889918 },
				{ "lat": 14.2026726, "lng": 120.890054 },
				{ "lat": 14.2029014, "lng": 120.8918081 },
				{ "lat": 14.2038999, "lng": 120.8922051 },
				{ "lat": 14.2041339, "lng": 120.8927952 },
				{ "lat": 14.2046696, "lng": 120.8933853 },
				{ "lat": 14.2054674, "lng": 120.8948897 },
				{ "lat": 14.2070691, "lng": 120.8948253 },
				{ "lat": 14.2066427, "lng": 120.8928995 },
				{ "lat": 14.2069183, "lng": 120.8922557 },
				{ "lat": 14.2067675, "lng": 120.8919875 },
				{ "lat": 14.2066167, "lng": 120.8915315 },
				{ "lat": 14.2067935, "lng": 120.8914296 },
				{ "lat": 14.2065699, "lng": 120.8905713 },
				{ "lat": 14.2064399, "lng": 120.8898525 }
			]
		},
		"Purok 4": {
			"center": { "lat": 14.2079932, "lng": 120.8898933 },
			"bounds": [
				{ "lat": 14.2048834, "lng": 120.8846469 },
				{ "lat": 14.2117686, "lng": 120.8954294 }
			],
			"polygon": [
				{ "lat": 14.2094493, "lng": 120.888622 },
				{ "lat": 14.2090125, "lng": 120.8852531 },
				{ "lat": 14.2072391, "lng": 120.8853765 },
				{ "lat": 14.2066515, "lng": 120.8853443 },
				{ "lat": 14.2054762, "lng": 120.885913 },
				{ "lat": 14.205497, "lng": 120.8869215 },
				{ "lat": 14.2061263, "lng": 120.8875491 },
				{ "lat": 14.2062251, "lng": 120.8882304 },
				{ "lat": 14.2061991, "lng": 120.8896734 },
				{ "lat": 14.2064435, "lng": 120.8898022 },
				{ "lat": 14.2065683, "lng": 120.8904405 },
				{ "lat": 14.2068491, "lng": 120.8915241 },
				{ "lat": 14.2067295, "lng": 120.8917333 },
				{ "lat": 14.2068907, "lng": 120.892082 },
				{ "lat": 14.2068595, "lng": 120.8923932 },
				{ "lat": 14.2066879, "lng": 120.8929189 },
				{ "lat": 14.2062043, "lng": 120.8941259 },
				{ "lat": 14.2064851, "lng": 120.8950056 },
				{ "lat": 14.2110406, "lng": 120.8946516 }
			]
		},
		"Purok 5": {
			"center": { "lat": 14.2116759, "lng": 120.8904295 },
			"bounds": [
				{ "lat": 14.2085869, "lng": 120.8851187 },
				{ "lat": 14.2149312, "lng": 120.8950858 }
			],
			"polygon": [
				{ "lat": 14.2131137, "lng": 120.8883515 },
				{ "lat": 14.2127185, "lng": 120.8855284 },
				{ "lat": 14.2104512, "lng": 120.8861292 },
				{ "lat": 14.2097518, "lng": 120.8862767 },
				{ "lat": 14.209471, "lng": 120.8869661 },
				{ "lat": 14.2094034, "lng": 120.88857 },
				{ "lat": 14.2096088, "lng": 120.8890716 },
				{ "lat": 14.209965, "lng": 120.8946225 },
				{ "lat": 14.2143332, "lng": 120.8944937 }
			]
		},
		"Purok 6": {
			"center": { "lat": 14.2160523, "lng": 120.8884442 },
			"bounds": [
				{ "lat": 14.2106441, "lng": 120.8796466 },
				{ "lat": 14.2200252, "lng": 120.8973706 }
			],
			"polygon": [
				{ "lat": 14.2131195, "lng": 120.8883342 },
				{ "lat": 14.2141647, "lng": 120.8969683 },
				{ "lat": 14.2189592, "lng": 120.8965284 },
				{ "lat": 14.2185224, "lng": 120.8880848 },
				{ "lat": 14.2182312, "lng": 120.8800704 },
				{ "lat": 14.2121782, "lng": 120.8814329 }
			]
		}
	}

	var outerCoords = [
		{ "lat": 20.1085447, "lng": 114.1715214 },
		{ "lat": 4.4898936, "lng": 114.2374393 },
		{ "lat": 4.6651141, "lng": 132.1012089 },
		{ "lat": 20.3765465, "lng": 131.771619 }
	];

	outerCoords = outerCoords.reverse()

	function initMap() 
	{
		var purok = $("select[name=\"purok\"] option:selected").val();
		var center = map_data[purok]['center'];

		var strictBounds = new google.maps.LatLngBounds(
			map_data[purok]['bounds'][0],
			map_data[purok]['bounds'][1]);

		map = new google.maps.Map(document.getElementById("map"), {
			center: center,
			zoom: 15,
			restriction: {
				latLngBounds: strictBounds,
				strictBounds: false,
			}
		});

		var innerCoords = map_data[purok]['polygon'];

		var points = [outerCoords, innerCoords];

		polygon = new google.maps.Polygon({
			map: map,
			paths: points,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 0,
			fillColor: '#BDBDBD',
			fillOpacity: 1
		});

		google.maps.event.addListener(map, 'click', function(event)
		{
			var point = { lat: event.latLng.lat(), lng: event.latLng.lng() };

			if (marker)
				marker.setMap(null);

			marker = new google.maps.Marker({
				position: point,
				map: map
			});

			map.panTo(point);

			$('input[name="latitude"]').val(point.lat);
			$('input[name="longitude"]').val(point.lng);
		});

		{if $prev_data.latitude|default:false}
		var point = { lat: {$prev_data.latitude}, lng: {$prev_data.longitude} };

		marker = new google.maps.Marker({
			position: point,
			map: map
		});

		map.panTo(point);
		{/if}

		$('select[name="purok"]').on('select2:select', function (e) 
		{
			var purok = $("select[name=\"purok\"] option:selected").val();
			
			if (marker) {
				marker.setMap(null);
				$('input[name="latitude"]').val("");
				$('input[name="longitude"]').val("");
			}
			
			if (polygon)
				polygon.setMap(null);

			var innerCoords = map_data[purok]['polygon'];

			var points = [outerCoords, innerCoords];

			polygon = new google.maps.Polygon({
				map: map,
				paths: points,
				strokeColor: '#FF0000',
				strokeOpacity: 0.8,
				strokeWeight: 0,
				fillColor: '#BDBDBD',
				fillOpacity: 1
			});

			var newBounds = new google.maps.LatLngBounds(
				map_data[purok]['bounds'][0],
				map_data[purok]['bounds'][1]);

			map.setOptions({
				restriction: {
					latLngBounds: newBounds
				}
			});

			map.panTo(map_data[purok]['center']);
			map.setZoom(15);
		});
	}

	$(() => 
	{
		initMap();

		$('.form-submit').formSubmit();

		$('select').select2();
	});
</script>
{/block}