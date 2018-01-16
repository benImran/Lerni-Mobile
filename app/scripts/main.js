var App = App || {};

var newCard = new App.Card();
newCard.init();

var next = document.querySelector('#next');

next.addEventListener('click', function () {
    newCard.init();
});


