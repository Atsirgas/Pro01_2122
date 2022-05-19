<?php
function SaveFile($name, $array) {
    file_put_contents($name, $array[0]."\n");
    for ($i=1; $i < count($array); $i++) {
        file_put_contents($name, $array[$i]."\n", FILE_APPEND);
    }
}

include '../conexion.php';

if (isset($_GET['id'])=="prof"){
    $id = $_GET['id'];
    // Profesores
    if($id=="prof"){
        $name = "profesores.csv";
        
        $query = "SELECT p.id_professor, p.nom_prof, p.cognom1_prof, p.cognom2_prof, p.email_prof, p.telf,  pt.nom_dept
        FROM tbl_professor p 
        LEFT JOIN tbl_dept pt 
        ON p.dept=pt.id_dept";

        $querytotal = mysqli_query($connection,$query);
            $arraytabla1 = array();
            array_push($arraytabla1, "id_professor;cognom1_prof;cognom2_prof;nom_prof;telf;email_prof;nom_dept");
            foreach ($querytotal as $header => $profe) {
                $PROFES = array_push($arraytabla1, "{$profe['id_professor']};{$profe['cognom1_prof']};{$profe['cognom2_prof']};{$profe['nom_prof']};{$profe['telf']};{$profe['email_prof']};{$profe['nom_dept']}");
            }
        SaveFile($name,$arraytabla1);
        if ($querytotal != NULL) {
            echo "<script>window.alert('Archivo guardado correctamente')</script>";
            echo "<script>window.location.href='./mostrar.php?id=prof'</script>";
        } else {
            echo "<script>window.alert('No se ha podido crear el archivo')</script>";
        }
        
        // Alumnos
        } else {
        $name2 = "alumnos.csv";
        
        $query2 = "SELECT p.* , pt.nom_classe
        FROM tbl_alumne p 
        LEFT JOIN tbl_classe pt 
        ON p.classe=pt.id_classe";

        $querytotal2 = mysqli_query($connection,$query2);
            $arraytabla2 = array();
            array_push($arraytabla2, "id_alumne;cognom1_alu;cognom2_alu;nom_alu;telf_alu;email_alu;dni_alu;nom_classe");
            foreach ($querytotal2 as $header => $alumno) {
                $ALUMNOS = array_push($arraytabla2, "{$alumno['id_alumne']};{$alumno['cognom1_alu']};{$alumno['cognom2_alu']};{$alumno['nom_alu']};{$alumno['telf_alu']};{$alumno['email_alu']};{$alumno['dni_alu']};{$alumno['nom_classe']}");
            }
        SaveFile($name2,$arraytabla2);
        if ($querytotal2 != NULL) {
            echo "<script>window.alert('Archivo guardado correctamente')</script>";
            echo "<script>window.location.href='./mostrar.php?id=alu'</script>";
        } else {
            echo "<script>window.alert('No se ha podido crear el archivo')</script>";
        }
        }
} else {
    echo "<script>window.location.href='../index.php'</script>";
}
