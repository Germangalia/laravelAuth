var Vue = require('vue');

var $ = require('jquery');

var vm = new Vue({
    el: '#email',
    data: {
        placeholder: "youremail@gmail.com",
        url:"http://auth.app/checkMailExists"
    },
    methods: {
        //self=this;
        checkEmailExist: function (item) {
            var email = $('#mail').value();
            console.debug("checkemailexist EXECUTED!");
            console.debug("Apunt de cridar:");
            console.debug(this.url);
            var url = this.url + '?email=' + email;
            console.debug(url);

            $.ajax(url).done(function(data) {
                //Ok
                console.debug(data);
                if(data == 'true'){
                    //TODO email està lliure DO NOTHING
                }else {
                    alert('email ocupat!')
                }
            }).fail(function(data) {
                //error
                alert("Ha petat");
            }).always(function(data) {
                //always
                console.debug('Xivato!');
            });
        }
    }
});