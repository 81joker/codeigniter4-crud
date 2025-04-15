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

Bei Problemen mit der MySQL-Verbindung können Sie die Datenbank-Testdatei unter „public/test_db.php“ verwenden, um Ihre Verbindung zu überprüfen.

Diese Testdatei versucht, eine Verbindung mit den folgenden Umgebungsvariablen herzustellen (oder mit den Standardwerten, falls diese nicht festgelegt sind):
– Hostname: „database.default.hostname“ (Standard: „db“)
– Benutzername: „database.default.username“ (Standard: „ci4_user“)
– Passwort: „database.default.password“ (Standard: „ci4_password“)
– Datenbank: „database.default.database“ (Standard: „ci4“)

Das Testskript zeigt den Verbindungsstatus und die für die Fehlerbehebung verwendeten Parameter an.
