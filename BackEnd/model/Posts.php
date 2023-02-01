<?php
class Posts
{
    private $conn;

    public $id;
    public $token;
    public $nom_complet;
    public $naissance;
    public $nationalite;
    public $situation;
    public $address;
    public $type_visa;
    public $date_depart;
    public $date_arriver;
    public $type;
    public $numero_document;
    public $date_reservation;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function read()
    {
        $query = 'SELECT * FROM client ORDER BY date_reservation DESC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function read_single()
    {
        $query = 'SELECT * FROM client WHERE id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id'];
        $this->token = $row['token'];
        $this->nom_complet = $row['nom_complet'];
        $this->naissance = $row['naissance'];
        $this->nationalite = $row['nationalite'];
        $this->situation = $row['situation'];
        $this->address = $row['address'];
        $this->type_visa = $row['type_visa'];
        $this->date_depart = $row['date_depart'];
        $this->date_arriver = $row['date_arriver'];
        $this->type = $row['type'];
        $this->numero_document = $row['numero_document'];
        $this->date_reservation = $row['date_reservation'];
    }

    public function create()
    {
        $query = 'INSERT INTO client SET 
        `token` = :token, 
        `nom_complet` = :nom_complet,
        `naissance` = :naissance,
        `nationalite` = :nationalite, 
        `situation` = :situation, 
        `address` = :address, 
        `type_visa` = :type_visa, 
        `date_depart` = :date_depart, 
        `date_arriver` = :date_arriver, 
        `type` = :type, 
        `numero_document` = :numero_document, 
        `date_reservation` = :date_reservation';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':token', $this->token);
        $stmt->bindParam(':nom_complet', $this->nom_complet);
        $stmt->bindParam(':naissance', $this->naissance);
        $stmt->bindParam(':nationalite', $this->nationalite);
        $stmt->bindParam(':situation', $this->situation);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':type_visa', $this->type_visa);
        $stmt->bindParam(':date_depart', $this->date_depart);
        $stmt->bindParam(':date_arriver', $this->date_arriver);
        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':numero_document', $this->numero_document);
        $stmt->bindParam(':date_reservation', $this->date_reservation);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
