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
            <table class="table-full">
                <tr>
                    <td class="left-col"><label for="library-type" class="form-label">Тип библиотеки:</label></td>
                    <td class="right-col"><label for="library-exist-name" class="form-label">Существующая библиотека:</label></td>
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
                            <option value="new">{{ Новая библиотека }}</option>
                            <option value="Jquery 2">Jquery 2</option>
                            <option value="Jquery 3">Jquery 3</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="library-name" class="form-label">Наименование:</label></td>
                    <td><label for="library-version" class="form-label">Версия:</label></td>
                </tr>
                <tr>
                    <td><input id="library-name" class="input-text-std" type="text"></td>
                    <td><input id="library-version" class="input-text-std" type="text"></td>
                </tr>
                <tr>
                    <td><label for="library-url" class="form-label">Ссылка:</label></td>
                    <td><label for="" class="form-label">Файл:</label></td>
                </tr>
                <tr>
                    <td><input id="library-url" class="input-text-std" type="text"></td>
                    <td>
                        <div class="input-file-upload">
                            <label><input id="library-file" class="input-file" type="file" name="library-file">Выберите файл</label>
                        </div>
                        <div id="library-file-name" class="input-file-name">Файл не выбран</div>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 10px;" colspan="2" align="center"><input id="library-submit" type="submit" value="Добавить"></td>
                </tr>
            </table>
        </form>
    </div>
</div>





<script>
    $('#library-type').selectmenu({
        width: 250
    });
    $('#library-exist-name').selectmenu({
        width: 250
    });
    $('#library-submit').button();



    //region ----- Form handlers -----

    $(function () {
        $('#library-type').on('selectmenuchange', function() {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            Ajax_Transmitter();
        });
        
        
        
        function Ajax_Transmitter() {
            $.ajax({
                url: '<?php echo base_url("libs/handlers/add"); ?>',
                success: function(){
                    alert('Load was performed.');
                }
            });
        }
    });

    //endregion

</script>