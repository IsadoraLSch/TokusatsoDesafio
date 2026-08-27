<?php
// app/views/hero/show.php
?>
<main>
  <section style="max-width:900px; margin:2rem auto;">
    <article class="card" style="display:flex; gap:1rem;">
      <div style="flex:1;">
        <img src="<?= htmlspecialchars($item['imagem'] ?? $item['image'] ?? '') ?>" alt="<?= htmlspecialchars($item['nome'] ?? $item['title'] ?? '') ?>" style="height:400px; width:100%; object-fit:cover;">
      </div>
      <div style="flex:1; padding:1rem;">
        <h2><?= htmlspecialchars($item['nome'] ?? $item['title']) ?></h2>
        
        <div id="modal-meta">
          <span><?= htmlspecialchars($item['categoria'] ?? $item['category'] ?? '') ?></span>
          <span><?= htmlspecialchars($item['ano'] ?? $item['year'] ?? '') ?></span>
          <span><?= htmlspecialchars($item['duracao'] ?? $item['duration'] ?? '') ?></span>
        </div>
        
        <div id="modal-rating" style="margin: 1rem 0;">
          <i class="fa-solid fa-star"></i> <?= number_format((float)($item['avaliacao'] ?? $item['rating'] ?? 0), 1) ?> / 10
        </div>
        
        <p id="modal-synopsis"><?= htmlspecialchars($item['sinopse'] ?? $item['synopsis'] ?? '') ?></p>
        
        <a class="btn-secondary" href="index.php?route=hero/index" style="display:inline-block; margin-top:1rem; text-decoration:none;">Voltar</a>
      </div>
    </article>
  </section>
</main>