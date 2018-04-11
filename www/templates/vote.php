<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>BBCG — B2B Conference group</title>
    <meta name="theme-color" content="#1b1b1b">
    <link rel="icon" type="image/png" href="../favicon.png" />
</head>
<body>
<div id="app">
    <spinner v-if="spinner" class="spinner" line-fg-color="#E87B47"></spinner>
    <forms-list></forms-list>
    <form-app :form="formData"></form-app>
    <form-error></form-error>
</div>
<script src="../assets/build/scripts.min.js"></script>
<script src="../assets/forms/forms.bundle.js"></script>
<script>
    $.ajax({
        url: 'http://api.appercode.com/v1/bbcg/login/anonymous',
        method: 'POST',
        contentType: "application/json",
        cache: false
    })
    .done(function( data ) {
        if (data && data.sessionId) {
            sessionFromNative('{"baseUrl": "http://api.appercode.com/v1/", "projectName": "bbcg", "installationId": "", "sessionId": "' + data.sessionId + '",    "refreshToken": "", "userId": ' + data.userId + ', "language": "ru", "appVersion": "1"}');
        }
    });
</script>
</body>
</html>