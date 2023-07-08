<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use App\Models\Muhud;
use App\Models\Pimpinan;
use App\Models\Rowi;
use App\Models\RowiAudio;
use App\Models\Shalawat;
use App\Models\Songs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Maize\Markable\Models\Like;

class UserInteractiveController extends Controller
{
    public function getCategoryMuhud($id)
    {
        $user = Auth::user();
        $kumpulanMuhud = Muhud::all();
        $audioPimpinan = Request::only('pimpinan');

        $pimpinan = Audio::query()
            ->when($id, function ($query, $id) {
                $query->leftJoin('pimpinans', 'pimpinan_id', '=', 'pimpinans.id')->where('muhud_id', '=', $id)->select('pimpinan_id', 'nama_pimpinan', 'avatar')->distinct()->get();
            })->get();

        if (Request::input('search') && Request::input('search') !== null) {
            $muhud = Shalawat::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('text_shalawat', 'like', '%' . $search . '%');
                    $query->orWhere('transliteration', 'like', '%' . $search . '%');
                    $query->orWhere('translation_id', 'like', '%' . $search . '%');
                })->paginate(100)->through(fn ($shalawat) => [
                    'id' => $shalawat->id,
                    'diwan' => $shalawat->numberOfDiwan,
                    'syarafulAnam' => $shalawat->numberOfMaulidSyarafulAnam,
                    'teks' => $shalawat->text_shalawat,
                    'transliterasi' => $shalawat->transliteration,
                    'terjemahan' => $shalawat->translation_id,
                    'audio' => $shalawat->audio()->where('pimpinan_id', '=', $audioPimpinan)->get(),
                    'love' => auth() ? Like::has($shalawat, $user) : false,
                ]);
        } else {
            $muhud = Shalawat::query()
                ->when($id, function ($query, $id) {
                    $query->where('muhud_id', '=', $id);
                })->paginate(100)->through(fn ($shalawat) => [
                    'id' => $shalawat->id,
                    'diwan' => $shalawat->numberOfDiwan,
                    'syarafulAnam' => $shalawat->numberOfMaulidSyarafulAnam,
                    'teks' => $shalawat->text_shalawat,
                    'transliterasi' => $shalawat->transliteration,
                    'terjemahan' => $shalawat->translation_id,
                    'audio' => $shalawat->audio()->where('pimpinan_id', '=', $audioPimpinan)->get(),
                    'love' => auth() ? Like::has($shalawat, $user) : false,
                ]);
        }

        return Inertia::render('Muhud', [
            'filters' => Request::all('search', 'pimpinan'),
            'kumpulanMuhud' => $kumpulanMuhud,
            'shalawat' => $muhud,
            'pimpinan' => $pimpinan,
            'id' => $id,
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

    public function getLoved($id)
    {
        $user = Auth::user();
        $kumpulanMuhud = Muhud::all();
        $audioPimpinan = Request::only('pimpinan');

        $pimpinan = Audio::query()
            ->when($id, function ($query, $id) {
                $query->leftJoin('pimpinans', 'pimpinan_id', '=', 'pimpinans.id')->where('muhud_id', '=', $id)->select('pimpinan_id', 'nama_pimpinan', 'avatar')->distinct()->get();
            })->get();

        if (Request::input('search')) {
            $muhud = Shalawat::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('text_shalawat', 'like', '%' . $search . '%');
                    $query->orWhere('transliteration', 'like', '%' . $search . '%');
                    $query->orWhere('translation_id', 'like', '%' . $search . '%');
                })->paginate(100)->through(fn ($shalawat) => [
                    'id' => $shalawat->id,
                    'diwan' => $shalawat->numberOfDiwan,
                    'syarafulAnam' => $shalawat->numberOfMaulidSyarafulAnam,
                    'teks' => $shalawat->text_shalawat,
                    'transliterasi' => $shalawat->transliteration,
                    'terjemahan' => $shalawat->translation_id,
                    'audio' => $shalawat->audio()->where('pimpinan_id', '=', $audioPimpinan)->get(),
                    'love' => auth() ? Like::has($shalawat, $user) : false,
                ]);
        } else {
            $muhud = Shalawat::query()
                ->when($id, function ($query, $id) {
                    $query->where('muhud_id', '=', $id);
                })->paginate(100)->through(fn ($shalawat) => [
                    'id' => $shalawat->id,
                    'diwan' => $shalawat->numberOfDiwan,
                    'syarafulAnam' => $shalawat->numberOfMaulidSyarafulAnam,
                    'teks' => $shalawat->text_shalawat,
                    'transliterasi' => $shalawat->transliteration,
                    'terjemahan' => $shalawat->translation_id,
                    'audio' => $shalawat->audio()->where('pimpinan_id', '=', $audioPimpinan)->get(),
                    'love' => auth() ? Like::has($shalawat, $user) : false,
                ]);
        }

        return Inertia::render('Loved', [
            'filters' => Request::all('search', 'pimpinan'),
            'kumpulanMuhud' => $kumpulanMuhud,
            'shalawat' => $muhud,
            'pimpinan' => $pimpinan,
            'id' => $id,
        ]);
    }

    public function support()
    {
        return Inertia::render('SupportUs');
    }

    public function getDetailAudioPimpinan(Request $request)
    {
        $pimpinan_id = request()->query('pimpinan_id');

        $raw = Audio::join('muhuds', 'audio.muhud_id', '=', 'muhuds.id')
            ->select('muhuds.transliteration_id')
            ->where('audio.pimpinan_id', '=', $pimpinan_id)
            ->get();

        $data = json_decode($raw, true);
        // Menghitung jumlah data yang memiliki nilai properti transliteration_id yang sama
        $countedData = array_count_values(array_map(function ($item) {
            return $item["transliteration_id"];
        }, $data));

        // Menggabungkan data menjadi array dengan format yang diinginkan
        $result = array_map(function ($key, $value) {
            return ["transliteration_id" => $key, "jumlah" => $value];
        }, array_keys($countedData), $countedData);

        return response()->json($result, 200);
    }

    function getRowi($id)
    {

        $user = Auth::user();
        $audioPimpinan = Request::only('pimpinan');

        $pimpinan = RowiAudio::query()
            ->when($id, function ($query, $id) {
                $query->leftJoin('pimpinans', 'pimpinan_id', '=', 'pimpinans.id')->where('muhud_id', '=', $id)->select('pimpinan_id', 'nama_pimpinan', 'avatar')->distinct()->get();
            })->get();

        $teks_rowi = Rowi::query()
            ->when($id, function ($query, $id) {
                $query->where('muhud_id', '=', $id);
            })
            ->get();
            // ->paginate(100)->through(fn ($shalawat) => [
            //     'id' => $shalawat->id,
            //     'teks' => $shalawat->text_rowi,
            //     'transliterasi' => $shalawat->transliteration,
            //     'terjemahan' => $shalawat->translation_id,
            //     // 'audio' => $shalawat->rowiAudio()->where('pimpinan_id', '=', $audioPimpinan)->get(),
            // ]);


        return Inertia::render('Rowi', [
            'filters' => Request::all('search', 'pimpinan'),
            'pimpinan' => $pimpinan,
            'rowi' => $teks_rowi,
        ]);
    }

    public function json()
    {
        $path = storage_path() . "/json/muhud.json";

        $json = json_decode(file_get_contents($path), true);

        return $json['data']['Ibtida']['muhud'];
    }
}
