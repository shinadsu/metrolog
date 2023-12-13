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
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2"> 
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{ 'assets/images/faces/face28.jpg' }}" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
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
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif

        </div>
      </nav>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
<li class="nav-item">
  <a class="nav-link" href="{{ url('/') }}">
 
    <span class="menu-title">Главная</span>
  </a>
</li>


<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
   
    <span class="menu-title">Заявки</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="form-elements">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"><a class="nav-link" href="{{ route('create.index') }}">Новая Заявка</a></li>
    </ul>
  </div>
      <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="{{ route('metrlog.index') }}">Мои Заявки</a></li>
          </ul>
      </div>
  
  
</li>
 </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
             
              <span class="menu-title">Инфо. Устройства</span>
              <i class="menu-arrow"></i>
            </a>    
            <div class="collapse" id="form-elements">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="{{ route('devices.index') }}">Девайсы</a></li>
            </ul>
          </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              
              <span class="menu-title">Инфо. Адреса</span>
              <i class="menu-arrow"></i>
            </a>    
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('addresses.index') }}">Адреса</a></li>
              </ul>
            </div>
             <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('applicationsandaddresses.index') }}">Заявки и Адреса</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
             
              <span class="menu-title">Котакт. Данные</span>
              <i class="menu-arrow"></i>
            </a>    
             <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('contacts.index') }}">Контакты</a></li>
              </ul>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
             
              <span class="menu-title">Админ. Данные</span>
              <i class="menu-arrow"></i>
            </a>    
             <div class="collapse" id="form-elements">
               <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('userrequisitessettings.index') }}">Реквезиты</a></li>
                </ul>
            </div>

            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('statustransitionsController.index') }}">Статусы</a></li>
                </ul>
            </div>
          </li>
</nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <!-- Настройка реквизитов заявки -->
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Настройка реквизитов заявки</h4>
                            <form action="{{ route('userrequisitessettings.store') }}" class="form-sample" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role_id">Группа пользователей</label>
                                            <select class="form-control" id="role_id" name="role_id" required>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="propses_id">Имя реквизита</label>
                                            <select class="form-control" id="propses_id" name="propses_id" required>
                                                @foreach($propses as $props)
                                                    <option value="{{ $props->id }}">{{ $props->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status_id">Статус</label>
                                            <select class="form-control" id="status_id" name="status_id" required>
                                                @foreach($status as $statuses)
                                                    <option value="{{ $statuses->id }}">{{ $statuses->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="access_type">Тип доступа</label>
                                            <select class="form-control" id="access_type" name="access_type" required>
                                                <option value="required">Обязательный</option>
                                                <option value="disabled">Отключенный</option>
                                                <option value="hidden">Скрытый</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="own_requests_allowed">Для своих заявок</label>
                                            <select class="form-control" id="own_requests_allowed" name="own_requests_allowed" required>
                                                <option value="1" @if(old('setting_enabled') == '1') selected @endif>Да</option>
                                                <option value="0" @if(old('setting_enabled') == '0') selected @endif>Нет</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="others_requests_allowed">Для чужик заявок</label>
                                            <select class="form-control" id="others_requests_allowed" name="others_requests_allowed" required>
                                                <option value="1" @if(old('setting_enabled') == '1') selected @endif>Да</option>
                                                <option value="0" @if(old('setting_enabled') == '0') selected @endif>Нет</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="setting_enabled">Значение</label>
                                            <select class="form-control" id="setting_enabled" name="setting_enabled" required>
                                                <option value="1" @if(old('setting_enabled') == '1') selected @endif>Да</option>
                                                <option value="0" @if(old('setting_enabled') == '0') selected @endif>Нет</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Сохранить настройки</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Данные о реквизитах -->
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Данные о настройке реквизитов</h4>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Роль</th>
                                    <th>Имя реквизита</th>
                                    <th>Статус</th>
                                    <th>Тип доступа</th>
                                    <th>Свои заявки</th>
                                    <th>Чужие заявки</th>
                                    <th>Включено</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($requisitesSettings as $setting)
                                <tr>
                                    <td>{{ $setting->role->name }}</td>
                                    <td>{{ $setting->prop->name }}</td>
                                    <td>{{ $setting->status->name }}</td>
                                    <td>{{ $setting->access_type }}</td>
                                    <td>{{ $setting->own_requests_allowed ? 'Да' : 'Нет' }}</td>
                                    <td>{{ $setting->others_requests_allowed ? 'Да' : 'Нет' }}</td>
                                    <td>{{ $setting->setting_enabled ? 'Да' : 'Нет' }}</td>
                                </tr>
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
  <script src="{{ 'assets/vendors/js/vendor.bundle.base.js' }} "></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ 'assets/vendors/typeahead.js/typeahead.bundle.min.js' }} "></script>
  <script src="{{ 'assets/vendors/select2/select2.min.js' }} "></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ 'assets/js/off-canvas.js' }} "></script>
  <script src="{{ 'assets/js/hoverable-collapse.js' }} "></script>
  <script src="{{ 'assets/js/template.js' }} "></script>
  <script src="{{ 'assets/js/settings.js' }} "></script>
  <script src="{{ 'assets/js/todolist.js' }} "></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ 'assets/js/file-upload.js' }} "></script>
  <script src="{{ 'assets/js/typeahead.js' }} "></script>
  <script src="{{ 'assets/js/select2.js' }} "></script>
  <!-- End custom js for this page-->
</body>

</html>
