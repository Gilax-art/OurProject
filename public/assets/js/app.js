particlesJS.load('particles-js', 'assets/js/config.json', function() {});

$(document).ready(function(){
    $.mask.definitions["9"] = false;
    $.mask.definitions["5"] = "[0-9]";
    $("input[type=tel]")
        .mask("7(955) 555-5555")
        .on("click", function () {
        $(this).trigger("focus");
    });
});

$('.main_body_info_sliders-item--btn').on('click', function(){
    if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).next().slideDown(300);
    }else{
        $(this).removeClass('active');
        $(this).next().slideUp(300);
    }
});

$('.main_body_info_sliders-item_list--item--btn').on('click', function(){
    if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).next().slideDown(300);
    }else{
        $(this).removeClass('active');
        $(this).next().slideUp(300);
    }
});

$('.main_contacts--link, .main_head_content_info--link').on('click', function(){
    $('.popup-back').fadeIn(300);
    $('.popup-wrapper').addClass('active');
});

$('.popup--close, .popup-back').on('click', function(){
    $('.popup-back').fadeOut(300);
    $('.popup-wrapper').removeClass('active');
});