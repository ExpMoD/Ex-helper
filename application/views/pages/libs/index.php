<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 12.09.2017
 * Time: 9:31
 */

?>

<style>
    .lib-string-style{
        font-size: 18px;
    }
    .lib-string-style a{
        text-decoration: none;
        color: #ee872d;
    }

    .lib-string-style a:hover{
        color: #b85c2d;
        text-decoration: underline;
    }
</style>


<div class="block">
    <div class="block-title"><a href="/libs/js">Библиотеки JS</a></div>
    <div class="block-content">
        <?php

        foreach ($libsJS as $row){
            echo '<div class="lib-string-style">';

            $name = ucfirst(str_replace('_', ' ', $row['name']));
            $version = ucfirst(str_replace('_', '.', $row['version']));

            echo '<a href="/libs/js/'.$row['name'].'">';
            echo $name.' '.$version;
            echo '<a>';

            echo '</div>';
        }

        ?>
    </div>
</div>

<div class="block">
    <div class="block-title"><a href="/libs/css">Библиотеки CSS</a></div>
    <div class="block-content">
        <?php

        foreach ($libsCSS as $row){
            echo '<div class="lib-string-style">';

            $name = ucfirst(str_replace('_', ' ', $row['name']));
            $version = ucfirst(str_replace('_', '.', $row['version']));

            echo '<a href="/libs/js/'.$row['name'].'">';
            echo $name.' '.$version;
            echo '<a>';

            echo '</div>';
        }

        ?>
    </div>
</div>
