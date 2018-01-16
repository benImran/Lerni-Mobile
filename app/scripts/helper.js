var App = App || {};

App.Helper = function() {};

App.Helper.prototype.generateUniqueElement = function(type, idName) {
    var element = document.createElement(type);

    if (idName !== undefined) {
        element.setAttribute('id', idName);
    }

    return element;
};