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
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Установка графика работы Метрологов</h4>
                        <form action="{{ route('MetrologSheduleStore.store') }}" class="form-sample" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="metrolog_id">Метролог</label>
                                <select class="form-control" id="metrolog_id" name="metrolog_id" required>
                                    @foreach($MetrologShedules as $MetrologShedule)
                                        <option value="{{ $MetrologShedule->id }}">{{ $MetrologShedule->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date_start">Дата начала</label>
                                <input type="date" class="form-control" id="date_start" name="date_start" required>
                            </div>
                            <div class="form-group">
                                <label for="is_working_day">В графике</label>
                                <select class="form-control" id="is_working_day" name="is_working_day" required>
                                    <option value="1" @if(old('is_scheduled') == '1') selected @endif>Да</option>
                                    <option value="0" @if(old('is_scheduled') == '0') selected @endif>Нет</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="day_off">Выходные</label>
                                <select class="form-control" id="day_off" name="day_off" required>
                                    <option value="1" @if(old('day_off') == '1') selected @endif>Да</option>
                                    <option value="0" @if(old('day_off') == '0') selected @else selected @endif>Нет</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sick_leave">Больничный</label>
                                <select class="form-control" id="sick_leave" name="sick_leave" required>
                                    <option value="1" @if(old('sick_leave') == '1') selected @endif>Да</option>
                                    <option value="0" @if(old('sick_leave') == '0') selected @else selected @endif>Нет</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="other_leave">Другая причина</label>
                                <select class="form-control" id="other_leave" name="other_leave" required>
                                    <option value="1" @if(old('other_leave') == '1') selected @endif>Да</option>
                                    <option value="0" @if(old('other_leave') == '0') selected @else selected @endif>Нет</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="comment">Комментарий</label>
                                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
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
                    <h4 class="card-title">График работы метрологов</h4>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Метролог</th>
                                    <th>Дата начала работы</th>
                                    <th>В графике</th>
                                    <th>Выходные</th>
                                    <th>Больничный</th>
                                    <th>Дургая причина</th>
                                    <th>Комментарий</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($MetrologShedules as $user)
                                    @foreach($user->MetrologShedules as $MetrologShedule)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $MetrologShedule->date_start }}</td>
                                            <td>{{ $MetrologShedule->is_working_day == '1' ? 'Да' : 'Нет' }}</td>
                                            <td>{{ $MetrologShedule->day_off == '1' ? 'Да' : 'Нет' }}</td>
                                            <td>{{ $MetrologShedule->sick_leave == '1' ? 'Да' : 'Нет' }}</td>
                                            <td>{{ $MetrologShedule->other_leave == '1' ? 'Да' : 'Нет' }}</td>
                                            <td>{{ $MetrologShedule->comment }}</td>
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
