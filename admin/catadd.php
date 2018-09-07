<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__)); 
    include '$filepath./../../classes/Catagory.php';
?>

<?php 
    $cat = new Catagory();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catName = $_POST['catName'];
        $insertCat = $cat->InsertCatagory($catName);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
                <?php 
                    if (isset($insertCat)) {
                        echo $insertCat;
                    }
                ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>