<!doctype html>
<html>
    <head>
        <title>[[*longtitle:default=`[[++site_name]]`]]</title>
        <style>
            html,body {
                padding: 0;
                background: white;
            }
        </style>
    </head>
    <body>
        <table cellpadding="5" cellspacing="0" border="0" width="600">
            <tr>
                <td colspan="2">
                    <p>Er is een e-mail verstuurd door [[+name]] vanaf de website.</p>
                </td>
            </tr>
            <tr><td width="150" valign="top"><strong>[[%site.form.name? &namespace=`startertheme` &topic=`default`]]:</strong></td><td>[[+name]]</td></tr>
            <tr><td valign="top"><strong>[[%site.form.fname? &namespace=`startertheme` &topic=`default`]]:</strong></td><td>[[+fname]]</td></tr>
            <tr><td valign="top"><strong>[[%site.form.lname? &namespace=`startertheme` &topic=`default`]]:</strong></td><td>[[+lname]]</td></tr>
            <tr><td valign="top"><strong>[[%site.form.email? &namespace=`startertheme` &topic=`default`]]:</strong></td><td>[[+email]]</td></tr>
            <tr><td valign="top"><strong>[[%site.form.phone? &namespace=`startertheme` &topic=`default`]]:</strong></td><td>[[+phone]]</td></tr>
            <tr><td valign="top"><strong>[[%site.form.address? &namespace=`startertheme` &topic=`default`]]:</strong></td><td>[[+address]]</td></tr>
            <tr><td valign="top"><strong>[[%site.form.zipcode? &namespace=`startertheme` &topic=`default`]]:</strong></td><td>[[+zip]]</td></tr>
            <tr><td valign="top"><strong>[[%site.form.city? &namespace=`startertheme` &topic=`default`]]:</strong></td><td>[[+city]]</td></tr>
            <tr><td valign="top"><strong>[[%site.form.message? &namespace=`startertheme` &topic=`default`]]:</strong></td><td>[[+message:nl2br]]</td></tr>
        </table>
    </body>
</html>
