<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__)); 
    include '$filepath./../../classes/Brand.php';
?>

<?php 
	$brand = new Brand();
    if (isset($_GET['delbrand'])) {
    	$branddel = $_GET['delbrand'];
    	$deleteBrand = $brand->deleteBrand($branddel);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <div class="block"> 
                <?php 
                    if (isset($deleteBrand)) {
                        echo $deleteBrand;
                    }
                ?>       
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$getbrand = $brand->getAllBrand();
						if ($getbrand) {
							$i = 0;
							while ($value = $getbrand->fetch_assoc()) {
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $value['brandName']; ?></td>
							<td><a href="brandedit.php?editbrand=<?php echo $value['brandId']; ?>">Edit</a> || <a onclick="return confirm('Are you sure To Delete It?')" href="?delbrand=<?php echo $value['brandId']; ?>">Delete</a></td>
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

