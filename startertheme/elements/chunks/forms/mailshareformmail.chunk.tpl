<html>
    <head>
        <title>[[%site.social.share.email_title? &namespace=`startertheme` &topic=`default`]]</title>
    </head>
    <body>
        <table cellpadding="5" cellspacing="0" border="0" width="600">
            <tr>
                <td colspan="2">
                    <p>
                        [[%site.social.share.email_text?
                            &namespace=`startertheme`
                            &topic=`default`
                            &name=`[[+share_name]]`
                            &message=`[[+share_message:nl2br]]`
                            &email=`[[+share_email]]`
                        ]]
                    </p>
                </td>
            </tr>
        </table>
    </body>
</html>
