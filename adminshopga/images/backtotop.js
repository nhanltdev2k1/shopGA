// JavaScript Document
$(document).ready(function() {
            $('#warpper').append('<div id="top">Back to Top</div>');
           $(window).scroll(function() {
            if($(window).scrollTop() != 0) {
                $('#top').fadeIn();
            } else {
                $('#top').fadeOut();
            }
           });
           $('#top').click(function() {
            $('html, body').animate({scrollTop:0},500);
           });
        });