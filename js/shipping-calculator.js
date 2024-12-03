import {formatCurrency} from "./utils/money.js";
const volumeConstantCents = 178200;
const vzlaPricePerFootCents = 3300;
const previousButtonElement = document.querySelector('.js-prev-button');
const nextButtonElement = document.querySelector('.js-next-button');

nextButtonElement.addEventListener('click', ()=> {
  document.querySelector('#step-one').classList.add('last-step');
  document.querySelector('#step-one').classList.remove('current-step');
  document.querySelector('#step-two').classList.add('current-step');
  document.querySelector('#step-two').classList.remove('next-step');

  let zip = document.querySelector('.js-zip-input').value;
  let height = document.querySelector('.js-height-input').value;
  let length = document.querySelector('.js-length-input').value;
  let width = document.querySelector('.js-width-input').value;
  let weight = document.querySelector('.js-weight-input').value;
  let city = document.querySelector('.js-city-input').value;
  let boxVolume = (length * width * height);

  let boxPrice = formatCurrency(((boxVolume * 100) / volumeConstantCents) * vzlaPricePerFootCents);

  localStorage.setItem('zip', JSON.stringify(zip));
  localStorage.setItem('height', JSON.stringify(height));
  localStorage.setItem('length', JSON.stringify(length));
  localStorage.setItem('width', JSON.stringify(width));
  localStorage.setItem('weight', JSON.stringify(weight));
  localStorage.setItem('city', JSON.stringify(city));

  let html = 
  `
    <p class="result-title">COSTOS ESTIMADOS</p>
    <div class="result-input-container">
      <div class="result-row">
      <p>Costo del servicio maritimo (USD $)</p>
      <input class="result-display" type="text" value="${boxPrice}" readonly>
      </div>
    </div>
  `;

  let previousHTML = document.querySelector('.calculator-step-one').innerHTML;
  
  localStorage.setItem('previous-html', JSON.stringify(previousHTML));

  document.querySelector('.calculator-step-one').innerHTML = html;
  document.querySelector('.js-prev-button').classList.add('is-visible');
});

previousButtonElement.addEventListener('click', ()=> {
  previousButtonElement.classList.remove('is-visible')

  document.querySelector('#step-one').classList.add('current-step');
  document.querySelector('#step-one').classList.remove('last-step');
  document.querySelector('#step-two').classList.add('next-step');
  document.querySelector('#step-two').classList.remove('current-step');

  document.querySelector('.calculator-step-one').innerHTML 
    = convertObjectToString(('previous-html'));
  document.querySelector('.js-city-input').value= convertObjectToString('city');
  document.querySelector('.js-zip-input').value = convertObjectToString('zip');
  document.querySelector('.js-height-input').value = convertObjectToString('height');
  document.querySelector('.js-length-input').value = convertObjectToString('length');
  document.querySelector('.js-width-input').value = convertObjectToString('width');
  document.querySelector('.js-weight-input').value = convertObjectToString('weight');
  document.querySelector('.js-city-input').value = convertObjectToString('city');
});

function convertObjectToString(string){
  return JSON.parse(localStorage.getItem(string))
}