
class Donnees
{

  constructor()
  {
    this.donnees = JSON.parse(localStorage.getItem("donnees"));

    if (this.donnees == null)
    {
      this.setDonnees();
    }
    else
    {
      let derniereRequete = new Date(this.donnees.Date).getTime();
      let aujourdhui      = new Date().getTime();

      if (aujourdhui - derniereRequete >= 6 * 60 * 60 * 1000)
      {
        this.setDonnees();
      }
    }

    this.colonnes =
    [
      "Pays",
      "Cas",
      "Guéris",
      "Morts",
      "Cas total",
      "Guéris total",
      "Morts total",
    ];

    this.pays = [];

    this.donnees.Countries.forEach((pays, i) =>
    {
      this.pays[i] =
      {
        "Pays":         pays.Country,
        "Cas":          pays.NewConfirmed,
        "Guéris":       pays.NewRecovered,
        "Morts":        pays.NewDeaths,
        "Cas total":    pays.TotalConfirmed,
        "Guéris total": pays.TotalRecovered,
        "Morts total":  pays.TotalDeaths,
      };
    });

    this.aujourdhui =
    {
      "Cas":    this.donnees.Global.NewConfirmed,
      "Morts":  this.donnees.Global.NewDeaths,
      "Guéris": this.donnees.Global.NewRecovered,
    };

    this.total =
    {
      "Cas":    this.donnees.Global.TotalConfirmed,
      "Morts":  this.donnees.Global.TotalDeaths,
      "Guéris": this.donnees.Global.TotalRecovered,
    };
  }



  setDonnees()
  {
    let parametres =
    {
      "url": "https://api.covid19api.com/summary",
      "method": "GET",
      "timeout": 0,
    };

    $.ajax(parametres).done((reponse) =>
    {
      localStorage.setItem("donnees", JSON.stringify(reponse));
      this.donnees = JSON.parse(localStorage.getItem("donnees"));
    });

    console.log("Données préparées.");
  }



  getColonnes()
  {
    return this.colonnes;
  }



  getPays()
  {
    return this.pays;
  }



  getAujourdhui()
  {
    return this.aujourdhui;
  }



  getTotal()
  {
    return this.total;
  }
}

