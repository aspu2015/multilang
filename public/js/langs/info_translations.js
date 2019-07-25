var langs = {};
function findGetParameter(parameterName) {
    var result = null,
        tmp = [];
    location.search
        .substr(1)
        .split("&")
        .forEach(function (item) {
          tmp = item.split("=");
          if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
    return result;
}

function onOptionClick(langName){
    for(var i =0; i < langs.length; i++){
        let obj = langs[i];
        if(obj.langName == langName){
            if (obj.name == "Block1") {
                // $('#textBody').text(obj.text);
                $('#textBody').text("");
                ($('#textBody')[0]).insertAdjacentHTML('beforeend',obj.text);
            }
            else if (obj.name == "Block2") {
                $('#textBody2').text("");
                ($('#textBody2')[0]).insertAdjacentHTML('beforeend',obj.text);
            }
        }
    }
}
$(document).ready(function(){

    

    $.ajax({
        url: "/api/langs?id=99999",
    }).done(function(data) {
        //var langs = {}; /////
        var translations = JSON.parse(data);
        langs = translations;
        let firstValue = null;
        for(var i = 0; i < translations.length; i++){
            if (translations[i].name == "Block1") {
                let langName = translations[i].langName;
                let picturePath = translations[i].picturePath;
                $('#webmenu').append($('<option value="'+langName+'" data-image="'+picturePath+'">'+langName+'</option>')); 
                $('.langs').append($('<div value="'+langName+'"><img src="'+picturePath+'">'+langName+'</div>'));    
                if(firstValue == null)
                    firstValue = langName;
            }
        }
        onOptionClick(firstValue);

        $('#webmenu').on('change', function() {
            onOptionClick(this.value);
        });

        $('.langs div').on('click', function() {
            onOptionClick(this.value);
        });



        try {
            $("body select[id='webmenu']").msDropDown();
        } catch(e) {
            alert(e.message);
        }
    });

    
    
});