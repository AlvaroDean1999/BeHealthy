<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/register.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/landingPage/favicon.png" />
</head>

<body>
    <div class="main">
        <div class="main__left">

            <div class="container__left">
                <div class="button__container"> 1 </div>

                <div class="steps__container">
                    <p class="subtittle__steps"> Step 1 </p>
                    <p class="tittle__steps"> Crete an account </p>
                </div>
            </div>

            <div class="container__left">
                <div class="button__container"> 2 </div>

                <div class="steps__container">
                    <p class="subtittle__steps"> Step 2 </p>
                    <p class="tittle__steps"> Write your goals in your profile </p>
                </div>
            </div>

            <div class="container__left">
                <div class="button__container"> 3 </div>

                <div class="steps__container">
                    <p class="subtittle__steps"> Step 3 </p>
                    <p class="tittle__steps"> Select a trainer </p>
                </div>
            </div>

            <div class="container__left">
                <div class="button__container"> 4 </div>

                <div class="steps__container">
                    <p class="subtittle__steps"> Step 4 </p>
                    <p class="tittle__steps"> Enjoy your personalized routine </p>
                </div>
            </div>

        </div>

        <div class="main__right">

            <div class="content__right">

                <div class="tittle__container">
                    <h1 class="tittle__tittle"> Register </h1>
                    <p class="subtittle__right"> Create an account </p>
                </div>

                <form action="../controller/register.php" method="post" class="form__right form__register">
                    <label class="registerForm__text" for="type"> Select if you are a trainer or a user </label>
                    <select name="type" id="type" class="input__form input__formSelect">
                        <option value="trainer"> Trainer </option>
                        <option value="user"> User </option>
                    </select>
                    <label class="text__form" for="name"> Name </label>
                    <input type="text" name="name" class="input__form" id="name">
                    <label class="text__form" for="surname"> Surname </label>
                    <input type="text" name="surname" class="input__form" id="surname">
                    <label class="text__form" for="mail"> Mail </label>
                    <input type="email" name="mail" class="input__form" id="mail">
                    <label class="text__form" for="password"> Password </label>
                    <input type="password" name="password" class="input__form" id="password">
                    <button class="button__form" type="submit"> Register </button>
                </form>


            </div>



        </div>
    </div>

</body>

</html>