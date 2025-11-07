<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gray Wolf</title>
    <link rel="stylesheet" href="login-style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="logo">
                <h1>🐺 GRAY WOLF</h1>
            </div>
            
            <form action="processar_login.php" method="POST" class="login-form">
                <div class="form-group">
                    <label for="usuario">Usuário</label>
                    <input type="text" id="usuario" name="usuario" required placeholder="Digite seu usuário">
                </div>
                
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required placeholder="Digite sua senha">
                </div>
                
                <button type="submit" class="btn-login">Entrar</button>
                
                <div class="links">
                    <a href="recuperar_senha.php">Esqueceu a senha?</a>
                    <a href="cadastro.php">Criar conta</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
