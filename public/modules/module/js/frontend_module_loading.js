Vue.http.headers.common['X-CSRF-TOKEN'] = window.document.querySelector('meta#token').getAttribute('value');
new Vue({
    el: '#app',
    data: {
        packagist_uri: oldInput.packagist_uri,
        vendor: oldInput.vendor,
        name: oldInput.name,
        excerpt: oldInput.excerpt,
        description: '',
        documentation: '',
        favourites: oldInput.favourites,
        total_downloads: oldInput.total_downloads,
        monthly_downloads: oldInput.monthly_downloads,
        daily_downloads: oldInput.daily_downloads,
        category: oldInput.category
    },
    methods: {
        fetchData: function () {
            var $fetchDataButton = $('.fetchDataButton');
            $fetchDataButton.html('<i class="fa fa-spinner fa-pulse"></i> Loading');
            this.$http.post(routes.modulePackagistData, {packagist_uri: this.packagist_uri}, function (data) {
                this.vendor = data.vendor;
                this.name = data.name;
                this.excerpt = data.excerpt;
                this.favourites = data.favourites;
                this.total_downloads = data.total_downloads;
                this.monthly_downloads = data.monthly_downloads;
                this.daily_downloads = data.daily_downloads;
                mde.descriptionMde.value(data.description);
            }).success(function () {
                $fetchDataButton.html('Data imported');
                setTimeout(function () {
                    $fetchDataButton.html('Load');
                }, 1000);
            });
        }
    }
});
