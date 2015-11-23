var Vue = require('vue');

var vm = new Vue({
    el: '#email',
    data: {
        exist: false,
        placeholder: "youremail@gmail.com"
    },
    methods: {
        sayhello: function() {
          alert("hola!");
        },
        checkEmailExist: function (item) {
            console.debug("hey");
        }
    }
});