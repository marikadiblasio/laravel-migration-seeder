## Creare un progetto con Laravel
```
#apriamo la cartella parent
cd your parent_folder_path

#creiamo il progetto
composer create-project --prefer-dist laravel/laravel:^9.2 your_project_name_here

#entriamo nella cartella del progetto da terminale di vscode
cd your_project_name

#apriamo la cartella in vscode
code . -r 

#installiamo il pacchetto di inizializzazione ui con bootstrap
composer require pacificdev/laravel_9_preset

#installiamo il pacchetto 
php artisan preset:ui bootstrap

#lanciamo npm install
npm install

#installiamo fonawesome se serve
npm install --save @fortawesome/fontawesome-free

#modifichiamo vite.config.js per aggiungere alias fontawesome
 '~@fortawesome': path.resolve(__dirname, 'node_modules/@fortawesome'),

#creiamo le cartelle e i file necessari

#dentro resources:
fonts
img

#dentro resources>views:
layouts > layout.blade.php
partials > header.blade.php e footer.blade.php

#dentro resources>scss:
partials
(inseriamo dentro partials almeno un file _variables.scss) 

#copiamo la cartella dei webfont di fontawesome dentro fonts

#editiamo il file app.scss
@use './partials/variables' as *;

$fa-font-path: "../fonts/webfonts" !default;

@import "~@fortawesome/fontawesome-free/scss/fontawesome";
@import "~@fortawesome/fontawesome-free/scss/regular";
@import "~@fortawesome/fontawesome-free/scss/solid";
@import "~@fortawesome/fontawesome-free/scss/brands";

@import "~bootstrap/scss/bootstrap";

#prepara il file del layout e la welcome

#verifichiamo che tutto funzioni:

npm run dev

php artisan serve

#Installare pacchetto per update migration:
composer require doctrine/dbal

# add composer.lock and package.lock.json to .gitignore
```

## Pubblicare su github
```
#create project on github and follow instructions

git init
git add .
git commit -m "first commit"
git branch -M main
git remote add origin your_git_url
git push -u origin main
```

## Creo migration
```
# Creo database da phpmyadmin

# Aggiungo configurazione a file .env

Migration

#creare le migration per le tabelle ecc

php artisan make:migration create_nometabella_table

#dentro il file  migration 
	public function up()
	{
		Schema::create('nometabella', function (Blueprint $table) {
			$table->id(); //id automatico
			$table->string('title', 50); 

            #$table->tipodato('nomecampo', eventuali #parametri)->eventuali modificatori();

			$table->text('description')->nullable();
			$table->string('type', 20);
			$table->string('image');
			$table->string('cooking_time', 20);
			$table->string('weight', 20);
			$table->timestamps(); //timestamps automatico
		});
	}

	public function down()
	{
		Schema::dropIfExists('pastas');
	}
#per lanciare le migration

php artisan migrate

#controllo su phpmyadmin se c'è tutto
```
### Modifiche alla tabella
```
# Se ho sbagliato posso disfare
#di un solo passo
php artisan migrate:rollback

#di quanto da me deciso
php artisan migrate:rollback --step=numerodistepdadisfare

#del tutto (non raccomandabile)
php artisan migrate:reset

#se voglio tornare indietro e remigrare (cautela: toglie tutte le tabelle)
php artisan migrate:refresh
php artisan migrate:refresh --seed (refresha e ripopola con tutti i seed)
php artisan migrate:refresh --steps=numerodistepdadisfare

#Oltre al create, la tabella ha anche rename, update (per modificare il tipo o gli attrimbitu di una colonna ricord ail metodo change alla fine), (pe rinominare una colonna c'è il renamecolumn), add...

PER AGGIUNTA UN SOLO CAMPO

PER AGGIUngere più di un campo o altre modifiche: UPDATE
php artisan make:migration update_nometabella_table --table=nometabella

```
## Seeder 
```
#creo model per la tabella generata
php artisan make:model NomeTabellaSingolare

    ##se voglio vedere atributi e relazioni del model
    php artisan model:show nomedelmodel

    ##se il nome della tabella non è il plurale in snakecase della tabella, devo specificare il nome dentro il model

    protected $table = nometabella;

    ##se la primary key non è nominata id devo specificarlo

    protected $primaryKey = nomecolonna;

    ##se la primary key non è in intero e/o non si autoincrementa devo specificarlo

    protected keyType = tipo;

    public $incrementing = false;

#preparo il seeder

php artisan make:seeder NomeTableSeeder

#apro il seeder e dentro c'è la funzione run()

```
### Per modificare il seeder
```
Svuoto la tabella da phpmyAdmin

Lo modifico tutto e poi lo rilancio

```
## Vari modi di prendere i dati:
- Ho un file csv nella cartella seeder
- Da cartella Config
- Faker
```
    $array_pasta = config('pasta');
```
### Sempre nella popolo, di fatto, con i dati
```
    foreach($array_pasta as $pasta_item) {
            $new_pasta_object = new Pasta();
            $new_pasta_object->title = $pasta_item['titolo'];
            $new_pasta_object->description = $pasta_item['descrizione'];
            $new_pasta_object->type = $pasta_item['tipo'];
            $new_pasta_object->image = $pasta_item['src'];
            $new_pasta_object->cooking_time = $pasta_item['cottura'];
            $new_pasta_object->weight = $pasta_item['peso'];
            $new_pasta_object->save();
    }

#dopo che i dati con tutti in run, li invio al database

php artisan db:seed --class=NomeTableSeeder

#se non specificassi la classe, i dati andrebbero nel DatabaseSeeder

#se volessi ricostruire il db potrei usare
php artisan migrate:fresh -seed --seeder=NomeSeeder

#controllo phpmyadmin se i dati sono inseriti
```
```
#creo controller 

php artisan make:controller NomeController

#correggo il file della rotta 
#stampo in pagina con le view

```
# Extra
```
#per utilizzare img che è in resource 
<img src="{{ Vite::asset('resources/img/logo.png') }}" alt="">
```
