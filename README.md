# NieuweVoetbalclub Website

Dit project is een dynamische website gebouwd met Laravel, ontworpen om te voldoen aan de eisen van een informatieve en data-gedreven webtoepassing. Het biedt gebruikersfunctionaliteiten zoals inloggen, profielbeheer, nieuwsbeheer, een FAQ-sectie en een contactpagina.

## Projectvereisten

### Functionele vereisten

1. Login Systeem
   - Bezoekers kunnen inloggen en een account aanmaken.
   - Een account kan een gewone gebruiker of een admin zijn.
   - Admins kunnen gebruikersrollen beheren (gebruiker/admin).
   - Admins kunnen handmatig nieuwe gebruikers toevoegen.

2. Profielpagina
   - Elke gebruiker heeft een publieke profielpagina.
   - Ingelogde gebruikers kunnen hun eigen gegevens aanpassen.
   - Profiel bevat:
     - Gebruikersnaam
     - Verjaardag
     - Profielfoto
     - "Over mij" tekst

3. Laatste nieuwtjes
   - Admins kunnen nieuwsitems toevoegen, wijzigen en verwijderen.
   - Bezoekers kunnen een lijst en details van nieuwsitems bekijken.
   - Nieuwsitems bevatten:
     - Titel
     - Afbeelding
     - Content
     - Publicatiedatum

4. FAQ pagina
   - Bezoekers kunnen de FAQ-sectie bekijken.
   - Admins kunnen vragen, antwoorden en categorieën beheren.

5. Contact pagina
   - Bezoekers kunnen een contactformulier invullen.
   - Admins ontvangen een e-mail met de inhoud van het formulier.
   - Hun mails kunnen ze zien op de site Mailtrap --> https://mailtrap.io/


### Technische vereisten

1. Views
   - Minstens twee layouts.
   - Gebruik van componenten waar logisch.
   - Implementatie van XSS- en CSRF-bescherming.
   - Client-side validatie.

2. Routes
   - Alle routes gebruiken controller-methoden.
   - Routes zijn gegroepeerd en gebruiken middleware.

3. Controllers
   - Controllers zijn gestructureerd volgens CRUD-operaties.
   - Logica is opgesplitst per verantwoordelijkheid.

4. Models
   - Gebruik van Eloquent models.
   - Relaties:
     - Minstens één one-to-many relatie.
     - Minstens één many-to-many relatie.

5. Database
   - De database bevat alle noodzakelijke data.
   - "php artisan migrate:fresh --seed" kan worden uitgevoerd om de database te initialiseren.

6. Authenticatie
   - Standaard Laravel authenticatie (login, registratie, wachtwoord reset).
   - Eén standaard admin:
     - Gebruikersnaam: admin
     - E-mail: admin@voetbalclub.com
     - Wachtwoord: Password!321

7. Layout
   - Professionele en duidelijke lay-out.

8. GitHub
   - GitHub repository gebruikt.
   - Regelmatige commits met duidelijke commit messages.
   - `vendor` en `node_modules` toegevoegd aan `.gitignore`.

**Extra features**

1. Gebruikers kunnen een comment achterlaten op een nieuwtje.
2. Admins kunnen categorieën linken met nieuwsItems.

**//**


Configureer de database in `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=voetbalclub_db
   DB_USERNAME=root
   DB_PASSWORD=1234
   ```

Voer migraties en seeders uit:
   ```bash
   php artisan migrate:fresh --seed
   ```

Start de ontwikkelingsserver:
   ```bash
   php artisan serve
   ```

Bezoek de website op [http://127.0.0.1:8000]

Bronvermelding
- Laravel documentatie: [https://laravel.com/docs].
- Tutorials en voorbeelden van officiële Laravel bronnen.
- ChatGPT voor style, ideëen en README-file.
- Mailtrap.io gebruikt om mails te kunnen bekijken en ontvangen. (zie onderaan hoe het gebeurt)


Instellingen voor e-mailconfiguratie opgeslagen in .env file:

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=e25a2d9cf7dd19
MAIL_PASSWORD=93145d00d31d93
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="no-reply@voetbalclub.com"
MAIL_FROM_NAME="${APP_NAME}"
