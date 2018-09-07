<?php 
    $filepath = realpath(dirname(__FILE__)); 
    include '$filepath./../../classes/Other.php';
?>
<?php 
    $filepath = realpath(dirname(__FILE__)); 
    include_once '$filepath./../../config/config.php';
    include_once '$filepath./../../lib/Database.php';
    include_once '$filepath./../../helpers/Format.php';
?>
<?php 
    $db = new Database();
    $format = new Format();
    $other = new Other();
?>

 <?php 
    if (!isset($_GET['deletsliderid']) || $_GET['deletsliderid'] == NULL) {
        echo "<script>window.location = 'sliderlist.php'; </script>";     
    } else {
        $sliderid = $_GET['deletsliderid'];
        $deleteSlider = $other->deleteSliderImage($sliderid);
    }  
?>