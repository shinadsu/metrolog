<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Адресный выбор</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="form-group row">
        <label for="regionInput" class="col-sm-3 col-form-label">Субъект РФ</label>
        <div class="col-sm-9">
            <select class="form-control" id="regionInput">
                <!-- Опции для выбора субъекта РФ будут добавлены динамически при помощи AJAX-запроса -->
            </select>
        </div>
    </div>

    <div class="form-group row" id="cityDiv" style="display: none;">
        <label for="cityInput" class="col-sm-3 col-form-label">Город</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="cityInput" name="cityInput" />
        </div>
    </div>

    <!-- Другие поля для остальных address_levels -->

    <script>
        $(document).ready(function () {
            // Отправляем AJAX-запрос для получения данных о субъектах РФ
            $.ajax({
                url: 'https://fias-public-service.nalog.ru/api/spas/v2.0/GetAddressItems',
                method: 'POST',
                data: JSON.stringify({ "address_level": 1 }),
                headers: {
                    'Access-Control-Allow-Origin': 'http://case.sknewlife.ru',
                    'master-token': 'c8ecfd58-5354-4299-95b0-d94e8060e81d',
                    'Accept': 'application/json',
                    
                },
                contentType: 'application/json',
                success: function (response) {
                    // Заполняем выпадающий список субъектов РФ
                    response.addresses.forEach(function (region) {
                        $('#regionInput').append('<option value="' + region.object_id + '">' + region.full_name + '</option>');
                    });

                    // Обработка выбора субъекта РФ
                    $('#regionInput').change(function () {
                        var selectedRegionId = $(this).val();
                        var initialPath = selectedRegionId;

                        // Отправить запрос с address_levels: [2] и path: selectedRegionId
                        LoadLevels(2, 'City', initialPath);
                    });
                },
                error: function () {
                    // Обработка ошибок
                }
            });

            function LoadLevels(level, name, path) {
                var requestData = {
                    address_levels: [level],
                    address_type: 1,
                    path: path
                };

                // Отправить AJAX-запрос на сервер с requestData и заголовками master-token и Accept
                $.ajax({
                    url: 'https://fias-public-service.nalog.ru/api/spas/v2.0/GetAddressItems',
                    method: 'POST',
                    data: JSON.stringify(requestData),
                    headers: {
                        'Access-Control-Allow-Origin': 'http://case.sknewlife.ru',
                        'master-token': 'c8ecfd58-5354-4299-95b0-d94e8060e81d',
                        'Accept': 'application/json',
                        
                    },
                    contentType: 'application/json',
                    success: function (response) {
                        // Проверить наличие данных в ответе
                        if (response.addresses.length > 0) {
                            $('#' + name + 'Input').val(response.addresses[0].full_name);
                            $('#' + name + 'Div').slideDown(500);
                        } else {
                            $('#' + name + 'Div').slideUp(500);
                        }
                    },
                    error: function () {
                        // Обработка ошибок
                    }
                });
            }
        });
    </script>
</body>

</html>
