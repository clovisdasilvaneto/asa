if(document.querySelector(".enviar-login")){
	var height = document.querySelector("#cadastro").parentNode.offsetHeight;
	document.querySelector(".enviar-login").nextElementSibling.addEventListener("click",function(e){
		e.preventDefault();
		var cadastro = document.querySelector("#cadastro");
		cadastro.parentNode.setAttribute("style","min-height:800px; overflow:hidden;");

		setTimeout(function(){
			cadastro.classList.add("active-cad")
		},50);
	});

	document.querySelector("#fechar-cad").addEventListener("click",function(e){
		e.preventDefault();
		document.querySelector(".active-cad").classList.remove("active-cad");
		setTimeout(function(){
			document.querySelector("#cadastro").parentNode.setAttribute("style","min-height:"+height+"px;");
		},50);
	});
}


if(location.href.split("/")[4] == "livro-de-receitas"){
	document.querySelectorAll(".opcoes a")[0].classList.add("active-opc");
}else if(location.href.split("/")[4] == "meus-dados"){
	document.querySelectorAll(".opcoes a")[1].classList.add("active-opc");
}

if(document.querySelector("#contato")){
	var opcoes = document.querySelectorAll("#opcoes-contato li");
	Array.prototype.forEach.call(opcoes,function(obj){
		obj.addEventListener("click",function(){
			var html = this.querySelector("div").innerHTML, principal = document.querySelector("#principal");
			principal.style.opacity = 0;
			document.querySelector(".active").classList.remove("active");
			this.classList.add("active");

			setTimeout(function(){
				principal.innerHTML = html;
				principal.style.opacity = 1;
			},500);
		});
	})
}

document.querySelector("#top").style.height = "69px";
document.querySelector("#top").style.paddingTop = "9px";

if(document.querySelector("#marcas-cat")){
	document.querySelectorAll("#marcas article")[0].classList.add("marca-ativa");
	document.querySelector("#marcas-cat div").innerHTML = document.querySelector(".marca-ativa div").innerHTML;

	var imagens_antigas = document.querySelectorAll("#marcas-cat div a");
	Array.prototype.forEach.call(imagens_antigas,function(element) {
		element.style.opacity = 1;
	});

	var conheca = document.querySelectorAll("#marcas article");
	Array.prototype.forEach.call(conheca, function(element){
		element.addEventListener("mouseenter",function(e){
			e.preventDefault();
			document.querySelector("#marcas-cat").style.display = "block";

			setTimeout(function(){
				document.querySelector("#marcas-cat").style.opacity = 1;
			},50);

			var html = this.querySelector("div").innerHTML,indice = 0,elemento = this;

			var links = document.querySelectorAll("#marcas .setas");
			Array.prototype.forEach.call(links,function(obj,i){
				if(obj.parentNode.innerHTML == elemento.innerHTML){
					indice = i;
				}
			});

			switch(indice){
				case 0:
					document.getElementById('marcas-cat').getElementsByTagName('article')[0].className = "container";
					break
				case 1:
					document.getElementById('marcas-cat').getElementsByTagName('article')[0].className = "container higiene";
					break
				default:
					document.getElementById('marcas-cat').getElementsByTagName('article')[0].className = "container limpeza";
			}

			document.querySelector(".marca-ativa").classList.remove("marca-ativa");
			this.parentNode.classList.add("marca-ativa");

			imagens_antigas = document.querySelectorAll("#marcas-cat div a");
			Array.prototype.forEach.call(imagens_antigas,function(element) {
				element.style.opacity = 0;
				setTimeout(function(){
					document.querySelector("#marcas-cat div").innerHTML = arguments[0];
					imagens_antigas = document.querySelectorAll("#marcas-cat div a");
					Array.prototype.forEach.call(imagens_antigas,function(element) {
						setTimeout(function(){
							arguments[0].style.opacity = 1;
						},5,element)
					});
				},500,html);
			});
		});
	});

	var key_marcas = true;

	//animacao 
	window.addEventListener("scroll",function(){
		if((window.scrollY >= 194) && (key_marcas)){
			var marcas = document.querySelectorAll("#marcas article");
			var setaMarca = function(obj){
				if(document.querySelector(".ativo-marca")){
					document.querySelector(".ativo-marca").classList.remove("ativo-marca");
				}

				obj.classList.add("ativo-marca");

			}

			setaMarca(marcas[0]);

			// //intervalo para mostrar as outras marcas
			// var marcasInterval = setInterval(function(){
			// 	if(document.querySelector(".ativo-marca").nextElementSibling){
			// 		setaMarca(document.querySelector(".ativo-marca").nextElementSibling);
			// 	}else {
			// 		document.querySelector("#marcas-cat").style.height = "94px";
			// 		document.querySelector("#marcas-cat").style.overflow = "visible";

			// 		setTimeout(function(){
			// 			document.querySelector("#marcas-cat .container").style.opacity = 1;
			// 		},300);

			// 		clearInterval(marcasInterval);
			// 	}
			// },500);

			key_marcas = false;
		}
	});
}

