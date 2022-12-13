var itemParent = document.querySelector('.product-laysanpham');

itemParent.onclick = function(e) {
    var sanphamitem = e.target.closest('.home-product-item');
     if (sanphamitem) {
        var id = sanphamitem.querySelector('.home-product-item-id').innerText;
        console.log(id);
        var imgSP = sanphamitem.querySelector('.home-product-item-img');
        var imgSPCo = imgSP.getAttribute('background-image');
        
        var titleSP = sanphamitem.querySelector('.home-product-item-name').innerText;
        var priceSP = sanphamitem.querySelector('.home-product-item__price-current').innerText;
        
        var discountSP = sanphamitem.querySelector('.home-product-item__price-old').innerText;
        var percentSP = sanphamitem.querySelector('.home-product-item__sale-off-percent').innerText;
		localStorage.setItem('idSP', String(id));  
            var objectSanPham  =  [
                {
                    id: id,
                    img: imgSPCo,
                    name:titleSP, 
                    price:priceSP, 
                    discount:discountSP, 
                    percent:percentSP
                }
            ]

        
     }
}
