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
        $('.content').toggleClass('fader');
        $('.spaceboxes').toggleClass('fader');
        $('.filter-content').fadeToggle('fast');
        $('#filterButton').preventDefault();
    });

    // SUBMIT SPACE POST COMMENT
    $('.textareaComment').on('keypress', function(e) {
        if(e.which == 13 && ! e.shiftKey) {
            $(this).closest('form').submit();
            e.preventDefault();
            return false;
        }
    });

});
