<?php
session_start();
if(!isset($_SESSION["email_usu"])){
    header("Location:../index.php");
}


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
        $file_name = basename($name);
        $info = pathinfo($file_name);

        $query = "SELECT p.id_professor, p.nom_prof, p.cognom1_prof, p.cognom2_prof, p.email_prof, p.telf,  pt.nom_dept
        FROM tbl_professor p 
        INNER JOIN tbl_dept pt 
        ON p.dept=pt.id_dept";

        $querytotal = mysqli_query($connection,$query);
            $arraytabla1 = array();
            array_push($arraytabla1, "Name,FirstName,LastName,Grupo");
            foreach ($querytotal as $header => $profe) {
                $PROFES = array_push($arraytabla1, "{$profe['email_prof']},{$profe['nom_prof']},{$profe['cognom1_prof']},{$profe['nom_dept']}");
            }
        SaveFile($name,$arraytabla1);
        if ($querytotal != NULL) {
            header("Content-Description: File Transfer"); 
            header("Content-Type: application/octet-stream"); 
            header("Content-Disposition: attachment; filename=\"". $file_name . "\""); 
            readfile ($name, $PROFES);
        } else {
            echo "<script>window.alert('No se ha podido crear el archivo')</script>";
        }
        
        // Alumnos
        } else {
        $name2 = "alumnos.csv";
        $file_name2 = basename($name2);
        $info2 = pathinfo($file_name2);
        
        $query2 = "SELECT p.* , pt.nom_classe
        FROM tbl_alumne p 
        INNER JOIN tbl_classe pt 
        ON p.classe=pt.id_classe";

        $querytotal2 = mysqli_query($connection,$query2);
            $arraytabla2 = array();
            array_push($arraytabla2, "FirstName,GivenName,SurName,Grupo");
            foreach ($querytotal2 as $header => $alumno) {
                $ALUMNOS = array_push($arraytabla2, "{$alumno['email_alu']},{$alumno['nom_alu']},{$alumno['cognom1_alu']},{$alumno['nom_classe']}");
            }
        SaveFile($name2,$arraytabla2);
        if ($querytotal2 != NULL) {
            header("Content-Description: File Transfer"); 
            header("Content-Type: application/octet-stream"); 
            header("Content-Disposition: attachment; filename=\"". $file_name2 . "\""); 
            readfile ($name2, $ALUMNOS);
            $file = 'alumnos.csv';
                $remote_file = 'C:\inetpub\ftp';
                $ftp_server = "192.168.200.254";
                $ftp_user_name = "admin@jpg.com";
                $ftp_user_pass = "Qwerty12345";

                // set up basic connection
                $conn_id = ftp_connect($ftp_server);

                // login with username and password
                $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

                // upload a file
                if (ftp_put($conn_id, $remote_file, $file, FTP_ASCII)) {
                echo "successfully uploaded $file\n";
                } else {
                echo "There was a problem while uploading $file\n";
                }

                // close the connection
                ftp_close($conn_id);
        } else {
            echo "<script>window.alert('No se'ha pogut crear l'archiu')</script>";
            echo "<script>window.location.href='./mostrar.php?id=alu'</script>"; 
        }
        }
} else {
    echo "<script>window.location.href='../index.php'</script>";
}
