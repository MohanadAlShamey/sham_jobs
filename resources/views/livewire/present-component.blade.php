<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{route('home.store')}}" enctype="multipart/form-data" method="post">
                @method('post')
                @csrf
                <input type="hidden" name="job_id" value="{{$job->id}}">
              <div class="form-group my-4">
                    <label for="" class="required">البريد الإلكتروني : </label>
                    <input type="email" required class="form-control @error('email') is-invalid @endError" name='email'
                           value="{{old('email')}}">
                    @error('email') <span class="text-danger">{{$message}}</span> @endError
                </div>

                <div class="form-group my-4">
                    <label for="" class="required">المسمى الوظيفي : </label>
                    <input type="text" required class="form-control @error('job_name') is-invalid @endError"
                           name='job_name' value="{{old('job_name')}}">
                    @error('job_name') <span class="text-danger">{{$message}}</span> @endError
                </div>

                <div class="form-group my-4">
                    <label for="" class="required">الاسم الأول كما هو وارد في الهوية الشخصية أو جواز السفر
                        : </label>
                    <input type="text" required class="form-control  @error('first_name') is-invalid @endError"
                           name='first_name' value="{{old('first_name')}}">
                    @error('first_name') <span class="text-danger">{{$message}}</span> @endError
                </div>

                <div class="form-group my-4">
                    <label for="" class="required">اسم الأب كما هو وارد في بطاقة الهوية الشخصية أو جواز السفر
                        : </label>
                    <input type="text" required class="form-control  @error('father_name') is-invalid @endError"
                           name='name' value="{{old('father_name')}}">
                    @error('father_name') <span class="text-danger">{{$message}}</span> @endError
                </div>

                <div class="form-group my-4">
                    <label for="" class="required">الكنية كما هي واردة في بطاقة الهوية الشخصية أو جواز السفر
                        : </label>
                    <input type="text" required class="form-control  @error('last_name') is-invalid @endError"
                           name='name' value="{{old('last_name')}}">
                    @error('last_name') <span class="text-danger">{{$message}}</span> @endError
                </div>

                <div class="form-group my-4">
                    <label for="" class="required">تاريخ الميلاد
                        : </label>
                    <input type="date" required class="form-control  @error('birth_date') is-invalid @endError"
                           name='name' value="{{old('birth_date')}}">
                    @error('birth_date') <span class="text-danger">{{$message}}</span> @endError
                </div>


                @foreach($asks as $ask)
                    @switch($ask->type)
                        @case(\App\Enums\AskTypeEnum::EMAIL->value)
                        <div class="form-group my-4">
                            <label for="" @if($ask->required) class="required" @endif>{{$ask->title}} : </label>
                            <input type="email" class="form-control @error($ask->id) is-invalid @endError"
                                   value="{{old($key)}}" @if($ask->required) required="required"
                                   @endif   name='{{$ask->id}}'>
                            @error($ask->id) <span class="text-danger">{{$message}}</span> @endError
                        </div>
                        @break

                        @case(\App\Enums\AskTypeEnum::TEXT->value)
                        <div class="form-group my-4">
                            <label for="" @if($ask->required) class="required" @endif>{{$ask->title}} : </label>
                            <input type="text" class="form-control @error($ask->id) is-invalid @endError"
                                   value="{{old($ask->id)}}" @if($ask->required) required="required"
                                   @endif  name='{{$ask->id}}'>
                            @error($ask->id) <span class="text-danger">{{$message}}</span> @endError
                        </div>
                        @break

                        @case(\App\Enums\AskTypeEnum::NUMBER->value)
                        <div class="form-group my-4">
                            <label for="" @if($ask->required) class="required" @endif>{{$ask->title}} : </label>
                            <input type="number" class="form-control @error($ask->id) is-invalid @endError"
                                   value="{{old($ask->id)}}" @if($ask->required) required="required"
                                   @endif   name='{{$ask->id}}'>
                            @error($ask->id) <span class="text-danger">{{$message}}</span> @endError
                        </div>
                        @break

                        @case(\App\Enums\AskTypeEnum::FILE->value)
                        <div class="form-group my-4">
                            <label for="" @if($ask->required) class="required" @endif>{{$ask->title}} : </label>
                            <input type="file" class="form-control @error($ask->id) is-invalid @endError"
                                   value="{{old($ask->id)}}" @if($ask->required) required="required"
                                   @endif  name='{{$ask->id}}'>
                            @error($ask->id) <span class="text-danger">{{$message}}</span> @endError
                        </div>
                        @break
                        @case(\App\Enums\AskTypeEnum::DATE->value)
                        <div class="form-group my-4">
                            <label for="" @if($ask->required) class="required" @endif>{{$ask->title}} : </label>
                            <input type="date" class="form-control @error($ask->id) is-invalid @endError"
                                   value="{{old($ask->id)}}" @if($ask->required) required="required"
                                   @endif  name='{{$ask->id}}'>
                            @error($ask->id) <span class="text-danger">{{$message}}</span> @endError
                        </div>
                        @break
                        @case(\App\Enums\AskTypeEnum::RADIO->value)
                        <label for="" @if($ask->required) class="required" @endif>{{$ask->title}}</label>
                        @foreach($ask->options as $key=>$option)
                            <div class="form-check">

                                <label class="form-check-label" for="flexRadioDefault{{$key}}" class="d-inline-block "
                                       dir="ltr">

                                    <span class="d-inline-block"> {{$option['option']}}</span>
                                    <input class="form-check-input" @if($loop->first) checked @endif type="radio"
                                           value="{{$option['option']}}"
                                           name="{{$ask->id}}" id="flexRadioDefault{{$key}}">


                                </label>
                            </div>
                        @endforeach


                        @break

                        @case(\App\Enums\AskTypeEnum::CHECKBOX->value)
                        <label for="" @if($ask->required) class="required"
                               @endif  @if($ask->required) required="required" @endif >{{$ask->title}}</label>
                        @foreach($ask->options as $key=>$option)
                            <div class="form-check">

                                <label class="form-check-label" for="flexRadioDefault{{$key}}">
                                    <span> {{$option['option']}}</span>

                                    <input @if($loop->first) checked @endif class="form-check-input" type="checkbox"
                                           value="{{$option['option']}}"
                                           name="{{"options[$ask->id][]"}}" id="flexRadioDefault{{$key}}">

                                </label>
                            </div>
                        @endforeach


                        @break
                    @endswitch
                @endforeach

                <button class="btn btn-sm btn-success">إرسال</button>
            </form>
        </div>
    </div>
</div>
