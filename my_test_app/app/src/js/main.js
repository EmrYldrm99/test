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

document.addEventListener("DOMContentLoaded", () => {
    const upperTableBody = document.querySelector(".requests-container:first-of-type .requests-data");
    const lowerTableBody = document.querySelector(".requests-container:last-of-type .requests-data");

    // Funktion zum Verschieben der Zeile
    function moveRow(row, targetTableBody, newButtonText) {
        targetTableBody.appendChild(row);

        // Button-Text ändern
        const actionCell = row.querySelector("td:last-child");
        const viewLink = actionCell.querySelector("a"); // Behalte den View-Link
        actionCell.innerHTML = ""; // Lösche den Inhalt der Zelle
        actionCell.appendChild(viewLink); // Füge den View-Link wieder ein
        const button = document.createElement("button");
        button.textContent = newButtonText;
        actionCell.appendChild(button);

        // Event-Listener für den neuen Button hinzufügen
        button.addEventListener("click", () => {
            if (newButtonText === "Remove") {
                moveRow(row, upperTableBody, "Select");
            } else {
                moveRow(row, lowerTableBody, "Remove");
            }
            sortTable(targetTableBody); // Sortiere nach jeder Verschiebung
        });

        sortTable(targetTableBody); // Sortiere nach jeder Verschiebung
    }

    // Funktion zum Sortieren der Tabelle nach `id`
    function sortTable(tbody) {
        const rows = Array.from(tbody.querySelectorAll("tr"));
        rows.sort((a, b) => {
            const idA = parseInt(a.querySelector("td:first-child").textContent, 10);
            const idB = parseInt(b.querySelector("td:first-child").textContent, 10);
            return idA - idB;
        });

        // Reihenfolge der Zeilen im DOM aktualisieren
        rows.forEach(row => tbody.appendChild(row));
    }

    // Event-Listener für alle Select-Buttons hinzufügen
    upperTableBody.querySelectorAll("button").forEach(button => {
        button.addEventListener("click", (event) => {
            const row = event.target.closest("tr");
            moveRow(row, lowerTableBody, "Remove");
        });
    });
});

