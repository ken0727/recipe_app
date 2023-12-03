// public/js/dropdown.js

$(document).ready(function () {
    $("#user-dropdown").click(function (event) {
        event.stopPropagation(); // クリックイベントが親に伝播しないようにする
        $("#user-dropdown-content").toggle();
    });

    $(document).on("click", function (event) {
        // ドロップダウン外をクリックした場合は非表示にする
        if (
            !$(event.target).closest("#user-dropdown").length &&
            !$(event.target).closest("#user-dropdown-content").length
        ) {
            $("#user-dropdown-content").hide();
        }
    });
});
