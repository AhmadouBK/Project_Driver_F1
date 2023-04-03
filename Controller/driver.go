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

func GetAllDrivers(w http.ResponseWriter, r *http.Request) {
	// Connexion à la base de données
	db, err := sql.Open("mysql", "apache:@tcp(127.0.0.1:3308)/formula_one")
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}
	defer db.Close()

	// Récupération de tous les enregistrements de la table
	rows, err := db.Query("SELECT * FROM driver")
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}
	defer rows.Close()

	// Création d'une liste de la structure
	drivers := []model.Driver{}
	for rows.Next() {
		var driver model.Driver
		err := rows.Scan(&driver.Id_Driver, &driver.Name, &driver.Points, &driver.Team)
		if err != nil {
			http.Error(w, err.Error(), http.StatusInternalServerError)
			return
		}
		drivers = append(drivers, driver)
	}
	if err := rows.Err(); err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Encodage en JSON de la liste
	response, err := json.Marshal(drivers)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Envoi de la réponse
	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusOK)
	w.Write(response)
}

type DriverTeam struct {
	Status  int          `json:"status"`
	Message string       `json:"message"`
	Data    model.Driver `json:"data"`
}

func CreateDriver(w http.ResponseWriter, r *http.Request) {
	// Lecture des données du client à partir du corps de la requête
	var driver model.Driver
	err := json.NewDecoder(r.Body).Decode(&driver)
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
	result, err := db.Exec("INSERT INTO driver (iddriver, name, driver_points, team) VALUES (?, ?, ?, ?)", &driver.Id_Driver, &driver.Name, &driver.Points, &driver.Team)
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

	// Récupération des données
	var driverTeam DriverTeam
	driverTeam.Status = http.StatusCreated
	driverTeam.Message = "Data added successfully"
	driver.Id_Driver = int(id)
	driverTeam.Data = driver

	// Création de la réponse
	response, err := json.Marshal(driverTeam)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Envoi de la réponse
	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusCreated)
	w.Write(response)
}

func UpdateDriver(w http.ResponseWriter, r *http.Request) {
	// Lecture des données du client à partir du corps de la requête
	var driver model.Driver
	err := json.NewDecoder(r.Body).Decode(&driver)
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
	result, err := db.Exec("UPDATE driver SET iddriver=?, name=?, driver_points=?, team=? WHERE iddriver=?", driver.Id_Driver, driver.Name, driver.Points, driver.Team, driver.Id_Driver)
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
	response := DriverTeam{
		Status:  http.StatusOK,
		Message: "Succeed Update",
		Data:    model.Driver{},
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

func DeleteDriver(w http.ResponseWriter, r *http.Request) {
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
	result, err := db.Exec("DELETE FROM driver WHERE iddriver = ?", id)
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
	response := DriverTeam{
		Status:  http.StatusOK,
		Message: fmt.Sprintf("%d row(s) deleted", rowsAffected),
		Data:    model.Driver{},
	}

	// Envoi de la réponse
	w.Header().Set("Content-Type", "application/json")
	json.NewEncoder(w).Encode(response)
}
