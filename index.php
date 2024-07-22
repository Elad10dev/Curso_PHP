<?php
const API_URL = "https://whenisthenextmcufilm.com/api";

// Inicializar una sesión de cURL
$ch = curl_init(API_URL);

// Verificar si la inicialización fue exitosa
if ($ch === false) {
    die('Error al inicializar cURL');
}

// Indicar que queremos recibir el resultado pero no mostrarlo
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la petición y guardar el resultado
$result = curl_exec($ch);

// Verificar si la ejecución fue exitosa
if ($result === false) {
    echo 'Error en cURL: ' . curl_error($ch);
} else {
    $data = json_decode($result, true);
    /* var_dump($data); */
    
}

// Cerrar la sesión cURL
curl_close($ch);
?>
<head>
    <meta charset="UTF-8"/>
    <title>La próxima pelicula de Marvel</title>
    <meta name="description" content="La última pelicula de Marvel"/>    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
    />
</head>


<main>
    
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="200" alt="Poster de <?= $data["title"]; ?>"
        style="border-radius: 16px"/>
    </section>
    <hgroup>
        <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días </h3>
        <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>la siguien es: <?= $data["following_production"]["title"]; ?></p>
    </hgroup>
    
</main>
<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
    section {	
        display: flex;
        justify-content: center;
        text-align: center;
    }
    hgroup {display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>