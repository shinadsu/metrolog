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
</head>

<body>
  <div id="map" style="width: 100%; height: 100vh;"></div>
</body>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script src="https://unpkg.com/@turf/turf@latest"></script>



<script>
  function getPolygonCoordinates(polygon) 
  {
    if (!polygon || !polygon.getLatLngs) {
      return null;
    }

    return polygon.getLatLngs();
  }

  var map = L.map('map').setView([55.751244, 37.618423], 10);
  L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://osm.org/copyright"></a>'
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
      // console.log(type);
    }
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
                    // console.log(polygonId);

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
      // console.log(loadedPolygons);
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





  function savePolygonToDatabase(layer, coordinates) 
  {
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

let loadedPolygons = [];
let polygonCoords = [];

// Функция для загрузки данных полигона с сервера
function loadPolygons() {

    $.ajax({
        url: 'http://case.sknewlife.ru/loadPolygons',
        method: 'GET',
        success: function (response) {
            response.forEach(function (polygonData) {
                var color;

                switch (polygonData.id) {
                  case 157:
                      color = 'grey';
                      break;
                    case 165:
                        color = 'orange';
                        break;
                    case 166:
                    case 183:
                        color = 'purple';
                        break;
                    case 167:
                        color = 'lemonchiffon'; // Лимоновый
                        break;
                    case 168:
                    case 185:
                        color = 'red';
                        break;
                    case 174:
                        color = 'azure';
                        break;
                    case 173:
                        color = 'lemonchiffon'; // Люминитовый (тот же цвет, что и лимоновый)
                        break;
                    case 175:
                    case 176:
                    case 177:
                    case 178:
                    case 179:
                    case 180:
                    case 181:
                        color = 'diamond'; // Брилиантовый
                        break;
                    case 182:
                        color = 'green';
                        break;
                    case 184:
                        color = 'moonstone'; // Лунный
                        break;
                    default:
                        color = 'red'; // По умолчанию красный цвет
                }

                var polygon = L.polygon(polygonData.coordinates, { color: color }).addTo(map);

                drawnFeatures.addLayer(polygon);

                loadedPolygons.push({
                    id: polygonData.id,
                    polygon: polygon,
                    coords: polygonData.coordinates
                });

                polygonCoords.push({
                    id: polygonData.id,
                    polygon: polygon,
                    coords: polygonData.coordinates
                });


                var path = polygon._path;
                path.classList.add('polygon-id-' + polygonData.id);

                polygon.bindPopup(polygonData.name);
            });

            // console.log('Polygons loaded successfully', response);

              // Преобразование в JSON с функцией замены
            //   var polygonsJSON = JSON.stringify(polygonCoords, function(key, value) {
            //     if (key === 'polygon') {
            //         return undefined;  // Исключаем поле 'polygon'
            //     }
            //     return value;
            // });

           fetchData(response);
            
        },
        error: function (error) {
            console.error('Failed to load polygons:', error.responseJSON.error);
        }
    });
}

// Загрузка полигонов
loadPolygons();



  

  function fetchData(data) {
    $.ajax({
        url: '/getCoordsForAddress', // Укажите путь к вашему контроллеру
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            

            response.forEach(function (address) {
                var lat = parseFloat(address.latitude);
                var lng = parseFloat(address.longitude);

                if (!isNaN(lat) && !isNaN(lng)) {
                    // Создаем маркер с попапом
                    var marker = L.marker([lat, lng]).addTo(map)
                        .bindPopup('<b>' + address.full_address + '</b>');
     
                    // Проверяем, в каком полигоне находится адрес
                    var inPolygon = checkAddressInPolygons(address, data);

                    // Добавляем какой-то визуальный индикатор
                    if (inPolygon) {
                        marker.setIcon(L.icon({
                            iconUrl: 'http://leafletjs.com/docs/images/leaf-green.png',
                            iconSize: [25, 41],
                            iconAnchor: [12, 41],
                            popupAnchor: [1, -34],
                            shadowSize: [41, 41]
                        }));
                    }
                }
            });
        },
        error: function (error) {
            console.log(error);
        }
    });
}





// Функция для проверки, находится ли точка в полигоне
function checkAddressInPolygons(address, data) {
    var addressCoords = [parseFloat(address.latitude), parseFloat(address.longitude)];
   

    for (var key in data) {
        if (data.hasOwnProperty(key)) {
            var polygon = data[key].coordinates;

            if (polygon.length > 0) {
                var isInside = isPointInPolygon(addressCoords, polygon);

                if (isInside) {
                    console.log(`Address ${address.id} is inside Polygon ${data[key].id} and his name is ${data[key].name}`);
                    
                    // Отправляем данные на сервер
                    updateAddressRegion(address.id, data[key].name);
                } else {
                    console.error(`Address ${address.id} is outside Polygon ${data[key].id}`);
                }
            } else {
                console.error(`Empty polygon for Address ${address.id}`);
            }
        }
    }

    return false;
}


// Функция для проверки, находится ли точка в полигоне
function isPointInPolygon(point, polygon) 
{
    var lat = point[0];
    var lng = point[1];

    var vertices = polygon.length;
    var intersections = 0;

    for (var i = 0; i < vertices; i++) {
        var vertex1 = polygon[i];
        var vertex2 = polygon[(i + 1) % vertices];

        if (
            (vertex1.lng < lng && vertex2.lng >= lng || vertex2.lng < lng && vertex1.lng >= lng) &&
            (vertex1.lat + (lng - vertex1.lng) / (vertex2.lng - vertex1.lng) * (vertex2.lat - vertex1.lat) < lat)
        ) {
            intersections++;
        }
    }

    return intersections % 2 !== 0;
}




function updateAddressRegion(addressId, regionName) {
    // Отправляем AJAX-запрос на сервер для обновления поля "region" в таблице адресов
    $.ajax({
        url: '/updateAddressRegion',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            address_id: addressId,  // Используйте 'address_id' вместо 'id'
            new_region: regionName
        },
        success: function (response) {
            console.log(response.message);
        },
        error: function (error) {
            if (error.responseJSON && error.responseJSON.error) {
                console.error('Не удалось обновить регион адреса:', error.responseJSON.error);
            } else {
                console.error('Не удалось обновить регион адреса. Подробности ошибки:', error);
            }
        }
    });
}


  
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

 
  // Загружаем полигоны при запуске страницы
  loadPolygons();

// Загружаем данные адресов при запуске страницы
  fetchData();



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