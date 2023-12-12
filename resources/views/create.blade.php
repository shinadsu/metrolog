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
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />


<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>

  <!-- Include Selectize.js JS -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{ 'assets/css/vertical-layout-light/style.css' }}">
<!-- endinject -->
<link rel="shortcut icon" href="{{ 'assets/images/favicon.png' }}" />
<style>
.loader {
  width: 48px;
  height: 48px;
  display: inline-block;
  position: relative;
}
.loader::after,
.loader::before {
  content: '';  
  box-sizing: border-box;
  width: 48px;
  height: 48px;
  border: 2px solid #FFF;
  position: absolute;
  left: 0;
  top: 0;
  animation: rotation 2s ease-in-out infinite alternate;
}
.loader::after {
  border-color: #FF3D00;
  animation-direction: alternate-reverse;
}

@keyframes rotation {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
} 
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
            

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="allDataTab" data-toggle="tab" href="#allData" role="tab" aria-controls="allData" aria-selected="false">Общие товары и услуги</a>
                            </li>
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
                        
                        <div class="tab-content">
                        <div id="totalPriceContainer">
                            <h4>Общая цена: <span id="totalPriceDisplay">0</span></h4>
                            <input type="hidden" name="totalPriceValue" id="totalPriceInput" value="0">
                        </div>

                        <div class="tab-pane fade" id="allData" role="tabpanel" aria-labelledby="allDataTab">
                            <div style="max-height: 400px; overflow-y: auto;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr> 
                                            <th>Наименование</th>
                                            <th>Кол.во</th>
                                            <th>Цена</th>
                                            <th>Плюс</th>
                                            <th>Минус</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Добавляем данные из $additionalWork -->
                                        @foreach($additionalWork as $index => $additionalWor)
                                            <tr data-id="{{ $index }}">
                                                <td>{{ $additionalWor->name }}</td>
                                                 <td class="quantity" id="quantity{{ $index }}">0</td>
                                                <td class="price">{{ $additionalWor->price->price }}</td>
                                                <td><button class="btn btn-success btn-sm" onclick="updateTotalPrice('plus', {{ $index }})">+</button></td>
                                                <td><button class="btn btn-danger btn-sm" onclick="updateTotalPrice('minus', {{ $index }})">-</button></td>

                                            </tr>
                                        @endforeach

                                        <!-- Добавляем данные из $replacements -->
                                        @foreach($replacements as $index => $replacement)
                                            <tr data-id="{{ $index }}">
                                                <td>{{ $replacement->name }}</td>
                                                 <td class="quantity" id="quantity{{ $index }}">0</td>
                                                <td class="price">{{ $replacement->price->price }}</td>
                                                <td><button class="btn btn-success btn-sm" onclick="updateTotalPrice('plus', {{ $index }})">+</button></td>
                                                <td><button class="btn btn-danger btn-sm" onclick="updateTotalPrice('minus', {{ $index }})">-</button></td>
                                            </tr>
                                        @endforeach

                                        @foreach($verificationOfCounters as $index => $verificationOfCounter)
                                        <tr data-id="{{ $index }}">
                                                <td>{{ $verificationOfCounter->name }}</td>
                                                 <td class="quantity" id="quantity{{ $index }}">0</td>
                                                <td class="price">{{ $verificationOfCounter->price->price }}</td>
                                                <td><button class="btn btn-success btn-sm" onclick="updateTotalPrice('plus', {{ $index }})">+</button></td>
                                                <td><button class="btn btn-danger btn-sm" onclick="updateTotalPrice('minus', {{ $index }})">-</button></td>
                                            </tr>
                                        @endforeach

                                        @foreach($plumbingServices as $index => $plumbingService)
                                        <tr data-id="{{ $index }}">
                                                    <td>{{ $plumbingService->name }}</td>
                                                     <td class="quantity" id="quantity{{ $index }}">0</td>
                                                    <td class="price">{{ $plumbingService->price->price }}</td>
                                                    <td><button class="btn btn-success btn-sm" onclick="updateTotalPrice('plus', {{ $index }})">+</button></td>
                                                    <td><button class="btn btn-danger btn-sm" onclick="updateTotalPrice('minus', {{ $index }})">-</button></td>
                                                </tr>
                                        @endforeach

                                        @foreach($specifications as $index => $specification)
                                        <tr data-id="{{ $index }}">
                                                    <td>{{ $specification->name }}</td>
                                                     <td class="quantity" id="quantity{{ $index }}">0</td>
                                                    <td class="price">{{ $specification->price->price }}</td>
                                                    <td><button class="btn btn-success btn-sm" onclick="updateTotalPrice('plus', {{ $index }})">+</button></td>
                                                    <td><button class="btn btn-danger btn-sm" onclick="updateTotalPrice('minus', {{ $index }})">-</button></td>
                                                </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                            <div class="tab-pane fade show active" id="dop" role="tabpanel" aria-labelledby="dopTab" data-category="additionalWork">
                                <div style="max-height: 400px; overflow-y: auto;">
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Наименование</th>
                                                
                                                <th>Цена</th>
                                                <th>Плюс</th>
                                                <th>Минус</th>
                                                <th>Кол.во</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($additionalWork as $index => $additionalWor)
                                                    <tr data-id="{{ $index }}">
                                                        <td>{{ $additionalWor->name }}</td>
                                                        
                                                        <td class="price">{{ $additionalWor->price->price }}</td>
                                                        <td><button class="btn btn-success btn-sm" onclick="updateTotalPrice('plus', {{ $index }})">+</button></td>
                                                        <td><button class="btn btn-danger btn-sm" onclick="updateTotalPrice('minus', {{ $index }})">-</button></td>
                                                        <td class="quantity" id="quantity{{ $index }}">0</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                           <div class="tab-pane fade" id="zamena" role="tabpanel" aria-labelledby="zamenaTab" data-category="replacements">
                                <div style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                <th>Наименование</th>
                                                <th>Цена</th>
                                                <th>Плюс</th>
                                                <th>Минус</th>
                                                <th>Кол.во</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($replacements as $index => $replacement)
                                                <tr data-id="{{ $index }}">
                                                        <td>{{ $replacement->name }}</td>
                                                        
                                                        <td class="price">{{ $replacement->price->price }}</td>
                                                        <td><button class="btn btn-success btn-sm" onclick="updateTotalPrice('plus', {{ $index }})">+</button></td>
                                                        <td><button class="btn btn-danger btn-sm" onclick="updateTotalPrice('minus', {{ $index }})">-</button></td>
                                                        <td class="quantity" id="quantity{{ $index }}">0</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                               </div>
                            <div class="tab-pane fade" id="poverka" role="tabpanel" aria-labelledby="poverkaTab" data-category="verificationOfCounters">
                                <div style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-bordered">
                                            <thead>
                                                <tr> 
                                                <th>Наименование</th>
                                               
                                                <th>Цена</th>
                                                <th>Плюс</th>
                                                <th>Минус</th>
                                                <th>Кол.во</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($verificationOfCounters as $index => $verificationOfCounter)
                                                <tr data-id="{{ $index }}">
                                                        <td>{{ $verificationOfCounter->name }}</td>
                                                        
                                                        <td class="price">{{ $verificationOfCounter->price->price }}</td>
                                                        <td><button class="btn btn-success btn-sm" onclick="updateTotalPrice('plus', {{ $index }})">+</button></td>
                                                        <td><button class="btn btn-danger btn-sm" onclick="updateTotalPrice('minus', {{ $index }})">-</button></td>
                                                        <td class="quantity" id="quantity{{ $index }}">0</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                               </div>
                            <div class="tab-pane fade" id="pretenzii" role="tabpanel" aria-labelledby="pretenziiTab" data-category="claims">
                                <div style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-bordered">
                                            <thead>
                                                <tr> 
                                                <th>Наименование</th>
                                               
                                                <th>Цена</th>
                                                <th>Плюс</th>
                                                <th>Минус</th>
                                                <th>Кол.во</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($claims as $index => $claim)
                                            <tr data-id="{{ $index }}">
                                                        <td>{{ $claim->name }}</td>
                                                       
                                                        <td class="price">{{ $claim->price->price }}</td>                                                    
                                                        <td><button class="btn btn-success btn-sm" onclick="updateTotalPrice('plus', {{ $index }})">+</button></td>
                                                        <td><button class="btn btn-danger btn-sm" onclick="updateTotalPrice('minus', {{ $index }})">-</button></td>
                                                        <td class="quantity" id="quantity{{ $index }}">0</td>
                                                    </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <div class="tab-pane fade" id="santeh" role="tabpanel" aria-labelledby="santehTab" data-category="plumbingServices">
                                <div style="max-height: 400px; overflow-y: auto;">
                                <table class="table table-bordered">
                                        <thead>
                                            <tr> 
                                                <th>Наименование</th>
                                               
                                                <th>Цена</th>
                                                <th>Плюс</th>
                                                <th>Минус</th>
                                                <th>Кол.во</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($plumbingServices as $index => $plumbingService)
                                            <tr data-id="{{ $index }}">
                                                        <td>{{ $plumbingService->name }}</td>
                                                      
                                                        <td class="price">{{ $plumbingService->price->price }}</td>
                                                        <td><button class="btn btn-success btn-sm" onclick="updateTotalPrice('plus', {{ $index }})">+</button></td>
                                                        <td><button class="btn btn-danger btn-sm" onclick="updateTotalPrice('minus', {{ $index }})">-</button></td>
                                                        <td class="quantity" id="quantity{{ $index }}">0</td>
                                                    </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specificationsTab" data-category="specifications">
                                <div style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr> 
                                                <th>Наименование</th>
                                    
                                                <th>Цена</th>
                                                <th>Плюс</th>
                                                <th>Минус</th>
                                                <th>Кол.во</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($specifications as $index => $specification)
                                            <tr data-id="{{ $index }}">
                                                        <td>{{ $specification->name }}</td>
                                                        
                                                        <td class="price">{{ $specification->price->price }}</td>
                                                        <td><button class="btn btn-success btn-sm" onclick="updateTotalPrice('plus', {{ $index }})">+</button></td>
                                                        <td><button class="btn btn-danger btn-sm" onclick="updateTotalPrice('minus', {{ $index }})">-</button></td>
                                                        <td class="quantity" id="quantity{{ $index }}">0</td>
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
            <button type="submit" class="btn btn-primary mr-2">Отправить заявку</button>
        </form>
    </div>
