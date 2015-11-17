var Vue = require('vue');

new Vue({
    el: '#emailFormGroup',
    data: {
        exist: false
    },
    methods: {
        checkEmailExist: function (event) {
            alert('Xivato');
            this.exists=true;
        }
    }
});