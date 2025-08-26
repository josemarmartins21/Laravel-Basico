<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Socio;
use Illuminate\Support\Collection;

class Teste extends Controller
{
    public function index()
    {
        /* $resultados = DB::table("socios")->get(['telefone', 'nome'])->all(); */ 
        // $resultados = DB::table("socios")->find(2);

        /*   foreach ($resultados as $socio) {
            echo "<p> $socio->telefone </p>";
        } */

        /* DB::table('socios')
        ->orderBy('id')
        ->chunk(100, 
        function(Collection $socios) 
        {
            foreach ($socios as $socio) {
                echo "<p>O sócio $socio->nome tem o telefone $socio->telefone.</p>";
            }
        
        });   */

        /* echo DB::table('socios')->count(); */

        // insert 

       /*  DB::table('socios')->insert([
            'nome' => 'Natan Ferreira',
            'Telefone' => 555,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]); */

        /* DB::table('socios')->where('id', 3)->update([
            'nome' => 'Josimar Alterado',
            'updated_at' => \Carbon\Carbon::now()
        ]); */

      /*   DB::table('socios')->where('nome', 'josimar alterado')->delete();

        echo DB::table('socios')->sum('telefone'); */
        
        
        
        
        
        /* $socios = Socio::all(); */
        
    /*     $socios = Socio::orderBy('nome', 'desc')->get(); */

        /* $socios = Socio::take(2)->get(); */

        
        /*  foreach ($socios as $socio) {
            echo "$socio->nome</br>". PHP_EOL; 
        } */
       /*  echo "<pre>";
        
        print_r($socios->nome); */

        /* foreach ($socios as $socio) {
            echo "$socio->nome || $socio->telefone". PHP_EOL; 
            
        } */
       
       $socios = Socio::chunk(2, function($socios) {
            foreach($socios as $socio) {
                echo "Bom dia socio $socio->nome";
            }
       });



        // return view('home');
    }

    public function store(Request $request)
    {
        $jogador = new Jogador();

        $jogador->nome = $request->nome;
        $jogador->clube = $request->clube;
        $jogador->nacionalidade = $request->nacionalidade;
        $jogador->sobre = $request->sobre;
        $jogador->numero_de_titulos = $request->titulos;

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
           $requestImage = $request->foto;

           $extension = $requestImage->extension();

           $nomeImage = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

           $requestImage->move(public_path('/uploads/images/'), $nomeImage);
            
           $jogador->foto = $nomeImage;
        
        }

        $jogador->save();

        return redirect('/servicos');

    
    
    }

    public function contactos($nome, $apelido = "")
    {
        $data['nome'] = $nome;
        $data['apelido'] = $apelido;

        return view('contactos', $data);
    }

    public function servicos()
    {
       // $sobre = DB::table("jogadores")->pluck('sobre', 'nome');

        DB::table('jogadores')->orderBy('id')->chunk(200, function (Collection $jogadores){
            foreach ($jogadores as $jogador) {
                echo "$jogador->nome | $jogador->sobre";
            }

        });

        return view('servicos');
    }

    public function galeria($pagina)
    {
        $data['pagina'] = $pagina;

        return view('galeria', $data);
    }

    public function formulario()
    {
        return view('formulario-login');
    }
}
