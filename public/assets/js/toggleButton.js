
// Esegue il toogle del menù-navbar a tendina
function classToggle() {
  const navs = document.querySelectorAll('.navbar-collapse');
  navs.forEach(nav => nav.classList.toggle('collapse'));
}

// Assegna un EventListener al pulsante della navbar
document.querySelector('.navbar-toggler')
  .addEventListener('click', classToggle);