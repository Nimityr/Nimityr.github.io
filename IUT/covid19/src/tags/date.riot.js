window.__riot_registry__['date'] = (function (global){return {
  'css': null,

  'exports': {
    onBeforeMount()
    {
      let aujourdhui = new Date();

      this.state.date = this.getJour(aujourdhui) + "/"
                        + this.getMois(aujourdhui) + "/"
                        + this.getAnnee(aujourdhui);
    },

    getJour(date)
    {
      let jour = date.getDate();

      if (jour < 10)
      {
        return "0" + jour;
      }

      return jour;
    },

    getMois(date)
    {
      let mois = date.getMonth() + 1;

      if (mois < 10)
      {
        return "0" + mois;
      }

      return  mois;
    },

    getAnnee(date)
    {
      return date.getFullYear();
    }
  },

  'template': function(
    template,
    expressionTypes,
    bindingTypes,
    getComponent
  ) {
    return template(
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
                return [
                  scope.state.date
                ].join(
                  ''
                );
              }
            }
          ]
        }
      ]
    );
  },

  'name': 'date'
};})(this)
//# sourceURL=src/tags/date.riot.js
