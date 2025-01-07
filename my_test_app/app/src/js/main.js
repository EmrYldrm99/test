console.log("Hello World!");

/*document.addEventListener("DOMContentLoaded", function() {
    // Öffne eine EventSource-Verbindung zum Server
    const eventSource = new EventSource('/events/stream');  // Der Pfad sollte auf deine CakePHP-Route zeigen

    let c = 0;
    // Wenn eine Nachricht vom Server empfangen wird
    eventSource.onmessage = function(event) {
        // Die vom Server gesendeten Daten
        const message = event.data;
        c++;
        console.log("Nachricht vom Server:" + c);
    };

    // Event-Handler für Verbindungsaufbau
    eventSource.onopen = function() {
        console.log("Verbindung zum Server erfolgreich hergestellt.");
    };

    // Event-Handler für Fehler
    eventSource.onerror = function(event) {
        console.error("Fehler beim Empfang der Ereignisse:", event);
        eventSource.close();  // Verbindung schließen, wenn ein Fehler auftritt
    };
});*/




