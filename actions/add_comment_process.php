<?php
session_start();
require_once '../classes/Ticket.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'] ?? '';
    $ticketId = $_POST['id_ticket'] ?? '';
    $userId = $_SESSION['id_user'] ?? null; // Assuming user ID is stored in session

    $ticket = new Ticket();
    $ticket->addComment($userId, $ticketId, $comment);

    header("Location: details_ticket.php?id=$ticketId"); // Redirect back to the ticket details page
}
?>