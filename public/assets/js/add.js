var AddUrl = '';

function AddMetod(method, data, type, extract, onOk, onError) {
    if (AddUrl.length < 1) {
        return LoadContent({
            controller: 'Home',
            action: 'GetAddSettings',
            method: 'GET',
            type: 'json',
            data: { url: window.location.href },
            success: function (result) {
                AddUrl = result.Url;

                CallAddMetod(method, data, type, extract, onOk, onError);
            },
            error: function (result) {
                console.error('ADD Невозможно получить настройки');
                if (onError !== undefined) onError(result);
            }
        });
    }
    else {
        return CallAddMetod(method, data, type, extract, onOk, onError);
    }
}

function CallAddMetod(method, data, type, extract, onOk, onError) {
    return $.ajax({
        url: AddUrl + method,
        type: type,
        data: data,
        dataType: 'json',
        contentType: type == 'POST' ? 'application/json' : null,
        success: function (result) {
            var value = extract(result);

            if ((value === undefined) || (value == null)) {
                console.error('ADD ' + method + ' Получен неожиданный результат: ');
                console.log(result);
                onError(result);
                return;
            }

            if (onOk !== undefined) onOk(value);
        },
        error: function (result) {
            console.log(result);
            if (onError !== undefined) onError(result);
        }
    });
}

function FindOrganizationById(objectId, onOk, onError) {
    return AddMetod(
        '/api/add/v1.0/FindOrganizationById',
        { object_id: objectId },
        'GET',
        result => result.organization,
        onOk,
        onError
    );
}

function FindOrganizationByGuid(objectGuid, onOk, onError) {
    return AddMetod(
        '/api/add/v1.0/FindOrganizationByGuid',
        { object_guid: objectGuid },
        'GET',
        result => result.organization,
        onOk,
        onError
    );
}
