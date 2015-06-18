/* Jonathan gleyze
   v1.0 
   License: none (public domain)
*/

function advert_hide(element){
		var element = document.getElementById(element);
		var element_var = $(element);

		element_var.animate({
		  opacity: 0.0,
		}, 300, "linear", function() {
		  $(this).hide();
		});		

		console.log('hide : advert');
}