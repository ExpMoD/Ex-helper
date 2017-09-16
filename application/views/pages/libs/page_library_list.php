<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 16.09.2017
 * Time: 20:55
 */
?>

<div class="block">
    <div class="block-title">Библиотека <b><?php echo $title;?></b> (Версии)</div>
    <div class="block-content">
        <table class="table-full">
            <?php
                foreach ($versions as $str){
                    echo '<tr>';
                        echo '<td>';
                            echo '<a href="http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].$str.'">';
                                echo $str;
                            echo '</a>';
                        echo '</td>';
                    echo '</tr>';
                }
            ?>
        </table>
    </div>
</div>
