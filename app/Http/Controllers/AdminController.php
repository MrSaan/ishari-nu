<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Models\Pimpinan;
use App\Models\Shalawat;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use App\Http\Requests\StoreImage;
use App\Models\Muhud;
use App\Models\Songs;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Create', [
            'filters' => Request::only('search')
        ]);
    }

    public function pimpinan()
    {
        return Inertia::render('Admin/Pimpinan');
    }

    public function song()
    {
        return Inertia::render('Admin/AddSong', [
            'muhud' => Muhud::all(),
            'pimpinan' =>  Pimpinan::all(),
        ]);
    }

    public function audio()
    {
        return Inertia::render('Admin/Audio', [
            'muhud' => Muhud::all(),
            'pimpinan' =>  Pimpinan::all(),
        ]);
    }

    public function getPimpinan()
    {
        return Inertia::render('Admin/ListPimpinan', [
            'pimpinan' => Pimpinan::all()
        ]);
    }

    public function editPimpinan(Pimpinan $pimpinan)
    {
        return Inertia::render('Admin/EditPimpinan', [
            'pimpinan' => [
                'id' => $pimpinan->id,
                'nama_pimpinan' => $pimpinan->nama_pimpinan,
                'asal' => $pimpinan->asal,
                'avatar' => asset('storage/' . $pimpinan->avatar),
            ]
        ]);
    }

    public function edit(Pimpinan $pimpinan)
    {
        if (Request::file('avatar')) {
            Storage::delete('public/' . $pimpinan->avatar);
            $image = Request::file('avatar')->store('avatar');

            $pimpinan->update([
                'nama_pimpinan' => Request::input('nama'),
                'asal' => Request::input('asal'),
                'avatar' => $image,
            ]);
            return redirect('/admin/daftarPimpinan');
        } else {

            $pimpinan->update([
                'nama_pimpinan' => Request::input('nama'),
                'asal' => Request::input('asal'),
            ]);

            return redirect('/admin/daftarPimpinan');
        }
    }

    public function addShalawat()
    {
        $attributes = Request::validate([
            'muhud_id' => 'required',
            'audio_id' => 'required',
            'numberOfMuhud' => 'required',
            'numberOfDiwan' => 'nullable|numeric',
            'numberOfMaulidSyarafulAnam' => 'nullable|numeric',
            'text_shalawat' => 'required',
            'transliteration' => 'required',
            'translation_id' => 'required',
        ]);

        Shalawat::create($attributes);

        return redirect('/admin/create');
    }

    public function addPimpinan()
    {
        $attributes = Request::validate([
            'nama_pimpinan' => 'required',
            'asal' => 'required',
            'avatar' => 'required|image',
        ]);

        $attributes['avatar'] =  Request::file('avatar')->store('avatar');
        Pimpinan::create($attributes);

        return redirect('/admin/pimpinan');
    }

    public function addAudio()
    {
        $validate = Request::validate([
            'textShalawat' => 'required',
            'iramaShalawat' => 'required',
            'pimpinanShalawat' => 'required'
        ]);

        $muhud = Muhud::where('id', $validate['textShalawat']['muhud_id'])->get();
        $irama = Request::only('irama');

        // menyimpan butuh shalawat_id, pimpinan_id, muhud_id, type, location
        $attributes['shalawat_id'] = $validate['textShalawat']['id'];
        $attributes['pimpinan_id'] = $validate['pimpinanShalawat']['id'];
        $attributes['muhud_id'] = $validate['textShalawat']['muhud_id'];
        $attributes['type'] = $validate['iramaShalawat']['name'];
        $attributes['audio_1'] = Request::file('audio_1')->store($muhud[0]['transliteration_id']);

        if (!$irama['irama']['id'] == 0) {
            $attributes['referen_audio'] = $irama['irama']['id'];
        }

        Audio::create($attributes);
    }

    public function addSong()
    {
        $validate = Request::validate([
            'muhud' => 'required',
            'pimpinan' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        // menyimpan butuh judul, muhud, pimpinan, deskripsi, lokasi lagu
        $attributes['judul'] = $validate['deskripsi'];
        $attributes['muhud'] = $validate['muhud']['transliteration_id'];
        $attributes['pimpinan'] = $validate['pimpinan']['nama_pimpinan'];
        $attributes['deskripsi'] = $validate['deskripsi'];
        $attributes['song'] = Request::file('song')->store('LaguIshari');

        Songs::create($attributes);
    }

    public function checkMuhud()
    {
        // dd(Request::all());
        $attributes = Request::validate([
            'muhud' => 'required',
            'kitab' => 'required'
        ]);

        $muhud = $attributes['muhud']['id'];
        $kitab = $attributes['kitab']['name'];

        if ($kitab == "Diwan") {
            $data = Shalawat::where('muhud_id', '=', $muhud)->whereNotNull('numberOfDiwan')->get();
        } else {
            $data = Shalawat::where('muhud_id', '=', $muhud)->whereNull('numberOfDiwan')->get();
        }

        $audio = Audio::where('muhud_id', $muhud)->get();

        // return redirect()->route('audio', ['data' => $data]);
        return Inertia::render('Admin/Audio', [
            'shalawat' => $data,
            'muhud' => Muhud::all(),
            'pimpinan' => Pimpinan::all(),
            'audio' => $audio
        ]);
        // dd($attributes['muhud']);

    }
}
