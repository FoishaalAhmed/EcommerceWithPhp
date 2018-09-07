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
	if (isset($_GET['seenid'])) {
		$id = $_GET['seenid'];
		$seenMsg = $other->seenMessage($id);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Inbox</h2>
        <?php 
        if (isset($seenMsg)) {
        	echo $seenMsg;
        }
        ?>
        <div class="block">        
            <table class="data display datatable">
				<thead>
					<tr>
						<th width="10%">Serial No.</th>
						<th width="10%">Name</th>
						<th width="15%">Email</th>
						<th width="15%">Phone</th>
						<th width="20%">Message</th>
						<th width="15%">Date</th>
						<th width="15%">Action</th>
					</tr>
				</thead>
			<tbody>
			<?php 
				$getMsg = $other->getMessage();
				if ($getMsg) {
					$i = 0;
					while ($value = $getMsg->fetch_assoc()) {
						$i++;
			?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $value['name']; ?></td>
					<td><?php echo $value['email']; ?></td>
					<td><?php echo $value['phone']; ?></td>
					<td><?php echo $format->textShort($value['message'], 30); ?></td>
					<td><?php echo $format->formatDate($value['date']); ?></td>
					<td>
						<a href="viewmsg.php?msgid=<?php echo $value['id']; ?>">View</a> 
						|| <a onclick = "return confirm('Are You Sure to Send It to Seen??');" href="?seenid=<?php echo $value['id']; ?>">Seen</a>
						|| <a href="replymsg.php?msgid=<?php echo $value['id']; ?>">Reply</a>
					</td>
				</tr>
			<?php } } ?>
				
			</tbody>
		</table>
       </div>
    </div>
</div>
<?php 
	if (isset($_GET['unseenid'])) {
		$id = $_GET['unseenid'];
		$unSeenMsg = $other->unseenMessage($id);
	}
?>
<?php 
	if (isset($_GET['delmsgid'])) {
		$id = $_GET['delmsgid'];
		$deleteMsg = $other->deleteMessage($id);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Seen Box</h2>
        <?php 
            if (isset($unSeenMsg)) {
            	echo $unSeenMsg;
            }
        ?>
        <?php 
            if (isset($deleteMsg)) {
            	echo $deleteMsg;
            }
        ?>
        <div class="block">        
            <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th width="5%">No.</th>
						<th width="10%">Name</th>
						<th width="15%">Email</th>
						<th width="15%">Phone</th>
						<th width="20%">Message</th>
						<th width="15%">Date</th>
						<th width="20%">Action</th>
					</tr>
				</thead>
			<tbody>
			<?php 
				$getSeenMsg = $other->getSeenMessage();
				if ($getSeenMsg) {
					$i = 0;
					while ($value = $getSeenMsg->fetch_assoc()) {
						$i++;
			?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $value['name']; ?></td>
					<td><?php echo $value['email']; ?></td>
					<td><?php echo $value['phone']; ?></td>
					<td><?php echo $format->textShort($value['message'], 30); ?></td>
					<td><?php echo $format->formatDate($value['date']); ?></td>
					<td>
						<a href="viewmsg.php?msgid=<?php echo $value['id']; ?>">View</a> 
						|| <a onclick = "return confirm('Are You Sure to Unseen It??');" href="?unseenid=<?php echo $value['id']; ?>">Unseen</a>
						|| <a onclick = "return confirm('Are You Sure to Delete It??');" href="?delmsgid=<?php echo $value['id']; ?>">Delete</a>
					</td>
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
