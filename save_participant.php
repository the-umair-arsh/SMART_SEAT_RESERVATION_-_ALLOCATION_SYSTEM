<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $paymentTime = (int) $_POST['paymentTime'];

    $participant = [
        "name" => $name,
        "category" => $category,
        "paymentTime" => $paymentTime
    ];

    $file = 'data/participants.json';

    if (!file_exists('data')) {
        mkdir('data');
    }

    $data = [];

    if (file_exists($file)) {
        $json = file_get_contents($file);
        $data = json_decode($json, true);
    }

    $data[] = $participant;

    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

    echo "<h3>Participant added successfully!</h3>";
    echo "<a href='index.php'>← Back to Home</a>";
} else {
    echo "Invalid Request.";
}
?>
