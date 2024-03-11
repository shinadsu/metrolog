<!DOCTYPE html>
<html lang="en">

<head>
  <base target="_top">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-draw/dist/leaflet.draw.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

  <script src="https://unpkg.com/@turf/turf@latest"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
  <script src="https://unpkg.com/leaflet-extra-markers/dist/js/leaflet.extra-markers.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet-extra-markers/dist/css/leaflet.extra-markers.min.css" />



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

    .custom-marker-icon {
      width: 30px;
      height: 30px;
      background-color: #007BFF;
      border-radius: 50%;
      color: black;
      text-align: center;
      line-height: 30px;
      font-weight: bold;
    }

    .custom-marker {
      display: inline-block;
      vertical-align: middle;
      font-size: 14px;
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

    table {
      border-collapse: collapse;
      width: 100%;
    }

    table,
    th,
    td {
      border: 1px solid black;
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
      overflow-x: auto;
      /* Включить горизонтальный скроллбар */
      padding: 0px;
    }


    .footer-input {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: flex-start;
      /* Выравнивание влево */
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

    .custom-card th,
    .custom-card td {
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
      <button id="updateDocumentButton" class="action-button btn btn-info btn-sm">Обновить документ</button>
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
      <button class="action-button btn btn-success btn-sm" onclick="openConfirmationModal()">Сохранить изменения</button>
    </div>


    <div class="card">
      <div class="card-body">
        <table id="sortableTable">
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
          <tbody class="sortable">

          </tbody>
        </table>
      </div>
    </div>
    <div class="footer-input">
      <label for="hours">Кол-во часов:</label>
      <input type="text" id="hours" readonly>
    </div>

    <script>
      var selectedMarkers = [];
      var currentId = 1;
      var currentPolygon;
      var selectedLines = [];
      var polyline;
      var polygonCoords = [];
      var loadedPolygons = [];
      var initialOrder = [];
      var orderToMarkerId = {};
      var markersArray = [];
      var originalOrderArray = [];
      var pageNumber = localStorage.getItem('currentPageId');
      var updateDocumentButtonClicked = false;




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



      map.on("draw:created", function(e) {
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


      map.on("draw:deleted", function(e) {
        if (e.layers) {
          e.layers.eachLayer(function(layer) {
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
                break; // Выход из цикла, так как id найден
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



      map.on("draw:edited", function(e) {
        // Проверяем, есть ли загруженные полигоны
        if (loadedPolygons.length > 0) {
          // Массив для хранения обновленных координат
          // console.log(loadedPolygons);
          var updatedPolygons = [];

          // Итерируем по всем загруженным полигонам
          loadedPolygons.forEach(function(loadedPolygon) {
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
            success: function(response) {
              console.log(response.message);
              // Если нужно выполнить какие-то действия после успешного обновления, добавьте код здесь
            },
            error: function(error) {
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
          success: function(response) {
            console.log(response.message);
            // Если вы хотите что-то сделать после успешного сохранения, добавьте код здесь
          },
          error: function(error) {
            console.error('Failed to save polygon:');
            // Если вы хотите что-то сделать при ошибке, добавьте код здесь
          }
        });
      }





      function loadPolygons() {
        return new Promise(function(resolve, reject) {
          $.ajax({
            url: 'http://case.sknewlife.ru/loadPolygons',
            method: 'GET',
            success: function(response) {
              var loadedPolygons = [];

              response.forEach(function(polygonData) {
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

                var polygon = L.polygon(polygonData.coordinates, {
                  color: color
                })

                drawnFeatures.addLayer(polygon);


                loadedPolygons.push({
                  id: polygonData.id,
                  name: polygonData.name,
                  coordinates: polygonData.coordinates
                });

                var path = polygon._path;
                path.classList.add('polygon-id-' + polygonData.id);

                polygon.bindPopup(polygonData.name);
              });


              resolve(loadedPolygons);
            },
            error: function(error) {

              reject(error.responseJSON.error);
            }
          });
        });
      }





      $(document).ready(function() {
        // Переменные для хранения данных
        // loadData(pageNumber);
        var showOnMapButtonClicked = localStorage.getItem('showOnMapButtonClicked');
        var pageNumber = localStorage.getItem('currentPageId');
        var data = JSON.parse(localStorage.getItem('showOnMapData'));
        var totalHours = 0;
        var markerCount = 0;
        var secondAjaxData = [];

        // Функция для обновления цифр в маркерах и строках таблицы
        function updateMarkerNumbers() {
          $('table tbody tr').each(function(index) {
            var newIndex = index + 1;
            $(this).attr('data-index', newIndex);
            $(this).find('td:first').text(newIndex);
          });

          // Обновление цифр в маркерах на карте
          updateRowNumbers();
        }

        // Функция для инициализации возможности перетаскивания строк
        function initDragAndDrop() {
          $('#sortableTable tbody').sortable({
            stop: function(event, ui) {
              updateMarkerNumbers();
            }
          });

          // Вызываем функцию сразу после инициализации, чтобы обновить порядок
          updateMarkerNumbers();
        }

        // Обработчик события для чекбокса "Перемещение"
        $('#moveCheckbox').on('change', function() {
          if (this.checked) {
            // Включено перемещение
            initDragAndDrop();
          } else {
            // Выключено перемещение, обновляем цифры в маркерах и строках таблицы
            updateMarkerNumbers();
          }
        });



        // Проверяем, была ли нажата кнопка "Показать на карте"
        function loadData(pageNumber) {
          return new Promise(function(resolve, reject) {
            $.ajax({
              type: 'GET',
              url: '/loadApplicationdDataFromDB',
              data: {
                pageNumber: pageNumber
              },
              success: function(response) {
                var newData = response.map(function(item) {
                  return {
                    applicationId: item.applicationId,
                    totalTimesInput: item.totalTimesInput,
                    selectedPeriod: item.selectedPeriod,
                    fullAddress: item.fullAddress,
                    logisticCommentary: item.logisticCommentary
                  };
                });

                secondAjaxData = secondAjaxData.concat(newData);

                console.log(secondAjaxData);
                loadCoord(secondAjaxData);
                resolve();
              },
              error: function(error) {
                console.error('Error loading data:', error);
                // Реджектим промис при ошибке
                reject(error);
              }
            });
          });
        }

        function loadCoord(data) {
          var dataArray = data.map(item => item.applicationId).join(',');
          var dataArrayAsArray = dataArray.split(',');
          console.log(dataArrayAsArray);

          return new Promise(function(resolve, reject) {
            $.ajax({
              type: 'GET',
              url: '/postAddressStructureForMap',
              data: {
                applicationIds: dataArrayAsArray
              },
              success: function(response) {
                var newCorods = response.map(function(item) {
                  return {
                    id: item.id,
                    full_address: item.full_address,
                    latitude: item.latitude,
                    longitude: item.longitude
                  };
                });

                firstAjaxData = firstAjaxData.concat(newData);

                resolve();
              },
              error: function(error) {
                console.error('Error loading data:', error);
                reject(error);
              }
            });
          });
        }

        if (showOnMapButtonClicked === 'true') {
          loadPolygons()
            .then(function(polygons) {
              showOnMap(data, polygons, secondAjaxData);
              return loadData(pageNumber);
            })
            .then(function() {
              showDataAndPolygons();
            })
            .catch(function(error) {
              console.error('Failed to load data or polygons:', error);
            });
        }

        function showDataAndPolygons() {
          // Остальной код для отображения таблицы и сброса информации
          secondAjaxData.forEach(function(item, index) {
            markerCount++;

            var row = '<tr data-index="' + markerCount + '">' +
              '<td>' + markerCount + '</td>' +
              '<td><input type="checkbox" id="checkbox' + index + '"></td>' +
              '<td>' + item.applicationId + '</td>' +
              '<td>' + item.totalTimesInput + '</td>' +
              '<td>' + item.selectedPeriod + '</td>' +
              '<td>' + item.fullAddress + '</td>' +
              '<td>' + item.logisticCommentary + '</td>' +
              '</tr>' +
              '<input type="hidden" class="pageNumber" value="' + pageNumber + '">';

            $('#sortableTable tbody').append(row);

            var hoursMinutesSeconds = item.totalTimesInput.split(':');
            totalHours += parseInt(hoursMinutesSeconds[0]) * 3600 + parseInt(hoursMinutesSeconds[1]) * 60 + parseInt(hoursMinutesSeconds[2]);
          });

          $('#hours').val(formatTime(totalHours));

          initDragAndDrop();

          localStorage.setItem('showOnMapButtonClicked', 'false');
          localStorage.removeItem('showOnMapData');
          localStorage.removeItem('secondAjaxData');
        }

        $('#updateDocumentButton').on('click', function() {
          updateDocumentButtonClicked = true;

          localStorage.setItem('showOnMapButtonClicked', 'true');
          localStorage.setItem('showOnMapData', JSON.stringify(data));
          localStorage.setItem('secondAjaxData', JSON.stringify(secondAjaxData));
          localStorage.setItem('currentPageId', pageNumber);

          location.reload();
        });
      });

      // Добавим переменную для буфера
      var orderUpdateBuffer = [];
      var shouldFlushBuffer = false;

      function flushOrderUpdateBuffer() {
        if (shouldFlushBuffer && orderUpdateBuffer.length > 0) {
          $.ajax({
            url: '/handleOrder',
            method: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              order: orderUpdateBuffer,
              pageNumber: pageNumber
            },
            success: function(response) {
              console.log('Данные успешно отправлены на сервер:', response);
            },
            error: function(error) {
              console.error('Произошла ошибка при отправке данных на сервер:', error);
            }
          });

          orderUpdateBuffer = [];
          shouldFlushBuffer = false; // Сброс флага после отправки
        }
      }

      $(document).ready(function() {
        var initialOrder = [];
        var sortable = new Sortable(document.getElementById('sortableTable').getElementsByTagName('tbody')[0], {
          handle: '.ui-sortable-handle',
          onUpdate: function(event) {
            var newOrder = [];
            $('#sortableTable tbody tr').each(function() {
              var dataIndex = $(this).find("td:nth-child(3)").text();
              newOrder.push(dataIndex);
            });

            if (!arraysEqual(initialOrder, newOrder)) {
              console.log(newOrder);

              orderUpdateBuffer = newOrder;

              initialOrder = newOrder;
            }
          }
        });
      });

      $(window).on('beforeunload', function() {
        flushOrderUpdateBuffer();
      });





      // Определите функцию showOnMap с двумя параметрами: data и polygons
      function showOnMap(data, polygons, secondata) {
        var markerCount = 1;
        data.forEach(function(address, index) {
          var lat = parseFloat(address.latitude);
          var lng = parseFloat(address.longitude);

          if (!isNaN(lat) && !isNaN(lng)) {
            var markerHtml = '<div class="custom-marker">' + markerCount + '</div>';

            var customIcon = L.divIcon({
              className: 'custom-marker-icon',
              html: markerHtml
            });

            // Добавим изначальный порядок к объекту маркера
            var marker = L.marker([lat, lng], {
                icon: customIcon,
                originalOrder: markerCount
              }).addTo(map)
              .bindPopup(address.full_address);

            var inPolygon = checkAddressInPolygons(address, polygons);

            marker.on('click', function(event) {
              onMarkerClick(event, secondata);
            });

            markerCount++;
          }
        });
      }

      function onMarkerClick(event, secondata) {
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
        updatePolyline(secondata);
      }

      var savePolylineBuffer = [];
      var updateTableBuffer = [];
      var shouldFlushPolylineBuffer = false;
      var shouldFlushTableBuffer = false;

      function flushSavePolylineBuffer() {
        if (shouldFlushPolylineBuffer && savePolylineBuffer.length > 0) {
          $.ajax({
            url: '/savePolyline',
            method: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              routeNumber: pageNumber,
              coordinates: JSON.stringify(savePolylineBuffer)
            },
            success: function(response) {
              console.log('Полилиния успешно сохранена в базе данных:', response);
            },
            error: function(error) {
              console.error('Ошибка при сохранении полилинии в базе данных:', error);
            }
          });

          savePolylineBuffer = [];
          shouldFlushPolylineBuffer = false;
        }
      }

      function flushUpdateTableBuffer() {
        if (shouldFlushTableBuffer && updateTableBuffer.length > 0) {
          console.log(updateTableBuffer);
          $.ajax({
            type: "POST",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/updateTableData",
            data: JSON.stringify(updateTableBuffer), // stringify the data
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
              console.log("Таблица успешно обновлена:", response);
            },
            error: function(error) {
              console.error("Ошибка при обновлении таблицы:", error);
            }
          });

          updateTableBuffer = [];
          shouldFlushTableBuffer = false;
        }
      }

      function updatePolyline(secondata) {
        if ($('#moveCheckbox').prop('checked')) {
          if (polyline) {
            map.removeLayer(polyline);
          }

          if (selectedMarkers.length >= 2) {
            var polylineCoords = selectedMarkers.slice(-2).map(function(marker) {
              return marker.getLatLng();
            });

            console.log("Изначальный порядок и адреса:", selectedMarkers.map(marker => ({
              order: marker.options.originalOrder,
              address: marker.getPopup().getContent(),
              applicationId: secondata[marker.options.originalOrder - 1].applicationId,
              lat: marker.getLatLng().lat,
              lng: marker.getLatLng().lng
            })));

            var orderAfterPolyline = selectedMarkers.map(marker => ({
              order: marker.options.originalOrder,
              address: marker.getPopup().getContent(),
              applicationId: secondata[marker.options.originalOrder - 1].applicationId,
              lat: marker.getLatLng().lat,
              lng: marker.getLatLng().lng
            }));

            var polylinePath = polylineCoords.map(coord => [coord.lat, coord.lng]);

            selectedMarkersOrder = orderAfterPolyline;

            polyline = L.polyline(polylineCoords, {
              color: 'blue'
            }).addTo(map);

            console.log("Порядок после построения полилинии:", orderAfterPolyline);
            console.log("Путь координат полилинии:", polylinePath);

            updateTableData(selectedMarkersOrder);

            savePolylineBuffer.push(polylinePath);
            shouldFlushPolylineBuffer = true;
          } else {
            console.log("Недостаточно маркеров для построения полилинии.");
          }
        } else {
          console.log("Нет выбранных маркеров для обновления порядка в таблице.");
        }
      }

      function updateTableData(selectedMarkersOrder) {
        var addresses = selectedMarkersOrder.map(function(marker) {
          return marker.address;
        });

        var applicationIds = selectedMarkersOrder.map(function(marker) {
          return marker.applicationId;
        });

        var requestData = {
          applicationids: applicationIds,
          pageNumber: pageNumber
          // Добавьте другие необходимые данные, если есть
        };

        console.log(requestData);

        updateTableBuffer.push(requestData);
        shouldFlushTableBuffer = true;
      }

      $(window).on('beforeunload', function() {
        flushSavePolylineBuffer();
        flushUpdateTableBuffer();
      });






      // Функция для обновления цифр в маркерах на карте
      function updateRowNumbers() {
        $('table tbody tr').each(function(index) {
          var newIndex = index + 1;
          var marker = findMarkerByIndex(newIndex);
          if (marker) {
            var markerHtml = '<div class="custom-marker">' + newIndex + '</div>';
            marker.setIcon(L.divIcon({
              className: 'custom-marker-icon',
              html: markerHtml
            }));
          }
        });
      }



      function toggleMove() {
        if ($('#moveCheckbox').prop('checked')) {
          $('#sortableTable tbody').sortable({
            handle: 'td:eq(1)',
            update: function(event, ui) {
              updateRowNumbers();
            }
          });
        } else {
          $('#sortableTable tbody').sortable('destroy');
        }
      }


      // Функция форматирования времени
      function formatTime(seconds) {
        var hours = Math.floor(seconds / 3600);
        var minutes = Math.floor((seconds % 3600) / 60);
        var formattedTime = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0');
        return formattedTime;
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
              } else {}
            } else {}
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
            address_id: addressId, // Используйте 'address_id' вместо 'id'
            new_region: regionName
          },
          success: function(response) {
            console.log(response.message);
          },
          error: function(error) {
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
          success: function(response) {
            console.log(response.message);
            console.log(polygonId);
          },
          error: function(error) {
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


      function loadPolylineToMap(routeNumber) {
        $.ajax({
          type: 'GET',
          url: '/loadPolylinesToMap',
          data: {
            routeNumber: routeNumber
          },
          success: function(response) {
            if (response.success) {
              // Полилиния успешно загружена, теперь можем использовать координаты
              var coordinates = response.coordinates;
              drawPolylineOnMap(coordinates);
            } else {
              console.error('Failed to load polyline:', response.message);
            }
          },
          error: function(error) {
            console.error('Error loading polyline:', error);
          }
        });
      }

      function drawPolylineOnMap(coordinates) {
        // Декодируем JSON-строку в массив JavaScript
        var decodedCoordinates = JSON.parse(coordinates);

        // Ваш код для отрисовки полилинии на карте
        // Используйте библиотеку Leaflet для работы с картой, например.
        var polyline = L.polyline(decodedCoordinates).addTo(map);
      }


      loadPolylineToMap(pageNumber);


      function openConfirmationModal() {
        var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'), {
          rootElement: document.body
        });

        console.log('а вот и модальное окно');

        // Добавляем одноразовый обработчик для кнопки "Да"
        $('#confirmSaveChanges').one('click', function() {
          shouldFlushBuffer = true; // Устанавливаем флаг, что нужно отправить данные
          confirmationModal.hide(); // Закрываем модальное окно


          // Вызываем функцию для отправки данных
          flushOrderUpdateBuffer();
          flushUpdateTableBuffer();
          flushSavePolylineBuffer()
          console.log('выполнено');
        });

        // Добавляем обработчик для кнопки "Нет"
        $('#confirmationModal').on('hidden.bs.modal', function() {
          shouldFlushBuffer = false; // Если закрыли окно без сохранения, сбрасываем флаг
          // Удаляем обработчик для кнопки "Да", чтобы избежать многократного выполнения
          $('#confirmSaveChanges').off('click');
        });

        confirmationModal.show();
      }
    </script>

    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmationModalLabel">Подтверждение сохранения изменений</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Уверены, что хотите сохранить изменения?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
            <button type="button" class="btn btn-primary" id="confirmSaveChanges">Да</button>
          </div>
        </div>
      </div>
    </div>


</body>

</html>


</body>

</html>