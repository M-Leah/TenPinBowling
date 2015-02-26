<!DOCTYPE html>
<html>
<head>
    <title>Ten Pin Bowling Game</title>
    <meta charset="utf-8">
    <meta name="description" content="A ten pin bowling game for a technical assessment.">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="/TenPinBowling/js/frame.js"></script>

    <link rel="stylesheet" href="/TenPinBowling/css/global.css">
</head>

    <body id="border">
        <div id="page-wrap">

        <form action="" method="post">

            <div id="first_segment">
                <h2>Please Select your First Score.</h2>
                <select  name="first_segment" id="options">
                    <option value="0">Zero</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option>
                    <option value="5">Five</option>
                    <option value="6">Six</option>
                    <option value="7">Seven</option>
                    <option value="8">Eight</option>
                    <option value="9">Nine</option>
                    <option value="10">Ten</option>
                </select>
            </div>

            <div id="second_segment">
                <h2>Please Select your Second Score.</h2>
                <select name="second_segment">
                    <option value="0">Zero</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option>
                    <option value="5">Five</option>
                    <option value="6">Six</option>
                    <option value="7">Seven</option>
                    <option value="8">Eight</option>
                    <option value="9">Nine</option>
                    <option value="10">Ten</option>
                </select>
            </div>

            <br><br>
            <div id="submit">
                <input type="submit" value="Save Scores">
            </div>

        </form>

        </div>
    </body>

</html>