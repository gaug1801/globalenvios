let btn = document.querySelector('#btn')
let sidebar = document.querySelector('.dropdown-menu')
let modal = document.querySelector('#myModal');

btn.onclick = function() {
  sidebar.classList.toggle('active');
  modal.classList.toggle('active');

  if (sidebar.classList.contains('active') && modal.classList.contains('active')) {
    btn.classList.add('bx-x');
    btn.classList.remove('bx-menu') 
  } else {
    btn.classList.remove('bx-x');
    btn.classList.add('bx-menu') 
  }
}