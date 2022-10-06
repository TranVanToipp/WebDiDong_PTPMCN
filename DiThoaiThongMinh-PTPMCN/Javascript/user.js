const UserAPI = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN//PHPREST/api/user/user.json';
function start() {
    getUser(handleLogin);
}

function getUser(callback) {
    fetch(UserAPI)
        .then(function (response) {
            return response.json();
        })
        .then(callback);
}
function handleLogin(data) {
    var userName = document.getElementById('userName').value; 
    var password = document.getElementById('password').value; 

    data.data.forEach(function (user) {
        if (user.userName == userName && user.password == password) {
            alert("dang nhap thanh cong");
        }else {
            alert('Đăng nhập không thành công!!!');
        }
    });
}