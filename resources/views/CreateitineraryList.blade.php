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
    <!-- <link rel="stylesheet" href="{{ 'assets/vendors/select2/select2.min.css' }}">
    <link rel="stylesheet" href="{{ 'assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css' }}"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <!-- JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
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


        .form-select {
            border: 0 !important;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url(http://www.htmllion.com/img/demo/select-arrow.png) no-repeat 90% center;
            width: 200px;
            text-indent: 0.01px;
            text-overflow: "";
            color: gray;
            padding: 5px;
            border: 1px solid gray !important;
        }

        .input-style {
            border: 0 !important;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url(http://www.htmllion.com/img/demo/select-arrow.png) no-repeat 90% center;
            width: 200px;
            text-indent: 0.01px;
            text-overflow: "";
            color: gray;
            padding: 5px;
            border: 1px solid gray !important;
        }

        .hidden {
            display: none !important;
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
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Маршрутный лист (№<span id="routeSheetNumber"></span>) от
                                        <span id="currentDateTime"></span></h4>
                                    <p class="card-text"><strong style="font-size: 15px;">Номер:</strong> <span
                                            id="routeSheetNumberField"></span></p>

                                    <form>
                                        <div class="form-group row">
                                            <label for="authorSelect"
                                                class="col-sm-3 col-form-label"><strong>Автор:</strong></label>
                                            <div class="col-sm-9">
                                                <select class="form-select" id="authorSelect">
                                                    <option value="" selected>Show All</option>
                                                    @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="organizationSelect"
                                                class="col-sm-3 col-form-label"><strong>Организация:</strong></label>
                                            <div class="col-sm-9">
                                                <select class="form-select" id="organizationSelect">
                                                    <option value="" selected>Show All</option>
                                                    @foreach($organization as $organizations)
                                                    <option value="{{ $organizations->name }}">{{ $organizations->name
                                                        }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="timeinput" class="col-sm-3 col-form-label"><strong>Кол-во
                                                    времени:</strong></label>
                                            <div class="col-sm-9">
                                                <input class="form-select input-style" id="timeinput"
                                                    placeholder="Ведите время формата Ч:М:C">
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="completionDate" class="col-sm-3 col-form-label"><strong>Дата
                                                    выполнения:</strong></label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" id="completionDate"
                                                    style="max-width: 150px;">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="metrolog"
                                                class="col-sm-3 col-form-label"><strong>Метролог:</strong></label>
                                            <div class="col-sm-9">
                                                <select class="form-select" id="metrolog">
                                                    <option value="" selected>Show All</option>
                                                    @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="statusSelect" class="col-sm-3 col-form-label"><strong>Статус
                                                    Заявок:</strong></label>
                                            <div class="col-sm-9">
                                                <select class="form-select" id="statusSelect">
                                                    <option value="" selected>Show All</option>
                                                    @foreach($status as $statuses)
                                                    <option value="{{ $statuses->id }}">{{ $statuses->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Горизонтальные кнопки -->
                                        <div class="form-group row" style="margin-top: 10px;">
                                            <div class="col-sm-6">
                                                <button type="button" class="btn btn-primary"
                                                    id="fillButton">Заполнить</button>
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="button" class="btn btn-success">Добавить</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Your content for the first card goes here -->

                                    <!-- Внутренняя таблица -->
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Район-округ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Замените эти строки на ваши данные из бэкенда -->
                                            <tr>
                                                <td>1</td>
                                                <td>Значение района 1</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Your table content goes here -->
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="applicationsTable">
                                            <thead>
                                                <tr>
                                                    <th>№</th>
                                                    <th>Заявка наряд</th>
                                                    <th>Статус</th>
                                                    <th>Услуги</th>
                                                    <th>Организация</th>
                                                    <th>Метролог</th>
                                                    <th>Интервал</th>
                                                    <th>Дата выхода</th>
                                                    <th>Адрес</th>
                                                    <th>Комментарий логисту</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($applications as $application)
                                                <tr data-organization="{{ $application->organization }}">
                                                    <td>{{ $application->id }}</td>
                                                    <td>Заявка наряд {{ $loop->iteration }} от {{
                                                        $application->created_at }}</td>
                                                    <td>{{ $application->status->name }}</td>
                                                    <td>
                                                        @foreach(array_keys(json_decode($application->productsInfo,
                                                        true)) as $service)
                                                        {{ $service }}<br>
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $application->organization }}</td>
                                                    <td>
                                                        @if($application->metrologs &&
                                                        !$application->metrologs->isEmpty())
                                                        @foreach($application->metrologs as $metrolog)
                                                        {{ $metrolog->metrolog->name }}
                                                        @endforeach
                                                        @else
                                                        нет метролога
                                                        @endif
                                                    </td>
                                                    <td>{{ $application->selectedPeriod }}</td>
                                                    <td>{{ $application->dateForApplication }}</td>
                                                    <td>
                                                        @if($application->addresses &&
                                                        !$application->addresses->isEmpty())
                                                        @foreach($application->addresses as $address)
                                                        {{ $address->full_address }}<br>
                                                        @endforeach
                                                        @else
                                                        нет адреса
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($application->commentary)
                                                        {{ $application->commentary->logistic_commentary }}
                                                        @else
                                                        нет комментария логисту
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="totalTimesInput[]"
                                                            value="{{ $application->totalTimesInput }}">
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


                        <!-- 
    1. Надо запилить скрытое поле с общим количеством времени на заявку, чтобы по нему можно было фильтровать
    2. Надо запилить филтр по организациям, создать базу и подконектить ее. - +
    3. Надо запилить фильтр по метрологам
    4. Надо заплить создание маршрутного листа
    5. Надо реализовать кнопку добавить
    6. 
 -->

                        <script>
                            $(document).ready(function () {
                                $("#fillButton").on("click", function () {
                                    var selectedStatusText = $("#statusSelect option:selected").text().toLowerCase();
                                    var selectedOrgText = $("#organizationSelect option:selected").text().toLowerCase();

                                    // Скрыть все строки
                                    $("#applicationsTable tbody tr").hide();

                                    // Показать строки, соответствующие выбранному статусу и выбранной организации
                                    $("#applicationsTable tbody tr").filter(function () {
                                        var statusColumnText = $(this).find("td:nth-child(3)").text().toLowerCase();
                                        var orgColumnText = $(this).find("td:nth-child(5)").text().toLowerCase();

                                        // Показать только строки, удовлетворяющие обоим условиям
                                        return (selectedStatusText === 'show all' || statusColumnText === selectedStatusText) &&
                                            (selectedOrgText === 'show all' || orgColumnText === selectedOrgText);
                                    }).show();
                                });
                            });
                        </script>


                        <script>
                            $(document).ready(function () {
                                $("#timeinput").on("input", function () {
                                    var selectedTime = $(this).val();

                                    // Показать все строки, если выбраны обе опции "Показать все"
                                    if (selectedTime === 'show all') {
                                        $("#applicationsTable tbody tr").show();
                                    } else {
                                        // Скрыть все строки
                                        $("#applicationsTable tbody tr").hide();

                                        // Фильтрация строк по выбранному времени
                                        $("#applicationsTable tbody tr").filter(function () {
                                            var totalTimesInput = $(this).find("input[name='totalTimesInput[]']").val();
                                            return totalTimesInput === selectedTime;
                                        }).show();
                                    }
                                });
                            });
                        </script>

                        <script>
                            // Дождемся полной загрузки страницы
                            document.addEventListener("DOMContentLoaded", function () {
                                // Получаем текущую дату и время
                                var currentDate = new Date();
                                var formattedDate = currentDate.toLocaleString();

                                // Вставляем текущую дату и время в соответствующие элементы
                                document.getElementById("currentDateTime").innerText = formattedDate;

                                // Генерируем случайный номер маршрутного листа (можете изменить логику генерации)
                                var routeSheetNumber = Math.floor(Math.random() * 1000) + 1; // пример генерации от 1 до 1000

                                // Вставляем номер маршрутного листа в соответствующий элемент
                                document.getElementById("routeSheetNumber").innerText = routeSheetNumber;
                            });
                        </script>















                        <!-- <script>
                            $(document).ready(function () {
                                // Capture change event on the organization dropdown
                                $('#organizationSelect').on('change', function () {
                                    // Get the selected organization
                                    var selectedOrganization = $(this).val().toLowerCase();

                                    // Loop through each table row
                                    $('#applicationsTable tbody tr').each(function () {
                                        // Get the data-organization attribute value
                                        var rowOrganization = $(this).data('organization').toLowerCase();

                                        // Show or hide the row based on the selected organization
                                        if (selectedOrganization === '' || selectedOrganization === rowOrganization) {
                                            $(this).show();
                                        } else {
                                            $(this).hide();
                                        }
                                    });
                                });
                            });
                        </script> -->




























                        <script src="https://code.jquery.com/jquery-3.6.0.js"
                            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                            crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
                        <script
                            src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
                        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                        <script
                            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                        <script
                            src="https://cdn.jsdelivr.net/npm/air-datepicker@2.2.3/dist/js/datepicker.min.js"></script>

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