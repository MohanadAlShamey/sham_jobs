<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\AskTypeEnum;
use App\Models\Ask;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user = User::firstOrCreate([
            'email' => 'admin@admin.com'
        ], [
            'name' => 'admin',
            'password' => bcrypt('password'),
        ]);

        Ask::create([
            'title' => 'الحالة الاجتماعية',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'متزوج'],
                ['option' => 'عازب']
            ]
        ]);

        Ask::create([
            'title' => 'الجنس',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'ذكر'],
                ['option' => 'أنثى']
            ]
        ]);


        //text
        Ask::create([
            'title' => 'الجنسية',
            'type' => AskTypeEnum::TEXT->value,
            'required' => true,

        ]);

        //radio
        Ask::create([
            'title' => 'منطقة السكن',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => ' منطقة ادلب وريف حلب الغربي'],
                ['option' => 'منطقة عفرين'],
                ['option' => 'منطقة نبع السلام'],
                ['option' => 'منطقة الباب'],
                ['option' => 'منطقة جرابلس'],
            ]
        ]);
        //text
        Ask::create([
            'title' => 'العنوان التفصيلي على الشكل التالي ( المدينة أو البلدة أو القرية مع أقرب علامة للعنوان )',
            'type' => AskTypeEnum::TEXT->value,
            'required' => true,
        ]);
        Ask::create([
            'title' => 'رقم الهاتف ( الرجاء إضافة النداء الدولي يليه رقم الهاتف)',
            'type' => AskTypeEnum::TEXT->value,
            'required' => true,
        ]);

        //radio
        Ask::create([
            'title' => 'الشهادة العلمية',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا أملك شهاد'],
                ['option' => 'شهادة ابتدائية'],
                ['option' => 'شهادة اعدادية'],
                ['option' => 'شهادة ثانوية'],
                ['option' => 'شهادة معهد متوسط'],
                ['option' => 'اجازة جامعية'],
                ['option' => 'ماجستير'],
                ['option' => 'دكتوراه'],
                ['option' => 'لا زلت أكمل دراستي'],
                ['option' => 'لدي أكثر من شهادة علمية'],
            ]
        ]);
        Ask::create([
            'title' => 'في حال أنك لا زلت طالباً جامعياً, يرجى ذكر سنة الدراسة الحالية',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'سنة أولى'],
                ['option' => 'سنة ثانية'],
                ['option' => 'سنة ثالثة'],
                ['option' => 'سنة رابعة'],
                ['option' => 'سنة خامسة'],
            ]
        ]);
        //text
        Ask::create([
            'title' => 'في حال كان لديك أكثر من شهادة علمية يرجى ذكر الشهادات وتواريخ التخرج',
            'type' => AskTypeEnum::TEXT->value,
            'required' => false,
        ]);
        Ask::create([
            'title' => 'الرجاء ذكر اسم المدرسة أو المعهد أو الجامعة التي تخرجت منها',
            'type' => AskTypeEnum::TEXT->value,
            'required' => false,
        ]);
        Ask::create([
            'title' => 'ما هو تخصصك الاكاديمي',
            'type' => AskTypeEnum::TEXT->value,
            'required' => false,
        ]);
        Ask::create([
            'title' => 'سنة التخرج',
            'type' => AskTypeEnum::DATE->value,
            'required' => false,
        ]);

        Ask::create([
            'title' => 'الرجاء ارفاق الشهادات العلمية',
            'type' => AskTypeEnum::FILE->value,
            'required' => false,
        ]);
        Ask::create([
            'title' => 'الرجاء ذكر أهم الدورات المتبعة في المجال المذكور مع ذكر الجهة المانحة',
            'type' => AskTypeEnum::TEXT->value,
            'required' => false,
        ]);
        Ask::create([
            'title' => 'يرجى ذكر القسم أو القطاع الذي عملت به',
            'type' => AskTypeEnum::TEXT->value,
            'required' => false,
        ]);
