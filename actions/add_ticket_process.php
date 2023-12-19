<?php
session_start();
require_once '../core/Ticket.php';

// Assurez-vous que l'utilisateur est connecté
// ...

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérez les données du formulaire
    $title = $_POST['title'];
    $assignedTo = $_POST['assignedTo']; // Assurez-vous de traiter correctement cette donnée
    $status = $_POST['status'];
    $priority = $_POST['priority'];
    $description = $_POST['description'];

    // Création d'une instance de Ticket
    $ticket = new Ticket();
    $result = $ticket->createTicket($title, $description, $priority, $status, $assignedTo);

    if ($result) {
        // Traitement réussi, redirigez ou affichez un message de succès
    } else {
        // Traitement échoué, affichez un message d'erreur
    }
}




?>