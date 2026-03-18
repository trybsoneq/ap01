<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Kalkulator Kredytowy</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="<?php print(_APP_URL); ?>/assets/css/main.css" />
    </head>
    <body class="homepage is-preload">
        <div id="page-wrapper">

            <section id="header">
                    <div class="container">

                        <h1 id="logo"><a href="#">Kalkulator Raty</a></h1>
                            <p>Proste narzędzie do obliczania miesięcznej raty kredytu.</p>

                        <nav id="nav">
                                <ul>
                                    <li><a class="icon solid fa-home" href="#"><span>Start</span></a></li>
                                    <li><a class="icon solid fa-calculator" href="#"><span>Kalkulator</span></a></li>
                                    <li><a class="icon solid fa-info-circle" href="#"><span>O nas</span></a></li>
                                </ul>
                            </nav>

                    </div>
                </section>

            <section id="main">
                    <div class="container">
                        <div class="row">

                            <div id="content" class="col-8 col-12-medium">

                                    <article class="box post">
                                            <header>
                                                <h2>Oblicz swoją <strong>miesięczną ratę</strong></h2>
                                            </header>
                                            
                                            <form action="<?php print(_APP_URL);?>/app/credit.php" method="post">
                                                <div class="row gtr-50 gtr-uniform">
                                                    <div class="col-12">
                                                        <label for="id_amount">Kwota kredytu (zł):</label>
                                                        <input id="id_amount" type="text" name="amount" value="<?php print(isset($amount) ? $amount : ''); ?>" style="background-color: #fff; padding: 0.5em;" />
                                                    </div>
                                                    <div class="col-6 col-12-mobilep">
                                                        <label for="id_years">Liczba lat:</label>
                                                        <input id="id_years" type="text" name="years" value="<?php print(isset($years) ? $years : ''); ?>" style="background-color: #fff; padding: 0.5em;" />
                                                    </div>
                                                    <div class="col-6 col-12-mobilep">
                                                        <label for="id_rate">Oprocentowanie (%):</label>
                                                        <input id="id_rate" type="text" name="rate" value="<?php print(isset($rate) ? $rate : ''); ?>" style="background-color: #fff; padding: 0.5em;" />
                                                    </div>
                                                    <div class="col-12">
                                                        <ul class="actions">
                                                            <li><input type="submit" value="Oblicz ratę" class="button icon solid fa-calculator" /></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </form>

                                            <?php if (isset($messages)) {
                                                if (count ( $messages ) > 0) { ?>
                                                    <div style="margin-top: 2em; padding: 1.5em; border: 2px solid #f56a6a; background-color: #fcebeb; border-radius: 0.5em;">
                                                        <h3 style="color: #f56a6a; margin-bottom: 0.5em;">Wystąpiły błędy:</h3>
                                                        <ul style="margin-bottom: 0;">
                                                        <?php foreach ( $messages as $key => $msg ) {
                                                            echo '<li>'.$msg.'</li>';
                                                        } ?>
                                                        </ul>
                                                    </div>
                                                <?php } 
                                            } ?>

                                            <?php if (isset($result)){ ?>
                                                <div style="margin-top: 2em; padding: 2em; background-color: #e6f6e6; border-left: 5px solid #4CAF50; border-radius: 0.5em;">
                                                    <h3 style="margin-bottom: 0.5em;">Wynik obliczeń:</h3>
                                                    <p style="font-size: 1.5em; font-weight: bold; margin: 0; color: #333;">Miesięczna rata: <?php echo $result; ?> zł</p>
                                                </div>
                                            <?php } ?>

                                        </article>

                                </div>

                            <div id="sidebar" class="col-4 col-12-medium">

                                    <section>
                                            <ul class="divided">
                                                <li>
                                                    <article class="box excerpt">
                                                            <header>
                                                                <span class="date">Ważne</span>
                                                                <h3><a href="#">Jak działa kalkulator?</a></h3>
                                                            </header>
                                                            <p>Kalkulator podaje kwotę szacunkową (ratę stałą) bez kosztów okołokredytowych.</p>
                                                        </article>
                                                </li>
                                                <li>
                                                    <article class="box excerpt">
                                                            <header>
                                                                <span class="date">Wskazówka</span>
                                                                <h3><a href="#">Wpisywanie danych</a></h3>
                                                            </header>
                                                            <p>Pamiętaj, aby oprocentowanie wpisywać jako liczbę (np. 8 lub 8.5), bez znaku procenta na końcu.</p>
                                                        </article>
                                                </li>
                                            </ul>
                                        </section>

                                </div>

                        </div>
                    </div>
                </section>

            <section id="footer">
                    <div class="container">
                        <div id="copyright" class="container">
                            <ul class="links">
                                <li>&copy; Kalkulator Kredytowy. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                            </ul>
                        </div>
                    </div>
                </section>

        </div>

        <script src="<?php print(_APP_URL); ?>/assets/js/jquery.min.js"></script>
            <script src="<?php print(_APP_URL); ?>/assets/js/browser.min.js"></script>
            <script src="<?php print(_APP_URL); ?>/assets/js/breakpoints.min.js"></script>
            <script src="<?php print(_APP_URL); ?>/assets/js/util.js"></script>
            <script src="<?php print(_APP_URL); ?>/assets/js/main.js"></script>

    </body>
</html>