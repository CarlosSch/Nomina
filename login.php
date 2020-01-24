<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">

    <title>Sistema de Nómina Varfra</title>
</head>
<body>
    <div class="error">
        <span>Usuario o contraseña incorrecto, por favor intentalo de nuevo</span>
    </div>

    <div class="container-login">
        <div class="grid-item gridLeft">
            <h1>BIENVENIDO</h1>
            <img src="assets/white_logo.png" class="logo">
            <p>Al sistema de control de nómina</p>
        </div>

        <div class="grid-item gridRight">
            <form method="POST" id="formLg">
                <h2>Inicio de sesión</h2>
                <p>Si has olvidado tus datos de inicio, visita el área de sistemas para recuperalos</p>
                <div class="input-user">
                    <input type="text" class="user" name="user" placeholder="Usuario" required>
                </div>
                <div class="input-pass">
                    <input type="password" class="pass" name="pass" placeholder="Contraseña"required>
                </div>
                <input type="submit" id="btn-login" name="btn-login"class="btn-login" value="Iniciar Sesión">
            </form>
        </div>
    </div>    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/bc5c61460d.js" crossorigin="anonymous"></script>
<script src="js/type_session.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

</html>