
let itemToDelete = -1;

$(".delete_button").click( function(e){
    e.preventDefault();

    let id =  $(e.target).data().delete_id ;
    
    itemToDelete = id;

    $("#form_delete_user").attr("action","/list/"+id+"/delete")


})

// $("#confirm_delete_buttn").click( function(e){

    
//     alert("kill")
// })