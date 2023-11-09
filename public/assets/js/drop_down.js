var DropDown = [];

function DropDown_Assert(drop) {
    if (drop === undefined) drop = null;

    if (drop == null) {
        console.log('Не определён DropDown[' + drop + ']');
        return true;
    }

    return false;
}

function DropDown_GetItems(id, items, idFormatter, textFormatter, valueFormatter) {
    if (textFormatter === undefined) textFormatter = null;
    if (textFormatter == null) textFormatter = item => item;

    if (idFormatter === undefined) idFormatter = null;
    if (idFormatter == null) idFormatter = item => item;

    if (valueFormatter === undefined) valueFormatter = null;
    if (valueFormatter == null) valueFormatter = item => item;

    if (items === undefined) items = null;
    if (items == null) items = [];

    var drop = DropDown[id];
    if (DropDown_Assert(drop)) return;

    drop.Items = [];
    $.each(items, function (i, item) {
        if (item === undefined) return;
        if (item == null) return;

        drop.Items.push({
            id: idFormatter(item),
            value: valueFormatter(item),
            text: textFormatter(item),
            data: item
        });
    });
 }

function DropDown_DrawItems(id, filter) {
    var drop = DropDown[id];
    if (DropDown_Assert(drop)) return;

    var items = [];

    if (filter === undefined) filter = null;

    var filtered = filter == null ? drop.Items : drop.Items.filter(filter);
    drop.HintCount = filtered.length;
    drop.Filtered = [];
    $.each(filtered, function (i, item) {
        drop.Filtered.push(item);
        items.push('<li onclick="OnDropDownHintClick(\'' + id + '\', ' + i + ');" class="form-control-dropdown__list-item" id="' + id + 'Hint' + i + '">' + item.text + '</li>');
    });

    var html = items.length == 0 ? '<li class="form-control-dropdown__list-item">Нет совпадений</li>' : items.join('');

    drop.Hints.html(html);
}

function DropDown_Hide(drop) {
    if (DropDown_Assert(drop)) return;

    drop.Div.slideUp(200);
}

function DropDown_Show(drop) {
    if (DropDown_Assert(drop)) return;

    drop.Div.slideDown(200);
}

function OnDropDownInputKeyUp(event) {
    if (event.which == 38) return; // Up
    if (event.which == 40) return; // Down
    if (event.which == 27) return; // Esc
    if (event.which == 13) return; // Enter

    var drop = DropDown_GetFrom(this);
    if (DropDown_Assert(drop)) return;

    var input = drop.Input.val().toLowerCase();

    var filter = () => true;
    if (input.length > 0) filter = item => item.value.toLowerCase().includes(input);

    DropDown_DrawItems(drop.Id, filter);
}

function OnDropDownInputKeyDown(event) {
    var drop = DropDown_GetFrom(this);
    if (DropDown_Assert(drop)) return;

    var last = drop.HintSelected;

    if (event.which == 38) { // Up
        event.preventDefault();

        drop.HintSelected--;
        if (drop.HintSelected < 0) drop.HintSelected = drop.HintCount - 1;
    }

    if (event.which == 40) { // Down
        event.preventDefault();

        drop.HintSelected++;
        if (drop.HintSelected >= drop.HintCount) drop.HintSelected = 0;
    }

    if (drop.HintSelected != last) {
        var lastOffset = drop.Offset;

        var offset = drop.HintSelected - drop.Offset;
        if ((offset >= drop.ScrolledLines) || (offset < 0)) {
            drop.Offset = drop.HintSelected - drop.ScrolledLines + 1;
        }

        if (drop.Offset != lastOffset) {
            drop.Div.scrollTop(drop.Offset * 40);
        }

        if (last != -1) {
            DropDown_GetHint(id, last).removeClass('selected');
        }
        DropDown_GetHint(id, drop.HintSelected).addClass('selected');
    }

    if (event.which == 13) { // Enter
        if ((drop.HintSelected >= 0) && (drop.HintSelected < drop.HintCount)) {
            var item = drop.Filtered[drop.HintSelected];
            DropDown_Select(drop, item)
        }
    }
}

function DropDown_GetFrom(_this) {
    var id = _this.id;
    var index = id.indexOf('Input');
    if (index < 1) {
        consol.log('Не корректный DropDownId [' + id + ']');
        return;
    }
    id = id.substring(0, index);

    var drop = DropDown[id];

    if (drop === undefined) drop = null;
    return drop;
}

function DropDown_GetHint(id, index) {
    return $('#' + id + 'Hint' + index)
}

function OnDropDownHintClick(id, index) {
    var drop = DropDown[id];
    if (DropDown_Assert(drop)) return;

    if ((index < 0) && (index >= drop.HintCount)) return;

    DropDown_Select(drop, drop.Filtered[index]);
}

function DropDown_Select(drop, item) {
    if (DropDown_Assert(drop)) return;

    drop.Input.val(item.value);
    DropDown_Hide(drop);

    drop.Selected = item;

    if (drop.OnSelect == null) return;

    drop.OnSelect(item.data);
}

function OnDropDownInputFocusOut() {
    var drop = DropDown_GetFrom(this);
    if (DropDown_Assert(drop)) return;

    setTimeout(
        function () {
            DropDown_Hide(drop);
        },
        200
    );
}

function OnDropDownInputFocusIn() {
    var drop = DropDown_GetFrom(this);
    if (DropDown_Assert(drop)) return;

    setTimeout(
        function () {
            DropDown_Show(drop);
        },
        200
    );
}
