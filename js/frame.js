/**
 * Created by Mikey on 24/02/2015.
 */


$( document ).ready(function() {

    $('#second_segment').hide();
    $('#submit').hide();

    document.getElementById('options').onchange = function () {

        var amount = $('#options').val();

        switch (amount) {
           case "10":
               $('#second_segment').hide();
               $('#submit').show();
               break;
           default:
               $('#second_segment').show();
               $('#submit').show();
               break;

       }


    }



});

