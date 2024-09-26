<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeHealthy</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/landingPage/favicon.png" />
    <link rel="stylesheet" href="css/landingPage/header.css" class="header">
    <link rel="stylesheet" href="css/landingPage/home.css" class="home">
    <link rel="stylesheet" href="css/landingPage/plans.css" class="plans">
    <link rel="stylesheet" href="css/landingPage/aboutUs.css" class="aboutUs">
    <link rel="stylesheet" href="css/landingPage/blog.css" class="blog">
    <link rel="stylesheet" href="css/landingPage/users.css" class="blog">
    <link rel="stylesheet" href="css/landingPage/contact.css" class="blog">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <header class="header">
        <nav class="nav">
            <a href="#acerca"> <img class="imagenLogo" src="img/landingPage/logo.png"> </a>
            <button class="toggle"> <img class="imgToggle" src="img/landingPage/menu (1).png"> </button>
            <ul class="nav-menu">
                <li class="navMenuItem"> <a href="#acerca" class="navMenuLink navLink">About Us </a></li>
                <li class="navMenuItem"> <a href="#plans" class="navMenuLink navLink">Plans </a></li>
                <li class="navMenuItem"> <a href="#users" class="navMenuLink navLink">Users </a></li>
                <li> <button class="button" id="showLogin"> <a href="view/login.php" class="logIn__a">LOG
                            IN</a></button></li>
            </ul>
        </nav>
    </header>


    <div class="home">
        <div class="homeText">
            <h1 class="homeTittle"> With <span> beHealthy </span>the change is just a click away</h1>
            <p> Experience the future of wellness with BeHealthy – your go-to app for personalized fitness routines
                tailored just for you. Achieve your health goals effortlessly, as cutting-edge technology meets
                personalized wellness on a single click.</p>
            <button class="buttonRegister"> <a href="view/register.php"> Register Now! </a></button>
        </div>

        <div class="homeImg">
            <img src="img/landingPage/LaptopMain2.png">
        </div>
    </div>



    <h1 class="aboutUsTittle"> About Us</h1>
    <div class="aboutUs" id="acerca">

        <div class="aboutUsItem">
            <img src="img/landingPage/icons/sportIcon.png" alt="" class="aboutUsLogo">
            <h3 class="itemTittleAboutUs"> Exercise </h3>
            <p> BeHealthy app makes exercising easy with personalized workouts, detailed instructions, and progress
                tracking. Get fit on your terms, efficiently and effectively.</p>
        </div>
        <div class="aboutUsItem">
            <img src="img/landingPage/icons/eatIcon.png" alt="" class="aboutUsLogo">
            <h3 class="itemTittleAboutUs"> Diet </h3>
            <p> BeHealthy app supports your diet goals by providing personalized nutrition plans, meal tracking, and
                healthy recipe suggestions. Stay on track with your diet effortlessly. </p>
        </div>
        <div class="aboutUsItem">
            <img src="img/landingPage/icons/personalIcon.png" alt="" class="aboutUsLogo">
            <h3 class="itemTittleAboutUs"> Personalized </h3>
            <p> BeHealthy app tailors diet plans to fit your unique preferences and goals, offering personalized meal
                tracking and recipe suggestions for effortless and effective nutrition management</p>
        </div>
        <div class="aboutUsItem">
            <img src="img/landingPage/icons/onlineIcon.png" alt="" class="aboutUsLogo">
            <h3 class="itemTittleAboutUs"> Online </h3>
            <p> BeHealthy app delivers personalized diet plans right to your device, offering online access for
                convenient nutrition management in the palm of your hand.</p>
        </div>
    </div>

    <section class="plansContainer" id="plans">

        <div class="tittle__plansContainer">
            <h1 class="h1__tittle"> Subscriptions </h1>
        </div>

        <div class="plans__plansContainer">

            <div class="basicPlan__plans hidden">
                <div class="tittleContainer">
                    <h2 class="tittlePlan__tittleContainer"> Basic </h2>
                </div>

                <div class="priceContainer">
                    <h2 class="price__princeContainer"> 0€ </h2>
                </div>

                <div class="staticsContainer">
                    <p class="static__staticsContainer">
                        Trainer Meter
                    </p>
                    <p class="static__staticsContainer">
                        health Meter
                    </p>
                    <p class="static__staticsContainer">
                        Access to the platform
                    </p>
                </div>

                <div class="buyButton">
                    <button class=" buy__buyButton"> <a href="view/register.php">BUY</a> </button>
                </div>


            </div>

            <div class="estandarPlan__plans hidden">
                <div class="tittleContainer">
                    <h2 class="tittlePlan__tittleContainer"> Premium </h2>
                </div>

                <div class="priceContainer">
                    <h2 class="price__princeContainer"> 15€ </h2>
                </div>

                <div class="staticsContainer">
                    <p class="static__staticsContainer">
                        personalized tracking
                    </p>
                    <p class="static__staticsContainer">
                        Personalized diet
                    </p>
                    <p class="static__staticsContainer">
                        Personalized training
                    </p>
                </div>

                <div class="buyButton">
                    <button class=" buy__buyButton"> <a href="view/register.php">BUY</a> </button>
                </div>


            </div>

            <div class="premiumPlan__plans  hidden">
                <div class="tittleContainer">
                    <h2 class="tittlePlan__tittleContainer"> Gold </h2>
                </div>

                <div class="priceContainer">
                    <h2 class="price__princeContainer"> 29€ </h2>
                </div>

                <div class="staticsContainer">
                    <p class="static__staticsContainer">
                        Private community
                    </p>
                    <p class="static__staticsContainer">
                        Discounts on supplements
                    </p>
                    <p class="static__staticsContainer">
                        Personal Trainer
                    </p>
                </div>

                <div class="buyButton">
                    <button class=" buy__buyButton"> <a href="view/register.php">BUY</a> </button>
                </div>
            </div>
        </div>

    </section>





    <section class="users" id="users">
        <h1 class="tittle__users"> Day by Day more users trust in <span> BeHealthy </span></h1>


        <div class="stats__users">
            <div class="container__stats">
                <p class="tittle__stats"> Users </p>
                <h1 class="number__stats" id="numberStat__users"> 64</h1>
            </div>

            <div class="container__stats">
                <p class="tittle__stats"> Trainers </p>
                <h1 class="number__stats" id="numberStat__trainers"> 14</h1>
            </div>

            <div class="container__stats">
                <p class="tittle__stats"> Rutines </p>
                <h1 class="number__stats" id="numberStat__rutines"> 123</h1>
            </div>

            <div class="container__stats">
                <p class="tittle__stats"> Diets </p>
                <h1 class="number__stats" id="numberStat__diets"> 111</h1>
            </div>
        </div>


        <div class="reviews__users">

            <div class="review__container">
                <div class="header__review">
                    <img src="img/landingPage/icons/perfil.png" alt="" class="img__review">
                    <p class="tittle__review"> Paco Paquito </p>
                </div>

                <div class="text__review">
                    <p> "BeHealthy is my go-to fitness app! It's so easy to use and has everything I need for staying healthy. From meal planning to workout routines, it's all there. I love how it keeps me on track and motivated. Highly recommend!"</p>
                </div>

                <div class="score__review">
                    <img src="img/landingPage/icons/clasificacion.png" alt="" class="scoreImg__review">
                </div>

            </div>

            <div class="review__container">
                <div class="header__review">
                    <img src="img/landingPage/icons/perfil.png" alt="" class="img__review">
                    <p class="tittle__review"> Paco Paquito </p>
                </div>

                <div class="text__review">
                    <p> "BeHealthy is my go-to fitness app! It's so easy to use and has everything I need for staying healthy. From meal planning to workout routines, it's all there. I love how it keeps me on track and motivated. Highly recommend!"</p>
                </div>

                <div class="score__review">
                    <img src="img/landingPage/icons/clasificacion.png" alt="" class="scoreImg__review">
                </div>
            </div>

            <div class="review__container">
                <div class="header__review">
                    <img src="img/landingPage/icons/perfil.png" alt="" class="img__review">
                    <p class="tittle__review"> Paco Paquito </p>
                </div>

                <div class="text__review">
                    <p> "BeHealthy is my go-to fitness app! It's so easy to use and has everything I need for staying healthy. From meal planning to workout routines, it's all there. I love how it keeps me on track and motivated. Highly recommend!"</p>
                </div>

                <div class="score__review">
                    <img src="img/landingPage/icons/clasificacion.png" alt="" class="scoreImg__review">
                </div>
            </div>
        </div>

    </section>



    <div class="contact__button">
        <button class="button__contact" id="button__contact"> <img src="img/landingPage/robot-de-chat.png" alt=""
                class="img__contact"></button>
    </div>



    <form action="controller/consultLandingPage.php" method="POST" class="contact__form" id="contact__form" style="display: none;">
        <button class="button__closeForm" id="button__closeForm"> <img src="img/landingPage/cerrar.png" alt=""
                class="img__closeForm"></button>

        <label for=" " class="text__contactForm"> Nombre: </label>
        <input type="text" class="input__contactForm" name="name" maxlength="255" required>
        <label for=" " class="text__contactForm"> Correo: </label>
        <input type="mail" class="input__contactForm" name="mail" maxlength="255" required>
        <label for=" " class="text__contactForm"> Consulta: </label>
        <input id="" class="inputBig__contactForm" cols="30" rows="7" name="consulta" required>
        <button class="submit__contactForm"> Enviar </button>
    </form>




    <script class="header" src="js/landingPage/Header.js"></script>
    <script src="js/landingPage/AboutUs.js"> </script>
    <script src="js/landingPage/Plans.js"></script>
    <script src="js/landingPage/Users.js"></script>
    <script src="js/landingPage/contact.js"> </script>
</body>

</html>