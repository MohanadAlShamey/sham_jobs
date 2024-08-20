<div class="container">

    <div class="row">
        <div class=" col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">اسم الوظيفة</th>
                        <th class="text-center">المدينة</th>
                        <th class="text-center">تاريخ النشر</th>
                        <th class="text-center">التقديم</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td class="text-center"><a href="{{route('home.show',$job->id)}}" class="nav-link">{{$job->name}}</a></td>
                            <td class="text-center">{{$job->city}}</td>
                            <td class="text-center">{{$job->created_at->diffForHumans()}}</td>
                            <td class="text-center"><a href="{{route('home.show',$job->id)}}" class="btn btn-sm btn-primary">تقديم</a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
