
/** this script need to be loaded after main */

let itemToDelete = -1;




$(".delete_button").click( function(e){
    e.preventDefault();

    let id =  $(e.target).data().delete_id ;
    
    itemToDelete = id;

    $("#form_delete_user").attr("action", url + "/list/"+id+"/delete")


})

