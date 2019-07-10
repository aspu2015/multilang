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


        
            // clusterer.options.set({
            //     gridSize: 128,
            //     clusterDisableClickZoom: true,
            //     iconLayout: 'default#image',
            //     iconImageHref: 'images/flag.png',
            //     iconImageSize: [140, 45],
            //     iconImageOffset: [-3, -42]
            // });
         
            
        // Чтобы задать опции одиночным объектам и кластерам,
        // обратимся к дочерним коллекциям ObjectManager.
        //objectManager.objects.options.set('preset', 'islands#greenDotIcon');
        //objectManager.clusters.options.set('preset', 'islands#greenClusterIcons');
        
        //myMap.geoObjects.add(clusterer);

        $.ajax({
            url: "/api/geodata"
        }).done(function(data) {
            data = JSON.parse(data);
            console.log(data);
            let geodata = [];
            for(var i = 0; i < data.features.length; i++){
                geodata[i] = new ymaps.Placemark(data.features[i].geometry.coordinates, 
                    data.features[i].properties, 
                    {clusterDisableClickZoom: true,
                        iconLayout: 'default#image',
                        iconImageHref: 'images/flag.png'});
            }
            clusterer.add(geodata);
            myMap.geoObjects.add(clusterer);
        });

    }
});
