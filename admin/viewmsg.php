<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
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
    if (isset($_GET['msgid'])) {
        $Vid = $_GET['msgid'];
        }
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        echo "<script>window.location = 'inbox.php';</script>";
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Message</h2>
        <div class="block">
        <?php 
            $viewMsg = $other->viewMessage($Vid);
            if ($viewMsg) {
                while ($result = $viewMsg->fetch_assoc()) {
        ?>               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text"  value="<?php echo $result['name']; ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text"  value="<?php echo $result['email']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>
                        <input type="text"  value="<?php echo $result['phone']; ?>" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Message</label>
                    </td>
                    <td>
                        <textarea class="tinymce"><?php echo $result['message']; ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Ok" />
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
<?php include 'inc/footer.php';?>


