<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>METROLOG</title>
    <!-- plugins:css -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/air-datepicker@2.2.3/dist/css/datepicker.min.css">
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

        .w-200 {
            width: 200% !important;
        }

        .w-150 {
            width: 150% !important;
        }

        .w-300 {
            width: 300% !important;
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
                        <a class="nav-link" href="/">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Главная</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Заявки</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('create.index') }}">Новая
                                        Заявка</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('metrlog.index') }}">Мои
                                        Заявки</a></li>
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
                                <li class="nav-item"><a class="nav-link" href="{{ route('devices.index') }}">Девайсы</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false"
                            aria-controls="charts">
                            <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Графики Работ</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('operatorshedule.index') }}">График Операторов</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('LogisticSettings.index') }}">График Логистов</a></li>

                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('metrologShowShedule.index') }}">График Метрологов</a></li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false"
                            aria-controls="tables">
                            <i class="icon-grid-2 menu-icon"></i>
                            <span class="menu-title">Инфо. Адреса</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('applicationsandaddresses.index') }}">Заявки и Адреса</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('addresses.index') }}">Адреса</a></li>
                            </ul>
                        </div>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false"
                            aria-controls="auth">
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
                                <li class="nav-item"> <a class="nav-link" href="{{ route('MetrologShedule.index') }}">
                                        Наст. График Метролгов </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('addRoleToUser.index') }}">
                                        Установка роли пользователю </a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>



            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <form action="{{ route('create.store') }}" class="form-sample" method="POST">
                            <div class="row">
                                @csrf
                                <div class="col-md-6 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Первоначальные данные</h4>
                                            <div class="form-group">
                                                <label for="fullname">ФИО</label>
                                                <input type="text" class="form-control form-control-lg" id="fullname"
                                                    name="fullname" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="status_id">Статус</label>
                                                <select class="form-control" id="status_id" name="status_id" required>
                                                    @foreach($statuses as $status)
                                                    <option value="{{ $status->id }}" {{ $status->name == 'new' ?
                                                        'selected' : '' }}>
                                                        {{ $status->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="type_of_payment">Тип оплаты</label>
                                                <select id="type_of_payment" name="type_of_payment" class="form-control"
                                                    required>
                                                    <option value="Наличный без чека">Наличный без чека</option>
                                                    <option value="Эквайринг">Эквайринг</option>
                                                    <option value="Интернет Эквайринг">Интернет Эквайринг</option>
                                                    <option value="Р. Счет">Р. Счет</option>
                                                    <option value="Наличные (чек)">Наличные (чек)</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="organization">Организация</label>
                                                <select id="organization" name="organization" class="form-control"
                                                    required>
                                                    @foreach($organization as $organizations)
                                                    <option value="{{ $organizations->name }}">{{ $organizations->name
                                                        }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Остальные данные</h4>
                                            <div class="form-group">
                                                <label for="source">Источник</label>
                                                <select class="form-control" id="source" name="source" required>
                                                    @foreach($sourse as $sourses)
                                                    <option value="{{ $sourses->name }}">{{ $sourses->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="dateForApplication">Выберите дату</label>
                                                <input type="date" name="dateForApplication" class="form-control"
                                                    id="dateForApplication" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="selectedPeriod">Выберите Период</label>
                                                <select class="form-control" id="selectedPeriod" name="selectedPeriod"
                                                    required>
                                                    @foreach($periods as $period)
                                                    <option value="{{ $period->Periods }}">{{ $period->Periods }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-6 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Заполнение адреса</h4>

                                            <div class="row">
                                                <!-- Первая пара form-group -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="addressInput">Субъект РФ</label>
                                                        <input type="text" class="form-control address-dropdown"
                                                            id="addressInput" name="addressInput" required>
                                                        <select id="address" class="form-control address-dropdown"
                                                            name="address" style="display: none;"></select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="addressesArea">Административный Район</label>
                                                        <select id="addressesArea" class="form-control address-dropdown"
                                                            name="addressesArea" data-address-level="2"></select>
                                                    </div>
                                                </div>
                                                <!-- Конец первой пары -->

                                                <!-- Вторая пара form-group -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="addressCity">Город</label>
                                                        <select id="addressCity" class="form-control address-dropdown"
                                                            name="addressCity" data-address-level="5"></select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="addressSettlement">Поселок</label>
                                                        <select id="addressSettlement"
                                                            class="form-control address-dropdown"
                                                            name="addressSettlement" data-address-level="6"></select>
                                                    </div>
                                                </div>
                                                <!-- Конец второй пары -->

                                                <!-- Третья пара form-group -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="addressPlanningStructure">Элемент планировочной
                                                            структуры</label>
                                                        <select id="addressPlanningStructure"
                                                            class="form-control address-dropdown"
                                                            name="addressPlanningStructure"
                                                            data-address-level="7"></select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="addressStreet">Улица</label>
                                                        <select id="addressStreet" class="form-control address-dropdown"
                                                            name="addressStreet" data-address-level="9"></select>
                                                    </div>
                                                </div>
                                                <!-- Конец третьей пары -->

                                                <!-- Четвёртая пара form-group -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="addressHouse">Дом</label>
                                                        <select id="addressHouse" class="form-control address-dropdown"
                                                            name="addressHouse" data-address-level="10"></select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="addressApartment">Квартира</label>
                                                        <select id="addressApartment"
                                                            class="form-control address-dropdown"
                                                            name="addressApartment" data-address-level="11"></select>
                                                    </div>
                                                </div>
                                                <!-- Конец четвёртой пары -->

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="hidden" id="objectGuidField" name="objectGuidField"
                                                            value="">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-danger"
                                                        id="clearFieldsButton">Очистить поля</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Данные о плательщике</h4>

                                            <div class="row">
                                                <!-- Первая пара form-group -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="actual">Актуальность плательщика</label>
                                                        <select id="actual" name="actual" class="form-control" required>
                                                            <option value="актуальный">Актуальный</option>
                                                            <option value="не актуальный">не актуальный</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="payer_code">Код плательщика</label>
                                                        <input type="text" class="form-control" id="payer_code"
                                                            name="payer_code" required />
                                                    </div>
                                                </div>
                                                <!-- Конец первой пары -->

                                                <!-- Вторая пара form-group -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone_number">Номер телефона</label>
                                                        <input type="tel" class="form-control" id="phone_number"
                                                            name="phone_number" required />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="extension_number">Дополнительный телефон</label>
                                                        <input type="tel" class="form-control" id="extension_number"
                                                            name="extension_number" required />
                                                    </div>
                                                </div>
                                                <!-- Конец второй пары -->

                                                <!-- Третья пара form-group -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="country_code">Код страны</label>
                                                        <input type="number" class="form-control" id="country_code"
                                                            name="country_code" required />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="city_code">Код города</label>
                                                        <input type="text" class="form-control" id="city_code"
                                                            name="city_code" required />
                                                    </div>
                                                </div>
                                                <!-- Конец третьей пары -->

                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="dopTab" data-toggle="tab" href="#dop"
                                                        role="tab" aria-controls="dop" aria-selected="true">Доп
                                                        работы</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="zamenaTab" data-toggle="tab" href="#zamena"
                                                        role="tab" aria-controls="zamena"
                                                        aria-selected="false">Замена</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="poverkaTab" data-toggle="tab"
                                                        href="#poverka" role="tab" aria-controls="poverka"
                                                        aria-selected="false">Поверка</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pretenziiTab" data-toggle="tab"
                                                        href="#pretenzii" role="tab" aria-controls="pretenzii"
                                                        aria-selected="false">Претензии</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="santehTab" data-toggle="tab" href="#santeh"
                                                        role="tab" aria-controls="santeh" aria-selected="false">Сантех.
                                                        Услуги</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="specificationsTab" data-toggle="tab"
                                                        href="#specifications" role="tab" aria-controls="specifications"
                                                        aria-selected="false">Спецификации</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content">
                                                <div id="totalPriceContainer">
                                                    <h4>Общая цена: <span id="totalPriceDisplay">0</span></h4>
                                                    <input type="hidden" name="totalPriceValue" id="totalPriceInput"
                                                        value="">
                                                </div>

                                                <input type="hidden" name="totalTimesInput" id="totalTimesInput"
                                                    value="">
                                                <input type="hidden" name="productsInfo" id="productsInfo" value="">

                                                <div class="tab-pane fade show active" id="dop" role="tabpanel"
                                                    aria-labelledby="dopTab" data-category="additionalWork">
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
                                                                        <th style="display: none;">Время</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($additionalWork as $index =>
                                                                    $additionalWor)
                                                                    <tr data-id="{{ $index }}">
                                                                        <td>{{ $additionalWor->name }}</td>

                                                                        <td class="price">{{
                                                                            $additionalWor->price->price }}</td>
                                                                        <td><button class="btn btn-success btn-sm"
                                                                                onclick="updateTotalPrice('plus', {{ $index }})">+</button>
                                                                        </td>
                                                                        <td><button class="btn btn-danger btn-sm"
                                                                                onclick="updateTotalPrice('minus', {{ $index }})">-</button>
                                                                        </td>
                                                                        <td class="quantity" id="quantity{{ $index }}">0
                                                                        </td>
                                                                        <td style="display: none;">{{
                                                                            $additionalWor->timeforjob }}</td>
                                                                        <!-- Hidden field with timeforjob -->
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="zamena" role="tabpanel"
                                                    aria-labelledby="zamenaTab" data-category="replacements">
                                                    <div style="max-height: 400px; overflow-y: auto;">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Наименование</th>
                                                                    <th>Цена</th>
                                                                    <th>Плюс</th>
                                                                    <th>Минус</th>
                                                                    <th>Кол.во</th>
                                                                    <th style="display: none;">Время</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($replacements as $index => $replacement)
                                                                <tr data-id="{{ $index }}">
                                                                    <td>{{ $replacement->name }}</td>

                                                                    <td class="price">{{ $replacement->price->price }}
                                                                    </td>
                                                                    <td><button class="btn btn-success btn-sm"
                                                                            onclick="updateTotalPrice('plus', {{ $index }})">+</button>
                                                                    </td>
                                                                    <td><button class="btn btn-danger btn-sm"
                                                                            onclick="updateTotalPrice('minus', {{ $index }})">-</button>
                                                                    </td>
                                                                    <td class="quantity" id="quantity{{ $index }}">0
                                                                    </td>
                                                                    <td style="display: none;">{{
                                                                        $replacement->timeforjob }}</td>
                                                                    <!-- Hidden field with timeforjob -->
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="poverka" role="tabpanel"
                                                    aria-labelledby="poverkaTab" data-category="verificationOfCounters">
                                                    <div style="max-height: 400px; overflow-y: auto;">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Наименование</th>

                                                                    <th>Цена</th>
                                                                    <th>Плюс</th>
                                                                    <th>Минус</th>
                                                                    <th>Кол.во</th>
                                                                    <th style="display: none;">Время</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($verificationOfCounters as $index =>
                                                                $verificationOfCounter)
                                                                <tr data-id="{{ $index }}">
                                                                    <td>{{ $verificationOfCounter->name }}</td>

                                                                    <td class="price">{{
                                                                        $verificationOfCounter->price->price }}</td>
                                                                    <td><button class="btn btn-success btn-sm"
                                                                            onclick="updateTotalPrice('plus', {{ $index }})">+</button>
                                                                    </td>
                                                                    <td><button class="btn btn-danger btn-sm"
                                                                            onclick="updateTotalPrice('minus', {{ $index }})">-</button>
                                                                    </td>
                                                                    <td class="quantity" id="quantity{{ $index }}">0
                                                                    </td>
                                                                    <td style="display: none;">{{
                                                                        $verificationOfCounter->timeforjob }}</td>
                                                                    <!-- Hidden field with timeforjob -->
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pretenzii" role="tabpanel"
                                                    aria-labelledby="pretenziiTab" data-category="claims">
                                                    <div style="max-height: 400px; overflow-y: auto;">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Наименование</th>

                                                                    <th>Цена</th>
                                                                    <th>Плюс</th>
                                                                    <th>Минус</th>
                                                                    <th>Кол.во</th>
                                                                    <th style="display: none;">Время</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($claims as $index => $claim)
                                                                <tr data-id="{{ $index }}">
                                                                    <td>{{ $claim->name }}</td>

                                                                    <td class="price">{{ $claim->price->price }}</td>
                                                                    <td><button class="btn btn-success btn-sm"
                                                                            onclick="updateTotalPrice('plus', {{ $index }})">+</button>
                                                                    </td>
                                                                    <td><button class="btn btn-danger btn-sm"
                                                                            onclick="updateTotalPrice('minus', {{ $index }})">-</button>
                                                                    </td>
                                                                    <td class="quantity" id="quantity{{ $index }}">0
                                                                    </td>
                                                                    <td style="display: none;">{{ $claim->timeforjob }}
                                                                    </td> <!-- Hidden field with timeforjob -->
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="santeh" role="tabpanel"
                                                    aria-labelledby="santehTab" data-category="plumbingServices">
                                                    <div style="max-height: 400px; overflow-y: auto;">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Наименование</th>

                                                                    <th>Цена</th>
                                                                    <th>Плюс</th>
                                                                    <th>Минус</th>
                                                                    <th>Кол.во</th>
                                                                    <th style="display: none;">Время</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($plumbingServices as $index =>
                                                                $plumbingService)
                                                                <tr data-id="{{ $index }}">
                                                                    <td>{{ $plumbingService->name }}</td>

                                                                    <td class="price">{{ $plumbingService->price->price
                                                                        }}</td>
                                                                    <td><button class="btn btn-success btn-sm"
                                                                            onclick="updateTotalPrice('plus', {{ $index }})">+</button>
                                                                    </td>
                                                                    <td><button class="btn btn-danger btn-sm"
                                                                            onclick="updateTotalPrice('minus', {{ $index }})">-</button>
                                                                    </td>
                                                                    <td class="quantity" id="quantity{{ $index }}">0
                                                                    </td>
                                                                    <td style="display: none;">{{
                                                                        $plumbingService->timeforjob }}</td>
                                                                    <!-- Hidden field with timeforjob -->
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="specifications" role="tabpanel"
                                                    aria-labelledby="specificationsTab" data-category="specifications">
                                                    <div style="max-height: 400px; overflow-y: auto;">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Наименование</th>
                                                                    <th>Цена</th>
                                                                    <th>Плюс</th>
                                                                    <th>Минус</th>
                                                                    <th>Кол.во</th>
                                                                    <th style="display: none;">Время</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($specifications as $index => $specification)
                                                                <tr data-id="{{ $index }}">
                                                                    <td>{{ $specification->name }}</td>

                                                                    <td class="price">{{ $specification->price->price }}
                                                                    </td>
                                                                    <td><button class="btn btn-success btn-sm"
                                                                            onclick="updateTotalPrice('plus', {{ $index }})">+</button>
                                                                    </td>
                                                                    <td><button class="btn btn-danger btn-sm"
                                                                            onclick="updateTotalPrice('minus', {{ $index }})">-</button>
                                                                    </td>
                                                                    <td class="quantity" id="quantity{{ $index }}">0
                                                                    </td>
                                                                    <td style="display: none;">{{
                                                                        $specification->timeforjob }}</td>
                                                                    <!-- Hidden field with timeforjob -->
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
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Комментарии</h4>
                                            <div class="form-group">
                                                <label for="logistic_commentary">Комментарий логиста</label>
                                                <textarea class="form-control" id="logistic_commentary"
                                                    name="logistic_commentary" rows="3"
                                                    placeholder="Введите комментарий логиста"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="metrolog_commentary">Комментарий метролога</label>
                                                <textarea class="form-control" id="metrolog_commentary"
                                                    name="metrolog_commentary" rows="3"
                                                    placeholder="Введите комментарий метролога"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="operator_commentary">Комментарий оператора</label>
                                                <textarea class="form-control" id="operator_commentary"
                                                    name="operator_commentary" rows="3"
                                                    placeholder="Введите комментарий оператора"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 grid-margin stretch-card">

                                </div>
                            </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Отправить заявку</button>
                    </form>
                </div>
            </div>














            <!--    -->


            <script src="https://code.jquery.com/jquery-3.6.0.js"
                integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
            <script
                src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


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

            <script>

                // расчет времени т общей суммы 
                let selectedPrices = {};
                let total = 0;
                let totalTimes = '00:00:00'; // Total accumulated time

                function updateTotalPrice(operation, index) {
                    event.preventDefault();

                    let activeTab = document.querySelector('.tab-pane.active');
                    let selectedItem = activeTab.querySelector('tr[data-id="' + index + '"]');
                    let itemName = selectedItem.querySelector('td:first-child').textContent;
                    let currentPrice = parseFloat(selectedItem.querySelector('.price').textContent);
                    let timeForJob = selectedItem.querySelector('td:last-child').textContent; // Извлечение timeforjob

                    // Находим ячейку с количеством для обновления
                    let quantityCell = selectedItem.querySelector('.quantity');

                    let existingItem = selectedPrices[itemName];

                    // Обновление общего времени для конкретного товара
                    existingItem = existingItem || { quantity: 0, price: 0, timeforjob: '00:00:00' };

                    if (operation === 'plus') {
                        existingItem.timeforjob = addTime(existingItem.timeforjob, timeForJob);
                        existingItem.quantity += 1;
                        existingItem.price += currentPrice;
                        total += currentPrice;
                        totalTimes = addTime(totalTimes, timeForJob);
                    } else if (operation === 'minus' && existingItem.quantity > 0) {
                        existingItem.timeforjob = subtractTime(existingItem.timeforjob, timeForJob);
                        existingItem.quantity -= 1;
                        existingItem.price -= currentPrice;
                        total -= currentPrice;
                        totalTimes = subtractTime(totalTimes, timeForJob);
                    }

                    total = parseFloat(total.toFixed(2));

                    document.getElementById('totalPriceDisplay').textContent = total;

                    if (quantityCell) {
                        quantityCell.textContent = existingItem.quantity;
                    } else {
                        console.error('Quantity cell not found for index ' + index);
                    }

                    // Обновление скрытого поля с общей стоимостью
                    let totalPriceInput = document.getElementById('totalPriceInput');
                    totalPriceInput.value = total;

                    // Обновление скрытого поля с общим временем для каждого товара
                    let productsInfoInput = document.getElementById('productsInfo');
                    selectedPrices[itemName] = existingItem;
                    productsInfoInput.value = JSON.stringify(selectedPrices);

                    // Обновление скрытого поля с общим временем
                    let totalTimesInput = document.getElementById('totalTimesInput');
                    totalTimesInput.value = totalTimes;

                    // Вывод в консоль выбранных цен и времени
                    console.log('Selected Prices:', selectedPrices);
                    console.log('Total Times:', totalTimes);
                }



                function addTime(time1, time2) {
                    let [hours1, minutes1, seconds1] = time1.split(':').map(Number);
                    let [hours2, minutes2, seconds2] = time2.split(':').map(Number);

                    let totalHours = hours1 + hours2;
                    let totalMinutes = minutes1 + minutes2;
                    let totalSeconds = seconds1 + seconds2;

                    // Handle carryovers
                    if (totalSeconds >= 60) {
                        totalMinutes += Math.floor(totalSeconds / 60);
                        totalSeconds %= 60;
                    }

                    if (totalMinutes >= 60) {
                        totalHours += Math.floor(totalMinutes / 60);
                        totalMinutes %= 60;
                    }

                    // Format the result
                    return `${padZero(totalHours)}:${padZero(totalMinutes)}:${padZero(totalSeconds)}`;
                }

                function subtractTime(time1, time2) {
                    let [hours1, minutes1, seconds1] = time1.split(':').map(Number);
                    let [hours2, minutes2, seconds2] = time2.split(':').map(Number);

                    let totalHours = hours1 - hours2;
                    let totalMinutes = minutes1 - minutes2;
                    let totalSeconds = seconds1 - seconds2;

                    // Handle borrow
                    while (totalSeconds < 0) {
                        totalMinutes -= 1;
                        totalSeconds += 60;
                    }

                    while (totalMinutes < 0) {
                        totalHours -= 1;
                        totalMinutes += 60;
                    }

                    // Ensure non-negative values
                    totalHours = Math.max(0, totalHours);
                    totalMinutes = Math.max(0, totalMinutes);
                    totalSeconds = Math.max(0, totalSeconds);

                    // Format the result
                    return `${padZero(totalHours)}:${padZero(totalMinutes)}:${padZero(totalSeconds)}`;
                }


                function padZero(number) {
                    return number < 10 ? '0' + number : number;
                }
            </script>





            <script>
                // выбор даты на заявку
                $(document).ready(function () {
                    $('#datepicker').datepicker({
                        language: 'ru', // Устанавливаем язык (например, русский)
                        dateFormat: 'dd.mm.yyyy', // Формат даты
                        autoClose: false, // Закрытие календаря после выбора даты
                        timepicker: true,

                    });
                });

            </script>



            <script>
                // кнопка очистить форму
                document.getElementById('clearFieldsButton').addEventListener('click', function () {
                    // Очистка значений полей
                    document.getElementById('addressInput').value = '';

                    // Очистка значений выпадающих списков
                    clearDropdown('address');
                    clearDropdown('addressesArea');
                    clearDropdown('addressCity');
                    clearDropdown('addressSettlement');
                    clearDropdown('addressPlanningStructure');
                    clearDropdown('addressStreet');
                    clearDropdown('addressHouse');
                    clearDropdown('addressApartment');

                    // Если поля - это select, их можно очистить так:
                    document.getElementById('addressesArea').selectedIndex = -1;
                });

                function clearDropdown(id) {
                    let dropdown = document.getElementById(id);
                    dropdown.innerHTML = '';
                }

            </script>


            <script>
                
            </script>



            <script>
                let currentPath = "";
                let selectedObjectId;
                let selectedSubjectId;

                $(document).ready(function () {

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



                    addressInput.on('input', function () {
                        let searchValue = $(this).val();

                        // Проверка, что введено значение для поиска
                        if (searchValue.length > 0) {
                            $.ajax({
                                url: '{{ url("/api/getAddressItems") }}',
                                method: 'post',
                                data: { search: searchValue },  // Передача введенного значения для поиска
                                success: function (response) {
                                    let fullNames = response.addresses;
                                    updateDropdown(fullNames);
                                },
                                error: function (error) {
                                    console.log(error);
                                },
                            });
                        } else {
                            // Если поле ввода пусто, очистите выпадающий список
                            clearDropdown('address');
                        }
                    });

                    // ... Остальной код ...

                    function updateDropdown(addresses) {
                        addressDropdown.empty();

                        addresses.forEach(function (address) {
                            let option = $('<option>').val(address.full_name).text(address.full_name);
                            option.data('object-id', address.object_id);
                            addressDropdown.append(option);
                        });

                        // Очистка значений других выпадающих списков
                        clearAddressFields();

                        addressDropdown.show();
                    }

                    function clearAddressFields() {
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

                    addressInput.on('input', function () {
                        if (addressInput.val() === '') {
                            addressDropdown.show();
                            clearAddressFields(); // Clear other fields when the input is empty
                        }
                    });


                    // ajax для обновления полей в зависмости от выбранного object_id
                    addressDropdown.on('change', function () {
                        let selectedOption = addressDropdown.find('option:selected');

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
                            success: function (response) {
                                let addressesData = response.addresses;
                                console.log(addressesData);


                                if (addressesData.hasOwnProperty('2')) {
                                    let dropdown = $('select[name="addressesArea"]');
                                    dropdown.empty();
                                    dropdown.append('<option value="" selected disabled hidden>Выберите Район</option>');
                                    $.each(addressesData['2'], function (index, address) {
                                        let newOption = new Option(address.full_name, address.full_name, false, false);
                                        $(newOption).data('object-id', address.object_id);
                                        dropdown.append(newOption);
                                    });
                                }

                                if (addressesData.hasOwnProperty('5')) {
                                    let dropdown = $('select[name="addressCity"]');
                                    dropdown.empty();
                                    dropdown.append('<option value="" selected disabled hidden>Выберите Город</option>');
                                    $.each(addressesData['5'], function (index, address) {
                                        let newOption = new Option(address.full_name, address.full_name, false, false);
                                        $(newOption).data('object-id', address.object_id);
                                        dropdown.append(newOption);
                                    });
                                }

                                if (addressesData.hasOwnProperty('6')) {
                                    let dropdown = $('select[name="addressSettlement"]');
                                    dropdown.empty();
                                    dropdown.append('<option value="" selected disabled hidden>Выберите населлный пункт</option>');
                                    $.each(addressesData['6'], function (index, address) {
                                        let newOption = new Option(address.full_name, address.full_name, false, false);
                                        $(newOption).data('object-id', address.object_id);
                                        dropdown.append(newOption);
                                    });
                                }

                                if (addressesData.hasOwnProperty('7')) {
                                    let dropdown = $('select[name="addressPlanningStructure"]');
                                    dropdown.empty();
                                    dropdown.append('<option value="" selected disabled hidden>Выберите элемент планировочноый структуры</option>');
                                    $.each(addressesData['7'], function (index, address) {
                                        let newOption = new Option(address.full_name, address.full_name, false, false);
                                        $(newOption).data('object-id', address.object_id);
                                        dropdown.append(newOption);
                                    });
                                }

                                if (addressesData.hasOwnProperty('8')) {
                                    let dropdown = $('select[name="addressStreet"]');
                                    dropdown.empty();
                                    dropdown.append('<option value="" selected disabled hidden>Выберите улично дорожный элемент</option>');
                                    $.each(addressesData['8'], function (index, address) {
                                        let newOption = new Option(address.full_name, address.full_name, false, false);
                                        $(newOption).data('object-id', address.object_id);
                                        dropdown.append(newOption);
                                    });
                                }

                                if (addressesData.hasOwnProperty('10')) {
                                    let dropdown = $('select[name="addressHouse"]');
                                    dropdown.empty();
                                    dropdown.append('<option value="" selected disabled hidden>Выберите дом</option>');
                                    $.each(addressesData['10'], function (index, address) {
                                        let newOption = new Option(address.full_name, address.full_name, false, false);
                                        $(newOption).data('object-id', address.object_id);
                                        dropdown.append(newOption);
                                    });
                                }

                                if (addressesData.hasOwnProperty('11')) {
                                    let dropdown = $('select[name="addressApartment"]');
                                    dropdown.empty();
                                    dropdown.append('<option value="" selected disabled hidden>Выберите квартиру</option>');
                                    $.each(addressesData['11'], function (index, address) {
                                        let newOption = new Option(address.full_name, address.full_name, false, false);
                                        $(newOption).data('object-id', address.object_id);
                                        dropdown.append(newOption);

                                    });
                                }


                            },
                            error: function (error) {
                                console.log(error);

                            }

                        });



                        function onSelectChange(selectedElement) {
                            addressDropdown.hide();
                            $.ajax(
                                {
                                    url: '{{ url("/api/postNewAddress") }}',
                                    method: 'POST',
                                    data: { objectID: selectedObjectId, path: currentPath },
                                    success: function (response) {
                                        let addressesDatas = response.addresses;
                                        console.log(addressesDatas);

                                        updateDropdowns(addressesDatas);

                                        postNewAddress(currentPath);


                                        if (addressesDatas.hasOwnProperty('2')) {
                                            let dropdown = $('select[name="addressesArea"]');
                                            dropdown.empty();
                                            dropdown.append('<option value="" selected disabled hidden>Выберите Район</option>');
                                            $.each(addressesDatas['2'], function (index, address) {
                                                let newOption = new Option(address.full_name, address.full_name, false, false);
                                                $(newOption).data('object-id', address.object_id);
                                                dropdown.append(newOption);
                                            });
                                        }

                                        if (addressesDatas.hasOwnProperty('5')) {
                                            let dropdown = $('select[name="addressCity"]');
                                            dropdown.empty();
                                            dropdown.append('<option value="" selected disabled hidden>Выберите Город</option>');
                                            $.each(addressesDatas['5'], function (index, address) {
                                                let newOption = new Option(address.full_name, address.full_name, false, false);
                                                $(newOption).data('object-id', address.object_id);
                                                dropdown.append(newOption);
                                            });
                                        }

                                        if (addressesDatas.hasOwnProperty('6')) {
                                            let dropdown = $('select[name="addressSettlement"]');
                                            dropdown.empty();
                                            dropdown.append('<option value="" selected disabled hidden>Выберите населлный пункт</option>');
                                            $.each(addressesDatas['6'], function (index, address) {
                                                let newOption = new Option(address.full_name, address.full_name, false, false);
                                                $(newOption).data('object-id', address.object_id);
                                                dropdown.append(newOption);
                                            });
                                        }

                                        if (addressesDatas.hasOwnProperty('7')) {
                                            let dropdown = $('select[name="addressPlanningStructure"]');
                                            dropdown.empty();
                                            dropdown.append('<option value="" selected disabled hidden>Выберите элемент планировочноый структуры</option>');
                                            $.each(addressesDatas['7'], function (index, address) {
                                                let newOption = new Option(address.full_name, address.full_name, false, false);
                                                $(newOption).data('object-id', address.object_id);
                                                dropdown.append(newOption);
                                            });
                                        }

                                        if (addressesDatas.hasOwnProperty('8')) {
                                            let dropdown = $('select[name="addressStreet"]');
                                            dropdown.empty();
                                            dropdown.append('<option value="" selected disabled hidden>Выберите улично дорожный элемент</option>');
                                            $.each(addressesDatas['8'], function (index, address) {
                                                let newOption = new Option(address.full_name, address.full_name, false, false);
                                                $(newOption).data('object-id', address.object_id);
                                                dropdown.append(newOption);
                                            });
                                        }

                                        if (addressesDatas.hasOwnProperty('10')) {
                                            let dropdown = $('select[name="addressHouse"]');
                                            dropdown.empty();
                                            dropdown.append('<option value="" selected disabled hidden>Выберите дом</option>');
                                            $.each(addressesDatas['10'], function (index, address) {
                                                let newOption = new Option(address.full_name, address.full_name, false, false);
                                                $(newOption).data('object-id', address.object_id);
                                                dropdown.append(newOption);
                                            });
                                        }

                                        if (addressesDatas.hasOwnProperty('11')) {
                                            let dropdown = $('select[name="addressApartment"]');
                                            dropdown.empty();
                                            dropdown.append('<option value="" selected disabled hidden>Выберите квартиру</option>');
                                            $.each(addressesDatas['11'], function (index, address) {
                                                let newOption = new Option(address.full_name, address.full_name, false, false);
                                                $(newOption).data('object-id', address.object_id);
                                                dropdown.append(newOption);

                                            });
                                        }


                                    },
                                    error: function (error) {
                                        console.log(error);
                                    }
                                });


                        }




                        function postNewAddress(currentPath) {
                            console.log('Address sent to the server:', currentPath);
                        }


                        function updateCurrentPath(selectedObjectId, selectorId) {
                            const selectedObjectIndex = addressHierarchy.findIndex(entry => entry.selectorId === selectorId);
                            const currentObject = {
                                objectId: selectedObjectId,
                                selectorId: selectorId
                            };

                            if (selectedObjectIndex === -1) {
                                // If the element is not selected yet, add it to the array
                                addressHierarchy.push(currentObject);
                            }
                            else {
                                // If the element is already selected, update its objectId
                                addressHierarchy[selectedObjectIndex].objectId = selectedObjectId;

                                // Check and enforce the order of address levels
                                if (!checkLevelOrder(selectedObjectIndex + 1, selectedObjectIndex)) {
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


                        function updateDropdowns(addressesDatas) {
                            // Проверка, что addressesDatas - это объект
                            if (typeof addressesDatas === 'object') {
                                for (let key in addressesDatas) {
                                    if (addressesDatas.hasOwnProperty(key) && Array.isArray(addressesDatas[key])) {
                                        let addressesData = addressesDatas[key];
                                        let dropdown = $('select[name="address' + key + '"]');

                                        // Очистка выпадающего списка и добавление первого элемента
                                        dropdown.empty();
                                        dropdown.append('<option value="" selected disabled hidden>Выберите ' + key + '</option>');

                                        addressesData.forEach(function (address) {
                                            let newOption = new Option(address.full_name, address.full_name, false, false);
                                            $(newOption).data('object-id', address.object_id);

                                            dropdown.append(newOption);
                                        });

                                        // Сохранение object_guid в скрытом поле для административного района
                                        if (key !== '2' && addressesData.length > 0) {
                                            let objectGuid = addressesData[0].object_guid; // Принимаем, что object_guid доступен в первом элементе массива
                                            $('#objectGuidField').val(objectGuid);
                                            console.log('object_guid for ' + key + ':', objectGuid); // Вывод в консоль
                                        }

                                        // Показать обновленный выпадающий список
                                        dropdown.show();
                                    } else {
                                        console.error('Invalid data structure or no addresses for key ' + key + ':', addressesDatas);
                                    }
                                }
                            } else {
                                console.error('Invalid data type for addressesDatas:', typeof addressesDatas);
                            }
                        }



                        function checkLevelOrder(expectedLevel, selectedObjectIndex) {
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



                        $('#addressesArea').on('change', function () {
                            const selectedObjectId = $(this).find('option:selected').data('object-id');
                            updateCurrentPath(selectedObjectId, 'addressesArea');
                            clearLowerLevelFields('addressesArea');
                            onSelectChange($(this));
                        });


                        $('#addressCity').on('change', function () {
                            const selectedObjectId = $(this).find('option:selected').data('object-id');
                            updateCurrentPath(selectedObjectId, 'addressCity');
                            clearLowerLevelFields('addressCity');
                            onSelectChange($(this));
                        });

                        $('#addressSettlement').on('change', function () {
                            const selectedObjectId = $(this).find('option:selected').data('object-id');
                            updateCurrentPath(selectedObjectId, 'addressSettlement');
                            clearLowerLevelFields('addressSettlement');
                            onSelectChange($(this));
                        });

                        $('#addressPlanningStructure').on('change', function () {
                            const selectedObjectId = $(this).find('option:selected').data('object-id');
                            updateCurrentPath(selectedObjectId, 'addressPlanningStructure');
                            clearLowerLevelFields('addressPlanningStructure');
                            onSelectChange($(this));
                        });

                        $('#addressStreet').on('change', function () {
                            const selectedObjectId = $(this).find('option:selected').data('object-id');
                            updateCurrentPath(selectedObjectId, 'addressStreet');
                            clearLowerLevelFields('addressStreet');
                            console.log(selectedObjectId);
                            onSelectChange($(this));
                        });

                        $('#addressHouse').on('change', function () {
                            const selectedObjectId = $(this).find('option:selected').data('object-id');
                            updateCurrentPath(selectedObjectId, 'addressHouse');
                            clearLowerLevelFields('addressHouse');
                            onSelectChange($(this));
                        });

                        $('#addressApartment').on('change', function () {
                            const selectedObjectId = $(this).find('option:selected').data('object-id');
                            updateCurrentPath(selectedObjectId, 'addressApartment');
                            clearLowerLevelFields('addressApartment');
                            onSelectChange($(this));
                        });
                    });

                });
            </script>

</body>

</html