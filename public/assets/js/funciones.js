//creamos una variable para que almacene la funcione o funciones que realizara al momento de llamarla atraves de nuestro documento
var Biblioteca=function(){
    return{
        //creamos nuestra funcion para nuestro proyecto
        validacionGeneral:function(id,reglas,mensajes){
            const   formulario=$('#'+id);
            formulario.validate({
                rules:reglas,
                messages:mensajes,
                errorElement:'span',
                errorClass:'help-block help-block-error',
                focusInvalid:false,
                ingone:"",
                highlight:function(element,errorClass,validClaas){
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight:function(element){
                    $(element).closest('.form-group').removeClass('has-error');
                },
                success:function(label){
                    label.closest('.form-group').removeClass('has-error');
                },
                errorPlacement:function(error,element){
                    if($(element).is('select')&& element.hasClass('bs-select')){
                        error.insertAfter(element);
                    }else if($(element).is('select')&& element.hasClass('select2-hidden-accessible')){
                        element.next().after(error);
                    }else if(element.attr("data-error-container")){
                        error.appendTo(element.attr("data-error-container"));
                    }else{
                            error.insertAfter(element);
                    }
                },
                invalidHandler:function(event,validator){

                },
                submitHandler: function (form){

                }
            });
        },
    }
}();
