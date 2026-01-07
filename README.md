COME LAVORARE CON I DB IN LARAVEL:

Creare il DB tramite il terminale -> create database nome_db
Collegare il DB al progetto laravel che lo utilizzerà
Creare un collegamento effettivio -> php artisan migrate
Raccogliere i dati
Creare la struttura di una tabella -> Migration -> php artisan make:migration create_nometabella_table
Creare la tabella nel DB -> php artisan migrate
Creare un Model -> php artisan make:model Nomemodello