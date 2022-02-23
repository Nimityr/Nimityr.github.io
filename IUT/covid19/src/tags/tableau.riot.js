window.__riot_registry__['tableau'] = (function (global){return {
  'css': null,

  'exports': {
    onBeforeMount()
    {
      this.state =
      {
        donnees:  this.props.donnees,
        trierPar: this.props.colonnes[0],
        page:     this.props.page,
      };

      /* Ordre par défaut. */
      // this.trierParOrdreCroissant();

      this.setPages();
      this.setContenu();
    },

    onMounted()
    {
      this.setPage(this.props.page);
    },

    setPages()
    {
      let nombrePages = this.state.donnees.length / this.props.taille;

      this.state.pages = [];

      for (let i = 0; i < nombrePages; i++)
      {
        this.state.pages[i] = i + 1;
      }

      if (this.state.page > nombrePages)
      {
        this.setPage(this.props.page);
      }
    },

    setPage(p)
    {
      let sommaire = this.$$('a');

      sommaire[this.state.page - 1].style.textDecoration = "none";
      sommaire[p - 1].style.textDecoration = "underline";

      this.state.page = p;
    },

    setContenu()
    {
      let debut = (this.state.page - 1) * this.props.taille;

      this.state.contenu = [];

      this.state.donnees.forEach((ligne, i) =>
      {
        if (i >= debut)
        {
          if (i >= this.state.page * this.props.taille)
          {
            return;
          }

          this.state.contenu[i - debut] = ligne;
        }
      });
    },

    changerPage(e)
    {
      e.preventDefault();

      this.setPage(e.target.innerText);

      this.setContenu();
      this.update();
    },

    trier(e)
    {
      e.preventDefault();

      this.setPage(this.props.page);

      let colonne = e.target.innerText;

      if (colonne == this.state.trierPar)
      {
        this.state.trierPar = "";

        /* Ordre décroissant. */
        this.trierParOrdreDecroissant(colonne);
      }
      else
      {
        this.state.trierPar = colonne;

        /* Ordre croissant. */
        this.trierParOrdreCroissant(colonne);
      }

      this.setContenu();
      this.update();
    },

    trierParOrdreDecroissant(colonne)
    {
      this.state.donnees.sort((a, b) =>
      {
        if (a[colonne] > b[colonne])
        {
          return -1;
        }

        if (a[colonne] < b[colonne])
        {
          return 1;
        }

        return this.trierParPremiereColonne(a, b);
      });
    },

    trierParOrdreCroissant(colonne)
    {
      this.state.donnees.sort((a, b) =>
      {
        if (a[colonne] < b[colonne])
        {
          return -1;
        }

        if (a[colonne] > b[colonne])
        {
          return 1;
        }

        return this.trierParPremiereColonne(a, b);
      });
    },

    trierParPremiereColonne(a, b)
    {
      if (a[0] < b[0])
      {
        return -1;
      }

      if (a[0] > b[0])
      {
        return 1;
      }

      return 0;
    },

    filtrer(e)
    {
      let input  = this.$('input');
      let filtre = input.value.toUpperCase();

      this.state.donnees = this.props.donnees;

      if (filtre != "")
      {
        let index  = 0;

        this.state.contenu = [];

        this.state.donnees.forEach((ligne, i) =>
        {
          let pays = Object.values(ligne)[0];

          if (pays.toUpperCase().indexOf(filtre) > -1)
          {
            this.state.contenu[index++] = ligne;
          }
        });

        this.state.donnees = this.state.contenu;
      }

      this.setPages();
      this.setContenu();
      this.update();
    }
  },

  'template': function(
    template,
    expressionTypes,
    bindingTypes,
    getComponent
  ) {
    return template(
      '<div grid><div column="9"><input expr7="expr7" type="text" name="filtre" value placeholder="Chercher un pays..."/></div><div column="3"><a expr8="expr8" href="#" style="margin-right: 5px"></a></div></div><table><thead><tr><td expr9="expr9"></td></tr></thead><tbody><tr expr11="expr11"></tr></tbody></table>',
      [
        {
          'redundantAttribute': 'expr7',
          'selector': '[expr7]',

          'expressions': [
            {
              'type': expressionTypes.EVENT,
              'name': 'onkeyup',

              'evaluate': function(
                scope
              ) {
                return scope.filtrer;
              }
            }
          ]
        },
        {
          'type': bindingTypes.EACH,
          'getKey': null,
          'condition': null,

          'template': template(
            ' ',
            [
              {
                'expressions': [
                  {
                    'type': expressionTypes.TEXT,
                    'childNodeIndex': 0,

                    'evaluate': function(
                      scope
                    ) {
                      return scope.numero;
                    }
                  },
                  {
                    'type': expressionTypes.EVENT,
                    'name': 'onclick',

                    'evaluate': function(
                      scope
                    ) {
                      return scope.changerPage;
                    }
                  }
                ]
              }
            ]
          ),

          'redundantAttribute': 'expr8',
          'selector': '[expr8]',
          'itemName': 'numero',
          'indexName': null,

          'evaluate': function(
            scope
          ) {
            return scope.state.pages;
          }
        },
        {
          'type': bindingTypes.EACH,
          'getKey': null,
          'condition': null,

          'template': template(
            '<a expr10="expr10" href="#"> </a>',
            [
              {
                'redundantAttribute': 'expr10',
                'selector': '[expr10]',

                'expressions': [
                  {
                    'type': expressionTypes.TEXT,
                    'childNodeIndex': 0,

                    'evaluate': function(
                      scope
                    ) {
                      return scope.colonne;
                    }
                  },
                  {
                    'type': expressionTypes.EVENT,
                    'name': 'onclick',

                    'evaluate': function(
                      scope
                    ) {
                      return scope.trier;
                    }
                  }
                ]
              }
            ]
          ),

          'redundantAttribute': 'expr9',
          'selector': '[expr9]',
          'itemName': 'colonne',
          'indexName': null,

          'evaluate': function(
            scope
          ) {
            return scope.props.colonnes;
          }
        },
        {
          'type': bindingTypes.EACH,
          'getKey': null,
          'condition': null,

          'template': template(
            '<td expr12="expr12"></td>',
            [
              {
                'type': bindingTypes.EACH,
                'getKey': null,
                'condition': null,

                'template': template(
                  ' ',
                  [
                    {
                      'expressions': [
                        {
                          'type': expressionTypes.TEXT,
                          'childNodeIndex': 0,

                          'evaluate': function(
                            scope
                          ) {
                            return scope.valeur[1];
                          }
                        }
                      ]
                    }
                  ]
                ),

                'redundantAttribute': 'expr12',
                'selector': '[expr12]',
                'itemName': 'valeur',
                'indexName': null,

                'evaluate': function(
                  scope
                ) {
                  return Object.entries(scope.ligne);
                }
              }
            ]
          ),

          'redundantAttribute': 'expr11',
          'selector': '[expr11]',
          'itemName': 'ligne',
          'indexName': null,

          'evaluate': function(
            scope
          ) {
            return scope.state.contenu;
          }
        }
      ]
    );
  },

  'name': 'tableau'
};})(this)
//# sourceURL=src/tags/tableau.riot.js
