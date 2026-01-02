<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('mysql')
            ->table('instructor_courses')
            ->insert([
                [
                    'id' => '04699fb5-81da-481e-aa7d-2935e3fac81a',
                    'instructor_id' => 'ilhamrhmtkbr',
                    'title' => 'Belajar PHP dari Dasar',
                    'description' => 'Kursus ini akan membahas dasar-dasar PHP mulai dari sintaks dasar, variabel, tipe data, hingga konsep OOP. Cocok untuk pemula yang ingin memahami bagaimana PHP digunakan dalam pengembangan web.',
                    'image' => 'instructor-course-images/04699fb5-81da-481e-aa7d-2935e3fac81a.webp',
                    'price' => 0,
                    'level' => 'junior',
                    'status' => 'free',
                    'visibility' => 'public',
                    'notes' => 'Sebelum memulai kursus ini, peserta sebaiknya sudah memahami dasar HTML dan CSS.',
                    'requirements' => 'PHP 8.x, Apache/Nginx, MySQL/MariaDB, Code Editor (VS Code / PHPStorm)',
                    'editor' => 'php',
                ],
                [
                    'id' => '57750f38-163f-47d9-9e0a-82621c650648',
                    'instructor_id' => 'ilhamrhmtkbr',
                    'title' => 'Pemrograman MySQL untuk Database',
                    'description' => 'Dalam kursus ini, Anda akan belajar bagaimana menggunakan MySQL untuk mengelola database, termasuk pembuatan tabel, penggunaan query SQL, optimasi database, indexing, dan transaksi database.',
                    'image' => 'instructor-course-images/57750f38-163f-47d9-9e0a-82621c650648.webp',
                    'price' => 17500,
                    'level' => 'junior',
                    'status' => 'paid',
                    'visibility' => 'public',
                    'notes' => 'Disarankan memahami dasar-dasar SQL agar lebih mudah memahami materi kursus ini.',
                    'requirements' => 'MySQL 8.x, phpMyAdmin / MySQL Workbench, Command Line / Terminal',
                    'editor' => 'sql',
                ],
                [
                    'id' => 'bc2fd5d9-3250-4e50-b7b6-c865f25d68cf',
                    'instructor_id' => 'ilhamrhmtkbr',
                    'title' => 'Fundamental SQL Server',
                    'description' => 'Kursus ini mengajarkan konsep dasar hingga lanjutan dalam pengelolaan database menggunakan SQL Server. Anda akan belajar tentang stored procedure, indexing, triggers, serta optimasi query untuk meningkatkan performa database.',
                    'image' => 'instructor-course-images/bc2fd5d9-3250-4e50-b7b6-c865f25d68cf.webp',
                    'price' => 17500,
                    'level' => 'junior',
                    'status' => 'paid',
                    'visibility' => 'public',
                    'notes' => 'Peserta sebaiknya memahami dasar SQL sebelum mengikuti kursus ini.',
                    'requirements' => 'SQL Server 2019/2022, SQL Server Management Studio (SSMS), Command Line / Azure Data Studio',
                    'editor' => 'sql',
                ],
                [
                    'id' => '1ccd82b7-3f16-41a5-a7e0-2dac0869e0ff',
                    'instructor_id' => 'ilhamrhmtkbr',
                    'title' => 'Pemrograman C++ untuk Pemula',
                    'description' => 'Kursus ini akan membahas pemrograman C++ dari dasar, mencakup struktur kode, variabel, tipe data, loop, hingga konsep Object-Oriented Programming (OOP).',
                    'image' => 'instructor-course-images/1ccd82b7-3f16-41a5-a7e0-2dac0869e0ff.webp',
                    'price' => 17500,
                    'level' => 'junior',
                    'status' => 'paid',
                    'visibility' => 'public',
                    'notes' => 'Memahami dasar logika pemrograman akan sangat membantu dalam mengikuti kursus ini.',
                    'requirements' => 'GCC / MinGW Compiler, CodeBlocks / VS Code, Debugging Tools',
                    'editor' => 'cpp'
                ],
                [
                    'id' => 'f3ab42bb-7457-470e-96eb-f87270a51e8e',
                    'instructor_id' => 'ilhamrhmtkbr',
                    'title' => 'Python',
                    'description' => 'Kursus ini dirancang untuk membantu Anda memahami bagaimana Python digunakan dalam analisis data, statistik, dan machine learning. Anda akan belajar menggunakan library seperti NumPy, Pandas, Matplotlib, dan Scikit-learn.',
                    'image' => 'instructor-course-images/f3ab42bb-7457-470e-96eb-f87270a51e8e.webp',
                    'price' => 17500,
                    'level' => 'junior',
                    'status' => 'paid',
                    'visibility' => 'public',
                    'notes' => 'Pemahaman tentang matematika dasar dan statistik akan sangat membantu dalam memahami materi kursus ini.',
                    'requirements' => 'Python 3.x, Jupyter Notebook / Google Colab, Pandas, NumPy, Matplotlib, Scikit-learn',
                    'editor' => 'python',
                ],
                [
                    'id' => '07e21fd2-c9bd-4934-a161-f2920454122f',
                    'instructor_id' => 'ilhamrhmtkbr',
                    'title' => 'Menguasai Git dan Version Control',
                    'description' => 'Pelajari bagaimana menggunakan Git untuk version control, mulai dari dasar hingga fitur lanjutan seperti branching, merging, rebase, dan collaborative development menggunakan GitHub/GitLab.',
                    'image' => 'instructor-course-images/07e21fd2-c9bd-4934-a161-f2920454122f.webp',
                    'price' => 17500,
                    'level' => 'junior',
                    'status' => 'paid',
                    'visibility' => 'public',
                    'notes' => 'Sebaiknya sudah memahami dasar-dasar pemrograman dan penggunaan terminal sebelum mengikuti kursus ini.',
                    'requirements' => 'Git CLI, GitHub / GitLab Account, Code Editor (VS Code / IntelliJ / PHPStorm)',
                    'editor' => 'bash',
                ],
                [
                    'id' => '5b0c6efb-171c-4b51-b4d3-1e157399bdde',
                    'instructor_id' => 'ilhamrhmtkbr',
                    'title' => 'Docker',
                    'description' => 'Pelajari bagaimana containerization bekerja dengan Docker. Kursus ini akan mengajarkan cara membuat, mengelola, dan mendistribusikan container untuk berbagai aplikasi menggunakan Docker.',
                    'image' => 'instructor-course-images/5b0c6efb-171c-4b51-b4d3-1e157399bdde.webp',
                    'price' => 17500,
                    'level' => 'middle',
                    'status' => 'paid',
                    'visibility' => 'public',
                    'notes' => 'Memiliki pengalaman dengan sistem operasi Linux dan penggunaan command line akan sangat membantu.',
                    'requirements' => 'Docker, Docker Compose, Linux / Windows WSL, Terminal / Command Line',
                    'editor' => 'bash',
                ],
            ]);
    }
}
