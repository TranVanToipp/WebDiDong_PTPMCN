<style>
#accordion>.cap  { 
        background: lightseagreen; padding: 8px 10px;
        font-weight: bold; text-transform: uppercase; 
        cursor: pointer; color: white;font-size: 18px;
}
#accordion > .ct > label {
        margin: 8px 0 8px 30px;
        font-size: 18px; 
        display: block; 
        cursor: pointer; 
}
#accordion > .ct input { width: 16px; height: 16px; margin-right: 10px;}


#list1 {
    display: grid;
    grid-template-columns: 33.3% 33.3%  33.3% ;
}
#list1 > .dt {
    text-align: center; border: 2px solid darkcyan; margin: 10px;
}
#list1 > .dt >img {
    max-width: 90%; height: 200px; margin-top: 10px;
}

</style>
<div id="accordion">
<div class="cap">Đã Chọn</div>
<div id="ct1" >
 
</div>
<div class="cap">Thương hiệu</div>
<div class="ct" > 
    <label><input onchange="chonDT()" type="checkbox" class="thuonghieu" value="Apple"><span>Apple</span></label>
    <label><input onchange="chonDT()" type="checkbox" class="thuonghieu" value="OPPO">Oppo</label>
    <label><input onchange="chonDT()" type="checkbox" class="thuonghieu" value="Samsung">Samsung</label>
    <label><input onchange="chonDT()" type="checkbox" class="thuonghieu" value="Xiaomi">Xiaomi</label>
    <label><input onchange="chonDT()" type="checkbox" class="thuonghieu" value="Vivo">Vivo</label>
</div>
<div class="cap">Giá bán</div>
<div class="ct"> 
    <label><input onchange="chonDT()" type="checkbox" class="giaban" value="Dưới 5 triệu">Dưới 5 triệu</label>
    <label><input onchange="chonDT()" type="checkbox" class="giaban" value="Từ 5 đến 10 triệu">Từ 5 đến 10 triệu</label>
    <label><input onchange="chonDT()" type="checkbox" class="giaban" value="Từ 10 đến 15 triệu">Từ 10 đến 15 triệu</label>
    <label><input onchange="chonDT()" type="checkbox" class="giaban" value="Trên 15 triệu">Trên 15 triệu</label>
</div>
<div class="cap">Màn hình</div>
<div class="ct"> 
    <label><input type="checkbox" class="manhinh" value="1">Dưới 5 inch</label>
    <label><input type="checkbox" class="manhinh" value="2">Từ 5 inch trở lên</label>
</div>
</div>  
<div id="list1">
    
</div>


<script>


