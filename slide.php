    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="main__body_container_img grid wide mt-4">
    <div class="app__main_intro_slider_image">

        <img src="https://humg.edu.vn/content/tintuc/PublishingImages/ipe-%20v.2.png" alt="" id="app__main_intro_slider">
        <img src="https://humg.edu.vn/content/tintuc/PublishingImages/fix11.jpg" alt="" id="app__main_intro_slider">
        <img src="https://humg.edu.vn/content/tintuc/PublishingImages/Banner%20Hoi%20nghi/2022/ict%202022.jpg" alt="" id="app__main_intro_slider">
        <img src="https://humg.edu.vn/content/tintuc/PublishingImages/Banner%20Hoi%20nghi/2021/pano%20chay%20web%20truong.jpg" alt="" id="app__main_intro_slider">
        <img src="https://humg.edu.vn/content/tintuc/PublishingImages/SuKien/2022/emma6.jpg" alt="" id="app__main_intro_slider">
        <img src="https://humg.edu.vn/content/tintuc/PublishingImages/banner%20paxt%20th%E1%BB%A9%205.jpg" alt="" id="app__main_intro_slider">

    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $('.app__main_intro_slider_image').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        speed: 2000,
        autoplay: true,
        autoplaySpeed: 2000,
    });

    var filtered = false;

    $('.js-filter').on('click', function() {
        if (filtered === false) {
            $('.app__main_intro_slider_image').slick('slickFilter', ':even');
            $(this).text('Unfilter Slides');
            filtered = true;
        } else {
            $('.app__main_intro_slider_image').slick('slickUnfilter');
            $(this).text('Filter Slides');
            filtered = false;
        }
    });
</script>