jQuery(document).ready(function() {

  var sliderElements = $('#nivo').find('.element'),
    nEle    = sliderElements.length,
    navigation = $('.navigation'),
    i       = 0,
    counter = 0,
    speed   = 800,
    delta   = $('#nivo .element').width(),
    move    = false,

    operation = {
      '+': function(a, b) { return a + b },
      '-': function(a, b) { return a - b },
    },

    sliding = function(direction, operator, nextCounter) {

      if (move) { return false; }
      move = true;

    //  $(sliderElements[counter]).css({'display': 'block', 'z-index': '1', left : 'auto', right: 'auto' });
    //  $(navElements[counter]).removeClass('active');

      var hash = {};
      hash[direction] = delta;


      if ( nextCounter != undefined )
        counter = nextCounter;

      if ( direction == 'left' && counter == nEle - 1 )
        counter = - 1;
      else if ( direction == 'right' && counter == 0 )
        counter = nEle;

      $(navElements[operation[operator](counter, 1)]).addClass('active');
      $(sliderElements[operation[operator](counter, 1)]).css(hash);

      hash[direction] = 0;

      $(sliderElements[operation[operator](counter, 1)]).css({'display': 'block', 'z-index': '10' });
      $(sliderElements[operation[operator](counter, 1)]).animate(hash, speed, function() {
          move = false;
          $(sliderElements).css({'display': 'none', 'z-index': 'auto' });
          $(this).css({display: 'block', right : 'auto', left : 'auto'});
          counter = operation[operator](counter, 1);
        }
      );


    };

  //start and autoplay
  $(sliderElements).each(function() {
    navigation.append('<a href="javascript:void(0)" data-position="'+ i +'"></a>');
    i = i+1;
  });

  var navElements = navigation.find('a');


  $(sliderElements[0]).css({ display:"block", 'z-index' : '1', left: 0, right:0 });
  $(navElements[0]).addClass('active');


  $('.prev').click(function() {
    sliding('right','-');

  })


  $('.next').click(function() {
    sliding('left',"+");

  });

  $(navElements).click(function() {



    if ( $(this).attr('data-position') > counter )
      sliding( 'left', "+", parseInt($(this).attr('data-position')) - 1 );
    else if ( $(this).attr('data-position') < counter )
      sliding( 'right', "-", parseInt($(this).attr('data-position')) + 1 );

  });

});
