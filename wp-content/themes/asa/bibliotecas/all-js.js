(function(){
	var allJs = function(arg){
		if(!(this instanceof allJs)){
			return new allJs(arg);
		}

		this.argument = document.querySelectorAll(arg).length > 1?document.querySelectorAll(arg):document.querySelector(arg);
		console.log(this.argument);
	}

	//objeto responsável por armazenar as funções que tratam os métodos
	var functions = {
		pseudos: function(element,property,pseudo){
			if(element.hasOwnProperty("style")){
		     return window.getComputedStyle(element,pseudo).getPropertyValue(property);
		   }
		}
	}

	allJs.fn = allJs.prototype = {
		//retorna a propiedade after e before do elemento
		getAfter: function(property){
		    return (!this.argument.length)?functions.pseudos(this.argument,property,":after"):functions.pseudos(this.argument[0],property,":after");
		},
		getBefore: function(property){
		    return (!this.argument.length)?functions.pseudos(this.argument,property,":before"):functions.pseudos(this.argument[0],property,":before");
		},

		//Seta efeitos de placeholder
		placeholderFocus : function(){
			if(!this.argument.length){
				if(this.argument.tagName == "INPUT"){
					this.argument.addEventListener("focus",function(){
						return this.getAttribute("data-value") == this.value?this.value = "":false;
					},false);
				}
			}else{
				Array.prototype.forEach.call(this.argument,function(element,i){
					if(element.tagName == "INPUT"){
						element.addEventListener("focus",function(){
							return this.getAttribute("data-value") == this.value?this.value = "":false;
						},false);
					}
				});
			}
		},
		
		placeholderBlur : function(){
			if(!this.argument.length){
				if(this.argument.tagName == "INPUT"){
					this.argument.addEventListener("blur",function(){
						return this.value == ""?this.value = this.getAttribute("data-value"):false;
					},false);
				}
			}else{
				Array.prototype.forEach.call(this.argument,function(element,i){
					if(element.tagName == "INPUT"){
						element.addEventListener("blur",function(){
							return this.value == ""?this.value = this.getAttribute("data-value"):false;
						},false);
					}
				});
			}
		}

		//seta o efeito de fadeIn/fadeOut nos elementos
	}


	window.allJs = window._$ = allJs;
})();