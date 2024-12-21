
$(document).ready(function(){
    $('#idCurso').change(function(){
        recargarLista();
    });
})
function recargarLista(){
    $.ajax({
        type:"POST",
        url:"../getDivision.php",
        data:"idCurso=" + $('#idCurso').val(),
        success:function(r){
            $('#select2lista').html(r);
        }
    });
}