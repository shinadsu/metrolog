var PagerRepository = [];

function RegisterPager(model) {
    var controlId = model.ControlId;
    if (controlId === undefined) {
        console.error("Не корректные данные для регистрации в хранилище конфигураций пейджера");
        console.log(model);
    }

    var pager = {};
    Object.assign(pager, model);

    pager.Ten = 0;
    pager.CurrentPage = 1;

    var remains = pager.PageCount % 10;
    if (remains == 0) remains = 10;
    pager.MaxTen = pager.PageCount - remains;    

    PagerRepository[controlId] = pager;
}

function GetPager(id) {
    if (PagerRepository === undefined) {
        console.error("Не найдено хранилище конфигураций пейджера");
        return undefined;
    }

    var pager = PagerRepository[id];
    if (pager === undefined) {
        console.error("Не найдена конфигурация для пейджера " + id);
        return undefined;
    }

    return pager;
}

function LoadPagerData(id) {
    var pager = GetPager(id);
    if (pager === undefined) return;

    LoadPagerDataInner(pager);
}

function LoadPagerDataInner(pager) {
    var data = {
        Filter: pager.Filter
    };

    var currentPage = pager.CurrentPage;
    if (pager.CurrentPage > 0) {
        var pageSize = pager.PageSize;
        currentPage--;
        data.Offset = currentPage * pageSize;
        data.Limit = pageSize;
    }

    $('#' + pager.ControlId + 'From').html(data.Offset + 1);
    var max = data.Offset + data.Limit;
    if (max > pager.Count) max = pager.Count;
    $('#' + pager.ControlId + 'To').html(max);

    ProgressShow(pager.Placeholder);

    pager.DataLoader(
        pager,
        data,
        result => {
            pager.DataPlaceholder.html(result);
            ProgressHide(pager.Placeholder);
        },
        result => {
            pager.DataPlaceholder.html('Ошибка! Нет данных для пейджера');
            ProgressHide(pager.Placeholder);
            console.log(result);
        }
    );
}

function IsAjax(pager) {
    if (pager.DataUrl === undefined) return false;

    if (pager.DataUrl != null) return true;

    return false;
}

function IsLocal(pager) {
    if (pager.GetData === undefined) return false;
    if (pager.GetDataLength === undefined) return false;

    return false;
}

function PagerPrevClick(id) {
    var pager = GetPager(id);
    if (pager === undefined) return;

    if (pager.CurrentPage <= 1) return;
    if (pager.CurrentPage % 10 == 1) {
        pager.Ten -= 10;
    }
    pager.CurrentPage--;

    RedrawPagerPages(pager);
}

function PagerPrevTenClick(id) {
    var pager = GetPager(id);
    if (pager === undefined) return;

    if (pager.Ten <= 0) return;
    pager.Ten -= 10;
    pager.CurrentPage = pager.Ten + 1;

    RedrawPagerPages(pager);
}

function PagerNextClick(id) {
    var pager = GetPager(id);
    if (pager === undefined) return;

    if (pager.CurrentPage >= pager.PageCount) return;
    if (pager.CurrentPage % 10 == 0) {
        pager.Ten += 10;
    }
    pager.CurrentPage++;

    RedrawPagerPages(pager);
}

function PagerNextTenClick(id) {
    var pager = GetPager(id);
    if (pager === undefined) return;
    if (pager.Ten >= pager.MaxTen) return;
    pager.Ten += 10;
    pager.CurrentPage = pager.Ten + 1;
    RedrawPagerPages(pager);
}

function RedrawPagerPages(pager) {
    for (var i = 1; i <= 10; i++) {
        var controlId = pager.ControlId + 'Page' + i.toString();
        var control = $('#' + controlId);
        var page = pager.Ten + i;
        if (page > pager.PageCount) {
            control.css('display', 'none');
        }
        else {
            control.css('display', 'block');
        }
        control.html(page);

        if (page == pager.CurrentPage) {
            control.addClass('active');
        }
        else {
            control.removeClass('active');
        }
    }

    $('#' + pager.ControlId + 'PagePrevTen').css('display', pager.Ten >= 10 ? 'block' : 'none');
    $('#' + pager.ControlId + 'PageNextTen').css('display', pager.Ten < pager.MaxTen ? 'block' : 'none');

    LoadPagerDataInner(pager);
}

function PagerPageClick(id, page) {
    var pager = GetPager(id);
    if (pager === undefined) return;

    page += pager.Ten;
    if ((page < 1) || (page > pager.PageCount) || (page == pager.CurrentPage)) return;
    pager.CurrentPage = page;

    RedrawPagerPages(pager);
}

function SetupPager(pager, customDataLoad) {
    pager.DataLoader = DefaultLoadPagerData;
    if (customDataLoad !== undefined) pager.DataLoader = customDataLoad;

    pager.Count = -1;
    pager.PlaceholderId = '#' + pager.ControlId + 'Placeholder';
    pager.Placeholder = $(pager.PlaceholderId);

    pager.DataLoader(
        pager,
        {
            Filter: pager.Filter,
            GetCount: true
        },
        result => {
            pager.Count = result;
            DrawPager(pager);
        },
        result => {
            pager.Placeholder.html('Ошибка! Невозможно полуить количество записей для пейджера');
            console.log(result);
        }
    );
}

function DefaultLoadPagerData(pager, filter, onSuccess, onError) {
    LoadContent({
        controller: pager.DataUrl,
        method: 'POST',
        content: 'application/json; charset=utf-8',
        data: JSON.stringify(filter),
        success: onSuccess,
        error: onError
    });
}

function DrawPager(pager) {
    LoadContent({
        placeholder: pager.PlaceholderId,
        controller: 'Pager',
        action: 'Setup',
        method: 'POST',
        content: 'application/json; charset=utf-8',
        data: JSON.stringify(pager),
        success: function () {
            var registeredPager = GetPager(pager.ControlId);
            registeredPager.DataLoader = pager.DataLoader;
            registeredPager.Placeholder = pager.Placeholder;
            registeredPager.DataPlaceholder = $('#' + pager.ControlId + 'DataPlaceholder');
            RedrawPagerPages(registeredPager);
        }
    });
}

