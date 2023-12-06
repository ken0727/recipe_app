// dropdown.js
$(document).ready(function () {
    $("#user-icon-dropdown").click(function (event) {
        event.stopPropagation();
        // ドロップダウンの表示位置を調整
        $("#user-dropdown-content").toggle().position({
            my: "right top",
            at: "right bottom",
            of: this,
            collision: "flipfit"
        });
    });

    $(document).on("click", function (event) {
        if (!$(event.target).closest("#user-icon-dropdown").length) {
            $("#user-dropdown-content").hide();
        }
    });
});

