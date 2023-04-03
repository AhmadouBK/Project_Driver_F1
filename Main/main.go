package main

import (
	"fmt"
	"log"
	"net/http"

	_ "github.com/go-sql-driver/mysql"
	"github.com/gorilla/mux"

	controller "project/Controller"
)

func main() {
	router := mux.NewRouter()

	// routes for league
	router.HandleFunc("/leagues/", controller.GetAllLeagues).Methods("GET")
	router.HandleFunc("/leagues/add/", controller.CreateLeague).Methods("POST")
	router.HandleFunc("/leagues/update/", controller.UpdateLeague).Methods("PUT")
	router.HandleFunc("/leagues/delete/{id}", controller.DeleteLeague).Methods("DELETE")

	//routes for team
	router.HandleFunc("/teams/", controller.GetAllTeams).Methods("GET")
	router.HandleFunc("/teams/add/", controller.CreateTeam).Methods("POST")
	router.HandleFunc("/teams/update/", controller.UpdateTeam).Methods("PUT")
	router.HandleFunc("/teams/delete/{id}", controller.DeleteTeam).Methods("DELETE")

	//routes for driver
	router.HandleFunc("/drivers/", controller.GetAllDrivers).Methods("GET")
	router.HandleFunc("/drivers/add/", controller.CreateDriver).Methods("POST")
	router.HandleFunc("/drivers/update/", controller.UpdateDriver).Methods("PUT")
	router.HandleFunc("/drivers/delete/{id}", controller.DeleteDriver).Methods("DELETE")
	http.Handle("/", router)
	fmt.Println("Connected to port 8080")
	log.Fatal(http.ListenAndServe(":8080", router))
}
