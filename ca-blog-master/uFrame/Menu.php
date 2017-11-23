<?php

namespace uFrame;

class Menu
{


    public static function show()
    {
        $log = new Log();
        $db = new Database($log);
        $menuList = $db->select("SELECT * FROM pages");

        // if session username is set  - show it
        if (isset($_SESSION['username'])) {
            echo '
            <li class="nav-item">
                    <a class="nav-link">Logged in as ' . $_SESSION['username'] . '</a>
                </li>';
        }
        // if session level is >= 2 create menu item to reach ADMIN PANEL
        if (isset($_SESSION['level']) && $_SESSION['level'] >= 2) {
            echo '
            <li class="nav-item">
                    <a class="nav-link" href="/' . CONFIG['site_path'] . '/Admin/">Admin Panel</a>
                </li>';
        }
        foreach ($menuList as $menu) {
            //if menu item is page
            if ($menu['isPage'] == 1) {
                echo '
            <li class="nav-item">
                    <a class="nav-link" href="/' . CONFIG['site_path'] . '/show/' . $menu['id'] . '">' . $menu['title'] . '</a>
                </li>';
                // for menu items LOGIN and REGISTER , if !isset session
            } elseif ($menu['isPage'] == 2 && !isset($_SESSION['username'])) {
                echo '
            <li class="nav-item">
                    <a class="nav-link" href="/' . CONFIG['site_path'] . '/' . $menu['body'] . '/index">' . $menu['title'] . '</a>
                </li>';
                // if session is set we show LOG OUT menu item
            } elseif ($menu['isPage'] == 3 && isset($_SESSION['username'])) {
                echo '
            <li class="nav-item">
                    <a class="nav-link" href="/' . CONFIG['site_path'] . '/' . $menu['body'] . '/index">' . $menu['title'] . '</a>
                </li>';
                // show blog
            } elseif ($menu['isPage'] == 0) {
                echo '
            <li class="nav-item">
                    <a class="nav-link" href="/' . CONFIG['site_path'] . '/' . $menu['body'] . '/index">' . $menu['title'] . '</a>
                </li>';
            }

        }

    }

    public static function show_admin_manu()
    {
        $log = new Log();
        $db = new Database($log);
        $menuList = $db->select("SELECT * FROM admin_menu");

        // show username in admin panel
        if (isset($_SESSION['username'])) {
            echo '
            <li class="nav-item">
                    <a class="nav-link">Logged in as ' . $_SESSION['username'] . '</a>
                </li>';
        }
        foreach ($menuList as $menu) {
            // create back home item
            if ($menu['slug'] == "home") {
                echo '
            <li class="nav-item">
                    <a class="nav-link" href="/' . CONFIG['site_path'] . '">' . $menu['title'] . '</a>
                </li>';
                // create admin menu items
            } else {
                echo '
            <li class="nav-item">
                    <a class="nav-link" href="/' . CONFIG['site_path'] . '/Admin/' . $menu['slug'] . '">' . $menu['title'] . '</a>
                </li>';
            }


        }

    }


}