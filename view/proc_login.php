<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Document</title>
</head>
<body>
    <div id="portada">

    
    <?php
    include "../conexion.php";
    if(isset($_POST["button"])){
        if(isset($_POST["correo"])&& isset($_POST["psw"]) && isset($_POST['tipo'])){
            $tipo=$_POST['tipo'];
            echo $tipo;
            $correo=$_POST["correo"];
            $password=sha1($_POST["psw"]);
            
            $comprobar= "SELECT * FROM tbl_admin WHERE email_admin = '{$correo}' AND password_admin = '{$password}';";
            $cons = mysqli_query($connection,$comprobar);
            $num = mysqli_num_rows($cons);
            $comprobar2="SELECT * FROM tbl_professor WHERE email_prof = '{$correo}' AND password_prof = '{$password}';";
            $cons2 = mysqli_query($connection,$comprobar2);
            $num2 = mysqli_num_rows($cons2);
            echo $num2;

            if($num==1 && $tipo=="Administrador"){
                session_start();
                $_SESSION["email_usu"]=$correo;
                $_SESSION["tipo"]=$tipo;
                header("Location:./mostrar.php?id=alu");
            }else if($num2==1 && $tipo=="Profesor"){
                session_start();
                $_SESSION["email_usu"]=$correo;
                $_SESSION["tipo"]=$tipo;
                header("Location:./mostrar.php?id=prof");
            }else{
                ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function aviso(url) {
                    Swal.fire({
                            title: 'El correo o la contraseña son incorrectos',
                            imageUrl: '../img/borrar.png',
                            imageWidth: 200,
                            imageHeight: 200,
                            background: '#f39c12',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Tornar'
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = url;
                            }
                        })
                }

                aviso('../index.php');
            </script>
            <?php
            }
        }else{
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function aviso(url) {
                    Swal.fire({
                            title: "Has d'omplir tots els camps",
                            imageUrl: '../img/borrar.png',
                            imageWidth: 200,
                            imageHeight: 200,
                            background: '#f39c12',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Tornar'
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = url;
                            }
                        })
                }

                aviso('../index.php');
            </script>
            <?php
        }
    }
    ?>
    </div>
</body>
</html>