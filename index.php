<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Reservation System</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url('images/cinema.png');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.7);
            height: 100vh;
            width: 100vw;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .overlay h1 {
            font-size: 3rem;
            color: #fff;
            margin-bottom: 30px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
        }
        .btn {
            background-color:rgb(169, 33, 6);
            color: white;
            padding: 12px 24px;
            margin: 10px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 1.2rem;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
            transition: 0.3s ease;
        }
        .btn:hover {
            background-color:rgb(234, 45, 24);
        }
        footer {
            position: fixed;
            bottom: 10px;
            text-align: center;
            width: 100%;
            color: #fff;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <h1>🎟️ SEAT ALLOCATION SYSTEM🎭</h1>
        <a href="add_participant.php" class="btn">Add Participant</a>
        <a href="allocate.php" class="btn">Allocate Seats</a>
        <a href="show_seating.php" class="btn">Show Seating</a>
        <a href="delete_participant.php" class="btn">Delete Participant</a>
        <a href="reset.php" class="btn">Reset All</a>
    </div>
    <footer>
        Developed by TUA Softwere Corporation
    </footer>
</body>
</html>