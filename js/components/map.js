var contactsMap;

function initContactsMap(ymaps) {
    'use strict';
    var mapElement = document.getElementById('js-contacts-map'),
        mapDataUrl = mapElement.dataset.mapData;

    contactsMap = new ymaps.Map(mapElement, {
        center: mapElement.dataset.mapCoords.split(','),
        zoom: mapElement.dataset.mapZoom,
        controls: ['smallMapDefaultSet']
    });

    contactsMap.behaviors.disable('scrollZoom');

    var commonContent = ymaps.templateLayoutFactory.createClass(
        '<div class="contacts-map-balloon {{ properties.iconClasses }} {{ properties.iconHoverClasses }}"><div class="contacts-map-balloon-content">{{ properties.iconContent }}</div></div>'
    );

    $.ajax(mapDataUrl, {
        method: 'GET',
        cache: false,
        dataType: 'json'
    }).done(function (data) {
        if (data.objects) {
            data.objects.forEach(function (object) {

                var iconOffset = [-100, -70],
                    iconClasses = '',
                    iconShape = {
                        type: 'Rectangle',
                        // Прямоугольник описывается в виде двух точек - верхней левой и нижней правой.
                        coordinates: [
                            [0, 0], [200, 70]
                        ]
                    };

                // Large blue Placemark 260x130px - type: "main"
                if (object.type && object.type === 'main') {
                    iconOffset = [-130, -130];
                    iconClasses = 'contacts-map-balloon-main';
                    iconShape = {
                        type: 'Rectangle',
                        coordinates: [
                            [0, 0], [260, 130]
                        ]
                    };
                }

                var myPlacemark = new ymaps.Placemark(object.coords, {
                    iconContent: object.name,
                    hintContent: object.name
                }, {
                    iconHoverClasses: '',
                    iconLayout: commonContent,
                    iconOffset: iconOffset,
                    hasBalloon: false,
                    iconShape: iconShape
                });

                myPlacemark.properties.set('iconClasses', iconClasses);

                myPlacemark.events.add('mouseenter', function (e) {
                    myPlacemark.properties.set('iconHoverClasses', 'contacts-map-balloon-hover')
                });

                myPlacemark.events.add('mouseleave', function (e) {
                    myPlacemark.properties.set('iconHoverClasses', '');
                });

                if (object.description.length) {
                    myPlacemark.events.add('click', function (e) {
                        initSideModal(object.description, 'side-modal-map-object');
                        e.stopPropagation();
                    });
                }

                contactsMap.geoObjects.add(myPlacemark);
            });
        }
    }).fail(function(jqXHR, textStatus, errorThrown) {
        alert('Ошибка загрузки данных. Пожалуйста, попробуйте перезагрузить страницу.');
        console.log(jqXHR);
        console.log(errorThrown);
    });
}