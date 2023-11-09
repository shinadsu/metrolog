function ProgressShow(placeholder) {
    if (placeholder == null) return;

    window.setTimeout(function () {

        kendo.ui.progress(placeholder, true);
    });
}

function ProgressHide(placeholder) {
    if (placeholder == null) return;

    window.setTimeout(function () {
        kendo.ui.progress(placeholder, false);
    });
}
