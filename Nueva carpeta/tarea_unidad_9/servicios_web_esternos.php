<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon List</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a2e;
            color: #eee;
            padding: 40px 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #ff3d71;
            margin-bottom: 30px;
            font-size: 2.5rem;
        }

        .pokemon-list {
            background-color: #16213e;
            border-radius: 8px;
            padding: 20px;
        }

        .pokemon-item {
            padding: 15px;
            margin-bottom: 10px;
            background-color: #0f3460;
            border-radius: 6px;
            border-left: 4px solid #ff3d71;
        }

        .pokemon-item:hover {
            background-color: #1a4d7a;
            transform: translateX(5px);
            transition: all 0.3s ease;
        }

        .pokemon-name {
            font-weight: bold;
            color: #ffd93d;
            text-transform: capitalize;
            margin-bottom: 5px;
        }

        a {
            color: #6bcf7f;
            text-decoration: none;
            font-size: 0.9rem;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Lista de Pokémon</h1>
    <div class="pokemon-list">
        <?php
            $url = "https://pokeapi.co/api/v2/pokemon/";
            $response = file_get_contents($url);
            $data = json_decode($response, true);

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['url'])) {
            $url = $_POST['url'];
            $response = file_get_contents($url);
            $data = json_decode($response, true);
            echo "<h2>" . $data["name"] . "</h2>";
            echo "Altura: " . $data["height"] . "<br>";
            echo "Peso: " . $data["weight"] . "<br>";

        }else{
            for ($i = 0; $i < count($data["results"]); $i++) {
                echo $data["results"][$i]['name'] . ": ";
                echo "<form method='post'>
                <input type='hidden' id='url' name='url' value='".$data["results"][$i]['url']."'>
                <button type='submit'>".$data["results"][$i]['url'].
                    "</button></form></br>";
            }
        }
        ?>
        </div>
    </div>
    </body>
</html>