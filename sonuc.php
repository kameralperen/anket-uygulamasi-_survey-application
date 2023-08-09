<?php
require_once("baglan.php");

$Sonuc                  =   $VeriTabaniBaglantisi->prepare("SELECT * FROM anket");
$Sonuc->execute();
$KayitSayisi            =   $Sonuc->rowCount();
$Kayit                  =   $Sonuc->fetch(PDO::FETCH_ASSOC);

$Birinci                =   $Kayit["oysayisibir"];
$Ikinci                 =   $Kayit["oysayisiiki"];
$Ucuncu                 =   $Kayit["oysayisiuc"];
$Toplam                 =   $Kayit["toplamoysayisi"];

$YuzdeHesaplaBir        =   ($Birinci/$Toplam)*100;
$YuzdeHesaplaBirFormat  =   number_format($YuzdeHesaplaBir, 2, "," , "");
$YuzdeHesaplaIki        =   ($Ikinci/$Toplam)*100;
$YuzdeHesaplaIkiFormat  =   number_format($YuzdeHesaplaIki, 2, "," , "");
$YuzdeHesaplaUc         =   ($Ucuncu/$Toplam)*100;
$YuzdeHesaplaUcFormat   =   number_format($YuzdeHesaplaUc, 2, "," , "");


if($KayitSayisi>0){
?>
        <table width=500 align=center border=0 cellpadding=0 cellspacing=0>
            <tr height=30>
                <td colspan=2><?php echo $Kayit["soru"]; ?></td>
            </tr>
            <tr height=30>
                <td width=25>% <?php echo $YuzdeHesaplaBirFormat ?></td>
                <td width=275><?php echo $Kayit["cevapbir"] ?></td>
            </tr>
            <tr height=30>
            <td width=25>% <?php echo $YuzdeHesaplaIkiFormat ?></td>
                <td width=275><?php echo $Kayit["cevapiki"] ?></td>
            </tr>
            <tr height=30>
            <td width=25>% <?php echo $YuzdeHesaplaUcFormat ?></td>
                <td width=275><?php echo $Kayit["cevapuc"] ?></td>
            </tr>
            <tr>
                <td colspan=2 align=right ><a href="index.php" style="text-decoration: none; color:blue;">Ana Sayfaya Dön</a></td>
            </tr>
<?php
    }
?>
</table>
