jQuery(document).ready(function($){
	
	// Fix video ratio
	function fix_video_ratio(dom){
		var providers = ['youtube.com', 'vimeo.com', 'dailymotion.com', 'viddler.com'];
		if ( !dom )
			dom = 'body';
		for ( var p = 0; p < providers.length; p++ ){
			var videos = $(dom).find('iframe[src*="'+providers[p]+'"]');
			if ( videos.size() > 0 )
				videos.each(function(){
					if ( !$(this).parent().is('.video-keep-ratio-wrap') && parseInt($(this).attr('width')) > $(this).parent().width() ){
						var ratio = parseInt($(this).attr('height')) / parseInt($(this).attr('width'));
						$(this).wrap('<div class="video-keep-ratio-wrap"></div>');
						$(this).parent().css('padding-bottom', (ratio*100)+'%');
					}
				});
		}
	}
	fix_video_ratio();
	
	$(window).resize(function(){
		fix_video_ratio();
	});
	
	
	/* Attach ajaxComplete on activity loading */
	$(document).ajaxComplete(function(e, xhr, settings){
		if ( settings.data.match(/action=activity_get_older_updates/i) ){
			// this is activity loading, finding the loaded list by looking at response
			var rgx = /id=["'](activity-\d+)["']/ig;
			var activity_ids = xhr.responseJSON.contents.match(rgx);
			$.each(activity_ids, function(index, activity_id){
				var id = activity_id.replace(rgx, '$1'),
					el = $('#'+id).get(0);
				if ( FB )
					FB.XFBML.parse(el);
				fix_video_ratio(el);
			});
		}
	});
	
});

