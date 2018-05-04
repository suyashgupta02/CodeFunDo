<!DOCTYPE html>
<html>
<head>
    <title>JSSample</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
</head>
<body>

<script type="text/javascript">
    $(function() {
        var params = {

            "documents": [
            {
                "language": "this is somthing like wtf",
                "id": "string",
                "text": "string"
            }
        ]
        };


        $.ajax({
            url: "https://southcentralus.api.cognitive.microsoft.com/text/analytics/v2.0/keyPhrases?" + $.param(params),
            beforeSend: function(xhrObj){
                // Request headers
                xhrObj.setRequestHeader("Content-Type","application/json");
                xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key","44fe709b503e421fbcbc8c33af1fcafb");
            },
            type: "POST",
            // Request body
            data: "{body}",
        })
            .done(function(data) {
                alert("success");
            })
            .fail(function() {
                alert("error");
            });
    });
</script>
</body>
</html>











<?php
/**
 * Created by PhpStorm.
 * User: karan
 * Date: 25-03-2018
 * Time: 01:36
 */