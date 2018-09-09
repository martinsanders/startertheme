[[!FormIt?
    &hooks=`spam,FormItSaveForm,email,FormItAutoResponder,redirect`
    &emailTo=`[[++email_client]]`
    &emailReplyTo=`[[+email]]`
    &emailReplyToname=`[[+name]]`
    &emailBCC=`[[++email_bcc]]`
    &emailBCCName=`Contactformulier BCC`
    &emailSubject=`[[%site.form.contact.emailsubject? &namespace=`startertheme` &topic=`default`]]`
    &emailFromName=`[[+name]]`
    &emailFrom=`[[+email]]`
    &emailTpl=`contactFormMail`
    
    &formName=`Contactformulier`
    &formFields=`name,fname,lname,email,phone,address,zip,city,message`
    &fieldNames=`name==Naam,fname==Voornaam,lname==Achternaam,email==E-mail,phone==Telefoon,address==Straat,zip==Postcode,city==Plaats,message==Bericht`
    
    &fiarToField=`email`
    &fiarTpl=`contactFormFiarMail`
    &fiarSubject=`[[%site.form.contact.emailsubject? &namespace=`startertheme` &topic=`default`]]`
    &fiarFrom=`[[++email_client]]`
    &fiarFromName=`[[++site_name]]`
    &fiarReplyTo=`[[++email_client]]`
    
    &redirectTo=`[[++page_contact_thanks]]`
    &validate=`name:required,fname:required,lname:required,email:email:required,phone:required,address:required,zip:required,city:required,message:required,nospam:blank`
    &store=`1`
    &formEncrypt=`1`
    &submitVar=`contact-submit`
]]

<div id="contactform" class="col-sm-6 m-auto">
    <form action="[[*id:makeUrl]]" role="form" method="post" novalidate>
        <input type="hidden" name="nospam" value="" />

        <div class="form-group [[!+fi.error.name:notempty=`has-error`]]">
            <label for="fullname">[[%site.form.name? &namespace=`startertheme` &topic=`default`]] *</label>
            <input class="form-control" type="text" value="[[!+fi.name]]" name="name" id="fullname" autocomplete="name"/>
            [[!+fi.error.name:notempty=`<p class="help-block">[[%site.form.error.name? &namespace=`startertheme` &topic=`default`]]</p>`]]
        </div>
        
        <div class="form-group [[!+fi.error.fname:notempty=`has-error`]]">
            <label for="fname">[[%site.form.fname? &namespace=`startertheme` &topic=`default`]] *</label>
            <input class="form-control" type="text" value="[[!+fi.fname]]" name="fname" id="fname" autocomplete="given-name"/>
            [[!+fi.error.fname:notempty=`<p class="help-block">[[%site.form.error.fname? &namespace=`startertheme` &topic=`default`]]</p>`]]
        </div>

        <div class="form-group [[!+fi.error.lname:notempty=`has-error`]]">
            <label for="lname">[[%site.form.lname? &namespace=`startertheme` &topic=`default`]] *</label>
            <input class="form-control" type="text" value="[[!+fi.lname]]" name="lname" id="lname" autocomplete="family-name"/>
            [[!+fi.error.lname:notempty=`<p class="help-block">[[%site.form.error.lname? &namespace=`startertheme` &topic=`default`]]</p>`]]
        </div>

        <div class="form-group [[!+fi.error.email:notempty=`has-error`]]">
            <label for="email">[[%site.form.email? &namespace=`startertheme` &topic=`default`]] *</label>
            <input class="form-control" type="email" value="[[!+fi.email]]" name="email" id="email" autocomplete="email"/>
            [[!+fi.error.email:notempty=`<p class="help-block">[[%site.form.error.email? &namespace=`startertheme` &topic=`default`]]</p>`]]
        </div>
          
        <div class="form-group [[!+fi.error.phone:notempty=`has-error`]]">
            <label for="phone">[[%site.form.phone? &namespace=`startertheme` &topic=`default`]] *</label>
            <input class="form-control" type="tel" value="[[!+fi.phone]]" name="phone" id="phone" autocomplete="tel"/>
            [[!+fi.error.phone:notempty=`<p class="help-block">[[%site.form.error.phone? &namespace=`startertheme` &topic=`default`]]</p>`]]
        </div>

        <div class="form-group [[!+fi.error.address:notempty=`has-error`]]">
            <label for="address">[[%site.form.address? &namespace=`startertheme` &topic=`default`]] *</label>
            <input class="form-control" type="text" value="[[!+fi.address]]" name="address" id="address" autocomplete="street-address"/>
            [[!+fi.error.address:notempty=`<p class="help-block">[[%site.form.error.address? &namespace=`startertheme` &topic=`default`]]</p>`]]
        </div>

        <div class="form-group [[!+fi.error.zip:notempty=`has-error`]]">
            <label for="zipcode">[[%site.form.zipcode? &namespace=`startertheme` &topic=`default`]] *</label>
            <input class="form-control" type="text" value="[[!+fi.zip]]" name="zip" id="zipcode" autocomplete="postal-code"/>
            [[!+fi.error.zip:notempty=`<p class="help-block">[[%site.form.error.zipcode? &namespace=`startertheme` &topic=`default`]]</p>`]]
        </div>

        <div class="form-group [[!+fi.error.city:notempty=`has-error`]]">
            <label for="city">[[%site.form.city? &namespace=`startertheme` &topic=`default`]] *</label>
            <input class="form-control" type="text" value="[[!+fi.city]]" name="city" id="city" autocomplete="address-level2"/>
            [[!+fi.error.city:notempty=`<p class="help-block">[[%site.form.error.city? &namespace=`startertheme` &topic=`default`]]</p>`]]
        </div>

        <div class="form-group [[!+fi.error.message:notempty=`has-error`]]">
            <label for="messagearea">[[%site.form.message? &namespace=`startertheme` &topic=`default`]] *</label>
            <textarea class="form-control form-control__textarea" rows="4" name="message" id="messagearea">[[!+fi.message]]</textarea>
            [[!+fi.error.message:notempty=`<p class="help-block">[[%site.form.error.message? &namespace=`startertheme` &topic=`default`]]</p>`]]
        </div>

        <div class="form-group">
            <p class="help-block">* [[%site.form.requiredfields? &namespace=`startertheme` &topic=`default`]]</p>
        </div>

        <button type="submit" class="btn btn-primary" name="contact-submit" value="contact-submit">
            [[%site.form.submit? &namespace=`startertheme` &topic=`default`]]
        </button>
    </form>
</div>