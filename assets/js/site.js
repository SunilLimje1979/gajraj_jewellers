document.addEventListener('click', function (event) {
  if (event.target.closest('.menu-toggle')) document.querySelector('.nav').classList.toggle('open');
});
