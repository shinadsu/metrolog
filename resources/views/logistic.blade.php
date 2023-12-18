<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>METROLOG</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ 'assets/vendors/feather/feather.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/ti-icons/css/themify-icons.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/css/vendor.bundle.base.css' }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ 'assets/vendors/select2/select2.min.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css' }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ 'assets/css/vertical-layout-light/style.css' }}">
  <!-- endinject -->
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
                <li class="nav-item"> <a class="nav-link" href="{{ route('userrequisitessettings.index') }}"> Реквезиты </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('statustransitionsController.index') }}"> Статусы </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('logisticshedule.index') }}"> Наст. График Логист </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('OperatorSettings.index') }}"> Наст. График Оператор </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Установка графика работы Логистов</h4>
                        <form action="{{ route('LogisticSettingsAdd.store') }}" class="form-sample" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="logist_id">Логист</label>
                                <select class="form-control" id="logist_id" name="logist_id" required>
                                    @foreach($logisticSettings as $logisticSetting)
                                        <option value="{{ $logisticSetting->id }}">{{ $logisticSetting->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date">Дата</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="start_date">Дата и время начала</label>
                                <input type="datetime-local" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            <div class="form-group">
                                <label for="end_date">Дата и время окончания</label>
                                <input type="datetime-local" class="form-control" id="end_date" name="end_date" required>
                            </div>
                            <div class="form-group">
                                <label for="is_scheduled">В графике</label>
                                <select class="form-control" id="is_scheduled" name="is_scheduled" required>
                                    <option value="1" @if(old('is_scheduled') == '1') selected @endif>Да</option>
                                    <option value="0" @if(old('is_scheduled') == '0') selected @endif>Нет</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="reasonForNot">Причина отсутствия в графике</label>
                                <textarea class="form-control" id="reasonForNot" name="reasonForNot" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Сохранить настройки</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Данные о реквизитах -->
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">График работы логистов</h4>
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Логист</th>
                            <th>Дата</th>
                            <th>Дата и время начала</th>
                            <th>Дата и время окончания</th>
                            <th>В графике</th>
                            <th>Причина отсутствия в графике</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logisticSettings as $user)
                            @foreach($user->logisticShedules as $logisticSetting)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $logisticSetting->date }}</td>
                                    <td>{{ $logisticSetting->start_date }}</td>
                                    <td>{{ $logisticSetting->end_date }}</td>
                                    <td>{{ $logisticSetting->is_scheduled == '1' ? 'Да' : 'Нет' }}</td>
                                    <td>{{ $logisticSetting->reasonForNot }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




        
        <!-- partial:../../partials/_footer.html -->

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
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
