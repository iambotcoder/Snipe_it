<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResearchDetailsStaticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('research_details')->insert([
            [
                'title' => 'Research Paper 1',
                'authors' => 'John Doe',
                'publication_date' => '2023-01-15',
                'doi' => 'DOI123',
                'abstract' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'keywords' => 'keyword1, keyword2',
                'file_path' => '/path/to/file1.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Research Paper 2',
                'authors' => 'Jane Smith',
                'publication_date' => '2023-02-28',
                'doi' => 'DOI456',
                'abstract' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'keywords' => 'keyword3, keyword4',
                'file_path' => '/path/to/file2.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Research Paper 3',
                'authors' => 'Alice Johnson',
                'publication_date' => '2023-04-10',
                'doi' => null,
                'abstract' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'keywords' => 'keyword5, keyword6',
                'file_path' => '/path/to/file3.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Research Paper 4',
                'authors' => 'Bob Brown',
                'publication_date' => '2023-06-20',
                'doi' => 'DOI789',
                'abstract' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'keywords' => 'keyword7, keyword8',
                'file_path' => '/path/to/file4.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Research Paper 5',
                'authors' => 'Emma Wilson',
                'publication_date' => '2023-08-05',
                'doi' => 'DOIABC',
                'abstract' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'keywords' => 'keyword9, keyword10',
                'file_path' => '/path/to/file5.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
