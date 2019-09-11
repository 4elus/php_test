$(".tbl").hide();
$(".tbl").show(1000);
$(".bg_red").css("background-color","red");

$('.tbl > tbody > tr > td').click(function () {
    $(this).append("+").parents('.tbl').children('tbody').find('> tr > td.active').not(this).removeClass('active');
});

$('.tbl tbody tr td').on('dblclick', function(){
    var row = $(this).closest('tr').html();
    $('.tbl tbody').append('<tr>'+row+'</tr>');
});


