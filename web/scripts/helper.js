var App = App || {};

App.Helper = function() {};

App.Helper.prototype.generateUniqueElement = function(type, idName) {
    var element = document.createElement(type);

    if (idName !== undefined) {
        element.setAttribute('id', idName);
    }

    return element;
};

App.Helper.prototype.filterCard = function () {

    var filterChecked = [];

    var filter = document.querySelectorAll('.filter li');

    for (i = 0 ; i < filter.length; i++) {
        if (filter[i].classList.contains('checked')) {
            filterChecked.push(filter[i].getAttribute('data-category'));
        }
    }

    return filterChecked;
};

