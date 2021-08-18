<?php
$menu = loadModel('menu');
$listmenu1= $menu->menu_list(0);
foreach($listmenu1 as $m1) {
	$listmenu2 = $menu->menu_list($m1['menu_id']);
	if(count($listmenu2)) {
	echo '<li class="dropdown">
			<a class="dropdown-toggle" href="#" data-toggle="dropdown">
				'.$m1['menu_name'].' <span class="caret"></span>
			</a>
			<ul class="dropdown-menu">';
			foreach($listmenu2 as $m2) {
				echo '<li><a href="'.$m2['menu_link'].'">'.$m2['menu_name'].'</a></li>';
			}
	echo '</ul>
		</li>';
	} else {
		echo '<li><a href="'.$m1['menu_link'].'">'.$m1['menu_name'].'</a></li>';
	}
}
?>