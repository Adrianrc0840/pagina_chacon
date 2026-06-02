<?php get_header();

// ── Helpers ─────────────────────────────────────────────────
function fisens_field($name, $fallback = '') {
    $val = function_exists('get_field') ? get_field($name) : null;
    return ($val !== null && $val !== '') ? $val : $fallback;
}
function fisens_img($name, $fallback_file) {
    if (function_exists('get_field')) {
        $img = get_field($name);
        if ($img) return ['url' => $img['url'], 'alt' => $img['alt']];
    }
    return ['url' => get_template_directory_uri() . '/assets/images/' . $fallback_file, 'alt' => ''];
}
?>

<!-- ═══════════════ HERO ═══════════════ -->
<section class="hero" id="inicio">
  <?php
    $hero_img  = fisens_img('hero_imagen', 'Fisio1.jpeg');
    $hero_tag  = fisens_field('hero_tag',           'Fisioterapia profesional');
    $hero_tit  = fisens_field('hero_titulo',         'Recupera tu movimiento,');
    $hero_acc  = fisens_field('hero_titulo_acento',  'recupera tu vida');
    $hero_desc = fisens_field('hero_descripcion',    'Atención personalizada para que vuelvas a moverte sin dolor y con plena confianza en tu cuerpo.');
    $hero_btn1 = fisens_field('hero_btn1', 'Agendar cita');
    $hero_btn2 = fisens_field('hero_btn2', 'Ver servicios');
  ?>
  <div class="hero-content">
    <p class="hero-tag"><?php echo esc_html($hero_tag); ?></p>
    <h1><?php echo esc_html($hero_tit); ?><br /><span><?php echo esc_html($hero_acc); ?></span></h1>
    <p class="hero-sub"><?php echo esc_html($hero_desc); ?></p>
    <div class="hero-btns">
      <a href="#contacto" class="btn-primary"><?php echo esc_html($hero_btn1); ?></a>
      <a href="#servicios" class="btn-secondary"><?php echo esc_html($hero_btn2); ?></a>
    </div>
  </div>
  <div class="hero-img-wrap">
    <img src="<?php echo esc_url($hero_img['url']); ?>" alt="<?php echo esc_attr($hero_img['alt']); ?>" class="hero-photo" />
  </div>
</section>

<!-- ═══════════════ SOBRE MÍ ═══════════════ -->
<section class="sobre-mi" id="sobre-mi">
  <?php
    $sobre_img     = fisens_img('sobre_imagen', 'Fisio3.jpeg');
    $sobre_anios   = fisens_field('sobre_anios',   '8+');
    $sobre_nombre  = fisens_field('sobre_nombre',  'Carlos Chacón');
    $sobre_clinica = fisens_field('sobre_clinica', 'Fisens');
    $sobre_desc1   = fisens_field('sobre_desc1',   'fisioterapeuta certificado y fundador de Fisens, con más de 8 años de experiencia en rehabilitación física y terapia manual. Mi enfoque es integral: trato la causa del dolor, no solo el síntoma.');
    $sobre_desc2   = fisens_field('sobre_desc2',   'Cuento con especialización en fisioterapia deportiva, neurológica y ortopédica, ofreciendo planes de tratamiento personalizados para cada paciente.');
    $credenciales  = (function_exists('get_field')) ? get_field('sobre_credenciales') : null;
    if (!$credenciales) $credenciales = [
        ['credencial' => 'Licenciatura en Fisioterapia'],
        ['credencial' => 'Especialista en Dolor de Columna'],
        ['credencial' => 'Especialización en Fisioterapia Deportiva'],
        ['credencial' => 'Certificación en Terapia Manual Ortopédica'],
    ];
  ?>
  <div class="section-container">
    <div class="sobre-img-wrap">
      <img src="<?php echo esc_url($sobre_img['url']); ?>" alt="<?php echo esc_attr($sobre_img['alt']); ?>" />
      <div class="badge-exp">
        <strong><?php echo esc_html($sobre_anios); ?></strong>
        <span>años de experiencia</span>
      </div>
    </div>
    <div class="sobre-text">
      <p class="section-tag">Sobre mí</p>
      <h2>Tu recuperación es mi prioridad</h2>
      <p>Soy <strong><?php echo esc_html($sobre_nombre); ?></strong>, <?php echo esc_html($sobre_desc1); ?></p>
      <p><?php echo esc_html($sobre_desc2); ?></p>
      <ul class="sobre-list">
        <?php foreach ((array)$credenciales as $row): ?>
          <li><i class="fa-solid fa-circle-check"></i> <?php echo esc_html($row['credencial']); ?></li>
        <?php endforeach; ?>
      </ul>
      <a href="#contacto" class="btn-primary">Agendar consulta</a>
    </div>
  </div>
</section>

