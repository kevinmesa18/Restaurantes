<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurante;
use App\Models\Reserva;
use DB;

class ReservaController extends Controller
{
    public function index(){
        $restaurantes = Restaurante::all();
        $reservas = Reserva::select("RESERVAS.*","RESTAURANTES.NOMBRE as nombreRestaurante")
        ->join("RESTAURANTES","RESTAURANTES.ID_RESTAURANTE","=","RESTAURANTES_ID_RESTAURANTE")
        ->get();
        return view("reservas.index", compact("restaurantes", "reservas"));
    }

    public function save(Request $request){
        $input = $request -> all();
        try {
            DB::beginTransaction();
            $reserva = Reserva::create([
                "MESA" => $input["mesa"],
                "FECHA_RESERVA" => $input["fecha"],
                "NOMBRE_RESERVA" => $input["nombre"],
                "RESTAURANTES_ID_RESTAURANTE" => $input["idRestaurante"],
            ]);
            DB::commit();
            return redirect("/reservas")->with('status', 'Se realizó la reserva correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect("/reservas")->with('status', $e->getMessage());
        }
    }

    public function delete(Request $request){
        $id = $request->input("id");
        try {
            DB::delete('DELETE FROM RESERVAS WHERE ID_RESERVA=?',[$id]);
            DB::commit();
            return redirect("/reservas")->with('status', 'Se elimino la reserva correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect("/reservas")->with('status', $e->getMessage());
        }
    }

    public function modify(Request $request){
        $input = $request -> all();
        try {
            DB::table('RESERVAS')
            ->where("ID_RESERVA",$input["idReserva"])
            ->update([
                "MESA" => $input["mesa"],
                "FECHA_RESERVA" => $input["fecha"],
                "NOMBRE_RESERVA" => $input["nombre"],
                "RESTAURANTES_ID_RESTAURANTE" => $input["idRestaurante"],
            ]);
            return redirect("/reservas")->with('status', 'Se modifico la reserva correctamente');
        } catch (\Exeption $e) {
            return redirect("/reservas")->with('status', 'Error al modificar la reserva '.$e->getMessage());
        }
    }
}
