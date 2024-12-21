$(document).ready(function(){
    $('#Ciclos').change(function(){
        recargarLista();
    });
})
function recargarLista(){
    $.ajax({
        type:"POST",
        url:"../getCurso.php",
        data:"Ciclos=" + $('#Ciclos').val(),
        success:function(r){
            $('#select2lista').html(r);
        }
    });
}