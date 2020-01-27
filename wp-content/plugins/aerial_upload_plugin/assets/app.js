function readFile(input) {
 
  if (input.files && input.files[0]) {
   
    var reader = new FileReader();

    reader.onload = function(e) {
      var htmlPreview =
        '<img width="200" src="' + e.target.result + '"/>' +
        '<p>' + input.files[0].name + '</p>';
      var wrapperZone = $(input).parent();
      var previewZone = $(input).parent().parent().find('.preview-zone');
      var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

      wrapperZone.removeClass('dragover');
      previewZone.removeClass('hidden');
      boxZone.empty();
      boxZone.append(htmlPreview);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function reset(e) {
  e.wrap('<form>').closest('form').get(0).reset();
  e.unwrap();
}

$(".dropzone").change(function() {
  readFile(this);
});

$('.dropzone-wrapper').on('dragover', function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).addClass('dragover');
});

$('.dropzone-wrapper').on('dragleave', function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).removeClass('dragover');
});

$('.remove-preview').on('click', function() {
  var boxZone = $(this).parents('.preview-zone').find('.box-body');
  var previewZone = $(this).parents('.preview-zone');
  var dropzone = $(this).parents('.form-group').find('.dropzone');
  boxZone.empty();
  previewZone.addClass('hidden');
  reset(dropzone);
});

/*
function submit() {

$.ajax({
    url: "database.php",
    type: "POST",
    data: htmlPreview,
    success: function(data){
     $('#drop-area').html(data);
    }});

}
*/


formdata.addEventListener('submit',(e) => {
  
  e.preventDefault();

  let formdata = document.getElementById('formdata');


  let url = formdata.dataset.url;
  
  let params = new FormData(formdata);


  fetch(url, {
    method: "POST",
    body: params
  }).then(function(data){
      console.log(data.text());
     location.reload();
  }).catch(function(error){
    console.log(error);
  })

});

 