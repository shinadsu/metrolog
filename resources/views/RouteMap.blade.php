<!DOCTYPE html>
<html lang="en">

<head>
  <base target="_top">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-draw/dist/leaflet.draw.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
  <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
  <script src="https://unpkg.com/@turf/turf@latest"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  

  

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    /* Стили для блоков карты и таблицы */
    #map-container {
      width: 60%;
      /* Уменьшим ширину блока карты на 9% */
      height: 100vh;
      float: left;
      border: 1px solid #000;
      /* Граница для блока карты */
    }

    #table-container {
      width: 40%;
      /* Увеличим ширину блока таблицы до 40% */
      height: 100vh;
      overflow: auto;
      padding: 10px;
      box-sizing: border-box;
      float: left;
    }

    /* Дополнительные стили для кнопок */
    .action-buttons-container {
      display: flex;
      gap: 10px;
      /* Расстояние между кнопками */
      margin-top: 10px;
      /* Отступ сверху */
    }

    .action-button {
      flex-grow: 1;
      padding: 15px;
      /* Увеличим внутренний отступ */
      font-size: 16px;
      /* Увеличим размер шрифта */
      margin-right: 5px;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
      cursor: ew-resize;
      /* Cursor for column resizing */
    }

    .action-buttons-container .btn {
      padding: 5px 10px;
      font-size: 18px;
    }

    .card-body {
    overflow-x: auto; /* Включить горизонтальный скроллбар */
    padding: 0px;
  }


    .footer-input {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start; /* Выравнивание влево */
    margin-top: 10px;
  }

  .footer-input label {
    margin-right: 10px;
  }

  .footer-input input {
    width: 50px;
  }

  .custom-card {
      margin-top: 20px;
    }

    .custom-card table {
      width: 100%;
      border-collapse: collapse;
    }

    .custom-card th, .custom-card td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    .custom-card th {
      background-color: #f2f2f2;
    }

    .custom-card tbody tr:hover {
      background-color: #f5f5f5;
    }
  </style>
</head>


<body>

<div id="map-container">
    <div id="map" style="width: 100%; height: 100%;"></div>
  </div>

  <div id="table-container">
    <!-- Дополнительные кнопки -->
    <!-- Навигационные кнопки с использованием Bootstrap 5 -->
    <div class="action-buttons-container mb-3 align-items-start">
      <button class="action-button btn btn-primary btn-sm">Добавить</button>
      <button class="action-button btn btn-info btn-sm" onclick="updateDocument()">Обновить документ</button>
      <button class="action-button btn btn-secondary btn-sm" onclick="printDocument()">Печать</button>
    </div>

    <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group me-2" role="group" aria-label="First group">
        <button type="button" class="btn btn-secondary" onclick="navigateData('prev')">←</button>
        <button type="button" class="btn btn-secondary" onclick="navigateData('next')">→</button>
      </div>

      <button type="button" class="btn btn-secondary me-2" onclick="addData()">
        <img src="{{ asset('images/dobavit.png') }}" alt="Plus Icon" width="20" height="20">
      </button>

      <div class="form-check form-switch me-2">
        <input class="form-check-input" type="checkbox" id="moveCheckbox" onchange="toggleMove()">
        <label class="form-check-label" for="moveCheckbox">Перемещение</label>
      </div>
    </div>


    <div class="card">
      <div class="card-body">
        <table>
          <thead>
            <tr>
              <th scope="col">№</th>
              <th scope="col">Выб</th>
              <th scope="col">Номер</th>
              <th scope="col">Регламент</th>
              <th scope="col">Интервал</th>
              <th scope="col">Адрес</th>
              <th scope="col">Комментарий логисту</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            
            </tr>
            <tr>
             
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="footer-input">
      <label for="hours">Кол-во часов:</label>
      <input type="text" id="hours" readonly>
    </div>

    <script>

var selectedMarkers = []; // массив для хранения выбранных маркеров
var currentId = 1; // Начальное значение id
var currentPolygon;
var selectedLines = [];
var polyline;
let loadedPolygons = [];
let polygonCoords = [];

