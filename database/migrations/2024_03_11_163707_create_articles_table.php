<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Asegúrate de que este campo se relacione con la tabla `users`.
            $table->text('descripcio');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
        DB::table('articles')->insert([
            [
                'user_id' => 1,
                'descripcio' => 'Explora les estratègies d\'inversió més efectives per al 2024, incloent anàlisi de tendències i consells d\'experts per maximitzar els teus retorns.',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'descripcio' => 'Una guia detallada per a principiants sobre com començar el teu hort urbà, des de la selecció de plantes fins a tècniques de cura i manteniment.',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'descripcio' => 'Descobreix els secrets millor guardats de la natura amb aquest recorregut per llocs increïbles però poc coneguts, perfecte per a la teva pròxima aventura.',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'descripcio' => 'Coneix les últimes innovacions en tecnologia verda i com poden transformar el nostre futur, oferint solucions sostenibles per als reptes mediambientals actuals.',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'descripcio' => 'Una anàlisi profunda sobre com l\'art modern ha influït i reflectit canvis en la societat contemporània, des de la política fins a la identitat personal.',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'descripcio' => 'Receptes gourmet fàcils de preparar en menys de 30 minuts, ideals per a sopars saludables i deliciosos que impressionaran a qualsevol convidat.',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'descripcio' => 'Estratègies de benestar mental per a professionals ocupats: Com gestionar l\'estrès i trobar un equilibri en la vida laboral i personal.',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'descripcio' => 'Viatjar amb un pressupost: Consells i trucs per explorar el món sense espatllar la banca, incloent destinacions assequibles i com estalviar en allotjament.',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'descripcio' => 'L\'impacte del canvi climàtic en la biodiversitat global i què podem fer per protegir el nostre planeta per a les futures generacions.',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'descripcio' => 'Històries d\'èxit d\'emprenedors que van començar amb poc i van construir imperis, oferint inspiració i consells pràctics per a aspirants a empresaris.',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'descripcio' => 'Tendències emergents en el disseny d\'interiors per al 2024, des de colors i materials fins a tecnologies innovadores per a la llar.',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'descripcio' => 'Com la intel·ligència artificial està transformant la indústria de la salut, des del diagnòstic fins al tractament personalitzat.',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'descripcio' => 'Una mirada al futur de l\'alimentació: Innovacions en agricultura vertical i carn cultivada en laboratori que podrien solucionar la crisi alimentària mundial.',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'descripcio' => 'La revolució del transport sostenible: Una ullada als vehicles elèctrics, bicicletes i sistemes de transport públic que estan canviant la manera com ens movem.',
                'created_at' => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
