<!DOCTYPE html>
<html>
<head>
    <title> مرحبا بك في {{ config('app.name') }}</title>
</head>
<body>
    <h1>مرحبا بك في {{ config('app.name') }}</h1>
    <p>مرحبا {{ $pharmacist->name }},</p>
    <p>شكرا لاختياركم خدمتنا تم تفعيل الحساب بنجاح  </p>
    <p>اطيب الامنيات لكم ,</p>
    <p> {{ config('app.name') }} فريق</p>
</body>
</html>