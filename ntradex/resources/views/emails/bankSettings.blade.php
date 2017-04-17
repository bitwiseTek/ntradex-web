<!DOCTYPE html>
<html lang="en-US">
        <head>
                <meta charset="utf-8">
                <title>Bank Update</title>
        </head>
                <body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;">
                        <div style="padding:10px; background:#333; font-size:19px; color:#CCC;">
                         Local Bank Update
                        </div>

                        <div style="padding:24px; font-size:13px;">
                                <span style="font-weight:bold">{{$last_name}} {{$first_name}}</span>,
                                        You just updated your Local Bank Account Details used for Funds Transfer with the following;
                                <p>
                                        <div>
                                                <span style="font-weight:bold">Local Bank Name: </span>{{$bank_name}}
                                        </div>
                                        <div>
                                                <span style="font-weight:bold">Account Number: </span>{{$bank_account}}
                                        </div>
                                </p>
                        </div>

                        <p><span style="font-weight:bold">Ntradex Team.</span></p>
                        &nbsp;
                        &nbsp;
                        <p><span style="font-weight:lighter; font-size:8px">You received this email because an account was registered for nTradeX using the address {{$email}}
        </body>
</html>
