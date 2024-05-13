<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReunionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('reunions')) {

        Schema::create('reunions', function (Blueprint $table) {
            $table->id();
            $table->date('date_reunion');
            $table->string('sujet_reunion');
            $table->foreignId('divisions_id')->constrained();
            $table->text('suggestion')->nullable(); 
            $table->date('prochaine_reunion')->nullable();
            $table->string('saisie_par', 50)->nullable();
            $table->timestamps();
            $table->timestamp('date_de_saisie')->useCurrent();
            $table->timestamp('date_de_modification')->useCurrent();            
            $table->string('cadre')->nullable();
            $table->string('objet')->nullable();
            $table->string('id_cadre')->nullable(); 
            $table->decimal('cout_cadre', 19, 4)->nullable();
            $table->foreignId('secteurs_id')->constrained();
            $table->foreignId('partenaires_id')->constrained();
            $table->decimal('contribution_partenaire', 19, 4)->nullable();
            $table->foreignId('statuts_id')->constrained();
            $table->string('etat_avancement')->nullable();
            $table->string('file_path')->nullable();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reunions'); 
    }
}
