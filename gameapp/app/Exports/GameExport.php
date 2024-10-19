<?php

namespace App\Exports;

use App\Models\Game;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GameExport implements FromView, WithColumnWidths, WithStyles
{
public function view(): View
{
return view('games.excel', [
'games' => Game::all()
]);
} 
public function columnWidths(): array
{
    return [
        'A' => 20,  // Width for Title
        'B' => 30,  // Width for Image
        'C' => 25,  // Width for Developer
        'D' => 15,  // Width for Release Date
        'E' => 15,  // Width for Category ID
        'F' => 15,  // Width for User ID
        'G' => 10,  // Width for Price
        'H' => 20,  // Width for Genre
        'I' => 40,  // Width for Description
    ];
} 
public function styles(Worksheet $sheet)
{
    return [
        1 => ['font' => ['bold' => true, 'size' => 16]],
    ];
}

}