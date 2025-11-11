document.addEventListener('DOMContentLoaded', function () {
  const hamburger = document.querySelector('.hamburger');
  const navMenu = document.querySelector('.nav ul');

  // If either element is missing on the page, exit cleanly
  if (!hamburger || !navMenu) return;

  // Toggle menu
  hamburger.addEventListener('click', function () {
    navMenu.classList.toggle('show');
    hamburger.classList.toggle('active');

    const expanded = hamburger.getAttribute('aria-expanded') === 'true';
    hamburger.setAttribute('aria-expanded', (!expanded).toString());
  });

  // Hide menu after clicking a nav link on small screens
  document.querySelectorAll('.nav ul li a').forEach(link => {
    link.addEventListener('click', () => {
      if (window.innerWidth <= 768) {
        navMenu.classList.remove('show');
        hamburger.classList.remove('active');
        hamburger.setAttribute('aria-expanded', 'false');
      }
    });
  });
});