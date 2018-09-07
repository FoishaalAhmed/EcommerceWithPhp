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

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Copyright Text</h2>
        <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $updateCopy = $other->updateCopyright($_POST);
            }
        ?>
         <?php 
            if (isset($updateCopy)) {
                echo $updateCopy;
            }
        ?>
        
        <div class="block copyblock"> 
        <?php
            $selectCopy = $other->selectCopyright();
            if ($selectCopy) {
                while ($result = $selectCopy->fetch_assoc()) {
        ?>    
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" value="<?php echo $result['text']; ?>" name="text" class="large" />
                    </td>
                </tr>
				
				 <tr> 
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
<?php include'inc/footer.php'; ?>
