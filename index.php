<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="video-container">
        <video id="introVideo" autoplay muted playsinline>
            <source src="intro.mp4" type="video/mp4">
            <source src="intro.webm" type="video/webm">
            Seu navegador não suporta vídeos HTML5.
        </video>
        
        <div class="skip-button">
            <button onclick="skipVideo()">Pular Introdução</button>
        </div>
    </div>

    <script>
        const video = document.getElementById('introVideo');
        
        // Redireciona quando o vídeo terminar
        video.addEventListener('ended', function() {
            redirectToLogin();
        });

        // Redireciona se houver erro ao carregar o vídeo
        video.addEventListener('error', function() {
            console.error('Erro ao carregar o vídeo');
            setTimeout(redirectToLogin, 2000);
        });

        function redirectToLogin() {
            window.location.href = 'logar.php';
        }

        function skipVideo() {
            redirectToLogin();
        }

        // Fallback: redireciona após 30 segundos caso o vídeo não termine
        setTimeout(function() {
            if (!video.ended) {
                redirectToLogin();
            }
        }, 30000);
    </script>
</body>
</html>
