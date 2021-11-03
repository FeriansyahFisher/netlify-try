<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <=50; $i++){
            DB::table('pegawai')->insert([
                'pegawai_nama' => $faker->name,
                'pegawai_jabatan' => $faker->jobTitle,
                'pegawai_umur' => $faker->numberBetween(20,40),
                'pegawai_alamat' => $faker->address
            ]);
        }


        // insert data ke database (seeder)
        // DB::table('pegawai')->insert([
        //     'pegawai_nama' => 'Joni cak',
        //     'pegawai_jabatan' => 'Web designer',
        //     'pegawai_umur' => 12,
        //     'pegawai_alamat' => 'JL, sayekti melik'
        // ]);
    }
}
