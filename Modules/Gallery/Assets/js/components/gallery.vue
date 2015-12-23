<template>
    <section id="main" class="container" style="padding-bottom: 0;">
        <header style="margin-bottom: 0;">
            <h2>Sites built with AsgardCms</h2>
            <p>
                <a href="" class="button special" @click.prevent="openForm">Submit your own website</a>
            </p>
        </header>
    </section>
    <section id="cta" style="display: none;">
        <p>Submit finished websites you have developed with AsgardCms.</p>
        <p class="message"></p>
        <validator name="validationWebsite">
            <form action="{{ route('api.sites.submit') }}" method="POST" class="websiteForm" style="width: 50em;">
                <div class="row uniform 50%">
                    <div class="6u">
                        <input type="text" name="name" id="name" placeholder="Full name"
                               v-model="name" v-validate:name="['required']" value="{{ $currentUser ? $currentUser->present()->fullName : '' }}" />
                        <span v-show="$validationWebsite.name.required" class="error">Your name is required.</span>
                    </div>
                    <div class="6u">
                        <input type="email" name="email" id="email" placeholder="Email Address"
                               v-model="email" v-validate:email="['required']"  value="{{ $currentUser ? $currentUser->email : '' }}"/>
                        <span v-show="$validationWebsite.email.required" class="error">Your email is required.</span>
                    </div>
                    <div class="12u">
                        <input type="text" name="website_url" id="website_url" placeholder="Website URL"
                               v-model="website_url" v-validate:website_url="['required']"/>
                        <span v-show="$validationWebsite.website_url.required" class="error">The website URL is required.</span>
                    </div>
                    <div class="12u">
                        <textarea name="message" id="message" placeholder="Message"
                                  v-model="message" v-validate:message="['required']"></textarea>
                        <span v-show="$validationWebsite.message.required" class="error">A message is required.</span>
                    </div>
                    <div class="12u">
                        <input type="submit" value="Submit site" class="fit"
                               @click.prevent="submitWebsite" v-if="$validationWebsite.valid"/>
                    </div>
                </div>
            </form>
        </validator>
    </section>
</template>

<script type="text/ecmascript-6">
    import Laroute from '../laroute'
    export default {
        data: function () {
            return {
                name: '',
                email: '',
                website_url: '',
                message: ''
            }
        },
        methods: {
            openForm: function () {
                $('#cta').slideToggle();
            },
            submitWebsite: function () {
                var $form = $('.websiteForm'),
                        data = {name: this.name, email: this.email, website_url: this.website_url, message: this.message},
                        $messageWrapper = $('.message');

                this.$http.post($form.attr('action'), data, function(data) {
                    $form.fadeOut();
                    $messageWrapper.text(data);
                    setTimeout(function () {
                        $('#cta').slideUp();
                    }, 2000);
                }).error(function (errors) {
                    $messageWrapper.empty();
                    $.each(errors, function (field, error) {
                        $messageWrapper.append(error[0] + '<br />');
                    });
                });
            }
        }
    }
</script>
