<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .first-nav {
            background-color: lightgray;
            padding: 10px;
        }

        .second-nav {
            background-color: white;
            text-align: center;
        }

        .second-nav img {
            height: 100px;
            width: 100px;
            position:center;
            display:center;
        }

        .third-nav {
            background-color: black;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .third-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .third-nav ul li {
            display: inline-block;
            margin: 0 10px;
        }

        .third-nav ul li a {
            text-decoration: none;
            color: white;
        }

        .third-nav ul li a:hover {
            color: gray;
        }
    </style>
</head>

<body>
    <!-- Première navbar avec background gris -->
    <nav class="first-nav">
        <div class="container">
            
        </div>
    </nav>

    <!-- Deuxième navbar avec le logo et background blanc -->
    <nav class="second-nav">
        <div class="logo">
            <img src="./assets/images/logok.png">
        </div>
    </nav>

    <!-- Troisième navbar avec les liens et background noir -->
    <nav class="third-nav">
    <ul style="text-align: right;">
      
        
       
       
    
        
        <li><a href=""><i class="fa fa-newspaper-o"></i> تحقيقات</a></li>
        <li><a href=""><i class="fa fa-newspaper-o"></i> تقارير</a></li>
            <li><a href=""><i class="fa fa-newspaper-o"></i> اقتباسات</a></li>
         <li><a href=""><i class="fa fa-newspaper-o"></i> كشف خبر</a></li>
         <li><a href=""><i class="fa fa-info-circle"></i> تفرجو فينا</a></li>
        <li><a href=""><i class="fa fa-newspaper-o"></i> أخر الاخبار</a></li>
          <li><a href="index.php"><i class="fa fa-home"></i> كشف</a></li>
    </ul>
</nav>



    <!-- Script pour le changement de langue -->
    <script>
        function changeLanguage(lang) {
            // Mettre en œuvre le changement de langue ici
            alert('Changement de langue vers ' + lang);
        }
    </script>
</body>

</html>
