<div id="mail-popup" class="social-mail-popup">
    <h2>[[%site.form.share.emailtitle? &namespace=`startertheme`&topic=`default`]]</h2>

    [[!FormIt?
        &hooks=`spam,email,redirect`
        &emailTo=`[[+share_email_receiver]]`
        &emailReplyTo=`[[+share_email]]`
        &emailReplyToName=`[[++site_name]]`
        &emailSubject=`[[%site.form.share.emailsubject? &namespace=`startertheme` &topic=`default`]]`
        &emailFrom=`[[+share_email]]`
        &emailFromName=`[[++site_name]]`
        &emailTpl=`mailShareFormMail`

        &formName=`Deel deze pagina`
        &formFields=`share_name,share_email,share_email_receiver,share_message,share_url`
        &fieldNames=`share_name==Naam,share_email==E-mail,share_email_receiver==Ontvangers,share_message==Bericht,share_url==Url`

        &redirectTo=`[[++page_share_thanks]]`
        &validate=`share_name:required,share_email:email:required,share_email_receiver:required,share_message:required,nospam:blank`
        &store=`1`
        &submitVar=`share-submit`
    ]]

    <form action="[[*id:makeUrl]]#mail-popup" role="form" method="post" novalidate>
        <input type="hidden" name="nospam" value="" />
        <input type="hidden" name="share_url" value="[[!+fi.share_url:default=`[[~[[*id]]? &scheme=`full`]]`]]" />

        <div class="form-group [[!+fi.error.share_name:notempty=`has-error`]]">
            <label for="share_name">[[%site.form.name? &namespace=`startertheme`&topic=`default`]] *</label>
            <input class="form-control" type="text" value="[[!+fi.share_name]]" name="share_name" id="share_name" autocomplete="name" />
            [[!+fi.error.share_name:notempty=`<p class="help-block">[[!+fi.error.share_name]]</p>`]]
        </div>

        <div class="form-group [[!+fi.error.share_email:notempty=`has-error`]]">
            <label for="share_email">[[%site.form.email? &namespace=`startertheme`&topic=`default`]] *</label>
            <input class="form-control" type="email" value="[[!+fi.share_email]]" name="share_email" id="share_email" autocomplete="email" />
            [[!+fi.error.share_email:notempty=`<p class="help-block">[[!+fi.error.share_email]]</p>`]]
        </div>

        <div class="form-group [[!+fi.error.share_email_receiver:notempty=`has-error`]]">
            <label for="share_email_receiver">[[%site.form.recievers? &namespace=`startertheme`&topic=`default`]] *</label>
            <input class="form-control" type="email" value="[[!+fi.share_email_receiver]]" name="share_email_receiver" id="share_email_receiver" autocomplete="email" placeholder="[[%site.form.recievers_placeholder? &namespace=`startertheme`&topic=`default`]]" />
            [[!+fi.error.share_email_receiver:notempty=`<p class="help-block">[[!+fi.error.share_email_receiver]]</p>`]]
        </div>

        <div class="form-group [[!+fi.error.share_message:notempty=`has-error`]]">
            <label for="share_message">[[%site.form.message? &namespace=`startertheme`&topic=`default`]] *</label>
            <textarea class="form-control form-control__textarea" rows="4" name="share_message" id="share_message">[[!+fi.share_message:default=`[[%site.social.share.default_text? &namespace=`startertheme`&topic=`default`&link=`[[~[[*id]]? &scheme=`full`]]`]]`]]</textarea>
            [[!+fi.error.share_message:notempty=`<p class="help-block">[[!+fi.error.share_message]]</p>`]]
        </div>

        <div class="form-group">
            <p class="help-block">* [[%site.form.requiredfields? &namespace=`startertheme`&topic=`default`]]</p>
        </div>

        <button type="submit" class="btn btn--primary" name="share-submit" value="share-submit" title="[[%site.form.submit? &namespace=`startertheme`&topic=`default`]]">[[%site.form.submit? &namespace=`startertheme`&topic=`default`]]</button>
    </form>
</div>