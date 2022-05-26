<?php
session_start();
if(!isset($_SESSION["email_usu"])){
    header("Location:../index.php");
}
?>
<!doctype html>
<html lang="es">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="../img/JPG.png">
    <link rel="stylesheet" href="../css/styles.css">
    <title>JPG</title>
</head>

    <body>
        <div id="portada" class="padding-3">

        <div class="recuadro-alu" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

        
        <!-- Termina la definición del menú -->
        
            <div class="row">
                <!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
                
                <div class="col-12">
                    <h2>ENVIAR CORREU</h2>
                        <form action="./mostrar.php?id=prof" method="POST" enctype="multipart/form-data">
                            <input type="submit" class="btn btn-primary" style="float: right;" value="Tornar">
                        </form>
                    <?php
                    include '../conexion.php';
                    
                        $id=$_GET['id_prof'];
                        $sql="SELECT email_prof FROM tbl_professor WHERE id_professor={$id};";
                        $sqlfi=mysqli_query($connection, $sql);
                        foreach($sqlfi as $correo){
                            echo "Enviaràs el correu al email: <b>".$correo['email_prof']."</b>";
                        }
                    ?>
                    <br>
                    <br>
                    <form action="phpmiler-prof.php?id_prof=<?php echo $id; ?>" method="POST" >

                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                        <div class="form-group">
                            <label for="nombre">Assumpte</label>
                            <input name="asunto" required type="text" id="aunto"
                                class="form-control bg-transparent" style="color: white;" placeholder="Escriu l'assumpte...">
                        </div>
                        
                        <div class="form-group">
                            <label for="mensaje">Missatge</label>
                            <textarea required placeholder="Escriu el missatge..."
                                class="form-control bg-transparent" style="color: white;" name="mensaje" id="mensaje"
                                cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn-primary btn" name="button" type="submit">
                                Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        
        </div>
        </div>
    </body>
</html>