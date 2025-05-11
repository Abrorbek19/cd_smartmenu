<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Client;
use App\Models\Meal;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixMealOrder extends Command
{
    protected $signature = 'fix:orders';
    protected $description = 'Fix order values for categories (by client_id) and meals (by category_id and user_id)';

    public function handle()
    {
        DB::beginTransaction();

        try {
            $this->info("Fixing category orders...");

            // Har bir client_id (ya'ni restoran) bo'yicha categories ni tartiblab chiqamiz
            $clients = Client::all();
            foreach ($clients as $client) {
                $categories = Category::where('client_id', $client->id)->orderBy('id')->get();
                $order = 1;
                foreach ($categories as $category) {
                    if ($category->order !== $order) {
                        $category->order = $order;
                        $category->save();
                    }
                    $this->line("Category ID {$category->id} → Order set to {$category->order}");
                    $order++;
                }
            }


            $this->info("Fixing meal orders...");

            // Har bir category bo'yicha meals ni tartiblab chiqamiz
            $categories = Category::all();
            foreach ($categories as $category) {
                $meals = Meal::where('category_id', $category->id)->orderBy('id')->get();
                $order = 1;
                foreach ($meals as $meal) {
                    if ($meal->order !== $order) {
                        $meal->order = $order;
                        $meal->save();
                    }
                    $this->line("Meal ID {$meal->id} (Category {$category->id}) → Order set to {$meal->order}");
                    $order++;
                }
            }


            DB::commit();
            $this->info("✅ All orders updated successfully!");

        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("❌ Error occurred: " . $e->getMessage());
        }
    }
}
