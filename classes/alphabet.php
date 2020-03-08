<?php
class alphabet {
    public function alphabets() {
        if (isset($_SESSION['letter'])) {
            $buchstabe = $_GET['buchstabe'];
            $letter = $_SESSION['letter'];
            foreach ($letter as $key => $value) {
                if ($key == $buchstabe) {
                    $letter[$key] = "<div class=\"sphere gray\">$key</div>";
                }
            }
            foreach ( $letter as $value ) {
                echo $value;
            }
            $_SESSION['letter'] = $letter;
        }
        else {
            $letterArray = array( "A", "Ä", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "Ö", "P", "Q", "R", "S", "ß", "T", "U", "Ü", "V", "W", "X", "Y", "Z" );
            foreach ( $letterArray as $value ) {
                $letter[$value] =  "<div class=\"sphere green\"><a href=hangman.php?buchstabe=$value>$value</a></div>";
            }
            foreach ( $letter as $value ) {
                echo $value;
            }
            $_SESSION['letter'] = $letter;
        }
    }
}