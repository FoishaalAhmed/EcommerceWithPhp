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
        <h2>Slider List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="10%">No.</th>
					<th width="40%">Link</th>
					<th width="35%">Image</th>
					<th width="15%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					
					$sliderImage = $other->selectSliderImage();
					if ($sliderImage) {
						$i = 0;
						while ($result = $sliderImage->fetch_assoc()) {
							$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result ['link']; ?></td>
					<td><img src="<?php echo $result ['image']; ?>" height="40px" width="60px"></td>
					<td>
						<a href="editslider.php?editsliderid=<?php echo $result['id']; ?>">Edit</a> || 
						<a onclick = "return confirm('are you sure to delete??');" href="deletslider.php?deletsliderid=<?php echo $result['id']; ?>">Delete</a>
						
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
<?php include'inc/footer.php'; ?>