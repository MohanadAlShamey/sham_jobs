<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>

    <tr>
        <td>first name</td>
        <td>last name</td>
        <td>email</td>
        <td>area</td>
        <td>address</td>
        <td>city</td>
        @foreach($job->asks()->orderBy('id')->get() as $ask)
            <td>{{$ask->title}}</td>
        @endforeach
    </tr>
    @foreach($job->groups as $group)
        <tr>
            <td>{{$group->first_name}}</td>
            <td>{{$group->last_name}}</td>
            <td>{{$group->email}}</td>
            <td>{{$group->area}}</td>
            <td>{{$group->address}}</td>
            @foreach($group->answers()->orderBy('ask_id')->get() as $answer)
                <td>{{$answer->answer}}</td>
            @endforeach
        </tr>
    @endforeach

</table>
</body>
</html>
