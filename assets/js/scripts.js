
	(function($) {
    $(function() {
        /*
        Carousel initialization
        */
        $('#scheda-acessori .jcarousel')
            .jcarousel({
                // Options go here
				animation: 'slow'
            });

		
		  location.hash && $(location.hash + '.collapse').collapse('show');
		
				/*
         Prev control initialization
         */
        $('#scheda-acessori .jcarousel-control-prev')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                // Options go here
                target: '-=1'
            });

        /*
         Next control initialization
         */
        $('#scheda-acessori .jcarousel-control-next')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                // Options go here
                target: '+=1'
            });

     
       
    });
})(jQuery);
jQuery(document).ready(function($) {
	
	$('[rel="popover"]').popover();
	$('[rel="tooltip"]').tooltip();
	$('[rel="popup"]').colorbox();
	
	
	History.Adapter.bind(window,'statechange',function() { // Note: Using statechange instead of popstate
	     State = History.getState(); // Note: Using History.getState() instead of event.state
	     History.log('statechange:', State.data, State.title, State.url);
	    
		
			
			
		
		
	
	});
	


jQuery( document ).ready( function( $ ) {
$('.carousel').carousel({
    interval: false
	})

} );


jQuery(function( $ ){
	
	
	
	$.localScroll.defaults.axis = 'y';
	
	
	$.localScroll({
	target: $(this).attr('href'), // could be a selector or a jQuery object too.
	queue:true,
	duration:1000,
	hash:true,
	filter: $(this).not('.carousel-control'),
	});
});


	//Zoom per le immagini		
	//	$('#img-prodotto').zoom({ on:'grab' });
		
		
	//	$('#img-prodotto .wp-post-image')
		
	/*	.css({
			'position' : 'absolute',
			'left' : '50%',
			'top' : '50%',
			'margin-left' : -$('#img-prodotto .wp-post-image').width()/2,
			'margin-top' : -$('#img-prodotto .wp-post-image').height()/2
		});
	*/
		
	/*
	var animationDelay = 600;
	var offset = 200;
	
	function animation(meh) {
		setTimeout(function(){
			$(meh).animate({
				opacity: "0.5"
			}, animationDelay);
		},$(meh).index() * offset)
	}
	
	*/
	
	$('#carosello-modelli')
	
	.jcarousel({
		vertical: true      
    })
	
	$("#carosello-prodotti-wrap .jcarousel-control-prev.vertical")
	.on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
	.jcarouselControl({
		carousel: $("#carosello-modelli"),
		target: '-=1'
	});
	
	$("#carosello-prodotti-wrap .jcarousel-control-next.vertical")
	 .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
	.jcarouselControl({
		carousel: $("#carosello-modelli"),
		target: '+=1'
	});
	
	
	
	

    $('#correlati')
	
	// Bind first
    .on('jcarousel:create', function(event, carousel) {
      
		$(this).find('.active').css('opacity', 1);
		$(this).find('.active').children('a').css('opacity', 1);
	

    })
	
	/*.jcarousel({
		
		wrap: 'circular',
		list: '.jlist'
      
    })
	*/
	
	
	
	
	
	$('.jcarousel-control-prev.vertical')
            .jcarouselControl({
                target: '-=4'
            });

        $('.jcarousel-control-next.vertical')
            .jcarouselControl({
                target: '+=4'
            });

        $('.jcarousel-pagination')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 1,
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });
	
	$('.jcarousel-pagination').jcarouselPagination({
    'perPage': 3
});

$('#product-navigation a').click(function(){
	
	$('#correlati .jcarousel').jcarousel('scroll', 5);
	return false;
	
	});

});



