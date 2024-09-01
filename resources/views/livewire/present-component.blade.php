<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{route('home.store')}}" enctype="multipart/form-data" method="post">
                @method('post')
                @csrf
                <input type="hidden" name="job_id" value="{{$job->id}}">
              <div class="form-group my-4">
                    <label for="" class="required h6">البريد الإلكتروني : </label>
                    <input type="email" required class="form-control @error('email') is-invalid @endError" name='email'
                           value="{{old('email')}}">
                    @error('email') <span class="text-danger">{{$message}}</span> @endError
                </div>

                <div class="form-group my-4">
                    <label for="" class="required h6">المسمى الوظيفي : </label>
                    <input type="text" required class="form-control @error('job_name') is-invalid @endError"
                           name='job_name' value="{{old('job_name')}}">
                    @error('job_name') <span class="text-danger">{{$message}}</span> @endError
                </div>

                <div class="form-group my-4">
                    <label for="" class="required h6">الاسم الأول كما هو وارد في الهوية الشخصية أو جواز السفر
                        : </label>
                    <input type="text" required class="form-control  @error('first_name') is-invalid @endError"
                           name='first_name' value="{{old('first_name')}}">
                    @error('first_name') <span class="text-danger">{{$message}}</span> @endError
                </div>

                <div class="form-group my-4">
                    <label for="" class="required h6">اسم الأب كما هو وارد في بطاقة الهوية الشخصية أو جواز السفر
                        : </label>
                    <input type="text" required class="form-control  @error('father_name') is-invalid @endError"
                           name='father_name' value="{{old('father_name')}}">
                    @error('father_name') <span class="text-danger">{{$message}}</span> @endError
                </div>

                <div class="form-group my-4">
                    <label for="" class="required h6">الكنية كما هي واردة في بطاقة الهوية الشخصية أو جواز السفر
                        : </label>
                    <input type="text" required class="form-control  @error('last_name') is-invalid @endError"
                           name='last_name' value="{{old('last_name')}}">
                    @error('last_name') <span class="text-danger">{{$message}}</span> @endError
                </div>

                <div class="form-group my-4">
                    <label for="" class="required h6">تاريخ الميلاد
                        : </label>
                    <input type="date" required class="form-control  @error('birth_date') is-invalid @endError"
                           name='birth_date' value="{{old('birth_date')}}">
                    @error('birth_date') <span class="text-danger">{{$message}}</span> @endError
                </div>

                <div class="form-group my-4">
                    <label for="" class="required h6">الشهادة العلمية
                        : </label>
                    <input type="file" accept="file|mimetypes:application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/png,image/jpg,image/jpeg,application/pdf"  required class="form-control  @error('certificate') is-invalid @endError"
                           name='certificate' value="{{old('certificate')}}">
                    @error('certificate') <span class="text-danger">{{$message}}</span> @endError
                </div>

                <div class="form-group my-4">
                    <label for="" class="required h6">السيرة الذاتية
                        : </label>
                    <input type="file" accept="file|mimetypes:application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/png,image/jpg,image/jpeg,application/pdf"  required class="form-control  @error('cv') is-invalid @endError"
                           name='cv' value="{{old('cv')}}">
                    @error('cv') <span class="text-danger">{{$message}}</span> @endError
                </div>

                <div class="form-group my-4">
                    <label for="" class="required h6">منطفة السكن
                        : </label>
                    <label  for="address-1" class="form-check-label d-block "
                            dir="rtl">
                        <input id="address-1" type="radio" checked value="منطقة ادلب وريف حلب الغربي"  name='area'>
                        <span class="d-inline-block small">منطقة ادلب وريف حلب الغربي</span>
                    </label>

                    <label  for="address-2" class="form-check-label d-block "
                            dir="rtl">
                        <input id="address-2" type="radio"  value="منطقة عفرين"  name='area'>
                        <span class="d-inline-block small"> منطقة عفرين</span>
                    </label>

                    <label  for="address-3" class="form-check-label d-block "
                            dir="rtl">
                        <input id="address-3" type="radio"  value="منطقة نبع السلام"  name='area'>
                        <span class="d-inline-block small"> منطقة نبع السلام</span>
                    </label>

                    <label  for="address-4" class="form-check-label d-block "
                            dir="rtl">
                        <input id="address-4" type="radio"  value="منطقة الباب"  name='area'>
                        <span class="d-inline-block small"> منطقة الباب</span>
                    </label>

                    <label  for="address-5" class="form-check-label d-block "
                            dir="rtl">
                        <input id="address-5" type="radio"  value="منطقة جرابلس"  name='area'>
                        <span class="d-inline-block small"> منطقة جرابلس</span>
                    </label>
                    <label  for="address-6" class="form-check-label d-block "
                            dir="rtl">
                        <input id="address-6" type="radio"  value=" منطقة درع الفرات"  name='area'>
                        <span class="d-inline-block small"> منطقة درع الفرات</span>
                    </label>
                    @error('area') <span class="text-danger">{{$message}}</span> @endError
                </div>
                <div class="form-group my-4">
                    <label for="" class="required h6">العنوان التفصيلي على الشكل التالي ( المدينة أو البلدة أو القرية مع أقرب علامة للعنوان )
                        : </label>
                    <input type="text"  required class="form-control  @error('address') is-invalid @endError"
                           name='address' value="{{old('address')}}">
                    @error('address') <span class="text-danger">{{$message}}</span> @endError
                </div>

                @foreach($asks as $ask)
                    @switch($ask->type)
                        @case(\App\Enums\AskTypeEnum::EMAIL->value)
                        <div class="form-group my-4">
                            <label for="" @if($ask->required) class="required h6" @endif>{{$ask->title}} : </label>
                            <input type="email" class="form-control @error($ask->id) is-invalid @endError"
                                   value="{{old($key)}}" @if($ask->required) required="required"
                                   @endif   name='{{$ask->id}}'>
                            @error($ask->id) <span class="text-danger">{{$message}}</span> @endError
                        </div>
                        @break

                        @case(\App\Enums\AskTypeEnum::TEXT->value)
                        <div class="form-group my-4">
                            <label for="" @if($ask->required) class="required h6" @endif>{{$ask->title}} : </label>
                            <input type="text" class="form-control @error($ask->id) is-invalid @endError"
                                   value="{{old($ask->id)}}" @if($ask->required) required="required"
                                   @endif  name='{{$ask->id}}'>
                            @error($ask->id) <span class="text-danger">{{$message}}</span> @endError
                        </div>
                        @break

                        @case(\App\Enums\AskTypeEnum::NUMBER->value)
                        <div class="form-group my-4">
                            <label for="" @if($ask->required) class="required h6" @endif>{{$ask->title}} : </label>
                            <input type="number" class="form-control @error($ask->id) is-invalid @endError"
                                   value="{{old($ask->id)}}" @if($ask->required) required="required"
                                   @endif   name='{{$ask->id}}'>
                            @error($ask->id) <span class="text-danger">{{$message}}</span> @endError
                        </div>
                        @break

                        @case(\App\Enums\AskTypeEnum::FILE->value)
                        <div class="form-group my-4">
                            <label for="" @if($ask->required) class="required h6" @endif>{{$ask->title}} : </label>
                            <input type="file" class="form-control @error($ask->id) is-invalid @endError"
                                   value="{{old($ask->id)}}" @if($ask->required) required="required"
                                   @endif  name='{{$ask->id}}'>
                            @error($ask->id) <span class="text-danger">{{$message}}</span> @endError
                        </div>
                        @break
                        @case(\App\Enums\AskTypeEnum::DATE->value)
                        <div class="form-group my-4">
                            <label for="" @if($ask->required) class="required h6" @endif>{{$ask->title}} : </label>
                            <input type="date" class="form-control @error($ask->id) is-invalid @endError"
                                   value="{{old($ask->id)}}" @if($ask->required) required="required"
                                   @endif  name='{{$ask->id}}'>
                            @error($ask->id) <span class="text-danger">{{$message}}</span> @endError
                        </div>
                        @break
                        @case(\App\Enums\AskTypeEnum::RADIO->value)
                        <label for="" @if($ask->required) class="required h6" @endif>{{$ask->title}}</label>
                        @foreach($ask->options as $key=>$option)
                            <div class="form-check">

                                <label  for="flexRadioDefault{{$key}}" class="form-check-label d-inline-block "
                                       dir="ltr">

                                    <span class="d-inline-block small"> {{$option['option']}}</span>
                                    <input class="form-check-input" @if($loop->first) checked @endif type="radio"
                                           value="{{$option['option']}}"
                                           name="{{$ask->id}}" id="flexRadioDefault{{$key}}">


                                </label>
                            </div>
                        @endforeach


                        @break

                        @case(\App\Enums\AskTypeEnum::CHECKBOX->value)
                        <label for="" @if($ask->required) class="required"
                               @endif  @if($ask->required) required="required h6" @endif >{{$ask->title}}</label>
                        @foreach($ask->options as $key=>$option)
                            <div class="form-check">

                                <label class="form-check-label" for="flexRadioDefault{{$key}}">
                                    <span class="small"> {{$option['option']}}</span>

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
