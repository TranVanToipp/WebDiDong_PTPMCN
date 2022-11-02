const $$$$ = document.querySelector.bind(document);
const $$$ = document.querySelectorAll.bind(document);    

const tabItems = $$$('.tab-item');///dots
const tabpanes = $$$('.header__slide-inner');//slide

tabItems.forEach((tab, index) => {
    const pane = tabpanes[index];
    tab.onclick = function () {
        $$$$('.tab-item.active').classList.remove('active');
        $$$$('.header__slide-inner.active').classList.remove('active');

        pane.classList.add('active');
        this.classList.add('active');
    }
});

const backBtn = $$$$('.slide-left')
const nextBtn = $$$$('.slide-right')
var slideNumber = 0
var slideIndex = 0
nextBtn.addEventListener('click', () => {
    tabItems.forEach(function (item) {
        item.classList.remove('active')
    });

    tabpanes.forEach(function (item) {
        console.log(item);
        item.classList.remove('active');
    });

    slideNumber ++;
    if (slideNumber > tabItems.length-1){
        slideNumber =0;
    }

    tabItems[slideNumber].classList.add('active')
    tabpanes[slideNumber].classList.add('active')
});

backBtn.addEventListener('click', () => {
    tabItems.forEach(function (item) {
        item.classList.remove('active')
    });

    tabpanes.forEach(function (item) {
        console.log(item);
        item.classList.remove('active');
    });
    
    slideNumber --;
    if (slideNumber < 0){
        slideNumber = tabItems.length -1;
    }

    tabItems[slideNumber].classList.add('active')
    tabpanes[slideNumber].classList.add('active')
})

//audo slide 
function audoSlide() {
    setInterval(function() {
        tabItems.forEach(function (item) {
            item.classList.remove('active')
        });
    
        tabpanes.forEach(function (item) {
            item.classList.remove('active');
        });
    
        slideNumber ++;
        if (slideNumber > tabItems.length-1){
            slideNumber =0;
        }
    
        tabItems[slideNumber].classList.add('active')
        tabpanes[slideNumber].classList.add('active')
    },5000);
}

audoSlide();
