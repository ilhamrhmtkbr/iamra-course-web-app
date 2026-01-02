<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Lessons1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        //
        $course = [
            [
                'section_id' => 1,
                'title' => 'String',
                'description' => "PHP string adalah tipe data yang digunakan untuk merepresentasikan teks atau urutan karakter dalam bahasa pemrograman PHP. String dalam PHP dapat berisi huruf, angka, simbol, dan karakter khusus lainnya. Operasi yang umum dilakukan pada string termasuk penggabungan (concatenation), pemotongan (substring), pencarian, penggantian, dan format. String dalam PHP dapat didefinisikan dengan menggunakan tanda kutip tunggal (' ') atau tanda kutip ganda (\" \")",
                'code' =>
                    "<?php

// Menggunakan singgle kuote
echo 'Person 1';
echo \"Person 2\";

// Selain single quote, kita juga bisa menggunakan double quote.
// Salah satu kelebihan menggunakan double quote adalah,
// kita menggunakan escape sequence untuk beberapa hal,
// seperti \\n untuk ENTER \\t untuk TAB,
// \\\" untuk double quote, dan lain-lain

echo \"Menggunakan Double Quote :\\\" \";
echo \"Contoh tab : \\t Tab \";
echo \"Enter start : --start--\\n \";
echo \"Enter End : --end-- \";

// Multiline String
// Heredoc
echo <<<INIADALAHExample
ini adalah heredoc Example string yang sangat panjang,
dan juga gak perlu ngetik ENTER secara
manual, \"bisa quoter\" juga Tab 2 kali
INIADALAHExample;

// Nowdoc
echo <<<'INIADALAHExample2'
ini adalah heredoc Example string yang sangat panjang,
dan juga gak perlu ngetik ENTER secara
manual, \"bisa quoter\" juga Tab 2 kali
INIADALAHExample2;",
                'order_in_section' => 1
            ],
            [
                'section_id' => 1,
                'title' => 'Number',
                'description' => "PHP memiliki kemampuan yang kuat dalam memanipulasi dan mengolah angka, baik itu bilangan bulat (integer) maupun bilangan desimal (float). Dalam PHP, Anda dapat melakukan berbagai operasi matematika, termasuk penjumlahan, pengurangan, perkalian, dan pembagian, dengan menggunakan operator yang sesuai. Selain itu, Anda juga dapat menggunakan operator modulus (%) untuk mendapatkan sisa pembagian dua bilangan bulat. PHP menyediakan fungsi bawaan untuk operasi matematika kompleks seperti perpangkatan, akar kuadrat, logaritma, dan lainnya. Anda juga dapat mengonversi antara tipe data angka, seperti mengubah string menjadi angka atau sebaliknya, menggunakan fungsi-fungsi seperti intval() dan floatval(). PHP juga menyediakan fungsi untuk memformat angka agar terlihat lebih rapi, seperti fungsi number_format(). Dalam pengembangan web, pengolahan angka sangat penting, terutama dalam konteks keuangan, perhitungan statistik, pengolahan data, dan lainnya. Dengan kemampuan PHP dalam mengelola angka, Anda dapat membuat aplikasi yang lebih dinamis dan efisien.",
                'code' =>
                    "<?php

echo \"Decimal : \";
var_dump(1234);
echo \"Octal : \";
var_dump(013);
echo \"Hexadecimal : \";
var_dump(0x1A);
echo \"Binary : \";
var_dump(0b11111111);

echo PHP_EOL;

// echo \"Underscore di Number tidak bisa dibaca : \";
// var_dump(1_241_234_567);

echo PHP_EOL;

echo \"Floating Point : \";
var_dump(1.234);
echo \"Floating Point dengan E notation Plus (1.2 x 1000) : \";
var_dump(1.2e3);// e3 Artinya nolnya ada 3 = 1000
echo \"Floating Point dengan E notation Minu (7 x 0.001) : \";
var_dump(7e-3);
// echo \"Underscore Floating Point dengan E notation : \";
// var_dump(1_123.123);

echo PHP_EOL;

// Integer Overflow
echo \"Integer Overflow : \"; // melebihi batas jadinya float
var_dump(9223372036854775808);",
                'order_in_section' => 2
            ],
            [
                'section_id' => 1,
                'title' => 'Boolean',
                'description' => "Dalam PHP, boolean adalah tipe data yang merepresentasikan dua nilai: true (benar) dan false (salah). Boolean digunakan untuk ekspresi logika dan pengambilan keputusan dalam program. Anda dapat menggunakan operator logika seperti AND (&&), OR (||), dan NOT (!) untuk menggabungkan atau membalikkan kondisi boolean. Hasil dari ekspresi boolean adalah nilai true atau false, yang digunakan untuk mengontrol alur program. Boolean sangat berguna dalam struktur pengkondisian, seperti if-else statements dan loops, serta dalam penanganan logika bisnis dan validasi data dalam aplikasi web dan perangkat lunak.",
                'code' =>
                    "<?php

//Tipe data bool merupakan case insensitive
echo \"Benar : \";
var_dump(true);

echo \"Salah : \";
var_dump(false);",
                'order_in_section' => 3
            ],
            [
                'section_id' => 1,
                'title' => 'Variable',
                'description' => "Variabel dalam PHP adalah simbol yang digunakan untuk menyimpan nilai dan data selama eksekusi program. Mereka dapat dianggap sebagai wadah yang dapat digunakan untuk menyimpan informasi yang beragam, seperti teks, angka, boolean, atau struktur data yang lebih kompleks. Variabel dalam PHP tidak memiliki tipe data yang dideklarasikan secara eksplisit, yang berarti Anda dapat mengubah tipe datanya selama eksekusi program. Untuk membuat variabel, Anda perlu menetapkan nama unik ke nilai tertentu dengan menggunakan tanda sama dengan (=). Variabel dalam PHP dapat digunakan di seluruh aplikasi, memungkinkan fleksibilitas dalam pengolahan data dan logika program.",
                'code' =>
                    "<?php

\$nama = \"Person_1\";
\$\$nama = \"Person_2\"; // baris ini sama dengan \$Person_1 = \"Person_2\";

echo \"Nama : \" . \$nama . \"\\n\";
echo \"Nama : \" . \$Person_1;

// variable Variables
// php memiliki kemampuan variable variables, yaitu membuat dari string value variable
// walaupun fitur ini ada, tapi fitur ini sangat membingungkan jika digunakan secara luas, jadi disarankan untuk tidak menggunakan fitur ini kecuali memang diperlukan
// untuk membuat variable dari value variable kita bisa menggunakan $$ diikuti dengan nama variable nya",
                'order_in_section' => 4
            ],
            [
                'section_id' => 1,
                'title' => 'Constant',
                'description' => "Konstanta dalam PHP adalah nilai yang tetap dan tidak dapat diubah selama eksekusi program. Mereka mirip dengan variabel, tetapi nilainya tidak dapat diubah setelah dideklarasikan menggunakan fungsi define(). Konstanta biasanya digunakan untuk menyimpan nilai-nilai yang tidak berubah sepanjang program, seperti konstanta matematika atau pengaturan penting. Penamaan konstanta biasanya menggunakan huruf besar dan menggunakan garis bawah (_) sebagai pemisah kata. Konstanta dapat diakses dari mana pun di dalam program, membuatnya berguna untuk menyimpan nilai-nilai yang umum digunakan dan memungkinkan kode yang lebih mudah dibaca dan dipelihara.",
                'code' =>
                    "<?php

// define(\"NAMACONSTANTHURUFKAPITALSEMUAJANGANPAKESPASI\", \"valuenyabisastringint\");
define(\"Example_STR\", \"Hello World\");
define(\"Example_INT\", 25);
echo Example_INT;
echo \"\\n\";
echo Example_STR;",
                'order_in_section' => 5
            ],
            [
                'section_id' => 1,
                'title' => 'NULL',
                'description' => "Dalam PHP, null adalah nilai khusus yang menunjukkan bahwa sebuah variabel tidak memiliki nilai atau belum diinisialisasi. Null digunakan untuk menandai ketiadaan data atau keadaan yang tidak diketahui. Misalnya, saat sebuah variabel belum diberikan nilai, nilainya secara otomatis diatur sebagai null. Penggunaan null berguna dalam penanganan data yang tidak lengkap atau opsional. Dalam operasi perbandingan, null dianggap setara dengan false, tetapi tidak sama dengan string kosong (\"\") atau angka nol (0).",
                'code' =>
                    "<?php

\$nama = \"Person 1\";
\$nama = null;

\$tanggal = null;

echo \"Nama : \";
echo \$nama;
echo \"\\n\";

// Mengecek apakah data null
echo \"Apakah \$nama null? \";
echo is_null(\$nama) ; // return bool tipe datanya int
echo \"\\n\";
echo \"Apakah \$nama null? \";
var_dump(is_null(\$nama)); // return bool tipe datanya string karena var_dump
echo \"\\n\";

// Hasilnya undefined variable karena variablenya tidak ada
// echo \"apakah \$tidakada null? \";
// var_dump(is_null(\$tidakada)); // return bool tipe datanya string karena var_dump
// echo \"\\n\";

// Menghapus variable
// \$Example = \"Example\";
// unset(\$Example);

// echo \$Example;

// mengecek apakah sebuah variable ada dan nilainya tidak null
\$submit = \"submit\";
var_dump(isset(\$submit));",
                'order_in_section' => 6
            ],
            [
                'section_id' => 1,
                'title' => 'Array',
                'description' => "Array dalam PHP adalah struktur data yang memungkinkan Anda menyimpan banyak nilai dalam satu variabel. Anda dapat mengakses nilai-nilai ini menggunakan indeks numerik atau kunci asosiatif. Array dapat berisi tipe data apa pun, termasuk string, angka, boolean, atau bahkan array lainnya. Mereka digunakan untuk menyimpan dan mengelola data dalam aplikasi web dan perangkat lunak. PHP menyediakan sejumlah fungsi bawaan untuk memanipulasi array, seperti menambahkan atau menghapus elemen, mengurutkan, dan mencari nilai tertentu.",
                'code' =>
                    "<?php

\$angka = array(19, 9, 7.6);
var_dump(\$angka);

\$nama = [\"Person 1\", \"Person 2\" ];
var_dump(\$nama);
var_dump(\$nama[0]);

//mengubah
\$nama[1] = \"Person 3\";
var_dump(\$nama[1]);

//menghapus
unset(\$nama[1]);
var_dump(\$nama);

//menambahkan
\$nama[] = \"Person 4\";
var_dump(\$nama);
var_dump(count(\$nama));

//array sebagai Map
\$data = array(
    \"id\" => \"123\",
    \"nama\" => \"Person 5\",
    \"tanggal\" => 31,
    \"address\" => array(
        \"city\" => \"Jakarta\",
        \"country\" => \"Indonesia\"
    )
);
var_dump(\$data);

var_dump(\$data[\"address\"][\"country\"]);",
                'order_in_section' => 7
            ],
            [
                'section_id' => 1,
                'title' => 'Operator Aritmatika',
                'description' => "
                Operator aritmatika dalam PHP adalah simbol-simbol yang digunakan untuk melakukan operasi matematika pada nilai numerik. Ini meliputi penambahan (+), pengurangan (-), perkalian (*), pembagian (/), modulus (%), dan pangkat (**). Operator ini digunakan untuk melakukan perhitungan dalam ekspresi matematika di dalam kode PHP, memungkinkan manipulasi nilai-nilai numerik dalam aplikasi. Example penggunaannya termasuk perhitungan harga, kuantitas, dan operasi matematika lainnya yang diperlukan dalam pengembangan web dan perangkat lunak.",
                'code' =>
                    "<?php

\$a = 10;
\$b = 5;

\$result = \$a + \$b;
var_dump(\$result);

\$resultNegative = -\$result;
var_dump(\$resultNegative);

\$resultPositive = +\$result;
var_dump(\$resultPositive);

// menentukan hasil sisa dari pembagian
\$resultModulo = 100 % 3;
var_dump(\$resultModulo);",
                'order_in_section' => 8
            ],
            [
                'section_id' => 1,
                'title' => 'Operator Penugasan',
                'description' => "Operator penugasan dalam PHP adalah simbol yang digunakan untuk menetapkan nilai ke variabel. Examplenya adalah operator \"=\" yang digunakan untuk menugaskan nilai dari kanan ke kiri. Misalnya, \$x = 5; akan menetapkan nilai 5 ke variabel \$x. Selain itu, terdapat operator penugasan gabungan seperti +=, -=, *=, /=, %=, yang digunakan untuk menetapkan dan mengoperasikan nilai pada saat yang sama, seperti \$x += 2; yang artinya \$x = \$x + 2.",
                'code' =>
                    "<?php

\$total = 0;

\$fruit = 10000;
\$chicken = 35000;
\$orangeJuice = 1000;

\$total += \$fruit;
\$total += \$chicken;
\$total += \$orangeJuice;

var_dump(\$total);",
                'order_in_section' => 9
            ],
            [
                'section_id' => 1,
                'title' => 'Operator Perbandingan',
                'description' => "Operator perbandingan dalam PHP digunakan untuk membandingkan dua nilai dan menghasilkan nilai boolean (true atau false) berdasarkan hasil perbandingan tersebut. Operator ini meliputi == (sama dengan), != (tidak sama dengan), > (lebih besar dari), < (lebih kecil dari), >= (lebih besar dari atau sama dengan), dan <= (lebih kecil dari atau sama dengan). Examplenya, \$a == \$b akan menghasilkan true jika nilai \$a sama dengan \$b, dan false jika tidak.",
                'code' =>
                    "<?php

var_dump(\"10\" == 10);
var_dump(\"10\" === 10);
var_dump(\"10\" != 10);
var_dump(\"10\" !== 10);

var_dump(10 > 9);
var_dump(9 >= 9);",
                'order_in_section' => 10
            ],
            [
                'section_id' => 1,
                'title' => 'Operator Logika',
                'description' => "Operator logika dalam PHP digunakan untuk mengkombinasikan atau memanipulasi ekspresi logika dan menghasilkan nilai boolean (true atau false) berdasarkan kondisi yang diberikan. Operator ini meliputi && (AND logika), || (OR logika), dan ! (NOT logika). Operator && menghasilkan true jika kedua ekspresi yang dibandingkan adalah true, || menghasilkan true jika salah satu ekspresi adalah true, dan ! digunakan untuk membalikkan nilai dari suatu ekspresi (true menjadi false dan sebaliknya). Example: \$a && \$b akan menghasilkan true jika \$a dan \$b keduanya true.",
                'code' =>
                    "<?php

var_dump(true&&true);
var_dump(true&&false);

echo PHP_EOL;

var_dump(true||false);
var_dump(true||true);

echo PHP_EOL;

var_dump(true xor false);
var_dump(true xor true);
var_dump(false xor false);

echo PHP_EOL;

var_dump(!true);
var_dump(!false);",
                'order_in_section' => 11
            ],
            [
                'section_id' => 1,
                'title' => 'Increment dan Decrement',
                'description' => "Increment dan decrement dalam PHP adalah operator yang digunakan untuk menambah atau mengurangi nilai variabel numerik sebanyak satu. Operator increment (++) meningkatkan nilai variabel, sedangkan operator decrement (--) mengurangi nilainya. Example penggunaannya adalah \$x++ akan menambahkan 1 ke nilai \$x, sementara \$y-- akan mengurangi nilai \$y sebanyak 1. Operator ini sering digunakan dalam pengulangan dan operasi yang melibatkan peningkatan atau penurunan nilai variabel secara bertahap.",
                'code' =>
                    "<?php

\$x = 5;
\$y = 10;

// Increment operator
\$x++; // \$x sekarang bernilai 6

// Decrement operator
\$y--; // \$y sekarang bernilai 9

echo \"Nilai x setelah diincrement: \" . \$x;
echo \"Nilai y setelah decrement: \" . \$y;

\$a = 10;
\$b = \$a++;

//sama dengan
// \$b = \$a;
// \$a = \$a + 1;

var_dump(\$a);
var_dump(\$b);",
                'order_in_section' => 12
            ],
            [
                'section_id' => 1,
                'title' => 'Operator Array',
                'description' => "Operator Array dalam PHP adalah cara untuk memanipulasi data dalam array. Ini termasuk operator seperti + (union) untuk menggabungkan dua array, [] untuk menambahkan elemen baru ke array, dan lainnya. Operator ini memungkinkan Anda untuk melakukan operasi seperti penggabungan array, penambahan elemen, pencarian elemen, dan manipulasi lainnya. Dengan menggunakan operator array, Anda dapat mengelola data dalam array dengan lebih efisien dan mudah dalam pengembangan aplikasi PHP.",
                'code' =>
                    "<?php

\$first = [
    \"first_name\" => \"John\"
];
\$last = [
    \"last_name\" => \"Doe\"
];

// union
\$full = \$first + \$last;
var_dump(\$full);

\$a = [
    \"first_name\" => \"John\",
    \"last_name\" => \"Doe\"
];
\$b = [
    \"last_name\" => \"Doe\",
    \"first_name\" => \"John\"
];

var_dump(\$a == \$b);
var_dump(\$a === \$b);
                ",
                'order_in_section' => 13
            ],
            [
                'section_id' => 1,
                'title' => 'Manipulasi String',
                'description' => "Manipulasi string dalam PHP adalah proses mengubah, memanipulasi, atau memanipulasi teks dalam variabel string. Ini melibatkan operasi seperti menggabungkan string, memotong bagian dari string, mencari dan mengganti teks, memformat teks, dan banyak lagi. Manipulasi string penting dalam pengembangan aplikasi web untuk memanipulasi data input pengguna, menghasilkan output yang diinginkan, dan memanipulasi data teks secara umum. PHP menyediakan berbagai fungsi dan metode bawaan untuk mempermudah manipulasi string, memungkinkan pengembang untuk mengelola dan memanipulasi teks dengan efisien.",
                'code' =>
                    "<?php

\$nama = \"Person 1\";

// dot
echo \"Nama : \" .\$nama. PHP_EOL;
echo \"value : \" . 100 . PHP_EOL;

// konversi [kalo datanya tidak valid datanya jadi 0]
\$kata = (string)100;
var_dump(\$kata);
\$angka = (int)\"100\";
var_dump(\$angka);
\$pecahan = (float)\"10.2\";
var_dump(\$pecahan);

// akses beberapa karakter
echo \$nama[0] . PHP_EOL;
echo \$nama[1] . PHP_EOL;
echo \$nama[2] . PHP_EOL;
echo \$nama[3] . PHP_EOL;
echo \$nama[4] . PHP_EOL;

// parsing
echo \"Hello \$nama, Selamat Belajar\". PHP_EOL;

// curlybrace
echo \"Hello {\$nama}s, Selamat Belajar\". PHP_EOL;",
                'order_in_section' => 14
            ],
            [
                'section_id' => 1,
                'title' => 'If , Elseif, Else',
                'description' => "Pada PHP, struktur kontrol if, elseif, else digunakan untuk mengatur alur program berdasarkan kondisi tertentu. if digunakan untuk mengevaluasi kondisi tunggal. elseif memberikan alternatif untuk if yang lebih dari satu. else menangkap semua kondisi yang tidak ditangani oleh if atau elseif sebelumnya. Ini memberikan fleksibilitas dalam menentukan tindakan yang akan diambil oleh program berdasarkan kondisi yang ada. Ini adalah bagian penting dalam pengembangan aplikasi untuk mengontrol alur eksekusi program.",
                'code' =>
                    "<?php

\$nilai = 70;
\$absen = 90;

if (\$nilai >= 80 && \$absen >= 80) {
    echo \"Nilai Anda A\" . PHP_EOL;
} else if (\$nilai >= 70 && \$absen >= 70) {
    echo \"Nilai Anda b\" . PHP_EOL;
} else if (\$nilai >= 60 && \$absen >= 60) {
    echo \"Nilai Anda c\" . PHP_EOL;
} else if (\$nilai >= 50 && \$absen >= 50) {
    echo \"Nilai Anda d\" . PHP_EOL;
} else {
    echo \"Nilai Anda e\" . PHP_EOL;
}

    // alternatif [elseifnya tanpa spasi]
if (\$nilai >= 80 && \$absen >= 80) :
    echo \"Nilai Anda A\" . PHP_EOL;
elseif (\$nilai >= 70 && \$absen >= 70) :
    echo \"Nilai Anda b\" . PHP_EOL;
elseif (\$nilai >= 60 && \$absen >= 60) :
    echo \"Nilai Anda c\" . PHP_EOL;
elseif (\$nilai >= 50 && \$absen >= 50) :
    echo \"Nilai Anda d\" . PHP_EOL;
else :
    echo \"Nilai Anda e\" . PHP_EOL;
endif;",
                'order_in_section' => 15
            ],
            [
                'section_id' => 1,
                'title' => 'Switch',
                'description' => "Switch dalam PHP adalah struktur kontrol yang memungkinkan pengujian nilai ekspresi terhadap serangkaian kasus kemungkinan. Ini memungkinkan eksekusi kode yang berbeda berdasarkan nilai yang cocok dengan salah satu kasus tersebut. Switch digunakan ketika ada banyak kemungkinan nilai yang ingin diuji, dan masing-masing nilai memiliki tindakan yang berbeda yang akan diambil. Ini memungkinkan pengkodean yang lebih ringkas dan mudah dibaca daripada serangkaian pernyataan if-elseif-else yang panjang.",
                'code' =>
                    "<?php

\$nilai = \"F\";

switch (\$nilai) {
    case \"A\" :
        echo \"Anda Lulus dengan sangat baik \" . PHP_EOL;
        break;
    case \"B\" : //gabung ke c
    case \"C\" : //gabung ke b
        echo \"Anda Lulus\" . PHP_EOL;
        break;
    case \"D\" :
        echo \"Anda tidak lulus\" . PHP_EOL;
        break;
    default :
        echo \"Mungkin Anda Salah Jurusan\" . PHP_EOL;
    }

//alternatif
switch (\$nilai) :
    case \"A\" :
        echo \"Anda Lulus dengan sangat baik \" . PHP_EOL;
        break;
    case \"B\" : //gabung ke c
    case \"C\" : //gabung ke b
        echo \"Anda Lulus\" . PHP_EOL;
        break;
    case \"D\" :
        echo \"Anda tidak lulus\" . PHP_EOL;
        break;
    default :
        echo \"Mungkin Anda Salah Jurusan\" . PHP_EOL;
endswitch;",
                'order_in_section' => 16
            ],
            [
                'section_id' => 1,
                'title' => 'Ternary Operator',
                'description' => "Ternary operator dalam PHP adalah cara singkat untuk menulis pernyataan if-else dalam satu baris kode. Ini menggunakan sintaksis \"? :\" dan mengambil tiga operan: kondisi, nilai yang akan dikembalikan jika kondisi benar, dan nilai yang akan dikembalikan jika kondisi salah.",
                'code' =>
                    "<?php

\$x = 10;
\$hasil = (\$x > 5) ? \"Lebih besar dari 5\" : \"Tidak lebih besar dari 5\";
echo \$hasil; // Output: Lebih besar dari 5

\$gender = \"Pria\";

\$hi = \$gender == \"Pria\" ? \"Hi Bro\" : \"Hi nona\";

echo \$hi . PHP_EOL;",
                'order_in_section' => 17
            ],
            [
                'section_id' => 1,
                'title' => 'Null Coalescing Operator',
                'description' => "Null Coalescing Operator (??) dalam PHP digunakan untuk memberikan nilai default jika variabel atau ekspresi bernilai null. Operator ini berguna dalam situasi di mana Anda ingin mengambil nilai dari variabel tetapi ingin menyediakan nilai default jika variabel tersebut tidak ada atau bernilai null. Ini membantu menghindari kesalahan dan menyederhanakan logika kode.",
                'code' =>
                    "<?php

//cek data
\$data = [
    \"action\" => \"Create\"
];

if (isset(\$data[\"action\"])){
    \$action = \$data[\"action\"];
} else{
    \$action = \"Nothing\";
}

echo \$action . PHP_EOL;

// nullcoalescingoperator
\$data = [
    \"action\" => \"Create\"
];
\$action = \$data[\"action\"] ?? \"Nothing\";

echo \$action;

echo \$data[\"action\"] ?? \"nothing\";",
                'order_in_section' => 18
            ],
            [
                'section_id' => 1,
                'title' => 'For Loop',
                'description' => "For loop dalam PHP adalah struktur kontrol yang digunakan untuk mengulangi blok kode sejumlah tertentu kali. Ini terdiri dari tiga bagian: inisialisasi, kondisi, dan iterasi. Inisialisasi menetapkan nilai awal loop, kondisi mengevaluasi apakah loop harus berlanjut atau tidak, dan iterasi menentukan bagaimana nilai loop diperbarui setiap kali loop dieksekusi. For loop sangat berguna untuk mengulangi tugas yang sama dengan jumlah iterasi yang diketahui sebelumnya.",
                'code' =>
                    "<?php

for ( \$counter = 1; \$counter <= 10; \$counter++) {
    echo \"ini ke counter ke \$counter\" . PHP_EOL;
}

//alternatif

for ( \$counter = 1; \$counter <= 10; \$counter++) :
    echo \"ini ke counter ke \$counter\" . PHP_EOL;
endfor;",
                'order_in_section' => 19
            ],
            [
                'section_id' => 1,
                'title' => 'While Loop',
                'description' => "While loop dalam PHP adalah struktur kontrol yang mengulangi blok kode selama kondisi tertentu bernilai true. Pada setiap iterasi, kondisi dievaluasi, dan jika bernilai true, blok kode di dalam while loop dieksekusi. Loop akan terus berlanjut sampai kondisi menjadi false. While loop digunakan ketika jumlah iterasi tidak diketahui sebelumnya atau ketika ingin mengulangi kode berdasarkan kondisi yang berubah selama eksekusi program.",
                'code' =>
                    "<?php

\$counter = 1;
while (\$counter < 10){
    echo \"while \$counter\" . PHP_EOL;
    \$counter++;
}

// alternatif
\$counter = 1;
while (\$counter < 10) :
    echo \"while \$counter\" . PHP_EOL;
    \$counter++;
endwhile;",
                'order_in_section' => 20
            ],
            [
                'section_id' => 1,
                'title' => 'Do While',
                'description' => "Do-while loop dalam PHP adalah struktur kontrol yang mirip dengan while loop, namun dengan perbedaan bahwa blok kode dieksekusi setidaknya satu kali sebelum kondisi diuji. Ini berarti blok kode akan dieksekusi terlepas dari kondisi. Setelah eksekusi pertama, kondisi akan dievaluasi, dan jika true, blok kode akan dieksekusi kembali, dan proses ini akan terus berlanjut sampai kondisi menjadi false. Do-while loop berguna ketika Anda ingin memastikan bahwa setidaknya satu iterasi kode dieksekusi, terlepas dari kondisi awal.",
                'code' =>
                    "<?php

\$counter = 100;
//minimal satu kali dijalankan dulu
do {
    echo \"Hello DO While Loop : \" . \$counter . PHP_EOL;
    \$counter++;
} while (\$counter <= 1);",
                'order_in_section' => 21
            ],
            [
                'section_id' => 1,
                'title' => 'Break and Continue',
                'description' => "Dalam PHP, break dan continue adalah pernyataan kontrol yang digunakan dalam loop. Break digunakan untuk menghentikan loop secara tiba-tiba dan keluar dari loop, sedangkan continue digunakan untuk melompati sisa iterasi di dalam loop dan melanjutkan ke iterasi berikutnya. Break sering digunakan untuk menghentikan loop berdasarkan kondisi tertentu, sementara continue berguna untuk mengabaikan iterasi tertentu berdasarkan kondisi yang sama. Ini memberikan kontrol lebih lanjut dalam pengulangan kode.",
                'code' =>
                    "<?php

// break
\$counter = 1;
// while (true){
//     echo \"while \$counter\" . PHP_EOL;
//     \$counter++;

//     if (\$counter > 10) {
//         break;
//     }
// }
// // continue
// for (\$counter = 1; \$counter <=20; \$counter++){
//     if(\$counter % 2 == 0){
//         continue;
//     }
//     echo \"Counter : \$counter\" . PHP_EOL;
// }

for (\$i = 1; \$i <= 20; \$i++) {
    if (!is_float(\$i / 2)) {
        echo \$i . PHP_EOL;
    }
}",
                'order_in_section' => 22
            ],
            [
                'section_id' => 1,
                'title' => 'For Each',
                'description' => "Foreach dalam PHP adalah struktur kontrol yang digunakan untuk mengulangi setiap elemen dalam array atau objek. Ini mengambil array atau objek sebagai input, kemudian mengambil setiap elemennya satu per satu, dan menjalankan blok kode yang ditentukan untuk setiap elemen tersebut. Foreach sangat berguna dalam iterasi dan memanipulasi data yang disimpan dalam array atau objek tanpa harus menggunakan indeks atau iterator eksternal. Ini mempermudah penggunaan dan pengolahan data yang kompleks dalam PHP.",
                'code' =>
                    "<?php

\$names = [\"Person 1\", \"Person 2\", \"Person 3\"];

for (\$i = 0; \$i < count(\$names); \$i++){
    echo \"Data ke \$i = \$names[\$i]\" . PHP_EOL;
}

foreach (\$names as \$index => \$name) {
    echo \"Data \$index = \$name\" . PHP_EOL;
}

\$person = [
    \"first_name\" => \"Person 1\",
    \"middle_name\" => \"Person 2\",
    \"last_name\" => \"Person 3\"
];

foreach (\$person as \$key => \$value) {
    echo \"\$key : \$value\" . PHP_EOL;
}
                ",
                'order_in_section' => 23
            ],
            [
                'section_id' => 1,
                'title' => 'Go To',
                'description' => "Dalam PHP, perintah go to tidak ada. Go to adalah struktur kontrol yang tidak didukung dalam PHP karena dapat menyebabkan kode sulit dibaca dan dipelihara. Sebaliknya, PHP menggunakan struktur kontrol seperti if, else, for, while, dan lainnya untuk mengatur alur program. Menggunakan struktur kontrol yang disediakan ini membantu menjaga kejelasan dan konsistensi dalam kode PHP, serta memfasilitasi pemahaman dan pemeliharaan kode yang lebih baik.",
                'code' =>
                    "<?php

goto a;
echo \"Hello World\" . PHP_EOL;

a:
echo \"Hello A\" . PHP_EOL;

\$counter = 1;
while (true){
    echo \"while \$counter\" . PHP_EOL;
    \$counter++;

    if (\$counter > 10) {
        goto end; // bisa menghentikan hati hati menggunakan goto
    }
}

end:
echo \"End Loop\";
                ",
                'order_in_section' => 24
            ],
            [
                'section_id' => 1,
                'title' => 'Function',
                'description' => "Fungsi dalam PHP adalah blok kode yang dapat dipanggil secara berulang untuk menjalankan tugas tertentu. Mereka membungkus serangkaian pernyataan yang dieksekusi saat fungsi dipanggil. Fungsi dapat menerima argumen sebagai input, melakukan operasi, dan mengembalikan hasil. Penggunaan fungsi membantu mengorganisir kode, mempromosikan reusabilitas, dan meningkatkan keterbacaan. Dalam PHP, fungsi didefinisikan menggunakan kata kunci \"function\" diikuti oleh nama fungsi dan blok kode yang ingin dieksekusi.",
                'code' =>
                    "<?php

// 1 paramater
// function Hallo(\$nama = \"Person 1\")
// {
//     echo \"hello \$nama\" . PHP_EOL;
// }


// Hallo();
// Hallo(\"Person 2\");

// 2parameter
// function Hi(\$name1, \$name2 = \"Person 2\")
// {
//     echo \"hello \$name1 \$name2\" . PHP_EOL;
// }

// Hi(\"Person 1\");

// konversi
// function sum(int \$first, int \$last){
//     \$total = \$first + \$last;
//     echo \"Total \$first + \$last = \$total\" . PHP_EOL;
// }
// sum(100, 100);
// sum(\"100\", \"100\");
// sum(true, false);
// sum([], []); error tidak bisa

// variable-length argument list
function sumAll(...\$values)
{
    \$total = 0;
    foreach (\$values as \$value) {
        \$total += \$value;
    }
    echo \"Total \" . implode(\"+\", \$values) . \" = \$total\" . PHP_EOL;
}
\$value = [10, 20, 30, 40];
// sumAll(10, 20, 30, 40);
sumAll(...\$value);",
                'order_in_section' => 25
            ],
            [
                'section_id' => 1,
                'title' => 'Function Return Value',
                'description' => "Fungsi Return Value dalam PHP merujuk pada nilai yang dikembalikan oleh sebuah fungsi setelah dieksekusi. Ini adalah nilai yang diproduksi atau dihasilkan oleh fungsi setelah menjalankan operasinya. Fungsi dapat mengembalikan berbagai jenis nilai, seperti string, angka, array, atau bahkan objek. Penggunaan nilai pengembalian memungkinkan hasil dari fungsi digunakan di tempat pemanggilan untuk eksekusi selanjutnya. Ini memungkinkan fungsi untuk memberikan output yang berguna dan memungkinkan fleksibilitas dalam penggunaannya dalam skrip PHP.",
                'code' =>
                    "<?php

function sum(int \$first, int \$second){
        return \$first + \$second;
}
\$total = sum(10,10);
var_dump(\$total);


// returnvaluepercabangan
function getFinalValue(int \$value)
{
    if (\$value >= 80) {
        return \"A\";
    } else if (\$value >= 70){
        return \"B\";
    } else if (\$value >= 60){
        return \"C\";
    } else if (\$value >= 50){
        return \"D\";
    } else {
        return \"E\";
    }

    echo \"Ups\" . PHP_EOL;
}
\$score = getFinalValue(40);
var_dump(\$score);

// return type declaration
function tum(int \$first, int \$second): int
{
    return \$first + \$second;
}
\$total = tum(10,10);
var_dump(\$total);
                ",
                'order_in_section' => 26
            ],
            [
                'section_id' => 1,
                'title' => 'Variable Function',
                'description' => "Variable Function dalam PHP adalah kemampuan untuk menyimpan nama fungsi dalam variabel dan memanggilnya menggunakan variabel tersebut. Ini memungkinkan fleksibilitas dalam pemanggilan fungsi, memungkinkan pemilihan fungsi yang akan dipanggil secara dinamis berdasarkan kondisi atau kebutuhan tertentu pada saat runtime. Variable Function berguna dalam situasi di mana Anda perlu memanggil fungsi yang berbeda tergantung pada situasi atau logika yang berubah dalam aplikasi Anda.",
                'code' =>
                    "<?php

function foo()
{
    echo \"FOO\" . PHP_EOL;
}
function bar()
{
    echo \"BAR\" . PHP_EOL;
}

\$functionName = \"foo\";
\$functionName();

\$functionName = \"bar\";
\$functionName();

function sayHello(string \$name, \$filter)
{
    \$finalName = \$filter(\$name);
    echo \"Hello \$finalName\" . PHP_EOL;
}

function sampleFunction(string \$name): string
{
    return \"Sample \$name\";
}

sayHello(\"Person 1\", \"sampleFunction\");
sayHello(\"Person 1\", \"strtoupper\");
sayHello(\"Person 1\", \"strtolower\");
                ",
                'order_in_section' => 27
            ],
            [
                'section_id' => 1,
                'title' => 'Anonymous Function',
                'description' => "Anonymous Function dalam PHP adalah fungsi tanpa nama yang dapat didefinisikan secara langsung di dalam kode tanpa harus menetapkan nama tertentu. Mereka sering digunakan sebagai argumen untuk fungsi lain atau disimpan dalam variabel. Anonymous Function berguna dalam situasi di mana Anda memerlukan fungsi sederhana yang hanya akan digunakan sekali atau dalam konteks tertentu tanpa perlu menetapkan nama fungsi secara eksplisit. Ini meningkatkan fleksibilitas dan kejelasan dalam pengembangan kode.",
                'code' =>
                    "<?php

\$sayHello = function (string \$nama) {
    echo \"Hello \$nama\" . PHP_EOL;
};

\$sayHello(\"Person 1\");

// anonymous function sebagai argument
function say(string \$nama, \$filter)
{
    \$finalName = \$filter(\$nama);
    echo \"Good bye \$finalName\" . PHP_EOL;
}

say(\"Person 1\", function (string \$nama): string {
    return strtoupper(\$nama);
});

\$filterFunction = function (string \$nama): string {
    return strtoupper(\$nama);
};
say(\"Person 1\", \$filterFunction);

// Mengakses variable luar gunakan use
\$first = \"Person 1\";
\$last = \"Person 2\";

\$nama = function () use (\$first, \$last) {
    echo \"hello \$first \$last\" . PHP_EOL;
};
\$nama();

function asd()
{
    global \$first;
    global \$last;
    echo \"hello \$first \$last\" . PHP_EOL;
}
asd();",
                'order_in_section' => 28
            ],
            [
                'section_id' => 1,
                'title' => 'Arrow Function',
                'description' => "Arrow function dalam PHP adalah sintaks baru yang memungkinkan definisi fungsi anonim lebih ringkas. Mereka menggunakan operator panah (=>) untuk mendefinisikan fungsi tanpa kata kunci \"function\". Arrow function bermanfaat untuk menyederhanakan sintaksis dalam kode, terutama saat membuat fungsi anonim yang singkat. Mereka memiliki perilaku penutupan yang lebih konsisten daripada fungsi anonim tradisional. Arrow function tersedia mulai dari PHP versi 7.4 dan seterusnya.",
                'code' =>
                    "<?php

\$person1 = \"Person 1\";
\$person2 = \"Person 2\";

\$sayHello = fn (\$person3) => \"Hello \$person1, \$person2, \$person3\" . PHP_EOL;
echo \$sayHello('Person 3');
                ",
                'order_in_section' => 29
            ],
            [
                'section_id' => 1,
                'title' => 'Callback Function',
                'description' => "Callback function dalam PHP adalah fungsi yang dilewatkan sebagai argumen ke fungsi lain dan dipanggil di dalamnya. Mereka memungkinkan untuk menjalankan kode secara asinkron atau menjalankan logika yang berbeda tergantung pada kondisi tertentu. Callback function sangat berguna dalam pemrograman yang berbasis peristiwa, seperti pemrosesan formulir, penanganan permintaan HTTP, atau saat bekerja dengan fungsi-fungsi lain yang membutuhkan eksekusi yang berbeda tergantung pada hasil atau kejadian tertentu.",
                'code' =>
                    "<?php

function sayH(string \$name, callable \$filter)
{
    // call_user_func adalah untuk memanggil fungsi yang namanya tidak Anda ketahui sebelumnya tetapi jauh lebih efisien karena program harus mencari fungsi tersebut pada saat runtime.
    \$finalName = call_user_func(\$filter, \$name);
    echo \"Hello \$finalName\" . PHP_EOL;
}

sayH(\"Person 1\", function (string \$name) {
    return strtoupper(\$name);
});
// sayH(\"Person 1\", fn (\$name) => strtoupper(\$name)); harus php 7.4 // arrow function
sayH(\"Person 1\", \"strtoupper\");
sayH(\"Person 1\", \"strtolower\");
                ",
                'order_in_section' => 30
            ],
            [
                'section_id' => 1,
                'title' => 'Recursive Function',
                'description' => "Recursive Function dalam PHP adalah fungsi yang memanggil dirinya sendiri di dalam definisinya sendiri. Ini memungkinkan penyelesaian masalah yang berulang atau hierarki. Recursive function penting dalam pemrograman untuk memproses struktur data yang kompleks seperti pohon, grafik, atau untuk mengimplementasikan algoritma yang memerlukan iterasi berulang. Namun, perlu diingat bahwa penggunaan recursive function harus hati-hati untuk menghindari infinite loop dan memastikan bahwa kondisi basis terpenuhi untuk menghindari stack overflow.",
                'code' =>
                    "<?php

// menggunakan cara loop manual
// function factLoop(int \$value): int{
//     \$total = 1;
//     for (\$i = 1; \$i <= \$value; \$i++) {
//         //\$total = \$total * \$i;
//         \$total *= \$i;
//     }
//     return \$total;
// }

// var_dump(factLoop(6));

// menggunakan cara recursive
// function factRecursive(int \$value): int
// {
//     if (\$value == 1) {
//         return 1;
//     } else {
//        // \$value = 4 * 3 * 2
//        // \$value = 5 * 4 * 3 * 2
//         return \$value * factRecursive(\$value - 1);
//     }
// }
// var_dump(factRecursive(4));

function factRecursive(int \$value): int
{
    if (\$value == 1) {
        return 1;
    } else {
        // \$value = 4 * 3 * 2
        // \$value = 5 * 4 * 3 * 2
        return \$value * factRecursive(\$value - 1);
    }
}
print_r(factRecursive(3));

// function loop(int \$value)
// {
//     if (\$value == 0) {
//         echo \"Selesai\" . PHP_EOL;
//     } else {
//         echo \"Loop-\$value\" . PHP_EOL;
//         loop(\$value - 1);
//     }
// }
// loop(100);
                ",
                'order_in_section' => 31
            ],
            [
                'section_id' => 1,
                'title' => 'String Function',
                'description' => "String Function dalam PHP merujuk pada fungsi-fungsi yang digunakan untuk memanipulasi dan memproses string. Ini termasuk fungsi-fungsi untuk mencari substring, mengganti teks, mengonversi huruf, memotong, menggabungkan, memformat, memeriksa panjang, dan banyak lagi. String function sangat berguna dalam pengembangan aplikasi web untuk memanipulasi data teks, memvalidasi input pengguna, dan membuat tampilan yang sesuai. Dengan menggunakan string function, pengembang dapat dengan mudah mengelola dan memanipulasi teks sesuai kebutuhan aplikasi mereka.",
                'code' =>
                    "<?php

// untuk array
var_dump(join(\"-\", [10, 11, 12, 13]));
// untuk memecah kata berdasarkan parameter pertama
var_dump(explode(\" \", \"Person 1 Person 2 Person 3\"));
// huruf kecil
var_dump(strtolower(\"PERSON 1 PERSON 2 PERSON 3\"));
// huruf besar
var_dump(strtoupper(\"person 1 person 2 person 3\"));
// menghilangkan spasi yang ada di kiri kanan
var_dump(trim(\"   Person 1   Person 2 Person 3   \"));
// mencetak kata berdasarkan parameter
var_dump(substr(\"Person 1 Person 2 Person 3\", 0, 5));
                ",
                'order_in_section' => 32
            ],
            [
                'section_id' => 1,
                'title' => 'Array Function',
                'description' => "Array Function dalam PHP adalah fungsi-fungsi yang digunakan untuk memanipulasi dan mengolah array. Ini mencakup fungsi-fungsi untuk menambah, menghapus, mencari, mengurutkan, membalik, dan memfilter elemen array, serta fungsi untuk mengubah struktur array seperti mengubah kunci atau nilai. Array function memungkinkan pengembang untuk melakukan berbagai operasi pada array dengan mudah dan efisien, meningkatkan fleksibilitas dan fungsionalitas dalam pengembangan aplikasi web dan perangkat lunak pada umumnya.",
                'code' =>
                    "<?php

\$data = [1, 2, 3, 4, 5, 6, 7];

// \$mapFunc = fn (int \$value) => \$value * 10;

// \$dataResult = array_map(\$mapFunc, \$data);
// var_dump(\$dataResult);

// rsort(\$data); // reverse sort
// var_dump(\$data);

sort(\$data);
var_dump(\$data);

// var_dump(array_keys(\$data));
// var_dump(array_values(\$data));

\$person = [
    \"first_name\" => \"Person 1\",
    \"last_name\" => \"Person 3\"
];
var_dump(array_keys(\$person));
var_dump(array_values(\$person));
                ",
                'order_in_section' => 33
            ],
            [
                'section_id' => 1,
                'title' => 'Is Function',
                'description' => "Fungsi-fungsi yang dimulai dengan \"is_\" dalam PHP adalah fungsi bawaan yang digunakan untuk memeriksa tipe data atau kondisi tertentu dari suatu variabel. Examplenya, is_array() digunakan untuk memeriksa apakah suatu variabel adalah array, is_string() untuk memeriksa apakah variabel adalah string, dan seterusnya. Fungsi-fungsi ini mengembalikan nilai boolean (true atau false) berdasarkan hasil pemeriksaan kondisi yang diberikan terhadap variabel yang diberikan.",
                'code' =>
                    "<?php

\$data = \"sample\";

var_dump(is_bool(\$data));
var_dump(is_string(\$data));
var_dump(is_int(\$data));
var_dump(is_array(\$data));
var_dump(is_float(\$data));
var_dump(is_null(\$data));

// is_array(): Memeriksa apakah suatu variabel adalah array.
// is_bool(): Memeriksa apakah suatu variabel adalah boolean.
// is_callable(): Memeriksa apakah suatu variabel dapat dipanggil sebagai fungsi.
// is_double() (alias untuk is_float()): Memeriksa apakah suatu variabel adalah float (bilangan pecahan).
// is_float(): Memeriksa apakah suatu variabel adalah float (bilangan pecahan).
// is_int(): Memeriksa apakah suatu variabel adalah integer.
// is_integer() (alias untuk is_int()): Memeriksa apakah suatu variabel adalah integer.
// is_iterable(): Memeriksa apakah suatu variabel dapat diiterasi.
// is_long() (alias untuk is_int()): Memeriksa apakah suatu variabel adalah integer.
// is_null(): Memeriksa apakah suatu variabel adalah null.
// is_numeric(): Memeriksa apakah suatu variabel adalah numerik.
// is_object(): Memeriksa apakah suatu variabel adalah objek.
// is_real() (alias untuk is_float()): Memeriksa apakah suatu variabel adalah float (bilangan pecahan).
// is_resource(): Memeriksa apakah suatu variabel adalah sumber daya (resource).
// is_scalar(): Memeriksa apakah suatu variabel adalah tipe data skalar (string, integer, float, atau boolean).
// is_string(): Memeriksa apakah suatu variabel adalah string.
                ",
                'order_in_section' => 34
            ],
            [
                'section_id' => 1,
                'title' => 'Require dan Include',
                'description' => "Require dan include adalah pernyataan dalam PHP yang digunakan untuk memasukkan konten dari file eksternal ke dalam file PHP yang sedang dieksekusi. Perbedaan utama antara keduanya adalah jika file yang dimasukkan dengan require tidak ditemukan, maka program akan menghasilkan fatal error, sedangkan include hanya menghasilkan peringatan (warning) dan melanjutkan eksekusi program. Keduanya digunakan untuk mengorganisir kode menjadi bagian yang lebih kecil dan mudah dikelola.",
                'code' =>
                    "<?php

require \"filename.php\";
include \"filename.php\";
require_once \"filename.php\";
include_once \"filename.php\";

// posisi include require harus ada di atas
                ",
                'order_in_section' => 35
            ],
            [
                'section_id' => 1,
                'title' => 'Variable Scope',
                'description' => "Variable Scope dalam PHP merujuk pada bagian dari program di mana sebuah variabel dapat diakses. Terdapat dua jenis cakupan variabel: lokal dan global. Variabel lokal hanya dapat diakses di dalam blok kode di mana itu dideklarasikan, sementara variabel global dapat diakses dari mana saja dalam program. Pemahaman tentang cakupan variabel sangat penting untuk menghindari konflik nama variabel dan mengelola data dengan benar dalam kode PHP.",
                'code' =>
                    "<?php

\$name = \"Person 1\"; //global scope

function sayN(){
    global \$name;
    echo \$name . PHP_EOL;
}

sayN();

// local

function cName()
{
    \$nama = \"Person 1\"; //localscope
}

// static
function increment()
{
    static \$counter = 1; //siklusnya tetap, terjaga. lihat perbandingan cukup hilangkan static

    echo \"Counter = \$counter\" . PHP_EOL;

    \$counter++;
}

increment();
increment();
increment();
                ",
                'order_in_section' => 36
            ],
            [
                'section_id' => 1,
                'title' => 'Reference',
                'description' => "Referensi dalam PHP mengacu pada kemampuan untuk membuat dua atau lebih variabel yang mengacu pada lokasi memori yang sama. Dengan menggunakan referensi, perubahan yang dilakukan pada satu variabel juga mempengaruhi variabel lainnya yang merujuk pada nilai yang sama. Ini berguna dalam situasi di mana Anda perlu menghindari penyalinan besar data atau memperbarui nilai variabel secara bersamaan dalam kode PHP.",
                'code' =>
                    "<?php

\$name = \"Person 1\";

\$otherName = \$name;
\$otherName = \"Person 2\";

echo \$name . PHP_EOL;

// reference
\$name = \"Person 3\";

\$otherName = &\$name;
// \$otherName = \"Person 2\";

echo \$otherName . PHP_EOL;
                ",
                'order_in_section' => 37
            ],
            [
                'section_id' => 1,
                'title' => 'Pass By Reference',
                'description' => "Pass by reference dalam PHP adalah metode pengiriman argumen ke fungsi dengan menggunakan referensi ke variabel asli, bukan salinannya. Ini memungkinkan fungsi untuk memodifikasi nilai variabel yang dikirim sebagai argumen. Dengan pass by reference, perubahan yang dilakukan dalam fungsi akan memengaruhi variabel yang dikirimkan, tidak hanya salinannya. Hal ini berguna untuk menghemat memori dan memperbarui nilai variabel secara langsung.",
                'code' =>
                    "<?php

function increment (int \$value)
{
    \$value++;
}

\$counter = 1;
increment(\$counter);
echo \$counter . PHP_EOL;

// reference

function ince (int &\$value)
{
    \$value++;
}

\$counter = 1;
ince(\$counter);
echo \$counter;
                ",
                'order_in_section' => 38
            ],
            [
                'section_id' => 1,
                'title' => 'Returning Reference',
                'description' => "Returning reference dalam PHP adalah metode pengembalian referensi dari sebuah fungsi, bukan nilai. Ini memungkinkan fungsi untuk mengembalikan referensi ke variabel yang dapat digunakan di luar fungsi untuk memodifikasinya secara langsung. Dengan returning reference, perubahan yang dilakukan pada nilai referensi di dalam fungsi akan tercermin pada variabel di luar fungsi tersebut. Ini berguna dalam situasi di mana Anda perlu memodifikasi variabel di luar fungsi secara langsung menggunakan referensi.",
                'code' =>
                    "<?php

function &getValue()
{
    static \$value = 100;
    return \$value;
}
\$a = &getValue();
\$a = 200;

\$b = &getValue();
echo \$b . PHP_EOL;
                ",
                'order_in_section' => 39
            ],
            [
                'section_id' => 2,
                'title' => 'Class',
                'description' => "Dalam pemrograman berorientasi objek, class dalam PHP adalah blueprint atau cetak biru untuk membuat objek. Ini mendefinisikan atribut (variabel) dan metode (fungsi) yang dimiliki oleh objek. Class adalah struktur yang membungkus data untuk suatu entitas tertentu dan perilaku yang terkait dengannya. Objek dibuat dari class dengan menggunakan keyword \"new\". Class memungkinkan pengorganisasian kode yang lebih baik, reusabilitas, dan abstraksi yang tinggi dalam pengembangan perangkat lunak.",
                'code' =>
                    "<?php

class Person
{

}
                ",
                'order_in_section' => 1
            ],
            [
                'section_id' => 2,
                'title' => 'Object',
                'description' => "Objek dalam PHP adalah instance atau salinan konkret dari sebuah class. Mereka memiliki atribut (variabel) dan metode (fungsi) yang didefinisikan oleh class, dan mewakili entitas konkret dalam program. Objek digunakan untuk memanipulasi data dan melakukan tindakan tertentu yang didefinisikan oleh class yang digunakan sebagai blueprint untuk pembuatannya. Objek memungkinkan untuk membuat dan mengelola instansiasi data yang sesuai dengan struktur dan perilaku yang telah ditentukan dalam class.",
                'code' =>
                    "<?php

class Person
{

}

// object
\$person1 = new Person();
\$person2 = new Person();
                ",
                'order_in_section' => 2
            ],
            [
                'section_id' => 2,
                'title' => 'Properties',
                'description' => "Dalam PHP, properties adalah variabel yang terkait dengan objek. Mereka merepresentasikan karakteristik atau atribut dari objek yang dijelaskan oleh sebuah class. Properties menyimpan data yang terkait dengan setiap objek yang dibuat dari class tertentu. Mereka memungkinkan objek untuk menyimpan dan mengakses informasi yang unik untuk setiap instansinya. Properties dapat memiliki nilai default yang diberikan di dalam definisi class atau diatur nilainya melalui konstruktor atau metode setter.",
                'code' =>
                    "<?php

class Person
{
    // Properties dengan type
    var ?string \$name; // boleh null
    // Properties default value
    var string \$address = \"Jakarta\";
    var ?string \$country = null; // artinya valuenya boleh null,
    // var string \$age = null; // tidak bisa null karena didepan type declarationnya tidak ada tanda tanya

}

// \$person = new Person();
\$person = new Person('Person 2', 'Jakarta');
// \$person->name = \"Person 1\";
// \$person->country = \"Indonesia\";

var_dump(\$person);

echo \"Name : \$person->name\" . PHP_EOL;
echo \"Address : \$person->address\" . PHP_EOL;
echo \"Country : \$person->country\" . PHP_EOL;

// error pasti
// \$person = new Person();
// // \$person->name = []; // karena tipe data nya array
// \$person->address = \"Jakarta\";
// \$person->country = \"Indonesia\";

// var_dump( \$person);
                ",
                'order_in_section' => 3
            ],
            [
                'section_id' => 2,
                'title' => 'Method',
                'description' => "Fungsi dalam class PHP disebut metode. Metode adalah fungsi yang didefinisikan di dalam sebuah class dan digunakan untuk memanipulasi data yang terkait dengan objek yang dibuat dari class tersebut. Mereka memiliki akses ke properties dan fungsi lain dalam class. Metode memungkinkan untuk mendefinisikan perilaku atau tindakan yang terkait dengan objek yang dibuat dari class, dan digunakan untuk memisahkan logika dari class dalam pengembangan aplikasi berorientasi objek.",
                'code' =>
                    "<?php

class Person
{
    var string \$name;
    var string \$address;
    var string \$country;

    // Method
    function sayH(string \$name)
    {
        echo \"Hello \$name\" . PHP_EOL;
    }
}
\$peron = new Person();
\$peron->sayH(\"Person 1\");
                ",
                'order_in_section' => 4
            ],
            [
                'section_id' => 2,
                'title' => 'This Keyword',
                'description' => "Kata kunci \"this\" dalam PHP merujuk pada objek saat ini yang sedang diproses dalam sebuah metode di dalam class. Ini digunakan untuk mengakses properties dan metode dari objek itu sendiri. Dengan menggunakan \"this\", Anda dapat merujuk ke variabel dan fungsi dalam class saat ini tanpa harus menyebutkan nama objek secara eksplisit. Ini membantu dalam menghindari kebingungan antara variabel lokal dan properties objek saat menulis kode di dalam metode class.",
                'code' =>
                    "<?php

class Person
{
    var string \$name = \"Person 1\";

    function sayH(?string \$name)
    {
        if (is_null(\$name)) {
            echo \"Hi, my name is {\$this->name}\" . PHP_EOL;
        } else {
            echo \"Hello \$name, my name is {\$this->name}\" . PHP_EOL;
        }
    }
}
\$person1 = new Person();
\$person1->sayH(\"person1\");

\$Person 1 = new Person();
\$Person 1->name = \"Person 1 Person 2 Person 3\";
\$Person 1->sayH(null);
                ",
                'order_in_section' => 5
            ],
            [
                'section_id' => 2,
                'title' => 'Constant',
                'description' => "Konstanta dalam PHP adalah nilai yang tidak berubah selama eksekusi skrip. Mereka didefinisikan menggunakan fungsi define() dan tidak dapat diubah setelah didefinisikan. Konstanta berguna untuk menyimpan nilai-nilai yang tidak berubah seperti nama-nama konstan, nilai-nilai yang sering digunakan, atau pengaturan yang tidak boleh diubah. Konstanta menggunakan nama yang disarankan untuk nilai-nilainya dan biasanya ditulis dengan huruf besar untuk membedakannya dari variabel biasa.",
                'code' =>
                    "<?php

// biasanya
define(\"APPLICATION\", \"Belajar PHP OOP\");
const APP_VERSION = \"1.0.0\";

echo APPLICATION . PHP_EOL;
echo APP_VERSION . PHP_EOL;

class Person
{
    const AUTHOR = \"Person 1\";

    var ?string \$name;
    var string \$address = \"Jakarta\";
    var ?string \$country = null;
}
// cara akses const
echo Person::AUTHOR . PHP_EOL;
\$person = new Person();
echo \$person->address . PHP_EOL;
                ",
                'order_in_section' => 6
            ],
            [
                'section_id' => 2,
                'title' => 'Self Keyword',
                'description' => "Kata kunci \"self\" dalam PHP digunakan untuk merujuk ke class saat ini di mana ia digunakan. Ini berguna untuk mengakses properti statis dan konstanta class serta untuk memanggil metode statis di dalam class itu sendiri. Dengan menggunakan \"self\", Anda dapat merujuk ke elemen-elemen class tanpa harus menggunakan nama class secara langsung. Ini membantu dalam pemeliharaan kode dan meningkatkan konsistensi karena tidak tergantung pada nama class yang mungkin berubah.",
                'code' =>
                    "<?php

class Example{
    const Properties = \"Example\";
}

class Person
{
    const AUTHOR = \"Person 1\";

    function info()
    {
        echo \"AUTHOR : \" . self::AUTHOR . PHP_EOL;
        echo \"BRING : \" . Example::Properties . PHP_EOL;
    }
}

\$Person 1 = new Person();
\$Person 1->info();
                ",
                'order_in_section' => 7
            ],
            [
                'section_id' => 2,
                'title' => 'Constructor',
                'description' => "Constructor dalam PHP adalah metode khusus dalam sebuah class yang secara otomatis dipanggil saat objek dari class tersebut dibuat. Ini memiliki nama yang sama dengan nama classnya dan digunakan untuk melakukan inisialisasi awal objek, seperti mengatur nilai default untuk properties atau menyiapkan objek untuk digunakan. Constructor memungkinkan untuk menjalankan kode tertentu setiap kali objek dibuat dari class, sehingga memastikan bahwa objek memiliki keadaan awal yang diinginkan sebelum digunakan.",
                'code' =>
                    "<?php

class Person
{
    const AUTHOR = \"Person 1 Person 2 Person 3\";

    var string \$name;
    var ?string \$address = null;
    var string \$country = \"Indonesia\";

    public function __construct(string \$name, ?string \$address)
    {
        \$this->name = \$name;
        \$this->address = \$address;
    }

    function sayH(\$name, \$address){
        echo \"Hello \$name, anda tinggal di \$address\";
    }
}

\$author1 = new Person(\"Person 1\", \"Jakarta\");
var_dump(\$author1);
                ",
                'order_in_section' => 8
            ],
            [
                'section_id' => 2,
                'title' => 'Destructor',
                'description' => "Destructor dalam PHP adalah metode khusus dalam sebuah class yang dipanggil secara otomatis saat objek dari class tersebut dihancurkan atau tidak lagi diperlukan. Ini memiliki nama khusus \"__destruct()\" dan digunakan untuk melakukan pembersihan atau pelepasan sumber daya yang diperlukan saat objek dihapus dari memori, seperti menutup koneksi database atau melepaskan memori yang dialokasikan. Destructor memungkinkan untuk menjalankan kode tertentu sebelum objek dihapus, sehingga memastikan bahwa sumber daya digunakan secara efisien dalam aplikasi PHP.",
                'code' =>
                    "<?php

class Person
{
    const AUTHOR = \"Person 1 Person 2 Person 3\";

    var string \$name = \"Person 3\";
    var ?string \$address = null;
    var string \$country = \"indonesia\";

    public function __construct(string \$name, ?string \$address)
    {
        \$this->name = \$name;
        \$this->address = \$address;
    }

    function sayH()
    {
        echo \"Hello \$this->name, anda tinggal di \$this->address\" . PHP_EOL;
    }

    function __destruct()
    {
        echo \"Object person {\$this->name} is destroyed\" . PHP_EOL;
    }
}

\$person1 = new Person(\"Person 1\", \"Indonesia\");
\$person2 = new Person(\"Person 2\", \"Jakarta\");
\$person2->sayH();

echo \"Program Selesai\" . PHP_EOL;
                ",
                'order_in_section' => 9
            ],
            [
                'section_id' => 2,
                'title' => 'Inheritance',
                'description' => "Inheritance dalam pemrograman berorientasi objek adalah konsep di mana sebuah class dapat mewarisi properti dan metode dari class lain yang disebut class induk atau superclass. Class anak atau subclass dapat menggunakan dan memperluas fungsionalitas class induk tanpa perlu menulis ulang kode. Ini memungkinkan untuk menciptakan hierarki class yang terorganisir dengan baik, meningkatkan reusabilitas kode, dan memungkinkan penggunaan pola desain seperti penggantian metode dan polimorfisme.",
                'code' =>
                    "<?php

class Manager
{
    var string \$name;

    //arti void tidak ada value,
    function sayHello(string \$name): void
    {
        echo \"Hi \$name, my name is \$this->name\" . PHP_EOL;
    }
}

class VicePresident extends Manager
{

}
\$VP = new VicePresident();
\$VP->name = 'Person 1';
\$VP->sayHello(\"Admin\");
                ",
                'order_in_section' => 10
            ],
            [
                'section_id' => 2,
                'title' => 'Namespace',
                'description' => "Namespace dalam PHP adalah mekanisme untuk mengelompokkan kode ke dalam ruang nama yang terpisah. Ini membantu menghindari konflik nama antara kelas, fungsi, dan konstanta dengan nama yang sama dalam proyek yang besar atau saat menggunakan library eksternal. Dengan menggunakan namespace, Anda dapat membuat kode menjadi lebih terstruktur, mudah dipelihara, dan mengisolasi fungsionalitas tertentu. Namespace didefinisikan dengan kata kunci \"namespace\" di awal file PHP dan memungkinkan untuk menggunakan kualifikasi penuh nama saat memanggil elemen-elemen kode.",
                'code' =>
                    "<?php

// namespace Data\One{
    //  class IsinyaApa{
    //      var string \$name;
    //      public function __construct(string \$name)
    //      {
    //          \$this->name = \$name;
    //      }

    //      function sayHello(\$name){
    //          echo \"Hello \$this->name, my name is \$name\" . PHP_EOL;
    //      }
    //  }
// }

// namespace Data\Two{
    //  class IsinyaApa{
    //      var string \$address;
    //      public function __construct(string \$address)
    //      {
    //          \$this->address = \$address;
    //      }

    //      function myAdd(\$address){
    //          echo \"I lived in \$this->address, \$address\" . PHP_EOL;
    //      }
    //  }
// }

// namespace{
    //  \$Obj1 = new \Data\One\IsinyaApa(\"Admin\");
    //  \$Obj1->sayHello(\"Person 1\");
// }

// namespace{
    //  \$Obj2 = new \Data\Two\IsinyaApa(\"Jakarta\");
    //  \$Obj2->myAdd(\"Indonesia\");
// }

namespace Helper {
    function helpMe()
    {
        echo \"HELP ME\" . PHP_EOL;
    }

    const APPLICATION = \"Belajar PHP OOP\";
}

namespace { // Global Namespace
    echo Helper\APPLICATION . PHP_EOL;
    Helper\helpMe();
}
                ",
                'order_in_section' => 11
            ],
            [
                'section_id' => 2,
                'title' => 'Import Namespace',
                'description' => "Import Namespace dalam PHP adalah proses untuk menyertakan (mengimpor) kode dari satu namespace ke dalam namespace lain atau ke dalam ruang lingkup saat ini. Ini memungkinkan penggunaan kelas, fungsi, atau konstanta dari namespace tertentu tanpa harus menyebutkan kualifikasi lengkap nama namespace setiap kali. Dengan mengimpor namespace, Anda dapat membuat kode menjadi lebih ringkas, meningkatkan keterbacaan, dan menghindari pengulangan penulisan kode yang berlebihan.",
                'code' =>
                    "<?php

/*
Membahas tentang :
    - Menggunakan USE sebagai import
    - Menggunakan AS sebagai alias
    - Group USE
*/

namespace Data\One {
    class Example
    {
        var string \$name;
        public function __construct(string \$name)
        {
            \$this->name = \$name;
        }

        function sayHello(\$name)
        {
            echo \"Hello \$this->name, my name is \$name\" . PHP_EOL;
        }
    }

    class Sample extends Example
    {
    }

    class Dummy
    {
    }
}

namespace Data\Two {
    class Example
    {
        var string \$address;
        public function __construct(string \$address)
        {
            \$this->address = \$address;
        }

        function myAdd(\$address)
        {
            echo \"I lived in \$this->address, \$address\" . PHP_EOL;
        }
    }
}


// Tanpa Import
// namespace{
//     \$Obj1 = new \Data\One\\Example(\"Admin\");
//     \$Obj1->sayHello(\"Person 1\");
// }
// namespace{
//     \$Obj2 = new \Data\Two\\Example(\"Jakarta\");
//     \$Obj2->myAdd(\"Indonesia\");
// }

// Dengan Import Use
namespace {

    // Tanpa Group Use
    // use Data\One\\Example;
    // use Data\One\Sample;
    // use Data\One\Dummy; // jadi ribet harus 3 kali
    // \$exampleOne = new Example(\"admin\");
    // \$exampleOne->sayHello(\"Person 1\");

    // Dengan Group use // bisa juga ditambahkan as
    // as pertama bisa sembarang nama, nah yg kedua harus sama namanya
    use Data\One\{Example as ExampleOne, Sample, Dummy};

    \$exampleOne = new ExampleOne(\"admin\");
    \$exampleOne->sayHello(\"Person 1\");

    \$sample = new Sample('manager');
    \$sample->sayHello('Person 2');

    // - Namun pada penggunaan Use tidak bisa mengimport dua class yang sama
    // use Data\Two\Example;
    // - Solusinya adalah dengan menggunakan as
    use Data\Two\Example as ExampleTwo; // ini solusinya
    \$exampleTwo = new ExampleTwo(\"Jakarta\");
    \$exampleTwo->myAdd(\"Indonesia\");
}


namespace Helper {
    function helpMe()
    {
        echo \"HELP ME\" . PHP_EOL;
    }

    const APPLICATION = \"Belajar PHP OOP\";
}

// namespace { //Global Namespace
//     echo Helper\APPLICATION . PHP_EOL;
//     Helper\helpMe();
// }

namespace {

    use function Helper\helpMe as help;
    use const Helper\APPLICATION;

    help();
    echo APPLICATION . PHP_EOL;
}
                ",
                'order_in_section' => 12
            ],
            [
                'section_id' => 2,
                'title' => 'Visibility',
                'description' => "Visibility dalam PHP mengacu pada tingkat akses yang diberikan kepada properti atau metode dalam sebuah class. Ada tiga tingkat visibility: public, protected, dan private. Properti atau metode yang dideklarasikan sebagai public dapat diakses dari luar class. Protected hanya dapat diakses dari class itu sendiri atau class turunannya. Private hanya dapat diakses dari class itu sendiri. Pengaturan visibility membantu mengendalikan akses ke properti dan metode, memperkuat encapsulation, dan menerapkan prinsip-prinsip OOP.",
                'code' =>
                    "<?php

class exPrivate
{
    public float \$examplePublic;
    protected string \$exampleProtected;
    private int \$examplePrivate;

    public function __construct(float \$examplePublic, string \$exampleProtected, int \$examplePrivate)
    {
        \$this->examplePublic = \$examplePublic;
        \$this->exampleProtected = \$exampleProtected;
        \$this->examplePrivate = \$examplePrivate;
    }

    public function examplePrivate(): int
    {
        return \$this->examplePrivate;
    }
}

class exampleProtected extends exPrivate
{
    public function exampleProtected()
    {
        echo \"Ini adalah Example penggunaan visibility Protected : \$this->exampleProtected\" . PHP_EOL;
    }
}

class exPublic extends exampleProtected
{
    public function examplePublic()
    {
        echo \"Ini adalah Example penggunaan visibility Public : \$this->examplePublic\" . PHP_EOL;
    }
}

\$exmPrivate = new examplePrivate(3.14, \"Belajar OOP Php\", 22);
echo \"Ini adalah Example penggunaan visibility Private : \" . \$exmPrivate->examplePrivate() . PHP_EOL;
\$exmProtected = new exampleProtected(3.14, \"Belajar OOP Php\", 22);
\$exmProtected->exampleProtected() . PHP_EOL;
\$exmPublic = new exPublic(3.14, \"Belajar OOP Php\", 22);
\$exmPublic->examplePublic() . PHP_EOL;
                ",
                'order_in_section' => 13
            ],
            [
                'section_id' => 2,
                'title' => 'Function Overriding',
                'description' => "Function overriding dalam PHP adalah ketika subclass memiliki metode dengan nama yang sama dan tanda fungsi sebagai superclassnya. Ini memungkinkan subclass untuk mengganti implementasi metode superclassnya dengan perilaku yang sesuai. Dengan function overriding, subclass dapat menyediakan implementasi yang lebih spesifik atau berbeda dari metode superclassnya. Hal ini berguna untuk menciptakan fleksibilitas dalam hierarki class dan untuk menerapkan pola desain seperti polimorfisme dalam pemrograman berorientasi objek.",
                'code' =>
                    "<?php

class Manager
{
    var string \$name;

    public function __construct(string \$name)
    {
        \$this->name = \$name;
    }

    function sayHello()
    {
        echo \"Hi Manager, my name is Manage \$this->name\" . PHP_EOL;
    }
}
class vicePresident extends Manager
{
    function sayHello()
    {
        echo \"Hi Vice, my name is VP \$this->name\" . PHP_EOL;
    }
}

\$manager = new Manager(\"Person 1\");
\$manager->sayHello();

\$vp = new VicePresident(\"Person 2\");
\$vp->sayHello();
                ",
                'order_in_section' => 14
            ],
            [
                'section_id' => 2,
                'title' => 'Parent Keyword',
                'description' => "Kata kunci \"parent\" dalam PHP digunakan untuk merujuk ke class induk dari class saat ini di dalam hierarki class. Ini digunakan dalam konteks function overriding untuk memanggil metode dari class induk yang di-override oleh class saat ini. Dengan menggunakan \"parent\", Anda dapat mengakses metode dan properti dari class induk yang diperlukan untuk diperluas atau diperbaharui dalam class saat ini. Ini memungkinkan untuk mempertahankan atau memodifikasi perilaku class induk dalam subclass.",
                'code' =>
                    "<?php

// PARENT KEYWORD DIGUNAKAN UNTUK MENGAKSES CLASS PARENT
namespace Data;

class Shape
{
    function getCorner():void
    {
        echo \"Halo Person 1\" . PHP_EOL;
    }
}

class Rectangle extends Shape
{
    public function getCorner():void
    {
        echo \"Halo Person 1 Person 2 Person 3\" . PHP_EOL;
    }

    public function getParentCorner():void
    {
        parent::getCorner(); // kata kunci parent
    }
}

\$Shape = new Shape();
\$Shape->getCorner();

\$Rectangle = new Rectangle();
\$Rectangle->getCorner();
\$Rectangle->getParentCorner();
                ",
                'order_in_section' => 15
            ],
            [
                'section_id' => 2,
                'title' => 'Constructor Overriding',
                'description' => "Constructor overriding dalam PHP adalah ketika subclass memiliki constructor dengan perilaku yang berbeda atau tambahan dari superclassnya. Ini memungkinkan subclass untuk menambahkan logika khusus atau mempersiapkan keadaan awal yang berbeda saat objek dibuat. Constructor overriding dapat dilakukan dengan memanggil constructor dari superclass menggunakan kata kunci \"parent::__construct()\" di dalam constructor subclass. Ini memungkinkan untuk memperluas fungsionalitas konstruktor dan memastikan bahwa persiapan objek dilakukan secara benar dalam subclass.",
                'code' =>
                    "<?php

// CONSTRUCTOR OVERRIDING
class Manager
{
    var string \$name;
    var string \$title;

    public function __construct(string \$name, string \$title = \"Manager\")
    {
        \$this->name = \$name;
        \$this->title = \$title;
    }

    function sayHello(string \$name):void
    {
        echo \"Manager : Hi \$name, my name is \$this->name as \$this->title\" . PHP_EOL;
    }
}
class vicePresident extends Manager
{
    public function __construct(string \$name = \"\")
    {
        // tidak wajib tapi dirPerson 1mendasikan
        parent::__construct(\$name, \"Vice President\");
    }
    function sayHello(string \$name):void
    {
        echo \"Vice President : Hi \$name, my name is \$this->name as \$this->title\" . PHP_EOL;
    }
}
\$manager = new Manager(\"Person 1\");
\$manager->sayHello(\"Admin Manager\");

\$vp = new VicePresident(\"Person 2\");
\$vp->sayHello(\"Admin VP\");
                ",
                'order_in_section' => 16
            ],
            [
                'section_id' => 2,
                'title' => 'Polymorphism',
                'description' => "Polimorfisme dalam pemrograman berorientasi objek adalah konsep di mana suatu objek dapat memiliki banyak bentuk atau perilaku yang berbeda tergantung pada konteksnya. Ini memungkinkan untuk menggunakan objek dari kelas yang berbeda sebagai objek dari kelas induk dalam hierarki class. Polimorfisme memungkinkan kode untuk memproses objek berdasarkan tipe atau perilaku yang sesuai dengan objek tersebut, sehingga meningkatkan fleksibilitas, modularitas, dan reusabilitas dalam pengembangan perangkat lunak.",
                'code' =>
                    "<?php

class Programmer
{
    public string \$name;
    public string \$jabatan;
    public function __construct(string \$name, string \$jabatan)
    {
        \$this->name = \$name;
        \$this->jabatan = \$jabatan;
    }
}

class BackendProgrammer extends Programmer
{
}

class FrontendProgrammer extends Programmer
{
}

// Polymorphism
class Company
{
    public Programmer \$programmer;
}

// Function Argument Polymorphism
function sayHello(Programmer \$programmer)
{
    echo \"Hello Programmer \$programmer->name, \$programmer->jabatan\" . PHP_EOL;
}

\$company = new Company();
\$company->programmer = new Programmer(\"Person 1\", \"Full Stack Developer\");
echo \$company->programmer->name . \$company->programmer->jabatan . PHP_EOL;
\$company->programmer = new BackendProgrammer(\"Person 2\", \"Technical Architect\");
echo \$company->programmer->name . \$company->programmer->jabatan . PHP_EOL;
\$company->programmer = new FrontendProgrammer(\"Person 3\", \"Front End Developer\");
echo \$company->programmer->name . \$company->programmer->jabatan . PHP_EOL;

sayHello(new Programmer(\"Person 1\", \"Full Stack Developer\"));
sayHello(new BackendProgrammer(\"Person 2\", \"Full Stack Developer\"));
sayHello(new FrontendProgrammer(\"Person 3\", \"Full Stack Developer\"));
                ",
                'order_in_section' => 17
            ],
            [
                'section_id' => 2,
                'title' => 'Type Check and Cast',
                'description' => "Type check adalah proses memeriksa tipe data variabel atau nilai untuk memastikan kesesuaian dengan tipe yang diharapkan. Cast adalah konversi tipe data variabel dari satu jenis ke jenis lainnya. Dalam PHP, type check biasanya dilakukan menggunakan fungsi-fungsi seperti is_int(), is_string(), dan lainnya, sementara cast dilakukan dengan menambahkan tipe data yang diinginkan sebelum variabel, misalnya (int) \$variable untuk mengonversi \$variable menjadi integer.",
                'code' =>
                    "<?php

class Programmer
{
    public string \$name;
    public function __construct(string \$name)
    {
        \$this->name = \$name;
    }
}

class BackendProgrammer extends Programmer
{

}

class FrontendProgrammer extends Programmer
{

}

// Polymorphism
class Company
{
    public Programmer \$programmer;
}

// Function Argument Polymorphism Type Check and Cast menggunakan instanceof
function sayHello(Programmer \$programmer){
    if (\$programmer instanceof BackendProgrammer){
        echo \"Hello BackendProgrammer \$programmer->name\" . PHP_EOL;
    } else if (\$programmer instanceof FrontendProgrammer){
        echo \"Hello FrontendProgrammer \$programmer->name\" . PHP_EOL;
    } else if (\$programmer instanceof Programmer){
        echo \"Hello Programmer \$programmer->name\" . PHP_EOL;
    }
}

\$company = new Company();
\$company->programmer = new Programmer(\"Person 1\");
echo \$company->programmer->name . PHP_EOL;
\$company->programmer = new BackendProgrammer(\"Person 1\");
echo \$company->programmer->name . PHP_EOL;
\$company->programmer = new FrontendProgrammer(\"Person 3\");
echo \$company->programmer->name . PHP_EOL;

sayHello(new Programmer(\"Person 1\"));
sayHello(new BackendProgrammer(\"Person 2\"));
sayHello(new FrontendProgrammer(\"Person 3\"));
                ",
                'order_in_section' => 18
            ],
            [
                'section_id' => 2,
                'title' => 'Abstract Class',
                'description' => "Abstract class dalam PHP adalah class yang tidak dapat diinstansiasi secara langsung, tetapi digunakan sebagai cetak biru untuk class-class turunannya. Abstract class sering memiliki metode yang dideklarasikan tetapi tidak diimplementasikan. Setiap class turunan dari abstract class harus mengimplementasikan metode-metode abstrak tersebut. Abstract class digunakan untuk mempromosikan polimorfisme, mendorong implementasi standar, dan memisahkan definisi dasar dari implementasi khusus dalam pemrograman berorientasi objek.",
                'code' =>
                    "<?php

namespace Data {

    // class yang tidak bisa di instance adalah abstract class

    abstract class Location
    {
        public string \$name;
        // abstract function
        abstract public function sayHello(\$name): void;
    }

    class City extends Location
    {
        public function __construct(\$name = \"Person 1\")
        {
            \$this->name = \$name;
        }
        public function sayHello(\$name):void
        {
            echo \"Nama Anda Adalah \$this->name, Kota Anda \$name\" . PHP_EOL;
        }
    }
}

namespace {

    use Data\{City};

    \$new = new City();
    \$new->name = \"Jakarta\";
    \$new->sayHello(\"Person 1\");
}
                ",
                'order_in_section' => 19
            ],
            [
                'section_id' => 2,
                'title' => 'Getter and Setter',
                'description' => "Getter dan setter dalam PHP adalah metode yang digunakan untuk mengakses (getter) dan mengatur (setter) nilai properti objek dari luar class. Getter digunakan untuk mendapatkan nilai properti, sementara setter digunakan untuk mengatur nilai properti. Ini membantu dalam menerapkan konsep encapsulation, yang memungkinkan akses terkontrol ke properti objek dan memastikan bahwa operasi validasi atau logika lainnya dapat diterapkan saat mengakses atau mengatur nilai properti.",
                'code' =>
                    "<?php

namespace Data {

    class Category
    {
        private string \$name;
        private bool \$expensive;

        public function getName(): string
        {
            return \$this->name;
        }
        public function setName(string \$name): void
        {
            if (trim(\$name) != \"\") {
                \$this->name = \$name;
            }
        }

        public function isExpensive(): bool
        {
            return \$this->expensive;
        }

        public function setExpensive(bool \$expensive): void
        {
            \$this->expensive = \$expensive;
        }
    }
}

namespace {

    use Data\Category;

    \$category = new Category();
    \$category->setName(\"Handphone\");
    \$category->setExpensive(true);
    \$category->setName(\"     \");

    echo \"Name : {\$category->getName()}\" . PHP_EOL;
    echo \"Expensive : {\$category->isExpensive()}\" . PHP_EOL;
}
                ",
                'order_in_section' => 20
            ],
            [
                'section_id' => 2,
                'title' => 'Interface',
                'description' => "Interface dalam PHP adalah kontrak yang mendefinisikan metode yang harus diimplementasikan oleh class yang menggunakannya. Ini hanya mendefinisikan tipe metode dan parameter yang akan digunakan, tanpa memberikan implementasi aktual. Class yang mengimplementasikan interface harus menyediakan implementasi untuk semua metode yang dideklarasikan dalam interface tersebut. Interface memungkinkan untuk mendefinisikan kontrak umum untuk class-class yang berbeda, meningkatkan fleksibilitas dan interoperabilitas dalam pemrograman berorientasi objek.",
                'code' =>
                    "<?php

namespace Data {

    interface Car
    {
        function drive(): void;

        function getTire(): int;
    }

    class Avanza implements Car
    {
        function drive(): void
        {
            echo \"Drive Avanza\" . PHP_EOL;
        }

        function getTire(): int
        {
            return 4;
        }
    }
}

namespace {

    use Data\{Avanza};

    \$car = new Avanza();
    \$car->drive();
}
                ",
                'order_in_section' => 21
            ],
            [
                'section_id' => 2,
                'title' => 'Interface dan Inheritance',
                'description' => "Interface dalam PHP adalah kontrak yang mendefinisikan metode yang harus diimplementasikan oleh class yang menggunakannya. Inheritance adalah konsep di mana class dapat mewarisi properti dan metode dari class lain yang disebut class induk atau superclass. Dengan menggunakan interface, class dapat mewarisi metode dari lebih dari satu sumber, meningkatkan fleksibilitas dalam pengembangan. Interface dan inheritance bekerja bersama untuk menciptakan hierarki class yang terstruktur dan modular dalam pemrograman berorientasi objek.",
                'code' =>
                    "<?php

namespace Data {

    interface HasBrand
    {
        function getBrand():string;
    }

    interface isMaintenance
    {
        function isMaintenance(): bool;
    }

    interface Car extends HasBrand, isMaintenance
    {
        function drive(): void;

        function getTire(): int;
    }

    class Avanza implements Car, isMaintenance
    {

        function drive(): void
        {
            echo \"Drive Avanza\" . PHP_EOL;
        }

        function getTire(): int
        {
            return 4;
        }
        function getBrand():string
        {
            return \"Toyota\";
        }
        function isMaintenance(): bool
        {
            return true;
        }
    }
}

namespace{

    use Data\{Avanza};

    \$car = new Avanza();
    \$car->drive();
    echo \$car->getTire() . PHP_EOL;
    echo \$car->getBrand() . PHP_EOL;
    echo \$car->isMaintenance() . PHP_EOL;
}
                ",
                'order_in_section' => 22
            ],
            [
                'section_id' => 2,
                'title' => 'Trait',
                'description' => "Trait dalam PHP adalah mekanisme yang digunakan untuk mendefinisikan sekumpulan metode yang dapat digunakan kembali di berbagai class. Mereka memungkinkan untuk menyisipkan fungsionalitas yang sama ke dalam beberapa class tanpa menggunakan inheritance. Trait digunakan untuk mengatasi keterbatasan inheritance tunggal dalam pemrograman berorientasi objek, sehingga memungkinkan untuk mendefinisikan dan menggunakan kembali kode dengan cara yang lebih fleksibel dan modular. Trait digunakan dengan menggunakan kata kunci \"use\" di dalam class yang ingin menggunakannya.",
                'code' =>
                    "<?php

namespace Data {

    trait SayGoodBye
    {
        public string \$name;
        public function goodBye(?string \$name): void
        {
            if (is_null(\$name)) {
                echo \"Good Bye\" . PHP_EOL;
            } else {
                echo \"Good Bye \$name\" . PHP_EOL;
            }
        }
    }

    trait SayHello
    {
        public string \$name;
        public function hello(?string \$name): void
        {
            if (is_null(\$name)) {
                echo \"Hello\" . PHP_EOL;
            } else {
                echo \"Hello \$name\" . PHP_EOL;
            }
        }
    }

    trait HasName
    {
        public string \$name;
    }

    class Person
    {
        use SayGoodBye, SayHello, HasName;
    }
}

namespace {

    use Data\{Person};

    \$person = new Person();
    \$person->goodBye(\"Person 1\");
    \$person->hello(\"Person 2\");
    \$person->name=\"Person 3\";
    var_dump(\$person);
}
                ",
                'order_in_section' => 23
            ],
            [
                'section_id' => 2,
                'title' => 'Trait Overriding',
                'description' => "Trait overriding dalam PHP terjadi ketika metode dari trait digunakan dalam class, dan metode tersebut di-override di dalam class tersebut atau dalam class turunannya. Ini memungkinkan class untuk menyesuaikan perilaku dari metode yang digunakan dari trait sesuai dengan kebutuhan khususnya. Dengan menggunakan trait overriding, Anda dapat memperluas atau memodifikasi fungsionalitas yang diberikan oleh trait tanpa harus mengubah kode dalam trait itu sendiri.",
                'code' =>
                    "<?php

namespace Data {

    trait SayGoodBye
    {
        public string \$name;
        public function goodBye(?string \$name): void
        {
            if (is_null(\$name)) {
                echo \"Good Bye\" . PHP_EOL;
            } else {
                echo \"Good Bye \$name\" . PHP_EOL;
            }
        }
    }

    trait SayHello
    {
        public string \$name;
        public function hello(?string \$name): void
        {
            if (is_null(\$name)) {
                echo \"Hello\" . PHP_EOL;
            } else {
                echo \"Hello \$name\" . PHP_EOL;
            }
        }
    }

    trait CanRun
    {
        public string \$name;
        public abstract function run(): void;
    }

    class PerentPerson
    {
        public function hello(?string \$name): void
        {
            echo \"\$name is running\" . PHP_EOL;
        }
        public function goodBye(?string \$name): void
        {
            echo \"\$name is running\" . PHP_EOL;
        }
    }

    class Person extends PerentPerson
    {
        // trait visibility override
        use CanRun, SayHello, SayGoodBye{
            //bisa dioverride visibilitynya
            // hello as private;
            // goodBye as private;
        }

        public function run(): void
        {
            echo \"Person {\$this->name} is running\" . PHP_EOL;
        }
        // // ini lebih didahulukan overriding
        // public function hello(?string \$name): void
        // {
        //     echo \"\$name is running\" . PHP_EOL;
        // }
        // // ini lebih didahulukan overriding
        // public function goodBye(?string \$name): void
        // {
        //     echo \"\$name is running\" . PHP_EOL;
        // }
    }
}

namespace {

    use Data\{Person};

    \$person = new Person();
    \$person->hello(\"function hello\");
    \$person->goodBye(\"function goodbye\");
    \$person->name = \"Person 1 Person 2 Person 3\";
    \$person->run();
}
                ",
                'order_in_section' => 24
            ],
            [
                'section_id' => 2,
                'title' => 'Trait Conflict',
                'description' => "Trait conflict dalam PHP terjadi ketika dua atau lebih trait yang digunakan oleh sebuah class memiliki metode dengan nama yang sama. Hal ini menyebabkan konflik karena PHP tidak dapat menentukan metode mana yang harus digunakan oleh class. Untuk menyelesaikan konflik tersebut, Anda harus menyelesaikan masalah secara manual dengan menggunakan alias metode, mengubah nama metode, atau menggunakan komposisi daripada multiple inheritance.",
                'code' =>
                    "<?php

namespace Data{

    trait A
    {
        function doA(): void
        {
            echo \"1\" . PHP_EOL;
        }

        function doB(): void
        {
            echo \"2\" . PHP_EOL;
        }
    }

    trait B
    {
        function doA(): void
        {
            echo \"3\" . PHP_EOL;
        }

        function doB(): void
        {
            echo \"4\" . PHP_EOL;
        }
    }

    class Sample
    {
        // supaya gak conflict karena nama function sama
        use A, B{
            A::doA insteadof B; //  artinya untuk function doA kita memakai trait A daripada B
            B::doB insteadof A;
        }
    }
}

namespace{

    use Data\{Sample};

    \$sample = new Sample();
    \$sample->doA();
    \$sample->doB();
}
                ",
                'order_in_section' => 25
            ],
            [
                'section_id' => 2,
                'title' => 'Trait Inheritance',
                'description' => "Trait inheritance dalam PHP mengacu pada kemampuan traits untuk diwariskan oleh class-class yang menggunakannya. Ketika sebuah class menggunakan trait, traits tersebut dapat digunakan oleh class tersebut dan juga oleh class turunannya. Ini memungkinkan fungsionalitas dari trait untuk diperluas ke dalam seluruh hierarki class. Trait inheritance membantu dalam menerapkan dan memperluas kembali fungsionalitas yang terkait dengan traits di dalam aplikasi PHP, meningkatkan reusabilitas dan fleksibilitas kode.",
                'code' =>
                    "<?php

namespace Data{

    trait A
    {
        function doA(): void
        {
            echo \"1\" . PHP_EOL;
        }

        function doB(): void
        {
            echo \"2\" . PHP_EOL;
        }
    }

    trait B
    {
        function doA(): void
        {
            echo \"3\" . PHP_EOL;
        }

        function doB(): void
        {
            echo \"4\" . PHP_EOL;
        }
    }

    trait All
    {
        // Inheritance
        use A, B{
            A::doA insteadof B; //  artinya untuk function doA kita memakai trait A daripada B
            B::doB insteadof A;
        }
    }

    class Sample
    {
        use All;
    }
}

namespace{

    use Data\{Sample};

    \$sample = new Sample();
    \$sample->doA();
    \$sample->doB();
}
                ",
                'order_in_section' => 26
            ],
            [
                'section_id' => 2,
                'title' => 'Final Class',
                'description' => "Final class dalam PHP adalah class yang tidak dapat diwariskan. Ini berarti class tersebut tidak dapat memiliki class turunan atau subclass. Ketika sebuah class dideklarasikan sebagai final class, hal ini mengindikasikan bahwa desain class tersebut sudah lengkap dan tidak perlu diubah atau diperluas lagi oleh class lain. Penggunaan final class memastikan bahwa implementasi class tersebut tidak dapat diubah atau dimodifikasi oleh class turunannya, sehingga mempertahankan kestabilan dan integritas kode dalam aplikasi PHP.",
                'code' =>
                    "<?php

class SocialMedia
{
    public string \$name;
}

final class Facebook extends SocialMedia
{

}

// error
// class FakeFacebook extends Facebook
// {

// }
                ",
                'order_in_section' => 27
            ],
            [
                'section_id' => 2,
                'title' => 'Final Function',
                'description' => "Final function dalam PHP adalah metode dalam sebuah class yang dinyatakan sebagai final, yang berarti tidak dapat di-override oleh class turunannya. Ketika sebuah metode dinyatakan sebagai final, hal ini mengindikasikan bahwa implementasi metode tersebut sudah final dan tidak boleh diubah oleh class turunannya. Penggunaan final function memastikan bahwa perilaku atau implementasi metode tersebut tidak dapat dimodifikasi dalam class turunan, sehingga memperkuat kontrak perilaku class dalam hierarki class.",
                'code' =>
                    "<?php

class SocialMedia
{
    public string \$name;
    final public function login(string \$username, string \$password): void
    {

    }
}

final class Facebook extends SocialMedia
{
    // error
    // public function login(string \$username, string \$password): void
    // {

    // }
}
                ",
                'order_in_section' => 28
            ],
            [
                'section_id' => 2,
                'title' => 'Anonymous Class',
                'description' => "Anonymous class dalam PHP adalah class yang dideklarasikan tanpa nama. Mereka digunakan untuk membuat instance class tunggal yang tidak memerlukan nama class yang jelas. Anonymous class digunakan saat kita hanya membutuhkan class sederhana yang hanya akan digunakan sekali atau dalam konteks tertentu tanpa perlu mendefinisikan class terpisah secara eksplicit. Mereka sering digunakan dalam pengembangan aplikasi web untuk menggantikan class dengan implementasi sederhana atau untuk menerapkan polimorfisme dengan cepat.",
                'code' =>
                    "<?php

interface HelloWorld
{
    function sayHello(): void;
}

// biasanya
// class SampleHelloWorld implements HelloWorld{
//     public function sayHello(): void
//     {
//         echo \"Hello World\" . PHP_EOL;
//     }
// }
// \$helloWorld = new SampleHelloWorld();
// \$helloWorld->sayHello();

\$helloWorld = new class(\"Person 1\") implements HelloWorld{

    public string \$name;
    public function __construct(string \$name)
    {
        \$this->name = \$name;
    }

    public function sayHello(): void
    {
        echo \"Hello \$this->name\" . PHP_EOL;
    }
};

\$helloWorld->sayHello();
                ",
                'order_in_section' => 29
            ],
            [
                'section_id' => 2,
                'title' => 'Static Keyword',
                'description' => "Kata kunci \"static\" dalam PHP digunakan untuk mendefinisikan properti atau metode yang terkait dengan class itu sendiri, bukan dengan instance (objek) dari class tersebut. Properti atau metode statis dapat diakses tanpa perlu membuat instance class. Mereka berbagi nilai atau perilaku yang sama di seluruh instance class dan dapat diakses secara langsung menggunakan nama class tanpa perlu menggunakan objek. Kata kunci \"static\" memungkinkan untuk membuat kode yang lebih efisien dan mengurangi penggunaan memori dalam aplikasi PHP.",
                'code' =>
                    "<?php

class MathHelper
{
    // static property
    static public string \$name = \"MathHelper\";
    // static function
    static public function sum(int ...\$numbers): int{
        \$total = 0;
        foreach (\$numbers as \$number)
        {
            \$total += \$number;
        }
        return \$total;
    }
}

echo MathHelper::\$name . PHP_EOL;

\$total = MathHelper::sum(10,10,20,20);

echo \"Total \$total\" . PHP_EOL;
                ",
                'order_in_section' => 30
            ],
            [
                'section_id' => 2,
                'title' => 'Standard Class',
                'description' => "Standard class dalam PHP merujuk pada sebuah objek yang dibuat dari class bawaan PHP stdClass. Ini adalah objek standar yang tidak memiliki properti atau metode khusus yang didefinisikan di dalamnya. Objek stdClass sering digunakan sebagai wadah untuk data yang diperoleh secara dinamis atau untuk menyimpan hasil query dari database ketika struktur data tidak diketahui sebelumnya. Objek stdClass memungkinkan fleksibilitas dalam manipulasi data tanpa harus mendefinisikan class khusus.",
                'code' =>
                    "<?php

\$arr = [
    \"firstName\" => \"Person 1\",
    \"midName\" => \"Person 2\",
    \"LastName\" => \"Person 3\"
];

\$object = (object)\$arr;

var_dump(\$object);

echo \$object->firstName . PHP_EOL;
echo \$object->midName . PHP_EOL;
echo \$object->LastName . PHP_EOL;

\$data = (array)\$object;
var_dump(\$data);
                ",
                'order_in_section' => 31
            ],
            [
                'section_id' => 2,
                'title' => 'Object Iteration',
                'description' => "Object Iteration adalah proses melintasi atau mengulangi objek dalam PHP. Ini berarti mengakses dan memanipulasi properti dan nilai dari objek. Dalam PHP, Anda dapat menggunakan foreach loop untuk melakukan iterasi melalui properti publik dari objek. Namun, jika Anda perlu mengakses properti yang bersifat private atau protected, Anda harus menggunakan metode lain seperti getter untuk mendapatkan nilai tersebut. Iterasi objek berguna dalam pemrosesan data dinamis yang mungkin bervariasi dalam struktur dan jumlah propertinya.",
                'code' =>
                    "<?php

class Data implements IteratorAggregate
{
    var string \$username = \"Person 1rhmtkbr\";
    public string \$password = \"rahasia\";
    protected string \$country = \"Indonesia\";

    // Iterator

    public function getIterator(): Iterator
    {
       \$array = [
        \"username\" => \$this->username,
        // \"password\" => \$this->password,
        \"country\" => \$this->country,
       ];

       \$iterator = new ArrayIterator(\$array);
       return \$iterator;
    }
}

// Object Iteration using foreach
\$data = new Data();
foreach (\$data as \$key => \$value) {
    echo \"\$key : \$value\" . PHP_EOL;
}
                ",
                'order_in_section' => 32
            ],
            [
                'section_id' => 2,
                'title' => 'Generator',
                'description' => "Generator dalam PHP adalah fungsi khusus yang memungkinkan pembuatan iterator secara dinamis. Mereka menghasilkan serangkaian nilai dengan cara yang efisien, memungkinkan iterasi melalui data tanpa perlu menyimpan semua nilai dalam memori secara bersamaan. Generator menggunakan pernyataan \"yield\" untuk mengembalikan nilai secara bertahap selama iterasi. Dengan menggunakan generator, Anda dapat menghemat memori dan meningkatkan kinerja dalam situasi di mana Anda perlu menghasilkan serangkaian nilai yang besar secara bertahap.",
                'code' =>
                    "<?php

// tanpa yield
function getGenap(int \$max): Iterator
{
    \$arr = [];

    for (\$i = 1; \$i <= \$max; \$i++) {
        if (\$i % 2 == 0) {
            \$arr[] = \$i;
        }
    }

    return new ArrayIterator(\$arr);
}

foreach (getGenap(10) as \$value) {
    echo \"Genap : \$value\" . PHP_EOL;
}

// menggunakan generator berupa yield
function getGanjil(int \$max): Iterator
{
    for (\$i = 1; \$i <= \$max; \$i++) {
        if (\$i % 2 == 1) {
            yield \$i;
        }
    }
}
foreach (getGanjil(10) as \$value) {
    echo \"Genap : \$value\" . PHP_EOL;
}


class Example implements IteratorAggregate
{
    var string \$username = \"Person 1rhmtkbr\";
    public string \$password = \"rahasia\";
    protected string \$country = \"Indonesia\";

    function getIterator(): Iterator
    {

        yield \"username\" => \$this->username;
        yield \"password\" => \$this->password;
        yield \"country\" => \$this->country;
    }
}

\$Example = new Example();

foreach (\$Example as \$property => \$value){
    echo \"\$property : \$value\" . PHP_EOL;
}
                ",
                'order_in_section' => 33
            ],
            [
                'section_id' => 2,
                'title' => 'Object Cloning',
                'description' => "Object cloning dalam PHP adalah proses membuat salinan independen dari sebuah objek. Ini memungkinkan Anda untuk membuat duplikat dari objek yang ada, yang memiliki nilai yang sama namun merupakan instance yang terpisah. Dalam PHP, Anda dapat melakukan cloning objek dengan menggunakan kata kunci \"clone\". Setelah objek di-clone, Anda dapat mengubah properti di salinan tanpa memengaruhi objek aslinya. Namun, perlu diingat bahwa jika objek tersebut memiliki properti yang merupakan referensi ke objek lain, maka perubahan pada properti tersebut akan berdampak pada kedua objek.",
                'code' =>
                    "<?php

class Student
{
    public int \$id;
    public string \$name;
    public int \$value;
    private string \$sample;

    public function setSample(string \$sample): void
    {
        \$this->sample = \$sample;
    }

    public function __clone()
    {
        // untuk menghapus beberapa yang tidak ingin kita klone
        unset(\$this->sample);
    }
}

\$student1 = new Student();
\$student1->id = \"1\";
\$student1->name = \"Person 1\";
\$student1->value = 100;
\$student1->setSample(\"100\");
var_dump(\$student1);

\$student2 = clone \$student1;
var_dump(\$student2);

// mengkloning / menggunakan function __clone()
// dari \$student1 => pengen clone \$student2 => setelah \$student2 ke clone => baru panggil function __clone()
                ",
                'order_in_section' => 34
            ],
            [
                'section_id' => 2,
                'title' => 'Comparing Object',
                'description' => "Membandingkan objek dalam PHP melibatkan perbandingan nilai dan struktur objek untuk menentukan kesamaan. Dalam PHP, Anda dapat menggunakan operator perbandingan seperti == atau === untuk membandingkan objek. Operator == memeriksa kesamaan nilai antara dua objek, sementara operator === memeriksa identitas objek (jika mereka merujuk ke lokasi memori yang sama). Namun, perlu diingat bahwa perbandingan objek secara default membandingkan referensi ke objek, bukan nilai properti mereka. Untuk membandingkan nilai properti objek, Anda perlu mengimplementasikan metode khusus, seperti __toString() atau __equals().",
                'code' =>
                    "<?php

class Student
{
    public int \$id;
    public string \$name;
    public int \$value;
    private string \$sample;

    public function setSample(string \$sample) :void
    {
        \$this->sample = \$sample;
    }

}

\$student1 = new Student();
\$student1->id = \"1\";
\$student1->name = \"Person 1\";
\$student1->value = 100;
\$student1->setSample(\"100\");

\$student2 = new Student();
\$student2->id = \"1\";
\$student2->name = \"Person 1\";
\$student2->value = 100;
\$student2->setSample(\"100\");

// menggunakan equals
var_dump(\$student1 == \$student2); // hasilnya true
// menggunakan identity
var_dump(\$student1 === \$student2); // hasilnya false karena walaupun propertynya sama tapi secara penyimpanan lokasi memori objeknya berbeda
var_dump(\$student1 === \$student1);
                ",
                'order_in_section' => 35
            ],
            [
                'section_id' => 2,
                'title' => 'Magic Function',
                'description' => "Magic functions dalam PHP adalah metode khusus yang memiliki nama yang diawali dan diakhiri dengan dua garis bawah (__) dan secara otomatis dipanggil dalam situasi tertentu. Contoh magic functions termasuk __construct() untuk konstruktor, __destruct() untuk destruktor, __get() untuk mengakses properti yang tidak ada, __set() untuk menetapkan nilai properti yang tidak ada, dan lain-lain. Magic functions memberikan fleksibilitas tambahan dalam pengelolaan objek dan perilaku kelas dalam PHP.",
                'code' =>
                    "<?php

class Student
{
    public string \$id;
    public string \$name;
    public int \$value;

    // Example magic function __toString
    // otomatis kepanggil
    public function __toString(): string
    {
        return \"Student id:\$this->id, name:\$this->name, value:\$this->value\";
    }
    // kalo gak ada.. ya gak bisa / error

    // Example magic function __invoke()
    public function __invoke(...\$arguments): void
    {
        \$join = join(\",\", \$arguments);
        echo \"Invoke Student with arguments \$join\" . PHP_EOL;
    }
    // Example magic function __debugInfo()
    public function __debugInfo()
    {
        return [
            \"id\" => \$this->id,
            \"name\" => \$this->name,
            \"value\" => \$this->value,
            \"author\" => \"Person 1 Person 2 Person 3\"
            // loh kok ada author, padahal kan di properties gak ada.. itulah kegunaan dari debugInfo()
        ];
    }

}

\$student1 = new Student();
\$student1->id = \"1\";
\$student1->name = \"Person 2\";
\$student1->value = 100;

// penerapan magic function __toString
\$string = (string) \$student1;
echo \$string . PHP_EOL;

// penerapan magic function __invoke
\$student1(\"Person 1\", 100, true) . PHP_EOL;

// penerapan magic function __debugInfo
var_dump(\$student1);
                ",
                'order_in_section' => 36
            ],
            [
                'section_id' => 2,
                'title' => 'Overloading',
                'description' => "Overloading dalam PHP mengacu pada kemampuan untuk mendefinisikan perilaku dinamis untuk properti atau metode pada saat runtime. Ini dapat terjadi dalam dua konteks: overloading properti dan overloading metode.

                Overloading properti: Dalam PHP, Anda dapat mendefinisikan metode __get() dan __set() yang akan dipanggil ketika mencoba mengakses atau menetapkan properti yang tidak didefinisikan secara eksplisit.

                Overloading metode: Ini melibatkan penggunaan metode khusus seperti __call() dan __callStatic() untuk menangani pemanggilan metode yang tidak didefinisikan secara eksplisit dalam class.",
                'code' =>
                    "<?php

// class Zero
// {
//     private array \$properties = [];

//     // kalo ada prooperty, maka yang diutamakan yang ada propertynya
//     // public string \$firstname = \"Person 1\";

//     public function __get(\$name)
//     {
//         echo \"Access property \$name\" . PHP_EOL;
//     }

//     public function __set(\$name, \$value)
//     {
//         echo \"Set property \$name with value \$value\" . PHP_EOL;
//     }

//     public function __isset(\$name): bool
//     {
//         echo \"Isset \$name\";
//         return false;
//     }

//     public function __unset(\$name)
//     {
//         echo \"Unset \$name\";
//     }
// }

// \$Zero = new Zero();
// // Example __get
// echo \$Zero->firstname . PHP_EOL;
// // Example __set
// \$Zero->middlename = \"Person 1\" . PHP_EOL;
// // Example __isset
// isset(\$Zero->middlename) . PHP_EOL;
// // Example __unset
// unset(\$Zero->middlename);



// Example PROPERTIES OVERLOADING
// class Zero
// {
//     private array \$properties = [];

//     // kalo ada prooperty, maka yang diutamakan yang ada propertynya
//     // public string \$firstname = \"Person 1\";

//     public function __get(\$name)
//     {
//         return \$this->properties[\$name];
//     }

//     public function __set(\$name, \$value)
//     {
//         \$this->properties[\$name] = \$value;
//     }

//     public function __isset(\$name): bool
//     {
//         return isset(\$this->properties[\$name]);
//     }

//     public function __unset(\$name)
//     {
//         unset(\$this->properties[\$name]);
//     }
// }

// \$Zero = new Zero();
// \$Zero->firstname = \"Person 1\";
// \$Zero->middlename = \"Person 2\";
// \$Zero->lastname = \"Person 3\";

// echo \"First Name : \$Zero->firstname\" . PHP_EOL;
// echo \"Middle Name : \$Zero->middlename\" . PHP_EOL;
// echo \"Last Name : \$Zero->lastname\" . PHP_EOL;




// Example FUNCTION OVERLOADING
class Zero
{
    private array \$properties = [];

    // kalo ada prooperty, maka yang diutamakan yang ada propertynya
    // public string \$firstname = \"Person 1\";

    public function __get(\$name)
    {
        return \$this->properties[\$name];
    }

    public function __set(\$name, \$value)
    {
        \$this->properties[\$name] = \$value;
    }

    public function __isset(\$name): bool
    {
        return isset(\$this->properties[\$name]);
    }

    public function __unset(\$name)
    {
        unset(\$this->properties[\$name]);
    }

    public function __call(\$name, \$arguments)
    {
        \$join = join(\",\", \$arguments);
        echo \"Call function \$name with arguments \$join\" . PHP_EOL;
    }

    public static function __callStatic(\$name, \$arguments)
    {
        \$join = join(\",\", \$arguments);
        echo \"Call static function \$name with arguments \$join\" . PHP_EOL;
    }
}

\$Zero = new Zero();
\$Zero->firstname = \"Person 1\";
\$Zero->middlename = \"Person 2\";
\$Zero->lastname = \"Person 3\";
echo \"First Name : \$Zero->firstname\" . PHP_EOL;
echo \"Middle Name : \$Zero->middlename\" . PHP_EOL;
echo \"Last Name : \$Zero->lastname\" . PHP_EOL;

// Sebenarnya kan function sayHello tidak ada.. nah dia langsung menerapkan function __call
\$Zero->sayHello(\"Person 1\", \"Person 2\");
// Penerapan pada function yang static
\$Zero::sayHello(\"Person 1\", \"Person 2\");
                ",
                'order_in_section' => 37
            ],
            [
                'section_id' => 2,
                'title' => 'Covariance and Contravariance',
                'description' => "Covariance dan contravariance adalah konsep dalam pemrograman berorientasi objek yang berkaitan dengan tipe parameter dan nilai kembalian dalam hierarki turunan class.

                Covariance: Dalam covariance, tipe kembalian dari metode yang diwarisi dari class turunan dapat diperluas ke tipe yang lebih spesifik. Ini berarti bahwa class turunan dapat mengembalikan subkelas dari tipe yang didefinisikan oleh superclassnya.

                Contravariance: Dalam contravariance, tipe parameter dari metode yang diwarisi dari class turunan dapat diperluas ke tipe yang lebih umum. Ini berarti bahwa class turunan dapat menerima parameter yang merupakan superclass dari tipe yang didefinisikan oleh superclassnya.

                Dengan menggunakan covariance dan contravariance, Anda dapat meningkatkan fleksibilitas dalam desain class dan memperkuat kontrak tipe dalam pemrograman berorientasi objek.",
                'code' =>
                    "<?php

// === COVARIANCE START ===
// Covariance mengembalikan data yang lebih spesific dari parent ke child
// namespace Data\satu {
//     abstract class Animal
//     {
//         public string \$name;

//         abstract public function Hello(): void;
//     }

//     class Cat extends Animal
//     {
//         public function Hello(): void
//         {
//             echo \"Hello \$this->name\" . PHP_EOL;
//         }
//     }

//     class Dog extends Animal
//     {
//         public function Hello(): void
//         {
//             echo \"Hello \$this->name\";
//         }
//     }

//     interface AnimalShelter
//     {
//         function adopt(string \$name): Animal;
//     }

//     class DogShelter implements AnimalShelter
//     {
//         function adopt(string \$name): Dog
//         {
//             \$dog = new Dog();
//             \$dog->name = \$name;
//             return \$dog;

//         }
//     }

//     class CatShelter implements AnimalShelter
//     {
//         function adopt(string \$name): Cat
//         {
//             \$cat = new Cat();
//             \$cat->name = \$name;
//             return \$cat;
//         }
//     }
// }

// namespace {
//     \$catShelter = new \Data\satu\CatShelter();
//     \$cat = \$catShelter->adopt(\"Luna\");
//     \$cat->Hello();

//     \$dogShelter = new \Data\satu\DogShelter();
//     \$dog = \$dogShelter->adopt(\"Lina\");
//     \$dog->Hello();
// }

// === COVARIANCE END ===


// === CONTRAVARIANCE START ===
// Covariance mengembalikan data yang lebih spesific dari child ke parent
namespace Data\Dua {
    class Food
    {
    }

    class AnimalFood extends Food
    {
    }

    abstract class Animal
    {
        public string \$name;

        public abstract function Hello(): void;

        public abstract function eat(AnimalFood \$food);
    }

    class Cat extends Animal
    {
        public function Hello(): void
        {
            echo \"Hello \$this->name\" . PHP_EOL;
        }

        public function eat(AnimalFood \$animalFood)
        {
            echo \"Cat is eating\" . PHP_EOL;
        }
    }

    class Dog extends Animal
    {
        public function Hello(): void
        {
            echo \"Hello \$this->name\" . PHP_EOL;
        }

        public function eat(Food \$animalFood)
        {
            echo \"Dog is eating food\" . PHP_EOL;
        }
    }

    interface AnimalShelter
    {
        function adopt(string \$name): Animal;
    }

    class DogShelter implements AnimalShelter
    {
        function adopt(string \$name): Dog
        {
            \$dog = new Dog();
            \$dog->name = \$name;
            return \$dog;
        }
    }

    class CatShelter implements AnimalShelter
    {
        function adopt(string \$name): Cat
        {
            \$cat = new Cat();
            \$cat->name = \$name;
            return \$cat;
        }
    }
}

namespace {
    \$catShelter = new \Data\Dua\CatShelter();
    \$cat = \$catShelter->adopt(\"Luna\");
    \$cat->Hello();
    \$cat->eat(new \Data\Dua\AnimalFood());

    \$dogShelter = new \Data\Dua\DogShelter();
    \$dog = \$dogShelter->adopt(\"Lina\");
    \$dog->Hello();
    \$dog->eat(new \Data\Dua\Food());
}

// === CONTRAVARIANCE END ===
                ",
                'order_in_section' => 38
            ],
            [
                'section_id' => 2,
                'title' => 'Date and Time',
                'description' => "Date and time dalam PHP dapat diatur, dimanipulasi, dan ditampilkan menggunakan berbagai fungsi bawaan PHP yang disediakan oleh ekstensi DateTime. Ini termasuk untuk membuat objek DateTime, menyesuaikan format tampilan tanggal dan waktu, menambahkan atau mengurangkan interval waktu, serta melakukan operasi pembandingan dan perhitungan antara tanggal dan waktu. Fungsi-fungsi ini memungkinkan untuk mengelola dan memanipulasi tanggal dan waktu dengan mudah dalam pengembangan aplikasi PHP.",
                'code' =>
                    "<?php

// Date Time
\$dateTime = new DateTime();
\$dateTime->setDate(2000, 3, 25);
\$dateTime->setTime(10, 10, 10, 0);
var_dump(\$dateTime);

// Date Interval menggunakan (add(DateInterval))
// tambah
\$dateTime->add(new DateInterval(\"P22Y\")); // P1Y artinya Periode 1 Tahun
var_dump(\$dateTime);
// kurang
\$minusOneMonth = new DateInterval(\"P1M\");
\$minusOneMonth->invert = true;
\$dateTime->add(\$minusOneMonth);
var_dump(\$dateTime);

// cara rubah timezonenya
\$now = new DateTime();
\$now->setTimezone(new DateTimeZone(\"America/Toronto\"));
var_dump(\$now);

// formatnya
\$string = \$now->format(\"Y-m-d H:i:s\");
echo \"Waktu Saat Ini : \$string\" . PHP_EOL . PHP_EOL;

// parse datetime
\$date = DateTime::createFromFormat(\"Y-m-d H:i:s\", \"2000-03-25 10:10:10\", new DateTimeZone(\"Asia/Jakarta\"));
if (\$date) {
    var_dump(\$date);
} else {
    echo \"Format Salah\" . PHP_EOL;
}
                ",
                'order_in_section' => 39
            ],
            [
                'section_id' => 2,
                'title' => 'Exception',
                'description' => "Exception dalam PHP adalah objek yang mewakili keadaan atau kondisi yang tidak terduga atau tidak diinginkan yang terjadi selama eksekusi program. Ketika situasi seperti itu terjadi, PHP menghentikan eksekusi normal dan melemparkan (throw) objek exception. Exception dapat menunjukkan kesalahan, seperti kesalahan sintaksis, kesalahan runtime, atau kondisi khusus lainnya. Untuk menangani exception, Anda dapat menggunakan blok try-catch, yang memungkinkan Anda menangkap dan merespons exception dengan cara tertentu untuk mengatasi situasi yang terjadi.",
                'code' =>
                    "<?php

class ValidationException extends Exception
{
}

class LoginRequest{
    public string \$username;
    public string \$password;
}

function validateLoginRequest(LoginRequest \$loginRequest)
{
    if (!isset(\$loginRequest->username)) {
        throw new ValidationException(\"Username is null\");
    } else if (!isset(\$loginRequest->password)) {
        throw new ValidationException(\"Password is null\");
    } else if (\$loginRequest->username == \"\") {
        throw new Exception(\"Username is blank\");
    } elseif (\$loginRequest->password == \"\") {
        throw new Exception(\"Password is blank\");
    }
}


// \$loginRequest = new LoginRequest();
// // \$loginRequest->username = \"admin\";
// // \$loginRequest->password = \"admin\";
// validateLoginRequest(\$loginRequest);

// menggunakan try catch bagian 1 tanpa digabungin
// \$loginRequest = new LoginRequest();
// \$loginRequest->username = \"\";
// \$loginRequest->password = \"\";


// try{
//     validateLoginRequest(\$loginRequest);
// } catch (ValidationException \$exception) {
//     echo \"Validation Error : {\$exception->getMessage()}\" . PHP_EOL;
// } catch (Exception \$exception) {
//     echo \"Validation Error : {\$exception->getMessage()}\" . PHP_EOL;
// }
// echo \"Valid\" . PHP_EOL;



// menggunakan try catch bagian 2 digabungin
// \$loginRequest = new LoginRequest();
// \$loginRequest->password = \"\";

// try{
//     validateLoginRequest(\$loginRequest);
// } catch (ValidationException | Exception \$exception) {
//     echo \"Error : {\$exception->getMessage()}\" . PHP_EOL;
// }
// echo \"Valid\" . PHP_EOL;



// finally
// \$loginRequest = new LoginRequest();
// \$loginRequest->password = \"\";

// try{
//     validateLoginRequest(\$loginRequest);
//     echo \"Valid\" . PHP_EOL;
// } catch (ValidationException | Exception \$exception) {
//     echo \"Error : {\$exception->getMessage()}\" . PHP_EOL;
// } finally {
//     echo \"ERROR ATAU ENGGAK, TETAP AKAN DIEKSEKUSI\" . PHP_EOL;
// }



// debug exeption
\$loginRequest = new LoginRequest();
\$loginRequest->password = \"\";


try{
    validateLoginRequest(\$loginRequest);
    echo \"Valid\" . PHP_EOL;
} catch (ValidationException | Exception \$exception) {
    echo \"Error : {\$exception->getMessage()}\" . PHP_EOL;
    var_dump(\$exception->getTrace());

    echo \$exception->getTraceAsString() . PHP_EOL;
} finally {
    echo \"ERROR ATAU ENGGAK, TETAP AKAN DIEKSEKUSI\" . PHP_EOL;
}
                ",
                'order_in_section' => 40
            ],
            [
                'section_id' => 2,
                'title' => 'Regular Expression',
                'description' => "Regular expression (regex) dalam PHP adalah urutan karakter yang membentuk pola pencarian teks. Mereka digunakan untuk mencocokkan, mencari, dan memanipulasi teks berdasarkan pola tertentu. PHP menyediakan fungsi-fungsi seperti preg_match(), preg_replace(), dan preg_split() untuk bekerja dengan regular expression. Dengan regex, Anda dapat melakukan pencarian pola seperti mencocokkan karakter tertentu, menemukan atau mengganti kata-kata, memvalidasi format alamat email, dan banyak lagi. Penggunaan regular expression memungkinkan untuk pemrosesan teks yang lebih kuat dan fleksibel dalam aplikasi PHP.",
                'code' =>
                    "<?php

// untuk mencari potongan kata
\$matches = [];
\$result = (bool)preg_match_all(\"/Person 1|awan|edy|joko/i\", \"Person 1 Person 2 Person 3\", \$matches);

var_dump(\$result);
var_dump(\$matches);

// untuk mengganti kata
\$result = preg_replace(\"/anjing|bangsat/i\", \"***\", \"dasar lu anjing, bangsat\");
// /i artinya incasesensitive
var_dump(\$result);

// untuk memotong
\$result = preg_split(\"/[\s,-]/\", \"Person 1 Person 2 Person 3 Programmer, Tes\");
// \s artinya spasi white space
// [\s,-] artinya kalo ada spasi koma atau strip maka akan dihapus karakter itu
var_dump(\$result);
                ",
                'order_in_section' => 41
            ],
            [
                'section_id' => 2,
                'title' => 'Reflection',
                'description' => "Reflection dalam PHP adalah kemampuan untuk memeriksa dan memanipulasi struktur kode PHP pada waktu eksekusi. Ini memungkinkan untuk mendapatkan informasi tentang class, properti, metode, dan parameter pada saat runtime. Dengan menggunakan reflection, Anda dapat melakukan hal-hal seperti membuat instance class dinamis, mengambil dan mengubah properti atau metode class, memeriksa tipe data, dan banyak lagi. Reflection digunakan untuk membuat alat analisis kode, kerangka kerja, dan debugging yang kuat dalam pengembangan aplikasi PHP.",
                'code' =>
                    "<?php

// Validation Tanpa Reflection
// class ValidationUtil
// {
//     static function validate(LoginRequest \$loginRequest){
//         if(!isset(\$loginRequest->username)){
//             throw new ValidationException(\"username is null\");
//         } else if (!isset(\$loginRequest->password)){
//             throw new ValidationException(\"password is null\");
//         }
//     }
// }

// class ValidationException extends Exception
// {
// }

// class LoginRequest{
//     public string \$username;
//     public string \$password;
// }

// class ValidationUtil
// {
//     static function validate(LoginRequest \$loginRequest){
//         if(!isset(\$loginRequest->username)){
//             throw new ValidationException(\"username is null\");
//         } else if (!isset(\$loginRequest->password)){
//             throw new ValidationException(\"password is null\");
//         }
//     }
// }

// \$request = new LoginRequest();
// ValidationUtil::validate(\$request);




// Validation dengan Reflection

class ValidationException extends Exception
{
}

class LoginRequest
{
    public ?string \$username;
    public ?string \$password;
}

class ValidationUtil
{
    static function validateReflection(\$request)
    {
        \$reflection = new ReflectionClass(\$request);
        // ReflectionClass bisa tahu classnya apa, bahkan property, function, constant dan semuanya.. jadi ReflectionClass itu bisa membaca struktur class/object pada saat aplikasinya sedang berjalan
        \$properties = \$reflection->getProperties(ReflectionProperty::IS_PUBLIC);
        // getProperties digunakan untuk mengambil semua data propery. ReflectionProperty::IS_PUBLIC artinya protperty yang diambil bertipe Public
        foreach (\$properties as \$property) {
            if (!\$property->isInitialized(\$request)) {
                throw new ValidationException(\"\$property->name is not set\");
            } else if (is_null(\$property->getValue(\$request))) {
                throw new ValidationException(\"\$property->name is null\");
            }
        }
    }
}
// \$request = new LoginRequest();
// \$request->username = \"user1\";
// \$request->password = \"user1\";

// ValidationUtil::validateReflection(\$request);
// keuntungan dari penggunaan reflection jadi tidak peduli lagi dengan classnya

// Example lain
class RegisterUserRequest
{
    public ?string \$name;
    public ?string \$address;
    public ?string \$email;
}
\$register = new RegisterUserRequest();
\$register->name = \"Person 1\";
\$register->address = \"Indonesia\";

ValidationUtil::validateReflection(\$register);
                ",
                'order_in_section' => 42
            ],
            [
                'section_id' => 3,
                'title' => 'Named Argument',
                'description' => "Named arguments dalam PHP adalah fitur yang memungkinkan Anda untuk meneruskan argumen ke sebuah fungsi atau metode dengan menentukan nama parameter yang sesuai dengan nilainya. Ini memungkinkan Anda untuk meneruskan argumen dalam urutan yang berbeda dari yang dideklarasikan dalam definisi fungsi, dan juga meningkatkan keterbacaan kode. Dengan menggunakan named arguments, Anda dapat lebih jelas dalam menentukan nilai yang diteruskan ke sebuah fungsi, terutama jika fungsi tersebut memiliki banyak parameter opsional atau parameter dengan nilai default. Ini adalah fitur yang diperkenalkan dalam PHP 8.0.",
                'code' =>
                    "<?php

class Example
{
    public function sayHello(string \$person1, string \$person2 = \"\", string \$person3): void{
        echo \"Hello \$person1 \$person2 \$person3\" . PHP_EOL;
    }
}

\$object1 = new Example();
// Tanpa namedArgument
\$object1->sayHello(\"Person 2\", \"Person 3\", \"Person 1\");
// \$object1->sayHello(\"Person 2\", \"Person 3\"); // ERROR kalo diphp 7 karna lastnya tidak ada

// Dengan namedArgument
\$object1->sayHello(first: \"Person 1\", middle: \"Person 2\", last: \"Person 3\");
\$object1->sayHello(first: \"Person 1\", last: \"Person 3\");
                ",
                'order_in_section' => 1
            ],
            [
                'section_id' => 3,
                'title' => 'Attribute',
                'description' => "Attribute dalam PHP adalah metadata yang ditempatkan di atas deklarasi class, properti, metode, parameter, atau fungsi. Mereka menyediakan informasi tambahan tentang elemen yang diberi atribut. Atribut memungkinkan Anda untuk menambahkan metadata yang menjelaskan atau memodifikasi perilaku elemen tertentu dalam kode. Mereka bisa digunakan untuk anotasi, validasi, dokumentasi, atau konfigurasi. Atribut didefinisikan dengan menggunakan sintaksis tertentu yang memungkinkan untuk menentukan nama atribut dan argumen atribut yang relevan. Atribut merupakan fitur yang diperkenalkan dalam PHP 8.0.",
                'code' =>
                    "<?php

// #[Attribute]
// class NotBlank {

// }

// class LoginRequest
// {
//     #[NotBlank]
//     public ?string \$username;

//     #[NotBlank]
//     public ?string \$password;
// }

// ===== membaca atrribute via reflection =====
// function validate(object \$object): void
// {
//     \$class = new ReflectionClass(\$object);
//     \$properties = \$class->getProperties();
//     foreach(\$properties as \$property) {
//         validateNotBlank(\$property, \$object);
//     }
// }

// function validateNotBlank(ReflectionProperty \$property, object \$object): void{
//     \$attributes = \$property->getAttributes(NotBlank::class); // artinya mendapatkan attributes notblanknya
//     if (count(\$attributes) > 0) {
//         if (!\$property->isInitialized(\$object)) {
//             throw new Exception(\"Property \$property->name is null\");
//         } if (\$property->getValue(\$object) == null) {
//             throw new Exception(\"Property \$property->name is null\");
//         }
//     }
// }

// \$request = new LoginRequest();
// \$request->username = \"Person 1\";
// \$request->password = null;
// validate(\$request);
// ===== membaca atrribute via reflection =====



// ===== Attribute Target =====
// #[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_PARAMETER)]
// class TidakKosong {

// }
// ===== Attribute Target =====



// ===== Attribute Class =====
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_PARAMETER)]
class Length
{
    public int \$min;
    public int \$max;

    public function __construct(int \$min, int \$max)
    {
        \$this->min = \$min;
        \$this->max = \$max;
    }
}

#[Attribute]
class NotBlank
{
}

class LoginRequest
{
    #[NotBlank]
    #[Length(min: 4, max: 10)] // 4,10
    public ?string \$username;

    #[Length(min: 8, max: 10)]
    #[NotBlank]
    public ?string \$password;
}

function validate(object \$object): void
{
    \$class = new ReflectionClass(\$object);
    \$properties = \$class->getProperties();
    foreach (\$properties as \$property) {
        validateNotBlank(\$property, \$object);
        validateLength(\$property, \$object);
    }
}

function validateNotBlank(ReflectionProperty \$property, object \$object): void
{
    \$attributes = \$property->getAttributes(NotBlank::class); // artinya mendapatkan attributes notblanknya
    if (count(\$attributes) > 0) {
        if (!\$property->isInitialized(\$object)) {
            throw new Exception(\"Property \$property->name is null\");
        }
        if (\$property->getValue(\$object) == null) {
            throw new Exception(\"Property \$property->name is null\");
        }
    }
}

function validateLength(ReflectionProperty \$property, object \$object): void
{
    if (!\$property->isInitialized(\$object) || \$property->getValue(\$object) == null)
        return; // cancel validation

    \$value = \$property->getValue(\$object);
    \$attributes = \$property->getAttributes(Length::class);
    foreach (\$attributes as \$attribute) {
        \$length = \$attribute->newInstance(); // otomatis akan membikin si object length
        \$valueLength = strlen(\$value);
        if (\$valueLength < \$length->min)
            throw new Exception(\"Property \$property->name size is too short\");
        if (\$valueLength > \$length->max)
            throw new Exception(\"Property \$property->name size is too long\");
    }
}

\$request = new LoginRequest();
\$request->username = \"Person 1\";
\$request->password = \"Person 2\";// ERROR TO SHORT, knp karena Length(min: 8, max: 10)
validate(\$request);
                ",
                'order_in_section' => 2
            ],
            [
                'section_id' => 3,
                'title' => 'Constructor Property Promotion',
                'description' => "Constructor property promotion adalah fitur yang diperkenalkan dalam PHP 8.0. Fitur ini memungkinkan untuk mendeklarasikan dan menginisialisasi properti secara langsung di dalam deklarasi konstruktor, tanpa perlu mendefinisikan properti secara terpisah. Ini mempersingkat sintaksis dan membuat kode lebih ringkas. Dengan menggunakan constructor property promotion, Anda dapat secara langsung menentukan visibilitas dan menerapkan properti pada saat membuat konstruktor, sehingga memperbaiki keterbacaan dan meningkatkan efisiensi dalam pengembangan aplikasi PHP.",
                'code' =>
                    "<?php

// === CARA LAMA ===
// class Product
// {
//     public string \$id;
//     public string \$name;
//     public int \$price;
//     public int \$quantity;

//     public function __construct(string \$id, string \$name, int \$price, int \$quantity)
//     {
//         \$this->id = \$id;
//         \$this->name = \$name;
//         \$this->price = \$price;
//         \$this->quantity = \$quantity;
//     }
// }



// === CARA BARU ===
class Product
{
    public function __construct(public string \$id,
                                public string \$name = \"Person 1\",
                                public int \$price,
                                public int \$quantity = 0,
                                private bool \$expensive = false)
    {
    }
}

\$product = new Product(id: \"1\",price: 15000);
var_dump(\$product);

                ",
                'order_in_section' => 3
            ],
            [
                'section_id' => 3,
                'title' => 'Union Types',
                'description' => "Union types adalah fitur yang diperkenalkan dalam PHP 8.0. Fitur ini memungkinkan untuk menentukan lebih dari satu tipe data yang diperbolehkan sebagai argumen atau nilai kembalian dalam deklarasi fungsi, metode, atau lambda function. Ini memungkinkan Anda untuk menentukan bahwa parameter atau nilai kembalian dapat menerima nilai dari salah satu dari beberapa tipe yang ditentukan. Misalnya, Anda dapat mendeklarasikan bahwa sebuah parameter dapat menerima nilai yang merupakan integer atau string. Union types memungkinkan untuk meningkatkan fleksibilitas dan dokumentasi kode dalam pengembangan aplikasi PHP.",
                'code' =>
                    "<?php

class Example
{
    public string|int|bool|array \$data;

}

\$example = new Example();
\$example->data = \"Person 1\";
echo \"Halo \$example->data\" . PHP_EOL;

\$example->data = 1;
echo \"Id anda : \$example->data\" . PHP_EOL;

\$example->data = true;
echo \"Example tipe data \$example->data\" . PHP_EOL;

\$example->data = [\"Person 1\"];
var_dump(\$example);


// Union in function
function sampleFunctionUnion(string|array \$data): void{
    if (is_string(\$data)) {
        echo \"Argument is String\" . PHP_EOL;
    } else if (is_array(\$data)) {
        echo \"Argument is Array\" . PHP_EOL;
    }
}
sampleFunctionUnion(\"Hehe\");
sampleFunctionUnion([\"Person 1\"]);

// Union Type Return Value
function sampleFunctionRV(string|array \$data): string|array
{
    if (is_string(\$data)) {
        return \"Response String\";
    } else if (is_array(\$data)) {
        return [\"Respon Array\"];
    }
}

echo sampleFunctionRV(\"string\") . PHP_EOL;
var_dump(sampleFunctionRV([]));
                ",
                'order_in_section' => 4
            ],
            [
                'section_id' => 3,
                'title' => 'Match Expression',
                'description' => "Match expression adalah fitur baru yang diperkenalkan dalam PHP 8.0. Fitur ini mirip dengan switch statement, tetapi lebih ekspresif dan kuat. Match expression memungkinkan Anda untuk mengevaluasi ekspresi dan mencocokkannya dengan beberapa kasus atau pola, dan kemudian menjalankan kode yang sesuai dengan kasus yang cocok. Fitur ini memungkinkan penggunaan pola yang lebih luas, termasuk ekspresi logika, pengecekan tipe, penggunaan placeholder, dan lebih banyak lagi. Match expression adalah tambahan yang berguna untuk pengembangan aplikasi PHP dan dapat meningkatkan keterbacaan dan ekspresivitas kode.",
                'code' =>
                    "<?php

// Menggunakan Switch Statement
// saran : kalo kode programnya panjang
// \$value = \"A\";
// \$result = \"\";
// switch (\$value) {
//     case \"A\":
//     case \"B\":
//     case \"C\":
//         panjang
//         \$result = \"Anda Lulus\";
//         break;
//     case \"D\":
//         \$result = \"Anda tidak lulus\";
//         break;
//     case \"E\":
//         \$result = \"Sepertinya anda salah jurusan\";
//         break;
//     default:
//         \$result = \"Nilai apa itu?\";
// }

// echo \$result . PHP_EOL;

// === Menggunakan Match Expression ===
// saran : kalo kode programnnya sedikit / simple , lebih baik menggunakan match expression

// \$value = \"E\";

// --- menggunakan equals check ---
// \$result = match (\$value) {
//     \"A\", \"B\", \"C\" => \"Anda Lulus\",
//     \"D\" => \"Anda tidak lulus\",
//     \"E\" => \"Sepertinya Anda salah jurusan\",
//     default => \"Nilai apa itu?\"
// };

// echo \$result . PHP_EOL;

// --- menggunakan perbandingan ---
// \$value = 80;
// \$result = match (true) {
//     \$value >= 80 => \"A\",
//     \$value >= 70 => \"B\",
//     \$value >= 60 => \"C\",
//     \$value >= 50 => \"D\",
//     default => \"E\"
// };
// echo \$result . PHP_EOL;

// --- menggunakan kondisi --- mirip kayak if else
\$name = \"Mr. Person 1\";

\$result = match (true) {
    str_contains(\$name,  \"Mr.\") => \"Hello Sir\",
    str_contains(\$name, \"Mrs.\") => \"Hello Mam\",
    default => \"Hello\"
};

echo \$result . PHP_EOL;
                ",
                'order_in_section' => 5
            ],
            [
                'section_id' => 3,
                'title' => 'Nullsafe Operator',
                'description' => "Nullsafe operator adalah fitur yang diperkenalkan dalam PHP 8.0. Operator ini memungkinkan Anda untuk melakukan akses ke properti atau metode dari sebuah objek tanpa perlu memeriksa apakah objek tersebut bernilai null terlebih dahulu. Ini sangat berguna untuk mengatasi potensi kesalahan \"Null Pointer Exception\" dalam kasus di mana Anda ingin mengakses properti atau metode dari objek yang mungkin null. Dengan nullsafe operator, Anda dapat menulis kode dengan lebih singkat dan lebih aman, mengurangi boilerplate code yang berulang dan meningkatkan keterbacaan kode.",
                'code' =>
                    "<?php

class Address
{
    public ?String \$country;
}

class User
{
    public ?Address \$address;
}

// manual < version php <8
// function getCountry(?User \$user): ?string
// {
//     if (\$user != null) {
//         if (\$user->address != null) {
//             return \$user->address->country;
//         }
//     }
//     return null;
// }

// Nullsafe Operator
function getCountry(?User \$user): ?string
{
    return \$user?->address?->country;
}
                ",
                'order_in_section' => 6
            ],
            [
                'section_id' => 3,
                'title' => 'String to Number Comparison',
                'description' => "String to number comparison adalah proses membandingkan nilai string dengan nilai numerik dalam konteks perbandingan. Dalam PHP, ketika melakukan perbandingan antara string dan angka, PHP akan mencoba untuk mengonversi nilai string ke angka sebelum melakukan perbandingan.",
                'code' =>
                    "<?php

  comparison  | Before  | after
 0 == \"0\"     |  true   |  true
 0 == \"0.0\"   |  true   |  true
 0 == \"foo\"   |  true   |  false
 0 == \"\"      |  true   |  false
42 == \" 42\"   |  true   |  true
42 == \"42foo\" |  true   |  false
                ",
                'order_in_section' => 7
            ],
            [
                'section_id' => 3,
                'title' => 'Consistent Type Error',
                'description' => "Consistent type error dalam konteks PHP mungkin mengacu pada kesalahan yang terjadi ketika jenis data yang diberikan tidak sesuai dengan yang diharapkan dalam sebuah operasi atau fungsi. Misalnya, jika Anda mencoba menjalankan operasi matematika pada string, PHP akan menghasilkan consistent type error karena operasi tersebut hanya dapat dilakukan pada jenis data numerik.",
                'code' =>
                    "<?php

\$number = 10;
\$string = \"abc\";

\$result = \$number + \$string; // Consistent type error

strlen([]);
                ",
                'order_in_section' => 8
            ],
            [
                'section_id' => 3,
                'title' => 'Validation Function Overriding',
                'description' => "Validation function overriding mengacu pada praktik memperluas atau mengganti implementasi dari fungsi validasi yang ada dalam sebuah class turunan. Ini terjadi ketika sebuah class turunan memperluas fungsionalitas validasi yang diberikan oleh class induknya dengan menimpa (override) metode validasi tersebut.",
                'code' =>
                    "<?php

// ===== Example 1 =====
trait SampleTrait
{
    public abstract function sampleFunction(string \$name): string;
}

// kalo di php 7 gak ERROR
// class SampleTraitImpl
// {
//     use SampleTrait;

//     public function sampleFunction(int \$name): int
//     {

//     }
// }
// ===== Example 1 =====


// ===== Example 2 =====
class ParentClass
{
    public function method(array \$a)
    {

    }
}
// kalo di php 7 sih gak masalah, paling cuma keluar warning aja
// class ChildClass extends ParentClass
// {
//     public function method(int \$a)
//     {

//     }
// }
// ===== Example 2 =====

// ===== Example 3 =====

class Manager
{
    private function test(): void
    {

    }
}
// nah kalo diphp 7 yang kayak dibawah ini malahan error, kan aneh ya
class VicePresident extends Manager
{
    public function test(string \$name): string
    {
        return \"Hello\";
    }
}
                ",
                'order_in_section' => 9
            ],
            [
                'section_id' => 3,
                'title' => 'Mixed Type',
                'description' => "Mixed type dalam PHP adalah tipe data yang memungkinkan nilai dari jenis apa pun, termasuk nilai null. Tipe data mixed sering digunakan ketika kita ingin menerima argumen dengan tipe data yang tidak pasti atau ketika kita ingin menunjukkan bahwa fungsi dapat mengembalikan nilai dari berbagai jenis. Ini memberikan fleksibilitas dalam pengembangan, tetapi juga dapat menyebabkan kerugian jika tidak diperlakukan dengan hati-hati, karena dapat mengurangi kejelasan dan keamanan tipe dalam kode.

                Mixed type dalam PHP adalah tipe data yang dapat mewakili nilai dari berbagai jenis, termasuk tipe data primitif seperti integer, string, boolean, float, dan juga objek, array, atau null. Penggunaan mixed type memungkinkan sebuah variabel, parameter, atau nilai pengembalian untuk menerima atau mengembalikan nilai dari berbagai jenis, yang memberikan fleksibilitas dalam pengembangan aplikasi. Namun, karena sifatnya yang ambigu, penggunaan mixed type sebaiknya dibatasi dan digunakan dengan hati-hati agar tidak menyebabkan ketidakjelasan dalam kode.",
                'code' =>
                    "<?php

function testMixed(mixed \$param): mixed
{
    if (is_array(\$param)) {
        return [];
    } else if (is_string(\$param)) {
        return \"String\";
    } else if (is_numeric(\$param)) {
        return 1;
    } else {
        return null;
    }
}

var_dump(testMixed(\"hai\"));
                ",
                'order_in_section' => 10
            ],
            [
                'section_id' => 3,
                'title' => 'Comma Parameter List',
                'description' => "Comma parameter list adalah daftar parameter dalam sebuah fungsi yang dipisahkan oleh tanda koma (,). Ini adalah sintaksis yang umum digunakan dalam deklarasi fungsi di berbagai bahasa pemrograman, termasuk PHP. Dalam comma parameter list, setiap parameter dideklarasikan dengan menyebutkan tipe data dan nama parameternya, yang dipisahkan oleh koma. Ini memungkinkan untuk mendefinisikan dan menerima beberapa parameter dalam satu deklarasi fungsi, memfasilitasi pembacaan dan pemahaman kode.",
                'code' =>
                    "<?php

function sayHello(string \$first, string \$last)
{
    # code..

}

function sum(int... \$values)
{

}

sayHello(
    \"Person 1\",
    \"Person 3\"
);

sum(
    1,
);

// intinya fitur koma di php 8 ini, misal kalo kita bikin beberapa keperluan trus koma, nah koma yang paling akhir tidak perlu dihapus. kalo di php 7 kan harus dihapus
\$array = [
    \"first\" => \"Person 1\",
    \"second\" => \"Person 2\",
    \"third\" => \"Person 3\", // jadi komanya tidak perlu dihapus
];
                ",
                'order_in_section' => 11
            ],
            [
                'section_id' => 3,
                'title' => 'Non Capturing Catches',
                'description' => "Non-capturing catches adalah fitur yang diperkenalkan dalam PHP 8.0. Fitur ini memungkinkan untuk menangkap dan menangani exception tanpa perlu menetapkan nama variabel untuk exception tersebut. Sebelumnya, dalam blok catch, Anda harus menetapkan nama variabel untuk exception yang ditangkap, meskipun kadang-kadang nama variabel tersebut tidak digunakan. Dengan non-capturing catches, Anda dapat menggunakan blok catch tanpa menetapkan nama variabel, sehingga memungkinkan untuk menulis kode yang lebih bersih dan konsis.",
                'code' =>
                    "<?php

function validate(string \$name)
{
    if (trim(\$name) == \"\") {
        throw new Exception(\"Invalid Name\");
    }
}
// di php 7
// try {
//     validate(\"   \");
// } catch (Exception \$execption) {
//     echo \"Invalid name\" . PHP_EOL;
// }

// di php 8
try {
    validate(\"   \");
} catch (Exception   ) {
    echo \"Invalid name\" . PHP_EOL;
}
                ",
                'order_in_section' => 12
            ],
            [
                'section_id' => 3,
                'title' => 'Throw Exception',
                'description' => "Throw exception adalah istilah dalam pemrograman yang merujuk pada tindakan melemparkan (throwing) objek exception dalam sebuah program. Ini dilakukan ketika terjadi kondisi yang tidak terduga atau tidak diinginkan dalam eksekusi kode yang memerlukan penanganan khusus. Ketika sebuah exception dilemparkan, itu akan \"dilempar\" ke blok catch yang sesuai di dalam kode untuk ditangani. Proses ini memungkinkan untuk mengidentifikasi, menangani, dan merespons situasi yang tidak terduga dengan cara yang terstruktur dan kontrol. Dalam PHP, Anda dapat menggunakan pernyataan throw untuk melemparkan exception.",
                'code' =>
                    "<?php

\$name = \"Person 1\";
\$result = \$name == \"Person 1\" ? \"Success\" : throw new Exception(\"Ups\"); //nah kalo di php 7 tidak bisa, karena dianggapnya statement bukan expression

function validate(?string \$name)
{
    \$result = \$name ?? throw new Exception(\"Null\");
    echo \"Hello \$result\" . PHP_EOL;
}
validate(\$result);
                ",
                'order_in_section' => 13
            ],
            [
                'section_id' => 3,
                'title' => 'Allow Class on Object',
                'description' => "Pernyataan \"Allow Class on Object\" mungkin merujuk pada praktik atau konsep dalam pemrograman di mana sebuah class memungkinkan objek dari class lain untuk digunakan atau berinteraksi dengannya. Ini sering terjadi ketika sebuah class memiliki metode atau properti yang memungkinkan objek dari class lain untuk disimpan, dimanipulasi, atau digunakan dalam operasi tertentu.

                Dalam praktiknya, ini dapat diwujudkan melalui metode-metode dalam sebuah class yang menerima objek dari class lain sebagai parameter, atau melalui properti dalam sebuah class yang menampung referensi ke objek dari class lain. Ini adalah salah satu aspek dari konsep komposisi dalam pemrograman berorientasi objek, di mana objek dari satu class digunakan atau dimasukkan ke dalam objek dari class lain untuk mencapai fungsionalitas yang lebih kompleks.",
                'code' =>
                    "<?php

class Login
{

}

\$login = new Login();
// cara untuk mendapatkan nama class si Object login
var_dump(\$login::class); // cara baru di php 8
var_dump(get_class(\$login)); // php 7
var_dump(Login::class); // tidak disarankan php 7 harus tau dulu nama classnya
                ",
                'order_in_section' => 14
            ],
            [
                'section_id' => 3,
                'title' => 'Stringable Interface',
                'description' => "Stringable interface adalah sebuah antarmuka (interface) yang diperkenalkan dalam PHP 8.0. Interface ini merupakan antarmuka internal yang menandai bahwa sebuah objek dapat dikonversi menjadi string menggunakan metode casting atau konversi string (seperti (string) \$obj). Ketika sebuah class mengimplementasikan antarmuka Stringable, ini menandakan bahwa class tersebut memiliki metode __toString() yang akan mengembalikan nilai string.

                Dengan mengimplementasikan Stringable interface, sebuah class menjamin bahwa objeknya dapat dianggap sebagai string, yang dapat berguna dalam konteks pengolahan atau penanganan data dalam aplikasi PHP.",
                'code' =>
                    "<?php

function sayHello(Stringable \$stringable)
{
    echo \"Hello {\$stringable->__toString()}\" . PHP_EOL;
}

class Person{ // implements stringable itu tidak perlu
    public function __toString() : string
    {
        return \"Person\";
    }
}

sayHello(new Person());
                ",
                'order_in_section' => 15
            ],
            [
                'section_id' => 3,
                'title' => 'New String Function',
                'description' => "PHP secara teratur memperkenalkan perubahan dan peningkatan dalam pengelolaan string dalam setiap versi baru. Sebagai contoh, PHP 8.0 memperkenalkan beberapa perubahan string, seperti fitur \"match\" yang memungkinkan pencocokan pola string menggunakan sintaksis yang lebih ekspresif.",
                'code' =>
                    "<?php

var_dump(str_contains(\"Person 1 Person 2 Person 3\", \"Person 1\"));
var_dump(str_contains(\"Person 1 Person 2 Person 3\", \"Person 2\"));
var_dump(str_contains(\"Person 1 Person 2 Person 3\", \"Person 3\"));

var_dump(str_starts_with(\"Person 1 Person 2 Person 3\", \"Person 1\"));
var_dump(str_starts_with(\"Person 1 Person 2 Person 3\", \"Person 2\"));
var_dump(str_starts_with(\"Person 1 Person 2 Person 3\", \"Person 3\"));

var_dump(str_ends_with(\"Person 1 Person 2 Person 3\", \"Person 1\"));
var_dump(str_ends_with(\"Person 1 Person 2 Person 3\", \"Person 2\"));
var_dump(str_ends_with(\"Person 1 Person 2 Person 3\", \"Person 3\"));
                ",
                'order_in_section' => 16
            ],
            [
                'section_id' => 4,
                'title' => 'Connection',
                'description' => "Dalam konteks PHP dan MySQL, \"connection\" merujuk pada penghubung antara aplikasi PHP dan basis data MySQL. Connection ini memungkinkan PHP untuk berkomunikasi dengan MySQL, memungkinkan pengambilan data, penyimpanan, atau manipulasi data dalam basis data MySQL. Connection harus dibuat dengan menggunakan fungsi-fungsi yang disediakan oleh PHP, seperti mysqli_connect() atau PDO::__construct(), dan harus memuat informasi tentang server MySQL, nama pengguna, kata sandi, dan nama basis data yang ingin diakses oleh aplikasi PHP.",
                'code' =>
                    "<?php

// tanpa PDO
\$host = \"Localhost\";
\$port = 3306;
\$database = \"belajar_php_database \";
\$username = \"root\";
\$password = \"\";

// saran pake try catch biar tau errornya apa
try {
    \$connection = new PDO(\"mysql:host=\$host:\$port;dbname=\$database\", \$username, \$password);
echo \"Sukses terkoneksi ke database\" . PHP_EOL;

    // menutup koneksi
    \$connection = null;
} catch (PDOException \$exception) {
    echo \"ERROR terkoneksi ke database MySQL : \" . \$exception->getMessage() . PHP_EOL;
}

// dengan PDO
function getConnection()
{
    \$host = \"Localhost\";
    \$port = 3306;
    \$database = \"belajar_php_database\";
    \$username = \"root\";
    \$password = \"\";

    // saran pake try catch biar tau errornya apa

    return new PDO(\"mysql:host=\$host:\$port;dbname=\$database\", \$username, \$password);
}
                ",
                'order_in_section' => 1
            ],
            [
                'section_id' => 4,
                'title' => 'Execute SQL',
                'description' => "\"Execute SQL\" adalah istilah yang digunakan untuk menjalankan perintah SQL (Structured Query Language) terhadap sebuah basis data. Ini bisa berarti menjalankan perintah seperti SELECT untuk mengambil data, INSERT untuk memasukkan data baru, UPDATE untuk memperbarui data yang ada, atau DELETE untuk menghapus data dari tabel. Eksekusi SQL biasanya dilakukan menggunakan perangkat lunak atau platform yang mendukung SQL, seperti MySQL Workbench, phpMyAdmin, atau melalui kode program dalam bahasa seperti PHP, Python, atau Java yang menggunakan koneksi ke basis data.",
                'code' =>
                    "<?php

function getConnection()
{
    \$host = \"Localhost\";
    \$port = 3306;
    \$database = \"belajar_php_database\";
    \$username = \"root\";
    \$password = \"\";

    // saran pake try catch biar tau errornya apa

    return new PDO(\"mysql:host=\$host:\$port;dbname=\$database\", \$username, \$password);
}

\$sql = <<<SQL
    INSERT INTO `customers`(id, name, email)
    VALUES ('1', 'Person 1', Person 1@test.com);
    -- DELETE  FROM `customers`
    -- WHERE id = '1';
SQL;

\$connection->exec(\$sql);
\$connection = null;
                ",
                'order_in_section' => 2
            ],
            [
                'section_id' => 4,
                'title' => 'Query SQL',
                'description' => "Query SQL adalah perintah atau pernyataan yang digunakan untuk berinteraksi dengan basis data relasional. Query ini dapat digunakan untuk melakukan berbagai tugas, seperti pengambilan data, pembaruan data, penghapusan data, atau manipulasi struktur basis data. Contoh query SQL termasuk SELECT untuk mengambil data, INSERT untuk memasukkan data baru, UPDATE untuk memperbarui data yang ada, DELETE untuk menghapus data, dan pernyataan lain seperti CREATE TABLE untuk membuat tabel baru atau ALTER TABLE untuk mengubah struktur tabel yang ada. Query SQL menggunakan perintah-perintah dan klausa-klausa yang ditentukan dalam bahasa SQL untuk menentukan operasi yang ingin dilakukan terhadap basis data.",
                'code' =>
                    "<?php

function getConnection()
{
    \$host = \"Localhost\";
    \$port = 3306;
    \$database = \"belajar_php_database\";
    \$username = \"root\";
    \$password = \"\";

    // saran pake try catch biar tau errornya apa

    return new PDO(\"mysql:host=\$host:\$port;dbname=\$database\", \$username, \$password);
}

\$sql = \"SELECT id, name, email FROM customers\";
// \$sql = \"SELECT * FROM customers\";
\$result = \$conn->query(\$sql);

foreach (\$result as \$row){
    \$id = \$row[\"id\"];
    \$name = \$row[\"name\"];
    \$email = \$row[\"email\"];

    echo \"Id : \$id\" . PHP_EOL;
    echo \"Name : \$name\" . PHP_EOL;
    echo \"Email : \$email\" . PHP_EOL;
}

\$conn = null;
                ",
                'order_in_section' => 3
            ],
            [
                'section_id' => 4,
                'title' => 'SQL Injection',
                'description' => "SQL Injection adalah teknik serangan keamanan pada basis data yang bertujuan untuk memanipulasi atau merusak data dalam sebuah database. Serangan ini terjadi ketika input pengguna yang tidak diverifikasi atau tidak dibersihkan secara benar digunakan dalam perintah SQL. Penyerang dapat menyisipkan perintah SQL tambahan atau mengubah struktur perintah SQL yang ada untuk memanipulasi akses ke data, mengambil informasi sensitif, atau bahkan menghapus atau merusak data. Untuk mencegah SQL Injection, penting untuk menggunakan teknik parameterized queries, validasi input, dan pembatasan hak akses pengguna ke database.",
                'code' =>
                    "<?php

function getConnection()
{
    \$host = \"Localhost\";
    \$port = 3306;
    \$database = \"belajar_php_database\";
    \$username = \"root\";
    \$password = \"\";

    // saran pake try catch biar tau errornya apa

    return new PDO(\"mysql:host=\$host:\$port;dbname=\$database\", \$username, \$password);
}

// \$connection = getConnection();

// \$username = \"admin\";
// \$password = \"admin\";

// \$sql = \"SELECT * FROM `admin` WHERE username = '\$username' AND password = '\$password';\";

// \$statement = \$connection->query(\$sql);

// \$success = false;
// \$finduser = null;

// foreach (\$statement as \$row){
//     //sukses
//     \$success = true;
//     \$finduser = \$row[\"username\"];
// }

// if(\$success){
//     echo \"Sukses Login : \" . \$finduser . PHP_EOL;
// } else {
//     echo \"Gagal Login\" . PHP_EOL;
// }

// \$connection = null;


// === SQL Injection === permasalahan
// solusinya quote
require_once __DIR__ . '/2b GetConn.php';

\$connection = getConnection();

// before
// \$username = \"admin'; #\"; // loh kok bisa masuk, bahaya
// \$password = \"Salah gak peduli\"; // padahal passwordnya acak

// after
\$username = \$connection->quote(\"admin'; #\");
\$password = \$connection->quote(\"Salah gak peduli\");

\$sql = \"SELECT * FROM `admin` WHERE username = \$username AND password = \$password;\"; // tidak perlu ditambahkan '
// nah untuk pembuktian bahwa setelah '; # adalah komentar jadi passwordnya diabaikan, bisa jadi masalah intinya
// penanganannya bisa menggunakan function bawaan yaitu quote()
// fungsi quote sendiri ialah mengecek karakter karakter tidak lazim lalu dikasih backspace


echo \$sql . PHP_EOL;

\$statement = \$connection->query(\$sql);

\$success = false;
\$finduser = null;

foreach (\$statement as \$row){
    //sukses
    \$success = true;
    \$finduser = \$row[\"username\"];
}

if(\$success){
    echo \"Sukses Login : \" . \$finduser . PHP_EOL;
} else {
    echo \"Gagal Login\" . PHP_EOL;
}

\$connection = null;
                ",
                'order_in_section' => 4
            ],
            [
                'section_id' => 4,
                'title' => 'Prepare Statement',
                'description' => "Prepare Statement adalah fitur dalam banyak sistem manajemen basis data (DBMS) yang memungkinkan pengguna untuk menyiapkan sebuah pernyataan SQL sebelum menjalankannya secara efektif. Dalam konteks PHP, PDO (PHP Data Objects) dan MySQLi (MySQL Improved Extension) adalah dua cara umum untuk menggunakan Prepare Statement.

                Dengan Prepare Statement, pertama-tama Anda menyiapkan pernyataan SQL dengan menyediakan pernyataan template yang berisi tanda tanya (?) sebagai placeholder untuk parameter yang akan diisi nilai saat pernyataan dijalankan. Setelah pernyataan disiapkan, nilai-nilai parameter dapat diikat ke placeholder menggunakan metode tertentu yang disediakan oleh PDO atau MySQLi. Ini memungkinkan penggunaan parameterized queries, yang membantu mencegah serangan SQL Injection.",
                'code' =>
                    "<?php

function getConnection()
{
    \$host = \"Localhost\";
    \$port = 3306;
    \$database = \"belajar_php_database\";
    \$username = \"root\";
    \$password = \"\";

    // saran pake try catch biar tau errornya apa

    return new PDO(\"mysql:host=\$host:\$port;dbname=\$database\", \$username, \$password);
}

\$connection = getConnection();

\$username = \"admin\";
\$password = \"admin\";

// cara 1 binding dengan parameter atau index
// // \$sql = \"SELECT * FROM `admin` WHERE username = :param1 AND password = :param2\";
// \$sql = \"SELECT * FROM `admin` WHERE username = ? AND password = ?\";
// \$prepareStatement = \$connection->prepare(\$sql);
// // \$prepareStatement->bindParam(\"param1\", \$username);
// \$prepareStatement->bindParam(1, \$username);
// // \$prepareStatement->bindParam(\"param2\", \$password);
// \$prepareStatement->bindParam(2, \$password);
// \$prepareStatement->execute();

// cara 2
\$sql = \"SELECT * FROM `admin` WHERE username = ? AND password = ?\";
\$prepareStatement = \$connection->prepare(\$sql);
\$prepareStatement->execute([\$username, \$password]);

\$success = false;
\$finduser = null;
foreach (\$prepareStatement as \$row){
    //sukses
    \$success = true;
    \$finduser = \$row[\"username\"];
}

if(\$success){
    echo \"Sukses Login : \" . \$finduser . PHP_EOL;
} else {
    echo \"Gagal Login\" . PHP_EOL;
}

// cara 3 Untuk INSERT AJA
// \$connection = getConnection();

// \$username = \"Person 1\";
// \$password = \"Person 2\";

// \$sql = \"INSERT INTO `admin`(username, password) VALUES ( ? , ? )\";
// \$prepareStatement = \$connection->prepare(\$sql);
// \$prepareStatement->execute([\$username, \$password]);

\$connection = null;
                ",
                'order_in_section' => 5
            ],
            [
                'section_id' => 4,
                'title' => 'Fetch Data',
                'description' => "Untuk mengambil data dari basis data dalam PHP, Anda dapat menggunakan metode fetch setelah menjalankan pernyataan SQL. Dengan PDO, Anda bisa menggunakan \$stmt->fetch(PDO::FETCH_ASSOC) setelah menjalankan perintah. Sedangkan dengan MySQLi, Anda bisa menggunakan \$result->fetch_assoc(). Metode ini memungkinkan Anda untuk mendapatkan baris data satu per satu dan mengakses nilainya untuk digunakan dalam aplikasi PHP.",
                'code' =>
                    "<?php

function getConnection()
{
    \$host = \"Localhost\";
    \$port = 3306;
    \$database = \"belajar_php_database\";
    \$username = \"root\";
    \$password = \"\";

    // saran pake try catch biar tau errornya apa

    return new PDO(\"mysql:host=\$host:\$port;dbname=\$database\", \$username, \$password);
}

// === fetch() biasa ===
// \$username = \"admin\";
// \$password = \"admin\";

// \$sql = \"SELECT * FROM admin WHERE username = ? AND password = ?\";
// \$result = \$connnection->prepare(\$sql);
// \$result->execute([\$username, \$password]);

// if (\$row = \$result->fetch()) {
//     echo \"SUKSES LOGIN : \" . \$row[\"username\"] . PHP_EOL;
// } else {
//     echo \"GAGAL LOGIN\" . PHP_EOL;
// }
// var_dump(\$result->fetch());// hasilnya false karena sudah dipake ya fetchnya di if


// === fetch all() ===

\$sql = \"SELECT * FROM `customers`\";
\$result = \$connnection->query(\$sql);

\$customers = \$result->fetchAll();

var_dump(\$customers);

\$connnection = null;
                ",
                'order_in_section' => 6
            ],
            [
                'section_id' => 4,
                'title' => 'Auto Increment',
                'description' => "Auto Increment adalah fitur dalam basis data yang secara otomatis meningkatkan nilai kolom saat baris data baru dimasukkan ke dalam tabel. Fitur ini biasanya digunakan untuk kolom yang berfungsi sebagai primary key, memastikan bahwa setiap baris data memiliki nilai unik untuk identifikasi. Dengan Auto Increment, pengguna tidak perlu secara manual menetapkan nilai primary key saat memasukkan data baru, karena basis data akan secara otomatis menambahkan nilai yang unik dan berturut-turut setiap kali baris data baru dimasukkan. Ini membuat proses penyisipan data menjadi lebih efisien dan memastikan konsistensi data.",
                'code' =>
                    "<?php

function getConnection()
{
    \$host = \"Localhost\";
    \$port = 3306;
    \$database = \"belajar_php_database\";
    \$username = \"root\";
    \$password = \"\";

    // saran pake try catch biar tau errornya apa

    return new PDO(\"mysql:host=\$host:\$port;dbname=\$database\", \$username, \$password);
}

\$con = getConnection();

\$con->exec(\"INSERT INTO `comments`(email, komentar) VALUES('Person 1@test.com', 'hi')\");
\$id = \$con->lastInsertId();

var_dump(\$id);

\$con = null;
                ",
                'order_in_section' => 7
            ],
            [
                'section_id' => 4,
                'title' => 'Database Transaction',
                'description' => "Database Transaction adalah unit kerja logis yang terdiri dari satu atau beberapa pernyataan SQL yang membentuk satu tugas atau operasi. Transaksi memungkinkan untuk menjalankan serangkaian perintah SQL sebagai satu kesatuan yang tidak terpisahkan. Dalam transaksi, pernyataan dapat berhasil atau gagal. Jika semua pernyataan berhasil, transaksi dianggap berhasil dan perubahan di database diterapkan secara permanen. Namun, jika ada satu pernyataan yang gagal, transaksi akan dibatalkan, dan semua perubahan yang dilakukan oleh transaksi tersebut akan dikembalikan ke keadaan sebelum transaksi dimulai, sehingga memastikan konsistensi data.",
                'code' =>
                    "<?php

function getConnection()
{
    \$host = \"Localhost\";
    \$port = 3306;
    \$database = \"belajar_php_database\";
    \$username = \"root\";
    \$password = \"\";

    // saran pake try catch biar tau errornya apa

    return new PDO(\"mysql:host=\$host:\$port;dbname=\$database\", \$username, \$password);
}

\$connect = getConnection();

// === menggunakan commit ===

// \$connect->beginTransaction();

// // \$connect->exec(\"INSERT INTO `comments`(email, komentar) VALUES ('iam1@gmail.com', 'halo1')\");
// // \$connect->exec(\"INSERT INTO `comments`(email, komentar) VALUES ('iam2@gmail.com', 'halo2')\");
// // \$connect->exec(\"INSERT INTO `comments`(emails, komentar) VALUES ('iam3@gmail.com', 'halo3')\");
// // kode \$connect di atas 2 berhasil 1 gagal karena kesalahan nama kolom pada emails
// // jadi intinya walaupun yang 2nya berhasil data tetap tidak dapat di kirim ke database
// // itulah istimewanya transaction

// \$connect->commit();


// === menggunakan rollback() ===

\$connect->beginTransaction();

\$connect->exec(\"INSERT INTO `comments`(email, komentar) VALUES ('user1@gmail.com', 'halo1')\");
\$connect->exec(\"INSERT INTO `comments`(email, komentar) VALUES ('user2@gmail.com', 'halo2')\");
\$connect->exec(\"INSERT INTO `comments`(email, komentar) VALUES ('user3@gmail.com', 'halo3')\");

\$connect->rollBack(); //intinya untuk membatalkan jadi kosong gak ada yang masuk ke data base, cuma idnya aja yang kehitung tapi tetap gak ada

\$connect = null;
                ",
                'order_in_section' => 8
            ],

            [
                'section_id' => 5,
                'title' => 'Integrasi dengan HTML',
                'description' => "Intergrasi dalam konteks HTML dalam web PHP merujuk pada penyatuan elemen HTML dengan kode PHP. Hal ini memungkinkan untuk menyisipkan kode PHP ke dalam dokumen HTML untuk menghasilkan halaman web dinamis. Integrasi ini memungkinkan untuk menyusun konten dinamis seperti menampilkan data dari database, mengolah formulir, dan menghasilkan output yang berbeda berdasarkan kondisi tertentu. Dengan demikian, intergrasi HTML dalam PHP web memungkinkan pengembangan web yang dinamis dan responsif.",
                'code' =>
                    "<?php

\$title = \"Hello PHP dan HTML\";
\$body = \"Hello PHP dan HTML\";
?>

<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title><?= \$title; ?></title>
    <style>
        body{
            background-color: black;
            color: aliceblue;
        }
    </style>
</head>
<body>
    <?= \$body; ?>
</body>
</html>
                ",
                'order_in_section' => 1
            ],
            [
                'section_id' => 5,
                'title' => 'Global Variable SERVER',
                'description' => "Variabel global \$_SERVER dalam PHP merupakan salah satu dari beberapa variabel global bawaan yang menyediakan informasi mengenai server, lingkungan eksekusi, dan permintaan yang sedang dijalankan. Variabel ini berupa array asosiatif yang menyimpan informasi seperti alamat IP server, informasi tentang permintaan HTTP, dan konfigurasi server tertentu. \$_SERVER digunakan secara luas dalam pengembangan web PHP untuk mengakses informasi tentang lingkungan server yang sedang berjalan dan digunakan untuk berbagai tujuan, seperti mengidentifikasi pengguna, mengelola sesi, dan keperluan logging.",
                'code' =>
                    "<?php

<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>\$_SERVER</title>
</head>
<body>
<h1>\$_SERVER</h1>

<table border=\"1\">

    <?php foreach(\$_SERVER as \$key => \$value) : ?>
    <tr>
        <td><?= \$key ?></td>
        <td><?= \$value ?></td>
    </tr>
    <?php endforeach; ?>

</table>
</body>
</html>
                ",
                'order_in_section' => 2
            ],
            [
                'section_id' => 5,
                'title' => 'Query Parameter',
                'description' => "Query parameter adalah bagian dari URL yang digunakan untuk mengirimkan data tambahan ke halaman web atau aplikasi web. Mereka biasanya terdiri dari pasangan kunci-nilai yang dipisahkan oleh tanda tanya (?) dan dipisahkan satu sama lain oleh tanda ampersand (&).",
                'code' =>
                    "<?php

// query parameter array
\$numbers = \$_GET['numbers'];
\$total = 0;

foreach (\$numbers as \$number) {
    \$total += \$number;
}
?>

<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Test</title>
</head>
<body>
    <h1><?= \"Total = \$total\"; ?></h1>
</body>
</html>
                ",
                'order_in_section' => 3
            ],
            [
                'section_id' => 5,
                'title' => 'XSS Cross Site Scripting',
                'description' => "XSS (Cross-Site Scripting) adalah serangan keamanan pada aplikasi web di mana penyerang menyisipkan skrip berbahaya ke dalam halaman yang dilihat oleh pengguna. Dalam konteks PHP web, XSS sering terjadi ketika aplikasi tidak memvalidasi atau menyaring input yang diterima dari pengguna sebelum menampilkannya kembali ke halaman.

                Misalnya, jika aplikasi PHP menerima input teks dari pengguna dan menampilkannya kembali di halaman web tanpa menyaring atau memvalidasi, penyerang dapat menyisipkan skrip JavaScript yang berbahaya. Skrip ini kemudian dieksekusi oleh browser pengguna yang melihat halaman tersebut, memungkinkan penyerang untuk melakukan serangan seperti mencuri sesi pengguna, mengalihkan ke situs phishing, atau memanipulasi halaman web.

                Untuk mencegah XSS dalam PHP web, perlu dilakukan sanitasi input dengan cara menyaring atau melarang karakter-karakter berbahaya seperti tanda kutip, tag HTML, dan karakter khusus lainnya. Selain itu, menggunakan fungsi PHP seperti htmlspecialchars() untuk mengonversi karakter khusus menjadi entitas HTML juga merupakan praktik yang baik. Menggunakan kerangka kerja PHP yang terpercaya seperti Laravel atau Symfony juga dapat membantu mengurangi risiko XSS dengan menyediakan fitur keamanan bawaan.",
                'code' =>
                    "<?php
\$say = \"Hello \" . htmlspecialchars(\$_GET['first_name']) . ' ' . htmlspecialchars(\$_GET['last_name']);
?>

<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Test</title>
</head>
<body>
    <h1><?= \"Halo : \$say\" ; ?></h1>
</body>
</html>
                ",
                'order_in_section' => 4
            ],
            [
                'section_id' => 5,
                'title' => 'Form',
                'description' => "Dalam konteks PHP web, form digunakan untuk berbagai tujuan, termasuk pendaftaran pengguna, pengiriman pesan, pencarian data, dan banyak lagi. Form dapat dikirimkan menggunakan metode HTTP GET atau POST.

                Pada sisi server, PHP digunakan untuk memproses data yang dikirimkan melalui form. Data yang dikirimkan dapat diakses melalui variabel global seperti \$_GET atau \$_POST, tergantung pada metode pengiriman yang digunakan.

                Penting untuk memvalidasi dan menyaring data yang diterima dari form untuk mencegah serangan keamanan seperti XSS (Cross-Site Scripting) atau SQL Injection. Ini dapat dilakukan dengan menggunakan fungsi PHP seperti htmlspecialchars() untuk mencegah XSS, dan parameterisasi pertanyaan SQL untuk mencegah SQL Injection. Selain itu, validasi formulir juga penting untuk memastikan data yang diterima sesuai dengan format yang diharapkan.",
                'code' =>
                    "<html lang=\"en\">

<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>FORM POST</title>
</head>

<body>
    <?php if (\$_POST) : ?>
        <p><?= \$_POST['first_name'] ?></p>
        <p><?= \$_POST['last_name'] ?></p>
    <?php endif; ?>
    <form action=\"\" method=\"POST\">
        <label for=\"first_name\">first_name</label>
        <input type=\"text\" name=\"first_name\" id=\"first_name\">
        <br>
        <label for=\"last_name\">last_name</label>
        <input type=\"text\" name=\"last_name\" id=\"last_name\">
        <br>
        <button type=\"submit\">Submit</button>
    </form>
</body>

</html>
                ",
                'order_in_section' => 5
            ],
            [
                'section_id' => 5,
                'title' => 'Header',
                'description' => "Header dalam konteks pengembangan web merujuk pada bagian dari respons HTTP yang berisi informasi tambahan tentang permintaan atau respons. Header ini terdiri dari pasangan kunci-nilai dan digunakan untuk berbagai tujuan, seperti mengirimkan informasi tentang tipe konten, mengontrol cache, menentukan jenis autentikasi, mengarahkan ulang pengguna, dan banyak lagi.

                Dalam PHP, Anda dapat mengatur header menggunakan fungsi header(). ",
                'code' =>
                    "<?php

// Header Client
// \$client = \$_SERVER['HTTP_CLIENT_NAME'];

// Header Response
header('Aplication: Belajar Php Web');
header('Author: Person 1 Person 2 Person 3');

\$client = \$_SERVER['HTTP_CLIENT_NAME'];

echo \"Hello \$client\";
                ",
                'order_in_section' => 6
            ],
            [
                'section_id' => 5,
                'title' => 'Redirect',
                'description' => "Redirect adalah tindakan mengarahkan pengguna dari satu URL ke URL lainnya. Hal ini umumnya dilakukan untuk mengalihkan pengguna ke halaman yang lebih relevan atau untuk mengelola pengguna yang mengakses halaman yang telah dipindahkan. Dalam konteks pengembangan web PHP, Anda dapat menggunakan fungsi header() untuk melakukan redirect. Contohnya, untuk mengarahkan pengguna dari halaman A ke halaman B.",
                'code' =>
                    "<?php

// header('Location: /4 PHP Info.php');
header('Location: https://www.google.com');
exit();
                ",
                'order_in_section' => 7
            ],
            [
                'section_id' => 5,
                'title' => 'Response Code',
                'description' => "Response code, dalam konteks HTTP, adalah kode numerik yang digunakan oleh server web untuk memberikan informasi tentang status permintaan yang diterima oleh klien. Kode respons HTTP dibagi menjadi lima kelas, masing-masing mewakili berbagai jenis status. Beberapa contoh kode respons HTTP termasuk:

200 OK: Permintaan berhasil.
404 Not Found: Sumber daya yang diminta tidak ditemukan di server.
500 Internal Server Error: Terjadi kesalahan internal pada server saat memproses permintaan.
Dalam pengembangan web dengan PHP, Anda dapat mengatur kode respons HTTP menggunakan fungsi header() untuk memberi tahu klien tentang status permintaan yang dikirimkan oleh server. ",
                'code' =>
                    "<?php

if (!isset(\$_GET['name']) || \$_GET['name'] == \"\") {
    http_response_code(400);
    echo \"Name is Required\";
    exit();
}

\$say = \"Hello \" . htmlspecialchars(\$_GET['first_name']) . ' ' . htmlspecialchars(\$_GET['last_name']);
?>

<html lang=\"en\">

<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Test</title>
</head>

<body>
    <h1><?= \"Halo : \$say\"; ?></h1>
</body>

</html>
                ",
                'order_in_section' => 8
            ],
            [
                'section_id' => 5,
                'title' => 'Session',
                'description' => "Session adalah cara untuk menyimpan data pengguna di server antara beberapa permintaan halaman web. Dalam konteks pengembangan web PHP, sesi biasanya digunakan untuk melacak status masuk pengguna, preferensi, atau data lainnya. PHP menyediakan fungsi untuk memulai, menyimpan, dan menghapus sesi, serta mengakses data sesi. Contohnya, session_start() digunakan untuk memulai sesi, dan \$_SESSION variabel global digunakan untuk menyimpan dan mengakses data sesi di berbagai halaman web dalam aplikasi PHP.",
                'code' =>
                    "<?php

// Start the session
session_start();

// Set session variables
\$_SESSION['username'] = 'john_doe';
\$_SESSION['user_id'] = 12345;

// Access session variables
\$loggedInUser = \$_SESSION['username'];
\$userId = \$_SESSION['user_id'];

// Destroy the session when the user logs out
session_destroy();
?>
                ",
                'order_in_section' => 9
            ],
            [
                'section_id' => 5,
                'title' => 'Cookie',
                'description' => "Cookie adalah data kecil yang disimpan oleh browser web pada perangkat pengguna. Mereka digunakan untuk menyimpan informasi tentang pengguna dan sesi di antara permintaan halaman web. Dalam pengembangan web dengan PHP, cookie dapat diatur menggunakan fungsi setcookie() untuk menyimpan data seperti preferensi pengguna, identifikasi sesi, atau informasi lainnya. Cookie dapat dibaca dan dimodifikasi oleh server dan klien, dan mereka sering digunakan untuk melacak pengguna dan memberikan pengalaman web yang disesuaikan.",
                'code' =>
                    "<?php

// Set a cookie with a name, value, and expiration time (in seconds)
setcookie('user', 'john_doe', time() + 3600, '/'); // Expires in 1 hour

// Access the cookie value
\$cookieValue = \$_COOKIE['user'];

// Delete a cookie by setting its expiration time to the past
setcookie('user', '', time() - 3600, '/');

// Check if a cookie is set
if (isset(\$_COOKIE['user'])) {
    echo 'Cookie is set!';
} else {
    echo 'Cookie is not set.';
}
?>
                ",
                'order_in_section' => 10
            ],
            [
                'section_id' => 5,
                'title' => 'Upload File',
                'description' => "Mengunggah berkas adalah proses di mana pengguna dapat memilih dan mengirimkan berkas dari perangkat lokal mereka ke server web. Dalam pengembangan web PHP, ini biasanya dilakukan menggunakan formulir HTML dengan jenis input file. Ketika formulir dikirimkan, server menerima berkas tersebut dan menyimpannya di lokasi yang ditentukan. Untuk mengelola unggahan berkas di PHP, Anda dapat menggunakan variabel global \$_FILES untuk mengakses informasi tentang berkas yang diunggah dan fungsi move_uploaded_file() untuk menyimpannya di server.",
                'code' =>
                    "<?php

if(\$_SERVER['REQUEST_METHOD'] == \"POST\") {
    \$file_name = \$_FILES['upload_file']['name'];
    \$file_type = \$_FILES['upload_file']['type'];
    \$file_size = \$_FILES['upload_file']['size'];
    \$file_tmp_name = \$_FILES['upload_file']['tmp_name'];
    \$file_error = \$_FILES['upload_file']['error'];

    move_uploaded_file(\$file_tmp_name, __DIR__ . '/folder_name/' . \$file_name);
}
?>

<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Document</title>
</head>
<body>
<?php
if(\$_SERVER['REQUEST_METHOD'] == \"POST\") : ?>
    <table>
        <tr>
            <td>file Name</td>
            <td><?= \$file_name ?></td>
        </tr>
        <tr>
            <td>file Type</td>
            <td><?= \$file_type ?></td>
        </tr>
        <tr>
            <td>file size</td>
            <td><?= \$file_size ?></td>
        </tr>
        <tr>
            <td>file tmp name</td>
            <td><?= \$file_tmp_name ?></td>
        </tr>
        <tr>
            <td>file error</td>
            <td><?= \$file_error ?></td>
        </tr>
    </table>
<?php endif; ?>
    <form action=\"\" method=\"post\" enctype=\"multipart/form-data\">
        <label for=\"upload_file\">upload_file</label>
        <input type=\"file\" name=\"upload_file\" id=\"upload_file\">
        <input type=\"submit\" value=\"Upload\">
    </form>
</body>
</html>
                ",
                'order_in_section' => 11
            ],
            [
                'section_id' => 5,
                'title' => 'Download File',
                'description' => "Adalah proses dimana pengguna dapat mengambil berkas dari server dan menyimpannya di perangkat lokal mereka. Dalam pengembangan web PHP, Anda dapat memberikan tautan atau tombol unduh pada halaman web Anda. Ketika pengguna mengkliknya, server mengirimkan berkas yang diminta dalam respons HTTP. Pengguna kemudian dapat menyimpan berkas tersebut di perangkat mereka. Jika perlu, Anda dapat menggunakan header PHP untuk mengatur tipe konten dan nama berkas sebelum mengirimnya ke pengguna.",
                'code' =>
                    "<?php

// paksa download
// header('Content-Disposition: attachment; filename=\"filename.extension\"');
if(isset(\$_GET['key']) && \$_GET['key'] == 'rahasia') {
    header('Content-Disposition: attachment; filename=\"picture.jpg\"');
    header('Content-Type: image/jpeg');
    readfile(__DIR__ . '/folder_name/filename.extension');
    exit();

}else{
    echo \"invalid key\";
}

?>
                ",
                'order_in_section' => 12
            ]
        ];

        foreach ($course as $item) {
            DB::connection('mysql')
                ->table('instructor_lessons')
                ->insert([
                    'instructor_section_id' => $item['section_id'],
                    'title' => $item['title'],
                    'description' => $item['description'],
                    'code' => base64_encode($item['code']),
                    'order_in_section' => $item['order_in_section'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }
    }
}
