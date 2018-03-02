var potatoGridAutocomplete = Class.create(Ajax.Autocompleter, {
    initialize: function(elementIds, update, url, options) {
        var element = null;
        elementIds.each(function(elId){
            if ($(elId)) {
                element = $(elId);
            }
        });
        element.up().setStyle({
            border: '1px solid orange'
        });
        this.autocompleteContainer = new Element('div', {
            'class' : 'po-autocomplete-container',
            'id' : update,
            'style': 'display:none'
        });
        $$('body').first().appendChild(this.autocompleteContainer);
        options.onShow = options.onShow ||
            function(element, update){
                if(!update.style.position || update.style.position=='absolute') {
                    update.style.position = 'absolute';
                    Position.clone(element, update, {
                        setHeight: false,
                        offsetTop: element.offsetHeight
                    });
                }
                Effect.Appear(update, {
                    duration:0.05,
                    afterFinish: function(){
                        update.setStyle({'min-width': update.getStyle('width')});
                        update.setStyle({'width': 'auto'});
                    }
                });
            };
        options.paramName = options.paramName || 'search';
        options.frequency = options.frequency || 0.5;
        options.minChars = options.minChars || 3;


        this.baseInitialize(element, update, options);
        this.options.asynchronous  = true;
        this.options.onComplete    = this.onComplete.bind(this);
        this.options.defaultParams = this.options.parameters || null;
        this.url                   = url;
    },

    updateChoices: function(choices) {
        if(!this.changed && this.hasFocus) {
            this.update.innerHTML = choices;
            Element.cleanWhitespace(this.update);
            Element.cleanWhitespace(this.update.down());

            if(this.update.firstChild && this.update.down().childNodes) {
                this.entryCount =
                    this.update.down().childNodes.length;
                for (var i = 0; i < this.entryCount; i++) {
                    var entry = this.getEntry(i);
                    entry.autocompleteIndex = i;
                    this.addObservers(entry);
                }
            } else {
                this.entryCount = 0;
            }

            this.stopIndicator();
            this.index = -1;

            if(this.entryCount==1 && this.options.autoSelect) {
                this.selectEntry();
                this.hide();
            } else {
                this.render();
            }
        }
    }
});