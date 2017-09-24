<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 24.09.2017
 * Time: 11:35
 */
?>

<style>
    .div-checkbox{
        margin-right: 5px;
        margin-bottom: 5px;
        display: inline-block;
    }

    .div-selected-lib{
        display: inline-block;
        border: 1px solid #ccc;
        padding: 5px 10px;
        border-radius: 3px;
        margin-right: 5px;
        margin-bottom: 5px;
    }
</style>

<script>
    var selectedLibs = [];
</script>


<div id="selectedLibs" class="block" style="display: none;">
    <div class="block-title">Выбранные библиотеки</div>
    <div class="block-content">
        <div class="libs"></div>
        <div class="button" style="text-align: center;">
            <form id="generateSubmit" action="<?php echo $generate_path; ?>" method="post">
                <input id="btnGenCode" name="generateCode" value="Генерировать код" type="submit">
            </form>
        </div>
    </div>
</div>

<div id="pasteCode" class="block" style="display: none;">
    <div class="block-title">Код для вставки</div>
    <div class="block-content"><textarea id="pasteCode-textarea" rows="5" style="width: 95.5%; resize: none;"></textarea></div>
</div>


<div class="block">
    <div class="block-content" style="margin-top: 10px;">
        <form id="search-libs" action="<?php echo $search_path;?>" method="post">
            <div class="control-group">
                <input id="search-input" name="text" type="text" style="width: 95.5%;"><input id="search-btn" style="margin-top: -1px; display: none;" type="submit" class="ui-corner-tr ui-corner-br" value="Поиск">
            </div>
        </form>
        <script>
            $(function () {
                $('#search-input').textBox();
                $('#search-btn').button().removeClass('ui-corner-all');
            });
        </script>

        <div id="searched-libs" style="margin-top: 10px;">
            <?php
                if(isset($libs)){
                    foreach ($libs as $lib){
                        $name = ucfirst(str_replace('_', ' ', $lib['name']));

                        echo "<div class='div-checkbox'>";
                            echo "<label for=\"".$lib['name']."\">".$name."</label><input id=\"".$lib['name']."\" name='".$lib['name']."' typeLib='".$lib['type']."' type=\"checkbox\">";
                        echo "</div>";
                    }
                }
            ?>
        </div>

        <script>
            function find(arr, value) {
                for (var i = 0; i < arr.length; i++)
                    if (arr[i][0] == value)
                        return i;
            }


            function select_lib() {
                if(selectedLibs.length > 0){
                    $('#selectedLibs').css({'display':'block'});

                    var htmlCode = '';
                    selectedLibs.forEach(function (p1, p2, p3) {
                        var name = p1[0].charAt(0).toUpperCase() + p1[0].substr(1).replace('_', ' ');

                        htmlCode += '<div class="div-selected-lib">' + name + '</div>';
                    });
                    $('#selectedLibs>.block-content>.libs').html(htmlCode);
                }else{
                    $('#selectedLibs').css({'display':'none'});
                }
            }


            function refresh_checkboxs() {
                $('input[type="checkbox"]').checkboxradio();

                $('input[type="checkbox"]').change(function () {
                    if($(this).is(':checked')){
                        selectedLibs.push([$(this).attr('name'), $(this).attr('typelib')]);
                    }else{
                        var index = find(selectedLibs, $(this).attr('name'));
                        //selectedLibs.indexOf($(this).attr('name'))
                        if(index > -1){
                            selectedLibs.splice(index, 1);
                        }
                    }
                    select_lib();
                });
            }

            $(function () {
                $('#pasteCode-textarea').textBox();

                $('#btnGenCode').button();

                $('#generateSubmit').ajaxForm({data: {selectedLibs: selectedLibs}, success: function (e) {
                    $('#pasteCode').css({"display": "block"});
                    $('#pasteCode textarea').val(e);
                }});


                refresh_checkboxs();
                
                function generate_checkbox(name, type, checked) {
                    var retVal = "";

                    retVal += "<div class='div-checkbox'>";

                    retVal += "<label for='"+name+"'>"+name+"</label>";
                    retVal += "<input id='"+name+"' name='"+name+"' typeLib='"+type+"' type='checkbox' "+((checked)?"checked":"")+">";

                    retVal += "</div>";

                    return retVal;
                }
                

                $('#search-libs').ajaxForm(function (e) {
                    var json = JSON.parse(e);

                    if(json.length > 0){
                        var htmlCode = '';
                        json.forEach(function (p1, p2, p3) {
                            htmlCode += generate_checkbox(p1.name, p1.type, ((selectedLibs.indexOf(p1.name) == -1)?false:true));
                        });
                        $('#searched-libs').html(htmlCode);
                        refresh_checkboxs();
                    }
                });
            });
        </script>

    </div>
</div>
