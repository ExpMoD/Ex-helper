<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 23.09.2017
 * Time: 16:27
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
    <div class="block-title">Результаты поиска: "<?php echo $query;?>"</div>
    <div class="block-content">
        <?php
            if(isset($libs)){
                if(count($libs) > 0){
                    echo "<table>";
                    foreach ($libs as $lib){
                        $name = ucfirst(str_replace('_', ' ', $lib['name']));

                        echo "<tr>";
                            echo "<td style='color: #3420ff; font-weight: bold; text-align: center; width: 50px;'>";
                            echo "(".$lib['type'].")";
                            echo "</td>";

                            echo "<td class='lib-string-style'>";
                                echo "<a href='/libs/".$lib['type']."/".$lib['name']."'>";
                                    echo $name;
                                echo "</a>";
                            echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }else{
                    echo "Не найдено совпадений";
                }
            }else{
                echo "Не найдено совпадений";
            }
        ?>
    </div>
</div>

