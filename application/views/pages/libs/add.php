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
        <form id="library-form" method="post" action="<?php echo base_url("libs/handlers/page_add_addLib"); ?>">
            <table class="table-full">
                <tr class="">
                    <td class="table-full-left-col"><label for="library-type" class="form-label">Тип библиотеки:</label></td>
                    <td class="table-full-right-col"><label for="library-exist-name" class="form-label">Существующая библиотека:</label></td>
                </tr>
                <tr>
                    <td>
                        <select name="library-type" id="library-type">
                            <option value="js">JS</option>
                            <option value="css">CSS</option>
                        </select>
                    </td>
                    <td>
                        <select name="library-exist-name" id="library-exist-name">
                            <option value="new">{{ Новая библиотека }}</option>
                        </select>
                    </td>
                </tr>
                <tr class="table-full-row">
                    <td><label for="library-name" class="form-label">Наименование:</label></td>
                    <td><label for="library-version" class="form-label">Версия:</label></td>
                </tr>
                <tr>
                    <td><input id="library-name" name="library-name" class="input-text-std" type="text"></td>
                    <td><input id="library-version" name="library-version" class="input-text-std" type="text"></td>
                </tr>
                <tr class="table-full-row">
                    <td><label for="library-url" class="form-label">Ссылка:</label></td>
                    <td><label for="library-file" class="form-label">Файл:</label></td>
                </tr>
                <tr>
                    <td><input id="library-url" name="library-url" class="input-text-std" type="text"></td>
                    <td>
                        <div class="input-file-upload">
                            <label><input id="library-file" class="input-file" type="file" name="library-file" enctype="multipart/form-data">Выберите файл</label>
                            <div id="library-file-name" class="input-file-name">Файл не выбран</div><span style="margin-left: 10px;" class="ui-icon ui-icon-closethick input-file-clear"></span>
                        </div>
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
        update_libraryType($('#library-type').children('option:selected').val());
        update_libraryExistName($('#library-exist-name').children('option:selected').val());

        $('#library-type').on('selectmenuchange', function() {
            var optionSelected = $("option:selected", this);
            var selectedValue = this.value;

            update_libraryType(selectedValue);
        });
        
        function update_libraryType(selectedValue){
            var AjaxData = {
                selectedValue: selectedValue
            };

            Ajax_Transmitter(AjaxData, 'page_add_getLibsByType', {
                success: function (returnData) {
                    if(IsJsonString(returnData)){
                        var array = JSON.parse(returnData);

                        $('#library-exist-name').children('option').not('[value="new"]').remove();

                        array.forEach(function (item, i, arr) {
                            $('#library-exist-name').addOption(item, item);
                        });

                        $('#library-exist-name').selectmenu('refresh');
                    }else{
                        alert("Ошибка в returnData #library-type selectmenuchange");
                        alert(returnData);
                    }
                },
                error: function (jqXHR, exception) {
                    alert(jqXHR);
                }
            }, {processData: true, cache: true});
        }

        
        $('#library-exist-name').on('selectmenuchange', function () {
            var optionSelected = $("option:selected", this);
            var selectedValue = this.value;
            update_libraryExistName(selectedValue);
        });
        
        function update_libraryExistName(selectedValue) {
            if(selectedValue == "new"){
                $('#library-name').prop('disabled', false).val("");
            }else{
                $('#library-name').prop('disabled', true).val(selectedValue);
            }
        }


        $('#library-url').on('input', function () {
            if($(this).val() != ""){
                $('.input-file-upload').addClass('input-file-disabled');
                $('#library-file').prop('disabled', true);
            }else{
                $('.input-file-upload').removeClass('input-file-disabled');
                $('#library-file').prop('disabled', false);
            }
        });


        $('#library-file').on('changeFile', function (e) {
            var value = $(this).val();
            if(value == '')
                $('#library-url').prop('disabled', false).val("");
            else
                $('#library-url').prop('disabled', true).val("");
        });


        $('#library-form').ajaxForm(function (e) {
            alert(e);
        });


        function Ajax_Transmitter(data, handlerName, callbacks = {}, options = {cache: false, contentType: 'application/x-www-form-urlencoded', processData: true, method: 'POST'}) {
            $.ajax({
                url: '<?php echo base_url("libs/handlers/"); ?>'+handlerName,
                type: ((options.method != undefined)?options.method:'POST'),
                cache: ((options.cache != undefined)?options.cache:false),
                contentType: ((options.contentType != undefined)?options.contentType:'application/x-www-form-urlencoded'),
                processData: ((options.processData != undefined)?options.processData:true),
                data: data,
                dataType: 'text',
                success: function(text){
                    if(isFunction(callbacks.success)){
                        callbacks.success(text);
                    }
                },
                error: function (jqXHR, exception) {
                    if(isFunction(callbacks.error)){
                        callbacks.error(jqXHR, exception)
                    }
                }
            });
        }
    });

    //endregion

</script>