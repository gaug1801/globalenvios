const previousButtonElement = document.querySelector('.js-prev-button');
const nextButtonElement = document.querySelector('.js-next-button');
let isCalcRendered = true;
 
nextButtonElement.addEventListener('click', ()=> {
  renderCalcResults();
  isCalcRendered = false;
});

previousButtonElement.addEventListener('click', ()=> {
  renderCalc();
  isCalcRendered = true;
});

renderDestinationFlag();

document.querySelector('.body').addEventListener('keydown', (event)=> {
  if (event.key === 'Enter') {
    renderCalcResults();
    isCalcRendered = false;
  }
  else if (event.key === 'Backspace' && isCalcRendered === false) {
    renderCalc();
    isCalcRendered = true
  }
});

function convertObjectToString(string){
  return JSON.parse(localStorage.getItem(string))
}

function renderCalcResults() {
    //  Update progression bar
    document.querySelector('#step-one').classList.add('last-step');
    document.querySelector('#step-one').classList.remove('current-step');
    document.querySelector('#step-two').classList.add('current-step');
    document.querySelector('#step-two').classList.remove('next-step');
  
    //  Store data
    let zip = document.querySelector('.js-zip-input').value;
    let dimensions = document.querySelector('.js-dimensions-input').value;
    let weight = document.querySelector('.js-weight-input').value;
    let country = document.querySelector('.js-country-input').value;
    
    let boxPrice = 0;

    switch (dimensions) {
      case 'small':
        boxPrice = 138;
        break;
      case 'medium':
        boxPrice = 177;
        break;
      case 'large':
        boxPrice = 231;
        break;
      case 'extra-large':
        boxPrice = 299;
        break;
      default:
        boxPrice = 0;
    }
  
    //  Store data into localStorage
    localStorage.setItem('zip', JSON.stringify(zip));
    localStorage.setItem('dimensions', JSON.stringify(dimensions));
    localStorage.setItem('weight', JSON.stringify(weight));
    localStorage.setItem('country', JSON.stringify(country));
  
    //  Generate HTML
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
  
    //  Store the calculator HTML
    let previousHTML = document.querySelector('.calculator-step-one').innerHTML;
    localStorage.setItem('previous-html', JSON.stringify(previousHTML));
  
    //  Display HTML 
    document.querySelector('.calculator-step-one').innerHTML = html;
  
    //  Enable "Previous" button
    document.querySelector('.js-prev-button').classList.add('is-visible');
}

document.querySelector('.body').addEventListener('keydown', (event)=> {
  if (event.key === 'Enter') {

  }
});

function renderCalc() {
  //  Disable "Previous" button
  previousButtonElement.classList.remove('is-visible')

  //  Revert progression bar
  document.querySelector('#step-one').classList.add('current-step');
  document.querySelector('#step-one').classList.remove('last-step');
  document.querySelector('#step-two').classList.add('next-step');
  document.querySelector('#step-two').classList.remove('current-step');

  //Display previous values
  document.querySelector('.calculator-step-one').innerHTML 
    = convertObjectToString(('previous-html'));
  document.querySelector('.js-zip-input').value = convertObjectToString('zip');
  document.querySelector('.js-dimensions-input').value = convertObjectToString('dimensions');
  document.querySelector('.js-weight-input').value = convertObjectToString('weight');
  document.querySelector('.js-country-input').value = convertObjectToString('country');
  renderDestinationFlag();
}

function renderDestinationFlag() {
  document.querySelector('.js-country-input').addEventListener('input', ()=> {
    let flag = document.querySelector('.js-dest-flag');
    let country = document.querySelector('.js-country-input');
  
    switch(country.value) {
      case 'venezuela':
        flag.src = `icons/${country.value}.svg`;
        break;
      case 'colombia':
        flag.src = `icons/${country.value}.svg`;
        break;
      case 'mexico':
        flag.src = `icons/${country.value}.svg`;
        break;
      case 'peru':
        flag.src = `icons/${country.value}.svg`;
        break;
      case 'ecuador':
        flag.src = `icons/${country.value}.svg`;
        break;
      case 'el-salvador':
        flag.src = `icons/${country.value}.svg`;
        break;
      case 'guatemala':
        flag.src = `icons/${country.value}.svg`;
        break;
      case 'dominican-republic':
        flag.src = `icons/${country.value}.svg`;
        break;
      case 'honduras':
        flag.src = `icons/${country.value}.svg`;
        break;
      default:
        flag.src = '';
    }
  });
}