<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurante;
use App\Models\Reserva;
use DB;

class RestauranteController extends Controller
{
    public function index(){
        $restaurantes = Restaurante::all();
        return view("restaurantes.index", compact("restaurantes"));
    }

    public function save(Request $request){
        $input = $request -> all();
        try {
            DB::beginTransaction();
            $restaurante = Restaurante::create([
                "nombre" => $input["nombre"],
                "descripcion" => $input["descripcion"],
                "ciudad" => $input["ciudad"],
                "foto" => $input["urlfoto"],
                "cantidad_mesas" => $input["cantidadmesas"],
            ]);
            DB::commit();
            return redirect("/restaurantes")->with('status', 'Se agrego el restaurante correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect("/restaurantes")->with('status', $e->getMessage());
        }
    }

    public function delete(Request $request){
        $id = $request->input("id");
        try {
            DB::delete('DELETE FROM reservas WHERE id_restaurante = ?', [$id]);
            DB::delete('DELETE FROM restaurantes WHERE id_restaurante=?',[$id]);
            DB::commit();
            return redirect("/restaurantes")->with('status', 'Se elimino el restaurante y sus reservas correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect("/restaurantes")->with('status', $e->getMessage());
        }
    }

    public function modify(Request $request){
        $input = $request -> all();
        try {
            DB::table('restaurantes')
            ->where("id",$input["idRestaurante"])
            ->update([
                "nombre" => $input["nombre"],
                "descripcion" => $input["descripcion"],
                "ciudad" => $input["ciudad"],
                "foto" => $input["urlfoto"],
            ]);
            return redirect("/restaurantes")->with('status', 'Se modifico el restaurante correctamente');
        } catch (\Exeption $e) {
            return redirect("/restaurantes")->with('status', 'Error al modificar el restaurante '.$e->getMessage());
        }
    }
}
