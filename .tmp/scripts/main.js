var App = App || {};

var newCard = new App.Card();
newCard.init();

var next = document.querySelector('#next');

next.addEventListener('click', newCard.init());
//# sourceMappingURL=main.js.map