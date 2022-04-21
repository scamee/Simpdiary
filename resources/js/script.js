$(function () {
    $("textarea#content").on("keyup", function () {
        var count = $(this).val().replace(/\n/g, "改行").length;
        var now_count = 500 - count;

        if (count > 500) {
            $(".show-count").css("color", "red");
        }
        $('.show-count').text("残り" + now_count + "文字");
    });
});
