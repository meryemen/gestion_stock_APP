<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h4>Bonjour  {{ $data['nom'] }} {{ $data['prenom'] }},</h4><br>
    <p>Voici ci-dessous vos données d'authentification à votre plateform <strong style="color: rgb(5, 33, 172)"> It Asset Control: </strong><br> 
       <strong> Username: {{ $data['username'] }} </strong><br>
       <strong> Mot de passe : {{ $data['password'] }}</strong>  <br>
    </p>
   
  
</body>
</html>