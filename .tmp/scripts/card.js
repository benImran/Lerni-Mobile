var App = App || {};

App.Card = function () {
    this.init = function () {
        var helper = new App.Helper();
        createCard(helper);
    };
};

function createCard(helper) {
    var container = document.querySelector('.card');

    container.innerHTML = '';

    var data = renderCardContent(helper);
    var dataCountry = data.country;
    var dataFact = data.fact;

    renderCountry();
    renderFact();

    function renderCountry() {
        var country = helper.generateUniqueElement('p', 'country');
        country.innerHTML = dataCountry;
        container.appendChild(country);
    }

    function renderFact() {
        var fact = helper.generateUniqueElement('p', 'fact');
        fact.innerHTML = dataFact;
        container.appendChild(fact);
    }
}

function renderCardContent(helper) {

    var value = $.ajax({
        url: 'card.json',
        async: false
    }).responseJSON;

    var values = value.cards;

    var data = [];

    if (filter.length !== 0) {

        for (i = 0; i < filter.length; i++) {
            for (j = 0; j < values.length; j++) {
                if (filter[i] === values[j].country.toLowerCase()) {
                    data.push(values[j]);
                }
            }
        }
    } else {
        data = values;
    }

    return data[randomCardContent()];

    function randomCardContent() {
        return Math.floor(Math.random() * data.length);
    }
}
//# sourceMappingURL=card.js.map
