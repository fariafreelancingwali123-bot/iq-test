<?php
$conn = new mysqli("localhost", "u1fkgwiwpmjub", "mp8cjl5322br", "dbwngcfaszdghh");
$result = $conn->query("SELECT * FROM questions");
$questions = $result->fetch_all(MYSQLI_ASSOC);
session_start();
$_SESSION['questions'] = $questions;
?>
<!DOCTYPE html>
<html>
<head>
  <title>IQ Quiz</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }

    .container {
      max-width: 800px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #333;
    }

    .question {
      margin-bottom: 25px;
      padding: 15px;
      background-color: #f9f9f9;
      border-left: 4px solid #4CAF50;
      border-radius: 5px;
    }

    .question p {
      font-size: 18px;
      margin: 0 0 10px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-size: 16px;
    }

    input[type="radio"] {
      margin-right: 10px;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 12px 25px;
      font-size: 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      display: block;
      margin: 30px auto 0;
    }

    button:hover {
      background-color: #45a049;
    }

    @media screen and (max-width: 600px) {
      .container {
        padding: 15px;
      }

      h2 {
        font-size: 22px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>IQ Test</h2>
    <form method="POST" action="result.php">
      <?php foreach($questions as $index => $q): ?>
        <div class="question">
          <p><strong><?= ($index+1) ?>. <?= $q['question'] ?></strong></p>
          <label><input type="radio" name="answers[<?= $q['id'] ?>]" value="A"> <?= $q['option_a'] ?></label>
          <label><input type="radio" name="answers[<?= $q['id'] ?>]" value="B"> <?= $q['option_b'] ?></label>
          <label><input type="radio" name="answers[<?= $q['id'] ?>]" value="C"> <?= $q['option_c'] ?></label>
          <label><input type="radio" name="answers[<?= $q['id'] ?>]" value="D"> <?= $q['option_d'] ?></label>
        </div>
      <?php endforeach; ?>
      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>