</div>


<!-- Вставьте скрипт updateTotalPrice здесь -->

<!-- // let selectedPrices = {};
// let total = 0;

// function updateTotalPrice(operation, index) {
//     // Prevent form submission when buttons are clicked
//     event.preventDefault();

//     let activeTab = document.querySelector('.tab-pane.active');
//     let category = activeTab.getAttribute('data-category');

//     let selectedItem = activeTab.querySelector('tr[data-id="' + index + '"]');
//     let itemName = selectedItem.querySelector('td:first-child').textContent;
//     let currentPrice = parseFloat(selectedItem.querySelector('.price').textContent);

//     // Находим ячейку с количеством для обновления
//     let quantityCell = selectedItem.querySelector('.quantity');

//     if (!selectedPrices[category]) {
//         selectedPrices[category] = [];
//     }

//     // Проверяем, есть ли уже элемент с таким индексом в массиве
//     let existingItem = selectedPrices[category].find(item => item.index === index);

//     if (operation === 'plus') {
//         if (!existingItem) {
//             // Добавить цену к общей цене
//             total += currentPrice;
//             // Добавить элемент в массив выбранных элементов
//             selectedPrices[category].push({ index, name: itemName, price: currentPrice, quantity: 1 });
//         } else {
//             // Если элемент уже существует, увеличиваем его количество и цену
//             existingItem.quantity += 1;
//             existingItem.price += currentPrice;
//             total += currentPrice;
//         }
//     } else if (operation === 'minus' && existingItem && existingItem.quantity > 0) {
//         // Если есть элемент для уменьшения и количество больше 0
//         existingItem.quantity -= 1;
//         existingItem.price -= currentPrice;
//         total -= currentPrice;
//     }

