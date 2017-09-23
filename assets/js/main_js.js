/**
 * Created by Andrey on 12.09.2017.
 */

$(document).ready( function() {
    $(".input-file").change(function(){
        var filename = $(this).val().replace(/.*\\/, "");
        $(this).parent().parent().find(".input-file-name").html(filename);
        this.dispatchEvent(new Event('changeFile'));
    });

    $('.input-file-clear').on('click', function () {
        var input = $(this).parent().find('.input-file');
        var fileName = input.val();

        if(fileName) { // returns true if the string is not empty
            input.val('');
            $(this).parent().find('.input-file-name').html("Файл не выбран");
            input[0].dispatchEvent(new Event('changeFile'));
        }
    });
});










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
    };

    $.fn.textBox = function (corners) {
        var $this = $(this);

        if(corners == null){
            $this.addClass('ui-corner-all');
        }else{
            corners.forEach(function (p1, p2, p3) {
                if(p1 == 'tl')
                    $this.addClass('ui-corner-tl');
                else if(p1 == 'bl')
                    $this.addClass('ui-corner-bl');
                else if(p1 == 'tr')
                    $this.addClass('ui-corner-tr');
                else if(p1 == 'br')
                    $this.addClass('ui-corner-br');

            });
        }
        return $(this).addClass("ui-widget ui-widget-content input-text-std");
    };
})(jQuery);