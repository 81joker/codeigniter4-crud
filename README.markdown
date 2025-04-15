# CodeIgniter 4 Projekt

## Übersicht der Anwendung

Diese Anwendung bietet Funktionen zur Verwaltung von **Benutzern** und **Beiträgen**. Im Folgenden finden Sie eine detaillierte Erklärung beider Funktionen.

---

## Benutzerverwaltung

### Funktionen:
1. **Suche**: 
   - Ermöglicht die Suche nach Benutzern anhand ihres `Vorname`, `Nachname` oder `E-Mail`.
   - Suchergebnisse werden dynamisch basierend auf der Suchanfrage gefiltert.

2. **Sortierung**:
   - Benutzer können nach verschiedenen Feldern wie `updated_at` in aufsteigender oder absteigender Reihenfolge sortiert werden.

3. **Paginierung**:
   - Unterstützt die Seitennummerierung, um eine begrenzte Anzahl von Benutzern pro Seite anzuzeigen. Der Standardwert beträgt 10 Benutzer pro Seite, kann jedoch angepasst werden.

4. **Datenanzeige**:
   - Eine Liste von Benutzern wird mit der Möglichkeit angezeigt, zwischen Seiten zu navigieren, die Sortierung anzuwenden und zu suchen.

### Beispielcode:
Nachfolgend ein Beispiel, wie Benutzer abgerufen und angezeigt werden:
```php
$perPage = $this->request->getGet('per_page') ?? 10;
$search = $this->request->getGet('search') ?? '';
$sortField = $this->request->getGet('sort_field') ?? 'updated_at';
$sortDirection = $this->request->getGet('sort_direction') ?? 'DESC';

$sortDirection = strtoupper($sortDirection) === 'ASC' ? 'ASC' : 'DESC';

$userModel = new UserModel();
$query = $userModel;

if (!empty($search)) {
    $query = $query->groupStart()
        ->like('firstname', $search)
        ->orLike('lastname', $search)
        ->orLike('email', $search)
        ->groupEnd();
}

$query = $query->orderBy($sortField, $sortDirection);

$data = [
    'users' => $query->paginate($perPage),
    'pager' => $userModel->pager,
    'search' => $search,
    'sortField' => $sortField,
    'sortDirection' => $sortDirection
];

return view('users/index', ['users' => $data]);
```

---

## Beitragsverwaltung

### Funktionen:
1. **Beiträge erstellen**: 
   - Benutzer können neue Beiträge mit relevanten Feldern wie `Titel`, `Inhalt` und `Autor` erstellen.

2. **Beiträge bearbeiten**:
   - Vorhandene Beiträge können von autorisierten Benutzern aktualisiert werden.

3. **Beiträge löschen**:
   - Beiträge können von autorisierten Benutzern gelöscht werden.

4. **Suche und Filter**:
   - Beiträge können basierend auf Schlüsselwörtern im Titel oder Inhalt durchsucht und gefiltert werden.

5. **Sortierung**:
   - Beiträge können nach Feldern wie `created_at` oder `updated_at` sortiert werden.

6. **Paginierung**:
   - Ähnlich wie bei Benutzern unterstützt die Beitragsfunktion die Seitennummerierung für die Verwaltung großer Datensätze.

### Beispielcode:
Nachfolgend ein Beispiel, wie Beiträge abgerufen und verwaltet werden:
```php
$perPage = $this->request->getGet('per_page') ?? 10;
$search = $this->request->getGet('search') ?? '';
$sortField = $this->request->getGet('sort_field') ?? 'created_at';
$sortDirection = $this->request->getGet('sort_direction') ?? 'DESC';

$sortDirection = strtoupper($sortDirection) === 'ASC' ? 'ASC' : 'DESC';

$postModel = new PostModel();
$query = $postModel;

if (!empty($search)) {
    $query = $query->groupStart()
        ->like('title', $search)
        ->orLike('content', $search)
        ->groupEnd();
}

$query = $query->orderBy($sortField, $sortDirection);

$data = [
    'posts' => $query->paginate($perPage),
    'pager' => $postModel->pager,
    'search' => $search,
    'sortField' => $sortField,
    'sortDirection' => $sortDirection
];

return view('posts/index', ['posts' => $data]);
```

