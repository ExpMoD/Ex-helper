<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 23.09.2017
 * Time: 16:32
 */
?>

<div class="block">
    <div class="block-content" style="margin-top: 10px;">
        <form action="<?php echo base_url().$search_path;?>" method="get">
            <div class="control-group">
                <input id="search-input" type="text" style="width: 85%;"><input id="search-btn" style="margin-top: -1px;" type="submit" class="ui-corner-tr ui-corner-br" value="Поиск">
            </div>
        </form>
        <script>
            $('#search-input').textBox(['tl', 'bl']);
            $('#search-btn').button().removeClass('ui-corner-all');
        </script>
    </div>
</div>
