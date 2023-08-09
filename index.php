<?php
require_once("baglan.php");
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-language" content="tr">
<title>Başlık</title>
</head>
<body>
    <?php

    $Sorgu          =   $VeriTabaniBaglantisi->prepare("SELECT * FROM anket");
    $Sorgu->execute();
    $KayitSayisi    =   $Sorgu->rowCount();
    $Kayitlar       =   $Sorgu->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <?php
    if($KayitSayisi>0){
        foreach($Kayitlar as $Veri){
    ?>
    <form action="oyver.php" method="post">
        <table width=500 align=center border=0 cellpadding=0 cellspacing=0>
            <tr height=30>
                <td colspan=2><?php echo $Veri["soru"]; ?></td>
            </tr>
            <tr height=30>
                <td width=25><input type="radio" name="cevap" value="1"></td>
                <td width=275><?php echo $Veri["cevapbir"] ?></td>
            </tr>
            <tr height=30>
                <td width=25><input type="radio"  name="cevap" value="2"></td>
                <td width=275><?php echo $Veri["cevapiki"] ?></td>
            </tr>
            <tr height=30>
                <td width=25><input type="radio"  name="cevap" value="3"></td>
                <td width=275><?php echo $Veri["cevapuc"] ?></td>
            </tr>
            <tr>
                <td colspan=2 align=left><input type="submit" value="Oy Ver"></td>
            </tr>
            <tr>
                <td colspan=2 align=right ><a href="sonuc.php" style="text-decoration: none; color:blue;">Anket Sonuçlarını Göster</a></td>
            </tr>
        <?php
        }
        }else{
            echo "HATA! Kayıt bulunamıyor...";
        }
        ?>
        </table>
    </form>

</body>
</html>