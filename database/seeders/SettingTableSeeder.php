<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $setting = [
            [
                'id' => 1,
                'site_name' => 'جمعية التنمية الأسريه بصامطة   ',
                'phone' => '12345678',
                'email' => 'fdas2024.sa@gmail.com',
                'home_card_1_text' => 'لمساهمة في تحقيق الاستقرار الأسري ورفع الوعي المجتمعي وذلك من خلال مبادرات أسرية متكاملة',
                'home_card_2_text' =>'نساهم في تمكين أفراد الاسرة من خلال التدريب والتأهيل والارشاد والمساندة',
                'home_card_3_text'=>'توظيف التقنية الحديثة في خدمة الأسرة والمجتمع',
                'work_time'=>'10AM- 5PM',
                'vision'=>'نص يمكن استبدالة',
                'mission'=>'نص يمكن استبدالة',
                'values'=>'نص يمكن استبدالة',
                
            ],
        ];

        Setting::insert($setting);//
    }
}
