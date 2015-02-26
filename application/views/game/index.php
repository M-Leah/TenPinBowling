<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/TenPinBowling/css/global.css">
</head>
<body id="border">


<div id="page-wrap">

    <?php
        //print_r($data['cascadingScores']);
    ?>

    <br>

    <h1>Bowling Game Screen</h1>

    <hr>

    <br>

    <table border="1">
        <tr>
            <td>Player Name</td>
            <td>Frame One</td>
            <td>Frame Two</td>
            <td>Frame Three</td>
            <td>Frame Four</td>
            <td>Frame Five</td>
            <td>Frame Six</td>
            <td>Frame Seven</td>
            <td>Frame Eight</td>
            <td>Frame Nine</td>
            <td>Frame Ten</td>
        </tr>
        <tr>

            <?php $pos = 0; ?>
            <?php foreach($data['players'] as $player): ?>
                <!-- Loop For each Player -->
                <?php echo '<td><a href="/TenPinBowling/Game/EditName/' . $player['player_name'] . '/">'. $player['player_name'] . ' </a></td>'; ?>



                <?php for($count = 0; $count < 10; $count++): ?>
                    <?php echo '<td><a href="/TenPinBowling/Game/EditFrame/' . $player['player_name'] . '/' . ($count + 1) . '">' . $data['cascadingScores'][$pos][$count] . '</td>'; ?>
                <?php endfor; ?>

                <?php echo '</tr>'; ?>
                <?php $pos++; ?>

            <?php endforeach; ?>
        </table>

    <br><hr>





</div>
</body>
</html>