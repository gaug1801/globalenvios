/*
  Exchange Rate API documentation: https://www.exchangerate-api.com/docs/supported-currencies
*/

const button = document.querySelector('.js-ok-button');
console.log(button);
if (button) {
  button.addEventListener('click', () => {
      console.log('Button clicked');
      document.querySelector('.price-modal').classList.add('not-visible');
  });
} else {
  console.error('Button not found');
}

fetchExchangeRates();

function fetchExchangeRates() {
  document.addEventListener('DOMContentLoaded', () => {
    const apiUrl = 'https://v6.exchangerate-api.com/v6/4029fdad655123860efffc6d/latest/USD';
  
    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json(); // Parse the response as JSON
        })
        .then(data => {
            // console.log('Exchange Rate Data:', data);
  
            /*
              My approach here to simplify this will involve
              taking the data object and finding a way to do
              a for loop that finds the rates desired
              and passes them to an array which will then be 
              looped throuh and generate all the HTML.          
            */
  
            // Get the exchange rate for desired currencies 
            const mxnRate = data.conversion_rates.MXN.toFixed(2);
            const copRate = data.conversion_rates.COP.toFixed(2);
            const gtqRate = data.conversion_rates.GTQ.toFixed(2);
            const hnlRate = data.conversion_rates.HNL.toFixed(2);
            const vesRate = data.conversion_rates.VES.toFixed(2);
  
  
            // Display only the desired rates
            const container = document.querySelector('.price-modal');
            if (mxnRate && copRate) {
                container.innerHTML += `
                    <div class="exchange-rate-container">
                      <div class="exchange-row montserrat-modal-font"><img class="modal-flags" src="../icons/mexico.svg"><p>México ${mxnRate} MXN</p></div>
                      <div class="exchange-row montserrat-modal-font"><img class="modal-flags" src="../icons/colombia.svg"><p>Colombia ${copRate} COP</p></div>
                      <div class="exchange-row montserrat-modal-font"><img class="modal-flags" src="../icons/guatemala.svg"><p>Guatemala ${gtqRate} GTQ</p></div>
                      <div class="exchange-row montserrat-modal-font"><img class="modal-flags" src="../icons/honduras.svg"><p>Honduras ${hnlRate} HNL</p></div>
                      <div class="exchange-row montserrat-modal-font"><img class="modal-flags" src="../icons/venezuela.svg"><p>Venezuela ${vesRate} VES</p></div>
                    </div>
                `;
            } else {
                container.innerHTML = '<p>Exchange rate for MXN not available.</p>';
            }
        })
        .catch(error => {
            console.error('Error fetching exchange rate data:', error);
            const container = document.querySelector('.price-modal');
            container.innerHTML = '<p>Failed to load exchange rate data.</p>';
        });
  });
}
