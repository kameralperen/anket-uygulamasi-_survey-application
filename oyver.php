<?php
require_once("baglan.php");

$GelenCevapDegeri               =   Filtrele($_POST["cevap"]);

$KontrolSorgusu                 =   $VeriTabaniBaglantisi->prepare("SELECT * FROM oykullananlar WHERE ipadresi = ? AND tarih >= ?");
$KontrolSorgusu->execute([$IPAdresi, $ZamaniGeriAl]);
$KontrolSayisi                  =   $KontrolSorgusu->rowCount();

if($KontrolSayisi>0){
    echo "Hata! Daha önceden oy kullandınız, 24 saat geçtikten sonra tekrar deneyin. Hile hurda yapmayın aklınızı alırım.<br />";
    echo "Ana sayfaya dönmek için <a href='index.php' style='text-decoration: none; color: black;'>bana bas<a/> <br />";
    echo "Sonuçları görüntülemek için <a href='sonuc.php' style='text-decoration: none; color: black;'>bana bas<a/>";
}else{
    if($GelenCevapDegeri == 1){
        $Guncelle   =   $VeriTabaniBaglantisi->prepare("UPDATE anket SET oysayisibir=oysayisibir+1, toplamoysayisi=toplamoysayisi+1");
        $Guncelle->execute();
    }elseif($GelenCevapDegeri == 2){
        $Guncelle   =   $VeriTabaniBaglantisi->prepare("UPDATE anket SET oysayisiiki=oysayisiiki+1, toplamoysayisi=toplamoysayisi+1");
        $Guncelle->execute();
    }elseif($GelenCevapDegeri == 3){
        $Guncelle   =   $VeriTabaniBaglantisi->prepare("UPDATE anket SET oysayisiuc=oysayisiuc+1, toplamoysayisi=toplamoysayisi+1");
        $Guncelle->execute();
    }else{
        echo "Böyle bir oy bulunmuyor!";
        header("Location:index.php");
        exit();
    }

    $Ekle   =   $VeriTabaniBaglantisi->prepare("INSERT INTO oykullananlar (ipadresi, tarih) VALUES (?,?)");
    $Ekle->execute([$IPAdresi, $ZamanDamgasi]);
    $EkleKontrol    =   $Ekle->rowCount();

    if($EkleKontrol>0){
        echo "TEBRİKLER OYUNUZ SİSTEME BAŞARIYLA KAYDEDİLDİ <br />";
        echo "Ana sayfaya dönmek için <a href='index.php' style='text-decoration: none; color: black;'>bana bas<a/> <br />";
        echo "Sonuçları görüntülemek için <a href='sonuc.php' style='text-decoration: none; color: black;'>bana bas<a/>";

    }else{
        echo "İşlem sırasında beklenmeyen bir hata oluştu..:( <br />";
        echo "Ana sayfaya dönmek için <a href='index.php' style='text-decoration: none; color: black;'>bana bas<a/>";
    }
}
?>

