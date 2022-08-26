<?php
function load_css($path)
{
    echo '<link rel="stylesheet" type="text/css" href="' . BASE_PATH . '/public/' . $path . '">';
}

function load_script($path)
{
    echo '<script src="' . BASE_PATH . '/public/' . $path . '"></script>';
}

function create_menu($link, $icon, $title)
{
    global $url;
    $class = ($link == $url) ? "active" : "";
    echo '<li class="nav-item ' . $class . '">
            <a class="nav-link" href="' . BASE_PATH . '/' . $link . '">
                <i class="fas fa-fw fa-' . $icon . '"></i>
                <span>' . $title . '</span></a>
        </li>';
}


function create_multymenu($link = array(), $icon, $title)
{
    foreach ($link as $key => $value) $data_link[] = $key;
    global $url;
    $class = (in_array($url, $data_link)) ? "active" : "";
    echo '<li class="nav-item ' . $class . '">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#' . $icon . '"
                aria-expanded="true" aria-controls="' . $icon . '">
                <i class="fas fa-fw fa-' . $icon . '"></i>
                <span>' . $title . '</span>
            </a>
            <div id="' . $icon . '" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">';
    foreach ($link as $key => $value) {
        $data_link = $key;
        $active = ($url == $data_link) ? "active" : "";
        echo '<a class="collapse-item ' . $active . '"  href="' . BASE_PATH . '/'  . $key . '">' . $value . '</a>';
    }
    echo '</div>
            </div>
        </li>';
}
