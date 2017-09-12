<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 12.09.2017
 * Time: 14:20
 */

?>

<div class="block">
    <div class="block-title">Добавление</div>
    <div class="block-content">
        <form method="post" action="">
            <table>
                <tr>
                    <td><label for="library-type" class="form-label">Тип библиотеки:</label></td>
                    <td><label for="library-exist-name" class="form-label">Существующая библиотека:</label></td>
                </tr>
                <tr>
                    <td>
                        <select name="library-type" id="library-type">
                            <option value="css">CSS</option>
                            <option value="js">JS</option>
                        </select>
                    </td>
                    <td>
                        <select name="library-exist-name" id="library-exist-name">
                            <option value="Jquery 2">Jquery 2</option>
                            <option value="Jquery 3">Jquery 3</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </div>
</div>


<script>
    $('#library-type').selectmenu({
        width: 335
    });
</script>