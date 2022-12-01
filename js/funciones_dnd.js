function allowDrop(ev){
	ev.preventDefault();
}
function drag(ev){
	ev.dataTransfer.setData('text/plain', ev.target.id);
}
function drop(ev){
	ev.preventDefault();
	var data = ev.dataTransfer.getData('text');
	var targetParent = document.getElementById(ev.target.id).parentNode;
	var bios = new Array();
	bios['patricia'] = "Nació en Oviedo. Comenzó sus estudios de arquitectura en Madrid y los continuó en Milán, donde se graduó en 1989. En 2001 creó su propio estudio de diseño en Milán, ciudad en la que actualmente reside. Ha colaborado con grandes maestros del diseño como Castiglioni, Magistretti o Piero Lissoni. Ha ganado varios premios de diseño y habitualmente da conferencias en universidades de prestigio internacional. Parte de su obra está expuesta en el Museo de Arte Moderno de Nueva York. Asimismo, fue diseñadora del LabShop de la Laboral Centro de Arte de Gijón y es la responsable del interior del lujoso Hotel Mandarin Oriental de Barcelona. En 2009, la revista alemana Häuser la nombró la mejor diseñadora de interiores de la primera década del siglo XXI.";
	bios['zuzana'] = "Nació en 1961 en Bratislava y se mudó a los Estados Unidos a los siete años . Debido al trabajo de su padre, biomatemático, tuvo un acceso muy temprano a los ordenadores. Esta diseñadora gráfica es conocida por fundar en 1984 junto a Rudy VanderLans la revista Emigre, muy importante en el mundo del diseño digital y editorial, en la que ella se encargaba de la tipografía. A lo largo de su carrera Zuzana ha realizado más de treinta tipografías entre las que destacan Mr Eavs, Filosofía, Base o Matrix.Biografía zuzana";
	bios['hella'] = "Estudió en la Academia de diseño Eindhoven en 1993. Ese mismo año fundó su propio estudio de diseño llamado Jongeriuslab, en Róterdam. En 2008 trasladó su estudio a Berlín. Desde 2012 trabaja para Vitra como directora de arte, para ellos ha diseñado piezas como el sofá Polder y la silla East River . Se ha hecho famosa por la forma en la que mezcla industria y artesanía, alta y baja tecnología, lo tradicional y lo contemporáneo, desarrollado proyectos independientes y ha creado productos para grandes clientes como Maharam, Danskina, IKEA y KLM. Las obras de Hella Jongerius se han expuesto en museos y galerías tales como el Design Museum (Londres), la Galerie kreo (París) y la Moss Gallery (Nueva York).";
	bios['dorothee'] = "Dorothee Becker nació en Aschaffenburg (Alemania) en 1938. Filóloga de formación y diseñadora de profesión, vive entre Londres, París y California hasta fijar definitivamente su residencia en Alemania junto a su marido Ingo Maurer. Dirige su negocio Uten.Silo, dedicado a objetos cotidianos prácticos y bien diseñados. Mantiene su actividad creativa hasta la fecha.";
	bios['deborah'] = "(26 de mayo de 1931 – 19 de agosto de 2014) Estudió diseño gráfico en Chicago, En 1953 trabajó en las oficinas de Charles y Ray Eames,  luego estudió en la Escuela de Diseño de Ulm en Alemania. En 1972, fundó junto a su marido, Sussman / Prejza & Co. Sus proyectos incluyeron la identidad de la ciudad de Filadelfia y Santa Mónica, así como el aspecto y el paisaje arquitectónico de los Juegos Olímpicos de verano de 1984 en Los Ángeles. En 1983, Sussman ayudó a fundar el capítulo AIGA de Los Ángeles con Saul Bass y otros. Sussman era conocida por su trabajo audaz y colorido donde integra paisaje y tipografía. Fue galardonada con una medalla de AIGA en 2004 y miembro de la Sociedad de Diseño Gráfico Experimental en 1991, y reconocida con el Premio de la Flecha de Oro de la SEGD en 2006.";
	bios['india'] = "India Mahdavi es un arquitecta y diseñadora francésa de origen iraní-egipcio. Desde el comienzo de su carrera en la década de 1990, ha desarrollado a través de sus proyectos de diseño de interiores un estilo asociado con una cierta visión de la felicidad y el color. Su éxito internacional la ha llevado a trabajar con Maja Hoffmann, Beaumarly, Valentino, los baños de Monaco entre otros. Ha diseñado residencias privadas, hoteles, restaurantes y tiendas en lugares como París, Londres, Nueva York, Egipto o Sydney. La firma de India Mahdavi es cosmopolita y está influenciada tanto por el diseño como por el arte. Realiza impresiones abstractas y motivos figurativos con acentos pop.";
	bios['vivienne'] = "Inglaterra, 8 de abril de 1941. Esta diseñadora de moda es conocida como la creadora de la moda Punk, ya que sus diseños fueron utilizados por los Sex Pistols en su primer concierto. Vivienne dió a la estética punk crestas, imperdibles, camisetas rotas, pantalones de tartán escocés y collares de perro. En 1985, con lanza los zapatos de plataforma, una pieza absolutamente Westwood, como sus corsés, los trajes sastre en tweed escocés y los tailleurs con polisón. Descarada e iconoclasta, su imagen con la falda levantada sin llevar ropa interior delante del Palacio de Buckinham continua apareciendo. 'La ropa le sienta mejor a la gente que se empeña en usar su inteligencia', es su lema.";
	bios['sibylla'] = "Nueva York en 1963 de padre argentino y madre polaca Se trasladó a Madrid con su padre y desde joven empezó a hacer. A los 17 años viaja a París, donde aprendió en el taller de costura con Yves Saint Laurent. En 1983, presentó en Madrid, su primera colección compuesta por 40 vestidos inspirados en la naturaleza y con tejidos casi siempre cogidos del rastro madrileño o de almacenes de viejas tiendas. En 1985 presentó su primera colección de prêt-à-porter en el Salón Gaudí de Barcelona, En 2010, fue una de las pocas elegidas para la exposición sobre moda contemporánea en el museo de Artes Decorativas de París, y ha vendido sus diseños en Nueva York, Miami y Los Ángeles. En 2015, la diseñadora se hizo con el Premio Nacional de Moda. ";
	
	if(targetParent.id == "cont-target-cara"){
		
		var aux = document.getElementById('cont-target-obra');
		var idcorrecto = data+"_obra";
		
		if(targetParent.firstChild.id == 'cara'){
			if(aux.firstChild.id == idcorrecto || aux.firstChild.id == 'obra'){
				
				targetParent.removeChild(targetParent.firstChild);
				
				if(aux.firstChild.id == 'obra'){
					targetParent.appendChild(document.getElementById(data));
				} else {
					targetParent.appendChild(document.getElementById(data));
					/*eliminarImg();*/
					anadirBio(data);
				}
			}
		}
		
	} else {
		
		if(targetParent.firstChild.id == 'obra'){
			var aux = document.getElementById('cont-target-cara');
			var idcorrecto = data.split("_");
			if(aux.firstChild.id == idcorrecto[0] || aux.firstChild.id == 'cara'){
					
				targetParent.removeChild(targetParent.firstChild);
				
				if(aux.firstChild.id == 'cara'){
					targetParent.appendChild(document.getElementById(data));
				} else {
					targetParent.appendChild(document.getElementById(data));
					/*eliminarImg();*/
					anadirBio(idcorrecto[0]);
				}
			}
		}
		
	}
	
	function anadirBio(ind){
		var descripcion = document.getElementById('descripcion');
		var parrafo = document.getElementById('parrafo');
		var titDesc = document.getElementById('titDesc');
		descripcion.removeChild(titDesc);
		descripcion.removeChild(parrafo);
		var titulo = document.createElement("h3");
		
		switch(ind){
			case 'patricia':
				nom = 'Patricia Urquiola';
				break;
			case 'zuzana':
				nom = 'Zuzana Licko';
				break;
			case 'hella':
				nom = 'Hella Jongerius';
				break;
			case 'dorothee':
				nom = 'Dorothee Becker';
				break;
			case 'deborah':
				nom = 'Deborah Sussman';
				break;
			case 'india':
				nom = 'India Mahdavi';
				break;
			case 'vivienne':
				nom = 'Vivienne Westwood';
				break;
			case 'sibylla':
				nom = 'Sybilla Sorondo';
				break;
		}
		
		var textTitulo = document.createTextNode(nom);
		titulo.appendChild(textTitulo);
		titulo.setAttribute("id","titDesc");
		titulo.setAttribute("class","black");
		descripcion.appendChild(titulo);
		var bio = document.createElement("p");
		//var textBio = document.createTextNode("Esto es una bio de ejemplo");
		var textBio = document.createTextNode(bios[ind]);
		bio.appendChild(textBio);
		bio.setAttribute("id","parrafo");
		bio.setAttribute("class","parrafo");
		descripcion.appendChild(bio);
	}
	function eliminarImg(){
		var obraContainer = document.getElementById('cont-target-obra');
		var caraContainer = document.getElementById('cont-target-cara');
		var obra = document.getElementById(obraContainer.firstChild.id);
		var cara = document.getElementById(caraContainer.firstChild.id);;
		obraContainer.removeChild(obra);
		caraContainer.removeChild(cara);
		var obraInicial = document.createElement("img");
		obraInicial.setAttribute("id","obra");
		obraInicial.setAttribute("src","img/obra.png");
		var caraInicial = document.createElement("img");
		caraInicial.setAttribute("id","cara");
		caraInicial.setAttribute("src","img/cara.png");
		obraContainer.appendChild(obraInicial);
		caraContainer.appendChild(caraInicial);
	}
	
}
