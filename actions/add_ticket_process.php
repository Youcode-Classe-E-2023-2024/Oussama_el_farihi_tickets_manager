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
    
    $ticketId = $ticket->createTicket($title, $description, $priority, $status, $creatorId);

if ($ticketId) {
    foreach ($assignedTo as $userId) {
        $ticket->assignUserToTicket($userId, $ticketId, 'Assigned Role');
    }
    header("Location: ../views/add_ticket.php?Adding_ticket=success");
} else {
    header("Location: ../views/add_ticket.php?Adding_ticket=error");
}

}
