<?php
$participantsFile = 'data/participants.json';
$successMessage = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $nameToDelete = trim($_POST['delete']);
    $participants = json_decode(file_get_contents($participantsFile), true);
    $found = false;
    foreach ($participants as $index => $participant) {
        if (strtolower($participant['name']) === strtolower($nameToDelete)) {
            unset($participants[$index]);
            file_put_contents($participantsFile, json_encode(array_values($participants), JSON_PRETTY_PRINT));
            $successMessage = "Participant '$nameToDelete' deleted successfully.";
            $found = true;
            break;
        }
    }
    if (!$found) {
        $errorMessage = "Participant '$nameToDelete' not found.";
    }
}
$participants = file_exists($participantsFile) ? json_decode(file_get_contents($participantsFile), true) : [];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Participant</title>
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
            background-color: rgba(0,0,0,0.8);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 12pxrgb(189, 13, 13);
        }
        h2 {
            text-align: center;
            color:rgb(201, 12, 12);
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 12px 16px;
            border: 1px solid #ccc;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.1);
        }
        th {
            background-color: rgba(161, 8, 8, 0.8);
            color: white;
        }
        .btn {
            padding: 8px 14px;
            background-color:rgb(240, 13, 13);
            border: none;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #cc0000;
        }
        .msg {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .success { background-color: rgba(0,255,0,0.2); border: 1px solid green; color: lightgreen; }
        .error { background-color: rgba(255,0,0,0.2); border: 1px solid red; color: pink; }
        .center-btn {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>DELETE PARTICIPANT</h2>

    <?php if ($successMessage): ?>
        <div class="msg success"><?= $successMessage ?></div>
    <?php elseif ($errorMessage): ?>
        <div class="msg error"><?= $errorMessage ?></div>
    <?php endif; ?>

    <?php if (count($participants) > 0): ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Payment Time</th>
                <th>Action</th>
            </tr>
            <?php foreach ($participants as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p['name']) ?></td>
                    <td><?= htmlspecialchars($p['category']) ?></td>
                    <td><?= htmlspecialchars($p['payment_time']) ?></td>
                    <td>
                        <form method="POST" onsubmit="return confirm('Are you sure you want to delete <?= $p['name'] ?>?')">
                            <input type="hidden" name="delete" value="<?= htmlspecialchars($p['name']) ?>">
                            <button class="btn">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No participants to delete.</p>
    <?php endif; ?>

    <div class="center-btn">
        <a href="index.php" class="btn">Back</a>
    </div>
</div>
</body>
</html>
