<?php

use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private function randomNumericString($size = 0, $text = "")
    {   
        return strlen($text) == $size ? $text : $this->randomNumericString($size, $text .= random_int ( 0 , 9 ));
    }
    public function run()
    {

        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 10; $j++) {
                DB::table('addresses')->insert([
                    'client_id' =>  $i,
                    'road' => 'Rua ' . $this->randomNumericString(2) . ' de Novembro',
                    'neighborhood' => 'Cidade dos ' . random_int(0,9) . ' lagos',
                    'house_number' => $this->randomNumericString(4),
                    'cep' => $this->randomNumericString(8),
                ]);
            }
        }
      
    }
}
