$(document).ready(function () {
    $("#arrows").on("click", () => { 
        $("#arrows").toggleClass("change"); // menu X
        $("#single-nav").toggleClass("open"); // menu open
    });
    $(this).scrollTop(0); // starts at the top of the page

    $('#messages').load('../php/show.php');
    $("#post").submit(function(){
        return false;
    });

$(function() {
    $('.button')
        .on('mouseenter', function(e) {
            var offSet = $(this).offset(), // button animation
                x = e.pageX - offSet.left,
                y = e.pageY - offSet.top;
            $(this).find('span').css({top:y, left:x})
        })
        .on('mouseout', function(e) {
            var offSet = $(this).offset(),
                x = e.pageX - offSet.left,
                y = e.pageY - offSet.top;
            $(this).find('span').css({top:y, left:x})
        });
    
    });
});

