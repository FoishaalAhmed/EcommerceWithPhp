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
<style>
    .leftside{float: left;width: 70%;}
    .rightside{float: left;width: 20%;}
    .rightside img{width: 170px; height: 160px}
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Site Title and Description</h2>
        <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $updateTitle = $other->titleUpdate($_POST);
            }
        ?>

        <?php 
            if (isset($updateTitle)) {
                echo $updateTitle;
            }
        ?>
        
        <?php
            $titleslogan = $other->selectTitleSlogan();
            if ($titleslogan) {
                while ($result = $titleslogan->fetch_assoc()) {
        ?>
        <div class="block sloginblock"> 
        <div class="leftside">              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">					
                <tr>
                    <td>
                        <label>Website Title</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result ['title']; ?>"  name="title" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Website Slogan</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result ['slogan']; ?>" name="slogan" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Upload Logo</label>
                    </td>
                    <td>
                        <input type="file"  name="logo" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            </div>
            <div class="rightside">
                <img src="<?php echo $result ['logo']; ?>" alt="">
            </div>
        </div>
        <?php } } ?>
    </div>
</div>
<?php include'inc/footer.php'; ?>