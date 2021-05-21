
document.querySelector('.btn-block').onclick = setTimeout(() => {
    let elem = document.createElement('div');
    elem.classList.add('alert', 'info', 'alert-info');
    elem.innerHTML = 'Запись прошла успешна';
    document.querySelector('.note').before(elem);
});
