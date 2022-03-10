<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NuruDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('Inscription');
        Schema::create('Inscription', function(Blueprint $table){
            $table->id();
            $table->string('adresse_mail', 30)->unique();
            $table->string('code');
        });
        Schema::dropIfExists('Compte');
        Schema::create('Compte',function(Blueprint $table){
            $table->id();
            $table->timestamp('date_creation')->useCurrent();
            $table->double('solde')->default(0);
            $table->boolean('status_compte')->default(1);
            $table->string('code_auth', 30);
            $table->string('matricule', 17);
        });
        Schema::dropIfExists('Messages');
        Schema::create('Messages',function(Blueprint $table){
            $table->id();
            $table->string('source_id',17)->default('');
            $table->string('destination_id',17)->default('');
            $table->text('messages')->default('');
            $table->timestamp('date_mess')->userCurrent();
            $table->boolean('mode')->default(1);
        });
        Schema::dropIfExists('Operations');
        Schema::create('Operations',function(Blueprint $table){
            $table->id();
            $table->timestamp('date_op')->userCurrent();
            $table->double('montant_op')->default(0);
            $table->boolean('etat_op')->default(0);
            $table->string('code_auth',30);
        });
        Schema::dropIfExists('Adresse');
        Schema::create('Adresse',function(Blueprint $table){
            $table->id();
            $table->string('quart_av',30)->default('');
            $table->string('ville', 15)->default('');
            $table->string('province',15)->default('');
            $table->string('pays',15)->default('');
            $table->string('apropos',60)->default('');
            $table->string('code_auth', 30);
            $table->foreignId('id_compte')->constrained('Compte')->onDelete('cascade');
        });
        Schema::dropIfExists('Customers');
        Schema::create('Customers',function(Blueprint $table){
            $table->id();
            $table->string('nom', 15);
            $table->string('prenom', 15);
            $table->string('matricule', 17);
            $table->string('adresse_mail',30)->unique();
            $table->string('password_customers');
            $table->string('numero_tel')->default('');
            $table->string('type_compte',15)->default('');
            $table->string('genre')->default('');
            $table->string('photo')->default('assets/img/default_user.png')->nullable();
            $table->string('code_auth', 30);
            $table->foreignId('adresse_id')->constrained('Adresse')->onDelete('cascade');
        });
        Schema::dropIfExists('Admins');
        Schema::create('Admins',function(Blueprint $table){
            $table->id();
            $table->foreignId('adresse_id')->constrained('Adresse')->onDelete('cascade');
            $table->foreignId('customers_id')->constrained('Customers')->onDelete('cascade');
        });
        Schema::dropIfExists('Caissier');
        Schema::create('Caissier',function(Blueprint $table){
            $table->id();
            $table->foreignId('adresse_id')->constrained('Adresse')->onDelete('cascade');
            $table->foreignId('operation_id')->constrained('Operations')->onDelete('cascade');
            $table->foreignId('customers_id')->constrained('Customers')->onDelete('cascade');
        });
        Schema::dropIfExists('Client');
        Schema::create('Client',function(Blueprint $table){
            $table->id();
            $table->foreignId('adresse_id')->constrained('Adresse')->onDelete('cascade');
            $table->string('adresse_mail')->unique();
            $table->foreignId('customers_id')->constrained('Customers')->onDelete('cascade');
        });
        Schema::dropIfExists('Transactions');
        Schema::create('Transactions',function(Blueprint $table){
            $table->id();
            $table->timestamp('date_trans')->useCurrent();
            $table->double('montant_ret')->default(0);
            $table->double('solde')->default(0);
            $table->string('motif')->default('');
            $table->string('trans_mat')->default('');
            $table->string('client_mat')->default('');
            $table->string('benef_mat')->nullable();
            $table->foreignId('caissier_id')->nullable()->constrained('Caissier')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ok');
    }
}