var arrDT =[
    { 
        tenDT:'Xiaomi Redmi 9A 2GB/32GB Xanh dương', 
        gia:2290000 , 
        hinh:'', 
        thuonghieu:'Xiaomi',
        manhinh:"4.5"
    },
    { 
        tenDT:'Samsung Galaxy A52 4G 8GB/128GB Xanh', 
        gia: 8290000, 
        hinh:'', 
        thuonghieu:'Samsung',
        manhinh:"5.2"
    },
    { 
        tenDT:'Samsung Galaxy A32 4G 6GB/128GB Xanh', 
        gia: 5990000, 
        hinh:'', 
        thuonghieu:'Samsung',
        manhinh:"4.8"
    },
    { 
        tenDT:'Xiaomi Redmi 9C 3GB/64GB Xám', 
        gia: 2990000, 
        hinh:'', 
        thuonghieu:'Xiaomi',
        manhinh:"4.6"
    },
    { 
        tenDT:'OPPO A55 4GB/64GB Xanh', 
        gia: 4550000, 
        hinh:'', 
        thuonghieu:'OPPO',
        manhinh:"4.9"
    },
    { 
        tenDT:'iPhone 11 64GB Trắng', 
        gia: 11990000, 
        hinh:'', 
        thuonghieu:'Apple',
        manhinh:"6.0"
    },
    { 
        tenDT:'iPhone 13 Pro 128GB Vàng Đồng', 
        gia:27990000 , 
        hinh:'', 
        thuonghieu:'Apple',
        manhinh:"5.5"
    },
    { 
        tenDT:'iPhone 11 64GB Tím', 
        gia: 11990000, 
        hinh:'', 
        thuonghieu:'Apple',
        manhinh:"5.8"
    },
    { 
        tenDT:'Vivo Y15s 3GB/32GB Xanh Đen', 
        gia: 3190000, 
        hinh:'', 
        thuonghieu:'6.2',
        manhinh:"4.8"
    },
    { 
        tenDT:'Vivo Y72 5G 8GB/128GB Đen', 
        gia: 6890000, 
        hinh:'', 
        thuonghieu:'Vivo',
        manhinh:"6.5"
    },
    { 
        tenDT:'Vivo V23e 8GB/128GB Đen', 
        gia:7390000 , 
        hinh:'', 
        thuonghieu:'Vivo',
        manhinh:"6.4"
    },
    { 
        tenDT:'Samsung Galaxy S21 Ultra 5G 12GB/128GB Bạc', 
        gia: 24990000, 
        hinh:'', 
        thuonghieu:'Samsung',
        manhinh:"6.5"
    },
    { 
        tenDT:'Samsung Galaxy A13 4GB/128GB Đen', 
        gia: 4290000, 
        hinh:'', 
        thuonghieu:'Samsung',
        manhinh:"4.9"
    },
    { 
        tenDT:'Samsung S21 FE 5G 8GB/128GB Tím', 
        gia: 14490000, 
        hinh:'', 
        thuonghieu:'Samsung',
        manhinh:"5.8"
    },
    { 
        tenDT:'Samsung Galaxy S20 FE 8GB/256GB Xanh', 
        gia:10990000 , 
        hinh:'', 
        thuonghieu:'Samsung',
        manhinh:"5.7"
    }
];
function chonDT(){
	var arr1 = document.getElementsByClassName("thuonghieu");
	var thuonghieuchon_arr = [];
	for(i=0;i<arr1.length;i++){
		if(arr1[i].checked == true)
			thuonghieuchon_arr.push(arr1[i].value);
	}
	
	var arr2 = document.getElementsByClassName("giaban");
	var giaban_arr=[];
	for(i=0;i<arr2.length;i++){
		if(arr2[i].checked == true)
			giaban_arr.push(arr2[i].value);
	}
	hienDT(thuonghieuchon_arr, giaban_arr);
	hienDTDC(thuonghieuchon_arr,giaban_arr);
	
}
function hienDT(thuonghieuchon_arr = [], giaban_arr = []){
	var list1 = document.getElementById("list1");
	list1.innerHTML = '';
	for(i=0; i<arrDT.length; i++){
		thuonghieuDT = arrDT[i].thuonghieu;
		manhinhDT = arrDT[i].manhinh;
		giaDT = arrDT[i].gia;
		
		if(thuonghieuchon_arr.length>0){
			if(thuonghieuchon_arr.includes(thuonghieuDT) == false) continue;
		}
		if(giaban_arr.length>0){
			if(giaDT < 5000000 && giaban_arr.includes('Dưới 5 triệu') == false) continue;
			if(giaDT >= 5000000 && giaDT < 10000000 && giaban_arr.includes('Từ 5 đến 10 triệu') == false) continue;
			if(giaDT >= 10000000 && giaDT <15000000 && giaban_arr.includes('Từ 10 đến 15 triệu') == false) continue;
			if(giaDT >= 15000000 && giaban_arr.includes('Trên 15 triệu') == false) continue;
		}
		list1.innerHTML +=`
		<div class="dt"> <img src = "${arrDT[i].hinh}">
		<h3>${arrDT[i].tenDT}</h3>
		<h4>${arrDT[i].gia} -${arrDT[i].manhinh}</h4>
		`;
	}
}
hienDT();
function hienDTDC(thuonghieuchon_arr = [], giaban_arr = []){
	var list2 = document.getElementById("ct1");
	list2.innerHTML = '';
		if(thuonghieuchon_arr.length>0){
			for(i=0; i<thuonghieuchon_arr.length; i++){
				list2.innerHTML +=`
					<div>${thuonghieuchon_arr[i]}</div>`;
			}
		}
		if(giaban_arr.length>0){
			for(i=0; i<giaban_arr.length; i++){
				list2.innerHTML +=`
					<div>${giaban_arr[i]}</div>`;
			}
		}
	}
hienDTDC();
</script>
