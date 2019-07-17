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



        getPlaceMark();
        $('.multiselect-native-select').click(getPlaceMark); 
        /// вызов функции по клику на выпадающем меню ///         
        
           


        function getPlaceMark() {

        myMap.geoObjects.removeAll(); /// удаляем метки перед созданием новых ///
        clusterer.removeAll();

        $.ajax({
            url: "/api/geodata"
        }).done(function(data) {
            data = JSON.parse(data);
            console.log(data);            
            let geodata = [];
            for(var i = 0; i < data.features.length; i++){
                if (data.features[i].organization == 2) {
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
