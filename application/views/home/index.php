<!DOCTYPE html>
<html>
    <head>
        <title>Ten Pin Bowling Game</title>
        <meta charset="utf-8">
        <meta name="description" content="A ten pin bowling game for a technical assessment.">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="/TenPinBowling/js/players.js"></script>

        <link rel="stylesheet" href="/TenPinBowling/css/global.css">
    </head>

    <body id="border">

        <div id="page-wrap">

            <h1 class="main_title">Ten Pin Bowling Game</h1>

            <?= $data['error'] ?>


                <select name="amount" id="options">
                    <option value="">Please choose the amount of Players</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option>
                    <option value="5">Five</option>
                    <option value="6">Six</option>
                </select>

            <form action="" method="post">
                <div class="inputs form-group">
                    <input type="text" name="P1" id="text1" class="gap input_box" placeholder="Enter a name...">
                    <input type="text" name="P2" id="text2" class="gap input_box" placeholder="Enter a name...">
                    <input type="text" name="P3" id="text3" class="gap input_box" placeholder="Enter a name...">
                    <input type="text" name="P4" id="text4" class="gap input_box" placeholder="Enter a name...">
                    <input type="text" name="P5" id="text5" class="gap input_box" placeholder="Enter a name...">
                    <input type="text" name="P6" id="text6" class="gap input_box" placeholder="Enter a name...">
                </div>

                <input type="submit" id="submit" value="Load Game">


            </form>

        </div>



    </body>

</html>