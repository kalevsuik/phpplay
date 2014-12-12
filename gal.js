jQuery.fn.center = function() 
{
    this.css("position","absolute");
    this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
    this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
    return this;
}

$(document).ready(function() {
	$('#close_image').on('click', function(){
		$("#image_wrapper").hide();
	})
    $('.thumb').on('click', function() {
        var img = $('<img />', {src    : this.src,
                                'class': 'fullsize'
     });
    
    $('#largeimg').html(img).show();
    $("#image_wrapper").center(true);
    $("#image_wrapper").show();
    
    });
	
	$("#image_wrapper").on('click', function(){
		$("#image_wrapper").hide();
	})
});