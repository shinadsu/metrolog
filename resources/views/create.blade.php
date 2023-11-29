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
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ 'assets/vendors/select2/select2.min.css' }}">
<link rel="stylesheet" href="{{ 'assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css' }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
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
        <form action="{{ route('create.store') }}" class="form-sample" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Первоначальные данные</h4>            
                            <div class="form-group">
                                <label for="fullname">ФИО</label>
                                <input type="text" class="form-control form-control-lg" id="fullname" name="fullname" required>
                            </div>
                            <div class="form-group">
                                <label for="status_id">Статус</label>
                                <select class="form-control" id="status_id" name="status_id" required>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}" {{ $status->name == 'new' ? 'selected' : '' }}>
                                            {{ $status->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type_of_payment">Тип оплаты</label>
                                <select id="type_of_payment" name="type_of_payment" class="form-control" required>
                                    <option value="наличный">Наличный</option>
                                    <option value="безналичный">Безналичный</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="metrolog_id">Метролог</label>
                                <select class="form-control" id="metrolog_id" name="metrolog_id" required>
                                    @foreach($Users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Заполнение адреса</h4>
                        <div class="form-group">
                            <label for="addressInput">Субъект РФ</label>
                            <input type="text" class="form-control" id="addressInput" name="addressInput" required>
                            <select id="address" class="form-control" name="address" style="display: none;"></select>
                        </div>
                        <div class="form-group">
                            <label for="addressesArea">Административный Район</label>
                            <select id="addressesArea" class="form-control" name="addressesArea"></select>
                        </div>
                        <div class="form-group">
                            <label for="addressCity">Город</label>
                            <select id="addressCity" class="form-control" name="addressCity"></select>
                        </div>
                        <div class="form-group">
                            <label for="addressSettlement">Поселок</label>
                            <select id="addressSettlement" class="form-control" name="addressSettlement"></select>
                        </div>
                        <div class="form-group">
                            <label for="addressPlanningStructure">Элемент планировочной структуры</label>
                            <select id="addressPlanningStructure" class="form-control" name="addressPlanningStructure"></select>
                        </div>
                        <div class="form-group">
                            <label for="addressStreet">Улица</label>
                            <select id="addressStreet" class="form-control" name="addressStreet"></select>
                        </div>
                        <div class="form-group">
                            <label for="addressHouse">Дом</label>
                            <select id="addressHouse" class="form-control" name="addressHouse"></select>
                        </div>
                        <div class="form-group">
                            <label for="addressApartment">Квартира</label>
                            <select id="addressApartment" class="form-control" name="addressApartment"></select>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- ... Your existing code ... -->

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="dopTab" data-toggle="tab" href="#dop" role="tab" aria-controls="dop" aria-selected="true">Доп работы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="zamenaTab" data-toggle="tab" href="#zamena" role="tab" aria-controls="zamena" aria-selected="false">Замена</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="poverkaTab" data-toggle="tab" href="#poverka" role="tab" aria-controls="poverka" aria-selected="false">Поверка</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pretenziiTab" data-toggle="tab" href="#pretenzii" role="tab" aria-controls="pretenzii" aria-selected="false">Претензии</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="santehTab" data-toggle="tab" href="#santeh" role="tab" aria-controls="santeh" aria-selected="false">Сантех. Услуги</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="specificationsTab" data-toggle="tab" href="#specifications" role="tab" aria-controls="specifications" aria-selected="false">Спецификации</a>
                            </li>
                        </ul>
                        <div id="totalPrice">
                            <h4>Общая цена: <span id="totalPrice">0</span></h4>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dop" role="tabpanel" aria-labelledby="dopTab">
                                <div style="max-height: 400px; overflow-y: auto;">
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Наименование</th>
                                                <th>Цена</th>
                                                <th>Плюс</th>
                                                <th>Минус</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($additionalWork as $index => $additionalWor)
                                                    <tr data-id="{{ $index }}">
                                                        <td>{{ $additionalWor->name }}</td>
                                                        <td class="price">{{ $additionalWor->price->price }}</td>
                                                        <td><button class="btn btn-success btn-sm" onclick="updateTotalPrice('plus', {{ $index }})">+</button></td>
                                                        <td><button class="btn btn-danger btn-sm" onclick="updateTotalPrice('minus', {{ $index }})">-</button></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="zamena" role="tabpanel" aria-labelledby="zamenaTab">
                                <div style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Наименование</th>
                                                    <th>Цена</th>
                                                    <th>Плюс</th>
                                                    <th>Минус</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($replacements as $index => $replacement)
                                                <tr data-id="{{ $index }}">
                                                        <td>{{ $replacement->name }}</td>
                                                        <td class="price">{{ $replacement->price->price }}</td>
                                                        <td><button class="btn btn-success btn-sm" onclick="updateTotalPrice('plus', {{ $index }})">+</button></td>
                                                        <td><button class="btn btn-danger btn-sm" onclick="updateTotalPrice('minus', {{ $index }})">-</button></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                               </div>
                            <div class="tab-pane fade" id="poverka" role="tabpanel" aria-labelledby="poverkaTab">
                                <div style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-bordered">
                                            <thead>
                                                <tr> 
                                                    <th>Наименование</th>
                                                    <th>Цена</th>
                                                    <th>Плюс</th>
                                                    <th>Минус</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($verificationOfCounters as $index => $verificationOfCounter)
                                                <tr data-id="{{ $index }}">
                                                        <td>{{ $verificationOfCounter->name }}</td>
                                                        <td class="price">{{ $verificationOfCounter->price->price }}</td>
                                                        <td><button class="btn btn-success btn-sm" onclick="updateTotalPrice('plus', {{ $index }})">+</button></td>
                                                        <td><button class="btn btn-danger btn-sm" onclick="updateTotalPrice('minus', {{ $index }})">-</button></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                               </div>
                            <div class="tab-pane fade" id="pretenzii" role="tabpanel" aria-labelledby="pretenziiTab">
                                <div style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-bordered">
                                            <thead>
                                                <tr> 
                                                    <th>Наименование</th>
                                                    <th>Цена</th>
                                                    <th>Плюс</th>
                                                    <th>Минус</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($claims as $index => $claim)
                                            <tr data-id="{{ $index }}">
                                                        <td>{{ $claim->name }}</td>
                                                        <td class="price">{{ $claim->price->price }}</td>
                                                        <td><button class="btn btn-success btn-sm" onclick="updateTotalPrice('plus', {{ $index }})">+</button></td>
                                                        <td><button class="btn btn-danger btn-sm" onclick="updateTotalPrice('minus', {{ $index }})">-</button></td>
                                                    </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <div class="tab-pane fade" id="santeh" role="tabpanel" aria-labelledby="santehTab">
                                <div style="max-height: 400px; overflow-y: auto;">
                                <table class="table table-bordered">
                                        <thead>
                                            <tr> 
                                                <th>Наименование</th>
                                                <th>Цена</th>
                                                <th>Плюс</th>
                                                <th>Минус</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($plumbingServices as $index => $plumbingService)
                                            <tr data-id="{{ $index }}">
                                                        <td>{{ $plumbingService->name }}</td>
                                                        <td class="price">{{ $plumbingService->price->price }}</td>
                                                        <td><button class="btn btn-success btn-sm" onclick="updateTotalPrice('plus', {{ $index }})">+</button></td>
                                                        <td><button class="btn btn-danger btn-sm" onclick="updateTotalPrice('minus', {{ $index }})">-</button></td>
                                                    </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specificationsTab">
                                <div style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr> 
                                                <th>Наименование</th>
                                                <th>Цена</th>
                                                <th>Плюс</th>
                                                <th>Минус</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($specifications as $index => $specification)
                                            <tr data-id="{{ $index }}">
                                                        <td>{{ $specification->name }}</td>
                                                        <td class="price">{{ $specification->price->price }}</td>
                                                        <td><button class="btn btn-success btn-sm" onclick="updateTotalPrice('plus', {{ $index }})">+</button></td>
                                                        <td><button class="btn btn-danger btn-sm" onclick="updateTotalPrice('minus', {{ $index }})">-</button></td>
                                                    </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!-- ... Continue with your existing code ... -->



                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Заполнение информации о плательщике</h4>
                            <div class="form-group">
                                <label for="actual">Актуальность плательщика</label>
                                <select id="actual" name="actual" class="form-control" required>
                                    <option value="актуальный">Актуальный</option>
                                    <option value="не актуальный">не актуальный</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="payer_code">Код плательщика</label>
                                <input type="text" class="form-control" id="payer_code" name="payer_code" required/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Контактные данные</h4>
                            <div class="form-group">
                                <label for="phone_number">Номер телефона</label>
                                <input type="tel" class="form-control" id="phone_number" name="phone_number" required/>
                            </div>
                            <div class="form-group">
                                <label for="extension_number">дополнительный телефона</label>
                                <input type="tel" class="form-control" id="extension_number" name="extension_number" required/>
                            </div>
                            <div class="form-group">
                                <label for="country_code">Код страны</label>
                                <input type="number" class="form-control" id="country_code" name="country_code" required/>
                            </div>
                            <div class="form-group">
                                <label for="city_code">Код города</label>
                                <input type="text" class="form-control" id="city_code" name="city_code" required/> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Кнопка отправки -->
            <button type="submit" class="btn btn-primary mr-2">Отправить заявку</button>
        </form>
    </div>
</div>

<script>
var selectedPrices = [];
var total = 0;

function updateTotalPrice(operation, index) {
    var priceElement = document.querySelector('tr[data-id="' + index + '"] .price');
    var currentPrice = parseFloat(priceElement.textContent);

    // Проверка, что элемент был ранее добавлен
    if (selectedPrices.includes(index)) {
        if (operation === 'plus') {
            // Добавить цену к общей цене
            total += currentPrice;
            // Добавить индекс элемента в массив выбранных элементов
            selectedPrices.push(index);
        } else if (operation === 'minus') {
            // Проверка, что общая цена не станет отрицательной
            if (total >= currentPrice) {
                // Вычесть цену из общей цены
                total -= currentPrice;
                // Удалить индекс элемента из массива выбранных элементов
                selectedPrices = selectedPrices.filter((item) => item !== index);
            }
        }

        // Ограничить количество десятичных знаков до двух
        total = parseFloat(total.toFixed(2));

        // Обновить общую цену на странице
        document.getElementById('totalPrice').textContent = total;
    }
}

</script>

  <script>
    let currentPath = "";
    let selectedObjectId;
    let selectedSubjectId;

$(document).ready(function() {

    var addressInput = $('#addressInput');
    var addressDropdown = $('#address');
    var selectedDistrict = $('#addressesArea'); // 5
    var selectedCity = $('#addressCity'); // 2
    var selectedSettlement = $('#addressSettlement'); // 6
    var selectedPlanningStructure = $('#addressPlanningStructure'); // 7
    var selectedStreet = $('#addressStreet'); // 8
    var selectedHouse = $('#addressHouse'); // 10
    var selectedApartment = $('#addressApartment'); // 11

  

    // ajax к полю "Субъект РФ"
    addressInput.on('input', function() 
    {
        var searchValue = $(this).val();
        $.ajax({
            url: '{{ url("/api/getAddressItems") }}',
            method: 'post',
            success: function(response) {
                var fullNames = response.addresses;
                updateDropdown(fullNames);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });


    // получаем object_id для поля "Субъект РФ"
    function updateDropdown(addresses) 
    {
        addressDropdown.empty();

        addresses.forEach(function(address) 
        {
            var option = $('<option>').val(address.full_name).text(address.full_name);
            option.data('object-id', address.object_id); 
            addressDropdown.append(option);
        });

        addressDropdown.show();
        
    }


    addressInput.on('input', function() 
    {
        if (addressInput.val() === '') {
            addressDropdown.show();
        }
    });

    // ajax для обновления полей в зависмости от выбранного object_id
    addressDropdown.on('change', function() 
    {
        var selectedObjectId = addressDropdown.find('option:selected').data('object-id');
        var selectedObjectName = addressDropdown.val();
        console.log(selectedObjectId);
        addressInput.val(selectedObjectName);
        addressDropdown.hide(); // Скрываем выпадающий список

        $.ajax({
            url: '{{ url("/api/postAddress") }}',
            method: 'POST',
            data: { selectedAddress: selectedObjectId },
            success: function(response) 
            {
                var addressesData = response.addresses;
                console.log(addressesData);
                {{-- $('select[name="address"]').empty();
                $('select[name="addressCity"]').empty();
                $('select[name="addressSettlement"]').empty(); --}}
           
                if (addressesData.hasOwnProperty('2')) {
                    var dropdown = $('select[name="addressesArea"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите Район</option>');
                    $.each(addressesData['2'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesData.hasOwnProperty('5')) {
                    var dropdown = $('select[name="addressCity"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите Город</option>');
                    $.each(addressesData['5'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesData.hasOwnProperty('6')) {
                    var dropdown = $('select[name="addressSettlement"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите населлный пункт</option>');
                    $.each(addressesData['6'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesData.hasOwnProperty('7')) {
                    var dropdown = $('select[name="addressPlanningStructure"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите элемент планировочноый структуры</option>');
                    $.each(addressesData['7'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesData.hasOwnProperty('8')) {
                    var dropdown = $('select[name="addressStreet"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите улично дорожный элемент</option>');
                    $.each(addressesData['8'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesData.hasOwnProperty('10')) {
                    var dropdown = $('select[name="addressHouse"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите дом</option>');
                    $.each(addressesData['10'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesData.hasOwnProperty('11')) 
                {
                    var dropdown = $('select[name="addressApartment"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите квартиру</option>');
                    $.each(addressesData['11'], function(index, address) 
                    {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }                                    
                
    
            },
            error: function(error) {
                console.log(error);
            }

        });


    /* ajax запрос, который работает после отработки метода postAddress
    данный ajax строит path для запроса к FIAS,  
        
    */   
      function onSelectChange(selectedElement) 
      {
  
        console.log($(this));
        addressDropdown.hide();
        $.ajax(
          {
            url: '{{ url("/api/postNewAddress") }}',
            method: 'POST',
            data: { objectID: selectedObjectId, path: currentPath },
            success: function(response) 
            {
                var addressesDatas = response.addresses;
                console.log(addressesDatas);
               
           
                if (addressesDatas.hasOwnProperty('2')) 
                {   
                    var dropdown = $('select[name="addressesArea"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите Район</option>');
                    $.each(addressesDatas['2'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);   
                    });
                }

                if (addressesDatas.hasOwnProperty('5')) {
                    var dropdown = $('select[name="addressCity"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите Город</option>');
                    $.each(addressesDatas['5'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesDatas.hasOwnProperty('6')) {
                    var dropdown = $('select[name="addressSettlement"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите населлный пункт</option>');
                    $.each(addressesDatas['6'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesDatas.hasOwnProperty('7')) {
                    var dropdown = $('select[name="addressPlanningStructure"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите элемент планировочноый структуры</option>');
                    $.each(addressesDatas['7'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesDatas.hasOwnProperty('8')) {
                    var dropdown = $('select[name="addressStreet"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите улично дорожный элемент</option>');
                    $.each(addressesDatas['8'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesDatas.hasOwnProperty('10')) 
                {
                    var dropdown = $('select[name="addressHouse"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите дом</option>');
                    $.each(addressesDatas['10'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesDatas.hasOwnProperty('11')) 
                {
                    var dropdown = $('select[name="addressApartment"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите квартиру</option>');
                    $.each(addressesDatas['11'], function(index, address) 
                    {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                       
                    });
                }      

                   
            },
            error: function(error) 
            {
                console.log(error);
            }
          }); 


      } 
    
    // дебаг функция
    function postNewAddress(currentPath) 
    {
    
      console.log('Address sent to the server:', currentPath);
    }

      let addressHierarchy = []; // Массив для хранения уровней адреса
     

  function updateCurrentPath(selectedObjectId, selectorId) 
  {
    const selectedObjectIndex = addressHierarchy.findIndex(entry => entry.selectorId === selectorId);
    const currentObject = 
    {
        objectId: selectedObjectId,
        selectorId: selectorId
    };

    if (selectedObjectIndex === -1) 
    {
        // Если элемент еще не выбран, добавляем его в массив
        addressHierarchy.push(currentObject);
    } 
    else 
    {
        // Если элемент уже выбран, обновляем его objectId
        addressHierarchy[selectedObjectIndex].objectId = selectedObjectId;

        // Проверяем порядок уровней адреса
        if (!checkLevelOrder(selectedObjectIndex + 1, selectedObjectIndex)) 
        {
            // Если порядок нарушен, обнуляем путь до текущего уровня
            addressHierarchy = addressHierarchy.slice(0, selectedObjectIndex + 1);
        }
    }

    // Строим path на основе массива
    const pathArray = addressHierarchy.map(entry => entry.objectId);
    currentPath = pathArray.join('.'); // Используем глобальную переменную

    // Далее вы можете использовать currentPath по своему усмотрению
    // Например, передать его в postNewAddress(currentPath) для отправки на сервер
    console.log(currentPath);

    // Пример передачи currentPath в функцию postNewAddress
    postNewAddress(currentPath);
}


function checkLevelOrder(expectedLevel, selectedObjectIndex) {
    const currentSelectorId = addressHierarchy[selectedObjectIndex].selectorId;

    // Определяем порядок уровней адреса в зависимости от текущего селектора
    const levelOrder = {
        'addressesArea': 5,  // Административный Район
        'addressCity': 2,  // Город
        'addressSettlement': 6,  // Поселок
        'addressPlanningStructure': 7,  // Элемент планировочной структуры
        'addressStreet': 8,  // Улица
        'addressHouse': 10,  // Дом
        'addressApartment': 11  // Квартира
    };

    // Если выбранный уровень идет в ожидаемом порядке, возвращаем true
    return levelOrder[currentSelectorId] === expectedLevel;
}

// Добавьте обработчики событий для каждого выпадающего списка


$('#addressesArea').on('change', function() {
    const selectedObjectId = $(this).find('option:selected').data('object-id');
    updateCurrentPath(selectedObjectId, 'addressesArea');
    onSelectChange($(this));
});


$('#addressCity').on('change', function() {
    const selectedObjectId = $(this).find('option:selected').data('object-id');
    updateCurrentPath(selectedObjectId, 'addressCity');
    onSelectChange($(this));
});

$('#addressSettlement').on('change', function() {
    const selectedObjectId = $(this).find('option:selected').data('object-id');
    updateCurrentPath(selectedObjectId, 'addressSettlement');
    onSelectChange($(this));
});

$('#addressPlanningStructure').on('change', function() {
    const selectedObjectId = $(this).find('option:selected').data('object-id');
    updateCurrentPath(selectedObjectId, 'addressPlanningStructure');
    onSelectChange($(this));
});

$('#addressStreet').on('change', function() {
    const selectedObjectId = $(this).find('option:selected').data('object-id');
    updateCurrentPath(selectedObjectId, 'addressStreet');
    console.log(selectedObjectId);
    onSelectChange($(this));
});

$('#addressHouse').on('change', function() {
    const selectedObjectId = $(this).find('option:selected').data('object-id');
    updateCurrentPath(selectedObjectId, 'addressHouse');
    onSelectChange($(this));
});

$('#addressApartment').on('change', function() {
    const selectedObjectId = $(this).find('option:selected').data('object-id');
    updateCurrentPath(selectedObjectId, 'addressApartment');
    onSelectChange($(this));
});
  });


        function updateDropdowns(addressesData) {
          addressesData.forEach(function(item) {
              var objectLevelId = item.object_level_id;
              var addresses = item.addresses;
              var actualDropdownContainer = $('#dropdown-container-' + objectLevelId);
              actualDropdownContainer.empty();

              addresses.forEach(function(address) {
                  var option = $('<option>').val(address).text(address);
                  actualDropdownContainer.append(option);
              });

              actualDropdownContainer.show();
          });

          // Пример передачи currentPath в функцию postNewAddress
          postNewAddress(currentPath);
      }



      
});
  </script>
  <!-- plugins:js -->
  <script src="{{ 'assets/vendors/js/vendor.bundle.base.js' }} "></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
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
