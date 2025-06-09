<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Recipe Book</title>
  <link rel="stylesheet" href="../styles/styles.css">
  <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background-image: url('../styles/notebook-bg.jpg');
      background-size: cover;
      background-position: center;
      font-family: 'Comic Sans MS', cursive;
    }

    .cover-container {
      text-align: center;
      background-color: rgba(255, 255, 255, 0.9);
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    }

    h1 {
      font-size: 3em;
      margin-bottom: 0.5em;
    }

    p {
      font-size: 1.2em;
      color: #333;
      margin-bottom: 1.5em;
    }

    .cover-button {
      font-size: 1.1em;
      padding: 12px 24px;
      background: gold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
    }

    .cover-button:hover {
      background: orange;
    }
  </style>
</head>
<body>
  <div class="cover-container">
    <h1>Recipe Book</h1>
    <p>Simple. Free. Yours.</p>
    <button class="cover-button" onclick="openBook()">Open Book</button>
  </div>

  <audio id="flipSound" src="../assets/page-flip.mp3"></audio>

  <script>
    function openBook() {
      const sound = document.getElementById('flipSound');
      sound.play();
      setTimeout(() => {
        window.location.href = 'dashboard.php';
      }, 500);
    }
  </script>
</body>
</html>
