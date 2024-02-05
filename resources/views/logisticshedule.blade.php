<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>METROLOG</title>
  <!-- plugins:css -->

  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

  <!-- JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/air-datepicker@2.2.3/dist/css/datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css" />
  <link rel="stylesheet" href="{{ 'assets/vendors/feather/feather.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/ti-icons/css/themify-icons.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/css/vendor.bundle.base.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/ti-icons/css/themify-icons.css' }}">
  <link rel="stylesheet" type="{{ 'assets/text/css" href="js/select.dataTables.min.css' }}">
  <link rel="stylesheet" href="{{ 'assets/css/vertical-layout-light/style.css' }}">
  <link rel="shortcut icon" href="images/favicon.png" />

  <link rel="stylesheet" href="{{ 'assets/css/vertical-layout-light/style.css' }}">
  <link rel="shortcut icon" href="{{ 'assets/images/favicon.png' }}" />
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <style>
    html {
      box-sizing: border-box;
      font-size: 75%;
    }

    *,
    *::before,
    *::after {
      box-sizing: inherit;
    }

    body {
      font-family: "Open Sans", sans-serif;
      padding: 0.5em;
      /* Уменьшение отступов */
      margin: 0;
      /* Удаление внешних отступов body */
    }

    .container-scroller {
      margin: 0;
      /* Удаление внешних отступов container-scroller */
    }

    p {
      margin-top: 0;
    }

    h1 {
      font-weight: 700;
      margin-top: 0;
    }

    h2 {
      font-weight: 700;
      margin-top: 0;
    }

    h3 {
      font-weight: 700;
      margin-top: 0;
    }

    h4 {
      font-weight: 700;
      margin-top: 0;
    }

    h5 {
      font-weight: 700;
      margin-top: 0;
    }

    h6 {
      font-weight: 700;
      margin-top: 0;
    }

    .calendar-container {
      overflow-x: auto;
      max-width: 2000px;
      margin-bottom: 20px;
      /* Add some bottom margin for spacing */
    }

    .calendar-container table th,
    .calendar-container table td {
      width: 60px;
      /* Изменяем ширину всех ячеек в календаре */
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;

    }

    .user {
      font-weight: bold;
    }

    .date-cell {
      min-width: 10px;
      /* Задайте минимальную ширину ячейки */
      white-space: nowrap;
      /* Запрет переноса строки внутри ячейки */
    }

    .text-center {
      text-align: center;
    }

    .Sat,
    .Sun {
      background-color: #c7a7d1;
      /* Светло-фиолетовый цвет */
    }

    .filter-container {
      display: flex;
      align-items: center;
    }

    .filter-container form {
      margin-right: 10px;
    }

    .schedule-cell.clicked {
      background-color: lightblue;
      /* Add your desired highlight style */
      cursor: pointer;
    }

    .scheduled {
      color: green;
      /* Choose your desired color for scheduled cells */
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            @if(Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              {{ __('Выход') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register') }}">{{ __('Register') }}</a>
          </li>
          @endif
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <div class="theme-setting-wrapper">
      </div>
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Главная</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Заявки</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('create.index') }}">Новая Заявка</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('metrlog.index') }}">Мои Заявки</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
              aria-controls="form-elements">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Устройства</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('devices.index') }}">Девайсы</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Графики Работ</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('operatorshedule.index') }}">График
                    Операторов</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('LogisticSettings.index') }}">График
                    Логистов</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('metrologShowShedule.index') }}">График
                    Метрологов</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Инфо. Адреса</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('applicationsandaddresses.index') }}">Заявки и
                    Адреса</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('addresses.index') }}">Адреса</a></li>
              </ul>
            </div>
          </li>





          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Админка</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('userrequisitessettings.index') }}"> Реквезиты
                  </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('statustransitionsController.index') }}">
                    Статусы </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('logisticshedule.index') }}"> Наст. График
                    Логист </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('OperatorSettings.index') }}"> Наст. График
                    Оператор </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('MetrologShedule.index') }}"> Наст. График
                    Метролгов </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>


      @php
      use Carbon\Carbon;
      use Carbon\CarbonPeriod;

      $daysOfWeek = [
      'Wed' => 'Ср',
      'Thu' => 'Чт',
      'Fri' => 'Пт',
      'Sat' => 'Сб',
      'Sun' => 'Вс',
      'Mon' => 'Пн',
      'Tue' => 'Вт',
      ];


      $uniqIdentefies = [];

      @endphp

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="calendar-container">
              <div class="filter-container">
                <form method="get" action="{{ route('LogisticSettings.index') }}">
                  <label for="startPeriod">Период С:</label>
                  <input type="date" id="startPeriod" name="startPeriod" value="{{ $startPeriod }}" required>

                  <label for="daysFilter">Дней периода:</label>
                  <input type="number" id="daysFilter" name="daysFilter" value="{{ $daysFilter ?? 30 }}" min="1">

                  <button type="submit">Применить</button>
                </form>
              </div>
              <table>
                <thead>
                  <tr>
                    <th></th> <!-- Пустая ячейка в верхнем левом углу -->
                    @php
                    $currentDate = Carbon::parse($startPeriod)->startOfDay();
                    $daysToShow = isset($daysFilter) ? $daysFilter : 30;
                    @endphp
                    @for ($day = 0; $day < $daysToShow; $day++) @php $date=$currentDate->copy()->addDay($day);
                      $isSaturday = $date->dayOfWeek == Carbon::SATURDAY;
                      $isSunday = $date->dayOfWeek == Carbon::SUNDAY;
                      @endphp
                      <th class="date-cell{{ $isSaturday ? ' Sat' : ($isSunday ? ' Sun' : '') }}">
                        <div class="date-time-block">
                          <div>{{ $daysOfWeek[$date->format('D')] }}</div>
                          <div>{{ $date->format('d.m') }}</div>
                        </div>
                      </th>
                      @endfor
                      <th class="total-cell">Кол-во Смен</th> <!-- Новая ячейка -->
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  @php
                  $logisticShedule = $user->logisticShedules->first();
                  $uniqIdentefy = $logisticShedule ? $logisticShedule->uniqIdentefy : Str::random(50);
                  $uniqIdentefies[$user->id] = $uniqIdentefy;
                  $currentUserEvents = $events->filter(function ($event) use ($user, $startPeriod, $daysToShow) {
                  return $event['title'] === $user->name &&
                  $event['start'] >= Carbon::parse($startPeriod) &&
                  $event['start'] < Carbon::parse($startPeriod)->addDays($daysToShow);
                    });
                    @endphp

                    <tr>
                      <td class="user" style="white-space: nowrap;">
                        <span data-user-id="{{ $user->id }}" data-uniq-identefy="{{ $uniqIdentefy }}">
                          {{ $user->name }}
                        </span>
                      </td>

                      @php
                      $totalScheduled = 0;
                      $totalShifts = 0; // Добавили переменную для подсчета количества смен
                      @endphp

                      @for ($day = 0; $day < $daysToShow; $day++) @php $currentDateCopy=$currentDate->
                        copy()->addDay($day);
                        $formattedDate = $currentDateCopy->toDateString();

                        // Check if there's any event for the current date with is_scheduled = '*'
                        $eventForDate = $currentUserEvents->first(function ($event) use ($formattedDate) {
                        $startDate = Carbon::parse($event['start']);
                        return $startDate->toDateString() === $formattedDate && $event['is_scheduled'] === '*';
                        });

                        // Set $isScheduledIcon to '*' if there's an event with is_scheduled = '*' for the current date
                        $isScheduledIcon = $eventForDate ? '*' : '';

                        // Увеличиваем $totalScheduled, если есть смена
                        $totalScheduled += $isScheduledIcon ? 1 : 0;

                        // Увеличиваем $totalShifts, если есть смена (не учитывая графики с причиной)
                        if ($isScheduledIcon && $eventForDate && !isset($eventForDate['reasonForNot'])) {
                        $totalShifts++;
                        }

                        $startDate = isset($eventForDate['start']) ? Carbon::parse($eventForDate['start']) : null;
                        $endDate = isset($eventForDate['end']) ? Carbon::parse($eventForDate['end']) : null;
                        $dateRange = $startDate && $endDate ? iterator_to_array(CarbonPeriod::create($startDate,
                        $endDate)) : [];
                        $reasonColor = $eventForDate && isset($eventForDate['reasonForNot']) ? 'background-color:
                        transparent;' : 'background-color: transparent;'; // Значение по умолчанию
                        @endphp

                        <td
                          class="text-center{{ $isScheduledIcon ? ' scheduled' : '' }} {{ $currentDateCopy->dayOfWeek == Carbon::SATURDAY ? ' saturday' : ($currentDateCopy->dayOfWeek == Carbon::SUNDAY ? ' sunday' : '') }}"
                          data-logist-id="{{ $user->id }}" data-uniq-identefy="{{ $uniqIdentefy }}"
                          data-date="{{ $formattedDate }}" data-is-scheduled="{{ $isScheduledIcon && !$eventForDate['reasonForNot'] ? 1 : 0 }}">

                          @if ($isScheduledIcon && $eventForDate && isset($eventForDate['reasonForNot']) &&
                          $eventForDate['is_scheduled'] === '*')
                          @php
                          $reasonColor = '';
                          switch ($eventForDate['reasonForNot']) {
                          case 'Больничный':
                          $reasonColor = 'background-color: red;';
                          break;
                          case 'Дежурство':
                          $reasonColor = 'background-color: blue;';
                          break;
                          case 'Невыход Без объяснения':
                          $reasonColor = 'background-color: yellow;';
                          break;
                          case 'Отпуск':
                          $reasonColor = 'background-color: green;';
                          break;
                          case 'По семейным обст-вам':
                          $reasonColor = 'background-color: orange;';
                          break;
                          case 'Поломка машины':
                          $reasonColor = 'background-color: brown;';
                          break;
                          case 'Снят с маршрута':
                          $reasonColor = 'background-color: purple;';
                          break;
                          }
                          @endphp

                          @elseif ($isScheduledIcon)
                          <div class="schedule-info" style="background-color: transparent;">*</div>
                          @else
                          <div>{{ $isScheduledIcon }} </div>
                          @endif
                        </td>
                        @endfor


                        <td class="text-center">{{ $totalShifts }}</td>
                        <!-- Добавили ячейку для вывода количества смен -->
                    </tr>
                    @endforeach


                    <tr>
                      <td class="user">ИТОГИ</td>
                      @php
                      $currentDate = Carbon::parse($startPeriod)->startOfDay();
                      @endphp

                      @for ($day = 0; $day < $daysToShow; $day++) @php $date=$currentDate->copy()->addDay($day);
                        $formattedDate = $date->format('Y-m-d');
                        // Исключаем события с заполненным полем 'reasonForNot' из подсчета
                        $totalWorked = $eventsForTotals->filter(function ($event) use ($formattedDate) {
                        return $event['start']->toDateString() === $formattedDate && $event['is_scheduled'] === '*' &&
                        empty($event['reasonForNot']);
                        })->count();
                        @endphp
                        <td class="text-center">{{ $totalWorked }}</td>
                        @endfor

                        <td class="text-center">{{ $totalShifts }}</td> <!-- Используем заранее посчитанное значение -->
                    </tr>
                </tbody>
              </table>
            </div>


            <form method="post" action="{{ route('updateScheduleLogistics.storeLogistShedule') }}" id="yourFormId">
              @csrf
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="custom-card bg-white w-50 rounded">
                  <div class="custom-card-body">

                    <div class="mb-3">
                      <label for="logist" class="form-label mb-1">Логист</label>
                      <select class="form-select form-select-sm w-75" id="logist" name="logist">
                        <option value="" data-uniqIdentefy="">Выберите логиста</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}"
                          data-uniqIdentefy="{{ $user->logisticShedules->first()->uniqIdentefy ?? '' }}">{{ $user->name
                          }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="reasonForNot" class="form-label mb-1">Причина невыхода</label>
                      <select class="form-select form-select-sm w-75" id="reasonForNot" name="reasonForNot">
                        @foreach($notjob as $notjobs)
                        <option value="{{ $notjobs->name }}">{{ $notjobs->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="commentary" class="form-label mb-1">Комментарий</label>
                      <input type="text" class="form-control form-control-sm w-75" id="commentary" name="commentary">
                    </div>

                    <div class="mb-3">
                      <label for="date_interval" class="form-label mb-1">Дата</label>
                      <input type="text" class="form-control form-control-sm w-75" id="date_interval"
                        name="date_interval">
                    </div>

                    <!-- Скрытое поле для uniqIdentefy -->
                    <input type="hidden" id="uniqIdentefy" name="uniqIdentefy" value="">


                    <button type="submit" class="btn btn-primary">Сохранить</button>

                  </div>
                </div>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script>
      $(function () {
        $('#date_interval').daterangepicker({
          opens: 'right',
          locale: { format: 'YYYY.MM.DD' }  // Update t      ormat toY'
        });
    });
    </script>


<script>
  // Обработчик события изменения значения select
  document.getElementById('logist').addEventListener('change', function () {
    // Получаем выбранный элемент option
    var selectedOption = this.options[this.selectedIndex];

    // Получаем значение data-uniqIdentefy из выбранного элемента и устанавливаем его в скрытое поле
    document.getElementById('uniqIdentefy').value = selectedOption.getAttribute('data-uniqIdentefy');
  });

  // Обработчик отправки формы
  document.getElementById('yourFormId').addEventListener('submit', function () {
    // Устанавливаем значение скрытого поля uniqIdentefy в FormData перед отправкой формы
    var formData = new FormData(this);
    formData.set('uniqIdentefy', document.getElementById('uniqIlue'));
  });
</script>


<script>
  var userEvents = @json($events);
  var currentDate = @json($originalDate -> toDateString());
  var daysToShow = @json($daysFilter);
  var selectedCell = null; // Хранит информацию о выбранной ячейке

  var intervalStartDate = new Date(userEvents.start);
  var intervalEndDate = new Date(userEvents.end);

  if (userEvents.length > 0) {
    // Проходимся по всем событиям
    userEvents.forEach(function (eventForDate) {
      // Добавляем проверку наличия свойства 'start'
      if (eventForDate.start) {
        // Преобразуем даты начала и конца интервала
        var intervalStartDate = new Date(eventForDate.start);
        var intervalEndDate = new Date(eventForDate.end);

        // Начинаем отображение интервала с даты начала
        while (intervalStartDate <= intervalEndDate) {
          var formattedIntervalDate = intervalStartDate.toISOString().split('T')[0];
          var intervalCell = document.querySelector('[data-date="' + formattedIntervalDate + '"][data-logist-id="' + eventForDate.logist_id + '"]');

          // Если ячейка найдена, устанавливаем стили
          if (intervalCell) {
            var reasonColor = getColorForReason(eventForDate.reasonForNot);
            intervalCell.classList.add('scheduled');
            intervalCell.style.backgroundColor = reasonColor;

            console.log('Ячейка в интервале:', intervalCell);
            console.log('дата:', intervalStartDate);
            console.log('Цвет фона для ячейки в интервале:', reasonColor);
          }

          // Переходим к следующей дате
          intervalStartDate.setDate(intervalStartDate.getDate() + 1);
        }
      }
    });
  }

  // Функция для определения цвета в зависимости от причины
  function getColorForReason(reason) {
    switch (reason) {
      case 'Больничный':
        return 'red';
      case 'Дежурство':
        return 'blue';
      case 'Невыход Без объяснения':
        return 'yellow';
      case 'Отпуск':
        return 'green';
      case 'По семейным обст-вам':
        return 'orange';
      case 'Поломка машины':
        return 'brown';
      case 'Снят с маршрута':
        return 'purple';
      default:
        return 'transparent';
    }
  }

  // Обрабатываем каждый день в интервале
  for (var i = 0; i < daysToShow; i++) {
    var date = new Date(currentDate);
    date.setDate(date.getDate() + i);
    var formattedDate = date.toISOString().split('T')[0];

    console.log('Обработка дня:', formattedDate);

    // Находим событие для текущей даты
    var eventForDate = userEvents.find(function (event) {
      return event.start === formattedDate && event.is_scheduled === '*';
    });

    // Проверяем наличие события
    if (eventForDate) {
      // Находим ячейку для текущей даты
      var cell = document.querySelector('[data-date="' + formattedDate + '"][data-logist-id="' + eventForDate.logist_id + '"]');
      console.log('Ячейка для текущей даты:', cell);

      // Если есть событие, устанавливаем стили
      var reasonColor = getColorForReason(eventForDate.reasonForNot);
      cell.classList.add('scheduled');
      cell.style.backgroundColor = reasonColor;

      // Добавляем обработчик события для двойного клика
      cell.addEventListener('dblclick', function () {
        // Проверяем, была ли уже выбрана ячейка
        if (selectedCell) {
          // Убираем выделение только для предыдущей выбранной ячейки
          selectedCell.classList.remove('default-selection');
        }

        // Добавляем выделение только для текущей ячейки
        cell.classList.add('default-selection');
        selectedCell = cell;
      });

      console.log('Событие для текущей даты:', eventForDate);
      console.log('Цвет фона для текущей ячейки:', reasonColor); // Добавим эту строку

      // Если есть интервал, устанавливаем стили для других ячеек в интервале
      if (eventForDate.start && eventForDate.end) {
        var startDate = new Date(eventForDate.start);
        var endDate = new Date(eventForDate.end);

        while (startDate <= endDate) {
          var formattedIntervalDate = startDate.toISOString().split('T')[0];
          var intervalCell = document.querySelector('[data-date="' + formattedIntervalDate + '"][data-logist-id="' + eventForDate.logist_id + '"]');

          // Убираем стили только для выбранной ячейки
          if (intervalCell && formattedIntervalDate !== formattedDate) {
            intervalCell.classList.add('scheduled');
            intervalCell.style.backgroundColor = reasonColor;

            console.log('Ячейка в интервале:', intervalCell);
            console.log('Цвет фона для ячейки в интервале:', reasonColor); // Добавим эту строку
          }

          startDate.setDate(startDate.getDate() + 1);
        }
      }
    }
  }
</script>














    <!-- Ваш HTML-код -->
    <script>


      var events = @json($events); // Передаем коллекцию событий из PHP в JavaScript
      var csrfToken = '{{ csrf_token() }}'; // Получаем CSRF-токен для запросов

      $(document).on('dblclick', '.text-center', function () {
        console.log('Double click event triggered.');

        var logist_id = $(this).data('logist-id');
        var uniqIdentefy = $(this).data('uniq-identefy');
        var start_date = $(this).data('date');
        var is_scheduled = $(this).data('is-scheduled');
        var userId = $(this).data('logist-id'); // Сохраняем userId

        // Тут не нужна проверка typeof is_scheduled, так как у вас это поле всегда существует

        // Toggle the state
        is_scheduled = is_scheduled ? 0 : 1;

        var clickedCell = $(this);

        $.ajax({
          type: 'POST',
          url: 'http://case.sknewlife.ru/updateScheduleLogistic',
          data: {
            logist_id: logist_id,
            uniqIdentefy: uniqIdentefy,
            start_date: start_date,
            is_scheduled: is_scheduled,
            reasonForNot: null,
          },
          headers: {
            'X-CSRF-TOKEN': csrfToken,
          },
          success: function (response) {
            console.log('Data sent successfully:', response);

            // Обновление ячейки на основе нового значения is_scheduled
            clickedCell.data('is-scheduled', is_scheduled);
            clickedCell.text(is_scheduled ? '*' : '');

            // Вызов функции для обновления отображения событий на странице
            updateEventDisplay(userId, start_date, is_scheduled);
          },
          error: function (error) {
            console.error('Error sending data:', error);
          }
        });
      });

      // Добавьте этот код после вашего скрипта
      // Чтобы обновить отображение событий после успешного обновления
      function updateEventDisplay(logistId, startDate, newIsScheduled) {
        var eventCell = $(`[data-logist-id="${logistId}"][data-date="${startDate}"]`);
        eventCell.data('is-scheduled', newIsScheduled);
        eventCell.text(newIsScheduled === 1 ? '*' : '');

        // Добавим следующие строки для более точного обновления атрибута "data-is-scheduled" в HTML
        eventCell.attr('data-is-scheduled', newIsScheduled);

        // Также проверим, чтобы соответствующий элемент в коллекции events был обновлен
        var matchingEvent = events.find(event => event.title === logistId && event.start.toDateString() === startDate);
        if (matchingEvent) {
          matchingEvent.is_scheduled = newIsScheduled;
        }

        // Вывод обновленной коллекции событий в консоль для проверки
        console.log('Updated ts collection:', events);
      }
    </script>



<script>
    function applyFilters() {
        // Сохраняем значение фильтра "Период С" в localStorage
        localStorage.setItem('startPeriod', document.getElementById('startPeriod').value);
    }

    // При загрузке страницы восстанавливаем значение фильтра "Период С" из localStorage
    document.addEventListener('DOMContentLoaded', function() {
        var savedStartPeriod = localStorage.getItem('startPeriod');
        if (savedStartPeriod) {
            document.getElementById('startPeriod').value = savedStartPeriod;
        }
    });
</script>
    <!-- Ваш HTML-код продолжается -->







    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/air-datepicker@2.2.3/dist/js/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/ru.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.js"></script>


    <!-- FullCalendar JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="{{ 'assets/vendors/typeahead.js/typeahead.bundle.min.js' }} "></script>
    <script src="{{ 'assets/vendors/select2/select2.min.js' }} "></script>
    <script src="{{ 'assets/js/off-canvas.js' }} "></script>
    <script src="{{ 'assets/js/hoverable-collapse.js' }} "></script>
    <script src="{{ 'assets/js/template.js' }} "></script>
    <script src="{{ 'assets/js/settings.js' }} "></script>
    <script src="{{ 'assets/js/todolist.js' }} "></script>
    <script src="{{ 'assets/js/file-upload.js' }} "></script>
    <script src="{{ 'assets/js/typeahead.js' }} "></script>
    <script src="{{ 'assets/js/select2.js' }} "></script>


   
    <!-- End custom js for this page-->
</body>

</html