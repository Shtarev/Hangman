<?php
class wort {
    public function wort() {
        $worteFile = fopen("worte.txt", "r");
        $worteAus = fread($worteFile, filesize ("worte.txt"));
        fclose($worteFile);
        $worteArray = explode(" ", $worteAus);
        $key = array_rand($worteArray, 1);
        $wort = mb_strtoupper($worteArray[$key]);
        return($wort);
    }
}