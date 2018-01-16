var App = App || {};

App.Card = function() {
    this.init = function(){
        var helper = new App.Helper();
        createCard(helper);
    };
};

function createCard(helper) {
    var container = document.querySelector('.card');

    container.innerHTML = '';

    var data = renderCardContent();
    var dataCountry = data.country;
    var dataFact = data.fact;


    renderCountry();
    renderFact();

    function renderCountry() {
        var country = helper.generateUniqueElement('p', 'country');
        country.innerHTML= dataCountry;
        container.appendChild(country);
    }

   function renderFact() {
       var fact = helper.generateUniqueElement('p', 'fact');
       fact.innerHTML= dataFact;
       container.appendChild(fact);
   }

}

function renderCardContent() {

    var value = $.ajax({
        url: 'card.json',
        async: false
    }).responseJSON;

    var data = value.cards;

    return data[randomCardContent()];


    function randomCardContent() {
        return Math.floor(Math.random() * data.length);
    }

}








