/*
  Exchange Rate API documentation: https://www.exchangerate-api.com/docs/supported-currencies
*/

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
            console.log('Exchange Rate Data:', data);
  
            /*
              My approach here to simplify this will involve
              taking the data object and finding a way to do
              a for loop that finds the rates desired
              and passes them to an array which will then be 
              looped throuh and generate all the HTML.          
            */
  
            // Get the exchange rate for desired currencies 
            const mxnRate = data.conversion_rates.MXN;
            const copRate = data.conversion_rates.COP;
            const gtqRate = data.conversion_rates.GTQ;
            const hnlRate = data.conversion_rates.HNL;
            const vesRate = data.conversion_rates.VES;
  
  
            // Display only the desired rates
            const container = document.querySelector('.main-services-subtitle');
            if (mxnRate && copRate) {
                container.innerHTML = `
                    <p>1 USD = ${mxnRate} MXN</p>
                    <p>1 USD = ${copRate} COP</p>
                    <p>1 USD = ${gtqRate} GTQ</p>
                    <p>1 USD = ${hnlRate} HNL</p>
                    <p>1 USD = ${vesRate} VES</p>
                `;
            } else {
                container.innerHTML = '<p>Exchange rate for MXN not available.</p>';
            }
        })
        .catch(error => {
            console.error('Error fetching exchange rate data:', error);
            const container = document.querySelector('.main-services-subtitle');
            container.innerHTML = '<p>Failed to load exchange rate data.</p>';
        });
  });
}
