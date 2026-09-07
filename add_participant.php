<?php
$successMessage = "";
$errorMessage = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $payment_time = intval($_POST['payment_time']);

    if ($name && $category && $payment_time >= 1 && $payment_time <= 7) {
        $participant = [
            'name' => $name,
            'category' => $category,
            'payment_time' => $payment_time
        ];

        $file = 'data/participants.json';
        $data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
        $data[] = $participant;
        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
        $successMessage = "Participant added successfully!";
    } else {
        $errorMessage = "All fields are required and payment time must be 1-7.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Participant</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('images/cinema.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .container {
            width: 90%;
            max-width: 500px;
            background-color: rgba(0, 0, 0, 0.85);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 12pxrgb(202, 23, 23);
        }

        h2 {
            text-align: center;
            color:rgb(176, 8, 8);
            margin-bottom: 25px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 6px;
            background-color: #333;
            color: #fff;
            font-size: 16px;
        }

        .btn {
            padding: 12px 20px;
            background-color:rgb(185, 19, 19);
            border: none;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
        }

        .btn:hover {
            background-color: #cc0000;
        }

        .success {
            color: #00cc66;
            font-weight: bold;
            text-align: center;
        }

        .error {
            color:rgb(202, 24, 24);
            font-weight: bold;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form input, form select {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Add Participant</h2>
    <?php if ($successMessage) echo "<p class='success'>$successMessage</p>"; ?>
    <?php if ($errorMessage) echo "<p class='error'>$errorMessage</p>"; ?>
    <form method="POST">
        <input type="text" name="name" placeholder="Name" required><br>
        <select name="category" required>
            <option value="">Select Category</option>
            <option value="VIP">VIP</option>
            <option value="Semi-Inclusive">Semi-Inclusive</option>
            <option value="Inclusive">Inclusive</option>
        </select><br>
        <input type="number" name="payment_time" placeholder="Payment Time (1-7)" required><br>
        <button type="submit" class="btn">Submit</button>
        <a href="index.php" class="btn">Back</a>
    </form>
</div>
</body>
</html>
