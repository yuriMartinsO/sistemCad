<html>
    <head>
        <script type="text/javascript" src="public/js/main.js?v=5"></script>
        <script type="text/javascript" src="public/js/bootstrap.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="public/css/index.css">
    </head>
    <body>
        <div id="indexPage">
            <section class="login-page">
                <div id="carouselIndex" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselIndex" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselIndex" data-slide-to="1"></li>
                    <li data-target="#carouselIndex" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100 h-100" src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=752&q=80" alt="By Kimberly Farmer">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100 h-100" src="https://images.unsplash.com/photo-1513475382585-d06e58bcb0e0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="By Christin Hume">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100 h-100" src="https://images.unsplash.com/photo-1524578271613-d550eacf6090?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="By Nick Fewings">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselIndex" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselIndex" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </section>
            <div class="login-container">
                <button type="button" class="btn btn-primary btn-login" data-toggle="modal" data-target="#modalLogin">
                    Login
                </button>
            </div>
            <div class="login-container2">
                <button type="button" class="btn btn-primary btn-cadastro" data-toggle="modal" data-target="#modalCadastro">
                    Cadastre-se
                </button>
            </div>
            <div id="moldal"> </div>
            <div id="moldal2"> </div>
            <?php 
            include "pages/modals/modalLogin.php";
            include "pages/modals/modalCadastro.php";
            ?>
        </div>
    </body>
</html>