if(document.querySelector("#produtos-box")){
	document.querySelectorAll("#produtos-box article")[0].classList.add("aberto");

	var botoes = document.querySelectorAll("#produtos-box article");
	Array.prototype.forEach.call(botoes,function(element){
		element.addEventListener("click",function(){
			if(!this.classList.contains("aberto")){
				document.querySelector(".aberto").classList.remove("aberto");
				this.classList.add("aberto");
			}
		});
	})
}

if(document.querySelector(".current-menu-item")){
	var hover = document.createElement('li');
	hover.innerHTML = "<span id='hover-menu'></span>";
	document.querySelector(".menu-topo-container ul").appendChild(hover);

	var menu_ativo = document.querySelector(".current-menu-item"), x = menu_ativo.offsetLeft, width = menu_ativo.offsetWidth, hover_menu = document.querySelector("#hover-menu");

			hover_menu.style.left = x+"px";
			hover_menu.style.width = width+4+"px";

	var setaAtivo = function(transicao,voltar){
		if(transicao){
			hover_menu.style.webkitTransition = transicao;
			hover_menu.style.mozTransition = transicao;
			hover_menu.style.msTransition = transicao;
			hover_menu.style.oTransition = transicao;
		}

		if(voltar){
			hover_menu.style.left = x+"px";
			hover_menu.style.width = width+4+"px";
		}
	}

}


if(document.querySelector("#slide-sobre")){
	document.querySelectorAll("#slide-sobre a")[0].classList.add("active-sld");
	setInterval(function(){
		var ativo = document.querySelector(".active-sld");
		ativo.classList.remove("active-sld");
		
		if(ativo.nextElementSibling){
			ativo.nextElementSibling.classList.add("active-sld");
		}else{
			document.querySelectorAll("#slide-sobre a")[0].classList.add("active-sld");
		}

	},4000);
}

if(document.querySelector("#conteudo-sobre")){
	


	var ativo_sobre = document.querySelector(".ativo-sobre"), classe = ativo_sobre.dataset.title, 
	html = document.querySelector("."+classe).cloneNode(true), titulo = ativo_sobre.textContent;

	document.querySelector("#dinamic").innerHTML = "";
	document.querySelector("#dinamic").appendChild(html);
	document.querySelector("#conteudo-sobre h3").textContent = titulo;

	

	var itens = document.querySelectorAll("#lista-servicos li");
	Array.prototype.forEach.call(itens,function(element){
		element.querySelector("a").addEventListener("click",function(e){
			e.preventDefault();
			//verifica se o link contém a classe
			if((this.dataset.title == "contato") && (!this.classList.contains('ativo-sobre'))){
				document.querySelector(".ativo-sobre").classList.remove("ativo-sobre");
				this.classList.add("ativo-sobre");

				mudarSobre(this);
				document.querySelector("#contato-form").style.display = "block";
			}else if(!this.classList.contains('ativo-sobre')){
				document.querySelector(".ativo-sobre").classList.remove("ativo-sobre");
				this.classList.add("ativo-sobre");

				if(document.querySelector("#contato-form")){
					document.querySelector("#contato-form").style.display = "none";
				}
				mudarSobre(this);
			}
		});
	});


	function mudarSobre(obj){
		var classe = obj.dataset.title, elemento = document.querySelectorAll("."+classe), 
		titulo = obj.textContent;
		document.querySelector("#dinamic").innerHTML = "";

		Array.prototype.forEach.call(elemento,function(alvo,i){
			document.querySelector("#dinamic").appendChild(alvo.cloneNode(true));

			if(document.querySelector(".ativo-sobre").dataset.title == "participa"){
				document.querySelectorAll(".encontrar-ponto")[1].addEventListener('click',function(e){
					e.preventDefault();


				document.querySelector(".ativo-sobre").classList.remove("ativo-sobre");
				document.querySelector("#pontos").classList.add("ativo-sobre");

				window.scrollTo(0,554);
				mudarSobre(document.querySelector("#pontos"));
				});
			}
			
		});

		document.querySelector("#conteudo-sobre h3").textContent = titulo;

	}
}

