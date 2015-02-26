/**
 * Created by Mikey on 23/02/2015.
 */


$( document ).ready(function() {

    $('#text1').hide();
    $('#text2').hide();
    $('#text3').hide();
    $('#text4').hide();
    $('#text5').hide();
    $('#text6').hide();
    $('#submit').hide();

    document.getElementById('options').onchange = function () {

        var amount = $('#options').val();

        switch(amount) {
            case "1":
                $('#text1').show();
                $('#text2').hide();
                $('#text3').hide();
                $('#text4').hide();
                $('#text5').hide();
                $('#text6').hide();
                $('#submit').show();
                break;
            case "2":
                $('#text1').show();
                $('#text2').show();
                $('#text3').hide();
                $('#text4').hide();
                $('#text5').hide();
                $('#text6').hide();
                $('#submit').show();
                break;
            case "3":
                $('#text1').show();
                $('#text2').show();
                $('#text3').show();
                $('#text4').hide();
                $('#text5').hide();
                $('#text6').hide();
                $('#submit').show();
                break;
            case "4":
                $('#text1').show();
                $('#text2').show();
                $('#text3').show();
                $('#text4').show();
                $('#text5').hide();
                $('#text6').hide();
                $('#submit').show();
                break;
            case "5":
                $('#text1').show();
                $('#text2').show();
                $('#text3').show();
                $('#text4').show();
                $('#text5').show();
                $('#text6').hide();
                $('#submit').show();
                break;
            case "6":
                $('#text1').show();
                $('#text2').show();
                $('#text3').show();
                $('#text4').show();
                $('#text5').show();
                $('#text6').show();
                $('#submit').show();
                break;
            default:
                $('#text1').hide();
                $('#text2').hide();
                $('#text3').hide();
                $('#text4').hide();
                $('#text5').hide();
                $('#text6').hide();
                $('#submit').hide();
                break;

        }

    }
});