//     // Ограничить количество десятичных знаков до двух
//     total = parseFloat(total.toFixed(2));

//     // Обновить общую цену на странице
//     document.getElementById('totalPriceDisplay').textContent = total;

//     // Обновить количество на странице
//     if (quantityCell) {
//         quantityCell.textContent = existingItem ? existingItem.quantity : 0;
//     } else {
//         console.error('Quantity cell not found for index ' + index);
//     }
// } -->

<script>
    let selectedPrices = JSON.parse(localStorage.getItem('selectedPrices')) || {};
    let total = parseFloat(localStorage.getItem('total')) || 0;

    function updateTotalPrice(operation, index) {
        // Prevent form submission when buttons are clicked
        event.preventDefault();

        let activeTab = document.querySelector('.tab-pane.active');
        let category = activeTab.getAttribute('data-category');

        let selectedItem = activeTab.querySelector('tr[data-id="' + index + '"]');
        let itemName = selectedItem.querySelector('td:first-child').textContent;
        let currentPrice = parseFloat(selectedItem.querySelector('.price').textContent);

        // Находим ячейку с количеством для обновления
        let quantityCell = selectedItem.querySelector('.quantity');

        if (!selectedPrices[category]) {
            selectedPrices[category] = [];
        }

        // Проверяем, есть ли уже элемент с таким индексом в массиве
        let existingItem = selectedPrices[category].find(item => item.index === index);

        if (operation === 'plus') {
            if (!existingItem) {
                // Добавить цену к общей цене
                total += currentPrice;
                // Добавить элемент в массив выбранных элементов
                selectedPrices[category].push({ index, name: itemName, price: currentPrice, quantity: 1 });
            } else {
                // Если элемент уже существует, увеличиваем его количество и цену
                existingItem.quantity += 1;
                existingItem.price += currentPrice;
                total += currentPrice;
            }
        } else if (operation === 'minus' && existingItem && existingItem.quantity > 0) {
            // Если есть элемент для уменьшения и количество больше 0
            existingItem.quantity -= 1;
            existingItem.price -= currentPrice;
            total -= currentPrice;
        }

        // Ограничить количество десятичных знаков до двух
        total = parseFloat(total.toFixed(2));

        // Обновить общую цену и количество на странице
        document.getElementById('totalPriceDisplay').textContent = total;

        // Обновить количество на странице
        if (quantityCell) {
            quantityCell.textContent = existingItem ? existingItem.quantity : 0;
        } else {
            console.error('Quantity cell not found for index ' + index);
        }

        // Сохраняем значения в локальное хранилище
        localStorage.setItem('selectedPrices', JSON.stringify(selectedPrices));
        localStorage.setItem('total', total);
    }

    // Вызываем эту функцию для восстановления значений при загрузке страницы
    updateTotalPrice('plus', 0);
