<?php
$host = "db.aelwimkioonxfnssblmn.supabase.co";
$dbname = "postgres";
$user = "postgres";
$pass = "knjps@1931#rajat";

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
} catch (PDOException $e) {
    die("DB Error");
}

$top4 = $pdo->query("SELECT name, class, marks FROM students ORDER BY marks DESC LIMIT 4")->fetchAll();
$fame = $pdo->query("SELECT name, achievement, year FROM hall_of_fame ORDER BY year DESC")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>KNJPS School</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body{font-family:Arial;margin:0;padding:20px;background:#f5f5f5}
        .header{background:#1e3a8a;color:white;padding:20px;text-align:center;border-radius:10px}
        .section{background:white;padding:15px;margin:15px 0;border-radius:10px;box-shadow:0 2px 5px #ccc}
        .card{border-left:4px solid #1e3a8a;padding:10px;margin:10px 0;background:#f9f9f9}
        h2{color:#1e3a8a;margin:0 0 10px 0}
    </style>
</head>
<body>
    <div class="header">
        <h1>KNJPS School</h1>
        <p>Siliguri, West Bengal | Phone: 98XXXXXX10</p>
    </div>

    <div class="section">
        <h2>Admission Details 2026</h2>
        <div class="card">
            <p><b>Class Nursery to IX:</b> Admission Open</p>
            <p><b>Last Date:</b> 30th March 2026</p>
            <p><b>Documents:</b> Birth Certificate, Aadhar Card, 2 Photos</p>
            <p><b>Contact:</b> 98XXXXXX10</p>
        </div>
    </div>

    <div class="section">
        <h2>Top 4 Students</h2>
        <?php foreach($top4 as $s): ?>
        <div class="card">
            <b><?= $s['name'] ?></b> - Class <?= $s['class'] ?> | Marks: <?= $s['marks'] ?>%
        </div>
        <?php endforeach; ?>
    </div>

    <div class="section">
        <h2>Hall of Fame</h2>
        <?php foreach($fame as $f): ?>
        <div class="card">
            <b><?= $f['name'] ?></b> - <?= $f['achievement'] ?> (<?= $f['year'] ?>)
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
