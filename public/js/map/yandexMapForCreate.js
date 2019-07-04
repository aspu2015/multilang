$(document).ready(function(){
    ymaps.ready(init);
    function init () {
        var myMap = new ymaps.Map('map', {
                center: [55.76, 37.64],
                zoom: 10,
                controls: ['geolocationControl'],
            }, {
                searchControlProvider: 'yandex#search',
                yandexMapDisablePoiInteractivity: true
            });

            myMap.events.add('click', function (e) {
                if (!myMap.balloon.isOpen()) {
                    var coords = e.get('coords');
                    myMap.balloon.open(coords, {
                        contentHeader:'Событие!',
                        contentBody:
                            '<p>Координаты места: ' + [
                            coords[0].toPrecision(6),
                            coords[1].toPrecision(6)
                            ].join(', ') + '</p>'
                    });


                    function setCoords() {
                        document.getElementById('universityLatitude').value = coords[0].toPrecision(6);
                        document.getElementById('universityLongitude').value = coords[1].toPrecision(6);
                     }
                    
                    setCoords();

                }
                else {
                    myMap.balloon.close();
                }
            });
            
            // Скрываем хинт при открытии балуна.
            myMap.events.add('balloonopen', function (e) {
                myMap.hint.close();
            });

    }
});