</script>











  <script>
    let currentPath = "";
    let selectedObjectId;
    let selectedSubjectId;

$(document).ready(function() {

    let addressInput = $('#addressInput');
    let addressDropdown = $('#address');
    let selectedDistrict = $('#addressesArea'); // 5
    let selectedCity = $('#addressCity'); // 2
    let selectedSettlement = $('#addressSettlement'); // 6
    let selectedPlanningStructure = $('#addressPlanningStructure'); // 7
    let selectedStreet = $('#addressStreet'); // 8
    let selectedHouse = $('#addressHouse'); // 10
    let selectedApartment = $('#addressApartment'); // 11
    let addressHierarchy = []; // Массив для хранения уровней адреса

   
let isDropdownChange = false;

function createLoader(fieldId) {
    let loaderId = fieldId + 'Loader';
    let loader = $('<span class="loader"></span>').attr('id', loaderId);
    $('#' + fieldId).parent().append(loader);
    return loader;
}

addressInput.on('input', function () {
    let searchValue = $(this).val();

    // Проверка, является ли поле пустым
    if (!isDropdownChange) {
        // Если изменение произошло не из addressDropdown, скрываем лоадер
        $('#addressesAreaLoader').hide();
    }

    $.ajax({
        url: '{{ url("/api/getAddressItems") }}',
        method: 'post',
        success: function (response) {
            let fullNames = response.addresses;
            updateDropdown(fullNames);
        },
        error: function (error) {
            console.log(error);
        },
        complete: function () {
            // Скрываем лоадер после завершения запроса
            loader.hide();
        }
    });
});



// получаем object_id для поля "Субъект РФ"
function updateDropdown(addresses) {
    addressDropdown.empty();

    addresses.forEach(function(address) {
        let option = $('<option>').val(address.full_name).text(address.full_name);
        option.data('object-id', address.object_id);
        addressDropdown.append(option);
    });

    // Clear other address-related dropdowns
    clearAddressFields();

    addressDropdown.show();
}

function clearAddressFields() {
    // Clear the values of other address-related dropdowns
    $('#addressesArea, #addressCity, #addressSettlement, #addressPlanningStructure, #addressStreet, #addressHouse, #addressApartment').empty();
}

function getIndexInHierarchy(selectorId) {
        let lowerLevelSelectors = [
            'addressesArea',
            'addressCity',
            'addressSettlement',
            'addressPlanningStructure',
            'addressStreet',
            'addressHouse',
            'addressApartment'
        ];

        return lowerLevelSelectors.indexOf(selectorId);
    }

function clearLowerLevelFields(selectorId) {
    let lowerLevelSelectors = [
        'addressesArea',
        'addressCity',
        'addressSettlement',
        'addressPlanningStructure',
        'addressStreet',
        'addressHouse',
        'addressApartment'
    ];

    let startIndex = getIndexInHierarchy(selectorId);
    for (let i = startIndex + 1; i < lowerLevelSelectors.length; i++) {
        $('#' + lowerLevelSelectors[i]).empty();
    }
}

addressInput.on('input', function() {
    if (addressInput.val() === '') {
        addressDropdown.show();
        clearAddressFields(); // Clear other fields when the input is empty
    }
});

    function updateAddressField(fieldId, addressesData, label) {
        let dropdown = $('#' + fieldId);
        dropdown.empty();
        dropdown.append('<option value="" selected disabled hidden>Выберите ' + label + '</option>');
        $.each(addressesData, function (index, address) {
            let newOption = new Option(address.full_name, address.full_name, false, false);
            $(newOption).data('object-id', address.object_id);
            dropdown.append(newOption);
        });
    }



    // ajax для обновления полей в зависмости от выбранного object_id
    addressDropdown.on('change', function () {
    let selectedOption = addressDropdown.find('option:selected');
    
        if (selectedOption.length === 0) {
            // Ничего не выбрано, просто выходим из функции
            return;
        }
        let loader = createLoader('addressesArea');
        loader.show();
        // let loader = createLoader('addressCity');
        // loader.show();

        let selectedObjectId = selectedOption.data('object-id');
        let selectedObjectName = addressDropdown.val();
        console.log(selectedObjectId);
        addressInput.val(selectedObjectName);
        addressDropdown.hide();
        clearLowerLevelFields('address');
      

        $.ajax({
            url: '{{ url("/api/postAddress") }}',
            method: 'POST',
            data: { selectedAddress: selectedObjectId },
            success: function(response) 
            {   
                $('.loader').hide();
                let addressesData = response.addresses;
                console.log(addressesData);
               
           
            if (addressesData.hasOwnProperty('2')) {
                updateAddressField('addressCity', addressesData['2'], 'Город');
            }

            if (addressesData.hasOwnProperty('5')) {
                updateAddressField('addressesArea', addressesData['5'], 'Район');
            }

            if (addressesData.hasOwnProperty('6')) {
                updateAddressField('addressSettlement', addressesData['6'], 'Поселок');
            }

            if (addressesData.hasOwnProperty('7')) {
                updateAddressField('addressPlanningStructure', addressesData['7'], 'Элемент планировочной структуры');
            }

            if (addressesData.hasOwnProperty('8')) {
                updateAddressField('addressStreet', addressesData['8'], 'Улица');
            }

            if (addressesData.hasOwnProperty('10')) {
                updateAddressField('addressHouse', addressesData['10'], 'Дом');
            }

            if (addressesData.hasOwnProperty('11')) {
                updateAddressField('addressApartment', addressesData['11'], 'Квартира');
            }                               
                
    
            },
            error: function(error) {
                console.log(error);
                $('.loader').hide();
            }

        });



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
            let addressesDatas = response.addresses;
            console.log(addressesDatas);
            
            postNewAddress(currentPath)

            if (addressesDatas.hasOwnProperty('2')) 
            {   
                let dropdown = $('select[name="addressesArea"]');
                dropdown.empty();
                dropdown.append('<option value="" selected disabled hidden>Выберите Район</option>');
                $.each(addressesDatas['2'], function(index, address) {
                    let newOption = new Option(address.full_name, address.full_name, false, false);
                    $(newOption).data('object-id', address.object_id);
                    dropdown.append(newOption);   
                });
            }

            if (addressesDatas.hasOwnProperty('5')) {
                let dropdown = $('select[name="addressCity"]');
                dropdown.empty();
                dropdown.append('<option value="" selected disabled hidden>Выберите Город</option>');
                $.each(addressesDatas['5'], function(index, address) {
                    let newOption = new Option(address.full_name, address.full_name, false, false);
                    $(newOption).data('object-id', address.object_id);
                    dropdown.append(newOption);
                });
            }

            if (addressesDatas.hasOwnProperty('6')) {
                let dropdown = $('select[name="addressSettlement"]');
                dropdown.empty();
                dropdown.append('<option value="" selected disabled hidden>Выберите населлный пункт</option>');
                $.each(addressesDatas['6'], function(index, address) {
                    let newOption = new Option(address.full_name, address.full_name, false, false);
                    $(newOption).data('object-id', address.object_id);
                    dropdown.append(newOption);
                });
            }

            if (addressesDatas.hasOwnProperty('7')) {
                let dropdown = $('select[name="addressPlanningStructure"]');
                dropdown.empty();
                dropdown.append('<option value="" selected disabled hidden>Выберите элемент планировочноый структуры</option>');
                $.each(addressesDatas['7'], function(index, address) {
                    let newOption = new Option(address.full_name, address.full_name, false, false);
                    $(newOption).data('object-id', address.object_id);
                    dropdown.append(newOption);
                });
            }

            if (addressesDatas.hasOwnProperty('8')) {
                let dropdown = $('select[name="addressStreet"]');
                dropdown.empty();
                dropdown.append('<option value="" selected disabled hidden>Выберите улично дорожный элемент</option>');
                $.each(addressesDatas['8'], function(index, address) {
                    let newOption = new Option(address.full_name, address.full_name, false, false);
                    $(newOption).data('object-id', address.object_id);
                    dropdown.append(newOption);
                });
            }

            if (addressesDatas.hasOwnProperty('10')) 
            {
                let dropdown = $('select[name="addressHouse"]');
                dropdown.empty();
                dropdown.append('<option value="" selected disabled hidden>Выберите дом</option>');
                $.each(addressesDatas['10'], function(index, address) {
                    let newOption = new Option(address.full_name, address.full_name, false, false);
                    $(newOption).data('object-id', address.object_id);
                    dropdown.append(newOption);
                });
            }

            if (addressesDatas.hasOwnProperty('11')) 
            {
                let dropdown = $('select[name="addressApartment"]');
                dropdown.empty();
                dropdown.append('<option value="" selected disabled hidden>Выберите квартиру</option>');
                $.each(addressesDatas['11'], function(index, address) 
                {
                    let newOption = new Option(address.full_name, address.full_name, false, false);
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


    function updateCurrentPath(selectedObjectId, selectorId) 
    {
        const selectedObjectIndex = addressHierarchy.findIndex(entry => entry.selectorId === selectorId);
        const currentObject = {
            objectId: selectedObjectId,
            selectorId: selectorId
        };

        if (selectedObjectIndex === -1) 
        {
            // If the element is not selected yet, add it to the array
            addressHierarchy.push(currentObject);
        } 
        else 
        {
            // If the element is already selected, update its objectId
            addressHierarchy[selectedObjectIndex].objectId = selectedObjectId;

            // Check and enforce the order of address levels
            if (!checkLevelOrder(selectedObjectIndex + 1, selectedObjectIndex)) 
            {
                // If the order is violated, reset the path to the current level
                addressHierarchy = addressHierarchy.slice(0, selectedObjectIndex + 1);
            }
        }

        // Build the path based on the array
        const pathArray = addressHierarchy.map(entry => entry.objectId);
        currentPath = pathArray.join('.');

        // Utilize the currentPath as needed
        console.log(currentPath);

        // Пример: Передача currentPath в функцию postNewAddress
        postNewAddress(currentPath);
    }


    function checkLevelOrder(expectedLevel, selectedObjectIndex) 
    {
        const currentSelectorId = addressHierarchy[selectedObjectIndex].selectorId;

        // Define the order of address levels based on selectorId
        const levelOrder = {
            'addressesArea': 5,
            'addressCity': 2,
            'addressSettlement': 6,
            'addressPlanningStructure': 7,
            'addressStreet': 8,
            'addressHouse': 10,
            'addressApartment': 11
        };

        // Check if the selected level follows the expected order
        return levelOrder[currentSelectorId] === expectedLevel;
    }


    
    $('#addressesArea').on('change', function() {
        const selectedObjectId = $(this).find('option:selected').data('object-id');
        updateCurrentPath(selectedObjectId, 'addressesArea');
        clearLowerLevelFields('addressesArea');
        onSelectChange($(this));
    });


    $('#addressCity').on('change', function() {
        const selectedObjectId = $(this).find('option:selected').data('object-id');
        updateCurrentPath(selectedObjectId, 'addressCity');
        clearLowerLevelFields('addressCity');
        onSelectChange($(this));
    });

    $('#addressSettlement').on('change', function() {
        const selectedObjectId = $(this).find('option:selected').data('object-id');
        updateCurrentPath(selectedObjectId, 'addressSettlement');
        clearLowerLevelFields('addressSettlement');
        onSelectChange($(this));
    });

    $('#addressPlanningStructure').on('change', function() {
        const selectedObjectId = $(this).find('option:selected').data('object-id');
        updateCurrentPath(selectedObjectId, 'addressPlanningStructure');
        clearLowerLevelFields('addressPlanningStructure');
        onSelectChange($(this));
    });

    $('#addressStreet').on('change', function() {
        const selectedObjectId = $(this).find('option:selected').data('object-id');
        updateCurrentPath(selectedObjectId, 'addressStreet');
        clearLowerLevelFields('addressStreet');
        console.log(selectedObjectId);
        onSelectChange($(this));
    });

    $('#addressHouse').on('change', function() {
        const selectedObjectId = $(this).find('option:selected').data('object-id');
        updateCurrentPath(selectedObjectId, 'addressHouse');
        clearLowerLevelFields('addressHouse');
        onSelectChange($(this));
    });

    $('#addressApartment').on('change', function() {
        const selectedObjectId = $(this).find('option:selected').data('object-id');
        updateCurrentPath(selectedObjectId, 'addressApartment');
        clearLowerLevelFields('addressApartment');
        onSelectChange($(this));
    });
});


    function updateDropdowns(addressesData) 
    {
        addressesData.forEach(function(item) {
            let objectLevelId = item.object_level_id;
            let addresses = item.addresses;
            let actualDropdownContainer = $('#dropdown-container-' + objectLevelId);
            actualDropdownContainer.empty();

            addresses.forEach(function(address) {
                let option = $('<option>').val(address).text(address);
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
