<?php
class ContactController {
    public function index() {
        ob_start();
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/contact.php';
        require __DIR__ . '/../views/layout/footer.php';
        return ob_get_clean();
    }

    public function send() {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $message = $_POST['message'] ?? '';

        $errors = [];
        if(!$name) $errors[] = 'Nome obrigatório';
        if(!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'E-mail inválido';
        if(!$message) $errors[] = 'Mensagem obrigatória';

        if($errors) {
            $_SESSION['contact_errors'] = $errors;
            header('Location: /tokusatsumania/index.php?route=contact/index');
            exit;
        }

        $contactModel = new Contact();
        $contactModel->save(['name'=>$name,'email'=>$email,'message'=>$message]);

        $_SESSION['contact_success'] = 'Mensagem enviada com sucesso!';
        header('Location: /tokusatsumania/index.php?route=contact/index');
        exit;
    }
}