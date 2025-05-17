<?php
session_start();
$questions = $_SESSION['questions'];
$answers = $_POST['answers'];
$score = 0;
$total = count($questions);
$feedback = "";

foreach ($questions as $q) {
    $id = $q['id'];
    if (isset($answers[$id]) && $answers[$id] == $q['correct_option']) {
        $score++;
    }
}

$percentage = ($score / $total) * 100;

if ($percentage >= 90) {
    $feedback = "Excellent IQ! You're a genius.";
} elseif ($percentage >= 70) {
    $feedback = "Great job! You have strong cognitive abilities.";
} elseif ($percentage >= 50) {
    $feedback = "Good effort! There's room to grow.";
} else {
    $feedback = "Keep practicing to improve your problem-solving skills.";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>IQ Test Result</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 20px;
    }

    .container {
      max-width: 700px;
      margin: auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    h2 {
      color: #4CAF50;
      font-size: 28px;
    }

    .score {
      font-size: 22px;
      margin-top: 20px;
      color: #333;
    }

    .feedback {
      font-size: 20px;
      margin-top: 15px;
      background-color: #e7f4ea;
      padding: 15px;
      border-left: 5px solid #4CAF50;
      border-radius: 5px;
      color: #2d6136;
    }

    .actions {
      margin-top: 30px;
    }

    .actions a {
      text-decoration: none;
      background-color: #4CAF50;
      color: white;
      padding: 12px 24px;
      border-radius: 6px;
      margin: 0 10px;
      display: inline-block;
      transition: background 0.3s;
    }

    .actions a:hover {
      background-color: #45a049;
    }

    @media screen and (max-width: 600px) {
      .container {
        padding: 20px;
      }

      h2 {
        font-size: 24px;
      }

      .score, .feedback {
        font-size: 18px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Your IQ Test Result</h2>
    <div class="score">You scored <?= $score ?> out of <?= $total ?> (<?= round($percentage) ?>%)</div>
    <div class="feedback"><?= $feedback ?></div>

    <div class="actions">
      <a href="quiz.php">Retake Test</a>
      <a href="index.php">Go to Homepage</a>
    </div>
  </div>
</body>
</html>
