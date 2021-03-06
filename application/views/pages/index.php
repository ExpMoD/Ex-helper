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
    <div class="block-title">Последние добавленные библиотеки</div>
    <div class="block-content">
        <table class="table-full">
            <?php
            if(isset($libs)){
                foreach ($libs as $lib){
                    $name = ucfirst(str_replace('_', ' ', $lib['name']));
                    $version = ucfirst(str_replace('_', '.', $lib['version']));

                    echo "<tr>";
                        echo "<td class='lib-string-style'>";
                        echo "<a href='/libs/".$lib['type']."/".$lib['name']."'>";
                        echo $name;
                        echo "</a>";
                        echo "</td>";

                        echo "<td class='lib-string-style'>";
                        echo "<a href='/libs/".$lib['type']."/".$lib['name']."'>";
                        echo $version;
                        echo "</a>";
                        echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
</div>