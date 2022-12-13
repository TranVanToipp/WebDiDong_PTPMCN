const a = document.querySelector.bind(document);
var formComment = document.querySelector('.comments-content__container');
var btnMoComment = document.querySelector('.cmt_row--text-1');


var vietdanhgia = document.querySelector('.cmt_row--text-1');
var dongdanhgia = document.querySelector('.cmt_row--text-2')
dongdanhgia.style.display = 'none';

btnMoComment.onclick = function () {
    event.preventDefault();
    formComment.classList.add('open-comment');
    vietdanhgia.style.display = 'none';
    dongdanhgia.style.display = 'block';
    dongdanhgia.style.color = '#999';
}

var btndongComment = document.querySelector('.cmt_row--text-2');
btndongComment.onclick = function () {
    event.preventDefault();
    formComment.classList.remove('open-comment');
    vietdanhgia.style.display = 'block';
    dongdanhgia.style.display = 'none';
}

