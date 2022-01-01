jQuery( document ).ready(function($) {

    $(document).on('click', '.lovely-user-id', function(event) {
        event.preventDefault();
    
        let id = $(this).parent().parent().attr('data-user-id');

        var data = {
            action: 'get_user_info',
            nonce: inpsyde_frontend.nonce,
            id: id,
        };

        $.post(inpsyde_frontend.ajaxurl, data, function( response ) {
            $('#user_details').html(response);
            $('.users_list').hide();
        });
    });

    $(document).on('click', '#back_to_user_list', function(event) {   
        event.preventDefault();

        $('.users_list').show();

        $('#user_details').empty();
    });

});