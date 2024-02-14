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
            // Преобразуем JSON-строку в массив
            $coordinatesArray = json_decode($coordinates, true);

            // Проверяем, что координаты являются валидными данными
            if (!is_array($coordinatesArray)) {
                throw new \InvalidArgumentException('Invalid coordinates format');
            }

            // Создаем новый полигон без указания ID
            $polygon = Polygons::create([
                'coordinates' => $coordinatesArray,
            ]);

            return response()->json(['message' => 'Polygon created successfully', 'id' => $polygon->id]);
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
        try {
            // Получите все записи из таблицы polygons
            $polygons = Polygons::all();

            // Создайте массив для хранения данных о полигонах
            $polygonsData = [];

            // Пройдитесь по каждому полигону и добавьте данные в массив
            foreach ($polygons as $polygon) {
                $polygonsData[] = [
                    'id' => $polygon->id,
                    'coordinates' => $polygon->coordinates,
                ];
            }

            // Верните данные в формате JSON
            return response()->json($polygonsData);
        } catch (\Exception $e) {
            // Обработка исключений
            return response()->json(['error' => 'Failed to load polygons'], 500);
        }
    }



    public function updatePolygon(Request $request)
    {
        try {
            $polygons = $request->input('polygons');
    
            // Преобразуем JSON-строку в массив
            $polygonsArray = json_decode($polygons, true);
    
            // Проверяем, что полигоны являются валидными данными
            if (!is_array($polygonsArray)) {
                throw new \InvalidArgumentException('Invalid polygons format');
            }
    
            foreach ($polygonsArray as $polygonData) {
                $polygonId = $polygonData['id'];
                $coordinates = $polygonData['coordinates'];
    
                // Проверяем, что координаты являются валидными данными
                if (!is_array($coordinates)) {
                    throw new \InvalidArgumentException('Invalid coordinates format');
                }
    
                // Проверяем, существует ли полигон с указанным ID
                $polygon = Polygons::find($polygonId);
    
                if ($polygon) {
                    // Если полигон существует, обновим его координаты
                    $polygon->update([
                        'coordinates' => $coordinates,
                    ]);
                } else {
                    // Если полигон не существует, вы можете выбрать другие действия, например, создать новый полигон
                }
            }
    
            return response()->json(['message' => 'Polygons updated successfully']);
        } catch (\Exception $e) {
            // Обработка других исключений
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    

    public function deletePolygon(Request $request)
    {
        try {
            $polygonId = $request->input('id');

            // Проверяем, существует ли полигон с указанным ID
            $polygon = Polygons::find($polygonId);

            if ($polygon) {
                // Если полигон существует, удаляем его из базы данных
                $polygon->delete();

                return response()->json(['message' => 'Polygon deleted successfully']);
            } else {
                // Если полигон не существует, вернем ошибку
                return response()->json(['error' => 'Polygon not found'], 404);
            }
        } catch (\Exception $e) {
            // Обработка других исключений
            return response()->json(['error' => 'Failed to delete polygon'], 500);
        }
    }
}
