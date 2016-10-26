<?php

use Illuminate\Database\Seeder;

class ExecuteFunctionResetSequenceSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::select('select sequence_name, reset_sequence(split_part(sequence_name, \'_id_seq\',1)) from information_schema.sequences where sequence_schema=?', ['public']);
        
    }
}
