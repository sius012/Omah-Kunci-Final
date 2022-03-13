$(document).ready(function(){
    $(".btnshow").click(function(){
       
        if($(this).closest(".input-group").children("input").attr("type") == "password"){
           
            $(this).closest(".input-group").children("input").attr("type","text");
            $(this).children("i").removeClass("fa-eye-slash");
            $(this).children("i").addClass("fa-eye");
        }else{
            
            $(this).closest(".input-group").children("input").attr("type","password");
            $(this).children("i").addClass("fa-eye-slash");
            $(this).children("i").removeClass("fa-eye");
        }
    });
});