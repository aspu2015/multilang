$(document).ready(function(){
    ymaps.ready(init);
    function init () {
        var myMap = new ymaps.Map('map', {
                center: [55.76, 37.64],
                zoom: 10,
                controls: ['geolocationControl']
            }, {
                searchControlProvider: 'yandex#search',
                yandexMapDisablePoiInteractivity: true
            }),

            clusterer = new ymaps.Clusterer({
                preset: 'islands#redClusterIcons',
                groupByCoordinates: false,
                clusterDisableClickZoom: true,
                clusterHideIconOnBalloonOpen: false,
                geoObjectHideIconOnBalloonOpen: false
            });


        //$("ul li").attr("class","active");
        //$("select option").attr("selected","selected");
        getPlaceMark();
        //getPlaceMark();
        //$('.multiselect-native-select').click(getPlaceMark); 
        /// вызов функции по клику на выпадающем меню ///   
        //$('.multiselect-native-select').click(getPlaceMark);
        $('.multiselect-native-select .btn-group ul li a label input').click(getPlaceMark);
            
      

        function getPlaceMark() {

        

       

        $.ajax({
            url: "/api/geodata"
        }).done(function(data) {

            myMap.geoObjects.removeAll(); /// удаляем метки перед созданием новых ///
            clusterer.removeAll();

            var selectedOrganization = document.querySelectorAll('#org .multiselect-native-select .btn-group'+
            ' ul li[class="active"] a label input[value]');
            var selectedCountry = document.querySelectorAll('#countrych .multiselect-native-select .btn-group'+
            ' ul li[class="active"] a label input[value]');
            var selectedOrgArray = [];
            var selectedCountryArray = [];
            for (var i = 0; i < selectedOrganization.length; i++) {
                selectedOrgArray.push(+selectedOrganization[i].value);
            }
            for (var i = 0; i < selectedCountry.length; i++) {
                selectedCountryArray.push(+selectedCountry[i].value);
            }
            //console.log(selectedOrgArray);
            //console.log(selectedCountryArray);


            data = JSON.parse(data);
            //console.log(data);            
            let geodata = [];
            for(var i = 0; i < data.features.length; i++){
                if (selectedOrgArray.indexOf(data.features[i].organization) != -1
                && selectedCountryArray.indexOf(data.features[i].country) != -1) {
                geodata[i] = new ymaps.Placemark(data.features[i].geometry.coordinates, 
                    data.features[i].properties, 
                    {clusterDisableClickZoom: true,
                        iconLayout: 'default#image',
                        iconImageHref: 'staticImages/flag.png',
                        visible: true                       
                    }); 

                    clusterer.add(geodata[i]);
                }
            }
            myMap.geoObjects.add(clusterer);
        });
    }

    }
});
