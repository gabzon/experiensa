function freewall_layout() {
    console.log("se inician todos los layouts");
    var Freewall = freewall;
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
    wall.fitWidth();
    var wall_image = new Freewall("#freewall-image");
    wall_image.reset({
        selector: '.freewall-cell',
        animate: true,
        cellW: 20,
        cellH: 200,
        onResize: function() {
            wall_image.fitWidth();
        }
    });
    wall_image.fitWidth();

    var wall_pinterest = new Freewall("#freewall-pinterest");
    wall_pinterest.reset({
        selector: '.brick-pinterest',
        animate: true,
        cellW: 200,
        cellH: 'auto',
        onResize: function() {
            wall_pinterest.fitWidth();
        }
    });
    wall_pinterest.fitWidth();

    var wall_win8 = new Freewall("#win8-freewall");
    wall_win8.reset({
        selector: '.level1',
        cellW: 320,
        cellH: 160,
        fixSize: 0,
        gutterX: 20,
        gutterY: 10,
        onResize: function() {
            wall_win8.fitWidth();
        }
    });
    wall_win8.fitWidth();
}
