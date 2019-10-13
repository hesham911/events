<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class divisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('divisions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'القاهرة',
        ]);

        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'الإسكندرية',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'الإسماعيلية',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'الوادي الجديد',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'المنيا',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'المنوفية',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'مطروح',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'كفر الشيخ',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'قنا',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'القليوبية',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'الفيوم',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'الغربية',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'شمال سيناء',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'الشرقية',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'السويس',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'سوهاج',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'دمياط',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'الدقهلية',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'الجيزة',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'جنوب سيناء',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'بورسعيد',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'بني سويف',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'البحيرة',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'البحر الأحمر',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'الأقصر',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'أسيوط',
        ]);
        DB::table('divisions')->insert([
            'country_id' => 1,
            'name' => 'أسوان',
        ]);

    }
}
