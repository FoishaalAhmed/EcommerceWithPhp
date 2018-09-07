<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__)); 
    include '$filepath./../../classes/Catagory.php';
?>

<?php 
	$cat = new Catagory();
    if (isset($_GET['delcat'])) {
    	$catdel = $_GET['delcat'];
    	$deleteCat = $cat->deleteCatagory($catdel);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block"> 
                <?php 
                    if (isset($deleteCat)) {
                        echo $deleteCat;
                    }
                ?>       
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$getcat = $cat->getAllCatagory();
						if ($getcat) {
							$i = 0;
							while ($value = $getcat->fetch_assoc()) {
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $value['catName']; ?></td>
							<td><a href="catedit.php?editcat=<?php echo $value['catId']; ?>">Edit</a> || <a onclick="return confirm('Are you sure To Delete It?')" href="?delcat=<?php echo $value['catId']; ?>">Delete</a></td>
						</tr>
					<?php } } ?>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

