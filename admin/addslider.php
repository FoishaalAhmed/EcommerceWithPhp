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
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertSlider = $other->insertSliderImage($_POST);
    }
?>

<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Slider</h2>
            <?php 
            if (isset($insertSlider)) {
                echo $insertSlider;
            }
        ?>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               <tr>
                    <td>
                        <label>Link</label>
                    </td>
                    <td>
                        <input type="text" name="link" placeholder="Enter Slider Link..." class="medium" />
                    </td>
                </tr>
           
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file"  name="image" />
                    </td>
                </tr>
               
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Add" />
                    </td>
                </tr>
            </table>
            </form>
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
