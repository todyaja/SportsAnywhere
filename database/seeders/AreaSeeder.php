<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        $items = collect([
            [
                'created_by' => 4,
                'name' => 'Zeta Sport Center',
                'area_type' => 1,
                'description' => 'Zeta Sport Center menyediakan area parkir yang luas, Coffee Shop, food court indoor dan outdoor, kamar mandi, dan musala.',
                'price' => 70000,
                'address' => 'Jl. Raya Condet No.1, RW.3, Balekambang, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13530',
                'thumbnail' => 'zetaTB.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Lapangan Voli Petamburan VI',
                'area_type' => 1,
                'description' => 'Lapangan Voli Petamburan VI telah menggunakan standar permainan dan olahraga bola voli sehingga ukuran lapangan, tinggi jala, hingga garisnya sesuai dengan standar olahraga voli.',
                'price' => 40000,
                'address' => 'Jalan Petamburan VI (Jalan KS Tubun), Jakarta Pusat, Jakarta 10260, Indonesia',
                'thumbnail' => 'petamburanTB.jpg',
            ],[
                'created_by' => 4,
                'name' => 'Lapangan Tenis Taman Patra',
                'area_type' => 1,
                'description' => 'Terdapat 4 lapangan tenis pribadi di fasilitas tenis ini. Kami memiliki 1 mitra tenis aktif yang terdaftar di Lapangan Tenis Taman Patra.',
                'price' => 55000,
                'address' => 'Jl. Patra Kuningan Raya No.5, RT.6/RW.4, Kuningan Tim., Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950',
                'thumbnail' => 'patraTB.jpg',
            ],[
                'created_by' => 3,
                'name' => 'My Futsal',
                'area_type' => 2,
                'description' => 'Lapangan My Futsal memiliki 2 lapangan Futsal dengan alas/ material Vinyl dengan fasilitas parkir, toilet, kantin, mushola',
                'price' => 150000,
                'address' => 'Jl. Komp. Hankam Cidodol NO.17B, Jakarta, Indonesia',
                'thumbnail' => 'myfutsalTB.jpg',
            ],[
                'created_by' => 4,
                'name' => 'Go All Futsal',
                'area_type' => 2,
                'description' => 'Lapangan Go All Futsal memiliki 2 lapangan Futsal dengan alas/ material rumput sintetis dengan fasilitas parkir, toilet',
                'price' => 200000,
                'address' => 'Jl. Raya Kebayoran Lama No.351/10 D, Sukabumi Utara, Kebon Jeruk, Jakarta Barat, 11540',
                'thumbnail' => 'goallTB.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Elang Futsal',
                'area_type' => 2,
                'description' => 'Lapangan Elang Futsal memiliki 4 lapangan Futsal dengan alas/ material 3 Lapangan Vinyl & 1 Lapangan Rumput sintetis dengan fasilitas parkir, toilet, kantin, mushola',
                'price' => 175000,
                'address' => 'Jl. Taman Mutiara Prima No 10, Kebon Jeruk, Kebon Jeruk, Jakarta Barat, 11530',
                'thumbnail' => 'elangTB.jpg',
            ],   [
                'created_by' => 4,
                'name' => 'Homypool Depok Timur',
                'area_type' => 3,
                'description' => 'Homypool Depok Timur adalah sebuah kolam renang atau lokasi berenang yang berlokasi di Bakti Jaya, Sukmajaya, Kota Depok, Jawa Barat.',
                'price' => 250000,
                'address' => 'Jl. Ir. H. Juanda No.43, Bakti Jaya, Kec. Sukmajaya, Kota Depok, Jawa Barat 16418',
                'thumbnail' => 'homypoolTB.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Swimming Pool GOR Jakarta Timur',
                'area_type' => 3,
                'description' => 'Pool yang dilengkapi fasilitas kamar bilas dan ganti, dan sederetan jajanan seperti chicken, pempek, dan berbagai jenis makanan lainnya',
                'price' => 325000,
                'address' => 'Jl. Otista Raya No.121, RT.13/RW.8, Bidara Cina, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13330',
                'thumbnail' => 'gorpoolTB.jpeg',
            ],[
                'created_by' => 4,
                'name' => 'Kolam Renang Cikini',
                'area_type' => 3,
                'description' => 'Di kolam ini, anda bisa bermain air sambil berkumpul dengan keluarga dan teman dekat. Kolam Renang Cikini juga sangat ramah anak. Jadi anda tidak perlu kawatir jika ingin mengajak anak-anak ke sini.',
                'price' => 450000,
                'address' => 'Jl. Cikini Raya No.75, RT.1/RW.2, Cikini, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10330',
                'thumbnail' => 'cikinipoolTB.jpeg',
            ],[
                'created_by' => 3,
                'name' => 'Laca Yoga Studio',
                'area_type' => 4,
                'description' => 'LACA Studio adalah ruang olahraga untuk semua penggemar olahraga yang ingin sehat dan berkeringat.',
                'price' => 3000000,
                'address' => 'Jl Asem 2 no.10, Cipete, Jakarta Selatan, Ruko Tamarine (accross Esmod Jakarta), Jakarta, DKI Jakarta',
                'thumbnail' => 'lacaTB.jpg',
            ],[
                'created_by' => 4,
                'name' => 'Sana Yoga Studio',
                'area_type' => 4,
                'description' => '“Visi Sana Studio adalah menawarkan tempat di mana orang dapat berolahraga dengan nyaman dan merasa seperti di rumah sendiri.',
                'price' => 3200000,
                'address' => 'The BUYA Building, Jl. Cipete IX No.1, RT.8/RW.4, Cipete Sel., Kec. Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12410',
                'thumbnail' => 'sanaTB.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Zuci Yoga Studio',
                'area_type' => 4,
                'description' => 'Visi Sana Studio adalah menawarkan tempat di mana orang dapat berolahraga dengan nyaman dan merasa seperti di rumah sendiri.',
                'price' => 2800000,
                'address' => 'Jl. Batu Ampar 3 No.21, RT14/03, RT.14/RW.3, Batu Ampar, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13520',
                'thumbnail' => 'zuciTB.jpeg',
            ],[
                'created_by' => 4,
                'name' => 'Emporium Gym Square 3',
                'area_type' => 5,
                'description' => 'Gym ini memiliki fasilitas Handuk, Sauna sesi pagi dan malam, kamar mandi, peralatan fitness impor, treadmill, water walker, matras yoga, set khusus perempuan dumbbell, parkir, katering Diet grizzly',
                'price' => 20000,
                'address' => '2 No.11, RT.2/RW.11, Palmerah, Kec. Palmerah, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11480',
                'thumbnail' => 'emporiumTB.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Manggala Fitness & Sports Center',
                'area_type' => 5,
                'description' => 'Gym yang dilengkapi dengan fasilitas handuk, sauna, kamar mandi, treadmill, dan tempat parkir',
                'price' => 35000,
                'address' => 'Jl. Gatot Subroto No.1, RT.1/RW.3, Pejompongan, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270',
                'thumbnail' => 'manggalaTB.jpg',
            ],[
                'created_by' => 4,
                'name' => 'Maxima Fitness',
                'area_type' => 5,
                'description' => 'Gym yang dilengkapi dengan fasilitas sauna peralatan fitness impor, water walker, matras yoga',
                'price' => 30000,
                'address' => 'Jl. RS. Fatmawati Raya No.14, RT.1/RW.3, Cilandak Bar., Kec. Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12430',
                'thumbnail' => 'maximaTB.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Brickhouse 1.0 Basketball Court',
                'area_type' => 6,
                'description' => 'Brickhouse, lapangan basket di Jakarta dengan konsep desain yang berbeda, lengkap dengan berbagai macam fasilitas',
                'price' => 350000,
                'address' => 'Jl. Kalibata Utara II No.25, RT.4/RW.7, Kalibata, Kec. Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12740',
                'thumbnail' => 'brickhouseTB.jpg',
            ],[
                'created_by' => 4,
                'name' => 'Senayan Basketball Court',
                'area_type' => 6,
                'description' => 'Brickhouse, lapangan basket outdoor dengan berbagai macam fasilitas tempat parkir dan kantin',
                'price' => 400000,
                'address' => 'Area Gelora Bung Karno Senayan, Jl. Pintu Satu Senayan, RT.1/RW.3, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270',
                'thumbnail' => 'senayanTB.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Flex RC Courts',
                'area_type' => 6,
                'description' => ' Flex RC Courts cocok dimanfaatkan untuk latihan atau pertandingan basket bersama teman-teman atau turnamen. Hall basket indoor berstandar international dan fasilitasnya lengkap seperti ruang ganti, toilet, mushola serta area parkir.',
                'price' => 500000,
                'address' => 'RT.8/RW.1, Duri Kepa, Kebonjeruk, West Jakarta City, Jakarta 11510',
                'thumbnail' => 'flexTB.jpg',
            ],




        ])->each(function ($item){
            Area::create($item);
        });
    }
}
