<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TowerController extends Controller
{
    public function index()
    {
        $rows = 10; // Jumlah baris
        $cols = 4; // Jumlah kolom

        // Inisialisasi tabel dengan 10 bom (1 bom per baris)
        $table = $this->initializeTable($rows, $cols);

        return view('tower', compact('table'));
    }

    public function revealCell(Request $request)
    {
        $table = session('table', $this->initializeTable(10, 4)); // Gunakan session untuk menyimpan status tabel

        $row = $request->input('row');
        $col = $request->input('col');

        // Generate angka acak 0 atau 1 (0 = bom, 1 = 1)
        $cellValue = rand(0, 1);

        // Ubah nilai sel yang sesuai
        $table[$row][$col] = $cellValue === 0 ? 'B' : '1';

        // Simpan status tabel kembali ke session
        session(['table' => $table]);

        return view('tower', compact('table'));
    }

    private function initializeTable($rows, $cols)
    {
        $table = [];

        // Inisialisasi tabel dengan sel berisi "?"
        for ($i = 0; $i < $rows; $i++) {
            $table[$i] = array_fill(0, $cols, '?');
        }

        // Menyimpan 10 bom secara acak, satu bom per baris
        for ($i = 0; $i < 10; $i++) {
            $randomRow = rand(0, $rows - 1);
            $randomCol = rand(0, $cols - 1);

            // Pastikan hanya ada satu bom per baris
            while ($table[$randomRow][$randomCol] === 'B') {
                $randomRow = rand(0, $rows - 1);
                $randomCol = rand(0, $cols - 1);
            }

            $table[$randomRow][$randomCol] = 'B';
        }

        return $table;
    }

    public function resetGame()
    {
        session()->forget('table');
        return redirect()->route('tower');
    }
}
