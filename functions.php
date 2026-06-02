<?php
/* ============================================================
   FISENS — FUNCTIONS.PHP
   Registra assets y campos ACF para toda la página
   ============================================================ */

// ── Enqueue assets ──────────────────────────────────────────
function fisens_enqueue_assets() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap', [], null);
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css', [], null);
    wp_enqueue_style('fisens-styles', get_template_directory_uri() . '/assets/css/styles.css', [], '1.1');
    wp_enqueue_script('fisens-script', get_template_directory_uri() . '/assets/js/main.js', [], '1.1', true);
}
add_action('wp_enqueue_scripts', 'fisens_enqueue_assets');

// ── Soporte del tema ─────────────────────────────────────────
function fisens_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
}
add_action('after_setup_theme', 'fisens_theme_setup');


// ── Campos ACF ───────────────────────────────────────────────
add_action('acf/init', 'fisens_register_acf_fields');
function fisens_register_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) return;

    // ── HERO ────────────────────────────────────────────────
    acf_add_local_field_group([
        'key'    => 'group_hero',
        'title'  => 'Hero — Sección principal',
        'fields' => [
            ['key' => 'field_hero_imagen',       'label' => 'Imagen hero',        'name' => 'hero_imagen',       'type' => 'image',    'return_format' => 'array', 'preview_size' => 'medium'],
            ['key' => 'field_hero_tag',           'label' => 'Etiqueta pequeña',   'name' => 'hero_tag',          'type' => 'text',     'default_value' => 'Fisioterapia profesional'],
            ['key' => 'field_hero_titulo',        'label' => 'Título línea 1',     'name' => 'hero_titulo',       'type' => 'text',     'default_value' => 'Recupera tu movimiento,'],
            ['key' => 'field_hero_titulo_acento', 'label' => 'Título línea 2 (color acento)', 'name' => 'hero_titulo_acento', 'type' => 'text', 'default_value' => 'recupera tu vida'],
            ['key' => 'field_hero_descripcion',   'label' => 'Descripción',        'name' => 'hero_descripcion',  'type' => 'textarea', 'rows' => 3, 'default_value' => 'Atención personalizada para que vuelvas a moverte sin dolor y con plena confianza en tu cuerpo.'],
            ['key' => 'field_hero_btn1',          'label' => 'Botón 1 — Texto',    'name' => 'hero_btn1',         'type' => 'text',     'default_value' => 'Agendar cita'],
            ['key' => 'field_hero_btn2',          'label' => 'Botón 2 — Texto',    'name' => 'hero_btn2',         'type' => 'text',     'default_value' => 'Ver servicios'],
        ],
        'location' => [[ ['param' => 'page_type', 'operator' => '==', 'value' => 'front_page'] ]],
    ]);

    // ── SOBRE MÍ ────────────────────────────────────────────
    acf_add_local_field_group([
        'key'    => 'group_sobre',
        'title'  => 'Sobre mí',
        'fields' => [
            ['key' => 'field_sobre_imagen',       'label' => 'Foto',                'name' => 'sobre_imagen',      'type' => 'image',    'return_format' => 'array', 'preview_size' => 'medium'],
            ['key' => 'field_sobre_anios',        'label' => 'Años de experiencia', 'name' => 'sobre_anios',       'type' => 'text',     'default_value' => '8+'],
            ['key' => 'field_sobre_nombre',       'label' => 'Nombre',              'name' => 'sobre_nombre',      'type' => 'text',     'default_value' => 'Carlos Chacón'],
            ['key' => 'field_sobre_clinica',      'label' => 'Nombre clínica',      'name' => 'sobre_clinica',     'type' => 'text',     'default_value' => 'Fisens'],
            ['key' => 'field_sobre_desc1',        'label' => 'Párrafo 1',           'name' => 'sobre_desc1',       'type' => 'textarea', 'rows' => 3],
            ['key' => 'field_sobre_desc2',        'label' => 'Párrafo 2',           'name' => 'sobre_desc2',       'type' => 'textarea', 'rows' => 3],
            ['key' => 'field_sobre_credenciales', 'label' => 'Credenciales',        'name' => 'sobre_credenciales','type' => 'repeater', 'button_label' => 'Agregar credencial',
                'sub_fields' => [
                    ['key' => 'field_sobre_credencial', 'label' => 'Credencial', 'name' => 'credencial', 'type' => 'text'],
                ]
            ],
        ],
        'location' => [[ ['param' => 'page_type', 'operator' => '==', 'value' => 'front_page'] ]],
    ]);

    // ── SERVICIOS ───────────────────────────────────────────
    acf_add_local_field_group([
        'key'    => 'group_servicios',
        'title'  => 'Servicios',
        'fields' => [
            ['key' => 'field_servicios', 'label' => 'Servicios', 'name' => 'servicios', 'type' => 'repeater',
             'button_label' => 'Agregar servicio',
             'sub_fields' => [
                ['key' => 'field_servicio_icono',  'label' => 'Ícono (Font Awesome)', 'name' => 'icono',  'type' => 'text',
                 'instructions' => 'Ej: fa-solid fa-x-ray', 'default_value' => 'fa-solid fa-stethoscope'],
                ['key' => 'field_servicio_titulo', 'label' => 'Título',               'name' => 'titulo', 'type' => 'text'],
                ['key' => 'field_servicio_items',  'label' => 'Listado (un ítem por línea)', 'name' => 'items', 'type' => 'textarea', 'rows' => 5],
             ]
            ],
        ],
        'location' => [[ ['param' => 'page_type', 'operator' => '==', 'value' => 'front_page'] ]],
    ]);

    // ── POR QUÉ ELEGIRNOS ───────────────────────────────────
    acf_add_local_field_group([
        'key'    => 'group_razones',
        'title'  => '¿Por qué elegirnos?',
        'fields' => [
            ['key' => 'field_razones', 'label' => 'Razones', 'name' => 'razones', 'type' => 'repeater',
             'button_label' => 'Agregar razón',
             'sub_fields' => [
                ['key' => 'field_razon_icono',  'label' => 'Ícono (Font Awesome)', 'name' => 'icono',       'type' => 'text'],
                ['key' => 'field_razon_titulo', 'label' => 'Título',               'name' => 'titulo',      'type' => 'text'],
                ['key' => 'field_razon_desc',   'label' => 'Descripción',          'name' => 'descripcion', 'type' => 'textarea', 'rows' => 2],
             ]
            ],
        ],
        'location' => [[ ['param' => 'page_type', 'operator' => '==', 'value' => 'front_page'] ]],
    ]);

    // ── CONTACTO ────────────────────────────────────────────
    acf_add_local_field_group([
        'key'    => 'group_contacto',
        'title'  => 'Contacto',
        'fields' => [
            ['key' => 'field_contacto_whatsapp',  'label' => 'Número WhatsApp (sin +)',  'name' => 'contacto_whatsapp',  'type' => 'text',     'default_value' => '526461989276'],
            ['key' => 'field_contacto_telefono',  'label' => 'Teléfono visible',         'name' => 'contacto_telefono',  'type' => 'text',     'default_value' => '+52 646 198 9276'],
            ['key' => 'field_contacto_correo',    'label' => 'Correo electrónico',       'name' => 'contacto_correo',    'type' => 'email',    'default_value' => 'contacto@fisens.mx'],
            ['key' => 'field_contacto_horario',   'label' => 'Horario',                  'name' => 'contacto_horario',   'type' => 'textarea', 'rows' => 2, 'default_value' => "Lun – Vie: 8:00 – 20:00\nSáb: 9:00 – 14:00"],
            ['key' => 'field_contacto_maps_link', 'label' => 'Link Google Maps',         'name' => 'contacto_maps_link', 'type' => 'url',      'default_value' => 'https://maps.app.goo.gl/EqKmTDoCdnzjq8VV9'],
            ['key' => 'field_contacto_maps_embed','label' => 'URL Embed Google Maps',    'name' => 'contacto_maps_embed','type' => 'url',      'instructions' => 'Google Maps → Compartir → Insertar mapa → copia la URL del src=""'],
            ['key' => 'field_contacto_instagram', 'label' => 'Instagram URL',            'name' => 'contacto_instagram', 'type' => 'url',      'default_value' => 'https://www.instagram.com/fisens_fisioterapia'],
            ['key' => 'field_contacto_facebook',  'label' => 'Facebook URL',             'name' => 'contacto_facebook',  'type' => 'url',      'default_value' => 'https://www.facebook.com/share/18c4vVynco/?mibextid=wwXIfr'],
        ],
        'location' => [[ ['param' => 'page_type', 'operator' => '==', 'value' => 'front_page'] ]],
    ]);
}
