<?php

namespace Database\Seeders;

use App\Models\Info;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Info::query()->updateOrCreate(['key' => 'home_image'], [
//            'key' => 'home_image',
//            'type' => 'image',
//            'name_en' => 'Home Image',
//            'name_ar' => 'صوره الغلاف',
//        ]);
//        Info::query()->updateOrCreate(['key' => 'home_video'], [
//            'key' => 'home_video',
//            'type' => 'text',
//            'name_en' => 'Home Video',
//            'name_ar' => 'فيديو الصفحه الرئيسيه',
//        ]);
//        Info::query()->updateOrCreate(['key' => 'service_image'], [
//            'key' => 'service_image',
//            'type' => 'image',
//            'name_en' => 'Service Image',
//            'name_ar' => 'صوره الخدمات',
//        ]);
//        Info::query()->updateOrCreate(['key' => 'partener_image'], [
//            'key' => 'partener_image',
//            'type' => 'image',
//            'name_en' => 'Partener Image',
//            'name_ar' => 'صوره الشركاء',
//        ]);
        Info::query()->updateOrCreate(['key' => 'facebook'], [
            'key' => 'facebook',
            'type' => 'text',
            'name_en' => 'facebook',
            'name_ar' => 'فيس بوك',
        ]);
        Info::query()->updateOrCreate(['key' => 'insta'], [
            'key' => 'insta',
            'type' => 'text',
            'name_en' => 'Instagram',
            'name_ar' => 'انستجرام',
        ]);
        Info::query()->updateOrCreate(['key' => 'linkedin'], [
            'key' => 'linkedin',
            'type' => 'text',
            'name_en' => 'linkedIn',
            'name_ar' => 'لينكد ان',
        ]);
        Info::query()->updateOrCreate(['key' => 'twitter'], [
            'key' => 'twitter',
            'type' => 'text',
            'name_en' => 'Twitter',
            'name_ar' => 'تويتر',
        ]);
        Info::query()->updateOrCreate(['key' => 'phone'], [
            'key' => 'phone',
            'type' => 'text',
            'name_en' => 'Phone',
            'name_ar' => 'رقم الهاتف',
        ]);
        Info::query()->updateOrCreate(['key' => 'email'], [
            'key' => 'email',
            'type' => 'text',
            'name_en' => 'Email',
            'name_ar' => 'البريد الالكترونى',
        ]);
        Info::query()->updateOrCreate(['key' => 'location'], [
            'key' => 'location',
            'type' => 'text',
            'name_en' => 'Location',
            'name_ar' => ' العنوان',
        ]);
        Info::query()->updateOrCreate(['key' => 'fax'], [
            'key' => 'fax',
            'type' => 'text',
            'name_en' => 'Fax',
            'name_ar' => 'فاكس',
        ]);
//        Info::query()->updateOrCreate(['key' => 'about_image'], [
//            'key' => 'about_image',
//            'type' => 'image',
//            'name_en' => 'About Image',
//            'name_ar' => 'صوره عن الموقع',
//        ]);
//        Info::query()->updateOrCreate(['key' => 'contact_image'], [
//            'key' => 'contact_image',
//            'type' => 'image',
//            'name_en' => 'Contact Image',
//            'name_ar' => 'صوره تواصل معنا',
//        ]);
        Info::query()->updateOrCreate(['key' => 'site_logo'], [
            'key' => 'site_logo',
            'type' => 'image',
            'name_en' => 'site Logo',
            'name_ar' => 'لوجو الموقع',
        ]);
        Info::query()->updateOrCreate(['key' => 'footer_logo'], [
            'key' => 'footer_logo',
            'type' => 'image',
            'name_en' => 'Footer Logo',
            'name_ar' => 'لوجو الفوتر',
        ]);
    }
}
