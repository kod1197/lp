superplaceholder({
    el: document.querySelector('input'),
    sentences: [ 'Введи сюда интересующую тебя тему для поиска' , 'Например: Цветы'],
    options: {
        // Задержка между буквами (в миллисекундах)
        letterDelay: 100, // миллисекунды
        // Задержка между предложениями (в миллисекундах)
        sentenceDelay: 1000,
        // Начало на состояние :focus. Установите false для автостарта
        startonfocus: true,
        // Зациклить предложения
        loop: true,
        // Перемешивать показанные предложения
        shuffle: false,
        // Показывать курсор или нет. Показывать по умолчанию
        showCursor: true,
        // Вид курсора
        cursor: '|'
    }
});