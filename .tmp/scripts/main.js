var App = App || {};

var newCard = new App.Card();
newCard.init();

var next = document.querySelector('#next');

next.addEventListener('click', function () {
  newCard.init();
});

$(document).ready(function () {
  $('.contain-swip').slick({
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: false
  });
});
//# sourceMappingURL=main.js.map
