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
            // $('#textBody').text(obj.text);
            $('#textBody').text("");
            ($('#textBody')[0]).insertAdjacentHTML('beforeend',obj.text);
            $('#country').text("");
            ($('#country')[0]).insertAdjacentHTML('beforeend',obj.country);
            $('#organization').text("");
            ($('#organization')[0]).insertAdjacentHTML('beforeend',obj.organization);

        }
    }
}
$(document).ready(function(){

    

    $.ajax({
        url: "/api/langs?id="+findGetParameter('id')
    }).done(function(data) {
        var translations = JSON.parse(data);
        langs = translations;
        let firstValue = null;
        for(var i = 0; i < translations.length; i++){
            
            let langName = translations[i].langName;
            let picturePath = translations[i].picturePath;
            $('#webmenu').append($('<option value="'+langName+'" data-image="'+picturePath+'">'+langName+'</option>'));     
            if(firstValue == null)
                firstValue = langName;
        }
        onOptionClick(firstValue);

        $('#webmenu').on('change', function() {
            onOptionClick(this.value);
        });

        try {
            $("body select").msDropDown();
        } catch(e) {
            alert(e.message);
        }
    });

    
    
});