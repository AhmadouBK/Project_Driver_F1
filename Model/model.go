package model

type League struct {
	Id_league int    `json:"idleague"`
	Name      string `json:"name"`
}

type LeagueResponse struct {
	Status  int    `json:"status"`
	Message string `json:"message"`
	Data    League `json:"data"`
}

type Team struct {
	Id_Team int    `json:"idteam"`
	Name    string `json:"name"`
	Points  int    `json:"team_points"`
	League  int    `json:"league"`
}

type TeamResponse struct {
	Status  int    `json:"status"`
	Message string `json:"message"`
	Data    Team   `json:"data"`
}

type Driver struct {
	Id_Driver int    `json:"iddriver"`
	Name      string `json:"name"`
	Points    int    `json:"driver_points"`
	Team      int    `json:"team"`
}
