<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            ['name' => 'Moris', 'generation' => 'C26', 'position' => 'Kepala Departemen', 'image' => 'images/moris1.png'],
            ['name' => 'Anindya', 'generation' => 'C27', 'position' => 'Sekretaris Departemen', 'image' => 'images/anin1.png'],
            ['name' => 'Rachel', 'generation' => 'C27', 'position' => 'Kabiro External', 'image' => 'images/rachel1.png'],
            ['name' => 'Parisya', 'generation' => 'C26', 'position' => 'Kabiro Internal', 'image' => 'images/parisya1.png'],
            ['name' => 'Genta', 'generation' => 'C26', 'position' => 'Kabiro Alumni', 'image' => 'images/genta1.png'],

            // Staff members
            ['name' => 'Elizabeth', 'generation' => 'C27', 'position' => 'Staff', 'image' => null],
            ['name' => 'Alif', 'generation' => 'C27', 'position' => 'Staff', 'image' => null],
            ['name' => 'Zia', 'generation' => 'C27', 'position' => 'Staff', 'image' => null],
            ['name' => 'Nicholas', 'generation' => 'C27', 'position' => 'Staff', 'image' => null],
            ['name' => 'Prinka', 'generation' => 'C27', 'position' => 'Staff', 'image' => null],
            ['name' => 'Rafie', 'generation' => 'C27', 'position' => 'Staff', 'image' => null],
            ['name' => 'Ayesha', 'generation' => 'C27', 'position' => 'Staff', 'image' => null],
            ['name' => 'Mia', 'generation' => 'C27', 'position' => 'Staff', 'image' => null],
            ['name' => 'Faheem', 'generation' => 'C27', 'position' => 'Staff', 'image' => null],
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}
