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
