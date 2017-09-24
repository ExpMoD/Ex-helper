<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 12.09.2017
 * Time: 13:04
 */

function GetIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


?>

<div class="block">
    <ul class="menu">
        <?php
            if(GetIP() == '127.0.0.1' or GetIP() == '109.195.3.137'){
                echo '<li><a href="/libs/add">Добавить</a></li>';
            }
        ?>
        <li><a href="/libs/generation">Генерация</a></li>
    </ul>
</div>
