<!DOCTYPE html>
<html>
<head>
  <title>Página no encontrada</title>
  <style>
    body {
      background-color: #E9ECEF;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-family: Arial, sans-serif;
    }

    h1 {
      color: #006400;
      font-size: 48px;
    }

    .error-icon {
      font-size: 150px;
      color: #727E8C;
    }

    .back-button {
      background-color: #72C9CE;
      color: #ffffff;
      border: none;
      padding: 10px 20px;
      font-size: 18px;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <i class="error-icon">404</i>
  <h2>Página no encontrada</h2>
  <button class="back-button" onclick="goBack()">Volver</button>

  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</body>
</html>
