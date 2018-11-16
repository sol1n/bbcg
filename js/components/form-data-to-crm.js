// формируем конфиг для отправки лида в CRM
var select_val = $("[name=summit_reg_select]:selected").val();
if(select_val !== 'o_other'){
    select_text = $("[name=summit_reg_select]:selected").text();
} else {
    select_text = $("[name=other]").val();
}
$("#selected_value").val(select_text);// получаем значение из выпадающего списка "Откуда вы о нас узнали?"

var crm_config = {
    fields: {
        "Name": "#summit-registration-block [name=name]", // Имя посетителя, заполнившего форму
        "Email": "#summit-registration-block [name=email]", // Email посетителя
        "MobilePhone": "#summit-registration-block [name=phone]", // Телефон посетителя
        "Company": "#summit-registration-block [name=company]", // Название компании
        "FullJobTitle": "#summit-registration-block [name=title]", // Должность посетителя
        "Surname": "#summit-registration-block [name=surname]", // Фамилия(доп.поле)
        "Promocode": "#summit-registration-block [name=promocode]", // Промокод(доп.поле)
        "HearAboutUs": "#selected_value", // Откуда вы о нас узнали(доп.поле)
    },
    landingId: "6a7962b3-6bbb-4f5b-b1d4-52f8dc0b4de6",
    serviceUrl: "http://bpm.b2bcg.ru:8082/0/ServiceModel/GeneratedObjectWebFormService.svc/SaveWebFormObjectData",
    redirectUrl: ""
};

(function( $ ) {
    $.fn.formCRM = function() {
        landing.initLanding(crm_config);
    };
}( jQuery ));
