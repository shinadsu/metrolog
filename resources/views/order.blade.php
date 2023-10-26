<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма Заявки</title>
</head>
<body>

<form action="{{ route('create.store') }}" method="POST">
    @csrf

    <!-- Поля для заявки -->
    <label for="fullname">ФИО:</label>
    <input type="text" id="fullname" name="fullname" required>

    <label for="status">Статус:</label>
    <input type="text" id="status" name="status" value="не завершена" readonly>

    <label for="type_of_payment">Тип оплаты:</label>
    <select id="type_of_payment" name="type_of_payment" required>
        <option value="наличный">Наличный</option>
        <option value="безналичный">Безналичный</option>
    </select>

     <!-- Поля для адреса -->
     <label for="address">Адрес:</label>
    <input type="text" id="address" name="address" required>

    <label for="district">Район:</label>
    <input type="text" id="district" name="district" required>

    <label for="logistic_area">Логистическая зона:</label>
    <input type="text" id="logistic_area" name="logistic_area" required>

    <label for="logistic_floor">Логистический этаж:</label>
    <input type="text" id="logistic_floor" name="logistic_floor" required>

    <label for="floor">Этаж:</label>
    <input type="text" id="floor" name="floor" required>

    <label for="intercom">Домофон:</label>
    <input type="text" id="intercom" name="intercom" required>

    <label for="entrance">Подъезд:</label>
    <input type="text" id="entrance" name="entrance" required>

    <label for="guid_c">GUID C:</label>
    <input type="text" id="guid_c" name="guid_c" required>

    <!-- Поля для устройства -->
    
    <label for="factory_number">Заводской номер:</label>
    <input type="text" id="factory_number" name="factory_number" required>

    <label for="brand">Бренд:</label>
    <input type="text" id="brand" name="brand" required>

    <label for="device_type">Тип устройства:</label>
    <input type="text" id="device_type" name="device_type" required>

    <label for="grsi_number">Grsi номер:</label>
    <input type="text" id="grsi_number" name="grsi_number" required>

    <label for="scheduled_verifaction_date">Дата плановой проверки:</label>
    <input type="text" id="scheduled_verifaction_date" name="scheduled_verifaction_date" required>

    <label for="release_year">Год выпуска:</label>
    <input type="number" id="release_year" name="release_year" required>

    <label for="modification">Модификация:</label>
    <input type="text" id="modification" name="modification" required>

    <label for="type">Тип:</label>
    <input type="text" id="type" name="type" required>

    <!-- Поля для плательщика -->
    <label for="actual">Актуальность:</label>
    <select id="actual" name="actual" required>
        <option value="актуальный">Актуальный</option>
        <option value="не актуальный">Не актуальный</option>
    </select>

    <!-- Поля для телефона -->
    <label for="phone_number">Номер телефона:</label>
    <input type="tel" id="phone_number" name="phone_number" required>

    <label for="country_code">Код страны:</label>
    <input type="text" id="country_code" name="country_code" required>

    <label for="city_code">Код города:</label>
    <input type="text" id="city_code" name="city_code" required>

    <label for="extension_number">Номер дополнительной линии:</label>
    <input type="text" id="extension_number" name="extension_number" required>


    <button type="submit">Отправить заявку</button>
</form>



</body>
</html>