if(document.querySelector("#slider")){
	//adicionando a class
	document.querySelector("#slider figure").classList.add("active-home");


	//thumbnails
	var num = document.querySelectorAll("#slider figure");
	Array.prototype.forEach.call(num,function(element,index){
		var li = document.createElement("li");
		li.innerHTML = "<img src='"+element.querySelector("img").src+"' alt='"+element.querySelector("figcaption").textContent+"' />"

		//anexando a função de click
		li.addEventListener("click",function(){
			clearInterval(sld_home);

			var ativo_home = document.querySelector(".active-home"); 
			var ativo_thumb = document.querySelector(".active-thumb");


			//removendo as classes
			ativo_home.classList.remove("active-home");
			ativo_thumb.classList.remove("active-thumb");

			//adicionando as classes
			document.querySelectorAll("#slider figure")[index].classList.add("active-home");
			document.querySelectorAll("#slider li")[index].classList.add("active-thumb");

			sld_home = setInterval(sliderPrincipal, 4000);
		});

		document.querySelector("#slider ul").appendChild(li);
	})
	
	document.querySelector("#slider li").classList.add("active-thumb");

	//animação do slider
	var sld_home = setInterval(sliderPrincipal,4000);

	function sliderPrincipal(){
		//classes do slide e do controlador
		var ativo_home = document.querySelector(".active-home"); 
		var ativo_thumb = document.querySelector(".active-thumb");

		//removendo as classes
		ativo_home.classList.remove("active-home");
		ativo_thumb.classList.remove("active-thumb");

		if(ativo_home.nextElementSibling){
			ativo_home.nextElementSibling.classList.add("active-home");
			ativo_thumb.nextElementSibling.classList.add("active-thumb");
		}else{
			document.querySelector("#slider figure").classList.add("active-home");
			document.querySelector("#slider li").classList.add("active-thumb");
		}
	}
}

if(document.querySelector("#imprimir-receita")){
	document.querySelector("#imprimir-receita").addEventListener("click",function(e){
		window.print();
	});
}

window.addEventListener("scroll",function(){
	if(window.scrollY >= 50){
		document.querySelector("#top").classList.add("header-scroll");
	}else{
		document.querySelector("#top").classList.remove("header-scroll");
	}
})

var itens_menu = document.querySelectorAll(".menu-topo-container ul li");
Array.prototype.forEach.call(itens_menu,function(element,i){
	if(element.innerHTML != itens_menu[itens_menu.length - 1].innerHTML){
		element.addEventListener("mouseenter",function(){
			setaAtivo("all ease-out 0.5s");

			hover_menu.style.left = this.offsetLeft+"px";
			hover_menu.style.width = this.offsetWidth+"px";
		});	
		element.addEventListener("mouseleave",function(){
			setaAtivo("all ease-out 1s",true);
		});	
	}
});

		_$(".placeholders").placeholderFocus();
		_$(".placeholders").placeholderBlur();
