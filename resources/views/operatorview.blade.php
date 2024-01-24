<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>METROLOG</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{  'assets/vendors/feather/feather.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/ti-icons/css/themify-icons.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/css/vendor.bundle.base.css' }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ 'assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/ti-icons/css/themify-icons.css' }}">
  <link rel="stylesheet" type="text/css" href="{{ 'assets/js/select.dataTables.min.css' }}">
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

/* kbd {
  background: #ddd;
  border-radius: 0.2em;
  box-shadow: 0 1px 0 0 rgba(0, 0, 0, 0.25);
  padding-left: 0.2em;
  padding-right: 0.2em;
} */
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
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
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
   
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">Заявка #{{ $application->id }}</div>
                    <div class="card-body">
                        <h4 class="card-title">ФИО: {{ $application->fullname }}</h4>
                        <h4 class="card-title">Статус: 
                            @if ($application->status === 'не завершена')
                                <span class="badge badge-danger">Не завершена</span>
                            @elseif ($application->status === 'в процессе')
                                <span class="badge badge-warning">В процессе</span>
                            @elseif ($application->status === 'завершена')
                                <span class="badge badge-success">Завершена</span>
                            @else
                                <label class="badge badge-info">{{ $application->status->name }}</label>
                            @endif
                        </h4>
                        <h4 class="card-title">Дата создания: {{ $application->created_at }}</h4>

                        <h4 class="card-title">Адреса:</h4>
                        <ul>
                            @foreach ($addresses as $address)
                                <li>{{ $address->address }}</li>
                            @endforeach
                        </ul>

                        <h4 class="card-title">Телефоны:</h4>
                        <ul>
                            @foreach ($phones as $phone)
                                <li>{{ $phone->phone_number }}</li>
                            @endforeach
                        </ul>

                        <h4 class="card-title">Плательщики:</h4>
                        <ul>
                            @foreach ($payers as $payer)
                                <li>{{ $payer->payer_code }}</li>
                            @endforeach
                        </ul>

                        <h4 class="card-title">Устройства:</h4>
                        <ul>
                            @foreach ($devices as $device)
                                <li>{{ $device->factory_number }}</li>
                            @endforeach
                        </ul>
                        
                        <!-- Кнопка "Добавить устройство", Модальное окно и форма добавления устройства -->
                        <!-- Кнопка для открытия выпадающего меню -->
                       <button class="btn btn-primary" data-toggle="modal" data-target="#addDeviceModal">
                            Добавить устройство
                        </button>

                        <!-- Выпадающее меню с формой добавления устройства -->
                        <div class="modal fade" id="addDeviceModal" tabindex="-1" role="dialog" aria-labelledby="addDeviceModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addDeviceModalLabel">Добавить устройство</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Форма добавления устройства -->
                                            <form action="{{ route('devices.store') }}" method="POST">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="factory_number">Заводской номер</label>
                                                    <input type="text" class="form-control" id="factory_number" name="factory_number" required>
                                                </div>
                                                <!-- Поле brand_id -->
                                                <div class="form-group">
                                                    <label for="brand">Бренд</label>
                                                    <select class="form-control" id="brand" name="brand" required>
                                                        @foreach($brandsguide as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- Поле device_type_id -->
                                                <div class="form-group">
                                                    <label for="device_type">Тип устройства</label>
                                                    <select class="form-control" id="device_type" name="device_type" required>
                                                        @foreach($deviceGuide as $deviceType)
                                                            <option value="{{ $deviceType->id }}">{{ $deviceType->device_type_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- Поле grsi_number_id -->
                                                <div class="form-group">
                                                    <label for="grsi_number">Grsi номер</label>
                                                    <select class="form-control" id="grsi_number" name="grsi_number" required>
                                                        @foreach($GRSIGuide as $grsiNumber)
                                                            <option value="{{ $grsiNumber->id }}">{{ $grsiNumber->grsi_number_value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="scheduled_verification_date">Запланированная дата проверки</label>
                                                    <input type="text" class="form-control" id="scheduled_verification_date" name="scheduled_verification_date" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="release_year">Год выпуска</label>
                                                    <input type="number" class="form-control" id="release_year" name="release_year" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="modification">Модификация</label>
                                                    <input type="text" class="form-control" id="modification" name="modification" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="type">Тип</label>
                                                    <input type="text" class="form-control" id="type" name="type" required>
                                                </div>
                                                <!-- Поле address_id (скрытое) - передайте значение адреса заявки -->
                                                <input type="hidden" name="address_id" value="{{ $address->id }}">
                                                <!-- Кнопка для отправки формы -->
                                                <button type="submit" class="btn btn-primary">Добавить</button>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>


     

  <!-- plugins:js -->

    <script>
    $(document).ready(function() {
        // При нажатии на кнопку "Добавить устройство"
        $("#openDeviceModal").click(function() {
            // Показать выпадающее меню
            $("#deviceDropdown").show();
        });
    });
    </script>
  <!-- End plugin js for this page -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/air-datepicker@2.2.3/dist/js/datepicker.min.js"></script>

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

</html>

