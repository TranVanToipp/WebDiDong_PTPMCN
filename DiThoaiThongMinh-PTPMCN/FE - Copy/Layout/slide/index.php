      
    <style>
    .header__slide-show .slide-left{
        position:absolute;
        left: 55px;
        top: 40%;
        font-size: 1.4rem;
        border:10px solid #ccc;
        background-color:#ccc;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        cursor: pointer;
        opacity: 0.7;
    }

    .slide-left:hover {
        opacity: 0.5;
    }

    .header__slide-show .slide-right{
        position:absolute;
        right: 457px;
        top: 40%;
        font-size: 1.4rem;
        border:10px solid #ccc;
        background-color:#ccc;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        cursor: pointer;
        opacity: 0.7;
    }  

    .header__slide-item .active {
        color: #f60;
    }

    .slide-right:hover {
        opacity: 0.5;
    }
        
    </style>
    <div class="grid wide">
        <div class="grid-row-1">
            <div class="grid-column-8">
                <div class="header__slide">
                    <div class="header__slide-show">
                    <i class="slide-left fa-solid fa-angle-left"></i>
                    <i class="slide-right fa-solid fa-angle-right"></i>
                        <div class="header__slide-inner active">
                            <img src="./assets/img/quangcao-header/quangcao1.webp" alt="" class="header__slide-img-show">
                        </div>
                        <div class="header__slide-inner ">
                            <img src="./assets/img/quangcao-header/quangcao-2.webp" alt="" class="header__slide-img-show">
                        </div>
                        <div class="header__slide-inner">
                            <img src="./assets/img/quangcao-header/quangcao3.webp" alt="" class="header__slide-img-show">
                        </div>

                        <div class="header__slide-inner ">
                            <img src="./assets/img/quangcao-header/quangcao-4.webp" alt="" class="header__slide-img-show">
                        </div>
                        <div class="header__slide-inner">
                            <img src="./assets/img/quangcao-header/quangcao-5.webp" alt="" class="header__slide-img-show">
                        </div>
                        <ul class="header__slide-list">
                            <li class="header__slide-item">
                                <div class="tab-item active">
                                    Trải nghiệm Galaxy Z
                                </div>
                            </li>
                            <li class="header__slide-item">
                                <div class="tab-item">
                                    Đặt Galaxy Z Fold4
                                </div>
                            </li>
                            <li class="header__slide-item">
                                <div class="tab-item">
                                    iPhone 11
                                </div>
                            </li>
                            <li class="header__slide-item">
                                <div class="tab-item">
                                    Xả kho
                                </div>
                            </li>
                            <li class="header__slide-item">
                                <div class="tab-item">
                                    Redmi Note 11
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="grid-column-4">
                <div class="header__slide-right">
                    <img src="./assets/img/quangcao-header/right-1.webp" alt="" class="header__slide-right-img">
                    <img src="./assets/img/quangcao-header/right-2.webp" alt="" class="header__slide-right-img">
                </div>
            </div>
        </div>
    </div> 

    <script src="./Javascript/slide.js"></script>


    


