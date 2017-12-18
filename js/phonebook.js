var numbers = "";
$(function () {
    $("#items").selectable({
        selected: function (event, ui) {
            $(".ui-selected", this).each(function () {
                var index = $("#items li").index(this);

                if (index == 9) {
                    return;
                }
                if (index == 10) {
                    index = -1;
                }

                numbers += (index + 1);
                if (index == 11) {
                    numbers = "";
                }
                $("#info").html(numbers);
            });
        }
    });
});
