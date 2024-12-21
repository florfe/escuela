 <?php 
function DatosNota($vDni, $vConexion){
    $Nota=array();
    
    $SQL="SELECT  alu.Id, ntas.IdAlumnos, ntas.Materias,  ntas.Eval1Nota, ntas.Eval1Recup1, ntas.Eval1Recup2 
    FROM notas as ntas
    JOIN alumnos as alu ON  ntas.IdAlumnos=alu.Id 
     ";

    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
     
        $Nota['IDALUMNOS'] = $data['IdAlumnos'];
        $Nota['MATERIAS'] = $data['Materias'];
        $Nota['EVAL1NOTA'] = $data['Eval1Nota'];
        $Nota['EVAL1RECUP1'] = $data['Eval1Recup1'];
        $Nota['EVAL1RECUP2'] = $data['Eval1Recup2'];


    }
    return $Nota;
}

?>