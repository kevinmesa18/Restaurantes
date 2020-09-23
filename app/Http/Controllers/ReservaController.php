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
        $reservas = Reserva::with('restaurante')->get();
        return view("reservas.index", compact("restaurantes", "reservas"));
    }

    public function save(Request $request){
        $input = $request -> all();
        try {
            DB::beginTransaction();
            $reserva = Reserva::create([
                "numero_mesa" => $input["mesa"],
                "fecha_reserva" => $input["fecha"],
                "cliente" => $input["nombre"],
                "id_restaurante" => $input["idRestaurante"],
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
            DB::delete('DELETE FROM reservas WHERE id=?',[$id]);
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
            DB::table('reservas')
            ->where("id",$input["idReserva"])
            ->update([
                "numero_mesa" => $input["mesa"],
                "fecha_reserva" => $input["fecha"],
                "cliente" => $input["nombre"],
                "id_restaurante" => $input["idRestaurante"],
            ]);
            return redirect("/reservas")->with('status', 'Se modifico la reserva correctamente');
        } catch (\Exeption $e) {
            return redirect("/reservas")->with('status', 'Error al modificar la reserva '.$e->getMessage());
        }
    }
}
