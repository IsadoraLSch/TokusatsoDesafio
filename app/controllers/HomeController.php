<?php
// Carrega os arquivos das Models antes de instanciá-las
require_once __DIR__ . '/../models/Hero.php'; // Se você manteve a classe Movie dentro do arquivo Hero.php
require_once __DIR__ . '/../models/Category.php'; // Se a classe Genre está no arquivo Category.php

class HomeController {
    public function index() {
        $heroModel = new Movie();
        $categoryModel = new Genre();

        $heroes = $heroModel->all();
        $categories = $categoryModel->all();

        ob_start();
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/home.php';
        require __DIR__ . '/../views/layout/footer.php';
        return ob_get_clean();
    }
}