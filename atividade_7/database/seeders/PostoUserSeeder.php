<?php

namespace Database\Seeders;

use App\Models\Posto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PostoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listPostos = Posto::all();
        $listUsers = User::all();

        $now = Carbon::now()->toDateTimeString();
        $pivoFields = ['created_at'=>$now,
                       'updated_at'=>$now];

        Log::channel('stderr')->info('Relacionando promocoes e produtos...');

        $listPostosIds = Posto::all()->pluck('id');

        $listUsers->each(function ($user)
        use ($listPostosIds,$pivoFields)
        {
            [$postoId,$postoId2] = $listPostosIds->random(2);
            $user->postos()->attach([
                $postoId=>$pivoFields,
                $postoId2=>$pivoFields
            ]);

            Log::channel('stderr')
                ->info("User: $user->id
                | Postos: ( $postoId , $postoId2 )");
        });
    }
}
