<main>
  <section style="max-width:600px; margin:2rem auto;">
    <div class="form-card">
      <h3>Cadastro</h3>
      <p>Preencha os campos para criar sua conta na TokusatsuMania.</p>

      <?php if(!empty($_SESSION['register_error'])): ?>
        <div class="message error"><?= htmlspecialchars($_SESSION['register_error']); unset($_SESSION['register_error']); ?></div>
      <?php endif; ?>

      <?php if(!empty($_SESSION['register_success'])): ?>
        <div class="message success"><?= htmlspecialchars($_SESSION['register_success']); unset($_SESSION['register_success']); ?></div>
      <?php endif; ?>

      <form method="post" action="index.php?route=auth/doRegister">
        <div class="form-group">
          <label>Nome</label>
          <input type="text" name="name" required>
        </div>
        <div class="form-group">
          <label>E-mail</label>
          <input type="email" name="email" required>
        </div>
        <div class="form-group">
          <label>Senha</label>
          <input type="password" name="password" required>
        </div>
        <div class="form-group">
          <label>Confirmar senha</label>
          <input type="password" name="password_confirm" required>
        </div>
        <button class="btn-form" type="submit">Cadastrar</button>
      </form>
    </div>
  </section>
</main>