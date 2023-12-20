<?php
require_once 'Database.php';

class Ticket
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function createTicket($title, $description, $priority, $status, $creatorId) {
        $title = $this->db->escape($title);
        $description = $this->db->escape($description);
        $priority = $this->db->escape($priority);
        $status = $this->db->escape($status);
    
        $sql = "INSERT INTO ticket (titre, description, priorite, status) VALUES ('$title', '$description', '$priority', '$status')";
        $this->db->query($sql);
    
        return $this->db->getLastInsertId();
    }

    public function assignUserToTicket($userId, $ticketId, $creator) {
        $userId = $this->db->escape($userId);
        $ticketId = $this->db->escape($ticketId);
        $creator = $this->db->escape($creator);
    
        $sql = "INSERT INTO userticket (id_user, id_ticket, creator) VALUES ('$userId', '$ticketId', '$creator')";
        return $this->db->query($sql);
    }
    


    public function updateTicket($id_ticket, $title, $description, $priority, $status, $assignedTo)
    {
        $title = $this->db->escape($title);
        $description = $this->db->escape($description);
        $priority = $this->db->escape($priority);
        $status = $this->db->escape($status);
        $assignedTo = $this->db->escape($assignedTo);

        $sql = "UPDATE ticket SET titre = '$title', description = '$description', priorite = '$priority', status = '$status', assigned_to = '$assignedTo' WHERE id_ticket = $id_ticket";

        return $this->db->query($sql);
    }


    public function deleteTicket($id_ticket)
    {
        $sql = "DELETE FROM ticket WHERE id_ticket = $id_ticket";

        return $this->db->query($sql);
    }

    public function getPriorities() {
        $sql = "SHOW COLUMNS FROM ticket LIKE 'priorite'";
        $result = $this->db->fetch($sql);

        if ($result) {
            $type = $result["Type"];
            preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
            $enum = explode("','", $matches[1]);
            return $enum;
        }

        return [];
    }

    public function getStatuses() {
        $sql = "SHOW COLUMNS FROM ticket LIKE 'status'";
        $result = $this->db->fetch($sql);

        if ($result) {
            $type = $result["Type"];
            preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
            $enum = explode("','", $matches[1]);
            return $enum;
        }

        return [];
    }

    public function getTickets() {
        $sql = "SELECT ticket.*, user.name, userticket.creator
        FROM ticket 
        INNER JOIN userticket ON ticket.id_ticket = userticket.id_ticket 
        INNER JOIN user ON userticket.id_user = user.id_user;";
        return $this->db->fetchAll($sql);
    }
    
    public function getTicketById($id_ticket) {
        $id_ticket = $this->db->escape($id_ticket); // Escape the input to prevent SQL injection

        $sql = "SELECT ticket.*, user.name, userticket.creator
                FROM ticket 
                INNER JOIN userticket ON ticket.id_ticket = userticket.id_ticket 
                INNER JOIN user ON userticket.id_user = user.id_user
                WHERE ticket.id_ticket = '$id_ticket';";

        $result = $this->db->fetch($sql); // Assuming fetch() retrieves a single row

        if ($result) {
            return $result;
        } else {
            return null; // Return null if no ticket is found
        }
    }

    public function addComment($userId, $ticketId, $comment) {
        $userId = $this->db->escape($userId);
        $ticketId = $this->db->escape($ticketId);
        $comment = $this->db->escape($comment);
    
        $sql = "INSERT INTO comment (content, id_ticket, id_user, creatingDate) VALUES ('$comment', '$ticketId', '$userId', NOW())";
        return $this->db->query($sql);
    }
    
    public function getCommentsByTicketId($ticketId) {
        $ticketId = $this->db->escape($ticketId);
        $sql = "SELECT * FROM comment WHERE id_ticket = '$ticketId'";
        return $this->db->fetchAll($sql);
    }
    

}
?>