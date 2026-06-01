/* ========== NAVBAR SCROLL ========== */
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
  navbar.classList.toggle('scrolled', window.scrollY > 60);
});

/* ========== HAMBURGER / MOBILE MENU ========== */
const hamburger = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobile-menu');
const mobileClose = document.getElementById('mobile-menu-close');
const mobileLinks = document.querySelectorAll('.mobile-link');

function openMenu() {
  mobileMenu.classList.add('open');
  document.body.style.overflow = 'hidden';
}
function closeMenu() {
  mobileMenu.classList.remove('open');
  document.body.style.overflow = '';
}

hamburger.addEventListener('click', openMenu);
mobileClose.addEventListener('click', closeMenu);
mobileLinks.forEach(link => link.addEventListener('click', closeMenu));

/* ========== SCROLL REVEAL ========== */
const reveals = document.querySelectorAll(
  '.servicio-card, .razon, .sobre-text, .sobre-img-wrap, .contacto-info, .contacto-form'
);
reveals.forEach(el => el.classList.add('reveal'));

const revealObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      revealObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.1 });

reveals.forEach(el => revealObserver.observe(el));

/* ========== FORM → WHATSAPP ========== */
const form = document.getElementById('contacto-form');
const WHATSAPP_NUMBER = '526461989276';

form.addEventListener('submit', e => {
  e.preventDefault();
  const nombre = form.nombre.value.trim();
  const telefono = form.telefono.value.trim();
  const servicio = form.servicio.value || 'No especificado';
  const mensaje = form.mensaje.value.trim();

  const texto = `Hola, me llamo *${nombre}*.%0A%0A` +
    `Teléfono: ${telefono}%0A%0A` +
    `Servicio de interés: *${servicio}*%0A%0A` +
    `Mensaje: ${mensaje}`;

  window.open(`https://wa.me/${WHATSAPP_NUMBER}?text=${texto}`, '_blank');
});
