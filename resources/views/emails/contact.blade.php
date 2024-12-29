<!DOCTYPE html>
<html>
<head>
    <title>Nuevo mensaje de contacto</title>
</head>
<body>
    <h2>Nuevo mensaje de contacto</h2>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Asunto:</strong> {{ $data['subject'] }}</p>
    <p><strong>Mensaje:</strong> {{ $data['message'] }}</p>
</body>
</html>
