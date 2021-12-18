<?php

class Livre
{
    private string $id_livre;
    private string $titre_livre;
    private string $disponibilite_livre;
    private string $date_parution_livre;
    private string $photo_livre;
    private string $id_theme;
    private string $id_auteur;
    private string $id_editeur;

    public function __construct($id, $titre, $dispo, $date_parution, $photo, $id_theme, $id_auteur, $id_editeur)
    {
        $this->id_livre = $id;
        $this->titre_livre = $titre;
        $this->disponibilite_livre = $dispo;
        $this->date_parution_livre = $date_parution;
        $this->photo_livre = $photo;
        $this->id_theme = $id_theme;
        $this->id_auteur = $id_auteur;
        $this->id_editeur = $id_editeur;
    }

    public function getIdLivre()
    {
        return $this->id_livre;
    }

    public function getTitreLivre()
    {
        return $this->titre_livre;
    }

    public function getDispoLivre()
    {
        return $this->disponibilite_livre;
    }

    public function getDateParutionLivre()
    {
        return $this->date_parution_livre;
    }

    public function getPhotoLivre()
    {
        return $this->photo_livre;
    }

    public function getIdTheme()
    {
        return $this->id_theme;
    }

    public function getIdAuteur()
    {
        return $this->id_auteur;
    }

    public function getIdEditeur()
    {
        return $this->id_editeur;
    }
}
