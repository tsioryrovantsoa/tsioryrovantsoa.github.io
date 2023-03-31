$(function(){
    $('#autre-projet').hide('fast');

    $('#voir-plus').click(function(){
        $('#autre-projet').show("slow");
        $('#voir-plus').hide('fast');
    });

    $('[data-toggle="tooltip"]').tooltip();
});

$('#contact-form').submit(function(e) {
    e.preventDefault();
    $('.comments').empty();
    console.log('submit');
    var postdata = $('#contact-form').serialize();
    
    $.ajax({
        type: 'POST',
        url: 'contact.php',
        data: postdata,
        dataType: 'json',
        success: function(json) {
             
            if(json.isSuccess) 
            {
                $('#contact-count').append("<div class='alert alert-success alert-dismissible alert-custom fade show' role='alert'><strong>"+json.name+" !</strong> Votre message a bien été envoyé. Merci de m'avoir contacté.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                $('#contact-form')[0].reset();
                $('#contact-form').hide('fast');
            }
            else
            {
                $('#name + .comments').html(json.nameError);
                $('#email + .comments').html(json.emailError);
                $('#message + .comments').html(json.messageError);
            }                
        }
    });
});


$('#myTab a').on('click', function (e) {
    e.preventDefault()
    $(this).tab('show');
});