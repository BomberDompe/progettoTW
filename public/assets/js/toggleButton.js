function classToggle() {
  const navs = document.querySelectorAll('.navbar-collapse');
  
  navs.forEach(nav => nav.classList.toggle('collapse'));
}

document.querySelector('.navbar-toggler')
  .addEventListener('click', classToggle);