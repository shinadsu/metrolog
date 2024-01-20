<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Polygons;

class PolygonController extends Controller
{
    public function savePolygon(Request $request)
    {
        try {
            $coordinates = $request->input('coordinates');
            $polygonId = $request->input('id');

            // Проверяем, что координаты являются валидными данными
            if (!is_array($coordinates)) {
                throw new \InvalidArgumentException('Invalid coordinates format');
            }

            if ($polygonId) {
                // Если у нас есть ID, обновим существующий полигон
                $polygon = Polygons::find($polygonId);
                $polygon->update([
                    'coordinates' => $coordinates,
                ]);
            } else {
                // В противном случае создадим новый полигон
                $polygon = Polygons::create([
                    'coordinates' => $coordinates,
                ]);
            }

            return response()->json(['message' => 'Polygon saved successfully', 'id' => $polygon->id]);
        } catch (QueryException $e) {
            // Обработка ошибок запроса базы данных, например, логирование
            return response()->json(['error' => 'Failed to save polygon'], 500);
        } catch (\InvalidArgumentException $e) {
            // Обработка ошибок валидации координат
            return response()->json(['error' => $e->getMessage()], 400);
        } catch (\Exception $e) {
            // Обработка других исключений
            return response()->json(['error' => 'Failed to save polygon'], 500);
        }
    }

    public function loadPolygons()
    {
        $polygons = Polygons::all();
        return response()->json($polygons);
    }
}
