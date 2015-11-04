jQuery(document).ready(function($){
	//on mobile - open/close primary navigation clicking/tapping the menu icon
	$('.cd-primary-nav').on('click', function(event){
		if($(event.target).is('.cd-primary-nav')) $(this).children('ul').toggleClass('is-visible');
	});

	var images = AutoPlayImage.createNew();
	images.startPlay();

	//upload videos if not on mobile
	uploadVideo($('.cd-hero-slider'));

	//change visible slide
	$('.cd-slider-nav li').on('click', function(event){
		event.preventDefault();
		var selectedItem = $(this);
		if(!selectedItem.hasClass('selected')) {
			// if it's not already selected
			var selectedPosition = selectedItem.index(),
				activePosition = $('.cd-hero-slider .selected').index();
			if( activePosition < selectedPosition) {
				nextSlide($('.cd-hero-slider'), $('.cd-slider-nav'), selectedPosition);
			} else {
				prevSlide($('.cd-hero-slider'), $('.cd-slider-nav'), selectedPosition);
			}

			updateNavigationMarker(selectedPosition+1);
		}
		images.stopPlay(10);
	});

	function nextSlide(container, pagination, n){
		var visibleSlide = container.find('.selected'),
			navigationDot = pagination.find('.selected');
		
		visibleSlide.removeClass('selected from-left from-right').addClass('is-moving').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			visibleSlide.removeClass('is-moving');
		});
		
		container.children('li').eq(n).addClass('selected from-right').prevAll().addClass('move-left');
		navigationDot.removeClass('selected')
		pagination.find('li').eq(n).addClass('selected');

		checkVideo(visibleSlide, container, n);
	}

	function prevSlide(container, pagination, n){
		var visibleSlide = container.find('.selected'),
			navigationDot = pagination.find('.selected');
		
		visibleSlide.removeClass('selected from-left from-right').addClass('is-moving').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			visibleSlide.removeClass('is-moving');
		});

		container.children('li').eq(n).addClass('selected from-left').removeClass('move-left').nextAll().removeClass('move-left');
		navigationDot.removeClass('selected');
		pagination.find('li').eq(n).addClass('selected');

		checkVideo(visibleSlide, container, n);
	}

	function uploadVideo(container) {
		container.find('.cd-bg-video-wrapper').each(function(){
			var videoWrapper = $(this);
			if( videoWrapper.is(':visible') ) {
				// if visible - we are not on a mobile device 
				var	videoUrl = videoWrapper.data('video'),
					video = $('<video loop><source src="'+videoUrl+'.mp4" type="video/mp4" /><source src="'+videoUrl+'.webm" type="video/webm" /></video>');
				video.appendTo(videoWrapper);
			}
		});
	}

	function checkVideo(hiddenSlide, container, n) {
		//check if a video outside the viewport is playing - if yes, pause it
		if( hiddenSlide.find('video').length > 0 ) hiddenSlide.find('video').get(0).pause();

		//check if the select slide contains a video element - if yes, play the video
		if( container.children('li').eq(n).find('video').length > 0 ) container.children('li').eq(n).find('video').get(0).play();
	}

	function updateNavigationMarker(n) {
		$('.cd-marker').removeClassPrefix('item').addClass('item-'+n);
	}

	$.fn.removeClassPrefix = function(prefix) {
		//remove all classes starting with 'prefix'
	    this.each(function(i, el) {
	        var classes = el.className.split(" ").filter(function(c) {
	            return c.lastIndexOf(prefix, 0) !== 0;
	        });
	        el.className = $.trim(classes.join(" "));
	    });
	    return this;
	};
});

var Interval_Id = 0;
var Timeout_Id = 0;

var AutoPlayImage = {

	    createNew: function(){

	    	var indexImages = {};


            indexImages.startPlay = function(){
            	clearInterval(Interval_Id);
            	clearTimeout(Timeout_Id);
            	Interval_Id = setInterval("play()", 8000);
	        };

	        indexImages.stopPlay = function(times){
            	clearInterval(Interval_Id);
            	clearTimeout(Timeout_Id);
            	if(isNaN(times))
            	{
            		times = 10;
            	}
            	times = times* 1000;
            	Timeout_Id = setTimeout('continue_play()', times);
	        };

	        indexImages.getIntervalId = function(){
            	return Interval_Id;
	        };
	        return indexImages;
	    }
	};

function continue_play(){
	images = AutoPlayImage.createNew();
	images.startPlay();
	var objectTag = $('.cd-slider-nav').find('.selected').attr('data');
	var next_id = parseInt(objectTag) + 1;
	if(next_id == 6)
	{
		next_id = 1;
	}
	$('.cd-slider-nav').find('[data='+next_id+']').trigger('click');
}

function play(){
	var objectTag = $('.cd-slider-nav').find('.selected').attr('data');
	var next_id = parseInt(objectTag) + 1;
	if(next_id == 6)
	{
		next_id = 1;
	}
	$('.cd-slider-nav').find('[data='+next_id+']').trigger('click');
}	