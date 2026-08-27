<?php
class HeroController {
    public function index() {
        $model = new Movie();
        $items = $model->all();

        ob_start();
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/hero/index.php';
        require __DIR__ . '/../views/layout/footer.php';
        return ob_get_clean();
    }

    public function show() {
        $id = $_GET['id'] ?? null;
        $model = new Movie();
        $item = $model->find($id);

        if(!$item) {
            http_response_code(404);
            return "Herói não encontrado.";
        }

        ob_start();
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/hero/show.php';
        require __DIR__ . '/../views/layout/footer.php';
        return ob_get_clean();
    }
}