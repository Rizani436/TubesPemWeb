const content = document.querySelector('.content');
var header_left_menu = document.querySelector('.header-left-menu');
const box_item = document.querySelectorAll('.box-item');

function updateContentMargin() {
    if (header_left_menu.style.display === 'block') {
        content.style.marginLeft = '350px';
        box_item.forEach(function(box_item) {
            box_item.style.width = '300px';
            box_item.style.height = '200px';
        });
    } else if(header_left_menu.style.display === 'none') {
        content.style.marginLeft = '20px';
        box_item.forEach(function(box_item) {
            box_item.style.width = '250px';
            box_item.style.height = '230px';
        });
    }
}

updateContentMargin();