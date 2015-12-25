Vue.http.headers.common['X-CSRF-TOKEN'] = window.document.querySelector('meta#token').getAttribute('value');

$( document ).ready(function() {
    new Vue({
        el: '.app',
        data: {
            packagist_url: 'asd'
        }
    });
});
