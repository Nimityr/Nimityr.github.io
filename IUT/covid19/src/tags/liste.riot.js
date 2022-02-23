window.__riot_registry__['liste'] = (function (global){return {
  'css': null,
  'exports': null,

  'template': function(
    template,
    expressionTypes,
    bindingTypes,
    getComponent
  ) {
    return template(
      '<h2 expr5="expr5"> </h2><ul><li expr6="expr6"></li></ul>',
      [
        {
          'redundantAttribute': 'expr5',
          'selector': '[expr5]',

          'expressions': [
            {
              'type': expressionTypes.TEXT,
              'childNodeIndex': 0,

              'evaluate': function(
                scope
              ) {
                return scope.props.titre;
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
                      return [
                        scope.element[0],
                        ' : ',
                        scope.element[1]
                      ].join(
                        ''
                      );
                    }
                  }
                ]
              }
            ]
          ),

          'redundantAttribute': 'expr6',
          'selector': '[expr6]',
          'itemName': 'element',
          'indexName': null,

          'evaluate': function(
            scope
          ) {
            return Object.entries(scope.props.liste);
          }
        }
      ]
    );
  },

  'name': 'liste'
};})(this)
//# sourceURL=src/tags/liste.riot.js
