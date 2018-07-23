(function( $ ) {
    var is_supported_browser = !!window.File;

    var fileSizeToBytes = (function () {
        var units = ["B", "KB", "MB", "GB", "TB"];

        return function (size, unit) {
            var index_of_unit = units.indexOf(unit),
                coverted_size;

            if (index_of_unit === -1) {
                coverted_size = false;
            } else {
                while (index_of_unit > 0) {
                    size *= 1024;
                    index_of_unit -= 1;
                }
                coverted_size = size;
            }

            return coverted_size;
        };
    }());

    var formatter = $.validator.format;

    $.validator.addMethod("dateRange", function(value, el, params) {
        try {
            var dateFormat = 'YYYY.MM.DD',
                dateRange = params.split(','),
                dateFrom = dateRange[0].split('.').reverse(),
                timestampFrom = moment(dateFrom, dateFormat).unix(),
                dateTo = dateRange[1].split('.').reverse(),
                timestampTo = moment(dateTo, dateFormat).unix(),
                dateValue = value.split('.').reverse(),
                timestampValue = moment(dateValue, dateFormat).unix();

            return (timestampFrom <= timestampValue && timestampValue <= timestampTo);
        } catch(e) {
            //console.log(e);
            return false;
        }
    });

    $.validator.addMethod("maxFileSize", function (value, el, params) {
            var files,
                unit = params.unit || "KB",
                size = params.size || 100,
                max_file_size = fileSizeToBytes(size, unit),
                is_valid = false;

            if (!is_supported_browser || this.optional(el)) {
                is_valid = true;
            } else {
                files = el.files;

                if (files.length < 1) {
                    is_valid = false;
                } else {
                    is_valid = files[0].size <= max_file_size;
                }
            }

            return is_valid;
        },
        function (params, el) {
            return formatter(
                "Файл больше чем {0}{1}",
                [params.size || 100, params.unit || "KB"]
            );
        }
    );

    $.validator.methods.email = function( value, element ) {
        return this.optional(element) || /.+@.+\..{2,}/i.test(value);
    };

    $.fn.formValidation = function() {
        this.each(function() {
            $(this).validate({
                rules: {//file required field
                  file: {
                    required: true,
                  }
                },
                messages: {//error-message if file not selected
                  file: {
                    required: "Файл не выбран!",
                  }
                },
                success: function(label,element) {//if valid show file name and size
                    if ($('input[type=file]').length > 0) {
                        if($('input[type=file]').val()!== ""){
                            function conv_size(b){//convert bytes for kb/mb
                                fsizekb = b / 1024;
                                fsizemb = fsizekb / 1024;
                                if (fsizekb <= 1024) {
                                 fsize = fsizekb.toFixed(3) + ' KB';
                                } else if (fsizekb >= 1024 && fsizemb <= 1024) {
                                	fsize = fsizemb.toFixed(3) + ' MB';
                                }
                                return fsize;
                            };
                            $('[name=selected-file]').html("Выбран файл: "+$('input[type=file]').val().split('\\').pop()+" <br>Размер: "+conv_size($("input[type=file]")[0].files[0].size));
                        }
                    }
                },
                errorPlacement: function(error, element) {},
                highlight: function(element, errorClass, validClass) {
                    $(element).closest('.form-group').find('.form-label').addClass('form-label-error').removeClass('form-label-valid');
                    $(element).closest('.form-control').addClass(errorClass).removeClass(validClass);
                    $(element).addClass(errorClass).removeClass(validClass);
                    if($(element).attr('name') == 'file'){//if file not valid highlight element and hide file-info
                        $('[for=file]').addClass('error');
                        $('[name=selected-file]').hide();
                    }
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).closest('.form-group').find('.form-label').removeClass('form-label-error').addClass('form-label-valid');
                    $(element).closest('.form-control').removeClass(errorClass).addClass(validClass);
                    $(element).removeClass(errorClass).addClass(validClass);
                    if($(element).attr('name') == 'file'){//if file valid unhighlight element and show file-info
                        $('[for=file]').removeClass('error');
                        $('[name=selected-file]').show();
                        $('[for=file]').html("Файл выбран").show();
                    }
                }
            });
        });
    };
}( jQuery ));
