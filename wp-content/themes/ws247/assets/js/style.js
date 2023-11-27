$(".main-form-bottom .form-footer form .form-group .list-user input[type=radio]").click(function(){
	$(".main-form-bottom .form-footer form .form-group .list-user .wpcf7-list-item-label").removeClass("active");
	$(this).parent().find(".wpcf7-list-item-label").toggleClass("active");
});

$( ".main-form-bottom .form-footer form .form-group .list-user .wpcf7-list-item.first span" ).addClass( "active" );

//
$(".ws-list-user input[type=radio]").click(function(){
	$(".ws-list-user .wpcf7-list-item-label").removeClass("active");
	$(this).parent().find(".wpcf7-list-item-label").toggleClass("active");
});

$( ".ws-list-user .wpcf7-list-item.first span" ).addClass( "active" );
