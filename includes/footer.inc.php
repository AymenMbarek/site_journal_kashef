<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .content {
      flex: 1;
    }

    .footer-area {
      background-color: black;
      color: white;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .footer-icons {
      display: flex;
      align-items: center;
    }

    .footer-icons img {
      width: 30px;
      height: 30px;
      margin-right: 10px;
    }

    .subscribe-button {
      background: linear-gradient(135deg, #FFA500, #FF4500); /* Dégradé orangé */
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold; /* Texte en gras */
    }

    .rights-reserved {
      color: white;
      font-weight: bold; /* Texte en gras */
    }

    .white-line {
      width: 80%;
      height: 0.1px;
      background-color: white;
      margin-top: 1px;
      margin-bottom: 1px;
      margin-left: 50%; /* Espacement à gauche */
      margin-right: 50%; /* Espacement à droite */
    }

    p, button {
      font-weight: bold; /* Tous les textes en gras */
      color: white; /* Tous les textes en blanc */
      font-family: Arial, sans-serif; /* Police personnalisée */
    }
  </style>
</head>

<body>
  <div class="content">
    <!-- Contenu de la page -->
  </div>

  <!-- Footer Content -->
  <div class="footer-area">
    <div style="text-align: left;">
    <ul class="footer-icons">
    <img src="./assets/images/youtube.png" alt="Youtube">
    <img src="./assets/images/facebook.png" alt="Facebook">
    <img src="./assets/images/instagram.png" alt="Instagram">
    <img src="./assets/images/twitter.png" alt="X">
</ul>

    </div>
    <div style="text-align: right;">
      <p style="font-weight: bold;">اشترك/ ي في نشرتنا البريدية لتصلك آخر الأخبار</p>
      <button class="subscribe-button">اشترك/ ي في نشرتنا البريدية</button>
    </div>
  </div>
  <div class="white-line"></div>
  <div style="text-align: center; background-color:black;">
    <p class="rights-reserved">جميع الحقوق محفوظة © كشف</p>
  </div>
</body>

</html>