---

## Installationsanleitung

1. **Abhängigkeiten installieren**
   ```bash
   cd app
   composer install
   ```

2. **Docker-Container starten**
   ```bash
   docker-compose up --build -d
   ```

3. **Auf Anwendungscontainer zugreifen**
   ```bash
   docker exec -it app bash
   ```

4. **Entwicklungsserver starten**
   ```bash
   php spark serve
   ```

---

## Datenbankverbindungsprobleme beheben

Wenn Sie auf MySQL-Verbindungsprobleme stoßen, können Sie die Testdatei `public/test_db.php` verwenden, um Ihre Verbindung zu überprüfen.

Diese Testdatei versucht, mit den folgenden Umgebungsvariablen (oder Standardwerten, falls nicht festgelegt) eine Verbindung herzustellen:
- Hostname: `database.default.hostname` (Standard: 'db')
- Benutzername: `database.default.username` (Standard: 'ci4_user')
- Passwort: `database.default.password` (Standard: 'ci4_password')
- Datenbank: `database.default.database` (Standard: 'ci4')

Das Testskript zeigt den Verbindungsstatus und verwendete Parameter zur Fehlerbehebung an.

---

## Entwicklerbeiträge

Ich habe die Coding-Challenge am Wochenende abgeschlossen. Nachfolgend eine Liste dessen, was ich in diesem CodeIgniter-4-Projekt implementiert habe:

1. **Vollständiges Benutzermodul erstellt:**
   - Modell, Controller, Routen und Views für **Benutzer** erstellt.
   - Die `UserTable` definiert und erstellt mit folgenden Feldern:
     - `firstname`
     - `lastname`
     - `email`
     - `status`

2. **Datenbank-Seeder:**
   - Einen Seeder erstellt, um die `users`-Tabelle mit Anfangsdaten zu füllen.
   - Den Seeder mit folgendem Befehl ausgeführt:
     ```bash
     php spark db:seed
     ```
   - Dies half, die Funktionalität des Benutzermoduls schnell zu testen.

3. **Zugriff mit Routen steuern:**
   - Routen für die Benutzerverwaltungsfunktionen eingerichtet.
   - Überprüft, dass alle Routen wie erwartet funktionieren (Erstellen, Lesen, Aktualisieren, Löschen).

4. **UI-Ansichten für Benutzer:**
   - Basisansichten für die Auflistung und Verwaltung von Benutzern implementiert.
   - Die Ansichten wurden sauber und funktionsorientiert gehalten.

5. **Alles lokal getestet:**
   - Sichergestellt, dass die App mit folgendem Befehl läuft:
     ```bash
     php spark serve
     ```
   - Außerdem die Datenbankkonnektivität über das Testskript `test_db.php` überprüft.

---

## Technische Details

- **Verwendetes Framework**: CodeIgniter 4.
- **Datenbankmodelle**: 
  - `UserModel` für die Benutzerverwaltung.
  - `PostModel` für die Beitragsverwaltung.
- **Ansichten**:
  - `users/index` für die Benutzerfunktion.
  - `posts/index` für die Beitragsfunktion.

## Anwendung ausführen

1. Klonen Sie das Repository auf Ihren lokalen Rechner.
2. Installieren Sie die Abhängigkeiten mit `composer install`.
3. Konfigurieren Sie die Datenbankverbindung in der `.env`-Datei.
4. Führen Sie Migrationen aus, um die erforderlichen Tabellen zu erstellen: `php spark migrate`.
5. Starten Sie den Entwicklungsserver: `php spark serve`.
6. Greifen Sie über `http://localhost:8080` auf die Anwendung zu.

---

## Beitragsrichtlinien

1. Forken Sie das Repository und erstellen Sie Ihren Feature-Branch.
2. Nehmen Sie Ihre Änderungen vor und committen Sie sie mit beschreibenden Nachrichten.
3. Reichen Sie einen Pull Request zur Überprüfung ein.

## Lizenz

Dieses Projekt ist unter der MIT-Lizenz lizenziert.