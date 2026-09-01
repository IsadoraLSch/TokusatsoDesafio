<?php
class AuthController {
    public function login() {
        ob_start();
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/auth/login.php';
        return ob_get_clean();
    }

    public function register() {
        ob_start();
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/auth/register.php';
        return ob_get_clean();
    }

    public function doLogin() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = ['id'=>$user['id'],'email'=>$user['email']];
            header('Location: /tokusatsumania/index.php?route=home/index');
            exit;
        }

        $_SESSION['auth_error'] = 'Credenciais inválidas.';
        header('Location: /tokusatsumania/index.php?route=auth/login');
        exit;
    }

    public function doRegister() {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['password_confirm'] ?? '';

        if(!$name || !$email || !$password || $password !== $confirm) {
            $_SESSION['register_error'] = 'Dados inválidos ou senhas não conferem.';
            header('Location: /tokusatsumania/index.php?route=auth/register');
            exit;
        }

        $userModel = new User();
        $userModel->create(['name'=>$name,'email'=>$email,'password'=>password_hash($password, PASSWORD_DEFAULT)]);
        $_SESSION['register_success'] = 'Cadastro realizado. Faça login.';
        header('Location: /tokusatsumania/index.php?route=auth/login');
        exit;
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /tokusatsumania/index.php?route=home/index');
        exit;
    }
}