<?php

namespace App\Event;

use Sse\Event;

class LatestMessage implements Event
{
    private $lastUpdateTime = 0;

    public function check()
    {
        $currentTime = time();

        // Überprüft, ob mehr als 5 Sekunden vergangen sind
        if ($currentTime - $this->lastUpdateTime >= 1) {
            $this->lastUpdateTime = $currentTime;
            return true; // Daten senden
        }

        return false; // Keine neuen Daten
    }

    /**
     * Get the data to send
     *
     * @return string
     */
    public function update()
    {
        // Hier wird die Nachricht erzeugt, die gesendet wird
        return json_encode([
            'time' => date('H:i:s'),
            'message' => 'Hello, world!'
        ]);
    }
}
