const hamMenu = document.querySelector('.ham-menu');
const offScreenMenu = document.querySelector('.off-screen-menu');
const menuLinks = document.querySelectorAll('.off-screen-menu .link');

// Создаем overlay и добавляем в body
const overlay = document.createElement('div');
overlay.className = 'overlay';
document.body.appendChild(overlay);

// Функция для закрытия меню
function closeMenu() {
    hamMenu.classList.remove('active');
    offScreenMenu.classList.remove('active');
    overlay.classList.remove('active');
}

// Открытие/закрытие меню при клике на бургер
hamMenu.addEventListener('click', () => {
    const isActive = hamMenu.classList.toggle('active');
    offScreenMenu.classList.toggle('active');
    overlay.classList.toggle('active', isActive);
});

// Закрытие при клике на overlay
overlay.addEventListener('click', closeMenu);

// Закрытие при клике на ссылку в меню и плавный скролл
menuLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault(); // Отменяем стандартный переход

        closeMenu(); // Закрываем меню

        // Плавно прокручиваем к нужному блоку
        const targetId = link.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            targetElement.scrollIntoView({ behavior: 'smooth' });
        }
    });
});






document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("toggleButton");
    const hiddenBlocks = document.querySelectorAll(".quality_cards.hidden");

    toggleButton.addEventListener("click", function () {
        let isExpanded = hiddenBlocks[0].classList.contains("show");

        hiddenBlocks.forEach(block => {
            if (isExpanded) {
                block.classList.remove("show");
                setTimeout(() => block.style.display = "none", 300);
            } else {
                block.style.display = "grid";
                setTimeout(() => block.classList.add("show"), 10);
            }
        });

        toggleButton.textContent = isExpanded ? "Показать больше документов" : "Скрыть документы";
    });
});