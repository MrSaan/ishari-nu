<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use App\Models\Muhud;
use App\Models\Pimpinan;
use App\Models\Shalawat;
use App\Models\Songs;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Maize\Markable\Models\Like;

class UserInteractiveController extends Controller
{
    public function muhud()
    {
        // dd(auth()->user());
        if (Request::all('category', 'pimpinan')) {
            $audioPimpinan = Request::only('pimpinan');
        } else {
            $audioPimpinan = 6;
        }

        $kumpulanMuhud = Muhud::all();

        $pimpinan = Audio::query()
            ->when(Request::only('category'), function ($query, $category) {
                $query->leftJoin('pimpinans', 'pimpinan_id', '=', 'pimpinans.id')->where('muhud_id', '=', $category)->select('pimpinan_id', 'nama_pimpinan', 'avatar')->distinct()->get();
            }, function ($query) {
                $query->leftJoin('pimpinans', 'pimpinan_id', '=', 'pimpinans.id')->where('muhud_id', '=', 1)->select('pimpinan_id', 'nama_pimpinan', 'avatar')->distinct()->get();
            })
            ->get();

        $teks = Shalawat::query()
            ->when(Request::only('category'), function ($query, $category) {
                $query->where('muhud_id', '=', $category);
            }, function ($query) {
                $query->where('muhud_id', '=', 1);
            })
            ->paginate(100)
            ->through(fn ($shalawat) => [
                'id' => $shalawat->id,
                'diwan' => $shalawat->numberOfDiwan,
                'syarafulAnam' => $shalawat->numberOfMaulidSyarafulAnam,
                'teks' => $shalawat->text_shalawat,
                'transliterasi' => $shalawat->transliteration,
                'terjemahan' => $shalawat->translation_id,
                'audio' => $shalawat->audio()->where('pimpinan_id', '=', $audioPimpinan)->get(),
                'love' => auth() ? Like::has($shalawat, auth()->user()) : false,
            ]);

        if (Request::input('search')) {
            $teks = Shalawat::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('text_shalawat', 'like', '%' . $search . '%');
                    $query->orWhere('transliteration', 'like', '%' . $search . '%');
                    $query->orWhere('translation_id', 'like', '%' . $search . '%');
                })
                ->with('audio')
                ->paginate(100)
                ->through(fn ($shalawat) => [
                    'id' => $shalawat->id,
                    'diwan' => $shalawat->numberOfDiwan,
                    'syarafulAnam' => $shalawat->numberOfMaulidSyarafulAnam,
                    'teks' => $shalawat->text_shalawat,
                    'transliterasi' => $shalawat->transliteration,
                    'terjemahan' => $shalawat->translation_id,
                    'audio' => $shalawat->audio()->where('pimpinan_id', '=', $audioPimpinan)->get(),
                    'love' => auth() ? Like::has($shalawat, auth()->user()) : false,
                ]);
        }

        return Inertia::render('Muhud', [
            'filters' => Request::all('search', 'category', 'pimpinan'),
            'kumpulanMuhud' => $kumpulanMuhud,
            'shalawat' => $teks,
            'pimpinan' => $pimpinan,
        ]);
    }

    public function reciters()
    {
        $reciters = Pimpinan::all();

        if (Request::only('search')) {
            $reciters = Pimpinan::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('nama_pimpinan', 'like', '%' . $search . '%');
                    $query->orWhere('asal', 'like', '%' . $search . '%');
                })
                ->get();
        }

        return Inertia::render('Reciters', [
            'reciters' => $reciters,
            'filters' => Request::only('search'),
        ]);
    }

    public function musics()
    {
        $song = Songs::paginate(10)->withQueryString();

        if (Request::only('search')) {
            $song = Songs::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('judul', 'like', '%' . $search . '%');
                    $query->orWhere('muhud', 'like', '%' . $search . '%');
                    $query->orWhere('pimpinan', 'like', '%' . $search . '%');
                    $query->orWhere('deskripsi', 'like', '%' . $search . '%');
                })
                ->get();
        }

        return Inertia::render('PlayMusic', [
            'filters' => Request::only('search'),
            'songs' => $song,
        ]);
    }

    public function loved()
    {
        $text = Shalawat::query()
            ->when(Request::only('id'), function ($query, $id) {
                $query->where('id', '=', $id);
            })
            ->firstOrFail();

        $user = auth()->user();

        if (Like::has($text, $user)) {
            Like::remove($text, $user);
        } else {
            Like::add($text, $user);
        }
    }

    public function getLoved()
    {
        if (Request::only('pimpinan')) {
            $audioPimpinan = Request::only('pimpinan');
        } else {
            $audioPimpinan = 1;
        }

        $kumpulanMuhud = Muhud::all();

        $pimpinan = Audio::query()
            ->when(Request::only('category'), function ($query, $category) {
                $query->leftJoin('pimpinans', 'pimpinan_id', '=', 'pimpinans.id')->where('muhud_id', '=', $category)->select('pimpinan_id', 'nama_pimpinan', 'avatar')->distinct()->get();
            }, function ($query) {
                $query->leftJoin('pimpinans', 'pimpinan_id', '=', 'pimpinans.id')->where('muhud_id', '=', 1)->select('pimpinan_id', 'nama_pimpinan', 'avatar')->distinct()->get();
            })
            ->get();

        $teks = Shalawat::query()
            ->when(Request::only('category'), function ($query, $category) {
                $query->where('muhud_id', '=', $category);
            }, function ($query) {
                $query->where('muhud_id', '=', 1);
            })
            ->paginate(50)
            ->through(fn ($shalawat) => [
                'id' => $shalawat->id,
                'diwan' => $shalawat->numberOfDiwan,
                'syarafulAnam' => $shalawat->numberOfMaulidSyarafulAnam,
                'teks' => $shalawat->text_shalawat,
                'transliterasi' => $shalawat->transliteration,
                'terjemahan' => $shalawat->translation_id,
                'audio' => $shalawat->audio()->where('pimpinan_id', '=', $audioPimpinan)->get(),
                'love' => auth() ? Like::has($shalawat, auth()->user()) : false,
            ]);

        if (Request::input('search')) {
            $teks = Shalawat::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('text_shalawat', 'like', '%' . $search . '%');
                    $query->orWhere('transliteration', 'like', '%' . $search . '%');
                    $query->orWhere('translation_id', 'like', '%' . $search . '%');
                })
                ->with('audio')
                ->paginate(10)
                ->through(fn ($shalawat) => [
                    'id' => $shalawat->id,
                    'diwan' => $shalawat->numberOfDiwan,
                    'syarafulAnam' => $shalawat->numberOfMaulidSyarafulAnam,
                    'teks' => $shalawat->text_shalawat,
                    'transliterasi' => $shalawat->transliteration,
                    'terjemahan' => $shalawat->translation_id,
                    'audio' => $shalawat->audio()->where('pimpinan_id', '=', $audioPimpinan)->get(),
                    'love' => auth() ? Like::has($shalawat, auth()->user()) : false,
                ]);
        }


        return Inertia::render('Loved', [
            'filters' => Request::all('search', 'category', 'pimpinan'),
            'kumpulanMuhud' => $kumpulanMuhud,
            'pimpinan' => $pimpinan,
            'shalawat' => $teks,
        ]);
    }

    public function support()
    {
        return Inertia::render('SupportUs');
    }

    public function json()
    {
        $path = storage_path() . "/json/muhud.json";

        $json = json_decode(file_get_contents($path), true);

        return $json['data']['Ibtida']['muhud'];
    }
}
