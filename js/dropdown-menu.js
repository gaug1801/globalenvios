let btn = document.querySelector('#btn')
let sidebar = document.querySelector('.dropdown-menu')
let modal = document.querySelector('#myModal');

btn.onclick = function() {
  sidebar.classList.toggle('active');
  modal.classList.toggle('active');
}
