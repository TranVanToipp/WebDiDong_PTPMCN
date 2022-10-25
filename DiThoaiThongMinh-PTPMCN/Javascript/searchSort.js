var url_product = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/ProductPriceTang.php";
function start() {
    getproduct(hanlderProductSortReduce);
}
start();
function getproduct(callback) {
    fetch(url_product)
        .then(function (response) {
            return response.json();
        })
        .then(callback);
}

function hanlderProductSortReduce(data) {
    var itemProduct = document.querySelector('.grid-row');
    var html = data.data.map((item) => {
        return `
        <a class="col l-2 m-4 c-6" >
            <div class="home-product-item">
                    <div class="home-product-item-img" style="background-image:url(${item.img});"></div>
                    <h4 class="home-product-item-name">${item.title}</h4>
                <div class="home-product-item-price">
                    <span class="home-product-item__price-current">${item.price}</span>
                    <span class="home-product-item__price-old">${item.thumnail}</span>
                </div>
                <div class="home-product-item__sale-off">
                    <span class="home-product-item__sale-off-percent">${item.discount}</span>
                </div>
            </div>
        </a>'
        `;
    });
    itemProduct.innerHTML = html.join('');
}

                          