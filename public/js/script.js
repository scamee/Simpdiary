<script>
    $(document).ready(function(){
        $("#sample_img").on(function () {
            var src = $(this).children('img').attr('src');
            $("#translate-img").attr("src", src);
            return false;
        })});
</script>
