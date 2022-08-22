<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sending Data ...</title>

    <script src=" {{ asset('js/_client/sendingDataToADMIN.js') }} "></script>

    <link rel="stylesheet" href=" {{ asset('css/_client/sendingDataToADMIN.css') }} ">

</head>

<body>
    <form id="linkerForm" method="post" action=" {{ route('project.validate') }} " enctype="multipart/form-data">
        @csrf
        <input type="text" name="idOfUser" value=" {{ $id }} ">
        <input type="text" name="theProIdentifier" value=" {{ $proTitle }} ">
    </form>
    <div class='container'>
        <div class='loader'>
            <div class='loader--dot'></div>
            <div class='loader--dot'></div>
            <div class='loader--dot'></div>
            <div class='loader--dot'></div>
            <div class='loader--dot'></div>
            <div class='loader--dot'></div>
            <div class='loader--text'></div>
        </div>
    </div>

    <script>
        redirectFormData();
    </script>
</body>

</html>
