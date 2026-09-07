<?php
$participantsFile = 'data/participants.json';
$seatingFile = 'data/seating.json';
$totalRows = 6;
$totalCols = 7;
$seating = array_fill(0, $totalRows, array_fill(0, $totalCols, ""));
$colOrder = [3,2,4,1,5,0,6];
$participants = file_exists($participantsFile) ? json_decode(file_get_contents($participantsFile), true) : [];
usort($participants, function($a, $b) {
    $priority = ['VIP' => 1, 'Semi-Inclusive' => 2, 'Inclusive' => 3];
    if ($priority[$a['category']] !== $priority[$b['category']]) {
        return $priority[$a['category']] - $priority[$b['category']];
    }
    return $a['payment_time'] - $b['payment_time'];
});
foreach ($participants as $index => $p) {
    $rowStart = $p['category'] === 'VIP' ? 0 : ($p['category'] === 'Semi-Inclusive' ? 1 : 4);
    $rowEnd = $rowStart + 1;
    $assigned = false;
    for ($row = $rowStart; $row <= $rowEnd && !$assigned; $row++) {
        foreach ($colOrder as $col) {
            if (empty($seating[$row][$col])) {
                $seating[$row][$col] = $p['name'] . " ({$p['category']}) - Seat#" . ($index + 1);
                $assigned = true;
                break;
            }
        }
    }
}
file_put_contents($seatingFile, json_encode($seating, JSON_PRETTY_PRINT));
header("Location: show_seating.php");
exit;
?>
