$("#logoff").click( function(e){
    e.preventDefault();

    $.post("/user/logoff" , function(){
        window.location = "/";
    })
})