<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PeopleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('people')->truncate();
        $this->import();
    }

    private function import(): void
    {
        $path = database_path('data/people.csv');
        $handle = fopen($path, 'r');

        while (($row = fgetcsv($handle)) !== false) {
            [$firstName, $lastName, $countryCode, $email, $birthday] = $row;

            $batch[] = [
                'first_name' => $firstName,
                'last_name'  => $lastName,
                'country_code' => $countryCode,
                'email'      => $email,
                'birthday'   => $birthday,
            ];

            if (count($batch) === 1000) {
                DB::table('people')->insert($batch);
                $batch = [];
            }
        }
        fclose($handle);
    }

    private function buildModifiedFile(): void
    {
        $duplicates = array_keys($this->getDuplicates());
        $path = database_path('data/users.csv');
        $file = fopen($path, 'w');

        if ($file !== false) {

            foreach ($this->prepareArrayData() as $row) {
                [$firstName, $lastName, $countryCode, $email, $birthday] = $row;

                if(in_array($email, $duplicates)) {
                    $email = Str::random(6) . $email;
                }
                $newRow = [$firstName, $lastName, $countryCode, $email, $birthday];
                fputcsv($file, $newRow);
            }
            fclose($file);
        }
    }

    private function prepareArrayData(): array
    {
        $path = database_path('data/people.csv');
        $handle = fopen($path, 'r');
        $data = [];

        while (($row = fgetcsv($handle)) !== false) {
            $data[] = $row;
        }
        fclose($handle);

        return $data;
    }

    private function getDuplicates(): array
    {
        $path = database_path('data/people.csv');
        $handle = fopen($path, 'r');
        $emailsDuplicates = [];

        while (($row = fgetcsv($handle)) !== false) {
            [$firstName, $lastName, $countryCode, $email, $birthday] = $row;
            $emailsDuplicates[] = $email;
        }
        fclose($handle);
        $counts = array_count_values($emailsDuplicates);

        return array_filter($counts, function ($count) {
            return $count > 1;
        });
    }
}
