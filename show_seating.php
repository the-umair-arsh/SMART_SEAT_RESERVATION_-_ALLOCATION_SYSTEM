<?php
$seating = json_decode(file_get_contents('data/seating.json'), true);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Seating Arrangement</title>
    <style>
        body {
            background-image: url('images/cinema.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
        }
        .container {
            width: 90%;
            max-width: 900px;
            margin: 50px auto;
            background-color: rgba(0, 0, 0, 0.85);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 12px #ff4d4d;
        }
        h2 {
            text-align: center;
            color: #ff4d4d;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        td {
            padding: 14px;
            border: 1px solid #444;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            text-align: center;
            font-weight: bold;
        }
        .empty {
            color: #ccc;
            font-style: italic;
        }
        .label-row td {
            background-color:rgb(199, 2, 2);
            color: white;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            padding: 12px;
        }
        .btn {
            padding: 10px 20px;
            background-color:rgb(197, 38, 38);
            border: none;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
        }
        .btn:hover {
            background-color: #cc0000;
        }
        .center-btn {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Seating Arrangement</h2>
    <table>
        <?php
        foreach ($seating as $index => $row) {
            if ($index === 0) {
                echo '<tr class="label-row"><td colspan="7">VIP Section</td></tr>';
            } elseif ($index === 1) {
                echo '<tr class="label-row"><td colspan="7">Semi-Inclusive Section</td></tr>';
            } elseif ($index === 4) {
                echo '<tr class="label-row"><td colspan="7">Inclusive Section</td></tr>';
            }
            echo '<tr>';
            foreach ($row as $seat) {
                echo '<td class="' . ($seat ? '' : 'empty') . '">' . ($seat ?: 'Empty') . '</td>';
            }
            echo '</tr>';
        }
        ?>
    </table>
    <div class="center-btn">
        <a href="index.php" class="btn">Back</a>
    </div>
</div>
</body>
</html>
