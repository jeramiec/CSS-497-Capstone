const StockXAPI = require('stockx-api');
const stockX = new StockXAPI();

stockX.fetchProductDetails('https://stockx.com/adidas-yeezy-boost-700-magnet')
.then(product => console.log(product))
.catch(err => console.log(`Error scraping product details: ${err.message}`));