//var url = window.location.origin //+ "/apps/teste/public"
//var url = window.location.origin + "/teste/public"
var url = window.location.origin 




$("#logoff").click( function(e){
    e.preventDefault();

    $.post( url + "/user/logoff" , function(){
        
        window.location = url ;
    })
})