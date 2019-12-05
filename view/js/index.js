$('.carousel').carousel({
    padding: 200    
});
autoplay();
function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 4500);
}

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, options);
  });
  // Or with jQuery
  $('.dropdown-trigger').dropdown();
  
  /*$(document).ready(function(){
		
		
		$.ajax({
		    type:"GET",
		    url: "../Controller/cReserva.php", 
		    datatype: "json",  //type of the result
		    
		    success: function(result){*/