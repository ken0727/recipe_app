// dropdown.js
$(document).ready(function () {
    $("#user-icon-dropdown").click(function (event) {
        event.stopPropagation();

        // スマートフォンの場合は中央に表示
        if ($(window).width() <= 400) {
            var windowWidth = $(window).width();
            var dropdownWidth = $("#user-dropdown-content").outerWidth();
            var leftPosition = (windowWidth - dropdownWidth) / 2;

            $("#user-dropdown-content").toggle().css({
                position: "fixed",
                top: "50%",
                left: leftPosition,
                transform: "translateY(-50%)",
                zIndex: 1000,
            });
        } else {
            // 通常のドロップダウンの表示位置を調整
            $("#user-dropdown-content").toggle().position({
                my: "right top",
                at: "right bottom",
                of: this,
                collision: "flipfit",
            });
        }
    });

    $(document).on("click", function (event) {
        if (!$(event.target).closest("#user-icon-dropdown").length) {
            $("#user-dropdown-content").hide();
        }
    });
});