function getPolygonCoordinates(polygon) {
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

$(document).ready(function () {
    // Проверяем, была ли нажата кнопка "Показать на карте"
    var showOnMapButtonClicked = localStorage.getItem('showOnMapButtonClicked');
    var totalHours = 0;

    if (showOnMapButtonClicked === 'true') {
        // Передаем данные из localStorage в функцию
        var data = JSON.parse(localStorage.getItem('showOnMapData'));
        var secondAjaxData = JSON.parse(localStorage.getItem('secondAjaxData'));

        // Загружаем полигоны
        loadPolygons()
            .then(function (polygons) {
                // Вызываем функцию showOnMap с данными обоих запросов и полигонами
                showOnMap(data, polygons);

                // Остальной код для отображения таблицы и сброса информации
                secondAjaxData.forEach(function (item, index) {
                    // Создаем строку таблицы
                    var row = '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td><input type="checkbox" id="checkbox' + index + '"></td>' +
                        '<td>' + item.applicationId + '</td>' +
                        '<td>' + item.totalTimesInput + '</td>' +
                        '<td>' + item.selectedPeriod + '</td>' +
                        '<td>' + item.fullAddress + '</td>' +
                        '<td></td>' + // Поле "Комментарий логисту" пустое
                        '</tr>';

                    // Добавляем строку в tbody таблицы
                    $('table tbody').append(row);

                    // Суммируем часы (предполагается, что totalTimesInput в формате HH:mm:ss)
                    var hoursMinutesSeconds = item.totalTimesInput.split(':');
                    totalHours += parseInt(hoursMinutesSeconds[0]) * 3600 + parseInt(hoursMinutesSeconds[1]) * 60 + parseInt(hoursMinutesSeconds[2]);
                });

                // Отображаем общее количество часов в поле "Кол-во часов"
                $('#hours').val(formatTime(totalHours));

                // Сбрасываем информацию о нажатии кнопки
                localStorage.setItem('showOnMapButtonClicked', 'false');
                localStorage.removeItem('showOnMapData'); // Опционально, чтобы не хранить лишнюю информацию
                localStorage.removeItem('secondAjaxData'); // Опционально, чтобы не хранить лишнюю информацию
            })
            .catch(function (error) {
                console.error('Failed to load polygons:', error);
            });
    }
});

function loadPolygons() {
    return new Promise(function (resolve, reject) {
        $.ajax({
            url: 'http://case.sknewlife.ru/loadPolygons',
            method: 'GET',
            success: function (response) {
                var loadedPolygons = [];

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
                      case 195:
                        color = 'blue'; // Брилиантовый
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
                    loadedPolygons.push({
                        id: polygonData.id,
                        name: polygonData.name,
                        coordinates: polygonData.coordinates
                    });

                    var path = polygon._path;
                    path.classList.add('polygon-id-' + polygonData.id);

                    polygon.bindPopup(polygonData.name);
                });

                // Разрешаем обещание с данными о полигонах
                resolve(loadedPolygons);
            },
            error: function (error) {
                // Отклоняем обещание с ошибкой
                reject(error.responseJSON.error);
            }
        });
    });
}

// Определите функцию showOnMap с двумя параметрами: data и polygons
function showOnMap(data, polygons) {
    data.forEach(function (address) {
        var lat = parseFloat(address.latitude);
        var lng = parseFloat(address.longitude);

        if (!isNaN(lat) && !isNaN(lng)) {
            var marker = L.marker([lat, lng]).addTo(map)
                .bindPopup('<b>' + address.full_address + '</b>');

            var inPolygon = checkAddressInPolygons(address, polygons);

            marker.on('click', onMarkerClick);
        }
    });
}




// Функция форматирования времени
function formatTime(seconds) {
    var hours = Math.floor(seconds / 3600);
    var minutes = Math.floor((seconds % 3600) / 60);
    var formattedTime = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0');
    return formattedTime;
}




function onMarkerClick(event) {
    var marker = event.target;

    // Проверяем, есть ли уже маркер в списке выбранных
    var index = selectedMarkers.indexOf(marker);

    if (index === -1) {
        // Если маркера нет в списке, добавляем его
        selectedMarkers.push(marker);

        // Здесь можно добавить логику, связанную с выбором маркера
    } else {
        // Если маркер уже выбран, удаляем его из списка
        selectedMarkers.splice(index, 1);

        // Здесь можно добавить логику, связанную с отменой выбора маркера
    }

    // Перерисовываем polyline с новыми выбранными маркерами
    updatePolyline();
}

function updatePolyline() {
    // Если уже есть polyline на карте, удаляем его
    if (polyline) {
        map.removeLayer(polyline);
    }

    // Создаем новый polyline с координатами выбранных маркеров
    var polylineCoords = selectedMarkers.map(function (marker) {
        return marker.getLatLng();
    });

    // Добавляем новый polyline на карту
    polyline = L.polyline(polylineCoords, {color: 'blue'}).addTo(map);
}



function checkAddressInPolygons(address, polygons) {
  var addressCoords = [parseFloat(address.latitude), parseFloat(address.longitude)];

  for (var key in polygons) {
    if (polygons.hasOwnProperty(key)) {
      var polygon = polygons[key].coordinates;

      if (polygon.length > 0) {
        var isInside = isPointInPolygon(addressCoords, polygon);

        if (isInside) {
          console.log(`Address ${address.id} is inside Polygon ${polygons[key].id} and his name is ${polygons[key].name}`);

          // Отправляем данные на сервер
          updateAddressRegion(address.id, polygons[key].name);
        } else {
          // console.error(`Address ${address.id} is outside Polygon ${data[key].id}`);
        }
      } else {
        // console.error(`Empty polygon for Address ${address.id}`);
      }
    }
  }

  return false;
}


// Функция для проверки, находится ли точка в полигоне
function isPointInPolygon(point, polygon) {
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



</body>

</html>


</body>
</html>