<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MTBC | Login</title>

    <link rel="shortcut icon" type="image/x-icon" href="../public/assets/iconlogor.ico">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../public/assets/css/login.css">
</head>

<body>
    <form method="POST" id="frmAcceso">
        <h2><span><i class="fa fa-sign-in"></i></span> Login</h2>
        <button class="submit"><span><i class="fa fa-lock"></i></span></button>
        <span class="fa fa-user inputUserIcon"></span>
        <input type="text" class="user" name="logina" id="logina" placeholder="ursername">
        <i class="fa fa-unlock-alt inputPassIcon input-pass"></i>
        <input type="password" class="pass" name="clavea" id="clavea" placeholder="password">
    </form>
    <script src="../public/assets/js/bootbox.min.js"></script>
    <script src="../public/assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../public/assets/js/login.js"></script>
</body>

</html>