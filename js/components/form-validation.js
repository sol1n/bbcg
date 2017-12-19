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
                "File cannot be larger than {0}{1}.",
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
                errorPlacement: function(error, element) {},
                highlight: function(element, errorClass, validClass) {
                    $(element).closest('.form-group').find('.form-label').addClass('form-label-error').removeClass('form-label-valid');
                    $(element).closest('.form-control').addClass(errorClass).removeClass(validClass);
                    $(element).addClass(errorClass).removeClass(validClass);
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).closest('.form-group').find('.form-label').removeClass('form-label-error').addClass('form-label-valid');
                    $(element).closest('.form-control').removeClass(errorClass).addClass(validClass);
                    $(element).removeClass(errorClass).addClass(validClass);
                }
            });
        });
    };
}( jQuery ));