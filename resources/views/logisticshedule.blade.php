<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>METROLOG</title>
  <!-- plugins:css -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.default.min.css">
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

  <link rel="stylesheet" href="{{ 'assets/css/vertical-layout-light/style.css' }}">
  <link rel="shortcut icon" href="{{ 'assets/images/favicon.png' }}" />
  <style>
html {
  box-sizing: border-box;
  font-size: 87.5%;
}

*, *::before, *::after {
  box-sizing: inherit;
}

body {
  font-family: "Open Sans", sans-serif;
  padding: 1em;
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
        max-width: 100%;
        margin-bottom: 20px; /* Add some bottom margin for spacing */
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 16px; /* Adjust the padding value for taller rows */
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .user {
        font-weight: bold;
    }

    .date-cell {
        min-width: 80px; /* Задайте минимальную ширину ячейки */
        white-space: nowrap; /* Запрет переноса строки внутри ячейки */
    }

    .text-center {
    text-align: center;
    }

    .Sat, .Sun {
          background-color: #c7a7d1; /* Светло-фиолетовый цвет */
      }

      .filter-container {
        display: flex;
        align-items: center;
    }

    .filter-container form {
        margin-right: 10px;
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
                <li class="nav-item"> <a class="nav-link" href="{{ route('applicationsandaddresses.index') }}">Заявки и
                    Адреса</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('addresses.index') }}">Адреса</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Контакты</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('contacts.index') }}">Контакты</a></li>
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
                    <li class="nav-item"> <a class="nav-link" href="{{ route('MetrologShedule.index') }}"> Наст. График Метролгов </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>


      @php
    use Carbon\Carbon;

    $daysOfWeek = [
        'Wed' => 'Среда',
        'Thu' => 'Четверг',
        'Fri' => 'Пятница',
        'Sat' => 'Суббота',
        'Sun' => 'Воскресенье',
        'Mon' => 'Понедельник',
        'Tue' => 'Вторник',
    ];
@endphp

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="calendar-container">
                <div class="filter-container">
                    <form method="get" action="{{ route('LogisticSettings.index') }}">
                        <label for="startPeriod">Период С:</label>
                        <input type="date" id="startPeriod" name="startPeriod" value="{{ $startPeriod }}" required>
                        <button type="submit">Применить</button>
                    </form>

                    <form method="get" action="{{ route('LogisticSettings.index') }}">
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
                            @for ($day = 0; $day < $daysToShow; $day++)
                                @php
                                    $date = $currentDate->copy()->addDay($day);
                                    $isSaturday = $date->dayOfWeek == Carbon::SATURDAY;
                                    $isSunday = $date->dayOfWeek == Carbon::SUNDAY;
                                @endphp
                                <th class="date-cell{{ $isSaturday ? ' Sat' : ($isSunday ? ' Sun' : '') }}">
                                    <div class="date-time-block">
                                        <div>{{ $daysOfWeek[$date->format('D')] }}</div>
                                        <div>{{ $date->format('d.m.Y') }}</div>
                                    </div>
                                </th>
                            @endfor
                            <th class="total-cell">Кол-во Смен</th> <!-- Новая ячейка -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="user" style="white-space: nowrap;">{{ $user->name }}</td>
                                @php
                                    $currentUserEvents = $events->filter(function ($event) use ($user, $startPeriod, $daysToShow) {
                                        return $event['title'] === $user->name &&
                                               $event['start'] >= Carbon::parse($startPeriod) &&
                                               $event['start'] < Carbon::parse($startPeriod)->addDays($daysToShow);
                                    });
                                @endphp

                                @for ($day = 0; $day < $daysToShow; $day++)
                                    @php
                                        $date = $currentDate->copy()->addDay($day);
                                        $formattedDate = $date->format('Y-m-d');
                                        $eventForDate = $currentUserEvents->first(function ($event) use ($formattedDate) {
                                            return $event['start']->toDateString() === $formattedDate;
                                        });
                                        $isScheduledIcon = $eventForDate ? '*' : '';
                                    @endphp

                                    <td class="text-center{{ $date->dayOfWeek == Carbon::SATURDAY ? ' saturday' : ($date->dayOfWeek == Carbon::SUNDAY ? ' sunday' : '') }}">{{ $isScheduledIcon }}</td>
                                @endfor

                                <td class="text-center">{{ $currentUserEvents->count() }}</td> <!-- Новая ячейка -->
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
                                        return $event['start']->toDateString() === $formattedDate;
                                    })->count();
                                @endphp
                                <td class="text-center">{{ $totalWorked }}</td>
                            @endfor

                            <td class="text-center">{{ $events->count() }}</td> <!-- Новая ячейка -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>










        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <script
          src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
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