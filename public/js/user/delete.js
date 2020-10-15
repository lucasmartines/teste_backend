
/** this script need to be loaded after main */

let itemToDelete = -1;

if(!url){
    throw new Exception("arquivo main não fo carregado, por favor carregue o arquivo main.js antes desse arquivo")
}


$(".delete_button").click( function(e){
    e.preventDefault();

    let id =  $(e.target).data().delete_id ;
    
    itemToDelete = id;

    $("#form_delete_user").attr("action", url + "/list/"+id+"/delete")


})

