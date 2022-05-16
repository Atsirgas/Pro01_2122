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
        if(isset($_POST["correo"])&& isset($_POST["psw"])){
            $correo=$_POST["correo"];
            $password=sha1($_POST["psw"]);
            
            $comprobar= "SELECT * FROM tbl_admin WHERE email_admin = '{$correo}' AND password_admin = '{$password}';";
            $cons = mysqli_query($connection,$comprobar);
            $num = mysqli_num_rows($cons);
            if($num==1){
                session_start();
                $_SESSION["email_usu"]=$correo;
                
                header("Location:./mostrar.php?id=alu");
            }else {
                ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function aviso(url) {
                    Swal.fire({
                            title: 'El correo o la contraseña son incorrectos',
                            icon: 'error',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Volver'
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
    }
    ?>
    </div>
</body>
</html>