<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentInstruction;

class PaymentInstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank = [
            'method_name' => 'Direct bank transfer',
            'first_instruction' => 'Go to any bank around you or use your mobile banking if they have.',
            'second_instruction' => json_encode([
                                    '2.1 Commercial Bank : 1000200906881 Kassaye M',
                                    '2.2 Dashen Bank : 8868685995 Kassaye',
                                        ]),
            ];
        PaymentInstruction::create($bank);

        $telebirr = [
            'method_name' => 'TeleBirr transfer',
            'first_instruction' => 'Open your Telebirr app or dial *127#.',
            'second_instruction' => json_encode([
                                    '2.1 Telebirr account 1 : 0940678725 Nesru Sadik',
                                    '2.2 Telebirr account 2 : 0940678725 Abe Kebe',
                                        ]),
        ];
        PaymentInstruction::create($telebirr);
        $mbirr = [
            'method_name' => 'M-Birr transfer',
            'first_instruction' => 'Open your M-Birr app or dial *812#.',
            'second_instruction' => json_encode([
                                    '2.1 M-Birr account 1 : 0940678725 Nesru Sadik',
                                    '2.2 M-Birr account 2 : 0940678725 Abe Kebe',
                                        ]),
            ];
        PaymentInstruction::create($mbirr);
        $cbeBirr = [
            'method_name' => 'CBE-Birr transfer',
            'first_instruction' => 'Open your CBE-Birr app or dial *847#.',
            'second_instruction' => json_encode([
                                    '2.1 CBE-Birr account 1 : 0940678725 Nesru Sadik',
                                    '2.2 CBE-Birr account 2 : 0940678725 Abe Kebe',
                                        ]),
            ];
        PaymentInstruction::create($cbeBirr);
    }

}
