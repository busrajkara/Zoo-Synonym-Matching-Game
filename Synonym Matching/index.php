<?php
require 'db.php';

// Veritabanından verileri çek
$stmt = $pdo->query("SELECT * FROM words");
$words = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Anahtarları karıştır
shuffle($words);

// Tüm synonym'leri bir defa karıştır (her dropdown aynı listeyi kullanacak)
$allSynonyms = array_column($words, 'synonym');
shuffle($allSynonyms);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zoo Synonym Matching Game</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Zoo Synonym Matching Game</h1>
<p>Match each animal with its synonym:</p>

<form method="post" action="check.php">
    <div id="cards-wrapper">
        <?php foreach ($words as $index => $word): ?>
            <div class="card question-card" style="display: <?= $index === 0 ? 'block' : 'none' ?>;">
                <label><?= htmlspecialchars($word['word']) ?></label>
                <select name="answers[<?= $word['id'] ?>]" required>
                    <option value="">Select synonym</option>
                    <?php foreach ($allSynonyms as $syn): ?>
                        <option value="<?= htmlspecialchars($syn) ?>"><?= htmlspecialchars($syn) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="button-group">
        <button type="button" id="next-btn">Next</button>
        <button type="submit" id="submit-btn" style="display: none;">Check Answers</button>
    </div>
</form>

<script>
    const cards = document.querySelectorAll('.question-card');
    const nextBtn = document.getElementById('next-btn');
    const submitBtn = document.getElementById('submit-btn');
    let currentIndex = 0;

    nextBtn.addEventListener('click', () => {
        const currentSelect = cards[currentIndex].querySelector('select');
        if (currentSelect.value === "") {
            alert("Please select an answer before proceeding.");
            return;
        }

        cards[currentIndex].style.display = 'none';
        currentIndex++;

        if (currentIndex < cards.length) {
            cards[currentIndex].style.display = 'block';
        } else {
            nextBtn.style.display = 'none';
            submitBtn.style.display = 'inline-block';
        }
    });
</script>

</body>
</html>
