<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 17.09.2017
 * Time: 21:47
 */
?>

<style>
    .ui-textfield{
        font: inherit;
        color: inherit;
        background: none;
        text-align: inherit;
        outline: none;
        cursor: text;
    }
</style>

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
    <div class="block-title">JS Библиотеки</div>
    <div class="block-content">
        <table class="table-full">
        <?php
            if(isset($libs)){
                foreach ($libs as $lib){
                    $name = ucfirst(str_replace('_', ' ', $lib['name']));

                    echo "<tr>";
                    echo "<td class='lib-string-style'>";
                        echo "<a href='/libs/".$lib['type']."/".$lib['name']."'>";
                            echo $name;
                        echo "</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
        ?>
        </table>
    </div>
</div>
