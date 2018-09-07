<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>
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
    if (!isset($_GET['editsliderid']) || $_GET['editsliderid'] == NULL) {
        echo "<script>window.location = 'sliderlist.php'; </script>";     
    } else {
        $sliderid = $_GET['editsliderid'];
    }  
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Post</h2>
        <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $editSlider = $other->editSliderImage($_POST, $sliderid);
            }
        ?>
        <div class="block"> 
        <?php 
                    
            $sliderImage = $other->selectSliderImageById($sliderid);
            if ($sliderImage) {
                while ($result = $sliderImage->fetch_assoc()) {
        ?>             
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               <tr>
                    <td>
                        <label>Link</label>
                    </td>
                    <td>
                        <input type="text" name="link" value="<?php echo $result ['link']; ?>" class="medium" />
                    </td>
                </tr>
             
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $result ['image']; ?>" height="80px" width="100px"><br/>
                        <input type="file"  name="image" />
                    </td>
                </tr>
                
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php } } ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include'inc/footer.php'; ?> 
