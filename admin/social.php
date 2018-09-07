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
        <h2>Update Social Media</h2>
        <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $updateSocial = $other->socialUpdate($_POST);
            }
        ?>

        <?php 
            if (isset($updateSocial)) {
                echo $updateSocial;
            }
        ?>
        <div class="block">
        <?php
            $social = $other->selectSocial();
            if ($social) {
                while ($result = $social->fetch_assoc()) {
        ?>               
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="fb" value="<?php echo $result['fb']; ?>" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>
                        <input type="text" name="twtr" value="<?php echo $result['twtr']; ?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Google Plus</label>
                    </td>
                    <td>
                        <input type="text" name="gplus" value="<?php echo $result['gplus']; ?>" class="medium" />
                    </td>
                </tr>
                
                 <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" name="email" value="<?php echo $result['email']; ?>" class="medium" />
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
<?php include'inc/footer.php'; ?>