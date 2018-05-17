$(document).ready(function() {
    $("#recipient-phone").mask("+7 (999) 999-99-99");
    $("#send").click(function() {
        send();
    });
    function send (){
        $('#exampleModal').modal('hide');
        post = $.post( "send.php",{
            "name": $("#recipient-name").val(),
            "phone": $("#recipient-phone").val(),
            "message": $("#message-text").val()
        }).done(function( data ) {
            $('#exampleModalLabel').text(data);
            $('#pop-up').modal('show');
        }).fail(function( data ) {
            $('#exampleModalLabel').text(data);
            $('#pop-up').modal('show');
        });
    }
});
