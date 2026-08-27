<?php
// app/views/category/index.php
?>
<main>
    <section>
        <h2 class="section-title">Categorias</h2>
        <div style="display:flex; gap:1rem; flex-wrap:wrap; margin-top:1rem;">
            <?php if (!empty($items)): ?>
                <?php foreach($items as $cat): ?>
                    <div class="genre-pill"><?= htmlspecialchars($cat['name']) ?></div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhuma categoria encontrada.</p>
            <?php endif; ?>
        </div>
    </section>
</main>