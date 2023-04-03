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

func GetAllTeams(w http.ResponseWriter, r *http.Request) {
	// Connexion à la base de données
	db, err := sql.Open("mysql", "apache:@tcp(127.0.0.1:3308)/formula_one")
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}
	defer db.Close()

	// Récupération de tous les enregistrements de la table
	rows, err := db.Query("SELECT * FROM team")
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}
	defer rows.Close()

	// Création d'une liste de la structure
	teams := []model.Team{}
	for rows.Next() {
		var team model.Team
		err := rows.Scan(&team.Id_Team, &team.Name, &team.Points, &team.League)
		if err != nil {
			http.Error(w, err.Error(), http.StatusInternalServerError)
			return
		}
		teams = append(teams, team)
	}
	if err := rows.Err(); err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Encodage en JSON de la liste
	response, err := json.Marshal(teams)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Envoi de la réponse
	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusOK)
	w.Write(response)
}

type LeagueTeam struct {
	Status  int        `json:"status"`
	Message string     `json:"message"`
	Data    model.Team `json:"data"`
}

func CreateTeam(w http.ResponseWriter, r *http.Request) {
	// Lecture des données du client à partir du corps de la requête
	var team model.Team
	err := json.NewDecoder(r.Body).Decode(&team)
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

	// Exécution de la requête d'insertion
	result, err := db.Exec("INSERT INTO team (name, team_points, league) VALUES (?, ?, ?)", &team.Name, &team.Points, &team.League)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Récupération de l'ID généré automatiquement
	id, err := result.LastInsertId()
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Récupération des données de la nouvelle équipe
	var leagueTeam LeagueTeam
	leagueTeam.Status = http.StatusCreated
	leagueTeam.Message = "Team added successfully"
	team.Id_Team = int(id)
	leagueTeam.Data = team

	// Création de la réponse
	response, err := json.Marshal(leagueTeam)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Envoi de la réponse
	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusCreated)
	w.Write(response)
}

func UpdateTeam(w http.ResponseWriter, r *http.Request) {
	// Lecture des données du client à partir du corps de la requête
	var team model.Team
	err := json.NewDecoder(r.Body).Decode(&team)
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
	result, err := db.Exec("UPDATE team SET name=?, team_points=?, league=? WHERE idteam=?", team.Name, team.Points, team.League, team.Id_Team)
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
	response := model.TeamResponse{
		Status:  http.StatusOK,
		Message: "Succeed Update",
		Data:    model.Team{},
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

func DeleteTeam(w http.ResponseWriter, r *http.Request) {
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
	result, err := db.Exec("DELETE FROM team WHERE idteam = ?", id)
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
	response := model.TeamResponse{
		Status:  http.StatusOK,
		Message: fmt.Sprintf("%d row(s) deleted", rowsAffected),
		Data:    model.Team{},
	}

	// Envoi de la réponse
	w.Header().Set("Content-Type", "application/json")
	json.NewEncoder(w).Encode(response)
}
