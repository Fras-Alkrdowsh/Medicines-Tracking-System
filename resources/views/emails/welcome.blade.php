<!DOCTYPE html>
<html>
<head>
    <title> مرحبا بك في {{ config('app.name') }}</title>
</head>
<body>
    <h1>مرحبا بك في {{ config('app.name') }}</h1>
    <p>مرحبا {{ $user->name }},</p>
    <p>شكرا لاختيارك خدمتنا سنقوم بارسال بريد عند تأكيد نجاح عملية التسجيل</p>
    <p>اطيب الامنيات لكم ,</p>
    <p> {{ config('app.name') }} فريق</p>
</body>
</html>