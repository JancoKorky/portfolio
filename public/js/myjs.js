$(document).ready(function () {
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });

    $(".card-shadow").hover(
        function () {
            $(this).addClass('shadow');
        }, function () {
            $(this).removeClass('shadow');
        }
    );
    $('.select-this').select();
});
