window.$ = window.jQuery = require('jquery')
require('bootstrap-sass');

$( document ).ready(function() {

    console.log($.fn.tooltip.Constructor.VERSION);
    console.log('Holis!!');

    /*Menu*/

    $('li.linkmenu').on('click',function(){

        var icon = $('<span aria-hidden="true"></span>');

        icon.addClass('glyphicon');
        icon.addClass('glyphicon-chevron-right');

        var temp = $('<span></span>');

        temp.text($('#' + $(this).data('menu') + '').data('name'));
        temp.addClass('linkmenu');
        temp.data('menu', $(this).data('menu'));

        $('nav').find('#route').append(icon);
        $('nav').find('#route').append(temp);
        
        $(this).parent('ul').slideUp();
        $('#' + $(this).data('menu') + '').slideDown();

    });

    $('#route').on('click', 'span.linkmenu', function(){

        while( $(this).data('menu') !== $('span').last().data('menu') ){
            $('span').last().remove();
        }

        $('nav').find('.nav').slideUp();
        $('#' + $(this).data('menu') + '').slideDown();

        console.log("lala");

    });

    /* radiocheck, radiobutton */

    $(".checkbox").on("click", "label", function(){
        $(this).toggleClass("checked");
    });

});