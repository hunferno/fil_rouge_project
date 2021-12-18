<?php

class User
{

    private string $uniqueId_user;
    private string $nom_user;
    private string $prenom_user;
    private string $adresse_user;
    private string $telephone_user;
    private string $email_user;
    private string $password_user;
    private string $date_inscription_user;
    private string $photo_profile_user;
    private string $expiration_abo_user;
    private int $id_categorie_user;

    public function __construct(string $uniqueId, string $nom, string $prenom, string $adresse, string $telephone, string $email, string $password, string $date_inscription, string $photo_profile, string $expiration_abo, int $id_categorie)
    {
        $this->uniqueId_user = $uniqueId;
        $this->nom_user = $nom;
        $this->prenom_user = $prenom;
        $this->adresse_user = $adresse;
        $this->telephone_user = $telephone;
        $this->email_user = $email;
        $this->password_user = $password;
        $this->date_inscription_user = $date_inscription;
        $this->photo_profile_user = $photo_profile;
        $this->expiration_abo_user = $expiration_abo;
        $this->id_categorie_user = $id_categorie;
    }

    public function getUniqueId()
    {
        return $this->uniqueId_user;
    }

    public function getNom()
    {
        return $this->nom_user;
    }

    public function getPrenom()
    {
        return $this->prenom_user;
    }

    public function getAdresse()
    {
        return $this->adresse_user;
    }

    public function getTelephone()
    {
        return $this->telephone_user;
    }

    public function getEmail()
    {
        return $this->email_user;
    }

    public function getDateInscription()
    {
        return $this->date_inscription_user;
    }

    public function getPhotoProfile()
    {
        return $this->photo_profile_user;
    }

    public function getExpirationAbo()
    {
        return $this->expiration_abo_user;
    }
}
