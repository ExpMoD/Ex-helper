/**
 * Created by Andrey on 12.09.2017.
 */

$(document).ready( function() {
    $(".input-file").change(function(){
        var filename = $(this).val().replace(/.*\\/, "");
        $(".input-file-name").html(filename);
    });



});