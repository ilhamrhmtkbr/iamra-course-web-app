<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Lessons2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $course = [
            [
                'section_id' => 6,
                'title' => 'Cek Versi Komposer',
                'description' => "Cek komposer dalam PHP Composer merujuk pada proses verifikasi dependensi dan integritas paket yang terinstal di suatu proyek menggunakan Composer. Ini melibatkan pengecekan konsistensi versi paket, keberadaan file yang diperlukan, dan validitas metadata. Cek komposer penting untuk memastikan kestabilan dan keamanan proyek PHP dengan memastikan bahwa semua dependensi terpenuhi dengan benar. Dengan memeriksa komposer, pengembang dapat menghindari konflik dan masalah yang mungkin muncul dalam pengelolaan paket PHP.",
                'code' => 'composer --version',
                'order_in_section' => 1
            ],
            [
                'section_id' => 6,
                'title' => 'Inisialisasi Komposer',
                'description' => "Instalasi Composer adalah proses memasang Composer, manajer dependensi PHP, di sistem Anda sehingga Anda dapat menggunakan fitur-fiturnya untuk mengelola dependensi proyek PHP Anda dengan mudah.

                Berikut adalah tutorial instalasi Composer di beberapa sistem operasi:",
                'code' => "composer init

// Instalasi di Windows:
// 1. Unduh dan jalankan installer Composer dari situs web resminya.
// 2. Ikuti instruksi instalasi.
// 3. Pastikan jalur ke composer.phar ditambahkan ke variabel lingkungan PATH.

// Instalasi di MacOS / Linux:
// 1. Buka terminal.
// 2. Jalankan perintah berikut untuk mengunduh Composer:
// 3. Copy code : php -r \"copy('https://getcomposer.org/installer', 'composer-setup.php');\"

// Verifikasi integritas unduhan:
// 1. Copy code : php -r \"if (hash_file('sha384', 'composer-setup.php') === 'EXPECTED_HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;\"

// (Ganti EXPECTED_HASH dengan hash yang ditampilkan di situs web Composer).
// Jalankan perintah berikut untuk menginstal Composer secara global:
// 1. Copy code : php composer-setup.php --install-dir=/usr/local/bin --filename=composer
// Setelah instalasi, Anda dapat mengonfirmasi apakah Composer berhasil terpasang dengan menjalankan perintah composer --version di terminal atau command prompt. Jika berhasil, Anda akan melihat versi Composer yang terpasang.",
                'order_in_section' => 2
            ],
            [
                'section_id' => 6,
                'title' => 'Install Dependency / Update',
                'description' => "Installasi dependensi atau pembaruan (update) dependensi dalam konteks Composer merujuk pada proses menginstal atau memperbarui paket-paket PHP yang didefinisikan dalam file composer.json di proyek Anda.",
                'code' => "// Installasi Dependensi:
// 1. Pastikan file composer.json Anda sudah didefinisikan dengan daftar dependensi yang diperlukan untuk proyek Anda.
// 2. Buka terminal atau command prompt di direktori proyek.
// 3. Jalankan perintah:
// 4. Copy code : composer install
// Perintah ini akan membaca composer.json, mengunduh dan menginstal semua dependensi yang didefinisikan di dalamnya.

// Pembaruan Dependensi:
// 1. Buka terminal atau command prompt di direktori proyek.
// 2. Jalankan perintah:
// 3. Copy code : composer update
// Perintah ini akan memperbarui semua paket ke versi terbaru yang kompatibel dengan definisi yang ada di composer.json. Composer juga akan memperbarui file composer.lock untuk merekam versi spesifik dari setiap paket yang diinstal.",
                'order_in_section' => 3
            ],
            [
                'section_id' => 6,
                'title' => 'Add and Generate Autoload',
                'description' => "Autoload dalam konteks Composer mengacu pada kemampuan Composer untuk secara otomatis memuat (autoload) kelas-kelas PHP dan file-file lain yang diperlukan oleh proyek Anda. Ini membuat pengelolaan dependensi dan struktur proyek menjadi lebih mudah.

                Untuk menambahkan autoload dalam proyek PHP Anda menggunakan Composer, ikuti langkah-langkah berikut:",
                'code' =>
                "<?php

require_once __DIR__ . '/vendor/autoload.php'

// Buka file composer.json di direktori proyek Anda.

// Di dalam file composer.json, tambahkan atau perbarui bagian \"autoload\" untuk menentukan namespace atau direktori yang ingin Anda autoload. Contoh:

// \"autoload\": {
//     \"psr-4\": {
//         \"NamaNamespace\\\": \"src/\"
//     }
// }
// Di sini, \"NamaNamespace\\\" adalah namespace yang akan diatur, dan \"src/\" adalah direktori di mana kelas-kelas tersebut akan ditemukan.

// Setelah menambahkan aturan autoload, jalankan perintah berikut di terminal atau command prompt di direktori proyek Anda:
// 1. Copy code : composer dump-autoload
// Perintah ini akan memperbarui file autoloader Composer sehingga kelas-kelas yang ditentukan dalam composer.json dapat dimuat secara otomatis.

// Setelah langkah-langkah ini, kelas-kelas Anda akan dimuat secara otomatis oleh Composer saat Anda menggunakan atau memanggilnya di dalam proyek Anda. Pastikan untuk mengikuti pedoman PSR-4 atau PSR-0 terkait penamaan kelas dan struktur direktori untuk memastikan autoload berfungsi dengan benar.",
                'order_in_section' => 4
            ],
            [
                'section_id' => 6,
                'title' => 'Add Library',
                'description' => "Untuk menambahkan sebuah library menggunakan Composer ke dalam proyek PHP Anda, berikut langkah-langkahnya:",
                'code' => "// composer require library_name

// Temukan Library yang Diperlukan:
// Tentukan library yang ingin Anda tambahkan ke proyek Anda. Anda dapat mencari library yang tersedia di Packagist, repositori utama paket-paket yang kompatibel dengan Composer.

// Tambahkan Library ke composer.json:
// Buka file composer.json di direktori proyek Anda dan tambahkan nama library ke dalam daftar require. Contoh, jika Anda ingin menambahkan library Monolog, tambahkan baris berikut:

// \"require\": {
//     \"monolog/monolog\": \"^2.0\"
// }
// Di sini, monolog/monolog adalah nama paket library, dan ^2.0 adalah versi yang diinginkan. Anda dapat menyesuaikan versi yang sesuai dengan kebutuhan proyek Anda.

// Jalankan Perintah Install:

// Setelah menambahkan library ke composer.json, buka terminal atau command prompt di direktori proyek Anda dan jalankan perintah:
// composer install
// Perintah ini akan mengunduh dan menginstal library beserta dependensinya ke dalam direktori vendor di proyek Anda.

// Gunakan Library dalam Kode Anda:

// Setelah library berhasil diinstal, Anda dapat menggunakannya dalam kode PHP Anda. Contoh, jika Anda ingin menggunakan Monolog dalam kode Anda, Anda dapat mengimpor kelas yang sesuai:

<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

\$log = new Logger('name');
\$log->pushHandler(new StreamHandler('path/to/your.log', Logger::WARNING));

\$log->warning('Foo');
\$log->error('Bar');",
                'order_in_section' => 5
            ],
            [
                'section_id' => 7,
                'title' => 'Test',
                'description' => "Unit testing adalah proses pengujian perangkat lunak di mana unit-unit kecil dari kode diuji secara terpisah untuk memastikan bahwa setiap unit berfungsi dengan benar. Dalam konteks PHP, PHPUnit adalah kerangka kerja yang umum digunakan untuk melakukan unit testing. Test dalam PHPUnit merujuk pada metode atau fungsi yang digunakan untuk menguji unit-unit tersebut. Setiap test biasanya mencakup serangkaian asertion untuk memverifikasi perilaku yang diharapkan dari unit yang diuji.",
                'code' => "<?php

// Chapter 1
namespace Path\Test;

use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{
    public function testCounter()
    {
        \$counter = new Counter();
        \$counter->increment();
        \$counter->increment();
        echo \$counter->getCounter() . PHP_EOL;
    }

    public function testOther()
    {
        echo \"Other\" . PHP_EOL;
    }
}

/*
 Jalankan di Terminal di bawah

 untuk mengetes seluruh file
 vendor/bin/phpunit.bat tests/CounterTest.php

 untuk mengetes salah satu function
 vendor/bin/phpunit.bat --filter 'CounterTest::testOther()' tests/CounterTest.php
 */
                ",
                'order_in_section' => 1
            ],
            [
                'section_id' => 7,
                'title' => 'Assert Test',
                'description' => "Assert Test adalah bagian penting dalam proses unit testing di mana pernyataan-pernyataan (assertions) digunakan untuk memeriksa apakah hasil dari unit yang diuji sesuai dengan yang diharapkan. Pada dasarnya, assert test memverifikasi apakah perilaku unit yang diuji telah sesuai dengan ekspektasi yang telah ditentukan. Dalam PHPUnit atau kerangka kerja pengujian unit lainnya, assert test digunakan untuk membuat asertasi yang memvalidasi output atau perilaku dari unit yang sedang diuji. Contoh, assertEqual() untuk membandingkan dua nilai dan memastikan bahwa mereka sama.",
                'code' => "<?php

// Assertions adalah mengecek apakah apakah sebuah kondisi sudah terpenuhi, jika kondisi tidak
terpenuhi, maka unit test nya kita anggap gagal

namespace Path\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class AssertTest extends TestCase{
    public function testCounter()
    {
        \$counter = new Counter();

        \$counter->increment();
        Assert::assertEquals(1, \$counter->getCounter());

        \$counter->increment();
        \$this::assertEquals(2, \$counter->getCounter());

        \$counter->increment();
        self::assertEquals(3, \$counter->getCounter());
    }
}
                ",
                'order_in_section' => 2
            ],
            [
                'section_id' => 7,
                'title' => 'Annotation Test',
                'description' => "Annotation Test adalah teknik yang digunakan dalam PHPUnit dan beberapa kerangka kerja pengujian unit lainnya untuk memberikan metadata tambahan kepada metode pengujian (test methods) yang akan dieksekusi. Metadata ini, dalam bentuk anotasi atau penanda (annotation), memberikan informasi kepada kerangka kerja pengujian tentang bagaimana metode pengujian tersebut harus dijalankan atau bagaimana pengujian tersebut harus ditangani.

                Contoh umum anotasi pengujian termasuk @Test untuk menandai sebuah metode sebagai metode pengujian, @Before untuk menandai sebuah metode yang akan dieksekusi sebelum setiap pengujian, dan @After untuk metode yang akan dieksekusi setelah setiap pengujian. Penggunaan anotasi ini membantu dalam mengatur dan mengelompokkan pengujian serta memfasilitasi eksekusi pengujian secara otomatis.",
                'code' => "<?php

// PHPUnit juga mendukung fitur annotation, yaitu medadata atau informasi yang bisa dimasukkan ke dalam source code, dimana di PHP annotation ditempatkan pada Doc Block (block komentar)

namespace Path\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class AnnotationTest extends TestCase{
// @test merupakan annotation yang digunakan untuk menandakan bahwa function ini adalah sebuah unit test
// Dengan menambahkan @test, kita tidak perlu lagi membuat nama function selalu diawali dengan kata test

    /**
     * @test
     */
    public function increment()
    {
        \$counter = new Counter();

        \$counter->increment();
        Assert::assertEquals(1, \$counter->getCounter());
    }
}
                ",
                'order_in_section' => 3
            ],
            [
                'section_id' => 7,
                'title' => 'Dependency Test',
                'description' => "Dependency Test merujuk pada situasi di mana satu unit pengujian bergantung pada hasil dari unit pengujian lainnya. Dalam pengujian unit, ini bisa terjadi ketika hasil dari satu unit pengujian diperlukan sebagai masukan atau kondisi awal untuk menjalankan pengujian lainnya. Ketergantungan ini bisa dalam bentuk ketergantungan fungsional, di mana hasil dari satu pengujian diperlukan untuk mengkonfirmasi perilaku yang tepat dari pengujian lainnya, atau bisa juga dalam bentuk ketergantungan struktural di mana unit pengujian memerlukan akses ke sumber daya yang sama atau kondisi awal yang sama. Dalam pengujian yang tepat, ketergantungan seperti ini harus dikelola dengan hati-hati untuk memastikan bahwa pengujian berjalan dengan benar dan dapat diulang.",
                'code' => "<?php

// annotation @depends namaUnitTest adalah unit test yang tergantung dari hasil unit test lainnya

namespace Path\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class DependencyTest extends TestCase{

    /**
     * @test
     */
    public function increment()
    {
        \$counter = new Counter();

        \$counter->increment();
        Assert::assertEquals(1, \$counter->getCounter());
    }

    public function testFirst(): Counter
    {
        \$counter = new Counter();
        \$counter->increment();
        \$counter->increment();
        \$this->assertEquals(1, \$counter->getCounter());

        return \$counter;
    }

    /**
     * @depends testFirst
     */
    public function testSecond(Counter \$counter):void
    {
        \$counter->increment();
        \$this->assertEquals(2, \$counter->getCounter());
    }
}
                ",
                'order_in_section' => 4
            ],
            [
                'section_id' => 7,
                'title' => 'Data Provider Test',
                'description' => "Data Provider Test adalah teknik dalam PHPUnit yang memungkinkan penggunaan data yang bervariasi dalam pengujian yang sama. Dalam PHPUnit, sebuah metode yang diberi anotasi @dataProvider dapat digunakan untuk memberikan data dinamis kepada metode pengujian yang berbeda.

                Ini sangat berguna ketika Anda ingin menjalankan serangkaian pengujian yang sama pada berbagai input data. Contoh, jika Anda memiliki metode yang melakukan operasi matematika sederhana, Anda dapat menggunakan Data Provider untuk memberikan beberapa pasang angka yang berbeda sebagai input dan memastikan bahwa hasilnya benar untuk setiap input. Dengan menggunakan Data Provider, Anda dapat menghindari menulis pengujian yang sama berulang kali hanya dengan input yang berbeda.",
                'code' => "<?php

// PHPUnit mendukung fitur data provider, dimana kita bisa membuat unit test dengan parameter, dan datanya di provide dari function lain
// Untuk melakukan ini, kita bisa menggunakan annotation @dataProvider providerFunction

namespace Path\Test;

use PHPUnit\Framework\TestCase;

class DataProviderTest extends TestCase{
    // tanpa data Provider == yang dites hasilnya cuma satu unit test aja
    public function testManual()
    {
        self::assertEquals(10, Math::sum([5,5]));
        self::assertEquals(20, Math::sum([4,4,4,4]));
        self::assertEquals(9, Math::sum([3,3]));
        self::assertEquals(0, Math::sum([]));
        self::assertEquals(2, Math::sum([2]));
    }

    // dengan Data Provider == yang dites ada dua data unit test aja
    /**
     * @dataProvider mathSumData
     */
    public function testDataProvider (array \$values, int \$expected)
    {
        self::assertEquals(\$expected, Math::sum(\$values));
    }

    public function mathSumData(): array
    {
        return [
            [[5,5],10],
            [[4,4,4,4,4],20],
            [[3,3,3],9],
            [[],0],
            [[2],2],
        ];
    }

    // dengan testWith == dipake untuk testing yang sederhana saja, kalo untuk object lebih baik menggunakan data provider

    /**
     * @testWith
     * [[5,5],10]
     * [[4,4,4,4,4],20]
     * [[3,3,3],9]
     * [[],0]
     * [[2],2]
     */
    public function testWith(array \$values, int \$expected)
    {
        self::assertEquals(\$expected, Math::sum(\$values));
    }
}
                ",
                'order_in_section' => 5
            ],
            [
                'section_id' => 7,
                'title' => 'Test Exception',
                'description' => "Exception Test adalah teknik dalam pengujian unit yang digunakan untuk menguji apakah sebuah fungsi atau metode menghasilkan pengecualian (exception) ketika diberikan input yang tidak valid atau dalam kondisi yang tidak diinginkan. Dalam PHPUnit, Anda dapat menggunakan metode yang diberi anotasi @expectException untuk menandai bahwa Anda mengharapkan sebuah pengecualian terjadi saat menjalankan sebuah pengujian. Kemudian, Anda dapat menentukan tipe pengecualian yang diharapkan.

                Ini memungkinkan Anda untuk memastikan bahwa kode Anda berperilaku sebagaimana diharapkan dalam situasi-situasi yang tidak biasa atau tidak valid, dan juga memungkinkan Anda untuk menangani pengecualian dengan benar. Contoh, Anda dapat menguji apakah sebuah fungsi validasi menghasilkan pengecualian saat diberikan input yang tidak valid, seperti string kosong atau nilai yang tidak sesuai dengan kebutuhan validasi.",
                'code' => "<?php

// Saat membuat unit test, pastikan kita tidak hanya membuat unit test dengan skenario benar
// Kita juga wajib membuat unit test dengan skenario salah atau gagal
// Salah satunya kadang saat terjadi skenario salah atau gagal, kita sering menggunakan Exception
// PHPUnit memiliki fitur assertion untuk memastikan bahwa sebuah Exception harus terjadi
// Jika terjadi, maka unit test dianggap gagal
// Kita bisa menggunakan function Assert::expectException(ClassException::class) jika ingin
// memastikan bahwa sebuah unit test harus terjadi exception yang kita perkirakan


namespace Path\Test;

use PHPUnit\Framework\TestCase;

class ExceptionTest extends TestCase
{
    public function testSuccess()
    {
        \$person = new Person(\"Ilham\");
        self::assertEquals(\"Hi Rahmat, my name is Ilham\", \$person->sayHello(\"Rahmat\"));
    }

    public function testException()
    {
        \$person = new Person(\"Ilham\");
        \$this->expectException(\Exception::class); // kalo berharap test yang dihasilkan adalah exception, maksudnya salah
        // justru kalo gak ada exception, dianggapnya gagal, aneh ya
        \$person->sayHello(null);
    }

    public function testGoodByeSuccess()
    {
        \$person = new Person(\"Ilham\");
        \$this->expectOutputString(\"Good bye Rahmat\" . PHP_EOL);
        \$person->sayGoodBye(\"Rahmat\");
    }
}
                ",
                'order_in_section' => 6
            ],
            [
                'section_id' => 7,
                'title' => 'Fixture Test',
                'description' => "kondisi awal atau lingkungan yang ditetapkan sebelum menjalankan pengujian. Fixture dapat berupa objek, data, atau kondisi lain yang diperlukan untuk menguji unit tertentu.

                Dalam PHPUnit, Anda dapat menggunakan metode yang diberi anotasi @before dan @after untuk menyiapkan fixture sebelum setiap pengujian dan membersihkannya setelahnya. Dengan menggunakan fixture, Anda dapat memastikan bahwa setiap pengujian berjalan dalam kondisi yang konsisten dan dapat diulang. Ini membantu meminimalkan variabilitas yang tidak diinginkan dalam hasil pengujian. Contoh, Anda dapat menggunakan fixture untuk membuat objek yang diperlukan atau menyiapkan basis data dengan data yang sesuai sebelum menjalankan pengujian yang berkaitan dengan objek atau basis data tersebut.",
                'code' => "<?php

// Salah satu yang memakan waktu saat membuat unit test adalah, membuat kode awal yang berulang-ulang sebelum unit test
// Atau membuat kode akhir yang berulang-ulang setelah unit test
// Hal ini dinamakan fixture
// Pada unit test sebelumnya yang sudah kita buat, kita sering sekali membuat object \$counter, atau \$person
// Dengan menggunakan fitur Fixture milik PHPUnit, hal ini bisa dipermudah
// Class TestCase memiliki sebuah function bernama setUp()
// function setUp() merupakan function yang akan selalu dipanggil sebelum function unit test dieksekusi
// function setUp() cocok sekali untuk membuat kode yang kita inginkan sebelum unit test dijalankan


// intinya cara menggunakan fixture (function setUP())
namespace Path\Test;

use PHPUnit\Framework\TestCase;

class FixtureTest extends TestCase
{
    private Person \$person;

    // fixture
    // protected function setUp(): void{
    //     \$this->person = new Person(\"Ilham\");
    // }


    // fixture dengan before
    protected function setUp(): void
    {
    }
    /**
     * @before
     */
    public function createPerson()
    {
        \$this->person = new Person(\"Ilham\");
    }
    // fixture dengan before

    public function testSuccess()
    {
        self::assertEquals(\"Hi Rahmat, my name is Ilham\", \$this->person->sayHello(\"Rahmat\"));
    }

    public function testException()
    {
        \$this->expectException(\Exception::class); // kalo berharap test yang dihasilkan adalah exception, maksudnya salah
        // justru kalo gak ada exception, dianggapnya gagal, aneh ya
        \$this->person->sayHello(null);
    }

    public function testGoodByeSuccess()
    {
        \$this->expectOutputString(\"Good bye Rahmat\" . PHP_EOL);
        \$this->person->sayGoodBye(\"Rahmat\");
    }
}
                ",
                'order_in_section' => 7
            ],
            [
                'section_id' => 7,
                'title' => 'Fixture Set Up Before Test',
                'description' => "Penyiapan Fixture Sebelum Pengujian merujuk pada proses mempersiapkan lingkungan, data, atau objek yang diperlukan sebelum menjalankan uji unit. Dalam PHPUnit, ini biasanya dilakukan dengan menggunakan metode setUp(). Metode ini dipanggil sebelum setiap metode pengujian dijalankan, memungkinkan Anda untuk menginisialisasi fixture atau menyiapkan kondisi awal yang diperlukan untuk pengujian.

                Contohnya, jika pengujian Anda memerlukan koneksi database atau instansiasi objek tertentu, Anda dapat melakukannya di dalam metode setUp() untuk memastikan bahwa lingkungan pengujian terkonfigurasi dengan baik sebelum setiap pengujian dijalankan. Ini membantu mempertahankan konsistensi dan keandalan dalam pengujian Anda dengan memastikan bahwa setiap pengujian dimulai dari kondisi awal yang diketahui.",
                'code' => "<?php

// Jika kita ingin membuat function dengan nama berbeda, kita bisa menggunakan annotation @before
// Bahkan jika menggunakan annotation @before, kita bisa membuat function setup lebih dari satu

namespace Path\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class FixtureSetUpBeforeTest extends TestCase
{

    private Counter \$counter;

    protected function setUp(): void // setUp sealalu dipanggil setiap sebelum unit testnya dipanggil, makanya dia selalu ke reset terus tidak bisa increment
    {
        \$this->counter = new Counter();
        echo \"Membuat Counter\" . PHP_EOL;
    } // dan outputnya ada 4, karena ada 4 unit test yang akan dijalankan

    public function testCounter()
    {
        \$this->counter->increment();
        Assert::assertEquals(1, \$this->counter->getCounter());

        \$this->counter->increment();
        \$this::assertEquals(2, \$this->counter->getCounter());

        \$this->counter->increment();
        self::assertEquals(3, \$this->counter->getCounter());
    }

    /**
     * @test
     */
    public function increment()
    {

        \$this->counter->increment();
        Assert::assertEquals(1, \$this->counter->getCounter());
    }

    public function testFirst(): Counter
    {
        \$this->counter->increment();
        \$this->assertEquals(1, \$this->counter->getCounter());

        return \$this->counter;
    }

    /**
     * @depends testFirst
     */
    public function testSecond(Counter \$counter): void
    {
        \$counter->increment();
        \$this->assertEquals(2, \$counter->getCounter());
    }
}
                ",
                'order_in_section' => 8
            ],
            [
                'section_id' => 7,
                'title' => 'Fixture Tear Down After Test',
                'description' => "Fixture Tear Down After Test adalah proses membersihkan atau menghancurkan fixture dan kondisi lingkungan setelah pengujian selesai. Dalam PHPUnit, ini sering dilakukan menggunakan metode tearDown(). Metode ini dipanggil setelah setiap metode pengujian dijalankan, sehingga memungkinkan Anda untuk membersihkan sumber daya atau melakukan tindakan pembersihan lainnya yang diperlukan setelah pengujian selesai.

                Contohnya, jika Anda melakukan koneksi ke database atau mengalokasikan sumber daya lainnya dalam fixture sebelum pengujian, Anda dapat menggunakan metode tearDown() untuk menutup koneksi database atau membebaskan sumber daya yang dialokasikan setelah pengujian selesai. Ini membantu memastikan bahwa tidak ada sisa-sisa dari pengujian sebelumnya yang mempengaruhi hasil pengujian berikutnya.",
                'code' => "<?php

// Class TestCase memiliki sebuah function bernama tearDown()
// function tearDown() merupakan function yang akan selalu dipanggil setelah function unit test dieksekusi
// function tearDown() cocok sekali untuk membuat kode yang kita inginkan setelah unit test dijalankan
// Selain menggunakan tearDown(), kita juga bisa menggunakan annotation @after


namespace Path\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class FixtureTearDownAfterTest extends TestCase
{

    private Counter \$counter;

    protected function setUp(): void // setUp sealalu dipanggil setiap sebelum unit testnhya dipanggil, makanya dia selalu ke reset terus tidak bisa increment
    {
        \$this->counter = new Counter();
        echo \"Membuat Counter\" . PHP_EOL;
    } // dan outputnya ada 4, karena ada 4 unit test yang akan dijalankan

    public function testCounter()
    {
        \$this->counter->increment();
        Assert::assertEquals(1, \$this->counter->getCounter());

        \$this->counter->increment();
        \$this::assertEquals(2, \$this->counter->getCounter());

        \$this->counter->increment();
        self::assertEquals(3, \$this->counter->getCounter());
    }

    /**
     * @test
     */
    public function increment()
    {

        \$this->counter->increment();
        Assert::assertEquals(1, \$this->counter->getCounter());
    }

    public function testFirst(): Counter
    {
        \$this->counter->increment();
        \$this->assertEquals(1, \$this->counter->getCounter());

        return \$this->counter;
    }

    /**
     * @depends testFirst
     */
    public function testSecond(Counter \$counter): void
    {
        \$counter->increment();
        \$this->assertEquals(2, \$counter->getCounter());
    }



    protected function tearDown(): void
    {
        echo \"Tear Down\" . PHP_EOL;
    }

    /**
     * @after
     */
    protected function after(): void
    {
        echo \"After\" . PHP_EOL;
    }
}
                ",
                'order_in_section' => 9
            ],
            [
                'section_id' => 7,
                'title' => 'Test Fixture Sharing',
                'description' => "Fixture Sharing Test adalah teknik dalam pengujian unit di mana suatu fixture atau kondisi lingkungan yang sama digunakan oleh beberapa pengujian. Ini memungkinkan Anda untuk menghindari pengulangan kode yang tidak perlu dan memastikan konsistensi dalam kondisi awal antara pengujian yang berbeda.

                Dalam PHPUnit, Anda dapat menggunakan metode setUp() untuk menyiapkan fixture, dan fixture ini akan digunakan oleh setiap metode pengujian dalam kelas pengujian yang sama. Ini sangat berguna ketika beberapa pengujian membutuhkan kondisi awal yang sama, seperti objek yang sama atau database dalam keadaan yang sama sebelum pengujian dimulai.

                Dengan menggunakan Fixture Sharing Test, Anda dapat meningkatkan efisiensi pengujian dan memastikan bahwa setiap pengujian beroperasi dalam konteks yang konsisten.",
                'code' => "<?php

// Secara default, class unit test itu sebenarnya akan selalu dibuat sebelum function unit test dijalankan, jadi tidak menggunakan object unit test yang sama
// Begini cara berjalan unit test :
// -- membuat object unit test
// -- menjalankan fixture set up
// -- menjalankan function unit test
// -- menjalankan fixture tear down
// -- ulangi dari awal untuk function unit test selanjutnya
// Karena object dari class unit test selalu dibuat ulang, maka kadang agak menyulitkan jika kita ingin membuat data yang bisa di sharing antar unit test, misal koneksi database
// Untuk hal seperti ini, kita bisa membuat data nya berupa variable static, sehingga variable static tersebut tidak perlu tergantung dengan object unit test lagi
// Sekarang pertanyaannya, bagaimana cara menginisialisasi data static tersebut? Karena kita tidak bisa menggunakan setUp() method, karena bukan static function
// Untungnya PHPUnit mendukung sharing fixture seperti ini, nama function nya adalah :
// static function setUpBeforeClass() untuk setup diawal ketika class unit test dieksekusi, atau menggunakan @beforeClass
// static function tearDownAfterClass() untuk dipanggil diakhir ketika class unit test selesai, atau menggunakan @afterClass
// Sharing fixture hanya dieksekusi sekali diawal dan diakhir, walaupun di class unit test terdapat banyak function unit test


namespace Path\Test;

use PHPUnit\Framework\TestCase;

class FixtureSharingTest extends TestCase{
    public static Counter \$counter;

    public static function setUpBeforeClass(): void
    {
        self::\$counter = new Counter();
    }

    public function testFirst()
    {
        self::\$counter->increment();
        self::assertEquals(1, self::\$counter->getCounter());
    }

    public function testSecond()
    {
        self::\$counter->increment();
        self::assertEquals(2, self::\$counter->getCounter());
    }

    public static function tearDownAfterClass(): void
    {
        echo \"Unit Test Selesai\" . PHP_EOL;
    }
}
                ",
                'order_in_section' => 10
            ],
            [
                'section_id' => 7,
                'title' => 'Incomplete Test',
                'description' => "Incomplete Test adalah kondisi di mana sebuah pengujian tidak sepenuhnya diselesaikan atau diimplementasikan. Dalam PHPUnit, Anda dapat menandai sebuah pengujian sebagai tidak lengkap menggunakan metode markTestIncomplete(). Biasanya, Anda akan menggunakan ini ketika Anda ingin menandai sebuah pengujian sebagai tidak lengkap karena fungsionalitas yang belum sepenuhnya diimplementasikan atau karena ada bagian dari kode yang belum ditulis. Dengan menandai pengujian sebagai tidak lengkap, Anda dapat tetap menjalankan test suite tanpa menghentikan eksekusi pengujian yang lain.",
                'code' => "<?php

// Saat membuat unit test, kadang kita membuat test dengan dimulai dengan function kosong, lalu mulai diisi dengan kode unit test
// Kadang ada kalanya unit test belum selesai
// Secara default, jika tidak terdapat masalah pada unit test nya, maka PHPUnit akan menganggap unit test tersebut sebagai unit test yang sukses
// Dan kadang jika lupa, bisa jadi kita tidak pernah tahu kalo ternyata ada unit test yang belum selesai, karena terlihat sukses
// Untuk kasus seperti ini, ada baiknya kita memberi tahu ke PHPUnit bahwa unit test tersebut belum selesai dengan menggunakan method Assert::markTestIncomplete()

namespace Path\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class IncompleteTest extends TestCase{

    private Counter \$counter;

    protected function setUp(): void
    {
        \$this->counter = new Counter();
        echo \"Membuat Counter\" . PHP_EOL;
    }

    public function testIncrement()
    {
        self::assertEquals(0, \$this->counter->getCounter());
        // markTestIncomplete artinya menandai sebuah test yang belum final
        self::markTestIncomplete('Si Unit test ini belom selesai');
        // artinya kode dibawah ini tidak akan di eksekusi
        self::assertEquals(0, \$this->counter->getCounter());
    }


    public function testCounter()
    {
        \$this->counter->increment();
        Assert::assertEquals(1, \$this->counter->getCounter());

        \$this->counter->increment();
        \$this::assertEquals(2, \$this->counter->getCounter());

        \$this->counter->increment();
        self::assertEquals(3, \$this->counter->getCounter());
    }

    /**
     * @test
     */
    public function increment()
    {

        \$this->counter->increment();
        Assert::assertEquals(1, \$this->counter->getCounter());
    }

    public function testFirst(): Counter
    {
        \$this->counter->increment();
        \$this->assertEquals(1, \$this->counter->getCounter());

        return \$this->counter;
    }

    /**
     * @depends testFirst
     */
    public function testSecond(Counter \$counter):void
    {
        \$counter->increment();
        \$this->assertEquals(2, \$counter->getCounter());
    }
}
                ",
                'order_in_section' => 11
            ],
            [
                'section_id' => 7,
                'title' => 'Skip Test',
                'description' => "Skip Test adalah tindakan dalam pengujian unit di mana sebuah pengujian dilewati atau tidak dijalankan karena kondisi tertentu tidak terpenuhi. Dalam PHPUnit, Anda dapat menggunakan metode markTestSkipped() untuk menandai pengujian dan memberi tahu kerangka kerja bahwa pengujian harus dilewati.

                Biasanya, Anda menggunakan Skip Test ketika pengujian tidak dapat dijalankan dalam kondisi tertentu, Contoh jika lingkungan pengujian tidak tersedia atau jika kondisi prasyarat tidak terpenuhi. Ini memungkinkan Anda untuk menjalankan test suite tanpa memicu pengujian yang tergantung pada kondisi yang tidak dapat dipenuhi.",
                'code' => "<?php

// Kadang ada masalah ketika membuat unit test, sehingga kita ingin men-disabled unit test yang sudah ada
// Saat ingin men-disabled unit test, kadang kita melakukan hal seperti, mengubah nama function sehingga tidak diawali dengan test atau menghapus @test jika menggunakan annotation
// Hanya saja masalahnya jika itu kita lakukan, secara otomatis unit test akan hilang dari laporan PHPUnit, dan jika kita lupa, bisa saja unit test tersebut akan ter-disabled selamanya
// Cara yang baik jika ada unit test yang memang ingin kita disabled adalah dengan menggunakan Assert::markTestSkipped(), dimana nanti akan terdapat laporan dari PHPUnit bahwa unit test tersebut kita skip

namespace Path\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class SkipTest extends TestCase
{

    private Counter \$counter;

    protected function setUp(): void
    {
        \$this->counter = new Counter();
        echo \"Membuat Counter\" . PHP_EOL;
    }

    public function testIncrement()
    {
        self::assertEquals(0, \$this->counter->getCounter());
        // markTestIncomplete artinya menandai sebuah test yang belum final
        self::markTestIncomplete('Si Unit test ini belom selesai');
        // artinya kode dibawah ini tidak akan di eksekusi
        self::assertEquals(0, \$this->counter->getCounter());
    }


    public function testCounter()
    {
        \$this->counter->increment();
        Assert::assertEquals(1, \$this->counter->getCounter());

        \$this->counter->increment();
        \$this::assertEquals(2, \$this->counter->getCounter());

        \$this->counter->increment();
        self::assertEquals(3, \$this->counter->getCounter());
    }

    /**
     * @test
     */
    public function increment()
    {
        self::markTestSkipped('Masih ada error yang bingung contohnnya');
        // dan kode di bawah ini tidak akan di eksekusi
        \$this->counter->increment();
        Assert::assertEquals(1, \$this->counter->getCounter());
    }

    public function testFirst(): Counter
    {
        \$this->counter->increment();
        \$this->assertEquals(1, \$this->counter->getCounter());

        return \$this->counter;
    }

    /**
     * @depends testFirst
     */
    public function testSecond(Counter \$counter): void
    {
        \$counter->increment();
        \$this->assertEquals(2, \$counter->getCounter());
    }

    //
    /**
     * @requires OSFAMILY Linux
     */
    public function testOnlyLinux()
    {
        self::assertTrue(true, \"Only in Linux\");
    }

    /**
     * @requires PHP >= 8
     * @requires OSFAMILY Darwin
     */
    public function testOnlyForMacAndPHP8()
    {
        self::assertTrue(true, \"Only for Mac and PHP 8\");
    }
}
                ",
                'order_in_section' => 12
            ],
            [
                'section_id' => 7,
                'title' => 'Stub Test',
                'description' => "Stub Test adalah teknik dalam pengujian unit yang melibatkan penggunaan stub, yaitu objek sederhana yang digunakan sebagai gantinya untuk objek yang sebenarnya dalam pengujian. Stubs biasanya hanya memberikan respons yang telah diprogram sebelumnya terhadap panggilan tertentu dan tidak melakukan logika atau komputasi tambahan.

                Dalam PHPUnit, Anda dapat membuat stub menggunakan fitur bawaan kerangka kerja, atau menggunakan library seperti Prophecy. Stub digunakan ketika Anda ingin mengisolasi unit yang sedang diuji dari ketergantungan eksternal, seperti panggilan ke basis data atau panggilan ke layanan web, sehingga fokus pengujian hanya pada unit itu sendiri.",
                'code' => "<?php

// Saat akan membuat test untuk sebuah class, dan ternyata class tersebut butuh dependency object lain, maka kita bisa membuat object pengganti yang bisa kita konfigurasi agar sesuai dengan keinginan kita
// Teknik ini dinamakan stubbing, dan object pengganti yang kita buat disebut stub
// PHPUnit mendukung pembuatan object stub secara mudah hanya dengan menggunakan function createStub(className) yang terdapat di class TestCase
// method createStub() secara otomatis akan membuat object class atau interface yang kita inginkan dengan default implementation

namespace Path\Test;

use PHPUnit\Framework\TestCase;

class StubTest extends TestCase{
    private ProductRepository \$repository;
    private ProductService \$service;

    protected function setUp(): void
    {
        \$this->repository = \$this->createStub(ProductRepository::class);
        // createStub sealalu mengembalikan default valuenya, contohnya dari product kan ada propertynya dengan mengembalikan tipe data tertentu jadi ya defaulnya aja misal array ya array, ? nullable ya null, dst
        \$this->service = new ProductService(\$this->repository);
    }

    // kalo di ataskan dia cuma membuat data dummy, artinya kosong hanya ada nilai default
    public function testStub()
    {
        \$product = new Product();
        \$product->setId(\"1\");

        //invocation Stub = mengatur Stub supaya ada nilai
        \$this->repository->method(\"findById\")
        ->willReturn(\$product);

        \$result = \$this->repository->findById(\"1\");
        self::assertEquals(\$product, \$result);
    }

    // Stub Map = Behavior Stub menggunakan kondisi
    public function testStubMap()
    {
        \$product1 = new Product();
        \$product1->setId(\"1\");

        \$product2 = new Product();
        \$product2->setId(\"2\");

        \$map = [
            [\"1\", \$product1],
            [\"2\", \$product2],
        ];

        \$this->repository->method(\"findById\")
             ->willReturnMap(\$map);

        self::assertSame(\$product1, \$this->repository->findById(\"1\"));
        self::assertSame(\$product2, \$this->repository->findById(\"2\"));
    }

    // Stub dengan Callback
    public function testStubCallback()
    {
        \$this->repository->method(\"findByid\")
             ->willReturnCallback(function (string \$id){
                \$product = new Product();
                \$product->setId(\$id);
                return \$product;
             });

        self::assertSame(\"1\", \$this->repository->findById(\"1\")->getId());
        self::assertSame(\"2\", \$this->repository->findById(\"2\")->getId());
    }

    // Integrasi Dengan Stub
    // Product Service Test Success
    public function testRegister()
    {
        \$this->repository->method(\"findById\")
             ->willReturn(null);
        \$this->repository->method(\"save\")
             ->willReturnArgument(0);

        \$product = new Product();
        \$product->setId(\"1\");
        \$product->setName(\"Contoh\");

        \$result = \$this->service->register(\$product);

        self::assertEquals(\$product->getId(), \$result->getId());
        self::assertEquals(\$product->getName(), \$result->getName());
    }

    // Product Service Test Gagal
    public function testRegisterFailed()
    {
        \$this->expectException(\Exception::class);

        \$productInDB = new Product();
        \$productInDB->setId(\"1\");
        \$this->repository->method(\"findById\")
             ->willReturn(\$productInDB);

        \$product = new Product();
        \$product->setId(\"1\");
        \$product->setName(\"Contoh\");

        \$this->service->register(\$product);
    }

}
                ",
                'order_in_section' => 13
            ],
            [
                'section_id' => 7,
                'title' => 'Mock Test',
                'description' => "Mock Test adalah teknik dalam pengujian unit yang melibatkan penggunaan objek tiruan yang mensimulasikan perilaku objek yang sebenarnya. Mock objects (mocks) dapat diprogram untuk meniru respons tertentu terhadap panggilan metode yang spesifik.

                Dalam PHPUnit, Anda dapat membuat mock objects menggunakan fitur bawaan kerangka kerja, yang memungkinkan Anda untuk menentukan perilaku yang diharapkan dari objek tiruan tersebut. Mock objects sering digunakan untuk mengisolasi unit yang sedang diuji dari ketergantungan eksternal atau untuk memverifikasi interaksi dengan objek lain dalam unit pengujian.

                Dengan menggunakan mock objects, Anda dapat dengan mudah mensimulasikan berbagai skenario dan kondisi dalam pengujian unit Anda, meningkatkan fleksibilitas dan kontrol dalam pengujian.",
                'code' => "<?php

// PHPUnit memiliki fitur bernama Mock Object
// Mock object sama seperti stub, hanya saja pada mock object, kita bisa melakukan verifikasi berapa banyak sebuah method dipanggil
// Cara membuat mock object adalah dengan menggunakan function createMock(class) yang terdapat pada class TestCase

namespace Path\Test;

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase{
    private ProductRepository \$repository;
    private ProductService \$service;

    protected function setUp(): void
    {
        \$this->repository = \$this->createMock(ProductRepository::class);
        // createStub sealalu mengembalikan default valuenya, contohnya dari product kan ada propertynya dengan mengembalikan tipe data tertentu jadi ya defaulnya aja misal array ya array, ? nullable ya null, dst
        \$this->service = new ProductService(\$this->repository);
    }

    // Perbedaan dengan stub. Kalo mock kita bisa menambahkan ekspetasi pemanggilannya
    // dan juga jumlah interaksi yang terjadi di mocknya
    public function testMock()
    {
        \$product = new Product();
        \$product->setId(\"1\");

        \$this->repository->expects(\$this->once())
             ->method(\"findById\")
             ->willReturn(\$product);

        \$result = \$this->repository->findById(\"1\");
        self::assertSame(\$product, \$result);

    }

    public function testDelete()
    {
        \$product = new Product();
        \$product->setId(\"1\");

        \$this->repository->expects(\$this->once())
             ->method(\"delete\")
             ->with(self::equalTo(\$product));

        \$this->repository->method(\"findById\")
             ->willReturn(\$product)
             ->with(self::equalTo(\"1\"));

        \$this->service->delete(\"1\");
        self::assertTrue(true, \"Success delete\");
    }

    public function testDeleteFailed()
    {
        \$this->repository->expects(\$this->never())
             ->method(\"delete\");

        \$this->expectException(\Exception::class);
        \$this->repository->expects(\$this->once())
             ->method(\"findById\")
             ->willReturn(null)
             ->with(self::equalTo(\"1\"));

        \$this->service->delete(\"1\");
    }

}
                ",
                'order_in_section' => 14
            ],
            [
                'section_id' => 8,
                'title' => 'Melihat Semua Database di MySQL',
                'description' => "Untuk melihat semua database yang ada dalam server MySQL, Anda dapat menggunakan perintah SQL SHOW DATABASES;. Berikut adalah langkah-langkahnya:",
                'code' => "-- 1. Buka terminal atau command prompt.
-- 2. Masuk ke dalam command-line interface MySQL dengan menggunakan perintah seperti berikut (perlu memasukkan kata sandi jika sudah diatur): mysql -u username -p -- Ganti username dengan nama pengguna MySQL Anda.
-- 3. Setelah masuk, ketik perintah berikut untuk melihat semua database:

SHOW DATABASES;

-- 5. Setelah itu, Anda akan melihat daftar semua database yang ada dalam server MySQL.
-- 6. Pastikan Anda memiliki izin yang cukup untuk melihat semua database. Biasanya, pengguna dengan hak akses SELECT pada tabel mysql.db bisa melihat daftar database. Jika tidak memiliki izin yang sesuai, Anda mungkin perlu menghubungi administrator database untuk mendapatkan akses yang diperlukan.",
                'order_in_section' => 1
            ],
            [
                'section_id' => 8,
                'title' => 'Membuat Database',
                'description' => "Untuk membuat sebuah database dalam MySQL, Anda dapat menggunakan perintah CREATE DATABASE. Berikut adalah langkah-langkahnya:",
                'code' => "-- 1. Buka terminal atau command prompt.
-- 2. Masuk ke dalam command-line interface MySQL dengan menggunakan perintah seperti berikut (perlu memasukkan kata sandi jika sudah diatur): mysql -u username -p -- Ganti username dengan nama pengguna MySQL Anda.
-- 3. Setelah masuk, ketik perintah berikut untuk melihat semua database:

CREATE DATABASE nama_database;

-- 5. Setelah itu, Anda akan melihat daftar semua database yang ada dalam server MySQL.
-- 6. Pastikan Anda memiliki izin yang cukup untuk melihat semua database. Biasanya, pengguna dengan hak akses SELECT pada tabel mysql.db bisa melihat daftar database. Jika tidak memiliki izin yang sesuai, Anda mungkin perlu menghubungi administrator database untuk mendapatkan akses yang diperlukan.",
                'order_in_section' => 2
            ],
            [
                'section_id' => 8,
                'title' => 'Memilih Database',
                'description' => "Untuk memilih database tertentu dalam MySQL, Anda dapat menggunakan perintah USE. Berikut adalah langkah-langkahnya:",
                'code' => "-- 1. Buka terminal atau command prompt.
-- 2. Masuk ke dalam command-line interface MySQL dengan menggunakan perintah seperti berikut (perlu memasukkan kata sandi jika sudah diatur): mysql -u username -p -- Ganti username dengan nama pengguna MySQL Anda.
-- 3. Setelah masuk, ketik perintah berikut untuk melihat semua database:

USE nama_database;

-- 5. Setelah itu, Anda akan melihat daftar semua database yang ada dalam server MySQL.
-- 6. Pastikan Anda memiliki izin yang cukup untuk melihat semua database. Biasanya, pengguna dengan hak akses SELECT pada tabel mysql.db bisa melihat daftar database. Jika tidak memiliki izin yang sesuai, Anda mungkin perlu menghubungi administrator database untuk mendapatkan akses yang diperlukan.",
                'order_in_section' => 3
            ],
            [
                'section_id' => 8,
                'title' => 'Menghapus Database',
                'description' => "Untuk menghapus sebuah database dalam MySQL, Anda dapat menggunakan perintah DROP DATABASE. Berikut adalah langkah-langkahnya:",
                'code' => "-- 1. Buka terminal atau command prompt.
-- 2. Masuk ke dalam command-line interface MySQL dengan menggunakan perintah seperti berikut (perlu memasukkan kata sandi jika sudah diatur): mysql -u username -p -- Ganti username dengan nama pengguna MySQL Anda.
-- 3. Setelah masuk, ketik perintah berikut untuk melihat semua database:

DROP DATABASE nama_database;

-- 5. Setelah itu, Anda akan melihat daftar semua database yang ada dalam server MySQL.
-- 6. Pastikan Anda memiliki izin yang cukup untuk melihat semua database. Biasanya, pengguna dengan hak akses SELECT pada tabel mysql.db bisa melihat daftar database. Jika tidak memiliki izin yang sesuai, Anda mungkin perlu menghubungi administrator database untuk mendapatkan akses yang diperlukan.",
                'order_in_section' => 4
            ],
            [
                'section_id' => 8,
                'title' => 'Melihat Table',
                'description' => "Untuk melihat semua tabel yang ada dalam sebuah database MySQL, Anda dapat menggunakan perintah SHOW TABLES;. Namun, Anda harus terlebih dahulu memastikan bahwa Anda sudah memilih database yang tepat menggunakan perintah USE nama_database;. Berikut adalah langkah-langkahnya:",
                'code' => "-- 1. Buka terminal atau command prompt.
-- 2. Masuk ke dalam command-line interface MySQL dengan menggunakan perintah seperti berikut (perlu memasukkan kata sandi jika sudah diatur): mysql -u username -p -- Ganti username dengan nama pengguna MySQL Anda.
-- 3. Setelah masuk, ketik perintah berikut untuk melihat semua database:

SHOW TABLES;

-- 5. Setelah itu, Anda akan melihat daftar semua database yang ada dalam server MySQL.
-- 6. Pastikan Anda memiliki izin yang cukup untuk melihat semua database. Biasanya, pengguna dengan hak akses SELECT pada tabel mysql.db bisa melihat daftar database. Jika tidak memiliki izin yang sesuai, Anda mungkin perlu menghubungi administrator database untuk mendapatkan akses yang diperlukan.",
                'order_in_section' => 5
            ],
            [
                'section_id' => 8,
                'title' => 'Membuat Table',
                'description' => "Untuk membuat sebuah tabel dalam database MySQL, Anda dapat menggunakan perintah CREATE TABLE. Berikut adalah langkah-langkahnya:",
                'code' => "-- 1. Buka terminal atau command prompt.
-- 2. Masuk ke dalam command-line interface MySQL dengan menggunakan perintah seperti berikut (perlu memasukkan kata sandi jika sudah diatur): mysql -u username -p -- Ganti username dengan nama pengguna MySQL Anda.
-- 3. Setelah masuk, ketik perintah berikut untuk melihat semua database:

USE nama_database; -- pilih database dahulu
CREATE TABLE barang
(
    kode INT,
    nama VARCHAR(100),
    harga INT,
    jumlah INT
) ENGINE = InnoDB; -- buat struktur table


-- 5. Setelah itu, Anda akan melihat daftar semua database yang ada dalam server MySQL.
-- 6. Pastikan Anda memiliki izin yang cukup untuk melihat semua database. Biasanya, pengguna dengan hak akses SELECT pada tabel mysql.db bisa melihat daftar database. Jika tidak memiliki izin yang sesuai, Anda mungkin perlu menghubungi administrator database untuk mendapatkan akses yang diperlukan.",
                'order_in_section' => 6
            ],
            [
                'section_id' => 8,
                'title' => 'Melihat Struktur Table',
                'description' => "Untuk melihat struktur atau skema dari sebuah tabel dalam MySQL, Anda dapat menggunakan perintah DESCRIBE atau SHOW COLUMNS FROM. Berikut adalah langkah-langkahnya:",
                'code' => "-- Pastikan Anda sudah masuk ke dalam command-line interface MySQL dengan menggunakan perintah seperti berikut (perlu memasukkan kata sandi jika sudah diatur):

mysql -u username -p --Gantilah username dengan nama pengguna MySQL Anda.

-- Pilih database yang mengandung tabel yang ingin Anda lihat strukturnya dengan perintah USE:
USE nama_database; -- Gantilah nama_database dengan nama database yang berisi tabel yang ingin Anda lihat strukturnya.

-- Setelah itu, Anda dapat menggunakan perintah DESCRIBE atau SHOW COLUMNS FROM diikuti dengan nama tabel yang ingin Anda lihat strukturnya. Berikut adalah contoh menggunakan kedua perintah tersebut:
DESCRIBE nama_tabel;
-- atau
SHOW COLUMNS FROM nama_tabel; -- Gantilah nama_tabel dengan nama tabel yang ingin Anda lihat strukturnya.

-- Anda akan melihat output yang menampilkan struktur dari tabel yang Anda pilih, termasuk nama kolom, tipe data, ukuran, dan informasi lainnya tergantung pada perintah yang Anda gunakan.
-- Perintah DESCRIBE dan SHOW COLUMNS FROM akan memberikan informasi yang sama tentang struktur tabel. Gunakan salah satu perintah sesuai dengan preferensi Anda.",
                'order_in_section' => 7
            ],
            [
                'section_id' => 8,
                'title' => 'Mengubah Table',
                'description' => "Untuk mengubah struktur tabel atau properti tertentu di dalam tabel, Anda bisa menggunakan perintah ALTER TABLE. Berikut adalah beberapa contoh penggunaannya:",
                'code' => "-- Menambahkan Kolom Baru
ALTER TABLE nama_tabel
ADD nama_kolom tipe_data;
-- Contoh:
ALTER TABLE users
ADD tanggal_lahir DATE;

-- Mengubah Nama Kolom:
ALTER TABLE nama_tabel
CHANGE nama_kolom_baru nama_kolom_lama tipe_data;
-- Contoh:
ALTER TABLE users
CHANGE dob tanggal_lahir DATE;

-- Mengubah Tipe Data Kolom
ALTER TABLE nama_tabel
MODIFY nama_kolom tipe_data;
-- Contoh:
ALTER TABLE users
MODIFY tanggal_lahir VARCHAR(20);

-- Menghapus Kolom:
ALTER TABLE nama_tabel
DROP COLUMN nama_kolom;
-- Contoh:
ALTER TABLE users
DROP COLUMN tanggal_lahir;

-- Menambahkan Indeks:
ALTER TABLE nama_tabel
ADD INDEX nama_indeks (nama_kolom);
Contoh:
ALTER TABLE users
ADD INDEX idx_username (username);

-- Menambahkan Primary Key:
ALTER TABLE nama_tabel
ADD PRIMARY KEY (nama_kolom);
Contoh:
ALTER TABLE users
ADD PRIMARY KEY (id);

-- Menambahkan Foreign Key:
ALTER TABLE nama_tabel
ADD CONSTRAINT nama_foreign_key FOREIGN KEY (kolom_referensi) REFERENCES tabel_referensi(kolom_referensi);
-- Contoh:
ALTER TABLE orders
ADD CONSTRAINT fk_customer_id FOREIGN KEY (customer_id) REFERENCES customers(customer_id);

-- Ini hanya beberapa contoh perintah ALTER TABLE yang dapat Anda gunakan untuk mengubah struktur tabel. Pastikan untuk melakukan perubahan dengan hati-hati karena dapat mempengaruhi data yang sudah ada di dalam tabel.",
                'order_in_section' => 8
            ],
            [
                'section_id' => 8,
                'title' => 'Membuat Ulang Table',
                'description' => "Jika Anda ingin \"membuat ulang\" tabel menggunakan TRUNCATE TABLE, Anda perlu memahami perbedaan antara TRUNCATE TABLE dan DROP TABLE.",
                'code' => "-- TRUNCATE TABLE: Menghapus semua data dari tabel, tetapi mempertahankan struktur tabel. Ini secara efektif membuat tabel kosong tetapi tidak menghapus tabel itu sendiri.

-- DROP TABLE: Menghapus seluruh tabel, termasuk strukturnya.

-- Jadi, jika Anda ingin \"membuat ulang\" tabel menggunakan TRUNCATE TABLE, Anda harus mengikuti langkah-langkah berikut:

-- Backup Data (Opsional): Jika Anda ingin menyimpan data yang ada sebelum mengosongkan tabel, Anda dapat mencadangkan (backup) data menggunakan alat pencadangan seperti mysqldump.

-- Truncate Table: Jalankan perintah TRUNCATE TABLE untuk menghapus semua data dari tabel. Pastikan untuk memperhatikan bahwa perintah ini tidak menghapus struktur tabel, hanya mengosongkan datanya.

TRUNCATE TABLE nama_tabel;
-- Gantilah nama_tabel dengan nama tabel yang ingin Anda kosongkan.

-- Jika Diperlukan, Restore Data (Opsional): Jika Anda mencadangkan data sebelumnya, Anda dapat mengimpor (restore) data tersebut ke dalam tabel menggunakan perintah INSERT INTO.

-- Perlu diingat bahwa TRUNCATE TABLE tidak dapat digunakan pada tabel yang memiliki referensi kunci asing (foreign key constraints) ke tabel lain yang belum di-truncate. Jika tabel Anda memiliki ketergantungan dengan tabel lain, Anda mungkin perlu mempertimbangkan untuk menonaktifkan atau menghapus kunci asing tersebut sementara sebelum melakukan TRUNCATE TABLE.",
                'order_in_section' => 9
            ],
            [
                'section_id' => 8,
                'title' => 'Menghapus Table',
                'description' => "Untuk menghapus sebuah tabel dari database MySQL, Anda dapat menggunakan perintah DROP TABLE. Berikut adalah langkah-langkahnya:",
                'code' => "-- Gantilah nama_tabel dengan nama tabel yang ingin Anda hapus.

-- MySQL akan menghapus tabel yang dipilih dari database. Pastikan untuk menjalankan perintah ini dengan hati-hati karena semua data yang ada dalam tabel akan dihapus permanen.
-- Perintah ini akan menghapus seluruh struktur dan data dari tabel yang ditentukan. Pastikan Anda yakin sebelum menjalankan perintah DROP TABLE. Jika Anda perlu menyimpan data atau hanya ingin mengosongkan tabel tanpa menghapus struktur, Anda dapat menggunakan perintah TRUNCATE TABLE, seperti yang dijelaskan sebelumnya.

DROP TABLE nama_tabel;",
                'order_in_section' => 10
            ],
            [
                'section_id' => 8,
                'title' => 'Membuat Tabel Produk',
                'description' => "Berikut ini adalah contoh cara membuat tabel barang/produk.",
                'code' => "CREATE TABLE products
(
    id          VARCHAR(10)  NOT NULL,
    name        VARCHAR(100) NOT NULL,
    description TEXT,
    price       INT UNSIGNED NOT NULL,
    quantity    INT UNSIGNED NOT NULL DEFAULT 0,
    created_at  TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
)
                ",
                'order_in_section' => 11
            ],
            [
                'section_id' => 8,
                'title' => 'Memasukkan Data',
                'description' => "Perintah SQL INSERT INTO digunakan untuk menambahkan satu atau beberapa baris data ke dalam sebuah tabel dalam database. Ini memungkinkan Anda untuk memasukkan nilai-nilai ke dalam kolom-kolom tabel sesuai dengan struktur yang telah ditentukan. Perintah ini umumnya digunakan bersama dengan VALUES untuk menentukan nilai-nilai yang akan dimasukkan ke dalam kolom. Sebagai contoh, \"INSERT INTO nama_tabel (kolom1, kolom2) VALUES (nilai1, nilai2);\" akan memasukkan data baru ke dalam tabel 'nama_tabel' dengan nilai-nilai tertentu untuk kolom 'kolom1' dan 'kolom2'.",
                'code' => "INSERT INTO products(id, name, description, price, quantity)
VALUES ('P002', 'Mie Ayam Special', 'Extra Bakso Tahu', 2000, 100);

-- memasukan data sekaligus
INSERT INTO products(id, name, description, price, quantity)
VALUES ('P002', 'Mie Ayam Special', 'Extra Bakso Tahu', 2000, 100),
VALUES ('P003', 'Mie Ayam Ceker', 'Mie Ayam + Ceker', 2500, 100)
                ",
                'order_in_section' => 12
            ],
            [
                'section_id' => 8,
                'title' => 'Mengambil Data',
                'description' => "Untuk mengambil data dari sebuah tabel dalam MySQL, Anda menggunakan perintah SELECT. Perintah ini memungkinkan Anda untuk memilih data dari satu atau beberapa kolom atau bahkan keseluruhan baris dalam tabel. Berikut adalah penjelasan singkatnya:",
                'code' => "-- Perintah SELECT dapat digunakan dalam beberapa cara:

-- Mengambil Semua Data dari Tabel:
SELECT * FROM nama_tabel;
-- Ini akan mengambil semua data dari tabel nama_tabel.

-- Mengambil Data dari Beberapa Kolom Tertentu:
SELECT kolom1, kolom2 FROM nama_tabel;
-- Ini akan mengambil data dari kolom kolom1 dan kolom2 dari tabel nama_tabel.

-- Mengambil Data dengan Kondisi:
SELECT * FROM nama_tabel WHERE kondisi;
-- Ini akan mengambil data dari tabel nama_tabel yang memenuhi kondisi tertentu.

-- Menggunakan Fungsi Agregat:
SELECT COUNT(*) FROM nama_tabel;
-- Ini akan mengambil jumlah total baris dalam tabel nama_tabel.

-- Mengurutkan Data:
SELECT * FROM nama_tabel ORDER BY kolom ASC/DESC;
-- Ini akan mengambil data dari tabel nama_tabel dan mengurutkannya berdasarkan nilai pada kolom, baik secara naik (ASC) atau turun (DESC).

-- Menggabungkan Data dari Beberapa Tabel:
SELECT t1.kolom1, t2.kolom2 FROM tabel1 AS t1 JOIN tabel2 AS t2 ON t1.id = t2.id;
-- Ini akan menggabungkan data dari tabel1 dan tabel2 berdasarkan kondisi yang diberikan.

-- Perintah SELECT memiliki fleksibilitas yang tinggi dan dapat disesuaikan dengan kebutuhan pencarian data Anda dalam database MySQL.",
                'order_in_section' => 13
            ],
            [
                'section_id' => 8,
                'title' => 'Menambah Primary Key Ketika Membuat Tabel',
                'description' => "Saat membuat sebuah tabel dalam MySQL, kita dapat menentukan satu atau lebih kolom sebagai kunci utama (primary key) menggunakan klausa PRIMARY KEY. Primary key digunakan untuk mengidentifikasi secara unik setiap baris dalam tabel, dan setiap tabel biasanya memiliki satu primary key.",
                'code' => "CREATE TABLE products
(
    id          VARCHAR(10)  NOT NULL,
    name        VARCHAR(100) NOT NULL,
    description TEXT,
    price       INT UNSIGNED NOT NULL,
    quantity    INT UNSIGNED NOT NULL DEFAULT 0,
    created_at  TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
)
                ",
                'order_in_section' => 14
            ],
            [
                'section_id' => 8,
                'title' => 'Menambah Primary Key di Tabel',
                'description' => "Untuk menambahkan primary key ke sebuah tabel yang sudah ada dalam MySQL, Anda dapat menggunakan perintah ALTER TABLE. Berikut adalah langkah-langkahnya:",
                'code' => "ALTER TABLE nama_tabel
ADD PRIMARY KEY (nama_kolom);

-- Dalam perintah ini:
-- nama_tabel adalah nama tabel yang ingin Anda tambahkan primary key.
-- nama_kolom adalah kolom yang ingin Anda atur sebagai primary key.
-- Pastikan bahwa kolom yang Anda pilih untuk menjadi primary key adalah unik dan tidak berisi nilai yang berulang. Primary key digunakan untuk mengidentifikasi secara unik setiap baris dalam tabel.

-- Jika kolom yang Anda pilih belum memiliki nilai unik, Anda mungkin perlu melakukan beberapa langkah tambahan, seperti memperbarui data sehingga setiap baris memiliki nilai yang unik sebelum menambahkan primary key. Selain itu, pastikan bahwa tidak ada nilai NULL di kolom primary key kecuali jika kolom tersebut diizinkan untuk menerima nilai NULL.",
                'order_in_section' => 15
            ],
            [
                'section_id' => 8,
                'title' => 'Mencari Data',
                'description' => "Untuk mencari data dalam sebuah tabel di MySQL, Anda dapat menggunakan perintah SELECT bersama dengan klausa WHERE. Ini memungkinkan Anda untuk menentukan kriteria pencarian yang harus dipenuhi oleh data yang ingin Anda temukan. Berikut adalah langkah-langkahnya:",
                'code' => "SELECT * FROM nama_tabel WHERE kondisi;

-- Dalam perintah ini:
-- nama_tabel adalah nama tabel di mana Anda ingin mencari data.
-- kondisi adalah kriteria pencarian yang harus dipenuhi oleh data.
-- Anda dapat menyesuaikan kondisi sesuai dengan kebutuhan pencarian Anda.gunakan operator logika seperti AND, OR, dan NOT untuk membuat kondisi pencarian yang lebih kompleks. Contoh, \"SELECT * FROM nama_tabel WHERE kriteria1 AND kriteria2\" akan mencari data di mana kriteria1 dan kriteria2 harus dipenuhi.
-- Dengan menggunakan klausa WHERE, Anda dapat melakukan pencarian data yang sangat spesifik dalam tabel MySQL sesuai dengan kebutuhan Anda.",
                'order_in_section' => 16
            ],
            [
                'section_id' => 8,
                'title' => 'Menambah Kolom',
                'description' => "Berikut adalah penjelasan langkah-langkah menambahkan kolom ke sebuah tabel dalam MySQL:",
                'code' => "ALTER TABLE nama_tabel
ADD nama_kolom tipe_data;

-- Dalam perintah ini:
-- nama_tabel adalah nama tabel di mana Anda ingin menambahkan kolom.
-- nama_kolom adalah nama kolom yang ingin Anda tambahkan.
-- tipe_data adalah jenis data yang akan disimpan dalam kolom baru.

-- Contoh:
ALTER TABLE users
ADD umur INT;

-- Dalam perintah ini:
-- nama_tabel adalah users, tabel yang ingin Anda tambahkan kolomnya.
-- nama_kolom adalah umur, kolom yang ingin Anda tambahkan.
-- tipe_data adalah INT, yang menunjukkan tipe data dari kolom yang akan ditambahkan.

-- Setelah menjalankan perintah ini, kolom umur akan ditambahkan ke tabel users. Sekarang tabel users akan memiliki tiga kolom: id, nama, dan umur.",
                'order_in_section' => 17
            ],
            [
                'section_id' => 8,
                'title' => 'Mengubah Satu Kolom',
                'description' => "Berikut adalah penjelasan langkah-langkah mengubah satu kolom di sebuah tabel dalam MySQL:",
                'code' => "ALTER TABLE nama_tabel
MODIFY COLUMN nama_kolom tipe_data;
-- Dalam perintah ini:
-- nama_tabel adalah nama tabel di mana Anda ingin mengubah kolom.
-- nama_kolom adalah nama kolom yang ingin Anda ubah.
-- tipe_data adalah jenis data baru yang akan disimpan dalam kolom yang telah diubah.

-- Contoh:

ALTER TABLE users
MODIFY COLUMN umur VARCHAR(50);
-- Dalam perintah ini:
-- nama_tabel adalah users, tabel di mana kita ingin mengubah kolomnya.
-- nama_kolom adalah umur, kolom yang ingin kita ubah.
-- tipe_data adalah VARCHAR(50), yang menunjukkan tipe data baru untuk kolom yang telah diubah.

-- Setelah menjalankan perintah ini, kolom umur dalam tabel users akan diubah menjadi tipe data VARCHAR(50).",
                'order_in_section' => 18
            ],
            [
                'section_id' => 8,
                'title' => 'Mengubah Beberapa Kolom',
                'description' => "Berikut adalah penjelasan langkah-langkah untuk mengubah beberapa kolom di sebuah tabel dalam MySQL:",
                'code' => "ALTER TABLE nama_tabel
MODIFY COLUMN nama_kolom1 tipe_data1,
MODIFY COLUMN nama_kolom2 tipe_data2,
...;
-- Dalam perintah ini:
-- nama_tabel adalah nama tabel di mana Anda ingin mengubah kolom.
-- nama_kolom1, nama_kolom2, dll., adalah nama-nama kolom yang ingin Anda ubah.
-- tipe_data1, tipe_data2, dll., adalah jenis data baru yang akan disimpan dalam kolom yang telah diubah.

-- Contoh:

sql
Copy code
ALTER TABLE users
MODIFY COLUMN umur VARCHAR(50),
MODIFY COLUMN alamat VARCHAR(255);
-- Dalam perintah ini:
-- nama_tabel adalah users, tabel di mana kita ingin mengubah kolomnya.
-- umur dan alamat adalah nama kolom yang ingin kita ubah.
-- VARCHAR(50) dan VARCHAR(255) adalah jenis data baru untuk kolom yang telah diubah.

-- Setelah menjalankan perintah ini, kolom umur dan alamat dalam tabel users akan diubah sesuai dengan jenis data yang baru.",
                'order_in_section' => 19
            ],
            [
                'section_id' => 8,
                'title' => 'Menghapus Data',
                'description' => "Berikut adalah penjelasan langkah-langkah untuk menghapus data dari sebuah tabel dalam MySQL:",
                'code' => "DELETE FROM nama_tabel WHERE kondisi;
-- Dalam perintah ini:
-- nama_tabel adalah nama tabel dari mana Anda ingin menghapus data.
-- kondisi adalah kriteria yang harus dipenuhi oleh data yang ingin Anda hapus.

-- Contoh:

DELETE FROM users WHERE id > 30;
-- Dalam perintah ini:
-- nama_tabel adalah users, tabel dari mana kita ingin menghapus data.
-- umur > 30 adalah kondisi di mana data dengan nilai kolom umur lebih dari 30 akan dihapus dari tabel.

-- Setelah menjalankan perintah ini, semua data yang memenuhi kondisi tertentu akan dihapus dari tabel users. Pastikan untuk menggunakan kondisi dengan hati-hati untuk memastikan bahwa hanya data yang dimaksud yang dihapus.",
                'order_in_section' => 20
            ],
            [
                'section_id' => 8,
                'title' => 'Alias',
                'description' => "Alias digunakan dalam SQL untuk memberikan nama alternatif atau singkat kepada tabel atau kolom. Ini berguna ketika Anda ingin merujuk ke tabel atau kolom dengan nama yang lebih mudah dibaca atau singkat. Berikut adalah cara menggunakan alias untuk tabel dan kolom dalam perintah SQL:",
                'code' => "SELECT a.id, a.nama, b.umur
FROM users AS a
JOIN user_details AS b ON a.id = b.user_id;
-- Dalam contoh ini:
-- a adalah alias untuk tabel users.
-- b adalah alias untuk tabel user_details.
-- Penggunaan AS adalah opsional.

-- Alias untuk Kolom:
SELECT id AS user_id, nama AS user_name
FROM users;
-- Dalam contoh ini:
-- user_id adalah alias untuk kolom id dari tabel users.
-- user_name adalah alias untuk kolom nama dari tabel users.

-- Penggunaan alias membuat perintah SQL lebih mudah dibaca dan memungkinkan Anda untuk menulis kueri dengan lebih singkat. Pastikan untuk memilih alias yang jelas dan deskriptif agar kode SQL Anda mudah dimengerti oleh orang lain yang membacanya.",
                'order_in_section' => 21
            ],
            [
                'section_id' => 8,
                'title' => 'Operator Where',
                'description' => "Operator WHERE digunakan dalam SQL untuk menentukan kriteria pencarian dalam perintah SELECT, UPDATE, atau DELETE. Ini memungkinkan Anda untuk memfilter baris yang akan diambil, diperbarui, atau dihapus dari tabel berdasarkan kondisi tertentu. Berikut adalah penjelasan singkat tentang penggunaan operator WHERE:",
                'code' => "SELECT kolom1, kolom2
FROM nama_tabel
WHERE kondisi;
-- Dalam perintah ini:
-- kolom1, kolom2 adalah kolom yang ingin Anda ambil dari tabel.
-- nama_tabel adalah nama tabel dari mana Anda ingin mengambil data.
-- kondisi adalah kriteria pencarian yang harus dipenuhi oleh data yang ingin Anda ambil.

-- Contoh:
SELECT * FROM users WHERE id > 30;
-- Dalam contoh ini, perintah SELECT akan mengambil semua kolom dari tabel 'users' di mana nilai di kolom 'umur' lebih besar dari 30.

-- Contoh Lebih Kompleks:
SELECT id, name, price FROM products
WHERE (category = 'Makanan' OR price BETWEEN 10000 AND 20000)
AND name LIKE '%mie%'
ORDER BY price ASC, id DESC;",
                'order_in_section' => 22
            ],
            [
                'section_id' => 8,
                'title' => 'Membatasi Hasil Query(2) dan Skip Hasil Query(2)',
                'description' => "Untuk membatasi hasil query, Anda dapat menggunakan klausa LIMIT, sedangkan untuk melewatkan hasil query, Anda dapat menggunakan klausa OFFSET",
                'code' => "-- Memuatkan Jumlah Terbatas dari Hasil Query:
SELECT kolom1, kolom2
FROM nama_tabel
LIMIT jumlah_baris;
-- Dalam perintah ini:
-- jumlah_baris adalah jumlah baris yang ingin Anda kembalikan dari hasil query.

-- Melewatkan Sejumlah Baris dari Hasil Query:
SELECT kolom1, kolom2
FROM nama_tabel
LIMIT jumlah_baris OFFSET offset;
-- Dalam perintah ini:
-- jumlah_baris adalah jumlah baris yang ingin Anda kembalikan, sedangkan offset adalah jumlah baris yang ingin Anda lewati sebelum memulai pengambilan hasil query.

--Contoh:
SELECT * FROM users LIMIT 10 OFFSET 5;
-- Dalam contoh ini, akan mengembalikan 10 baris dari tabel users, melewati 5 baris pertama, sehingga dimulai dari baris ke-6.

--Contoh:
SELECT * FROM products WHERE price > 0 ORDER BY price LIMIT 2, 2;",
                'order_in_section' => 23
            ],
            [
                'section_id' => 8,
                'title' => 'Select Distinct Data',
                'description' => "Pernyataan SQL SELECT DISTINCT digunakan untuk mengambil nilai yang unik dari kolom atau gabungan kolom dalam tabel.",
                'code' => "SELECT DISTINCT kolom1, kolom2
FROM nama_tabel;
-- Dalam perintah ini:
-- kolom1, kolom2 adalah kolom yang ingin Anda ambil nilai uniknya.
-- nama_tabel adalah nama tabel dari mana Anda ingin mengambil data.

-- Contoh:

SELECT DISTINCT kota
FROM users;
-- Dalam contoh ini, perintah SELECT akan mengembalikan nilai unik dari kolom kota dari tabel users.",
                'order_in_section' => 24
            ],
            [
                'section_id' => 8,
                'title' => 'Numeric Function',
                'description' => "Fungsi numerik dalam SQL digunakan untuk melakukan operasi matematika pada nilai numerik dalam kolom atau ekspresi.",
                'code' => "-- 1. SUM(): Menghitung total dari nilai dalam sebuah kolom.
SELECT SUM(kolom_numerik) FROM nama_tabel;

-- 2. AVG(): Menghitung rata-rata dari nilai dalam sebuah kolom.
SELECT AVG(kolom_numerik) FROM nama_tabel;

-- 3. MIN(): Menemukan nilai minimum dari sebuah kolom.
SELECT MIN(kolom_numerik) FROM nama_tabel;

-- 4. MAX(): Menemukan nilai maksimum dari sebuah kolom.
SELECT MAX(kolom_numerik) FROM nama_tabel;

-- 5. COUNT(): Menghitung jumlah baris atau nilai dalam sebuah kolom.
SELECT COUNT(kolom_numerik) FROM nama_tabel;

-- Menghitung total harga dan rata-rata harga dari produk.
SELECT SUM(harga) AS total_harga, AVG(harga) AS rata_harga
FROM produk;

-- Contoh lain:
SELECT 10 +10 as hasil;

SELECT id, price DIV 1000 as 'Price in K'
FROM products;

SELECT PI();
SELECT POWER(10,2);
                ",
                'order_in_section' => 25
            ],
            [
                'section_id' => 8,
                'title' => 'Melihat Id Terakhir',
                'description' => "Berikut adalah penjelasan untuk melihat ID terakhir",
                'code' => "SELECT MAX(id) AS id_terakhir
FROM nama_tabel;
-- Dalam perintah ini:
-- MAX(id) akan mengambil nilai maksimum dari kolom id, yang merupakan ID terakhir.
-- nama_tabel adalah nama tabel dari mana Anda ingin mengambil data.

-- Contoh:
SELECT MAX(id) AS id_terakhir
FROM users;
-- Dalam contoh ini, perintah SELECT akan mengembalikan nilai maksimum dari kolom id dari tabel users, yang merupakan ID terakhir yang ada dalam tabel.

-- Contoh lain:
SELECT LAST_INSERT_ID();",
                'order_in_section' => 26
            ],
            [
                'section_id' => 8,
                'title' => 'String Function',
                'description' => "Fungsi string dalam SQL adalah serangkaian fungsi yang digunakan untuk melakukan operasi pada data string. Ini mencakup fungsi-fungsi seperti CONCAT untuk menggabungkan string, LENGTH untuk menghitung panjang string, SUBSTRING untuk mengambil bagian dari string, UPPER untuk mengonversi huruf menjadi huruf besar, dan LOWER untuk mengonversi huruf menjadi huruf kecil. Fungsi-fungsi ini membantu dalam manipulasi dan analisis teks dalam database.",
                'code' => "-- 1. CONCAT(): Menggabungkan dua atau lebih string menjadi satu.
SELECT CONCAT(kolom1, ' ', kolom2) AS gabungan FROM nama_tabel;

-- 2. LENGTH(): Menghitung jumlah karakter dalam sebuah string.
SELECT LENGTH(kolom_string) FROM nama_tabel;

-- 3. SUBSTRING(): Mengambil bagian dari sebuah string berdasarkan posisi dan panjang tertentu.
SELECT SUBSTRING(kolom_string, posisi, panjang) FROM nama_tabel;

-- 4. UPPER(): Mengubah semua huruf dalam sebuah string menjadi huruf kapital.
SELECT UPPER(kolom_string) FROM nama_tabel;

-- 5. LOWER(): Mengubah semua huruf dalam sebuah string menjadi huruf kecil.
SELECT LOWER(kolom_string) FROM nama_tabel;

-- Menggabungkan kolom nama_depan dan nama_belakang menjadi nama_lengkap.
SELECT CONCAT(nama_depan, ' ', nama_belakang) AS nama_lengkap
FROM users;

-- Contoh lain:
SELECT id, LOWER(name) as 'Name Lower' FROM products;
SELECT id, name, LENGTH(name) as 'Name Length' FROM products;
                ",
                'order_in_section' => 27
            ],
            [
                'section_id' => 8,
                'title' => 'Date dan Time Function',
                'description' => "Fungsi Tanggal dan Waktu dalam SQL digunakan untuk melakukan operasi pada data tanggal dan waktu.",
                'code' => "-- 1. CURRENT_DATE: Mengembalikan tanggal saat ini.
SELECT CURRENT_DATE;

-- 2. CURRENT_TIME: Mengembalikan waktu saat ini.
SELECT CURRENT_TIME;

-- 3. CURRENT_TIMESTAMP: Mengembalikan tanggal dan waktu saat ini.
SELECT CURRENT_TIMESTAMP;

-- 4. DATE_FORMAT: Mengubah format dari tanggal atau waktu.
SELECT DATE_FORMAT(tanggal, 'format_baru') FROM nama_tabel;
-- Contoh:
SELECT DATE_FORMAT(tanggal, '%d-%m-%Y') FROM log_kehadiran;

-- 5. DATE_ADD: Menambahkan interval ke tanggal atau waktu.
SELECT DATE_ADD(tanggal, INTERVAL ekspresi) FROM nama_tabel;
-- Contoh:
SELECT DATE_ADD(tanggal, INTERVAL 7 DAY) FROM log_kehadiran;

-- Contoh lain:
SELECT id,
    EXTRACT(YEAR FROM created_at) AS 'Year',
    EXTRACT(MONTH FROM created_at) AS 'Month'
FROM products;

SELECT id, YEAR(created_at), MONTH(created_at) FROM products;",
                'order_in_section' => 28
            ],
            [
                'section_id' => 8,
                'title' => 'Flow Control Function',
                'description' => "Fungsi kontrol alur dalam SQL digunakan untuk mengontrol jalannya eksekusi pernyataan SQL berdasarkan kondisi tertentu.",
                'code' => "-- MySQL memiliki fitur flow control function
-- Ini mirip IF ELSE di bahasa pemrograman
-- Tapi ingat, fitur ini tidak se kompleks yang dimiliki bahasa pemrograman

-- 1. IF(): Menggunakan pernyataan IF untuk mengembalikan nilai berdasarkan kondisi yang diberikan.
SELECT IF(kondisi, nilai_jika_benar, nilai_jika_salah) AS hasil;

-- 2. CASE WHEN: Menjalankan ekspresi berdasarkan kondisi tertentu.
SELECT
    CASE
        WHEN kondisi_1 THEN nilai_1
        WHEN kondisi_2 THEN nilai_2
        ELSE nilai_3
    END AS hasil;

-- 3. COALESCE(): Mengembalikan nilai pertama yang tidak NULL dari daftar nilai.
SELECT COALESCE(nilai_1, nilai_2, ...) AS hasil;

-- Menggunakan pernyataan IF untuk mengembalikan nilai berdasarkan kondisi yang diberikan.
SELECT IF(umur > 18, 'Dewasa', 'Anak-anak') AS kategori_umur
FROM pengguna;

-- Menjalankan ekspresi berdasarkan kondisi tertentu.
SELECT
    CASE
        WHEN nilai >= 90 THEN 'A'
        WHEN nilai >= 80 THEN 'B'
        WHEN nilai >= 70 THEN 'C'
        ELSE 'D'
    END AS nilai_huruf
FROM hasil_ujian;

-- Mengembalikan nilai pertama yang tidak NULL dari daftar nilai.
SELECT COALESCE(alamat_rumah, alamat_kantor, 'Alamat tidak tersedia') AS alamat_pengguna
FROM data_pengguna;

-- Contoh lain:
SELECT id,
    CASE category
        WHEN 'Makanan' THEN 'Enak'
        WHEN 'Minuman' THEN 'Segar'
        ELSE '?'
        END AS 'Category'
FROM products;

-- Menggunakan Control Flow If
SELECT id,
       price,
       IF(price <= 15000, 'Murah'
           IF(price < 20000, 'Mahal','Mahal Banget')
           ) AS 'Tingkat'
FROM products;

-- IFNULL
SELECT id, name, IFNULL(description, 'kosong')
FROM products;",
                'order_in_section' => 29
            ],
            [
                'section_id' => 8,
                'title' => 'Aggregate Function',
                'description' => "Fungsi agregat dalam SQL digunakan untuk melakukan operasi pada sekelompok nilai dan mengembalikan hasil agregasi.",
                'code' => "-- 1. COUNT(): Menghitung jumlah baris atau nilai dalam sebuah kolom.
SELECT COUNT(kolom) FROM nama_tabel;

-- 2. SUM(): Menghitung total dari nilai dalam sebuah kolom.
SELECT SUM(kolom) FROM nama_tabel;

-- 3. AVG(): Menghitung rata-rata dari nilai dalam sebuah kolom.
SELECT AVG(kolom) FROM nama_tabel;

-- 4. MIN(): Menemukan nilai minimum dari sebuah kolom.
SELECT MIN(kolom) FROM nama_tabel;

-- 5. MAX(): Menemukan nilai maksimum dari sebuah kolom.
SELECT MAX(kolom) FROM nama_tabel;

-- Contoh:

-- Menghitung jumlah pengguna yang terdaftar dalam tabel pengguna.
SELECT COUNT(id) AS total_pengguna FROM pengguna;

-- Menghitung total saldo dari semua rekening dalam tabel rekening.
SELECT SUM(saldo) AS total_saldo FROM rekening;

-- Menghitung rata-rata usia dari semua pengguna dalam tabel pengguna.
SELECT AVG(usia) AS rata_usia FROM pengguna;

-- Menemukan tanggal transaksi paling awal dalam tabel transaksi.
SELECT MIN(tanggal) AS tanggal_awal FROM transaksi;

-- Menemukan tanggal transaksi paling baru dalam tabel transaksi.
SELECT MAX(tanggal) AS tanggal_terbaru FROM transaksi;",
                'order_in_section' => 30
            ],
            [
                'section_id' => 8,
                'title' => 'Group By',
                'description' => "Klausa GROUP BY dalam SQL digunakan untuk mengelompokkan baris berdasarkan nilai dalam satu atau beberapa kolom.",
                'code' => "-- 1. Mengelompokkan baris berdasarkan nilai dalam satu kolom.
SELECT kolom1, AGGREGATE_FUNCTION(kolom2)
FROM nama_tabel
GROUP BY kolom1;

-- 2. Mengelompokkan baris berdasarkan nilai dalam beberapa kolom.
SELECT kolom1, kolom2, AGGREGATE_FUNCTION(kolom3)
FROM nama_tabel
GROUP BY kolom1, kolom2;

-- Contoh:

-- Mengelompokkan pengguna berdasarkan jenis kelamin dan menghitung jumlah pengguna untuk setiap jenis kelamin.
SELECT jenis_kelamin, COUNT(*) AS total_pengguna
FROM pengguna
GROUP BY jenis_kelamin;

-- Mengelompokkan transaksi berdasarkan tanggal dan menghitung total nilai transaksi untuk setiap tanggal.
SELECT DATE(tanggal) AS tanggal_transaksi, SUM(nilai_transaksi) AS total_transaksi
FROM transaksi
GROUP BY DATE(tanggal);",
                'order_in_section' => 31
            ],
            [
                'section_id' => 8,
                'title' => 'HAVING Clause',
                'description' => "Klausa HAVING dalam SQL digunakan untuk menentukan kriteria pencarian pada hasil agregat.",
                'code' => "-- Menggunakan HAVING dengan klausa GROUP BY untuk menentukan kriteria pada hasil agregat.
SELECT kolom1, AGGREGATE_FUNCTION(kolom2)
FROM nama_tabel
GROUP BY kolom1
HAVING kriteria;

-- Mengelompokkan pengguna berdasarkan jenis kelamin dan menghitung jumlah pengguna untuk setiap jenis kelamin, tetapi hanya menampilkan jenis kelamin yang memiliki lebih dari 10 pengguna.
SELECT jenis_kelamin, COUNT(*) AS total_pengguna
FROM pengguna
GROUP BY jenis_kelamin
HAVING COUNT(*) > 10;

-- Mengelompokkan produk berdasarkan kategori dan menghitung jumlah produk untuk setiap kategori, tetapi hanya menampilkan kategori yang memiliki total stok lebih dari 100.
SELECT kategori, COUNT(*) AS total_produk
FROM produk
GROUP BY kategori
HAVING SUM(stok) > 100;",
                'order_in_section' => 32
            ],
            [
                'section_id' => 8,
                'title' => 'Membuat Table dengan Unique Constraint',
                'description' => "Unique Constraint digunakan untuk memastikan bahwa setiap nilai dalam kolom tertentu di tabel adalah unik atau tidak memiliki duplikat. Ini membantu mencegah duplikasi data yang tidak diinginkan di dalam tabel. Dengan menerapkan Unique Constraint pada sebuah kolom, database akan mencegah penambahan data baru yang memiliki nilai yang sama dengan data yang sudah ada dalam kolom tersebut.",
                'code' => "CREATE TABLE nama_tabel (
    kolom1 tipe_data,
    kolom2 tipe_data,
    ...
    UNIQUE (kolom1)
);
-- Dalam perintah ini:
-- nama_tabel adalah nama tabel yang ingin Anda buat.
-- kolom1, kolom2, ... adalah kolom yang ingin Anda buat dalam tabel.
-- tipe_data adalah jenis data untuk setiap kolom.
-- UNIQUE (kolom1) menentukan bahwa nilai di kolom1 harus unik, tidak boleh ada duplikat.

-- Contoh:
CREATE TABLE pengguna (
    id INT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100) UNIQUE
);
-- Dalam contoh ini, tabel \"pengguna\" dibuat dengan kolom \"id\" sebagai primary key dan kolom \"email\" dengan Unique Constraint untuk memastikan bahwa setiap alamat email dalam tabel harus unik.",
                'order_in_section' => 33
            ],
            [
                'section_id' => 8,
                'title' => 'Menambah/Menghapus Unique Constraint',
                'description' => "Untuk menambah atau menghapus Unique Constraint pada kolom dalam sebuah tabel, Anda perlu menggunakan perintah ALTER TABLE. Berikut adalah penjelasan dan contoh penggunaannya:",
                'code' => "-- Menambah Unique Constraint:
ALTER TABLE nama_tabel
ADD CONSTRAINT nama_constraint UNIQUE (kolom);
-- Dalam perintah ini:
-- nama_tabel adalah nama tabel yang ingin Anda tambahkan Unique Constraint.
-- nama_constraint adalah nama constraint yang ingin Anda berikan.
-- kolom adalah kolom yang akan memiliki Unique Constraint.

-- Contoh:
ALTER TABLE pengguna
ADD CONSTRAINT email_unique UNIQUE (email);
-- Dalam contoh ini, Unique Constraint ditambahkan pada kolom \"email\" dalam tabel \"pengguna\".

-- Menghapus Unique Constraint:
ALTER TABLE nama_tabel
DROP CONSTRAINT nama_constraint;
-- Dalam perintah ini:
-- nama_tabel adalah nama tabel yang memiliki Unique Constraint.
-- nama_constraint adalah nama Unique Constraint yang ingin Anda hapus.

-- Contoh:
ALTER TABLE pengguna
DROP CONSTRAINT email_unique;
-- Dalam contoh ini, Unique Constraint dengan nama \"email_unique\" pada tabel \"pengguna\" dihapus.",
                'order_in_section' => 34
            ],
            [
                'section_id' => 8,
                'title' => 'Membuat Table dengan Check Constraint',
                'description' => "Check Constraint digunakan untuk memastikan bahwa nilai yang dimasukkan ke dalam kolom tertentu memenuhi kriteria tertentu atau kondisi yang ditetapkan. Hal ini membantu memastikan integritas data di dalam tabel, karena database akan mencegah nilai-nilai yang tidak valid dimasukkan ke dalam kolom tersebut. Sebagai contoh, dengan Check Constraint, Anda dapat memastikan bahwa nilai umur yang dimasukkan ke dalam kolom \"umur\" harus lebih besar dari atau sama dengan 18, atau bahwa nilai status di kolom \"status_pengguna\" hanya bisa berupa \"aktif\" atau \"nonaktif\". Dengan demikian, Check Constraint membantu untuk menjaga konsistensi data dan mencegah data yang tidak valid dimasukkan ke dalam tabel.",
                'code' => "CREATE TABLE nama_tabel (
    kolom1 tipe_data,
    kolom2 tipe_data,
    ...
    CONSTRAINT nama_constraint CHECK (kondisi)
);

-- Dalam perintah ini:
-- nama_tabel adalah nama tabel yang ingin Anda buat.
-- kolom1, kolom2, ... adalah kolom yang ingin Anda buat dalam tabel.
-- tipe_data adalah jenis data untuk setiap kolom.
-- nama_constraint adalah nama untuk constraint yang akan ditambahkan.
-- kondisi adalah kondisi yang harus dipenuhi oleh nilai di kolom yang ditentukan.

-- Contoh:
CREATE TABLE pengguna (
    id INT PRIMARY KEY,
    nama VARCHAR(100),
    umur INT,
    CONSTRAINT umur_check CHECK (umur >= 18)
);
-- Dalam contoh ini, tabel \"pengguna\" dibuat dengan kolom \"umur\" dan diberi Check Constraint untuk memastikan bahwa nilai umur harus lebih besar atau sama dengan 18.
",
                'order_in_section' => 35
            ],
            [
                'section_id' => 8,
                'title' => 'Menambah/Menghapus Check Constraint',
                'description' => "Check Constraint adalah fitur dalam SQL yang memungkinkan Anda untuk menentukan suatu kondisi yang harus dipenuhi oleh nilai di kolom dalam tabel. Kegunaannya adalah untuk memastikan bahwa data yang dimasukkan ke dalam tabel memenuhi syarat atau batasan tertentu sesuai dengan logika bisnis atau aturan tertentu yang diinginkan.",
                'code' => "-- Untuk menambah Check Constraint:
ALTER TABLE nama_tabel
ADD CONSTRAINT nama_constraint CHECK (kondisi);
-- Untuk menghapus Check Constraint:
ALTER TABLE nama_tabel
DROP CONSTRAINT nama_constraint;

-- Dalam perintah-perintah di atas:
-- nama_tabel adalah nama tabel yang ingin Anda ubah.
-- nama_constraint adalah nama yang diberikan untuk constraint yang ingin Anda tambahkan atau hapus.
-- kondisi adalah kondisi atau batasan yang ingin Anda terapkan pada Check Constraint.

-- Contoh:
-- Menambah Check Constraint
ALTER TABLE pengguna
ADD CONSTRAINT check_umur CHECK (umur >= 18);

-- Menghapus Check Constraint
ALTER TABLE pengguna
DROP CONSTRAINT check_umur;
-- Dalam contoh di atas, kita menambahkan sebuah Check Constraint bernama check_umur pada tabel pengguna untuk memastikan bahwa nilai di kolom umur harus lebih besar atau sama dengan 18. Kemudian, kita menghapus Check Constraint tersebut dari tabel pengguna.",
                'order_in_section' => 36
            ],
            [
                'section_id' => 8,
                'title' => 'Membuat Table dengan Index',
                'description' => "Index dalam MySQL adalah struktur data yang digunakan untuk mempercepat proses pencarian data dalam tabel. Kegunaannya adalah untuk meningkatkan kinerja query dengan mempercepat waktu eksekusi dan mengurangi beban pada server database.",
                'code' => "-- Untuk membuat sebuah tabel dengan index:
CREATE TABLE nama_tabel (
    nama_kolom1 tipe_data,
    nama_kolom2 tipe_data,
    ...
    INDEX nama_index (nama_kolom)
);

-- Dalam perintah di atas:
-- nama_tabel adalah nama tabel yang ingin Anda buat.
-- nama_kolom adalah nama kolom yang ingin Anda indeks.
-- tipe_data adalah tipe data dari kolom tersebut.
-- nama_index adalah nama yang Anda berikan untuk index yang ingin Anda buat.

-- Contoh:
-- Membuat tabel dengan index pada kolom 'nama' di tabel 'pengguna':
CREATE TABLE pengguna (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50),
    email VARCHAR(50),
    INDEX idx_nama (nama)
);
-- Dalam contoh di atas, kita membuat tabel 'pengguna' dengan sebuah index bernama 'idx_nama' pada kolom 'nama' untuk meningkatkan kinerja pencarian data berdasarkan nama.",
                'order_in_section' => 37
            ],
            [
                'section_id' => 8,
                'title' => 'Menambah/Menghapus Index',
                'description' => "Index dalam MySQL adalah struktur data yang digunakan untuk mempercepat proses pencarian data dalam tabel. Kegunaannya adalah untuk meningkatkan kinerja query dengan mempercepat waktu eksekusi dan mengurangi beban pada server database.",
                'code' => "-- Untuk menambahkan index pada sebuah tabel:
ALTER TABLE nama_tabel
ADD INDEX nama_index (nama_kolom);

-- Untuk menghapus index dari sebuah tabel:
ALTER TABLE nama_tabel
DROP INDEX nama_index;

-- Dalam perintah-perintah di atas:
-- nama_tabel adalah nama tabel yang ingin Anda ubah.
-- nama_index adalah nama yang Anda berikan untuk index yang ingin Anda tambahkan atau hapus.
-- nama_kolom adalah nama kolom yang ingin Anda indeks.

-- Contoh:
-- Menambahkan index pada kolom 'email' di tabel 'pengguna':
ALTER TABLE pengguna
ADD INDEX idx_email (email);

-- Menghapus index 'idx_email' dari tabel 'pengguna':
ALTER TABLE pengguna
DROP INDEX idx_email;
-- Dalam contoh di atas, kita menambahkan index pada kolom 'email' di tabel 'pengguna' untuk meningkatkan kinerja pencarian data berdasarkan email. Kemudian, kita menghapus index tersebut dari tabel 'pengguna'.",
                'order_in_section' => 38
            ],
            [
                'section_id' => 8,
                'title' => 'Full-Text Search',
                'description' => "Full-text search adalah fitur dalam MySQL yang memungkinkan Anda untuk melakukan pencarian teks yang lebih fleksibel dan efisien dalam sebuah kolom teks. Kegunaannya adalah untuk memungkinkan pengguna untuk melakukan pencarian teks bebas dalam kolom teks, termasuk kata-kata parsial, stemming, dan pencarian dengan bobot.",
                'code' => "-- Untuk membuat indeks full-text pada sebuah tabel:
ALTER TABLE nama_tabel
ADD FULLTEXT INDEX nama_index (nama_kolom);

-- Untuk melakukan pencarian full-text:
SELECT * FROM nama_tabel
WHERE MATCH(nama_kolom) AGAINST ('kata_kunci');

-- Dalam perintah-perintah di atas:
-- nama_tabel adalah nama tabel yang ingin Anda ubah atau query.
-- nama_index adalah nama yang Anda berikan untuk indeks full-text yang ingin Anda buat.
-- nama_kolom adalah nama kolom teks yang ingin Anda gunakan untuk pencarian full-text.
-- kata_kunci adalah kata atau frasa yang ingin Anda cari dalam kolom teks.

-- Contoh:
-- Membuat indeks full-text pada kolom 'deskripsi' di tabel 'produk':
ALTER TABLE produk
ADD FULLTEXT INDEX idx_deskripsi (deskripsi);

-- Melakukan pencarian full-text dalam kolom 'deskripsi' di tabel 'produk':
SELECT * FROM produk
WHERE MATCH(deskripsi) AGAINST ('sepatu casual');
-- Dalam contoh di atas, kita membuat indeks full-text pada kolom 'deskripsi' di tabel 'produk' untuk memungkinkan pencarian teks bebas dalam deskripsi produk. Kemudian, kita melakukan pencarian full-text untuk mencari produk yang memiliki deskripsi yang mengandung kata 'sepatu casual'.",
                'order_in_section' => 39
            ],
            [
                'section_id' => 8,
                'title' => 'Menambah/Menghapus Full-Text Search',
                'description' => "Full-text search adalah fitur dalam MySQL yang memungkinkan Anda untuk melakukan pencarian teks yang lebih fleksibel dan efisien dalam sebuah kolom teks. Kegunaannya adalah untuk memungkinkan pengguna untuk melakukan pencarian teks bebas dalam kolom teks, termasuk kata-kata parsial, stemming, dan pencarian dengan bobot.",
                'code' => "-- Untuk menambahkan full-text search pada sebuah tabel:
ALTER TABLE nama_tabel
ADD FULLTEXT INDEX nama_index (nama_kolom);

-- Untuk menghapus full-text search dari sebuah tabel:
ALTER TABLE nama_tabel
DROP INDEX nama_index;

-- Dalam perintah-perintah di atas:
-- nama_tabel adalah nama tabel yang ingin Anda ubah.
-- nama_index adalah nama yang Anda berikan untuk indeks full-text yang ingin Anda tambahkan atau hapus.
-- nama_kolom adalah nama kolom teks yang ingin Anda gunakan untuk pencarian full-text.

-- Contoh:
-- Menambahkan full-text search pada kolom 'deskripsi' di tabel 'produk':
ALTER TABLE produk
ADD FULLTEXT INDEX idx_deskripsi (deskripsi);

-- Menghapus full-text search index 'idx_deskripsi' dari tabel 'produk':
ALTER TABLE produk
DROP INDEX idx_deskripsi;
-- Dalam contoh di atas, kita menambahkan full-text search pada kolom 'deskripsi' di tabel 'produk' untuk memungkinkan pencarian teks bebas dalam deskripsi produk. Kemudian, kita menghapus indeks full-text tersebut dari tabel 'produk'.",
                'order_in_section' => 40
            ],
            [
                'section_id' => 8,
                'title' => 'Mencari dengan Natural Language Mode',
                'description' => "Mode Natural Language dalam pencarian MySQL memungkinkan Anda untuk melakukan pencarian menggunakan bahasa alami atau kalimat sehari-hari. Ini memungkinkan pengguna untuk melakukan pencarian tanpa perlu memikirkan sintaks khusus atau operator tertentu.",
                'code' => "-- Untuk melakukan pencarian dengan Natural Language Mode:
SELECT * FROM nama_tabel
WHERE MATCH(nama_kolom) AGAINST ('kata_kunci' IN NATURAL LANGUAGE MODE);

-- Dalam perintah di atas:
-- nama_tabel adalah nama tabel yang ingin Anda cari.
-- nama_kolom adalah nama kolom di dalam tabel yang ingin Anda cari.
-- kata_kunci adalah kata atau kalimat yang ingin Anda cari dalam kolom tersebut.

-- Contoh:
-- Melakukan pencarian dengan Natural Language Mode pada kolom 'deskripsi' di tabel 'produk':
SELECT * FROM produk
WHERE MATCH(deskripsi) AGAINST ('sepatu casual' IN NATURAL LANGUAGE MODE);
-- Dalam contoh di atas, kita melakukan pencarian menggunakan Natural Language Mode pada kolom 'deskripsi' di tabel 'produk' untuk mencari produk yang deskripsinya mengandung kata 'sepatu casual'.

-- Contoh lain:
SELECT * FROM products WHERE MATCH(name, description) AGAINST('ayam' IN NATURAL LANGUAGE MODE);",
                'order_in_section' => 41
            ],
            [
                'section_id' => 8,
                'title' => 'Mencari dengan Boolean Mode',
                'description' => "Mode Boolean dalam pencarian MySQL memungkinkan Anda untuk melakukan pencarian menggunakan operator logika seperti AND, OR, NOT, dan tanda kurung untuk menggabungkan kata kunci. Ini memberikan fleksibilitas yang lebih besar dalam mengatur pencarian dan meningkatkan akurasi hasil pencarian.",
                'code' => "SELECT * FROM nama_tabel
WHERE MATCH(nama_kolom) AGAINST ('kata_kunci1 kata_kunci2' IN BOOLEAN MODE);

-- Dalam perintah di atas:
-- nama_tabel adalah nama tabel yang ingin Anda cari.
-- nama_kolom adalah nama kolom di dalam tabel yang ingin Anda cari.
-- kata_kunci1 dan kata_kunci2 adalah kata kunci atau frasa yang ingin Anda cari dalam kolom tersebut.

-- Contoh:
-- Melakukan pencarian dengan Boolean Mode pada kolom 'deskripsi' di tabel 'produk':
SELECT * FROM produk
WHERE MATCH(deskripsi) AGAINST ('sepatu AND casual' IN BOOLEAN MODE);
-- Dalam contoh di atas, kita melakukan pencarian dengan Boolean Mode pada kolom 'deskripsi' di tabel 'produk' untuk mencari produk yang deskripsinya mengandung kata 'sepatu' dan 'casual'.

-- Contoh lain:
SELECT * FROM products WHERE MATCH(name, description) AGAINST('+mie -bakso' IN BOOLEAN MODE);",
                'order_in_section' => 42
            ],
            [
                'section_id' => 8,
                'title' => 'Mencari dengan Query Expansion Mode',
                'description' => "Query Expansion, yaitu mencari seperti natural language, namun melakukan dua kali pencarian,
                pencarian pertama menggunakan natural language, pencarian kedua melakukan pencarian dari
                kedekatan hasil pertama, misal kita mencari kata “bakso”, lalu ternyata di dalam “bakso” ada kata
                “mie”, maka kemungkinan query kedua akan mencari kata “mie” juga.",
                'code' => "SELECT * FROM products WHERE MATCH(name, description) AGAINST('bakso' WITH QUERY EXPANSION);",
                'order_in_section' => 43
            ],
            [
                'section_id' => 8,
                'title' => 'Membuat Table dengan Foreign Key',
                'description' => "Kunci asing (Foreign Key) dalam MySQL adalah aturan yang diterapkan pada kolom atau kelompok kolom dalam sebuah tabel yang mengacu pada nilai kunci utama atau kunci unik di tabel lain. Kegunaannya adalah untuk membangun hubungan antar tabel (relasi) dalam basis data, yang memungkinkan Anda untuk menjaga integritas referensial dan menerapkan aturan bisnis tertentu.",
                'code' => "-- Untuk membuat tabel dengan kunci asing:
CREATE TABLE nama_tabel (
    kolom1 tipe_data,
    kolom2 tipe_data,
    FOREIGN KEY (nama_kolom) REFERENCES tabel_referensi (nama_kolom_referensi)
);

-- Dalam perintah di atas:
-- nama_tabel adalah nama tabel yang ingin Anda buat.
-- nama_kolom adalah nama kolom di tabel tersebut yang akan menjadi kunci asing.
-- tabel_referensi adalah nama tabel yang memiliki kunci utama atau kunci unik yang diacu oleh kunci asing.
-- nama_kolom_referensi adalah nama kolom di tabel referensi yang diacu oleh kunci asing.

-- Contoh:
-- Membuat tabel 'pesanan' dengan kunci asing yang mengacu pada tabel 'pelanggan':
CREATE TABLE pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(50),
    id_pelanggan INT,
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan (id)
);
-- Dalam contoh di atas, kita membuat tabel 'pesanan' dengan kunci asing 'id_pelanggan' yang mengacu pada kolom 'id' di tabel 'pelanggan', membangun relasi antara kedua tabel tersebut.

-- Contoh lain:
CREATE TABLE wishlist
(
    id          INT          NOT NULL AUTO_INCREMENT,
    id_product  VARCHAR(100) NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_wishlist_product
        FOREIGN KEY (id_product) REFERENCES products (id)
) ENGINE = InnoDB;
                ",
                'order_in_section' => 44
            ],
            [
                'section_id' => 8,
                'title' => 'Menambah/Menghapus Foreign Key',
                'description' => "Kunci asing (Foreign Key) dalam MySQL adalah aturan yang diterapkan pada kolom atau kelompok kolom dalam sebuah tabel yang mengacu pada nilai kunci utama atau kunci unik di tabel lain. Kegunaannya adalah untuk membangun hubungan antar tabel (relasi) dalam basis data, yang memungkinkan Anda untuk menjaga integritas referensial dan menerapkan aturan bisnis tertentu.",
                'code' => "-- Untuk menambahkan kunci asing pada tabel:
ALTER TABLE nama_tabel
ADD CONSTRAINT nama_kunci_asing FOREIGN KEY (nama_kolom) REFERENCES tabel_referensi (nama_kolom_referensi);

-- Untuk menghapus kunci asing dari tabel:
ALTER TABLE nama_tabel
DROP FOREIGN KEY nama_kunci_asing;

-- Dalam perintah-perintah di atas:
-- nama_tabel adalah nama tabel yang ingin Anda ubah.
-- nama_kunci_asing adalah nama yang Anda berikan untuk kunci asing yang ingin Anda tambahkan atau hapus.
-- nama_kolom adalah nama kolom di tabel tersebut yang akan menjadi kunci asing.
-- tabel_referensi adalah nama tabel yang memiliki kunci utama atau kunci unik yang diacu oleh kunci asing.
-- nama_kolom_referensi adalah nama kolom di tabel referensi yang diacu oleh kunci asing.

-- Contoh:
-- Menambahkan kunci asing 'fk_pelanggan' pada kolom 'id_pelanggan' di tabel 'pesanan' yang mengacu pada kolom 'id' di tabel 'pelanggan':
ALTER TABLE pesanan
ADD CONSTRAINT fk_pelanggan FOREIGN KEY (id_pelanggan) REFERENCES pelanggan (id);

-- Contoh lain:
ALTER TABLE wishlist ADD CONSTRAINT fk_wishlist_product FOREIGN KEY (id_product) REFERENCES products (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE wishlist DROP CONSTRAINT fk_wishlist_product;",
                'order_in_section' => 45
            ],
            [
                'section_id' => 8,
                'title' => 'Melakukan JOIN Table',
                'description' => "JOIN adalah operasi dalam SQL yang memungkinkan Anda untuk menggabungkan baris dari dua atau lebih tabel berdasarkan suatu kondisi yang ditentukan. Kegunaannya adalah untuk menggabungkan data dari tabel yang berbeda agar dapat diakses dan dianalisis bersama-sama.",
                'code' => "-- Untuk melakukan INNER JOIN antara dua tabel:
SELECT *
FROM tabel1
INNER JOIN tabel2 ON tabel1.kolom_kunci = tabel2.kolom_kunci;

-- Dalam perintah di atas:
-- tabel1 dan tabel2 adalah nama tabel yang ingin Anda gabungkan.
-- kolom_kunci adalah kolom yang digunakan sebagai kunci untuk menggabungkan baris antara kedua tabel.

-- Contoh:
-- Melakukan INNER JOIN antara tabel 'pesanan' dan 'pelanggan' berdasarkan 'id_pelanggan':
SELECT pesanan.*, pelanggan.nama
FROM pesanan
INNER JOIN pelanggan ON pesanan.id_pelanggan = pelanggan.id;

-- Contoh lain:
SELECT * FROM wishlist JOIN products ON (wishlist.id_product = product.id);

SELECT products.id, products.name, wishlist.description FROM wishlist JOIN products ON (products.id = wishlist.id_product);
",
                'order_in_section' => 46
            ],
            [
                'section_id' => 8,
                'title' => 'Jenis-Jenis Relasi Tabel',
                'description' => "Berikut dibawah ini penjelasannya",
                'code' => "One to One Relationship
-- One to One relationship adalah relasi antar tabel yang paling sederhana
-- Artinya tiap data di sebuah tabel hanya boleh berelasi ke maksimal 1 data di tabel lainnya
-- Tidak boleh ada relasi lebih dari 1 data
-- Contoh misal, kita membuat aplikasi toko online yang terdapat fitur wallet, dan 1 customer, cuma
boleh punya 1 wallet

One to Many Relationship
-- One to many relationship adalah relasi antar tabel dimana satu data bisa digunakan lebih dari satu
kali di tabel relasinya
-- Berbeda dengan one to one yang cuma bisa digunakan maksimal 1 kali di tabel relasinya, one to
many tidak ada batasan berapa banyak data digunakan
-- Contoh relasi antar tabel categories dan products, dimana satu category bisa digunakan oleh lebih
dari satu product, yang artinya relasinya nya one category to many products
-- Pembuatan relasi one to many sebenarnya sama dengan one to one, yang membedakan adalah, kita
tidak perlu menggunakan UNIQUE KEY, karena datanya memang bisa berkali-kali ditambahkan di
tabel relasi nya

Many to Many Relationship
-- Many to Many adalah table relationship yang paling kompleks, dan kadang membingungkan untuk
pemula
-- Many to Many adalah relasi dimana ada relasi antara 2 tabel dimana table pertama bisa punya
banyak relasi di table kedua, dan table kedua pun punya banyak relasi di table pertama
-- Ini memang sedikit membingungkan, bagaimana caranya bisa relasi kebanyakan secara bolak balik,
sedangkan di table kita cuma punya 1 kolom?
-- Contoh relasi many to many adalah relasi antara produk dan penjualan, dimana setiap produk bisa
dijual berkali kali, dan setiap penjualan bisa untuk lebih dari satu produk",
                'order_in_section' => 47
            ],
            [
                'section_id' => 8,
                'title' => 'Melakukan Subquery di WHERE Clause',
                'description' => "Subquery di WHERE clause adalah teknik dalam SQL yang memungkinkan Anda untuk menulis kueri yang lebih kompleks dengan menyisipkan kueri (query) di dalam kueri utama. Subquery digunakan untuk memfilter baris berdasarkan hasil kueri yang dieksekusi terlebih dahulu.",
                'code' => "-- Contoh penggunaan Subquery di WHERE clause:
SELECT kolom1, kolom2
FROM tabel
WHERE kolom1 = (SELECT kolom FROM tabel2 WHERE kondisi);

-- Dalam perintah di atas:
-- tabel adalah tabel utama yang ingin Anda query.
-- kolom1, kolom2 adalah kolom yang ingin Anda tampilkan dari tabel utama.
-- tabel2 adalah tabel yang digunakan dalam subquery.
-- kondisi adalah kondisi yang digunakan dalam subquery.

-- Contoh:
-- Menampilkan nama produk yang memiliki harga di atas rata-rata:
SELECT nama_produk
FROM produk
WHERE harga > (SELECT AVG(harga) FROM produk);
-- Dalam contoh di atas, subquery digunakan untuk menghitung rata-rata harga produk, dan kemudian digunakan dalam WHERE clause untuk memfilter produk yang memiliki harga di atas rata-rata.",
                'order_in_section' => 48
            ],
            [
                'section_id' => 8,
                'title' => 'Melakukan Subquery di FROM Clause',
                'description' => "Subquery di FROM clause adalah teknik dalam SQL yang memungkinkan Anda untuk menulis kueri yang lebih kompleks dengan menyisipkan kueri (query) di dalam kueri utama. Subquery digunakan untuk menghasilkan sebuah tabel sementara yang kemudian digunakan dalam kueri utama.",
                'code' => "-- Contoh penggunaan Subquery di FROM clause:
SELECT subquery_result.kolom1, subquery_result.kolom2
FROM (SELECT kolom1, kolom2 FROM tabel) AS subquery_result;

-- Dalam perintah di atas:
-- subquery_result adalah nama alias yang diberikan untuk hasil subquery.
-- tabel adalah tabel yang digunakan dalam subquery.
-- kolom1, kolom2 adalah kolom yang ingin Anda tampilkan dari subquery.

-- Contoh:
-- Menampilkan jumlah produk yang dimiliki oleh setiap kategori:
SELECT kategori.nama_kategori, COUNT(produk.id_produk) AS jumlah_produk
FROM (
    SELECT id_kategori, COUNT(id_produk) AS jumlah_produk
    FROM produk
    GROUP BY id_kategori
) AS produk_per_kategori
JOIN kategori ON produk_per_kategori.id_kategori = kategori.id_kategori;
-- Dalam contoh di atas, subquery digunakan untuk menghitung jumlah produk per kategori, dan kemudian hasil subquery tersebut digunakan dalam JOIN clause untuk menggabungkan dengan tabel kategori.",
                'order_in_section' => 49
            ],
            [
                'section_id' => 8,
                'title' => 'UNION',
                'description' => "operasi menggabungkan dua buah SELECT query, dimana jika terdapat data yang duplikat, data duplikatnya akan dihapus dari hasil query",
                'code' => "-- Contoh penggunaan UNION:
SELECT kolom1 FROM tabel1
UNION
SELECT kolom1 FROM tabel2;

-- Dalam perintah di atas:
-- tabel1 dan tabel2 adalah tabel yang ingin Anda gabungkan hasilnya.
-- kolom1 adalah kolom yang ingin Anda ambil dari kedua tabel, dan struktur kolom ini harus sama di kedua kueri.

-- Contoh:
-- Menggabungkan hasil kueri dari dua tabel 'pelanggan' dan 'karyawan' untuk menampilkan semua nama:
SELECT nama FROM pelanggan
UNION
SELECT nama FROM karyawan;
-- Dalam contoh di atas, UNION digunakan untuk menggabungkan dan menampilkan nama dari tabel pelanggan dan karyawan tanpa duplikat.

-- Contoh lain
SELECT DISTINCT email FROM customers
UNION
SELECT DISTINCT email FROM guestbooks;

-- UNION ALL adalah operasi yang sama dengan UNION, namun data duplikat tetap akan ditampilkan di hasil query nya
SELECT DISTINCT email FROM customers
UNION ALL
SELECT DISTINCT email FROM guestbooks;",
                'order_in_section' => 50
            ],
            [
                'section_id' => 8,
                'title' => 'INTERSECT',
                'description' => "Operasi menggabungkan dua query, namun yang diambil hanya data yang terdapat pada hasil query pertama dan query kedua. Data yang tidak hanya ada di salah satu query, kan dihapus di hasil operasi INTERSECT. Data nya muncul tidak dalam keadaan duplikat. Sayangnya, MySQL tidak memiliki operator INTERSECT, dengan demikian untuk melakukan operasi INTERSECT, kita harus lakukan secara manual menggunakan JOIN atau SUBQUERY",
                'code' => " -- Contoh:
SELECT DISTINCT email FROM customers
WHERE email IN (SELECT DISTINCT email FROM guestbooks);

SELECT DISTINCT customers.email FROM customers
INNER JOIN guestbooks ON (guestbooks.email = customers.email);",
                'order_in_section' => 51
            ],
            [
                'section_id' => 8,
                'title' => 'Transaction',
                'description' => "Transaksi adalah kumpulan operasi yang membentuk suatu unit kerja yang logis dan dapat dijalankan secara atomik (tidak dapat dibagi-bagi). Transaksi berfungsi untuk memastikan kekonsistenan data dalam basis data. Dalam transaksi, jika satu operasi gagal, maka seluruh transaksi akan dibatalkan (rollback), dan jika semua operasi berhasil, maka transaksi akan dijalankan (commit). Ini membantu menjaga integritas data dalam sistem basis data.",
                'code' => "-- Contoh penggunaan transaksi dalam SQL:
BEGIN TRANSACTION; -- Memulai transaksi
UPDATE tabel1 SET kolom1 = nilai1 WHERE kondisi1;
INSERT INTO tabel2 (kolom1, kolom2) VALUES (nilai1, nilai2);
DELETE FROM tabel3 WHERE kondisi2;
COMMIT; -- Menyimpan perubahan dalam transaksi

-- Dalam contoh di atas:
-- Transaksi dimulai dengan perintah BEGIN TRANSACTION dan diakhiri dengan perintah COMMIT.
-- Dalam transaksi tersebut, kita melakukan beberapa operasi, seperti UPDATE, INSERT, dan DELETE.
-- Jika semua operasi berhasil, maka perubahan akan disimpan dalam basis data.
-- Jika salah satu operasi gagal, maka seluruh transaksi akan dibatalkan (rollback), dan perubahan tidak akan disimpan.

-- Kenapa Butuh Transaction?
-- Saat membuat aplikasi berbasis database, jarang sekali kita akan melakukan satu jenis perintah SQL per aksi yang dibuat aplikasi
-- Contoh, ketika membuat toko online, ketika customer menekan tombol Pesan, banyak yang harus kita lakukan, misal
     -- Membuat data pesanan di tabel order
     -- Membuat data detail pesanan di tabel order detail
     -- Menurunkan quantity di tabel produk
     -- Dan yang lainnya
-- Artinya, bisa saja dalam satu aksi, kita akan melakukan beberapa perintah sekaligus
-- Jika terjadi kesalahan di salah satu perintah, harapannya adalah perintah-perintah sebelumnya dibatalkan, agar data tetap konsisten

Database Transaction
-- Database transaction adalah fitur di DBMS dimana kita bisa memungkinan beberapa perintah dianggap menjadi sebuah kesatuan perintah yang kita sebut transaction
-- Jika terdapat satu saja proses gagal di transaction, maka secara otomatis perintah-perintah sebelumnya akan dibatalkan
-- Jika sebuah transaction sukses, maka semua perintah akan dipastikan sukses

- START TRANSACTION
Memulai proses transaksi, proses selanjutnya akan dianggap transaksi sampai perintah COMMIT atau ROLLBACK

- COMMIT
Menyimpan secara permanen seluruh proses transaksi

- ROLLBACK
Membatalkan secara permanen seluruh proses transaksi

Yang Tidak Bisa Menggunakan Transaction
-- Perintah DDL (Data Definition Language) tidak bisa menggunakan fitur transaction
-- DDL adalah perintah-perintah yang digunakan untuk merubah struktur, seperti membuat tabel, menambah kolom, menghapus tabel, menghapus database, dan sejenisnya
-- Transaction hanya bisa dilakukan pada perintah DML (Data Manipulation Language), seperti operasi INSERT, UPDATE dan DELETE. ",
                'order_in_section' => 52
            ],
            [
                'section_id' => 8,
                'title' => 'Locking',
                'description' => "Locking adalah mekanisme yang digunakan dalam basis data untuk mengontrol akses ke sumber daya bersama. Tujuan utama dari locking adalah untuk mencegah konflik yang dapat terjadi ketika dua atau lebih transaksi mencoba mengakses atau memodifikasi sumber daya yang sama secara bersamaan. Dengan menggunakan locking, basis data dapat memastikan bahwa hanya satu transaksi yang dapat mengakses atau memodifikasi sumber daya tertentu pada satu waktu, sehingga menjaga konsistensi data dan mencegah anomali seperti dirty read, lost update, dan phantom read.",
                'code' => "-- Locking adalah proses mengunci data di DBMS
-- Proses mengunci data sangat penting dilakukan, salah satunya agar data benar-benar terjamin
konsistensinya
-- Karena pada kenyataannya, aplikasi yang akan kita buat pasti digunakan oleh banyak pengguna,
dan banyak pengguna tersebut bisa saja akan mengakses data yang sama, jika tidak ada proses
locking, bisa dipastikan akan terjadi RACE CONDITION, yaitu proses balapan ketika mengubah
data yang sama
-- Contoh saja, ketika kita belanja di toko online, kita akan balapan membeli barang yang sama, jika
data tidak terjaga, bisa jadi kita salah mengupdate stock karena pada saat yang bersamaan banyak
yang melakukan perubahan stock barang

-- Shared locks (atau read locks) memungkinkan transaksi untuk membaca data tanpa mempengaruhi transaksi lain yang juga membaca data yang sama. Namun, shared locks mencegah transaksi lain untuk menulis (memodifikasi) data tersebut.
-- Exclusive locks (atau write locks) mencegah transaksi lain untuk membaca atau menulis data yang sedang dikunci. Hanya satu transaksi yang dapat memiliki exclusive lock pada sumber daya tersebut pada satu waktu.
-- Implicit locks secara otomatis diterapkan oleh basis data sebagai bagian dari operasi tertentu. Misalnya, ketika Anda melakukan operasi UPDATE, INSERT, atau DELETE pada sebuah tabel, basis data akan secara otomatis menerapkan exclusive lock pada baris atau tabel yang terlibat dalam operasi tersebut.
-- Explicit locks diterapkan oleh pengguna dengan menggunakan perintah LOCK TABLES atau menggunakan klausa FOR UPDATE atau FOR SHARE dalam perintah SQL. Pengguna dapat secara manual menerapkan shared locks atau exclusive locks pada sumber daya tertentu sesuai dengan kebutuhan transaksi.

-- Locking Record Manual
-- Selain secara otomatis, kadang saat kita membuat aplikasi, kita juga sering melakukan SELECT
query terlebih dahulu sebelum melakukan proses UPDATE Contoh.
-- Jika kita ingin melakukan locking sebuah data secara manual, kita bisa tambahkan perintah FOR
UPDATE di belakang query SELECT
-- Saat kita lock record yang kita select, maka jika ada proses lain akan melakukan UPDATE, DELETE
atau SELECT FOR UPDATE lagi, maka proses lain diminta menunggu sampai kita selesai melakukan
COMMIT atau ROLLBACK transaction

-- Deadlock
-- Saat kita terlalu banyak melakukan proses Locking, hati-hati akan masalah yang bisa terjadi, yaitu DEADLOCK
-- Deadlock adalah situasi ada 2 proses yang saling menunggu satu sama lain, namun data yang
ditunggu dua-duanya di lock oleh proses lainnya, sehingga proses menunggunya ini tidak akan
pernah selesai.

-- Contoh Deadlock
-- Proses 1 melakukan SELECT FOR UPDATE untuk data 001
-- Proses 2 melakukan SELECT FOR UPDATE untuk data 002
-- Proses 1 melakukan SELECT FOR UPDATE untuk data 002, diminta menunggu karena di lock oleh Proses 2
-- Proses 2 melakukan SELECT FOR UPDATE untuk data 001, diminta menunggu karena di lock oleh Proses 1
-- Akhirnya Proses 1 dan Proses 2 saling menunggu
-- Deadlock terjadi

-- Locking Table
-- MySQL mendukung proses locking terhadap sebuah tabel
-- Jika kita me lock table, artinya satu seluruh data di tabel tersebut akan di lock
-- Ada 2 jenis lock table, yaitu READ dan WRITE
-- Cara melakukan locking table adalah dengan perintah
    -- LOCK TABLES nama_table READ;
    -- LOCK TABLES nama_Table WRITE
-- Setelah selesai melakukan lock table, kita bisa melakukan unlock dengan perintah : UNLOCK TABLES;

-- Locking Instance
-- Salah satu fitur lock lainnya di MySQL adalah lock instance
-- Lock instance adalah perintah locking yang akan membuat perintah DDL (data definition language) akan diminta menunggu sampai proses unlock instance
-- Biasanya proses locking instance ini terjadi ketika misal kita ingin melakukan backup data, agar tidak terjadi perubahan terhadap struktur tabel Contoh, kita bisa melakukan locking instance
-- Setelah proses backup selesai, baru kita unlock lagi instance nya
-- Untuk melakukan locking instance, kita bisa gunakan perintah :
    -- LOCK INSTANCE FOR BACKUP;
-- Untuk melakukan unlock instance, kita bisa gunakan perintah :
    -- UNLOCK INSTANCE; ",
                'order_in_section' => 53
            ],
            [
                'section_id' => 8,
                'title' => 'User Management',
                'description' => "Manajemen pengguna (user management) dalam basis data melibatkan pembuatan, pengaturan hak akses, dan penghapusan pengguna basis data. Setiap pengguna memiliki identitas unik (username) dan aksesibilitas terhadap objek dalam basis data tertentu dapat diatur menggunakan hak akses yang sesuai (permissions). Manajemen pengguna sangat penting untuk menjaga keamanan dan integritas data dalam basis data.",
                'code' => "-- Langkah_manajemen :
-- 1. Pembuatan Pengguna => Langkah pertama dalam manajemen pengguna adalah pembuatan pengguna baru dalam basis data. Ini melibatkan pembuatan username dan pemberian kata sandi (password) yang aman untuk otentikasi.
-- 2. Pengaturan Hak Akses' => Setelah pembuatan pengguna, langkah berikutnya adalah pengaturan hak akses untuk masing-masing pengguna. Ini melibatkan penentuan jenis hak akses (seperti SELECT, INSERT, UPDATE, DELETE) yang dimiliki oleh pengguna terhadap objek dalam basis data tertentu.
-- 3. Pemantauan dan Pemeliharaan' => Manajemen pengguna juga melibatkan pemantauan dan pemeliharaan pengguna yang ada. Ini termasuk pengelolaan siklus hidup pengguna, seperti pembaruan kata sandi secara berkala, pembatasan hak akses sesuai kebutuhan bisnis, dan penghapusan pengguna yang tidak lagi diperlukan.
-- 4. Penghapusan Pengguna' => Langkah terakhir dalam manajemen pengguna adalah penghapusan pengguna yang tidak lagi diperlukan dalam basis data. Ini penting untuk mencegah akun yang tidak aktif menjadi sumber potensial bagi pelanggaran keamanan.

-- Root User
-- Secara default, mysql membuat root user sebagai super administrator
-- Namun best practice nya, saat kita menjalankan MySQL dengan aplikasi yang kita buat, sangat
disarankan tidak menggunakan user root
-- Lebih baik kita buat user khusus untuk tiap aplikasi, bahkan kita bisa batasi hak akses user
tersebut, seperti hanya bisa melakukan SELECT, dan tidak boleh melakukan INSERT, UPDATE atau
DELETE
                ",
                'order_in_section' => 54
            ],
            [
                'section_id' => 8,
                'title' => 'Backup Database',
                'description' => "Backup basis data adalah proses pembuatan salinan data dan struktur database yang ada pada suatu titik waktu tertentu. Tujuannya adalah untuk menyediakan salinan yang dapat dipulihkan dari data jika terjadi kehilangan atau kerusakan data yang tidak terduga, seperti kegagalan perangkat keras, kesalahan pengguna, atau serangan siber.",
                'code' => "-- Jenis Backup :
-- 1. Full Backup => Full backup mencakup seluruh data dan struktur basis data pada saat backup dilakukan. Ini adalah jenis backup yang paling lengkap, tetapi juga memerlukan ruang penyimpanan yang besar dan waktu yang lebih lama untuk dilakukan.
-- 2. Incremental Backup => Incremental backup hanya mencakup perubahan atau tambahan data yang terjadi sejak backup sebelumnya dilakukan. Ini mengurangi waktu dan ruang penyimpanan yang dibutuhkan untuk backup, tetapi memerlukan proses pemulihan yang lebih kompleks karena perlu menggabungkan beberapa salinan backup.
-- 3. Differential Backup => Differential backup mencakup semua perubahan yang terjadi sejak backup penuh terakhir dilakukan. Meskipun lebih cepat daripada full backup dan lebih mudah dipulihkan daripada incremental backup, differential backup masih memerlukan ruang penyimpanan yang signifikan.

-- Langkah Backup =>
-- 1. Pemilihan Jenis Backup => Langkah pertama dalam backup basis data adalah memilih jenis backup yang sesuai dengan kebutuhan dan ketersediaan sumber daya.
-- 2. Penjadwalan Backup => Backup biasanya dijadwalkan secara teratur, baik secara harian, mingguan, atau bulanan, tergantung pada kebutuhan bisnis dan tingkat risiko data.
-- 3. Pemilihan Lokasi Penyimpanan => Backup harus disimpan di lokasi yang aman dan terpisah dari server basis data utama untuk mencegah kehilangan data yang tidak terduga, seperti bencana alam atau pencurian.
-- 4. Pelaksanaan Backup => Setelah semua persiapan selesai, backup dilaksanakan sesuai dengan jadwal yang telah ditetapkan. Proses backup dapat dilakukan secara otomatis menggunakan perangkat lunak backup tertentu atau perintah SQL yang disediakan oleh sistem basis data.
-- 5. Verifikasi Backup => Setelah backup selesai, penting untuk melakukan verifikasi untuk memastikan bahwa salinan data berhasil dibuat dan dapat dipulihkan dengan benar jika diperlukan.
-- 6. Pemeliharaan dan Pengelolaan Backup => Backup harus dipelihara dan dikelola secara teratur. Ini termasuk memastikan keamanan salinan data, melakukan uji pemulihan secara berkala, dan memperbarui proses backup sesuai dengan perubahan kebutuhan bisnis atau infrastruktur.

-- Saat membuat aplikasi menggunakan database, ada baiknya kita selalu melakukan backup data
secara reguler
-- Untungnya MySQL mendukung proses backup database
-- Untuk melakukan backup database, kita tidak menggunakan perintah SQL, melainkan MySQL
menyediakan sebuah aplikasi khusus untuk melakukan backup database, namanya adalah
mysqldump
-- https://dev.mysql.com/doc/refman/8.0/en/mysqldump.html",

                'order_in_section' => 55
            ],
            [
                'section_id' => 8,
                'title' => 'Restore Database',
                'description' => "Pemulihan basis data adalah proses mengembalikan basis data dari salinan cadangan (backup) ke keadaan semula setelah terjadi kehilangan atau kerusakan data yang tidak terduga, seperti kegagalan perangkat keras, kesalahan pengguna, atau serangan siber. Tujuannya adalah untuk memulihkan data yang hilang atau rusak sehingga operasional bisnis dapat dilanjutkan dengan segera.",
                'code' => "-- Selain melakukan backup database, di MySQL juga kita bisa melakukan proses restore data dari file hasil backup
-- Untuk melakukan restore database, kita bisa menggunakan aplikasi mysql client atau
menggunakan perintah SOURCE di MySQL.

-- Langkah Pemulihan :
-- 1. Pemilihan Backup yang Tepat => Langkah pertama dalam pemulihan basis data adalah memilih salinan cadangan yang sesuai dengan kebutuhan pemulihan. Ini dapat berupa backup penuh, incremental, atau differential, tergantung pada kebutuhan pemulihan dan tingkat kehilangan data.
-- 2. Penyiapan Lingkungan Pemulihan => Sebelum memulai proses pemulihan, lingkungan pemulihan harus dipersiapkan dengan baik. Ini termasuk memastikan ketersediaan perangkat lunak dan perangkat keras yang diperlukan, serta mempersiapkan ruang penyimpanan untuk menyimpan data pemulihan.
-- 3. Pemulihan dari Backup => Setelah lingkungan pemulihan siap, proses pemulihan dapat dimulai. Backup dipulihkan ke server basis data utama atau server alternatif sesuai dengan kebijakan pemulihan yang telah ditetapkan.
-- 4. Verifikasi Pemulihan => Setelah pemulihan selesai, penting untuk melakukan verifikasi untuk memastikan bahwa data telah dipulihkan dengan benar dan tidak ada data yang hilang atau rusak. Verifikasi ini dapat dilakukan dengan memeriksa konsistensi data, menjalankan uji pemulihan, atau membandingkan data dengan salinan cadangan.
-- 5. Pemeliharaan dan Pengelolaan Pemulihan => Pemeliharaan dan pengelolaan pemulihan basis data merupakan langkah terakhir dalam proses pemulihan. Ini termasuk memastikan keamanan dan integritas data yang dipulihkan, serta melakukan evaluasi terhadap proses pemulihan untuk memperbaiki dan meningkatkan kinerja di masa mendatang.",
                'order_in_section' => 56
            ],
            [
                'section_id' => 9,
                'title' => 'Schema',
                'description' => "Schema adalah struktur logis yang mendefinisikan format dan hubungan antara data dalam database. Schema digunakan untuk mengatur objek-objek database seperti tabel, indeks, dan tampilan, serta menentukan hak akses pengguna terhadap objek-objek tersebut. Penggunaan schema membantu dalam mengorganisasi dan mengelola database dengan lebih terstruktur dan aman.",
                'code' => "-- Schema adalah sebuah collection dari database yang di dalamnya terdapat attribute yang dimiliki oleh database seperti table, view, index, dll.
-- satu schema akan selalu memiliki 1 database
-- 1 database bisa memiliki banyak schema

-- Untuk membuat schema baru:
CREATE SCHEMA nama_schema;

-- Untuk menghapus schema:
DROP SCHEMA nama_schema;

-- Dalam perintah-perintah di atas:
-- nama_schema adalah nama yang diberikan untuk schema yang ingin Anda buat atau hapus.

-- Contoh:
-- Membuat schema baru
CREATE SCHEMA HR;

-- Menghapus schema
DROP SCHEMA HR;
-- Dalam contoh di atas, kita membuat sebuah schema baru dengan nama HR untuk mengatur objek-objek terkait sumber daya manusia (HR). Kemudian, kita menghapus schema HR dari database.",
                'order_in_section' => 1
            ],
            [
                'section_id' => 9,
                'title' => 'Table',
                'description' => "Tabel adalah struktur dasar dalam database yang digunakan untuk menyimpan data. Setiap tabel terdiri dari baris dan kolom, di mana setiap baris mewakili satu entitas data dan setiap kolom mewakili atribut dari entitas tersebut. Tabel digunakan untuk mengorganisasi data dalam database agar dapat diakses, dimanipulasi, dan diolah dengan lebih efisien.",
                'code' => "-- Untuk membuat tabel baru:
CREATE TABLE nama_tabel (
kolom1 tipe_data1,
kolom2 tipe_data2,
...
);

-- Untuk menghapus tabel:
DROP TABLE nama_tabel;

-- Dalam perintah-perintah di atas:
-- nama_tabel adalah nama yang diberikan untuk tabel yang ingin Anda buat atau hapus.
-- kolom1, kolom2, ... adalah nama kolom dalam tabel, dan tipe_data1, tipe_data2, ... adalah tipe data untuk setiap kolom.

-- Contoh:
-- Membuat tabel baru
CREATE TABLE Pelanggan (
ID INT PRIMARY KEY,
Nama VARCHAR(100),
Umur INT,
Alamat VARCHAR(255)
);

-- Menghapus tabel
DROP TABLE Pelanggan;
-- Dalam contoh di atas, kita membuat sebuah tabel baru dengan nama Pelanggan yang memiliki empat kolom: ID, Nama, Umur, dan Alamat. Kolom ID ditetapkan sebagai kunci primer (primary key). Kemudian, kita menghapus tabel Pelanggan dari database.

-- Contoh lain
CREATE TABLE mahasiswa (mhs_id INT PRIMARY KEY IDENTITY(1,1), nama VARCHAR(100), tlp VARCHAR(15), alamat VARCHAR(200), tgl_bergabung DATE)
-- identity(1,1) artinya auto increment dimulai dari 1 dan selanjutnya ditambah 1
-- kalo tidak didefenisikan schema maka dia akan masuk ke dalam tabel, sebaliknya
-- untuk membuat kolom dengan spasi maka harus ditambahkan [nama kolom] kurung siku",
                'order_in_section' => 2
            ],
            [
                'section_id' => 9,
                'title' => 'Identity',
                'description' => "Identity adalah fitur dalam SQL Server yang digunakan untuk menghasilkan nilai unik secara otomatis untuk kolom yang ditetapkan sebagai identitas. Identitas biasanya digunakan untuk menetapkan kunci utama (primary key) yang unik bagi setiap baris dalam tabel. Fitur ini sangat berguna untuk menghindari konflik dan kesalahan dalam penentuan nilai kunci.",
                'code' => "-- Untuk menambahkan kolom identitas pada tabel:
ALTER TABLE nama_tabel
ADD nama_kolom IDENTITY(start_value, increment_value) [NOT NULL];

-- Untuk menghapus kolom identitas dari tabel:
ALTER TABLE nama_tabel
DROP COLUMN nama_kolom;

-- Dalam perintah-perintah di atas:
-- nama_tabel adalah nama tabel yang ingin Anda ubah.
-- nama_kolom adalah nama kolom yang ingin Anda tambahkan atau hapus identitas.
-- start_value adalah nilai awal untuk identitas.
-- increment_value adalah nilai yang akan ditambahkan setiap kali sebuah baris ditambahkan.

-- Contoh:
-- Menambah kolom identitas
ALTER TABLE Barang
ADD ID INT IDENTITY(1,1) PRIMARY KEY;

-- Menghapus kolom identitas
ALTER TABLE Barang
DROP COLUMN ID;
-- Dalam contoh di atas, kita menambahkan kolom identitas dengan nama ID pada tabel Barang dengan nilai awal 1 dan penambahan nilai sebesar 1 setiap kali sebuah baris ditambahkan. Kemudian, kita menghapus kolom identitas ID dari tabel Barang.

-- identity adalah sebuah script sql yang digunakan untuk perintah incerement secara otomatis
-- Contoh lain:
-- Mengatur On atau Off
SET identity_insert TABLE ON;
SET identity_insert TABLE OFF;",

                'order_in_section' => 3
            ],
            [
                'section_id' => 9,
                'title' => 'Squence',
                'description' => "Sequence adalah objek database dalam SQL Server yang digunakan untuk menghasilkan serangkaian nilai numerik secara berurutan. Sequence sering digunakan untuk menetapkan nilai kunci utama (primary key) yang unik bagi setiap baris dalam tabel, terutama saat identitas tidak dapat digunakan atau tidak diinginkan. Sequence juga dapat digunakan dalam berbagai skenario lain di mana diperlukan nilai numerik berurutan.",
                'code' => "-- Untuk membuat sequence:
CREATE SEQUENCE nama_sequence
START WITH start_value
INCREMENT BY increment_value
MINVALUE min_value
MAXVALUE max_value
CYCLE | NO CYCLE;

-- Untuk mengambil nilai dari sequence:
NEXT VALUE FOR nama_sequence;

-- Dalam perintah-perintah di atas:
-- nama_sequence adalah nama yang diberikan untuk sequence yang ingin Anda buat.
-- start_value adalah nilai awal untuk sequence.
-- increment_value adalah nilai yang akan ditambahkan setiap kali sequence diambil.
-- min_value dan max_value adalah nilai minimum dan maksimum untuk sequence.
-- CYCLE atau NO CYCLE menentukan apakah sequence akan berulang atau tidak ketika mencapai nilai maksimum atau minimum.

-- Contoh:
-- Membuat sequence
CREATE SEQUENCE NomorPesanan
START WITH 1001
INCREMENT BY 1
MINVALUE 1001
MAXVALUE 9999
NO CYCLE;

-- Mengambil nilai dari sequence
NEXT VALUE FOR NomorPesanan;
-- Dalam contoh di atas, kita membuat sebuah sequence dengan nama NomorPesanan yang dimulai dari nilai 1001 dan bertambah 1 setiap kali sequence diambil. Sequence tersebut memiliki nilai minimum 1001 dan maksimum 9999, dan tidak akan berulang setelah mencapai nilai maksimum.",
                'order_in_section' => 4
            ],
            [
                'section_id' => 9,
                'title' => 'Add Column',
                'description' => "Penambahan kolom adalah proses dalam SQL Server untuk menambahkan kolom baru ke dalam sebuah tabel yang sudah ada. Ini berguna ketika Anda ingin menyimpan informasi tambahan atau memperluas struktur tabel yang sudah ada tanpa harus membuat tabel baru.",
                'code' => "-- Untuk menambahkan kolom baru ke dalam tabel:
ALTER TABLE nama_tabel
ADD nama_kolom tipe_data [constraint];

-- Dalam perintah di atas:
-- nama_tabel adalah nama tabel yang ingin Anda ubah.
-- nama_kolom adalah nama kolom baru yang ingin Anda tambahkan.
-- tipe_data adalah tipe data untuk kolom baru.
-- constraint (opsional) adalah batasan atau aturan tambahan untuk kolom.

-- Contoh:
-- Menambahkan kolom baru ke dalam tabel
ALTER TABLE Pelanggan
ADD NomorTelepon VARCHAR(15);

-- Dalam contoh di atas, kita menambahkan kolom baru dengan nama NomorTelepon yang bertipe VARCHAR(15) ke dalam tabel Pelanggan.

-- Contoh lain:
ALTER TABLE nama_table ADD nama_kolom type_data null collate SQL_Latin1_General_CP1_CI_AS",
                'order_in_section' => 5
            ],
            [
                'section_id' => 9,
                'title' => 'Alter Column',
                'description' => "Mengubah kolom adalah proses dalam SQL Server untuk memodifikasi kolom yang sudah ada dalam sebuah tabel. Ini dapat digunakan untuk mengubah tipe data kolom, menambah atau menghapus batasan (constraint), atau melakukan modifikasi lainnya pada properti kolom.",
                'code' => "-- Untuk mengubah kolom dalam tabel:
ALTER TABLE nama_tabel
ALTER COLUMN nama_kolom tipe_data [constraint];

-- Dalam perintah di atas:
-- nama_tabel adalah nama tabel yang ingin Anda ubah.
-- nama_kolom adalah nama kolom yang ingin Anda modifikasi.
-- tipe_data adalah tipe data baru untuk kolom.
-- constraint (opsional) adalah batasan atau aturan tambahan untuk kolom.

-- Contoh:
-- Mengubah tipe data kolom dalam tabel
ALTER TABLE Pelanggan
ALTER COLUMN Umur INT;

-- Dalam contoh di atas, kita mengubah tipe data kolom Umur dari tabel Pelanggan menjadi INT.

-- Contoh lain:
ALTER TABLE nama_table ALTER COLUMN nama_kolom type_data(parameter) ?;",
                'order_in_section' => 6
            ],
            [
                'section_id' => 9,
                'title' => 'Drop Column',
                'description' => "Penghapusan kolom adalah proses dalam SQL Server untuk menghapus kolom yang sudah ada dari sebuah tabel. Ini berguna ketika Anda ingin menghapus informasi yang tidak lagi diperlukan atau ketika Anda ingin mengurangi kompleksitas struktur tabel.",
                'code' => "-- Untuk menghapus kolom dari tabel:
ALTER TABLE nama_tabel
DROP COLUMN nama_kolom;

-- Dalam perintah di atas:
-- nama_tabel adalah nama tabel yang ingin Anda ubah.
-- nama_kolom adalah nama kolom yang ingin Anda hapus.

-- Contoh:
-- Menghapus kolom dari tabel
ALTER TABLE Pelanggan
DROP COLUMN NomorTelepon;

-- Dalam contoh di atas, kita menghapus kolom NomorTelepon dari tabel Pelanggan.

ALTER TABLE nama_table DROP COLUMN nama_kolom",
                'order_in_section' => 7
            ],
            [
                'section_id' => 9,
                'title' => 'Computed Column',
                'description' => "Kolom terkomputasi adalah kolom dalam SQL Server yang nilai-nilainya dihasilkan secara otomatis berdasarkan ekspresi atau perhitungan dari satu atau lebih kolom lain dalam tabel. Kolom ini tidak disimpan secara fisik dalam tabel, tetapi dihitung secara dinamis saat query dieksekusi.",
                'code' => "-- Untuk menambahkan kolom terkomputasi ke dalam tabel:
ALTER TABLE nama_tabel
ADD nama_kolom AS (ekspresi) [PERSISTED];

-- Dalam perintah di atas:
-- nama_tabel adalah nama tabel yang ingin Anda ubah.
-- nama_kolom adalah nama kolom terkomputasi yang ingin Anda tambahkan.
-- ekspresi adalah ekspresi atau perhitungan yang akan menghasilkan nilai untuk kolom terkomputasi.
-- PERSISTED (opsional) menunjukkan apakah nilai kolom terkomputasi akan disimpan secara fisik dalam tabel.

-- Contoh:
-- Menambahkan kolom terkomputasi ke dalam tabel
ALTER TABLE Barang
ADD TotalHarga AS (Harga * Jumlah) PERSISTED;

-- Dalam contoh di atas, kita menambahkan kolom terkomputasi dengan nama TotalHarga ke dalam tabel Barang, yang nilai-nilainya dihitung sebagai hasil perkalian antara kolom Harga dan Jumlah. Opsi PERSISTED menandakan bahwa nilai-nilai kolom terkomputasi akan disimpan secara fisik dalam tabel.

-- Contoh lain:
ALTER TABLE person ADD fullname AS (concat(first_name,'-',last_name)) PERSISTED, usia AS (datediff(year, kolom_tanggal, getdate()))",
                'order_in_section' => 8
            ],
            [
                'section_id' => 9,
                'title' => 'Rename dan Drop Table',
                'description' => "Penggantian nama tabel adalah proses dalam SQL Server untuk mengubah nama sebuah tabel yang sudah ada. Ini berguna ketika Anda ingin mengubah nama tabel untuk mencerminkan perubahan dalam struktur atau konteks data.",
                'code' => "-- Untuk mengubah nama tabel:
EXEC sp_rename 'nama_tabel_lama', 'nama_tabel_baru';

-- Dalam perintah di atas:
-- nama_tabel_lama adalah nama lama dari tabel yang ingin Anda ubah.
-- nama_tabel_baru adalah nama baru yang ingin Anda berikan kepada tabel.

-- Contoh:
-- Mengubah nama tabel
EXEC sp_rename 'Pelanggan', 'Customer';

-- Dalam contoh di atas, kita mengubah nama tabel dari Pelanggan menjadi Customer.

-- Untuk menghapus tabel:
DROP TABLE nama_tabel;

-- Dalam perintah di atas:
-- nama_tabel adalah nama dari tabel yang ingin Anda hapus.

-- Contoh:
-- Menghapus tabel
DROP TABLE Customer;

-- Dalam contoh di atas, kita menghapus tabel dengan nama Customer dari database.",
                'order_in_section' => 9
            ],
            [
                'section_id' => 9,
                'title' => 'Truncate Table',
                'description' => "Pengosongan tabel adalah proses dalam SQL Server untuk menghapus semua data dari sebuah tabel, tetapi menyimpan struktur tabel itu sendiri. Ini berguna ketika Anda ingin menghapus semua data dari sebuah tabel tanpa menghapus struktur kolom atau indeks.",
                'code' => "-- Untuk mengosongkan tabel:
TRUNCATE TABLE nama_tabel;

-- Dalam perintah di atas:
-- nama_tabel adalah nama dari tabel yang ingin Anda kosongkan.

-- Contoh:
-- Mengosongkan tabel
TRUNCATE TABLE Customer;

-- Dalam contoh di atas, kita mengosongkan tabel dengan nama Customer, sehingga semua data di dalamnya akan dihapus, tetapi struktur tabel akan tetap ada.",
                'order_in_section' => 10
            ],
            [
                'section_id' => 9,
                'title' => 'Temporary Table',
                'description' => "Tabel sementara adalah tabel yang hanya ada dalam sesi atau koneksi saat itu. Mereka digunakan untuk menyimpan data sementara yang dibutuhkan selama proses pengolahan data di dalam suatu sesi atau koneksi.",
                'code' => "-- Untuk membuat tabel sementara:
CREATE TABLE #nama_tabel (
kolom1 tipe_data1,
kolom2 tipe_data2,
...
);

-- Dalam perintah di atas:
-- #nama_tabel adalah nama dari tabel sementara.
-- kolom1, kolom2, ... adalah nama kolom dalam tabel, dan tipe_data1, tipe_data2, ... adalah tipe data untuk setiap kolom.

-- Contoh:
-- Membuat tabel sementara
CREATE TABLE #TempData (
ID INT,
Name VARCHAR(50)
);

-- Catatan tambahan:
-- Setelah digunakan, tabel sementara akan otomatis dihapus ketika sesi atau koneksi berakhir.
-- untuk menampung hasil join join table yang cukup panjang
-- #
-- ## global",
                'order_in_section' => 11
            ],
            [
                'section_id' => 9,
                'title' => 'Create Synonym',
                'description' => "Sinonim adalah objek database dalam SQL Server yang memberikan alias atau nama alternatif untuk sebuah objek database yang ada, seperti tabel, tampilan, prosedur tersimpan, atau fungsi. Mereka digunakan untuk menyederhanakan akses ke objek database yang berada dalam skema atau basis data yang berbeda atau memiliki nama yang panjang atau kompleks.",
                'code' => "-- Untuk membuat sinonim:
CREATE SYNONYM nama_synonym
FOR [nama_server].[nama_basis_data].[skema].[nama_objek];

-- Dalam perintah di atas:
-- nama_synonym adalah nama sinonim yang ingin Anda buat.
-- [nama_server].[nama_basis_data].[skema].[nama_objek] adalah nama lengkap dari objek database yang ingin Anda berikan sinonim.

-- Contoh:
-- Membuat sinonim untuk sebuah tabel
CREATE SYNONYM CustomerAlias
FOR AdventureWorks2019.dbo.Customer;

-- Dalam contoh di atas, kita membuat sinonim dengan nama CustomerAlias untuk tabel Customer yang berada dalam skema dbo pada basis data AdventureWorks2019.",
                'order_in_section' => 12
            ],
            [
                'section_id' => 9,
                'title' => 'Select Into',
                'description' => "Perintah SELECT INTO digunakan untuk menyalin data dari satu tabel ke tabel lain yang baru dibuat. Ini berguna ketika Anda ingin membuat salinan data dari sebuah tabel ke tabel lain, misalnya untuk tujuan cadangan atau pengolahan data sementara.",
                'code' => "-- Untuk menyalin data dari satu tabel ke tabel lain:
SELECT * INTO nama_tabel_baru
FROM nama_tabel_lama;

-- Dalam perintah di atas:
-- nama_tabel_baru adalah nama untuk tabel baru yang akan dibuat untuk menyimpan salinan data.
-- nama_tabel_lama adalah nama tabel yang berisi data yang ingin Anda salin.

-- Contoh:
-- Menyalin data dari tabel Customer ke tabel CustomerBackup
SELECT * INTO CustomerBackup
FROM Customer;

-- Dalam contoh di atas, kita menyalin semua data dari tabel Customer ke tabel baru bernama CustomerBackup.",
                'order_in_section' => 13
            ],
            [
                'section_id' => 9,
                'title' => 'Primary Key',
                'description' => "Kunci primer (Primary Key) adalah salah satu konsep penting dalam desain database yang digunakan untuk secara unik mengidentifikasi setiap baris dalam sebuah tabel. Setiap tabel hanya dapat memiliki satu kunci primer, dan nilai-nilai di dalam kolom kunci primer harus unik dan tidak boleh NULL.",
                'code' => "-- Untuk menetapkan kunci primer pada kolom dalam sebuah tabel:
ALTER TABLE nama_tabel
ADD CONSTRAINT nama_kunci_primer PRIMARY KEY (nama_kolom);

-- Dalam perintah di atas:
-- nama_tabel adalah nama dari tabel yang ingin Anda ubah.
-- nama_kunci_primer adalah nama yang Anda berikan kepada kunci primer yang ingin Anda tambahkan.
-- nama_kolom adalah nama kolom yang akan menjadi kunci primer.

-- Contoh:
-- Menetapkan kunci primer pada kolom ID dalam tabel Pelanggan
ALTER TABLE Pelanggan
ADD CONSTRAINT PK_Pelanggan PRIMARY KEY (ID);

-- Dalam contoh di atas, kita menetapkan kunci primer dengan nama PK_Pelanggan pada kolom ID dalam tabel Pelanggan. Ini akan memastikan bahwa setiap nilai di kolom ID adalah unik dan tidak boleh NULL.",
                'order_in_section' => 14
            ],
            [
                'section_id' => 9,
                'title' => 'Foreign Key',
                'description' => "Kunci asing (Foreign Key) adalah konsep dalam desain database yang digunakan untuk menjaga integritas referensial antara dua tabel. Kunci asing menghubungkan kolom dalam satu tabel (kunci asing) dengan kolom dalam tabel lain (kunci primer) dan memastikan bahwa nilai yang ada dalam kolom kunci asing harus ada dalam kolom kunci primer yang sesuai.",
                'code' => "-- Untuk menetapkan kunci asing pada kolom dalam sebuah tabel:
ALTER TABLE nama_tabel_child
ADD CONSTRAINT nama_kunci_asing FOREIGN KEY (nama_kolom_child)
REFERENCES nama_tabel_parent (nama_kolom_parent);

-- Dalam perintah di atas:
-- nama_tabel_child adalah nama dari tabel anak yang ingin Anda ubah.
-- nama_kunci_asing adalah nama yang Anda berikan kepada kunci asing yang ingin Anda tambahkan.
-- nama_kolom_child adalah nama kolom dalam tabel anak yang akan menjadi kunci asing.
-- nama_tabel_parent adalah nama dari tabel induk yang memiliki kunci primer.
-- nama_kolom_parent adalah nama kolom dalam tabel induk yang akan dijadikan referensi oleh kunci asing.

-- Contoh:
-- Menetapkan kunci asing pada kolom CustomerID dalam tabel Orders, merujuk ke kolom CustomerID dalam tabel Customers
ALTER TABLE Orders
ADD CONSTRAINT FK_Orders_Customers FOREIGN KEY (CustomerID)
REFERENCES Customers (CustomerID);

-- Dalam contoh di atas, kita menetapkan kunci asing dengan nama FK_Orders_Customers pada kolom CustomerID dalam tabel Orders. Kunci asing ini merujuk ke kolom CustomerID dalam tabel Customers, memastikan bahwa setiap nilai dalam kolom CustomerID dalam tabel Orders harus ada dalam kolom CustomerID dalam tabel Customers.",
                'order_in_section' => 15
            ],
            [
                'section_id' => 9,
                'title' => 'Check Constraint',
                'description' => "Check Constraint adalah fitur dalam SQL yang memungkinkan Anda untuk menentukan suatu kondisi yang harus dipenuhi oleh nilai di kolom dalam tabel. Kegunaannya adalah untuk memastikan bahwa data yang dimasukkan ke dalam tabel memenuhi syarat atau batasan tertentu sesuai dengan logika bisnis atau aturan tertentu yang diinginkan.",
                'code' => "-- Untuk menambah Check Constraint:
ALTER TABLE nama_tabel
ADD CONSTRAINT nama_constraint CHECK (kondisi);
-- Untuk menghapus Check Constraint:
ALTER TABLE nama_tabel
DROP CONSTRAINT nama_constraint;

-- Dalam perintah-perintah di atas:
-- nama_tabel adalah nama tabel yang ingin Anda ubah.
-- nama_constraint adalah nama yang diberikan untuk constraint yang ingin Anda tambahkan atau hapus.
-- kondisi adalah kondisi atau batasan yang ingin Anda terapkan pada Check Constraint.

-- Contoh:
-- Menambah Check Constraint
ALTER TABLE pengguna
ADD CONSTRAINT check_umur CHECK (umur >= 18);

-- Menghapus Check Constraint
ALTER TABLE pengguna
DROP CONSTRAINT check_umur;
-- Dalam contoh di atas, kita menambahkan sebuah Check Constraint bernama check_umur pada tabel pengguna untuk memastikan bahwa nilai di kolom umur harus lebih besar atau sama dengan 18. Kemudian, kita menghapus Check Constraint tersebut dari tabel pengguna.",
                'order_in_section' => 16
            ],
            [
                'section_id' => 9,
                'title' => 'Unique Constraint',
                'description' => "Unique Constraint adalah fitur dalam SQL yang memastikan bahwa nilai di dalam kolom tertentu dalam tabel adalah unik, artinya tidak ada nilai yang sama dalam kolom tersebut. Kegunaannya adalah untuk mencegah adanya duplikasi data yang tidak diinginkan dalam kolom yang dianggap unik.",
                'code' => "-- Untuk menambah Unique Constraint:
ALTER TABLE nama_tabel
ADD CONSTRAINT nama_constraint UNIQUE (nama_kolom);

-- Untuk menghapus Unique Constraint:
ALTER TABLE nama_tabel
DROP CONSTRAINT nama_constraint;

-- Dalam perintah-perintah di atas:
-- nama_tabel adalah nama tabel yang ingin Anda ubah.
-- nama_constraint adalah nama yang diberikan untuk constraint yang ingin Anda tambahkan atau hapus.
-- nama_kolom adalah nama kolom yang ingin Anda tetapkan sebagai unik.

-- Contoh:
-- Menambah Unique Constraint
ALTER TABLE pengguna
ADD CONSTRAINT unique_email UNIQUE (email);

-- Menghapus Unique Constraint
ALTER TABLE pengguna
DROP CONSTRAINT unique_email;
-- Dalam contoh di atas, kita menambahkan Unique Constraint bernama unique_email pada tabel pengguna untuk memastikan bahwa setiap nilai di dalam kolom email adalah unik. Kemudian, kita menghapus Unique Constraint tersebut dari tabel pengguna.",
                'order_in_section' => 17
            ],
            [
                'section_id' => 10,
                'title' => 'Order By',
                'description' => "Perintah ORDER BY digunakan dalam SQL untuk mengurutkan hasil query berdasarkan nilai dari satu atau lebih kolom. Ini memungkinkan Anda untuk mengatur urutan data yang dihasilkan dari query sesuai dengan kebutuhan Anda.",
                'code' => "-- Untuk mengurutkan hasil query berdasarkan satu kolom:
SELECT * FROM nama_tabel
ORDER BY nama_kolom [ASC|DESC];

-- Untuk mengurutkan hasil query berdasarkan beberapa kolom:
SELECT * FROM nama_tabel
ORDER BY nama_kolom1 [ASC|DESC], nama_kolom2 [ASC|DESC], ...;

-- Dalam perintah di atas:
-- SELECT * FROM nama_tabel adalah query yang mengambil semua data dari tabel yang ditentukan.
-- ORDER BY nama_kolom adalah kolom yang digunakan untuk mengurutkan hasil query.
-- ASC adalah urutan ascending (default) yang menempatkan nilai-nilai terkecil terlebih dahulu.
-- DESC adalah urutan descending yang menempatkan nilai-nilai terbesar terlebih dahulu.

-- Contoh:
-- Mengurutkan data dari tabel Produk berdasarkan harga dari yang termurah ke termahal
SELECT * FROM Produk
ORDER BY Harga ASC;

-- Mengurutkan data dari tabel Pelanggan berdasarkan nama dari Z ke A
SELECT * FROM Pelanggan
ORDER BY Nama DESC;
-- Dalam contoh di atas, kita mengurutkan data dari tabel Pelanggan berdasarkan kolom Nama secara descending, yang berarti akan menghasilkan urutan nama dari Z ke A.",
                'order_in_section' => 1
            ],
            [
                'section_id' => 10,
                'title' => 'Offset Fetch',
                'description' => "Klausa OFFSET FETCH digunakan dalam SQL Server untuk melakukan paging atau pembagian hasil query ke dalam sejumlah halaman tertentu. Ini memungkinkan Anda untuk memilih sebagian dari hasil query, dimulai dari posisi tertentu, dan membatasi jumlah baris yang dikembalikan.",
                'code' => "-- Untuk menggunakan OFFSET FETCH:
SELECT kolom1, kolom2, ...
FROM nama_tabel
ORDER BY nama_kolom
OFFSET nilai_offset ROWS
FETCH NEXT jumlah_baris ROWS ONLY;

-- Dalam perintah di atas:
-- SELECT kolom1, kolom2, ... adalah kolom yang ingin Anda ambil dari tabel.
-- FROM nama_tabel adalah nama tabel dari mana data akan diambil.
-- ORDER BY nama_kolom adalah kolom yang digunakan untuk mengurutkan hasil query.
-- OFFSET nilai_offset ROWS menentukan posisi awal dari mana baris akan diambil.
-- FETCH NEXT jumlah_baris ROWS ONLY menentukan jumlah baris yang akan diambil setelah offset.

-- Contoh:
-- Mengambil 10 baris dari tabel Produk, dimulai dari baris ke-20, dan mengurutkannya berdasarkan harga
SELECT * FROM Produk
ORDER BY Harga
OFFSET 20 ROWS
FETCH NEXT 10 ROWS ONLY;
-- Dalam contoh di atas, kita mengambil 10 baris dari tabel Produk, dimulai dari baris ke-20, dan mengurutkannya berdasarkan kolom Harga

-- Catatan tambahan:
-- Penggunaan offset fetch harus sama sepasang
-- Offset 2 rows artinya skip 2 rows pertama pada tabel
-- Fetch next 3 rows only artinya menampilkan hanya 3 rows saja
-- SELECT * FROM nama_table ORDER BY nama_kolom DESC OFFSET 2 ROWS
-- SELECT * FROM nama_table ORDER BY nama_kolom DESC OFFSET 2 ROWS FETCH NEXT 3 ROWS ONLY;",
                'order_in_section' => 2
            ],
            [
                'section_id' => 10,
                'title' => 'Select Top',
                'description' => "Klausa SELECT TOP digunakan dalam SQL Server untuk membatasi jumlah baris yang dikembalikan oleh sebuah query. Ini memungkinkan Anda untuk memilih sejumlah tertentu dari baris paling atas hasil query, sesuai dengan kebutuhan Anda.",
                'code' => "-- Untuk menggunakan SELECT TOP:
SELECT TOP jumlah_baris kolom1, kolom2, ...
FROM nama_tabel
ORDER BY nama_kolom;

-- Dalam perintah di atas:
-- SELECT TOP jumlah_baris adalah klausa untuk membatasi jumlah baris yang akan dikembalikan.
-- kolom1, kolom2, ... adalah kolom yang ingin Anda ambil dari tabel.
-- FROM nama_tabel adalah nama tabel dari mana data akan diambil.
-- ORDER BY nama_kolom adalah kolom yang digunakan untuk mengurutkan hasil query.

-- Contoh:
-- Mengambil 10 baris pertama dari tabel Produk dan mengurutkannya berdasarkan harga
SELECT TOP 10 * FROM Produk
ORDER BY Harga;
-- Dalam contoh di atas, kita mengambil 10 baris pertama dari tabel Produk dan mengurutkannya berdasarkan kolom Harga.

-- Catatan tambahan:
-- Digunakan untuk membatasi jumlah row yang akan keluar ketika kita akan query
-- SELECT TOP 3 * FROM nama_tabel
-- SELECT TOP 30 PERCENT * FROM nama_tabel artinya 30% data akan ditampilkan
-- SELECT TOP 3 WITH TIES * FROM nama_tabel ORDER BY nama_kolom
-- WITH TIES harus menggunakan ORDER BY",
                'order_in_section' => 3
            ],
            [
                'section_id' => 10,
                'title' => 'Select Distinct',
                'description' => "Klausa SELECT DISTINCT digunakan dalam SQL untuk mengembalikan nilai yang unik dari kolom atau kombinasi kolom tertentu dalam hasil query. Ini berguna ketika Anda ingin menghilangkan duplikat dari hasil query dan hanya mendapatkan nilai yang unik.",
                'code' => "-- Untuk menggunakan SELECT DISTINCT:
SELECT DISTINCT kolom1, kolom2, ...
FROM nama_tabel;

-- Dalam perintah di atas:
-- SELECT DISTINCT adalah klausa yang digunakan untuk mengembalikan nilai yang unik.
-- kolom1, kolom2, ... adalah kolom yang ingin Anda ambil nilai uniknya.
-- FROM nama_tabel adalah nama tabel dari mana data akan diambil.

-- Contoh:
-- Mengambil nilai unik dari kolom Kota dalam tabel Pelanggan
SELECT DISTINCT Kota FROM Pelanggan;
-- Dalam contoh di atas, kita mengambil nilai yang unik dari kolom Kota dalam tabel Pelanggan, sehingga hanya nilai yang unik dari kolom tersebut yang akan dikembalikan.",
                'order_in_section' => 4
            ],
            [
                'section_id' => 10,
                'title' => 'Where',
                'description' => "Klausa WHERE digunakan dalam SQL untuk menyaring baris yang sesuai dengan kriteria tertentu dari hasil query. Ini memungkinkan Anda untuk menentukan kondisi yang harus dipenuhi oleh baris yang akan dikembalikan.",
                'code' => "-- Untuk menggunakan WHERE:
SELECT kolom1, kolom2, ...
FROM nama_tabel
WHERE kondisi;

-- Dalam perintah di atas:
-- SELECT kolom1, kolom2, ... adalah kolom yang ingin Anda ambil nilai dari tabel.
-- FROM nama_tabel adalah nama tabel dari mana data akan diambil.
-- WHERE kondisi adalah kondisi yang harus dipenuhi oleh baris yang akan dikembalikan.

-- Contoh:
-- Mengambil data pelanggan yang berasal dari kota 'Jakarta' dari tabel Pelanggan
SELECT * FROM Pelanggan
WHERE Kota = 'Jakarta';
-- Dalam contoh di atas, kita mengambil semua data pelanggan dari tabel Pelanggan yang berasal dari kota 'Jakarta'.",
                'order_in_section' => 5
            ],
            [
                'section_id' => 10,
                'title' => 'Null',
                'description' => "NULL adalah nilai khusus dalam SQL yang menunjukkan bahwa nilai kolom atau ekspresi tidak ada atau tidak diketahui. Ini digunakan untuk mewakili ketiadaan nilai atau keadaan yang tidak pasti dalam data.",
                'code' => "-- Contoh penggunaan NULL:
-- Menampilkan data pelanggan yang tidak memiliki nomor telepon
SELECT * FROM Pelanggan
WHERE NomorTelepon IS NULL;

-- Menampilkan data pelanggan yang memiliki nomor telepon yang tidak diketahui
SELECT * FROM Pelanggan
WHERE NomorTelepon = NULL;
-- Perhatikan bahwa penggunaan operator '=' untuk NULL biasanya tidak mengembalikan hasil yang diharapkan. Sebaliknya, Anda harus menggunakan 'IS NULL' atau 'IS NOT NULL'.

-- Contoh:
-- Mengambil data pelanggan yang tidak memiliki alamat email dari tabel Pelanggan
SELECT * FROM Pelanggan
WHERE Email IS NULL;
-- Dalam contoh di atas, kita mengambil semua data pelanggan dari tabel Pelanggan yang tidak memiliki alamat email.",
                'order_in_section' => 6
            ],
            [
                'section_id' => 10,
                'title' => 'In',
                'description' => "Klausa IN digunakan dalam SQL untuk memfilter hasil query berdasarkan kumpulan nilai yang sesuai dengan nilai-nilai tertentu dalam kolom tertentu. Ini memungkinkan Anda untuk memilih baris yang memiliki nilai dalam kolom yang sama dengan salah satu dari serangkaian nilai yang Anda tentukan.",
                'code' => "-- Mengambil data pelanggan yang berasal dari kota 'Jakarta' atau 'Bandung'
SELECT * FROM Pelanggan
WHERE Kota IN ('Jakarta', 'Bandung');

-- Mengambil data produk dengan ID 1001, 1002, atau 1003
SELECT * FROM Produk
WHERE ID IN (1001, 1002, 1003);

-- Dalam contoh pertama, klausa IN digunakan untuk memfilter data pelanggan berdasarkan kota mereka, di mana pelanggan harus berasal dari 'Jakarta' atau 'Bandung'. Dalam contoh kedua, klausa IN digunakan untuk memilih data produk dengan ID yang sesuai dengan salah satu dari nilai yang diberikan, yaitu 1001, 1002, atau 1003.",
                'order_in_section' => 7
            ],
            [
                'section_id' => 10,
                'title' => 'Between',
                'description' => "Klausa BETWEEN digunakan dalam SQL untuk memfilter hasil query berdasarkan rentang nilai tertentu dari suatu kolom. Ini memungkinkan Anda untuk memilih baris yang memiliki nilai dalam kolom di antara dua nilai tertentu, termasuk kedua nilai tersebut.",
                'code' => "-- Untuk menggunakan klausa BETWEEN:
SELECT * FROM nama_tabel
WHERE nama_kolom BETWEEN nilai_awal AND nilai_akhir;

-- Dalam perintah di atas:
-- nama_tabel adalah nama tabel dari mana data akan diambil.
-- nama_kolom adalah nama kolom yang ingin Anda filter berdasarkan rentang nilai.
-- nilai_awal dan nilai_akhir adalah nilai-nilai yang menentukan rentang nilai yang diinginkan.

-- Contoh:
-- Mengambil data pelanggan yang memiliki umur antara 20 dan 30 tahun
SELECT * FROM Pelanggan
WHERE Umur BETWEEN 20 AND 30;

-- Mengambil data produk dengan harga antara 1000 dan 2000
SELECT * FROM Produk
WHERE Harga BETWEEN 1000 AND 2000;
-- Dalam contoh di atas, klausa BETWEEN digunakan untuk memfilter data berdasarkan rentang nilai umur pada kolom Umur dalam tabel Pelanggan, serta rentang nilai harga pada kolom Harga dalam tabel Produk.",
                'order_in_section' => 8
            ],
            [
                'section_id' => 10,
                'title' => 'Like',
                'description' => "Klausa LIKE digunakan dalam SQL untuk memfilter hasil query berdasarkan pola teks tertentu dalam sebuah kolom. Ini memungkinkan Anda untuk mencocokkan nilai kolom dengan pola teks yang ditentukan menggunakan wildcard seperti '%', '_' dan '[]'.",
                'code' => "-- Untuk menggunakan klausa LIKE:
SELECT * FROM nama_tabel
WHERE nama_kolom LIKE 'pola';

-- Dalam perintah di atas:
-- nama_tabel adalah nama tabel dari mana data akan diambil.
-- nama_kolom adalah nama kolom yang ingin Anda filter berdasarkan pola teks.
-- 'pola' adalah pola teks yang ingin Anda cocokkan.

-- Contoh:
-- Mengambil data pelanggan dengan nama yang diawali huruf 'A'
SELECT * FROM Pelanggan
WHERE Nama LIKE 'A%';

-- Mengambil data produk dengan nama yang mengandung kata 'sepatu'
SELECT * FROM Produk
WHERE Nama LIKE '%sepatu%';
-- Dalam contoh di atas, klausa LIKE digunakan untuk memfilter data berdasarkan pola teks pada kolom Nama dalam tabel Pelanggan dan Produk.

-- Tambahan:
-- like 'z%'(awalan)
-- like '%er' (akhiran)
-- like 't%s' (awalan dan akhiran)
-- like '_u%' (karakter keduanya harus u dan setelahnya bebas)
-- like '[YZ]%' (karakter depan Y dan Z)
-- like '[A-C]%' (karakter depan tidak mengandung A-C)
-- like '[^A-X]%' (karakter depan tidak mengandung A-X)
-- like '%30!%%' escape '!' (jika ada persentase)",
                'order_in_section' => 9
            ],
            [
                'section_id' => 10,
                'title' => 'Tabel dan Column Alias',
                'description' => "Alias tabel dan kolom digunakan dalam SQL untuk memberikan nama alternatif untuk tabel atau kolom dalam sebuah query. Ini berguna untuk membuat query lebih mudah dibaca atau ketika Anda ingin merujuk ke tabel atau kolom dengan nama yang lebih singkat atau deskriptif.",
                'code' => "-- Untuk menggunakan alias tabel:
SELECT a.kolom1, b.kolom2
FROM nama_tabel1 AS a
JOIN nama_tabel2 AS b ON a.kolom1 = b.kolom1;

-- Untuk menggunakan alias kolom:
SELECT kolom1 AS alias_kolom1, kolom2 AS alias_kolom2
FROM nama_tabel;

-- Dalam perintah di atas:
-- nama_tabel1, nama_tabel2 adalah nama tabel yang digunakan dalam query.
-- a, b adalah alias tabel yang diberikan untuk menyebutkan tabel secara singkat dalam query.
-- kolom1, kolom2 adalah nama kolom yang ingin Anda ambil nilai atau gabungkan.
-- alias_kolom1, alias_kolom2 adalah nama alternatif untuk kolom yang digunakan dalam hasil query.

-- Contoh:
-- Menggunakan alias tabel:
SELECT o.ID, c.Nama
FROM Orders AS o
JOIN Customers AS c ON o.CustomerID = c.CustomerID;

-- Menggunakan alias kolom:
SELECT Nama AS Nama_Pelanggan, Umur AS Usia
FROM Pelanggan;
-- Dalam contoh di atas, kita menggunakan alias tabel 'o' untuk Orders dan 'c' untuk Customers. Sedangkan pada contoh kedua, kita memberikan alias kolom 'Nama_Pelanggan' untuk kolom Nama dan 'Usia' untuk kolom Umur dalam tabel Pelanggan.",
                'order_in_section' => 10
            ],
            [
                'section_id' => 10,
                'title' => 'Join',
                'description' => "JOIN adalah operasi dalam SQL yang digunakan untuk menggabungkan baris dari dua atau lebih tabel berdasarkan kondisi yang ditentukan. Ini memungkinkan Anda untuk menggabungkan data dari tabel yang berbeda untuk mendapatkan informasi yang lebih lengkap atau terkait.",
                'code' => "-- Untuk menggunakan JOIN:
SELECT kolom1, kolom2, ...
FROM nama_tabel1
JOIN nama_tabel2 ON kondisi_join;

-- Dalam perintah di atas:
-- kolom1, kolom2, ... adalah kolom yang ingin Anda ambil nilai dari tabel yang digabungkan.
-- nama_tabel1, nama_tabel2 adalah nama tabel yang ingin Anda gabungkan.
-- kondisi_join adalah kondisi yang menentukan bagaimana baris dari kedua tabel akan digabungkan.

-- Contoh:
-- Menggabungkan data dari tabel Orders dengan data dari tabel Customers berdasarkan CustomerID
SELECT o.OrderID, o.OrderDate, c.CustomerName
FROM Orders AS o
JOIN Customers AS c ON o.CustomerID = c.CustomerID;
-- Dalam contoh di atas, kita menggabungkan data dari tabel Orders dengan data dari tabel Customers berdasarkan kolom CustomerID yang ada di kedua tabel.",
                'order_in_section' => 11
            ],
            [
                'section_id' => 10,
                'title' => 'Inner Join',
                'description' => "INNER JOIN adalah jenis join dalam SQL yang mengembalikan baris yang memiliki nilai yang sesuai dalam kedua tabel yang digabungkan. Ini memungkinkan Anda untuk menggabungkan data dari dua tabel yang memiliki nilai yang cocok dalam kolom yang ditentukan.",
                'code' => "-- Untuk menggunakan INNER JOIN:
SELECT kolom1, kolom2, ...
FROM nama_tabel1
INNER JOIN nama_tabel2 ON kondisi_join;

-- Dalam perintah di atas:
-- kolom1, kolom2, ... adalah kolom yang ingin Anda ambil nilai dari tabel yang digabungkan.
-- nama_tabel1, nama_tabel2 adalah nama tabel yang ingin Anda gabungkan.
-- kondisi_join adalah kondisi yang menentukan bagaimana baris dari kedua tabel akan digabungkan.

-- Contoh:
-- Menggabungkan data dari tabel Orders dengan data dari tabel Customers berdasarkan CustomerID
SELECT o.OrderID, o.OrderDate, c.CustomerName
FROM Orders AS o
INNER JOIN Customers AS c ON o.CustomerID = c.CustomerID;
-- Dalam contoh di atas, kita menggunakan INNER JOIN untuk menggabungkan data dari tabel Orders dengan data dari tabel Customers berdasarkan kolom CustomerID yang ada di kedua tabel. Ini akan mengembalikan hanya baris yang memiliki nilai yang cocok dalam kedua tabel.",
                'order_in_section' => 12
            ],
            [
                'section_id' => 10,
                'title' => 'Left Join',
                'description' => "-- Untuk menggunakan LEFT JOIN:
SELECT kolom1, kolom2, ...
FROM nama_tabel1
LEFT JOIN nama_tabel2 ON kondisi_join;

-- Dalam perintah di atas:
-- kolom1, kolom2, ... adalah kolom yang ingin Anda ambil nilai dari tabel yang digabungkan.
-- nama_tabel1 adalah tabel kiri (tabel pertama dalam pernyataan JOIN).
-- nama_tabel2 adalah tabel kanan (tabel kedua dalam pernyataan JOIN).
-- kondisi_join adalah kondisi yang menentukan bagaimana baris dari kedua tabel akan digabungkan.

-- Contoh:
-- Menggabungkan data dari tabel Orders dengan data dari tabel Customers menggunakan LEFT JOIN
SELECT o.OrderID, o.OrderDate, c.CustomerName
FROM Orders AS o
LEFT JOIN Customers AS c ON o.CustomerID = c.CustomerID;
-- Dalam contoh di atas, kita menggunakan LEFT JOIN untuk menggabungkan data dari tabel Orders (tabel kiri) dengan data dari tabel Customers (tabel kanan) berdasarkan CustomerID. Ini akan mengembalikan semua baris dari tabel Orders dan hanya baris yang sesuai dari tabel Customers. Jika tidak ada nilai yang cocok dalam tabel Customers, NULL akan digunakan untuk nilai-nilai tersebut.",
                'code' => "-- select a.kolom1, b.kolom2, c.kolom2 from tabel1 as a left join
tabel2 as b on(a.id=b.id) left join
tabel3 as c on(c.id=b.kolom_id)",
                'order_in_section' => 13
            ],
            [
                'section_id' => 10,
                'title' => 'Right Join',
                'description' => "RIGHT JOIN adalah jenis join dalam SQL yang mengembalikan semua baris dari tabel kanan (tabel kedua yang disebutkan dalam pernyataan JOIN), dan baris yang sesuai dari tabel kiri (tabel pertama yang disebutkan dalam pernyataan JOIN). Jika tidak ada nilai yang cocok dalam tabel kiri, NULL akan digunakan untuk nilai-nilai tersebut.",
                'code' => "-- Untuk menggunakan RIGHT JOIN:
SELECT kolom1, kolom2, ...
FROM nama_tabel1
RIGHT JOIN nama_tabel2 ON kondisi_join;

-- Dalam perintah di atas:
-- kolom1, kolom2, ... adalah kolom yang ingin Anda ambil nilai dari tabel yang digabungkan.
-- nama_tabel1 adalah tabel kiri (tabel pertama dalam pernyataan JOIN).
-- nama_tabel2 adalah tabel kanan (tabel kedua dalam pernyataan JOIN).
-- kondisi_join adalah kondisi yang menentukan bagaimana baris dari kedua tabel akan digabungkan.

-- Contoh:
-- Menggabungkan data dari tabel Orders dengan data dari tabel Customers menggunakan RIGHT JOIN
SELECT o.OrderID, o.OrderDate, c.CustomerName
FROM Orders AS o
RIGHT JOIN Customers AS c ON o.CustomerID = c.CustomerID;
-- Dalam contoh di atas, kita menggunakan RIGHT JOIN untuk menggabungkan data dari tabel Orders (tabel kiri) dengan data dari tabel Customers (tabel kanan) berdasarkan CustomerID. Ini akan mengembalikan semua baris dari tabel Customers dan hanya baris yang sesuai dari tabel Orders. Jika tidak ada nilai yang cocok dalam tabel Orders, NULL akan digunakan untuk nilai-nilai tersebut.",
                'order_in_section' => 14
            ],
            [
                'section_id' => 10,
                'title' => 'Full Outer Join',
                'description' => "FULL OUTER JOIN adalah jenis join dalam SQL yang mengembalikan semua baris dari kedua tabel yang digabungkan, baik yang sesuai maupun yang tidak sesuai antara tabel kiri (tabel pertama yang disebutkan dalam pernyataan JOIN) dan tabel kanan (tabel kedua yang disebutkan dalam pernyataan JOIN). Jika tidak ada nilai yang cocok dalam salah satu tabel, NULL akan digunakan untuk nilai-nilai tersebut.",
                'code' => "-- Untuk menggunakan FULL OUTER JOIN:
SELECT kolom1, kolom2, ...
FROM nama_tabel1
FULL OUTER JOIN nama_tabel2 ON kondisi_join;

-- Dalam perintah di atas:
-- kolom1, kolom2, ... adalah kolom yang ingin Anda ambil nilai dari tabel yang digabungkan.
-- nama_tabel1 adalah tabel kiri (tabel pertama dalam pernyataan JOIN).
-- nama_tabel2 adalah tabel kanan (tabel kedua dalam pernyataan JOIN).
-- kondisi_join adalah kondisi yang menentukan bagaimana baris dari kedua tabel akan digabungkan.

-- Contoh:
-- Menggabungkan data dari tabel Orders dengan data dari tabel Customers menggunakan FULL OUTER JOIN
SELECT o.OrderID, o.OrderDate, c.CustomerName
FROM Orders AS o
FULL OUTER JOIN Customers AS c ON o.CustomerID = c.CustomerID;
-- Dalam contoh di atas, kita menggunakan FULL OUTER JOIN untuk menggabungkan data dari tabel Orders (tabel kiri) dengan data dari tabel Customers (tabel kanan) berdasarkan CustomerID. Ini akan mengembalikan semua baris dari kedua tabel, termasuk baris yang sesuai maupun yang tidak sesuai. Jika tidak ada nilai yang cocok dalam salah satu tabel, NULL akan digunakan untuk nilai-nilai tersebut.",
                'order_in_section' => 15
            ],
            [
                'section_id' => 10,
                'title' => 'Self Join',
                'description' => "SELF JOIN adalah jenis join dalam SQL di mana tabel digabungkan dengan dirinya sendiri. Ini berguna ketika Anda perlu menggabungkan baris dari tabel yang memiliki hubungan hierarkis atau referensial dengan dirinya sendiri.",
                'code' => "-- Untuk menggunakan SELF JOIN:
SELECT a.kolom1, b.kolom2
FROM nama_tabel AS a
JOIN nama_tabel AS b ON kondisi_join;

-- Dalam perintah di atas:
-- a, b adalah alias tabel yang digunakan untuk menyebutkan tabel yang sama dalam query.
-- kolom1, kolom2 adalah kolom yang ingin Anda ambil nilai dari tabel yang digabungkan.
-- nama_tabel adalah nama tabel yang digunakan dalam SELF JOIN.
-- kondisi_join adalah kondisi yang menentukan bagaimana baris dari tabel akan digabungkan dengan dirinya sendiri.

-- Contoh:
-- Menggabungkan data dari tabel Employees dengan data dari tabel Employees yang berperan sebagai manajer
SELECT e1.EmployeeName AS Employee, e2.EmployeeName AS Manager
FROM Employees AS e1
JOIN Employees AS e2 ON e1.ManagerID = e2.EmployeeID;
-- Dalam contoh di atas, kita menggunakan SELF JOIN untuk menggabungkan data dari tabel Employees dengan dirinya sendiri. Ini digunakan untuk menampilkan nama karyawan dan nama manajer yang bersangkutan dalam tabel yang sama berdasarkan kolom ManagerID.",
                'order_in_section' => 16
            ],
            [
                'section_id' => 10,
                'title' => 'Cross Join',
                'description' => "CROSS JOIN adalah jenis join dalam SQL yang menghasilkan hasil gabungan dari dua tabel tanpa memperhatikan apakah ada hubungan antara mereka. Ini menghasilkan jumlah baris yang sama dengan jumlah baris dalam tabel pertama dikalikan dengan jumlah baris dalam tabel kedua.",
                'code' => "-- Untuk menggunakan CROSS JOIN:
SELECT kolom1, kolom2, ...
FROM nama_tabel1
CROSS JOIN nama_tabel2;

-- Dalam perintah di atas:
-- kolom1, kolom2, ... adalah kolom yang ingin Anda ambil nilai dari hasil gabungan tabel.
-- nama_tabel1, nama_tabel2 adalah nama tabel yang ingin Anda gabungkan.

-- Contoh:
-- Menghasilkan hasil gabungan dari tabel Products dan tabel Categories menggunakan CROSS JOIN
SELECT *
FROM Products
CROSS JOIN Categories;
-- Dalam contoh di atas, kita menggunakan CROSS JOIN untuk menghasilkan hasil gabungan dari dua tabel, Products dan Categories. Ini akan menghasilkan setiap kombinasi baris dari kedua tabel tanpa memperhatikan hubungan antar mereka.",
                'order_in_section' => 17
            ],
            [
                'section_id' => 10,
                'title' => 'Group By',
                'description' => "Klausa GROUP BY dalam SQL digunakan untuk mengelompokkan baris yang memiliki nilai yang sama dalam satu atau beberapa kolom. Ini memungkinkan Anda untuk melakukan operasi agregasi seperti SUM, COUNT, AVG, MAX, dan MIN pada kelompok data tersebut.",
                'code' => "-- Untuk menggunakan GROUP BY:
SELECT kolom1, fungsi_agregasi(kolom2), ...
FROM nama_tabel
GROUP BY kolom1;

-- Dalam perintah di atas:
-- kolom1 adalah kolom yang digunakan untuk mengelompokkan data.
-- fungsi_agregasi adalah fungsi agregasi seperti SUM, COUNT, AVG, MAX, atau MIN yang diterapkan pada kolom yang ingin Anda agregasi.
-- kolom2 adalah kolom yang ingin Anda agregasi nilai-nilainya.
-- nama_tabel adalah nama tabel dari mana data akan diambil.

-- Contoh:
-- Menghitung jumlah pesanan per pelanggan dari tabel Orders
SELECT CustomerID, COUNT(OrderID) AS TotalOrders
FROM Orders
GROUP BY CustomerID;
-- Dalam contoh di atas, kita menggunakan GROUP BY untuk mengelompokkan pesanan berdasarkan CustomerID, kemudian menggunakan COUNT untuk menghitung jumlah pesanan untuk setiap pelanggan.


-- Catatan tambahan:
-- Mengelompokan record tertentu
-- Istilahnya kayak menghilangkan duplikat data, misal yang kategorynya 5 ada 7 data, nah si tujuh data ini bisa dijumlahkan menggunakan fungsi sum
-- Berapa data yang ketegorinya 5 , 7 data. nah dari 7 data ingin tahu jumlah seluruh data harganya berapa . dari situlah fungsi sum
-- select count(barang_id) as jumlah, sum(harga) as total, sum(diskon) as tot_diskon, category_id from barang group by category_id
-- select count(barang_id) as jumlah, sum(harga) as total, sum(diskon) as tot_diskon, category_id from barang as b left join barang_category as c on (b.category_id=c.category_id) group by b.category_id",
                'order_in_section' => 18
            ],
            [
                'section_id' => 10,
                'title' => 'Having Clause',
                'description' => "Klausa HAVING dalam SQL digunakan bersama dengan klausa GROUP BY untuk memberikan kondisi tambahan pada hasil kelompok. Ini memungkinkan Anda untuk menyaring hasil kelompok berdasarkan kriteria yang diterapkan setelah operasi pengelompokan dilakukan.",
                'code' => "-- Untuk menggunakan HAVING:
SELECT kolom1, fungsi_agregasi(kolom2), ...
FROM nama_tabel
GROUP BY kolom1
HAVING kondisi;

-- Dalam perintah di atas:
-- kolom1 adalah kolom yang digunakan untuk mengelompokkan data.
-- fungsi_agregasi adalah fungsi agregasi seperti SUM, COUNT, AVG, MAX, atau MIN yang diterapkan pada kolom yang ingin Anda agregasi.
-- kolom2 adalah kolom yang ingin Anda agregasi nilai-nilainya.
-- nama_tabel adalah nama tabel dari mana data akan diambil.
-- kondisi adalah kondisi tambahan yang diterapkan pada hasil kelompok.

-- Contoh:
-- Menampilkan total pesanan untuk pelanggan yang memiliki lebih dari 5 pesanan
SELECT CustomerID, COUNT(OrderID) AS TotalOrders
FROM Orders
GROUP BY CustomerID
HAVING COUNT(OrderID) > 5;
-- Dalam contoh di atas, kita menggunakan HAVING untuk menyaring hasil kelompok hanya untuk pelanggan yang memiliki lebih dari 5 pesanan.",
                'order_in_section' => 19
            ],
            [
                'section_id' => 10,
                'title' => 'Grouping Sets',
                'description' => "GROUPING SETS adalah klausa dalam SQL yang memungkinkan Anda untuk melakukan operasi GROUP BY dengan beberapa kelompok kolom secara bersamaan. Ini memungkinkan Anda untuk menghitung total agregat untuk beberapa set kolom dalam satu query.",
                'code' => "-- Untuk menggunakan GROUPING SETS:
SELECT kolom1, kolom2, fungsi_agregasi(kolom3), ...
FROM nama_tabel
GROUP BY GROUPING SETS ((kolom1, kolom2), (kolom1), (kolom2), ());

-- Dalam perintah di atas:
-- kolom1, kolom2, ... adalah kolom yang ingin Anda kelompokkan atau agregasi.
-- fungsi_agregasi adalah fungsi agregasi seperti SUM, COUNT, AVG, MAX, atau MIN yang diterapkan pada kolom yang ingin Anda agregasi.
-- nama_tabel adalah nama tabel dari mana data akan diambil.

-- Contoh:
-- Menampilkan total harga pesanan berdasarkan pelanggan dan produk
SELECT CustomerID, ProductID, SUM(Price) AS TotalPrice
FROM Orders
GROUP BY GROUPING SETS ((CustomerID, ProductID), (CustomerID), (ProductID), ());
-- Dalam contoh di atas, kita menggunakan GROUPING SETS untuk menghitung total harga pesanan untuk beberapa set kolom, yaitu (CustomerID, ProductID), (CustomerID), (ProductID), dan (). Ini akan menghasilkan total harga pesanan berdasarkan kombinasi pelanggan dan produk, pelanggan saja, produk saja, dan total keseluruhan.

-- Contoh lain:
-- Untuk menampung beberapa looping
-- Tanpa grouping sets :
select a.kolom2, b.kolom2, sum(c.kolom2) as total from tabel1 as a inner join tabel2 as b on(a.kolom_id=b.kolom_id) inner join tabel3 as c on c.kolom_id=a.kolom_id group by a.kolom2, b.kolom2
union all
select null, b.kolom2, sum(c.kolom2) as total from tabel1 as a inner join tabel2 as b on(a.kolom_id=b.kolom_id) inner join tabel3 as c on c.kolom_id=a.kolom_id group by b.kolom2
union all
select a.kolom2, null, sum(c.kolom2) as total from tabel1 as a inner join tabel2 as b on(a.kolom_id=b.kolom_id) inner join tabel3 as c on c.kolom_id=a.kolom_id group by a.kolom2
-- Dengan grouping sets :
select a.kolom2, b.kolom2, sum(c.kolom2) as total from tabel1 as a inner join tabel2 as b on(a.kolom_id=b.kolom_id) inner join tabel3 as c on c.kolom_id=a.kolom_id
group by grouping sets((a.kolom2, b.kolom2),(a.kolom2),(b.kolom2))",
                'order_in_section' => 20
            ],
            [
                'section_id' => 10,
                'title' => 'Cube',
                'description' => "CUBE adalah klausa dalam SQL yang memungkinkan Anda untuk melakukan operasi GROUP BY dengan menghasilkan semua kombinasi subtotal yang mungkin dari kelompok kolom yang ditentukan. Ini berguna untuk membuat laporan yang berisi aggregat subtotal untuk berbagai kombinasi kolom.",
                'code' => "-- Untuk menggunakan CUBE:
SELECT kolom1, kolom2, fungsi_agregasi(kolom3), ...
FROM nama_tabel
GROUP BY CUBE (kolom1, kolom2);

-- Dalam perintah di atas:
-- kolom1, kolom2, ... adalah kolom yang ingin Anda kelompokkan atau agregasi.
-- fungsi_agregasi adalah fungsi agregasi seperti SUM, COUNT, AVG, MAX, atau MIN yang diterapkan pada kolom yang ingin Anda agregasi.
-- nama_tabel adalah nama tabel dari mana data akan diambil.

-- Contoh:
-- Menampilkan total harga pesanan berdasarkan pelanggan dan produk menggunakan CUBE
SELECT CustomerID, ProductID, SUM(Price) AS TotalPrice
FROM Orders
GROUP BY CUBE (CustomerID, ProductID);
-- Dalam contoh di atas, kita menggunakan CUBE untuk menghasilkan semua kombinasi subtotal yang mungkin dari kelompok pelanggan dan produk. Ini akan menghasilkan total harga pesanan untuk setiap kombinasi pelanggan, produk, dan juga total keseluruhan.

-- Catatan tambahan:
-- Akan menampilkan semua kemungkinan yang akan terjadi dari proses query
-- select a.kolom2, b.kolom2, sum(c.kolom2) as total from tabel1 as a inner join tabel2 as b on(a.kolom_id=b.kolom_id) inner join tabel3 as c on c.kolom_id=a.kolom_id
group by cube(a.kolom2, b.kolom2)) order by a.kolom2, b.kolom2",
                'order_in_section' => 21
            ],
            [
                'section_id' => 10,
                'title' => 'Rollup',
                'description' => "ROLLUP adalah klausa dalam SQL yang memungkinkan Anda untuk melakukan operasi GROUP BY dengan menghasilkan subtotal dan total keseluruhan dari kelompok kolom yang ditentukan. Ini memungkinkan Anda untuk membuat laporan yang berisi subtotal dan total keseluruhan untuk sekelompok data.",
                'code' => "-- Untuk menggunakan ROLLUP:
SELECT kolom1, kolom2, fungsi_agregasi(kolom3), ...
FROM nama_tabel
GROUP BY ROLLUP (kolom1, kolom2);

-- Dalam perintah di atas:
-- kolom1, kolom2, ... adalah kolom yang ingin Anda kelompokkan atau agregasi.
-- fungsi_agregasi adalah fungsi agregasi seperti SUM, COUNT, AVG, MAX, atau MIN yang diterapkan pada kolom yang ingin Anda agregasi.
-- nama_tabel adalah nama tabel dari mana data akan diambil.

-- Contoh:
-- Menampilkan total harga pesanan berdasarkan pelanggan dan produk menggunakan ROLLUP
SELECT CustomerID, ProductID, SUM(Price) AS TotalPrice
FROM Orders
GROUP BY ROLLUP (CustomerID, ProductID);
-- Dalam contoh di atas, kita menggunakan ROLLUP untuk menghasilkan subtotal dan total keseluruhan dari kelompok pelanggan dan produk. Ini akan menghasilkan subtotal harga pesanan untuk setiap kombinasi pelanggan dan produk, serta total keseluruhan.

-- Catatan tambahan:
-- Rollup akan menampilkan semua kemungkinan kolom, seperti hirarki dari grouping sets. contoh di set ada 2 kolom tampil
-- select a.kolom2, b.kolom2, sum(b.kolom2) as total from tabel1 as a inner join tabel2 as b on(a.kolom_id=b.kolom_id) group by grouping sets((a.kolom2, b.kolom2),(a.kolom2),())
-- select a.kolom2, b.kolom2, sum(b.kolom2) as total from tabel1 as a inner join tabel2 as b on(a.kolom_id=b.kolom_id) group by rollup(a.kolom2,b.kolom2)",
                'order_in_section' => 22
            ],
            [
                'section_id' => 10,
                'title' => 'Sub Query',
                'description' => "Subquery (subquery) adalah query yang bersarang di dalam query utama. Ini digunakan untuk menggabungkan dua atau lebih query bersama-sama dalam satu pernyataan SQL. Subquery dapat digunakan di dalam klausa WHERE, HAVING, FROM, atau SELECT.",
                'code' => "-- Contoh penggunaan subquery dalam klausa WHERE:
SELECT nama_kolom
FROM nama_tabel
WHERE nama_kolom IN (SELECT nama_kolom FROM nama_tabel WHERE kondisi);

-- Dalam perintah di atas:
-- nama_tabel adalah tabel utama.
-- nama_kolom adalah kolom yang ingin Anda tampilkan atau gunakan dalam subquery.
-- kondisi adalah kondisi yang diterapkan dalam subquery.

-- Contoh:
-- Menampilkan nama pelanggan yang memiliki pesanan
SELECT Nama
FROM Pelanggan
WHERE ID IN (SELECT DISTINCT CustomerID FROM Orders);
-- Dalam contoh di atas, subquery digunakan untuk mengambil ID pelanggan yang memiliki pesanan, dan kemudian query utama menggunakan IN untuk mencari nama pelanggan yang sesuai dengan ID tersebut.

-- Catatan tambahan:
-- select nama_barang, jumlah, harga,(select nama_brand from brand where brand_id=barang.brand_id) as 'nama brand' from barang where category_id in(select category_id from barang_category where nama_category like '%an')",
                'order_in_section' => 23
            ],
            [
                'section_id' => 10,
                'title' => 'Correlated Subquery',
                'description' => "Correlated subquery (subquery berkorrelasi) adalah subquery di dalam SQL yang menggunakan nilai dari tabel luar dalam subquery. Subquery ini dieksekusi untuk setiap baris dari tabel luar, dan hasilnya digunakan dalam kondisi subquery. Hal ini memungkinkan Anda untuk melakukan operasi yang lebih kompleks berdasarkan data dari baris saat ini.",
                'code' => "-- Contoh penggunaan correlated subquery:
SELECT nama_kolom1
FROM nama_tabel1 AS alias1
WHERE kondisi_operasi_operator (SELECT fungsi_agregasi(nama_kolom2) FROM nama_tabel2 AS alias2 WHERE kondisi_subquery = alias1.nama_kolom1);

-- Dalam perintah di atas:
-- nama_tabel1 adalah tabel utama.
-- nama_tabel2 adalah tabel yang digunakan dalam subquery.
-- nama_kolom1 adalah kolom yang digunakan dalam subquery dan memiliki keterkaitan dengan tabel utama.
-- nama_kolom2 adalah kolom yang digunakan dalam subquery untuk dihitung atau dibandingkan.
-- kondisi_subquery adalah kondisi yang digunakan dalam subquery.
-- fungsi_agregasi adalah fungsi seperti COUNT, SUM, AVG, MAX, atau MIN yang digunakan dalam subquery.

-- Contoh:
-- Menampilkan nama pelanggan yang memiliki lebih dari satu pesanan
SELECT Nama
FROM Pelanggan AS p
WHERE (SELECT COUNT(*) FROM Orders AS o WHERE o.CustomerID = p.ID) > 1;
-- Dalam contoh di atas, correlated subquery digunakan untuk menghitung jumlah pesanan untuk setiap pelanggan dan hanya mengembalikan nama pelanggan yang memiliki lebih dari satu pesanan.",
                'order_in_section' => 24
            ],
            [
                'section_id' => 10,
                'title' => 'Exist',
                'description' => "Operator EXISTS digunakan dalam SQL untuk memeriksa apakah subquery mengembalikan setidaknya satu baris data. Jika subquery mengembalikan setidaknya satu baris, kondisi EXISTS akan dievaluasi sebagai TRUE; jika tidak, akan dievaluasi sebagai FALSE.",
                'code' => "-- Contoh penggunaan operator EXISTS:
SELECT nama_kolom
FROM nama_tabel
WHERE EXISTS (SELECT * FROM nama_tabel2 WHERE kondisi);

-- Dalam perintah di atas:
-- nama_tabel adalah tabel utama.
-- nama_tabel2 adalah tabel yang digunakan dalam subquery.
-- kondisi adalah kondisi yang diterapkan dalam subquery.

-- Contoh:
-- Menampilkan nama pelanggan yang memiliki setidaknya satu pesanan
SELECT Nama
FROM Pelanggan AS p
WHERE EXISTS (SELECT * FROM Orders AS o WHERE o.CustomerID = p.ID);
-- Dalam contoh di atas, EXISTS digunakan untuk memeriksa apakah setidaknya satu pesanan ada untuk setiap pelanggan. Jika ya, nama pelanggan akan ditampilkan dalam hasil query.",
                'order_in_section' => 25
            ],
            [
                'section_id' => 10,
                'title' => 'Any',
                'description' => "Operator ANY digunakan dalam SQL untuk membandingkan nilai dengan serangkaian nilai yang dihasilkan oleh subquery. Jika setidaknya satu nilai dalam hasil subquery sama dengan nilai yang dibandingkan, kondisi ANY akan dievaluasi sebagai TRUE.",
                'code' => "-- Contoh penggunaan operator ANY:
SELECT nama_kolom
FROM nama_tabel
WHERE nama_kolom operator ANY (SELECT nama_kolom FROM nama_tabel2 WHERE kondisi);

-- Dalam perintah di atas:
-- nama_tabel adalah tabel utama.
-- nama_tabel2 adalah tabel yang digunakan dalam subquery.
-- nama_kolom adalah kolom yang dibandingkan dengan nilai-nilai dari subquery.
-- operator adalah operator perbandingan seperti =, >, <, >=, <=, !=, dll.
-- kondisi adalah kondisi yang diterapkan dalam subquery.

-- Contoh:
-- Menampilkan nama pelanggan yang memiliki jumlah pesanan lebih dari setidaknya satu pelanggan lain
SELECT Nama
FROM Pelanggan AS p
WHERE ID > ANY (SELECT CustomerID FROM (SELECT CustomerID, COUNT(*) AS TotalOrders FROM Orders GROUP BY CustomerID) AS TotalOrdersPerCustomer WHERE TotalOrders > 1);
-- Dalam contoh di atas, operator ANY digunakan untuk memeriksa apakah jumlah pesanan pelanggan tertentu lebih dari jumlah pesanan setidaknya satu pelanggan lain. Jika ya, nama pelanggan akan ditampilkan dalam hasil query.",
                'order_in_section' => 26
            ],
            [
                'section_id' => 10,
                'title' => 'All',
                'description' => "Operator ALL digunakan dalam SQL untuk membandingkan nilai dengan semua nilai yang dihasilkan oleh subquery. Kondisi ALL akan dievaluasi sebagai TRUE hanya jika semua nilai dalam hasil subquery memenuhi kondisi perbandingan yang diberikan.",
                'code' => "-- Contoh penggunaan operator ALL:
SELECT nama_kolom
FROM nama_tabel
WHERE nama_kolom operator ALL (SELECT nama_kolom FROM nama_tabel2 WHERE kondisi);

-- Dalam perintah di atas:
-- nama_tabel adalah tabel utama.
-- nama_tabel2 adalah tabel yang digunakan dalam subquery.
-- nama_kolom adalah kolom yang dibandingkan dengan nilai-nilai dari subquery.
-- operator adalah operator perbandingan seperti =, >, <, >=, <=, !=, dll.
-- kondisi adalah kondisi yang diterapkan dalam subquery.

-- Contoh:
-- Menampilkan nama pelanggan yang memiliki jumlah pesanan lebih dari semua pelanggan lain
SELECT Nama
FROM Pelanggan AS p
WHERE ID > ALL (SELECT CustomerID FROM (SELECT CustomerID, COUNT(*) AS TotalOrders FROM Orders GROUP BY CustomerID) AS TotalOrdersPerCustomer WHERE TotalOrders > 0);
-- Dalam contoh di atas, operator ALL digunakan untuk memeriksa apakah jumlah pesanan pelanggan tertentu lebih besar dari jumlah pesanan semua pelanggan lain. Jika ya, nama pelanggan akan ditampilkan dalam hasil query.",
                'order_in_section' => 27
            ],
            [
                'section_id' => 10,
                'title' => 'Union & Union all',
                'description' => "Operator UNION digunakan dalam SQL untuk menggabungkan hasil dua atau lebih query yang memiliki struktur yang sama menjadi satu set data tunggal. Union menghapus duplikat dari hasil penggabungan, sementara UNION ALL mempertahankan duplikat.",
                'code' => "-- Contoh penggunaan UNION:
SELECT kolom1, kolom2, ...
FROM nama_tabel1
UNION
SELECT kolom1, kolom2, ...
FROM nama_tabel2;

-- Contoh penggunaan UNION ALL:
SELECT kolom1, kolom2, ...
FROM nama_tabel1
UNION ALL
SELECT kolom1, kolom2, ...
FROM nama_tabel2;

-- Dalam perintah di atas:
-- kolom1, kolom2, ... adalah kolom yang ingin Anda ambil dari tabel yang digabungkan.
-- nama_tabel1, nama_tabel2 adalah nama tabel yang ingin Anda gabungkan.
-- UNION dan UNION ALL digunakan untuk menggabungkan hasil query.

-- Perhatian:
-- UNION menghapus duplikat dari hasil penggabungan, sedangkan UNION ALL mempertahankan duplikat.

-- Contoh:
-- Menggabungkan data dari tabel Pelanggan dan tabel Karyawan tanpa duplikat
SELECT Nama, Alamat
FROM Pelanggan
UNION
SELECT Nama, Alamat
FROM Karyawan;

-- Menggabungkan data dari tabel Pelanggan dan tabel Karyawan dengan mempertahankan duplikat
SELECT Nama, Alamat
FROM Pelanggan
UNION ALL
SELECT Nama, Alamat
FROM Karyawan;

-- Dalam contoh di atas, UNION menghasilkan hasil gabungan tanpa duplikat, sedangkan UNION ALL menghasilkan hasil gabungan dengan mempertahankan duplikat.

-- Catatan tambahan:
-- Untuk menggabungkan row dari beberapa query
-- Urutan kolom harus sama, tipe data
-- Union sudah otomatis di distinct
-- Union all duplicatenya tidak akan dibuang
-- select nama_barang,category_id from barang union select nama_category,category_id from barang_category union select 'laptop',4",
                'order_in_section' => 28
            ],
            [
                'section_id' => 10,
                'title' => 'Intersect',
                'description' => "Operator INTERSECT digunakan dalam SQL untuk mengembalikan baris yang ada di kedua kueri yang digabungkan. Ini menghasilkan hasil yang hanya berisi baris yang ada di kedua kueri.",
                'code' => "-- Contoh penggunaan INTERSECT:
SELECT kolom1, kolom2, ...
FROM nama_tabel1
INTERSECT
SELECT kolom1, kolom2, ...
FROM nama_tabel2;

-- Dalam perintah di atas:
-- kolom1, kolom2, ... adalah kolom yang ingin Anda ambil dari tabel yang digabungkan.
-- nama_tabel1, nama_tabel2 adalah nama tabel yang ingin Anda gabungkan.
-- INTERSECT digunakan untuk mengembalikan baris yang ada di kedua kueri yang digabungkan.

-- Contoh:
-- Mengembalikan pelanggan yang juga karyawan
SELECT Nama
FROM Pelanggan
INTERSECT
SELECT Nama
FROM Karyawan;

-- Dalam contoh di atas, kita menggunakan INTERSECT untuk mengembalikan nama pelanggan yang juga ada dalam tabel karyawan.",
                'order_in_section' => 29
            ],
            [
                'section_id' => 10,
                'title' => 'Except',
                'description' => "Operator EXCEPT digunakan dalam SQL untuk mengembalikan baris yang ada di kueri pertama tetapi tidak ada di kueri kedua. Ini menghasilkan hasil yang hanya berisi baris yang ada di kueri pertama dan tidak ada di kueri kedua.",
                'code' => "-- Contoh penggunaan EXCEPT:
SELECT kolom1, kolom2, ...
FROM nama_tabel1
EXCEPT
SELECT kolom1, kolom2, ...
FROM nama_tabel2;

-- Dalam perintah di atas:
-- kolom1, kolom2, ... adalah kolom yang ingin Anda ambil dari tabel yang digabungkan.
-- nama_tabel1, nama_tabel2 adalah nama tabel yang ingin Anda gabungkan.
-- EXCEPT digunakan untuk mengembalikan baris yang ada di kueri pertama tetapi tidak ada di kueri kedua.

-- Contoh:
-- Mengembalikan pelanggan yang bukan karyawan
SELECT Nama
FROM Pelanggan
EXCEPT
SELECT Nama
FROM Karyawan;

-- Dalam contoh di atas, kita menggunakan EXCEPT untuk mengembalikan nama pelanggan yang tidak ada dalam tabel karyawan.",
                'order_in_section' => 30
            ],
            [
                'section_id' => 10,
                'title' => 'Common Table Expression',
                'description' => "Common Table Expression (CTE) adalah kueri sementara yang didefinisikan dalam pernyataan SQL dan hanya berlaku untuk pernyataan yang mengikuti deklarasinya. CTE berguna untuk menguraikan kueri yang kompleks menjadi bagian-bagian yang lebih mudah dimengerti dan dikelola.",
                'code' => "-- Contoh penggunaan Common Table Expression (CTE):
WITH nama_CTE AS (
SELECT kolom1, kolom2, ...
FROM nama_tabel
WHERE kondisi
)
SELECT *
FROM nama_CTE;

-- Dalam perintah di atas:
-- nama_CTE adalah nama yang diberikan untuk Common Table Expression (CTE).
-- kolom1, kolom2, ... adalah kolom yang ingin Anda ambil dari tabel yang digabungkan.
-- nama_tabel adalah tabel yang digunakan dalam kueri CTE.
-- kondisi adalah kondisi yang diterapkan dalam kueri CTE.

-- Contoh:
-- Menampilkan nama pelanggan yang memiliki jumlah pesanan lebih dari satu
WITH TotalOrdersPerCustomer AS (
SELECT CustomerID, COUNT(*) AS TotalOrders
FROM Orders
GROUP BY CustomerID
)
SELECT CustomerID
FROM TotalOrdersPerCustomer
WHERE TotalOrders > 1;

-- Dalam contoh di atas, kita menggunakan CTE untuk menghitung total pesanan untuk setiap pelanggan, dan kemudian kita memilih pelanggan yang memiliki lebih dari satu pesanan dalam kueri utama.

-- Contoh lain:
-- with expression_name[(column_name [,....])]
-- as
-- (cte_definition)
-- sql_statement;
with my_cte_barang (kategory,jumlah)
as (select c.nama_category, count(b.barang_id) as jumlah from barang as b inner join barang_category as c on b.category_id=c.category_id group by c.nama_category), my_cte_category(kategory,total)
as (select c.nama_category,sum(b.harga) as total from barang as b inner join barang_category as c on c.category_id=b.category_id group by c.nama_category) select x.kategory, jumlah, total from my_cte_barang as y inner join my_cte_category as x on(x.kategory=y.kategory)",
                'order_in_section' => 31
            ],
            [
                'section_id' => 10,
                'title' => 'Recrusive Cte',
                'description' => "Common Table Expression (CTE) rekursif digunakan dalam SQL untuk membuat kueri yang mengulangi dirinya sendiri sampai kondisi berhenti terpenuhi. Ini berguna untuk menangani struktur data hierarkis seperti pohon atau grafik.",
                'code' => "-- Contoh penggunaan CTE rekursif:
WITH RECURSIVE nama_CTE (kolom1, kolom2, ...) AS (
-- Bagian non-rekursif (basis)
SELECT kolom1, kolom2, ...
FROM nama_tabel
WHERE kondisi
UNION ALL
-- Bagian rekursif (langkah rekursif)
SELECT kolom1, kolom2, ...
FROM nama_CTE
WHERE kondisi_rekursif
)
SELECT *
FROM nama_CTE;

-- Dalam perintah di atas:
-- nama_CTE adalah nama yang diberikan untuk Common Table Expression (CTE) rekursif.
-- kolom1, kolom2, ... adalah kolom yang ingin Anda ambil dari tabel yang digabungkan.
-- nama_tabel adalah tabel yang digunakan dalam kueri CTE.
-- kondisi adalah kondisi yang diterapkan dalam kueri CTE.
-- kondisi_rekursif adalah kondisi yang menentukan kapan kueri rekursif harus berhenti.

-- Contoh:
-- Menampilkan semua anak dari induk tertentu dalam struktur data hierarkis
WITH RECURSIVE EmployeeHierarchy AS (
SELECT EmployeeID, EmployeeName, ManagerID
FROM Employees
WHERE ManagerID = 1 -- ID induk yang ditentukan
UNION ALL
SELECT e.EmployeeID, e.EmployeeName, e.ManagerID
FROM Employees e
INNER JOIN EmployeeHierarchy eh ON eh.EmployeeID = e.ManagerID
)
SELECT *
FROM EmployeeHierarchy;

-- Dalam contoh di atas, kita menggunakan CTE rekursif untuk menampilkan semua anak dari seorang manajer tertentu dalam struktur data hierarkis karyawan.

-- Contoh lain:
-- with cte_dat(n,dayname)
as(select 0,DATENAME(DW,0) union all select n+1,DATENAME(DW,n+1) from cte_dat where n < 6 ) select * from cte_dat
-- with cte_org
as(select emp_id,nama,manage_id from employee union all select e.emp_id, e.nama, e.manage_id from employee as e inner join cte_org as o o
n (e.manager_id=o.emp_id)) select * from cte_org",
                'order_in_section' => 32
            ],
            [
                'section_id' => 10,
                'title' => 'Insert Data',
                'description' => "Pernyataan INSERT digunakan dalam SQL untuk memasukkan baris baru ke dalam tabel yang ada.",
                'code' => "-- Contoh penggunaan pernyataan INSERT:
INSERT INTO nama_tabel (kolom1, kolom2, ...)
VALUES (nilai1, nilai2, ...);

-- Dalam pernyataan di atas:
-- nama_tabel adalah nama tabel di mana Anda ingin memasukkan data.
-- kolom1, kolom2, ... adalah nama kolom yang ingin Anda masukkan data.
-- nilai1, nilai2, ... adalah nilai yang ingin Anda masukkan ke dalam kolom tersebut.

-- Contoh:
-- Memasukkan data baru ke dalam tabel Pelanggan
INSERT INTO Pelanggan (Nama, Alamat, Kota)
VALUES ('John Doe', '123 Main Street', 'New York');

-- Dalam contoh di atas, kita menggunakan pernyataan INSERT untuk memasukkan data baru ke dalam tabel Pelanggan dengan kolom Nama, Alamat, dan Kota.

-- Contoh lain:
-- set IDENTITY_INSERT employee ON; artinya agar bisa memasukan data increment
-- insert into table_name (list_field) values(list_value)",
                'order_in_section' => 33
            ],
            [
                'section_id' => 10,
                'title' => 'Insert Into Select',
                'description' => "Pernyataan INSERT INTO SELECT digunakan dalam SQL untuk memasukkan baris baru ke dalam tabel dari hasil kueri SELECT.",
                'code' => "-- Contoh penggunaan pernyataan INSERT INTO SELECT:
INSERT INTO nama_tabel (kolom1, kolom2, ...)
SELECT kolom1, kolom2, ...
FROM nama_tabel_sumber
WHERE kondisi;

-- Dalam pernyataan di atas:
-- nama_tabel adalah nama tabel di mana Anda ingin memasukkan data.
-- kolom1, kolom2, ... adalah nama kolom yang ingin Anda masukkan data.
-- nama_tabel_sumber adalah tabel sumber dari mana Anda ingin memilih data.
-- kondisi adalah kondisi yang diterapkan dalam kueri SELECT.

-- Contoh:
-- Memasukkan data dari tabel SumberData ke dalam tabel TujuanData
INSERT INTO TujuanData (Nama, Umur, Kota)
SELECT Nama, Umur, Kota
FROM SumberData
WHERE Umur > 18;

-- Dalam contoh di atas, kita menggunakan pernyataan INSERT INTO SELECT untuk memasukkan data dari tabel SumberData ke dalam tabel TujuanData hanya untuk baris-baris di mana umur lebih dari 18 tahun.",
                'order_in_section' => 34
            ],
            [
                'section_id' => 10,
                'title' => 'Update Join',
                'description' => "Operasi UPDATE JOIN digunakan dalam SQL untuk memperbarui nilai dalam satu tabel berdasarkan nilai yang terkait dalam tabel lain menggunakan kriteria penggabungan.",
                'code' => "-- Contoh penggunaan operasi UPDATE JOIN:
UPDATE tabel_target
SET kolom_target = nilai_baru
FROM tabel_sumber
WHERE kondisi_penggabungan;

-- Dalam pernyataan di atas:
-- tabel_target adalah tabel yang akan diperbarui.
-- kolom_target adalah kolom dalam tabel_target yang akan diperbarui.
-- nilai_baru adalah nilai baru yang akan diberikan ke kolom_target.
-- tabel_sumber adalah tabel yang digunakan untuk memperbarui tabel_target.
-- kondisi_penggabungan adalah kondisi yang digunakan untuk menggabungkan baris antara tabel_target dan tabel_sumber.

-- Contoh:
-- Memperbarui nilai di kolom TotalHarga di tabel Pesanan menggunakan nilai dari kolom Jumlah di tabel DetailPesanan berdasarkan ID pesanan
UPDATE Pesanan
SET TotalHarga = d.Jumlah * dp.HargaSatuan
FROM Pesanan p
JOIN DetailPesanan dp ON p.ID = dp.IDPesanan
JOIN (
SELECT IDPesanan, SUM(Jumlah) AS Jumlah
FROM DetailPesanan
GROUP BY IDPesanan
) d ON p.ID = d.IDPesanan;

-- Dalam contoh di atas, kita menggunakan operasi UPDATE JOIN untuk memperbarui nilai di kolom TotalHarga di tabel Pesanan berdasarkan nilai dari kolom Jumlah di tabel DetailPesanan yang terkait dengan ID pesanan.",
                'order_in_section' => 35
            ],
            [
                'section_id' => 10,
                'title' => 'Delete Data',
                'description' => "Pernyataan DELETE digunakan dalam SQL untuk menghapus baris yang ada dari tabel.",
                'code' => "-- Contoh penggunaan pernyataan DELETE:
DELETE FROM nama_tabel
WHERE kondisi;

-- Dalam pernyataan di atas:
-- nama_tabel adalah nama tabel dari mana Anda ingin menghapus data.
-- kondisi adalah kondisi yang diterapkan untuk memilih baris yang akan dihapus.

-- Contoh:
-- Menghapus data dari tabel Pelanggan di mana umur lebih dari 50 tahun
DELETE FROM Pelanggan
WHERE Umur > 50;

-- Dalam contoh di atas, kita menggunakan pernyataan DELETE untuk menghapus data dari tabel Pelanggan di mana umur pelanggan lebih dari 50 tahun.",
                'order_in_section' => 36
            ],
            [
                'section_id' => 10,
                'title' => 'Merge',
                'description' => "Operasi MERGE digunakan dalam SQL untuk menggabungkan operasi INSERT, UPDATE, dan DELETE ke dalam satu pernyataan, sehingga memungkinkan Anda untuk melakukan perubahan pada tabel sasaran berdasarkan kondisi yang ditentukan, dan melakukan tindakan yang berbeda tergantung pada apakah baris sudah ada dalam tabel sasaran atau tidak.",
                'code' => "-- Contoh penggunaan operasi MERGE:
MERGE INTO tabel_target AS target
USING tabel_sumber AS source
ON kondisi_penggabungan
WHEN MATCHED THEN
UPDATE SET kolom_target = nilai_baru
WHEN NOT MATCHED THEN
INSERT (kolom1, kolom2, ...)
VALUES (nilai1, nilai2, ...)
WHEN NOT MATCHED BY SOURCE THEN
DELETE;

-- Dalam pernyataan di atas:
-- tabel_target adalah tabel yang akan dimodifikasi.
-- tabel_sumber adalah tabel yang digunakan untuk melakukan perubahan pada tabel_target.
-- kondisi_penggabungan adalah kondisi yang digunakan untuk menggabungkan baris antara tabel_target dan tabel_sumber.
-- MATCHED THEN UPDATE digunakan untuk mendefinisikan perubahan yang akan dilakukan pada baris yang sudah ada di tabel_target.
-- NOT MATCHED THEN INSERT digunakan untuk mendefinisikan perubahan yang akan dilakukan pada baris yang tidak ada di tabel_target.
-- NOT MATCHED BY SOURCE THEN DELETE digunakan untuk mendefinisikan perubahan yang akan dilakukan pada baris yang ada di tabel_target tetapi tidak ada di tabel_sumber.

-- Contoh:
-- Memperbarui data dalam tabel Pelanggan berdasarkan data dari tabel SumberData, dan menghapus data yang tidak ada di tabel SumberData
MERGE INTO Pelanggan AS target
USING SumberData AS source
ON target.ID = source.ID
WHEN MATCHED THEN
UPDATE SET target.Nama = source.Nama, target.Alamat = source.Alamat
WHEN NOT MATCHED THEN
INSERT (ID, Nama, Alamat) VALUES (source.ID, source.Nama, source.Alamat)
WHEN NOT MATCHED BY SOURCE THEN
DELETE;

-- Dalam contoh di atas, kita menggunakan operasi MERGE untuk memperbarui data dalam tabel Pelanggan berdasarkan data dari tabel SumberData, dan menghapus data yang tidak ada di tabel SumberData.",
                'order_in_section' => 37
            ],

            [
                'section_id' => 11,
                'title' => 'Pengenalan',
                'description' => "C++ adalah bahasa pemrograman tingkat tinggi yang dikenal dengan kemampuannya untuk menggabungkan pemrograman prosedural dan pemrograman berorientasi objek. Diciptakan pada tahun 1980-an, C++ menjadi salah satu bahasa yang paling banyak digunakan di dunia, sering digunakan dalam pengembangan perangkat lunak sistem, permainan, aplikasi desktop, dan banyak lagi. Bahasa ini memiliki sintaksis yang mirip dengan C, namun juga menambahkan fitur-fitur baru seperti dukungan untuk pemrograman berorientasi objek.",
                'code' =>
                "#include <iostream>
int main(){
	std::cout << “hello world” << std::endl;
	return 0;
}

/*
1.  #include
	Hastag include berfungsi sebagai jembatan untuk menyambungkan bagian fungsi dari standard library. Contohnya : #include <iostream> , jika dibaca artinya : masukan standard library file [<iostream>] ke dalam sintaks program ini. Standard library mempunyai banyak macam dan kegunaan seperti : <cstdio> , <fstream> , <iostream>, <ostream> , <istream> ,  dan masih banyak lagi.
2. <iostream>
	<iostream> adalah salah satu contoh standar library file yang berada di system operasi kita dan digunakan untuk mengoperasikan beberapa baris perintah c++. Yang berfungsi untuk mendisplay data yang kita ketik ke dalam konsol. Contohnya : cout,cin, dan masih banyak lagi.
3. int main(){ syntax }
	Jika anda pernah belajar HTML, maka seharusnya anda tahu apa itu tag body. Nah pada bagian tag ini berfungsi untuk menyimpan baris program/syntax yang ingin ditampilkan atau di jalankan. Sintaks ini di tulis di antara tanda { dan } .
4. std::
	Kegunaan dari std adalah mengambil fungsi dari standard library yang digunakan, Contoh iostream. Contohnya : std::cout , artinya simple yaitu “ambil fungsi cout” lalu jalankan.
5. <<
	Adalah operator insertion. Berfungsi untuk memasukan data ke sintaks sebelumnya. Contoh : std::cout << “hello world”  << endl; . [<<] yang pertama artinya “masukan kata hello world ke dalam fungsi cout” dan [<<] yang kedua “akhir dari program pada baris ini”.
6. endl;
	End Line = akhir dari baris suatu program di jalankan. Syntax ini ditulis jika program sudah selesai / untuk mengkahiri baris dari suatu program.
7. cout dan cin
	Console Out berfungsi untuk menampilkan program/output yang kita tulis di text editor ke dalam console log ( jika anda ingin melihat output menggunakan teks editor ) atau jika tidak command prompt. Berbeda halnya dengan Console In yang digunakan untuk menerima inputan yang dimasukan dari console maupun command prompt.
8. return 0;
    Fungsi return sebenarnya untuk mengembalikan nilai ke fungsi main(). Namun pada bagian ini berfungsi untuk menampilkan pesan error jika program dijalankan ada yang tidak berfungsi dengan baik.
9. “kutip”
	Segala sesuatu yang di tulis di antara tanda kutip itu disebut dengan string.
*/
                ",
                'order_in_section' => 1
            ],
            [
                'section_id' => 11,
                'title' => 'Apa itu Using Namespace Std',
                'description' => "Namespace std adalah namespace standar yang digunakan dalam bahasa pemrograman C++. Namespace ini berisi sebagian besar fungsi, kelas, dan objek yang didefinisikan dalam standar C++ Library (STL). Dengan menggunakan namespace std, kita dapat mengakses semua komponen standar C++ Library tanpa harus menuliskan prefix \"std::\" sebelum setiap penggunaan. Ini membantu menghindari konflik nama dan membuat kode lebih mudah dibaca.",
                'code' =>
                "//Pada Bagian I , anda diperlihatkan sintaks seperti di bawah ini :
#include <iostream>
int main(){
	std::cout << “hello world” << std::endl;
	return 0;
}

//Namun jika kita ingin mencetak output lebih banyak lagi maka akan jadi seperti ini :
#include <iostream>
int main(){
	std::cout << “hello world” << std::endl;
	std::cout << “c++” << std::endl;
std::cout << “it’s easy” << std::endl;
	return 0;
}

//Jika diperhatikan penulisan std:: dapat dihilangkan dengan cara menuliskan using namespace setelah baris #include diketik. Contohnya :
#include <iostream>
using namespace std;
int main(){
	cout << “hello world” << endl;
	cout << “c++” << endl;
cout << “it’s easy” << endl;
	return 0;
}

//Jadi lebih ringkas dan mudah dalam penulisan program c++.
",
                'order_in_section' => 2
            ],
            [
                'section_id' => 11,
                'title' => 'Variable dan Deklarasi',
                'description' => "Dalam C++, sebuah variabel harus dideklarasikan sebelum digunakan. Deklarasi variabel memberitahu kompiler tentang tipe data dan nama variabel yang akan digunakan dalam program.",
                'code' =>
                "// Variabel adalah kumpulan karakter atau symbol yang digunakan untuk menampung suatu value/nilai. Contoh kalo di c++ : int tahun = 1945; string negara = “indonesia”;
#include <iostream>
using namespace std;
int main(){
	int tahun = 1945;
string negara = “indonesia“;
    	cout << Negara << “merdeka pada tahun” << tahun << endl;
	return 0;
}

// Berbeda dengan deklarasi yang bertujuan untuk memberikan informasi kepada program untuk memberi tahu tipe data dan inisialnya. Contohnya int hari, bulan, tahun; string tempatlahir;
#include <iostream>
using namespace std;
int main(){
int hari, bulan, tahun ;
string tempatlahir ;
    cout << \"program menampilkan tanggal lahir anda\" << endl;
    cout << \"Sebutkan tanggal lahir anda dalam format hari: \";
    cin >> hari;
    cout << \"Sebutkan tanggal lahir anda dalam format bulan: \";
    cin >> bulan;
    cout << \"Sebutkan tanggal lahir anda dalam format tahun: \";
    cin >> tahun;
    cout << \"Tuliskan tempat lahir anda: \";
    cin >> tempatlahir;
    cout << \"Anda lahir pada \" << hari << \“-” <<  bulan << “-“ << tahun << “, “ << tempatlahir << endl << endl;
    cout << \"terima kasih sudah menggunakan program\" << endl;
	return 0;
}

// Penamaan variable dan deklarasi bersifat case sensitive yang artinya huruf besar dan kecil berpengaruh dalam proses pemrograman.
",
                'order_in_section' => 3
            ],
            [
                'section_id' => 11,
                'title' => 'Tipe Data pada c++',
                'description' => "Dalam C++, tipe data menggambarkan jenis nilai yang dapat disimpan dalam variabel. Beberapa tipe data dasar dalam C++ termasuk int (untuk bilangan bulat), double (untuk bilangan pecahan), char (untuk karakter), dan bool (untuk nilai kebenaran). Selain itu, C++ juga mendukung tipe data yang lebih kompleks seperti array, string, dan struct.",
                'code' =>
                "/* Untuk permulaan, anda wajib tahu tipe data c++ yang sering digunakan. Contoh seperti :
1. Integer / int
	Digunakan untuk tipe data berupa angka tanpa decimal. Besar memory yang digunakan yaitu 32 bit / 4 byte. Anda dapat menggunakan tipe data ini, jika memerlukan angka dari 2147483647 sampai -2147483647.
Namun pada unsigned int, anda tidak dapat memasukan nilai negative. Karena angka yang bernilai minusnya dimasukan ke bagian nilai positifnya. Jadi jangkauan nilai positifnya lebih banyak, yaitu mencapai 2 kali lipatnya senilai 4294967294.
Ada banyak tipe data untuk menyimpan nilai angka seperti long long besarnya 2 byte, short, float untuk menyimpan nilai decimal, dan masih ada lagi yang lainnnya.

2. Character / char
	Tipe data ini hanya dapat menyimpan 1 karakter saja, berupa huruf, angka, symbol, dan lainnya. Besarnya tipe ini yaitu 1 byte.

3. Boolean / bool
	Biasanya tipe data ini gunakan untuk melakukan suatu perbandingan, logika, percabangan, dan pengulangan. Boolean menyimpan nilai berupa true atau false. Nilai ini jika dikonversikan ke angka maka true bernilai 1 dan false sama dengan 0.

Untuk penggunaan lebih jelas silahkan salin script ini dan jalankan di text editor anda :*/

#include <iostream>
#include <limits>
using namespace std;
int main(){
    /* integer */
    int a = 1;
    cout << a << endl;
    cout << sizeof(a) << \" byte \" << endl;
    cout << std::numeric_limits<int>::max() << endl;
    cout << std::numeric_limits<int>::min() << endl;

    long long b = 6;
    cout << b << endl;
    cout << sizeof(b) << \" byte \" << endl;
    cout << std::numeric_limits<long long>::max() << endl;
    cout << std::numeric_limits<long long>::min() << endl;

    short c = 7;
    cout << c << endl;
    cout << sizeof(c) << \" byte \" << endl;
    cout << std::numeric_limits<short>::max() << endl;
    cout << std::numeric_limits<short>::min() << endl;

    float c = 7.5;
    cout << c << endl;
    cout << sizeof(c) << \" byte \" << endl;
    cout << std::numeric_limits<float>::max() << endl;
    cout << std::numeric_limits<float>::min() << endl;


    /* character */
    char f = 'a';
    cout << f << endl;
    cout << sizeof(f) << \"byte\" << endl;
    cout << numeric_limits<char>::max() << endl;
    cout << numeric_limits<char>::min() << endl;


    /* boolean => 1 */
   	bool g = true;
	bool h = false;
	cout << g << endl;
    cout << h << endl;

    cin.get();
    return 0;
}

/* Kita menggunakan standard library <limits> yang berguna untuk mendefinisikan elemen dengan karakteristik tipe aritmatika.

Penjelasan perbagian
-	sizeof(parameter) digunakan untuk mengetahui besarnya tipe data dari suatu data yang digunakan dalam satuan byte
-	numeric_limits<tipe datanya>::max() digunakan untuk mencari nilai max
-	numeric_limits<tipe datanya>::min() digunakan untuk mencari nilai min */
",
                'order_in_section' => 4
            ],
            [
                'section_id' => 11,
                'title' => 'Operasi Aritmatika C++',
                'description' => "Operasi aritmatika dalam C++ digunakan untuk melakukan operasi matematika pada nilai numerik. Beberapa operasi aritmatika dasar meliputi penambahan (+), pengurangan (-), perkalian (*), pembagian (/), dan modulus (%). C++ juga mendukung operator penugasan (assignment) seperti +=, -=, *=, /=, dan %= untuk menggabungkan operasi aritmatika dengan operasi penugasan.",
                'code' =>
                "#include <iostream>

using namespace std;
int main() {

    int a = 6;
    int b = 4;

    int hasil;
    // operator : + , - , * , / , %
    cout << \"variabel\na = 6\nb = 4\n\" << endl;

    // penjumlahan
    hasil = a + b;
    cout << \"penjumlahan\" << endl;
    cout << \"a + b = \" << hasil << \"\n\" << endl;

    // pengurangan
    hasil = a - b;
    cout << \"pengurangan\" << endl;
    cout << \"a - b = \" << hasil << \"\n\" << endl;

    // perkalian
    hasil = a * b;
    cout << \"perkalian\" << endl;
    cout << \"a x b = \" << hasil << \"\n\" << endl;

    // pembagian
    hasil = a / b;
    cout << \"pembagian\" << endl;
    cout << \"a / b = \" << hasil << \"\n\" << endl;

    // modulus (tidak bisa float)
    hasil = a % b;
    cout << \"modulus\" << endl;
    cout << \"a % b = \" << hasil << \"\n\" << endl;

    // float (jika ingin menghasilkan decimal 6 : 4 = 1.5 , maka salah satu tipe datanya harus berupa float dan deklarasi prosesnya juga tipenya float)
    int c = 6;
    float d = 4;
    float hasilnya;
    hasilnya = c / d;
    cout << \"float\" << endl;
    cout << \"a / b = \" << hasilnya << \"\n\" << endl;

    // urutan eksekusi
    cout << \"urutan eksekusi\" << endl;
    hasil = (a + b) * a;
    cout << \"a + b * a = \" << hasil << endl;

    cin.get();
    return 0;
}
",
                'order_in_section' => 5
            ],
            [
                'section_id' => 11,
                'title' => 'Boolean',
                'description' => "Tipe data boolean dalam C++ disebut bool dan hanya memiliki dua nilai yang mungkin: true atau false. Tipe data boolean sering digunakan untuk menyatakan kondisi logika, seperti hasil dari perbandingan atau ekspresi logika.",
                'code' =>
                "// Nilai Boolean berguna untuk menentukan arah dari proses percabangan, pengulangan, perbandingan. Bool hanya ada nilai true/false. Untuk lebih jelas, silahkan jalankan script berikut ini :
#include <iostream>

using namespace std;

int main()
{
    int a = 2;
    int b = 2;
    int c = 4;

    bool hasil1, hasil2;

    // komparasi, perbandingan

    cout << \"1 = TRUE\n0 = FALSE\n\" << endl;

    // sebanding
    hasil1 = (a == b);
    cout << \"apakah a samadengan b ? : \" << hasil1 << endl;

    // hasil false/0
    hasil2 = (c == a);
    cout << \"apakah c samadengna a ? : \" << hasil2 << endl;

    // tidak sebanding
    cout << \"apakah a tidaksama b ? : \" << (a != b) << endl;

    // kurang dari dan lebih dari
    cout << \"apakah a kurang dari c ? : \" << (a < c) << endl;
    cout << \"apakah a kurang dari c ? : \" << (a > c) << endl;

    cin.get();
    return 0;
}
",
                'order_in_section' => 6
            ],
            [
                'section_id' => 11,
                'title' => 'Operator Logika',
                'description' => "Operator logika digunakan untuk menggabungkan atau memanipulasi nilai boolean. Beberapa operator logika yang umum digunakan dalam C++ meliputi AND (&&), OR (||), dan NOT (!). Operator AND (&&) menghasilkan true jika kedua operand bernilai true. Operator OR (||) menghasilkan true jika salah satu operand bernilai true. Operator NOT (!) digunakan untuk membalik nilai boolean dari operandnya.",
                'code' =>
                "/* Catatan tambahan :
True  = 1 ;
False = 0 ;

1. NOT / !
digunakan untuk mengonversi nilai dari true ke false , atau dari false ke true. Demikian pula, jika sebuah operan bernilai benar, logika \"tidak\" akan menyebabkannya bernilai salah. Jika sebuah operan bernilai false, ekuivalen \"tidak\" logisnya akan menjadi benar. Definisinya seperti itu, untuk bahasa simpelnya menurut saya yaitu untuk mengecek suatu nilai apakah benar atau salah.
2. AND / and / &&
Digunakan untuk menghasilkan nilai true / false. Pada operator ini, jika salah satu nilainya false maka hasilnya akan false. Untuk menghasilkan nilai true, nilainya harus true semua. Contoh :
A	&&	B	=	C
1		1		1
0		1		0
1		0		0
0		0		0

3. OR / or / ||
Kebalikan dari operator and, pada operator ini, jika salah satunya true maka hasilnya true, untuk menghasilkan nilai false maka semuanya harus salah. Contoh :
A	||	B	=	C
1		1		1
0		1		1
1		0		1
0		0		0

Untuk lebih jelasnya, anda bisa salin script dibawah ini lalu jalankan : */

#include <iostream>

using namespace std;

int main(){

    int a = 3;
    int b = 2;

    bool hasil;

    // operator logika : not, and, or

    cout << \"operator NOT\" << endl;

    // not
    hasil = !( a == 3 ); // dibaca : apakah hasil = tidak/bukan/tidak sama/hasilnya salah/not => ( a sama dengan 3 ) [ringkasnya : apakah (yang ada di dalam kurung) nilainya salah?/not]
    cout << hasil << \"\n\" << endl;

    // and
    cout << \"operator AND\" << endl;
    hasil = ( a == 3 ) and ( b == 2 );
    cout << hasil << endl;
    hasil = ( a == 4 ) and ( b == 2 );
    cout << hasil << endl;
    hasil = ( a == 3 ) && ( b == 3 );
    cout << hasil << endl;
    hasil = ( a == 1 ) && ( b == 1 );
    cout << hasil << \"\n\" << endl;

    // or

    cout << \"operator OR\" << endl;
    hasil = ( a == 3 ) or ( b == 2 );
    cout << hasil << endl;
    hasil = ( a == 4 ) or ( b == 2 );
    cout << hasil << endl;
    hasil = ( a == 3 ) || ( b == 3 );
    cout << hasil << endl;
    hasil = ( a == 1 ) || ( b == 1 );
    cout << hasil << \"\n\" << endl;


    cin.get();
    return 0;
}
",
                'order_in_section' => 7
            ],
            [
                'section_id' => 11,
                'title' => 'Percabangan If',
                'description' => "If adalah struktur pengendalian yang digunakan dalam C++ untuk mengevaluasi ekspresi boolean. Jika ekspresi tersebut bernilai true, blok kode di dalam if akan dieksekusi. Jika ekspresi tersebut bernilai false, blok kode tersebut akan dilewati.",
                'code' =>
                "// Percabangan yang terjadi apabila kita dihadapkan pada suatu Kondisi dengan dua pilihan benar/salah. Jika kondisi benar maka baris perintah program dijalankan dan jika salah program langsung berhenti. Contoh :

#include <iostream>

using namespace std;

int main()
{
    int a;

    cout << \"masukan angka = \";
    cin >> a;

    if (a == 3)
    {
        cout << \"benar\" << endl;
    }
    cout << \"selesai\" << endl;

    cin.get();
    return 0;
}
",
                'order_in_section' => 8
            ],
            [
                'section_id' => 11,
                'title' => 'Percabangan If Else',
                'description' => "If else adalah struktur pengendalian yang digunakan untuk mengevaluasi dua kondisi: jika kondisi pertama bernilai true, blok kode dalam if akan dieksekusi, jika tidak, blok kode dalam else akan dieksekusi.",
                'code' =>
                "// Percabangan if else digunakan jika persyaratan pertama tidak terpenuhi maka ada alternatif lain dari program. Contohnya :
#include <iostream>

using namespace std;

int main() {
    int a;

    cout << \"masukan angka : \" << endl;
    cin >> a;

    if ( a == 1 ) {
        cout<<\"angka yang anda input : \" << a << endl;
    } else if ( a == 2 ) {
        cout<<\"angka yang anda input : \" << a << endl;
    } else {
        cout << \"periksa lagi\" << endl;
    }

    cout << \"Terima Kasih\" << endl;
    cin.get();
    return 0;
}

//Penjelasannya adalah jika angka yang kita input 1, maka akan tampil di konsol “angka yang anda input : 1 “ , dan jika angka 2 yang kita input maka akan tampil di konsol “angka yang anda input : 2 “ .
    ",
                'order_in_section' => 9
            ],
            [
                'section_id' => 11,
                'title' => 'Percabangan Switch Case',
                'description' => "Switch case adalah struktur pengendalian alternatif yang digunakan untuk memilih salah satu dari beberapa kemungkinan aliran eksekusi berdasarkan nilai dari suatu ekspresi. Setiap case dalam switch case berisi nilai konstan atau konstan integral yang dibandingkan dengan nilai dari ekspresi switch. Jika ada case yang cocok, blok kode dalam case tersebut dieksekusi. Jika tidak ada case yang cocok, blok kode dalam default (opsional) akan dieksekusi.",
                'code' =>
                "// Percabangan switch case mirip dengan If Else. Program percabangan ifElse di jalankan berdasarkan syarat yang terpenuhi, hampir sama dengan switch case, namun perbedaanya terlatak pada program sebelumnya yang tidak terpenuhi juga dijalankan sampai pada batas program yang memenuhi persyaratan percabangan. Untuk lebih jelas silahkan salin  script di bawah ini :

#include <iostream>

using namespace std;

int main()
{
    int a;

    cout << \"masukan nilai = \";
    cin >> a;

    switch (a)
    {
    case 1:
        cout << \"a = 1\" << endl;
        break; // untuk ngeloncatin perintah selanjutnya jika sudah terpenuhi
    case 2:
        cout << \"a = 2\" << endl;
    case 3:
        cout << \"a = 3\" << endl;
    case 4:
        cout << \"a = 4\" << endl;
    case 5:
        cout << \"a = 5\" << endl;
    default:
        cout << \"default\" << endl;
    }

    cout << \"akhir dari program\" << endl;

    return 0;
}
    ",
                'order_in_section' => 10
            ],
            [
                'section_id' => 11,
                'title' => 'Calculator',
                'description' => "Berikut dibawah ini adalah contoh program calculator sederhana dari apa yang sudah dipelajari pada materi sebelumnya",
                'code' =>
                "#include <iostream>

using namespace std;

int main()
{
    float a, b, hasil; // untuk memasukan bilangan, baik bulat maupun decimal
    char aritmatika; // untuk menampung karakter atau lambang + , - , x , : (dengan syarat jangan huruf)

    cout << \"Selamat datang di program calculator \n \n\";

    // masukan input dari user
    cout << \"Masukan nilai pertama: \";
    cin >> a;
    cout << \"Pilih operator + , - , * , / = \";
    cin >> aritmatika;
    cout << \"Masukan nilai kedua: \";
    cin >> b;

    cout << \"\nHasil Perhitungan: \";
    cout << a << \" \" << aritmatika << \" \" << b ;

    if ( aritmatika == '+' ){
        hasil = a + b;
    } else if ( aritmatika == '-' ){
        hasil = a - b;
    } else if ( aritmatika == '*' ){
        hasil = a * b;
    } else if ( aritmatika == '/' ){
        hasil = a / b;
    } else{
        cout << \"ERROR!!!\" << endl;
    }

    cout << \" = \" << hasil << endl;



    cin.get();
    return 0;
}
// Jika anda ingin membuat kalkulator dengan menggunakan percabangan switch case, dapat anda salin script di bawah ini :

#include <iostream>

using namespace std;

int main() {
    float a,b,hasil;
    char operasi;

    cout << \"Selamat datang di program calculator v2 swicthcase\n\" << endl;

    cout << \"masukan bilangan pertama: \";
    cin >> a;
    cout << \"pilih operator + , - , * , / = \";
    cin >> operasi;
    cout << \"masukan bilangan kedua : \";
    cin >> b;

    cout << \"\nHasil Perhitungan : \";
    cout << a << \" \" << operasi << \" \" << b;

    switch (operasi)
    {
    case '+':
        hasil = a + b;
        cout << \" = \" << hasil << \"\n\" << endl;
        break;
    case '-':
        hasil = a - b;
        cout << \" = \" << hasil << \"\n\" << endl;
        break;
    case '*':
        hasil = a * b;
        cout << \" = \" << hasil << \"\n\" << endl;
        break;
    case '/':
        hasil = a / b;
        cout << \" = \" << hasil << \"\n\" << endl;
        break;
    default:
        cout << \"ERROR\n\";
    }

    cout << \"======Terima Kasih======\" << endl;

    cin.get();
    return 0;
}
",
                'order_in_section' => 11
            ],
            [
                'section_id' => 11,
                'title' => 'Operator Assigment',
                'description' => "Operator Assignment adalah operator yang digunakan untuk menginisialisasi atau memperbarui nilai dari suatu variabel. Operator ini digunakan untuk memberikan nilai kepada suatu variabel atau mengubah nilai variabel dengan nilai baru. Di C++, operator assignment umumnya menggunakan tanda sama dengan (=).",
                'code' => "// Operator untuk memasukkan suatu nilai ke dalam variable adalah operator assignment. jika anda pernah belajar aljabar matematika seperti x = 2 + y ,  nah kurang lebih pada pembelajaran kali ini mengenai konsep seperti itu. Sebenernya operator ini seperti bentuk sederhana dari suatu rumus. Contoh a = a + 1 , jika menggunakan operator ini bisa disederhanakan menjadi a += 1 , yang mempunyai arti yang sama. Supaya lebih jelas silahkan anda coba sendiri script dibawah ini :
// = (Assignment)
// += (Addition Assignment)
// -= (Subtraction Assignment)
// *= (Multiplication Assignment)
// /= (Division Assignment)
// %= (Modulus Assignment)
// <<= (Left Shift Assignment)
// >>= (Right Shift Assignment)
// &= (Bitwise AND Assignment)
// ^= (Bitwise XOR Assignment)
// |= (Bitwise OR Assignment)

#include <iostream>

using namespace std;
int main() {

    // assigment
    int a = 10;

    cout << \"nilai awal dari a adalah : \" << a << endl;
    // a = a + 3; //contoh

    a+= 3;
    cout << \"ditambah 3 menjadi \" << a << endl;

    a -= 3;
    cout << \"dikurang 3 menjadi \" << a << endl;

    a /= 3;
    cout << \"dibagi 3 menjadi \" << a << endl;

    a *= 3;
    cout << \"dikali 3 menjadi \" << a << endl;

    a %= 3;
    cout << \"dimodulus 3 menjadi \" << a << endl;

    cin.get();
    return 0;
}

// Ingat bahwa program selalu dibaca dari atas ke bawah.
",
                'order_in_section' => 12
            ],
            [
                'section_id' => 11,
                'title' => 'Increment dan Decrement',
                'description' => "Berikut Penjelasannya",
                'code' => "/* Increment adalah operasi untuk menambah angka, umumnya jika digunakan seperti a++ artinya menambahkan angka bernilai 1.
Decrement adalah kebalikan dari Increment yaitu mengurangi angka bernilai 1 jika digunakan seperti a--.
Ada yang dinamakan preincrement dan predecrement, fungsinya sama tapi bedanya pada saat program dijalankan.
Jika menggunakan pre maka sebelum program dijalankan akan ditambahkan/dikurangi nilainya terlebih dahulu karena symbol preincrement/predecrement diketik sebelum variable.
Agar lebih jelas anda dapat mencoba script di bawah ini : */

#include <iostream>

using namespace std;

int main()
{
    // increment dan decrement
    // preincrement dan postincrement
    // a++ or ++a

    int a = 5;
    int b = 5;

    // postincrement(+) atau decrement(-)
    cout << \"1. \" << a << endl;
    // a++;
    cout << \"2. \" << a++ << endl; // kok beda, karena alur program dibaca dari kiri ke kanan atas ke bawah, print(cout) dulu baru ditambahkan, lalu ke bawah cetak yang sudah di tambahkan tadi
    cout << \"3. \" << a << endl << endl;

    // preincrement(+) atau decrement(-)
    cout << \"1. \" << b << endl;
    // ++b;
    cout << \"2. \" << ++b << endl; // kalo ini, sebelum di print ditambahkan terlebih dahulu karena ++nya ditaruh sebelum variabel
    cout << \"3. \" << b << endl;


    cin.get();
    return 0;
}
",
                'order_in_section' => 13
            ],
            [
                'section_id' => 11,
                'title' => 'Perulangan',
                'description' => "Berikut Penjelasannya",
                'code' => "Atau di sebut dengan looping adalah instruksi pengulangan (repertition) yang dapat mengulangi pelaksanaan sederetan instruksi lain berulangkali sesuai dengan persyaratan yang ditentukan.
Strukstur instruksi perulangan pada dasarnya terdiri atas:
1. kondisisi perulangan. Suatu kondisi yang harus dipenuhi agar perulangan dapat terjadi.
2. Badan (body) perulangan. Deretan instruksi yang akan diulang-ulang pelaksanaanya.
3. Pencacah (counter) perulangan. Suatu  variable yang nilainya harus berubah agar perulangan dapat terjadi dan pada akhirnya membatasi jumlah perulangan yang dapat dilaksanakan.
",
                'order_in_section' => 14
            ],
            [
                'section_id' => 11,
                'title' => 'While',
                'description' => "While adalah struktur pengulangan (loop) yang digunakan untuk menjalankan blok kode secara berulang selama suatu kondisi bernilai true. Selama kondisi tersebut terpenuhi, blok kode di dalam while akan terus dieksekusi. Jika kondisi tersebut tidak terpenuhi, eksekusi akan keluar dari loop dan melanjutkan ke pernyataan setelah blok while. ",
                'code' =>
                "// Perulangan yang akan terus dilaksanakan selama syarat terpenuhi. Untuk lebih memahami silahkan jalankan script dibawah ini :
#include <iostream>

using namespace std;
int main()
{
    int a = 5;
    //while
    while (/* condition */ a < 10 )
    {
        /* code */
        cout << \"hore - \" << a++ << endl;
    }

    /*
        perulangan diatas di baca :

        inisialisasi a sama dengan 5

        lakukan perulangan ketika kondisi a kurang dari 10
        ketika a kurang dari 10 maka cetak
            cetak hore - 5 , lalu tambahkan nilai a dengan 1(a++)

        ulang lagi :
        apakah a(yang sudah ditambah 1) kurang dari 10? jika ya lanjutkan perintah
        sampai nilai a = 10, perulangan berhenti

    */
   cout << \"\n\" << endl;

   int b = 1;

   while (/* condition */ b < 10 )
    {
        /* code */
        cout << \"angka ke - \" << b << endl;
        b += 2;
    }
    /*
        perulangan diatas di baca :

        inisialisasi b sama dengan 1

        lakukan perulangan ketika kondisi b kurang dari 10
        ketika b kurang dari 10 maka cetak
            cetak angka ke - 1 , cetak
            lalu tambahkan nilai b dengan 2

        ulang lagi :
        apakah b(yang sudah ditambah 2) kurang dari 10? jika ya lanjutkan perintah
        sampai nilai b = 10, perulangan berhenti

    */

    cin.get();
    return 0;
}
// Materi :
// 1. Ada instruksi yang berkaitan dengan kondisi sebelum masuk ke while sehingga kondisi ini benar (terpenuhi) dan pengulangan bisa dilaksanakan.
// 2. Ada suatu instruksi di antara instruksi-instruksi yang diulang yang mengubah nilai variable perulangan agar pada saat kondisi perulangan tidak terpenuhi sehingga perulangan berhenti.
",
                'order_in_section' => 15
            ],
            [
                'section_id' => 11,
                'title' => 'Do While',
                'description' => "Do While adalah struktur pengulangan yang mirip dengan while, namun kondisi evaluasi dilakukan setelah blok kode dieksekusi. Ini berarti blok kode akan dieksekusi setidaknya satu kali sebelum kondisi dievaluasi. Jika kondisi bernilai true, blok kode akan terus dieksekusi seperti pada while. Namun, jika kondisi bernilai false setelah satu iterasi, program akan keluar dari loop. Do while cocok digunakan ketika setidaknya satu iterasi perlu dijalankan sebelum memeriksa kondisi.",
                'code' =>
                "/* Perulangan akan dilaksanakan terlebih dahulu dan pengujian perulangan akan dilakukan setelahnya. Sifat dari perulangan Do While yaitu :
1. Instruksi-instruksi akan diulang hanya apabila kondisi tidak terpenuhi, dan ketika kondisi terpenuhi maka perulangan berhenti.
2. instruksi-instruksi dikerjakan terlebih dahulu sebelum kondisi diperiksa.
3. harus ada instruksi yang mendaului agar kondisi tidak terpenuhi sehingga perulangan bisa berlangsung.
4. Harus ada intruksi diantara instruksi yang diulang sehingga pada akhirnya dapat mengubah kondisi menjadi terpenuhi dan perulangan berhenti.
5. Apabila di awal pelaksanaan kondisi sudah terpenuhi maka instruksi-instruksi paling tidak dikerjakan satu kali.
Untuk lebih paham silahkan jalankan script berikut ini. */

#include <iostream>

using namespace std;

int main()
{
    int a = 1;
    do
    {
        /* code */
        cout << \"angka ke \" << a << endl;
        a++;
    } while (/* condition */ a <= 5);

    /*
        dibaca :

        lakukan {
            cetak angka ke 1
            tambahkan nilai a++/a+1
        } selama ( nilai a <= 5 )
    */

    cin.get();
    return 0;
}
",
                'order_in_section' => 16
            ],
            [
                'section_id' => 11,
                'title' => 'For',
                'description' => "For adalah struktur pengulangan yang memungkinkan eksekusi blok kode secara berulang selama kondisi tertentu terpenuhi. Struktur for biasanya digunakan ketika jumlah iterasi sudah diketahui sebelumnya atau ketika perulangan dilakukan dengan menggunakan nilai penghitungan (counter). Dalam for, terdapat tiga bagian penting: inisialisasi, kondisi, dan iterasi. Inisialisasi dilakukan sebelum loop dimulai, kondisi dievaluasi sebelum setiap iterasi, dan iterasi dieksekusi setelah setiap iterasi. Setelah iterasi terakhir atau jika kondisi tidak terpenuhi, eksekusi keluar dari loop.",
                'code' =>
                "/* Bentuk umum :
For (inisialisasi; syarat pengulangan; pengubah nilai) {
	Instruksi;
}
Penjelasan :
-	Inisialisasi adalah sebagai nilai awal dan tipe data.
-	Syarat pengulangan adalah instruksi yang akan dilaksanakan selamat syarat memenuhi.
-	Pengubah nilai mengatur naik/turunnya nilai syarat pengulangan.

Untuk lebih memahaminya anda dapat mengikuti script ini dan mencobanya sendiri : */

#include <iostream>

using namespace std;

int main(){

    for (/*inisialisai*/int i = 10; /*loop kondisi*/ i < 20;/*incdec*/ i+=2)
    {
        /* code */
        cout << \"angka ke - \" << i << endl;
    }

    /*
        dibaca :

        untuk (i sama dengan 10, dengan kondisi loop : i kurang dari 20, i tambahkan 2 )
        {
            cetak angka ke - 10;
        }

        dan perulangan di atas di ulang sampai berhenti atau kondisi false
    */

   cout << \"\nloop ke 2 \" <<  endl;
   for (/*inisialisai*/int i = 10; /*loop kondisi*/ i > 1;/*incdec*/ i-=2)
    {
        /* code */
        cout << \"angka ke - \" << i << endl;
    }


   cout << \"\nloop ke 3 \" <<  endl;
   int total = 0;
   int jumlah = 0;
   for (/*inisialisai*/int i = 10; /*loop kondisi*/ i < 20;/*incdec*/ i++, jumlah += i)
    {
        total += i;
        /* code */
        cout << i <<\" |total| \" << total << endl;
        cout << i <<\" |jumlah| \" << jumlah << endl;
    }

   return 0;
}
",
                'order_in_section' => 17
            ],
            [
                'section_id' => 11,
                'title' => 'Break and Continue',
                'description' => "Break adalah pernyataan yang digunakan untuk menghentikan eksekusi dari loop (seperti for, while, atau do-while) secara paksa ketika suatu kondisi tertentu terpenuhi. Ketika pernyataan break dieksekusi, program akan keluar dari loop dan melanjutkan eksekusi pernyataan setelah loop tersebut.

Continue adalah pernyataan yang digunakan untuk menghentikan iterasi saat ini dalam loop, dan melanjutkan ke iterasi berikutnya. Ketika pernyataan continue dieksekusi, eksekusi loop akan melompat langsung ke langkah iterasi berikutnya, mengabaikan bagian dari blok kode di dalam loop yang berada setelah pernyataan continue.",
                'code' =>
                "// Berfungsi untuk keluar dari suatu loop for, doWhile, While. Digunakan ketika program perulangan harus berhenti sesuai aturan yang dibuat. Berbeda dengan perintah continue yang digunakan untuk mengarahkkan jalannya program ke iterasi(proses). Berikut ini adalah contoh penggunaan perintah break pada perulangan :

#include <iostream>

using namespace std;
// break => berhenti
int main(){

cout << \"contoh for\" << endl;
for(int i=0; i <= 10; i++){
    cout << i << endl;

    if ( i == 5 ){
        continue; // lanjutkan loopnya kecuali angka 5

        // break; // berhenti pas loop di 5
    }
}

cout << \"\ncontoh while\" << endl;
int i = 0;
while(i <= 10){
    i++;
    if ( i == 5){
        continue; // bermasalah saat di lima jadi i++nya harus taro di atas if
        // break;
    }
    cout << i << endl;
       // i++;
    }

    cout << \"akhirnya\" << endl;

    cin.get();
    return 0;
}
    ",
                'order_in_section' => 18
            ],
            [
                'section_id' => 11,
                'title' => 'Fibonacci',
                'description' => "Fibonacci adalah urutan bilangan di mana setiap bilangan selanjutnya dalam urutan adalah jumlah dari dua bilangan sebelumnya. Urutan dimulai dengan dua angka pertama, yaitu 0 dan 1, dan setiap angka selanjutnya dihitung dengan menambahkan dua angka sebelumnya. Jadi, urutan Fibonacci dimulai dengan: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, dan seterusnya.

Dalam C++, Anda bisa membuat program untuk menghasilkan urutan Fibonacci dengan menggunakan perulangan, rekursi, atau metode iteratif lainnya. Salah satu cara paling umum adalah menggunakan perulangan seperti while atau for. Dalam perulangan ini, Anda akan menyimpan dua angka sebelumnya dan menghitung angka berikutnya dengan menambahkan kedua angka sebelumnya.",
                'code' =>
                "/* Fibonacci adalah deret angka yang diperoleh dengan menjumlahkan dua angka sebelumnya.
Deret fibonancy terdiri dari : 1 1 2 3 5 8 13 21 34 ..dst.
Rumus Fibonacci yaitu : f(n) = f(n-1) + f(n-2).
F di inisialisasikan untuk kata “Fibonacci ke-” dan (n) adalah index yang ingin kita ketahui.
Untuk lebih paham saya berikan contoh soal : n = 3.
Maka cara pengerjaanya adalah : f(3) = f(3-1) + f(3-2) => f(3) = f(2) + f(1) => f(3) = 1 + 1 => maka f(3) = 2.
Ya benar karena deret Fibonacci ke 3 nilainya adalah 2. Untuk sintaks programnya anda dapat menjalankan script di bawah ini : */

#include <iostream>

using namespace std;

int main()
{
    // f_n = f_n1 + f_n2

    int n; // digunakan untuk memasukan berapa deret fibonacci yang ingin dicaari
    int f_n; // inisialisasi untuk rumus
    int f_n1; // inisialisasi untuk nilai fibonacci ke 1
    int f_n2; // inisialisasi untuk nilai rumus

    cout << \"Program Deret Fibonacci \n\";
    cout << \"Masukan nilai ke-n : \";
    cin >> n; // untuk menampung nilai n fibonacci

    f_n1 = 1; // nilai deret fibonacci ke satu
    f_n2 = 0; // nilai 0 untuk digunakan di rumus
    f_n = f_n1 + f_n2; // rumus untuk membuat deret fibonacci
    /*
        kalo deret fibonacci pengen dimulai dari 0

        cout << f_n2 << \" \";
        cout << f_n1 << \" \";
    */

    cout << f_n << \" \"; // cetak deret fibonacci pertama yaitu 1 agar sesuai nantinya
    for(int i = 1; i < n; i++){
    // contoh n = 3

    // ulang_1
        f_n = f_n1 + f_n2; // rumus
    //  f_n = 1 + 0
        f_n2 = f_n1; // pertukaran nilai variabel
    //  f_n2 = 1;
        f_n1 = f_n; // pertukaran nilai variabel
    //  f_n1 = 1;

    // ulang_2
    // f_n  = 1 + 1;
    // f_n2 = 1;
    // f_n1 = 2;

    // n = 3 bukan berarti ngulang 3x tapi sesuai rumus pada for

        cout << f_n << \" \"; // cetak f_n perulangan
    }
    cout << \"\n\";

    cin.get();
    return 0;

}
",
                'order_in_section' => 19
            ],
            [
                'section_id' => 11,
                'title' => 'Pola Bintang Part 1',
                'description' => "Berikut penjelasannya :",
                'code' =>
                "/* Jika anda mendapati tugas/soal disuruh membuat pola bintang seperti di bawah ini :
*					|					*
*	*				|				*	*
*	*	*			|			*	*	*
*	*	*	*		|		*	*	*	*
*	*	*	*	*	|	*	*	*	*	*
					|
*	*	*	*	*	|	*	*	*	*	*
*	*	*	*		|		*	*	*	*
*	*	*			|			*	*	*
*	*				|				*	*
*					|					*

Anda dapat langsung menyalin script di bawah ini, karena penjelasan semuanya ada di comentar : */

#include <iostream>
using namespace std;

int main()
{
    // contoh perulangan ke samping
    // for (int i=1; i <= 5; i++){
    //     cout << \"=\";
    // } cout << \"\n\" << endl;



    // =======UNTUK POLA KE 1 DAN 2=======
    // int n;

    // cout << \"Masukan panjang pola: \";
    // cin >> n;

    // cout << \"Pola 1\n\";

    // for (int i=1; i <= n; i++){ // perulangan ke bawah
    //     for(int j=1; j <= i; j++){ // perulangan ke samping
    //         cout << \"+\";
    //     }
    //     cout << endl;
    // }

    // cout << \"\nPola 2\n\" << endl;

    // for(int i=1; i <= n; i++){
    //     for(int j=n; j>=i; j-- ){
    //         cout << \"x\";
    //     }
    //     cout << endl;
    // }



    // =======UNTUK POLA KE 3 DAN 4=======
    int n;

    cout << \"Masukan panjang pola: \";
    cin >> n;

    cout << \"Pola 3\n\";
    for (int i=1; i <= n; i++){ // perulangan ke bawah
        for(int j=1; j < i; j++){ // perulangan ke samping
        /*

            nilai i sesuai dengan i++

            pembacaannya :

            Loop_1 => tidak menghasilkan apa apa karena syarat tidak terpenuhi

                   -> untuk (inisialisasi j = 1; 1 < 1; j+1(hasilnya false)) {
                      - tidak memenuhi jadi tidak menghasilkan apa apa
                      }

            Loop_2 => menghasilkan 1 elemen karena hanya satu syarat yang terpenuhi

                   -> for (j=1; 1 < 2; j+1(hasilnya true)){
                      - cetak elemen 1 kali (yaitu spasi sesuai cout aja)
                      }
                   -> for (j=2(karena j++); 2 < 2; j++(hasilnya false)){
                      - tidak memenuhi jadi tidak menghasilkan apa apa
                      }

            Loop_3 => menghasilkan 2 elemen

                   -> for (j=1; 1 < 3; hasilnya true){
                      - cetak elemen 1 kali sesuai rumus
                      }
                   -> for (j=2; 2 < 3; hasilnya true){
                      - cetak elemen 1 kali sesuai rumus
                      }
                   -> for (j=3; 3 < 3; hasilnya false(perulangan berhenti jika false)){
                      - tidak memenuhi jadi tidak menghasilkan apa apa
                      }

            Loop_4 => menghasilkan 3 elemen

                   -> for (j=1; 1 < 4; hasilnya true){
                      - cetak elemen 1 kali sesuai rumus
                      }
                   -> for (j=2; 2 < 4; hasilnya true){
                      - cetak elemen 1 kali sesuai rumus
                      }
                   -> for (j=3; 3 < 4; hasilnya true){
                      - cetak elemen 1 kali sesuai rumus
                      }
                   -> for (j=4; 4 < 4; hasilnya false(perulangan berhenti jika false)){
                      - tidak memenuhi jadi tidak menghasilkan apa apa
                      }

            Loop_5 => menghasilkan 4 elemen

                   -> for (j=1; 1 < 5; hasilnya true){
                      - cetak elemen 1 kali sesuai rumus
                      }
                   -> for (j=2; 2 < 5; hasilnya true){
                      - cetak elemen 1 kali sesuai rumus
                      }
                   -> for (j=3; 3 < 5; hasilnya true){
                      - cetak elemen 1 kali sesuai rumus
                      }
                   -> for (j=4; 4 < 5; hasilnya true){
                      - cetak elemen 1 kali sesuai rumus
                      }
                   -> for (j=5; 5 < 5; hasilnya false(perulangan berhenti jika false)){
                      - tidak memenuhi jadi tidak menghasilkan apa apa
                      }

        */
            cout << \"+\";
        }
        for(int k=n; k>=i; k--){
            /*

            nilai i sesuai dengan i++

            pembacaannya :

            Loop_1 => menghasilkan 5 elemen \"*\", dan berhenti pada perulangan ke 6

                   -> untuk (inisialisasi k = 5(sesuai nilai n yang di cin); 5 >= 1; k-1(hasilnya true)) {
                      - karena true jadi cetak \"*\" 1 kali ke samping
                      }
                   -> untuk (k = 4 (efek dari k--); 4 >= 1; k--(true)) {
                      - karena true jadi cetak \"*\" 1 kali ke samping mengikuti sebelumnya
                      }
                   -> for (k = 3; 3 >= 1; k--) {
                      - cetak \"*\" 1 kali ke samping
                      }
                   -> for (k = 2; 2 >= 1; k-1) {
                      - karena true jadi cetak \"*\" 1 kali ke samping
                      }
                   -> for (k = 1; 1 >= 1; k--) {
                      - cetak \"*\"
                      }
                   -> for (k = 0; 0 >= 1; k-1 (hasilnya false)) {
                      - perulangan berhenti
                      }

            Loop_2 => menghasilkan 4 elemen

                   -> untuk (inisialisasi k = 5(sesuai nilai n yang di cin); 5 >= 2; k-1(hasilnya true)) {
                      - karena true jadi cetak \"*\" 1 kali ke samping
                      }
                   -> untuk (k = 4 (efek dari k--); 4 >= 2; k--(true)) {
                      - karena true jadi cetak \"*\" 1 kali ke samping mengikuti sebelumnya
                      }
                   -> for (k = 3; 3 >= 2; k--) {
                      - cetak \"*\" 1 kali ke samping
                      }
                   -> for (k = 2; 2 >= 2; k-1) {
                      - karena true jadi cetak \"*\" 1 kali ke samping
                      }
                   -> for (k = 1; 1 >= 2; k-1 (hasilnya false)) {
                      - perulangan berhenti
                      }

            Loop_3 => menghasilkan 3 elemen

                   -> untuk (inisialisasi k = 5(sesuai nilai n yang di cin); 5 >= 3; k-1(hasilnya true)) {
                      - karena true jadi cetak \"*\" 1 kali ke samping
                      }
                   -> untuk (k = 4 (efek dari k--); 4 >= 3; k--(true)) {
                      - karena true jadi cetak \"*\" 1 kali ke samping mengikuti sebelumnya
                      }
                   -> for (k = 3; 3 >= 3; k--) {
                      - cetak \"*\" 1 kali ke samping
                      }
                   -> for (k = 2; 2 >= 3; k-1 (hasilnya false)) {
                      - perulangan berhenti
                      }

            Loop_4 => menghasilkan 2 elemen

                   -> untuk (inisialisasi k = 5(sesuai nilai n yang di cin); 5 >= 4; k-1(hasilnya true)) {
                      - karena true jadi cetak \"*\" 1 kali ke samping
                      }
                   -> untuk (k = 4 (efek dari k--); 4 >= 4; k--(true)) {
                      - karena true jadi cetak \"*\" 1 kali ke samping mengikuti sebelumnya
                      }
                   -> for (k = 3; 3 >= 4; k-1 (hasilnya false)) {
                      - perulangan berhenti
                      }

            Loop_5 => menghasilkan 1 elemen

                    -> for (k = 5; 5 >= 5; k--) {
                      - cetak \"*\"
                      }
                   -> for (k = 6; 6 >= 5; k-1 (hasilnya false)) {
                      - perulangan berhenti
                      }
        */
            cout << \"*\";
        }
        cout << endl;
    }

    cout << \"\nPola 4\n\";
    for (int i=1; i <= n; i++){ // perulangan ke bawah
        for(int j=n; j >= i; j--){
            /*
                pembacaan :

                loop_1 : menghasilkan 5 elemen
                    -> untuk( j=n; 5 lebih dari sama dengan i; j-1)maka{
                      cetak \"-\"
                      }
                    -> for( j=4; 4>=1; j--){
                      cetak \"-\"
                      }
                    -> for( j=3; 3>=1; j--){
                      cetak \"-\"
                      }
                    -> for( j=2; 2>=1; j--){
                      cetak \"-\"
                      }
                    -> for( j=1; 1>=1; j--){
                      cetak \"-\"
                      }
                    -> for( j=0; 0>=1; j--){
                      false (berhenti)
                    }

                loop_2 : menghasilkan 4 elemen
                    -> untuk( j=n; 5 lebih dari sama dengan i; j-1)maka{
                      cetak \"-\"
                      }
                    -> for( j=4; 4>=2; j--){
                      cetak \"-\"
                      }
                    -> for( j=3; 3>=2; j--){
                      cetak \"-\"
                      }
                    -> for( j=2; 2>=2; j--){
                      cetak \"-\"
                      }
                    -> for( j=1; 1>=2; j--){
                      false (berhenti)
                    }

                loop_3 : menghasilkan 3 elemen
                    -> untuk( j=n; 5 lebih dari sama dengan i; j-1)maka{
                      cetak \"-\"
                      }
                    -> for( j=4; 4>=3; j--){
                      cetak \"-\"
                      }
                    -> for( j=3; 3>=3; j--){
                      cetak \"-\"
                      }
                    -> for( j=2; 2>=3; j--){
                      false (berhenti)
                      }

                loop_4 : menghasilkan 2 elemen
                    -> untuk( j=n; 5 lebih dari sama dengan i; j-1)maka{
                      cetak \"-\"
                      }
                    -> for( j=4; 4>=4; j--){
                      cetak \"-\"
                      }
                    -> for( j=3; 3>=4; j--){
                      false (berhenti)
                      }

                loop_5 : menghasilkan 1 elemen
                    -> untuk( j=n; 5 lebih dari sama dengan i; j-1)maka{
                      cetak \"-\"
                      }
                    -> for( j=4; 4>=5; j--){
                      false (berhenti)
                      }

            */
            cout << \"-\";
        }
        for(int k=1; k <=i; k++){
            /*
                pembacaannya :

                loop_1 : menghasilkan 1 elemen

                    -> untuk (k=1; 1 <= i(1); k+1) maka{
                        cetak \"-\"
                    }
                    -> untuk (k=2; 2 <= 1; k++) maka{
                        false(berhenti)
                    }

                loop_2 : menghasilkan 2 elemen

                    -> for (k=1; 1 <= 2; k++){
                        cetak \"-\"
                    }
                    -> untuk (k=2; 2 <= i(2); k+1) maka{
                        cetak \"-\"
                    }
                    -> untuk (k=3; 3 <= 2; k++) maka{
                        false(berhenti)
                    }

                loop_3 : menghasilkan 3 elemen

                    -> for (k=1; 1 <= 3; k++){
                        cetak \"-\"
                    }
                    -> untuk (k=2; 2 <= i(3); k+1) maka{
                        cetak \"-\"
                    }
                    -> for (k=3; 3 <= 3; k++){
                        cetak \"-\"
                    }
                    -> untuk (k=4; 4 <= 3; k++) maka{
                        false(berhenti)
                    }

                loop_4 : menghasilkan 4 elemen

                    -> for (k=1; 1 <= 4; k++){
                        cetak \"-\"
                    }
                    -> untuk (k=2; 2 <= i(4); k+1) maka{
                        cetak \"-\"
                    }
                    -> for (k=3; 3 <= 4; k++){
                        cetak \"-\"
                    }
                    -> untuk (k=4; 4 <= 4; k++) maka{
                        cetak \"-\"
                    }
                    -> untuk (k=5; 5 <= 4; k++) maka{
                        false(berhenti)
                    }

                loop_5 : menghasilkan 5 elemen

                    -> for (k=1; 1 <= 5; k++){
                        cetak \"-\"
                    }
                    -> untuk (k=2; 2 <= i(5); k+1) maka{
                        cetak \"-\"
                    }
                    -> for (k=3; 3 <= 5; k++){
                        cetak \"-\"
                    }
                    -> untuk (k=4; 4 <= 5; k++) maka{
                        cetak \"-\"
                    }
                    -> untuk (k=5; 5 <= 5; k++) maka{
                        cetak \"-\"
                    }
                    -> untuk (k=6; 6 <= 5; k++) maka{
                        false(berhenti)
                    }
            */

            cout << \"*\";
        }
        cout << endl;
    }

    cin.get();
    return 0;
}
",
                'order_in_section' => 20
            ],
            [
                'section_id' => 11,
                'title' => 'Pola Bintang Part 2',
                'description' => "Berikut penjelasannya :",
                'code' =>
                "/* S = space
*						|	*	*	*	*	*	*	*	*	*	*	*	|						*
*	*	*					|		*	*	*	*	*	*	*	*	*		|					*	*	*
*	*	*	*	*				|			*	*	*	*	*	*	*			|				*	*	*	*	*
*	*	*	*	*	*	*			|				*	*	*	*	*				|				*	*	*	*	*
*	*	*	*	*	*	*	*	*		|					*	*	*					|					*	*	*
*	*	*	*	*	*	*	*	*	*	*	|						*						|						*

Untuk membuat pola segitiga di atas anda dapat menyalin script dibawah ini, karena penjelasan tentang perulangan sama saja seperti Pola Bintang Part 1.*/

/*

=> Pola 5
   |sss*   <-1
 N |ss***  <-3
   |s***** <-5

:>beda segitiga = 2
  - 1 3 5 => itu jaraknya +2 (a)
:>menentukan rumus :
  - 1 2 3 <=(*2)=> 2 4 6 // konsisten bedanya 2
  - 2 4 6 <=(-1)=> 1 3 5 // konsiten bedanya 1 (b)
  - int i, loopingnya (i)
:>rumus segitiga :
  - (a) * (i) - (b)

=> Pola 6
               i 0-1-2-3
  |s * * * * * 1 * * * * <: -3

                 1 0-1
  |s s * * * * 2 * * *  <: -1

                 2 1
N |s s s * * * 3 * *   <:1

                 3
  |s s s s * * 4 *    <:3

  |s s s s s * 5  <:5

:>asal loop segitiga =
  - 1 2 3 4 5 => itu jaraknya 1 (++) (int i (i))
:>segitiga yang ingin dibuat =
  - -3 -1 1 3 5 => itu jaraknya 2 (a)
  - a*1 artinya => 2*1 , 2*2, 2*3, 2*4, 2*5
  - hasil (a*i) => 2 4 6 8 10 (c)
  - jarak a - c => -3 -1 1 3 5 ==(berjarak 5)== 2 4 6 8 10 (b) nilai b sebenernya dari n yang kita inputkan

:>rumus segitiga :
  - (a) * (i) - (b)

=> Pola 7
   |   *   <-1
   |  ***  <-3
 N | ***** <-5
   |  ***  <-3
   |   *   <-1

*/

#include <iostream>

using namespace std;

int main(){
    int n;

    cout << \"Masukan panjang pola: \";
    cin >> n;

    cout << \"Pola 5\n\";

    for(int i=1; i<=n; i++){
        for(int j=n; j>i; j--){
            cout << \" \";
        }
        for(int k=1; k<= (2*i-1); k++){
            cout<<\"*\";
        }
        cout << endl;
    }

    cout << \"\nPola 6\n\";

    for(int i=1; i<=n; i++){
        for(int j=1; j<i; j++){
            cout << \" \";
        }
        for(int k=n; k>= (2*i-n); k--){
            cout<<\"*\";
        }
        cout << endl;
    }

    cout << \"\nPola 7\n\";

    for(int i=1; i<=n; i++){
        for(int j=n; j>i; j--){
            cout << \" \";
        }
        for(int k=1; k<= (2*i-1); k++){
            cout<<\"*\";
        }
        cout << endl;
    }

    for(int i=2; i<=n; i++){
        for(int j=1; j<i; j++){
            cout << \" \";
        }
        for(int k=n; k>= (2*i-n); k--){
            cout<<\"*\";
        }
        cout << endl;
    }

    cin.get();
    return 0;
}

",
                'order_in_section' => 21
            ],
            [
                'section_id' => 11,
                'title' => 'Function',
                'description' => "Berikut penjelasannya :",
                'code' =>
                "/* Function/fungsi/method adalah program yang dapat digunakan berulang-ulang. Simpelnya ketika kita membuat makanan atau minuman. Perumpamaan lain ketika kita berada di SMP pernah belajar tantang cosinus, lalu ada pelajaran seperti : f(x) = x + 5 . Nah di C++ ada fungsi untuk melakukan beberapa operasi matematika namanya cmath. Berikut ini beberapa macam fungsi dari cmath :
- ceil(x)--- = pembulatan ke atas
- cos(x)---- = cosinus
- exp(x)---- = eksponen
- fabs(x)--- = nilai absolut dalam float
- floor(x)-- = pembulatan ke bawah
- fmod(x)--- = modulus dalam float
- log(x)---- = logaritma dengan basis natural
- log10(x)-- = logaritma dengan basis 10
- pow(x,y)-- = x pangkat y
- sin(x)---- = sinus
- sqrt(x)--- = akar kuadrat
- tan(x)---- = tangen

Anda dapat menyalin script dibawah ini, lalu jalankan di teks editor anda : */


#include <iostream>
#include <cmath>

using namespace std;

int main(){

    int x;

    cout << \"menghitung akar dari x: \";
    cin >> x;

    double y = sqrt(x);

    cout << \"akarnya adalah: \"<< y << endl;

    cin.get();
    return 0;
}

// Silahkan coba satu persatu fungsi cmath agar lebih memahami kegunaan dari function.
",
                'order_in_section' => 22
            ],
            [
                'section_id' => 11,
                'title' => 'Program Lempar Dadu',
                'description' => "Berikut Contohnya",
                'code' =>
                "#include <iostream>
#include <cstdlib> // mengandung fungsi random

using namespace std;

int main(){

    char lanjut;

    while (true)
    {
        cout << \"Lempar dadu? (y/n)\";
        cin >> lanjut;

        if(lanjut == 'y'){
        cout<< 1 + (rand() % 6) << endl;
        } else if(lanjut == 'n'){
            break;
        } else {
            cout << \"Warning: ketik y atau n saja\n\";
        }
    }
    cin.get();
    return 0;
}

// Sebenarnya tujuan dari program ini adalah agar anda lebih memahami pembelajaran tentang function. Pada <cstdlib> adalah sebuah library yang memiliki fungsi rand() untuk menghasilkan nilai random atau acak.
",
                'order_in_section' => 23
            ],
            [
                'section_id' => 11,
                'title' => 'Fungsi Dengan Nilai Kembalian',
                'description' => "Berikut penjelasannya :",
                'code' =>
                "/* Cara membuat fungsi dengan nilai kembalian :
1. Tentukan tipe data : int, char, string, dll
2. nama fungsi / penanda identitas fungsi : F , namaFungsi
3. daerah input : () , (x) , (a) , ( bebas )
4. body : {  };
5. isi body : program; statement; perhitungan;
6. hasil dari semua itu  akan dikembalikan ke tipe data.
7. return : mengembalikan hasil ke tipe data
Misal :
Int f ( int x ) {
   Int y = 2 * x + 10
   Return y;
}
Nah  x adalah input dan return y artinya nilai yang di peroleh akan masuk ke f ,  agar lebih memahaminya silahkan anda salin script berikut ini : */


#include <iostream>
using namespace std;

//cara membuat fungsi di luar main

int/* tipe data int */ kuadrat/* nama fungsi */ (int x)/*daerah input*/{
    /*body*/
    int y;
    y = x*x;
    return y;
}

int tambah(int a, int b){
    int c;
    c = a + b;
    return c;
}

int main(){

    int input, hasilkuadrat; // tipe datanya harus sama dengan kuadrat
    cout << \"nilai kuadrat dari: \";
    cin >> input;

    hasilkuadrat = kuadrat(input);

    cout << \"hasilnya adalah :> \" << hasilkuadrat << endl;

    int a,b,c,hasiltambah;
    cout << \"masukan nilai a: \";
    cin >> a;
    cout << \"masukan nilai b: \";
    cin >> b;

    hasiltambah = tambah(a,b);

    cout << \"hasilnya a + b adalah :> \" << hasiltambah << endl;


    cin.get();
    return 0;
}
",
                'order_in_section' => 24
            ],
            [
                'section_id' => 11,
                'title' => 'Void',
                'description' => "Void adalah tipe data yang tidak ada nilainya alias kosong, dan tidak mengembalikan nilai apapun. Simpelnya adalah sebuah wadah kosong. Untuk lebih jelas pemakaian pada void silahkan salin script di bawah ini",
                'code' => "#include <iostream>
using namespace std;

// reporter ( maksudnya bisa melaporkan kembali nilai )
int kuadrat (int x){
    int y;
    y = x*x;
    return y;
}

// worker ( menjalankan saja tanpa memberikan feedback, jadi tidak usah pake return )
void namaFungsiTampilkan(/*input*/int input){ // untuk melakukan sesuatu tanpa perlu nilai yang harus di kembalikan
    cout << \"menampilkan dengan void\n\";
    cout << input << endl;
}

int main(){
    int input, hasilkuadrat; // tipe datanya harus sama dengan kuadrat
    cout << \"nilai kuadrat dari: \";
    cin >> input;

    hasilkuadrat = kuadrat(input);
    namaFungsiTampilkan(hasilkuadrat);

    cin.get();
    return 0;
}
",
                'order_in_section' => 25
            ],
            [
                'section_id' => 11,
                'title' => 'Penggunaan Fungsi',
                'description' => "Berikut penjelasannya:",
                'code' =>
                "#include <iostream>

using namespace std;

// fungsi menghitung luas persegi panjang
double hitung_luas(double p, double l){
    double luas = p * l;
    return luas;
}

void tampilkan_luas(double p, double l){
    cout << \"menggunakan void\n\" << endl;
    cout << \"luasnya adalah: \";
    cout << hitung_luas(p,l) << endl;
}

void tampilkan_keliling(double p, double l){
    cout << \"menggunakan void\n\" << endl;
    cout << \"kelilingnya adalah: \";
    cout << hitung_keliling(p,l) << endl;
}

// fungsi menghitung keliling persegi panjang
double hitung_keliling(double p, double l){
    double keliling = 2* (p + l);
    return keliling;
}


int main(){

    double panjang, lebar;
    cout << \"Panjang : \";
    cin >> panjang;
    cout << \"Lebar : \";
    cin >> lebar;

    tampilkan_luas(panjang, lebar);
    tampilkan_keliling(panjang,lebar);

    cin.get();
    return 0;
}

// Penjelasan :
// Double adalah tipe data serbaguna yang digunakan secara internal untuk kompiler untuk mendefinisikan dan menyimpan semua tipe data bernilai numerik terutama nilai berorientasi desimal. Tipe data ganda C++ dapat berupa pecahan maupun bilangan bulat dengan nilai.
",
                'order_in_section' => 26
            ],
            [
                'section_id' => 11,
                'title' => 'Prototype',
                'description' => "Seperti yang kita sudah tahu bahwa alur program dibaca dari atas ke bawah. Jika penulisan sebuah fungsi kita ketik setelah main, maka sudah di pastikan program tersebut error. Untuk itu digunakan prototype agar dapat berfungsi dengan baik. Prototype berfungsi untuk memeriksa apakah sebuah fungsi ada atau tidak. Prototype berguna juga jika fungsi yang ingin dipakai berulang ulang pada file terpisah. Untuk penggunaannya, silahkan anda coba script di bawah ini :",
                'code' =>
                "#include <iostream>
using namespace std;
/*
    int a; [ini adalah contoh deklarasi]

    kalo fungsi namanya prototipe
*/

/* prototype :> untuk mengecek apakah sebuah fungsi ada atau tidak. maksudnya :> alur program dijalankan/read dari atas ke bawah, nah Contoh fungsi hitung_luas. prototypenya ada di atas main, proses fungsinya ada di bawah main
double hitung_luas(double p, double l);
void println(double x); */

int main()
{
    double panjang, lebar, luas;
    cin >> panjang;
    cin >>  lebar;

    luas = hitung_luas(panjang, lebar);

    println(luas);

    cin.get();
    return 0;
}
double hitung_luas(double p, double l){
    return p * l;
}

void println(double x){
    cout << \"hasil : \" << x << endl;
}
",
                'order_in_section' => 27
            ],
            [
                'section_id' => 11,
                'title' => 'Variable Scope',
                'description' => "Scope variable maksudnya adalah  batasan ruang lingkup dari suatu variable tersebut dapat digunakan.
                Silahkan jalankan script berikut ini dan anda bisa coba di teks editor anda.
                Jika belum jelas tentang perbedaan local dan global variable anda dapat baca penjelasan di bawah ini.",
                'code' =>
                "#include <iostream>
using namespace std;

int x = 10; // global scope

int ambilGLobal(){
    return x; // mengambil variabel global
}
int xLocal(){
    int x = 5;
    return x;// mengambil local scopenya xLocal()
}

int main(){

    cout << \"1. variabelGlobal :> \" << x << endl;

    int x = 8; // local scope

    cout << \"2. variabelLocal :>\" << x << endl;
    cout << \"3. variabelAmbilGlobal :> \" << ambilGLobal() << endl;
    cout << \"4. variabelLocal :> \" << x << endl;
    cout << \"5. variabelXLocal :> \" << xLocal() << endl;
    cout << \"6. variabelLocal :> \" << x << endl;

    // Block scope
    cout << \"7. variabelLocal :> \" << x << endl;
    if (true){
        cout << \"8. variabelLocal :> \" << x << endl;
        // Block Scope
        int x = 1;
        cout << \"9. variabelLocal :> \" << x << endl;
        cout << \"10. variabelGlobal :> \" << ambilGLobal() << endl;
        cout << \"11. variabelGlobal :> \" << ::x << endl; // :: artinya unery
    }
    cout << \"12. variabelLocal :> \" << x << endl;

    cin.get();
    return 0;
}

/* Penjelasan :
Perumpamaan yang mudah dimengerti adalah ketika kita dari univ “b” ingin mengunjungi perpustakaan kampus univ “a” yang hanya boleh dikunjungi oleh orang yang mempunyai kartu tanda mahasiswa dari kampus tersebut, maka sudah jelas kita tidak bisa masuk. Namun ada persyaratan lain, jika ingin masuk dapat menunjukan ktp. Saya analogikan bahwa ktm yang dimaksud adalah variable local dan ktp adalah variable global, karena lebih luas jangkauannya. */
",
                'order_in_section' => 28
            ],
            [
                'section_id' => 11,
                'title' => 'Default Argumen',
                'description' => "Default argument berguna ketika kita ingin memberikan nilai default dari suatu fungsi. Contoh ketika kita membuat program volume kubus, dimana program tersebut dapat dijalankan jika ada nilai untuk menggunakan rumusnya. Jadi harus ada nilainya supaya program tersebut tidak eror.",
                'code' =>
                "#include <iostream>
using namespace std;

// fungsi prototype
// default argument atau nilai standarnya
// memberikan nilai default harus di atas main
double volumeKubus(double p = 3, double l = 4, double t = 5);

int main(){

    cout << \" volume kubus :> \" << volumeKubus(7,8,9) << endl;
    cout << \" volume kubus :> \" << volumeKubus(7,8) << endl;
    cout << \" volume kubus :> \" << volumeKubus(7) << endl;
    cout << \" volume kubus :> \" << volumeKubus() << endl;

    cin.get();
    return 0;
}

double volumeKubus(double p, double l, double t){
    return p * l * t;
}",
                'order_in_section' => 29
            ],
            [
                'section_id' => 11,
                'title' => 'Overloading',
                'description' => "Function Overloading adalah membuat beberapa function dengan nama yang sama, tapi dibedakan dari jumlah dan tipe data parameter. Simpelnya overloading adalah sebuah function yang di timpa dengan nama yang sama tanpa merubah fungsinya. Untuk lebih jelas silahkan anda salin script di bawah ini :",
                'code' =>
                "#include <iostream>
using namespace std;

// overloading = menimpa

// basic function
int luas_kotak (int panjang, int lebar){
    int luas = panjang * lebar;
    return luas;
}

// signature / penanda

// overload function
int luas_kotak( int sisi){
    int luas = sisi * sisi;
    return luas;
}

double luas_kotak(double sisi){
    return sisi * sisi;
}

int main(){

     cout << \" luas kotak 2x3 : \" << luas_kotak(2,3) << endl;
     cout << \" luas kotak 2x2 : \" << luas_kotak(2) << endl; // mendeteksi fungsi mana yang sesuai
     cout << \" luas kotak 2.5x2.5 : \" << luas_kotak(2.5) << endl; // mendeteksi fungsi mana yang sesuai


    cin.get();
    return 0;
}
// Jadi function yang kita panggil di cout akan mencari yang sesuai dengan parameternya. Jika dibutuhkan nilai decimal maka akan memakai tipe double, dan jika hanya ada 1 parameter maka akan memakai function yang hanya memiliki 1 parameter juga.
",
                'order_in_section' => 30
            ],
            [
                'section_id' => 11,
                'title' => 'Rekursif',
                'description' => "Rekursif adalah suatu proses yang bisa memanggil dirinya sendiri. Contoh perumpamaan penggunaan rekursif yang dengan mudah dapat kita pahami adalah memotong roti tawar tipis-tipis sampai habis, contoh lain dalam matematika adalah fungsi pangkat, factorial, Fibonacci, dll.
                Fungsi rekursif dalam c++ adalah fungsi ang mengulang dirinya sendiri dan memasukan fungsi di dalam fungsi. Untuk lebih memahaminya silahkan jalankan script di bawah ini.",
                'code' =>
                "#include <iostream>
using namespace std;

// fungsi rekursif terbatas
int pangkatIterasi(int a, int b){
    int hasil = a;
    for(int i = 1; i < b; i++){
        hasil = hasil*a;
    }
    return hasil;
}
int pangkatRekursif(int a, int b){
    // misal :> a = 3, b = 6

    if (b <= 1){
        cout << \"akhir dari rekursif\n\";
        return a;
    } else {
        cout << \"rekursif\n\";
        return a * pangkatRekursif(a, (b-1));
        /*
         soal :> 3**6 = 3*3*3*3*3*3
         pembacaan :
              > 3*3*3*3*3*3 => 3**6
              > 3*3*3*3*3   => 3**5
              > 3*3*3*3     => 3**4
              > 3*3*3       => 3**3
              > 3*3         => 3**2
              > 3           => 3**1

         pembacaan :> return a * pangkatRekursif(a,(b-1));
              - kembalikan nilai 3 * pangkatRekursif(3[yang ini jadi a selanjutnya yang akan di kalikan],(6-1=5)b Next);

                  - 3 * pangkatRekursif(3,(6-1=5))
                  - 9 * pangkatRekursif(3,(5-1=4))
                  - 27 * pangkatRekursif(3,(4-1=3))
                  - 81 * pangkatRekursif(3,(3-1=2))
                  - 243 * pangkatRekursif(3,(2-1=1))
                  - 729 [hasil dari sebelumnya]
                  - b <= 1 :> return a => batas akhir
        */
    }
}

int main(){
    int a, b;

    cout << \"angka: \";
    cin >> a;
    cout << \"pangkat: \";
    cin >> b;
    cout << \"hasil iterasi = \" << pangkatIterasi(a,b) << endl;
    cout << \"hasil rekursif = \" << pangkatRekursif(a,b) << endl;
    cin.get();
    return 0;
}

// Silahkan baca komentar “//” pada teks editor anda agar lebih memahaminya.
",
                'order_in_section' => 31
            ],
            [
                'section_id' => 11,
                'title' => 'Latihan Rekursif',
                'description' => "Untuk Latihan rekursif saya menggunakan konsep factorial. Agar lebih paham anda dapat menjalankan script di bawah ini dan membaca komentarnya supaya lebih jelas.",
                'code' =>
                "// factorial

/*
    5! = 5.4.3.2.1 = 120
    4! =   4.3.2.1 = 24
    3! =     3.2.1 = 6
    2! =       2.1 = 2
    1! =         1 = 1

    factorial
    (n)! = n.(n-1)!
    rekursif
    (int n){
        return n * factorial(n-1);
    }

*/
#include <iostream>
using namespace std;

// prototype
int faktorial(int n);

int main(){
    int angka, hasil;

    cout << \"menghitung faktorial dari: \";
    cin >> angka;

    hasil = faktorial(angka);
    cout << \"\nnilai faktorialnya adalah : \" << hasil << endl;


    cin.get();
    return 0;
}

int faktorial( int n ){

    if(n<=1){
        cout << n;
        return n;
    } else {
        cout << n << \" * \";
        return n * faktorial(n-1);
    }
}
",
                'order_in_section' => 32
            ],
            [
                'section_id' => 11,
                'title' => 'Rekursif Fibonacci',
                'description' => "Berikut penjelasannya:",
                'code' =>
                "/*
    5! = 5.4.3.2.1 = 120
    4! =   4.3.2.1 = 24
    3! =     3.2.1 = 6
    2! =       2.1 = 2
    1! =         1 = 1

    factorial
    (n)! = n.(n-1)!
    rekursif
    (int n){
        return n * factorial(n-1);
    }

*/
#include <iostream>
using namespace std;

// prototype
int faktorial(int n);

int main(){
    int angka, hasil;

    cout << \"menghitung faktorial dari: \";
    cin >> angka;

    hasil = faktorial(angka);
    cout << \"\nnilai faktorialnya adalah : \" << hasil << endl;


    cin.get();
    return 0;
}

int faktorial( int n ){

    if(n<=1){
        cout << n;
        return n;
    } else {
        cout << n << \" * \";
        return n * faktorial(n-1);
    }
}


/*
Rekursif Fibonacci

fibonacci -> nilai ke-6
    1 2 3 4 5 6
ke  - - - - - -
    1 1 2 3 5 8

rumus :> fib(6) =                                [fib(5)]                                    +                       [fib(4)]
                = [                    [[fib(4)]               +                [fib(3)]]    | [           [fib(3)]     +      [fib(2)]]
                = [          [[fib(3)]     +      [fib(2)]]    |     [[fib(2)]     + fib(1)] | [     [fib(2)] + fib(1)] + [fib(1) + fib(0)]
                = [    [[fib(2)] + fib(1)] + [fib(1) + fib(0)] | [fib(1) + fib[0]]           | [[fib(1) + fib[0]]
                = [[fib(1) + fib[0]]                           |                             |

kesimpulannya, kalo pake rumus diatas jadi makin banyak returnnya, jadi funginya eksponensial makin berkembang returnya
jadi kalo fibonacci returnnya {fib(n-1) + fib(n-2)} -> ini yang jadi eksponensial jadi agak kurang cocok kalo fibonacci dipake di rekursif. karena makin membuat memory berat jadi lebih baik iterasi biasa
tapi gapapa kalo mau coba

*/
",
                'order_in_section' => 33
            ],
            [
                'section_id' => 11,
                'title' => 'Pointer',
                'description' => "Pointer adalah penunjuk suatu variabel. Karena menunjuk suatu variabel, maka pointer wajib memiliki alamat dari variabel yang ditunjuknya. Agar lebih jelas anda dapat menyalin script dibawah ini dan memahaminya melalui komentar yang saya sudah sediakan.",
                'code' =>
                "/*
    Pointer

    memory :> alamat 1 | alamat 2 | alamat 3 | dst

    contoh :> int a = 5; // -> nilai, yang akan dimasukan ke dalam memory alamat(addres)
                cout << a << endl; // nah a-nya ambil dari alamat int a yang sesuai
                cout << kuadrat(a) << endl;
              int kuadrat (int c[dia akan masuk ke memory selanjutnya, tidak sama dengan addres a]) { -> masalahnya addresnya berbeda, inginnya sama
                  return c*c;
              }
*/

#include <iostream>

using namespace std;

int main(){
        int a = 5;

        // pointer => untuk menaruh alamat si a
        // pointer => selalu bertipe data integer
        int *aPtr = NULL ; // nullptr adalah misal kita mendeklarasikan pointer tapi addresnya kosong

        aPtr = &a;

        // int a mempunyai nilai dan address ( alamat )

        cout << \"nilai dari a: \" << a << endl;

        cout << \"alamat dari a: \" << aPtr << endl;

        // dereferencing, mengambil data dari sebuah pointer
        a = 10;
        cout << \"mengambil nilai dari pointer aPtr: \" << *aPtr << endl;

        cin.get();
        return 0;
}
",
                'order_in_section' => 34
            ],
            [
                'section_id' => 11,
                'title' => 'Reference',
                'description' => "Ketika sebuah variabel dideklarasikan sebagai referensi, itu menjadi nama alternatif untuk variabel yang ada. Sebuah variabel dapat dideklarasikan sebagai referensi dengan meletakkan '&' di dalam deklarasi. Simpelnya reference digunakan untuk mengganti nilai dengan alamat yang sama.",
                'code' =>
                "/*
Reference

Memory
alamat 1 | alamat 2 | alamat 3

cara agar alamat sama,
contoh :> int a = 5 // value 1(address)
  int b = 4 // inginnya alamatnya sama seperti a

address sama berguna, jika kelakuan a dan b sama, atau menggunakan si b hanya bantuan perubahan untuk si a
&a
*/

#include <iostream>

using namespace std;
int main(){
    // variabel
    int a = 5;

    cout << \"address dari a \" << &a << endl;
    cout << \"  nilai dari a \" << a << endl << endl;

    // reference
    // sharing alamat dengan si a
    int &b = a;

    cout << \"  nilai dari b \" << b << endl;
    cout << \"address dari b \" << &b << endl << endl;

    // kalo nilai b berubah a nya juga
    b = 10;
    cout << \"  nilai dari a \" << a << endl;
    cout << \"  nilai dari b \" << b << endl << endl;

    // sama juga seperti a kalo berubah b juga
    a = 20;
    cout << \"  nilai dari a \" << a << endl;
    cout << \"  nilai dari b \" << b << endl;

    cin.get();
    return 0;
}
",
                'order_in_section' => 35
            ],
            [
                'section_id' => 11,
                'title' => 'Fungsi dengan Pointer',
                'description' => "Fungsi dengan pointer adalah fungsi yang menggunakan pointer sebagai parameter atau fungsi yang mengembalikan nilai pointer. Pointer adalah variabel yang menyimpan alamat memori dari variabel lain. Dengan menggunakan pointer sebagai parameter atau nilai kembali, fungsi dapat mengakses dan memanipulasi nilai variabel yang berada di luar ruang lingkup fungsi itu sendiri.",
                'code' =>
                "// Jadi kita dapat membuat fungsi dengan pointer, dengan adanya fungsi ini kita tidak perlu membuat rumus fungsi berulangkali. Untuk lebih jelas silahkan anda salin script dibawah ini dan jalankan di teks editor.

#include <iostream>
using namespace std;
/*
fungsi memasukan : - nilai
                   - reference
                   - pointer

*/

// jadi kita tidak perlu bikin rumus ini lagi

// int kuadrat(int value){
//      return value*value;
// }

void fungsi(int *);
void kuadrat(int *);

int main(){
    int a = 5;
    cout << \"address a \" << &a << endl;
    cout << \"nilai a \" << a << endl;
    // fungsi(&a); // fungsi dengan input pointer
    kuadrat(&a);
    cout << \"nilai a kuadrat \" << a << endl;
    cin.get();
    return 0;
}

void kuadrat(int *valPtr){
    *valPtr = (*valPtr) * (*valPtr);
}

void fungsi(int *b){
    cout << \"address b \" << b << endl;
    cout << \"nilai b\" << *b << endl; // *[pointer b = dereferencing]
}
",
                'order_in_section' => 36
            ],
            [
                'section_id' => 11,
                'title' => 'Fungsi dengan Reference',
                'description' => "Fungsi dengan reference adalah fungsi yang menggunakan reference sebagai parameter. Reference adalah alias untuk variabel lain yang memungkinkan fungsi untuk mengakses dan memanipulasi variabel tersebut tanpa perlu melakukan salinan nilai. Dengan menggunakan reference sebagai parameter, perubahan yang dilakukan pada variabel di dalam fungsi akan tercermin pada variabel aslinya di luar fungsi tersebut.",
                'code' =>
                "// Fungsi dengan reference lebih bagus dan secara penulisan lebih teratur karena hanya memerlukan beberapa baris saja.
/*
    lebih bagus fungsi reference, lebih rapi
*/
#include <iostream>
using namespace std;

void fungsi(int &b);
void kuadrat(int &nilaiReferensi);

int main()
{
    int a = 5;
    cout << \"addres a \" << &a << endl;
    cout << \" nilai a \" << a << endl;

    // fungsi(a);
    kuadrat(a);
    cout << \" nilai a \" << a << endl;

    cin.get();
    return 0;
}

void fungsi(int &b)
{
    b = 10;
    cout << \"addres b \" << &b << endl;
    cout << \" nilai b \" << b << endl;
}

void kuadrat(int &nilaiReferensi)
{
    nilaiReferensi = nilaiReferensi * nilaiReferensi;
}
",
                'order_in_section' => 37
            ],
            [
                'section_id' => 11,
                'title' => 'Array',
                'description' => "Larik atau array adalah tipe terstruktur yang terdiri dari sejumlah komponen yang mempunyai tipe data yang sama. Variable array terdiri dari array berdimensi satu dan dua. Silahkan anda salin script dibawah ini :",
                'code' =>
                "/*
    ARRAY BASIC

    kekurangannya : tidak bisa sort, mencari ukuran data, minmax

    kumpulan data :> 5 data integer

    int[4] => artinya ada 4 data yang akan ditaruh di alamat secara berurutan dan indexnya di mulai dari 0
    address : alamat 1 | alamat 2 | alamat 3 | alamat 4
    index   :     0    |     1    |     2    |     3

    contoh :> array dengan tipe data integer > memory

*/
#include <iostream>

using namespace std;

int main(){
    // membuat array, bisa bertipe data integer, string, boolean
    // --cara 1--
    int nilai[5];
    nilai [0] = 10;
    nilai [1] = 20;
    nilai [2] = 30;
    nilai [3] = 40;
    nilai [4] = 50;

    cout << \"cara 1\" << endl;
    cout << \"Addressnya adalah \" << &nilai[0] << \", nilainya adalah : \" << nilai[0] << endl;
    cout << \"Addressnya adalah \" << &nilai[1] << \", nilainya adalah : \" << nilai[1] << endl;
    cout << \"Addressnya adalah \" << &nilai[2] << \", nilainya adalah : \" << nilai[2] << endl;
    cout << \"Addressnya adalah \" << &nilai[3] << \", nilainya adalah : \" << nilai[3] << endl;
    cout << \"Addressnya adalah \" << &nilai[4] << \", nilainya adalah : \" << nilai[4] << endl;

    // --cara 2--
    int angka[5] = {20,30,40,50,60};
    cout << \"\ncara 2\" << endl;
    cout << \"Addressnya adalah \" << &angka[0] << \", angkanya adalah : \" << angka[0] << endl;
    cout << \"Addressnya adalah \" << &angka[1] << \", angkanya adalah : \" << angka[1] << endl;
    cout << \"Addressnya adalah \" << &angka[2] << \", angkanya adalah : \" << angka[2] << endl;
    cout << \"Addressnya adalah \" << &angka[3] << \", angkanya adalah : \" << angka[3] << endl;
    cout << \"Addressnya adalah \" << &angka[4] << \", angkanya adalah : \" << angka[4] << endl;

    // memanipulasi
    /*

        alamat1 :> cout << \"Addressnya adalah \" << &angka[0] << \", angkanya adalah : \" << angka[0] << endl;
        alamat2 :> cout << \"Addressnya adalah \" << &angka[1] << \", angkanya adalah : \" << angka[1] << endl;

        ingin mengambil data dari alamat ke dua dengan alamatnya relatif sebelumnya yaitu ke satu

        jika ingin merubah data alamat jadi ke 2, addressnya tinggal ditambah 2. karena si arraynya bertipe integer.1 integer bernilai 2 byte. sedangkan perbedaan antar alamat 4 byte

    */
    int *ptr = angka;
    //dereferencing
    *(ptr + 2) = 6;

    // memanipulasi ke 2
    angka[3] = 7;

    // jika array basic seperti ini, di c++ tidak punya fungsi internal untuk mengecek banyaknya data dalam array, itu adalah kekurangan


    cout << \"\npembuktikan apakah benar posisinya sesuai addres\" << endl;
    cout << \"Addressnya adalah \" << &angka[0] << \", angkanya adalah : \" << angka[0] << endl;
    cout << \"Addressnya adalah \" << &angka[1] << \", angkanya adalah : \" << angka[1] << endl;
    cout << \"Addressnya adalah \" << &angka[2] << \", manipulasinya adalah : \" << angka[2] << endl;
    cout << \"Addressnya adalah \" << &angka[3] << \", manipulasinya adalah : \" << angka[3] << endl;
    cout << \"Addressnya adalah \" << &angka[4] << \", angkanya adalah : \" << angka[4] << endl;

    // mengetahui jumlah data dalam array :> tricky
    cout << \"\nukuran si array \" << sizeof(angka) << \" byte\" << endl;
    cout << \"jumlah data array = \" << sizeof(angka)/sizeof(int) << endl;

    cin.get();
    return 0;
}
",
                'order_in_section' => 38
            ],
            [
                'section_id' => 11,
                'title' => 'Standard Library Array',
                'description' => "Array di dalam Standar Library C++ (C++ Standard Library Array) adalah struktur data yang menyimpan kumpulan elemen dengan tipe data yang sama, diatur secara terurut dalam memori. Array dari Standar Library C++ menyediakan berbagai macam fitur dan fungsi yang memudahkan penggunaan dan manipulasi array.",
                'code' =>
                "// Array adalah kumpulan elemen dari tipe yang sama yang ditempatkan di lokasi memori yang berdekatan yang dapat direferensikan secara individual dengan menggunakan indeks ke pengidentifikasi unik.

/*
    ARRAY BASIC

    kekurangannya : tidak bisa sort, mencari ukuran data, minmax

    kumpulan data :> 5 data integer

    int[4] => artinya ada 4 data yang akan ditaruh di alamat secara berurutan dan indexnya di mulai dari 0
    address : alamat 1 | alamat 2 | alamat 3 | alamat 4
    index   :     0    |     1    |     2    |     3

    contoh :> array dengan tipe data integer > memory

*/

#include <iostream>

using namespace std;

int main(){
    // membuat array, bisa bertipe data integer, string, boolean
    // --cara 1--
    int nilai[5];
    nilai [0] = 10;
    nilai [1] = 20;
    nilai [2] = 30;
    nilai [3] = 40;
    nilai [4] = 50;

    cout << \"cara 1\" << endl;
    cout << \"Addressnya adalah \" << &nilai[0] << \", nilainya adalah : \" << nilai[0] << endl;
    cout << \"Addressnya adalah \" << &nilai[1] << \", nilainya adalah : \" << nilai[1] << endl;
    cout << \"Addressnya adalah \" << &nilai[2] << \", nilainya adalah : \" << nilai[2] << endl;
    cout << \"Addressnya adalah \" << &nilai[3] << \", nilainya adalah : \" << nilai[3] << endl;
    cout << \"Addressnya adalah \" << &nilai[4] << \", nilainya adalah : \" << nilai[4] << endl;

    // --cara 2--
    int angka[5] = {20,30,40,50,60};
    cout << \"\ncara 2\" << endl;
    cout << \"Addressnya adalah \" << &angka[0] << \", angkanya adalah : \" << angka[0] << endl;
    cout << \"Addressnya adalah \" << &angka[1] << \", angkanya adalah : \" << angka[1] << endl;
    cout << \"Addressnya adalah \" << &angka[2] << \", angkanya adalah : \" << angka[2] << endl;
    cout << \"Addressnya adalah \" << &angka[3] << \", angkanya adalah : \" << angka[3] << endl;
    cout << \"Addressnya adalah \" << &angka[4] << \", angkanya adalah : \" << angka[4] << endl;

    // memanipulasi
    /*

        alamat1 :> cout << \"Addressnya adalah \" << &angka[0] << \", angkanya adalah : \" << angka[0] << endl;
        alamat2 :> cout << \"Addressnya adalah \" << &angka[1] << \", angkanya adalah : \" << angka[1] << endl;

        ingin mengambil data dari alamat ke dua dengan alamatnya relatif sebelumnya yaitu ke satu

        jika ingin merubah data alamat jadi ke 2, addressnya tinggal ditambah 2. karena si arraynya bertipe integer.1 integer bernilai 2 byte. sedangkan perbedaan antar alamat 4 byte

    */
    int *ptr = angka;
    //dereferencing
    *(ptr + 2) = 6;

    // memanipulasi ke 2
    angka[3] = 7;

    // jika array basic seperti ini, di c++ tidak punya fungsi internal untuk mengecek banyaknya data dalam array, itu adalah kekurangan


    cout << \"\npembuktikan apakah benar posisinya sesuai addres\" << endl;
    cout << \"Addressnya adalah \" << &angka[0] << \", angkanya adalah : \" << angka[0] << endl;
    cout << \"Addressnya adalah \" << &angka[1] << \", angkanya adalah : \" << angka[1] << endl;
    cout << \"Addressnya adalah \" << &angka[2] << \", manipulasinya adalah : \" << angka[2] << endl;
    cout << \"Addressnya adalah \" << &angka[3] << \", manipulasinya adalah : \" << angka[3] << endl;
    cout << \"Addressnya adalah \" << &angka[4] << \", angkanya adalah : \" << angka[4] << endl;

    // mengetahui jumlah data dalam array :> tricky
    cout << \"\nukuran si array \" << sizeof(angka) << \" byte\" << endl;
    cout << \"jumlah data array = \" << sizeof(angka)/sizeof(int) << endl;

    cin.get();
    return 0;
}
",
                'order_in_section' => 39
            ],
            [
                'section_id' => 11,
                'title' => 'Latihan Array',
                'description' => "Berikut penjelasannya:",
                'code' =>
                "#include <iostream>
#include <array>

using namespace std;

int main(){

    array<int, 10> nilai;

    cout << \"Program menampilkan grafik nilai\" << endl << endl;

    for(int i=0; i<=nilai.size(); i++){
        cout << \"jumlah mahasiswa dengan nilai : \";
        if(i == 0) {
            cout << \"0-9 : \";
        } else if(i == 10) {
            cout << \"100 : \";
        } else {
            cout << i+10 << \"-\" << (i*10) + 9 << \" : \";
        }
        cin >> nilai[i];
    }
    cout << endl;
    cout << \"Grafik nilai\" << endl << endl;

    for( int i = 0; i <= nilai.size(); i++ ){
        if(i == 0) {
            cout << \"0-9: \";
        } else if(i == 10) {
            cout << \"100: \";
        } else {
            cout << i+10 << \"-\" << (i*10) + 9 << \": \";
        }
        for(int bintang = 0; bintang < nilai[i]; bintang++){
            cout << \"*\";
        }
        cout << endl;
    }

    cin.get();
    return 0;
}
",
                'order_in_section' => 40
            ],
            [
                'section_id' => 11,
                'title' => 'Looping Array',
                'description' => "Untuk melakukan looping array dalam C++, Anda dapat menggunakan loop for atau loop lainnya dengan mengakses setiap elemen array menggunakan indeks. Anda juga dapat menggunakan iterator jika menggunakan container seperti vector. Misalnya, untuk loop for, Anda bisa mulai dari indeks 0 hingga indeks ukuran array dikurangi satu, dan akses elemen array menggunakan indeks. Iterasi dilakukan dengan menambahkan nilai indeks dalam setiap iterasi.",
                'code' =>
                "// menggunakan standart library array
#include <iostream>
#include <array>
using namespace std;

int main(){
    // looping untuk array di c++11 keatas

    /*
        for(declarasi variabel : array){
            statemen
        }
    */

    array <int,10> arrayNilai = {0,1,2,3,4,5,6,7,8,9};
//    for(int i = 0; i < 10; i++){
//        cout << arrayNilai[i] << endl;
//    }


    for(int  nilai : arrayNilai){ // melooping sesuai dengan jumlah data pada suatu array
        cout << \"address \" <<&nilai << \" nilainya : \" << nilai << endl;
        nilai = 1; //ini tidak merubah nilai array
    }

    cout << endl;

    cout << \"addressnya mengambil alamat sebenarnya dari array, jadi bisa dimanipulasi\" << endl;
    for(int  &nilaiRef : arrayNilai){ // melooping sesuai dengan jumlah data pada suatu array
        nilaiRef *=2;
        cout << \"address \" <<&nilaiRef << \" nilainya : \" << nilaiRef << endl;

    }

    cout << endl;

    cout << \"memanipulasi array dengan menggunakan referensi\" << endl;
    for(int  &nilaiRef : arrayNilai){ // melooping sesuai dengan jumlah data pada suatu array
        cout << \"address \" <<&nilaiRef << \" nilainya : \" << nilaiRef << endl;

    }

    cin.get();
    return 0;
}",
                'order_in_section' => 41
            ],
            [
                'section_id' => 11,
                'title' => 'Multidimensional Array',
                'description' => "Array multidimensi adalah struktur data yang menyimpan elemen dalam bentuk matriks atau array yang memiliki beberapa dimensi. Dalam C++, array multidimensi dapat dideklarasikan dengan menggunakan sintaksis [ukuran1][ukuran2]...[ukuranN] di mana ukuran1, ukuran2, dan seterusnya adalah ukuran masing-masing dimensi. Misalnya, array dua dimensi akan memiliki dua indeks untuk mengakses elemen, sedangkan array tiga dimensi akan memiliki tiga indeks, dan seterusnya.",
                'code' =>
                "/*
Array MultiDimensi

add1 | add2 | add3 | add4

array md diatur menggunakan format barisKolom :

-> aMd[2][3] artinya array mempunya 2 baris dan 3 kolom

penempatannya sesuai dengan addres :

add1(aMd(0,0)) | add2(aMd(0,1)) | add3(aMd(0,2)) | add4(aMd(1,0)) | add5(aMd(1,1)) | add6(aMd(1,2))

index pada array dimulai dengan 0

jika disusun secara tabel :
        |  Kolom 1  |  Kolom 2  | Kolom 3
baris 1 | aMd[0][0] | aMd[0][1] | aMd[0][2]
        |           |           |
baris 2 | aMd[1][0] | aMd[1][1] | aMd[1][2]

*/

#include <iostream>

using namespace std;

void printArray(int *ptrArray, int baris, int kolom){
    int index = 0;
    for(int i = 0; i < baris; i++){
            cout << \"[ \";
        for(int j = 0; j < kolom; j++){
            cout << *(ptrArray + index) << \" \";
            index++;
        }
        cout << \"]\" << endl;
    }
    }

    int main(){

    // array multidimensi
    // array [baris] [kolom]
    // int array[baris][kolom] ={1,2,3,4};
    const int baris = 2;
    const int kolom = 2;
    // baris dan kolom kalo di array itu harus bersifat konstan
    int arrayMD[baris][kolom] ={1,2,3,4};
    // cout << arrayMD[0][0] << \" \" << arrayMD[0] [1] << endl;
    // cout << arrayMD[1][0] << \" \" << arrayMD[1] [1] << endl;

    printArray(*arrayMD, baris, kolom);
    cin.get();
    return 0;
}",
                'order_in_section' => 42
            ],
            [
                'section_id' => 11,
                'title' => 'Multidimensional Array - Standard Library',
                'description' => "C++ Standard Library tidak menyediakan tipe data array multidimensi langsung. Namun, Anda dapat menggunakan container seperti std::vector bersarang untuk mencapai efek yang sama. Misalnya, Anda dapat membuat vektor dari vektor untuk membuat array dua dimensi, dan seterusnya. Ini memberikan fleksibilitas dan kemudahan manajemen memori yang lebih baik daripada array C-style multidimensi.",
                'code' =>
                "#include <iostream>
#include <array>

using namespace std;

const int kolom = 3;
const int baris = 2;
void printArray(array < array< int,kolom>, baris> nilaiArray){
    for (array< int,kolom> vectorBaris : nilaiArray){
        cout << \"[ \";
        for(int nilaiKolom: vectorBaris){
            cout << nilaiKolom << \" \";
        }
        cout << \"]\" << endl;
    }
}

int main(){
    array < array< int,kolom>, baris> nilaiMD = {0,1,2,3,4,5};

    printArray(nilaiMD);

    cin.get();
    return 0;
}",
                'order_in_section' => 43
            ],
            [
                'section_id' => 11,
                'title' => 'Sort Array - Standard Library',
                'description' => "Anda dapat menggunakan algoritma sort dari C++ Standard Library untuk mengurutkan array. Salah satu cara yang umum adalah menggunakan fungsi std::sort() yang tersedia di dalam header <algorithm>. Fungsi ini akan mengurutkan elemen-elemen array dalam urutan naik (ascending) secara default, tetapi Anda juga dapat memberikan pembanding kustom jika diperlukan.",
                'code' =>
                "#include <iostream>
#include <array>
#include <algorithm> // sorting, quick sort, buble sort, seacrhing
// using namespace std;

const size_t arraySize = 10;
// overloading function
void printArray(std::array <int, arraySize> &angka){
    std::cout << \"Array: \";
    for(int &a : angka){
        std::cout << a << \" \";
    }
    std::cout << std::endl;
}

void printArray(std::array <char, arraySize> &angka){
    std::cout << \"Array: \";
    for(char &a : angka){
        std::cout << a << \" \";
    }
    std::cout << std::endl;
}

int main(){
    std::array <int, arraySize> angka = {9,4,6,7,8,1,3,2,5,0};
    std::array <char, arraySize> huruf = {'c','h', 'j', 'e', 'r', 't', 'y', 'v', 'b', 'a'};

    printArray(angka);
    printArray(huruf);

    std::cout << std::endl;

    std::sort(angka.begin(), angka.end()); // dari library algorithm
    // untuk menggunakan => sort(awal dari array, akhir dari array)
    std::cout << \"setelah di sort\" << std::endl;
    printArray(angka);
    std::sort(huruf.begin(), huruf.end());
    printArray(huruf);

    std::cin.get();
    return 0;
}",
                'order_in_section' => 44
            ],
            [
                'section_id' => 11,
                'title' => 'Search Array - Standard Library',
                'description' => "Anda dapat menggunakan algoritma pencarian dari C++ Standard Library untuk mencari nilai tertentu dalam array. Salah satu cara yang umum adalah menggunakan fungsi std::find() yang tersedia di dalam header <algorithm>. Fungsi ini akan mencari nilai tertentu dalam rentang yang ditentukan dan mengembalikan iterator ke elemen yang ditemukan, atau iterator ke akhir rentang jika nilai tidak ditemukan.",
                'code' =>
                "// contoh penggunaan library algorithm
#include <iostream>
#include <algorithm>
#include <array>

const size_t arraySize = 10;

void printArray(std::array <int, arraySize> &angka){
    std::cout << \"Array: \";
    for(int &a : angka) {
        std::cout << a << \" \";
    }
    std::cout << std::endl;
}

int main (){

    std::array <int, arraySize> angka = {9,4,2,5,8,0,1,7,6,3};
    printArray(angka);

    int angkaCari;

    bool ketemu;
    // sort dulu
    // seach -> binary_seacrh
    std::cout << \"mencari angka dalam array diatas: \n\";
    std::cin >> angkaCari;

    std::sort(angka.begin(), angka.end());
    ketemu = std::binary_search(angka.begin(), angka.end(), angkaCari); // 3 parameter

    if(ketemu){
        std::cout << \"ketemu\" << std::endl;
    } else{
        std::cout << \"tidak ketemu\" << std::endl;

    }
    std::cin.get();
    return 0;
}",
                'order_in_section' => 45
            ],
            [
                'section_id' => 11,
                'title' => 'String',
                'description' => "String adalah sebuah char array yang bisa kit ubah datanya tanpa harus di susun seperti array pada angka",
                'code' =>
                "#include <iostream>
#include <string>

// using namespace std;

int main(){

    // char kata[5] = {'m','o','b','i','l'}; tidak kita pakai karena ribet
    // array char tidak bisa kita tambah, karena fiks array

    // cara ini kita pakai
    std::string kata(\"ilham\");

    std::string data;
    std::cout << \"masukan kata bukan kalimat dan tanpa spasi : \";
    std::cin >> data;
    std::cout << \"data yang dimasukan adalah: \" << std::endl;
    std::cout << data << std::endl;
    // sayangnya spasi tidak terbaca

    std::cout << kata << std::endl;
    std::cin.get();
    return 0;
}",
                'order_in_section' => 46
            ],
            [
                'section_id' => 11,
                'title' => 'Operasi String',
                'description' => "Operasi string adalah manipulasi dan pengolahan teks dalam bentuk string. Dalam C++, Anda dapat melakukan berbagai operasi string menggunakan kelas std::string dari C++ Standard Library.",
                'code' =>
                "// operasi sederhana pada string
#include <iostream>
#include <string>

using namespace std;

int main(){

    string kata(\"cat\");

    // menampilkan data string
    cout << kata << endl;

    // mengambil karakter berdasarkan index
    cout << \"index ke 0 : \" << kata[0] << endl;
    cout << \"index ke 1 : \" << kata[1] << endl;
    cout << \"index ke 2 : \" << kata[2] << endl;
    // cout << \"index ke 3 : \" << kata[3] << endl; tidak menghasilkan apa apa alias kosong

    // merubah karakter pada index tertentu
    kata[1] = 'e'; // kalo mau ubah karakter tidak boleh menggunakan tanda kutip dua harus menggunakan kutip satu
    cout << kata << endl;

    // menyambung, concatenation
    // cara 1 menggunakan +
    string kata2(kata + \"ar\");
    cout << kata2 << endl;

    // cara 2 menggunakan fungsi append
    string kata3(\" membahana\");
    kata2.append(\" gagagg\" + kata3);
    cout << kata2 << endl;

    // cara 3
    string kata4(\" ahayyyy\");
    kata2  += kata4 + \" heheh\";
    cout << kata2 << endl;


    cin.get();
    return 0;
}",
                'order_in_section' => 47
            ],
            [
                'section_id' => 11,
                'title' => 'Komparasi String',
                'description' => "Komparasi string dalam C++ dapat dilakukan dengan berbagai cara. Anda dapat menggunakan operator perbandingan langsung seperti ==, !=, <, >, <=, dan >= untuk membandingkan dua string. Selain itu, Anda juga dapat menggunakan fungsi compare() dari kelas std::string untuk membandingkan dua string secara leksikografis. Metode compare() mengembalikan nilai negatif jika string pertama kurang dari string kedua, nol jika kedua string sama, dan nilai positif jika string pertama lebih besar dari string kedua.",
                'code' =>
                "// perbanding string pada c++ bersifat case sensitive
#include <iostream>
#include <string>

using namespace std;

int main() {

    // menggunakan char => tidak berhasil karena char banding string
    // char kata[4] = {'h','a','h','a'};

    // if(kata == \"haha\"){
    //     cout << \"berhasil\" << endl;
    // }

    // tidak berhasil juga karena char dibandingkan dengan char
    // char kata[4] = {'h','a','h','a'};
    // char pembanding[4] = {'h','a','h','a'};
    // if(kata == pembanding){
    //     cout << \"berhasil\" << endl;
    // }


    // ini adalah program perbandingan string
    // string kata = (\"haha\");
    // if (kata == \"haha\"){
    //     cout << \"berhasil\" << endl;
    // }

    string input;
    string kata_rahasia(\"haha\");

    while (true)
    {
        cout << \"tebak kata : \";
        cin >> input;

        if (input == kata_rahasia){
            cout << \"kata anda benar!!\" << endl;
            break;
        } else {
            cout << \"tabakan anda salah!!\" << endl;
        }
    }

    cout <<\"program selesai\" << endl;


    cin.get();
    return 0;
}",
                'order_in_section' => 48
            ],
            [
                'section_id' => 11,
                'title' => 'Substring',
                'description' => "Substring adalah potongan dari sebuah string yang terdiri dari sejumlah karakter yang berada di dalam string tersebut, dimulai dari suatu posisi (indeks) dan berlangsung hingga panjang tertentu atau hingga akhir string. Dalam C++, Anda dapat menggunakan metode substr() dari kelas std::string untuk mengambil substring dari string yang ada. Metode substr() membutuhkan dua parameter: indeks awal dari substring yang ingin diambil dan panjang substring yang diinginkan. Substring tersebut kemudian dapat digunakan atau diproses lebih lanjut.",
                'code' =>
                "// belajar bagaimana substring/ambil komponen string
#include <iostream>
#include <string>

using namespace std;

int main(){

    string kalimat_1(\"ilham suka olahraga, ilham sehat\");
    string kalimat_2(\"rahmat suka makan pisang di pagi hari\");

    cout<< \"1: \" << kalimat_1 << endl;
    cout<< \"2: \" << kalimat_2 << endl;

    // substring, mengambil string ditengah tengah
    // subsstr(index, panjang)
    cout << kalimat_1.substr(11, 8) << endl;
    cout << kalimat_2.substr(0,4) << endl;

    // mencari posisi dari substring
    cout << \"1. posisi kata \"olahraga\" : \" << kalimat_1.find(\"olahraga\") << endl;
    cout << \"2. posisi kata \"pisang\" : \" << kalimat_2.find(\"pisang\") << endl;

    /*
        0  1  2  3  4  5  6  7  8  9 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26 27 28 29 30 31
        i  l  h  a  m  _  s  u  k  a  _  o  l  a  h  r  a  g  a  ,  _  i  l  h  a  m  _  s  e  h  a  t
    */

    // menaruh index ke dalam sebuah variabel
    int a = kalimat_1.find(\"ilham\"); // jadi nilai pertama
    cout << \"3. posisi kata \"ilham\" : \" << a << endl;
    // mencari kata \"ilham\" yang kedua. misal a pada kata ilham dimulai dari index ke 0, maka pencarian kata ilham yang ke dua dimulai/dihitung dari index ke satu karena a + 1. jadi intinya setelah huruf/indexe i/0 baru memulai pencarian
    cout << \"4. posisi kata \"ilham\" yang kedua : \" << kalimat_1.find(\"ilham\", a + 1) << endl;

    // mencari posisinya dari belakang -> rfind

    cout << \"5. posisi kata \"am\" : \" << kalimat_1.rfind(\"am\") << endl;

    cin.get();
    return 0;
}",
                'order_in_section' => 49
            ],
            [
                'section_id' => 11,
                'title' => 'Subsitusi String',
                'description' => "Substitusi string adalah proses menggantikan satu bagian string dengan string lain. Dalam C++, Anda dapat menggunakan berbagai metode untuk melakukan substitusi string, tergantung pada kebutuhan Anda. Beberapa pendekatan umum termasuk menggunakan metode replace() dari kelas std::string, yang memungkinkan Anda mengganti semua kemunculan substring tertentu dengan string lain. Misalnya, Anda dapat mengganti semua kemunculan substring \"old\" dengan \"new\" dalam string menggunakan replace(). Selain itu, Anda juga dapat menggunakan algoritma manipulasi string yang tersedia di C++ Standard Library atau menerapkan algoritma substitusi kustom.",
                'code' =>
                "#include <iostream>
#include <string>

using namespace std;

int main(){
    string kalimat_1(\"aku suka kamu suka, siapa? dia!\");
    string kalimat_2(\"wakanda forevah!!!\");

    cout << \"1: \" << kalimat_1 << endl;
    cout << \"2: \" << kalimat_2 << endl;

    // swap string
    kalimat_1.swap(kalimat_2);
    cout << \"swap string\" << endl;
    cout << \"1: \" << kalimat_1 <<endl;
    cout << \"2: \" << kalimat_2 <<endl;

    // replace, mengganti string
    kalimat_2.replace(27, 3, \"karina\");
    int posisi = kalimat_1.find(\"ah\");
    kalimat_1.replace(posisi, 2, \"er\");
    cout << \"replace string\" << endl;
    cout << \"1: \" << kalimat_1 <<endl;
    cout << \"2: \" << kalimat_2 <<endl;

    // insert string
    kalimat_1.insert(8,\"dan hatiku \");
    cout << \"insert string\" << endl;
    cout << \"1: \" << kalimat_1 <<endl;
    cout << \"2: \" << kalimat_2 <<endl;



    cin.get();
    return 0;
}",
                'order_in_section' => 50
            ],
            [
                'section_id' => 11,
                'title' => 'Getline Console String',
                'description' => "Untuk membaca sebuah string dari input konsol (stdin) dalam C++, Anda dapat menggunakan fungsi std::getline(), yang merupakan bagian dari C++ Standard Library. Fungsi ini membaca satu baris teks dari input konsol dan menyimpannya dalam sebuah objek string.",
                'code' =>
                "// mengambil suatu data string dari 1 baris kalimat, read, process
#include <iostream>
#include <string>

using namespace std;

int main(){

    string kalimat_input;

    // getline(cin, variabel) stdnya iostream
    cout << \"masukan kalimat : \";
    getline(cin, kalimat_input);
    cout << \"input anda : \" <<kalimat_input << endl;

    // jumlah kata dari input
    int posisi = 0;
    int jumlah = 0;

    while (true)
    {
        posisi = kalimat_input.find(\" \", posisi+1);
        jumlah++;
        if( posisi < 0 ){
            break;
        }
    }

    cout << \"jumlah kata : \" << jumlah << endl;

    cin.get();
    return 0;
}",
                'order_in_section' => 51
            ],
            [
                'section_id' => 11,
                'title' => 'Struct',
                'description' => "Struct (struktur) adalah kumpulan dari satu atau lebih variabel yang dapat memiliki tipe data yang berbeda, dikelompokkan bersama dalam satu unit. Dalam C++, struct adalah salah satu cara untuk membuat tipe data baru yang terdiri dari beberapa variabel dengan tipe data yang berbeda. Struktur digunakan untuk menggabungkan variabel-variabel terkait ke dalam satu entitas yang lebih besar, sehingga memungkinkan untuk merepresentasikan konsep yang lebih kompleks dalam program.",
                'code' =>
                "// struct adalah sebuah data yang dibentuk oleh beberapa data
// berguna jika memiliki tipe/jenis yang sama, seperti buah, mobil, siswa
#include <iostream>
#include <string>

using namespace std;

struct buah
{
    string warna;
    float berat;
    int harga;
    string rasa;
};


int main(){

    buah apel;
    buah jeruk;

    apel.warna = \"merah\";
    apel.berat = 250;
    apel.harga = 50000;
    apel.rasa = \"manis\";

    jeruk.warna = \"orange\";
    jeruk.berat = 150;
    jeruk.harga = 20000;
    jeruk.rasa = \"asem\";

    cout << \"apel\" << endl;
    cout << apel.warna << endl;
    cout << apel.berat << endl;
    cout << apel.warna << endl;
    cout << apel.berat << endl;

    cout << \"\n\njeruk\" << endl;
    cout << jeruk.warna << endl;
    cout << jeruk.berat << endl;
    cout << jeruk.warna << endl;
    cout << jeruk.berat << endl;

    cin.get();
    return 0;
}",
                'order_in_section' => 52
            ],
            [
                'section_id' => 11,
                'title' => 'Nesting Struct',
                'description' => "Nesting struct adalah praktik memasukkan satu struct ke dalam definisi struct lainnya. Ini memungkinkan untuk membuat struktur data yang lebih kompleks dengan tingkat kedalaman yang lebih tinggi. Dalam C++, Anda dapat menyusun struct dalam hierarki bertingkat sesuai kebutuhan.",
                'code' =>
                "// nesting struct
/*
    ke unggulan dari nesting struct
    struct A (tipe sendiri){
        string nama;
        int Nim;

        data struct b // jadi di dalam si A ada nesting/struct b
    }

    struct B {

    }


    misal :>
      struct FILM => - judul
                     - genre
                     - tahun
                     - aktor

      struct aktor => - nama
                      - tahun lahir
*/
#include <iostream>
#include <string>

using namespace std;

struct aktor{
    string nama;
    int tahun_lahir;
};

struct film{
    string judul;
    string genre;
    int tahun;
    //struct aktor
    aktor pemeran_1;
    aktor pemeran_2;
};

int main()
{
    aktor aktor1,aktor2;
    film film1,film2;

    // buat aktor 1
    aktor1.nama= \"Michael\";
    aktor1.tahun_lahir = 1992;

    // buat aktor 2
    aktor2.nama= \"sandra\";
    aktor2.tahun_lahir = 1995;

    // buat film
    film1.judul= \"hehehe\";
    film1.genre= \"documenter\";
    film1.tahun= 2018;
    film1.pemeran_1= aktor1;
    film1.pemeran_2= aktor2;

    cout << film1.judul << endl;
    // contoh cetak struct di dalam struct
    cout << film1.pemeran_1.nama << endl;
    cout << film1.pemeran_2.nama << endl;

    // buat film 2
    film2.judul= \"hahaha\";
    film2.genre= \"comedy\";
    film2.tahun= 2021;
    film2.pemeran_1= aktor1;

    cout << film2.judul << endl;
    cout << film2.pemeran_1.nama << endl;
    cout << film2.pemeran_2.nama << endl;

    cin.get();
    return 0;
}
",
                'order_in_section' => 53
            ],
            [
                'section_id' => 11,
                'title' => 'Unions',
                'description' => "Union adalah struktur data di C++ yang mirip dengan struct, tetapi hanya menyimpan satu nilai pada suatu waktu. Perbedaan utamanya adalah bahwa union mengalokasikan memori yang sama untuk semua anggotanya, sehingga menghemat ruang memori. Ini berarti jika Anda menetapkan nilai untuk salah satu anggota, nilai anggota lainnya akan terpengaruh.",
                'code' =>
                "/*
Sebuah data :>
- data 1 (int)    | 4 byte | address1 |
- data 2 (float)  | 8 byte | address2 |
- data 3 (double) | 9 byte | address3 |

Kalo pake Union :> akan mengalokasikan satu blok data yang akan di pakai berbagai macam tipe data, jadi kalo salah satu diubah semua juga berubah. bentuknya juga sama seperti struct
union memakai memory max dari tipe data di dalamnya
*/

#include <iostream>

using namespace std;

union nama
{
    int int_value;
    char char_value[4];

};


int main(){

    nama human;

    human.int_value = 123456;

    cout << \"data a: \" << human.int_value << endl;
    cout << \"data b: \" << human.char_value << endl;

    human.char_value[0] = 'a';
    human.char_value[1] = 'b';
    human.char_value[2] = 'c';
    human.char_value[3] = 'd';

    cout << \"data a: \" << human.int_value << endl;
    cout << \"data b: \" << human.char_value << endl;


    cin.get();
    return 0;
}",
                'order_in_section' => 54
            ],
            [
                'section_id' => 11,
                'title' => 'Enum',
                'description' => "Enum (enumeration) adalah tipe data yang digunakan untuk mendefinisikan kumpulan konstanta bernama yang dapat digunakan dalam program. Enum digunakan untuk memberikan nama kepada serangkaian nilai yang berhubungan secara logis. Ini membuat kode lebih mudah dibaca dan dipahami.",
                'code' =>
                "#include <iostream>

using  namespace std;

enum warna { // penempatan elemennya sesuai dengan index
    merah, putih, hitam, coklat = 5, kuning, biru
};

int main(){

    warna kain1, kain2, kain3, kain4, kain5, kain6;

    kain1 = merah;
    kain2 = putih;
    kain3 = hitam;
    kain4 = coklat;
    kain5 = kuning;
    kain6 = biru;

    if (kain2 == putih){
        cout << \"warna kain putih\" << endl;
    }

    cout << kain1 << kain2 << kain3 << kain4 << kain5 << kain6 << endl;

    cin.get();
    return 0;
}",
                'order_in_section' => 55
            ],
            [
                'section_id' => 11,
                'title' => 'Ternary Operator',
                'description' => "Ternary operator, juga dikenal sebagai operator kondisional, adalah operator yang mengambil tiga operand. Ini digunakan untuk menulis ekspresi kondisional dengan cara yang lebih ringkas daripada menggunakan struktur percabangan seperti if-else.",
                'code' =>
                "#include <iostream>
#include <string>

using namespace std;

int main(){

    // ternary operator = ?
    // untuk ngece kondisi
    //kondisi ? hasil1(true) : hasil2(false)

    int a,b;
    string hasil1, hasil2, output;

    hasil1 = \"victor\";
    hasil2 = \"david\";

    a = 5;

    cout << \"masukan angka? : \" ;
    cin >> b;

    output = ( a < b ) ? hasil1 : hasil2;

    // if (a < b){
    //     output = hasil1;
    // } else {
    //     output = hasil2;
    // }


    cout << output << endl;


    cin.get();
    return 0;
}",
                'order_in_section' => 56
            ],
            [
                'section_id' => 11,
                'title' => 'Comma',
                'description' => "Operator koma (,), dalam C++, digunakan untuk memisahkan ekspresi dan instruksi dalam satu baris kode. Operator ini mengevaluasi ekspresi pertama, kemudian ekspresi kedua, dan seterusnya, dan mengembalikan hasil dari ekspresi terakhir.

                Penggunaan utama operator koma adalah dalam deklarasi variabel dan dalam struktur percabangan dan perulangan. Ini juga digunakan dalam inisialisasi array dan dalam argumen fungsi.",
                'code' =>
                " /*
int a, b, c, d;
void fungsi(int a, int b);
int a[5] = {1,2,3,4,5};

yang dimaksud dengan comma operator tidak seperti di atas

ekspression adalah memanggil fungsi, dan akan dilakukan secara berurutan
(ekspression1, ekspression2)

*/

#include <iostream>
#include <string>

using namespace std;

void printData(int val){
    cout << \"nilai b : \" << val << endl;
}

int main()
{

    int a;
    int b;
    int c;


   // tanpa menggunakan comma operator
   //  b = 1;
   //  c = 2;
   //  a = (b+c);

   // comma operator [keren]
   cout << \"\ncomma operator\" << endl;
    a = (b = 1 , printData(b) , c = 2 , cout << \"nilai c : \" << c << endl , (b+c) );

    cout << \"nilai a : \" << a << endl;

    cin.get();
    return 0;
}",
                'order_in_section' => 57
            ],
            [
                'section_id' => 11,
                'title' => 'Bitwise',
                'description' => "Operator bitwise adalah operator yang bekerja pada level bit dari operand-operandnya.",
                'code' =>
                "/*
cout << bitset <8>(a) << endl;
  logika digital : 1 = 2
                   0 = tidak dihitung

  contoh operasi : bitset <8>[maksudnya terdiri dari 8 angka](a)[a=5]
  pangkat  :> 7 6 5 4 3 2 1 0
  angkaBit :> 0 0 0 0 0 1 0 1 = 2**0 + 2**2
                              = 5
*/

// operator bitwise
/*
|  &   AND Bitwise AND
|  |   OR  Bitwise inclusive OR
|  ^   XOR Bitwise exclusive OR
|  ~   NOT
|  <<  SHL Shift bits left
|  >>  SHR Shift bits right
*/
#include <iostream>
#include <bitset>
#include <string>

using namespace std;

void printBinary(unsigned short val, string nama){
cout << nama << \" = \" << bitset<8>(val) << endl;
};

int main(){

unsigned short a = 6;
unsigned short b = 10;
unsigned short c;

cout << \"& = Bitwise AND [c = a & b;]\" << endl;
c = a & b;
printBinary(a,\"a\");
printBinary(b,\"b\");
printBinary(c,\"c\");
cout << \"kalo ditelusuri seperti tabel AND\ncout dari c akan menghasilkan angka dari operasi biner, c = a & b\" << endl;
cout << c << endl;

cout << \"\n| = Bitwise OR [c = a | b;]\" << endl;
c = a | b;
printBinary(a,\"a\");
printBinary(b,\"b\");
printBinary(c,\"c\");
cout << \"kalo ditelusuri seperti tabel OR\ncout dari c akan menghasilkan angka dari operasi biner, c = a | b\" << endl;
cout << c << endl;

cout << \"\n^ = Bitwise XOR [c = a ^ b;]\" << endl;

c = a ^ b;
printBinary(a,\"a\");
printBinary(b,\"b\");
printBinary(c,\"c\");
cout << \"kalo ditelusuri seperti tabel XOR\ncout dari c akan menghasilkan angka dari operasi biner, c = a ^ b\" << endl;
cout << c << endl;

cout << \"\n~ = Bitwise NOT [c = a ~ b;]\" << endl;
c = ~a ;
printBinary(a,\"a\");
printBinary(c,\"c\");
cout << \"kalo ditelusuri seperti kebalikannya\ncout dari c akan menghasilkan angka dari operasi biner, c = ~a\" << endl;
cout << c << endl;

cout << \"\n<< = Bitwise SHL [c = a << b;]\" << endl;
c = a << 2;
printBinary(a,\"a\");
printBinary(c,\"c\");
cout << \"1 geser ke kiri 1\ncout dari c akan menghasilkan angka dari operasi biner, c = a << 1\" << endl;
cout << c << endl;

cout << \"\n>> = Bitwise SHR [c = a >> b;]\" << endl;
c = a >> 1;
printBinary(a,\"a\");
printBinary(c,\"c\");
cout << \"1 geser ke kanan 2\ncout dari c akan menghasilkan angka dari operasi biner, c = a >> b\" << endl;
cout << c << endl;

cin.get();
return 0;
}",
                'order_in_section' => 58
            ],
            [
                'section_id' => 11,
                'title' => 'Casting Operator',
                'description' => "Dalam C++, operator casting digunakan untuk mengubah tipe data satu ke tipe data yang lain.",
                'code' =>
                "// casting operator merubah data

#include <iostream>
using namespace std;
int main(){

    int a = 5;
    float b = 6.67f;
    char c = 'd';

    int hasil;
    hasil = a+(int)b; // (int)b => ini yang dinamakan casting
    cout << \"hasilnya int/float sesuai tipe dari hasil : \" << hasil << endl;

    cout << \"ini hasilnya decimal/float : \" << a + b << endl; // 11.67 karena implicit casting, karena dibelakang layar merubah

    cout << (int)c << endl;
    cout << c + a << endl; // hasilnya 105, karena 'd' ada nilainya
    cout << (char)(c + a) << endl; // jadinya i karena jaraknya 5 character

    cin.get();
    return 0;
}
",
                'order_in_section' => 59
            ],
            [
                'section_id' => 11,
                'title' => 'Ofstream',
                'description' => "ofstream adalah kelas yang digunakan untuk menulis ke file teks dalam C++. Ini merupakan bagian dari C++ Standard Library dan merupakan bagian dari hierarki kelas yang disebut dengan IOStreams (Input/Output Streams).",
                'code' =>
                "/*
Buat file data1.txt
Buat file data2.txt
Buat file data3.txt
*/
#include <iostream>
#include <fstream> // stream ke file ekstermal
// ofstream => output file
// ifstream => input file

using namespace std;

int main()
{

    // menggunakan ofstream
    ofstream myFile;

    // ios::out   = operasi output, jadi akan menuliskan output [otomatisan dari ofstream]
    // ios::app   = menuliskan pada akhir baris;
    // ios::trunc = membuat file jika tidak ada, dan kalau ada akan dihapus serta dibuat baru [defaul dari ofstream]


    int a = 1234;
    myFile.open(\"data1.txt\", ios::out);
    myFile << \"\npenulisan pada data1\n\"; // save data di eksFile
    myFile << a;
    cout << \"console\";
    myFile.close();

    myFile.open(\"data2.txt\", ios::trunc);
    myFile << \"\npenulisan pada data2\"; // save data di eksFile
    cout << \"console\";
    myFile.close();

    myFile.open(\"data3.txt\", ios::app); // append menggabungkan dengan yang lama
    myFile << \"\npenulisan pada data3\";
    myFile.close();

    cin.get();
    return 0;
}
",
                'order_in_section' => 60
            ],
            [
                'section_id' => 11,
                'title' => 'Ifstream',
                'description' => "ifstream adalah kelas yang digunakan untuk membaca dari file teks dalam C++. Ini merupakan bagian dari C++ Standard Library dan merupakan bagian dari hierarki kelas yang disebut dengan IOStreams (Input/Output Streams).",
                'code' =>
                "// buat file data.txt

#include <iostream>
#include <fstream>
#include <string>

using namespace std;

int main(int argc, char const *argv[])
{
    ifstream myFile;
    string output, buffer, nama;
    bool isData = false;
    int no;

    // ios::in  [default]
    // ios::ate [mulai dari akhir file]
    // ios:: binary = membuat file binary
    myFile.open(\"data.txt\");

    // jadi repot kalo pake cara ini :
    // myFile >> data; // >> ambil taruh simpen di data
    // myFile >> data; // yang di ambil setelahnya


    while (!isData)
    {
        getline(myFile, buffer); // ambil per enter
        output.append(\"\n\" + buffer);
        if(buffer == \"data\"){
            isData = true;
        }
    }

    cout << output << endl;

    getline(myFile, buffer); // no nama
    cout << buffer << endl;

    int jumlah_data = 0;
    while (!myFile.eof()) // end of file
    {
        myFile >> no;
        myFile >> nama;

        cout << no << \"   \" << nama << endl;
        jumlah_data++;
    }
    cout << \"jumlah data = \" << jumlah_data << endl;


    cin.get();
    return 0;
}",
                'order_in_section' => 61
            ],
            [
                'section_id' => 11,
                'title' => 'Menulis Binary File ',
                'description' => "Untuk menulis data dalam bentuk biner ke file dalam C++, Anda dapat menggunakan objek ofstream dan metode write() yang disediakan oleh C++ Standard Library. ",
                'code' =>
                "#include <iostream>
#include <fstream>
#include <string>

using namespace std;

int main()
{
    fstream myFile;
    int number = 125;
    myFile.open(\"data.bin\", ios::out | ios::binary);

    myFile.write(reinterpret_cast<char*>(&number),sizeof(number));

    myFile.close();

    cin.get();
    return 0;
}
",
                'order_in_section' => 62
            ],
            [
                'section_id' => 11,
                'title' => 'Membaca Binary File',
                'description' => "Untuk membaca data dari file dalam format biner dalam C++, Anda dapat menggunakan objek ifstream dan metode read() yang disediakan oleh C++ Standard Library.",
                'code' =>
                "#include <iostream>
#include <fstream>
#include <string>

using namespace std;

int main()
{
    fstream myFile;
    int hasil;
    myFile.open(\"data.bin\", ios::in | ios::binary);

    myFile.read(reinterpret_cast<char*>(&hasil),sizeof(hasil));

    cout << \"besar integer = \" << sizeof(hasil) << endl;
    cout << \"integer = \" << hasil << endl;

    cin.get();
    return 0;
}
// fstream myFile;
//     int number = 125;
//     myFile.open(\"data.bin\", ios::out | ios::binary);

//     myFile.write(reinterpret_cast<char*>(&number),sizeof(number));

//     myFile.close();",
                'order_in_section' => 63
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
