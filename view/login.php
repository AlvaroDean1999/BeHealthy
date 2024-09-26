<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/landingPage/favicon.png" />
    <link rel="stylesheet" href="../css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="main">
        <div class="main__left">
            <h1 class="left__Tittle"> Welcome! </h1>
            <h3 class="left__subtittle"> Be your best version </h3>
        </div>
        <div class="main__right">
            <form action="../controller/login.php" class="form__login" method="post">
                <h1 class="form__tittle"> Login </h1>
                <label class="loginForm__text" for=""> Mail </label>
                <input name="mail" type="email" class="loginForm__input">
                <label class="loginForm__text" for=""> Password </label>
                <input name="password" type="password" class="loginForm__input">
                <a href="register.php" class="loginForm__link"> Create account </a>
                <button class="loginForm__button" type="submit"> Login </button>
            </form>
        </div>
</body>
</html>