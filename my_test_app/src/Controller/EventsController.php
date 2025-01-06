<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         3.3.4
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Sse\SSE;
use App\Event\LatestMessage;

class EventsController extends Controller
{

    // Für die Standard-Ansicht
    public function index()
    {
        // Hier keine Änderungen nötig, View wird automatisch gerendert
        $this->set('message', 'Willkommen auf der Events-Seite!');
        // Hier wird die index.html automatisch gerendert
    }

    public function stream()
    {
        // Disable CakePHP's default view rendering
        $this->autoRender = false;

        // Create an SSE instance
        $sse = new SSE();
        $sse->sleep_time = 5;
        //$sse->exec_limit = 5; // Optional: Limitiert die Anzahl der Durchläufe (5 Iterationen)

        // Add a custom event listener
        $sse->addEventListener('message', new LatestMessage());

        // Create a Symfony StreamedResponse
        $response = $sse->createResponse();

        if ($response instanceof StreamedResponse) {
            // Send the response and stop further processing
            $response->send();
            exit;
        }

        // Fallback for CakePHP (in case the response is not as expected)
        return $this->response;
    }
}
