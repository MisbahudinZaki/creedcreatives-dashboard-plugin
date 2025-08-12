jQuery(document).ready(function ($) {
    // Inisialisasi color picker WP
    $('.cc-color-field').wpColorPicker({
        change: function (event, ui) {
            // Update value HEX ke input ketika slider digeser
            $(event.target).val(ui.color.toString());
        },
        clear: function (event) {
            // Kosongkan jika klik "Clear"
            $(event.target).val('');
        }
    });
});
