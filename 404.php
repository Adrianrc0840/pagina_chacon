<?php get_header(); ?>

  <section style="min-height:60vh; display:flex; flex-direction:column; align-items:center; justify-content:center; text-align:center; padding:4rem 1.5rem;">
    <h1 style="font-size:6rem; color:var(--verde-medio); margin-bottom:0.5rem;">404</h1>
    <h2 style="margin-bottom:1rem;">Página no encontrada</h2>
    <p style="margin-bottom:2rem;">La página que buscas no existe o fue movida.</p>
    <a href="<?php echo home_url('/'); ?>" class="btn-primary">Volver al inicio</a>
  </section>

<?php get_footer(); ?>
