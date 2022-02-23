window.__riot_registry__['app'] = (function (global){return {
  'css': null,
  'exports': null,

  'template': function(
    template,
    expressionTypes,
    bindingTypes,
    getComponent
  ) {
    return template(
      '<h1 expr0="expr0"> <small><date expr1="expr1"></date></small></h1><div container><div grid><div column="9"><liste expr2="expr2" titre="Total"></liste></div><div column="3"><liste expr3="expr3" titre="Aujourd\'hui"></liste></div></div><tableau expr4="expr4" page="1" taille="20"></tableau></div>',
      [
        {
          'redundantAttribute': 'expr0',
          'selector': '[expr0]',

          'expressions': [
            {
              'type': expressionTypes.TEXT,
              'childNodeIndex': 0,

              'evaluate': function(
                scope
              ) {
                return [
                  scope.props.titre,
                  ' '
                ].join(
                  ''
                );
              }
            }
          ]
        },
        {
          'type': bindingTypes.TAG,
          'getComponent': getComponent,

          'evaluate': function(
            scope
          ) {
            return 'date';
          },

          'slots': [],
          'attributes': [],
          'redundantAttribute': 'expr1',
          'selector': '[expr1]'
        },
        {
          'type': bindingTypes.TAG,
          'getComponent': getComponent,

          'evaluate': function(
            scope
          ) {
            return 'liste';
          },

          'slots': [],

          'attributes': [
            {
              'type': expressionTypes.ATTRIBUTE,
              'name': 'liste',

              'evaluate': function(
                scope
              ) {
                return scope.donnees.getTotal();
              }
            }
          ],

          'redundantAttribute': 'expr2',
          'selector': '[expr2]'
        },
        {
          'type': bindingTypes.TAG,
          'getComponent': getComponent,

          'evaluate': function(
            scope
          ) {
            return 'liste';
          },

          'slots': [],

          'attributes': [
            {
              'type': expressionTypes.ATTRIBUTE,
              'name': 'liste',

              'evaluate': function(
                scope
              ) {
                return scope.donnees.getAujourdhui();
              }
            }
          ],

          'redundantAttribute': 'expr3',
          'selector': '[expr3]'
        },
        {
          'type': bindingTypes.TAG,
          'getComponent': getComponent,

          'evaluate': function(
            scope
          ) {
            return 'tableau';
          },

          'slots': [],

          'attributes': [
            {
              'type': expressionTypes.ATTRIBUTE,
              'name': 'colonnes',

              'evaluate': function(
                scope
              ) {
                return scope.donnees.getColonnes();
              }
            },
            {
              'type': expressionTypes.ATTRIBUTE,
              'name': 'donnees',

              'evaluate': function(
                scope
              ) {
                return scope.donnees.getPays();
              }
            }
          ],

          'redundantAttribute': 'expr4',
          'selector': '[expr4]'
        }
      ]
    );
  },

  'name': 'app'
};})(this)
//# sourceURL=src/tags/app.riot.js
