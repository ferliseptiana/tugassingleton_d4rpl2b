<?php

require_once ('db_connect.php');

class ViewArtist {

    protected PDO $db;
    private static ?ViewArtist $artist = null;
    
    public function __construct()
    {
        $this->db = DatabaseConnection::connect();
    }

    public static function instance(): ViewArtist
    {
        if (self::$artist === null) {
            self::$artist = new ViewArtist();
        }
        return self::$artist;
    }

    public function readArtist() {
        $sql = "SELECT * FROM artist";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
        
}
