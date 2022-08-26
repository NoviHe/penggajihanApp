<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Penggajian App - Start Your Finance App</title>

    <?php
    require_once ROOT . "/application/functions/function_html.php";
    load_css('full-width-pics/vendor/bootstrap/css/bootstrap.min.css');
    load_css('full-width-pics/css/full-width-pics.css');

    ?>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= BASE_PATH ?>">Penggajian App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= BASE_PATH ?>/dashboard">Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= BASE_PATH ?>">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASE_PATH ?>/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASE_PATH ?>/register">Registrasi</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header - set the background image for the header in the line below -->
    <header class="py-5 bg-image-full" style="background-image: url('<?= BASE_PATH ?>/public/full-width-pics/image/1076-1900x1080.jpg');">
        <img class="img-fluid d-block mx-auto" src="<?= BASE_PATH ?>/public/full-width-pics/image/Logo.png" alt="">
    </header>




    <!-- Content section -->
    <section class="py-5">
        <div class="container">
            <h1>Section Heading</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>
        </div>
    </section>

    <!-- Image element - set the background image for the header in the line below -->
    <div class="py-5 bg-image-full" style="background-image: url('<?= BASE_PATH ?>/public/full-width-pics/image/1081-1900x1080.jpg');">
        <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
        <div style="height: 200px;"></div>
    </div>

    <!-- Content section -->
    <section class="py-5">
        <div class="container">
            <h1>Section Heading</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <?php
    load_script('full-width-pics/vendor/jquery/jquery.min.js');
    load_script('full-width-pics/vendor/bootstrap/js/bootstrap.bundle.min.js');
    ?>

</body>

</html>