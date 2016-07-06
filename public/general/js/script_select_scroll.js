
/* js para es select que se convierte en scroll */ 
var selectScroll = $('.select_scroll').mousedown(function (e) {
	if($(this).attr('size') == "1"){
		$(this).attr('size','5');
		$(this).attr('click','1');
		e.stopPropagation();
	}
}).keypress(function (e) {
	if($(this).attr('size') == "1"){
		$(this).attr('size','5');
		$(this).attr('click','1');
		e.stopPropagation();
	}
}).click(function (e) {
	if($(this).attr('click') == "1"){
		$(this).attr('click','2');
	}else if($(this).attr('click') == "2"){
		if($(this).attr('size') == "5"){
			$(this).attr('size','1');   
		}
		$(this).attr('click','0');
	}
}).find('option').on({
	'mouseover': function () {
		$('.hover').removeClass('hover');
		$(this).addClass('hover');
	},
	'mouseleave': function () {
		$(this).removeClass('hover');
	}
});

/* js de prueba */ 

/*

$('select#cntg_cntcid').click(function(){
		if($(this).attr('size') == "4"){
			$(this).attr('size','1');   
		}else if($(this).attr('size') == "1"){
			$(this).attr('size','4');
		}
	});

	
$('.select_scroll').click(function (e) {
		e.stopPropagation();
		if($(this).attr('size') == "1"){
			$(this).attr('size','4');
		}else if($(this).attr('size') == "4"){
			$(this).attr('size','1');   
		}
		alert($(this).attr('size'));
        //$(this).siblings('select').css('width', $(this).outerWidth(true)).toggle();
    });.mousedown(function (e) {
        e.stopPropagation();
		$(this).click();
    }).change(function (e) {
        e.stopPropagation();
		$(this).click();
    }).blur(function (e) {
        e.stopPropagation();
		$(this).click();
    }).focus(function (e) {
        e.stopPropagation();
		$(this).click();
    });

$('#choose').click(function (e) {
        e.stopPropagation();
        $(this).siblings('select').css('width', $(this).outerWidth(true)).toggle();
    });

    $('#options').change(function (e) {
        e.stopPropagation();
        var val = this.value || 'Select options';
        $(this).siblings('#choose').text(val);
        $(this).hide();
    });

    $('select#options').find('option').on({
        'mouseover': function () {
            $('.hover').removeClass('hover');
            $(this).addClass('hover');
        },
            'mouseleave': function () {
            $(this).removeClass('hover');
        }
    });
	
	
	*/