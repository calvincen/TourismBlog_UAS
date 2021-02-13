<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'user_id' => '3',
                'category_id' =>'1',
                'title'=>'Pantai Kuta, Bali',
                'description'=>'Pantai Kuta adalah sebuah tempat pariwisata yang terletak kecamatan Kuta, sebelah selatan Kota Denpasar, Bali, Indonesia. Daerah ini merupakan sebuah tujuan wisata turis mancanegara dan telah menjadi objek wisata andalan Pulau Bali sejak awal tahun 1970-an.',
                'image'=>'kuta.jpg'
            ],
            [
                'user_id' => '4',
                'category_id' =>'1',
                'title'=>'Pantai Sanur, Bali',
                'description'=>'Pantai Sanur adalah sebuah tempat pelancongan pariwisata yang terkenal di pulau Bali. Tempat ini letaknya adalah persis di sebelah timur kota Denpasar, ibu kota Bali. Karena memiliki ombak yang cukup tenang, maka pantai Sanur tidak bisa dipakai untuk surfing layaknya Pantai Kuta.',
                'image'=>'sanur.jpg'
            ],
            [
                'user_id' => '5',
                'category_id' =>'2',
                'title'=>'Gunung Rinjani',
                'description'=>'Gunung Rinjani adalah gunung yang berlokasi di Pulau Lombok, Nusa Tenggara Barat. Gunung yang merupakan gunung berapi kedua tertinggi di Indonesia dengan ketinggian 3.726 mdpl ini merupakan gunung favorit bagi pendaki Indonesia karena keindahan pemandangannya.',
                'image'=>'rinjani.jpg'
            ],
            [
                'user_id' => '5',
                'category_id' =>'2',
                'title'=>'Gunung Semeru',
                'description'=>'Gunung Semeru atau Gunung Meru adalah sebuah gunung berapi kerucut di Jawa Timur, Indonesia. Gunung Semeru merupakan gunung tertinggi di Pulau Jawa, dengan puncaknya Mahameru, 3.676 meter dari permukaan laut.',
                'image'=>'semeru.jpg'
            ],
            [
                'user_id' => '3',
                'category_id' =>'3',
                'title'=>'Kota Yogyakarta',
                'description'=>'Kota Yogyakarta adalah ibu kota dan pusat pemerintahan Provinsi Daerah Istimewa Yogyakarta, Indonesia. Kota Yogyakarta adalah kediaman bagi Sultan Hamengkubuwana dan Adipati Paku Alam.',
                'image'=>'yogya.jpg'
            ],
            [
                'user_id' => '4',
                'category_id' =>'3',
                'title'=>'Kota Makassar',
                'description'=>'Kota Makassar adalah ibu kota provinsi Sulawesi Selatan. Makassar merupakan kota metropolitan terbesar di kawasan Indonesia Timur dan pada masa lalu pernah menjadi ibu kota Negara Indonesia Timur dan Provinsi Sulawesi.s',
                'image'=>'makassar.jpg'
            ]
        ]);
    }
}
