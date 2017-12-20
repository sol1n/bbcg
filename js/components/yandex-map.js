function initMaps(ymaps) {
    var mapElements = document.querySelectorAll('[data-maps]');

    for (var i = 0; i < mapElements.length; i++) {
        (function () {
            var mapSettings = function () {
                try {
                    return JSON.parse(mapElements[i].dataset.maps);
                } catch (err) {
                    console.log(err);
                }
            };

            var settings = mapSettings();

            if (settings) {
                var map = new ymaps.Map(mapElements[i], {
                    center: settings.center.split(','),
                    zoom: settings.zoom,
                    controls: ['smallMapDefaultSet']
                });

                map.behaviors.disable('scrollZoom');

                if (settings.placemark) {
                    var myGeoObject = new ymaps.GeoObject({
                            // Описание геометрии.
                            geometry: {
                                type: "Point",
                                coordinates: settings.placemark.center.split(',')
                            },
                            properties: {
                                // Контент метки.
                                iconContent: settings.placemark.name
                            }
                        },
                        {
                            preset: 'islands#blackStretchyIcon'
                        });

                    map.geoObjects.add(myGeoObject);
                }
            }
        })();
    }
}