<!-- ═══════════════ SERVICIOS ═══════════════ -->
<section class="servicios" id="servicios">
  <div class="section-inner">
    <p class="section-tag center">Servicios</p>
    <h2 class="center">¿En qué te puedo ayudar?</h2>
    <p class="section-desc center">Tratamientos especializados y personalizados para cada condición, utilizando las técnicas más actuales y efectivas.</p>
    <div class="servicios-grid">
      <?php
      $servicios = function_exists('get_field') ? get_field('servicios') : null;
      if ($servicios && is_array($servicios)):
          foreach ($servicios as $s):
              $items = array_filter(array_map('trim', explode("\n", $s['items'])));
      ?>
        <div class="servicio-card">
          <div class="servicio-icon"><i class="<?php echo esc_attr($s['icono']); ?>"></i></div>
          <h3><?php echo esc_html($s['titulo']); ?></h3>
          <ul class="servicio-list">
            <?php foreach ($items as $item): ?>
              <li><?php echo esc_html($item); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; else: ?>
        <div class="servicio-card">
          <div class="servicio-icon"><i class="fa-solid fa-x-ray"></i></div>
          <h3>Dolor de Columna</h3>
          <ul class="servicio-list">
            <li>Dolor Lumbar (Lumbalgia)</li><li>Dolor Cervical (Cuello)</li>
            <li>Hernias Discales</li><li>Ciática</li><li>Dolor Dorsal</li>
          </ul>
        </div>
        <div class="servicio-card">
          <div class="servicio-icon"><i class="fa-solid fa-person-running"></i></div>
          <h3>Lesiones Musculares y Deportivas</h3>
          <ul class="servicio-list">
            <li>Contracturas Musculares</li><li>Distensiones y Desgarres</li>
            <li>Tendinitis</li><li>Esguinces</li>
          </ul>
        </div>
        <div class="servicio-card">
          <div class="servicio-icon"><i class="fa-solid fa-bone"></i></div>
          <h3>Rodilla y Hombro</h3>
          <ul class="servicio-list">
            <li>Rehabilitación de LCA</li><li>Lesiones de Menisco</li>
            <li>Patologías de Hombro</li><li>Rehabilitación Pre y Postquirúrgica</li>
          </ul>
        </div>
        <div class="servicio-card">
          <div class="servicio-icon"><i class="fa-solid fa-hand-dots"></i></div>
          <h3>Mano y Pie</h3>
          <ul class="servicio-list">
            <li>Síndrome del Túnel Carpiano</li><li>Tenosinovitis de De Quervain</li>
            <li>Fascitis Plantar</li><li>Espolón Calcáneo</li>
          </ul>
        </div>
        <div class="servicio-card">
          <div class="servicio-icon"><i class="fa-solid fa-brain"></i></div>
          <h3>Rehabilitación Neurológica</h3>
          <ul class="servicio-list">
            <li>Parálisis Facial</li><li>Evaluación y seguimiento neurológico</li>
            <li>Reeducación neuromuscular</li>
          </ul>
        </div>
        <div class="servicio-card">
          <div class="servicio-icon"><i class="fa-solid fa-joint"></i></div>
          <h3>Enfermedades Degenerativas</h3>
          <ul class="servicio-list">
            <li>Artrosis</li><li>Control del dolor crónico</li>
            <li>Mantenimiento de la movilidad</li>
          </ul>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ═══════════════ POR QUÉ ELEGIRNOS ═══════════════ -->
<section class="por-que">
  <div class="section-inner">
    <p class="section-tag center">¿Por qué elegirnos?</p>
    <h2 class="center">Un enfoque diferente para tu salud</h2>
    <div class="razones-grid">
      <?php
      $razones = function_exists('get_field') ? get_field('razones') : null;
      if ($razones && is_array($razones)):
          foreach ($razones as $r): ?>
        <div class="razon">
          <i class="<?php echo esc_attr($r['icono']); ?>"></i>
          <h4><?php echo esc_html($r['titulo']); ?></h4>
          <p><?php echo esc_html($r['descripcion']); ?></p>
        </div>
      <?php endforeach; else: ?>
        <div class="razon"><i class="fa-solid fa-user-doctor"></i><h4>Atención personalizada</h4><p>Cada plan de tratamiento es diseñado específicamente para ti y tus objetivos.</p></div>
        <div class="razon"><i class="fa-solid fa-clock"></i><h4>Horarios flexibles</h4><p>Adaptamos los horarios a tu rutina para que el tratamiento sea compatible con tu vida.</p></div>
        <div class="razon"><i class="fa-solid fa-microscope"></i><h4>Técnicas actualizadas</h4><p>Formación continua para ofrecerte siempre las técnicas más eficaces y seguras.</p></div>
        <div class="razon"><i class="fa-solid fa-heart-pulse"></i><h4>Seguimiento continuo</h4><p>Te acompañamos durante todo el proceso, monitoreando tu progreso en cada sesión.</p></div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ═══════════════ CONTACTO ═══════════════ -->
