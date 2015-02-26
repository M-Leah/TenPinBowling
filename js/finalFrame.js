/**
 * Created by Mikey on 24/02/2015.
 */


$( document ).ready(function() {

    $('#second_segment').hide();
    $('#third_segment').hide();
    $('#submit').hide();

    document.getElementById('options').onchange = function () {

        var amount = $('#options').val();

        switch (amount) {
            case "10":
                $('#second_segment').show();
                $('#third_segment').show();
                $('#submit').show();
                break;
            default:
                $('#second_segment').show();
                $('#third_segment').hide();
                $('#submit').show();
                break;
        }
    }

    document.getElementById('optionsTwo').onchange = function () {
        var combinedAmount = parseInt($('#options').val()) + parseInt($('#optionsTwo').val());

        if (combinedAmount == 10) {
            $('#third_segment').show();
        }


    }



});

/**
 * Created by Mikey on 26/02/2015.
 */
