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

    $.fn.animateRadiobutton = function(parameters){
    
        this.each(function(){
        
            var parameter = $.extend({
                radiobutton : $(this)
            }, parameters);

            var init = function(){
                if(parameter.radiobutton.find('input').is(':checked')){
                    parameter.radiobutton.find('label').addClass("checked");
                }
            };
            
            var check = function(){

                var name = parameter.radiobutton.find("input").attr("name");
                var element = 'input:radio[name=' + name + ']';
                $(element).parent().find('label').removeClass("checked");
                parameter.radiobutton.find('label').addClass("checked");

                if(!(parameter.radiobutton.find('input').is(':checked'))){
                    parameter.radiobutton.find('input').prop( "checked", true );
                }
                
            };
            
            parameter.radiobutton.find("label").on("click", check);
            parameter.radiobutton.on("init", init);

            parameter.radiobutton.trigger("init");

        });
        
    }

    $.fn.animateCheckbox = function(parameters){
    
        this.each(function(){
        
            var parameter = $.extend({
                checkbox : $(this)
            }, parameters);

            var init = function(){

                if(parameter.checkbox.find('input').is(':checked')){
                    parameter.checkbox.find('label').addClass("checked");
                }

            };
            
            var check = function(){

                parameter.checkbox.find('label').toggleClass("checked");

                if(!(parameter.checkbox.find('input').is(':checked'))){
                    parameter.checkbox.find('input').prop( "checked", true );
                }
                
            };
            
            parameter.checkbox.find("label").on("click", check);
            parameter.checkbox.on("init", init);

            parameter.checkbox.trigger("init");

        });
        
    }

    $.fn.animateDate = function(parameters){

        this.each(function(){
        
            var parameter = $.extend({
                datepicker : $(this)
            }, parameters);

            var replicatetomobile = function(){

               if(parameter.datepicker.find(".normal").val()!=""){
                    parameter.datepicker.find(".mobile").val(parameter.datepicker.find(".normal").val());
               }
                
            };

            var replicatetonormal = function(){


               if(parameter.datepicker.find(".mobile").val()!=""){
                    parameter.datepicker.find(".normal").val(parameter.datepicker.find(".mobile").val());
               }
                
            };
            
            parameter.datepicker.find(".normal").on("change", replicatetomobile);
            parameter.datepicker.find(".mobile").on("change", replicatetonormal);

        });

    }
    
}(jQuery));