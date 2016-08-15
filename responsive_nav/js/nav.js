
$(function() {
	var flag = true;
	var accordionFlag = true;
	$('div.sad-nav ul.topnav').click(function() {
		console.log('clicked');
	});
	$('div.sad-nav ul li a').click(function() {
		$(this).css('background', '#2c3e50');
	});

	$('*').click(function(e) {
		console.log(e.target.id);
		if(!$(e.target).closest('#topnav').length) {
			$('ul.topnav').find('ul').css({'display': 'none'});
			
				
		}
	});
	$('div.sad-nav li').click(function() {
		if (accordionFlag == true) {
			$(this).siblings().find('ul').css({'display': 'none'});
			$(this).children('ul').css({'display':'block', 'position':'absolute'});

		} else {
			$(this).siblings().find('ul').css({'display': 'none'});
			$(this).children('ul').css({'display':'block'});
		}

	});

	$('div.sad-nav li').click(function() {
		$(this).find('li').css({'float': 'none'});
	});

	$('div.sad-nav li').click(function() {
		$(this).find('a').css({ background: '#1bc2a2' });
	});





	checkSize();
	$(window).resize(function(){
		checkSize();
	});

	function checkSize() {
		if ($(window).width() <= 600){	
			console.log('hell');
			accordionFlag = false;
		} else {
			accordionFlag = true;
		}
	}
});





