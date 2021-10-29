<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ['kucing', 'Ayam', 'Ikan'];

    function index()
    {
        foreach ($this->animals as $animal) {
            echo "$animal <br>";
        }
    }
    function store(Request $request)
    {
        echo "Menambahkan hewan baru <br>";
        array_push($this->animals, $request->nama);
        $this->index();
    }
    function update(Request $request, $id)
    {
        echo "Mengupdate data hewan id: $id <br>";
        $this->animals[$id] = $request->nama;
        $this->index();
    }
    function destroy($id)
    {
        echo "Menghapus data hewan id: $id <br>";
        unset($this->animals[$id]);
        $this->index();
    }
}
