// MAIN-NAV (header)
$('.toggle-nav').click(function() {
  $('.main-nav > ul').slideToggle('fast')
})

// CREATESPACE.PHP y EDITSPACE.PHP (preview y selección de color)
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
