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
    console.log('qwe');
    for(var i =0; i < langs.length; i++){
        let obj = langs[i];
        console.log(obj.langName);
        console.log(langName);
        console.log(langName == obj.langName);
        console.log('-----');
        if(obj.langName == langName){
            $('#textBody').text = obj.text;
        }
    }
}
$(document).ready(function(){

    

    $.ajax({
        url: "/api/langs?id="+findGetParameter('id')
    }).done(function(data) {
        var translations = JSON.parse(data);
        langs = translations;
        for(var i = 0; i < translations.length; i++){
            let langName = translations[i].langName;
            $('#languageSelector').append($('<option value="'+langName+'">'+langName+'</option>'));        
        }
        $('#languageSelector').on('change', function() {
            onOptionClick(this.value);
        });
    });
});