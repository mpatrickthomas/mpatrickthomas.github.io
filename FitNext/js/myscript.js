$( document ).ready(function() {
    $('#bgvideo').get(0).play();
    $('.editableText').editable('/profile.php', {
         indicator : 'Saving...',
         tooltip   : 'Click to edit...'
     });
     $('.editableText_area').editable('/profile.php', {
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/indicator.gif">',
         tooltip   : 'Click to edit...'
     });
});
