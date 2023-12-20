<?php
session_start();
require_once '../classes/Ticket.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'] ?? '';
    $assignedTo = $_POST['assignedTo'] ?? []; // C'est un tableau
    $status = $_POST['status'] ?? '';
    $priority = $_POST['priority'] ?? '';
    $description = $_POST['description'] ?? '';
    $creatorId = $_SESSION['user_id'] ?? null;

    if ($creatorId === null) {
        // Gérer l'erreur : Utilisateur non connecté ou ID non disponible
    }

    // Convertir le tableau $assignedTo en chaîne
    $assignedToString = implode(',', $assignedTo);

    $ticket = new Ticket();
    $result = $ticket->createTicket($title, $description, $priority, $status, $assignedToString);

    if ($result) {
        // Rediriger ou afficher un message de succès
    } else {
        // Afficher un message d'erreur
    }
    $ticketId = $ticket->createTicket($title, $description, $priority, $status, $creatorId);

if ($ticketId) {
    // Associer les utilisateurs sélectionnés au ticket
    foreach ($assignedTo as $userId) {
        $ticket->assignUserToTicket($userId, $ticketId, 'Assigned Role');
    }
    // Redirection ou affichage d'un message de succès
} else {
    // Affichage d'un message d'erreur
}

}
