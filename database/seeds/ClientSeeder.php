<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private function randomNumericString($size = 0, $text = "")
    {   
        return strlen($text) == $size ? $text : $this->randomNumericString($size, $text .= rand( 0 , 9 ));
    }

    public function run()
    {   

        for ($i = 1; $i <= 10; $i++) {
            DB::table('clients')->insert([
                'id' =>  $i,
                'trade_name' => 'Nome fantasia ' . Str::random(4),
                'legal_name' => 'Razão Social ' . Str::random(1),
                'cnpj' => $this->randomNumericString(14),
                
            ]);
        }
      
    }
}
