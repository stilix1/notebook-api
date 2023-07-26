<?php

namespace App\Http\Controllers;

use App\Models\NotebookEntry;
use Illuminate\Http\Request;


class NotebookController extends Controller
{
    /**
     * @OA\Get(
     *      path="/notebook",
     *      operationId="getNotebookEntries",
     *      tags={"Notebook"},
     *      summary="Получить список записей в записной книжке",
     *      description="Возвращает список записей в записной книжке",
     *      @OA\Response(
     *          response=200,
     *          description="Успешный запрос",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/NotebookEntry")
     *          )
     *      ),
     * )
     */
    public function index()
    {
        $entries = NotebookEntry::all();
        return response()->json($entries);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/notebook",
     *     tags={"Notebook"},
     *     summary="Создать новую запись в записной книжке",
     *     description="Создает новую запись в записной книжке",
     *     operationId="createNotebookEntry",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/NotebookEntry")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Запись успешно создана",
     *         @OA\JsonContent(ref="#/components/schemas/NotebookEntry")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Ошибка валидации",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Некорректные данные")
     *         )
     *     ),
     * )
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string',
            'company' => 'nullable|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'birthdate' => 'nullable|date',
            'photo' => 'nullable|url',
        ]);

        $entry = NotebookEntry::create($data);
        return response()->json($entry, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/notebook/{id}",
     *     tags={"Notebook"},
     *     summary="Получить информацию о записи в записной книжке",
     *     description="Возвращает информацию о записи в записной книжке по указанному ID",
     *     operationId="getNotebookEntryById",
     *     @OA\Parameter(
     *         name="id",
     *         description="ID записи",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный запрос",
     *         @OA\JsonContent(ref="#/components/schemas/NotebookEntry")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Запись не найдена",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Запись не найдена")
     *         )
     *     ),
     * )
     */
    public function show($id)
    {
        $entry = NotebookEntry::findOrFail($id);
        return response()->json($entry);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/notebook/{id}",
     *     tags={"Notebook"},
     *     summary="Обновить информацию о записи в записной книжке",
     *     description="Обновляет информацию о записи в записной книжке по указанному ID",
     *     operationId="updateNotebookEntry",
     *     @OA\Parameter(
     *         name="id",
     *         description="ID записи",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/NotebookEntry")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Запись успешно обновлена",
     *         @OA\JsonContent(ref="#/components/schemas/NotebookEntry")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Запись не найдена",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Запись не найдена")
     *         )
     *     ),
     * )
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'full_name' => 'required|string',
            'company' => 'nullable|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'birthdate' => 'nullable|date',
            'photo' => 'nullable|url',
        ]);

        $entry = NotebookEntry::findOrFail($id);
        $entry->update($data);
        return response()->json($entry);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/notebook/{id}",
     *     tags={"Notebook"},
     *     summary="Удалить запись из записной книжки",
     *     description="Удаляет запись из записной книжки по указанному ID",
     *     operationId="deleteNotebookEntry",
     *     @OA\Parameter(
     *         name="id",
     *         description="ID записи",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Запись успешно удалена"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Запись не найдена",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Запись не найдена")
     *         )
     *     ),
     * )
     */
    public function destroy($id)
    {
        $entry = NotebookEntry::findOrFail($id);
        $entry->delete();
        return response()->json(null, 204);
    }
}

