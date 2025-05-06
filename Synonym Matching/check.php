<?php
require 'db.php';

if (!isset($_POST['answers'])) {
    die("No answers submitted.");
}

// Verileri tekrar çek
$stmt = $pdo->query("SELECT * FROM words");
$words = $stmt->fetchAll(PDO::FETCH_ASSOC);
$wordsAssoc = [];
foreach ($words as $w) {
    $wordsAssoc[$w['id']] = $w;
}

$correct = 0;
$total = count($wordsAssoc);
$feedback = [];

foreach ($_POST['answers'] as $id => $givenSynonym) {
    $word = $wordsAssoc[$id];
    $expectedSynonym = $word['synonym'];

    if ($givenSynonym === $expectedSynonym) {
        $correct++;
        $feedback[] = [
            'word' => $word['word'],
            'status' => 'correct',
            'expected' => $expectedSynonym
        ];
    } else {
        $feedback[] = [
            'word' => $word['word'],
            'status' => 'incorrect',
            'expected' => $expectedSynonym
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Results</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #fdfcfb, #e2d1c3);
            color: #333;
            padding: 20px;
            margin: 0;
            min-height: 100vh;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 2.2rem;
        }

        .results-summary {
            background: #f8f8f8;
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            display: inline-block;
        }

        .feedback-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .feedback-card {
            width: 220px;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            text-align: center;
            background: white;
            transition: transform 0.2s;
        }

        .feedback-card h3 {
            margin-bottom: 10px;
        }

        .feedback-card.correct {
            border: 2px solid #2ecc71;
            background: #eafaf1;
        }

        .feedback-card.incorrect {
            border: 2px solid #e74c3c;
            background: #fdecea;
        }

        .result-text.correct {
            color: #2ecc71;
            font-weight: 600;
        }

        .result-text.incorrect {
            color: #e74c3c;
            font-weight: 600;
        }

        .feedback-card:hover {
            transform: scale(1.05);
        }

        button {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            border: none;
            padding: 14px 36px;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1.1rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: background 0.3s, transform 0.2s;
        }

        button:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<h1>Game Results</h1>

<div class="results-summary">
    <p>You matched <strong><?= $correct ?></strong> out of <strong><?= $total ?></strong> correctly!</p>
</div>

<div class="feedback-container">
    <?php foreach ($feedback as $item): ?>
        <div class="feedback-card <?= $item['status'] ?>">
            <h3><?= htmlspecialchars($item['word']) ?></h3>
            <?php if ($item['status'] === 'correct'): ?>
                <p><span class="result-text correct">✅ Correct!</span></p>
            <?php else: ?>
                <p><span class="result-text incorrect">❌ Incorrect.</span></p>
                <p>Correct answer: <strong><?= htmlspecialchars($item['expected']) ?></strong></p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

<a href="index.php"><button>Play Again</button></a>

</body>
</html>
