(function( $ ) {
    $.fn.formAjax = function() {
        this.each(function() {
            select_text = $("[name=summit_reg_select]").find(":selected").text();
            $('[name=summit_reg_select]').on('change', function() {//показываем поле "Другое" если этот пункт выбран
                if ( this.value === "o_other" ) {
                    $('[name=other_container]').show();
                } else {
                    $('[name=other_container]').hide();
                    $('input[name=other]').val('');
                    select_text = $("[name=summit_reg_select]").find(":selected").text();
                }
            });

            $(this).on('submit', function () {
                var $form = $(this),
                    url = $form.attr('action'),
                    method = $form.attr('method'),
                    formData = new FormData($form[0]),
                    formOverlay = $form.data('form-ajax-overlay'),
                    validation = $form.is('[data-validate]');



                if (validation && $form.valid()) {
                    $('.submit-registration-block-form-footer button').prop( "disabled", true );
                    $('.registration-form-submit button').prop( "disabled", true );
                    checkCaptcha();
                } else if (!validation) {
                    checkCaptcha();
                }

                function showOverlay() {
                    if (formOverlay) {
                        $(formOverlay).addClass('active').spin('large', '#000').spin(true);
                    }
                    $form.spin(true);
                }

                function hideOverlay() {
                    if (formOverlay) {
                        $(formOverlay).removeClass('active').spin(false);
                    }
                    $form.spin(false);
                }

                function checkCaptcha() {
                    showOverlay();
                    if ($form.find('[data-recaptcha]').length) {
                        var key = $form.find('[data-recaptcha]').data('recaptcha');
                        var verifyCallback = function(token){
                            formData.append('g-token', token);
                            grecaptcha.reset(window.captchaID);
                            submitForm();
                        }
                        if (!('captchaID' in window)) {
                            window.captchaID = grecaptcha.render('recaptcha-placeholder', {
                              'sitekey' : key,
                              'callback' : verifyCallback,
                              'size' : 'invisible'
                            });
                        } else {
                            $('body').append('<div id="recaptcha-placeholder-' + window.captchaID + '"></div>');
                            window.captchaID = grecaptcha.render('recaptcha-placeholder-' + window.captchaID, {
                              'sitekey' : key,
                              'callback' : verifyCallback,
                              'size' : 'invisible'
                            });
                        }
                        grecaptcha.execute(window.captchaID);
                    } else {
                        submitForm();
                    }
                }

                function metrics() {
                    ym(48656639, 'reachGoal', 'reg');
                    gtag('event', 'spasibo');
                    return true;
                }

                function submitForm() {
                    $.ajax({
                        url: url,
                        type: method,
                        data: formData,
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: 'json'
                    }).done(function (data) {
                        if (data && data.success) {
                            if(data.file){
                                var link = document.createElement('a');
                                link.setAttribute('href', data.file);
                                link.setAttribute('target', '_blank');
                                link.setAttribute('download','partnership_offer');
                                link.click();
                            }
                            initSideModal(data.message, 'message-modal', false, false);

                            if($form.data('crm-token') === 'summit-reg-form'){ // форма регистрации на саммит
                                console.log('summit-reg-form to CRM');
                                var summit_name = $('#summit_name').val();

                                if($('[name=summit_reg_select]').val() === "o_other" ) {
                                    select_text = $('input[name=other]').val();
                                }
                                $('#select_text').val(select_text); //добавляем значение поля откуда вы узнали о нас в скрытое поле для передачи в CRM

                                metrics();

                                //передача данных в CRM
                                var crm_config = {
                                    fields: {
                                        "Name": "#summit-registration-block [name=full_name]", // ФИО посетителя, заполнившего форму
                                        "Email": "#summit-registration-block [name=email]", // E-mail посетителя
                                        "MobilePhone": "#summit-registration-block [name=phone]", // телефон посетителя
                                        "Company": "#summit-registration-block [name=company]", // название компании
                                        "FullJobTitle": "#summit-registration-block [name=title]", // должность посетителя
                                        "Event": "#summit_name", // название саммита
                                        "CGRString1": "#summit-registration-block [name=promocode]", // промокод
                                        "CGRLandingLeadSource": "#select_text", //откуда вы узнали о нас
                                    },
                                    landingId: "b75941f4-65c1-441b-94ee-7fb1c6eac35b",
                                    serviceUrl: "http://bpm.b2bcg.ru:8082/0/ServiceModel/GeneratedObjectWebFormService.svc/SaveWebFormObjectData",
                                    redirectUrl: ""
                                };
                                landing.createObjectFromLanding(crm_config); // создаем объект из данных формы
                                landing.initLanding(crm_config); //отправляем данные
                            }else if($form.data('crm-token') === 'main-reg-form'){ //форма регистрации на сайте
                                console.log('main-reg-form to CRM');

                                metrics();

                                var fio = $(".main-reg-form [name=last_name]").val()+" "+$(".main-reg-form [name=first_name]").val()+" "+$(".main-reg-form [name=middle_name]").val();
                                $(".main-reg-form [name=full_name]").val(fio); // ФИО посетителя

                                //передача данных в CRM
                                var crm_config = {
                                    fields: {
                                        "Name": ".main-reg-form [name=full_name]", // ФИО посетителя, заполнившего форму
                                        "Email": ".main-reg-form [name=email]", // E-mail посетителя
                                        "MobilePhone": ".main-reg-form [name=phone]", // телефон посетителя
                                        "Company": ".main-reg-form [name=organisation]", // название компании
                                        "FullJobTitle": ".main-reg-form [name=title]", // должность посетителя
                                        "Event": ".main-reg-form [name=event]", // событие
                                    },
                                    landingId: "b75941f4-65c1-441b-94ee-7fb1c6eac35b",
                                    serviceUrl: "http://bpm.b2bcg.ru:8082/0/ServiceModel/GeneratedObjectWebFormService.svc/SaveWebFormObjectData",
                                    redirectUrl: ""
                                };
                                landing.createObjectFromLanding(crm_config); // создаем объект из данных формы
                                landing.initLanding(crm_config); //отправляем данные
                            }else if($form.data('crm-token') === 'subscribe-form'){ //форма подписки на рассылку
                                console.log('subscribe-form to CRM');

                                var fio = $(".subscribe-form [name=last_name]").val()+" "+$(".subscribe-form [name=first_name]").val()+" "+$(".subscribe-form [name=middle_name]").val();
                                $(".subscribe-form [name=full_name]").val(fio); // ФИО посетителя

                                var type_selected = $(".subscribe-form [name=type] option:selected").text();
                                var field_selected = $(".subscribe-form [name=work] option:selected").text();
                                $(".subscribe-form [name=type_selected]").val(type_selected);
                                $(".subscribe-form [name=field_selected]").val(field_selected);

                                //передача данных в CRM
                                var crm_config = {
                                    fields: {
                                        "Name": ".subscribe-form [name=full_name]", // ФИО посетителя, заполнившего форму
                                        "Email": ".subscribe-form [name=email]", // E-mail посетителя
                                        "MobilePhone": ".subscribe-form [name=phone]", // телефон посетителя
                                        "Company": ".subscribe-form [name=organisation]", // название компании
                                        "FullJobTitle": ".subscribe-form [name=title]", // должность посетителя
                                        "Event": ".subscribe-form [name=event]", // событие
                                        "CGRSector": ".subscribe-form [name=type_selected]", // Тип компании
                                        "CGRFieldOfActivity": ".subscribe-form [name=field_selected]", // Сфера деятельности
                                    },
                                    landingId: "b75941f4-65c1-441b-94ee-7fb1c6eac35b",
                                    serviceUrl: "http://bpm.b2bcg.ru:8082/0/ServiceModel/GeneratedObjectWebFormService.svc/SaveWebFormObjectData",
                                    redirectUrl: ""
                                };
                                landing.createObjectFromLanding(crm_config); // создаем объект из данных формы
                                landing.initLanding(crm_config); //отправляем данные
                            }else if($form.data('crm-token') === 'academy-form'){ //форма академии ритейла
                                var lang = $(".academy-form [name=lang]").val();

                                console.log('academy-form to CRM '+lang);

                                metrics();

                                var fi = $(".academy-form [name=surname]").val()+" "+$(".academy-form [name=name]").val();
                                $(".academy-form [name=full_name]").val(fi); // Фамилия и имя посетителя
                                var program_selected = $(".academy-form [name=program] option:selected").text();
                                var event = $(".academy-form [name=event]").val();
                                $(".academy-form [name=event]").val(event+" - "+program_selected);

                                //передача данных в CRM
                                if(lang == 'ru'){
                                    landing_Id = "6fb1ca54-067b-435f-b2a8-8342c6e13269";
                                } else if(lang == 'en'){
                                    landing_Id = "91bd85e6-e2ca-442d-9d81-9ed1dbd795ce";
                                }
                                var crm_config = {
                                    fields: {
                                        "Name": ".academy-form [name=full_name]", // Фамилия и имя посетителя, заполнившего форму
                                        "Email": ".academy-form [name=email]", // E-mail посетителя
                                        "MobilePhone": ".academy-form [name=phone]", // телефон посетителя
                                        "Company": ".academy-form [name=company]", // название компании
                                        "FullJobTitle": ".academy-form [name=title]", // должность посетителя
                                        "Event": ".academy-form [name=event]", // событие
                                    },
                                    landingId: landing_Id,
                                    serviceUrl: "http://bpm.b2bcg.ru:8082/0/ServiceModel/GeneratedObjectWebFormService.svc/SaveWebFormObjectData",
                                    redirectUrl: ""
                                };
                                landing.createObjectFromLanding(crm_config); // создаем объект из данных формы
                                landing.initLanding(crm_config); //отправляем данные
                            }else if($form.data('crm-token') === 'academy-form-modal'){ //модальная форма академии ритейла
                                var lang = $(".academy-form-modal [name=lang]").val();

                                console.log('academy-form-modal to CRM '+lang);

                                metrics();

                                var fi = $(".academy-form-modal [name=surname]").val()+" "+$(".academy-form-modal [name=name]").val();
                                $(".academy-form-modal [name=full_name]").val(fi); // Фамилия и имя посетителя
                                var program_selected = $(".academy-form-modal [name=program] option:selected").text();
                                var event = $(".academy-form-modal [name=event]").val();
                                $(".academy-form-modal [name=event]").val(event+" - "+program_selected);

                                //передача данных в CRM
                                if(lang == 'ru'){
                                    landing_Id = "6fb1ca54-067b-435f-b2a8-8342c6e13269";
                                } else if(lang == 'en'){
                                    landing_Id = "91bd85e6-e2ca-442d-9d81-9ed1dbd795ce";
                                }
                                var crm_config = {
                                    fields: {
                                        "Name": ".academy-form-modal [name=full_name]", // Фамилия и имя посетителя, заполнившего форму
                                        "Email": ".academy-form-modal [name=email]", // E-mail посетителя
                                        "MobilePhone": ".academy-form-modal [name=phone]", // телефон посетителя
                                        "Company": ".academy-form-modal [name=company]", // название компании
                                        "FullJobTitle": ".academy-form-modal [name=title]", // должность посетителя
                                        "Event": ".academy-form-modal [name=event]", // событие
                                    },
                                    landingId: landing_Id,
                                    serviceUrl: "http://bpm.b2bcg.ru:8082/0/ServiceModel/GeneratedObjectWebFormService.svc/SaveWebFormObjectData",
                                    redirectUrl: ""
                                };
                                landing.createObjectFromLanding(crm_config); // создаем объект из данных формы
                                landing.initLanding(crm_config); //отправляем данные
                            }
                            if($form.data('form-type') === 'summit-event-reg'){
                                metrics();
                            }
                            $form[0].reset();
                            $('#summit_name').val(summit_name);
                            $('[name=other_container]').hide();//скрываем поле "Другое" у формы регистрации на саммит
                            $('input[name=other]').val('');//очищаем поле "Другое" на форме регистрации
                            $('#select_text').val('');//очищаем скрытое поле "откуда вы узнали он нас"
                        } else if (data && data.message) {
                            $form.spin(false);
                            initSideModal('Ошибка: '+data.message, 'message-modal', false, false);
                            console.log(data.message);
                            $form.find('.js-form-messages').addClass('active').html(data.message);
                            if (data.errors) {
                                data.errors.forEach(function (error) {
                                    var $field = $('[name="' + error.name + '"]');
                                    if ($field.length) {
                                        $field.addClass('error');
                                        $field.siblings('.form-label').addClass('form-label-error');
                                        $field.siblings('.form-control-errors').addClass('active').html(error.message);
                                    }
                                });
                            }
                        }

                        if (data && data.redirect) {
                            window.location.href = data.redirect;
                        }

                        if (data && data.reload) {
                            window.location.reload();
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        alert('Ошибка отправки данных. Пожалуйста, попробуйте ещё раз. Error while loading data. Please, try again or contact us.');
                        console.log(jqXHR);
                        console.log(errorThrown);
                    }).always(function () {
                        $('.submit-registration-block-form-footer button').prop( "disabled", false );
                        $('.registration-form-submit button').prop( "disabled", false );
                        hideOverlay();
                    });
                }

                return false;
            });
        });
    }
}( jQuery ));
