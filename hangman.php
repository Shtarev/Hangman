<?php
session_start();
if ( isset( $_GET[ 'new' ] ) ) {
    unset( $_SESSION[ 'letter' ] );
    unset( $_SESSION[ 'wortFullen' ] );
    unset( $_SESSION[ 'wort' ] );
    unset( $_SESSION[ 'pech' ] );
}

function __autoload( $className ) {
    include "classes/" . $className . ".php";
}
$alphabet = new alphabet();
$bild = new bild();
$bild->clean_directory( "img" );
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hangman spielen Demo</title>
    <link rel="stylesheet" media="all and (orientation:portrait)" href="portrait.css">
    <link rel="stylesheet" media="all and (orientation:landscape)" href="landscape.css">
</head>
<body>
    <div class="wort">
        <?php $bild -> fullen(); ?>
    </div>
    <div class="foto">
        <?php $bild -> foto(); ?>
    </div>
    <div id="alphabet" class="alphabet">
        <?php $alphabet -> alphabets(); ?>
    </div>
    <div class="neueSpiele"><a href="hangman.php?new">Neue</a>
    </div>
<footer>
Copyright &copy; 2010<script>new Date().getFullYear()>2010&&document.write("-"+new Date().getFullYear());</script> | All rights reserved | Design & programmierung by <a href="https://www.netzexplorer.com">Andrey Shtarev</a>
</footer>
</body>
</html>