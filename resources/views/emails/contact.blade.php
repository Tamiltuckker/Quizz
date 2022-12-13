<!DOCTYPE html>
<html>

<head>
    <title>Quiz Bee.com</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <p>Dear Sir/Mam,</p>
    <p> The following details are submitted by the user in the contact form,<p>
    <h3>Name:{{ $details['name'] }}</h3>
    <h3>E-mail:{{ $details['email'] }}</h3>
    <h3>Subject:{{ $details['subject'] }}</h3>
    <h3>Message:{{ $details['message'] }}</h3> 
            <p>Thank you</p>
</body>
</html>