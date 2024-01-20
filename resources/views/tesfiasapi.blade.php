
<!DOCTYPE html>
<html lang="en">
<head>
	<base target="_top">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>METROLOG</title>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css"/>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  
    
	<style>
	</style>

	
</head>
<body>

<div id="map" style="width: 100%; height: 100vh;"></div>


</body>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>

var map = L.map('map').setView([55.751244, 37.618423], 10);
L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);
L.Control.geocoder().addTo(map);

var drawnFeatures = new L.FeatureGroup();
map.addLayer(drawnFeatures);

map.on("draw:created", function(e){
  var layer = e.layer;
  updateGeoJSONString(layer);
  drawnFeatures.addLayer(layer);
});

// Обработчик события редактирования полигона
map.on("draw:edited", function(e){
  var layers = e.layers;
  layers.eachLayer(function(layer) {
    updateGeoJSONString(layer, true); // передаем второй аргумент, указывающий, что это редактирование
  });
});

// Обработчик события редактирования полигона
map.on('draw:editvertex', function(e) {
    var layer = e.layer;

    if (layer.editing) {
        layer.editing.enable();
        console.log('Editing enabled for layer:', layer);
    } else {
        console.log('Layer does not support editing:', layer);
    }
});

map.on("draw:deleted", function(e){
  var layer = e.layer;
  updateGeoJSONString(layer);
  drawnFeatures.addLayer(layer);
});


var drawControl = new L.Control.Draw({
  edit: {
    featureGroup: drawnFeatures,
    remove: true,
    enabled: true
  },
});
map.addControl(drawControl);


function updateGeoJSONString(layer, isEdit) {
  var geoJSON = layer.toGeoJSON();
  var coordinates = geoJSON.geometry.coordinates;

  // Показываем в попапе
  layer.bindPopup("Coordinates: " + JSON.stringify(coordinates)).openPopup();
  // Добавляем console.log
  console.log(coordinates);

  // Сохраняем координаты в базе данных
  savePolygonToDatabase(coordinates, isEdit ? layer.options.polygonId : null);
}

function savePolygonToDatabase(coordinates, polygonId) {
  const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
  console.log('CSRF Token:', csrfToken);
  console.log('Coordinates:', coordinates);

  // Отправка запроса с использованием jQuery AJAX
  $.ajax({
    url: 'http://case.sknewlife.ru/savePolygon',
    type: 'POST',
    contentType: 'application/json',
    headers: {
      'X-CSRF-TOKEN': csrfToken,
    },
    data: JSON.stringify({ coordinates: coordinates, id: polygonId }), // передаем ID
    success: function (data) {
      console.log('Polygon saved to database:', data);
    },
    error: function (xhr, status, error) {
      console.error('Error:', status, error);
    }
  });
}


function loadPolygons() {
    $.ajax({
        url: 'http://case.sknewlife.ru/loadPolygons',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            displayPolygons(data); // Отображение полигонов
            drawnFeatures.eachLayer(function (layer) {
              if (L.EditToolbar.Edit && layer instanceof L.EditToolbar.Edit) {
                  layer.enable();
              }
            });
        },
        error: function (xhr, status, error) {
            console.error('Error:', status, error);
        }
    });
}

// Вызываем функцию загрузки полигонов при загрузке страницы
loadPolygons();

// Функция для отображения полигонов на карте
function displayPolygons(polygons) {
    drawnFeatures.clearLayers();

    polygons.forEach(function (polygon) {
        var coordinates = polygon.coordinates;
        var geoJSON = {
            type: 'Polygon',
            coordinates: coordinates
        };
        var layer = L.geoJSON(geoJSON);
        drawnFeatures.addLayer(layer);
        layer.on('click', function () {
            // Добавьте свою логику обработки клика на полигоне
            console.log('Polygon clicked:', layer);
        });

        // Адаптация подсказанного решения
        if (layer instanceof L.FeatureGroup) {
            layer.eachLayer(function (subLayer) {
                drawnFeatures.addLayer(subLayer);
            });
        } else {
            drawnFeatures.addLayer(layer);
        }
    });
}




function getCookie(name) {
  const cookies = document.cookie.split(';');
  for (let i = 0; i < cookies.length; i++) {
    const cookie = cookies[i].trim();
    if (cookie.startsWith(name + '=')) {
      return cookie.substring(name.length + 1);
    }
  }
  return null;
}
 
 


</script>
