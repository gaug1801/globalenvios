import {formatCurrency} from "./utils/money.js";
const volumeConstantCents = 178200;
const vzlaPricePerFootCents = 3300;

const previousButtonElement = document.querySelector('.js-prev-button');
const nextButtonElement = document.querySelector('.js-next-button');
const inputZipElement = document.querySelector('.js-zip-input');
const inputHeightElement = document.querySelector('.js-height-input');
const inputLengthElement = document.querySelector('.js-length-input');
const inputWidthElement = document.querySelector('.js-width-input');
const inputWeightElement = document.querySelector('.js-weight-input');

nextButtonElement.addEventListener('click', ()=> {
  let zip = inputZipElement.value;
  let height = inputHeightElement.value;
  let length = inputLengthElement.value;
  let width = inputWidthElement.value;
  let weight = inputWeightElement.value;
  let boxVolume = (length * width * height);

  let boxPrice = formatCurrency(((boxVolume * 100) / volumeConstantCents) * vzlaPricePerFootCents);

  console.log(boxPrice);

  localStorage.setItem('zip', JSON.stringify(zip));
  localStorage.setItem('height', JSON.stringify(height));
  localStorage.setItem('length', JSON.stringify(length));
  localStorage.setItem('width', JSON.stringify(width));

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

  // console.log(JSON.parse(localStorage.getItem('previous-html')));
  document.querySelector('.calculator-step-one').innerHTML = html;
  document.querySelector('.js-prev-button').classList.add('is-visible');
});

previousButtonElement.addEventListener('click', ()=> {
  document.querySelector('.calculator-step-one').innerHTML = JSON.parse(localStorage.getItem('previous-html'));
  previousButtonElement.classList.remove('is-visible');

});
