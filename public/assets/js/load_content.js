function LoadContent(data) {
    if (data.action === undefined) data.action = '';
    if (data.method === undefined) data.method = 'GET';
    var placeholder = data.placeholder === undefined ? null : $(data.placeholder);
    if (data.type === undefined) data.type = 'text';
    if (data.paste === undefined) data.paste = true;

    if (data.paste) data.paste = placeholder != null;

    ProgressShow(placeholder);

    return $.ajax({
        url: '/' + data.controller + '/' + data.action,
        type: data.method,
        dataType: data.type,
        contentType: data.content,
        data: data.data,
        success: function (result) {
            if (data.paste) placeholder.html(result);
            ProgressHide(placeholder);

            if ((data.success !== undefined) && (data.success != null)) {
                data.success(result);
            }
        },
        error: function (result) {
            var error_object = JSON.parse(result.responseText);

            if (error_object._eventCode !== undefined) {
                if (error_object._eventCode != null) {
                    window.location = '/Error?Area=Default&EventCode=' + error_object._eventCode;
                    return;
                }
            }

            if (data.paste) placeholder.html('Ошибка! ' + result.responseText);
            ProgressHide(placeholder);
            console.log(result);

            if ((data.error !== undefined) && (data.error != null)) {
                data.error(result);
            }
        }
    });
}
