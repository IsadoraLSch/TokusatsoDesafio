<?php
// app/views/hero/index.php
?>
<main>
  <section>
    <div class="section-header">
      <div>
        <h2 class="section-title">Heróis & Séries</h2>
        <p class="section-subtitle">Explore todo o catálogo do TokusatsuMania.</p>
      </div>
      <div style="display:flex; gap:1rem; align-items:center;">
        <div class="search-bar">
          <input id="search-heroes" placeholder="Buscar heróis ou séries...">
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <div class="counter">Total: <span id="total-heroes"><?= count($items) ?></span></div>
      </div>
    </div>

    <div class="cards-grid" id="heroes-grid">
      <?php if (!empty($items)): ?>
        <?php foreach($items as $item): ?>
          <article class="card" data-id="<?= $item['id'] ?>">
            <img src="<?= htmlspecialchars($item['imagem'] ?? $item['poster'] ?? '') ?>" alt="<?= htmlspecialchars($item['nome'] ?? $item['title'] ?? '') ?>">
            <div class="card-content">
              <h3 class="card-title"><?= htmlspecialchars($item['nome'] ?? $item['title']) ?></h3>
              <p class="card-meta">
                <span><?= htmlspecialchars($item['categoria'] ?? $item['genre'] ?? '') ?></span> • 
                <span><?= $item['ano'] ?? $item['year'] ?></span>
              </p>
              <p class="card-meta">
                <?= isset($item['duracao']) ? "Duração: {$item['duracao']}" : (isset($item['temporadas']) ? "Temporadas: {$item['temporadas']}" : '') ?>
              </p>
              <p class="card-footer">
                <i class="fa-solid fa-star"></i> <?= number_format((float)($item['avaliacao'] ?? $item['rating'] ?? 0), 1) ?> / 10
              </p>
              <a class="btn-secondary" href="index.php?route=hero/show&id=<?= $item['id'] ?>" style="display:inline-block; margin-top:0.5rem; text-decoration:none;">Ver detalhes</a>
            </div>
          </article>
        <?php endforeach; ?>
      <?php else: ?>
        <p>Nenhum herói ou série encontrada.</p>
      <?php endif; ?>
    </div>
  </section>
</main>