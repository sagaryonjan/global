/**
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
jQuery(document).ready(function() {
	jQuery('.controls#global-img-container li img').click(function(){
		jQuery('.controls#global-img-container li').each(function(){
			jQuery(this).find('img').removeClass ('global-radio-img-selected') ;
		});
		jQuery(this).addClass ('global-radio-img-selected') ;
	});
});
