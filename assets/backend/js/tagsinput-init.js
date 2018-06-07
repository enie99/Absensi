$(function() {
    $('#tags_1').tagsInput({width:'auto',defaultText:'tambah tag'});
});
$(function() {
    $('#tags_2').tagsInput({width:'auto',defaultText:'tambah keyword'});
});
$(function() {
    $('#email_tags').tagsInput({
    	width:'auto',
    	height:'auto',
      	'delimiter':',',
    	defaultText:'Add Email'
   	});
});
$(function() {
    $('#number_tags').tagsInput({
    	width:'auto',
    	height:'auto',
      	'delimiter':',',
    	defaultText:'Add Number'
   	});
});
