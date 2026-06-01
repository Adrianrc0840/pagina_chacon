<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <!-- NAVBAR -->
  <nav class="navbar" id="navbar">
    <div class="nav-container">
      <a href="<?php echo home_url('/'); ?>" class="nav-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/OriginalLogoSinfondo.png" alt="Fisens" />
      </a>
      <ul class="nav-links" id="nav-links">
        <li><a href="#inicio">Inicio</a></li>
        <li><a href="#sobre-mi">Sobre mí</a></li>
        <li><a href="#servicios">Servicios</a></li>
        <li><a href="#contacto">Contacto</a></li>
      </ul>
      <a href="#contacto" class="btn-nav">Agendar cita</a>
      <button class="hamburger" id="hamburger" aria-label="Menú">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>

  <!-- MENÚ MÓVIL OVERLAY -->
  <div class="mobile-menu" id="mobile-menu">
    <button class="mobile-menu-close" id="mobile-menu-close" aria-label="Cerrar">
      <i class="fa-solid fa-xmark"></i>
    </button>
    <div class="mobile-menu-logo">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/OriginalLogoSinfondo.png" alt="Fisens" />
    </div>
    <hr class="mobile-divider" />
    <ul class="mobile-nav-links">
      <li><a href="#inicio" class="mobile-link">Inicio</a></li>
      <li><a href="#sobre-mi" class="mobile-link">Sobre mí</a></li>
      <li><a href="#servicios" class="mobile-link">Servicios</a></li>
    </ul>
    <a href="#contacto" class="mobile-cta mobile-link">Contacto</a>
    <hr class="mobile-divider" />
    <div class="mobile-social">
      <a href="tel:+526461989276" aria-label="Teléfono"><i class="fa-solid fa-phone"></i></a>
      <a href="https://www.instagram.com/fisens_fisioterapia" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
      <a href="https://wa.me/526461989276" target="_blank" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
    </div>
  </div>
