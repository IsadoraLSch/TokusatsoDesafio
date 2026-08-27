<main>
  <section style="max-width:600px; margin:2rem auto;">
    <div class="form-card">
      <h3>Login</h3>
      <p>Acesse sua conta TokusatsuMania.</p>

      <?php if(!empty($_SESSION['auth_error'])): ?>
        <div class="message error"><?= htmlspecialchars($_SESSION['auth_error']); unset($_SESSION['auth_error']); ?></div>
      <?php endif; ?>

      <form method="post" action="index.php?route=auth/doLogin">
        <div class="form-group">
          <label>E-mail</label>
          <input type="email" name="email" required>
        </div>
        <div class="form-group">
          <label>Senha</label>
          <input type="password" name="password" required>
        </div>
        <button class="btn-form" type="submit">Entrar</button>
      </form>
    </div>
  </section>
</main>