<section class="contacto" id="contacto">
  <div class="section-inner">
    <p class="section-tag center">Contacto</p>
    <h2 class="center">Agenda tu cita hoy</h2>
    <?php
      $wa        = fisens_field('contacto_whatsapp',  '526461989276');
      $tel       = fisens_field('contacto_telefono',  '+52 646 198 9276');
      $correo    = fisens_field('contacto_correo',    'contacto@fisens.mx');
      $horario   = fisens_field('contacto_horario',   "Lun – Vie: 8:00 – 20:00\nSáb: 9:00 – 14:00");
      $maps_link = fisens_field('contacto_maps_link', 'https://maps.app.goo.gl/EqKmTDoCdnzjq8VV9');
      $maps_emb  = fisens_field('contacto_maps_embed','https://maps.google.com/maps?q=Fisens+Centro+de+Terapia+Fisica+y+Rehabilitacion&output=embed');
      $instagram = fisens_field('contacto_instagram', 'https://www.instagram.com/fisens_fisioterapia');
      $facebook  = fisens_field('contacto_facebook',  'https://www.facebook.com/share/18c4vVynco/?mibextid=wwXIfr');
    ?>
    <div class="contacto-grid">

      <div class="contacto-info">
        <h3>Información de contacto</h3>
        <div class="info-item">
          <i class="fa-brands fa-whatsapp"></i>
          <div><strong>WhatsApp</strong>
            <a href="https://wa.me/<?php echo esc_attr($wa); ?>" target="_blank"><?php echo esc_html($tel); ?></a>
          </div>
        </div>
        <div class="info-item">
          <i class="fa-solid fa-phone"></i>
          <div><strong>Teléfono</strong>
            <a href="tel:+<?php echo esc_attr($wa); ?>"><?php echo esc_html($tel); ?></a>
          </div>
        </div>
        <div class="info-item">
          <i class="fa-solid fa-envelope"></i>
          <div><strong>Correo</strong>
            <a href="mailto:<?php echo esc_attr($correo); ?>"><?php echo esc_html($correo); ?></a>
          </div>
        </div>
        <div class="info-item">
          <i class="fa-solid fa-clock"></i>
          <div><strong>Horario</strong>
            <span><?php echo nl2br(esc_html($horario)); ?></span>
          </div>
        </div>
        <div class="info-item">
          <i class="fa-solid fa-location-dot"></i>
          <div><strong>Dirección</strong>
            <a href="<?php echo esc_url($maps_link); ?>" target="_blank">Ver ubicación en Maps</a>
          </div>
        </div>
        <div class="mapa-wrap">
          <iframe src="<?php echo esc_url($maps_emb); ?>" width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Ubicación Fisens"></iframe>
        </div>
        <div class="social-links">
          <a href="<?php echo esc_url($instagram); ?>" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="<?php echo esc_url($facebook); ?>" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
          <a href="https://wa.me/<?php echo esc_attr($wa); ?>" target="_blank" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
      </div>

      <form class="contacto-form" id="contacto-form">
        <h3>Envíanos un mensaje</h3>
        <div class="form-group">
          <label for="nombre">Nombre completo *</label>
          <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required />
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="telefono">Teléfono *</label>
            <input type="tel" id="telefono" name="telefono" placeholder="Ej. 646 198 9276" required />
          </div>
          <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" placeholder="tu@correo.com" />
          </div>
        </div>
        <div class="form-group">
          <label for="servicio">Servicio de interés</label>
          <select id="servicio" name="servicio">
            <option value="">Selecciona un servicio...</option>
            <optgroup label="Columna">
              <option>Dolor Lumbar (Lumbalgia)</option><option>Dolor Cervical</option>
              <option>Hernia Discal</option><option>Ciática</option><option>Dolor Dorsal</option>
            </optgroup>
            <optgroup label="Lesiones Musculares y Deportivas">
              <option>Contractura Muscular</option><option>Distensión / Desgarre</option>
              <option>Tendinitis</option><option>Esguince</option>
            </optgroup>
            <optgroup label="Rodilla y Hombro">
              <option>Rehabilitación de LCA</option><option>Lesión de Menisco</option>
              <option>Patología de Hombro</option><option>Rehabilitación Postquirúrgica</option>
            </optgroup>
            <optgroup label="Mano y Pie">
              <option>Síndrome del Túnel Carpiano</option><option>Fascitis Plantar</option>
              <option>Espolón Calcáneo</option>
            </optgroup>
            <optgroup label="Otros">
              <option>Parálisis Facial</option><option>Artrosis</option><option>Otro</option>
            </optgroup>
          </select>
        </div>
        <div class="form-group">
          <label for="mensaje">Mensaje / motivo de consulta *</label>
          <textarea id="mensaje" name="mensaje" rows="4" placeholder="Cuéntanos brevemente tu situación..." required></textarea>
        </div>
        <button type="submit" class="btn-primary full-width">
          <i class="fa-brands fa-whatsapp"></i> Enviar por WhatsApp
        </button>
      </form>

    </div>
  </div>
</section>

<?php get_footer(); ?>
