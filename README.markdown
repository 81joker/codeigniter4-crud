
# CodeIgniter 4

 **CodeIgniter 4** zur Verwaltung von Benutzern und Beiträgen – mit vollständigem CRUD, Bild-Uploads, Daten-Seeding und Beziehungen (Eins-zu-Viele: Benutzer → Beiträge). Das Dashboard zeigt alle Benutzer und Beiträge an. Ich habe die **Aktivitätsverfolgung für Benutzer und Beiträge** implementiert, die am unteren Rand der Seite angezeigt wird. Benutzer werden neben Beiträgen angezeigt, und beim Klicken auf einen von ihnen werden alle Details zum ausgewählten Element angezeigt.

---

##  Projektstruktur

###  Benutzer (Users)

- **Model:** `UserModel`
- **Controller:** `UserController`
- **Views:** Erstellen, Bearbeiten, Anzeigen, Auflisten
- **Routen:** Ressourcengesteuert (`/users`)
- **Datenbanktabelle:** `users`
  - Felder: `firstname`, `lastname`, `email`, `avatar`, `status`
- **Seeder:** `UserSeeder`
- **Funktionen:**
  - Benutzer erstellen, anzeigen, bearbeiten, löschen
  - Suche, Sortierung und Paginierung
  - Avatar-Upload mit Validierung
  - Statusverwaltung: aktiv/inaktiv

### Beiträge (Posts)

- **Model:** `PostModel`
- **Controller:** `PostController`
- **Views:** Erstellen, Bearbeiten, Anzeigen, Auflisten
- **Routen:** Ressourcengesteuert (`/posts`)
- **Datenbanktabelle:** `posts`
  - Felder: `title`, `content`, `status`, `user_id`, `image`
- **Seeder:** `PostSeeder`
- **Funktionen:**
  - Beiträge erstellen, anzeigen, bearbeiten, löschen
  - Beziehung zu Benutzern (Eins-zu-Viele)
  - Bild-Upload mit Validierung
  - Suche und Sortierung (auch nach Benutzerinformationen)
  - Statusverwaltung: aktiv/inaktiv

---

##  Dashboard

- Zeigt alle Benutzer und Beiträge auf einer Seite an
- Benutzer & Beiträge sind nebeneinander gelistet
- **Aktivitätsverlauf** wird am unteren Rand angezeigt
- Beim Klicken auf ein Element werden vollständige Details angezeigt

---

## Umgebungseinrichtung

Dieses Projekt ist mit Docker containerisiert. Folgen Sie den unten stehenden Schritten, um die Anwendung einzurichten und auszuführen.

### Schritte zum Einrichten der Umgebung
1. Erstellen und starten Sie die Docker-Container:
```bash
docker compose up --build -d
```

2. Greifen Sie auf den Anwendungscontainer zu:
```bash
docker compose exec app sh
```

3. Aktualisieren Sie im Container die Abhängigkeiten:
```bash
composer update
```

4. Führen Sie die Datenbankmigrationen durch:
```bash
php spark migrate
```

5. Füllen Sie die Datenbank mit den Anfangsdaten:
```bash
php spark db:seed UserSeeder
php spark db:seed PostSeeder
```
## Fehlerbehebung bei Datenbankverbindungen

Wenn Sie auf MySQL-Verbindungsprobleme stoßen, können Sie die Testdatei unter `public/test_db.php` verwenden, um Ihre Verbindung zu überprüfen.

Diese Testdatei versucht, sich mit den folgenden Umgebungsvariablen zu verbinden (oder verwendet Standardwerte, falls diese nicht gesetzt sind):
- Hostname: `database.default.hostname` (Standard: 'db')
- Benutzername: `database.default.username` (Standard: 'ci4_user')
- Passwort: `database.default.password` (Standard: 'ci4_password')
- Datenbank: `database.default.database` (Standard: 'ci4')

Das Testskript zeigt den Verbindungsstatus und die verwendeten Parameter zur Fehlersuche an.

