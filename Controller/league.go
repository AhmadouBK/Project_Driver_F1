package controller

import (
	"database/sql"
	"encoding/json"
	"net/http"
	model "project/Model"

	"fmt"
	"strconv"

	_ "github.com/go-sql-driver/mysql"
	"github.com/gorilla/mux"
)

func GetAllLeagues(w http.ResponseWriter, r *http.Request) {
	// Connexion à la base de données
	db, err := sql.Open("mysql", "apache:@tcp(127.0.0.1:3308)/formula_one")
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}
	defer db.Close()

	// Récupération de tous les enregistrements de la table "leagues"
	rows, err := db.Query("SELECT * FROM league")
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}
	defer rows.Close()

	// Création d'une liste de la structure "League"
	leagues := []model.League{}
	for rows.Next() {
		var league model.League
		err := rows.Scan(&league.Id_league, &league.Name)
		if err != nil {
			http.Error(w, err.Error(), http.StatusInternalServerError)
			return
		}
		leagues = append(leagues, league)
	}
	if err := rows.Err(); err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Encodage en JSON de la liste des leagues
	response, err := json.Marshal(leagues)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Envoi de la réponse
	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusOK)
	w.Write(response)
}

func CreateLeague(w http.ResponseWriter, r *http.Request) {
	var league model.League

	// Parse le JSON du corps de la requête et stocke les données dans l'objet league
	err := json.NewDecoder(r.Body).Decode(&league)
	if err != nil {
		http.Error(w, err.Error(), http.StatusBadRequest)
		return
	}

	// Ouvre une connexion à la base de données MySQL
	db, err := sql.Open("mysql", "apache:@tcp(127.0.0.1:3308)/formula_one")
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}
	defer db.Close()

	// Exécute la requête d'insertion
	result, err := db.Exec("INSERT INTO league (name) VALUES (?)", league.Name)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Récupère l'ID de la ligue qui vient d'être insérée
	id, err := result.LastInsertId()
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Crée un objet LeagueResponse pour stocker la réponse JSON
	response := model.LeagueResponse{
		Status:  http.StatusCreated,
		Message: "Succeed Insertion",
		Data:    model.League{Id_league: int(id), Name: league.Name},
	}

	// Convertit l'objet LeagueResponse en JSON et renvoie la réponse HTTP
	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusCreated)
	json.NewEncoder(w).Encode(response)
}

func UpdateLeague(w http.ResponseWriter, r *http.Request) {
	// Lecture des données du client à partir du corps de la requête
	var league model.League
	err := json.NewDecoder(r.Body).Decode(&league)
	if err != nil {
		http.Error(w, err.Error(), http.StatusBadRequest)
		return
	}

	// Connexion à la base de données
	db, err := sql.Open("mysql", "apache:@tcp(127.0.0.1:3308)/formula_one")
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}
	defer db.Close()

	// Exécution de la requête de modification
	result, err := db.Exec("UPDATE league SET name=? WHERE idleague=?", league.Name, league.Id_league)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Vérification du nombre de lignes affectées
	rowsAffected, err := result.RowsAffected()
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	if rowsAffected == 0 {
		http.Error(w, "Data not found", http.StatusBadRequest)
		return
	}

	// Création de la réponse
	response := model.LeagueResponse{
		Status:  http.StatusOK,
		Message: "Succeed Update",
		Data:    model.League{},
	}

	jsonResponse, err := json.Marshal(response)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Envoi de la réponse
	w.Header().Set("Content-Type", "application/json")
	w.Write(jsonResponse)
}

func DeleteLeague(w http.ResponseWriter, r *http.Request) {
	// Récupération de l'id de la ligue à supprimer depuis les paramètres de l'URL
	params := mux.Vars(r)
	id, err := strconv.Atoi(params["id"])
	if err != nil {
		http.Error(w, err.Error(), http.StatusBadRequest)
		return
	}

	// Connexion à la base de données
	db, err := sql.Open("mysql", "apache:@tcp(127.0.0.1:3308)/formula_one")
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}
	defer db.Close()

	// Exécution de la requête de suppression
	result, err := db.Exec("DELETE FROM league WHERE idleague = ?", id)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Récupération du nombre de lignes supprimées
	rowsAffected, err := result.RowsAffected()
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Création de la réponse
	response := model.LeagueResponse{
		Status:  http.StatusOK,
		Message: fmt.Sprintf("%d row(s) deleted", rowsAffected),
		Data:    model.League{},
	}

	// Envoi de la réponse
	w.Header().Set("Content-Type", "application/json")
	json.NewEncoder(w).Encode(response)
}
