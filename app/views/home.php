<?php require_once __DIR__ . '/layout/header.php'; ?>

<!-- BANNER -->
<section class="banner" id="home">
    <div class="banner-rotator">
        <div class="banner-slide active" style="background-image:url('https://upload.wikimedia.org/wikipedia/pt/3/3a/Juspion.jpg');"></div>
        <div class="banner-slide" style="background-image:url('https://upload.wikimedia.org/wikipedia/pt/4/4f/Winspector.jpg');"></div>
        <div class="banner-slide" style="background-image:url('https://upload.wikimedia.org/wikipedia/pt/4/4f/Kamen_Rider_Black_RX.jpg');"></div>
        <div class="banner-slide" style="background-image:url('https://upload.wikimedia.org/wikipedia/en/7/7d/Kamen_Rider_Drive.png');"></div>
    </div>
    <div class="banner-content">
        <h1>Bem-vindo ao <span>TokusatsuMania</span></h1>
        <p>O universo dos Metal Heroes e Kamen Riders em um só lugar. Nostalgia, ação e justiça!</p>
        <div class="banner-buttons">
            <button class="btn-primary" onclick="scrollToSection('metal-heros')">
                <i class="fa-solid fa-play"></i> Explorar
            </button>
            <button class="btn-secondary" onclick="scrollToSection('cadastro')">
                <i class="fa-solid fa-user-plus"></i> Criar conta
            </button>
        </div>
    </div>
</section>

<main>
    <!-- METAL HEROS -->
    <section id="metal-heros">
        <div class="section-header">
            <div>
                <h2 class="section-title">Metal Heros em destaque</h2>
                <p class="section-subtitle">Clique em um herói para ver mais detalhes.</p>
            </div>
            <div style="display:flex; gap:1rem; align-items:center;">
                <div class="search-bar">
                    <input type="text" id="search-metal" placeholder="Buscar Metal Heros...">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="counter">
                    Total de Metal Heros: <span id="total-metal">0</span>
                </div>
            </div>
        </div>
        <div class="cards-grid" id="metal-grid"></div>
    </section>

    <!-- KAMEN RIDERS -->
    <section id="kamen-riders">
        <div class="section-header">
            <div>
                <h2 class="section-title">Kamen Riders em destaque</h2>
                <p class="section-subtitle">Clique em um Rider para ver mais detalhes.</p>
            </div>
            <div style="display:flex; gap:1rem; align-items:center;">
                <div class="search-bar">
                    <input type="text" id="search-riders" placeholder="Buscar Kamen Riders...">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="counter">
                    Total de Kamen Riders: <span id="total-riders">0</span>
                </div>
            </div>
        </div>
        <div class="cards-grid" id="riders-grid"></div>
    </section>

    <!-- CHAMADA DOS FORMULÁRIOS SEPARADOS -->
    <?php 
        // Carrega as views de formulário mantendo a estrutura original
        if (file_exists(__DIR__ . '/auth/register.php')) {
          require_once __DIR__ . '/auth/register.php';
      }
      if (file_exists(__DIR__ . '/auth/login.php')) {
          require_once __DIR__ . '/auth/login.php';
      }
        if (file_exists(__DIR__ . '/contact.php')) {
            require_once __DIR__ . '/contact.php';
        }
    ?>
</main>

<!-- PASSAGEM DE DADOS PHP PARA O JAVASCRIPT -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const heroes = <?= json_encode($heroes ?? [], JSON_UNESCAPED_UNICODE); ?>;
        
        const metalHeroes = heroes.filter(h => h.tipo === 'metal');
        const kamenRiders = heroes.filter(h => h.tipo === 'rider');

        renderizarMetal(metalHeroes);
        renderizarRiders(kamenRiders);
    });
</script>

<?php require_once __DIR__ . '/layout/footer.php'; ?>