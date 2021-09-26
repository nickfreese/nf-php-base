/*
* pathspec
*/
window.pathspec_settings = {};
window.pathspec = (function(s){
	var app = {

		s:{
			endpoint:"http://localhost/pathspec-track.php",
			registered:{
				"pageWrapper":"div.page-wrapper"
			},
			conversionURL:"",


		},

		lastScroll: Date.now(),
		lastInput: document.querySelector('body'),

        init: function(s){
        	var _this = this;

        	for (key in s) {
                _this.s[key] = s;
        	}

            
            _this.setListeners();

            return _this;

        },


        send: function(send)
        {
            console.log(send);
        },

        buildEventInfo: function(e){
        	var _this = this;

        	var data = {};

        	//data.target = e.target;
        	data.type = e.type;
            
            if(e.type == "click" || e.type == "focusin"){

            	if(e.target.id){
                    data.elementTarget = e.target.tagName+"#" + e.target.id;
        	    } 

        	    data.elementType = e.target.tagName;
        	    data.elementTag = _this.checkIfElementMatchesList(e.target);
            
                if(data.elementType == "INPUT" || data.elementType == "BUTTON"){
            	    data.elementName = e.target.name;
            	    data.inputType = e.target.type;
                }

            }

        	
            return data;

        },

        checkIfElementMatchesList: function(elem){

        	_this = this;

        	for(key in _this.s.registered){
                if(elem == document.querySelector(_this.s.registered[key])){
                    return key;
                }
        	}  
        	return false;

        },



        listenerCallBack: function(e){

        	var _this = this;

        	var data = _this.buildEventInfo(e);

        	if(data.elementType == "INPUT" || data.elementType == "BUTTON" || data.elementTag !== false || data.type == "scroll" || data.type == "focusin" || data.type == "input"){
                _this.send(data);
        	}

        },



        setListeners: function(){
        	var _this = this;

        	window.addEventListener('click', function(e){
        		e = e || window.e;
                _this.listenerCallBack(e);

        	});

        	_this.setScrollListeners();

        	window.addEventListener('focusin', function(e){
                e = e || window.e;
                _this.listenerCallBack(e);
            });

            window.addEventListener('input', function(e){
                e = e || window.e;
                if(_this.lastInput !== e.target){
                    _this.listenerCallBack(e);
                    _this.lastInput = e.target;
                }
                
            });

        },



        setScrollListeners: function(){
            var _this = this;

            window.addEventListener('scroll', function(e){
            	e = e || window.e;
            	if((Date.now()-3000) > _this.lastScroll){
                    _this.listenerCallBack(e);
                    _this.lastScroll = Date.now();
            	}


            });


        },






	};
    return app.init(s);
})(window.pathspec_settings)