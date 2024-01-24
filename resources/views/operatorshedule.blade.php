<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>METROLOG</title>
  <!-- plugins:css -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/air-datepicker@2.2.3/dist/css/datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />

  <link rel="stylesheet" href="{{ 'assets/vendors/feather/feather.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/ti-icons/css/themify-icons.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/css/vendor.bundle.base.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/ti-icons/css/themify-icons.css' }}">
  <link rel="stylesheet" type="{{ 'assets/text/css" href="js/select.dataTables.min.css' }}">
  <link rel="stylesheet" href="{{ 'assets/css/vertical-layout-light/style.css' }}">
  <link rel="shortcut icon" href="images/favicon.png" />


  <!-- Include Selectize.js JS -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ 'assets/css/vertical-layout-light/style.css' }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ 'assets/images/favicon.png' }}" />
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
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
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
                <li class="nav-item"> <a class="nav-link" href="{{ route('operatorshedule.index') }}">График Операторов</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('LogisticSettings.index') }}">График Логистов</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('metrologShowShedule.index') }}">График Метрологов</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="{{ route('applicationsandaddresses.index') }}">Заявки и Адреса</a></li>
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
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('userrequisitessettings.index') }}"> Реквезиты </a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('statustransitionsController.index') }}"> Статусы </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('logisticshedule.index') }}">
                                        Наст. График Логист </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('OperatorSettings.index') }}">
                                        Наст. График Оператор </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('MetrologShedule.index') }}"> Наст. График Метролгов </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('addRoleToUser.index') }}"> Установка роли пользователю </a></li>
                            </ul>
                        </div>
          </li>
        </ul>
      </nav>

      @php
      use Carbon\Carbon;

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
                <!-- Фильтр "Период С:" -->
                <form method="get" action="{{ route('operatorshedule.index') }}">
                  <label for="startPeriod">Период С:</label>
                  <input type="date" id="startPeriod" name="startPeriod" value="{{ $startPeriod }}" required>
                  <button type="submit">Применить</button>
                </form>

                <!-- Фильтр "Дней периода" -->
                <form method="get" action="{{ route('operatorshedule.index') }}">
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
                      $operatorSheduler = $user->OperatorShedules->first();
                      $uniqIdentefy = $operatorSheduler ? $operatorSheduler->uniqIdentefy : Str::random(50);
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
                      @endphp
                      @for ($day = 0; $day < $daysToShow; $day++)
                          @php
                              $date = $currentDate->copy()->addDay($day);
                              $formattedDate = $date->format('Y-m-d');
                              $eventForDate = $currentUserEvents->first(function ($event) use ($formattedDate) {
                                  return $event['start']->toDateString() === $formattedDate && $event['is_working_day'] === '*';
                              });
                              $isScheduledIcon = $eventForDate ? '*' : '';

                              // Увеличиваем $totalScheduled, если есть смена
                              $totalScheduled += $eventForDate ? 1 : 0;
                          @endphp

                          <td class="text-center{{ $isScheduledIcon ? ' scheduled' : '' }} {{ $date->dayOfWeek == Carbon::SATURDAY ? ' saturday' : ($date->dayOfWeek == Carbon::SUNDAY ? ' sunday' : '') }}" data-operator-id="{{ $user->id }}" data-uniq-identefy="{{ $uniqIdentefy }}" data-date="{{ $formattedDate }}" data-is-working-day="{{ $isScheduledIcon ? 1 : 0 }}">
                              {{ $isScheduledIcon }}
                          </td>
                        @endfor

                        <td class="text-center">{{ $totalScheduled }}</td>
                  </tr>
                  @endforeach

                  <tr>
                    <td class="user">ИТОГИ</td>
                    @php
                        $currentDate = Carbon::parse($startPeriod)->startOfDay();
                    @endphp

                    @for ($day = 0; $day < $daysToShow; $day++)
                        @php
                            $date = $currentDate->copy()->addDay($day);
                            $formattedDate = $date->format('Y-m-d');
                            $totalWorked = $events->filter(function ($event) use ($formattedDate) {
                                return $event['start']->toDateString() === $formattedDate && $event['is_working_day'] === '*';
                            })->count();
                        @endphp
                        <td class="text-center">{{ $totalWorked }}</td>
                    @endfor

                    <td class="text-center">{{ $events->where('is_working_day', '*')->count() }}</td> <!-- Новая ячейка -->
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>



      <script>
        
        
        var events = @json($events); // Передаем коллекцию событий из PHP в JavaScript
        var csrfToken = '{{ csrf_token() }}'; // Получаем CSRF-токен для запросов

        $(document).on('dblclick', '.text-center', function() {
          console.log('Double click event triggered.');

          var operator_id = $(this).data('operator-id');
          var uniqIdentefy = $(this).data('uniq-identefy');
          var date_start = $(this).data('date');
          var is_working_day = $(this).data('is-working-day');
          var userId = $(this).data('operator-id'); // Сохраняем userId

          // Тут не нужна проверка typeof is_scheduled, так как у вас это поле всегда существует

          // Toggle the state
          is_working_day = is_working_day ? 0 : 1;

          var clickedCell = $(this);

          $.ajax({
            type: 'POST',
            url: 'http://case.sknewlife.ru/updateScheduleOperators',
            data: {
              operator_id: operator_id,
              uniqIdentefy: uniqIdentefy,
              date_start: date_start,
              is_working_day: is_working_day,
              comment: null,
            },
            headers: {
              'X-CSRF-TOKEN': csrfToken,
            },
            success: function(response) {
              console.log('Data sent successfully:', response);

              // Обновление ячейки на основе нового значения is_scheduled
              clickedCell.data('is_working_day', is_working_day);
              clickedCell.text(is_working_day ? '*' : '');

              // Вызов функции для обновления отображения событий на странице
              updateEventDisplay(userId, date_start, is_working_day);
            },
            error: function(error) {
              console.error('Error sending data:', error);
            }
          });
        });

        // Добавьте этот код после вашего скрипта
        // Чтобы обновить отображение событий после успешного обновления
        function updateEventDisplay(operatorId, startDate, newIsWorkingDay) {
          var eventCell = $(`[data-operator-id="${operatorId}"][data-date="${startDate}"]`);
          eventCell.data('is-working-day', newIsWorkingDay);
          eventCell.text(newIsWorkingDay === 1 ? '*' : '');

          // Добавим следующие строки для более точного обновления атрибута "data-is-scheduled" в HTML
          eventCell.attr('data-is-working-day', newIsWorkingDay);

          // Также проверим, чтобы соответствующий элемент в коллекции events был обновлен
          var matchingEvent = events.find(event => event.title === operatorId && event.start.toDateString() === startDate);
          if (matchingEvent) {
            matchingEvent.is_working_day = newIsWorkingDay;
          }

          // Вывод обновленной коллекции событий в консоль для проверки
          console.log('Updated events collection:', events);
        }
      </script>






      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/air-datepicker@2.2.3/dist/js/datepicker.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/ru.js"></script>


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