(function( $ ) {
    $.fn.suggestSearch = function() {
        return this.each(function() {
            var $searchField = $(this).find('input'),
                autosuggestURL = $(this).data('suggest-search');

            $searchField.devbridgeAutocomplete({
                appendTo: $searchField.parent(),
                serviceUrl: autosuggestURL,
                minChars: 1,
                onSelect: function (suggestion) {
                    if (suggestion.url) {
                        window.location.href = suggestion.url;
                    }
                }
            });
        });
    };
}( jQuery ));