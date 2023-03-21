$(function(){
    $('#autre-projet').hide('fast');

    $('#voir-plus').click(function(){
        $('#autre-projet').show("slow");
        $('#voir-plus').hide('fast');
    });
    $('[data-toggle="tooltip"]').tooltip();
})

    $('#myTab a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
});