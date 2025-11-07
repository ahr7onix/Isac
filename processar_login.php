<?php
session_start();

// Configurações do banco de dados (ajuste conforme necessário)
$host = 'localhost';
$dbname = 'seu_banco';
$username = 'seu_usuario';
$password = 'sua_senha';

// Recebe os dados do formulário
$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

// Validação básica
if (empty($usuario) || empty($senha)) {
    header('Location: logar.php?erro=campos_vazios');
    exit;
}

try {
    // Conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepara a consulta
    $stmt = $pdo->prepare("SELECT id, usuario, senha, nome FROM usuarios WHERE usuario = :usuario");
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Verifica se o usuário existe e a senha está correta
    if ($user && password_verify($senha, $user['senha'])) {
        // Login bem-sucedido
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['usuario'] = $user['usuario'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['logado'] = true;
        
        header('Location: dashboard.php');
        exit;
    } else {
        // Login falhou
        header('Location: logar.php?erro=credenciais_invalidas');
        exit;
    }
    
} catch (PDOException $e) {
    // Erro de conexão
    error_log("Erro no login: " . $e->getMessage());
    header('Location: logar.php?erro=erro_sistema');
    exit;
}
?>
