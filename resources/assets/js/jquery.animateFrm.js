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

    $.fn.animateTextarea = function(parameters){
    
        this.each(function(){
        
            var parameter = $.extend({
                textarea: $(this)
            }, parameters);
            
            var focus = function(){
                
                parameter.textarea.find("area").focus();
                
                focusin();
                
            };
            
            var focusin = function(){
                
                var field = parameter.textarea.find("textarea");
                
                field.addClass("active");
                
                if(field.val()!=""){
                    parameter.textarea.find("label").removeClass("hastext");
                    parameter.textarea.find("label").addClass("active");
                    
                }else{
                    if(!(parameter.textarea.find("label").hasClass("focusin"))){
                        parameter.textarea.find("label").addClass("focusin");
                    }
                }

                if(parameter.textarea.hasClass('has-error')){
                    parameter.textarea.removeClass('has-error');
                    parameter.textarea.find('span.help-block').remove();
                }
                
            };
            
            var focusout = function(){
                
                var field = parameter.textarea.find("textarea");
                
                field.removeClass("active");
                
                parameter.textarea.find("label").removeClass("focusin");
                parameter.textarea.find("label").removeClass("active");
                
                if(field.val()!=""){
                    parameter.textarea.find("label").addClass("hastext");
                }else{
                    parameter.textarea.find("label").removeClass("hastext");
                }
                
            };
            
            parameter.textarea.find("textarea").on("click", focus);
            
            parameter.textarea.find("textarea").on("focusin", focusin);
            parameter.textarea.find("textarea").on("focusout", focusout);

            parameter.textarea.find("textarea").trigger("focusout");
            
        });
        
    }

    $.fn.animateSelect = function(parameters){
    
        this.each(function(){
        
            var parameter = $.extend({
                select: $(this)
            }, parameters);
            
            var focusin = function(){

                parameter.select.find("label").addClass("active");
                
            };
            
            var focusout = function(){

                parameter.select.find("label").removeClass("active");
                
            };
            
            parameter.select.find("select").on("focusin", focusin);
            parameter.select.find("select").on("focusout", focusout);

        });
        
    }
    
}(jQuery));