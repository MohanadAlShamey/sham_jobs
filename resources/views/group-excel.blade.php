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
<table border="1" width="100%">

    <tr>
        <td>الاسم الاول</td>
        <td>الاسم الأخير</td>
        <td>اسم الأب</td>
        <td>البريد</td>
        <td>مكان السكن</td>
        <td>العنوان</td>
        <td>تاريخ الميلاد</td>
        <td>الوظيفة</td>

        @foreach($job->asks()->orderBy('id')->get() as $ask)
            <td>{{$ask->title}}</td>
        @endforeach
    </tr>
    @foreach($job->groups as $i=>$group)
        <tr>
            <td>{{$i+1}}</td>
            <td>{{$group->first_name}}</td>
            <td>{{$group->last_name}}</td>
            <td>{{$group->father_name}}</td>
            <td>{{$group->email}}</td>
            <td>{{$group->area}}</td>
            <td>{{$group->address}}</td>
            <td>{{$group->birth_date}}</td>
            <td>{{$group->job_name}}</td>
            @foreach($job->asks()->orderBy('id')->get() as $ask)
               @php
                   $answer=\App\Models\Answer::where(['ask_id'=>$ask->id,'group_id' => $group->id])->first();
               @endphp
                <td>{{$answer?->answer}}</td>
            @endforeach
        </tr>
    @endforeach

</table>
</body>
</html>
