{extends 'templates/default/master.tpl'}

{block name='before-page-header'}
<div class="page-header-content header-elements-lg-inline">
	<div class="page-title d-flex pb-1">
		<h2><span class="font-weight-semibold">{$app_title}</span></h2>
	</div>
</div>
{/block}

{block name='before-page-footer'}
{/block}

{block name='content'}
{include "`$smarty.current_dir`/header.tpl"}
<div class="row">
	<div class="col-md-8 vh-100">
		<div id="map">
		</div>
	</div>
	<div class="col-md-4">
		<div class="card card-body pt-2">
			<div class="mt-2">
			{form_select enabled=true field='purok' options=$puroks|default:[] value=$prev_data.purok|default:false required=false}
			</div>
			<div class="mt-2">
				{include 'templates/default/form/select1.tpl'
				__label='Filter Category'
				__field='filter_category'
				__options=$location_categories|default:[['value' => 0, 'text' => 'All']]
				__selected=$location_category|default:false
				__required=false
				can_entry=true}	
			</div>


			<table class="table dt-table table-xs w-100">
				<thead>
					<tr><th>Locations</th></tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>

{/block}

{assign var='__assets' value=['datatable', 'select2']}

{block name='custom_styles'}
<style>
	#map {
		width: 100%;
		height: 100%;
	}
	.dt-table thead {
		display: none;
	}
	.marker-position {
		top: 0;
		left: -20px;
		position: absolute;
		font-weight: bold;
	}
	.dt-table tr {
		cursor: pointer;
	}
</style>
{/block}

{block name='custom_scripts'}
<script src="https://maps.googleapis.com/maps/api/js?keyaddApiKeyHere"></script>
<script src="https://cdn.jsdelivr.net/npm/js-base64@2.5.2/base64.min.js"></script>
<script>
	let map;
	var markers = [];
	var road_poly;
	var ending_marker;
	var starting_marker;

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
		road_poly 		= new google.maps.Polyline();
		starting_marker = new google.maps.Marker();
		ending_marker 	= new google.maps.Marker();

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

		$('select[name="purok"]').on('select2:select', function (e) 
		{
			var purok = $("select[name=\"purok\"] option:selected").val();

			if (road_poly) road_poly.setMap(null);
			if (starting_marker) starting_marker.setMap(null);
			if (ending_marker) ending_marker.setMap(null);
			
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

		$('.bs-select2').select2();

		$('[name="purok"]').select2();

		$('#filter_category').on('select2:select', function (e) 
		{
			var data = e.params.data;

			var data = {
				location_category: data.id
			};

			var str = Base64.encode(JSON.stringify(data));

			window.location = '{'map'|route}?p=' + str;
		});

		var table = $('.dt-table').initDataTable({
			data: {$dt_data|default:'[]'},
			columns: [
				{ data: 'location' }
				],
		},
		{
			lengthChange: false,
			info: false,
			pagingType: "simple",
			language: {
				search: '<span>Filter:</span> _INPUT_',
				searchPlaceholder: 'Type to filter...',
				paginate: { 'next': $('html').attr('dir') == 'rtl' ? 'Next &larr;' : 'Next &rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr; Prev' : '&larr; Prev' }
			}
		});

		const iwindow = new google.maps.InfoWindow();

		$( document ).on("click", ".dt-table tr", function()
		{
			var data = $('.dt-table').DataTable().row($(this)).data();

			road_poly.setMap(null);
			starting_marker.setMap(null);
			ending_marker.setMap(null);

			if (data.latitude && data.longitude)
			{
				var form = new FormData();
				form.append("lat_from", data.latitude);
				form.append("lng_from", data.longitude);
				form.append("lat_to", {$barangay_hall.latitude});
				form.append("lng_to", {$barangay_hall.longitude});

				var settings = {
					"url": "https://myhost14.com/brgy-alulod/api/road",
					"method": "POST",
					"timeout": 0,
					"processData": false,
					"mimeType": "multipart/form-data",
					"contentType": false,
					"data": form
				};

				$.ajax(settings).done(function (response) 
				{
					var res = JSON.parse(response);

					if (res.status && res.points)
					{
						road_poly = new google.maps.Polyline({
							path: res.points,
							geodesic: true,
							strokeColor: "#FF0000",
							strokeOpacity: 1.0,
							strokeWeight: 2,
						});

						road_poly.setMap(map);

						var s = {$barangay_hall.latitude};
						var e = {$barangay_hall.longitude};

						starting_marker = new google.maps.Marker({
							position: { lat: s, lng: e },
							map: map,
							icon: '{$assets_url}/images/municipal.png',
						});

						ending_marker = new google.maps.Marker({
							position: { lat: +data.latitude, lng: +data.longitude },
							map: map
						});
					}
				});
			}
		});
	});
</script>
{/block}
