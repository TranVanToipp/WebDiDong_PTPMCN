var getdevvnAPI = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/tinhTP/select_devvinALL.php";
function start() {
    getDevvin(handelDevin);
}
start();
function getDevvin(callback) {
    fetch(getdevvnAPI)
        .then(function (response) {
            return response.json();
        })
        .then(callback)
}
var ulElement = document.querySelector('.select-results__options');

function handelDevin(data) {
    var html = data.data.map( (item) => {
        return `
            <li class="select2-results__option" role = "option">
                ${item.name}
            </li>
        `;
    });
    ulElement.innerHTML = html.join('');

}