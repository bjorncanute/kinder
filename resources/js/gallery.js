function moveRow() {                    
    var image_thumbnails = gallery_src.getElementsByClassName('sketch-item');
    // convert to ordinarry array: not a live updating array that will fuck you up!
    image_thumbnails = [].slice.call(image_thumbnails, 0);

    var viewport_width = 2000;
    var row_width = 0;
    var row_num = 0;
    var rows = [
        row_1, row_2, row_3, row_4,
    ];
    

    for (const image of image_thumbnails) {
        row_width += image.firstChild.naturalWidth;

        console.log(image.firstChild.naturalWidth);
        // row_2.appendChild(image);
        rows[row_num].append(image);
        if (row_width > viewport_width) {

            row_width = 0;
            row_num++;
        }
    }
    
}

window.onload = function() {
    var row = document.getElementById('move_row_btn');
    if (row) {
        row.onclick = function () {
            moveRow();
        }
    }
    moveRow();
    // document.getElementById('move_row_btn').onclick = function () {
    //     moveRow();
    // }
    // window.onresize(moveRow());
}