//options
        Ask::create([
            'title' => 'هل سبق وان عملت في هذا المجال',
            'type' => AskTypeEnum::RADIO->value,
            'required' => false,
            'options' => [
                ['option' => 'تعم'],
                ['option' => 'لا'],

            ]
        ]);
        Ask::create([
            'title' => 'ما هي عدد سنوات الخبرة في هذا المجال ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => false,
            'options' => [
                ['option' => '1'],
                ['option' => '2'],
                ['option' => '3'],
                ['option' => '4'],
                ['option' => '5'],
                ['option' => '6'],
                ['option' => '7'],
                ['option' => '8'],
                ['option' => '9'],
                ['option' => '10'],
                ['option' => 'أكثر من 10 سنوات'],

            ]
        ]);

        Ask::create([
        'title' => 'المسمى الوظيفي الحالي أو آخر منصب وظيفي قد شغلته(1)',
        'type' => AskTypeEnum::TEXT->value,
        'required' => false,
    ]);
        Ask::create([
        'title' => '(1)  المؤسسة أو المنظمة أو صاحب العمل التي تعمل/عملت بها',
        'type' => AskTypeEnum::TEXT->value,
        'required' => false,
    ]);
        Ask::create([
        'title' => 'مدة العمل بالأشهر (1)',
        'type' => AskTypeEnum::TEXT->value,
        'required' => false,
    ]);

        Ask::create([
            'title' => '(2) الوظيفة السابقة التي عملت بها',
            'type' => AskTypeEnum::TEXT->value,
            'required' => false,
        ]);
        Ask::create([
            'title' => '(2)  المؤسسة أو المنظمة أو صاحب العمل التي تعمل/عملت بها',
            'type' => AskTypeEnum::TEXT->value,
            'required' => false,
        ]);
        Ask::create([
            'title' => 'مدة العمل بالأشهر (2)',
            'type' => AskTypeEnum::TEXT->value,
            'required' => false,
        ]);

        Ask::create([
            'title' => '(3) الوظيفة السابقة التي عملت بها',
            'type' => AskTypeEnum::TEXT->value,
            'required' => false,
        ]);
        Ask::create([
            'title' => '(3)  المؤسسة أو المنظمة أو صاحب العمل التي تعمل/عملت بها',
            'type' => AskTypeEnum::TEXT->value,
            'required' => false,
        ]);
        Ask::create([
            'title' => 'مدة العمل بالأشهر (3)',
            'type' => AskTypeEnum::TEXT->value,
            'required' => false,
        ]);

        Ask::create([
            'title' => 'في حال كان لديك خبرات عمل في مجالات مختلفة الرجاء ذكرها مع عدد سنوات الخبرة في كل مجال',
            'type' => AskTypeEnum::TEXT->value,
            'required' => false,
        ]);

        Ask::create([
            'title' => 'هل تعمل في الوقت الحالي',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'تعم'],
                ['option' => 'لا'],

            ]
        ]);
        Ask::create([
            'title' => 'مهارات اللغة العربية ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'متقدم'],
                ['option' => 'متقن'],

            ]
        ]);

        Ask::create([
            'title' => 'مهارات اللغة الإنكليزية ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'متقدم'],
                ['option' => 'متقن'],

            ]
        ]);
        Ask::create([
            'title' => 'مهارات اللغة الفرنسية ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'متقدم'],
                ['option' => 'متقن'],

            ]
        ]);
        Ask::create([
            'title' => 'مهارات اللغة التركية ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'متقدم'],
                ['option' => 'متقن'],

            ]
        ]);

        Ask::create([
            'title' => 'الرجاء ذكر اللغات الأخرى التي لديك معرفة بها أو تتقنها',
            'type' => AskTypeEnum::TEXT->value,
            'required' => false,
        ]);

        Ask::create([
            'title' => ' العمل على برنامج Excel ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'متقدم'],
                ['option' => 'متقن'],

            ]
        ]);

        Ask::create([
            'title' => ' العمل على برنامج Word ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'جيد'],
                ['option' => 'متقدم'],

            ]
        ]);
        Ask::create([
            'title' => ' العمل على برنامج PowerPoint ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'جيد'],
                ['option' => 'متقدم'],

            ]
        ]);
        Ask::create([
            'title' => ' العمل على برنامج Access ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'جيد'],
                ['option' => 'متقدم'],

            ]
        ]);
        Ask::create([
            'title' => ' العمل على برنامج PowerBI ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'جيد'],
                ['option' => 'متقدم'],

            ]
        ]);
        Ask::create([
            'title' => ' العمل على برنامج Outlook ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'جيد'],
                ['option' => 'متقدم'],

            ]
        ]);
        Ask::create([
            'title' => ' العمل على برنامج Forms ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'جيد'],
                ['option' => 'متقدم'],

            ]
        ]);
        Ask::create([
            'title' => ' العمل على برنامج Sharepoint ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'جيد'],
                ['option' => 'متقدم'],

            ]
        ]);
        Ask::create([
            'title' => ' العمل على برنامج Power Query ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'جيد'],
                ['option' => 'متقدم'],

            ]
        ]);
        Ask::create([
            'title' => ' العمل على برنامج Photoshop ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'جيد'],
                ['option' => 'متقدم'],

            ]
        ]);
        Ask::create([
            'title' => ' العمل على برنامج illusterator ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'جيد'],
                ['option' => 'متقدم'],

            ]
        ]);
        Ask::create([
            'title' => ' العمل على برنامج Corel Draw ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'جيد'],
                ['option' => 'متقدم'],

            ]
        ]);
        Ask::create([
            'title' => ' العمل على برنامج Premiere ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'جيد'],
                ['option' => 'متقدم'],

            ]
        ]);
        Ask::create([
            'title' => ' العمل على برنامج AfterEffect ',
            'type' => AskTypeEnum::RADIO->value,
            'required' => true,
            'options' => [
                ['option' => 'لا'],
                ['option' => 'مبتدئ'],
                ['option' => 'متوسط'],
                ['option' => 'جيد'],
                ['option' => 'متقدم'],

            ]
        ]);

        Ask::create([
            'title' => 'في حال كان لديك خبرة في العمل على لغات البرمجة يرجى ذكرها',
            'type' => AskTypeEnum::TEXT->value,
            'required' => false,
        ]);
        Ask::create([
            'title' => 'الرجاء اضافة أي مهارات حاسوبية أخرى تمتلكها',
            'type' => AskTypeEnum::TEXT->value,
            'required' => false,
        ]);

        Ask::create([
            'title' => 'إرفاق السيرة الذاتية',
            'type' => AskTypeEnum::FILE->value,
            'required' => true,
        ]);

    }
}
