jQuery(document).ready(function($){
    hji.require(['hji-common/selectize'], function()
    {
        $('#select-state').selectize({
            maxItems: 1,
            allowEmptyOption: true
        });
    });
});