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
    $('table').find("tr:gt(0)").remove(); 
    var table = document.querySelector('table');
    var options = [];



    for(var i =0; i < langs.length; i++){
        let obj = langs[i];
        if(obj.langName == langName){
            for (var j=0; j < 5; j++)
                if (j == 0) options.push([
                    obj.name,
                    obj.shortDescription,
                    obj.organization,
                    obj.country
                ]);
            
                // $('#textBody').text(obj.text);
            // $('td[id="tableName"]').text("");
            // ($('td[id="tableName"]')[0]).insertAdjacentHTML('beforeend',obj.name);
        }
    }

    //console.log(options);
    for (var i = 0; i < options.length; i++) {
        var tr = document.createElement('tr');
        for (var j = 0; j < options[i].length; j++) {
            var td = document.createElement('td');
            td.innerHTML = options[i][j];
            tr.appendChild(td);
        }
        table.appendChild(tr);
    }

    //$('#organizationChoice').append($('<option value="'+orgName+'" selected="selected">'+orgName+'</option>'));
    //$('#countryChoice').append($('<option value="'+countryName+'" selected="selected">'+countryName+'</option>'));
}


$(document).ready(function(){

    

    $.ajax({
        url: "/api/tableuniversity",
    }).done(function(data) {
        //var langs = {}; /////
        var translations = JSON.parse(data);
        langs = translations;
        let firstValue = null;
        var names = [];
        for(var i = 0; i < translations.length; i++){
            let orgName = translations[i].organization;
            
            if (!(names.includes(translations[i].langName)))
            {
                let langName = translations[i].langName;
                let picturePath = translations[i].picturePath;
                let orgName = translations[i].organization;
                let countryName = translations[i].country;

                $('#webmenu').append($('<option value="'+langName+'" data-image="'+picturePath+'">'+langName+'</option>'));
                //$('#organizationChoice').append($('<option value="'+orgName+'" selected="selected">'+orgName+'</option>'));
                //$('#countryChoice').append($('<option value="'+countryName+'" selected="selected">'+countryName+'</option>'));

                names.push(translations[i].langName);
                if(firstValue == null)
                    firstValue = langName;
            }
            

            //let langName = translations[i].langName;
            //let picturePath = translations[i].picturePath;
            //$('#webmenu').append($('<option value="'+langName+'" data-image="'+picturePath+'">'+langName+'</option>'));
            //$('#worganizationChoice').append($('<option value="'+orgName+'" selected="selected">'+orgName+'</option>'));
            //$('.langs').append($('<div value="'+langName+'"><img src="'+picturePath+'">'+langName+'</div>'));    
            //if(firstValue == null)
               // firstValue = langName;
        }
        onOptionClick(firstValue);

        $('#webmenu').on('change', function() {
            onOptionClick(this.value);
        });



        try {
            $("body select[id='webmenu']").msDropDown();
        } catch(e) {
            alert(e.message);
        }

        // $(document).ready(function() {
        //     $('#organizationChoice').multiselect({buttonWidth: '150px'});
        //     $('#countryChoice').multiselect({buttonWidth: '150px'});                    
        // });
    });

    
    
});