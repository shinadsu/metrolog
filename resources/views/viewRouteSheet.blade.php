<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>METROLOG</title>
    <!-- plugins:css -->
    <!-- <link rel="stylesheet" href="{{ 'assets/vendors/feather/feather.css' }}">
    <link rel="stylesheet" href="{{ 'assets/vendors/ti-icons/css/themify-icons.css' }}">
    <link rel="stylesheet" href="{{ 'assets/vendors/css/vendor.bundle.base.css' }}"> -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-draw/dist/leaflet.draw.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="{{ 'assets/css/vertical-layout-light/style.css' }}"> -->
    <!-- <link rel="shortcut icon" href="{{ 'assets/images/favicon.png' }}" /> -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="https://unpkg.com/@turf/turf@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script src="https://unpkg.com/leaflet-extra-markers/dist/js/leaflet.extra-markers.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-extra-markers/dist/css/leaflet.extra-markers.min.css" />
    <!-- <script src="{{ 'assets/vendors/typeahead.js/typeahead.bundle.min.js' }} "></script>
    <script src="{{ 'assets/vendors/select2/select2.min.js' }} "></script>
    <script src="{{ 'assets/js/off-canvas.js' }} "></script>
    <script src="{{ 'assets/js/hoverable-collapse.js' }} "></script>
    <script src="{{ 'assets/js/template.js' }} "></script>
    <script src="{{ 'assets/js/settings.js' }} "></script>
    <script src="{{ 'assets/js/todolist.js' }} "></script>
    <script src="{{ 'assets/js/file-upload.js' }} "></script>
    <script src="{{ 'assets/js/typeahead.js' }} "></script>
    <script src="{{ 'assets/js/select2.js' }} "></script> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
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
                        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
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
                                <li class="nav-item"> <a class="nav-link" href="{{ route('userrequisitessettings.index') }}"> Реквезиты </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('statustransitionsController.index') }}"> Статусы </a></li>
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
                                    <h4 class="card-title">Маршрутный лист (№<span id="routeSheetNumber">{{
    $routeSheet->route_sheet_number }}</span>) от
                                        <span id="currentDateTime">{{ $routeSheet->current_date_time }}</span>
                                    </h4>

                                    <form>
                                        <div class="form-group row">
                                            <label for="authorSelect" class="col-sm-3 col-form-label"><strong>Автор:</strong></label>
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
                                            <label for="organizationSelect" class="col-sm-3 col-form-label"><strong>Организация:</strong></label>
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
                                                <input class="form-select input-style" id="timeinput" placeholder="Ведите время формата Ч:М:C">
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="completionDate" class="col-sm-3 col-form-label"><strong>Дата
                                                    выполнения:</strong></label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" id="completionDate" style="max-width: 150px;">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="metrolog" class="col-sm-3 col-form-label"><strong>Метролог:</strong></label>
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
                                                <button type="button" class="btn btn-primary" id="fillButton">Заполнить</button>

                                                <button type="button" id="addButton" class="btn btn-success">Добавить</button>

                                                <button type="button" id="createRouteSheetButton" class="btn btn-success">Создать маршрутный лист</button>

                                                <button type="button" id="showOnMapButton" class="btn btn-success">Показать на карте</button>

                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Район-округ</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>1</td>
                                                <td>Значение района 1</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="dop" role="tabpanel" aria-labelledby="dopTab" data-category="additionalWork">
                                            <div style="max-height: 400px; overflow-y: auto;">
                                                <div class="table-responsive pt-3">
                                                    <table class="table table-bordered" id="applicationsTable">
                                                        <thead>
                                                            <tr>
                                                                <th>№</th>
                                                                <th>Заявка наряд</th>
                                                                <th>Статус</th>
                                                                <th>Услуги</th>
                                                                <th>Метролог</th>
                                                                <th>Интервал</th>
                                                                <th>Дата выхода</th>
                                                                <th>Адрес</th>
                                                                <th>Комментарий логисту</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($routeSheet->applications as $key => $application)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $application->id }}</td>
                                                                <td>{{ $application->status->name }}</td>
                                                                <td>{{ implode(
                                                                                ', ',
                                                                                array_keys(
                                                                                    json_decode(
                                                                                        $application->productsInfo,
                                                                                        true
                                                                                    )
                                                                                )
                                                                            ) }}</td>
                                                                <td>{{ $routeSheet->metrolog }}</td>
                                                                <td>{{ $application->selectedPeriod }}</td>
                                                                <td>{{ $application->dateForApplication }}</td>
                                                                <td>{{ $application->addresses->first()->full_address ?? '' }}</td>
                                                                <td>{{ $application->commentary->logistic_commentary }}
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>


                                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


                                            <script>
                                                $(document).ready(function() {
                                                    function addDropdownList(selector, data) {
                                                        var existingDropdown = $(selector).next('.form-control');

                                                        if (existingDropdown.length) {
                                                            existingDropdown.empty().append('<option value=""></option>');
                                                            for (var i = 0; i < data.length; i++) {
                                                                existingDropdown.append('<option value="' + data[i].id + '">' + data[i].id + '</option>');
                                                            }
                                                        } else {
                                                            $(selector).next('select').remove();

                                                            var dropdownList = $('<select class="form-control"></select>').append('<option value=""></option>');

                                                            for (var i = 0; i < data.length; i++) {
                                                                dropdownList.append('<option value="' + data[i].id + '">' + data[i].id + '</option>');
                                                            }

                                                            dropdownList.insertAfter(selector);

                                                            dropdownList.on("change", function() {
                                                                var selectedValue = $(this).val();
                                                                $(selector).text(selectedValue);
                                                                dropdownList.remove();
                                                                $(selector).trigger("change");
                                                            });
                                                        }
                                                    }




                                                    function fetchDataForId(inputValue, row) {

                                                        return $.ajax({
                                                            url: 'http://case.sknewlife.ru/getApplicationById/' + inputValue,
                                                            type: 'GET',
                                                            dataType: 'json'
                                                        }).done(function(response) {
                                                            console.log('AJAX Response:', response);
                                                            if (response.success) {
                                                                if (row && row.find) {
                                                                    row.find('.for-status, .for-job, .for-interval, .for-planeDate, .for-address, .for-logistCommentary').text('');
                                                                    console.log('Fetching data for ID:', inputValue);
                                                                    addDropdownList(row.find('.for-id'), response.data);

                                                                    row.find('.for-status').text(response.data[0].status_name);

                                                                    var productsInfoText = response.data[0].productsInfo ? response.data[0].productsInfo.join(', ') : '';
                                                                    row.find('.for-job').text(productsInfoText);

                                                                    row.find('.for-interval').text(response.data[0].selectedPeriod);
                                                                    row.find('.for-planeDate').text(response.data[0].dateForApplication);
                                                                    row.find('.for-address').text(response.data[0].address);
                                                                    row.find('.for-logistCommentary').text(response.data[0].logistic_commentary);

                                                                }
                                                            }
                                                        }).fail(function() {
                                                            console.error('AJAX Error');
                                                        });
                                                    }

                                                    function handleIdInputChange() {
                                                        var inputValue = $(this).text().trim();
                                                        console.log('Input Value:', inputValue);

                                                        if (inputValue !== '') {
                                                            var row = $(this).closest('tr');
                                                            fetchDataForId(inputValue, row).done(function(response) {
                                                                if (response.success) {
                                                                    row.find('.for-status, .for-job, .for-interval, .for-planeDate, .for-address, .for-logistCommentary').text('');
                                                                    console.log('Fetching data for ID:', inputValue);
                                                                    addDropdownList(row.find('.for-id'), response.data);

                                                                    row.find('.for-status').text(response.data[0].status_name);

                                                                    var productsInfoText = response.data[0].productsInfo ? response.data[0].productsInfo.join(', ') : '';
                                                                    row.find('.for-job').text(productsInfoText);

                                                                    row.find('.for-interval').text(response.data[0].selectedPeriod);
                                                                    row.find('.for-planeDate').text(response.data[0].dateForApplication);
                                                                    row.find('.for-address').text(response.data[0].address);
                                                                    row.find('.for-logistCommentary').text(response.data[0].logistic_commentary);

                                                                }
                                                            }).fail(function() {
                                                                console.error('AJAX Error');
                                                            });
                                                        } else {
                                                            row.find('.for-id + select').remove();
                                                            row.find('.for-status, .for-job, .for-interval, .for-planeDate, .for-logistCommentary').text('');
                                                        }
                                                    }

                                                    function addRow() {
                                                        var newRow = $("<tr>");
                                                        var rowCount = $('#applicationsTable tbody tr').length + 1;
                                                        newRow.append('<td>' + rowCount + '</td>');

                                                        var cellClasses = [
                                                            'for-id', 'for-status',
                                                            'for-job', 'for-metrolog',
                                                            'for-interval', 'for-planeDate',
                                                            'for-address', 'for-logistCommentary'
                                                        ];

                                                        for (var i = 0; i < cellClasses.length; i++) {
                                                            newRow.append('<td contenteditable="true" class="' + cellClasses[i] + '"></td>');

                                                            if (i === 0) {
                                                                newRow.find('.for-id').on("input", handleIdInputChange);
                                                                newRow.find('.for-id').on("change", function() {
                                                                    // Добавьте код для обработки события изменения значения, если это необходимо
                                                                });
                                                            }
                                                        }

                                                        $("#applicationsTable tbody").append(newRow);
                                                        console.log('Новая строка добавлена. Всего строк:', rowCount);
                                                    }

                                                    $("#addButton").on("click", function() {
                                                        addRow();
                                                    });

                                                    $("#applicationsTable tbody").on("blur", "td[contenteditable='true']", function() {
                                                        var rowIndex = $(this).closest("tr").index();
                                                        var colIndex = $(this).index();
                                                        var newText = $(this).text();
                                                    });
                                                });
                                            </script>


                                            <script>
                                                $(document).ready(function () {
                                                    $("#showOnMapButton").on("click", function () {
                                                        // Получаем все id из таблицы
                                                        var applicationIds = [];
                                                        var csrfToken = '{{ csrf_token() }}'; // Получаем CSRF-токен для запросов
                                                        $("#applicationsTable tbody tr").each(function () {
                                                            var applicationId = $(this).find("td:nth-child(2)").text();
                                                            applicationIds.push(applicationId);
                                                        });
                                                        var currentPageId = extractIdFromCurrentPage();
                                                        
                                                        console.log(applicationIds);

                                                        // Отправляем AJAX-запрос для первой части данных
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "http://case.sknewlife.ru/postAddressStructureForMap",
                                                            data: { applicationIds: applicationIds },
                                                            headers: {
                                                                'X-CSRF-TOKEN': csrfToken,
                                                            },
                                                            success: function (response) {
                                                                console.log("Успешно отправлено на сервер:", response);

                                                                // // Сохраняем данные в localStorage
                                                                // localStorage.setItem('showOnMapButtonClicked', 'true');
                                                                // localStorage.setItem('showOnMapData', JSON.stringify(response));

                                                                // console.log(response);

                                                                // Открываем новое окно после успешного выполнения
                                                                window.open('http://case.sknewlife.ru/routesmap', '_blank');

                                                                // Отправляем второй AJAX-запрос
                                                                $.ajax({
                                                                    type: "POST",
                                                                    url: "http://case.sknewlife.ru/postApplicationsIds",
                                                                    data: { applicationIds: applicationIds },
                                                                    headers: {
                                                                        'X-CSRF-TOKEN': csrfToken,
                                                                    },
                                                                    success: function (secondResponse) 
                                                                    {
                                                                        console.log("Второй AJAX-запрос успешно выполнен:", secondResponse);
                                                                        
                                                                        // Сохраняем данные в localStorage
                                                                        localStorage.setItem('secondAjaxData', JSON.stringify(secondResponse));
                                                                        localStorage.setItem('currentPageId', currentPageId);
                                                                //         // Вызываем функцию showOnMap с данными обоих запросов
                                                                        
                                                                    },
                                                                    error: function (secondError) {
                                                                        console.error("Ошибка при выполнении второго AJAX-запроса:", secondError);
                                                                        // Обработайте ошибку второго запроса здесь
                                                                    }
                                                                });
                                                            },
                                                            error: function (error) {
                                                                console.error("Ошибка при отправке на сервер:", error);
                                                                // Обработайте ошибку первого запроса здесь
                                                            }
                                                        });
                                                    });
                                                });

                                                function extractIdFromCurrentPage() {
                                                    var url = window.location.href;
                                                    var match = url.match(/\/route-sheets\/(\d+)/);

                                                    if (match && match[1]) {
                                                        return match[1];
                                                    } else {
                                                        console.error('Не удалось извлечь id из текущей страницы');
                                                        return null;
                                                    }
                                                }

                                        </script>




                                            <!-- 
                                            <script>
                                                $(document).ready(function () {
                                                    // Получаем номер маршрутного листа из URL
                                                    var routeSheetNumber = window.location.pathname.split('/').pop();

                                                    // Устанавливаем номер маршрутного листа в HTML
                                                    $("#routeSheetNumber").text(routeSheetNumber);

                                                    // Ваш остальной JavaScript код...
                                                });
                                            </script> -->


                                            <script>
                                                $("#createRouteSheetButton").on("click", function() {
                                                    // Получаем номер маршрутного листа и текущую дату/время из DOM
                                                    var csrfToken = '{{ csrf_token() }}'; // Получаем CSRF-токен для запросов
                                                    var routeSheetNumber = $("#routeSheetNumber").text().trim();
                                                    var currentDateTime = $("#currentDateTime").text().trim();

                                                    // Собираем данные из формы
                                                    var authorName = $("#authorSelect option:selected").text();
                                                    var organizationName = $("#organizationSelect option:selected").text();
                                                    var timeInput = $("#timeinput").val();
                                                    var completionDate = $("#completionDate").val();
                                                    var metrologName = $("#metrolog option:selected").text();
                                                    var statusName = $("#statusSelect option:selected").text();

                                                    // Собираем данные из таблицы с заявками
                                                    var routeSheetData = [];
                                                    $("#applicationsTable tbody tr").each(function() {
                                                        var rowData = {
                                                            requestId: $(this).find('.for-id').text(),
                                                            // Другие данные заявки
                                                        };
                                                        routeSheetData.push(rowData);
                                                    });

                                                    // Отправляем данные на сервер
                                                    $.ajax({
                                                        url: '/create-route-sheet',
                                                        type: 'POST',
                                                        contentType: 'application/json',
                                                        headers: {
                                                            'X-CSRF-TOKEN': csrfToken,
                                                        },
                                                        data: JSON.stringify({
                                                            routeSheetNumber: routeSheetNumber,
                                                            currentDateTime: currentDateTime,
                                                            routeSheetData: routeSheetData,
                                                            authorName: authorName,
                                                            organizationName: organizationName,
                                                            timeInput: timeInput,
                                                            completionDate: completionDate,
                                                            metrologName: metrologName,
                                                            statusName: statusName
                                                        }),
                                                        success: function(response) {
                                                            console.log('Маршрутный лист создан успешно:', response);
                                                            $("#applicationsTable tbody").empty();
                                                        },
                                                        error: function(error) {
                                                            console.error('Ошибка при создании маршрутного листа:', error);
                                                        }
                                                    });
                                                });
                                            </script>