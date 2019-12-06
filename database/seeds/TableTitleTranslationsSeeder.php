<?php

use Illuminate\Database\Seeder;

class TableTitleTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $title_id=  \App\Users\Domain\Models\Title::create()->id;
        \App\Users\Domain\Models\TitleTranslation::create([
            'title_id'=>$title_id,
            'locale'=>'en',
            'name'=>'Mr'
        ]);
        \App\Users\Domain\Models\TitleTranslation::create([
            'title_id'=>$title_id,
            'locale'=>'ar',
            'name'=>'السيد'
        ]);


        $title_id=  \App\Users\Domain\Models\Title::create()->id;
        \App\Users\Domain\Models\TitleTranslation::create([
            'title_id'=>$title_id,
            'locale'=>'en',
            'name'=>'Mrs'
        ]);
        \App\Users\Domain\Models\TitleTranslation::create([
            'title_id'=>$title_id,
            'locale'=>'ar',
            'name'=>'السيده'
        ]);

        $title_id=  \App\Users\Domain\Models\Title::create()->id;
        \App\Users\Domain\Models\TitleTranslation::create([
            'title_id'=>$title_id,
            'locale'=>'en',
            'name'=>'Miss'
        ]);
        \App\Users\Domain\Models\TitleTranslation::create([
            'title_id'=>$title_id,
            'locale'=>'ar',
            'name'=>'الانسه'
        ]);

    }
}
