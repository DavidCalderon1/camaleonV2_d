// JavaScript Document

(function($){
    
    $.fn.animateTextbox = function(parameters){
    
        this.each(function(){
        
            var parameter = $.extend({
                textbox: $(this)
            }, parameters);
            
            var focus = function(){
                
                parameter.textbox.find("input").focus();
                
                focusin();
                
            };
            
            var focusin = function(){
                
                var field = parameter.textbox.find("input");
                
                field.addClass("active");
                
                if(field.val()!=""){
                    parameter.textbox.find("label").removeClass("hastext");
                    parameter.textbox.find("label").addClass("active");
                    
                }else{
                    if(!(parameter.textbox.find("label").hasClass("focusin"))){
                        parameter.textbox.find("label").addClass("focusin");
                    }
                }

                if(parameter.textbox.hasClass('has-error')){
                    parameter.textbox.removeClass('has-error');
                    parameter.textbox.find('span.help-block').remove();
                }
                
            };
            
            var focusout = function(){
                
                var field = parameter.textbox.find("input");
                
                field.removeClass("active");
                
                parameter.textbox.find("label").removeClass("focusin");
                parameter.textbox.find("label").removeClass("active");
                
                if(field.val()!=""){
                    parameter.textbox.find("label").addClass("hastext");
                }else{
                    parameter.textbox.find("label").removeClass("hastext");
                }
                
            };
            
            parameter.textbox.find("label").on("click", focus);
            
            parameter.textbox.find("input").on("focusin", focusin);
            parameter.textbox.find("input").on("focusout", focusout);

            parameter.textbox.find("input").trigger("focusout");
            
        });
        
    }
    
}(jQuery));