<?php

use App\Models\Industry;
use App\Models\SubIndustry;
use App\Models\Tax;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Industry::class);
            $table->foreignIdFor(SubIndustry::class);
            $table->foreignIdFor(Tax::class);

            $table->unsignedDecimal('staff')->nullable();
            $table->unsignedDecimal('salary')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
