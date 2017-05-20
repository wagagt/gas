/**
 * Created by Axel on 16/08/2016.
 */
// Dropdown dinamico de proveedores y ubicaines

$('#ProveedorId').change(function(event){
    $.get("/ubicaciones/"+event.target.value+"",function(response, state){
        $("#ProveedorUbicacionId").empty();
        for(i= 0; i < response.length; i++){
            $("#ProveedorUbicacionId").append("<option value='"+response[i].ProveedorUbicacionId+"'>"+response[i].Nombre+"</option>");
        }
    });
});
