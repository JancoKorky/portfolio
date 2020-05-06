$(document).ready(function () {
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });

    $( ".card" ).hover(
        function() {
            $(this).addClass('shadow');
        }, function() {
            $(this).removeClass('shadow');
        }
    );

});
