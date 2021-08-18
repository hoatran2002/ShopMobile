<?php
function loadComponent($page = true) {
    $pathView = 'views/pages/';
    if ($page == true) {
        if (!isset($_REQUEST['option'])) {
            $pathView .= 'home.php';
        } else {
            $pathView .= $_REQUEST['option'];
            if (isset($_REQUEST['id'])) {
                $pathView .= '-detail.php';
            } else {
                if (isset($_REQUEST['cat'])) {
                    $pathView .= '-category.php';
                } else {
                    $pathView .= '.php';
                }
            }
        }
    } else {
        if (isset($_REQUEST['option'])) {
            $pathView .= $_REQUEST['option'] . '/';
            if (isset($_REQUEST['cat'])) {
                $pathView .= $_REQUEST['cat'] . '.php';
            } else {
                $pathView .= 'index.php';
            }
        } else {
            $pathView .= 'dashboard/index.php';
        }
    }
    require_once($pathView);
}

function loadModel($name) {
    $name      = ucfirst(strtolower($name));
    $pathModel = 'models/' . $name . '.php';
    require_once($pathModel);
    return new $name;
}

function loadClass($name) {
    $name      = ucfirst(strtolower($name));
    $pathClass = 'system/' . $name . '.php';
    require_once($pathClass);
    return new $name;
}
?>