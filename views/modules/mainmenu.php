<?php
$category = loadModel('category');
$listcat1 = $category->category_parentid(0);

foreach ($listcat1 as $c1) {
    $listcat2 = $category->category_parentid($c1['category_id']);
    if (count($listcat2)) {
        echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="index.php?option=product&cat='.$c1['category_slug'].'"><i class="'.$c1['category_icon'].'"></i> '.$c1['category_name'].' <span class="caret"></span></a>';
        echo '<ul class="dropdown-menu">';
        foreach ($listcat2 as $c2) {
            $listcat3 = $category->category_parentid($c2['category_id']);
            if (count($listcat3)) {
                echo '<li><a href="index.php?option=product&cat='.$c2['category_slug'].'">'.$c2['category_name'].'</a>';
                echo '<ul class="dropdown-menu">';
                foreach ($listcat3 as $c3) {
                    echo '<li><a href="index.php?option=product&cat='.$c3['category_slug'].'">'.$c3['category_name'].'</a></li>';
                }
                echo '</ul>';
                echo '</li>';
            } else {
                echo '<li><a href="index.php?option=product&cat='.$c2['category_slug'].'">'.$c2['category_name'].'</a></li>';
            }
        }
        echo '</ul>';
        echo '</li>';
    } else {
        echo '<li><a href="index.php?option=product&cat='.$c1['category_slug'].'">'.$c1['category_name'].'</a></li>';
    }
}
?>
