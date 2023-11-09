function IsUndefinedOrNull(value) {
    if (value === undefined) return true;
    return value == null;
}

function compareTypesAndNames(a, b) {
    var result = compareTypes(a, b);
    return result != 0 ? result : compareNames(a, b);
}

function compareTypes(a, b) {
    a = GetObjectLastHierarchyItem(a);
    b = GetObjectLastHierarchyItem(b);

    if (a.type_short_name < b.type_short_name) return -1;
    if (a.type_short_name > b.type_short_name) return 1;
    return 0;
}

function GetObjectLastHierarchyItem(address) {
    if (IsUndefinedOrNull(address)) return null;
    var hierarchy = address.hierarchy;
    if (IsUndefinedOrNull(hierarchy)) return null;
    var length = hierarchy.length;
    if (IsUndefinedOrNull(length)) return null;
    if (length < 1) return null;

    return hierarchy[length - 1];
};

function compareNames(a, b) {
    a = GetObjectLastHierarchyItem(a);
    b = GetObjectLastHierarchyItem(b);

    if (a.name < b.name) return -1;
    if (a.name > b.name) return 1;
    return 0;
}

function compareTypesAndNumbers(a, b) {
    var result = compareTypes(a, b);
    return result != 0 ? result : compareNumbers(a, b);
}

function compareNumbers(a, b) {
    a = GetObjectLastHierarchyItem(a);
    b = GetObjectLastHierarchyItem(b);

    if (isNumber(a.number)) {
        if (isNumber(b.number)) {
            a = Number(a.number);
            b = Number(b.number);
        }
        else {
            return -1;
        }
    }
    else {
        if (isNumber(b.number)) {
            return 1;
        }
        else {
            a = a.number;
            b = b.number;
        }
    }

    if (a < b) return -1;
    if (a > b) return 1;
    return 0;
}

function isNumber(n) {
    return !isNaN(parseFloat(n)) && !isNaN(n - 0)
}

function compareHouses(a, b) {
    var result = compareTypes(a, b);
    if (result != 0) return result;
    result = compareNumbers(a, b);
    if (result != 0) return result;
    result = compareAddTypes1(a, b);
    if (result != 0) return result;
    result = compareAddNumbers1(a, b);
    if (result != 0) return result;
    result = compareAddTypes2(a, b);
    if (result != 0) return result;
    result = compareAddNumbers2(a, b);
    return result;
}

function compareAddTypes1(a, b) {
    a = GetObjectLastHierarchyItem(a);
    b = GetObjectLastHierarchyItem(b);

    if (a.add_type1_short_name < b.add_type1_short_name) return -1;
    if (a.add_type1_short_name > b.add_type1_short_name) return 1;
    return 0;
}

function compareAddNumbers1(a, b) {
    a = GetObjectLastHierarchyItem(a);
    b = GetObjectLastHierarchyItem(b);

    a = Number(a.add_number1);
    b = Number(b.add_number1);

    if (a < b) return -1;
    if (a > b) return 1;
    return 0;
}

function compareAddTypes2(a, b) {
    a = GetObjectLastHierarchyItem(a);
    b = GetObjectLastHierarchyItem(b);

    if (a.add_type2_short_name < b.add_type2_short_name) return -1;
    if (a.add_type2_short_name > b.add_type2_short_name) return 1;
    return 0;
}

function compareAddNumbers2(a, b) {
    a = GetObjectLastHierarchyItem(a);
    b = GetObjectLastHierarchyItem(b);

    a = Number(a.add_number2);
    b = Number(b.add_number2);

    if (a < b) return -1;
    if (a > b) return 1;
    return 0;
}

function SortByNameAndLevel(a, b) {
    var aLevel = a.object_level_id;
    var bLevel = b.object_level_id;
    return aLevel < bLevel ? -1 : (aLevel > bLevel ? 1 : CompareAddressItems(a, b));
}

function CompareAddressItems(a, b) {
    switch (a.object_level_id) {
        case 1:
        case 2:
        case 3:
        case 4:
        case 5:
        case 6:
        case 7:
        case 8:
            return compareTypesAndNames(a, b);
        case 9:
        case 17:
            return compareNumbers(a, b);
        case 10:
            return compareHouses(a, b);
        case 11:
        case 12:
            return compareTypesAndNumbers(a, b);
    }

    return 0;

    var len = a.hierarchy.length - 1;
    if (len < 0) return 1;
    a = a.hierarchy[len];

    len = b.hierarchy.length - 1;
    if (len < 0) return -1;
    b = b.hierarchy[len];

    if (a.full_name_short < b.full_name_short) {
        return -1;
    }

    if (a.full_name_short > b.full_name_short) {
        return 1;
    }

    return 0;
}

function GetRegions(method) {
    return GetAddressItems(
        { address_level: 1 },
        function (addresses) {
            regionsSorted = [];
            $.each(addresses, function (i, value) { regionsSorted[value.region_code] = value; });

            if (!IsUndefinedOrNull(method)) {
                method(regionsSorted);
            }
        }
    );
}

function PutIntoStorage(address) {
    var json = JSON.stringify(address);
    sessionStorage.setItem(address.object_id, json);
}

function GetFromStorage(id) {
    var json = sessionStorage.getItem(id);
    if (json == null) return null;

    return JSON.parse(json);
}

function FillRegions() {
    return GetRegions(regions => {
        GetItemsFromAddresses(
            'Region',
            regions,
            address => String(address.region_code).padStart(2, "0") + ' ' + address.full_name
        );
    });
}

function GetItemsFromAddresses(id, addresses, formatter) {
    DropDown_GetItems(
        id,
        addresses,
        address => address.object_id,
        formatter,
        formatter
    );

    DropDown_DrawItems(id);
}

function LoadAddressItems(objectIds, addressType, onResult) {
    var result = [];
    var toLoad = 0;

    var onLoad = function (addresses) {
        addresses.forEach(address => result.push(address));
        toLoad--;
        onFinnish();
    };

    var onFinnish = function () {
        if (toLoad > 0) return;
        if (onResult === undefined) return;
        if (onResult == null) return;

        onResult(result);
    };

    toLoad = objectIds.length;

    $.each(
        objectIds,
        function (i, objectId) {
            GetAddressItemById(objectId, addressType, onLoad);
        }
    );
}