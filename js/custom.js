$(function(){
    $('#autre-projet').hide('fast');

    $('#voir-plus').click(function(){
        $('#autre-projet').show("slow");
        $('#voir-plus').hide('fast');
    });
    $('[data-toggle="tooltip"]').tooltip();
})