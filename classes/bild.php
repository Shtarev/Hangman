<?php
class bild extends wortFullen {
public function clean_directory($dirname) {
    if (is_dir($dirname))
      $dir_handle = opendir($dirname);
    if (!$dir_handle)
      return false;
    while($file = readdir($dir_handle)) {
      if ($file != "." && $file != "..") {
        if (!is_dir($dirname."/".$file))
          unlink($dirname."/".$file);
        else
          clean_directory($dirname.'/'.$file);
      }
    }
    closedir($dir_handle);
    return true;
  }
public function foto() {
    function wolke( $foto, $haltungX, $haltungY, $color ) {
        imagefilledellipse( $foto, 60 + $haltungX, 60 + $haltungY, 200, 30, $color );
        imagefilledellipse( $foto, 15 + $haltungX, 55 + $haltungY, 70, 40, $color );
        imagefilledellipse( $foto, 90 + $haltungX, 55 + $haltungY, 60, 35, $color );
        imagefilledellipse( $foto, 60 + $haltungX, 55 + $haltungY, 40, 30, $color );
    }
    $x = 410;
    $y = 45;
    $r = 25;
    $A = 30;
    $q = 35;
    $t = 3;
    $h = 2;
    function sonne( $foto, $color, $x, $y, $r, $A, $q, $t, $h ) {
        $x0 = $x;
        $y0 = $y - $r - $t;
        $x1 = $x;
        $y1 = $y - $r - $t - $q;
        imagesetthickness( $foto, $h );
        imagefilledellipse( $foto, $x, $y, $r * 2, $r * 2, $color );
        imageline( $foto, $x0, $y0, $x1, $y1, $color );
        $i = 0;
        while ( $i < 360 ) {
            $rx = $x0 - $x;
            $ry = $y0 - $y;
            $c = cos( deg2rad( $A ) );
            $s = sin( deg2rad( $A ) );
            $x0 = $x + $rx * $c - $ry * $s;
            $y0 = $y + $rx * $s + $ry * $c;
            $rx = $x1 - $x;
            $ry = $y1 - $y;
            $c = cos( deg2rad( $A ) );
            $s = sin( deg2rad( $A ) );
            $x1 = $x + $rx * $c - $ry * $s;
            $y1 = $y + $rx * $s + $ry * $c;
            imageline( $foto, $x0, $y0, $x1, $y1, $color );
            $i += $A;
        }
    }
    $foto = imagecreatetruecolor( 500, 300 );
    $white = imagecolorallocate( $foto, 255, 255, 255 );
    $black = imagecolorallocate( $foto, 0, 0, 0 );
    $khaki = imagecolorallocate( $foto, 240, 230, 140 );
    $green = imagecolorallocate( $foto, 0, 128, 0 );
    $lightblue = imagecolorallocate( $foto, 173, 216, 230 );
    $sienna = imagecolorallocate( $foto, 160, 82, 45 );
    $dimgray = imagecolorallocate( $foto, 105, 105, 105 );
    $crimson = imagecolorallocate( $foto, 220, 20, 60 );
    imagefilledrectangle( $foto, 0, 0, 500, 300, $lightblue );
    imagefilledarc( $foto, 70, 320, 300, 150, 0, 0, $green, IMG_ARC_PIE );
    imagefilledarc( $foto, 365, 350, 690, 170, 0, 0, $green, IMG_ARC_PIE );
    wolke( $foto, 0, 0, $white );
    wolke( $foto, 350, 150, $white );
    sonne( $foto, $khaki, $x, $y, $r, $A, $q, $t, $h );
    wolke( $foto, 465, 20, $white );
    if ($this->pech > 0) {
    $galgen = array(
        130, 60,
        236, 60,
        236, 67,
        171, 67,
        137, 101,
        137, 231,
        174, 270,
        165, 270,
        137, 242,
        137, 270,
        130, 270,
        130, 242,
        102, 270,
        93, 270,
        130, 231
    );
    $lichtstreifen = array(
        138, 68,
        161, 68,
        138, 91,
        138, 68
    );
    $wolkeKlein = array(
        138, 68,
        155, 68,
        138, 71,
        138, 68
    );
    imagefilledpolygon( $foto, $galgen, 15, $sienna );
    imagefilledpolygon( $foto, $lichtstreifen, 4, $lightblue );
    imagefilledpolygon( $foto, $wolkeKlein, 3, $white );
    imagesetpixel( $foto, 137, 71, $sienna );
    imagesetpixel( $foto, 137, 91, $sienna );
    }
    if ($this->pech > 1) {
    imagesetthickness( $foto, 1 );
    imageline( $foto, 230, 67, 230, 115, $black );
    }
    if ($this->pech == 3) {
    imageellipse( $foto, 230, 130, 10, 30, $black );
    }
    if ($this->pech > 3 or $this->gewin == "ok") {
    imagefilledellipse( $foto, 230, 123, 15, 15, $dimgray );
    imageline( $foto, 226, 121, 228, 121, $white );
    imagesetpixel( $foto, 227, 122, $white );
    imageline( $foto, 232, 121, 234, 121, $white );
    imagesetpixel( $foto, 233, 122, $white );
    imagesetpixel( $foto, 230, 124, $white );
    imageline( $foto, 228, 127, 232, 127, $white );
    }
    if ($this->pech > 4 or $this->gewin == "ok") {
    imagefilledellipse( $foto, 230, 153, 20, 45, $dimgray );
    }
    if ($this->pech > 5 or $this->gewin == "ok") {
    imagesetthickness( $foto, 3 );
    imagefilledellipse( $foto, 222, 138, 10, 10, $dimgray );
    imageline( $foto, 218, 139, 215, 175, $dimgray );
    imagesetthickness( $foto, 1 );
    imageline( $foto, 215, 171, 215, 175, $lightblue );
    imageline( $foto, 218, 169, 218, 172, $dimgray );
    }
    if ($this->pech > 6 or $this->gewin == "ok") {
    imagesetthickness( $foto, 3 );
    imagefilledellipse( $foto, 238, 138, 10, 10, $dimgray );
    imageline( $foto, 242, 139, 245, 175, $dimgray );
    imagesetthickness( $foto, 1 );
    imageline( $foto, 245, 171, 245, 175, $lightblue );
    imageline( $foto, 242, 169, 242, 172, $dimgray );
    }
    if ($this->gewin == "ok") {
    imagefilledrectangle ($foto, 200, 220, 260, 280, $sienna);
    imagefilledrectangle ($foto, 140, 240, 200, 280, $sienna);
    imagefilledrectangle ($foto, 260, 260, 320, 280, $sienna);
    imagesetthickness( $foto, 5 );
    imageline( $foto, 230, 240, 230, 260, $white);
    imageline( $foto, 165, 250, 165, 270, $white);
    imageline( $foto, 175, 250, 175, 270, $white);
    imageline( $foto, 280, 265, 280, 275, $white);
    imageline( $foto, 290, 265, 290, 275, $white);
    imageline( $foto, 300, 265, 300, 275, $white);
    }
    if ($this->pech > 7 or $this->gewin == "ok") {
    imagesetthickness( $foto, 5 );
    imagefilledellipse( $foto, 225, 170, 10, 10, $dimgray );
    imageline( $foto, 224, 174, 221, 201, $dimgray );
    imageline( $foto, 221, 200, 223, 220, $dimgray );
    $fussL = array(
        220, 215,
        220, 220,
        210, 220,
        220, 215
    );
    imagefilledpolygon( $foto, $fussL, 4, $dimgray );
    }
    if ($this->pech > 8 or $this->gewin == "ok") {
    imagesetthickness( $foto, 5 );
    imagefilledellipse( $foto, 235, 170, 10, 10, $dimgray );
    imageline( $foto, 236, 174, 239, 201, $dimgray );
    imageline( $foto, 239, 200, 237, 220, $dimgray );
    $fussR = array(
        240, 215,
        250, 220,
        240, 220,
        240, 215
    );
    imagefilledpolygon( $foto, $fussR, 4, $dimgray );
    }
    if ($this->pech > 8 and $this->gewin != "ok") {
    imagesetthickness( $foto, 15 );
    imageline($foto, 360, 325, 560, 155, $black);
    imageline($foto, 360, 339, 560, 169, $crimson);
    imageline($foto, 360, 348, 560, 178, $black);
    }
    $bild = "img/".uniqid().".png";
    imagepng( $foto, $bild );
    imagedestroy( $foto );
    echo "<img src=\"$bild\">";
    }
}