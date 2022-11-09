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
console.log(btndongComment);
btndongComment.onclick = function () {
    event.preventDefault();
    formComment.classList.remove('open-comment');
    vietdanhgia.style.display = 'block';
    dongdanhgia.style.display = 'none';
}

var btnTraLoiAdmin = document.querySelector('.comment_item-traloi');
var btndongtraloi = document.querySelector('.comment_item-dongtraloi');
var commentformAdmin = document.querySelector('.comment-form__admin');
btndongtraloi.style.display = 'none';
btnTraLoiAdmin.onclick = function () {
    event.preventDefault();
    commentformAdmin.classList.add('open-formadmin');
    btnTraLoiAdmin.style.display = 'none';
    btndongtraloi.style.display = 'block';
    btndongtraloi.style.color = '#999';
}

btndongtraloi.onclick = function () {
    event.preventDefault();
    commentformAdmin.classList.remove('open-formadmin');
    btnTraLoiAdmin.style.display = 'block';
    btndongtraloi.style.display = 'none';
}



