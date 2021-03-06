define(
    [
        'jquery',
        'uiComponent',
        'Magento_Customer/js/customer-data',
        'mage/translate'
    ],
    function ($, Component, customerData) {
        'use strict';
        return Component.extend({
            /** @inheritdoc */
            initialize: function () {
                this._super();
                customerData.reload(['weather'], true);
                this.customSection = customerData.get('weather');
            }
        });
    }
);
