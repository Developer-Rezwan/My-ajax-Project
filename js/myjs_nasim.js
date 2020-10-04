$(document).ready(function() {
    insert_data();
});

//Data insert by ajax in database
function insert_data() {
    $('#submit').on('click', function() {
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();

        if (username == "" || email == "" || password == "") {
            $('#msg').html('Please fill in the all field!');
        } else {
            $.ajax({
                url: 'insert_data.php',
                method: 'post',
                data: { Username: username, Email: email, Password: password },
                success: function(data) {
                    $('#msg').html(data);
                    $('#exampleModal').modal('show');
                    $('form').trigger('reset');
                }
            });
        }
    });

}