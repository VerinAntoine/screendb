function dropdownShow(element) {
    getDropdown(element).classList.remove("hidden");
}

function dropdownHide(element) {
    getDropdown(element).classList.add("hidden");
}

function getDropdown(from) {
    var f = from.getAttribute("data-toggle");
    return document.getElementById(f);
}