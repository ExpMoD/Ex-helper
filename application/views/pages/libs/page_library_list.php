<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 16.09.2017
 * Time: 20:55
 */
?>

<style>
    .version-string-style{
        font-size: 18px;
    }
    .version-string-style a{
        text-decoration: none;
        color: #ee872d;
    }

    .version-string-style a:hover{
        color: #b85c2d;
        text-decoration: underline;
    }
</style>

<div class="block">
    <?php
        if(count($versions) != 0){
            echo "<div class=\"block-title\">Библиотека <b>".$title."</b> (Версии)</div>";

            echo "<div class=\"block-content\">
                    <table class=\"table-full\">";

                foreach ($versions as $str){
                    echo '<tr>';
                        echo '<td class="version-string-style">';
                            echo '<a href="http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].'/'.$str.'">';
                                echo str_replace('_', '.', $str);
                            echo '</a>';
                        echo '</td>';
                    echo '</tr>';
                }

                echo "</table>";
            echo "</div>";
        }else{
            echo "<div class=\"block-title\"><b>Данная библиотека не найдена</b></div>";
        }
    ?>
</div>
