<?php
if(!isset($logo_link)){
    $logo_link = 'index.php';
    $img = 'logo-color.png';
}else{
    $img = 'logo-color.png';
}
?>
<h2 class="slim-logo"><a href="<?php echo $logo_link;?>"><img style="height: 25px; width:auto;" class="logo_light" src="../img/<?php echo $img;?>" alt="" /></a></h2>