$(function(){

  // SLIDER

  function slider() {
     var slider = $('#slider').owlCarousel({
      items: 1,
      loop: false,
      nav: true,
      mouseDrag: false,
      touchDrag:false,
      animateOut:'fadeOut',
      animateIn:'fadeIn',
      navText:['<img class="slider-arrow slider-arrow_prev" src="/wp-content/themes/uwines/img/icons/arrow.svg">','<img class="slider-arrow slider-arrow_next" src="/wp-content/themes/uwines/img/icons/arrow.svg">']
    })

    $('.wine-list').on('click', '.wine-list-item', function(e) {
        $('.wine-list-item.active').removeClass('active');
        $(this).addClass('active');
        slider.trigger('to.owl.carousel', $(this).index());
    });
  };

  slider();

  // Menu

  $('#menu-close-btn').on('click', function(e) {
    e.preventDefault();
    $('.navigation').removeClass('active');
    $('.footer').removeClass('active');
  });

  $('#mob-menu-btn').on('click', function(e) {
    e.preventDefault();
    $('.navigation').addClass('active');
    $('.footer').addClass('active');
  });

  // Cart

  function cartLogic() {

    // remove from cart
    $('.pi-close-btn').on('click', function(e) {
      e.preventDefault();
      var curEl = $(this).parent();

      $(curEl).animate({opacity:0}, 500, function () {
        $(this).animate({height:0, padding:0}, 300, function () {
          $(this).remove();
        })
      });



    });


  };

  cartLogic();

  // FAQ

  function faqLogic() {
    $('.faq-item-h').on('click', function(e) {

      $('.faq-item.active').find('.faq-item-text-wrapper').animate({
        height : 0
      });

      $('.faq-item.active').removeClass('active');
      $(this).parent().addClass('active');

      $(this).next().animate({
        height : $(this).next().find('.faq-item-text').height() + 30
      });

    });

    setTimeout(function () {
      $('#first-faq-item').click();
    }, 2000);

  };

  faqLogic();


  // BARBA

  Barba.Pjax.start();

  var FadeTransition = Barba.BaseTransition.extend({
  start: function() {
    Promise
      .all([this.newContainerLoading, this.fadeOut()])
      .then(this.fadeIn.bind(this));
  },

  fadeOut: function() {
    $('.loader').addClass('active');
    return $(this.oldContainer).animate({ left: "100%" }, 800).promise();
  },

  fadeIn: function() {
    var _this = this;
    var $el = $(this.newContainer);

    $(this.oldContainer).hide();

    $el.css({
      visibility : 'visible',
      left : '100%'
    });

    $('.loader').removeClass('active');
    $el.animate({ left: '0%' }, 800, function() {
      _this.done();
    });
  }
});

Barba.Pjax.getTransition = function() {
  return FadeTransition;
};


Barba.Dispatcher.on('newPageReady', function(currentStatus, oldStatus, container) {
  faqLogic();
  cartLogic();
});

});

function func_cart(){
     alert("Thank you, We will contact you soon.");
    return true;
};



