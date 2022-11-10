const UserAPI = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/read_type.php';
function start() {
    
    getUser(handleLogin);
}
start();
function getUser(callback) {
    fetch(UserAPI)
        .then(function (response) {
            return response.json();
        })
        .then(callback);
}
function handleLogin(data) {
    var typeProduct = document.querySelector('.header__nav-tab');
    
    var productItem = document.querySelector('.grid-row');
    data.data.forEach( function (item) {
        console.log(item);
        // var APIType = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/read.php?product_type=".item.product_type;
        // console.log(APIType);
        var array = Object.entries(item);
        var html  = array.map(function (item) {
             return `
            <img src="./assets/img/quangcao-containner/dienthoai_1637814357.svg" alt="" class="header__nav-tab-img">
            <div class="header__nav-tab-vac">
                <span>${item.product_type_name}</span>
            </div>
            `;
        });
        typeProduct.innerHTML = html.join('');
    });
    
    
}


