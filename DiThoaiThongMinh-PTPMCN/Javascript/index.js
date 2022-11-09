// FILE NÀY SẼ VIẾT CÁC TÍNH NĂNG TRÊN TRANG 
// đoạn này code scroll trang
const $1 = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

window.onscroll = () => {
    if (this.pageYOffset > 150){
        $1('.header').classList.add('sticky');
    }else {
        $1('.header').classList.remove('sticky');
    }
}


const btnclodeModel = document.querySelector('.close-model-chitiet');
const btnHienModel = document.querySelector('.tinhtrang-button__chitiet-link');
const model = document.querySelector('.modal-chitiet');
function showModelChiTiet() {
    event.preventDefault();
    model.classList.add('open')
}

function closeModelChiTiet() {
    model.classList.remove('open');
}

btnHienModel.addEventListener('click',showModelChiTiet);
btnclodeModel.addEventListener('click',closeModelChiTiet);



