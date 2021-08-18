<?php
if(has_flash('mesage')) {
	$arr = get_flash('mesage');
	echo "<div class='alert alert-".$arr['type']."'>".$arr['msg']."</div>";
}
?>	