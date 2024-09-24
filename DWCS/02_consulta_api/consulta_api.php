<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca un Personaje de Rick y Morty</title>
</head>
<body>
    <p>Bienvenido a la página de personajes de Rick y Morty.</p>

    <!-- Formulario para ingresar el ID del personaje -->
    <form method="POST" action="">
        <label for="character_id">Introduce el ID de un personaje:</label>
        <input type="number" id="character_id" name="character_id" required>
        <button type="submit">Buscar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['character_id'])) {
        $character_id = intval($_POST['character_id']);
        $api_url = "https://rickandmortyapi.com/api/character/" . $character_id;

        $ch = curl_init($api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        $data = json_decode($result, true);
        curl_close($ch);
        if (isset($data['name'])) {
            echo "<p>" . $data['name'] . "</p>";
            echo '<img src="' . htmlspecialchars($data['image']) . '" alt="Avatar" />';
        } else {
            echo "<p>Personaje no encontrado</p>";
        }
    }
    ?>
        
</body>
</html>
