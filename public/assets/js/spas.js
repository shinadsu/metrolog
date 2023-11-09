var SpasUrl = '';
var SpasHeaders = [];

function SpasMetod(method, data, type, extract, onOk, onError) {
    if (SpasUrl.length < 1) {
        return $.ajax({
            url: '/Home/GetSpasSettings',
            type: 'GET',
            dataType: 'json',
            data: { url: window.location.href },
            success: function (result) {
                SpasUrl = result.Url;
                SpasHeaders['master-token'] = result.Token;

                CallSpasMetod(method, data, type, extract, onOk, onError);
            },
            error: function (result) {
                console.error('SPAS Невозможно получить настройки: ');
                console.log(result);
                if (onError !== undefined) onError(result);
            }
        });
    }
    else {
        return CallSpasMetod(method, data, type, extract, onOk, onError);
    }
}

function CallSpasMetod(method, data, type, extract, onOk, onError) {
    return $.ajax({
        url: SpasUrl + method,
        type: type,
        headers: SpasHeaders,
        data: data,
        dataType: 'json',
        contentType: type == 'POST' ? 'application/json' : null,
        success: function (result) {
            var items = extract(result);
            if ((items === undefined) || (items.length === undefined)) {
                console.error('SPAS ' + method + ' Получен неожиданный результат: ');
                console.log(result);
                onError(result);
                return;
            }

            if (onOk !== undefined) onOk(items);
        },
        error: function (result) {
            console.log(result);
            if (onError !== undefined) onError(result);
        }
    });
}

function GetAddressItemById(objectId, viewType, onOk, onError) {
    return SpasMetod(
        '/api/spas/v2.0/GetAddressItemById',
        { object_id: objectId, address_type: viewType },
        'GET',
        result => result.addresses,
        onOk,
        onError
    );
}

function GetAddressItemByGuid(objectGuid, viewType, onOk, onError) {
    return SpasMetod(
        '/api/spas/v2.0/GetAddressItemByGuid',
        { object_guid: objectGuid, address_type: viewType },
        'GET',
        result => result.addresses,
        onOk,
        onError
    );
}

function GetAddressItems(filter, onOk, onError) {
    return SpasMetod(
        '/api/spas/v2.0/GetAddressItems',
        JSON.stringify(filter),
        'POST',
        result => result.addresses,
        onOk,
        onError
    );
}

function GetAddressHint(searchString, addressType, onOk, onError) {
    return SpasMetod(
        '/api/spas/v2.0/GetAddressHint',
        { search_string: searchString, address_type: addressType },
        'GET',
        result => result.hints,
        onOk,
        onError
    );
}

function GetFiasObjectTypes(onOk, onError) {
    return SpasMetod(
        '/api/spas/v2.0/GetFiasObjectTypes',
        null,
        'GET',
        result => result.types,
        onOk,
        onError
    );
}