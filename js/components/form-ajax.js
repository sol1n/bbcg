(function( $ ) {
    $.fn.formAjax = function() {
        this.each(function() {

            $('[name=summit_reg_select]').on('change', function() {//показываем поле "Другое" если этот пункт выбран
                if ( this.value === "o_other" ) {
                    $('[name=other_container]').show();
                } else {
                    $('[name=other_container]').hide();
                    $('input[name=other]').val('');
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
                        $(formOverlay).addClass('active').spin('large', '#000');
                    } else {
                        $('body').spin('large', '#000');
                    }
                }

                function hideOverlay() {
                    if (formOverlay) {
                        $(formOverlay).removeClass('active').spin(false);
                    } else {
                        $('body').spin(false);
                    }
                }

                function checkCaptcha() {
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

                function submitForm() {
                    showOverlay();
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
                            if($form.data('crm-token') === 'Y'){
                                console.log('summit-reg-form');

                                //передача данных в CRM
                                var crm_config = {
                                    fields: {
                                        "Name": "#summit-registration-block [name=full_name]", // ФИО посетителя, заполнившего форму
                                        "Email": "#summit-registration-block [name=email]", // E-mail посетителя
                                        "MobilePhone": "#summit-registration-block [name=phone]", // телефон посетителя
                                        "Company": "#summit-registration-block [name=company]", // название компании
                                        "Job": "#summit-registration-block [name=title]", // должность посетителя
                                        "Event": "#summit_name", // название саммита
                                        "CGRString1": "#summit-registration-block [name=promocode]", // промокод
                                    },
                                    landingId: "b75941f4-65c1-441b-94ee-7fb1c6eac35b",
                                    serviceUrl: "http://bpm.b2bcg.ru:8082/0/ServiceModel/GeneratedObjectWebFormService.svc/SaveWebFormObjectData",
                                    redirectUrl: ""
                                };
                                landing.createObjectFromLanding(crm_config); // создаем объект из данных формы
                                landing.initLanding(crm_config); //отправляем данные
                            }
                            $form[0].reset();
                            $('[name=other_container]').hide();//скрываем поле "Другое" у формы регистрации на саммит
                            $('input[name=other]').val('');//очищаем поле "Другое" на форме регистрации
                            initSideModal(data.message, 'message-modal', false, false);
                        } else if (data && data.message) {
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
