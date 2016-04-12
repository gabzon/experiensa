function freewall_flex_layout() {
    var wall = new Freewall('#freewall');
    wall.reset({
        selector: '.brick',
        animate: true,
        cellW: 150,
        cellH: 'auto',
        onResize: function () {
            wall.fitWidth();
        }
    });

    var images = wall.container.find('.brick');
    images.find('img').load(function () {
        wall.fitWidth();
    });
}