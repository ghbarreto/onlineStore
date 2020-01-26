$(document).ready(function(){
    $('#messages').load('show.php');
    var refresh = setInterval(function(){
        $('#messages').load('show.php');
    },500);
        $.ajaxSetup({
            cache:false
        });
});
function chat(){
    var url;
    url = 'show.php';
    jQuery.get(url, function(data){
        $('#messages').empty().append(data);
    });
}

function send(){
    var url;
    var message;
    var sending;
    url = "send.php";
    message = $('#message').val();
    $('#message').on('keyup', function(e){
        if(e.which == 13){
            var m = $(this).val();
            m = message.trim();
            if(m.length >= 1){
                $(this).val('');
                sending = $.post(url, {message:message});
                sending.done(function(){
                    message = '';
                    $('#messages').animate({scrollTop: 9999}, 100);
                    chat();
                })
            }
        }
    });
}