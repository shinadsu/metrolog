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
    <i class="icon-grid menu-icon"></i>
    <span class="menu-title">Главная</span>
  </a>
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

      <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="{{ route('metrlog.index') }}">Мои Заявки</a></li>
          </ul>
      </div>
  
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
                      @foreach($statuses as $status)
                          <option value="{{ $status->id }}" {{ $status->name == 'new' ? 'selected' : '' }}>
                              {{ $status->name }}
                          </option>
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

<!-- Общие поля -->

<div class="row">
              <div class="col-md-6">
                  <div class="form-group row">
                      <label for="addressInput" class="col-sm-3 col-form-label">Субъект РФ</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" id="addressInput" name="addressInput" required>
                          <select id="addressDropdown" class="form-control" name="addressDropdown" style="display: none;"></select>
                      </div>
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group row">
                      <label for="addresses-dropdowns" class="col-sm-3 col-form-label">Административный Район</label>
                      <div class="col-sm-9">
                          <select id="addresses-dropdowns" class="form-control" name="addresses-dropdowns"></select>
                      </div>
                  </div>
              </div>
       
            <div class="col-md-6">
              <div class="form-group row">
                  <label for="admin-district-dropdown" class="col-sm-3 col-form-label">Город</label>
                  <div class="col-sm-9">
                      <select id="admin-district-dropdown" class="form-control" name="admin-district-dropdown"></select>
                  </div>
              </div>
          </div>

              <div class="col-md-6">
                  <div class="form-group row">
                      <label for="settlement-dropdown" class="col-sm-3 col-form-label">Поселок</label>
                      <div class="col-sm-9">
                          <select id="settlement-dropdown" class="form-control" name="settelment-dropdown"></select>
                      </div>
                  </div>
              </div>


              <div class="col-md-6">
                  <div class="form-group row">
                      <label for="planningStructure-dropdown" class="col-sm-3 col-form-label">элемент планировочноый структуры</label>
                      <div class="col-sm-9">
                          <select id="planningStructure-dropdown" class="form-control" name="planningStructure-dropdown"></select>
                      </div>
                  </div>
              </div>


              


              <div class="col-md-6">
                  <div class="form-group row">
                      <label for="street-dropdown" class="col-sm-3 col-form-label">Улица</label>
                      <div class="col-sm-9">
                          <select id="street-dropdown" class="form-control" name="street-dropdown"></select>
                      </div>
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group row">
                      <label for="house-dropdowns" class="col-sm-3 col-form-label">Дом</label>
                      <div class="col-sm-9">
                          <select id="house-dropdowns" class="form-control" name="house-dropdowns"></select>
                      </div>
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group row">
                      <label for="Apartment-dropdowns" class="col-sm-3 col-form-label">Квартира</label>
                      <div class="col-sm-9">
                          <select id="Apartment-dropdowns" class="form-control" name="Apartment-dropdowns"></select>
                      </div>
                  </div>
              </div>

         
              
             

</div>
</div>
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
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
  <!-- container-scroller -->
  <script>
    var selectedObjectId;
    var selectedSubjectId;
$(document).ready(function() {

    var addressInput = $('#addressInput');
    var addressDropdown = $('#addressDropdown');
    var selectedCity = $('#admin-district-dropdown'); // 2
    var selectedDistrict = $('#addresses-dropdowns'); // 5
    var selectedSettlement = $('#settlement-dropdown'); // 6
    var selectedPlanningStructure = $('#planningStructure-dropdown'); // 7
    var selectedStreet = $('#street-dropdown'); // 8
    var selectedHouse = $('#house-dropdowns'); // 10
    var selectedApartment = $('#Apartment-dropdowns'); // 11


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
                {{-- $('select[name="address-dropdown"]').empty();
                $('select[name="admin-district-dropdown"]').empty();
                $('select[name="settelment-dropdown"]').empty(); --}}
           
                if (addressesData.hasOwnProperty('2')) {
                    var dropdown = $('select[name="addresses-dropdowns"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите Район</option>');
                    $.each(addressesData['2'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesData.hasOwnProperty('5')) {
                    var dropdown = $('select[name="admin-district-dropdown"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите Город</option>');
                    $.each(addressesData['5'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesData.hasOwnProperty('6')) {
                    var dropdown = $('select[name="settelment-dropdown"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите населлный пункт</option>');
                    $.each(addressesData['6'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesData.hasOwnProperty('7')) {
                    var dropdown = $('select[name="planningStructure-dropdown"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите элемент планировочноый структуры</option>');
                    $.each(addressesData['7'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesData.hasOwnProperty('8')) {
                    var dropdown = $('select[name="street-dropdown"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите улично дорожный элемент</option>');
                    $.each(addressesData['8'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesData.hasOwnProperty('10')) {
                    var dropdown = $('select[name="house-dropdowns"]');
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
                    var dropdown = $('select[name="Apartment-dropdowns"]');
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

      function onSelectChange(selectedElement) 
      {
      var selectedSubjectId = selectedElement.find('option:selected').data('object-id');
      console.log(selectedSubjectId);
      addressDropdown.hide();
      $.ajax(
          {
            url: '{{ url("/api/postNewAddress") }}',
            method: 'POST',
            data: { objectID: selectedObjectId, newObjectId: selectedSubjectId },
            success: function(response) 
            {
                var addressesDatas = response.addresses;
                console.log(addressesDatas);
                {{-- $('select[name="address-dropdown"]').empty();
                $('select[name="admin-district-dropdown"]').empty();
                $('select[name="settelment-dropdown"]').empty(); --}}      
           
                if (addressesDatas.hasOwnProperty('2')) 
                {
                    var dropdown = $('select[name="addresses-dropdowns"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите Район</option>');
                    $.each(addressesDatas['2'], function(index, address) 
                    {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesDatas.hasOwnProperty('5')) {
                    var dropdown = $('select[name="admin-district-dropdown"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите Город</option>');
                    $.each(addressesDatas['5'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesDatas.hasOwnProperty('6')) {
                    var dropdown = $('select[name="settelment-dropdown"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите населлный пункт</option>');
                    $.each(addressesDatas['6'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesDatas.hasOwnProperty('7')) {
                    var dropdown = $('select[name="planningStructure-dropdown"]');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Выберите элемент планировочноый структуры</option>');
                    $.each(addressesDatas['7'], function(index, address) {
                        var newOption = new Option(address.full_name, address.full_name, false, false);
                        $(newOption).data('object-id', address.object_id);
                        dropdown.append(newOption);
                    });
                }

                if (addressesDatas.hasOwnProperty('8')) {
                    var dropdown = $('select[name="street-dropdown"]');
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
                    var dropdown = $('select[name="house-dropdowns"]');
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
                    var dropdown = $('select[name="Apartment-dropdowns"]');
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
            error: function(error) {
                        console.log(error);
                    }
          });
      }

      selectedCity.on('change', function() {
        onSelectChange(selectedCity);
    });

    selectedDistrict.on('change', function() {
        onSelectChange(selectedDistrict);

    });

    selectedSettlement.on('change', function() {
        onSelectChange(selectedSettlement);
    });

    selectedPlanningStructure.on('change', function() {
        onSelectChange(selectedPlanningStructure);
    });

    selectedStreet.on('change', function() {
        onSelectChange(selectedStreet);
    });

    selectedHouse.on('change', function() {
        onSelectChange(selectedHouse);

    });

    selectedApartment.on('change', function() {
        onSelectChange(selectedApartment);
    });


    addressDropdown.on('mousedown', function(e) {
        e.stopPropagation(); 
    });

    $(document).on('mousedown', function() {
        addressDropdown.hide(); 
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
