<?php

    namespace App\Models;
    use Illuminate\Support\Facades\DB;

    class Socios {
        public function getSocios() {

            return DB::select("SELECT * FROM socios");
        }

        public function deleteAll() {
            DB::delete("DELETE FROM socios");
        }
    }