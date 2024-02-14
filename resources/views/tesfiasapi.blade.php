<!DOCTYPE html>
<html lang="en">

<head>
  <base target="_top">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>METROLOG</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-draw/dist/leaflet.draw.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
  </style>
</head>

<body>
  <div id="map" style="width: 100%; height: 100vh;"></div>
</body>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script>
  function getPolygonCoordinates(polygon) {
    if (!polygon || !polygon.getLatLngs) {
      return null;
    }

    return polygon.getLatLngs();
  }

  var map = L.map('map').setView([55.751244, 37.618423], 10);
  L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);


  var drawnFeatures = new L.FeatureGroup();
  map.addLayer(drawnFeatures);

  var drawControl = new L.Control.Draw({
    edit: {
      featureGroup: drawnFeatures,
      remove: true,
      enabled: true
    },
  });
  map.addControl(drawControl);

  var currentId = 1; // Начальное значение id
  var currentPolygon;

  map.on("draw:created", function (e) {
    var type = e.layerType;
    var layer = e.layer;

    // Проверяем, является ли созданный объект полигоном
    if (type === 'polygon') {
      // Добавляем полигон в группу
      drawnFeatures.addLayer(layer);

      // Получаем координаты полигона
      var coordinates = getPolygonCoordinates(layer);

      console.log('Координаты полигона:', coordinates);

      currentPolygon = layer;


      savePolygonToDatabase(layer, coordinates);
    } else {
      console.log('Это не полигон, не обрабатываем.');
      console.log(type);
    }
  });

  var markers = [
      { lat: 42.990031, lon: 132.40649, title: "Маркер 1" },
    ];
   
  

    markers.forEach(function (marker) {
      L.marker([marker.lat, marker.lon]).addTo(map).bindPopup(marker.title);
    });


  map.on("draw:deleted", function (e) {
    if (e.layers) {
        e.layers.eachLayer(function (layer) {
            // Получаем все классы элемента
            var classes = layer._path.classList;

            // Итерируем по классам, чтобы найти класс с id полигона
            for (var i = 0; i < classes.length; i++) {
                var classList = classes[i];
                if (classList.startsWith('polygon-id-')) {
                    // Выделяем id из класса
                    var polygonId = parseInt(classList.replace('polygon-id-', ''), 10);
                    console.log(polygonId);

                    // Теперь у вас есть id полигона, который можно использовать для удаления из базы данных
                    deletePolygonFromDatabase(polygonId);
                    break;  // Выход из цикла, так как id найден
                }
            }
        });
    }
});

  // Функция для сравнения двух массивов
  function arraysEqual(arr1, arr2) {
    if (arr1.length !== arr2.length) return false;
    for (var i = 0; i < arr1.length; i++) {
      if (arr1[i] !== arr2[i]) return false;
    }
    return true;
  }



  map.on("draw:edited", function (e) {
    // Проверяем, есть ли загруженные полигоны
    if (loadedPolygons.length > 0) {
      // Массив для хранения обновленных координат
      console.log(loadedPolygons);
      var updatedPolygons = [];

      // Итерируем по всем загруженным полигонам
      loadedPolygons.forEach(function (loadedPolygon) {
        // Получаем полигон
        var polygon = loadedPolygon.polygon;

        // Получаем обновленные координаты полигона после редактирования
        var updatedCoordinates = getPolygonCoordinates(polygon);

        // Добавляем обновленные координаты в массив
        updatedPolygons.push({
          id: loadedPolygon.id,
          coordinates: updatedCoordinates
        });
      });

      // Отправляем массив с обновленными координатами на сервер
      $.ajax({
        url: 'http://case.sknewlife.ru/updatePolygon',
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          polygons: JSON.stringify(updatedPolygons)
        },
        success: function (response) {
          console.log(response.message);
          // Если нужно выполнить какие-то действия после успешного обновления, добавьте код здесь
        },
        error: function (error) {
          console.error('Failed to update polygons:', error.responseJSON.error);
          // Если нужно выполнить какие-то действия при ошибке, добавьте код здесь
        }
      });
    }
  });





  function savePolygonToDatabase(layer, coordinates) {
    // Отправляем AJAX-запрос на сервер для сохранения координат в базу данных
    $.ajax({
      url: 'http://case.sknewlife.ru/savePolygon',
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
        coordinates: JSON.stringify(coordinates)
      },
      success: function (response) {
        console.log(response.message);
        // Если вы хотите что-то сделать после успешного сохранения, добавьте код здесь
      },
      error: function (error) {
        console.error('Failed to save polygon:');
        // Если вы хотите что-то сделать при ошибке, добавьте код здесь
      }
    });
  }

  var loadedPolygons = [];

  // Функция для загрузки данных полигона с сервера
  function loadPolygons() 
  {
      $.ajax({
          url: 'http://case.sknewlife.ru/loadPolygons',
          method: 'GET',
          success: function (response) {
              // Очищаем массив перед загрузкой новых полигонов
              loadedPolygons = [];

              // Обработка полученных данных полигонов
              response.forEach(function (polygonData) {
                  // Создание полигона на карте
                  var polygon = L.polygon(polygonData.coordinates, { color: 'red' }).addTo(map);

                  // Добавление полигона в группу
                  drawnFeatures.addLayer(polygon);

                  // Добавление полигона в массив
                  loadedPolygons.push({
                      id: polygonData.id,
                      polygon: polygon
                  });

                  // Получение пути полигона
                  var path = polygon._path;

                  // Добавление id как отдельного класса к элементу <path>
                  path.classList.add('polygon-id-' + polygonData.id);
              });

              console.log('Polygons loaded successfully', response);
          },
          error: function (error) {
              console.error('Failed to load polygons:', error.responseJSON.error);
          }
      });
  }

  


  // Вызов функции загрузки полигонов при загрузке страницы или при необходимости
  loadPolygons();


  function deletePolygonFromDatabase(polygonId) {
    $.ajax({
      url: 'http://case.sknewlife.ru/deletePolygon',
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
        id: polygonId
      },
      success: function (response) {
        console.log(response.message);
        console.log(polygonId);
      },
      error: function (error) {
        console.error('Failed to delete polygon:', error.responseJSON.error);
        console.log(polygonId);
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

</html>