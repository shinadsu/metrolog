const CNRegEx = /\d{2}:\d{2}:\d{6,7}:\d{1,5}/;

function IsCNValid(cn) {
    return CNRegEx.test(cn);
}

function GetObjectIdsByCN(cn, onOk, onError) {
    LoadContent({
        controller: 'ExtendedSearch',
        action: 'GetObjectsByCadastralNumber',
        type: 'json',
        data: { cadastralNumber: cn },
        success: result => {
            var searchResult = result.ObjectIds;
            if ((searchResult === undefined) || (searchResult.length === undefined)) {
                if (!IsUndefinedOrNull(onError)) onError('Ошибка поиска ' + result);
                return;
            }

            if (!IsUndefinedOrNull(onOk)) onOk(searchResult);
        },
        error: onError,
        paste: false
    });
}

