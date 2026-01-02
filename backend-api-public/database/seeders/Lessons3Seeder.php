<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Lessons3Seeder extends Seeder
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
                'section_id' => 12,
                'title' => 'Tipe Data',
                'description' => "Di Python, terdapat beberapa tipe data dasar, seperti integer (bilangan bulat), float (bilangan pecahan), string (teks), boolean (nilai True atau False), dan tipe data koleksi seperti list, tuple, dan dictionary. Setiap tipe data memiliki perilaku dan operasi yang berbeda. Python juga mendukung tipe data majemuk seperti set dan frozenset. Pengguna juga dapat mendefinisikan tipe data kustom menggunakan kelas. Ini memungkinkan Python menjadi bahasa yang sangat fleksibel untuk berbagai keperluan pemrograman.",
                'code' =>
                "# a = 10,  a adalah variabel dengan nilai 10

# tipe data: Angka satuan yang gk ada komanya (integer)
data_integer = 1
print(\"data : \", data_integer)
print(\"bertipe : \", type(data_integer))

# tipe data: angka dengan koma(float)
data_float = 1.5
print(\"data : \", data_float)
print(\"bertipe : \", type(data_float))

# tipe data: kumpulan karakter (string)
data_string = \"kumpulan huruf\"
print(\"data : \", data_string)
print(\"bertipe : \", type(data_string))

# tipe data: biner true/false
data_bool = True
print(\"data : \", data_bool)
print(\"bertipe : \", type(data_bool))

# tipe data: biner true/false
data_bool = True
print(\"data : \", data_bool)
print(\"bertipe : \", type(data_bool))

## tipe data khusus

# bilangan kompleks
data_kompleks = complex(5,6)
print(\"data :\", data_kompleks)
print(\"- bertipe : \", type(data_kompleks))

# tipe dara dari bahasa C
from ctypes import c_double
data_c_double = c_double(10.5)
print(\"data :\", data_c_double)
print(\"- bertipe : \", type(data_c_double))",
                'order_in_section' => 1
            ],
            [
                'section_id' => 12,
                'title' => 'Casting Tipe Data',
                'description' => "Casting adalah proses mengubah tipe data satu ke tipe data lainnya. Dalam Python, Anda dapat menggunakan fungsi bawaan seperti int(), float(), str(), bool(), dll., untuk melakukan casting. Misalnya, int(3.14) akan mengubah float 3.14 menjadi integer 3. Anda juga dapat menggunakan konstruktor kelas seperti list(), tuple(), dict(), dan sebagainya untuk casting ke tipe data koleksi lainnya. Penting untuk memperhatikan bahwa tidak semua konversi tipe data dapat dilakukan, tergantung pada jenis data yang Anda kerjakan.",
                'code' =>
                "# casting
# merubah dari satu tipe ke tipe lain
# tipe data = int, float, str, bool

## INTEGER
print(\"==========INTEGER==========\")
data_int = 9
print(\"data =\", data_int,\"type =\", type(data_int))

data_float = float(data_int)
print(\"data =\", data_float,\"type =\", type(data_float))
data_str = str(data_int)
print(\"data =\", data_str,\"type =\", type(data_str))
data_bool = bool(data_int)
print(\"data =\", data_bool,\"type =\", type(data_bool))

## FLOAT
print(\"==========FLOAT==========\")
data_float = 9.5
print(\"data =\", data_float,\"type =\", type(data_float))

data_int = int(data_float) # akan dibulatkan ke bawah
print(\"data =\", data_int,\"type =\", type(data_int))
data_str = str(data_float)
print(\"data =\", data_str,\"type =\", type(data_str))
data_bool = bool(data_float)
print(\"data =\", data_bool,\"type =\", type(data_bool))

## BOOLEAN
print(\"==========BOOLEAN==========\")
data_bool = True
print(\"data =\", data_bool,\"type =\", type(data_bool))

data_int = int(data_bool) # akan dibulatkan ke bawah
print(\"data =\", data_int,\"type =\", type(data_int))
data_str = str(data_bool)
print(\"data =\", data_str,\"type =\", type(data_str))
data_float  = float(data_bool)
print(\"data =\", data_float,\"type =\", type(data_float))

## STRING
print(\"==========STRING==========\")
data_str = \"Silahkan diganti\"
print(\"data =\", data_str,\"type =\", type(data_str))

data_int = int(data_str) # string harus angka
print(\"data =\", data_int,\"type =\", type(data_int))
data_bool = bool(data_str) # string harus angka
print(\"data =\", data_bool,\"type =\", type(data_bool))
data_float  = float(data_str) # false jika string kosong
print(\"data =\", data_float,\"type =\", type(data_float))",
                'order_in_section' => 2
            ],
            [
                'section_id' => 12,
                'title' => 'Input Data',
                'description' => "Fungsi input() digunakan untuk menerima masukan dari pengguna melalui keyboard saat program sedang berjalan. Ketika input() dieksekusi, program akan berhenti dan menunggu masukan dari pengguna. Setelah pengguna menekan tombol \"Enter\", masukan tersebut dikembalikan sebagai string. Pengguna kemudian dapat menggunakan data ini untuk melakukan operasi lebih lanjut, seperti menyimpannya dalam variabel atau melakukan konversi tipe data sesuai kebutuhan.",
                'code' =>
                "# INPUT

# # data yang dimasukan pasti string
# data = input(\"Masukan data: \")
# print(\"data =\", data, \"type =\", type(data))

# # jika kita ingin mengambil int, maka
# data_int = int(input(\"masukan angka:\"))
# print(\"data =\", data_int, \"type =\", type(data_int))

# bagaimana dengan boolean
data_boolean = bool(int(input(\"masukan nilai boolean: \")))
print(\"data =\", data_boolean, \"type =\", type(data_boolean))",
                'order_in_section' => 3
            ],
            [
                'section_id' => 12,
                'title' => 'Operasi Aritmatika 1',
                'description' => "Operasi aritmatika dalam Python mencakup penjumlahan (+), pengurangan (-), perkalian (*), pembagian (/), pembagian bulat (//), sisa pembagian (%), dan pemangkatan (**). Operasi ini dapat dilakukan pada bilangan bulat, pecahan, atau gabungan keduanya. Python juga mendukung operator penugasan gabungan seperti +=, -=, *=, /=, dan sebagainya untuk operasi aritmatika yang sederhana. Misalnya, a += 5 akan menambahkan 5 pada nilai variabel a. Operasi aritmatika ini memungkinkan Python untuk melakukan perhitungan matematika dengan fleksibilitas.",
                'code' =>
                "a = 10
b = 3

# Tambah
hasil = a + b
print(a, '+' ,b, \"=\", hasil)

# Minus
hasil = a - b
print(a, '-' ,b, \"=\", hasil)

# kali
hasil = a * b
print(a, 'x' ,b, \"=\", hasil)

# pembagian
hasil = a / b
print(a, ':' ,b, \"=\", hasil)

# eksponen (pangkat) **
hasil = a ** b
print(a, '**' ,b, \"=\", hasil)

# modulus (sisa pembagian)
hasil = a % b
print(a, 'sisa bagi' ,b, \"=\", hasil)

# floor division (dibulatkan ke bawah)
hasil = a // b
print(a, 'floor' ,b, \"=\", hasil)

# prioritas operasi, operational precedence

'''
    1. ()
    2. exponen
    3. perkalian dan teman-teman * / ** % //
    4. pertambahan dan pengurangan
'''

x = 3
y = 2
z = 4

hasil = x ** y * z + x / y - y % z // x
print(x,'**',y,'*',z,'+',x,'/',y,'-',y,'%',z,'//',x,'=', hasil)

hasil = (x + y) * z
print (hasil)",
                'order_in_section' => 4
            ],
            [
                'section_id' => 12,
                'title' => 'Operasi Aritmatika 2',
                'description' => "Operasi aritmatika dalam Python mencakup penjumlahan (+), pengurangan (-), perkalian (*), pembagian (/), pembagian bulat (//), sisa pembagian (%), dan pemangkatan (**). Operasi ini dapat dilakukan pada bilangan bulat, pecahan, atau gabungan keduanya. Python juga mendukung operator penugasan gabungan seperti +=, -=, *=, /=, dan sebagainya untuk operasi aritmatika yang sederhana. Misalnya, a += 5 akan menambahkan 5 pada nilai variabel a. Operasi aritmatika ini memungkinkan Python untuk melakukan perhitungan matematika dengan fleksibilitas.",
                'code' =>
                "# latihan

# program konversi celcius ke satuan lain

print(\"\nPROGRAM KONVERSI TEMPERATUR\")

celcius = float(input('masukan suhu dalam celcius : '))
print(\"suhu adalah\", celcius, \"Celcius\")

# reamur
reamur = 0.2 * celcius
print(\"suhu dalam reamur adalah\", celcius, \"Reamur\")

# fahrenheit
fahrenheit = ((9/5) * celcius) + 32
print(\"suhu dalam fahrenheit adalah\", fahrenheit, \"Fahrenheit\")

# kelvin
kelvin = celcius + 273
print(\"suhu dalam kelvin adalah\", kelvin, \"kelvin\")",
                'order_in_section' => 5
            ],
            [
                'section_id' => 12,
                'title' => 'Operasi Komparasi',
                'description' => "Operasi komparasi dalam Python memungkinkan Anda untuk membandingkan dua nilai dan menghasilkan nilai kebenaran (True atau False) berdasarkan hasil perbandingan.",
                'code' =>
                "# operasi komparasi

# setiap hasil dari operasi komparasi adalah boolean

# >, <, >=, <=, ==, !=, is, is not

a = 4
b = 2

# lebih besar dari >
print(\"===lebih besar dari===\")
hasil = a > 3
print(a,'>',3,'=',hasil)
hasil = b > 3
print(b,'>',3,'=',hasil)

# kurang dari >
print(\"===kurang dari===\")
hasil = a < 3
print(a,'<',3,'=',hasil)
hasil = b < 3
print(b,'<',3,'=',hasil)

# lebih dari samadengan >
print(\"===lebih dari samadengan===\")
hasil = a >= 3
print(a,'>=',3,'=',hasil)
hasil = b >= 2
print(b,'>=',2,'=',hasil)

# kurang dari samadengan >
print(\"===kurang dari samadengan===\")
hasil = a <= 3
print(a,'<=',3,'=',hasil)
hasil = b <= 2
print(b,'<=',2,'=',hasil)

# samadengan >
print(\"===samadengan===\")
hasil = a == 3
print(a,'==',3,'=',hasil)
hasil = b == 2
print(b,'==',2,'=',hasil)

# tidaksamadengan >
print(\"===tidaksamadengan===\")
hasil = a != 3
print(a,'!=',3,'=',hasil)
hasil = b != 2
print(b,'!=',2,'=',hasil)

# operator is membandingkan object
# 'is' sebagai komparasi object identity
print(\"===is===\")
x = 5
y = 5
hasil = x is y
print('nilai x =', x, ',id = ',hex(id(x)))
print('nilai y =', y, ',id = ',hex(id(y)))
print('x is y =',hasil)

x = 5
y = 6
hasil = x is y
print('nilai x =', x, ',id = ',hex(id(x)))
print('nilai y =', y, ',id = ',hex(id(y)))
print('x is y =',hasil)

# operator isnot membandingkan object
print(\"===is not===\")
x = 5
y = 5
hasil = x is not y
print('nilai x =', x, ',id = ',hex(id(x)))
print('nilai y =', y, ',id = ',hex(id(y)))
print('x is y =',hasil)

x = 5
y = 6
hasil = x is not y
print('nilai x =', x, ',id = ',hex(id(x)))
print('nilai y =', y, ',id = ',hex(id(y)))
print('x is y =',hasil)",
                'order_in_section' => 6
            ],
            [
                'section_id' => 12,
                'title' => 'Operasi Logika',
                'description' => "Operasi logika dalam Python digunakan untuk mengevaluasi ekspresi logika dan menghasilkan nilai kebenaran (True
                or: Mengembalikan True jika salah satu dari dua ekspresi bernilai True.not: Membalik nilai dari ekspresi menjadi kebalikannya.
                Misalnya, True and False akan menghasilkan False, True or False akan menghasilkan True, dan not True akan menghasilkan False. Operator logika ini sangat berguna untuk pengontrol aliran program, pembuatan keputusan, dan kondisi kompleks dalam pemrograman.",
                'code' =>
                "# operasi logika atau boolean

# not, or, and, xor

# NOT
print('===NOT===')
a = False
c = not a

print('data a =', a)
print('---- Not')
print('data c =', c)

# OR (jika salah satu true maka hasilnya TRUE)
print('===OR===')

a = False
b = False
c = a or b
print(a, 'OR', b, '=', c)
a = False
b = True
c = a or b
print(a, 'OR', b, ' =', c)
a = True
b = False
c = a or b
print(a, ' OR', b, '=', c)
a = True
b = True
c = a or b
print(a, ' OR', b, ' =', c)

# AND (jika salah satu false maka hasilnya FALSE)
print('===AND===')

a = False
b = False
c = a and b
print(a, 'and', b, '=', c)
a = False
b = True
c = a and b
print(a, 'and', b, ' =', c)
a = True
b = False
c = a and b
print(a, ' and', b, '=', c)
a = True
b = True
c = a and b
print(a, ' and', b, ' =', c)

# XOR ^ (jika salah satu true maka hasilnya TRUE, sisanya FALSE)
print('===XOR===')

a = False
b = False
c = a ^ b
print(a, 'XOR', b, '=', c)
a = False
b = True
c = a ^ b
print(a, 'XOR', b, ' =', c)
a = True
b = False
c = a ^ b
print(a, ' XOR', b, '=', c)
a = True
b = True
c = a ^ b
print(a, ' XOR', b, ' =', c)",
                'order_in_section' => 7
            ],
            [
                'section_id' => 12,
                'title' => 'Latihan Logika dan Komparasi',
                'description' => "Berikut penjelasannya:",
                'code' =>
                "# episode latihan logika dan komparasi

# membuat gabungan area rentang dari angka

# # ++++3-----3+++++

# inputUser = float(input(\"masukan angka yang bernilai\nkurang dari 3 \natau \nlebih besar dari 10\n :\"))

# # memeriksa angka kurang dari 3
# isKurangDari= (inputUser < 3)
# print('Kurang dari 3 =',isKurangDari)

# # memeriksa angka lebih dari 10
# isLebihDari= (inputUser > 10)
# print('Lebih dari 10 =',isLebihDari)

# # Gabungkan
# isCorrect = isKurangDari or isLebihDari
# print('angka yang anda masukan: ', isCorrect)



# # -----3++++++10------
# # kasus irisan
# print(\"\n\",10*\"=\",\"\n\")

# inputUser = float(input(\"masukan angka yang bernilai\nlebih dari 3 \ndan \nkurang dari 10\n :\"))

# # ----------3+++++++++++++++
# # lebih dari 3
# isLebihDari = inputUser > 3
# print(\"Lebih dari 3=\", isLebihDari)

# # ++++++++++++++++10--------
# isKurangDari = inputUser < 10
# print(\"Kurang dari 10 =\", isKurangDari)

# # Gaabungkan
# isCorrect = isKurangDari and isLebihDari
# print('angka yang anda masukan: ', isCorrect)


# PR alhamdulillah bisa
# print(\"\n\",10*\"=\",\"\n\")
# inputUser = float(input(\"masukan angka yang bernilai\nlebih dari 0 \n\tatau \nkurang dari 5\n\tdan\nlebih dari 8\n\tatau\nkurang dari 11:\"))

# isLebihDari0 = inputUser > 0
# isKurangDari5 = inputUser < 5
# isLebihDari8 = inputUser > 8
# isKurangDari11 = inputUser < 11
# isCorrect1 = isLebihDari0 and isKurangDari5
# isCorrect2 = isLebihDari8 and isKurangDari11
# isCorrect = isCorrect1 or isCorrect2
# print(\"angka yang anda masukan\", inputUser,\"adalah :\",isCorrect)

print(\"\n\", 10*\"=\",\"\n\")

inputUser = float(input(\"masukan angka yang bernilai\nkurang dari 0\n\tatau \nlebih dari 5\n\tdan\nkurang dari 8\n\tatau\nlebih dari 11:\"))

isKurangDari0 = inputUser < 0
isLebihDari5 = inputUser > 5
isKurangDari8 = inputUser < 8
isLebihDari11 = inputUser > 11
isCorrect1 = isKurangDari0 or isLebihDari5
isCorrect2 = isKurangDari8 or isLebihDari11
isCorrect = isCorrect1 and isCorrect2
print(\"angka yang anda masukan: \",inputUser,\" adalah : \",isCorrect)",
                'order_in_section' => 8
            ],
            [
                'section_id' => 12,
                'title' => 'Operator Bitwise',
                'description' => "Operator bitwise digunakan untuk melakukan operasi pada level bit dalam representasi biner dari nilai-nilai.",
                'code' =>
                "# operator Bitwise, operator biner
# bitwise -> Operasi masing-masing bit

a = 9
b = 5

# bitwise OR (|)
c = a | b
print('\n=====OR=====')
print('nilai :', a,', binary :', format(a,'08b'))
print('nilai :', b,', binary :', format(b,'08b'))
print('------------(|)')
print('nilai :', c,', binary :', format(c,'08b'))

# bitwise AND (&)
c = a & b
print('\n=====AND=====')
print('nilai :', a,', binary :', format(a,'08b'))
print('nilai :', b,', binary :', format(b,'08b'))
print('------------(&)')
print('nilai :', c,', binary :', format(c,'08b'))

# bitwise XOR (^)
c = a ^ b
print('\n=====XOR=====')
print('nilai :', a,', binary :', format(a,'08b'))
print('nilai :', b,', binary :', format(b,'08b'))
print('------------(^)')
print('nilai :', c,', binary :', format(c,'08b'))

# bitwise NOT (~)
c = ~a
print('\n=====NOT=====')
print('nilai :', a,', binary :', format(a,'08b'))
print('------------(~)')
print('nilai :', c,', binary :', format(c,'08b'))
print('------------(^)')
d = 0b0000001001
e = 0b1111111111
print('nilai :',e^d,', binary :', format(e^d,'08b'))

# shifting

# shift Right (>>)

c = a >> 1 # silahkan dicoba
print('\n=====Shift Right >> =====')
print('nilai :', a,', binary :', format(a,'08b'))
print('------------(>>)')
print('nilai :', c,', binary :', format(c,'08b'))

# shift Left (<<)

c = a << 1 # silahkan dicoba
print('\n=====Shift Left << =====')
print('nilai :', a,', binary :', format(a,'08b'))
print('------------(<<)')
print('nilai :', c,', binary :', format(c,'08b'))",
                'order_in_section' => 9
            ],
            [
                'section_id' => 12,
                'title' => 'Operator Assigment',
                'description' => "Operator assignment digunakan untuk memberikan nilai pada variabel. Operator ini menggabungkan tanda sama dengan (=) dengan operator aritmatika, logika, atau bitwise lainnya.",
                'code' =>
                "# operasi yang dapat dilakukan dengan penyingkatan
# operasi ditambah dengan assigment

a = 5 # adalah assigment
print(\"nilai a=\", a)

a += 1 # artinya adalah a = a + 1
print(\"nilai a+= 1, nilai a menjadi\", a)

a -= 2 # artinya adalah a = a - 2
print(\"nilai a -= 2, nilai a menjadi\", a)

a *= 5 # artinya adalah a = a * 5
print(\"nilai a *= 5, nilai a menjadi\", a)

a /= 2 # artinya adalah a = a / 2
print(\"nilai a /= 2, nilai a menjadi\", a)

b = 10
print(\"\nnilai b =\", b)

b %= 3
print(\"nilai b %= 3, nilai b menjadi\", b)

b = 10
print(\"\nnilai b =\", b)

b //= 3
print(\"nilai b //= 3, nilai b menjadi\", b)

a = 5
print(\"nilai a=\", a)

a **= 3
print(\"nilai a **= 3, nilai a menjadi\", a)

# operasi bitwise
# OR
c = True
print(\"\nnilai c =\", c)
c |= False
print(\"nilai c |= False, nilai c menjadi\", c)

c = False
print(\"\nnilai c =\", c)
c |= False
print(\"nilai c |= False, nilai c menjadi\", c)

# AND
c = True
print(\"\nnilai c =\", c)
c &= False
print(\"nilai c &= False, nilai c menjadi\", c)

c = True
print(\"\nnilai c =\", c)
c &= True
print(\"nilai c &= True, nilai c menjadi\", c)

# XOR
c = True
print(\"\nnilai c =\", c)
c ^= False
print(\"nilai c ^= False, nilai c menjadi\", c)

c = True
print(\"\nnilai c =\", c)
c ^= True
print(\"nilai c ^= True, nilai c menjadi\", c)

# geser geser
d = 0b0100
print(\"\nnilai d =\", format(d,'04b'))
d >>= 2
print(\"nilai d >>= 2, nilai d menjadi\",format(d,'04b'))
d <<= 1
print(\"nilai d >>= 2, nilai d menjadi\",format(d,'04b'))",
                'order_in_section' => 10
            ],
            [
                'section_id' => 12,
                'title' => 'String',
                'description' => "String adalah tipe data yang digunakan untuk merepresentasikan teks dalam Python. String dapat dibuat dengan menggunakan tanda kutip tunggal (' '), ganda (\" \"), atau triple (''' ''' atau \"\"\" \"\"\"). Contoh string: \"Hello, world!\". String dianggap sebagai urutan karakter dan dapat diakses menggunakan indeks. Python menyediakan berbagai metode bawaan untuk memanipulasi string, seperti mengubah ukuran huruf, memotong, menggabungkan, memisahkan, dan banyak lagi.",
                'code' =>
                "data = \"ini adalah string\"
print(data)
print(type(data))

# 1. cara membuat string

'''
    1. dengan menggunakan single quote '...'
    1. dengan menggunakan double quote \"...\"
'''

data = 'menggunakan single quote'
print(data)

data = \"menggunakan double quote\"
print(data)

print('\"Halo, apa kabar?\"')
print(\"'Halo, apa kabar?'\")
print(\"ini adalah hari jum'at\")

# 2. Menggunakan tanda \

# membuat tanda ' menjadi string
print('mari shalat jum\'at')
print('g\'day, isn\'t it?')

# backslah
print(\"C:\\user\\Ilham\")

# tab
print(\"Rahmat\tAkbar\")

# backspace
print(\"Rahmat\\bAkbar\")

# newline (enter)
print(\"baris pertama.\nbaris kedua.\") # LF => line feed -> unix, macos, linux
print(\"baris pertama.\rbaris kedua.\") # CR => carriage return -> commodore, acorn
print(\"baris pertama.\r\nbaris ketiga\") # CRLF => line feed carriage return ->dipakai windows

# 3. String literal atau raw

# hati-hati
print('C:\new folder') # akan salah pathnya

# menggunakan raw string
print(r'C:\new folder')

# multiline literal string
print(\"\"\"
Nama : niam
Kelas : semester 7
\"\"\")

# multiline literal string dan RAW
print(r\"\"\"
Nama : hasniam
Kelas  : semester 7
OK OK
\"\"\")

",
                'order_in_section' => 11
            ],
            [
                'section_id' => 12,
                'title' => 'Operasi dan Manipulasi String Part 1',
                'description' => "Operasi dan manipulasi string adalah proses memanipulasi nilai-nilai string dalam Python. Berikut penjelasannya:",
                'code' =>
                "# operasi dan memanipulasi string

# 1. menyambung string (concatenate)

nama_pertama = \"Ilham\"
nama_tengah = \"Rahmat\"
nama_akhir = \"Akbar\"

nama_lengkap = nama_pertama +\" \"+ nama_tengah +\" \"+ nama_akhir
print(nama_lengkap)


# 2. menghitung panjang string
panjang = len(nama_lengkap)
print(\"panjang dari \" + nama_lengkap + \" = \" + str(panjang))

# 3. operator untuk string

# mengecek apakah ada komponen char atau string di string

d = \"R\"
status = d in nama_lengkap
print(d + \" ada di \" + nama_lengkap +\" = \"+ str(status))

e = \"r\"
status = e in nama_lengkap
print(e + \" ada di \" + nama_lengkap +\" = \"+ str(status))

d = \"R\"
status = d not in nama_lengkap
print(d + \" ada di \" + nama_lengkap +\" = \"+ str(status))

e = \"r\"
status = e in nama_lengkap
print(e + \" ada di \" + nama_lengkap +\" = \"+ str(status))

# mengulang string
print(\"wk\"*10)
print(10*\"wk\")

# indexing
print(\"index ke-0 : \" + nama_lengkap[2])
print(\"index ke(-2) : \" + nama_lengkap[-2])
print(\"index ke-[0:3] : \" + nama_lengkap[0:3])
print(\"index ke-[0,2,4,6,8,10] : \" + nama_lengkap[0:10:2]) # ambil sampe 10 diloncatin 2

# item paling kecil
print(\"paling kecil : \" + min(nama_lengkap))

# item paling besar
print(\"paling besar : \" + max(nama_lengkap))

ascii_code = ord(\" \")
print(\"ASCII code untuk spasi adalah \" + str(ascii_code))
data = 117
print(\"char untuk ASCII 117 adalah \" + chr(data))

# 4. operator dalam bentuk method

data =  \"otong surotong pararotong\"
jumlah = data.count(\"o\")
print(\"jumlah o pada \" + data + \" = \" + str(jumlah))",
                'order_in_section' => 12
            ],
            [
                'section_id' => 12,
                'title' => 'Operasi dan Manipulasi String Part 2',
                'description' => "Berikut penjelasannya:",
                'code' =>
                "# operator dalam bentuk method

## merubah case dari string

# merubah semua ke upper case

salam = \"bro!\"
print(\"normal = \" + salam)
salam = salam.upper()
print(\"upper = \" + salam)

# merubah semua ke lower case
alay = \" aKu KeCe AbiezZzZ\"
print(\"normal = \" + alay)
alay = alay.lower()
print(\"lower = \" + alay)

## pengecekan dengan isX method

# contoh pengecekan lower case
salam = \"sist\"
apakah_lower = salam.islower() # hasilnya bool
print(salam + \" is lower = \" + str(apakah_lower))
apakah_upper = salam.isupper() # hasilnya bool
print(salam + \" is upper = \" + str(apakah_upper))

# isalpha() <-- untuk mengecek semuanya huruf
# isalnum() <-- huruf dan angka
# isdecimal() <-- angka
# isspace() <-- spasi, tab, newline \n
# istitle() <-- semua kata dimulai dengan huruf besar

# contoh : istitle
judul = \"It is Okay Not To Be Orkay\"
cek_judul = judul.istitle() # hasil bool
print(judul + \" is title = \" + str(cek_judul))

## ngecek komponen startswith() endswith <-- keren (case sensitive)
cek_start = \"Kestum Lemtum\".startswith(\"Kestum\")
print(\"start = \" + str(cek_start))

cek_end = \"Kestum Lemtum\".endswith(\"Lemtum\")
print(\"end = \" + str(cek_end))

## penggabungan komponen join() split()
pisah = ['aku', 'sayang', 'kamu']
gabung = ','.join(pisah)
print(pisah)
print(gabung)

gabung = ' '.join(pisah)
print(gabung)

gabung = ' ehm '.join(pisah)
print(gabung)

gabung = \"akuehmsayangehmkamu\"
print(gabung.split('ehm')) # split menjadi array lagi / list

print(5*\"=\" + \"data\" + \"=\"*5)

## alokasi karakter rjust(), ljust(), center
kanan = \"kanan\".rjust(10)
print(\"'\"+ kanan + \"'\")
kiri = \"kiri\".ljust(10)
print(\"'\"+ kiri + \"'\")
tengah = \"tengah\".center(20)
print(\"'\"+ tengah + \"'\")
tengah = \"tengah\".center(20,\"-\")
print(\"'\"+ tengah + \"'\")

# kebalikannya -> strip()
tengah = tengah.strip(\"-\") # menghilangkan tanda -
print(\"'\"+tengah+\"'\")


",
                'order_in_section' => 13
            ],
            [
                'section_id' => 12,
                'title' => 'Format String',
                'description' => "Format string adalah teknik dalam Python untuk memasukkan nilai variabel atau ekspresi ke dalam string. Ada beberapa cara untuk melakukan format string:",
                'code' =>
                "# format string


# contoh generic
# string

from typing import BinaryIO


nama = \"marlene\"
format_str = f\"hello {nama}\"
print(format_str)

# boolean
boolean = True
format_str = f\"boolean = {boolean}\"
print(format_str)

# angka
angka = 2005.5
format_str = \"angka = \" + str(angka)
format_str2 = f\"angka = {angka}\"
print(format_str2)

# bilangan bulat
angka = 15.5
format_str = f\"bilangan bulat = {str(angka)}\"
print(format_str)

# bilangan ribuan
angka = 20000000
format_str = f\"jutaan = {angka:,}\"
print(format_str)

# bilangan decimal
angka = 2034.4112
format_str = f\"decimal = {angka:.2f}\" # :.2f ambil 2 angka dibelakang koma
print(format_str)

# menampilkan leading zero
angka = 2034.4112
format_str = f\"decimal = {angka:010.2f}\" # :8.2f 9 angka ambil 2 angka dibelakang koma
print(format_str)

# menampilkaan tanda + atau -
angka_minus = -10
angka_plus = 10.1234
format_minus = f\"minus = {angka_minus:+d}\"
format_plus = f\"plus = {angka_plus:+.2f}\"

print(format_minus)
print(format_plus)

# memformat %persen
persentase = 0.45
format_persen = f\"persen = {persentase:.2%}\"

print(format_persen)

# melakukan operasi aritmatika di dalam placeholder
harga = 10000
jumlah = 5
format_string = f\"harga total = Rp. {harga*jumlah}\"
print(format_string)

# format angka lain (binary, octal, hexadecimal)

angka = 225
formatBinary = f\"Binary = {bin(angka)}\"
formatOctal = f\"Octal = {oct(angka)}\"
formatHex = f\"Hex = {hex(angka)}\"

print(formatBinary)
print(formatOctal)
print(formatHex)
",
                'order_in_section' => 14
            ],
            [
                'section_id' => 12,
                'title' => 'String Width and Alignment',
                'description' => "String width dan alignment adalah teknik untuk mengatur lebar dan penataan teks dalam string. Dalam Python, Anda dapat menggunakan metode .format() atau f-string untuk mengatur lebar dan penataan string.",
                'code' =>
                "# Width and Multiline

# Data

data_nama = \"Ilham Rahmat Akbar\"
data_umur = 23
data_tinggi = 170
data_nomor_sepatu = 43

# string
data_string = f\"nama {data_nama}, umur = {data_umur}, tinggi = {data_tinggi}, sepatu = {data_nomor_sepatu}\"
print(5*\"=\"+\"Data String\"+5*\"=\")
print(data_string)

#String multiline (dengan menggunakan enter, newline, \n)
data_string = f\"nama {data_nama},\numur = {data_umur},\ntinggi = {data_tinggi},\nsepatu = {data_nomor_sepatu}\"
print(5*\"=\"+\"Data String\"+5*\"=\")
print(data_string)

# String multiline (kutip triplets)
data_nama = \"ilham\"
data_tinggi = 170.1023
data_string = f\"\"\"
nama   = {data_nama:>15}
umur   = {data_umur:>15}
tinggi = {data_tinggi:>15}
sptu   = {data_nomor_sepatu:>15}

\"\"\"

print(5*\"=\"+\"Data String\"+5*\"=\")
print(data_string)

# mengatur lebar


",
                'order_in_section' => 15
            ],
            [
                'section_id' => 12,
                'title' => 'Date and Time',
                'description' => "Modul datetime dalam Python menyediakan alat untuk bekerja dengan tanggal dan waktu. Ini termasuk membuat, memanipulasi, dan memformat objek tanggal dan waktu. Anda dapat menggunakan modul ini untuk mengakses dan memanipulasi tanggal, waktu, zona waktu, serta melakukan operasi matematika seperti perbedaan antara dua tanggal. Modul juga mendukung formatisasi tanggal dan waktu sesuai kebutuhan, serta mengonversi antara berbagai format tanggal dan waktu.",
                'code' =>
                "# Date and time (latihan)

import datetime as dt

print(\"Silahkan masukan tanggal, \nbulan dan tahun lahir and \n\")
tanggal = int(input(\"Tanggal \t: \"))
bulan = int(input(\"Bulan \t\t: \"))
tahun = int(input(\"Tahun \t\t: \"))

# lahir = str(tanggal) +\" \"+ str(bulan) +\" \"+ str(tahun)
lahir = dt.date(tahun, bulan, tanggal)

print(f\"Tanggal lahir anda adalah : {lahir}\")
print(f\"Harinya adalah : {lahir:%A}\")

hari_ini = dt.date.today()
print(f\"hari ini tanggal: {lahir}\")
umur_hari = hari_ini - lahir
umur_bulan = (umur_hari.days % 365) // 30
umur_tahun = umur_hari.days // 365

print(f\"Tanggal Lahir Anda : {lahir:%A}\")
print(f\"umur anda adalah {umur_tahun} tahun {umur_bulan} bulan\")


# hari_ini = dt.date.today()

# print(hari_ini)
# print(f\"Hari ini adalah hari = {hari_ini:%A}\")

# tanggal = dt.date(2005, 10, 10)
# print(tanggal)
# print(f\"Hari ini adalah hari = {hari_ini:%A}\")


",
                'order_in_section' => 16
            ],
            [
                'section_id' => 12,
                'title' => 'If , Else',
                'description' => "Pernyataan if dan else adalah struktur kontrol dalam Python yang digunakan untuk membuat keputusan berdasarkan kondisi tertentu. Pernyataan if digunakan untuk mengevaluasi suatu kondisi dan menjalankan blok kode jika kondisi tersebut benar (True). Jika kondisi tersebut salah (False), maka blok kode dalam pernyataan else akan dieksekusi. Ini memungkinkan pengambilan keputusan berdasarkan kondisi yang diberikan dalam program Python.",
                'code' =>
                "# If dan Else Statement

# 1. if nya
# 2. kondisinya
# 3. aksinya

input_nama = str(input(\"Nama Anda : \"))

#if kondisi : aksi
#program selanjutnya

# 1. program if inline
# if input_nama == \"ilham\" : print(\"Nama anda benar\")
# print(f\"Terima kasih {input_nama}\")

# 2. progra, if indentation
# if input_nama == \"ilham\" :
#     print(\"kamu ganteng\")
#     print(\"kamu pinter\")
# print(f\"Terima kasih {input_nama}\")

# 3. Else statement
if input_nama == \"ilham\" :
    print(\"kamu ganteng\")
else :
    print(\"kamu pinter\")
print(f\"Terima kasih {input_nama}\")",
                'order_in_section' => 17
            ],
            [
                'section_id' => 12,
                'title' => 'Elif',
                'description' => "Pernyataan elif digunakan dalam struktur kontrol if...elif...else untuk menambahkan lebih dari satu kondisi ke blok pemilihan. Ketika kondisi dalam pernyataan if tidak terpenuhi, maka program akan mengevaluasi kondisi pertama elif. Jika kondisi tersebut benar, blok kode terkait akan dieksekusi, dan jika tidak, program akan melanjutkan ke pernyataan elif berikutnya atau ke blok else jika tidak ada lagi kondisi yang memenuhi. Pernyataan elif membantu dalam menangani skenario dengan lebih dari dua kemungkinan hasil.",
                'code' =>
                "# ELIF = else if statement

nama = str(input(\"Masukan nama : \"))

if nama == \"MO Salah\" :
    print(f\"Hai{nama}\")
elif nama == \"Ronaldo\" :
    print(f\"Hai{nama}\")
elif nama != \"Mo salah\" :
    print(\"Coba Lagi\")

print(f\"Thanks {nama}!\")",
                'order_in_section' => 18
            ],
            [
                'section_id' => 13,
                'title' => 'Configuration',
                'description' => 'Konfigurasi di Git adalah pengaturan yang memengaruhi perilaku Git pada level global, lokal, atau repositori. Untuk melihat seluruh konfigurasi Git, Anda dapat menggunakan perintah `git config --list`. Ini akan menampilkan semua pengaturan yang telah ditetapkan beserta nilainya.',
                'code' => "# Untuk melihat seluruh konfigurasi Git
git config --list
# Perintah di atas akan menampilkan daftar seluruh konfigurasi Git yang telah ditetapkan.

# Contoh:
git config --list
# user.name=Ilham Rahmat Akbar
# user.email=ilham@gmail.com
# core.repositoryformatversion=0
# core.filemode=true
# core.bare=false
# core.logallrefupdates=true
# ...
# Penjelasan dari kode di atas adalah bahwa perintah 'git config --list' akan menampilkan semua konfigurasi Git yang ada.",
                'order_in_section' => 1
            ],
            [
                'section_id' => 13,
                'title' => 'Insialisasi',
                'description' => 'Insialisasi dalam Git adalah langkah pertama dalam membuat repositori Git pada sebuah proyek. Ini dilakukan dengan perintah `git init` di dalam direktori proyek. Setelah insialisasi, Git akan membuat folder `.git` yang berisi semua data yang diperlukan untuk repositori Git tersebut.',
                'code' => "# Insialisasi repositori Git
git init
# Perintah di atas akan membuat folder .git di dalam direktori proyek, menandakan bahwa repositori Git telah diinisialisasi.

# Contoh:
git init
# Initialized empty Git repository in /path/to/your/project/.git/
# Penjelasan dari kode di atas adalah bahwa perintah 'git init' akan membuat folder .git yang menandakan repositori Git telah diinisialisasi di dalam direktori proyek tersebut.",
                'order_in_section' => 2
            ],
            [
                'section_id' => 13,
                'title' => 'Status',
                'description' => 'Perintah `git status` digunakan untuk menampilkan status dari direktori kerja saat ini. Ini memberikan informasi tentang perubahan yang belum di-commit, perubahan yang telah di-staging, dan informasi lainnya seperti branch saat ini.',
                'code' => "# Menampilkan status dari direktori kerja saat ini
git status
# Perintah di atas akan menampilkan informasi tentang perubahan yang belum di-commit, perubahan yang telah di-staging, dan informasi lainnya seperti branch saat ini.

# Contoh:
git status
# On branch main
# Your branch is up to date with 'origin/main'.
--
# Changes not staged for commit:
#   (use \"git add <file>...\" to update what will be committed)
#   (use \"git restore <file>...\" to discard changes in working directory)
--
#     modified:   index.html
--
# Untracked files:
#   (use \"git add <file>...\" to include in what will be committed)
--
#     newfile.txt
--
# no changes added to commit (use \"git add\" and/or \"git commit -a\")
# Penjelasan dari kode di atas adalah bahwa perintah 'git status' memberikan informasi tentang status dari direktori kerja saat ini, termasuk perubahan yang belum di-commit dan file yang belum di-track.",
                'order_in_section' => 3
            ],
            [
                'section_id' => 13,
                'title' => 'Working ke Staging',
                'description' => 'Untuk memindahkan perubahan dari working directory ke staging area, Anda dapat menggunakan perintah `git add`. Ini akan menambahkan perubahan yang dipilih ke staging area untuk disiapkan untuk proses commit.',
                'code' => "
# Memindahkan perubahan dari working directory ke staging area
git add <nama_file>
# Perintah di atas akan menambahkan perubahan yang dipilih ke staging area.

# Contoh:
git add index.html
# Penjelasan dari kode di atas adalah bahwa perintah 'git add index.html' akan memindahkan perubahan yang terjadi pada file index.html dari working directory ke staging area.",
                'order_in_section' => 4
            ],
            [
                'section_id' => 13,
                'title' => 'Staging ke Repository',
                'description' => 'Setelah Anda memindahkan perubahan ke staging area, langkah selanjutnya adalah melakukan commit untuk menyimpan perubahan tersebut ke dalam repository. Anda dapat menggunakan perintah `git commit` untuk melakukan commit perubahan yang ada di staging area.',
                'code' => "
# Melakukan commit perubahan dari staging area ke repository
git commit -m 'pesan_commit'
# Perintah di atas akan melakukan commit perubahan yang ada di staging area ke repository dengan pesan commit yang diberikan.

# Contoh:
git commit -m 'Menambahkan fitur login'
# Penjelasan dari kode di atas adalah bahwa perintah 'git commit -m 'Menambahkan fitur login'' akan melakukan commit perubahan yang ada di staging area ke repository dengan pesan commit 'Menambahkan fitur login'.
",
                'order_in_section' => 5
            ],
            [
                'section_id' => 13,
                'title' => 'Melihat perubahan pada file',
                'description' => 'Untuk melihat perubahan yang belum di-staging pada file tertentu, Anda dapat menggunakan perintah `git diff <nama_file>`. Ini akan menampilkan perbedaan antara versi saat ini dari file tersebut di direktori kerja dan versi terakhir yang di-commit.',
                'code' => "
# Melihat perubahan yang belum di-staging pada file tertentu
git diff <nama_file>
# Perintah di atas akan menampilkan perbedaan antara versi saat ini dari file tersebut di direktori kerja dan versi terakhir yang di-commit.

# Contoh:
git diff index.html
# Penjelasan dari kode di atas adalah bahwa perintah 'git diff index.html' akan menampilkan perbedaan antara versi saat ini dari file index.html di direktori kerja dan versi terakhir yang di-commit.
",
                'order_in_section' => 6
            ],
            [
                'section_id' => 13,
                'title' => 'Menghapus file',
                'description' => 'Untuk menghapus file dari repository Git dan dari sistem file lokal, Anda dapat menggunakan perintah `git rm`. Perintah ini juga akan menghapus file dari staging area jika file tersebut sudah ditambahkan sebelumnya.',
                'code' => "
# Menghapus file dari repository Git dan dari sistem file lokal
git rm <nama_file>
# Perintah di atas akan menghapus file dari repository Git dan dari sistem file lokal.

# Contoh:
git rm index.html
# Penjelasan dari kode di atas adalah bahwa perintah 'git rm index.html' akan menghapus file index.html dari repository Git dan dari sistem file lokal.
",
                'order_in_section' => 7
            ],
            [
                'section_id' => 13,
                'title' => 'Membatalkan penambahan file pas di working directory',
                'description' => 'Jika Anda telah menambahkan file ke staging area tetapi ingin membatalkannya dan mengembalikan ke kondisi sebelumnya di working directory, Anda dapat menggunakan perintah `git reset HEAD <nama_file>`. Ini akan menghapus file dari staging area, tetapi tidak akan menghapus perubahan di working directory.',
                'code' => "
# Membatalkan penambahan file saat berada di staging area dan mengembalikannya ke kondisi sebelumnya di working directory
git reset HEAD <nama_file>
# Perintah di atas akan menghapus file dari staging area tetapi tidak akan menghapus perubahan di working directory.

# Contoh:
git reset HEAD index.html
# Penjelasan dari kode di atas adalah bahwa perintah 'git reset HEAD index.html' akan membatalkan penambahan file index.html saat berada di staging area dan mengembalikannya ke kondisi sebelumnya di working directory.
",
                'order_in_section' => 8
            ],
            [
                'section_id' => 13,
                'title' => 'Membatalkan perubahan file saat berada di working directory',
                'description' => 'Jika Anda ingin membatalkan perubahan pada file yang belum ditambahkan ke staging area, Anda dapat menggunakan perintah `git checkout # <nama_file>`. Ini akan mengembalikan file tersebut ke kondisi terakhir yang di-commit, menghapus perubahan yang belum disimpan.',
                'code' => "
# Membatalkan perubahan pada file saat berada di working directory
git checkout # <nama_file>
# Perintah di atas akan mengembalikan file tersebut ke kondisi terakhir yang di-commit, menghapus perubahan yang belum disimpan.

# Contoh:
git checkout # index.html
# Penjelasan dari kode di atas adalah bahwa perintah 'git checkout # index.html' akan membatalkan perubahan pada file index.html yang belum ditambahkan ke staging area, mengembalikannya ke kondisi terakhir yang di-commit.
",
                'order_in_section' => 9
            ],
            [
                'section_id' => 13,
                'title' => 'Membatalkan perubahan saat berada di staging index',
                'description' => 'Jika Anda telah menambahkan perubahan ke staging index dan ingin membatalkannya, Anda dapat menggunakan perintah `git reset HEAD <nama_file>`. Ini akan menghapus perubahan yang telah ditambahkan ke staging index dan memindahkan file tersebut kembali ke working directory.',
                'code' => "
# Membatalkan perubahan pada file yang telah ditambahkan ke staging index
git reset HEAD <nama_file>
# Perintah di atas akan menghapus perubahan yang telah ditambahkan ke staging index dan memindahkan file tersebut kembali ke working directory.

# Contoh:
git reset HEAD index.html
# Penjelasan dari kode di atas adalah bahwa perintah 'git reset HEAD index.html' akan membatalkan perubahan yang telah ditambahkan ke staging index pada file index.html dan memindahkan file tersebut kembali ke working directory.
",
                'order_in_section' => 10
            ],
            [
                'section_id' => 13,
                'title' => 'Melihat History',
                'description' => 'Untuk melihat riwayat commit pada repository Git, Anda dapat menggunakan perintah `git log`. Ini akan menampilkan daftar semua commit beserta informasi terkait seperti ID commit, penulis, tanggal, dan pesan commit.',
                'code' => "
# Melihat riwayat commit pada repository Git
git log
# Perintah di atas akan menampilkan daftar semua commit beserta informasi terkait seperti ID commit, penulis, tanggal, dan pesan commit.

# Contoh:
git log
# commit 0a1b2c3d4e5f6a7b8c9d0e1f2a3b4c5d6e7f8a9
# Author: John Doe <john@example.com>
# Date:   Mon Apr 11 12:00:00 2022 +0300
--
#     Added new feature
--
# commit 1a2b3c4d5e6f7a8b9c0d1e2f3a4b5c6d7e8f9a0
# Author: Jane Smith <jane@example.com>
# Date:   Sun Apr 10 12:00:00 2022 +0300
--
#     Updated documentation
#
# commit 2a3b4c5d6e7f8a9b0c1d2e3f4a5b6c7d8e9f0a1
# Author: John Doe <john@example.com>
# Date:   Sat Apr 9 12:00:00 2022 +0300
--
#     Initial commit

# Contoh lain:
- git log --online => secara 1 baris
- git log --online --graph => menampilkan branching juga
",
                'order_in_section' => 11
            ],
            [
                'section_id' => 13,
                'title' => 'Melihat detail commit',
                'description' => 'Untuk melihat detail dari sebuah commit tertentu, Anda dapat menggunakan perintah `git show <id_commit>`. Ini akan menampilkan informasi terperinci tentang commit yang ditentukan, termasuk perubahan yang dilakukan dan metadata commit.',
                'code' => "
# Melihat detail dari sebuah commit tertentu
git show <id_commit>
# Perintah di atas akan menampilkan informasi terperinci tentang commit yang ditentukan, termasuk perubahan yang dilakukan dan metadata commit.

# Contoh:
git show 0a1b2c3d4e5f6a7b8c9d0e1f2a3b4c5d6e7f8a9
# commit 0a1b2c3d4e5f6a7b8c9d0e1f2a3b4c5d6e7f8a9
# Author: John Doe <john@example.com>
# Date:   Mon Apr 11 12:00:00 2022 +0300
--
#     Added new feature
--
# diff --git a/file.txt b/file.txt
# index 1234567..abcdef8 100644
# -# a/file.txt
# +++ b/file.txt
# @@ -1,2 +1,3 @@
#  Line 1
#  Line 2
# +Line 3
",
                'order_in_section' => 12
            ],
            [
                'section_id' => 13,
                'title' => 'Membandingkan commit',
                'description' => 'Untuk membandingkan dua commit atau lebih, Anda dapat menggunakan perintah `git diff <id_commit_1> <id_commit_2>`. Ini akan menampilkan perbedaan antara dua commit yang ditentukan.',
                'code' => "
# Membandingkan dua commit atau lebih
git diff <id_commit_1> <id_commit_2>
# Perintah di atas akan menampilkan perbedaan antara dua commit yang ditentukan.

# Contoh:
git diff 0a1b2c3d4e5f6a7b8c9d0e1f2a3b4c5d6e7f8a9 1a2b3c4d5e6f7a8b9c0d1e2f3a4b5c6d7e8f9a0
# Penjelasan dari kode di atas adalah bahwa perintah 'git diff <id_commit_1> <id_commit_2>' akan menampilkan perbedaan antara dua commit yang ditentukan.
",
                'order_in_section' => 13
            ],
            [
                'section_id' => 13,
                'title' => 'Mengubah nama file',
                'description' => 'Untuk mengubah nama file dalam repositori Git, Anda dapat menggunakan perintah `git mv <nama_file_lama> <nama_file_baru>`. Ini akan menambahkan perubahan ke staging area dan menghapus file lama serta menambahkan file baru.',
                'code' => "
# Mengubah nama file dalam repositori Git
git mv <nama_file_lama> <nama_file_baru>
# Perintah di atas akan menambahkan perubahan ke staging area dan menghapus file lama serta menambahkan file baru.

# Contoh:
git mv old_file.txt new_file.txt
# Penjelasan dari kode di atas adalah bahwa perintah 'git mv old_file.txt new_file.txt' akan mengubah nama file old_file.txt menjadi new_file.txt dalam repositori Git.
",
                'order_in_section' => 14
            ],
            [
                'section_id' => 13,
                'title' => 'Reset commit',
                'description' => 'Untuk melakukan reset commit dalam Git, tergantung pada jenis reset yang Anda inginkan, Anda dapat menggunakan perintah `git reset`. Terdapat tiga mode reset yang umum digunakan: --soft, --mixed, dan --hard.',
                'code' => "
# Reset commit dengan mode --soft (mengembalikan perubahan ke staging area)
git reset --soft <id_commit>
# Perintah di atas akan mengembalikan commit yang ditentukan ke staging area, tetapi tidak mengubah file di working directory.

# Reset commit dengan mode --mixed (mengembalikan perubahan ke working directory)
git reset --mixed <id_commit>
# Perintah di atas akan mengembalikan commit yang ditentukan ke working directory, tetapi tidak menghapus perubahan dari staging area.

# Reset commit dengan mode --hard (menghapus perubahan)
git reset --hard <id_commit>
# Perintah di atas akan menghapus semua perubahan yang dilakukan setelah commit yang ditentukan, baik di working directory maupun staging area.

# Contoh:
git reset --soft HEAD~1
git reset --mixed HEAD~1
git reset --hard HEAD~1
# Penjelasan dari kode di atas adalah bahwa perintah 'git reset' dapat digunakan dengan berbagai mode untuk melakukan reset commit sesuai kebutuhan.
",
                'order_in_section' => 15
            ],
            [
                'section_id' => 13,
                'title' => 'Amend commit',
                'description' => 'Untuk memperbaiki atau menambahkan perubahan pada commit terakhir Anda, Anda dapat menggunakan perintah `git commit --amend`. Ini akan membuka editor teks di mana Anda dapat mengedit pesan commit atau menambahkan perubahan tambahan ke commit terakhir.',
                'code' => "
# Memperbaiki atau menambahkan perubahan pada commit terakhir
git commit --amend
# Perintah di atas akan membuka editor teks di mana Anda dapat mengedit pesan commit atau menambahkan perubahan tambahan ke commit terakhir.

# Contoh:
git commit --amend
# Penjelasan dari kode di atas adalah bahwa perintah 'git commit --amend' akan membuka editor teks di mana Anda dapat memperbaiki pesan commit atau menambahkan perubahan tambahan ke commit terakhir.
",
                'order_in_section' => 16
            ],
            [
                'section_id' => 13,
                'title' => 'Checkout',
                'description' => 'Perintah `git checkout` digunakan untuk beralih di antara branch atau untuk memulihkan file dari commit tertentu. Jika Anda ingin beralih ke branch lain, Anda dapat menggunakan `git checkout <nama_branch>`. Jika Anda ingin memulihkan file dari commit tertentu, Anda dapat menggunakan `git checkout <id_commit> # <nama_file>`.',
                'code' => "
# Beralih ke branch lain
git checkout <nama_branch>
# Perintah di atas akan beralih ke branch yang ditentukan.

# Memulihkan file dari commit tertentu
git checkout <id_commit> # <nama_file>
# Perintah di atas akan memulihkan file yang ditentukan dari commit tertentu.

# Contoh:
git checkout main
git checkout abcdef123456 # index.html
# Penjelasan dari kode di atas adalah bahwa perintah 'git checkout' dapat digunakan untuk beralih di antara branch atau untuk memulihkan file dari commit tertentu.
",
                'order_in_section' => 17
            ],
            [
                'section_id' => 13,
                'title' => 'Revert commit',
                'description' => 'Untuk membatalkan efek dari sebuah commit tertentu tanpa menghapus riwayatnya, Anda dapat menggunakan perintah `git revert`. Ini akan membuat commit baru yang membalikkan perubahan yang diperkenalkan oleh commit yang ditentukan.',
                'code' => "
# Membatalkan efek dari sebuah commit tertentu
git revert <id_commit>
# Perintah di atas akan membuat commit baru yang membatalkan perubahan yang diperkenalkan oleh commit yang ditentukan.

# Contoh:
git revert abcdef123456
# Penjelasan dari kode di atas adalah bahwa perintah 'git revert abcdef123456' akan membuat commit baru yang membatalkan efek dari commit dengan ID 'abcdef123456'.
",
                'order_in_section' => 18
            ],
            [
                'section_id' => 13,
                'title' => 'Ignore',
                'description' => 'Untuk mengabaikan file atau direktori dalam repositori Git, Anda dapat membuat file bernama `.gitignore` di direktori root repositori. Anda dapat menuliskan pola-pola untuk file atau direktori yang ingin diabaikan dalam file `.gitignore`. Git akan mengabaikan file atau direktori yang cocok dengan pola-pola tersebut saat melakukan operasi seperti `git status` atau `git add`.',
                'code' => "
# Membuat file .gitignore
touch .gitignore
# Perintah di atas akan membuat file .gitignore di direktori root repositori.

# Menambahkan pola untuk file atau direktori yang ingin diabaikan
echo 'file.txt' >> .gitignore
# Perintah di atas akan menambahkan pola 'file.txt' ke dalam file .gitignore untuk mengabaikan file bernama file.txt.

# Contoh:
# Ignore file.txt
file.txt
# Penjelasan dari kode di atas adalah bahwa file.txt akan diabaikan oleh Git sesuai dengan pola yang ditetapkan dalam file .gitignore.
",
                'order_in_section' => 19
            ],
            [
                'section_id' => 13,
                'title' => 'Blame',
                'description' => 'Perintah `git blame` digunakan untuk melihat riwayat perubahan pada suatu baris dalam file. Ini menampilkan informasi tentang commit terakhir yang mempengaruhi setiap baris dalam file, termasuk ID commit, penulis, tanggal commit, dan pesan commit.',
                'code' => "
# Melihat riwayat perubahan pada suatu baris dalam file
git blame <nama_file>
# Perintah di atas akan menampilkan riwayat perubahan pada setiap baris dalam file yang ditentukan.

# Contoh:
git blame index.html
# Penjelasan dari kode di atas adalah bahwa perintah 'git blame index.html' akan menampilkan riwayat perubahan pada setiap baris dalam file index.html.
",
                'order_in_section' => 20
            ],
            [
                'section_id' => 14,
                'title' => 'Melihat branch saat ini',
                'description' => 'Untuk melihat branch saat ini di repositori Git, Anda dapat menggunakan perintah `git branch` dengan opsi `-l` atau `--list`, atau Anda juga dapat menggunakan perintah `git status`.',
                'code' => "
# Melihat branch saat ini menggunakan git branch
git branch -l
git branch --list
# Perintah di atas akan menampilkan daftar semua branch yang ada di repositori, dengan tanda asterisk (*) menunjukkan branch saat ini.

# Melihat branch saat ini menggunakan git status
git status
# Perintah di atas akan menampilkan informasi status repositori, termasuk branch saat ini.

# Contoh:
git branch -l
* main
  develop
# Penjelasan dari kode di atas adalah bahwa branch main ditandai dengan tanda asterisk (*), menunjukkan bahwa branch saat ini adalah main.

# Contoh lain:
git branch --show-current
",
                'order_in_section' => 1
            ],
            [
                'section_id' => 14,
                'title' => 'Membuat branch',
                'description' => 'Untuk membuat branch baru dalam repositori Git, Anda dapat menggunakan perintah `git branch <nama_branch>`. Setelah branch dibuat, Anda dapat beralih ke branch tersebut menggunakan perintah `git checkout <nama_branch>`.',
                'code' => "
# Membuat branch baru
git branch <nama_branch>
# Perintah di atas akan membuat branch baru dengan nama yang ditentukan.

# Contoh:
git branch feature-branch
# Penjelasan dari kode di atas adalah bahwa perintah 'git branch feature-branch' akan membuat branch baru dengan nama feature-branch.
",
                'order_in_section' => 2
            ],
            [
                'section_id' => 14,
                'title' => 'Melihat semua branch',
                'description' => 'Untuk melihat daftar semua branch dalam repositori Git, Anda dapat menggunakan perintah `git branch` tanpa argumen tambahan.',
                'code' => "
# Melihat semua branch
git branch
# Perintah di atas akan menampilkan daftar semua branch yang ada di repositori, dengan tanda asterisk (*) menunjukkan branch saat ini.

# Contoh:
git branch
  main
* develop
  feature-branch
# Penjelasan dari kode di atas adalah bahwa branch develop ditandai dengan tanda asterisk (*), menunjukkan bahwa branch saat ini adalah develop.
",
                'order_in_section' => 3
            ],
            [
                'section_id' => 14,
                'title' => 'Pindah ke branch lain',
                'description' => 'Untuk beralih ke branch lain dalam repositori Git, Anda dapat menggunakan perintah `git checkout <nama_branch>`. Ini akan mengubah working directory Anda ke branch yang ditentukan.',
                'code' => "
# Pindah ke branch lain
git checkout <nama_branch>
# Perintah di atas akan mengubah working directory Anda ke branch yang ditentukan.

# Contoh:
git checkout feature-branch
# Penjelasan dari kode di atas adalah bahwa perintah 'git checkout feature-branch' akan mengubah working directory Anda ke branch feature-branch.
",
                'order_in_section' => 4
            ],
            [
                'section_id' => 14,
                'title' => 'Mengubah nama branch',
                'description' => 'Untuk mengubah nama branch dalam repositori Git, Anda dapat menggunakan perintah `git branch -m <nama_branch_lama> <nama_branch_baru>`. Ini akan mengubah nama branch yang ditentukan.',
                'code' => "
# Mengubah nama branch
git branch -m <nama_branch_lama> <nama_branch_baru>
# Perintah di atas akan mengubah nama branch yang ditentukan.

# Contoh:
git branch -m old-branch new-branch
# Penjelasan dari kode di atas adalah bahwa perintah 'git branch -m old-branch new-branch' akan mengubah nama branch old-branch menjadi new-branch.
",
                'order_in_section' => 5
            ],
            [
                'section_id' => 14,
                'title' => 'Menghapus branch',
                'description' => 'Untuk menghapus branch dalam repositori Git, Anda dapat menggunakan perintah `git branch -d <nama_branch>`. Ini akan menghapus branch yang ditentukan.',
                'code' => "
# Menghapus branch
git branch -d <nama_branch>
# Perintah di atas akan menghapus branch yang ditentukan.

# Contoh:
git branch -d feature-branch
# git branch --delete feature-branch
# Penjelasan dari kode di atas adalah bahwa perintah 'git branch -d/--delete feature-branch' akan menghapus branch dengan nama feature-branch.
",
                'order_in_section' => 6
            ],
            [
                'section_id' => 14,
                'title' => 'Merge',
                'description' => 'Untuk menggabungkan perubahan dari satu branch ke branch lain dalam repositori Git, Anda dapat menggunakan perintah `git merge <nama_branch>`. Ini akan menggabungkan perubahan dari branch yang ditentukan ke branch saat ini.',
                'code' => "
# Langkah-langkah sebelum merge:
# 1. Pastikan bahwa Anda berada di branch target yang ingin Anda gabungkan perubahannya.
# 2. Pastikan tidak ada konflik merge yang belum dipecahkan. Jika ada, selesaikan konflik tersebut terlebih dahulu.
# 3. Lakukan merge dari branch sumber ke branch target menggunakan perintah 'git merge <nama_branch>'.
#    Ini akan menggabungkan perubahan dari branch sumber ke branch target.

# Contoh:
# Langkah 1: Pindah ke branch target
git checkout target-branch
# Langkah 2: Lakukan merge dari branch sumber ke branch target
git merge source-branch

# Syarat sebelum merge:
# - Pastikan tidak ada konflik merge yang belum dipecahkan. Konflik merge terjadi ketika ada perubahan yang bertentangan antara branch sumber dan branch target.
# - Pastikan tidak ada perubahan yang belum di-commit di branch saat ini, karena merge dapat menyebabkan konflik jika ada perubahan yang belum di-commit.
# - Pastikan branch yang ingin digabungkan (branch sumber) telah di-push ke repositori yang bersangkutan.
# - Pastikan tidak ada pekerjaan yang sedang berlangsung pada branch target yang dapat terpengaruh negatif oleh merge.
",
                'order_in_section' => 7
            ],
            [
                'section_id' => 14,
                'title' => 'Graph Log',
                'description' => 'Perintah `git log` dapat ditambahkan opsi `--graph` untuk menampilkan log dalam bentuk grafik ASCII. Ini memungkinkan Anda untuk melihat struktur dan hubungan antar commit dalam repositori secara visual.',
                'code' => "
# Menampilkan log dalam bentuk grafik ASCII
git log --graph
# Perintah di atas akan menampilkan log dalam bentuk grafik ASCII, dengan garis-garis yang menghubungkan commit berbeda.

# Contoh:
git log --graph
*   commit 75b65a2 (HEAD -> main)
|\\\\  Merge: abc1234 def5678
| | Author: John Doe <john@example.com>
| | Date:   Mon Apr 11 12:00:00 2022 +0300
| |
| |     Merge branch 'feature'
| |
| * commit abc1234 (feature)
| | Author: Jane Smith <jane@example.com>
| | Date:   Sun Apr 10 12:00:00 2022 +0300
| |
| |     Added new feature
| |
* | commit def5678
|/  Author: John Doe <john@example.com>
|   Date:   Sat Apr 9 12:00:00 2022 +0300
|
|       Initial commit

Contoh lain:
# Menampilkan log dalam satu garis
git log --oneline --graph
",
                'order_in_section' => 8
            ],
            [
                'section_id' => 14,
                'title' => 'Merge Conflict',
                'description' => 'Konflik merge terjadi ketika Git tidak dapat secara otomatis menggabungkan perubahan dari dua branch yang berbeda karena ada perubahan yang bertentangan pada baris yang sama dalam file yang sama. Untuk menyelesaikan konflik merge, Anda perlu menyelesaikan konflik secara manual dengan memodifikasi file yang konflik dan menandai bahwa konflik telah dipecahkan. Setelah menyelesaikan konflik, Anda perlu melakukan commit untuk menyelesaikan proses merge.',
                'code' => "
# Menyelesaikan konflik merge:
# 1. Git akan menunjukkan file-file yang mengalami konflik merge.
# 2. Buka file yang konflik menggunakan editor teks.
# 3. Perbaiki konflik dengan menghapus atau memodifikasi bagian yang bertentangan.
# 4. Simpan perubahan dan tutup editor.
# 5. Tandai bahwa konflik telah dipecahkan dengan menambahkan file yang telah diperbaiki ke staging area menggunakan perintah 'git add <nama_file>'.
# 6. Lanjutkan proses merge dengan melakukan commit menggunakan perintah 'git commit'.

# Contoh:
# 1. Git menunjukkan file 'index.html' mengalami konflik merge.
# 2. Buka 'index.html' menggunakan editor teks.
# 3. Perbaiki konflik dengan memodifikasi bagian yang bertentangan.
# 4. Simpan perubahan dan tutup editor.
# 5. Tandai bahwa konflik telah dipecahkan dengan menambahkan 'index.html' ke staging area:
   git add index.html
# 6. Lanjutkan proses merge dengan melakukan commit:
   git commit -m 'Fixed merge conflict in index.html'

# Catatan tambahan:
# Semua perubahan yang tidak konflik akan secara otomatis berada di Staging Index
# Sedangkan perubahan yang konflik akan secara otomatis berada di Working Directory
# Untuk membatalkan merge :
git merge --abort",
                'order_in_section' => 9
            ],
            [
                'section_id' => 14,
                'title' => 'Cherry Pick',
                'description' => 'Cherry picking adalah proses mengambil satu atau beberapa commit dari satu branch dan menerapkan perubahan tersebut ke branch lain. Ini berguna ketika Anda hanya ingin mengambil perubahan tertentu dari satu branch tanpa harus menggabungkan seluruh branch tersebut. Untuk melakukan cherry pick, Anda dapat menggunakan perintah `git cherry-pick <id_commit>`. Ini akan menerapkan perubahan dari commit yang ditentukan ke branch saat ini.',
                'code' => "
# Cherry pick commit tertentu
git cherry-pick <id_commit>
# Perintah di atas akan menerapkan perubahan dari commit yang ditentukan ke branch saat ini.

# Contoh:
git cherry-pick abc1234
# Penjelasan dari kode di atas adalah bahwa perintah 'git cherry-pick abc1234' akan menerapkan perubahan dari commit dengan ID 'abc1234' ke branch saat ini.
",
                'order_in_section' => 10
            ],
            [
                'section_id' => 14,
                'title' => 'Tag',
                'description' => 'Tag dalam Git adalah label yang menunjukkan titik tertentu dalam history commit. Mereka digunakan untuk menandai versi yang penting atau rilis dalam repositori. Untuk membuat tag baru, Anda dapat menggunakan perintah `git tag <nama_tag>`. Anda juga dapat menambahkan pesan ke tag dengan menggunakan opsi `-m`. Tag biasanya digunakan untuk menandai rilis perangkat lunak.',
                'code' => "
# Membuat tag baru tanpa pesan
git tag <nama_tag>
# Perintah di atas akan membuat tag baru dengan nama yang ditentukan.

# Membuat tag baru dengan pesan
git tag -a <nama_tag> -m 'Pesan tag'
# Perintah di atas akan membuat tag baru dengan nama dan pesan yang ditentukan.

# Contoh:
git tag v1.0.0
git tag -a v1.0.0 -m 'Release version 1.0.0'
# Penjelasan dari kode di atas adalah bahwa perintah 'git tag v1.0.0' akan membuat tag baru dengan nama 'v1.0.0', sedangkan perintah 'git tag -a v1.0.0 -m 'Release version 1.0.0'' akan membuat tag baru dengan nama 'v1.0.0' dan pesan 'Release version 1.0.0'.
",
                'order_in_section' => 11
            ],
            [
                'section_id' => 14,
                'title' => 'Menampilkan tag',
                'description' => 'Untuk menampilkan daftar tag yang ada dalam repositori Git, Anda dapat menggunakan perintah `git tag`. Ini akan menampilkan daftar semua tag yang telah Anda buat.',
                'code' => "
# Menampilkan daftar tag
git tag
# Perintah di atas akan menampilkan daftar semua tag yang telah Anda buat.

# Contoh:
git tag
v1.0.0
v1.1.0
v1.2.0
# Penjelasan dari kode di atas adalah bahwa perintah 'git tag' akan menampilkan daftar tag yang telah Anda buat, seperti v1.0.0, v1.1.0, dan v1.2.0.


# Contoh lain:
git tag -l
git tag --list",
                'order_in_section' => 12
            ],
            [
                'section_id' => 14,
                'title' => 'Checkout ke tag',
                'description' => 'Untuk beralih ke tag tertentu dalam repositori Git, Anda dapat menggunakan perintah `git checkout <nama_tag>`. Ini akan mengubah HEAD Anda ke tag yang ditentukan, membuat repositori berada dalam mode "detached HEAD". Dalam mode ini, Anda tidak dapat melakukan commit dan perubahan tidak akan disimpan ke branch apa pun.',
                'code' => "
# Beralih ke tag tertentu
git checkout <nama_tag>
# Perintah di atas akan mengubah HEAD Anda ke tag yang ditentukan.

# Contoh:
git checkout v1.0.0
# Penjelasan dari kode di atas adalah bahwa perintah 'git checkout v1.0.0' akan mengubah HEAD Anda ke tag v1.0.0.
",
                'order_in_section' => 13
            ],
            [
                'section_id' => 14,
                'title' => 'Menghapus tag',
                'description' => 'Untuk menghapus tag tertentu dalam repositori Git, Anda dapat menggunakan perintah `git tag -d <nama_tag>`. Ini akan menghapus tag yang ditentukan dari repositori Anda.',
                'code' => "
# Menghapus tag tertentu
git tag -d <nama_tag>
# Perintah di atas akan menghapus tag yang ditentukan dari repositori Anda.

# Contoh:
git tag -d v1.0.0
# Penjelasan dari kode di atas adalah bahwa perintah 'git tag -d v1.0.0' akan menghapus tag v1.0.0 dari repositori Anda.
",
                'order_in_section' => 14
            ],
            [
                'section_id' => 14,
                'title' => 'Stash',
                'description' => 'Stash adalah fitur yang memungkinkan Anda untuk menyimpan perubahan yang belum di-commit pada working directory Anda tanpa harus melakukan commit. Ini berguna ketika Anda ingin menyimpan perubahan sementara dan beralih ke branch lain atau menyelesaikan tugas lain tanpa harus mengotori history commit Anda. Untuk menyimpan perubahan ke stash, Anda dapat menggunakan perintah `git stash`. Untuk menerapkan perubahan yang disimpan dari stash kembali ke working directory Anda, Anda dapat menggunakan perintah `git stash apply`.',
                'code' => "
# Menyimpan perubahan ke stash
git stash
# Perintah di atas akan menyimpan perubahan yang belum di-commit pada working directory Anda ke stash.

# Menerapkan perubahan yang disimpan dari stash kembali ke working directory
git stash apply
# Perintah di atas akan menerapkan perubahan yang disimpan dari stash kembali ke working directory Anda, tetapi tidak akan menghapusnya dari stash.

# Contoh:
git stash
git checkout other-branch
git stash apply
# Penjelasan dari kode di atas adalah bahwa perintah 'git stash' akan menyimpan perubahan yang belum di-commit ke stash, kemudian Anda dapat beralih ke branch lain (misalnya other-branch), dan kemudian menggunakan 'git stash apply' untuk menerapkan kembali perubahan yang disimpan dari stash ke working directory Anda.
",
                'order_in_section' => 15
            ],
            [
                'section_id' => 14,
                'title' => 'Melihat semua stash',
                'description' => 'Untuk melihat daftar semua stash yang telah Anda simpan dalam repositori Git, Anda dapat menggunakan perintah `git stash list`. Ini akan menampilkan daftar semua stash beserta informasi tambahan seperti nama stash dan commit ID terkait.',
                'code' => "
# Melihat daftar semua stash
git stash list
# Perintah di atas akan menampilkan daftar semua stash yang telah Anda simpan dalam repositori Git.

# Contoh:
git stash list
stash@{0}: WIP on feature-branch: 7a57b4d Added new feature
stash@{1}: WIP on main: 3c2d7f9 Fix bug
# Penjelasan dari kode di atas adalah bahwa perintah 'git stash list' akan menampilkan daftar semua stash yang telah Anda simpan, misalnya 'stash@{0}' dan 'stash@{1}', beserta informasi tambahan seperti pesan commit terkait.
",
                'order_in_section' => 16
            ],
            [
                'section_id' => 14,
                'title' => 'Melihat perubahan yang terjadi di stash',
                'description' => 'Untuk melihat perubahan yang terjadi di stash tertentu, Anda dapat menggunakan perintah `git stash show -p stash@{<nomor_stash>}`. Ini akan menampilkan perubahan yang disimpan dalam stash dalam format diff.',
                'code' => "
# Melihat perubahan yang terjadi di stash tertentu
git stash show -p stash@{<nomor_stash>}
# Perintah di atas akan menampilkan perubahan yang disimpan dalam stash tertentu dalam format diff.

# Contoh:
git stash show -p stash@{0}
# Penjelasan dari kode di atas adalah bahwa perintah 'git stash show -p stash@{0}' akan menampilkan perubahan yang disimpan dalam stash dengan nomor 0 dalam format diff.
",
                'order_in_section' => 17
            ],
            [
                'section_id' => 14,
                'title' => 'Melakukan rebase',
                'description' => 'Rebase adalah proses untuk menerapkan history commit dari satu branch ke branch lain dengan cara "memindahkan" commit-commit pada branch sumber ke ujung branch target. Ini memungkinkan Anda untuk mempertahankan history commit yang lebih bersih dan linear. Untuk melakukan rebase, Anda dapat menggunakan perintah `git rebase <nama_branch_sumber>`. Setelah rebase, Anda mungkin perlu menyelesaikan konflik merge jika ada.',
                'code' => "
# Melakukan rebase dari branch sumber ke branch target
git rebase <nama_branch_sumber>
# Perintah di atas akan menerapkan history commit dari branch sumber ke branch target dengan melakukan rebase.

# Contoh:
git checkout target-branch
git rebase source-branch
# Penjelasan dari kode di atas adalah bahwa perintah 'git rebase source-branch' akan menerapkan history commit dari branch source-branch ke branch target-branch dengan melakukan rebase.
",
                'order_in_section' => 18
            ],
            [
                'section_id' => 14,
                'title' => 'Merge vs Rebase',
                'description' => "Berikut ini penjelasannya",
                'code' => "# rebase sebenarnya secara otomatis menulis ulang semua commit yang kita lakukan, dalam artian commit id pasti berubah, artinya semua referensi ke commit id sebelum-sebelumnya akan rusak dan hilang
# Tidak ada mana yang lebih baik, semua tergantung kebutuhan",
                'order_in_section' => 19
            ],
            [
                'section_id' => 14,
                'title' => 'Squash',
                'description' => 'Squash adalah proses untuk menggabungkan beberapa commit menjadi satu commit tunggal sebelum menggabungkannya ke branch utama. Ini membantu menjaga sejarah commit yang bersih dan teratur. Untuk melakukan squash, Anda dapat menggunakan perintah `git rebase -i HEAD~<jumlah_commit>`. Ini akan membuka editor teks dengan daftar commit yang dapat Anda pilih untuk disquash.',
                'code' => "
# Squash beberapa commit menjadi satu commit tunggal
git rebase -i HEAD~<jumlah_commit>
# Perintah di atas akan membuka editor teks dengan daftar commit yang dapat Anda pilih untuk disquash.

# Contoh:
git rebase -i HEAD~3
# Penjelasan dari kode di atas adalah bahwa perintah 'git rebase -i HEAD~3' akan membuka editor teks dengan daftar tiga commit terakhir yang dapat Anda pilih untuk disquash menjadi satu commit tunggal.

# Contoh lain:
# menggabungkan seluruh commit
git merge --squash namabranch
",
                'order_in_section' => 20
            ],
            [
                'section_id' => 15,
                'title' => 'Generate SSH Key',
                'description' => 'SSH keys digunakan dalam otentikasi untuk mengidentifikasi secara unik mesin, server, atau pengguna. Untuk membuat pasangan kunci SSH baru, Anda dapat menggunakan perintah `ssh-keygen`.',
                'code' => "
# Generate SSH key baru
ssh-keygen -t rsa -b 4096 -C 'your_email@example.com'
# Perintah di atas akan membuat pasangan kunci baru menggunakan algoritma rsa dengan panjang 4096 bit dan menyertakan alamat email sebagai label.

# Anda akan ditanya di mana Anda ingin menyimpan kunci. Tekan Enter untuk menyimpan di lokasi default (biasanya di folder ~/.ssh) atau tentukan lokasi penyimpanan yang diinginkan.

# Anda kemudian akan diminta untuk membuat passphrase. Ini adalah kata sandi tambahan yang melindungi kunci pribadi Anda. Anda dapat memilih untuk membuat passphrase atau meninggalkannya kosong (tekan Enter untuk mengabaikannya).

# Setelah selesai, pasangan kunci SSH akan dibuat. Kunci publik akan memiliki ekstensi .pub dan kunci pribadi akan disimpan tanpa ekstensi.

# Contoh:
ssh-keygen -t rsa -b 4096 -C 'john.doe@example.com'
# Penjelasan dari kode di atas adalah bahwa perintah 'ssh-keygen' akan membuat pasangan kunci SSH baru dengan menggunakan algoritma rsa, panjang 4096 bit, dan label email 'john.doe@example.com'.
",
                'order_in_section' => 1
            ],
            [
                'section_id' => 15,
                'title' => 'Lihat SSH Key (Linux)',
                'description' => 'Untuk melihat kunci SSH di lingkungan Linux, Anda dapat menggunakan perintah `cat` atau `less` untuk membaca isi file kunci publik.',
                'code' => "
# Gunakan perintah cat untuk melihat isi kunci SSH
cat ~/.ssh/id_rsa.pub
# Perintah di atas akan menampilkan isi dari kunci SSH publik (biasanya bernama id_rsa.pub) di terminal.

# Anda juga dapat menggunakan perintah less untuk membaca isi kunci SSH
less ~/.ssh/id_rsa.pub
# Perintah di atas akan membuka isi dari kunci SSH publik dengan pembaca teks less.

# Contoh:
cat ~/.ssh/id_rsa.pub
# Penjelasan dari kode di atas adalah bahwa perintah 'cat ~/.ssh/id_rsa.pub' akan menampilkan isi dari kunci SSH publik di terminal.
",
                'order_in_section' => 2
            ],
            [
                'section_id' => 15,
                'title' => 'Menambah Remote Repository',
                'description' => 'Untuk menambahkan remote repository ke repositori Git lokal Anda, Anda dapat menggunakan perintah `git remote add <nama_remote> <url_remote>`. Ini akan menambahkan remote dengan nama yang ditentukan dan URL remote repository yang diberikan.',
                'code' => "
# Menambah remote repository
git remote add <nama_remote> <url_remote>
# Perintah di atas akan menambahkan remote repository ke repositori Git lokal Anda.

# Contoh:
git remote add origin https://example.com/username/repo.git
# Penjelasan dari kode di atas adalah bahwa perintah 'git remote add origin https://example.com/username/repo.git' akan menambahkan remote repository dengan nama 'origin' dan URL remote repository 'https://example.com/username/repo.git' ke repositori Git lokal Anda.
",
                'order_in_section' => 3
            ],
            [
                'section_id' => 15,
                'title' => 'Melihat Remote Repository',
                'description' => 'Untuk melihat daftar remote repository yang terhubung ke repositori Git lokal Anda, Anda dapat menggunakan perintah `git remote -v`. Ini akan menampilkan daftar semua remote beserta URL-nya.',
                'code' => "
# Melihat daftar remote repository
git remote -v
# Perintah di atas akan menampilkan daftar semua remote repository yang terhubung ke repositori Git lokal Anda beserta URL-nya.

# Contoh:
git remote -v
origin  https://example.com/username/repo.git (fetch)
origin  https://example.com/username/repo.git (push)
# Penjelasan dari kode di atas adalah bahwa perintah 'git remote -v' akan menampilkan daftar remote repository yang terhubung ke repositori Git lokal Anda, misalnya 'origin' dengan URL https://example.com/username/repo.git.
",
                'order_in_section' => 4
            ],
            [
                'section_id' => 15,
                'title' => 'Melihat URL Detail Remote Repository',
                'description' => 'Untuk melihat URL detail dari remote repository tertentu yang terhubung ke repositori Git lokal Anda, Anda dapat menggunakan perintah `git remote show <nama_remote>`. Ini akan menampilkan informasi detail tentang remote repository yang ditentukan, termasuk URL fetch dan push.',
                'code' => "
# Melihat URL detail remote repository
git remote show <nama_remote>
# Perintah di atas akan menampilkan informasi detail tentang remote repository yang ditentukan, termasuk URL fetch dan push.

# Contoh:
git remote show origin
# Penjelasan dari kode di atas adalah bahwa perintah 'git remote show origin' akan menampilkan informasi detail tentang remote repository dengan nama 'origin', termasuk URL fetch dan push.

# Contoh lain:
git remote get-url origin
# Menampilkan url origin",
                'order_in_section' => 5
            ],
            [
                'section_id' => 15,
                'title' => 'Menghapus Remote Repository',
                'description' => 'Untuk menghapus remote repository dari repositori Git lokal Anda, Anda dapat menggunakan perintah `git remote remove <nama_remote>`. Ini akan menghapus remote dengan nama yang ditentukan dari daftar remote repository yang terhubung.',
                'code' => "
# Menghapus remote repository
git remote remove <nama_remote>
# Perintah di atas akan menghapus remote repository dengan nama yang ditentukan dari daftar remote repository yang terhubung.

# Contoh:
git remote remove origin
# Penjelasan dari kode di atas adalah bahwa perintah 'git remote remove origin' akan menghapus remote repository dengan nama 'origin' dari daftar remote repository yang terhubung.
",
                'order_in_section' => 6
            ],
            [
                'section_id' => 15,
                'title' => 'Push',
                'description' => 'Untuk mengirim perubahan lokal Anda ke remote repository, Anda dapat menggunakan perintah `git push <remote_name> <branch_name>`. Ini akan mengirimkan commit dari branch lokal yang sesuai dengan branch di remote repository.',
                'code' => "
# Push perubahan ke remote repository
git push <remote_name> <branch_name>
# Perintah di atas akan mengirimkan perubahan dari branch lokal Anda ke branch yang sesuai di remote repository.

# Contoh:
git push origin main
# Penjelasan dari kode di atas adalah bahwa perintah 'git push origin main' akan mengirimkan perubahan dari branch lokal 'main' Anda ke branch 'main' di remote repository 'origin'.
",
                'order_in_section' => 7
            ],
            [
                'section_id' => 15,
                'title' => 'Push Semua Branch',
                'description' => 'Untuk mengirim semua branch lokal Anda ke remote repository, Anda dapat menggunakan perintah `git push --all <remote_name>`. Ini akan mengirimkan semua branch lokal yang ada ke remote repository dengan nama yang ditentukan.',
                'code' => "
# Push semua branch ke remote repository
git push --all <remote_name>
# Perintah di atas akan mengirimkan semua branch lokal yang ada ke remote repository dengan nama yang ditentukan.

# Contoh:
git push --all origin
# Penjelasan dari kode di atas adalah bahwa perintah 'git push --all origin' akan mengirimkan semua branch lokal yang ada ke remote repository 'origin'.
",
                'order_in_section' => 8
            ],
            [
                'section_id' => 15,
                'title' => 'Delete Branch',
                'description' => 'Untuk menghapus branch lokal di repositori Git Anda, Anda dapat menggunakan perintah `git branch -d <nama_branch>`. Ini akan menghapus branch yang ditentukan dari repositori lokal Anda. Jika branch memiliki perubahan yang belum dimasukkan ke branch lain, Anda harus menggunakan `-D` (besar) untuk menghapusnya secara paksa.',
                'code' => "
# Menghapus branch lokal
git branch -d <nama_branch>
# Perintah di atas akan menghapus branch yang ditentukan dari repositori lokal Anda.

# Contoh:
git branch -d feature-branch
# Penjelasan dari kode di atas adalah bahwa perintah 'git branch -d feature-branch' akan menghapus branch 'feature-branch' dari repositori lokal Anda.

# Jika branch memiliki perubahan yang belum dimasukkan ke branch lain, gunakan `-D` (besar) untuk menghapusnya secara paksa.
git branch -D <nama_branch>
# Perintah di atas akan menghapus branch yang ditentukan secara paksa, bahkan jika perubahan belum dimasukkan ke branch lain.
",
                'order_in_section' => 9
            ],
            [
                'section_id' => 15,
                'title' => 'Clone',
                'description' => 'Untuk mengambil salinan lengkap dari repositori yang ada, Anda dapat menggunakan perintah `git clone <url_repo>`. Ini akan membuat salinan lokal dari repositori yang ada, termasuk semua sejarah commit dan file-file yang terkait.',
                'code' => "
# Clone repositori yang ada
git clone <url_repo>
# Perintah di atas akan membuat salinan lokal dari repositori yang ada di URL yang ditentukan.

# Contoh:
git clone https://example.com/username/repo.git
# Penjelasan dari kode di atas adalah bahwa perintah 'git clone https://example.com/username/repo.git' akan membuat salinan lokal dari repositori yang ada di URL tersebut.
",
                'order_in_section' => 10
            ],
            [
                'section_id' => 15,
                'title' => 'Melihat Daftar Remote Branch yang Telah di-Clone',
                'description' => 'Untuk melihat daftar remote branch yang telah di-clone ke repositori lokal Anda, Anda dapat menggunakan perintah `git branch -r`. Ini akan menampilkan daftar semua remote branch yang telah di-clone.',
                'code' => "
# Melihat daftar remote branch yang telah di-clone
git branch -r
# Perintah di atas akan menampilkan daftar semua remote branch yang telah di-clone ke repositori lokal Anda.

# Contoh:
git branch -r
origin/main
origin/feature-branch
# Penjelasan dari kode di atas adalah bahwa perintah 'git branch -r' akan menampilkan daftar semua remote branch seperti 'origin/main' dan 'origin/feature-branch' yang telah di-clone ke repositori lokal Anda.
",
                'order_in_section' => 11
            ],
            [
                'section_id' => 15,
                'title' => 'Melihat Semua Branch di Lokal dan Remote',
                'description' => 'Untuk melihat daftar semua branch baik di repositori lokal maupun remote, Anda dapat menggunakan perintah `git branch -a`. Ini akan menampilkan daftar semua branch, baik yang ada di lokal maupun yang ada di remote.',
                'code' => "
# Melihat daftar semua branch di lokal dan remote
git branch -a
# Perintah di atas akan menampilkan daftar semua branch, baik yang ada di repositori lokal maupun yang ada di remote.

# Contoh:
git branch -a
* main
  remotes/origin/HEAD -> origin/main
  remotes/origin/main
  remotes/origin/feature-branch
# Penjelasan dari kode di atas adalah bahwa perintah 'git branch -a' akan menampilkan daftar semua branch seperti 'main' yang ada di lokal, dan juga branch seperti 'origin/main' dan 'origin/feature-branch' yang ada di remote.
",
                'order_in_section' => 12
            ],
            [
                'section_id' => 15,
                'title' => 'Membuat Branch dari Branch yang Ada di Remote',
                'description' => 'Untuk membuat branch lokal baru yang mengikuti branch yang ada di remote, Anda dapat menggunakan perintah `git checkout -b <nama_branch> <nama_remote>/<nama_branch>`. Ini akan membuat branch baru dan mengaturnya untuk mengikuti branch yang ada di remote dengan nama yang ditentukan.',
                'code' => "
# Membuat branch baru dari branch yang ada di remote
git checkout -b <nama_branch> <nama_remote>/<nama_branch>
# Perintah di atas akan membuat branch baru dengan nama yang ditentukan dan mengaturnya untuk mengikuti branch yang ada di remote.

# Contoh:
git checkout -b feature-branch origin/feature-branch
# Penjelasan dari kode di atas adalah bahwa perintah 'git checkout -b feature-branch origin/feature-branch' akan membuat branch baru dengan nama 'feature-branch' dan mengaturnya untuk mengikuti branch 'origin/feature-branch' yang ada di remote.
",
                'order_in_section' => 13
            ],
            [
                'section_id' => 15,
                'title' => 'Fetch',
                'description' => 'Untuk mengambil informasi terbaru dari remote repository tanpa menggabungkan perubahan ke repositori lokal Anda, Anda dapat menggunakan perintah `git fetch <remote_name>`. Ini akan mengambil semua perubahan yang ada di remote repository dan memperbarui referensi lokal Anda ke remote branch yang sesuai.',
                'code' => "
# Mengambil informasi terbaru dari remote repository
git fetch <remote_name>
# Perintah di atas akan mengambil semua perubahan yang ada di remote repository dan memperbarui referensi lokal Anda ke remote branch yang sesuai.

# Contoh:
git fetch origin
# Penjelasan dari kode di atas adalah bahwa perintah 'git fetch origin' akan mengambil semua perubahan yang ada di remote repository 'origin' dan memperbarui referensi lokal Anda ke remote branch yang sesuai.
",
                'order_in_section' => 14
            ],
            [
                'section_id' => 15,
                'title' => 'Membandingkan Branch Lokal dan Remote',
                'description' => 'Untuk membandingkan branch lokal dengan branch remote yang sesuai, Anda dapat menggunakan perintah `git diff <nama_branch>..<nama_remote>/<nama_branch>`. Ini akan menampilkan perbedaan antara commit terakhir di branch lokal dengan commit terakhir di branch remote.',
                'code' => "
# Membandingkan branch lokal dengan branch remote yang sesuai
git diff <nama_branch>..<nama_remote>/<nama_branch>
# Perintah di atas akan menampilkan perbedaan antara commit terakhir di branch lokal dengan commit terakhir di branch remote.

# Contoh:
git diff main..origin/main
# Penjelasan dari kode di atas adalah bahwa perintah 'git diff main..origin/main' akan menampilkan perbedaan antara commit terakhir di branch 'main' lokal Anda dengan commit terakhir di branch 'origin/main' remote.
",
                'order_in_section' => 15
            ],
            [
                'section_id' => 15,
                'title' => 'Pull',
                'description' => 'Untuk mengambil perubahan dari remote repository dan menggabungkannya ke branch lokal Anda, Anda dapat menggunakan perintah `git pull <remote_name> <branch_name>`. Ini akan mengambil perubahan dari remote branch yang sesuai dan menggabungkannya ke branch lokal Anda.',
                'code' => "
# Mengambil perubahan dari remote repository dan menggabungkannya ke branch lokal Anda
git pull <remote_name> <branch_name>
# Perintah di atas akan mengambil perubahan dari remote branch yang sesuai dan menggabungkannya ke branch lokal Anda.

# Contoh:
git pull origin main
# Penjelasan dari kode di atas adalah bahwa perintah 'git pull origin main' akan mengambil perubahan dari branch 'main' di remote repository 'origin' dan menggabungkannya ke branch 'main' di repositori lokal Anda.
",
                'order_in_section' => 16
            ],
            [
                'section_id' => 15,
                'title' => 'Mengirim Tag',
                'description' => 'Untuk mengirim tag dari repositori lokal Anda ke remote repository, Anda dapat menggunakan perintah `git push <remote_name> <tag_name>`. Ini akan mengirimkan tag yang sesuai ke remote repository dengan nama yang ditentukan.',
                'code' => "
# Mengirim tag dari repositori lokal Anda ke remote repository
git push <remote_name> <tag_name>
# Perintah di atas akan mengirimkan tag yang sesuai ke remote repository dengan nama yang ditentukan.

# Contoh:
git push origin v1.0.0
# Penjelasan dari kode di atas adalah bahwa perintah 'git push origin v1.0.0' akan mengirimkan tag 'v1.0.0' dari repositori lokal Anda ke remote repository 'origin'.
",
                'order_in_section' => 17
            ],
            [
                'section_id' => 15,
                'title' => 'Mengirim Semua Tag',
                'description' => 'Untuk mengirim semua tag dari repositori lokal Anda ke remote repository, Anda dapat menggunakan perintah `git push <remote_name> --tags`. Ini akan mengirimkan semua tag yang ada di repositori lokal Anda ke remote repository dengan nama yang ditentukan.',
                'code' => "
# Mengirim semua tag dari repositori lokal Anda ke remote repository
git push <remote_name> --tags
# Perintah di atas akan mengirimkan semua tag yang ada di repositori lokal Anda ke remote repository dengan nama yang ditentukan.

# Contoh:
git push origin --tags
# Penjelasan dari kode di atas adalah bahwa perintah 'git push origin --tags' akan mengirimkan semua tag yang ada di repositori lokal Anda ke remote repository 'origin'.
",
                'order_in_section' => 18
            ],
            [
                'section_id' => 15,
                'title' => 'Mengambil Tag',
                'description' => 'Untuk mengambil tag dari remote repository ke repositori lokal Anda, Anda dapat menggunakan perintah `git fetch <remote_name> tag <tag_name>`. Ini akan mengambil tag yang sesuai dari remote repository dan menyimpannya di repositori lokal Anda.',
                'code' => "
# Mengambil tag dari remote repository ke repositori lokal Anda
git fetch <remote_name> tag <tag_name>
# Perintah di atas akan mengambil tag yang sesuai dari remote repository dan menyimpannya di repositori lokal Anda.

# Contoh:
git fetch origin tag v1.0.0
# Penjelasan dari kode di atas adalah bahwa perintah 'git fetch origin tag v1.0.0' akan mengambil tag 'v1.0.0' dari remote repository 'origin' dan menyimpannya di repositori lokal Anda.
",
                'order_in_section' => 19
            ],
            [
                'section_id' => 15,
                'title' => 'Mengambil Semua Tag',
                'description' => 'Untuk mengambil semua tag dari remote repository ke repositori lokal Anda, Anda dapat menggunakan perintah `git fetch <remote_name> --tags`. Ini akan mengambil semua tag yang ada di remote repository dan menyimpannya di repositori lokal Anda.',
                'code' => "
# Mengambil semua tag dari remote repository ke repositori lokal Anda
git fetch <remote_name> --tags
# Perintah di atas akan mengambil semua tag yang ada di remote repository dan menyimpannya di repositori lokal Anda.

# Contoh:
git fetch origin --tags
# Penjelasan dari kode di atas adalah bahwa perintah 'git fetch origin --tags' akan mengambil semua tag yang ada di remote repository 'origin' dan menyimpannya di repositori lokal Anda.
",
                'order_in_section' => 20
            ],
            [
                'section_id' => 15,
                'title' => 'Menghapus Tag',
                'description' => 'Untuk menghapus tag dari repositori lokal Anda, Anda dapat menggunakan perintah `git tag -d <tag_name>`. Ini akan menghapus tag yang sesuai dari repositori lokal Anda. Jika Anda ingin menghapus tag dari remote repository, Anda perlu menggunakan perintah `git push <remote_name> :refs/tags/<tag_name>` setelah menghapus tag secara lokal.',
                'code' => "
# Menghapus tag dari repositori lokal Anda
git tag -d <tag_name>
# Perintah di atas akan menghapus tag yang sesuai dari repositori lokal Anda.

# Contoh:
git tag -d v1.0.0
# Penjelasan dari kode di atas adalah bahwa perintah 'git tag -d v1.0.0' akan menghapus tag 'v1.0.0' dari repositori lokal Anda.

# Jika Anda ingin menghapus tag dari remote repository setelah menghapusnya secara lokal
git push <remote_name> :refs/tags/<tag_name>
# Perintah di atas akan menghapus tag yang sesuai dari remote repository setelah Anda menghapusnya secara lokal.

# Contoh:
git push origin :refs/tags/v1.0.0
# Penjelasan dari kode di atas adalah bahwa perintah 'git push origin :refs/tags/v1.0.0' akan menghapus tag 'v1.0.0' dari remote repository 'origin' setelah Anda menghapusnya secara lokal.
",
                'order_in_section' => 21
            ],
            [
                'section_id' => 15,
                'title' => 'Pull Request / Merge Request',
                'description' => 'Untuk membuat pull request atau merge request, Anda perlu menggunakan platform hosting kode seperti GitHub, GitLab, atau Bitbucket. Di platform ini, Anda akan menemukan fitur yang memungkinkan Anda membuat permintaan untuk menggabungkan perubahan dari branch Anda ke branch target.',
                'code' => "
# 1. Buka platform hosting kode (misalnya GitHub, GitLab, atau Bitbucket)
# 2. Pilih repositori Anda dan branch yang ingin Anda gabungkan (biasanya branch fitur) serta branch target (biasanya branch default seperti main atau master)
# 3. Gunakan tombol atau tautan yang disediakan untuk membuat pull request atau merge request
# 4. Berikan deskripsi yang jelas tentang perubahan yang Anda usulkan
# 5. Jika diperlukan, berikan penjelasan tambahan, komentar, atau meminta ulasan dari rekan tim Anda
# 6. Tunggu hingga pemilik repositori atau pengulas meninjau dan menyetujui pull request Anda
# 7. Setelah disetujui, perubahan Anda akan digabungkan ke branch target
# Selesai!

# Contoh:
git pull namaremote namabranch
# intinya pull itu mengambil updatean terbaru dari branch buat ditaro dilocal
# nah kalo misal kita set local branch a, terus pengen pull dari remote branch b , mending pake merge, jangan lupa di fetch terdahulu untuk mendapatkan update terbarunya
git merge namaremote/namabranch",
                'order_in_section' => 22
            ],
            [
                'section_id' => 15,
                'title' => 'Git Submodule',
                'description' => 'Submodule dalam Git adalah cara untuk menyertakan repositori Git lainnya di dalam repositori Git utama. Ini memungkinkan Anda untuk memasukkan proyek atau bagian proyek lain ke dalam proyek Anda tanpa harus menyalin seluruhnya ke dalam repositori utama.',
                'code' => "
# Menambahkan submodule ke repositori utama
git submodule add <url_repo> <lokasi_submodule>
# Perintah di atas akan menambahkan repositori submodule dengan URL yang ditentukan ke repositori utama di lokasi yang ditentukan.

# Menginisialisasi dan mengambil submodule setelah kloning repositori utama
git submodule init
git submodule update
# Perintah di atas akan menginisialisasi submodule yang ada di repositori utama dan mengambil semua data dari submodule yang diperlukan.

# Mengambil perubahan terbaru dari submodule setelah pembaruan
git submodule update --remote
# Perintah di atas akan mengambil perubahan terbaru dari submodule yang sudah diatur di repositori utama.

# Menghapus submodule dari repositori utama
git submodule deinit <lokasi_submodule>
git rm <lokasi_submodule>
# Perintah di atas akan menghapus konfigurasi submodule dan menghapusnya dari repositori utama.

# Catatan: Penggunaan submodule memerlukan manajemen tambahan dan perhatian terhadap versi, sehingga disarankan untuk digunakan dengan hati-hati.
",
                'order_in_section' => 22
            ],
            [
                'section_id' => 15,
                'title' => 'Mengaktifkan Submodule',
                'description' => 'Setelah menambahkan submodule ke repositori utama, Anda perlu mengaktifkannya agar submodule tersebut bisa digunakan. Anda dapat mengaktifkan submodule dengan menggunakan perintah `git submodule update --init --recursive`. Ini akan menginisialisasi dan mengambil semua submodule yang ada di repositori utama.',
                'code' => "
# Mengaktifkan semua submodule dalam repositori utama
git submodule update --init --recursive
# Perintah di atas akan mengaktifkan semua submodule dalam repositori utama, menginisialisasi jika belum, dan mengambil semua data submodule yang diperlukan.

# Jika Anda hanya ingin mengaktifkan submodule tertentu, gunakan:
git submodule update --init <lokasi_submodule>
# Perintah di atas akan mengaktifkan submodule yang ditentukan dalam repositori utama.
",
                'order_in_section' => 23
            ],
            [
                'section_id' => 15,
                'title' => 'Mengubah Branch Submodule',
                'description' => 'Untuk mengubah branch yang digunakan oleh submodule, Anda dapat melakukan langkah-langkah berikut:',
                'code' => "
# Navigasi ke direktori submodule
cd <lokasi_submodule>

# Pindah ke branch yang diinginkan
git checkout <nama_branch>

# Kembali ke repositori utama
cd ..

# Lakukan commit untuk merekam perubahan branch submodule yang baru
git commit -am 'Mengubah branch submodule ke <nama_branch>'

# Contoh lain:
git submodule set-branch --branch namabranch namafolder",
                'order_in_section' => 24
            ],
            [
                'section_id' => 16,
                'title' => 'Pengantar Docker',
                'description' => 'Penjelasan singkat tentang Docker',
                'code' => "
Docker adalah platform perangkat lunak yang memungkinkan pengembang untuk mengemas, mendistribusikan, dan menjalankan aplikasi di lingkungan yang terisolasi yang disebut kontainer. Kontainer Docker mengemas perangkat lunak bersama dengan semua hal yang dibutuhkannya untuk menjalankan, seperti kode, runtime, alat sistem, pustaka, dan pengaturan. Hal ini memastikan bahwa aplikasi akan berjalan dengan konsisten di berbagai lingkungan, mulai dari lingkungan pengembangan hingga produksi, tanpa khawatir tentang perbedaan infrastruktur atau konfigurasi sistem operasi.",
                'order_in_section' => 1,
            ],
            [
                'section_id' => 16,
                'title' => "Melihat Docker Image",
                'description' => "Docker Image adalah sebuah paket yang berisi semua yang diperlukan untuk menjalankan sebuah aplikasi, termasuk kode program, runtime, library, variabel lingkungan, dan file sistem yang diperlukan. Dapat dianggap sebagai sebuah blueprint atau cetakan dari sebuah container Docker. Docker Image biasanya dibuat dari sebuah Dockerfile yang berisi langkah-langkah untuk membangun image, seperti pengaturan lingkungan, instalasi dependensi, dan menyalin file ke dalam image.

                Docker Image bersifat immutable, artinya setelah dibuat, isinya tidak bisa diubah. Ketika Anda menjalankan Docker Container dari Docker Image, container tersebut berjalan di atas layer read-write yang terpisah, sehingga perubahan yang terjadi di dalam container tidak akan mempengaruhi Docker Image aslinya. Ini memungkinkan Anda untuk memiliki lingkungan yang konsisten dan dapat diulang di berbagai platform dan infrastruktur.

                Docker Image dapat disimpan dan didistribusikan melalui Docker Hub atau registry Docker lainnya. Hal ini memudahkan untuk berbagi dan mendistribusikan aplikasi dan lingkungan pengembangan dengan tim pengembang lainnya atau dengan komunitas secara umum.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah berikut untuk melihat daftar Docker image:
docker images

# Contoh output:
# REPOSITORY    TAG       IMAGE ID       CREATED       SIZE
# ubuntu        latest    4e2eef94cd6b   2 weeks ago   64.2MB
# alpine        latest    196d12cf6ab1   2 weeks ago   5.57MB

# Kesimpulan: Anda dapat melihat daftar Docker image yang ada di sistem dengan menggunakan perintah 'docker images'. Ini akan menampilkan daftar image beserta informasi seperti nama repository, tag, ID image, kapan dibuat, dan ukuran.

# Contoh lain
docker image ls
docker image ls | grep namanya
docker image ls | grep path # maka akan muncul yang awalan : path/a , path/b",
                'order_in_section' => 2,
            ],
            [
                'title' => "Download Docker Image",
                'section_id' => 16,
                'description' => "Menjelaskan cara untuk mengunduh Docker image dari Docker Hub atau registry Docker lainnya.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker pull' diikuti dengan nama Docker image yang ingin Anda unduh.
docker pull <nama_image>:<tag>

# Contoh:
docker pull ubuntu:latest

# Jika tidak ada tag yang ditentukan, maka tag 'latest' akan diunduh secara default.

# Kesimpulan: Anda dapat mengunduh Docker image menggunakan perintah 'docker pull'. Pastikan untuk menentukan nama image dan tagnya jika tidak ingin menggunakan tag 'latest' secara default.
",
                'order_in_section' => 3,
            ],
            [
                'section_id' => 16,
                'title' => "Menghapus Docker Image",
                'description' => "Menguraikan langkah-langkah untuk menghapus Docker image dari sistem Anda.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker images' untuk melihat daftar Docker image yang ada di sistem.

# Langkah 3: Identifikasi ID atau nama Docker image yang ingin Anda hapus dari daftar yang ditampilkan.

# Langkah 4: Jalankan perintah 'docker rmi' diikuti dengan ID atau nama Docker image yang ingin Anda hapus.
docker rmi <image_id_or_name>

# Contoh:
docker rmi 4e2eef94cd6b
# atau
docker rmi ubuntu:latest

# Kesimpulan: Anda dapat menghapus Docker image dari sistem dengan menggunakan perintah 'docker rmi', diikuti dengan ID atau nama image yang ingin dihapus.
",
                'order_in_section' => 4,
            ],
            [
                'section_id' => 16,
                'title' => "Melihat Semua Container Docker",
                'description' => "Container Docker adalah lingkungan terisolasi yang menjalankan sebuah aplikasi atau layanan, berdasarkan Docker Image. Container Docker menjalankan aplikasi dalam lingkungan yang konsisten dan portabel, dengan menggunakan teknologi virtualisasi di tingkat sistem operasi.

Setiap container Docker menjalankan sebuah instance dari Docker Image yang telah ditentukan sebelumnya. Container ini berisi semua yang diperlukan untuk menjalankan aplikasi, termasuk file sistem, runtime, kode program, dan library, namun berjalan terpisah dari lingkungan host. Ini memastikan bahwa aplikasi dalam container beroperasi dengan cara yang konsisten, independen dari konfigurasi atau lingkungan host.

Keuntungan utama dari menggunakan container Docker adalah portabilitas, skalabilitas, dan efisiensi. Container Docker dapat dengan mudah dipindahkan antara lingkungan pengembangan, produksi, dan cloud tanpa perlu mengubah kode atau konfigurasi. Mereka juga memungkinkan untuk menjalankan aplikasi secara efisien, dengan membagi sumber daya komputasi host secara dinamis antara container-container yang berjalan.

Selain itu, container Docker memungkinkan pengembang untuk mengisolasi aplikasi mereka dari lingkungan host, sehingga mengurangi risiko konflik atau kegagalan yang disebabkan oleh aplikasi lain yang berjalan pada sistem yang sama. Ini juga memungkinkan untuk menjalankan banyak aplikasi dalam konteks yang sama, dengan tetap mempertahankan tingkat isolasi yang diperlukan.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah berikut untuk melihat daftar semua container Docker:
docker ps -a

# Contoh output:
# CONTAINER ID   IMAGE         COMMAND                  CREATED          STATUS                     PORTS      NAMES
# f7a358d8af17   nginx:latest  \"nginx -g 'daemon of…\"   2 minutes ago    Up 2 minutes               80/tcp     web_server
# 4e2eef94cd6b   ubuntu:latest \"bash\"                   3 weeks ago      Exited (0) 3 weeks ago               ubuntu_container

# Kesimpulan: Anda dapat melihat daftar semua container Docker, termasuk yang sedang berjalan dan yang telah berhenti, dengan menggunakan perintah 'docker ps -a'.
",
                'order_in_section' => 5,
            ],
            [
                'section_id' => 16,
                'title' => "Melihat Container Docker yang Sedang Berjalan",
                'description' => "Memberikan langkah-langkah untuk melihat daftar container Docker yang sedang berjalan di sistem Anda.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah berikut untuk melihat daftar container Docker yang sedang berjalan:
docker ps

# Contoh output:
# CONTAINER ID   IMAGE         COMMAND                  CREATED          STATUS          PORTS      NAMES
# f7a358d8af17   nginx:latest  \"nginx -g 'daemon of…\"   2 minutes ago    Up 2 minutes    80/tcp     web_server

# Kesimpulan: Anda dapat melihat daftar container Docker yang sedang berjalan dengan menggunakan perintah 'docker ps'.
",
                'order_in_section' => 6,
            ],
            [
                'section_id' => 16,
                'title' => "Membuat Container Docker",
                'description' => "Memberikan langkah-langkah untuk membuat container Docker dari sebuah image.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker run' diikuti dengan nama Docker image yang ingin Anda gunakan untuk membuat container.
docker run <nama_image>

# Contoh:
docker run ubuntu

# Jika Anda ingin memberi nama pada container yang dibuat, tambahkan opsi '--name' diikuti dengan nama yang Anda inginkan.
docker run --name my_container ubuntu

# Kesimpulan: Anda dapat membuat container Docker dari sebuah image dengan menggunakan perintah 'docker run'. Pastikan untuk menentukan nama image yang ingin Anda gunakan, dan tambahkan opsi lain seperti '--name' jika diperlukan.

# Contoh lain:
docker container create --name namacontainer namaimage:tag",
                'order_in_section' => 7,
            ],
            [
                'section_id' => 16,
                'title' => "Menjalankan Container Docker",
                'description' => "Memberikan langkah-langkah untuk menjalankan sebuah container Docker yang sudah dibuat sebelumnya.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker start' diikuti dengan nama atau ID container yang ingin Anda jalankan.
docker start <nama_container_or_ID>

# Contoh:
docker start my_container

# Kesimpulan: Anda dapat menjalankan sebuah container Docker yang sudah dibuat sebelumnya dengan menggunakan perintah 'docker start'. Pastikan untuk menentukan nama atau ID container yang ingin Anda jalankan.

# Contoh lain:
docker container start containerId(atau bisa juga namacontainer)",
                'order_in_section' => 8,
            ],
            [
                'section_id' => 16,
                'title' => "Menghapus Container Docker",
                'description' => "Menjelaskan langkah-langkah untuk menghapus container Docker yang tidak dibutuhkan lagi.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker ps -a' untuk melihat daftar semua container, termasuk yang sedang berjalan dan yang telah berhenti.

# Langkah 3: Identifikasi nama atau ID container yang ingin Anda hapus dari daftar yang ditampilkan.

# Langkah 4: Jalankan perintah 'docker rm' diikuti dengan nama atau ID container yang ingin Anda hapus.
docker rm <nama_container_or_ID>

# Contoh:
docker rm my_container

# Kesimpulan: Anda dapat menghapus container Docker yang tidak dibutuhkan lagi dengan menggunakan perintah 'docker rm', diikuti dengan nama atau ID container yang ingin Anda hapus.

# Contoh lain:
docker container rm containerId/namacontainer ",
                'order_in_section' => 9,
            ],
            [
                'section_id' => 16,
                'title' => "Melihat Log Container Docker",
                'description' => "Log Container Docker adalah catatan yang mencatat semua kejadian dan aktivitas yang terjadi di dalam sebuah container Docker selama masa eksekusi. Log ini dapat mencakup berbagai informasi, seperti pesan debugging, output dari aplikasi yang berjalan di dalam container, informasi tentang permintaan HTTP yang diterima, dan lain sebagainya.

Mengakses log container Docker dapat membantu dalam pemecahan masalah, pemantauan kesehatan aplikasi, dan pelacakan aktivitas sistem.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker logs' diikuti dengan nama atau ID container yang log-nya ingin Anda lihat.
docker logs <nama_container_or_ID>

# Contoh:
docker logs my_container

# Jika Anda ingin melihat log secara real-time (live), tambahkan opsi '-f' atau '--follow'.
docker logs -f my_container

# Kesimpulan: Anda dapat melihat log dari sebuah container Docker dengan menggunakan perintah 'docker logs', diikuti dengan nama atau ID container. Jika ingin log secara real-time, tambahkan opsi '-f' atau '--follow'.

# Contoh lain:
docker container logs containerId/namacontainer",
                'order_in_section' => 10,
            ],
            [
                'section_id' => 16,
                'title' => "Melihat Log Container Docker Secara Realtime",
                'description' => "Menjelaskan cara untuk melihat log secara realtime dari sebuah container Docker.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker logs' diikuti dengan opsi '-f' atau '--follow' dan nama atau ID container yang log-nya ingin Anda lihat secara realtime.
docker logs -f <nama_container_or_ID>

# Contoh:
docker logs -f my_container

# Kesimpulan: Anda dapat melihat log dari sebuah container Docker secara realtime dengan menggunakan perintah 'docker logs' dan menambahkan opsi '-f' atau '--follow', diikuti dengan nama atau ID container.

# Contoh lain:
docker container logs -f containerId/namacontainer",
                'order_in_section' => 11,
            ],
            [
                'section_id' => 16,
                'title' => "Masuk ke Dalam Container dengan 'docker exec'",
                'description' => "'docker exec' adalah perintah yang digunakan untuk mengeksekusi perintah di dalam sebuah container Docker yang sudah berjalan. Dengan menggunakan docker exec, Anda dapat menjalankan perintah tertentu di dalam sebuah container tanpa perlu masuk ke dalam container itu sendiri.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker exec' diikuti dengan opsi '-it' (untuk mode interaktif) dan nama atau ID container yang ingin Anda masuki, serta perintah yang ingin Anda jalankan di dalam container.
docker exec -it <nama_container_or_ID> <perintah>

# Contoh:
docker exec -it my_container bash

# Ini akan membuka shell interaktif di dalam container 'my_container'.

# Kesimpulan: Anda dapat masuk ke dalam sebuah container Docker yang sudah berjalan menggunakan perintah 'docker exec', dengan menambahkan opsi '-it' dan nama atau ID container, serta perintah yang ingin Anda jalankan di dalam container.

# Contoh dan penjelasan lain:
docker container exec -i -t containerId/namacontainer /bin/bash
# i adalah argument interaktif, menjaga input tetap aktif
# t adalah argument untuk alokasi pseudo-TTY/terminal akses
# dan /bin/bash contoh kode program yang terdapat didalam container
# docker container exec -i -t contoh /bin/bash",
                'order_in_section' => 12,
            ],
            [
                'section_id' => 16,
                'title' => 'Melakukan Port Forwading',
                'description' => "Port forwarding pada container Docker adalah proses mengalihkan atau meneruskan lalu lintas jaringan dari satu port di host mesin ke port lain di dalam container Docker. Ini memungkinkan aplikasi atau layanan yang berjalan di dalam container Docker dapat diakses dari luar melalui port tertentu di host mesin.

Dalam konteks pengembangan perangkat lunak, port forwarding sangat berguna ketika Anda ingin menguji aplikasi yang berjalan di dalam container Docker dari browser atau perangkat lain di jaringan Anda. Dengan melakukan port forwarding, Anda bisa mengakses aplikasi tersebut melalui browser atau alamat IP host dan port tertentu yang ditentukan saat port forwarding dilakukan.

Secara teknis, port forwarding dalam Docker dilakukan dengan menentukan opsi -p atau --publish ketika menjalankan container Docker, diikuti dengan port host yang akan diteruskan dan port container yang ingin Anda teruskan.",
                'code' => "- docker container create --name namacontainer --publish posthost:portcontainer image:tag
- lebih dari satu tambahkan dua kali parameter --publish
- publish juga bisa disingkat menggunakan -p",
                'order_in_section' => 13,
            ],
            [
                'section_id' => 16,
                'title' => "Menambah Environment Variable pada Container Docker",
                'description' => "Env variable pada container Docker adalah variabel yang digunakan untuk mengatur konfigurasi dan perilaku aplikasi di dalam container. Mereka bisa berupa nama-nilai pasangan yang menyimpan informasi seperti kata sandi, kunci API, jalur file, dan lainnya.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker run' dengan opsi '-e' diikuti dengan nama variabel dan nilainya, diikuti dengan nama Docker image.
docker run -e <NAMA_VARIABEL>=<NILAI> <nama_image>

# Contoh:
docker run -e MYSQL_ROOT_PASSWORD=secret mysql

# Ini akan menambahkan variabel lingkungan 'MYSQL_ROOT_PASSWORD' dengan nilai 'secret' ke dalam container MySQL yang berjalan.

# Kesimpulan: Anda dapat menambahkan variabel lingkungan ke dalam sebuah container Docker dengan menggunakan opsi '-e' pada perintah 'docker run'. Pastikan untuk menentukan nama variabel dan nilainya sesuai kebutuhan.

# Penjelasan lain:
docker container create --name namacontainer --env KEY=value --env KEY2=value image:tag",
                'order_in_section' => 14,
            ],
            [
                'section_id' => 16,
                'title' => "Melihat Container Stats pada Docker",
                'description' => "Container stats adalah informasi yang menyajikan statistik tentang penggunaan sumber daya (CPU, memori, I/O, dan lain-lain) dari sebuah container Docker.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker stats' diikuti dengan nama atau ID container yang ingin Anda lihat statistiknya.
docker stats <nama_container_or_ID>

# Contoh:
docker stats my_container

# Ini akan menampilkan statistik penggunaan sumber daya dari container 'my_container' secara real-time.

# Kesimpulan: Anda dapat melihat statistik penggunaan sumber daya dari sebuah container Docker dengan menggunakan perintah 'docker stats', diikuti dengan nama atau ID container yang ingin Anda lihat statistiknya.
",
                'order_in_section' => 15,
            ],
            [
                'section_id' => 16,
                'title' => "Menentukan Batas Memori pada Container Docker",
                'description' => "Menjelaskan cara untuk menetapkan batas memori yang digunakan oleh sebuah container Docker.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker run' dengan opsi '--memory' diikuti dengan jumlah memori yang ingin Anda tetapkan, diikuti dengan nama Docker image.
docker run --memory=<jumlah_memori> <nama_image>

# Contoh:
docker run --memory=1g nginx

# Ini akan menjalankan container Nginx dengan batas memori sebesar 1 GB.

# Kesimpulan: Anda dapat menetapkan batas memori yang digunakan oleh sebuah container Docker dengan menggunakan opsi '--memory' pada perintah 'docker run'. Pastikan untuk menentukan jumlah memori yang sesuai dengan kebutuhan aplikasi Anda.

# Contoh lain:
docker container create --name contoh --memory 100m/100k/100g -- cpus 0.5 --publish 8081:80 image:tag",
                'order_in_section' => 16,
            ],
            [
                'section_id' => 16,
                'title' => "Bind Mount pada Container Docker",
                'description' => "Bind Mount adalah mekanisme yang memungkinkan Anda untuk memasang direktori dari host mesin ke dalam sebuah container Docker, sehingga direktori tersebut dapat diakses oleh container.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker run' dengan opsi '-v' atau '--volume' diikuti dengan path dari direktori host dan path di dalam container, diikuti dengan nama Docker image.
docker run -v <path_host>:<path_container> <nama_image>

# Contoh:
docker run -v /host/directory:/container/directory nginx

# Ini akan memasang direktori '/host/directory' dari host mesin ke dalam '/container/directory' di dalam container Nginx.

# Kesimpulan: Anda dapat menggunakan bind mount untuk memasang direktori dari host mesin ke dalam sebuah container Docker dengan menggunakan opsi '-v' atau '--volume' pada perintah 'docker run'. Ini memungkinkan container untuk mengakses dan memanipulasi data yang berada di luar container.

# Penjelasan tambahan:
# merupakan kemampuan melakukan mounting(sharing) file atau folder yang terdapat di sistem host ke container yang terdapat di docker
# fitur ini sangat berguna ketitka misal kita ingin mengirim konfigurasi dari luar container atau misal menyimpan data yang dibuat di aplikasi di dalam container ke dalam folder di sistem host
# type : bind atau volume
# source : lokasi file atau folder di sistem host (maksudnya nanti datanya mau disimpen di folder local komputer kita, jadi buat dulu foldernya)
# destination : lokasi file atau folder di container (liat di docker.hub dimana tempat simpen data sesuai image misal mysql)
# readonly : jika ada, maka file atau folder hanya bisa dibaca dicontainer, tidak bisa ditulis",
                'order_in_section' => 17,
            ],
            [
                'section_id' => 16,
                'title' => "Melakukan Mounting pada Container Docker",
                'description' => "Mounting adalah proses mengaitkan atau menghubungkan sebuah direktori dari host mesin ke dalam sebuah container Docker, sehingga data dapat diakses dan dimanipulasi oleh container.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker run' dengan opsi '-v' atau '--volume' diikuti dengan path dari direktori host dan path di dalam container, diikuti dengan nama Docker image.
docker run -v <path_host>:<path_container> <nama_image>

# Contoh:
docker run -v /host/directory:/container/directory nginx

# Ini akan melakukan mounting dari direktori '/host/directory' dari host mesin ke dalam '/container/directory' di dalam container Nginx.

# Kesimpulan: Anda dapat melakukan mounting pada container Docker dengan menggunakan opsi '-v' atau '--volume' pada perintah 'docker run'. Ini memungkinkan untuk menghubungkan direktori dari host mesin ke dalam container, sehingga data dapat diakses oleh container tersebut.

# Contoh tambahan:
docker conainer create --name namacontainer --mount type=bind,source=folder,destination=folder,readonly image:tag",
                'order_in_section' => 18,
            ],
            [
                'section_id' => 16,
                'title' => "Volume pada Container Docker",
                'description' => "Volume adalah mekanisme yang memungkinkan Anda untuk menyimpan data di luar dari container, tetapi tetap dapat diakses oleh container tersebut.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker run' dengan opsi '-v' atau '--volume' diikuti dengan nama volume yang ingin Anda buat, diikuti dengan nama Docker image.
docker run -v <nama_volume>:/path/container <nama_image>

# Contoh:
docker run -v my_volume:/app/data nginx

# Ini akan membuat volume dengan nama 'my_volume' dan memasangnya ke dalam '/app/data' di dalam container Nginx.

# Kesimpulan: Anda dapat menggunakan volume untuk menyimpan data di luar dari container Docker dengan menggunakan opsi '-v' atau '--volume' pada perintah 'docker run'. Ini memungkinkan data tetap ada bahkan setelah container dihapus, dan memudahkan untuk berbagi data antar container.
",
                'order_in_section' => 19,
            ],
            [
                'section_id' => 16,
                'title' => "Melihat Docker Volume",
                'description' => "Menjelaskan cara untuk melihat daftar volume yang ada pada Docker.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker volume ls' untuk melihat daftar volume yang ada.
docker volume ls

# Contoh output:
# DRIVER    VOLUME NAME
# local     my_volume
# local     another_volume

# Kesimpulan: Anda dapat melihat daftar volume yang ada pada Docker dengan menggunakan perintah 'docker volume ls'. Ini akan menampilkan nama-nama volume yang ada beserta informasi lainnya seperti driver yang digunakan.

# keuntungan menggunakan volume adalah, jika container kita hapus, data akan tetap aman di volume",
                'order_in_section' => 20,
            ],
            [
                'section_id' => 16,
                'title' => "Membuat Volume pada Docker",
                'description' => "Menjelaskan cara untuk membuat volume baru pada Docker.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker volume create' diikuti dengan nama volume yang ingin Anda buat.
docker volume create <nama_volume>

# Contoh:
docker volume create my_volume

# Ini akan membuat volume baru dengan nama 'my_volume'.

# Kesimpulan: Anda dapat membuat volume baru pada Docker dengan menggunakan perintah 'docker volume create'. Ini akan membuat volume yang dapat digunakan oleh container untuk menyimpan dan berbagi data.",
                'order_in_section' => 21,
            ],
            [
                'section_id' => 16,
                'title' => "Menghapus Volume pada Docker",
                'description' => "Menjelaskan cara untuk menghapus volume yang tidak lagi diperlukan pada Docker.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker volume rm' diikuti dengan nama volume yang ingin Anda hapus.
docker volume rm <nama_volume>

# Contoh:
docker volume rm my_volume

# Ini akan menghapus volume dengan nama 'my_volume'.

# Kesimpulan: Anda dapat menghapus volume yang tidak lagi diperlukan pada Docker dengan menggunakan perintah 'docker volume rm'. Pastikan untuk menentukan nama volume yang ingin Anda hapus.",
                'order_in_section' => 22,
            ],
            [
                'section_id' => 16,
                'title' => "Membuat Container dengan Menggunakan Volume pada Docker",
                'description' => "Menjelaskan cara untuk membuat container Docker yang menggunakan volume untuk menyimpan dan berbagi data.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker run' dengan opsi '-v' atau '--volume' diikuti dengan nama volume dan path di dalam container yang ingin Anda pasangkan, diikuti dengan nama Docker image.
docker run -v <nama_volume>:<path_container> <nama_image>

# Contoh:
docker run -v my_volume:/app/data nginx

# Ini akan membuat container Nginx dan memasang volume 'my_volume' ke dalam '/app/data' di dalam container.

# Kesimpulan: Anda dapat membuat container Docker yang menggunakan volume untuk menyimpan dan berbagi data dengan menggunakan opsi '-v' atau '--volume' pada perintah 'docker run'. Ini memungkinkan data untuk tetap ada bahkan setelah container dihapus, dan memudahkan untuk berbagi data antar container.

# Penjelasan lain:
# bikin volume terlebih dahulu
docker container create --name mysqlvolume --mount \"type=volume,source=nama_volume,destination=/var/lib/mysql\" image:tag",
                'order_in_section' => 23,
            ],
            [
                'section_id' => 16,
                'title' => "Tahapan Melakukan Backup Volume pada Docker",
                'description' => "Menjelaskan langkah-langkah untuk melakukan backup volume yang terkait dengan container Docker.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Identifikasi nama atau ID volume yang ingin Anda backup dengan menjalankan perintah 'docker volume ls' untuk melihat daftar volume yang ada.

# Langkah 3: Pastikan bahwa container yang menggunakan volume tersebut tidak sedang berjalan. Anda bisa menonaktifkan container dengan perintah 'docker stop <nama_container>' jika perlu.

# Langkah 4: Gunakan perintah 'docker run' dengan opsi '-v' atau '--volume' untuk membuat container sementara yang menggunakan volume yang ingin Anda backup, serta container yang memiliki akses ke direktori tujuan backup di dalamnya.

# Langkah 5: Dalam container sementara tersebut, gunakan perintah seperti 'tar' atau 'rsync' untuk menyalin data dari volume ke direktori tujuan backup di dalam container.

# Langkah 6: Setelah selesai, Anda bisa mengekspor data backup ke dalam file atau menyimpannya di lokasi yang diinginkan di dalam container sementara.

# Langkah 7: Hapus container sementara setelah selesai backup dengan perintah 'docker rm <nama_container>'.

# Kesimpulan: Tahapan untuk melakukan backup volume pada Docker melibatkan pembuatan container sementara yang menggunakan volume yang ingin Anda backup, menyalin data dari volume ke direktori tujuan backup di dalam container, dan mengekspor data backup dari container sementara setelah selesai. Pastikan bahwa tidak ada container yang sedang menggunakan volume tersebut saat melakukan backup.

# Penjelasan lain:
# Matikan container yang menggunakan volume yang ingin kita backup
# buat container baru dengan dua mount, volume yang ingin kita backup, dan bind mount folder dari sistem host
# lakukan backup menggunakan container dengan cara mengarchive isi volume, dan simpan di bind mount folder
# isi file backup sekarang ada di folder sistem host
# delete container yang kita gunakan untuk melakukan backup",
                'order_in_section' => 24,
            ],
            [
                'section_id' => 16,
                'title' => "Membuat Backup Container pada Docker",
                'description' => "Menjelaskan langkah-langkah untuk membuat backup dari sebuah container Docker.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Pastikan bahwa container yang ingin Anda backup tidak sedang berjalan. Anda bisa menonaktifkan container dengan perintah 'docker stop <nama_container>' jika perlu.

# Langkah 3: Gunakan perintah 'docker commit' diikuti dengan nama atau ID container yang ingin Anda backup, diikuti dengan nama untuk image hasil backup.
docker commit <nama_container_or_ID> <nama_image_backup>

# Contoh:
docker commit my_container my_container_backup

# Ini akan membuat image baru dengan nama 'my_container_backup' yang berisi snapshot dari container 'my_container'.

# Langkah 4: (Opsional) Jika Anda ingin menyimpan image backup tersebut di Docker Hub atau registry Docker lainnya, Anda bisa melakukan push dengan perintah 'docker push <nama_image_backup>'.

# Kesimpulan: Anda dapat membuat backup dari sebuah container Docker dengan menggunakan perintah 'docker commit' untuk membuat image snapshot dari container tersebut. Pastikan bahwa container yang ingin Anda backup tidak sedang berjalan.

# Penjelasan lain:
docker container create --name namanya --mount \"type=bind,source=tempatnya/backup,destination=/backup\" --mount \"type=volume,source=namavolume,destination=/var/lib/mysql\" ",
                'order_in_section' => 25,
            ],
            [
                'section_id' => 16,
                'title' => "Melakukan Backup Container secara Langsung pada Docker",
                'description' => "Menjelaskan langkah-langkah untuk melakukan backup langsung dari sebuah container Docker tanpa membuat image snapshot.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Pastikan bahwa container yang ingin Anda backup tidak sedang berjalan. Anda bisa menonaktifkan container dengan perintah 'docker stop <nama_container>' jika perlu.

# Langkah 3: Gunakan perintah 'docker export' diikuti dengan nama atau ID container yang ingin Anda backup, dan nama file untuk menyimpan hasil backup.
docker export <nama_container_or_ID> > <nama_file_backup>.tar

# Contoh:
docker export my_container > my_container_backup.tar

# Ini akan membuat file 'my_container_backup.tar' yang berisi snapshot dari filesystem dari container 'my_container'.

# Kesimpulan: Anda dapat melakukan backup langsung dari sebuah container Docker dengan menggunakan perintah 'docker export' untuk menyimpan snapshot dari filesystem container ke dalam file tar. Pastikan bahwa container yang ingin Anda backup tidak sedang berjalan.

# Penjelasan lain:
# langkah pertama stop container
# backup manual agak ribet karena harus start container, terus hapus dll
# --rm hapus container setelah perintahnya berjalan
# docker container run --rm --name ubuntu --mount \"type=bind,source=D:\\file\website\backup_mysql,destination=backup_mysql\" --mount \"type=volume,source=volume_mysql,destination=/var/lib/mysql\"",
                'order_in_section' => 26,
            ],
            [
                'section_id' => 16,
                'title' => "Backup Database MySQL pada Container Docker",
                'description' => "Menjelaskan langkah-langkah untuk melakukan backup database MySQL yang berjalan dalam sebuah container Docker.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Pastikan bahwa container MySQL tidak sedang berjalan. Anda bisa menonaktifkan container dengan perintah 'docker stop <nama_container_mysql>' jika perlu.

# Langkah 3: Gunakan perintah 'docker exec' untuk menjalankan perintah 'mysqldump' di dalam container MySQL, dan arahkan outputnya ke file backup.
docker exec <nama_container_mysql> mysqldump -u <username> -p<password> <nama_database> > <nama_file_backup>.sql

# Contoh:
docker exec my_mysql_container mysqldump -u root -psecret my_database > my_database_backup.sql

# Ini akan membuat file 'my_database_backup.sql' yang berisi dump dari database 'my_database' yang berada di dalam container MySQL.

# Kesimpulan: Anda dapat melakukan backup database MySQL yang berjalan di dalam sebuah container Docker dengan menggunakan perintah 'docker exec' untuk menjalankan perintah 'mysqldump' di dalam container. Pastikan bahwa container MySQL tidak sedang berjalan saat melakukan backup.

# Contoh lain:
docker exec mysql_volume /usr/bin/mysqldump -u root --password=root nama_database > \"D:\\file\website\belajar_docker\mysql_backup\data.sql\"",
                'order_in_section' => 27,
            ],
            [
                'section_id' => 16,
                'title' => "Restore Database MySQL pada Container Docker",
                'description' => "Menjelaskan langkah-langkah untuk melakukan restore database MySQL yang berjalan dalam sebuah container Docker dari file backup.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Pastikan bahwa container MySQL tidak sedang berjalan. Anda bisa menonaktifkan container dengan perintah 'docker stop <nama_container_mysql>' jika perlu.

# Langkah 3: Gunakan perintah 'docker exec' untuk menjalankan perintah 'mysql' di dalam container MySQL, dan arahkan inputnya dari file backup.
docker exec -i <nama_container_mysql> mysql -u <username> -p<password> <nama_database> < <nama_file_backup>.sql

# Contoh:
docker exec -i my_mysql_container mysql -u root -psecret my_database < my_database_backup.sql

# Ini akan mengembalikan database 'my_database' yang berada di dalam container MySQL menggunakan file backup 'my_database_backup.sql'.

# Kesimpulan: Anda dapat melakukan restore database MySQL yang berjalan di dalam sebuah container Docker dengan menggunakan perintah 'docker exec' untuk menjalankan perintah 'mysql' di dalam container, dengan mengarahkan inputnya dari file backup. Pastikan bahwa container MySQL tidak sedang berjalan saat melakukan restore.

# Contoh lain
cat \"D:\\file\website\belajar_docker\mysql_backup\data.sql\" | docker exec -i mysql /usr/bin/mysql -u root --password=root nama_database",
                'order_in_section' => 28,
            ],
            [
                'section_id' => 16,
                'title' => "Docker Network",
                'description' => "Docker Network adalah mekanisme yang memungkinkan container-container Docker untuk berkomunikasi satu sama lain, serta dengan host mesin dan jaringan eksternal lainnya.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker network ls' untuk melihat daftar network yang ada.
docker network ls

# Contoh output:
# NETWORK ID     NAME      DRIVER    SCOPE
# abc123         bridge    bridge    local
# def456         host      host      local
# ghi789         my_net    bridge    local

# Kesimpulan: Docker Network adalah mekanisme yang memungkinkan container-container Docker untuk berkomunikasi satu sama lain, serta dengan host mesin dan jaringan eksternal lainnya. Anda dapat melihat daftar network yang ada dengan menggunakan perintah 'docker network ls'.
",
                'order_in_section' => 29,
            ],
            [
                'section_id' => 16,
                'title' => "Melihat Docker Network",
                'description' => "Menjelaskan cara untuk melihat informasi tentang sebuah Docker network tertentu.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker network inspect' diikuti dengan nama Docker network yang ingin Anda lihat informasinya.
docker network inspect <nama_network>

# Contoh:
docker network inspect bridge

# Ini akan menampilkan informasi rinci tentang network 'bridge' yang digunakan secara default oleh Docker.

# Kesimpulan: Anda dapat melihat informasi rinci tentang sebuah Docker network dengan menggunakan perintah 'docker network inspect'. Ini akan menampilkan konfigurasi dan detail lainnya tentang network tersebut.
",
                'order_in_section' => 30,
            ],
            [
                'section_id' => 16,
                'title' => "Membuat Docker Network",
                'description' => "Menjelaskan langkah-langkah untuk membuat Docker network baru.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker network create' diikuti dengan opsi-opsi yang diperlukan dan nama untuk network yang ingin Anda buat.
docker network create <nama_network>

# Contoh:
docker network create my_network

# Ini akan membuat Docker network baru dengan nama 'my_network'.

# Kesimpulan: Anda dapat membuat Docker network baru dengan menggunakan perintah 'docker network create'. Ini akan membuat network yang dapat digunakan oleh container-container Docker untuk berkomunikasi satu sama lain.

# Contoh lain
docker network create --driver bridge nama_network",
                'order_in_section' => 31
            ],
            [
                'section_id' => 16,
                'title' => "Menghapus Docker Network",
                'description' => "Menjelaskan langkah-langkah untuk menghapus Docker network yang tidak lagi diperlukan.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Pastikan bahwa tidak ada container yang menggunakan network yang ingin Anda hapus. Anda dapat menggunakan perintah 'docker network ls' untuk melihat daftar network yang digunakan oleh container.

# Langkah 3: Jalankan perintah 'docker network rm' diikuti dengan nama Docker network yang ingin Anda hapus.
docker network rm <nama_network>

# Contoh:
docker network rm my_network

# Ini akan menghapus Docker network dengan nama 'my_network'.

# Kesimpulan: Anda dapat menghapus Docker network yang tidak lagi diperlukan dengan menggunakan perintah 'docker network rm'. Pastikan bahwa tidak ada container yang menggunakan network tersebut sebelum Anda menghapusnya.

# network tidak bisa dihapus jika sudah digunakan oleh container",
                'order_in_section' => 32
            ],
            [
                'section_id' => 16,
                'title' => "Container Network pada Docker",
                'description' => "Container Network adalah mekanisme yang memungkinkan container-container Docker untuk berkomunikasi satu sama lain, serta dengan host mesin dan jaringan eksternal lainnya.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker network ls' untuk melihat daftar network yang ada.
docker network ls

# Contoh output:
# NETWORK ID     NAME      DRIVER    SCOPE
# abc123         bridge    bridge    local
# def456         host      host      local
# ghi789         my_net    bridge    local

# Kesimpulan: Container Network adalah mekanisme yang memungkinkan container-container Docker untuk berkomunikasi satu sama lain, serta dengan host mesin dan jaringan eksternal lainnya. Anda dapat melihat daftar network yang ada dengan menggunakan perintah 'docker network ls'.

# Contoh lain:
dcoker container create --nama nama_container --network nama_network image:tag",
                'order_in_section' => 33
            ],
            [
                'section_id' => 16,
                'title' => "Menghapus Container dari Docker Network",
                'description' => "Menjelaskan langkah-langkah untuk menghapus sebuah container dari Docker network.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker network disconnect' diikuti dengan nama Docker network dan nama atau ID container yang ingin Anda hapus dari network tersebut.
docker network disconnect <nama_network> <nama_container>

# Contoh:
docker network disconnect my_network my_container

# Ini akan menghapus container 'my_container' dari Docker network 'my_network'.

# Kesimpulan: Anda dapat menghapus sebuah container dari Docker network dengan menggunakan perintah 'docker network disconnect'. Ini akan memisahkan container dari network yang ditentukan.

# Contoh lain:
docker network disconnect namanetwork namacontainer",
                'order_in_section' => 34
            ],
            [
                'section_id' => 16,
                'title' => "Menambah Container ke Docker Network",
                'description' => "Menjelaskan langkah-langkah untuk menambahkan sebuah container ke Docker network.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker network connect' diikuti dengan nama Docker network dan nama atau ID container yang ingin Anda tambahkan ke network tersebut.
docker network connect <nama_network> <nama_container>

# Contoh:
docker network connect my_network my_container

# Ini akan menambahkan container 'my_container' ke Docker network 'my_network'.

# Kesimpulan: Anda dapat menambahkan sebuah container ke Docker network dengan menggunakan perintah 'docker network connect'. Ini akan menyatukan container dengan network yang ditentukan.

# Contoh lain:
docker network connect namanetwork namacontainer",
                'order_in_section' => 35
            ],
            [
                'section_id' => 16,
                'title' => "Inspect / Detail pada Docker",
                'description' => "Menjelaskan cara untuk melihat detail atau informasi lengkap tentang berbagai objek dalam Docker seperti container, image, volume, atau network.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker inspect' diikuti dengan nama atau ID objek yang ingin Anda lihat detailnya.
docker inspect <nama_objek>

# Contoh:
docker inspect my_container

# Ini akan menampilkan informasi lengkap tentang container 'my_container', termasuk konfigurasi, pengaturan, dan detail lainnya.

# Kesimpulan: Anda dapat melihat detail atau informasi lengkap tentang berbagai objek dalam Docker seperti container, image, volume, atau network dengan menggunakan perintah 'docker inspect'.

# Contoh lain:
docker container inspect nama_container
docker image inspect nama_image
docker volume inspect nama_volume
docker network inspect nama_network",
                'order_in_section' => 36
            ],
            [
                'section_id' => 16,
                'title' => "Prune pada Docker",
                'description' => "Prune adalah perintah yang digunakan untuk membersihkan objek-objek yang tidak digunakan lagi dalam Docker seperti container, image, volume, dan network.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker system prune' untuk membersihkan objek-objek yang tidak digunakan lagi dalam Docker.
docker system prune

# Contoh output:
# WARNING! This will remove:
#   - all stopped containers
#   - all networks not used by at least one container
#   - all dangling images
#   - all dangling build cache

# Kesimpulan: Anda dapat membersihkan objek-objek yang tidak digunakan lagi dalam Docker dengan menggunakan perintah 'docker system prune'. Ini akan menghapus container yang sudah berhenti, network yang tidak digunakan, serta image dan build cache yang tidak terpakai.

# Penjelasan lain:
docker container prune # menghapus semua container
docker image prune # yang tidak digunakan container
docker network prune # yang tidak digunakan container
docker volume prune # yang tidak digunakan container
docker system prune # all",
                'order_in_section' => 37
            ],
            [
                'section_id' => 17,
                'title' => "From Instruction pada Dockerfile",
                'description' => "From instruction adalah perintah yang digunakan dalam Dockerfile untuk menentukan base image yang akan digunakan untuk membangun container.",
                'code' => "
# Langkah 1: Buka teks editor untuk membuat atau mengedit Dockerfile.

# Langkah 2: Gunakan perintah 'FROM' diikuti dengan nama atau tag dari base image yang ingin Anda gunakan.
FROM <nama_image>:<tag>

# Contoh:
FROM ubuntu:latest

# Ini akan menggunakan base image Ubuntu dengan tag 'latest'.

# Kesimpulan: Anda dapat menentukan base image yang akan digunakan untuk membangun container dengan menggunakan perintah 'FROM' dalam Dockerfile.

# Penjelasan tambahan:
# From biasanya perintah pertama untuk membuat build stage dari image yang kita tentukan
FROM image:tag",
                'order_in_section' => 1
            ],
            [
                'section_id' => 17,
                'title' => "Build Docker Image",
                'description' => "Build adalah proses untuk membangun Docker image berdasarkan instruksi yang diberikan dalam Dockerfile.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Pindah ke direktori yang berisi Dockerfile yang ingin Anda gunakan untuk membangun image.

# Langkah 3: Jalankan perintah 'docker build' diikuti dengan opsi-opsi yang diperlukan dan path ke direktori yang berisi Dockerfile.
docker build -t <nama_image>:<tag> <path_to_Dockerfile_directory>

# Contoh:
docker build -t my_image:latest .

# Ini akan membangun Docker image dengan nama 'my_image' dan tag 'latest' menggunakan Dockerfile yang berada di direktori saat ini.

# Kesimpulan: Anda dapat membangun Docker image menggunakan perintah 'docker build'. Pastikan Anda berada dalam direktori yang berisi Dockerfile yang ingin Anda gunakan.

# Penjelasan tambahan:
docker build -t namakundidockerhub/namabebasimage:tagbebas namafolder
# secara default docker tidak akan menampilkan tulisan detail dari buildnya
# --progress=plain untuk menampilkan outputnya
# selain itu juga docker build juga melakukan cache, jika kita ingin mengulangi lagi tanpa menggunakan cache, kita bisa gunakan perintah --no-cache ",
                'order_in_section' => 2
            ],
            [
                'section_id' => 17,
                'title' => "Run Docker Container",
                'description' => "Run adalah proses untuk menjalankan Docker container berdasarkan Docker image yang sudah dibangun sebelumnya.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker run' diikuti dengan opsi-opsi yang diperlukan dan nama Docker image yang ingin Anda jalankan.
docker run <options> <nama_image>:<tag>

# Contoh:
docker run -d -p 8080:80 my_image:latest

# Ini akan menjalankan Docker container dari image 'my_image' dengan tag 'latest', mem-forward port 80 container ke port 8080 host, dan menjalankan container tersebut di background (detached mode).

# Kesimpulan: Anda dapat menjalankan Docker container menggunakan perintah 'docker run'. Pastikan Anda menggunakan opsi-opsi yang diperlukan sesuai kebutuhan.

# Penjelasan tambahan:
# Run adalah sebuah instruksi untuk mengeksekusi di dalam image pada saat build stage.
# hasil perintah run akan di commit dalam perubahan image tsb. jadi perintah run akan di eksekusi pada saat proses docker build saja. setelaah menjadi docker image, perintah tsb tidak akan dijalankan lagi",
                'order_in_section' => 3
            ],
            [
                'section_id' => 17,
                'title' => 'Command',
                'title' => "Command dalam Docker",
                'description' => "Command adalah perintah yang diberikan kepada Docker container saat menjalankannya, biasanya untuk menentukan apa yang akan dilakukan container setelah dijalankan.",
                'code' => "
# Langkah 1: Buka terminal atau command prompt.

# Langkah 2: Jalankan perintah 'docker run' diikuti dengan opsi-opsi yang diperlukan, nama Docker image, dan command yang ingin Anda jalankan di dalam container.
docker run <options> <nama_image>:<tag> <command>

# Contoh:
docker run -d my_image:latest bash

# Ini akan menjalankan Docker container dari image 'my_image' dengan tag 'latest', dan menjalankan perintah 'bash' di dalam container.

# Kesimpulan: Anda dapat memberikan command yang ingin dijalankan di dalam Docker container saat menjalankannya menggunakan perintah 'docker run'.

# Penjelasan tambahan:
# Command adalah sebuah instruksi yang digunakan ketika docker container berjalan, cmd/command tidak akan dijalankan ketika proses build, namun dijalankan ketika docker container berjalan
#  dalam dockerfile, kita tidak bisa menambahkan lebih dari satu instruksi cmd, jika kita tambahkan lebih dari satu instruksi cmd, maka yang akan digunakan untuk menjalankan docker container adalah instruksi cmd yang terakhir",
                'order_in_section' => 4
            ],
            [
                'section_id' => 17,
                'title' => "Format cmd dalam Docker",
                'description' => "Format cmd adalah aturan untuk menuliskan perintah dalam Dockerfile.",
                'code' => "
# Langkah 1: Buka teks editor untuk membuat atau mengedit Dockerfile.

# Langkah 2: Tulis instruksi-instruksi yang diperlukan dalam Dockerfile.
FROM ubuntu:latest
RUN apt-get update && apt-get install -y \
    python \
    python-pip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Ini adalah contoh penulisan perintah dalam Dockerfile.

# Kesimpulan: Anda dapat menuliskan perintah dalam Dockerfile untuk mengatur proses pembuatan image.

# Penjelasan tambahan:
# CMD command param param (rekomendasi karena lebih mudah)
# CMD ['executable', 'param', 'param']

# Command instruction contoh :
FROM alpine:3

RUN mkdir hello
RUN echo \"Hello World\" > \"hello/world.txt\"

CMD cat \"hello/world.txt\"
",
                'order_in_section' => 5
            ],
            [
                'section_id' => 17,
                'title' => "Label Instruction dalam Dockerfile",
                'description' => "Label Instruction adalah perintah yang digunakan dalam Dockerfile untuk menambahkan metadata ke Docker image yang sedang dibangun.",
                'code' => "
# Langkah 1: Buka teks editor untuk membuat atau mengedit Dockerfile.

# Langkah 2: Gunakan perintah 'LABEL' diikuti dengan key-value pairs untuk menambahkan metadata ke Docker image.
LABEL maintainer=\"nama@domain.com\"
LABEL version=\"1.0\"
LABEL description=\"Deskripsi singkat tentang Docker image ini\"

# Ini adalah contoh penulisan Label Instruction dalam Dockerfile.

# Kesimpulan: Anda dapat menambahkan metadata ke Docker image yang sedang dibangun menggunakan Label Instruction dalam Dockerfile.

# Penjelasan tambahan:
# instruksi LABEL merupakan instruksi yang digunakan untuk menambahkan metadata ke dalam Docker Image yang kita buat
# metadata adalah informasi tambahan, misal nama aplikasi, pembuat, website, perusahaan, lisensi dan lain-lain
# metadata hanya berguna sebagai informasi saja, tidak akan digunakan ketika kita menjalankan docker container
# LABEL <key>=<value> <key1>=<value1>
# LABEL author=\"ilham\"",
                'order_in_section' => 6
            ],
            [
                'section_id' => 17,
                'title' => "Add Instruction dalam Dockerfile",
                'description' => "Add Instruction adalah perintah yang digunakan dalam Dockerfile untuk menambahkan file atau direktori dari sistem host ke dalam Docker image yang sedang dibangun.",
                'code' => "
# Langkah 1: Buka teks editor untuk membuat atau mengedit Dockerfile.

# Langkah 2: Gunakan perintah 'ADD' diikuti dengan path file atau direktori dari sistem host dan path tujuan di dalam Docker image.
ADD <path_host> <path_container>

# Contoh:
ADD app.jar /app/

# Ini akan menambahkan file 'app.jar' dari sistem host ke dalam direktori '/app/' di dalam Docker image.

# Kesimpulan: Anda dapat menambahkan file atau direktori dari sistem host ke dalam Docker image yang sedang dibangun menggunakan Add Instruction dalam Dockerfile.

# Penjelasan tambahan:
# ADD adalah instruksi yang dapat digunakan untuk menambahkan file dari source ke dalam folder destination di Docker Image
# Perintah ADD bisa mendeteksi apakah sebuah file source merupakan file kompres seperti tar.gz, gzip, dan lain-lain. Jika mendeteksi file source adalah berupa file kompress,
# maka secara otomatis file tersebut akan di extract dalam folder destination ",
                'order_in_section' => 7
            ],
            [
                'section_id' => 17,
                'title' => "Format Add Instruction dalam Dockerfile",
                'description' => "Format Add Instruction adalah aturan untuk menuliskan perintah 'ADD' dalam Dockerfile.",
                'code' => "
# Langkah 1: Buka teks editor untuk membuat atau mengedit Dockerfile.

# Langkah 2: Tulis instruksi-instruksi yang diperlukan dalam Dockerfile.
ADD <path_host> <path_container>

# Ini adalah contoh penulisan perintah 'ADD' dalam Dockerfile.

# Kesimpulan: Anda dapat menuliskan perintah 'ADD' dalam Dockerfile untuk menambahkan file atau direktori dari sistem host ke dalam Docker image yang sedang dibangun.

# Penjelasan tambahan:
# ADD source destination
# Contoh :
ADD world.txt hello # menambah file world.txt ke folder hello
ADD *.txt hello # menambah semua file .txt ke folder hello",
                'order_in_section' => 8
            ],
            [
                'section_id' => 17,
                'title' => "COPY Instruction dalam Dockerfile",
                'description' => "COPY Instruction adalah perintah yang digunakan dalam Dockerfile untuk menyalin file atau direktori dari sistem host ke dalam Docker image yang sedang dibangun.",
                'code' => "
# Langkah 1: Buka teks editor untuk membuat atau mengedit Dockerfile.

# Langkah 2: Gunakan perintah 'COPY' diikuti dengan path file atau direktori dari sistem host dan path tujuan di dalam Docker image.
COPY <path_host> <path_container>

# Contoh:
COPY app.jar /app/

# Ini akan menyalin file 'app.jar' dari sistem host ke dalam direktori '/app/' di dalam Docker image.

# Kesimpulan: Anda dapat menyalin file atau direktori dari sistem host ke dalam Docker image yang sedang dibangun menggunakan COPY Instruction dalam Dockerfile.

# Penjelasan tambahan:
# COPY adalah instruksi yang dapat digunakan untuk menambahkan file dari source ke dalam folder destination di Docker Image
# Copy hanya melakukann copy file saja, sedangkan ADD selain melakukan copy, dia juga bisa mendownload source dari URL dan secara otomatis melakukan extract file kompres
# Namun best practinya, sebisa mungkin menggunakan copy, jika memang butuh melakukan extract file kompres, gunakan perintah RUN dan jalankan aplikasi untuk extract file kompres tersebut",
                'order_in_section' => 9
            ],
            [
                'section_id' => 17,
                'title' => "Format COPY Instruction dalam Dockerfile",
                'description' => "Format COPY Instruction adalah aturan untuk menuliskan perintah 'COPY' dalam Dockerfile.",
                'code' => "
# Langkah 1: Buka teks editor untuk membuat atau mengedit Dockerfile.

# Langkah 2: Tulis instruksi-instruksi yang diperlukan dalam Dockerfile.
COPY <path_host> <path_container>

# Ini adalah contoh penulisan perintah 'COPY' dalam Dockerfile.

# Kesimpulan: Anda dapat menuliskan perintah 'COPY' dalam Dockerfile untuk menyalin file atau direktori dari sistem host ke dalam Docker image yang sedang dibangun.

# Penjelasan tambahan:
# COPY source destination
# Contoh :
COPY world.txt hello # menambah file world.txt ke folder hello
COPY *.txt hello # menambah semua file .txt ke folder hello",
                'order_in_section' => 10
            ],
            [
                'section_id' => 17,
                'title' => "Dockerignore File",
                'description' => "Dockerignore adalah file yang digunakan untuk menentukan file atau direktori yang akan diabaikan oleh Docker saat proses build.",
                'code' => "
# Langkah 1: Buka teks editor untuk membuat atau mengedit file .dockerignore.

# Langkah 2: Tulis daftar file atau direktori yang ingin Anda abaikan oleh Docker dalam proses build.
file.txt
directory/

# Ini adalah contoh isi file .dockerignore, di mana 'file.txt' dan 'directory/' akan diabaikan oleh Docker saat proses build.

# Kesimpulan: Anda dapat menggunakan file .dockerignore untuk menentukan file atau direktori yang akan diabaikan oleh Docker saat proses build.",
                'order_in_section' => 11
            ],
            [
                'section_id' => 17,
                'title' => "Expose Instruction dalam Dockerfile",
                'description' => "Expose Instruction adalah perintah yang digunakan dalam Dockerfile untuk menentukan port yang akan di-expose oleh Docker container saat berjalan.",
                'code' => "
# Langkah 1: Buka teks editor untuk membuat atau mengedit Dockerfile.

# Langkah 2: Gunakan perintah 'EXPOSE' diikuti dengan nomor port yang ingin Anda expose.
EXPOSE <port>

# Contoh:
EXPOSE 8080

# Ini akan mengekspos port 8080 dari Docker container saat berjalan.

# Kesimpulan: Anda dapat menentukan port yang akan di-expose oleh Docker container saat berjalan menggunakan Expose Instruction dalam Dockerfile.

# Penjelasan tambahan:
# Instruksi untuk memberi tahu bahwa container akan listen port pada nomor dan protocol tertentu
# Format :
EXPOSE port # defaultnya menggunakan TCP
EXPOSE port/tcp
EXPOSE port/udp
docker container create --name expose -p 8080:8080 namecontainer/expose",
                'order_in_section' => 12
            ],
            [
                'section_id' => 17,
                'title' => "Environment Variable Instruction dalam Dockerfile",
                'description' => "Environment Variable Instruction adalah perintah yang digunakan dalam Dockerfile untuk menetapkan variabel lingkungan dalam Docker container.",
                'code' => "
# Langkah 1: Buka teks editor untuk membuat atau mengedit Dockerfile.

# Langkah 2: Gunakan perintah 'ENV' diikuti dengan nama variabel dan nilai yang ingin Anda tetapkan.
ENV <nama_variabel> <nilai>

# Contoh:
ENV APP_PORT 8080

# Ini akan menetapkan variabel lingkungan 'APP_PORT' dengan nilai '8080' dalam Docker container.

# Kesimpulan: Anda dapat menetapkan variabel lingkungan dalam Docker container menggunakan Environment Variable Instruction dalam Dockerfile.

# Penjelasan tambahan:
# ENV adalah instruksi yang digunakan untuk mengubah environment variable, baik itu ketika tahapan build atau ketika jalan dalam Docker Container
# Format :
ENV APP_PORT=8080
\${APP_PORT}",
                'order_in_section' => 13
            ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 14
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 15
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 16
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 17
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 18
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 19
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 11
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 11
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 12
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 13
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 14
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 15
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 16
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 17
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 18
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 19
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 20
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 21
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 22
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 23
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 24
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 25
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 26
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 27
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 28
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 29
            // ],
            // [
            //     'section_id' => 17,
            //     'title' => '',
            //     'description' => "",
            //     'code' => "",
            //     'order_in_section' => 30
            // ],
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
