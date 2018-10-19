$(function(){
    $('.country-select__link').click(function(){
        $(this).siblings('.country-select__dropdown').stop().toggleClass('country-select__dropdown--open');
    });

    $('.dash__nav-link').click(function(){     
        $(this).siblings('.dash__sub-nav').stop().slideToggle();
    });
});