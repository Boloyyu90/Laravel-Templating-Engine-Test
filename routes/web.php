

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name('login');
Route::get('/dashboard', function () {
    return view('Dashboard');
});

Route::get('/presensi', function () {
    return view(
        'Gyms/presensi',
        [
            'instruktur' => [
                'gambar' => 'https://www.fitnessfirst.co.id/id/-/media/project/evolution-wellness/fitness-first/south-east-asia/indonesia/classes/bodycombat/bodycombat_fb-sharing.png',
                'bidang' => 'Body Combat',
                'nama' => 'I Gede Bala Putra',
                'ruang' => 'Kelas B',
                'member' => '6',
                'rating' => '5',
                'kodeInst' => '210711320'
            ],
            'daftarMember' => [
                [
                    "gambar" => asset("img/mimiPeri.jpg"),
                    "nama" => "Saint Jaygarcia Saturn",
                    "email" => "keboirengbogel@gmail.com",
                    "noTelp" => "0852362774",
                    "jenis" => "Gold",
                    "metode" => "Deposit Kelas"
                ],

                [
                    "gambar" => asset("img/mimiPeri.jpg"),
                    "nama" => "Saint Shepherd Ju Peter",
                    "email" => "buwungapetuman@gmail.com",
                    "noTelp" => "08236236353",
                    "jenis" => "Silver",
                    "metode" => "Deposit Uang"
                ],

                [
                    "gambar" => asset("img/mimiPeri.jpg"),
                    "nama" => "Saint Ethan Baron V Nusjuro",
                    "email" => "puhsepuhajarin@gmail.com",
                    "noTelp" => "08675358658",
                    "jenis" => "Black",
                    "metode" => "Deposit Uang"
                ],

                [
                    "gambar" => asset("img/mimiPeri.jpg"),
                    "nama" => "Saint Topman Valkyrie",
                    "email" => "topmarkotopjosgundul@gmail.com",
                    "noTelp" => "082531255676",
                    "jenis" => "Black",
                    "metode" => "Deposit Uang"
                ],

                [
                    "gambar" => asset("img/mimiPeri.jpg"),
                    "nama" => "Saint Markus Mars",
                    "email" => "kumiswaletgacor@gmail.com",
                    "noTelp" => "082531255676",
                    "jenis" => "Gold",
                    "metode" => "Deposit Kelas"
                ],

                [
                    "gambar" => asset("img/mimiPeri.jpg"),
                    "nama" => "Saint Bolo Buron",
                    "email" => "yangpunyabumiini@gmail.com",
                    "noTelp" => "0893570234",
                    "jenis" => "Silver",
                    "metode" => "Deposit Uang"
                ]
            ]
        ]
    );
});


Route::get('/gyms', function () {
    return view('Gyms/index', [
        'kelas' => [
            [
                'no' => 1,
                "gambar" => "https://www.fitnessfirst.co.id/id/-/media/project/evolution-wellness/fitness-first/south-east-asia/indonesia/classes/bodycombat/bodycombat_fb-sharing.png",
                "nama" => "Body Combat",
                'instruktur' => 'Jolly',
                'ruang' => 'Kelas A',
                'rating' => '5'
            ],
            [
                'no' => 2,
                'gambar' => 'https://media.tacdn.com/media/attractions-splice-spp-674x446/06/dc/83/bc.jpg',
                'nama' => 'Bungee ',
                'instruktur' => 'Agung',
                'ruang' => 'Kelas B',
                'rating' => '3',
            ],
            [
                'no' => 3,
                'gambar' => 'https://fitbod.me/wp-content/uploads/2021/07/yoga-and-the-gym-on-the-same-day.jpg',
                'nama' => 'Yogalates',
                'instruktur' => 'Raka',
                'ruang' => 'Kelas C',
                'rating' => '4',
            ],
            [
                'no' => 4,
                'gambar' =>
                'https://res.cloudinary.com/display97/image/upload/7930/boxing2-224119.jpeg',
                'nama' => 'Boxing',
                'instruktur' => 'Tebri',
                'ruang' => 'Kelas D',
                'rating' => '5',
            ]
        ]
    ]);
});


Route::get('/logout')->name('logout')->middleware('auth');
