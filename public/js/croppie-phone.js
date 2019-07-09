$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    
    
    var resize = $('#upload-demo').croppie({
        enableExif: true,
        enableOrientation: true,    
        viewport: { // Default { width: 100, height: 100, type: 'square' } 
            width: 200,
            height: 200,
            type: 'square' //circle
        },
        boundary: {
            width: 300,
            height: 300
        }
    });
    
    
    $('#picture').on('change', function () { 
      var reader = new FileReader();
        reader.onload = function (e) {
          resize.croppie('bind',{
            url: e.target.result
          }).then(function(){
            console.log('jQuery bind complete');
          });
        }
        reader.readAsDataURL(this.files[0]);
    });
  
  
    $('.upload-phone-image').on('click', function (ev) {
      ev.preventDefault();
      resize.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function (img) {
        $.ajax({
          url: "/phones/crop",
          type: "POST",
          data: {"picture":img},
          success: function (data) {
            html = '<img src="' + img + '" />';
            $("#preview-crop-image").html(html);
          }
        });
      });
    });
  
    
    // $('.upload-image').on('click', function (ev) {
    //   ev.preventDefault();
    //   resize.croppie('result', {
    //     type: 'canvas',
    //     size: 'viewport'
    //   }).then(function (img) {
    //     html = '<img src="' + img + '" />';
    //     $("#preview-crop-image").html(html);
    //   });
    // });
    
  