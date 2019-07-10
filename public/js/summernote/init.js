$(document).ready(function(){
    var postForm = function() {
        var content = $('textarea[name="universityDescription"]').html($('#summernote').code());
    }
    $('#universityDescription').summernote({
        callbacks: {
            onImageUpload: function(files) {
                var el = $(this);
                sendFile(files[0],el);
            }
       }
    });
    function sendFile(file, el) {
        var  data = new FormData();
        data.append("file", file);
        data.append("title", "system");
        var url = '/images/create';
        $.ajax({
            data: data,
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: url,
            cache: false,
            contentType: false,
            processData: false,
            success: function(url2) {
                el.summernote('insertImage', url2);
            }
       });
    };
});