<?php

class Flasher {

    public static function setFlash($data_apa, $sukses, $aksi, $tipe) {
        $_SESSION["flash"] = [
            "data_apa" => $data_apa,
            "sukses" => $sukses,
            "aksi" => $aksi,
            "tipe" => $tipe
        ];
    }

    public static function flash() {
        
        if (isset($_SESSION["flash"])) {
            echo "<div class='alert alert-" . $_SESSION["flash"]["tipe"] . "'" . " role='alert'>
                    Data " . $_SESSION["flash"]["data_apa"] . " <b>" . $_SESSION["flash"]["sukses"] . "</b> " . $_SESSION["flash"]["aksi"] . " </div>";
        }
        
        unset($_SESSION["flash"]);
    }

}