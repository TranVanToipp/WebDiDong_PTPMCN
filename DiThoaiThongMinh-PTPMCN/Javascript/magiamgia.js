
var baseURL = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api'
var URLSale = baseURL+'/sale/select_sale.php';

function start() {
    getProductSale(handleProductSale);
	Window.location.load(false);
}
start();

function getProductSale (callback) {
    fetch(URLSale)
        .then(function (respon) {
            return respon.json();
        })
        .then(callback);
}

function handleProductSale(data) {
    var i = 0;
    var elementProduct = document.querySelector('.box-sale-products-content');
    
    var html = data.data.map(function (item) {
        i++;
        var noW1 = new Date().getTime();
        var timeStart = new Date(item.time_sale).getTime();
		var timeStop = new Date(item.time_salestop).getTime();//xem lấy time từ server..
            if(noW1>=timeStart && noW1 <= timeStop && item.status_sale != 0){
                (function(i) {
                    setInterval(function () {
                        var noW = new Date().getTime();
                        var full = new Date(item.time_salestop).getTime();
                        var D = full  -  noW;
                        var Days =  Math.floor(D/(1000*60*60*24));
                        var hours =  Math.floor(D/(1000*60*60));
                        var minutes =  Math.floor(D/(1000*60));
                        var seconds =  Math.floor(D/(1000));
                        hours %=24
                        minutes %=60
                        seconds %= 60
                        
                        document.querySelector(".sale_time-down-itemday"+i+" b").innerText = Days
                        document.querySelector(".sale_time-down-itemhours"+i+" b").innerText = hours
                        document.querySelector(".sale_time-down-itemminute"+i+" b").innerText = minutes
                        document.querySelector(".sale_time-down-itemsecond"+i+" b").innerText = seconds
                        
                    },1000);
                })(i);
                return`
                    <a href ="../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/chitietSP/index.php?id=${item.id_product_sale}&sale=1" class="col l-2-4 m-4 c-6 box-sale-products-item__box" style="text-decoration: none;">
                        
                        <div class="home-product-item">
                            <div class="home-product-item-img" style="background-image:url(./admin/product/image/${item.thumnail});">
                            <div class="box-price-product">
                                <div class="discount_box__product">
                                    <img src="./assets/img/magiamgia/icon_flash.svg" alt="">
                                    <span class="discount_val__product">
                                        ${item.discount_product_sale}%
                                    </span>
                                </div>
                                <div class="price_sale--product">
                                ${Math.round((item.price-item.price*item.discount_product_sale/100)*100)/100}đ
                                </div>
                            </div>
                            <div class="view_product--sold">
                                <div class="cout_total">
                                    <div class="text_sale">
                                        Đã bán ${item.num_buy}/${item.number_sale}
                                    </div>
                                </div>
                            </div>
                        </div>
                            <h4 class="home-product-item-name">${item.title}</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item__price-current">${Math.round((item.price-item.price*item.discount_product_sale/100)*100)/100}Đ</span>
                                <span class="home-product-item__price-old">${item.price}Đ</span>
                            </div>
                            <div class="sale-time-product">
                                <div class="sale_time-down">
                                    <span class="icon-sale">
                                        <img src="./assets/img/magiamgia/clock_active.svg" alt="">

                                    </span>
                                    <div class="sale_time-down-content">
                                        <span class="sale_time-down-itemday${i}">
                                            <b></b><b>d</b>
                                        </span>
                                        <span class="sale_time-down-itemhours${i}">
                                            <b></b><b>h</b>
                                        </span>
                                        <span class="sale_time-down-itemminute${i}">
                                            <b></b><b>m</b>
                                        </span>
                                        <span class="sale_time-down-itemsecond${i}">
                                            <b></b><b>s</b>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                    </a>
              
                `;
            }
    });
    elementProduct.innerHTML = html.join('');

    var listProductSale = document.querySelector('.box-sale-products-content');
                
    var firstImgLeft = document.querySelector('.box-sale-next-left');
    
    var firstImgRight = document.querySelector('.box-sale-next-right');
    var ItemProduct = document.querySelectorAll('.box-sale-products-item__box')[0];
    
    
    var isDragStart = false, prePageX, prevScrollLeft;
    
    var dragStart = (e) => {
        isDragStart = true;
        prePageX = e.pageX;
        prevScrollLeft = listProductSale.scrollLeft;
    }
    const dragging = (e) => {
        if (!isDragStart) return;
        e.preventDefault();
        listProductSale.classList.add("dragging");
        var positionDiff = e.pageX - prePageX;
        listProductSale.scrollLeft = prevScrollLeft - positionDiff;
    }
    
    var backItem = ItemProduct.clientWidth + 0;
    
    
    function nextProduct() {
        //next thì làm gì?
        listProductSale.scrollLeft -= backItem;
    }
    
    function backProduct() {
        //back thì làm gì?
        listProductSale.scrollLeft += backItem;
    }
    
    var dragStop = () => {
        isDragStart = false;
        listProductSale.classList.remove("dragging");
    }
    
    listProductSale.addEventListener("mousedown", dragStart);
    listProductSale.addEventListener("mousemove", dragging);
    listProductSale.addEventListener("mouseup", dragStop);

    firstImgLeft.addEventListener('click', backProduct);
    firstImgRight.addEventListener('click', nextProduct);
}


                






