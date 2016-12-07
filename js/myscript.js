jQuery(function(){
	var gridMount = function(){
		var win_w = jQuery(window).width();
		var _gut = Math.floor(win_w * 0.025);

		var grid = new Minigrid({
			container: 'main'
		,	item: '.item'
		,	gutter: _gut
		});
		grid.mount();
	};

	jQuery(window).on('load', function(){
		gridMount();
		jQuery('.mask').each(function(itr){
			jQuery(this).delay(itr*300+1).fadeOut(300);
		});
	}).on('resize', _.debounce(gridMount, 1000));

	jQuery('.sidebar-trigger').on('click', function(event){
		event.preventDefault();
		toggleNav(true);
	});
	jQuery('.sidebar-close-trigger, .overlay').on('click', function(event){
		event.preventDefault();
		toggleNav(false);
	});
	jQuery('.sidebar li').on('click', function(event){
		event.preventDefault();
	});
	function toggleNav(bool) {
		jQuery('.sidebar-container, .overlay').toggleClass('is-visible', bool);
		jQuery('main').toggleClass('scale-down', bool);
	}


});
