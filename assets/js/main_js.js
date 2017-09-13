/**
 * Created by Andrey on 12.09.2017.
 */

$(document).ready( function() {
    $(".input-file").change(function(){
        var filename = $(this).val().replace(/.*\\/, "");
        $(".input-file-name").html(filename);
    });



});



name="checkThisName";
if ( isFunction(window[name]) ) alert ("I am function");

// isFunction взято со стэка
function isFunction(functionToCheck)  {
    var getType = {};
    return functionToCheck && getType.toString.call(functionToCheck) === '[object Function]';
}



function IsJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}




(function($) {

    $.fn.addOption = function (text, value) {
        return this.each(function () {
            if (this.tagName == 'SELECT') {
                var selectElement = this;

                var option = new Option(text, value);
                selectElement.add(option, null);
            }
        });
    }
})(jQuery);