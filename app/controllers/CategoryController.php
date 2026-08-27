<?php
class CategoryController {
    public function index() {
        $model = new Genre();
        $items = $model->all();

        ob_start();
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/category/index.php';
        require __DIR__ . '/../views/layout/footer.php';
        return ob_get_clean();
    }
}