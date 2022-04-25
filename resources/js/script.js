//textarea残り文字数カウント
$(function () {
    const MAX_COUNT = 500; //最大文字数500
    $("textarea#content").on("keyup", function () {
        var count = $(this).val().replace(/\n/g, "改行").length;
        var now_count = MAX_COUNT - count;

        if (count > MAX_COUNT) {
            $(".show-count").css("color", "red");
        }
        $('.show-count').text("残り" + now_count + "文字");
    });
});

//input(#titleform)残り文字数カウント
$(function () {
    const MAX_COUNT = 20; //最大文字数500
    $("input#titleform").on("keyup", function () {
        var count = $(this).val().length;
        var now_count = MAX_COUNT - count;

        if (count > MAX_COUNT) {
            $(".show-count-title").css("color", "red");
        }
        $('.show-count-title').text("残り" + now_count + "文字");
    });
});

/* $(function () {
    $(".mood-btn").on("click", function () {
        $(".mood-btn").removeClass("mood-btn-active");
        $(this).addClass("mood-btn-active");
    })
}) */
