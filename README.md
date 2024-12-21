# NieuweVoetbalclub Website

Dit project is een dynamische website gebouwd met Laravel 11, ontworpen om te voldoen aan de eisen van een informatieve en data-gedreven webtoepassing. Het biedt gebruikersfunctionaliteiten zoals inloggen, profielbeheer, nieuwsbeheer, een FAQ-sectie en een contactpagina.

## Projectvereisten

### Functionele vereisten

1. **Login Systeem**
   - Bezoekers kunnen inloggen en een account aanmaken.
   - Een account kan een gewone gebruiker of een admin zijn.
   - Admins kunnen gebruikersrollen beheren (gebruiker/admin).
   - Admins kunnen handmatig nieuwe gebruikers toevoegen.

2. **Profielpagina**
   - Elke gebruiker heeft een publieke profielpagina.
   - Ingelogde gebruikers kunnen hun eigen gegevens aanpassen.
   - Profiel bevat:
     - Gebruikersnaam
     - Verjaardag
     - Profielfoto
     - "Over mij" tekst

3. **Laatste nieuwtjes**
   - Admins kunnen nieuwsitems toevoegen, wijzigen en verwijderen.
   - Bezoekers kunnen een lijst en details van nieuwsitems bekijken.
   - Nieuwsitems bevatten:
     - Titel
     - Afbeelding
     - Content
     - Publicatiedatum

4. **FAQ pagina**
   - Bezoekers kunnen de FAQ-sectie bekijken.
   - Admins kunnen vragen, antwoorden en categorieën beheren.

5. **Contact pagina**
   - Bezoekers kunnen een contactformulier invullen.
   - Admins ontvangen een e-mail met de inhoud van het formulier.


### Technische vereisten

1. **Views**
   - Minstens twee layouts.
   - Gebruik van componenten waar logisch.
   - Implementatie van XSS- en CSRF-bescherming.
   - Client-side validatie.

2. **Routes**
   - Alle routes gebruiken controller-methoden.
   - Routes zijn gegroepeerd en gebruiken middleware.

3. **Controllers**
   - Controllers zijn gestructureerd volgens CRUD-operaties.
   - Logica is opgesplitst per verantwoordelijkheid.

4. **Models**
   - Gebruik van Eloquent models.
   - Relaties:
     - Minstens één one-to-many relatie.
     - Minstens één many-to-many relatie.

5. **Database**
   - De database bevat alle noodzakelijke data.
   - "php artisan migrate:fresh --seed" kan worden uitgevoerd om de database te initialiseren.

6. **Authenticatie**
   - Standaard Laravel authenticatie (login, registratie, wachtwoord reset).
   - Eén standaard admin:
     - Gebruikersnaam: admin
     - E-mail: admin@ehb.be
     - Wachtwoord: Password!321

7. **Layout**
   - Professionele en duidelijke lay-out.

8. **GitHub**
   - GitHub repository gebruikt.
   - Regelmatige commits met duidelijke commit messages.
   - `vendor` en `node_modules` toegevoegd aan `.gitignore`.
