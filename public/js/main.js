var url = window.location.origin //+ "/apps/teste/public"




$("#logoff").click( function(e){
    e.preventDefault();

    $.post( url + "/user/logoff" , function(){
        
        window.location = url ;
    })
})