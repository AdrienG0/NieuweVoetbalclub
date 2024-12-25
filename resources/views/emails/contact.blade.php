<!DOCTYPE html>
<html>
<head>
    <title>Nieuw Contactformulierbericht</title>
</head>
<body>
    <p><strong>Naam:</strong> {{ $details['name'] }}</p>
    <p><strong>E-mailadres:</strong> {{ $details['email'] }}</p>
    <p><strong>Bericht:</strong></p>
    <p>{{ $details['message'] }}</p>
</body>
</html>
