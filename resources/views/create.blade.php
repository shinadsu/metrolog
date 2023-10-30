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
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Главная</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Виджеты</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ 'assets/pages/ui-features/buttons.html' }}">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ 'assets/pages/ui-features/dropdowns.html' }}">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ 'assets/pages/ui-features/typography.html' }}">Typography</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
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
                <li class="nav-item"><a class="nav-link" href="{{ route('addresses.index') }}">Адреса</a></li>
              </ul>
            </div>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('contacts.index') }}">Контакты</a></li>
              </ul>
            </div>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('devices.index') }}">Девайсы</a></li>
              </ul>
            </div>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('applicationsandaddresses.index') }}">Заявки и Адреса</a></li>
              </ul>
            </div>
             @if(Auth::user()->role->name === 'metrolog')
                <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('metrlog.index') }}">Мои Заявки</a></li>
                    </ul>
                </div>
            @endif
            @if(Auth::user()->role->name === 'administrator')
                <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('userrequisitessettings.index') }}">Реквезиты</a></li>
                    </ul>
                </div>
            @endif
            @if(Auth::user()->role->name === 'administrator')
                <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('statustransitionsController.index') }}">Статусы</a></li>
                    </ul>
                </div>
            @endif
          </li>
      </nav>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Заполнение заявки</h4>
                  <form action="{{ route('create.store') }}" class="form-sample" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="fullname" class="col-sm-3 col-form-label">ФИО</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="text" id="fullname" name="fullname" required>
                          </div>
                        </div>
                      </div>    
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="status" class="col-sm-3 col-form-label">Статус</label>
                          <div class="col-sm-9">
                            <select class="form-control" id="status_id" name="status_id" required>
                                      @foreach($status as $statuses)
                                          <option value="{{ $statuses->id }}">{{ $statuses->name }}</option>
                                      @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                     </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="type_of_payment" class="col-sm-3 col-form-label">Тип оплаты</label>
                          <div class="col-sm-9">
                            <select id="type_of_payment" name="type_of_payment" class="form-control" required>
                              <option value="наличный">Наличный</option>
                              <option value="безналичный">Безналичный</option>
                            </select>
                          </div>
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                              <label for="metrolog_id" class="col-sm-3 col-form-label">Метролог</label>
                              <div class="col-sm-9">
                                  <select class="form-control" id="metrolog_id" name="metrolog_id" required>
                                      @foreach($Users as $user)
                                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>
                   

                     <!-- Поля для адреса -->
                    <p class="card-description">
                      Заполнение адреса
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="address" class="col-sm-3 col-form-label">Адрес</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="address" name="address" required />
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="district" class="col-sm-3 col-form-label">Район</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="district" name="district" required/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="logistic_area" class="col-sm-3 col-form-label">Логистическая зона</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="logistic_area" name="logistic_area" required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="logistic_floor" class="col-sm-3 col-form-label">Логистический этаж</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="logistic_floor" name="logistic_floor" required/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="floor" class="col-sm-3 col-form-label">Этаж</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="floor" name="floor" required />
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="intercom" class="col-sm-3 col-form-label">Домофон</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="intercom" name="intercom" required/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="entrance" class="col-sm-3 col-form-label">Подъезд</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="entrance" name="entrance" required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="guid_c" class="col-sm-3 col-form-label">GUID C</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="guid_c" name="guid_c" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                       <!-- заканчивающиеся поля для адреса -->

                     <!--  поля для устройства -->
                     <!-- <p class="card-description">
                      Поля устройства
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="factory_number" class="col-sm-3 col-form-label">Заводской номер</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="factory_number" name="factory_number" required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                            <label for="brand" class="col-sm-3 col-form-label">Бренд</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="brand" name="brand" required>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="device_type" class="col-sm-3 col-form-label">Тип устройства</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="device_type" name="device_type" required>
                                        @foreach($deviceTypes as $deviceType)
                                            <option value="{{ $deviceType->id }}">{{ $deviceType->device_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="grsi_number" class="col-sm-3 col-form-label">Grsi номер</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="grsi_number" name="grsi_number" required>
                                        @foreach($grsiNumbers as $grsiNumber)
                                            <option value="{{ $grsiNumber->id }}">{{ $grsiNumber->grsi_number_value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="scheduled_verification_date" class="col-sm-3 col-form-label">Дата плановой проверки</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="scheduled_verification_date" name="scheduled_verification_date" required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="release_year" class="col-sm-3 col-form-label">Год выпуска</label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" id="release_year" name="release_year" required/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="modification" class="col-sm-3 col-form-label">Модификация</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="modification" name="modification" required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="type" class="col-sm-3 col-form-label">Тип</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="type" name="type" required/>
                          </div>
                        </div>
                      </div>
                    </div> -->
                     <!--  закончившиеся поля для устройства -->

                     <!-- Поля для плательщика -->
                     <p class="card-description">
                      Поля плательщика
                    </p>
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group row">
                          <label for="actual" class="col-sm-3 col-form-label">Актуальность плательщика</label>
                          <div class="col-sm-9">
                            <select id="actual" name="actual" class="form-control" required>
                              <option value="актуальный">Актуальный</option>
                              <option value="не актуальный">не актуальный</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="payer_code" class="col-sm-3 col-form-label">Код плательщика</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="payer_code" name="payer_code" required/>
                          </div>
                        </div>
                      </div>
                    </div> 
                  
                    <!-- Поля для телефона -->
                    <p class="card-description">
                      Поля телефона
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="phone_number" class="col-sm-3 col-form-label">Номер телефона</label>
                          <div class="col-sm-9">
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="country_code" class="col-sm-3 col-form-label">Код страны</label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" id="country_code" name="country_code" required/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="city_code" class="col-sm-3 col-form-label">Код города</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="city_code" name="city_code" required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="extension_number" class="col-sm-3 col-form-label">Номер дополнительной линии</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="extension_number" name="extension_number" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Отправить заявку</button>    
                    </div>        
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
        <!-- content-wrapper ends -->
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
