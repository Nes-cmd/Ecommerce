<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 page not found!</title>
    <link rel="stylesheet" href="css/app.css">
    @livewireStyles
    @livewireScripts
</head>
<body class="bg-gray-300">
    <h5 class="flex justify-center pt-36">
        <img src="images/error_photo/404.jpeg" width="800px" alt="">
    </h5>
    <a class="flex justify-center text-blue-500" href="{{ url('/')}}">Back to Home</a>
    <div class="pt-20">
        @livewire('customer.toprated', ['message' => 'We are selling these products, what are u looking for'])
    </div>
</body>
</html>