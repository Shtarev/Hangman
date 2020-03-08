<?php
class wortFullen extends wort {
    public $pech;
    public $gewin;
    public function fullen() {
        if (isset($_SESSION['wortFullen'])) {
            $wortFullen = $_SESSION['wortFullen'];
            $wort = $_SESSION['wort'];
            $buchstabe = $_GET['buchstabe'];
            if (in_array($buchstabe, $wort)) {
                foreach ($wort as $key => $value) {
                    if ($buchstabe == $value) {
                        $wortFullen[$key] = $value;
                    }
                }
                if (in_array("-", $wortFullen) == false) {
                    foreach ( $wortFullen as $value ) {
                        echo "<div class=\"sphere violet buk\">$value</div>";
                    }
                    $this->gewin = "ok";
                    unset($_SESSION['letter']);
                    unset($_SESSION['wortFullen']);
                    unset($_SESSION['wort']);
                    unset($_SESSION['pech']);
                    session_destroy();
                }
                else {
                    $this->pech = $_SESSION['pech'];
                    $_SESSION['wortFullen'] = $wortFullen;
                    foreach ( $wortFullen as $value ) {
                        echo "<div class=\"sphere violet buk\">$value</div>";
                    }
                }
            }
            else {
                $_SESSION['pech']++;
                $this->pech = $_SESSION['pech'];
                if ($_SESSION['pech'] == 9) {
                    foreach ( $wortFullen as $key => $value ) {
                        if ($value == "-") {
                            echo "<div class=\"sphere violetAnzeigen buk\">$wort[$key]</div>";
                        }
                        else {
                            echo "<div class=\"sphere violet buk\">$value</div>";
                        }
                    }
                    unset($_SESSION['letter']);
                    unset($_SESSION['wortFullen']);
                    unset($_SESSION['wort']);
                    unset($_SESSION['pech']);
                    session_destroy(); 
                }
                else {
                    $_SESSION['wortFullen'] = $wortFullen;
                    foreach ( $wortFullen as $value ) {
                        echo "<div class=\"sphere violet buk\">$value</div>";
                    }
                }
            }
        }
        else { 
            $wort = parent::wort();
            $wort = preg_split('//u',$wort,-1,PREG_SPLIT_NO_EMPTY);
            $i = 0;
            while(count($wort) > $i) {
                $wortFullen[$i] = "-";
                $i++;
            }
            $_SESSION['wortFullen'] = $wortFullen;
            $_SESSION['wort'] = $wort;
            $_SESSION['pech'] = 0;
            foreach ( $wortFullen as $value ) {
                echo "<div class=\"sphere violet buk\">$value</div>";
            }
            }
    }
}