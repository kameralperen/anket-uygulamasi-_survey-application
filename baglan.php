<?php

try{
    $VeriTabaniBaglantisi   =   new PDO("mysql:host=localhost;dbname=uskumru;charset=UTF8;", "root", "");
}catch(PDOException $hata){
    echo "Bağlantı hatası! <br /> Hata açıklaması: " . $hata->getMessage();
    die();
}

function Filtrele($deger){
    $Bir        =   trim($deger);
    $Iki        =   strip_tags($Bir);
    $Uc         =   htmlspecialchars($Iki);
    $Sonuc      =   $Uc;
    return $Sonuc;
}

$IPAdresi           =   $_SERVER["REMOTE_ADDR"];
$ZamanDamgasi       =   time();
$OyKullanmaSiniri   =   86400; //saniye cinsinden
$ZamaniGeriAl       =   $ZamanDamgasi - $OyKullanmaSiniri; //Kullanıcının bir kere oy kullanmasını sağlamak için zamanı geri aldık.

?>