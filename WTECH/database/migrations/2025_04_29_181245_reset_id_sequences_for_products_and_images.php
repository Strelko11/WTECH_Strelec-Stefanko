<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // reset sekvencie products.id na MAX(id)
        DB::statement(<<<'SQL'
            SELECT setval(
                pg_get_serial_sequence('products','id'),
                (SELECT COALESCE(MAX(id), 0) FROM products)
            );
        SQL);

        // reset sekvencie product_images.id na MAX(id)
        DB::statement(<<<'SQL'
            SELECT setval(
                pg_get_serial_sequence('product_images','id'),
                (SELECT COALESCE(MAX(id), 0) FROM product_images)
            );
        SQL);
    }
};
