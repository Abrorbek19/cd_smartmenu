<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Category;
use App\Models\Client;
use App\Models\Featuremain;
use App\Models\Restaurant;
use App\Models\Testimonial;
use App\Models\Titleemain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class ViewController extends Controller
{
    public function index()
    {
        $testimonial = Testimonial::with('restaurant')->get();
        $restaurant = Restaurant::all();
        $title = Titleemain::all();
        $feature = Featuremain::all();
        return view('welcome',compact("title","feature","restaurant",'testimonial'));
    }

    public function menu($id)
    {
        $restaurant = Restaurant::where(['id'=> $id,'status'=>1])->first();
        if (!$restaurant) {
            return view('menu.404');
        }

        $client = Client::where('restaurant_id', $restaurant->id)->with(['user','restaurant'])->first();
        $categories = Category::where('client_id', $id)
            ->where('status', Status::ACTIVE->value)
            ->orderBy('order','asc')
            ->get();

        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        return view('menu.index', compact( 'restaurant', 'client',"categories",'id'));
    }


    public function sendTelegram(Request $request)
    {
        function escapeMarkdown($text) {
            $replace = [
                '*' => '\\*',
                '_' => '\\_',
                '[' => '\\[',
                ']' => '\\]',
                '(' => '\\(',
                ')' => '\\)',
                '~' => '\\~',
                '`' => '\\`',
                '>' => '\\>',
                '#' => '\\#',
                '+' => '\\+',
                '-' => '\\-',
                '=' => '\\=',
                '|' => '\\|',
                '{' => '\\{',
                '}' => '\\}',
                '.' => '\\.',
                '!' => '\\!',
            ];
            return strtr($text, $replace);
        }

        // Xabarni olish va escape qilish
        $message = $request->input('message');
        $escapedMessage = escapeMarkdown($message);

        $restaran_id = $request->input('restaran_id');
        $restaran = Restaurant::where('id', $restaran_id)->first();

        if (!$restaran) {
            return response()->json(['success' => false, 'error' => 'Restoran topilmadi']);
        }

        $telegramBotToken = '7638355691:AAF-7fuCCQsFe1d1xGxlEsxffcLoqrXYmew';
        $group_id = $restaran->channel_id;

        $url = "https://api.telegram.org/bot{$telegramBotToken}/sendMessage";
        $data = [
            'chat_id' => $group_id,
            'text' => $escapedMessage,
            'parse_mode' => 'Markdown',
        ];

        try {
            $response = Http::post($url, $data);

            if ($response->successful()) {
                return response()->json(['success' => true]);
            } else {
                Log::error('Telegram API javobi muvaffaqiyatsiz', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return response()->json([
                    'success' => false,
                    'error' => 'Telegram API javobi muvaffaqiyatsiz',
                    'response' => $response->json()
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Telegram API ulanish xatosi', ['exception' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'error' => 'Telegram APIga ulanishda xatolik',
                'exception' => $e->getMessage()
            ]);
        }
    }
}
