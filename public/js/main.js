$(document).ready(function() {

    // MAIN-NAV (header)
    $('.toggle-nav').click(function() {
        $('.main-nav > ul').slideToggle('fast')
    })

    // CREATESPACE.PHP y EDITSPACE.PHP (preview and color selection)
    $('.color').on('click', function(e) {
        $('#selectedColor').attr('value', $(this).attr('value'));
        $('.color.active').attr('class', 'color');
        $(this).attr('class', 'color active');
        var selectedColor = $('#selectedColor').attr('value');
        $('#colorPreview').css('background-color', selectedColor)
    });

    $('#nameInput').keyup(function() {
        var valueInputName = $(this).val();
        $('#namePreview').text('#' + valueInputName);
    })

    $('#descriptionTextarea').keyup(function() {
        var valueTextareaDescription = $(this).val();
        $('#descriptionPreview').text(valueTextareaDescription);
    })

    // FILTER
    $('#filterButton').on('click', function() {
        $('.filter-content').fadeToggle('fast');
        $('.spaceboxes').toggleClass('fader');

        // $('.filter-content').mouseover(function() {
        //     $('.spaceboxes').css('filter', 'grayscale(90%)');
        // })
        //
        // $('.filter-content').mouseout(function() {
        //     $('.spaceboxes').css('filter', '');
        // });
        
        // if( $('.filter-content:not(:visible)') ){
        //     $('.spaceboxes').css({
        //         'opacity': '0.8',
        //         'filter': 'blur(3px) grayscale(0.8)'
        //     });
        // } else {
        //     $('.spaceboxes').css({
        //         'opacity': '1',
        //         'filter': 'blur(0x) grayscale(0)'
        //     });
        // }

    });

    // SUBMIT SPACE POST COMMENT
    // $('.textareaComment').on('keypress', function(e) {
    //     if(e.which == 13 && ! e.shiftKey) {
    //         $(this).closest('form').submit();
    //         e.preventDefault();
    //         return false;
    //     }
    // });

});
