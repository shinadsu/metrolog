// Получаем все элементы меню


const menuItems = document.querySelectorAll('.li-menu');

// Добавляем слушатель события наведения мыши на каждый элемент меню
menuItems.forEach(item => {
    item.addEventListener('mouseenter', () => {
        // Убираем класс 'Active-menu' со всех элементов меню
        menuItems.forEach(item => {
            item.classList.remove('Active-menu');
        });
        // Добавляем класс 'Active-menu' к текущему элементу меню
        item.classList.add('Active-menu');
    });
});

// Добавляем плавное появление элементов меню
setTimeout(() => {
    menuItems.forEach(item => {
        item.classList.add('show');
    });
}, 1000); // Вы можете изменить время задержки (в миллисекундах) перед появлением элементов меню
